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



    <div class="searchingfilter">
    <input type="text" placeholder="SEARCH REQUEST" id="search">

    <form id="filterForm" action="{{route('ticketshowadmin')}}" method="get">
            <select name="filter" id="filterticket">
                <option value="" disabled selected>-</option>
                <option value="Awaiting">awaiting</option>
                <option value="Open">open</option>
                <option value="Solved">solved</option>
            </select>
    </form>
</div>

    <section class="content flex flex-col justify-between items-center" style="height: 63%;">

    <div class="relative overflow-x-auto" style="width: 100%">
    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    SUBJECT
                </th>
                <th scope="col" class="px-6 py-3">
                    TICKETID
                </th>
                <th scope="col" class="px-6 py-3">
                    LAST UPDATED
                </th>
                <th scope="col" class="px-6 py-3">
                    STATUS
                </th>
            </tr>
        </thead>
        <tbody>
            
           @foreach($tickets as $ticket)

           <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white">
                    <a href="{{route('ticketpage' , $ticket->id)}}">{{$ticket->Subject}}</a>
                </th>
                <td class="px-6 py-4 text-white">
                    {{$ticket->id}}
                </td>
                <td class="px-6 py-4 text-white">
                {{$ticket->created_at_parsed}}
                </td>
                <td class="px-6 py-4 text-white">
                    {{$ticket->priority}}
                </td>
            </tr>

           @endforeach
           
        </tbody>
    </table>
</div>




<div class="pagination mt-5">
{{ $tickets->links() }}
</div>

    </section>

    
    





    
<script>


var container = document.querySelector('tbody');

let backup = container.innerHTML;


document.getElementById('filterticket').addEventListener('change', function() {
        document.getElementById('filterForm').submit();
    });



    document.querySelector('#search').addEventListener('input' , function() {
        
        Fetchsearch(this.value);

    })


    function Fetchsearch(search , page = 1) {

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                var response = JSON.parse(this.responseText);
                
                if(search == '') {
                    container.innerHTML = backup;
                } 
                else {
                    displayTickets(response.data); 
                }

                // displayPagination(response);
            }
        };
        

        var url = "/ticketsearchadmin?page=" + page;
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        var requestData = JSON.stringify({ search: search });
        xhr.send(requestData);

    }


    function  displayTickets(tickets) {
    
        container.innerHTML = '';
        
            tickets.forEach(ticket => {
                let tr = document.createElement('tr');
                tr.classList.add('border-b', 'dark:bg-gray-800', 'dark:border-gray-700');
                tr.innerHTML = `
                
                <th scope="row" class="text-white px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="/ticket/${ticket.id}">${ticket.Subject}</a>
                </th>
                <td class="px-6 py-4 text-white">
                ${ticket.id}
                </td>
                <td class="px-6 py-4 text-white">
                ${ticket.created_at_parsed}
                </td>
                <td class="px-6 py-4 text-white">
                ${ticket.priority}
                </td>
                
                `

                container.appendChild(tr);
            });


            
    }







</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>