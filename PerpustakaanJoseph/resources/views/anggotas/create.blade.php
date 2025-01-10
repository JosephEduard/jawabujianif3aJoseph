<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota Baru Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        form select, form input[type="date"] {
            width: 100%;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form .mb-3, form div {
            margin-bottom: 15px;
        }

        form label {
            font-weight: bold;
            color: #495057;
        }

        form input, form select {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        form button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Anggota Baru Perpustakaan Joseph</h1>
        <form action="{{ route('storeanggota') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">No Telepon:</label>
                <input type="text" class="form-control" id="notelp" name="notelp" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="jeniskelamin">Jenis Kelamin:</label>
                <select id="jeniskelamin" name="jeniskelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                 </select>
            </div>
            <div>
                <label for="tgllahir">Tanggal Lahir:</label>
                <input type="date" id="tgllahir" name="tgllahir" required>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
            <a class="btn btn-warning btn-lg" href="{{ route('listanggota') }}" role="button">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>