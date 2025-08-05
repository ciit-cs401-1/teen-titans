<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
<<<<<<< Updated upstream
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('picture')->nullable();
            $table->text('bio')->nullable();
            $table->string('type')->default('user');
            $table->string('status')->default('active');
            $table->rememberToken();
            $table->timestamps();
=======
            $table->id(); // Primary key
            $table->string('name')->comment('Full name of the user');
            $table->string('email')->unique()->comment('User email, must be unique');
            $table->string('username')->unique()->comment('Unique username for the user');
            $table->timestamp('email_verified_at')->nullable()->comment('When the user verified their email');
            $table->string('password')->comment('Hashed password');
            
            // Extra fields from ERD
            $table->string('picture')->nullable()->comment('Profile picture path or filename');
            $table->text('bio')->nullable()->comment('User biography or description');
            $table->string('type')->default('user')->comment('User type: admin, moderator, regular, etc.');
            $table->string('status')->default('active')->comment('Account status: active, suspended, etc.');

            // Auth-related
            $table->rememberToken()->comment('Used for "remember me" login functionality');
            $table->timestamps(); // created_at and updated_at
>>>>>>> Stashed changes
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
