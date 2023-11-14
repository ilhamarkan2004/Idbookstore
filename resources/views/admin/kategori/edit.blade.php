<x-app-layout>
    <x-slot name="header" class="bg-[#0D0D0D]">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-8 rounded ">
                        <h1 class="font-medium text-3xl">Edit Category</h1>
                        <p class="text-gray-600 mt-6">Jika ingin mengubah data kategori , maka isilah beberapa form di
                            bawah ini</p>
                        <form method="POST" action="{{ route('kategori.update',$kategori) }}">
                            @csrf
                            @method('patch')
                            <div class="mt-8 grid lg:grid-cols-2 gap-4">
                                <div> <label for="nama"
                                        class="text-sm text-gray-700 block mb-1 font-medium">Nama</label> <input
                                        value="{{ old('nama', $kategori->nama) }}" type="text" name="nama" id="nama"
                                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Nama Kategori" /> </div>

                            </div>
                            <div class="space-x-4 mt-8"> <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Save</button>
                                <!-- Secondary --> <a href="{{route('kategori.index')}}"
                                    class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
