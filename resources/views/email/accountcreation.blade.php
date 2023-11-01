<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Creation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #dfcfcf;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #4c4cf1;
        }

        h3 {
            color: #333;
        }

        p {
            color: #666;
        }

        a {
            text-decoration: none;
            color: #4c4cf1;
        }

        .container {
            background-color: #bfbaba;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Congratulations</h2>
        <h3>Hello {{ $information['name'] }},</h3>
        <p>Your Account has been created at KalkerDeal</p>
        <p><b>Email:</b> {{ $information['email'] }}</p>
        <p><b>Password:</b> {{ $information['password'] }}</p>
        <p>You can change your password by logging into your account</p>
        <p>
            <a href="{{ url('login') }}">Click to Login</a>
        </p>
        <h3>Role: {{ $information['role'] }}</h3>
    </div>
</body>

</html>














{{-- <x-mail::message>
    # Congratulations to {{ $information['name'] }}!

    Your account has been created at KalkerDeal.com

    <x-mail::panel>
        Role: {{ $information['role'] }}
    </x-mail::panel>

    <x-mail::panel>
        Email: </b> {{ $information['email'] }}
        Password: </b> {{ $information['password'] }}
    </x-mail::panel>

    You can change your password by login into your account.

    <x-mail::button :url="url('login')" color="success">
        Click to Login
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message> --}}


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 class="bg-info">Congratulations!</h1>
    <h3>Hello {{ $information['name'] }},</h3>
    <p>Your account has been created at KalkerDeal.com</p>
    <p><b>Email: </b> {{ $information['email'] }}</p>
    <p><b>Password: </b> {{ $information['password'] }}</p>
    <p>You can change your password by login into your account.</p>
    <p>
        <a href="{{ url('login') }}">Click to login</a>
    </p>
    <h2>Role: {{ $information['role'] }}</h2>
</body>
</html> --}}
