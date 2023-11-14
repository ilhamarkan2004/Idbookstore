<x-app-layout class="overflow-x-hidden">
    <x-slot name="header" class="">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Daftar Kontributor') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <a href="{{ route('kontributor.create') }}"
                            class="text-white w-full rounded-lg py-3 px-3 mt-4 bg-[#0e8f8f] text-xs hover:bg-white hover:text-[#0e8f8f] text-center">
                            <i class="fas fa-plus-circle mr-2"></i> Tambah Kontributor
                        </a>
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-center">No</th>
                                        <th scope="col" class="px-6 py-4 text-center">Nama Kontributor</th>
                                        <th scope="col" class="px-6 py-4 text-center">Nama Buku</th>
                                        <th scope="col" class="px-6 py-4 text-center">Kategori</th>
                                        <th scope="col" class="px-6 py-4 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter = 1;
                                    @endphp
                                    @foreach ($kontributors as $kontributor)
                                    <tr class="text-black">
                                        <td class="px-4 py-2 text-center">{{ $counter }}</td>
                                        <td class="px-4 py-2 text-center">{{ $kontributor->nama }}</td>
                                        <td class="px-4 py-2 text-center">{{ $kontributor->buku->judul }}</td>
                                        <td class="px-4 py-2 text-center">{{ $kontributor->kategori }}</td>
                                        <td class="px-4 py-2 text-center">
                                            <a href="{{ route('kontributor.edit', $kontributor) }}"
                                                class="text-blue-500 mr-1"><i
                                                    class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                            <form class="inline-block ml-1" method="POST"
                                                action="{{ route('kontributor.destroy', $kontributor) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="inline text-red-500"
                                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                    <p class=" "><i class="fa-solid fa-trash-can "></i></p>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                    $counter++;
                                    @endphp
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
