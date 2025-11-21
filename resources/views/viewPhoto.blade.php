<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile photo</title>
</head>
<body style="text-align: center; margin-top: 50px;">
    <h2>{{ $user->name }}</h2>
    @if($user->profile_photo)
        <img src="{{ asset('storage/profile_photos/' . $user->profile_photo) }}" alt="Profile Photo" width="250" height="300" >
    @endif
    <br><br>
    <button>
        <a href="{{route('users.index')}}" style="text-decoration: none; padding: 20px; font-size: 20px;"><b>Back</b></a>
    </button>
    
</body>
</html>