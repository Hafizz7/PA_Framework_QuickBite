<div class="fixed top-[10%] end-6 bg-[#3d68ff] h-[80%] mt-1 w-[34%] hidden sm:block shadow-xl rounded-xl">
    <div class="px-4 h-auto">
        <div class="">
            <h1 class="text-lg font-medium ">Keranjang Anda</h1>
        </div>
        <div class=" h-[75%] overflow-scroll overflow-x-hidden overflow-y-hidden">
            {{-- my path resources\views\pembeli\keranjang.blade.php --}}
            @foreach ($keranjangss as $index => $krj)
                <div class="w-full flex flex-row mb-2">
                    <div class="  w-[30%] mr-2 h-[30%]">
                        <img src="{{ asset('images/makanan/' . $krj->gambar) }}">
                    </div>
                    <div class=" w-full flex flex-col">
                        {{-- <h1 class="font-medium text-lg">{{Nasi goreng tanpa di goreng}}</h1> --}}
                        <h1 class="font-medium text-lg">{{ $krj->nama }}</h1>
                        <h1>Nasi goreng tanpa di goreng</h1>

                    </div>
                    <div class=" flex">
                        <h1 class="fixed flex end-[5%] font-medium text-base">120000</h1>
                        <div class="mt-2 flex flex-row px-2 items-center justify-center">
                            <button onclick="tambahNilai({{ $index }})">
                                <div class=" text-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </button>
                            <div class="px-1">
                                <h1 class="nilai" indexx={{ $index }}>{{ $krj->jumlah }}</h1>
                            </div>
                            <button onclick="kurangiNilai({{ $index }})">
                                <div class="text-black">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </button>
                            <script>
                                // var nilai = {{ $krj->jumlah }}; // Inisialisasi nilai awal

                                function tambahNilai(index) {
                                    // nilai += 1; // Menambah nilai
                                    updateNilai(index, 1); // Memperbarui tampilan nilai
                                }

                                function kurangiNilai(index) {
                                    // nilai -= 1; // Mengurangi nilai
                                    updateNilai(index, -1); // Memperbarui tampilan nilai
                                }

                                function updateNilai(index, change) {
                                    // Mengupdate tampilan nilai di dalam elemen dengan id "nilai"
                                    var element = document.querySelector('.nilai[indexx="' + index + '"]');
                                    var nilai = parseInt(element.innerText);
                                    nilai += change;
                                    element.innerText = nilai;
                                }
                            </script>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="absolute bottom-0 w-full px-4 py-2 h-[18%] mt-auto bg-stone-300">
        <div class="flex flex-row py-1">
            <h1>Total</h1>
            <h1 class="ml-auto text-2xl">18000</h1>
        </div>
        <a href="{{ route('pembeli.addPesanan') }}">
            <div class="bg-orange-600 w-full h-[55%] flex items-center justify-center">
                <h1>Tambahkan Ke Pesanan</h1>
            </div>
        </a>
    </div>
</div>
