<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/register.css')}}">
    <title>Document</title>
</head>
<body>


<div class="background">
    <div id="first"></div>
    <div id="second"></div>
    <div id="last"></div>
</div>

<section id="main">
    <div class="left">

    <div class="logosection">
        <img src="{{asset('assets/images/logo1.png')}}" alt="">
        <h2>Create Account</h2>
        <p>Already have an account? <span><a href="{{ route('login')}}">Sign in</a></span></p>
    </div>


    <div class="google">

            <div class="or">
                <div class="i"></div>

                <div class="i"></div>
            </div>
    </div>

    <div class="sign">


        <form method="POST" action="{{ route('registerform')}}">
        @csrf

        <select name="role" id="">
                <option value="" disabled selected>Account type</option>
                <option value="Client">Client</option>
                <option value="Depanneur">Depanneur</option>
            </select>
            @error('role')
            <span style="color:white">{{ $message }}</span>
        @enderror

        <div class="name">
                <input type="name" value="{{ old('name') }}" name="name" placeholder="name">
                @error('name')
            <span style="color:white">{{ $message }}</span>
        @enderror
            </div>

            <div class="email">
                <input type="email" value="{{ old('email') }}" name="email" placeholder="email">
                @error('email')
            <span style="color:white">{{ $message }}</span>
        @enderror
            </div>

            <div class="password">
                <input type="password" name="password" placeholder="password">
                @error('password')
            <span style="color:white">{{ $message }}</span>
        @enderror
            </div>

            <div class="confirmpassword">
                <input type="password" name="password_confirmation" placeholder="confirm password">
                @error('password_confirmation')
            <span style="color:white">{{ $message }}</span>
        @enderror
            </div>

            <div class="last">
                <button type="submit">Register</button>
                <div>
                    <input type="checkbox">
                    <p>i agree to the <span>Terms of Service</span> and <span>Privacy Policy</span></p>
                </div>
            </div>
        </form>


    </div>



    </div>
    <div class="right"><img src="{{asset('assets/images/Rectangle 15.png')}}" alt=""></div>
</section>
    
</body>
</html>