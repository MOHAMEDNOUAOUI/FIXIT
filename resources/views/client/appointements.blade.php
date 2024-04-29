<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/client/home.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />


    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Include Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <title>FixIT</title>
</head>
<body>
    
@if(session('message'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ session('message') }}"
        });
    </script>
@endif


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







    <div class="buttonscroll"></div>
    <div class="bodyover"></div>
    <section id="page1">

        <header>


            <nav>

                <div id="logo">
                    <a href="{{route('HOME')}}"><img src="{{asset ('assets/images/logo1.png')}}" alt=""></a>
                </div>


                <div class="insidediv">

                    <div class="flex items-center">
                        <a class="in" href="{{route('HOME')}}">
                            <h2>HOME</h2>
                        </a>

                        <a class="in" href="{{route('client_services')}}">
                            <h2>SERVICES</h2>
                        </a>

                        <a class="in" href="{{route('client_appointements')}}">
                            <h2>APPOINTEMENTS</h2>
                        </a>


                        <a class="in" href="{{route('support')}}">
                            <h2>SUPPORT</h2>
                        </a>
                    </div>


                    <div class="profileandstuff flex items-center ">

                        <a href="/chatify"><ion-icon class="icon" name="file-tray-full-outline"></ion-icon></a>
                        <ion-icon class="icon" id="notificationtrigger" name="notifications-outline"></ion-icon>

                        <div class="profile">

                        </div>

                    </div>

                </div>


            </nav>









        </header>


       
    <div class="bigcontainer">
  

  <div class="layout Pending">
     <div class="toplayout">
      <p>Pending</p>
     </div>




     <div class="bottomlayout">

     @foreach($appointements as $appointe)

     @if($appointe->status == 'pending')
     

    <div class="appointement pending" data-appointment="{{$appointe->id}}">
      <h2>{{$appointe->depanneur->user->name}}</h2>
      <div>
          <p><i class="fa-regular fa-calendar"></i> {{$appointe->appointment_date}}</p>
          <p>Service : {{$appointe->service_type}}</p>
          <div class="stars">
          @for($i = 1; $i <= $appointe->Stars; $i++)
                <span>&#9733;</span>
            @endfor
          </div>
      </div>
    <div class="appprofile" data-image="{{ isset($appointe->depanneur->user->image->base64) ? $appointe->depanneur->user->image->base64 : '' }}" style="{{ isset($appointe->depanneur->user->image->base64) ? 'background-image: url(data:image/png;base64,'.$appointe->depanneur->user->image->base64.')' : 'background-color: grey;' }}"></div>
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
      <h2>{{$appointe->depanneur->user->name}}</h2>
      <div>
          <p><i class="fa-regular fa-calendar"></i> {{$appointe->appointment_date}}</p>
          <p>Service : {{$appointe->service_type}}</p>
          <div class="stars">
          @for($i = 1; $i <= $appointe->Stars; $i++)
                <span>&#9733;</span>
            @endfor
          </div>
      </div>
    <div class="appprofile" data-image="{{ isset($appointe->depanneur->user->image->base64) ? $appointe->depanneur->user->image->base64 : '' }}" style="{{ isset($appointe->depanneur->user->image->base64) ? 'background-image: url(data:image/png;base64,'.$appointe->depanneur->user->image->base64.')' : 'background-color: grey;' }}"></div>
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
      <h2>{{$appointe->depanneur->user->name}}</h2>
      <div>
          <p><i class="fa-regular fa-calendar"></i> {{$appointe->appointment_date}}</p>
          <p>Service : {{$appointe->service_type}}</p>
          <div class="stars">
          @for($i = 1; $i <= $appointe->Stars; $i++)
                <span>&#9733;</span>
            @endfor
          </div>
      </div>
    <div class="appprofile" data-image="{{ isset($appointe->depanneur->user->image->base64) ? $appointe->depanneur->user->image->base64 : '' }}" style="{{ isset($appointe->depanneur->user->image->base64) ? 'background-image: url(data:image/png;base64,'.$appointe->depanneur->user->image->base64.')' : 'background-color: grey;' }}"></div>
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











<footer>
        <div class="firstpart">
            <h1>FIXIT.</h1>
        </div>




        <div class="containerbottom text-white">
            <div class="logos">
                <div class="iconfooter facebook bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                        <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                    </svg>
                </div>


                <div class="iconfooter X">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                    </svg>
                </div>


                <div class="iconfooter bg-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 488 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                        <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
                    </svg>
                </div>


                <div class="iconfooter bg-purple-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                        <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                    </svg>
                </div>





            </div>
            <p>&copy;2024 Fixit , All right reserved.</p>
        </div>
    </footer>

  


<script>
    const destroyNotificationUrl = "{{ route('notification.destroy', ['notification' => ':notificationId']) }}";

</script>

<script src="{{asset('js/notifications.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://kit.fontawesome.com/f50c25877b.js" crossorigin="anonymous"></script>


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

                console.log(appointe);

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
            <p id="checkmarkholder">Status : ${appointe.status === 'paid' ? ' <ion-icon name="checkmark-outline" class="checkmark"></ion-icon>' : ''}${appointe.status}</p>
            <button><a href="/chatify/${appointe.depanneur.user.id}">Message</a></button>
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

                                    <p>${appointe.depanneur.user.name}</p>
                                    </div>
                                </li>

                                <li>
                                    <h3>Infos</h3>
                                    <div>
                                       <p>${appointe.depanneur.user.email}</p> 
                                       <p>${appointe.depanneur.user.Phone}</p>
                                    </div>
                                    
                                </li>


                                <li id="ratingLi" style="display: ${appointe.status === 'paid' ? 'block' : 'none'}">
                                <h3>Rating</h3>
                                <form id="ratingStars" method="post" action="{{ route('ratingupdate') }}" class="rating">
                                    @csrf
                                    <button name="rating" class="star" value="1" data-rating="1">&#9733;</button>
                                    <button name="rating" class="star" value="2" data-rating="2">&#9733;</button>
                                    <button name="rating" class="star" value="3" data-rating="3">&#9733;</button>
                                    <button name="rating" class="star" value="4" data-rating="4">&#9733;</button>
                                    <button name="rating" class="star" value="5" data-rating="5">&#9733;</button>
                                    <input value="${appointe.id}" name="appointe" type="hidden">
                                </form>
                            </li>
                                
                            </ul>

                    </div>
           </div>
    </div>
                
                
                `;



                const stars = document.querySelectorAll(".star");
    const ratingValue = document.querySelector("#ratingValue");


               

                var map = L.map('map').setView([0, 0], 3); // Initial center and zoom level

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            map.setView([appointe.depanneur.user.location.latitude, appointe.depanneur.user.location.longitude], 13);

            L.marker([appointe.depanneur.user.location.latitude, appointe.depanneur.user.location.longitude]).addTo(map)
                .bindPopup(`${appointe.depanneur.user.name} Location`).openPopup();
               

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