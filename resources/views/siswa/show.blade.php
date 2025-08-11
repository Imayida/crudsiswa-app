<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show siswa</title>
</head>
<body>
     <h1>Detail siswa</h1>
     {{-- profile siswa --}}
    <img src="{{ asset('storage/'.$datauser->photo) }}" width="70" alt="">

     {{-- nama siswa --}}
    <h6>{{$datauser->name}}</h6>

     {{-- nisn siswa--}}
     <h6>{{$datauser->nisn}}</h6>


     {{-- alamat siswa --}}
    <h6>{{$datauser->alamat}}</h6>

     {{-- emil siswa--}}
    <h6>{{$datauser->email}}</h6>

    {{-- no handphone siswa--}}
    <h6>{{$datauser->no_handphone}}</h6>

</body>
</html>
