<x-app-layout>
    <div class="bg-white overflow-x-hidden">
        <div
            class="fixed right-10 bottom-10 z-50 hover:scale-110 transition-transform duration-300 ease-in-out animate-bounce">
            <a href="https://api.whatsapp.com/send?phone=6285171670522" target="_blank" rel="noopener noreferrer"
                class=" text-white py-2 px-6 ">
                <img src="/build/assets/images/wa.svg" class="w-[40px] lg:w-[50px] xl:w-[56px]" alt="">
            </a>
        </div>


        @if (session()->has('success'))

        <div id="alert-3" class="flex p-4 mb-10  text-green-700 bg-green-100 rounded-lg " role="alert">
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
                class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 "
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
        <!-- Section 1 -->
        <div class=" w-screen  ">
            <div class="md:flex ">
                <div class="  container p-8  md:w-1/2 mb-3 flex ">
                    <img data-aos="zoom=in" src="/build/assets/images/gf.gif" alt=""
                        class="rounded-full my-auto w-96 xl:w-full mx-auto  ">
                </div>
                <div data-aos="fade-left"
                    class="mt-3 container  md:w-1/2 lg:px-36 p-12 xs:px-28 md:mt-0 lg:w-max-md xl:px-48">
                    <h1 class=" text-4xl md:text-6xl font-extrabold text-black mb-6"><span>Harga</span> <span
                            class="text-cyan-500">Terbaik</span> Untuk Buku <span class="text-cyan-500">Favorit
                        </span>Anda</h1>
                    <p class="text-black text-sm lg:text-lg mb-8 text-justify">Berkarya, terbitkan, dan berbagi
                        pengetahuan bersama Penulis Cerdas Indonesia

                    </p>
                    <form class="container p-2" action="/market" method="get">
                        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Your
                            Email</label>
                        <div class="relative  ">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" id="search"
                                class=" bg-slate-100 block p-4 pl-10 w-full text-sm text-black  rounded-full border border-gray-300 focus:ring-cyan-500 focus:border-cyan-500"
                                placeholder="Cari Buku" name="search" required autocomplete="off">
                            <button type="submit"
                                class="text-yellow-300 absolute right-1 bottom-2.5 bg-cyan-500 hover:bg-cyan-700 hover:text-slate-200 focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-full text-sm px-4 py-2"><i
                                    class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Section 1  -->


        <hr class="border-t-1 my-2 shadow-lg shadow-slate-500 border-slate-300">

        <!-- Section 2  -->
        <div class=" w-screen  mt-8 mb-12 bg-[url('/build/assets/images/bg.gif')] bg-cover ">
            <h1 data-aos="fade-up"
                class="  text-4xl font-extrabold text-black px-12 sm:px-10 md:text-6xl  text-center tracking-wider">
                Mengapa
                <span class="text-cyan-500">Memilih </span> Idbookstore?</h1>
            <p data-aos="fade-up"
                class=" text-black mt-5 w-sm text-center py-5 px-10 md:px-24 lg:px-40 text-sm md:text-md lg:text-lg ">
                Penulis Cerdas Indonesia salah satu produk unggulan
                yang berfokus sebagai Pengelolaan dan Pengembangan
                Buku yang mendukung digitalisasi transformasi yang telah
                terintegrasi dengan website, Buku yang diterbitkan bersifat
                interaktif dengan ‘Smart Fitur’ untuk mendukung
                kemudahan pemahaman pembaca dalam memahami
                buku.</p>

            <!-- Container Card -->
            <div class="lg:flex flex-wrap gap-6">
                <!-- Card  -->
                <div data-aos="flip-left" class=" max-w-sm  mx-auto  p-12 bg-white">
                    <div class="relative pt-7 top-24">
                        <img src="/build/assets/images/Ellipse 57.png" alt=""
                            class="absolute top-0 left-1/2 -translate-x-1/2 ">
                        <img src="/build/assets/images/obj1.png" alt="" class="rounded-full mx-auto w-48">
                        <button
                            class="p-2 absolute text-white bg-cyan-600 hover:bg-cyan-800 hover:text-slate-300 focus:ring-4 rounded-2xl font-semibold -bottom-72 left-1/2 -translate-x-1/2">Order
                            Now</button>
                    </div>
                    <div class=" container rounded-2xl  w-sm h-[360px] shadow-lg shadow-slate-800 bg-white ">
                        <div class="container flex ">
                            <p class=" mt-28 mx-auto text-black">⭐ (4,5)</p>
                        </div>
                        <h3 class="font-bold text-xl text-center mt-3 text-black">Beras</h3>
                        <p class="text-black  p-8 text-center text-sm md:text-md">Buat buku berkualitas profesional dan
                            nikmati kontrol kreatif dari awal hingga akhir dengan perangkat lunak desain gratis kami</p>
                    </div>
                </div>


                <div data-aos="flip-left" class=" max-w-sm  mx-auto  p-12 bg-white">
                    <div class="relative pt-7 top-24">
                        <img src="/build/assets/images/Ellipse 57.png" alt=""
                            class="absolute top-0 left-1/2 -translate-x-1/2 ">
                        <img src="/build/assets/images/obj1.png" alt="" class="rounded-full mx-auto w-48">
                        <button
                            class="p-2 absolute text-white bg-cyan-600 hover:bg-cyan-800 hover:text-slate-300 focus:ring-4 rounded-2xl font-semibold -bottom-72 left-1/2 -translate-x-1/2">Order
                            Now</button>
                    </div>
                    <div class=" container rounded-2xl  w-sm h-[360px] shadow-lg shadow-slate-800 bg-white ">
                        <div class="container flex ">
                            <p class=" mt-28 mx-auto text-black">⭐ (4,5)</p>
                        </div>
                        <h3 class="font-bold text-xl text-center mt-3 text-black">Beras</h3>
                        <p class="text-black  p-8 text-center text-sm md:text-md">Daftarkan jurnal dan buku Anda dalam
                            beberapa klik dan jual ke audiens melalui pasar</p>
                    </div>
                </div>

                <div data-aos="flip-left" class=" max-w-sm  mx-auto  p-12 bg-white">
                    <div class="relative pt-7 top-24">
                        <img src="/build/assets/images/Ellipse 57.png" alt=""
                            class="absolute top-0 left-1/2 -translate-x-1/2 ">
                        <img src="/build/assets/images/obj1.png" alt="" class="rounded-full mx-auto w-48">
                        <button
                            class="p-2 absolute text-white bg-cyan-600 hover:bg-cyan-800 hover:text-slate-300 focus:ring-4 rounded-2xl font-semibold -bottom-72 left-1/2 -translate-x-1/2">Order
                            Now</button>
                    </div>
                    <div class=" container rounded-2xl  w-sm h-[360px] shadow-lg shadow-slate-800 bg-white ">
                        <div class="container flex ">
                            <p class=" mt-28 mx-auto text-black">⭐ (4,5)</p>
                        </div>
                        <h3 class="font-bold text-xl text-center mt-3 text-black">Beras</h3>
                        <p class="text-black  p-8 text-center text-sm md:text-md">Lorem ipsum dolor sit amet. Lorem
                            ipsum dolor sit amet. Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    </div>
                </div>
                <!-- End Card  -->

            </div>

            <!-- End Container Card -->
        </div>
        <!-- End Section 2  -->

        <hr class="border-t-1 my-2 shadow-lg shadow-slate-500 border-slate-300">


        <!-- Section 3 -->
        <div class="mt-24 mb-16 ">
            <h1 data-aos="fade-up"
                class=" mb-8 md:mb-12 lg:mb-20 lg:14 text-4xl font-extrabold text-black px-12 sm:px-10 md:text-6xl  text-center tracking-wider">
                Kategori
                <span class="text-cyan-500"> Buku </span> Yang Kami Miliki</h1>

            <div
                class="container max-w-xs mx-auto block sm:max-w-none mb-5 rounded sm:rounded-lg sm:flex flex-wrap justify-center gap-6">
                @foreach($categories as $kategori)
                <a class="px-2.5 py-4 shadow-lg border-slate-700 bg-cyan-500 font-semibold rounded block sm:w-60 text-center mb-5 sm:mb-0 
           transform transition-transform duration-500 hover:scale-110 hover:text-xl hover:bg-cyan-700"
                    href="{{ route('market.index', ['categories' => $kategori->nama]) }}">
                    {{ $kategori->nama }}
                </a>
                @endforeach
            </div>

        </div>
        <!-- End Section 3 -->

        <hr class="border-t-1 shadow-lg shadow-slate-500 border-slate-300 mt-40 mb-10">


        <!-- Section 4 -->
        <div class="mt-24 mb-16 ">
            <img data-aos="zoom-in-left" src="/build/assets/images/hr.jpg" alt="Hokky Market"
                class="md:mx-10 rounded-full w-72 md:w-96 lg:w-[450px] xl:w-[580px] mx-auto sm:w-80 md:float-right ">
            <div data-aos="fade-up" class="md:w-1/2 mx-12 mt-16 md:mt-6 ">
                <h1 class="text-4xl text-black font-extrabold leading-normal mb-10 md:text-6xl">Kami Telah <span
                        class="text-cyan-500">Menerbitkan</span> Lebih Dari<span class="text-cyan-500"> 100+</span> Buku
                </h1>
                <p class="text-black md:text-md lg:text-lg">Daftarkan jurnal dan buku Anda dalam beberapa klik dan jual
                    ke audiens melalui marketplace. Berperan sebagai platform buku digital interaksi sekaligus
                    marketplace yang menyediakan proses penerbitan buku
                    dosen dan guru se Indonesia.
                </p>
                <div class="mt-12 md:flex">
                    <div class="md:mr-10">
                        <p class="text-black my-4"><img class="inline mr-2" src="/build/assets/images/1.png"
                                alt="">Online Order</p>
                        <p class="text-black my-4"><img class="inline mr-2" src="/build/assets/images/2.png"
                                alt="">Payment Later</p>
                        <p class="text-black my-4"><img class="inline mr-2" src="/build/assets/images/3.png" alt="">24/7
                            Service</p>
                    </div>
                    <div>
                        <p class="text-black my-4"><img class="inline mr-2" src="/build/assets/images/2.png"
                                alt="">Clean Market</p>
                        <p class="text-black my-4"><img class="inline mr-2" src="/build/assets/images/2.png" alt="">Good
                            Quality</p>
                        <p class="text-black my-4"><img class="inline mr-2" src="/build/assets/images/2.png"
                                alt="">Affordable Prices
                        </p>
                    </div>
                </div>
                <button
                    class="mt-5 p-2 font-semibold text-white bg-cyan-600 hover:bg-cyan-800 focus:ring-4 rounded-2xl">About
                    Us</button>
            </div>
        </div>
        <!-- End Section 3 -->

        <hr class="border-t-1 shadow-lg shadow-slate-500 border-slate-300 mt-40 mb-10">


        <!-- Footer -->
        <div class="w-screen md:flex mt-36 mb-16">
            <div class="ml-12 w-60 mr-28 md:w-1/3">
                <h1 class="text-xl font-bold text-cyan-500 mb-10">Idbookstore</h1>
                <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum laboriosam
                    expedita,
                    neque pariatur minus aut.</p>
                <div class="tracking-wider mt-5">
                    <a class="fa-brands fa-whatsapp text-xl text-emerald-600 mx-1.5 cursor-pointer"></a>
                    <a class="fa-brands fa-facebook text-xl text-emerald-600 mx-1.5 cursor-pointer"></a>
                    <a class="fa-brands fa-instagram text-xl text-emerald-600 mx-1.5 cursor-pointer"
                        href="https://www.instagram.com/idbookstore.id/"></a>
                </div>
            </div>
            <div class="flex ml-12 mt-14 md:w-1/3">
                <div class="w-52">
                    <h4 class="text-lg font-bold text-cyan-500 mb-6">About Us</h4>
                    <p class="text-black mb-3">About Us</p>
                    <p class="text-black mb-3">Service Us</p>
                    <p class="text-black mb-3">Contact</p>
                    <p class="text-black mb-3">Company</p>
                </div>
                <div class="w-52 ">
                    <h4 class="text-lg font-bold text-cyan-500 mb-6">Company</h4>
                    <p class="text-black mb-3">Partnership</p>
                    <p class="text-black mb-3">Term of Us</p>
                    <p class="text-black mb-3">Privacy</p>
                    <p class="text-black mb-3">Sitemap</p>
                </div>
            </div>
            <div class="ml-12 mt-14 w-52 md:w-1/3 md:mr-20">
                <h4 class="text-lg font-bold text-cyan-500 mb-10">Get In Touch</h4>
                <p class="text-black"> Lorem ipsum dolor sit amet consectetur dolor sit amet consectetur
                    adipisicing
                    elit. Cumque, quis.</p>
            </div>
        </div>
        <p class="text-center text-sm my-10">©2023 Idbookstore</p>
        <!-- End Footer  -->
    </div>


</x-app-layout>
