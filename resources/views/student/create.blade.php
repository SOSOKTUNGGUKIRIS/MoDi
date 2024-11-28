<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 white:text-white-200 leading-tight">
            Tambah Siswa
        </h2>
    </x-slot>

    <x-content>
        <form method="post" action="{{ route('student.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
            @csrf
    
            <div>
                <x-input-label class="text-white" for="name" value="Nama Siswa" />
                <x-text-input id="name" name="name" type="text"
                    value="{{ old('name') }}" class="mt-1 w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label class="text-white" for="nis" value="NIS" />
                <x-text-input id="nis" name="nis" type="text"
                    value="{{ old('nis') }}" class="mt-1 w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('nis')" />
            </div>

            <div>
                <x-input-label class="text-white" for="gender" value="Gender" />
                <x-select id="gender" name="gender" type="text"
                    value="{{ old('gender') }}" class="mt-1 w-full">
                    <option value="B">Laki-laki</option>
                    <option value="G">Perempuan</option>
                </x-select>
                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
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
        </form>
    </x-content>
    
</x-app-layout>
