@include('layout.header')

<div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    
    @include('layout.side')
   
    <div class="flex flex-col flex-1 w-full">

        {{-- ALL CONTENTS ARE INJECTED HERE --}}
        @yield('contents')
    </div>
</div>


@include('pages.modal')
  
@include('layout.footer')