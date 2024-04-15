<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/admin/dashboard.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Dashboard</title>
</head>
<body>

<header>
    <nav>
        <img class="logo" src="{{asset('assets/images/logo1.png')}}" alt="">

        <ul>
        <li class="active"><a href="{{route('Admin.index')}}" class="flex items-center"><img src="{{asset('assets/images/analys.png')}}" alt="">
            <span>Analytics</span></a>
        </li>

        <li><a class="flex items-center" href="{{route('index_Customers')}}">
        <img src="{{asset('assets/images/customer.png')}}" alt="">
            <span>Customers</span></a>
        </li>
    </li>

    <!-- <li><img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Support</span>
    </li> -->

    <li><img src="{{asset('assets/images/ticket.png')}}" alt="">
        <span>Tickets</span>
    </li>

    <li>
        <a class="flex items-center" href="{{route('MetierAdmin.index')}}">
        <img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Services</span>
</a>
    </li>

    <li><img src="{{asset('assets/images/setting.png')}}" alt="">
        <span>Profile</span>
    </li>
        </ul>


        <div>
        <ion-icon class="bell" name="notifications-outline"></ion-icon>
        <ion-icon class="profile" name="person-circle-outline"></ion-icon>
        </div>
    </nav>
    <div class="bottom">
    <h5 ><a href="{{route('Admin.index')}}">Overview</a></h5>
            <h5 class="active"><a href="{{ route('index_Subscription')}}">Subscriptions</a></h5>
    </div>
</header>




<section id="main">


<div id="inside">
<div>
<h3>Customers</h3>
<p>The list has <span>{{$Subscriptions['Users']}}</span> User,<span>{{$Subscriptions['Depanneurs']}}</span> of them are Deppaneur</p>
</div>

<a href="{{route('index_Customers')}}">View List</a>
</div>



<div class="graph">


    <div class="circle">

    </div>



    <div class="services">
        <div id="D">
            <h3>Services</h3>
            <p>Your Deppaneur list, is organized by your services</p>
        </div>



        <div id="B">

        @foreach($metiers as $one)

        <div>
            <h3>{{$one->depanneur_count}}</h3>
            <h3>{{$one->Metier}}</h3>
        </div>

        @endforeach

        


        </div>
    </div>
    

</div>



</section>
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>