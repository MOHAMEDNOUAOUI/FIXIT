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
<li><a href="{{route('Depanneur.index')}}"><i class="icon   fa fa-pie-chart  text-xl"></i></a></li>
    <li><a href="{{ route('Depanneur.services')}}"><ion-icon class="icon active   text-xl" name="calendar-outline"></ion-icon></a></li>
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
            <i id="notificationtrigger" class="noti fa-regular text-xl fa-bell">
                
            </i>
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


    <div class="bigcontainer">
  

    <div class="layout Pending">
       <div class="toplayout">
        <p>Pending</p>
       </div>




       <div class="bottomlayout">

       @foreach($appointements as $appointe)

       @if($appointe->status == 'pending')
       

      <div class="appointement pending" data-appointment="{{$appointe->id}}">
        <h2>{{$appointe->client->user->name}}</h2>
        <div>
            <p><i class="fa-regular fa-calendar"></i> {{$appointe->appointment_date}}</p>
            <p>Service : {{$appointe->service_type}}</p>
        </div>
      <div class="appprofile" data-image="{{ isset($appointe->client->user->image->base64) ? $appointe->client->user->image->base64 : '' }}" style="{{ isset($appointe->client->user->image->base64) ? 'background-image: url(data:image/png;base64,'.$appointe->client->user->image->base64.')' : 'background-color: grey;' }}"></div>
      </div>

       @endif

       @endforeach
            
       </div>
    </div>



    <!---------------- ongoing ------------------>

     <div class="layout Ongoing">
       <div class="toplayout">
        <p>On going</p>
       </div>



       
       <div class="bottomlayout">

       @foreach($appointements as $appointe)

       @if($appointe->status == 'ongoing')
       

      <div class="appointement ongoing" data-appointment="{{$appointe->id}}">
        <h2>{{$appointe->client->user->name}}</h2>
        <div>
            <p><i class="fa-regular fa-calendar"></i> {{$appointe->appointment_date}}</p>
            <p>Service : {{$appointe->service_type}}</p>
        </div>
      <div class="appprofile" data-image="{{ isset($appointe->client->user->image->base64) ? $appointe->client->user->image->base64 : '' }}" style="{{ isset($appointe->client->user->image->base64) ? 'background-image: url(data:image/png;base64,'.$appointe->client->user->image->base64.')' : 'background-color: grey;' }}"></div>
      </div>

       @endif

       @endforeach
            
       </div>
    </div>




    <!---------------- paid ------------------>

    <div class="layout Paid">
       <div class="toplayout">
        <p>Paid</p>
       </div>



       
       <div class="bottomlayout">

       @foreach($appointements as $appointe)

       @if($appointe->status == 'paid')
       

      <div class="appointement paid" data-appointment="{{$appointe->id}}">
        <h2>{{$appointe->client->user->name}}</h2>
        <div>
            <p><i class="fa-regular fa-calendar"></i> {{$appointe->appointment_date}}</p>
            <p>Service : {{$appointe->service_type}}</p>
        </div>
      <div class="appprofile" data-image="{{ isset($appointe->client->user->image->base64) ? $appointe->client->user->image->base64 : '' }}" style="{{ isset($appointe->client->user->image->base64) ? 'background-image: url(data:image/png;base64,'.$appointe->client->user->image->base64.')' : 'background-color: grey;' }}"></div>
      </div>

       @endif

       @endforeach
            
       </div>
    </div>


   

    </div>

    

</section>









<div class="modalcustome">


<div class="insidemodal">




</div>

</div>















<script src="https://kit.fontawesome.com/f50c25877b.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>






<script>
    const destroyNotificationUrl = "{{ route('notification.destroy', ['notification' => ':notificationId']) }}";
</script>


<script src="{{asset('js/notifications.js')}}"></script>

<script>


document.querySelectorAll('.appointement').forEach((element) => {
    element.addEventListener('click', function() {
        document.querySelector('.modalcustome').style.display = "flex";
        const appointmentid = this.getAttribute('data-appointment');


        let image = this.querySelector('.appprofile').getAttribute('data-image');

        console.log(appointmentid);


       



        let xhr = new XMLHttpRequest();

        xhr.onload = function() {
            if (this.status == 200 && this.readyState == 4) {
                let appointe = JSON.parse(this.responseText);

                

                let status = ['pending' , 'ongoing' , 'paid'];
              

                document.querySelector('.insidemodal').innerHTML = `
                
                
                <i id="close"   class="fa-solid fa-xmark"></i>


    <div id="lefttemplate">
        <div id="topleft">
            <h1>Reservation</h1>

            <div class="buttons">
                <button>${appointe.service_type}</button>
                <button>ID:${appointe.id}</button>
            </div>

            <ul>
                <li class="flex">
                    <h2>Date</h2>
                    <p>${appointe.appointment_date}</p>
                </li>
            </ul>
        </div>

        <div id="mapleft">
        <div id="map" class="w-full h-full" style="position: relative;z-index:4000"></div>
        </div>
    </div>












    <div id="righttemplate">
           <div class="topright">
           <form id="reservationForm" action="{{ route('statusupdate') }}" method="post">
           @csrf
           ${
                appointe.status !== 'paid' ? 
                `
                <select name="status" id="status" onchange="submit()">
                    ${status.map(element => `
                        <option value="${element}" ${element === appointe.status ? 'selected' : ''}>${element}</option>
                    `).join('')}
                </select>
                ` : ''
            }
            <input type="hidden" value="${appointe.id}" name="id">
            </form>
            <p id="checkmarkholder">${appointe.status === 'paid' ? ' <ion-icon name="checkmark-outline" class="checkmark"></ion-icon>' : ''}${appointe.status}</p>
            <button><a href="/chatify/${appointe.client.user.id}">Message</a></button>
           </div>


           <div class="bottomright">
                    <div id="topbottom">
                        Details
                    </div>

                    <div id="bottomright">
                            <ul>
                                <li>
                                    <h3>Responsble</h3>
                                    <div class="flex gap-2">

                                    <div class="appprofiletop" style="${image ? 'background-image: url(data:image/png;base64,' + image + ');' : 'background-color: grey;'}"></div>

                                    <p>${appointe.client.user.name}</p>
                                    </div>
                                </li>

                                <li>
                                    <h3>Infos</h3>
                                    <div>
                                       <p>${appointe.client.user.email}</p> 
                                       <p>${appointe.client.user.Phone}</p>
                                    </div>
                                    
                                </li>

                                
                            </ul>
                    </div>
           </div>
    </div>
                
                
                `;


               

                var map = L.map('map').setView([0, 0], 3); // Initial center and zoom level

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            map.setView([appointe.client.user.location.latitude, appointe.client.user.location.longitude], 13);

            L.marker([appointe.client.user.location.latitude, appointe.client.user.location.longitude]).addTo(map)
                .bindPopup(`${appointe.client.user.name} Location`).openPopup();
               

            }
        };




        
        xhr.open('POST', '/reservation/filter');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        xhr.send("id="+appointmentid);
    });
});

    function submit() {
        document.querySelector('#reservationForm').submit();
    }



document.addEventListener('click', function (event) {
        if (event.target.closest('#close')) {
            document.querySelector('.modalcustome').style.display = "none";
        }
    });

    
    function closenotif() {
        document.querySelector('.notificationcontainer').style.display = "none";
    }

    document.querySelector('#noti').addEventListener('click' , function() {
        document.querySelector('.notificationcontainer').style.display = "block";
    })


</script>
</body>
</html>