<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>
</head>
<body>
    <a href="{{ url('clas') }}">Menu kelas</a> | <a href="{{ url('/') }}">Menu Siswa</a>

    <h1>Daftar Kelas</h1>
    <a href="{{ route('clas.create') }}">Tambah Kelas</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clases as $clas)
            <tr>
                <td>{{ $clas->name }}</td>
                <td>{{ $clas->description }}</td>
                <td>
                    <a href="{{ route('clas.show', $clas->id) }}">Detail</a>
                    <a href="{{ route('clas.edit', $clas->id) }}">Edit</a>
                    <form action="{{ route('clas.destroy', $clas->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
