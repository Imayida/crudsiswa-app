<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Kelas</title>
</head>
<body>
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
</body>
</html>
