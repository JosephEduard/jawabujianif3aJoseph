<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman | Perpustakaan Joseph</title>
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
        <h1>Pinjam Buku</h1>
        <form action="{{ route('storepinjam') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="idanggota">Pilih Anggota</label>
                <select id="idanggota" name="idanggota" required>
                    <option value="">Pilih Anggota</option>
                    @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->idanggota }}">{{ $anggota->nama }}</option>
                    @endforeach
                 </select>
            </div>
            <div class="mb-3">
                <label for="kodebuku">Pilih Buku</label>
                <select id="kodebuku" name="kodebuku" required>
                    <option value="">Pilih Buku</option>
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->kodebuku }}">{{ $buku->judulbuku }}</option>
                    @endforeach
                 </select>
            </div>
            <div>
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required>
            </div>
            <div>
                <label for="tanggal_kembali">Tanggal Kembali:</label>
                <input type="date" id="tanggal_kembali" name="tanggal_kembali">
            </div>

            <div>
                <label for="denda">Denda:</label>
                <input type="double" id="denda" name="denda" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-lg">Pinjam</button>
                <a class="btn btn-warning btn-lg" href="{{ route('peminjaman') }}" role="button">Batal</a>
            </div>
            
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>