<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset ('assets/css/login.css')}}">
    <title>FIXit | Login</title>
</head>
<body>

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
        <p>Dont have an account? <span>Create one now</span></p>
    </div>


    <form action="">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <button>Login</button>
    </form>

    <div class="google">
        <p>Sign in using Google</p>
    </div>


</div>




<div class="buttom"></div>
</section>
    
</body>
</html>