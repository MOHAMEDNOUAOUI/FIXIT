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
            <li class="active"><img src="{{asset('assets/images/analys.png')}}" alt="">
        <span>Analytics</span>
    </li>

    <li><img src="{{asset('assets/images/customer.png')}}" alt="">
        <span>Customers</span>
    </li>

    <!-- <li><img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Support</span>
    </li> -->

    <li><img src="{{asset('assets/images/ticket.png')}}" alt="">
        <span>Tickets</span>
    </li>

    <li><img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Services</span>
    </li>

    <li><img src="{{asset('assets/images/setting.png')}}" alt="">
        <span>Settings</span>
    </li>
        </ul>


        <div>
        <ion-icon class="bell" name="notifications-outline"></ion-icon>
        <ion-icon class="profile" name="person-circle-outline"></ion-icon>
        </div>
    </nav>
    <div class="bottom">
            <h5>Overview</h5>
            <h5 class="active">Subscription</h5>
    </div>
</header>




<section id="main">


<div id="inside">
<div>
<h3>Customers</h3>
<p>The list has <span>20,000</span> Client,<span>1400</span> of them are Deppaneur</p>
</div>

<a href="">View List</a>
</div>



<div class="graph">


    <div class="circle">
        <h3>Revenue</h3>


        <div>
            
        </div>
    </div>



    <div class="services">
        <div id="D">
            <h3>Services</h3>
            <p>Your Deppaneur list, is organized by your services</p>
        </div>



        <div id="B">

        <div>
            <h3>100</h3>
            <h3>Specialite</h3>
        </div>
        <div>
            <h3>100</h3>
            <h3>Specialite</h3>
        </div>
        <div>
            <h3>100</h3>
            <h3>Specialite</h3>
        </div>
        <div>
            <h3>100</h3>
            <h3>Specialite</h3>
        </div>


        </div>
    </div>
    <div class="ocupied"></div>

    <div class="lasted"></div>
</div>



</section>
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>