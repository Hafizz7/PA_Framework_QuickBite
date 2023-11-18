<div class="flex flex-row p-2 justify-center  w-full items-center bg-[#D9FFB0] sticky top-0 z-10">
    <div class=" w-1/5 flex justify-center">
        <a href="/"><img src="{{ asset('assets/images/Logopng.png') }}" class="w-fit h-12"></a>
    </div>
    <div class=" w-screen text-center">
        <ul class="flex flex-row gap-14 justify-center underline-offset-2">
            <li class="hover:underline hover:text-[#84B74E]"><a href="/#">Home</a></li>
            <li class="hover:underline hover:text-[#84B74E]"><a href="/#toko">Toko</a></li>
            <li class="hover:underline hover:text-[#84B74E]"><a href="/#">About</a></li>
        </ul>
    </div>
    <div class="w-1/5 flex text-center justify-center">
        @guest
            <a href="{{ route('login') }}" class="hover:text-xl">
                <div>Login</div>
            </a>
        @endguest
        @auth
            @if(Auth::user()->role == 'pembeli')
                <a href="{{ route('profile.edit')}}" class="transition-transform transform hover:scale-105  hover:text-[#84B74E] mr-4">
                    <div>{{ ucfirst(Auth::user()->username) }}</div>
                </a>
            @endif
            @if(Auth::user()->role == 'penjual')
            <a href="{{ route('penjual.dashboard') }}" class="transition-transform transform hover:scale-105  hover:text-[#84B74E] mr-4">
                <div>{{ ucfirst(Auth::user()->username) }}</div>
            </a>
            @endif
        <a href="{{ route('logout') }}" class="transition-transform transform hover:scale-105 hover:text-[#84B74E]">
            <div>Logout</div>
        </a>
        @endauth
    </div>
    @auth

    <div class="text-black">
        <button id="toggleButton">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
        </button>

    </div>
        <div id="smallBox">
            <div id="navbarContent" style="display: none;">
                @include('pembeli.keranjang')
            </div>
        </div>
    @endauth
</div>

<script>
    document.getElementById('toggleButton').addEventListener('click', function(event) {
        var navbarContent = document.getElementById('navbarContent');
        navbarContent.style.display = (navbarContent.style.display === 'none' || navbarContent.style.display ===
            '') ? 'block' : 'none';

        // Menghentikan event dari menyebabkan efek "penutupan" jika tombol toggle diklik
        event.stopPropagation();
    });

    // Menambahkan event listener ke dokumen
    document.addEventListener('click', function(event) {
        var navbarContent = document.getElementById('navbarContent');

        // Memeriksa apakah klik dilakukan di luar elemen yang ingin di-toggle
        if (event.target !== navbarContent && !navbarContent.contains(event.target)) {
            navbarContent.style.display = 'none';
        }
    });
</script>

