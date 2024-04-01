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
        <p>Already have an account? <span>Sign in</span></p>
    </div>


    <div class="google">
            <div class="container"><p>Sing in with Google</p></div>
            <div class="or">
                <div class="i"></div>
                
                <h2>OR</h2>

                <div class="i"></div>
            </div>
    </div>

    <div class="sign">
        <form action="">
            <div class="top">
                    <input type="text" name="firstname" placeholder="first name">
                    <input type="text" name="lastname" placeholder="last name">
            </div>

            <div class="email">
                <input type="email" name="email" placeholder="email">
            </div>

            <div class="password">
                <input type="password" name="password" placeholder="password">
            </div>

            <div class="confirmpassword">
                <input type="password" name="confirmpassword" placeholder="confirm password">
            </div>


            <div class="last">
                <button>Register</button>
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