<x-app-layout class="overflow-x-hidden">
    <x-slot name="header" class="">
        <h2 class="font-semibold text-xl text-white  leading-tight">
            {{ __('Daftar Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8 mt-10">
                        <div class="overflow-x-auto mt-5">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">#</th>
                                        <th scope="col" class="px-6 py-4">Judul</th>
                                        <th scope="col" class="px-6 py-4">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $nomor_urut = 1; @endphp
                                    @foreach($books as $book)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $nomor_urut }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $book['judul'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">Rp {{ number_format($book['harga'], 0, ',', '.') }}</td>
                                    </tr>
                                    @php $nomor_urut++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
