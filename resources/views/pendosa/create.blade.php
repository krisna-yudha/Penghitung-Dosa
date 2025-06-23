{{-- filepath: resources/views/pendosa/create.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pendosa</title>
</head>
<body>
    <h1>Tambah Pendosa</h1>
    <form action="{{ route('pendosa.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Dosa:</label>
        <input type="text" name="dosa" required><br>
        <label>Jumlah Dosa:</label>
        <input type="number" name="jumlah_dosa" required><br>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('pendosa.index') }}">Kembali</a>
</body>
</html>