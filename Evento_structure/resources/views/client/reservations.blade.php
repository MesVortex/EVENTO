<!doctype html>
<html lang="en">

<head>

  <!--====== Required meta tags ======-->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--====== Title ======-->
  <title>Evento</title>

  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon" href="{{asset('images/Logo_no_bg.png')}}" type="image/png">

  <!--====== Slick css ======-->
  <link rel="stylesheet" href="{{asset('css/slick.css')}}">

  <!--====== Line Icons css ======-->
  <link rel="stylesheet" href="{{asset('css/LineIcons.css')}}">

  <!--====== Magnific Popup css ======-->
  <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

  <!--====== tailwind css ======-->
  <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

  <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>


</head>

<body>

  <!--====== HEADER PART START ======-->

  <header class="header-area">
    <div class="navigation">
      <div class="container">
        <div class="row">
          <div class="w-full">
            <nav class="flex items-center justify-between navbar navbar-expand-md">
              <a class="mr-4" href="" style="width: 90px;">
                <img class="" src="{{asset('images/EventoLogo_no_bg.png')}}" alt="Logo">
              </a>

              <button class="block navbar-toggler focus:outline-none md:hidden" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
              </button>

              <!-- justify-center hidden md:flex collapse navbar-collapse sub-menu-bar -->
              <div class="absolute left-0 z-30 hidden w-full px-5 py-3 duration-300 bg-white shadow md:opacity-100 md:w-auto collapse navbar-collapse md:block top-100 mt-full md:static md:bg-transparent md:shadow-none" id="navbarOne">
                <ul class="items-center content-start mr-auto lg:justify-center md:justify-end navbar-nav md:flex">
                  <!-- flex flex-row mx-auto my-0 navbar-nav -->
                  <li class="nav-item">
                    <a class="page-scroll" href="{{route('client.index')}}">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="page-scroll" href="{{route('event.explore')}}">Explore</a>
                  </li>
                  <li class="nav-item active">
                    <a class="page-scroll" href="{{ route('client.reservations') }}">Your Reservations</a>
                  </li>
                </ul>
              </div>

              <div class="items-center justify-end hidden navbar-social lg:flex">
                <form method="get" action="{{ route('event.search') }}" class=" mr-6 relative mx-auto text-gray-600">
                  @csrf
                  @method('GET')
                  <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" type="search" name="search" placeholder="Search">
                  <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                  </button>
                </form>
                <div class="bg-transparent flex justify-center items-center dark:bg-gray-500">
                  <div x-data="{ open: false }" class="bg-transparent dark:bg-gray-800 flex justify-center items-center">
                    <div @click="open = !open" class="relative border-b-4 border-transparent py-3" :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                      <div class="flex justify-center items-center space-x-3 cursor-pointer">
                        <div class="w-12 h-12 rounded-full overflow-hidden border-2 dark:border-white border-gray-900">
                          <img src="https://images.unsplash.com/photo-1610397095767-84a5b4736cbd?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="" class="w-full h-full object-cover">
                        </div>
                      </div>
                      <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3 dark:bg-gray-800 bg-white rounded-lg shadow border dark:border-transparent mt-5" style="right: 0px;">
                        <ul class="space-y-3 dark:text-white">
                          <li class="font-medium">
                            <div class="font-semibold dark:text-white text-gray-900 text-lg">
                              <div class="cursor-pointer capitalize">Mr. {{Auth::user()->name}}</div>
                            </div>
                          </li>
                          <hr class="dark:border-gray-700">
                          <li class="font-medium">
                            <form method="POST" action="{{ route('logout') }}" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                              @csrf
                              <button class="flex">
                                <div class="mr-3 text-red-600">
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                  </svg>
                                </div>
                                Logout
                              </button>
                            </form>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </nav> <!-- navbar -->
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- navgition -->
  </header>

  <div class="grid grid-cols-12 gap-6 mt-20">
    <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
      <div class="col-span-12 px-10">
        <div class="w-full mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
          <div class="flex flex-row justify-between items-center">
            <div>
              <h1 class="text-3xl font-medium">Reservations list</h1>
            </div>
          </div>
          <p class="text-slate-500 my-4">Hello, here are all your reservations</p>
          <ul class="bg-white shadow overflow-hidden sm:rounded-md mx-auto mt-16">
            @foreach($reservations as $reservation)
            @if($reservation->isAcceptedByOrganizer)
            <li class="border-t border-gray-200 hover:bg-slate-600">
              <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center justify-between">
                  <h3 class="text-lg leading-6 font-medium text-gray-900"><span class=" font-bold capitalize">reservation for:</span> {{ $reservation->events->title }}</h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500"><span class=" font-bold capitalize">organized by:</span> {{ $reservation->events->organizers->users->name }}</p>
                </div>
                <div class="mt-4 flex items-center justify-between">
                  <p class="text-sm font-medium text-gray-500">Status: <span class="text-green-600">Accepted</span></p>
                  <a href="{{ route('ticket', $reservation) }}" class="font-medium text-indigo-600 hover:text-indigo-500">View Ticket</a>
                </div>
              </div>
            </li>
            @else
            <li class="border-t border-gray-200 hover:bg-slate-600">
              <div class="px-4 py-5 sm:px-6">
                <div class="flex items-center justify-between">
                  <h3 class="text-lg leading-6 font-medium text-gray-900"><span class=" font-bold capitalize">reservation for:</span> {{ $reservation->events->title }}</h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500"><span class=" font-bold capitalize">organized by:</span> {{ $reservation->events->organizers->users->name }}</p>
                </div>
                <div class="mt-4 flex items-center justify-between">
                  <p class="text-sm font-medium text-gray-500">Status: <span class="text-yellow-600">Pending</span></p>
                </div>
              </div>
            </li>
            @endif
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--====== FOOTER PART START ======-->

  <footer id="footer" class="bg-gray-100 footer-area pt-32">
    <div class="mb-16 footer-widget">
      <div class="container"> <!-- row -->
        <div class="row">
          <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/6">
            <div class="mb-8 footer-link">
              <h6 class="footer-title">Company</h6>
              <ul>
                <li><a href="javascript:void(0)">About</a></li>
                <li><a href="javascript:void(0)">Contact</a></li>
                <li><a href="javascript:void(0)">Career</a></li>

              </ul>
            </div> <!-- footer link -->
          </div>
          <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
            <div class="mb-8 footer-link">
              <h6 class="footer-title">Product & Services</h6>
              <ul>
                <li><a href="javascript:void(0)">Products</a></li>
                <li><a href="javascript:void(0)">Business</a></li>
                <li><a href="javascript:void(0)">Developer</a></li>
              </ul>
            </div> <!-- footer link -->
          </div>
          <div class="w-full sm:w-5/12 md:w-1/3 lg:w-1/4">
            <div class="mb-8 footer-link">
              <h6 class="footer-title">Help & Suuport</h6>
              <ul>
                <li><a href="javascript:void(0)">Support Center</a></li>
                <li><a href="javascript:void(0)">FAQ</a></li>
                <li><a href="javascript:void(0)">Terms & Conditions</a></li>
              </ul>
            </div> <!-- footer link -->
          </div>
          <div class="w-full sm:w-7/12 md:w-1/2 lg:w-1/3">
            <div class="mb-8 footer-newsletter">
              <h6 class="footer-title">Subscribe Newsletter</h6>
              <div class="newsletter">
                <form action="#" class="relative mb-4">
                  <input type="text" placeholder="Your Email" class="w-full py-3 pl-6 pr-12 duration-300 bg-gray-200 border border-gray-200 rounded-full focus:border-blue-600 focus:outline-none">
                  <button type="submit" class="absolute top-0 right-0 mt-3 mr-6 text-xl text-blue-600">
                    <i class="lni-angle-double-right"></i>
                  </button>
                </form>
              </div>
              <p class="font-medium text-gray-900">Subscribe weekly newsletter to stay up to date. We don’t send spam.</p>
            </div> <!-- footer newsletter -->
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- footer widget -->

    <div class="bg-purple-900 footer-copyright">
      <div class="container">
        <div class="row">
          <div class="w-full">
            <div class="py-6 text-center">
              <p class="text-white">
                Evento <span class="italic text-gray-300">All rights reserved &#169;</span>
              </p>
            </div>
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- footer copyright -->
  </footer>

  <!--====== FOOTER PART ENDS ======-->

  <!--====== BACK TO TOP PART START ======-->

  <a class="back-to-top" href="#"><i class="fa-solid fa-angle-up"></i></a>

  <!--====== BACK TO TOP PART ENDS ======-->


  <!--====== jquery js ======-->
  <script src="{{asset('js/vendor/modernizr-3.6.0.min.js')}}"></script>
  <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>

  <!--====== Ajax Contact js ======-->
  <script src="{{asset('js/ajax-contact.js')}}"></script>

  <!--====== Scrolling Nav js ======-->
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/scrolling-nav.js')}}"></script>

  <!--====== Validator js ======-->
  <script src="{{asset('js/validator.min.js')}}"></script>

  <!--====== Magnific Popup js ======-->
  <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>

  <!--====== Slick js ======-->
  <script src="{{asset('js/slick.min.js')}}"></script>

  <!--====== Main js ======-->
  <script src="{{asset('js/main.js')}}"></script>



</body>

</html>