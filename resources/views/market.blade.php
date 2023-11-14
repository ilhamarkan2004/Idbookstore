<x-app-layout class="">
    <x-slot name="header">
        <h2 class="text-2xl text-[18px] text-slate-800 font-bold text-center">Market Buku</h2>
        <p class="judul-4 text-[14px] text-center">Lorem ipsum dolor sit amet.</p>
    </x-slot>

    <div class="container bg-white mx-auto">



        <!-- Modal toggle -->
        <button data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="mx-auto block mb-6 text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            type="button"> Add Filters
          <i class="fa-solid fa-filter"></i>
        </button>

        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form class="relative bg-white rounded-lg shadow" method="GET" action="">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Filters
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center "
                            data-modal-hide="defaultModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <!-- Category options -->
                        <div class="flex flex-col">
                            <label class="mr-2 font-semibold">Category:</label>
                            <div class="flex flex-wrap space-x-4">
                                @foreach($kategoris as $kategori)
                                <div class="flex items-center">
                                    <input type="radio" id="{{$kategori->nama}}" name="categories" value="{{$kategori->nama}}"
                                        class="mr-2">
                                    <label for="{{$kategori->nama}}">{{$kategori->nama}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Price range filter -->
                        <div class="flex flex-col">
                            <label class="mr-2 font-semibold">Price Range:</label>
                            <div class="flex items-center mb-2">
                                <label id="lowToHighButton"
                                    class="border border-cyan-500 hover:bg-cyan-500 hover:text-white text-cyan-500 px-4 py-2 relative">
                                    Low to High

                                    <input type="radio" class="hidden" name="pricefilter" value="lowtohigh">
                            </label>
                                <label id="highToLowButton"
                                    class="border border-cyan-500 hover:bg-cyan-500 hover:text-white text-cyan-500 px-4 py-2 relative">
                                    High to Low
                                    <input type="radio" class="hidden" name="pricefilter" value="hightolow">
                        </label>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200">
                        <button data-modal-hide="defaultModal" type="submit"
                            class="text-white rounded-md bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium text-sm px-5 py-2.5">
                            Apply Filters
                        </button>
                        <button data-modal-hide="defaultModal" type="button"
                            class="text-gray-500 rounded-md bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-cyan-300 border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>




        @empty($buku)
        <p class="mt-14 text-center text-slate-800 text-sm font-semibold">Buku belum tersedia.</p>
        @else
        <div class="flex flex-wrap gap-2 lg:gap-5 xl:gap-10 justify-center">
            @foreach($buku as $b)
            <!-- CARD -->
            <div
                class="w-[175px] lg:w-48 xl:w-60 border-slate-100 bg-transparent rounded xl:rounded-lg shadow-lg shadow-slate-700 overflow-x-hidden">
                <a class="mb-2 p-3 block" href="{{route('market.show', $b->id)}}"> 
                    <img class="overflow-hidden h-60 w-full object-cover object-center"
                        src="{{ asset('storage/'. $b->fotobuku) }}" alt="Book image" />
                    <div class="px-3 pb-1">
                        <div class="">
                            <p class="text-lg lg:text-lg text-slate-900 font-semibold text-center mb-1">
                                {{ $b['judul'] }}</p>
                            <p class="text-xs lg:text-lg text-slate-800 text-center mb-2"> Rp
                                {{ number_format($b['harga'], 0, ',', '.') }}</p>
                            {{-- <a href="{{route('market.show', $b->id)}}" class="block text-center py-1 xl:py-1.5
                            rounded-lg border lg:border-primaryBtn bg-primary-200 hover:bg-white text-white
                            hover:text-primaryBtn">
                            Baca
                </a> --}}
            </div>
        </div>
        </a>
    </div>
    @endforeach
    </div>
    @endempty
    </div>
</x-app-layout>

<script>
    const lowToHighButton = document.getElementById('lowToHighButton');
    const highToLowButton = document.getElementById('highToLowButton');
    const lowToHighCheck = document.createElement('span');
    const highToLowCheck = document.createElement('span');

    lowToHighCheck.innerHTML = '&#10003;';
    lowToHighCheck.classList.add('absolute', 'top-0', 'right-0', 'text-white', 'mt-1', 'mr-1');
    lowToHighCheck.style.display = 'none';
    lowToHighButton.appendChild(lowToHighCheck);

    highToLowCheck.innerHTML = '&#10003;';
    highToLowCheck.classList.add('absolute', 'top-0', 'right-0', 'text-white', 'mt-1', 'mr-1');
    highToLowCheck.style.display = 'none';
    highToLowButton.appendChild(highToLowCheck);

    lowToHighButton.addEventListener('click', () => {
        lowToHighButton.classList.add('bg-cyan-700', 'text-white');
        lowToHighButton.classList.remove('border-cyan-700', 'hover:bg-cyan-500', 'hover:text-white');
        highToLowButton.classList.remove('bg-cyan-700', 'text-white');
        highToLowButton.classList.add('border-cyan-700', 'hover:bg-cyan-500', 'hover:text-white');
        lowToHighCheck.style.display = 'block';
        highToLowCheck.style.display = 'none';
    });

    highToLowButton.addEventListener('click', () => {
        highToLowButton.classList.add('bg-cyan-700', 'text-white');
        highToLowButton.classList.remove('border-cyan-700', 'hover:bg-cyan-500', 'hover:text-white');
        lowToHighButton.classList.remove('bg-cyan-700', 'text-white');
        lowToHighButton.classList.add('border-cyan-700', 'hover:bg-cyan-500', 'hover:text-white');
        highToLowCheck.style.display = 'block';
        lowToHighCheck.style.display = 'none';
    });

</script>
