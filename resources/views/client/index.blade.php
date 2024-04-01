<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/client/home.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>FixIT</title>
</head>
<body>
<div class="buttonscroll"></div>
<div class="bodyover"></div>
<section id="page1">

<header>
    <div class="topheader">
        <div class="topleft">
        <ion-icon id="call" name="call-outline"></ion-icon>
        <p>123-456-7890 / Sales & Service Support</p>
        </div>



        <a href="">My Account</a>

    </div>


    <nav>

    <div id="logo">
        <img src="{{asset ('assets/images/logo1.png')}}" alt="">
        <h1>FIXIT</h1>
    </div>


    <div>
        <ul>
            <li>Services</li>
            <li>All Deppaneur</li>
            <li>About us</li>
            <li>Contact Us</li>
            <li><ion-icon class="icon" name="file-tray-full-outline"></ion-icon></li>
            <li><ion-icon class="icon" name="notifications-outline"></ion-icon></li>
        </ul>
    </div>

    </nav>




   




</header> 


<main>


<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden md:h-96">
         <!-- Item 1 -->
        <div class="hidden relative duration-700 ease-in-out" data-carousel-item>
            <div class="overlay"></div>
            <img src="{{asset('assets/images/einhell-diy-tools-drillers-content-power.jpg')}}" class="absolute img block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
           <div class="absolute text">
           <h1 class="">FIXIT</h1>
            <p class="">Best platform for you to come</p>
           </div>
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <div class="overlay"></div>
            <img src="{{asset('assets/images/left.jpg')}}" class="absolute img block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <div class="overlay"></div>
            <img  src="{{asset('assets/images/carrepair.jpeg')}}" class="absolute img block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>

    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

    


        
    </main>
</section>








<section id="page3">
    <div class="middleofpage3">
    <h1 id="D">Dependable Repair Services</h1>
    </div>

    <img id="drill" src="{{asset('assets/images/drill.png')}}" alt="">
    <img id="cle" src="{{asset('assets/images/cle.png')}}" alt="">
</section>



<section id="page2">
<h2>Services</h2>
<div class="services">
    <div class="plombier col-1">Plomberie</div>
    <div class="plombier col-1">Viterie</div>
    <div class="plombier col-1">Electricité</div>
    <div class="plombier col-1">Chauffage</div>
    <div class="plombier col-1">Climatisation</div>
    <div class="Peinture col-1">Peinture</div>
    <div class="plombier col-1">Maconnerie</div>
</div>

</section>  













<footer>
    <div>
    <div id="logo">
        <img src="{{asset ('assets/images/logo1.png')}}" alt="">
        <h1>FIXIT</h1>
    </div>
    </div>
    <div></div>
    <div></div>
    <div></div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://kit.fontawesome.com/f50c25877b.js" crossorigin="anonymous"></script>
</body>
</html>