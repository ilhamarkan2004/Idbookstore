<x-app-layout class="overflow-x-hidden">
    <x-slot name="header" class="">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Daftar Kategori') }}
        </h2>
    </x-slot>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white">
            <div class="flex flex-col overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <a href="{{route('kategori.create')}}"
                            class="text-white w-full rounded-lg py-3 px-3 mt-4 bg-[#0e8f8f] text-xs hover:bg-white hover:text-[#0e8f8f] text-center">
                            <i class="fas fa-plus-circle mr-2"></i> Tambah Kategori
                        </a>
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-center">No</th>
                                        <th scope="col" class="px-6 py-4 text-center">Nama Kategori</th>
                                        <th scope="col" class="px-6 py-4 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)
                                    <tr class="text-black ">
                                        <td class="px-4 py-2 text-center">{{$kategori->id}}</td>
                                        <td class="px-4 py-2 text-center">{{$kategori->nama}}</td>
                                        <td class="px-4 py-2 text-center">
                                            <a href="{{ route('kategori.edit', $kategori) }}"
                                                class="text-blue-500 mr-1"><i
                                                    class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                                            <form class="inline-block ml-1" method="POST"
                                                action="{{ route('kategori.destroy', $kategori) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="inline text-red-500"
                                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                    <p class=" "><i class="fa-solid fa-trash-can "></i></p>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
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
