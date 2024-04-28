<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('assets/css/client/home.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
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
<section id="page1" style="height: auto;padding-bottom:3rem">

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

<div class="underheader">
    <p><a href="{{route('support')}}" class="active">Submit a ticket</a> > <a href="{{route('ticketshow')}}">your tikets</a></p>
</div>

<div class="submutticket flex flex-col mt-7">


<div class="insidesubmittext flex flex-col gap-1 justify-center ">
<h1 class="text-3xl text-center">Submit a ticket</h1>
<p>From tech to tilt, we're here to help you! <br>
Submit a Ticket! So long as it doesn't fall through a portal, we'll get back to you soon.</p>
</div>

<h2>Details</h2>
<div class="underline"></div>

<form action="{{ route('ticket.store') }}" method="post" class="mt-2 flex flex-col gap-3">
    @csrf

    <!-- Request Type -->
    <div class="request flex flex-col">
        <label for="request" style="font-size: 0.7rem;">1. CHOOSE A REQUEST TYPE</label>
        <select name="request" id="request">
            <option value="" selected disabled>-</option>
            <option value="Technical Issue">Technical Issue</option>
            <option value="Service Inquiry">Service Inquiry</option>
            <option value="Appointment Booking">Appointment Booking</option>
        </select>
        @error('request')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Subject -->
    <div class="subject flex flex-col">
        <label for="subject" style="font-size: 0.8rem;">Subject</label>
        <input type="text" value="{{ old('subject') }}" name="subject">
        @error('subject')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Message -->
    <div class="message flex flex-col">
        <label for="message" style="font-size: 0.8rem;">Message</label>
        <textarea name="message" id="message" cols="30" rows="1">{{ old('message') }}</textarea>
        @error('message')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

   

    <!-- Submit Button -->
    <button class="mt-7">SUBMIT</button>
</form>




        
    </div>
</section>





<footer>
    <div class="firstpart">
    <h1>FIXIT.</h1>
    </div>

    


   <div class="containerbottom text-white">
        <div class="logos">
            <div class="iconfooter facebook bg-blue-700">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 320 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
          </svg>
            </div>


            <div class="iconfooter X">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 512 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
          </svg>
            </div>


            <div class="iconfooter bg-red-700">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 488 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
          </svg>
            </div>


            <div class="iconfooter bg-purple-700">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 448 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
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
</body>
</html>