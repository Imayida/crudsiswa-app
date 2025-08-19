@extends('layouts.app')
@section('title')
    <title>Edit Clas</title>
@endsection
@section('content')
    <h1>Edit Data Kelas</h1>
    <form action="{{ route('clas.update', $clas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
        <label>Nama Kelas:</label><br>
        <input type="text" name="name" value="{{ old('name', $clas->name) }}"><br><br>
        @error('name')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>
        <div>
        <label>Deskripsi:</label><br>
        <textarea name="description" rows="4" cols="50">{{ $clas->description }}</textarea><br><br>
        @error('description')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit">Update</button>
        <a href="{{ route('clas.index') }}">Batal</a>
    </form>
@endsection
