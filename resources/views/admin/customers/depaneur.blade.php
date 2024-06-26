<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <li class="active"><img src="{{asset('assets/images/customer.png')}}" alt="">
        <span>Customers</span>
    </li>

    <!-- <li><img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Support</span>
    </li> -->

    <li>
        <a class="flex items-center" href="{{route('TicketsAdmin.index')}}">
        <img src="{{asset('assets/images/ticket.png')}}"  alt="">
        <span>Tickets</span>
    </a>

    <li>
        <a class="flex items-center" href="{{route('MetierAdmin.index')}}">
        <img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Services</span>
</a>
    </li>


        </ul>


        <div>
        <ion-icon class="bell" name="notifications-outline"></ion-icon>
        <ion-icon class="profile" name="person-circle-outline"></ion-icon>
        </div>
    </nav>
    <div class="bottom">
            <h5><a href="{{route('client_Customers')}}">Clients</a></h5>
            <h5 class="active"><a href="{{route('depaneur_Customers')}}">Deppaneur</a></h5>
    </div>
</header>



<div class="content">
    

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left ">
        <thead class="text-xs uppercase ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Metier
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
            </tr>
        </thead>
        <tbody>


        @foreach($depanneurs as $one)
        <tr class="userbag">
                    <td class="px-6 py-2">
                            <div class="profilepic" style="background-position:center;background-size:cover;{{ isset($one->user->image->base64) ? 'background-image: url(data:image/png;base64,'.$one->user->image->base64.')' : 'background-color: grey;' }}">
                                
                            </div>
                        </td>
                        <td class="px-6 py-2 text-white">
                            {{$one->user->name}}
                        </td>
                        <td class="px-6 py-2 text-white">
                        {{$one->user->email}}
                        </td>
                        <td class="px-6 py-2 text-white">
                                
                                @foreach ($one->metiers as $metier) 
                                    @if($metier->Metier != null)
                                    {{$metier->Metier}}
                                    @else
                                    Sans Metier
                                    @endif
                                @endforeach
        
                        </td>
                        <td class="px-6 py-2 text-white">
                            {{$one->user->Phone}}
                        </td>
            </tr>

        @endforeach
            
    
        </tbody>
    </table>
</div>

</div>
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>