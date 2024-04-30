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
<body >



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



@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


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


<main class="servicepage flex justify-center items-center">


    
    <h1 class="text-3xl font-bold" style="text-align:center">A Single <span>Source for</span> Home <span>Repairs and</span> Services: <span>Your Trusted</span> Depanneurs <span>Partner</span></h1>

        
</main>



</section>


<section class="mainservice">


    <div class="maintext flex flex-col justify-center items-center">
        <h1>SERVICES</h1>
        <p>EASIEST AS IT CAN BE TO FIX YOUR PROBLEME</p>
    </div>

    @foreach($metier as $one)

    <div class="item">


    <div class="leftitem">
   @if($one->Metier == "PLUMBERIE")
   <img src="{{asset('assets/images/plumbing.png')}}" alt="">
   @elseif($one->Metier == "VITERIE")
   <img src="{{asset('assets/images/glass.png')}}" alt="">
   @elseif($one->Metier == "ELECTRICITE")
   <img src="{{asset('assets/images/electrical-energy.png')}}" alt="">
   @elseif($one->Metier == 'MENUISERIE')
   <img src="{{asset('assets/images/woodworking.png')}}" alt="">
   @elseif($one->Metier == 'CLIMATISATION')
   <img src="{{asset('assets/images/air-conditioner.png')}}" alt="">
   @else
   <img src="{{asset('assets/images/varnish.png')}}" alt="">
   @endif
    </div>



    <div class="rightitem">
            <h2>{{$one->Metier}}</h2>
 <div class="texto ps-2">
           @foreach($one->sous_metier as $sous)

          
                <div class="flex items-center gap-1">
                    <img style="width: 1.3rem;" src="{{asset('assets/images/checkmark.png')}}" alt="">
                    <p>{{$sous->Services}}</p>
                </div>
        

           @endforeach
</div>
    </div>

    <div class="lastitem flex flex-col">
        <h1>{{count($one->Depanneur)}} : Available</h1>


        <form id="reservationForm" action="{{ route('reservation.store') }}" method="post">
    @csrf
    <button type="button" id="orderButton" name="order" value="{{ $one->id }}">ORDER NOW</button>
</form>


    </div>
</div>


    @endforeach

    <div class="pagination">
    {{ $metier->links() }}
</div>

    

</section>




<script>
    const destroyNotificationUrl = "{{ route('notification.destroy', ['notification' => ':notificationId']) }}";
</script>

<script>

document.querySelectorAll('#orderButton').forEach((element) => {
    element.addEventListener('click', function() {
        console.log(this.value);


        let xhr = new XMLHttpRequest();

        xhr.onload = function () {
            if(this.status === 200 && this.readyState === 4) {
                const response = JSON.parse(this.responseText);



                if (response.success) {
            message = 'Your reservation was successfully submitted!';
            Swal.fire({
  position: "top-end",
  icon: "success",
  title: message,
  showConfirmButton: false,
  timer: 2500
});
        } else {
            Swal.fire({
  position: "top-end",
  icon: "error",
  title: response,
  showConfirmButton: false,
  timer: 2500
});
        }


                
            }
        }

        xhr.open('POST' , '{{ route("reservation.store") }}');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.send('order=' + encodeURIComponent(this.value));
    });
});





</script>

<script src="{{asset('js/notifications.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://kit.fontawesome.com/f50c25877b.js" crossorigin="anonymous"></script>

</body>
</html>