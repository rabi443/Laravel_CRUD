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

        @if($users->isEmpty())
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
                <td>
                    @if($user->profile_photo)
                        <b><a href="{{ route('users.show', $user->id) }}" style="text-decoration: none; color: green;">view</a></b>
                    @else
                        <span>No Photo</span>
                    @endif
                </td>
                <td>
                    <b><a href="{{ route('users.edit', $user->id) }}" style="text-decoration: none;">Edit</a> | </b>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you want to delete your profile?')" style="background:none; border:none; color:red; cursor:pointer;">
                           <b> Delete </b>
                        </button>
                    </form>

                   
            </tr>
            @endforeach 
        @endif
    </table>
    <button>
        <a href="{{ route('users.create') }}" style="text-decoration: none;">Add New User</a>
    </button>
    
</body>
</html>