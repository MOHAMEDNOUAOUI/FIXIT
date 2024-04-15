<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset ('assets/css/depaneur/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>


<section id="sidebar">
<!-- LOGO -->

<a href="">
<img style="width: 5rem;height:5rem" src="{{asset ('assets/images/logo3.png')}}" alt="">
</a>


<ul class="flex flex-col gap-3 items-center">
<li><a href="{{route('Depanneur.index')}}"><i class="icon   fa fa-pie-chart  text-xl"></i></a></li>
    <li><a href="{{ route('Depanneur.services')}}"><ion-icon class="icon active   text-xl" name="calendar-outline"></ion-icon></a></li>
    <li><a href="{{ route('Depanneur.Rating')}}"><ion-icon name="star-half-outline" class="icon text-xl"></ion-icon></a></li>
</ul>


<i class='bx bx-log-out icon text-2xl'></i>

</section>


<section id="main">
    <nav class="flex items-center justify-between">
        <h2>Good Morning Mohamed</h2>
        <div class="rightnav flex items-center gap-3">
            <form action="{{route('available')}}" method="post">
                @csrf
                @if($userinfo->depanneur->status == 'Available')
                <button type="submit" name="available" id="online"></button>
                @else
                <button type="submit" name="notavailable" id="online"></button>
                @endif

            
            </form>
            <i class="fa-regular text-2xl fa-bell"></i>
            <i class='bx bx-message-square-dots text-2xl'></i>
            <div class="profile" style="background-image: url(data:image/png;base64,{{ $userinfo->image->base64 }})">
                <a href="{{asset('assets/images/')}}"></a>
            </div>
        </div>
    </nav>


    <div class="bigcontainer">
    <div class="leftpanel">

            <form action="{{route('Depanneur.services')}}" method="get" class="filter flex flex-col items-start gap-1">
            @csrf
            
                <div class="button">
                    <div class="background"></div>
                    <button type="submit" name="Pending"><ion-icon name="timer-outline"></ion-icon> <p>Pending</p></button>
                </div>
                
                <div class="button">
                    <div class="background"></div>
                    <button type="submit" name="On"><ion-icon name="refresh-outline"></ion-icon> <p>On going</p></button>
                </div>

                <div class="button">
                    <div class="background"></div>
                    <button type="submit" name="Payed"><ion-icon name="cash-outline"></ion-icon> <p>Payed</p></button>
                </div>

               </form> 

        
            <form action="" class="updown gap-1 flex flex-col items-start">

            <button type="submit" name="new">Newest</button>
            <button type="submit" name="old">Oldest</button>
</form>
    </div>


    <div class="rightpanel">
   

    @foreach ($appointements as $one)
    <div class="appoitement">
        <div class="profile-appointment" style="background-image: url({{ $one->client->user->image ? 'data:image/png;base64,' . $one->client->user->image->base64 : 'white.jpg' }})"></div>
        <p>{{$one->service_type}}</p>
        <h2>{{ $one->client->user->name }}</h2>
        @if($one->status == 'pending')
        <div class="siren"><ion-icon name="timer-outline"></ion-icon></div>
        @elseif($one->status == 'ongoing')
        <div class="siren"><ion-icon name="refresh-outline"></ion-icon></div>
        @else
        <div class="siren"><ion-icon name="cash-outline"></ion-icon></div>
        @endif
    </div>
@endforeach



    </div>

    </div>

    
  


    </div>



</section>





<script src="https://kit.fontawesome.com/f50c25877b.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>