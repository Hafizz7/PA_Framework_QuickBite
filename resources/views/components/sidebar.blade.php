
    <aside class="fixed bg-[#3d68ff] h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{route('penjual.TokoTertentu')}}"
                class="flex items-center text-white hover:opacity-100 py-4 pl-6 hover:bg-[#1947ee]">
                <i class="fas fa-sticky-note mr-3"></i>
                Toko
            </a>
            <a href="{{route('penjual.menu')}}"
                class="flex items-center text-white hover:opacity-100 py-4 pl-6 hover:bg-[#1947ee]">
                <i class="fas fa-sticky-note mr-3"></i>
                Menu
            </a>
            <a href="{{route('penjual.makanan')}}"
                class="flex items-center text-white hover:opacity-100 py-4 pl-6 hover:bg-[#1947ee]">
                <i class="fas fa-table mr-3"></i>
                Makanan
            </a>
            <a href="{{route('pembeli.getDataPesananKuyyy')}}" class="flex items-center text-white py-4 pl-6 hover:bg-[#1947ee]">
                <i class="fas fa-align-left mr-3"></i>
                Pesanan
            </a>
        </nav>
        <a href="{{route('logout')}}"
            class="absolute w-full bg-[#1947ee] hover:bg-[#0038fd] bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>Logout
        </a>
    </aside>
