<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\UserStatus;
use App\UserType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Helpers\CMail;

class AuthController extends Controller
{
    public function loginForm(Request $request){
        $data = [
            'pageTitle' => 'Login'
        ];
        return view('back.layout.pages.auth.login', $data);
    }

    public function signupForm(Request $request){
        $data = [
            'pageTitle' => 'Sign Up'
        ];
        return view('user.layout.pages.auth.signup', $data);
    }

    public function signupHandler(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'username' => 'required|string|unique:users,username',
        'password' => 'required|string|min:5|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'type' => 'user',
        'status' => 'pending',
    ]);

    return redirect()->route('login_form')->with('success', 'Account created successfully. Please log in.');
}

    public function forgotForm(Request $request){
        $data = [
            'pageTitle' => 'Forgot Password'
        ];
        return view('back.layout.pages.auth.forgot', $data);
    }
    
    public function loginHandler(Request $request){
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
       
        if ( $fieldType == 'email' ) {
            $request->validate([
                'login_id'=>'required|email|exists:users,email',
                'password'=>'required|min:5'
            ],[
                'login_id.required'=>'Enter your email or username',
                'login_id.email'=>'Invalid email address',
                'login_id.exists'=>'No account found for this email'
            ]);
        }else{
            $request->validate([
                'login_id'=>'required|exists:users,username',
                'password'=>'required|min:5'
            ],[
                'login_id.required'=>'Enter your username or email',
                'login_id.exists'=>'No account found for this username'
            ]);
        }

        $creds = array(
            $fieldType=>$request->login_id,
            'password'=>$request->password,
        );

        if (Auth::attempt($creds)) {
            $user = Auth::user();

            if ($user->type === UserType::Admin || $user->type === UserType::SuperAdmin) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->type === UserType::User) {
                return redirect()->route('user.dashboard');
            }
            // Optionally handle other types or default
            return redirect()->route('login_form')->with('fail', 'Unknown user type.');
        } else {
            return redirect()->route('login_form')->with('fail', 'Invalid credentials.');
        }
    } // End Method



    public function sendPasswordResetLink(Request $request) {
        //Validate the form 
        $request->validate([
            'email'=> 'required|email|exists:users,email'
        ], [
            'email.required' => 'The :attribute is required',
            'email.email' => 'Invalid email address',
            'email.exists' => 'No user found with this email address'
        ]);

        // Get User Details
        $user = User::where('email',$request->email)->first();

        //Generate Token
        $token = base64_encode(Str::random(64));

        //Check if there is an existing token
        $oldToken = DB::table("password_reset_tokens")
                            -> where('email',$user->email)
                            ->first();

        if($oldToken){
            DB::table('password_reset_tokens')
            ->where('email', $user->email)
            ->update([
                'token'=>$token, 
                'created_at' =>Carbon::now()
            ]);
        }else{
            //Add new reset token
            DB::table('password_reset_tokens')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' =>Carbon::now()
            ]);
        }

        //Create clickable action link

        $actionLink = route('admin.reset_password_form',['token'=>$token]);

        $data = array (
            'actionlink' => $actionLink,
            'user' => $user
        );

        $mail_body = view('email-templates.forgot-template', $data)->render();
        $mailConfig = array(
            'recipient_address' => $user->email,
            'recipient_name' => $user->name,
            'subject' => 'Reset Password',
            'body' => $mail_body
        );

        if(CMail::send($mailConfig) ){
            return redirect()->route('admin.forgot')->with('success', "We have e-mailed your password reset link.");
        }else{
            return redirect()->route('admin.forgot')->with('fail', "Something went wrong, Reset link not sent. Try again.");
        }

    } // End Method

    public function resetForm(Request $request, $token = null) {
        $isTokenExists = DB::table('password_reset_tokens')->where('token',$token)->first();

    if (!$isTokenExists){
        return redirect()->route('admin.forgot')->with('fail','Invalid toke. Request another reset link');
       }else{
        $data = [
            'pageTitle' => 'Reset Password',
            'token' => $token
        ];

        return view ('back.layout.pages.auth.reset', $data);

       }
    } // End Method 

    public function resetPasswordHandler (Request $request){
        //Validate the form
        $request->validate([
            'new_password' => 'required|min:5|required_with:new_password_confirmation|
            same:new_password_confirmation',
            'new_password_confirmation'=>'required'
        ]);

        $dbToken = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        //Get User Details
        $user = User::where('email', $dbToken->email)->first();

        //Update Password
        User::where('email',$user->email)->update([
            'password'=>Hash::make($request->new_password)
        ]);

        //Send notification email to this user email address that contains new password
        $data = array(
            'user'=>$user,
            'new_password'=>$request->new_password
        );

        $mail_body = view('email-templates.password-changes-template',$data)->render();

        $mailConfig = array(
            'recipient_address'=>$user->email,
            'recipient_name'=>$user->name,
            'subject'=>'Password Changed',
            'body'=>$mail_body 
        );

        if( CMail::send($mailConfig)){
            //Delete token from DB
            DB::table('password_reset_tokens')->where([
                'email'=>$dbToken->email,
                'token'=>$dbToken->token
            ])->delete();

            return redirect()->route('admin.login')->with('success','Password Changed Successfully. Please log in again.');
        }else{
            return redirect()->route('admin.reset_password_form', ['token'=>$dbToken->token])->with(
                'fail','Something went wrong, try again.' );
        }

    }

}
