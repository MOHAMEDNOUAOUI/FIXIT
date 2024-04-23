<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/admin/customer/index.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>

<header>
    <nav>
        <img class="logo" src="{{asset('assets/images/logo1.png')}}" alt="">

        <ul>
        <li><a href="{{route('Admin.index')}}" class="flex items-center"><img src="{{asset('assets/images/analys.png')}}" alt="">
            <span>Analytics</span></a>
        </li>

    <li class="active">   
        <a class="flex items-center" href="{{route('index_Customers')}}">
        <img src="{{asset('assets/images/customer.png')}}" alt="">
            <span>Customers</span></a>
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
            <h5 class="active"><a href="{{route('index_Customers')}}">Overview</a></h5>
            <h5><a href="{{route('client_Customers')}}">Clients</a></h5>
            <h5><a href="{{route('depaneur_Customers')}}">Deppaneur</a></h5>
    </div>
</header>



<div class="statscontent">

<div class="flex flex-col gap-1 items-center text-white" style="width: 50%;">
<h1 class="text-2xl">Search for a user</h1>
<input type="text" name="search" id="search">


<div class="wrapper">
    
</div>


</div>

</div>






<script>


document.querySelector('#search').addEventListener('input' , function() {

    document.querySelector('.wrapper').innerHTML = '';
    let username = this.value;
    let xhr = new XMLHttpRequest();


    if(username === ''){
        document.querySelector('.wrapper').innerHTML = '';
        return ;
    }

    xhr.onload = function () {
        if(this.status == 200 && this.readyState == 4){
            let data = JSON.parse(this.responseText);
            document.querySelector('.wrapper').innerHTML = '';
            console.log(data);
            data.forEach(element => {
                let div = document.createElement('div');
                div.classList.add('insider');




            document.querySelector('.wrapper').appendChild(div);
            });

        }
    };


    xhr.open('POST', '{{ route('search.banned') }}');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({ username: username }));
})












</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>   
</body>
</html>