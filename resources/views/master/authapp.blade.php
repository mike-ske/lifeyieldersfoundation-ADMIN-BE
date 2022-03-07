@include('layout.header')

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    
 <div class="flex flex-col flex-1 w-full">

        {{-- ALL CONTENTS ARE INJECTED HERE --}}
        @yield('contents')
    </div>
</div>


  
@include('layout.footer')