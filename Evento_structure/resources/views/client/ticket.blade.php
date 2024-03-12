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
  @if(!$reservation->isAcceptedByOrganizer)
  <?php abort(403); ?>
  @endif
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
                  <li class="nav-item active">
                    <a class="page-scroll" href="#">Your Ticket</a>
                  </li>
                </ul>
              </div>

              <div class="items-center justify-end hidden navbar-social lg:flex">
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
  <div class="flex flex-col items-center my-32 justify-center min-h-screen bg-center bg-cover" style="background-image: url();">
    <div class="max-w-md w-full h-full mx-auto z-10 bg-purple-900 rounded-3xl">
      <div class="flex flex-col">
        <div class="bg-white relative drop-shadow-2xl  rounded-3xl p-4 m-4">
          <div class="flex-none sm:flex">
            <div class=" relative h-32 w-32   sm:mb-0 mb-3 hidden">
              <img src="" alt="Evento" class=" w-32 h-32 object-cover rounded-2xl">
              <a href="#" class="absolute -right-2 bottom-2   -ml-3  text-white p-1 text-xs bg-green-400 hover:bg-green-500 font-medium tracking-wider rounded-full transition ease-in duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                  </path>
                </svg>
              </a>
            </div>
            <div class="flex-auto justify-evenly">
              <div class="flex items-center justify-between">
                <div class="flex items-center  my-1">
                  <span class="mr-3 rounded-full bg-white w-8 h-8">
                    <img src="{{asset('images/Logo.png')}}" class="w-12">
                  </span>
                  <h2 class="font-medium">{{$reservation->events->title}}</h2>
                </div>
                <div class="ml-auto text-purple-800">A380</div>
              </div>
              <div class="border-b border-dashed border-b-2 my-5"></div>
              <div class="flex items-center">
                <div class="flex flex-col">
                  <div class="flex-auto text-xs text-gray-400 my-1">
                    <span class="mr-1 ">MO</span><span>19 22</span>
                  </div>
                  <div class="w-full flex-none text-lg text-purple-800 font-bold leading-none">EVE</div>
                  <div class="text-xs">event</div>

                </div>
                <div class="flex flex-col mx-auto">
                  <img src="{{asset('images/EventoLogo_no_bg.png')}}" class="w-20 p-1">

                </div>
                <div class="flex flex-col ">
                  <div class="flex-auto text-xs text-gray-400 my-1">
                    <span class="mr-1">MO</span><span>19 22</span>
                  </div>
                  <div class="w-full flex-none text-lg text-purple-800 font-bold leading-none">NTO</div>
                  <div class="text-xs">Booking</div>

                </div>
              </div>
              <div class="border-b border-dashed border-b-2 my-5 pt-5">
                <div class="absolute rounded-full w-5 h-5 bg-purple-900 -mt-2 -left-2"></div>
                <div class="absolute rounded-full w-5 h-5 bg-purple-900 -mt-2 -right-2"></div>
              </div>
              <div class="flex items-center mb-5 p-5 text-sm">
                <div class="flex flex-col">
                  <span class="text-sm">Organizer</span>
                  <div class="font-semibold">{{$reservation->events->organizers->users->name}}</div>

                </div>
                <div class="flex flex-col ml-auto">
                  <span class="text-sm">Gate</span>
                  <div class="font-semibold">B3</div>

                </div>
              </div>
              <div class="flex items-center mb-4 px-5">
                <div class="flex flex-col text-sm">
                  <span class="">Date</span>
                  <div class="font-semibold">{{$reservation->events->date}}</div>

                </div>
                <div class="flex flex-col mx-auto text-sm">
                  <span class="">From</span>
                  <div class="font-semibold">11:30Am</div>

                </div>
                <div class="flex flex-col text-sm">
                  <span class="">To</span>
                  <div class="font-semibold">5:00PM</div>

                </div>
              </div>
              <div class="border-b border-dashed border-b-2 my-5 pt-5">
                <div class="absolute rounded-full w-5 h-5 bg-purple-900 -mt-2 -left-2"></div>
                <div class="absolute rounded-full w-5 h-5 bg-purple-900 -mt-2 -right-2"></div>
              </div>
              <div class="flex items-center px-5 pt-3 text-sm">
                <div class="flex flex-col">
                  <span class="">Owner</span>
                  <div class="font-semibold">{{$reservation->clients->users->name}}</div>

                </div>
                <div class="flex flex-col mx-auto">
                  <span class="">Venue</span>
                  <div class="font-semibold">{{$reservation->events->venue}}</div>

                </div>
                <div class="flex flex-col">
                  <span class="">Ticket N&deg;</span>
                  <div class="font-semibold">{{$reservation->placeNumber}} E</div>

                </div>
              </div>
              <div class="flex flex-col py-5  justify-center text-sm ">
                <h6 class="font-bold text-center">Evento Ticket</h6>
                <style>
                  .barcode {
                    left: 50%;
                    box-shadow: 1px 0 0 1px, 5px 0 0 1px, 10px 0 0 1px, 11px 0 0 1px, 15px 0 0 1px, 18px 0 0 1px, 22px 0 0 1px, 23px 0 0 1px, 26px 0 0 1px, 30px 0 0 1px, 35px 0 0 1px, 37px 0 0 1px, 41px 0 0 1px, 44px 0 0 1px, 47px 0 0 1px, 51px 0 0 1px, 56px 0 0 1px, 59px 0 0 1px, 64px 0 0 1px, 68px 0 0 1px, 72px 0 0 1px, 74px 0 0 1px, 77px 0 0 1px, 81px 0 0 1px, 85px 0 0 1px, 88px 0 0 1px, 92px 0 0 1px, 95px 0 0 1px, 96px 0 0 1px, 97px 0 0 1px, 101px 0 0 1px, 105px 0 0 1px, 109px 0 0 1px, 110px 0 0 1px, 113px 0 0 1px, 116px 0 0 1px, 120px 0 0 1px, 123px 0 0 1px, 127px 0 0 1px, 130px 0 0 1px, 131px 0 0 1px, 134px 0 0 1px, 135px 0 0 1px, 138px 0 0 1px, 141px 0 0 1px, 144px 0 0 1px, 147px 0 0 1px, 148px 0 0 1px, 151px 0 0 1px, 155px 0 0 1px, 158px 0 0 1px, 162px 0 0 1px, 165px 0 0 1px, 168px 0 0 1px, 173px 0 0 1px, 176px 0 0 1px, 177px 0 0 1px, 180px 0 0 1px;
                    display: inline-block;
                    transform: translateX(-90px);
                  }
                </style>
                <div class="barcode h-14 w-0 inline-block mt-4 relative left-auto"></div>
              </div>
            </div>
          </div>
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