<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg bg-white">
                <div class="p-6 text-gray-900">
                    <div class="p-8 rounded">
                        <h1 class="font-medium text-3xl">Edit Buku</h1>
                        <p class="text-gray-600 mt-6">Jika ingin menambahkan buku baru, maka isilah beberapa form di
                            bawah ini</p>
                        <form method="POST" action="{{ route('buku.update',$buku) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="mt-8 grid lg:grid-cols-3 gap-4">
                                <div>
                                    <label for="judul"
                                        class="text-sm text-gray-700 block mb-1 font-medium">Judul</label>
                                    <input type="text" name="judul" id="judul"
                                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                        placeholder="Judul Buku" value=" {{ old('judul',$buku->judul) }}" />
                                    @error('judul')
                                    <p class="text-red-500 mt-2">{{$message}}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="halaman" class="text-sm text-gray-700 block mb-1 font-medium">Jumlah
                                        Halaman</label>
                                    <input type="number" name="halaman" id="halaman" min="0"
                                        class="w-20 bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 "
                                        value=" {{ old('halaman',$buku->halaman) }}" />
                                    @error('halaman')
                                    <p class="text-red-500 mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="stok" class="text-sm text-gray-700 block mb-1 font-medium">Jumlah
                                        stok</label>
                                    <input type="number" name="stok" id="stok" min="0"
                                        class="w-20 bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 "
                                        value=" {{ old('stok',$buku->stok) }}" />
                                    @error('stok')
                                    <p class="text-red-500 mt-2">{{$message}}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="tanggal_terbit"
                                        class="text-sm text-gray-700 block mb-1 font-medium">Tanggal Penerbitan</label>
                                    <input type="date" name="tanggal_terbit" id="tanggal_terbit" min="0"
                                        class="w-64 bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 "
                                        value=" {{ old('tanggal_terbit',$buku->tanggal_terbit) }}" />
                                    @error('tanggal_terbit')
                                    <p class="text-red-500 mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="bahasa"
                                    class="text-sm text-gray-700 block mb-1 mt-4 font-medium">Bahasa</label>
                                <select name="bahasa"
                                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example">
                                    <option class="font-bold ">Pilih Bahasa</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Inggris">Inggris</option>
                                </select>
                                @error('bahasa')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tipe" class="text-sm text-gray-700 block mb-1 mt-4 font-medium">Tipe</label>
                                <select name="tipe"
                                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example">
                                    <option class="font-bold ">Pilih Tipe</option>
                                    <option value="gratis">Gratis</option>
                                    <option value="berbayar">Berbayar</option>
                                </select>
                                @error('tipe')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="penerbit"
                                    class="text-sm text-gray-700 block mb-1 mt-4 font-medium">Penerbit</label>
                                <select name="penerbit"
                                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example">
                                    <option class="font-bold ">Pilih Penerbit</option>
                                    <option value="CV. Penulis Cerdas Indonesia">CV. Penulis Cerdas Indonesia</option>
                                </select>
                                @error('penerbit')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="kategori_id"
                                    class="text-sm text-gray-700 block mb-1 mt-4 font-medium">Kategori</label>
                                <select name="kategori_id"
                                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    aria-label="Default select example">
                                    <option class="font-bold ">Pilih kategori</option>
                                    @foreach($kategoris as $kategori)
                                    <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="flipbook" class="text-sm text-gray-700 block mb-1 mt-4 font-medium">URL
                                    Flipbook</label>
                                <input type="text" name="flipbook" id="flipbook"
                                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    placeholder="URL Flipbook" value=" {{ old('flipbook',$buku->flipbook) }}" />
                                @error('flipbook')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="isbn" class="text-sm text-gray-700 block mb-1 mt-4 font-medium">ISBN</label>
                                <input type="text" name="isbn" id="isbn"
                                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    placeholder="Nomor ISBN" value=" {{ old('isbn',$buku->isbn) }}" />
                                @error('isbn')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="berat"
                                    class="text-sm text-gray-700 block mb-1 mt-4 font-medium">Berat</label>
                                <input type="number" name="berat" id="berat"
                                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    placeholder="Berat Buku" value=" {{ old('berat',$buku->berat) }}" />
                                @error('berat')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="lebar"
                                    class="text-sm text-gray-700 block mb-1 mt-4 font-medium">Lebar</label>
                                <input type="number" name="lebar" id="lebar"
                                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    placeholder="Lebar Buku" value=" {{ old('lebar',$buku->tanggal_terbit) }}" />
                                @error('lebar')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="panjang"
                                    class="text-sm text-gray-700 block mb-1 mt-4 font-medium">Panjang</label>
                                <input type="number" name="panjang" id="panjang"
                                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    placeholder="Panjang Buku" value="  {{ old('panjang',$buku->panjang) }}" />
                                @error('panjang')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="harga" class="text-sm text-gray-700 block mb-1 mt-4 font-medium">Harga
                                    Buku</label>
                                <input type="number" name="harga" id="harga"
                                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                                    placeholder="Harga" value=" {{ old('harga',$buku->harga) }}" />
                                @error('harga')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-8">
                                <label for="deskripsi" class="text-sm text-gray-700 block mb-1 font-medium">Deskripsi
                                    Buku</label>
                                <textarea placeholder="Deskripsi Buku" name="deskripsi" id="deskripsi" cols="30"
                                    rows="10"
                                    class="w-full bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700"> {{ old('deskripsi',$buku->deskripsi) }}</textarea>
                                @error('deskripsi')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-8">
                                <label for="fotobuku" class="text-sm text-gray-700 block mb-1 font-medium">Foto
                                    Buku</label>
                                <input name="fotobuku" type="file"
                                    class="file-input file-input-bordered file-input-primary w-full max-w-xs" />
                                @error('fotobuku')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="mt-8">
                                <label for="epub" class="text-sm text-gray-700 block mb-1 font-medium">File EPUB</label>
                                <input name="epub" type="file"
                                    class="file-input file-input-bordered file-input-primary w-full max-w-xs" />
                                @error('epub')
                                <p class="text-red-500 mt-2">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="space-x-4 mt-8">
                                <button type="submit"
                                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">Save</button>
                                <a href=""
                                    class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
