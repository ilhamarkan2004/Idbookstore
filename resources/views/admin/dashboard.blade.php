<x-app-layout class="overflow-x-hidden">
    <x-slot name="header" class="bg-white">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Welcome Admin!') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-center">No</th>
                                        <th scope="col" class="px-6 py-4 text-center">Halaman</th>
                                        <th scope="col" class="px-6 py-4 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-center">1</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-center">Kategori</td>
                                        <td class="px-4 py-2 text-center"><a href="{{ route('kategori.index') }}" class="text-blue-500 mr-1"><i class="fa-solid fa-eye"></i></a></td>

                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-center">2</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-center">Buku</td>
                                         <td class="px-4 py-2 text-center"><a href="{{ route('buku.index') }}" class="text-blue-500 mr-1"><i class="fa-solid fa-eye"></i></a></td>


                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-center">2</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-center">Transaksi</td>
                                         <td class="px-4 py-2 text-center"><a href="{{ route('transaksi.index') }}" class="text-blue-500 mr-1"><i class="fa-solid fa-eye"></i></a></td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
