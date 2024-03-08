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
  <link rel="shortcut icon" href="{{asset('images/EventoLogoTop.png')}}" type="image/png">

  <!--====== Slick css ======-->
  <link rel="stylesheet" href="{{asset('css/slick.css')}}">

  <!--====== Line Icons css ======-->
  <link rel="stylesheet" href="{{asset('css/LineIcons.css')}}">

  <!--====== Magnific Popup css ======-->
  <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

  <!--====== tailwind css ======-->
  <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">



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
                  <li class="nav-item active">
                    <a class="page-scroll" href="#home">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="page-scroll" href="#service">SERVICES</a>
                  </li>
                  <li class="nav-item">
                    <a class="page-scroll" href="#pricing">PRICING</a>
                  </li>
                  <li class="nav-item">
                    <a class="page-scroll" href="#testimonial">Testimonial</a>
                  </li>
                  <li class="nav-item">
                    <a class="page-scroll" href="#contact">CONTACT</a>
                  </li>
                </ul>
              </div>

              <div class="items-center justify-end hidden navbar-social lg:flex">
                <span class="mr-4 font-bold text-gray-900 uppercase">FOLLOW US</span>
                <ul class="flex footer-social">
                  <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                  <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                  <li><a href="#"><i class="lni-instagram-original"></i></a></li>
                  <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                </ul>
              </div>
            </nav> <!-- navbar -->
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- navgition -->

    <div id="home" class="relative z-10 header-hero" style="background-image: url({{asset('images/header-bg.jpg')}}); background-position: center">
      <div class="container">
        <div class="justify-center row">
          <div class="w-full lg:w-5/6 xl:w-2/3">
            <div class="pt-48 pb-64 text-center header-content">
              <h3 class="mb-5 text-3xl font-semibold leading-tight text-gray-900 md:text-5xl"></h3>
              <p class="px-5 mb-10 text-xl text-gray-700"></p>
              <ul class="flex flex-wrap justify-center">
                <li><a class="mx-3 main-btn gradient-btn" href="javascript:void(0)">GET IN TOUCH</a></li>
                <li><a class="mx-3 main-btn video-popup" href="https://www.youtube.com/watch?v=r44RKWyfcFw">WATCH THE VIDEO <i class="ml-2 lni-play"></i></a></li>
              </ul>
            </div> <!-- header content -->
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
      <div class="absolute bottom-0 z-20 w-full h-auto -mb-1 header-shape">
        <img src="{{asset('images/header-shape.svg')}}" alt="shape">
      </div>
    </div> <!-- header content -->
  </header>

  <!--====== HEADER PART ENDS ======-->

  <!--====== PRICING PART START ======-->

  <div class="flex flex-wrap p-20 my-10 gap-5 justify-center">
    @foreach($categories as $category)
    <form action="{{ route('event.filter') }}" method="post">
      @csrf
      @method('POST')
      <input type="hidden" name="categoryID" value="{{ $category->id }}">
      <button class="relative px-5 py-2 font-medium text-white group">
        <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform translate-x-0 -skew-x-12 bg-purple-500 group-hover:bg-purple-700 group-hover:skew-x-12"></span>
        <span class="absolute inset-0 w-full h-full transition-all duration-300 ease-out transform skew-x-12 bg-purple-700 group-hover:bg-purple-500 group-hover:-skew-x-12"></span>
        <span class="absolute bottom-0 left-0 hidden w-10 h-20 transition-all duration-100 ease-out transform -translate-x-8 translate-y-10 bg-purple-600 -rotate-12"></span>
        <span class="absolute bottom-0 right-0 hidden w-10 h-20 transition-all duration-100 ease-out transform translate-x-10 translate-y-8 bg-purple-400 -rotate-12"></span>
        <span class="relative">{{$category->name}}</span>
      </button>
    </form>
    @endforeach
  </div>

  <section id="pricing" class="bg-gray-100 pricing-area py-120">
    <div class="container">
      <div class="justify-center row">
        <div class="w-full mx-4 lg:w-1/2">
          <div class="pb-10 text-center section-title">
            <h4 class="title">Our Pricing</h4>
            <p class="text">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
          </div> <!-- section title -->
        </div>
      </div> <!-- row -->
      <div class="justify-center row">
        @foreach($events as $event)
        <div class="w-full sm:w-3/4 md:w-3/4 lg:w-1/3">
          <div class="single-pricing pro">
            <div class="absolute top-0 right-0 w-40 -mr-20 pricing-baloon">
              <img src="{{asset('images/baloon.svg')}}" alt="baloon">
            </div>
            <div class="pricing-header">
              <h5 class="sub-title">{{ $event->categories->name }}</h5>
              <span class="price">{{ $event->title }}</span>
              <p class="year">{{ $event->venue }}</p>
            </div>
            <div class="mb-8 pricing-list">
              <ul>
                <li><i class="lni-check-mark-circle"></i> Carefully crafted components</li>
                <li><i class="lni-check-mark-circle"></i> Amazing page examples</li>
                <li><i class="lni-check-mark-circle"></i> Super friendly support team</li>
                <li><i class="lni-check-mark-circle"></i> Awesome Support</li>
              </ul>
            </div>
            <div class="text-center pricing-btn">
              <a class="main-btn" href="{{ route('event.clientShow', $event) }}">Read More</a>
            </div>
            <div class="bottom-shape">
              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35">
                <defs>
                  <style>
                    .color-2 {
                      fill: #0067f4;
                      isolation: isolate;
                    }

                    .cls-1 {
                      opacity: 0.1;
                    }

                    .cls-2 {
                      opacity: 0.2;
                    }

                    .cls-3 {
                      opacity: 0.4;
                    }

                    .cls-4 {
                      opacity: 0.6;
                    }
                  </style>
                </defs>
                <title>bottom-part1</title>
                <g id="bottom-part">
                  <g id="Group_747" data-name="Group 747">
                    <path id="Path_294" data-name="Path 294" class="cls-1 color-2" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)" />
                    <path id="Path_297" data-name="Path 297" class="cls-2 color-2" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)" />
                    <path id="Path_296" data-name="Path 296" class="cls-3 color-2" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)" />
                    <path id="Path_295" data-name="Path 295" class="cls-4 color-2" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)" />
                  </g>
                </g>
              </svg>
            </div>
          </div> <!-- single pricing -->
        </div>
        @endforeach
      </div> <!-- row -->
    </div>
    <!-- container -->
    <div class="paginate">
      {{ $events->links() }}
    </div>
  </section>
  <!--====== PRICING PART ENDS ======-->

  <!--====== FOOTER PART START ======-->

  <footer id="footer" class="bg-gray-100 footer-area">
    <div class="mb-16 footer-widget">
      <div class="container">
        <div class="row">
          <div class="w-full">
            <div class="items-end justify-between block mb-8 footer-logo-support md:flex">
              <div class="flex items-end footer-logo">
                <a class="mt-8" href="index.html"><img src="{{asset('images/logo.svg')}}" alt="Logo"></a>

                <ul class="flex mt-8 ml-8 footer-social">
                  <li><a href="javascript:void(0)"><i class="lni-facebook-filled"></i></a></li>
                  <li><a href="javascript:void(0)"><i class="lni-twitter-original"></i></a></li>
                  <li><a href="javascript:void(0)"><i class="lni-instagram-original"></i></a></li>
                  <li><a href="javascript:void(0)"><i class="lni-linkedin-original"></i></a></li>
                </ul>
              </div> <!-- footer logo -->

            </div> <!-- footer logo support -->
          </div>
        </div> <!-- row -->
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
              <p class="font-medium text-gray-900">Subscribe weekly newsletter to stay upto date. We don’t send spam.</p>
            </div> <!-- footer newsletter -->
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- footer widget -->

    <div class="bg-blue-900 footer-copyright">
      <div class="container">
        <div class="row">
          <div class="w-full">
            <div class="py-6 text-center">
              <p class="text-white">
                Template Crafted by
                <a class="text-blue-500 duration-300 hover:text-blue-700" rel="nofollow" href="https://tailwindtemplates.co">TailwindTemplates</a>
              </p>
            </div>
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- footer copyright -->
  </footer>

  <!--====== FOOTER PART ENDS ======-->

  <!--====== BACK TO TOP PART START ======-->

  <a class="back-to-top" href="#"><i class="lni-chevron-up"></i></a>

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