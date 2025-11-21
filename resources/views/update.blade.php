<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update user data </title>
</head>
<body style="text-align: center; margin-top: 50px;">
    <h2>fill it to update your details</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" style="display: inline-block; text-align: left; margin-top: 20px;">
        @csrf
        @method('PUT')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required><br><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" required><br><br>

        <label for="contact">Contact:</label><br>
        <input type="text" id="contact" name="contact" value="{{ old('contact', $user->contact) }}" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required><br><br>

        <label for="profile_photo">Profile Photo:</label><br>
        @if($user->profile_photo)
            <img src="{{ asset('storage/profile_photos/' . $user->profile_photo) }}" width="80" height="80" style="border-radius:50%; display:block; margin-bottom:10px;">
            <span>Upload new photo if you want to change</span><br>
        @endif
        <input type="file" id="profile_photo" name="profile_photo" accept="image/*"><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>