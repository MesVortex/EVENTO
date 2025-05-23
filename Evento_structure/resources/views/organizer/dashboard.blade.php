<!DOCTYPE html>
<html x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <!-- Favicon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
</head>

<body>
  <div class="flex h-screen bg-gray-800 " :class="{ 'overflow-hidden': isSideMenuOpen }">

    <!-- Desktop sidebar -->
    <aside class="z-20 flex-shrink-0 hidden w-60 pl-2 overflow-y-auto bg-gray-800 md:block">
      <div>
        <div class="text-white">
          <div class="flex p-5 bg-gray-800">
            <img class="h-9 mx-auto" src="{{asset('images/webSiteName.png')}}">
          </div>
          <div class="flex justify-center">
            <div class="">
              <img class="hidden h-24 w-24 rounded-full sm:block object-cover mr-2 border-4 border-purple-600" src="{{asset('images/organizer.png')}}" alt="">
              <p class="font-bold text-base capitalize  text-gray-400 pt-2 text-center w-24">Mr. {{ Auth::user()->name }}</p>
            </div>
          </div>
          <div>
            <ul class="mt-6 leading-10">
              <li class="relative px-2 py-1 ">
                <a href=" #" class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-purple-600" >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>
                  <span class="ml-4">EVENTS</span>
                </a>
              </li>
              <li class="relative px-2 py-1" x-data="{ Open : false  }">
                <a href="{{ route('organizer.statistics') }}" class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer">
                  <span class="inline-flex items-center  text-sm font-semibold text-white hover:text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                    </svg>
                    <span class="ml-4">STATISTICS</span>
                  </span>
                </a>              
              </li>
            </ul>
          </div>
        </div>
      </div>
    </aside>

    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto  bg-gray-900 dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
      <div>
        <div class="text-white">
          <div class="flex p-2  bg-gray-800">
            <div class="flex py-3 px-2 items-center">
              <img src="{{asset('images/organizer.png')}}" alt="test">
            </div>
          </div>
          <div>
            <ul class="mt-6 leading-10">
              <li class="relative px-2 py-1 ">
                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-purple-600" href=" #">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg>
                  <span class="ml-4">DASHBOARD</span>
                </a>
              </li>
              <li class="relative px-2 py-1" x-data="{ Open : false  }">
                <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer" x-on:click="Open = !Open">
                  <span class="inline-flex items-center  text-sm font-semibold text-white hover:text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                    </svg>
                    <span class="ml-4">ITEM</span>
                  </span>
                  <svg xmlns="http://www.w3.org/2000/svg" x-show="!Open" class="ml-1  text-white w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                  </svg>

                  <svg xmlns="http://www.w3.org/2000/svg" x-show="Open" class="ml-1  text-white w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                  </svg>
                </div>

                <div x-show.transition="Open" style="display:none;">
                  <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300" x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0" class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium  rounded-md shadow-inner  bg-purple-600" aria-label="submenu">
                    <li class="px-2 py-1 text-white transition-colors duration-150">
                      <div class="px-1 hover:text-gray-800 hover:bg-gray-100 rounded-md">
                        <div class="flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                          </svg>
                          <a href="#" class="w-full ml-2  text-sm font-semibold text-white hover:text-gray-800">Item
                            1</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </aside>

    <div class="flex flex-col flex-1 w-full overflow-y-auto">
      <header class="z-40 py-4  bg-gray-800  ">
        <div class="flex items-center justify-between h-8 px-6 mx-auto">
          <!-- Mobile hamburger -->
          <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
          </button>

          <ul class="flex items-center justify-end w-full flex-shrink-0 space-x-6 ">
            <!-- Profile menu -->
            <li class="relative">
              <button class="p-2 bg-white text-purple-600 align-middle rounded-full hover:text-white hover:bg-purple-600 focus:outline-none " @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
              </button>
              <template x-if="isProfileMenuOpen">
                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-purple-500 border border-purple-600 rounded-md shadow-md" aria-label="submenu">
                  <!-- <li class="flex">
                    <a class=" text-white inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      <span>Profile</span>
                    </a>
                  </li> -->
                  <li class="flex">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                      @csrf
                      <button class="text-white inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Log out</span>
                      </button>
                    </form>
                  </li>
                </ul>
              </template>
            </li>
          </ul>
        </div>
      </header>
      <main class="">
        <div class="flex flex-wrap gap-10 h-auto mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100 border-4 border-purple-600">
          <div class="w-full flex justify-between mt-10">
            <div>
              <h2 class="text-3xl font-bold text-purple-600">Your Events</h2>
            </div>
            <a href="{{ route('event.create') }}" class="box-border relative z-30 inline-flex items-center justify-center w-auto px-8 py-3 overflow-hidden font-bold text-white transition-all duration-300 bg-purple-600 rounded-md cursor-pointer group ring-offset-2 ring-1 ring-purple-300 ring-offset-purple-200 hover:ring-offset-purple-500 ease focus:outline-none">
              <span class="absolute bottom-0 right-0 w-8 h-20 -mb-8 -mr-5 transition-all duration-300 ease-out transform rotate-45 translate-x-1 bg-white opacity-10 group-hover:translate-x-0"></span>
              <span class="absolute top-0 left-0 w-20 h-8 -mt-1 -ml-12 transition-all duration-300 ease-out transform -rotate-45 -translate-x-1 bg-white opacity-10 group-hover:translate-x-0"></span>
              <span class="relative z-20 flex items-center text-sm">
                <svg class="relative w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                add event
              </span>
            </a>
          </div>
          <div class="flex flex-wrap items-center justify-around gap-10 w-full">
            <!-- 1 card -->
            @foreach($events as $event)
            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
              <div class=" text-white flex items-center absolute rounded-full py-8 px-5 shadow-xl bg-purple-600 left-4 -top-6">
                <!-- svg  -->
                <i class="fa-solid fa-champagne-glasses fa-xl"></i>
              </div>
              <div class="mt-8">
                <p class="text-xl font-semibold my-2">{{$event->title}}</p>
                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                  <!-- svg  -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <p>{{ Str::limit($event->description, 50) }}...</p>
                </div>
                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                  <!-- svg  -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <p>{{$event->venue}}</p>
                </div>
                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                  <!-- svg  -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <p>{{$event->availablePlaces}}</p>
                </div>
                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                  <!-- svg  -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <p>{{$event->validationType}}</p>
                </div>
                <div class="flex space-x-2 text-gray-400 text-sm my-3">
                  <!-- svg  -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <p>{{$event->date}}</p>
                </div>
                <div class="px-6 pt-4 pb-2 mx-auto">
                  <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mb-2">#{{$event->categories->name}}</span>
                </div>
                <div class="border-t-2"></div>
                <div class="mt-2">
                  <p class="font-semibold text-base mb-2">Actions</p>
                  <div class="flex space-x-2 justify-center gap-5">
                    @if($event->validationType == 'manual')
                    <a href="{{ route('event.reservations', $event) }}" class="cursor-pointer text-blue-500 hover:text-blue-600">
                      <i class="fa-solid fa-book-bookmark ml-9"></i>
                      <p>Reservations</p>
                    </a>
                    @endif
                    <a href="{{ route('event.edit', ['event' => $event]) }}" class="cursor-pointer text-green-500 hover:text-green-600">
                      <i class="fa-solid fa-pen-to-square ml-2"></i>
                      <p>Edit</p>
                    </a>
                    <a type="button" data-modal-target="popup-modal{{$event->id}}" data-modal-toggle="popup-modal{{$event->id}}" class=" cursor-pointer text-red-500 hover:text-red-600">
                      <i class="fa-solid fa-trash ml-3"></i>
                      <p>Delete</p>
                    </a>
                  </div>
                  <!-- delete pop-up -->
                  <div id="popup-modal{{$event->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{$event->id}}">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                          </svg>
                          <span class="sr-only">Close modal</span>
                        </button>
                        <form class="p-4 md:p-5 text-center" method="post" action="{{ route('event.destroy', ['event' => $event]) }}">
                          @csrf
                          @method('DELETE')
                          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                          </svg>
                          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to archive this Event?</h3>
                          <button data-modal-hide="popup-modal{{$event->id}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                            Yes, I'm sure
                          </button>
                          <button data-modal-hide="popup-modal{{$event->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    function data() {

      return {

        isSideMenuOpen: false,
        toggleSideMenu() {
          this.isSideMenuOpen = !this.isSideMenuOpen
        },
        closeSideMenu() {
          this.isSideMenuOpen = false
        },
        isNotificationsMenuOpen: false,
        toggleNotificationsMenu() {
          this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
        },
        closeNotificationsMenu() {
          this.isNotificationsMenuOpen = false
        },
        isProfileMenuOpen: false,
        toggleProfileMenu() {
          this.isProfileMenuOpen = !this.isProfileMenuOpen
        },
        closeProfileMenu() {
          this.isProfileMenuOpen = false
        },
        isPagesMenuOpen: false,
        togglePagesMenu() {
          this.isPagesMenuOpen = !this.isPagesMenuOpen
        },

      }
    }
  </script>
</body>

</html>