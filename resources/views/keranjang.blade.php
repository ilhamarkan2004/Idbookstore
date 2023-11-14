<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{config('midtrans.client_key')}}"></script>
</head>

<x-app-layout>
    <div class="container mx-auto px-4 py-6 lg:py-8">
        <div class="flex items-center justify-between mb-6 lg:mb-8">
            <h2 class="text-2xl font-semibold leading-none">Keranjang</h2>
            @if($keranjang)
            <form class="inline ml-1 " method="POST" action="{{ route('keranjang.destroy', $keranjang->id) }}">
                @csrf
                @method('delete')

                <button class="text-indigo-500 hover:text-indigo-600 font-semibold"
                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                    Bersihkan Semua
                </button>
            </form>
            @else
            @endif
        </div>
        <div class=" overflow-hidden">
            <!-- Item -->
            @if(!$keranjang)
            <p class="text-center mt-7 font-semibold text-black">Anda belum memilih produk</p>
            @else
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
            <div class="  pl-6 pr-2 lg:pr-4 xl:pr-6 2xl:pr-10 py-4 border-b shadow-sm border-slate-300">
                @foreach($bukus as $buku)
                <div class="mt-2 mb-10">
                    <div class="flex ">
                        <img src="{{ asset('storage/'. $buku->fotobuku) }}" alt="Product"
                            class="w-12 h-12 rounded-full lg:w-24 lg:h-24 ">
                        <div class="ml-4 items-center my-auto w-full">
                            <h3 class="text-lg lg:text-2xl font-semibold leading-none">{{$buku->judul}}</h3>
                            <p class="text-gray-600 text-sm lg:text-base">{{$buku->jumlah}} x
                                {{"Rp " . number_format($buku->harga, 0, ',', '.');}}</p>
                        </div>
                        <div class="my-auto  items-center float-right w-full ">
                            <p class="text-gray-500 font-semi-bold text-sm lg:text-base float-right ">
                                {{"Rp " . number_format($buku->total_harga, 0, ',', '.');}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="w-full  mx-auto">
            <div class="flex my-5">
                <div class="pl-6 pr-2 lg:pr-4 xl:pr-6 2xl:pr-10 py-4 w-full ">
                    <p class="text-sm my-2.5">Sub Total Produk</p>
                    <p class="text-sm my-2.5">Diskon</p>
                    <p class="font-semibold font-sans text-base my-4">Total Pembayaran</p>
                </div>
                <div class="pl-6 pr-2 lg:pr-4 xl:pr-6 2xl:pr-10 py-4 w-full  float-right">
                    <div class="float-right ">
                        <p class="text-sm my-2.5 "> {{"Rp " . number_format($keranjang->total_harga, 0, ',', '.');}}</p>
                        <p class="text-sm my-2.5  "> Rp 0
                        </p>
                        <p class="font-semibold font-sans text-base my-4 ">
                            {{"Rp " . number_format($keranjang->total_harga, 0, ',', '.');}}</p>
                    </div>
                </div>
            </div>
            <button id="pay-button" class="bg-cyan-600 text-white p-2  lg:mr-4  rounded-lg hover:bg-cyan-800 float-right">Bayar
                Sekarang</button>
    </div>



    @endif
    </div>
    </div>
    @if($keranjang)
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snapToken}}', {
                onSuccess: function (result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    window.location.href = '/transaction/{{$keranjang->no_keranjang}}'
                    console.log(result);
                },
                onPending: function (result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function (result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function () {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
    @endif
</x-app-layout>
</html>
