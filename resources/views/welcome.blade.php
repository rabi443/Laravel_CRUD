<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body style="text-align: center; margin-top: 50px;">
    <h1>Welcome to our Dashboard.</h1>
    <table border="1" style="width: 80%; border-collapse: collapse; text-align: center; margin: 20px auto;">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Email</th>
            <th>profile_photo</th>
            <th>Action</th>
        </tr>

        @php
            $users = null;
        @endphp

        @if(empty($users))
            <tr>
                <td colspan="7">No users found.</td>
            </tr>
        @else 
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->contact }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" width="100"></td>
                <td>
                    <a href="{{ route('edit', $user->id) }}">Edit</a> | 
                    <a href="{{ route('delete', $user->id) }}" onclick="return confirm('do you want to delete yout profile photo?')">Delete</a>
            </tr>
            @endforeach 
        @endif
    </table>
    <button>
        <a href="{{ route('users.create') }}" style="text-decoration: none;">Add New User</a>
    </button>
</body>
</html>