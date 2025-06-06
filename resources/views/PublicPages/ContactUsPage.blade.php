<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" Photo carousel="width=device-width, initial-scale=1">
    {{-- Bootstrap Area --}}

    {{-- Tailwind Area --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/6d462838cf.js" crossorigin="anonymous"></script>
    <title>Barangay San Jose Rural Health Unit III</title>
    
  </head>
  <body class="bg-black">
    <nav class="bg-blue-500 m-3">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!--
                Icon when menu is closed.
    
                Menu open: "hidden", Menu closed: "block"
              -->
              <!-- Keep only the hamburger icon -->
              <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>

              <!--
                Icon when menu is open.
    
                Menu open: "block", Menu closed: "hidden"
              -->
              <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex shrink-0 items-center">
              {{-- <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"> --}}
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4 mx-auto">
                <!-- Current: "bg-gray-900 text-white", Default: "text-white hover:bg-gray-700 hover:text-white" -->
              <a href="{{route('HomePage')}}" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white text-center" aria-current="page">Home</a>
              <a href="{{route('Schedule')}}" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white text-center" aria-current="page">Schedule</a>
              <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white text-center" aria-current="page">Services</a>
              <a href="{{route('ContactUs')}}" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white text-center" aria-current="page">Contact Us</a>
              <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white text-center" aria-current="page">About Us</a>
              </div>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
      
    
  
          </div>
        </div>
      </div>
    
      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="sm:hidden hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-white hover:bg-gray-700 hover:text-white" -->
          <a href="{{route('HomePage')}}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
          <a href="{{route('Schedule')}}" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white ">Schedule</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white ">Services</a>
          <a href="{{route('ContactUs')}}" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white ">Contact Us</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:bg-gray-700 hover:text-white ">About Us</a>
        </div>
      </div>
    </nav>
    <!-- Navigation -->
    <!-- Carousel -->
    
  </body>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const button = document.querySelector('[aria-controls="mobile-menu"]');
      const menu = document.getElementById('mobile-menu');
  
      button.addEventListener('click', () => {
        const isHidden = menu.classList.contains('hidden');
  
        // Just toggle the mobile menu
        menu.classList.toggle('hidden');
  
        // Update ARIA
        button.setAttribute('aria-expanded', isHidden);
      });
    });
  </script>
  
  
  
</html>