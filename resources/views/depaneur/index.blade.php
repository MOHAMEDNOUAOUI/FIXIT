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
            <li><a href="{{route('Depanneur.index')}}"><i class="icon active  fa fa-pie-chart  text-xl"></i></a></li>
            <li><a href="{{ route('Depanneur.services')}}"><ion-icon class="icon text-xl" name="calendar-outline"></ion-icon></a></li>
            <li><a href="{{ route('Depanneur.Rating')}}"><ion-icon name="star-half-outline" class="icon text-xl"></ion-icon></a></li>
        </ul>


        <a href="{{ route('logout')}}"><i class='bx bx-log-out icon text-2xl'></i></a>

    </section>


    <section id="main">
        <nav class="flex items-center justify-between">
            <h2>Good Morning {{$userinfo->name}}</h2>
            <div class="rightnav flex items-center gap-3">
                <form action="{{route('available')}}" method="post">
                    @csrf
                    @if($userinfo->depanneur->status == 'Available')
                    <button type="submit" name="available" id="online" class="bg-green-700"></button>
                    @else
                    <button type="submit" name="notavailable" id="online" class="bg-red-700"></button>
                    @endif
                </form>
                <i class="fa-regular text-2xl fa-bell"></i>
                <i class='bx bx-message-square-dots text-2xl'></i>


                @if($userinfo->image)
                <div class="profile" style="background-image: url(data:image/png;base64,{{ $userinfo->image->base64 }})">
                    <a href="{{asset('assets/images/')}}"></a>
                </div>
                @else
                <div class="profile" style="background-color:red">
                    <a href="{{asset('assets/images/')}}"></a>
                </div>
                @endif

                
            </div>
        </nav>


        <div class="stats">
            <div class="statsholdercontainer">
                <div class="statsholder">
                    <div class="flex flex-col gap-1">
                        <p>Clients</p>
                        <h2 class="text-3xl font-bold">{{$ClientCount}}</h2>
                    </div>
                    <img src="{{asset('assets/images/client.png')}}" alt="">
                </div>

                <div class="statsholder">
                    <div class="flex flex-col gap-1">
                        <p>Appointements</p>
                        <h2 class="text-3xl font-bold">+10</h2>
                    </div>
                    <img src="{{asset('assets/images/rendes.png')}}" alt="">
                </div>

                <div class="statsholder">
                    <div class="flex flex-col gap-1">
                        <p>Your Tickets</p>
                        <h2 class="text-3xl font-bold">{{$TicketsCount}}</h2>
                    </div>
                    <img src="{{asset('assets/images/facture.png')}}" alt="">
                </div>
            </div>
        </div>


        <div class="under">
            <div class="map"></div>
        </div>
    </section>





    <script src="https://kit.fontawesome.com/f50c25877b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>



    <script>
        const watchId = navigator.geolocation.watchPosition(
            position => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                sendLocationToServer(latitude, longitude);
            },
            error => {
                console.error("Error getting geolocation:", error);
            }
        );

        function sendLocationToServer(latitude, longitude) {
    var xhr = new XMLHttpRequest();

    xhr.onload = function() {
        if (this.status === 200) {
            console.log(this.responseText);
        } else {
            console.error('Failed to send location data:', this.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Error sending location data:', this.statusText);
    };

    xhr.open('POST', '/locations', true); 
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); 

    var data = JSON.stringify({ latitude: latitude, longitude: longitude });
    xhr.send(data);
}



</script>
</body>

</html>