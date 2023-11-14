<x-app-layout class="">
    <x-slot name="header">
        <h2 class="text-2xl text-[18px] text-slate-800 font-bold text-center">Koleksi Buku Anda</h2>
    </x-slot>

    <div class="container bg-white mx-auto">
        @empty($buku)
        <p class="mt-14 text-center text-slate-800 text-sm font-semibold">Buku belum tersedia.</p>
        @else

        @if (session()->has('success'))

            <div id="alert-3" class="flex p-4 mb-10  text-green-700 bg-green-100 rounded-lg" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session()->get('success') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8  "
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>


            @endif

        @if (session()->has('error'))
            <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 " role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session()->get('error') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 "
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            @endif
        <div class="flex flex-wrap gap-2 lg:gap-5 xl:gap-10 justify-center">
            @foreach($buku as $b)
            <!-- CARD -->
            <div
                class="w-[175px] lg:w-72 xl:w-90 border-slate-100 bg-transparent xl:rounded-xl shadow-lg shadow-slate-700 overflow-x-hidden">
                <div class=" p-4 ">
                    <img class="overflow-hidden h-80 w-full object-cover object-center"
                        src="{{ asset('storage/'. $b->fotobuku) }}" alt="Book image" />
                    <div class="">
                        <div class="">
                            <p class="text-lg lg:text-lg text-slate-900 font-semibold text-center mb-1">{{ $b->judul }}
                            </p>
                            <p class="text-xs text-slate-800 text-center mb-2">ISBN : {{$b->isbn}}</p>
                            <a href="{{$b->flipbook}}"
                                class="block text-center py-1 xl:py-1.5 rounded-lg border lg:border-cyan-600 bg-cyan-600 hover:bg-white text-white hover:text-cyan-600">
                                Baca
                            </a>


                            <!-- Modal toggle -->
                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                                class="block text-cyan-600 hover:text-cyan-800 font-medium rounded-lg text-sm lg:text-lg mx-auto text-center "
                                type="button">
                                <i class="fa-solid fa-comment-dots"></i>
                            </button>

                            <!-- Main modal -->
                            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow ">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center "
                                            data-modal-hide="authentication-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="px-6 py-6 lg:px-8">
                                            <h3 class="mb-4 text-xl font-medium text-gray-900 ">Tambah Ulasan</h3>
                                            <form class="space-y-6" method="POST" action="{{route('ulasan.store')}}">
                                                @csrf
                                                <div>
                                                    <label for="rating"
                                                        class="block mb-2 text-sm font-medium text-gray-900">Rating</label>
                                                    <div class="flex items-center justify-center">
                                                        <div class="flex">
                                                            <span
                                                                class="cursor-pointer text-3xl md:text-4xl lg:text-5xl"
                                                                data-value="1">★</span>
                                                            <span
                                                                class="cursor-pointer text-3xl md:text-4xl lg:text-5xl"
                                                                data-value="2">★</span>
                                                            <span
                                                                class="cursor-pointer text-3xl md:text-4xl lg:text-5xl"
                                                                data-value="3">★</span>
                                                            <span
                                                                class="cursor-pointer text-3xl md:text-4xl lg:text-5xl"
                                                                data-value="4">★</span>
                                                            <span
                                                                class="cursor-pointer text-3xl md:text-4xl lg:text-5xl"
                                                                data-value="5">★</span>
                                                        </div>
                                                        <input type="hidden" name="rating" id="rating-value" value="0">
                                                        <input type="hidden" name="buku_id"  value="{{$b->id}}">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="deskripsi"
                                                        class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                                                    <textarea type="text" name="deskripsi" id="deskripsi"
                                                        placeholder="Uraikan Ulasan"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block w-full p-2.5"
                                                        required></textarea>
                                                </div>

                                                <button type="submit"
                                                    class="w-full text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endempty
    </div>
    <script>
        // JavaScript untuk interaksi dengan bintang rating
        const stars = document.querySelectorAll('[data-value]');
        const ratingValueInput = document.getElementById('rating-value');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = parseInt(star.getAttribute('data-value'));
                stars.forEach(s => s.classList.remove('text-yellow-500'));
                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('text-yellow-500');
                }
                ratingValueInput.value = value;
            });
        });

    </script>
</x-app-layout>
