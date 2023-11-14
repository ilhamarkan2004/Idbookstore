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
                        <a href="{{ route('buku.create') }}"
                            class="text-white w-full rounded-lg py-3 px-3 mt-4 bg-[#0e8f8f] text-xs hover:bg-white hover:text-[#0e8f8f] text-center">
                            <i class="fas fa-plus-circle mr-2"></i> Tambah Buku
                        </a>
                        <div class="overflow-x-auto mt-5">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">#</th>
                                        <th scope="col" class="px-6 py-4">Gambar</th>
                                        <th scope="col" class="px-6 py-4">Judul</th>
                                        <th scope="col" class="px-6 py-4">Halaman</th>
                                        <th scope="col" class="px-6 py-4">Penerbit</th>
                                        <th scope="col" class="px-6 py-4">Tanggal Terbit</th>
                                        <th scope="col" class="px-6 py-4">ISBN</th>
                                        <th scope="col" class="px-6 py-4">Bahasa</th>
                                        <th scope="col" class="px-6 py-4">Harga</th>
                                        <th scope="col" class="px-6 py-4">Stok</th>
                                        <th scope="col" class="px-6 py-4">Panjang</th>
                                        <th scope="col" class="px-6 py-4">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $nomor_urut = 1; @endphp
                                    @foreach($books as $book)
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $nomor_urut }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <img class="overflow-hidden h-24 w-full object-cover object-center"
                                                src="{{ asset('storage/' . $book['fotobuku']) }}"
                                                alt="product image" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $book['judul'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $book['halaman'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $book['penerbit'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $book['tanggal_terbit'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $book['isbn'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $book['bahasa'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">Rp {{ number_format($book['harga'], 0, ',', '.') }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $book['stok'] }}</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $book['panjang'] }}cm</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="{{ route('kontributor.index', $book) }}"
                                                class="text-blue-500 hover:underline mr-2">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('buku.edit', $book) }}"
                                                class="text-yellow-500 hover:underline mr-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('buku.destroy',$book) }}" method="POST" class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
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
