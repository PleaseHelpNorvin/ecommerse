@extends('client.layout.layout')
@section('main')
    <div class="wrapper">
        <div class="container">
            <div class="form-container">
                <form class="edit-profile-form" action="{{ route('editprofile.post', ['username' => $username]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="{{ old('username', $clientUser->username) }}" placeholder="Username" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="text" id="email" name="email" value="{{ old('email', $clientUser->email) }}" placeholder="Email Address">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $clientUser->fullname) }}" placeholder="Full Name">
                        @error('fullname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Phone Number:</label>
                        <input type="text" id="phonenumber" name="phonenumber" value="{{ old('phonenumber', $clientUser->phonenumber) }}" placeholder="Phone Number">
                        @error('phonenumber')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" id="password" name="password" placeholder="Leave blank to keep current">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="imagePath">Profile Picture:</label>
                        <input type="file" id="imagePath" name="imagePath">
                        @error('imagePath')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <input type="submit" value="Update Profile">
                </form>
            </div>
        </div>
    </div>
@endsection
