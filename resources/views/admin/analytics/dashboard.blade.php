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

    <li><a class="flex items-center" href="{{route('client_Customers')}}">
        <img src="{{asset('assets/images/customer.png')}}" alt="">
            <span>Customers</span></a>
        </li>
    </li>

    <!-- <li><img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Support</span>
    </li> -->

    <li>
    <a class="flex items-center" href="{{route('TicketsAdmin.index')}}"> <img src="{{asset('assets/images/ticket.png')}}" alt="">
        <span>Tickets</span></a>    
   
   
    </li>

    <li>
        <a class="flex items-center" href="{{route('MetierAdmin.index')}}">
        <img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Services</span>
</a>
    </li>


        </ul>


        <div>
        <ion-icon class="bell" name="notifications-outline"></ion-icon>
        <ion-icon class="profile" name="person-circle-outline"></ion-icon>
        </div>
    </nav>
    <div class="bottom">
            <h5 class="active"><a href="{{route('Admin.index')}}">Overview</a></h5>
            <h5><a href="{{ route('index_Subscription')}}">Subscriptions</a></h5>
    </div>
</header>




<section id="main">
    <div class="stats">
        <div class="first">
            <h3>Total Users</h3>
            <h4>{{$CountUsers['Users']}}</h3>
        </div>
        <div class="second">
            <h3>Metiers</h3>
            <h4>{{$CountUsers['Metiers']}}</h3>
        </div>
        <div class="third">
            <h3>Clients</h3>
            <h4>{{$CountUsers['Clients']}}</h3>
        </div>
        <div class="first">
            <h3>Total Tickets</h3>
            <h4>{{$CountUsers['Tickets']}}</h3>
        </div>
        <div class="second">
            <h3>Depanneurs</h3>
            <h4>{{$CountUsers['Depanneurs']}}</h3>
        </div>
    </div>



    <div class="middle">

        <div id="left">


        </div>

        <div id="right">

        
<div inline-datepicker data-date="03/21/2024"></div>


        </div>

    </div>

</section>
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>