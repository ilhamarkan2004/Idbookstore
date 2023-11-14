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
                                        <th scope="col" class="px-6 py-4">Kode Transaksi</th>
                                        <th scope="col" class="px-6 py-4">Customer</th>
                                        <th scope="col" class="px-6 py-4">Total Harga</th>
                                        <th scope="col" class="px-6 py-4">Status</th>
                                        <th scope="col" class="px-6 py-4">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $nomor_urut = 1; @endphp
                                    @foreach($transaksis as $transaksi)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $nomor_urut }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $transaksi['no_keranjang'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $transaksi->user->name }}</td>
                                        <td class="whitespace-nowrap px-6 py-4"> Rp{{ number_format($transaksi['total_harga'], 0, ',', '.') }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $transaksi['status'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="{{ route('transaksi.show', $transaksi) }}"
                                                class="text-blue-500 hover:underline mr-2">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            {{-- <a href="{{ route('buku.edit', $book) }}"
                                                class="text-yellow-500 hover:underline mr-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </a> --}}
                                            {{-- <form action="{{ route('buku.destroy',$book) }}" method="POST" class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form> --}}
                                        </td>
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
