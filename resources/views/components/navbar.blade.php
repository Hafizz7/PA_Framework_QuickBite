<div class="flex flex-row p-2 justify-center  w-screen items-center bg-[#D9FFB0] sticky top-0 z-10">
    <div class=" w-1/5 flex justify-center">
        <img src="{{ asset('assets/images/Logopng.png') }}" class="w-fit h-12">
    </div>
    <div class=" w-screen text-center">
        <ul class="flex flex-row gap-14 justify-center">
            <li><a href="{{ route('penjual.addToko') }}">Home</a></li>
            <li><a href="{{route('login')}}">Menu</a></li>
            <li><a href="{{route('penjual.dashboard')}}">About</a></li>
        </ul>
    </div>
    <div class="w-1/5 flex text-center justify-center">
        <a href="{{route('login')}}" class=" hover:text-xl"><div>Login</div></a>
    </div>
    <div class="w-1/5 flex text-center justify-center">
        <a href="{{route('logout')}}" class=" hover:text-xl"><div>Logout</div></a>
    </div>

</div>
