<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Tambah Siswa</title>
</head>
<body>

    <h1>Halaman Tambah Siswa</h1>
    <p>Tambah Data Siswa</p>
    <a href="/">Kembali</a>

    <form action="/siswa/store" method="post" enctype="multipart/form-data">
        @csrf

        {{-- Pilih Kelas --}}
        <div>
            <label for="clas_id">Kelas</label>
            <br>
            <select name="clas_id" id="clas_id">
               @foreach ($clases as $clas)
                    <option value="{{ $clas->id }}">{{ $clas->name }}</option>
               @endforeach
            </select>
            <br>
            @error('clas_id')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <br>
        {{-- Name --}}
        <div>
            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            <br>
            @error('name')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <br>
        {{-- NISN --}}
        <div>
            <label for="nisn">Nisn</label>
            <br>
            <input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}">
            <br>
            @error('nisn')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <br>
        {{-- Alamat --}}
        <div>
            <label for="alamat">Alamat</label>
            <br>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}">
            <br>
            @error('alamat')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <br>
        {{-- Email --}}
        <div>
            <label for="email">Email</label>
            <br>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            <br>
            @error('email')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <br>
        {{-- Password --}}
        <div>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" id="password">
            <br>
            @error('password')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <br>
        {{-- No Handphone --}}
        <div>
            <label for="no_handphone">No Handphone</label>
            <br>
            <input type="tel" name="no_handphone" id="no_handphone" value="{{ old('no_handphone') }}">
            <br>
            @error('no_handphone')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <br>
        {{-- Photo --}}
        <div>
            <label for="photo">Photo</label>
            <br>
            <input type="file" name="photo" id="photo" accept="image/*">
            <br>
            @error('photo')
                <small style="color: red">{{ $message }}</small>
            @enderror
        </div>

        <br>
        {{-- Tombol Submit --}}
        <div>
            <button type="submit">Simpan</button>
        </div>

    </form>

</body>
</html>
