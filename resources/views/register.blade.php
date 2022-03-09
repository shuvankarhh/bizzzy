<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.register') }}" method="post">
        @csrf
        @if ($errors->any())

            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
        <input type="text" name="email" id="email" placeholder="Email">
        <input type="text" name="first_name" id="first_name" placeholder="First Name">
        <input type="text" name="last_name" id="last_name" placeholder="Last Name">
        <input type="text" name="password" id="password"  placeholder="Password">
        <input type="text" name="password_confirmation" id="password_confirmation"  placeholder="Confirm Password">
        <label for="freelancer">Freelancer</label>
        <input type="radio" name="freelancer_or_recuriter" id="freelancer" value="freelancer">
        <label for="recruiter">Recruiter</label>
        <input type="radio" name="freelancer_or_recuriter" id="recruiter" value="recruiter">
        <button>Submit</button>
    </form>
</body>
</html>