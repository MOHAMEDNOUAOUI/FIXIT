<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset ('assets/css/login.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>FIXit | Login</title>
</head>
<body class="relative">

<div class="background">
    <div id="first"></div>
    <div id="second"></div>
    <div id="last"></div>
</div>

<section id="main">


<div class="top">

<div class="logosection">
        <img src="{{asset('assets/images/logo1.png')}}" alt="">
        <h2>login to access the page</h2>
        <p>Dont have an account? <span><a href="{{ route('register')}}">Create one now</a></span></p>
    </div>


    <form method="POST" action="{{ route('loginform')}}">
    @csrf
        <input type="text" name="email" placeholder="email">
        @error('email')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
        <input type="text" name="password" placeholder="password">
        @error('password')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
        <button type="submit">Login</button>


        @if(session('status'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-3 rounded absolute top-3 right-3" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('status') }}</span>
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 4.768l.884.884L10 10.882l-4.232-4.23.884-.884L10 9.114l4.348-4.346z"/></svg>
        </button>
    </div>
@endif



    </form>

    <div class="google">
        <p>Sign in using Google</p>
    </div>


</div>




<div class="buttom"></div>
</section>
    
</body>
</html>