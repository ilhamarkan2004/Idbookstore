<x-app-layout>

    <section class="container flex justify-center pt-16 mb-20 overflow-x-hidden">
        <div class="container">
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
            <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 " role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session()->get('error') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8  "
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif
            <h2 class="text-xl tracking-wide break-words container text-center font-extrabold text-black">
                {{$buku->judul}}
            </h2>
            <div class="mt-10">
                <div class="md:flex">
                    <img src="{{ asset('storage/'. $buku->fotobuku)  }}" alt=" Gambar produk"
                        class="md:mx-8 mx-auto max-w-sm w-full rounded-md">

                    <div class="w-screen mb-16 xl:flex">

                        <div>
                            <div>
                                <h2 class="ml-12 text-lg font-bold mb-4">Detail</h2>
                            </div>
                            <div class="flex ml-12">
                                <div class="w-52">
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Jumlah Halaman</p>
                                    <p class="text-slate-800 mb-4 text-base">{{ $buku['halaman'] }}</p>
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Tanggal Terbit</p>
                                    <p class="text-slate-800 mb-4 text-base">{{ $buku['tanggal_terbit'] }}</p>
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">ISBN</p>
                                    <p class="text-slate-800 mb-4 text-base">{{ $buku['isbn'] }}</p>
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Bahasa</p>
                                    <p class="text-slate-800 mb-4 text-base">{{ $buku['bahasa'] }}</p>
                                    <form
                                        class=" mt-3 block text-center w-32 py-1 xl:py-1.5 rounded-lg border text-xs bg-cyan-700 hover:bg-cyan-800 text-white hover:text-slate-300"
                                        method="POST" action="{{route('keranjang.store')}}">
                                        @csrf
                                        <input type="text" name="id" class="hidden" value="{{$buku->id}}">
                                        <button class=" w-full  " type="submit">
                                            Beli Sekarang
                                        </button>
                                    </form>
                                </div>
                                <div class="w-52">
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Penerbit</p>
                                    <p class="text-slate-800 mb-4 text-base">{{ $buku['penerbit'] }}</p>
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Berat</p>
                                    <p class="text-slate-800 mb-4 text-base">{{ $buku['berat'] }} g</p>
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Lebar</p>
                                    <p class="text-slate-800 mb-4 text-base">{{ $buku['lebar'] }} cm</p>
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Panjang</p>
                                    <p class="text-slate-800 mb-4 text-base">{{ $buku['panjang'] }} cm</p>
                                </div>
                            </div>
                        </div>
                        <div class="ml-12 xl:ml-20 mt-8 xl:mt-[0px]">
                            <h2 class="text-lg font-bold mb-4">Kontributor</h2>
                            <div class="md:w-1/3">
                                <div class="w-52">
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Penulis</p>
                                    <ol class="mb-4">
                                        @php $counter = 1; @endphp
                                        @if ($penulis)
                                        @foreach($penulis as $pen)
                                        <li class="block text-slate-800 mb-0.5 text-base">{{ $counter }}.
                                            {{ $pen->nama }}</li>
                                        @php $counter++; @endphp
                                        @endforeach
                                        @endif
                                    </ol>

                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Editor</p>
                                    <ol class="mb-4">
                                        @php $counter = 1; @endphp
                                        @if ($editor)
                                        @foreach($editor as $ed)
                                        <li class="block text-slate-800 mb-0.5 text-base">{{ $counter }}.
                                            {{ $ed->nama }}</li>
                                        @php $counter++; @endphp
                                        @endforeach
                                        @endif
                                    </ol>
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Design Cover</p>
                                    <ol class="mb-4">
                                        @php $counter = 1; @endphp
                                        @if ($designCover)
                                        @foreach($designCover as $des)
                                        <li class="block text-slate-800 mb-0.5 text-base">{{ $counter }}.
                                            {{ $des->nama }}</li>
                                        @php $counter++; @endphp
                                        @endforeach
                                        @endif
                                    </ol>
                                    <p class="text-slate-800 mb-0.5 text-xs font-semibold">Layout</p>
                                    <ol class="mb-4">
                                        @php $counter = 1; @endphp
                                        @if ($layout)
                                        @foreach($layout as $lay)
                                        <li class="block text-slate-800 mb-0.5 text-base">{{ $counter }}.
                                            {{ $lay->nama }}</li>
                                        @php $counter++; @endphp
                                        @endforeach
                                        @endif
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-6 xs:max-w-sm p-12 md:mx-8 xl:max-w-none mx-auto">
                <h2 class="text-lg font-bold text-slate-800 mb-2 break-words">Deskripsi Buku</h2>
                <p class="text-slate-800 mt-2 break-words text-justify">{{ $buku['deskripsi'] }}</p>
            </div>
            <!-- Tampilkan semua review saat tombol "Baca Selengkapnya" ditekan -->
            <div id="reviews-container" class="xs:max-w-sm p-12 md:mx-8 xl:max-w-none mx-auto">
                <h2 class="text-lg font-bold text-slate-800 mb-4 break-words">Review Buku</h2>
                <div id="review-list">
                    @foreach($reviews as $review)
                    <div class="review bg-white px-0 py-1 mb-1.5" data-rating="{{ $review->rating }}">
                        <p class="font-semibold text-gray-800">{{$review->user->name}}</p>
                        <div class="flex items-center">
                            <div class="star-rating text-yellow-500"></div>
                        </div>
                        <p class="text-gray-700 mt-2 text-justify">{{$review->deskripsi}} </p>
                    </div>
                    @endforeach
                </div>
                <p id="show-more-button" class="mt-4 cursor-pointer hover:underline text-cyan-700 text-center lg:text-start hover:text-cyan-800">
                    Baca Selengkapnya
                </p>
            </div>
        </div>
    </section>

    <script>
        let allReviewsVisible = false; // Menyimpan status apakah semua review sudah ditampilkan

        // Fungsi untuk menampilkan semua review
        function showAllReviews() {
            const reviewList = document.getElementById("review-list");
            reviewList.querySelectorAll(".review").forEach(review => {
                review.style.display = "block";
            });

            // Sembunyikan tombol "Baca Selengkapnya" setelah semua review ditampilkan
            const showMoreButton = document.getElementById("show-more-button");
            showMoreButton.style.display = "none";

            allReviewsVisible = true;
        }

        // Fungsi untuk menghasilkan bintang rating berdasarkan nilai rating
        function generateStarRating(rating, container) {
            const maxRating = 5;
            let starRating = '';
            for (let i = 1; i <= maxRating; i++) {
                if (i <= rating) {
                    starRating += '<i class="fas fa-star text-yellow-500"></i>';
                } else {
                    starRating += '<i class="far fa-star text-yellow-500"></i>';
                }
            }
            container.innerHTML = starRating;
        }

        // Tambahkan event listener untuk tombol "Baca Selengkapnya"
        const showMoreButton = document.getElementById("show-more-button");
        showMoreButton.addEventListener("click", function () {
            if (!allReviewsVisible) {
                showAllReviews();
            }
        });

        // Sembunyikan semua review kecuali dua pertama saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function () {
            if (!allReviewsVisible) {
                const reviewList = document.getElementById("review-list");
                const reviews = reviewList.querySelectorAll(".review");
                for (let i = 2; i < reviews.length; i++) {
                    reviews[i].style.display = "none";
                }
            }

            // Generate star ratings for visible reviews
            const visibleReviews = document.querySelectorAll(".review");
            visibleReviews.forEach(review => {
                const rating = parseInt(review.getAttribute("data-rating"));
                const starContainer = review.querySelector(".star-rating");
                generateStarRating(rating, starContainer);
            });
        });

    </script>
</x-app-layout>
