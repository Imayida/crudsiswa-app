@extends('layouts.app')
@section('title')
    <title>Show Clas</title>
@endsection
@section('content')

    <h1>Detail Kelas</h1>
    Nama Kelas: <br>
    {{$dataclas->name}}
    <br>
    Deskripsi Kelas: <br>
    {{$dataclas->description}}<br>
    <br>
    Siswa: <br>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nisn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datauser as $user)
                <tr>
                    <td>{{optional($user)->name}}</td>
                    <td>{{optional($user)->nisn}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/clas"><button>Kembali</button></a>
@endsection
