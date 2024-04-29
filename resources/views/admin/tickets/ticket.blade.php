<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/admin/tickets/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Dashboard</title>
</head>

<body>

    <header>
        <nav>
            <img class="logo" src="{{asset('assets/images/logo1.png')}}" alt="">

            <ul>
                <li><a href="{{route('Admin.index')}}" class="flex items-center"><img src="{{asset('assets/images/analys.png')}}" alt="">
                        <span>Analytics</span></a>
                </li>

                <li>
        <a href="{{route('client_Customers')}}" class="flex items-center">
        <img src="{{asset('assets/images/customer.png')}}" alt="">
        <span>Customers</span>
    </a>
       
    </li>

                <!-- <li><img src="{{asset('assets/images/info.png')}}" alt="">
        <span>Support</span>
    </li> -->

    <li>
        <a class="active flex items-center" href="{{route('TicketsAdmin.index')}}">
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
            <h5 class="active">Overview</h5>
        </div>
    </header>



    <section class="content flex flex-col justify-between items-center" style="height: auto;">


        <div class="ticketholder">


            <div class="sidepanel">

                <div class="id">
                    <p>TICKET ID</p>
                    <h2>{{$ticket->id}}</h2>
                </div>

                <div class="created">
                    <p>CREATED</p>
                    <h2>{{$ticket->created_at}}</h2>
                </div>

                <div class="parsed">
                    <p>LAST ACTIVITY</p>
                    <h2>{{$ticket->created_at}}</h2>
                </div>

                <div class="status">
                    <p>STATUS</p>
                    <h2>{{$ticket->priority}}</h2>
                </div>


            </div>

            <div class="containerticket">

                <a href="{{route('ticketshow')}}">
                    < SEE ALL TICKETS</a>
                        <h2>{{$ticket->Subject}}</h2>
                        <div class="messageholder">
                            <p class="message">{{$ticket->Message}}</p>
                            <hr>
                        </div>


                        @foreach($ticket->answer as $answer)



                        <div class="answerholder flex flex-col gap-3 mt-4">

                            <div class="replyer items-center">
                                @if($answer->user->image)
                                <img class="cirle" src="data:image/jpeg;base64,{{$answer->user->image->base64}}" alt="">
                                @else
                                <div class="cirle"></div>
                                @endif

                                <div class="infos">
                                    <h3>{{$answer->user->name}}</h3>
                                    <p>{{$answer->created_at_parsed}}</p>
                                </div>
                            </div>

                            <pre>{{$answer->answer}}</pre>
                            <hr>
                        </div>


                        @endforeach




                        <form action="{{ route('ticketanswer.store')}}" method="POST" class="flex flex-col">
                            @csrf
                            <textarea type="text" name="answer" placeholder="Write a message"></textarea>
                            <input type="hidden" name="ticketid" value="{{$ticket->id}}">
                            <button type="submit">SUBMIT</button>
                        </form>



            </div>

        </div>



    </section>










    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>