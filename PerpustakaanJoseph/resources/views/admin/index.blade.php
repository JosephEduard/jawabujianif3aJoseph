<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Perpustakaan Joseph | Admin</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .welcome-section {
            text-align: center;
            padding: 50px;
        }
        .welcome-section h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }
        .welcome-section p {
            font-size: 1.5em;
            color: #343a40;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .btn-primary {
            font-size: 1.2em;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <x-app-layout>
        
    </x-app-layout>
    <div class="container">
        <div class="welcome-section">
            <h1>Selamat Datang di Perpustakaan Joseph</h1>
            <p>Anda login sebagai admin. Silahkan pilih menu yang tersedia.</p>
            <a href="{{ route('listbuku') }}" class="btn btn-warning">List Buku</a>
            <a href="{{ route('listanggota') }}" class="btn btn-warning">ListAnggota</a>
            <a href="{{ route('peminjaman') }}" class="btn btn-warning">Data Peminjaman</a>

        </div>
    </div>

</body>
</html>                                                                                                                         