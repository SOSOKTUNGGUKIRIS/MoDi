<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Modul') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white white:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('modul.create') }}">
                        <x-secondary-button class="mb-5">Tambah Modul</x-secondary-button>    
                    </a> 
                    <!-- NOTIFIKASI -->
                    @if (session('success'))
                        <div class="bg-green-400 border border-green-700 text-green-100 py-3 rounded text-center mb-2" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif   
                    @if (session('success1'))
                        <div class="bg-blue-400 border border-blue-700 text-green-100 py-3 rounded text-center mb-2" role="alert">
                            <span class="block sm:inline">{{ session('success1') }}</span>
                        </div>
                    @endif       
                    <x-table>
                        <x-slot:thead>
                            <th class="p-3">Title</th>
                            <th class="p-3">File PDF</th>
                            <th class="p-3">Deskripsi</th>
                            <th class="p-3">Kelas</th>
                            <th class="p-3">Aksi</th>
                        </x-slot:thead>
                        @foreach ($moduls as $modul)
                        <tr class="border-b">
                            <td class="p-3 text-black">
                                <a href="{{ route('moduls.show', $modul->id) }}" target="_blank">
                                {{ $modul->title }}</a> 
                            </td>
                            <td class="p-3">
                                <a href="{{ route('moduls.download', $modul->id) }}">Download PDF</a>
                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>    
        </div>        
    </div>
</x-app-layout>
