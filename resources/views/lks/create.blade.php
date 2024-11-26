@extends('layouts.app')

@section('content')
    <h1>Create LKS</h1>
    <form action="{{ route('lks.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>

        <label for="modul_id">Modul</label>
        <select name="modul_id" id="modul_id" required>
            @foreach ($moduls as $modul)
                <option value="{{ $modul->id }}">{{ $modul->name }}</option>
            @endforeach
        </select>

        <button type="submit">Create</button>
    </form>
@endsection