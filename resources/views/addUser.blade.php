<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New User</title>
</head>
<body style="text-align: center; margin-top: 50px;">
    <h2>Fill the Form to add new user</h2>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" style="display: inline-block; text-align: left; margin-top: 20px;">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br><br>

        <label for="contact">Contact:</label><br>
        <input type="text" id="contact" name="contact" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="profile_photo">Profile Photo:</label><br>
        <input type="file" id="profile_photo" name="profile_photo" accept="image/*"><br><br>

        <input type="submit" value="Add User">
</body>
</html>