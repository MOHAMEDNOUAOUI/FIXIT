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
                <li><img src="{{asset('assets/images/analys.png')}}" alt="">
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

                <li class="active"><img src="{{asset('assets/images/setting.png')}}" alt="">
        <span>Profile</span>
    </li>
            </ul>


            <div>
                <ion-icon class="bell" name="notifications-outline"></ion-icon>
                <ion-icon class="profile" name="person-circle-outline"></ion-icon>
            </div>
        </nav>
    </header>



    <section class="full">

    <div class="profileleft">
        
    <div class="circle" style="background-image: url(data:image/png;base64,{{ $user->user->image->base64 }})">
    <!-- Content goes here -->
</div>



        <div class="flex flex-col justify-center items-center">
        <h2>{{$user->user->name}}</h2>
        <p>Admin</p>
        </div>
    </div>
        
 <form action="{{ route('update_profile') }}" method="post" class="profileright">
    @csrf
 <div class="name">
            <div class="firstplace flex items-center ps-2">
                Full Name
            </div>
            <div class="secondplace ps-3">
                <input type="text" name="name" id="" value="{{$user->user->name}}">
            </div>
        </div>


        <div class="name">
            <div class="firstplace flex items-center ps-2">
                Email
            </div>
            <div class="secondplace ps-3">
                <input type="email" name="email" id="" value="{{$user->user->email}}">
            </div>
        </div>

        <div class="name">
            <div class="firstplace flex items-center ps-2">
                Phone
            </div>
            <div class="secondplace ps-3">
                <input type="text" name="phone" id="" value="{{$user->user->Phone}}">
            </div>
        </div>


        <div class="name">
            <div class="firstplace flex items-center ps-2">
                Address
            </div>
            <div class="secondplace ps-3">
                <input type="email" name="location" id="" value="{{$user->user->location}}">
            </div>
        </div>


        <button type="submit" class="flex justify-end bg-blue-700 px-3 py-2" style="width: fit-content;color:white">Save Changes</button>
 </form>
        

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>