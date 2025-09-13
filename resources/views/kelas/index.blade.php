<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Kelas</h1>
    <form method="POST" action="/kelas">
        @csrf
        <input type="text" name="kapasitas" placeholder="Isi Kapasitas"><br>
        <input type="text" name="ruangan" placeholder="Nama Ruangan"><br>
        <button type="submit">Simpan</button>
    </form>

    <h2>List Ruangan</h2>
    <ul>
        @foreach($data as $kls)
            <li>{{ $kls->kapasitas }} - {{ $kls->ruangan }}</li>
        @endforeach
    </ul>
</body>
</html>
