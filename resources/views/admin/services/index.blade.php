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


    @if(Session::has('success'))
    <div class="alert">
        {{ Session::get('success') }}
    </div>
@endif

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
        <a class="flex items-center" href="{{route('TicketsAdmin.index')}}">
        <img src="{{asset('assets/images/ticket.png')}}"  alt="">
        <span>Tickets</span>
    </a>

        <li class="active">
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
                <h5 class="active"><a href="{{route('MetierAdmin.index')}}">Overview</a></h5>
                <h5><a href="{{route('admin.services.add')}}">Add Services</a></h5>
        </div>
    </header>



    <div class="content">
        

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Metier
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deppaneurs
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Options
                    </th>
                </tr>
            </thead>
            <tbody>
            
                
            
                @foreach($metierwithusers as $one)

                <tr class=" dark:bg-gray-800">
                    <th scope="row" id="metier-name" class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white">{{$one->Metier}}</th>
                    <td class="px-6 py-4">{{count($one->Depanneur)}}</td>
                    <input type="text" hidden value="{{$one->id}}" id="metier-id">
                    <td class="px-6 py-4 flex">
                    
                    <button type="button" id="modalbuttonmodifier_{{$one->id}}_{{$loop->index}}" data-modal-target="default-modal_{{$one->id}}_{{$loop->index}}" data-modal-toggle="default-modal_{{$one->id}}_{{$loop->index}}" class="mx-2 bg-green-700 text-white py-1 px-1">Modify</button>
                        <form action="{{route('MetierAdmin.destroy' , $one->id)}}" method="POST">
                        @csrf
                        @method ('DELETE')
                        <button type="submit"  class="mx-2 bg-red-700 text-white py-1 px-1">Delete</button>
                        </form>
                    </td>
                </tr>





                <!-- Main modal -->
                <div id="default-modal_{{$one->id}}_{{$loop->index}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal_{{$one->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{route('MetierAdmin.update' , $one->id)}}" method="POST">
            @csrf
            @method('patch')
            <div class="p-4 md:p-5 space-y-4">
                <input type="text" name="newmetier" value="{{$one->Metier}}" class="w-full">
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
               
               <button data-modal-hide="default-modal_{{$one->id}}" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
            </form>
                <button data-modal-hide="default-modal_{{$one->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
            </div>
        </div>
    </div>
</div>

                @endforeach


            </tbody>
        </table>
    </div>

    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>  


    </body>
    </html>