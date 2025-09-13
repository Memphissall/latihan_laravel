<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah MATAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</h1>
    <form method="POST" action="/matkul">
        @csrf
        <input type="text" name="namamatkul" placeholder="Nama"><br>
        <input type="text" name="deks" placeholder="Deks"><br>
        <button type="submit">Simpan</button>
    </form>

    <h2>List Mahasiswa</h2>
    <ul>
        @foreach($data as $matkul)
            <li>{{ $matkul->namamatkul }} - {{ $matkul->deks }}</li>
        @endforeach
    </ul>
</body>
</html>
