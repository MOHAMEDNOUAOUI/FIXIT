<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset ('assets/css/depaneur/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Include Leaflet CSS -->
 <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Include Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    

</head>

<body>



<div class="notificationcontainer">
        <div class="topnot">
            <!-- <i id="closenotification" onclick="closenotif()"   class="fa-solid fa-xmark"></i> -->
            <h1>Notification<span>{{count($notifications)}}</span></h1>
        </div>

        <div class="restofit">

        @foreach($notifications as $notification)

        <div class="notification">
                <div class="leftnot">
                    <div class="prof"  style="{{ isset($notification->sendernot->image->base64) ? 'background-image: url(data:image/png;base64,'.$notification->sendernot->image->base64.')' : 'background-color: grey;' }}"></div>
                </div>
                <div class="rightnot flex">
                    <div>
                    <p>{{$notification->message}}</p>
                    <h2>time</h2>
                    </div>
                    
                    <h3 id="x" data-id="{{$notification->id}}">x</h3>
                </div>
            </div>


        @endforeach

            

        </div>
    </div>


    <section id="sidebar">
        <!-- LOGO -->

        <a href="">
            <img style="width: 5rem;height:5rem" src="{{asset ('assets/images/logo3.png')}}" alt="">
        </a>


        <ul class="flex flex-col gap-3 items-center">
            <li><a href="{{route('Depanneur.index')}}"><i class="icon active  fa fa-pie-chart  text-xl"></i></a></li>
            <li><a href="{{ route('Depanneur.services')}}"><ion-icon class="icon text-xl" name="calendar-outline"></ion-icon></a></li>
        </ul>


        <a href="{{ route('logout')}}"><i class='bx bx-log-out icon text-2xl'></i></a>

    </section>


    <section id="main">
        <nav class="flex items-center justify-between">
            <h2>Good Morning {{$userinfo->name}}</h2>
            <div class="rightnav flex items-center gap-3">


                <form action="{{route('available')}}" method="post">
                    @csrf
                    @if($userinfo->depanneur->status == 'notavailable')
                    <button type="submit" name="notavailable" id="online" class="online bg-red-700">
                    <div class="dot"></div>
                    </button>
                    @else
                    <button type="submit" name="available" id="online" class="offline bg-green-700">
                    <div class="dot"></div>
                    </button>
                    @endif
                </form>


                
                

                <i id="notificationtrigger" class="noti fa-regular text-xl fa-bell"></i>
                
             <a href="/chatify"><i class='bx bx-message-square-dots text-xl'></i></a>


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
                        <h2 class="text-3xl font-bold">{{$servicecount}}</h2>
                    </div>
                    <img src="{{asset('assets/images/rendes.png')}}" alt="">
                </div>

                <div class="statsholder">
                    <div class="flex flex-col gap-1">
                        <p>Raters</p>
                        <h2 class="text-3xl font-bold">{{$RatingsCount}}</h2>
                    </div>
                    <img src="{{asset('assets/images/facture.png')}}" alt="">
                </div>
            </div>
        </div>


        <div class="under">
        <div id="map" class="w-full h-full" style="position: relative;z-index:4000"></div>
        </div>
    </section>









    
    <script>
    const destroyNotificationUrl = "{{ route('notification.destroy', ['notification' => ':notificationId']) }}";
</script>

    <script src="{{asset('js/notifications.js')}}"></script>

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

                var map = L.map('map').setView([0, 0], 3); // Initial center and zoom level

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            map.setView([latitude,longitude], 13);

            L.marker([latitude, longitude]).addTo(map)
                .bindPopup(`Your Location`).openPopup();
               

            
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