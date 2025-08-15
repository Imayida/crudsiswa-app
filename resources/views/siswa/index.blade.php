<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Halaman Beranda</h1>

        <div class="list-data-siswa">
            <a href="{{ url('clas') }}">Menu kelas</a> | <a href="{{ url('/clas/siswa') }}">Menu Siswa</a>
            <h2>List Data Siswa</h2>
            <a href="{{ url('siswa/create') }}">Tambah</a>
            <table border="1">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Name</th>
                        <th>Kelas</th>
                        <th>Nisn</th>
                        <th>Alamat</th>
                        <th colspan="3">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                    <tr>
                        <td><img src="{{ asset('storage/' . $siswa->photo) }}" alt="" width="40"></td>
                        <td>{{ $siswa->name }}</td>
                        <td>{{ $siswa->clas->name ?? '-' }}</td>
                        <td>{{ $siswa->nisn }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td class="option-links">

                            {{-- Tombol Delete --}}
                            <a href="#"
                               onclick="event.preventDefault();
                               if(confirm('Apakah kamu yakin ingin menghapus data ini?')) {
                                   document.getElementById('delete-form-{{ $siswa->id }}').submit();
                               }">
                                Delete
                            </a>

                            {{-- Form delete tersembunyi pakai POST --}}
                            <form id="delete-form-{{ $siswa->id }}"
                                  action="{{ url('/siswa/' . $siswa->id . '/hapus') }}"
                                  method="POST" style="display: none;">
                                @csrf
                            </form>

                            {{-- Tombol Edit --}}
                            <a href="{{ url('/siswa/edit/'.$siswa->id) }}">Edit</a>

                            {{-- Tombol Detail --}}
                            <a href="{{ url('/siswa/show/' . $siswa->id) }}">Detail</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
