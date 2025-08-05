@extends('back.layout.dashboard')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Edit User: {{ $user->name }}</h1>

        <form action="#" method="POST">
            @csrf
            {{-- Add method if needed, like PATCH or PUT --}}
            <div class="mb-4">
                <label class="block text-gray-700">Name:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full border rounded px-4 py-2" />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full border rounded px-4 py-2" />
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Role:</label>
                <select name="is_admin" class="w-full border rounded px-4 py-2">
                    <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>User</option>
                    <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save Changes</button>
        </form>
    </div>
@endsection
