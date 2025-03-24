<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ERP Laravel</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/T4TLogo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- End : Theme CSS-->
    <style>
        .page-content{
            padding-left: 85px;
        }
    </style>
    @yield('css')

</head>
<body class=" font-inter dashcode-app" id="body_class">

    <main class="app-wrapper">
        <!-- BEGIN: Sidebar -->
        <!-- BEGIN: Sidebar -->
        <div class="sidebar-wrapper group">
            <div id="bodyOverlay"
                class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
            </div>
            <div class="logo-segment">
                <a class="flex items-center" href="index.html">
                <img src="{{ asset('assets/images/logo-theme.png') }}" width="32" height="32"  alt="logo">
                <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">ERP Laravel</span>
                </a>
                <!-- Sidebar Type Button -->
                <!-- Sidebar Type Button -->
                <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
                    <span class="sidebarDotIcon extend-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
                      <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150 ring-2 ring-inset ring-offset-4 ring-black-900 dark:ring-slate-400 bg-slate-900 dark:bg-slate-400 dark:ring-offset-slate-700"></div>
                    </span>
                    <span class="sidebarDotIcon collapsed-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
                      <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150"></div>
                    </span>
                </div>
                <button class="sidebarCloseIcon text-2xl">
                  <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
                </button>

              </button>
            </div>
            <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
            opacity-0"></div>
            @include('layouts.sidebar')
        </div>


        <div class="flex flex-col justify-between min-h-screen">
          <div>
            <!-- BEGIN: Header -->
            <!-- BEGIN: Header -->
            <div class="z-[9]" id="app_header">
              <div class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
                <div class="flex justify-between items-center h-full" style="padding-left: 75px;">
                  <div class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
                    <a href="index.html" class="mobile-logo xl:hidden inline-block">
                      <img src="assets/images/logo-theme.png" width="32" height="32" alt="logo">
                    </a>
                    <button class="smallDeviceMenuController hidden md:inline-block xl:hidden">
                      <iconify-icon
                        class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white"
                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                    </button>
                    <button class="flex items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 px-1
                        rtl:space-x-reverse search-modal" data-bs-toggle="modal" data-bs-target="#searchModal">
                      <iconify-icon icon="heroicons-outline:search"></iconify-icon>
                      <span class="xl:inline-block hidden ml-3">Search...
                      </span>
                    </button>

                  </div>
                  <!-- end vertcial -->
                  <div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
                    <a href="index.html">
                      <span class="xl:inline-block hidden">
                        <img src="assets/images/logo-theme.png" width="32" height="32" alt="logo">
                      </span>
                      <span class="xl:hidden inline-block">
                        <img src="assets/images/logo-theme.png" width="32" height="32" alt="logo">
                      </span>
                    </a>
                    <button class="smallDeviceMenuController  open-sdiebar-controller xl:hidden inline-block">
                      <iconify-icon
                        class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white"
                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                    </button>

                  </div>
                  <!-- end horizental -->

                  <!-- end top menu -->
                  <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">

                    

                    <!-- BEGIN: Profile Dropdown -->
                    <!-- Profile DropDown Area -->
                    <div class="md:block hidden w-full">
                      <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
                      inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                          <img src="{{ asset('assets/images/all-img/user.png') }}" alt="user"
                            class="block w-full h-full object-cover rounded-full">
                        </div>
                        <span
                          class="flex-none text-slate-600 dark:text-white text-sm font-normal 
                          items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">
                          {{ Auth::user()->name }}</span>
                        <svg
                          class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]"
                          aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                      </button>
                      <!-- Dropdown menu -->
                      <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md
                      overflow-hidden">
                        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                          
                        
                          <li>
                          <a class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                          dark:text-white font-normal" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                              <iconify-icon icon="heroicons-outline:login"
                                class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                              <span class="font-Inter">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                            </form>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- END: Header -->
                    <button class="smallDeviceMenuController md:hidden block leading-0">
                      <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl"
                        icon="heroicons-outline:menu-alt-3"></iconify-icon>
                    </button>
                    <!-- end mobile menu -->
                  </div>
                  <!-- end nav tools -->
                </div>
              </div>
            </div>

            <!-- BEGIN: Search Modal -->
            <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
              id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
              <div class="modal-dialog relative w-auto pointer-events-none top-1/4">
                <div
                  class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-900 bg-clip-padding rounded-md outline-none text-current">
                  <form>
                    <div class="relative">
                      <input type="text" class="form-control !py-3 !pr-12" placeholder="Search">
                      <button
                        class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l text-xl border-l-slate-200 dark:border-l-slate-600 dark:text-slate-300 flex items-center justify-center">
                        <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- END: Search Modal -->
            <!-- END: Header -->
            <!-- END: Header -->
            <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
                @yield('content')
            </div>
          </div>
          <!-- BEGIN: Footer For Desktop and tab -->
          <footer class="md:block hidden" id="footer">
            <div
              class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
              <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">
                <div class="text-center ltr:md:text-start rtl:md:text-right text-sm">
                  COPYRIGHT ©
                  <span id="thisYear"></span>
                  Trees4Trees.org
                </div>
                <div class="ltr:md:text-right rtl:md:text-end text-center text-sm">
                  Made by
                  Malau Pria Juli
                </div>
              </div>
            </div>
          </footer>
          <!-- END: Footer For Desktop and tab -->

          <div class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center
            backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
            <a href="chat.html">
              <div>
                <span class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
              text-slate-900 ">
                  <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
                  <span class="absolute right-[5px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
                justify-center rounded-full text-white z-[99]">
                    10
                  </span>
                </span>
                <span class="block text-[11px] text-slate-600 dark:text-slate-300">
                  Messages
                </span>
              </div>
            </a>
            <a href="profile.html" class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700
          h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
              <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
                <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt=""
                  class="w-full h-full rounded-full border-2 border-slate-100">
              </div>
            </a>
            <a href="#">
              <div>
                <span class=" relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
              text-slate-900">
                  <iconify-icon icon="heroicons-outline:bell"></iconify-icon>
                  <span class="absolute right-[17px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
                justify-center rounded-full text-white z-[99]">
                    2
                  </span>
                </span>
                <span class=" block text-[11px] text-slate-600 dark:text-slate-300">
                  Notifications
                </span>
              </div>
            </a>
          </div>
        </div>

    </main>    

    @yield('modal')

    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
    <!-- scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
      // Sidebar Menu
      $.sidebarMenu($(".sidebar-menu"));

      // Simple Bar
      new SimpleBar($("#sidebar_menus, #scrollModal")[0]);
    </script>
    @yield('javascript')
</body>
</html>
