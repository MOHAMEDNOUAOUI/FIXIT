<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$user->name}} Profile</title>
    @if($user->image)
    <link rel="icon" type="image/png" href="data:image/png;base64,{{$user->image->base64}}">
    @endif
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<section id="page1">
    <div id="background" style="{{ isset($user->image->base64) ? 'background-image: url(data:image/png;base64,'.$user->image->base64.')' : 'background-color: rgb(43,56,91);' }}"></div>
    <header>
        <nav>
        <a id="logo" href="{{route('HOME')}}"><img src="{{asset ('assets/images/logo1.png')}}" alt=""></a>
        </nav>
    </header>

    <main>
        <h1>Hello {{$user->name}}</h1>
        <p>Welcome your profile page. You can see your informations and modify them as you want. </p>
    </main>
</section>


<section id="page2">


    <div class="leftside">
        <div class="topleft">
            <p>My account</p>
        </div>

        <div class="restleft">
                <p>USER INFORMATIONS</p>

               <form action="{{route('profileupdate' , ['id' => $user->id])}}" enctype="multipart/form-data" method="POST" id="forminfo" class="flex flex-col gap-4">
    @csrf

    <input type="file" name="profile" id="profile" style="display:none">

               <div class="firstrow">
                    <div class="name flex flex-col gap-1">
                        <label for="name">Username</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
                            @error('name')
                <p class="wrong">{{ $message }}</p>
            @enderror
                    </div>

                    <div class="email flex flex-col gap-1">
                        <label for="email">Email address</label>
                        <input type="text" name="email" id="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                <p class="wrong">{{ $message }}</p>
            @enderror
                    </div>
                </div>

                <div class="firstrow">
                    <div class="phone flex flex-col gap-1">
                        <label for="phone">Phone number</label>
                        <input type="text" name="Phone" id="phone" value="{{ old('Phone', $user->Phone) }}">
                        @error('Phone')
                <p class="wrong">{{ $message }}</p>
            @enderror
                    </div>

                </div>
               

                <hr class="mt-2">


                @if(isset($user->depanneur))
    <h2>METIER INFORMATIONS</h2>
    <div class="firstrow">
        
            

            <select name="metier" class="" id="metier">
            @php
                $metierFound = false;
            @endphp
            @foreach($metiers as $metier)
                @if($user->depanneur->metiers->contains('Metier', $metier->Metier))
                    @php
                        $metierFound = true;
                    @endphp
                    <option selected value="{{ $metier->id }}">{{ $metier->Metier }}</option>
                @else
                    <option value="{{ $metier->id }}">{{ $metier->Metier }}</option>
                @endif
            @endforeach
            @if (!$metierFound)
                <option disabled selected  value="none">Please select one</option>
            @endif
        </select>

           

    </div>
@endif

<hr>

<h2>PASSWORD INFORMATIONS</h2>



<div class="firstrow">
                    <div class="phone flex flex-col gap-1">
                        <label for="oldpassword">Old Password</label>
                        <input type="password" name="oldpassword" id="old" value="">
                    </div>

</div>

<div class="firstrow">
                    <div class="phone flex flex-col gap-1">
                        <label for="newpassword">New Password</label>
                        <input type="password" name="newpassword" id="new" value="">
                    </div>

                </div>

                <div class="firstrow">
                    <div class="phone flex flex-col gap-1">
                        <label for="confirmpassword">Confirm Password</label>
                        <input type="password" name="confirmpassword" id="confirm" value="">
                    </div>

                </div>



                <button type="button" id="passwordbutton">Change</button>
</form>






        </div>

    </div>

    <div class="rightside">
        <div class="profilecircle" style="{{ isset($user->image->base64) ? 'background-image: url(data:image/png;base64,'.$user->image->base64.')' : 'background-color: rgb(43,56,91);' }}"></div>

        <div class="text flex items-center flex-col">
        <h2>{{$user->name}}</h2>
        <p>

        @if($user->client)
        Client
        @elseif($user->depanneur)
        Depanneur
        @else
        Admin
        @endif

        </p>
        <p>{{$user->email}}</p>
        </div>
        </div>
    </div>

</section>
   


<script src="{{asset('js/profile.js')}}"></script>
</body>
</html>
