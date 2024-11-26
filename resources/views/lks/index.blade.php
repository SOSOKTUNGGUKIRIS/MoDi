@extends('layouts.app')

@section('content')
    <h1>List of LKS</h1>
    <a href="{{ route('lks.create') }}">Create New LKS</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Modul</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lks as $lk)
                <tr>
                    <td>{{ $lk->name }}</td>
                    <td>
                        <!-- Menambahkan pengecekan untuk memastikan relasi modul ada -->
                        {{ $lk->modul ? $lk->modul->name : 'No Modul' }}
                    </td>
                    <td>
                        <a href="{{ route('lks.edit', $lk) }}">Edit</a>
                        <form action="{{ route('lks.destroy', $lk) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection