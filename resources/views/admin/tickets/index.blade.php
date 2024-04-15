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
            <li><a href="{{route('Admin.index')}}" class="flex items-center"><img src="{{asset('assets/images/analys.png')}}" alt="">
            <span>Analytics</span></a>
        </li>

        <li>   
        <a class="flex items-center" href="{{route('index_Customers')}}">
        <img src="{{asset('assets/images/customer.png')}}" alt="">
            <span>Customers</span></a>
        </li>

                <!-- <li><img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Support</span>
    </li> -->

                <li class="active"><img src="{{asset('assets/images/ticket.png')}}" alt="">
                    <span>Tickets</span>
                </li>

                <li>
        <a class="flex items-center" href="{{route('MetierAdmin.index')}}">
        <img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Services</span>
</a>
    </li>

                <li>
                    <a href="{{route('Admin_profile')}}" class="flex items-center">
                    <img src="{{asset('assets/images/setting.png')}}" alt="">
        <span>Profile</span> 
                </a>    
                
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

<div class="topfilter">
<form action="{{ route('filter_tickets') }}" method="post">
@csrf
    <button name="low" class="bg-yellow-500 h-full px-4">Low Priority</button>
    <button name="approved" class="bg-green-500 h-full px-4">Approved</button>
    <button name="high" class="bg-red-700 h-full px-4">High Priority</button>
</form>
    </div>

    <section class="content" style="height: 65%;">

    @foreach($tickets as $one)

<div class="ticket">
    <h3>{{$one->message}}</h3>
    
    @if($one->priority == 'Approved')
    <p id="Approved">{{$one->priority}}</p>
    @elseif($one->priority == 'Low priority')
    <p id="Lowpriority">{{$one->priority}}</p>
    @else
    <p id="Highpriority">{{$one->priority}}</p>
    @endif
</div>


@endforeach


<div class="flex justify-center mt-4">
        {{ $tickets->links() }}
    </div>
    </section>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>