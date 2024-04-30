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

                        <a class="in">
                            <h2>ABOUT US</h2>
                        </a>

                        <a class="in">
                            <h2>CONTACT US</h2>
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


        <main>




        





        </main>
    </section>




    <section id="page4">

        <div class="stats">
            <div class="SS">
                <div class="square"><img src="{{asset('assets/images/speed.png')}}" alt=""></div>
                <div class="texto">
                    <h2>Strict Deadline</h2>
                    <p>Optimal planning with strict deadline</p>
                </div>
            </div>
            <div class="SS">
                <div class="square"></div>
                <div class="texto">
                    <h2>24/7 Service</h2>
                    <p>We are available everytime you wish</p>
                </div>
            </div>
            <div class="SS">
                <div class="square"></div>
                <div class="texto">
                    <h2>Qualified Workers</h2>
                    <p>Our whole workers are too much skilled</p>
                </div>
            </div>
        </div>
    </section>






    <section id="page3">
        <div class="middleofpage3">
            <h1 id="D">Dependable Repair Services</h1>
        </div>

        <img id="drill" src="{{asset('assets/images/drill.png')}}" alt="">
        <img id="cle" src="{{asset('assets/images/cle.png')}}" alt="">
    </section>



    <section id="about" class="flex">

        <div id="top" class="">
            <div></div>
            <h2>FIXIT</h2>
            <i class="fa-solid fa-plus"></i>
        </div>

        <h1>ABOUT US</h1>

        <div class="aboutcontainer">
            <h3>FIX IT</h3>
            <p>Welcome to FIX IT, your ultimate solution for all your repair and maintenance needs! At FIX IT, we understand the frustration that comes with unexpected breakdowns and the hassle of finding reliable help. That's why we've streamlined the process to make it as effortless as possible for you. Simply submit your service request, whether it's for a sudden appliance malfunction, a plumbing emergency, or any other home repair issue, and leave the rest to us. Our dedicated team will swiftly match you with a skilled and trustworthy technician in your area, ensuring prompt and efficient service. With FIX IT, say goodbye to the stress of finding a dependable "dépanneur" – we've got you covered!</p>
        </div>

    </section>







    <div class="inbetween flex justify-between items-center">
        <div class="flex">
            <h1>We Are FIX it</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
        </div>
        <button>REQUEST A SERVICE</button>
    </div>




    <section id="page2">
        <h2>Services</h2>

        <div class="how">
            <div class="works">
                <h1>How It Works</h1>
                <p>IN EASY 3 STEPS</p>
            </div>

            <div class="tutorial">
                <div class="tuto">
                    <div class="insidetuto">
                        <img src="{{asset('assets/images/order-now.png')}}" alt="">
                    </div>
                    <p>1.<span>We take your order from your selection</span> </p>
                </div>
                <div class="tuto">

                    <div class="insidetuto">
                        <img style="width: 30%;" src="{{asset('assets/images/mechanic.png')}}" alt="">
                    </div>
                    <p>2.<span>We find a depanneur closer to you</span></p>
                </div>
                <div class="tuto">
                    <div class="insidetuto">
                        <img src="{{asset('assets/images/fast-delivery.png')}}" alt="">
                    </div>

                    <p>3.<span>We make sure he contacts you , and its done</span></p>
                </div>
            </div>
        </div>


        <div class="services">
            <div class="TT plombier col-1">Plomberie</div>
            <div class="TT Viterie col-1">Viterie</div>
            <div class="TT Electricité col-1">Electricité</div>
            <div class="TT Menuiserie col-1">Menuiserie</div>
            <div class="TT Climatisation col-1">Climatisation</div>
            <div class="TT Peinture col-1">Peinture</div>
            <div class="TT Maconnerie col-1">Maconnerie</div>
            <div class="TT  col-1"></div>
            <div class="TT  col-1"></div>
        </div>



        <a href="{{route('client_services')}}"><img class="arrow-down" src="{{asset('assets/images/down-arrows.png')}}" alt=""></a>


    </section>



    <section id="page5">
        <h2>MAPS</h2>

        <div class="containermap">
            <div class="CC">


                <div id="map" class="w-full h-full" style="position: relative;z-index:4000"></div>

            </div>


        </div>
    </section>













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

    <script>
        var map = L.map('map').setView([0, 0], 3); // Initial center and zoom level

        // Add OpenStreetMap base layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const watchId = navigator.geolocation.watchPosition(
            position => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                map.setView([latitude, longitude], 13);
                addMarker(latitude, longitude, "Your");
                sendLocationToServer(latitude, longitude);
            },
            error => {
                console.error("Error getting geolocation:", error);
            }
        );



        function addMarker(latitude, longitude, user) {
            L.marker([latitude, longitude]).addTo(map)
                .bindPopup(`${user} Location`).openPopup();
        }






        function sendLocationToServer(latitude, longitude) {
            var xhr = new XMLHttpRequest();

            xhr.onload = function() {
                if (this.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    console.log(data);

                    const closestDepanneurs = data.closest_depanneurs;

                    closestDepanneurs.forEach(depanneur => {
                        const marker = addMarker(depanneur.latitude, depanneur.longitude, depanneur.name);
                    });
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

            var data = JSON.stringify({
                latitude: latitude,
                longitude: longitude
            });
            xhr.send(data);
        }



        document.querySelector('.buttonscroll').addEventListener('click' , function() {
            document.querySelector('#page1').scrollIntoView({
                behavior:"smooth"
            })
        })
    </script>

    <script src="{{asset('js/notifications.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/f50c25877b.js" crossorigin="anonymous"></script>
</body>

</html>