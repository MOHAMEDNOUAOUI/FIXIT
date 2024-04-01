<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/admin/tickets/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Dashboard</title>
</head>
<body>

<header>
    <nav>
        <img class="logo" src="{{asset('assets/images/logo1.png')}}" alt="">

        <ul>
            <li ><img src="{{asset('assets/images/analys.png')}}" alt="">
        <span>Analytics</span>
    </li>

    <li><img src="{{asset('assets/images/customer.png')}}" alt="">
        <span>Customers</span>
    </li>

    <!-- <li><img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Support</span>
    </li> -->

    <li class="active"><img src="{{asset('assets/images/ticket.png')}}" alt="">
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
            <h5 class="active">Overview</h5>
    </div>
</header>



<section class="content">


    <div class="ticket">

        <img src="" alt="profile">

             <div id="inside">

             <div>
             <h3>Can i have an E-copy of the UPD ?</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis culpa velit vel quos, laborum itaque doloribus quibusdam nihil unde</p>
             </div>


             <button>Low Priority</button>
                </div>
    </div>




    
 



</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>