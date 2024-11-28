<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 white:text-white-200 leading-tight">
            Tambah Modul
        </h2>
    </x-slot>

    <x-content>
        <form method="post" action="{{ route('moduls.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
    
            <div>
                <x-input-label class="text-white" for="name" value="Title" />
                <x-text-input id="title" name="title" type="text"
                    value="{{ old('title') }}" class="mt-1 w-full text-black"/>
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
                <x-input-label class="text-white" for="pdf_file" value="File PDF" />
                <x-text-input id="pdf_file" name="pdf_file" type="file"
                    value="{{ old('pdf_file') }}" class="mt-1 w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('pdf_file')" />
            </div>

            <div>
                <x-input-label class="text-white" for="deskripsi" value="Deskripsi" />
                <x-text-input id="deskripsi" name="deskripsi" type="text"
                    value="{{ old('deskripsi') }}" class="mt-1 w-full text-black"/>
                <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
            </div>

            <div>
                <x-input-label class="text-white" for="kelas" value="Kelas" />
                <x-select id="kelas" name="kelas" type="text"
                    value="{{ old('kelas') }}" class="mt-1 w-full">
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </x-select>
                <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
            </div>
            <x-secondary-button>Simpan</x-secondary-button>
            <x-secondary-button>
                <a href="{{ route('modul.index') }}">Kembali</a>
            </x-secondary-button>
        </form>
    </x-content>
</x-app-layout>