<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Peminjaman | Perpustakaan Joseph</title>
    <Style>
      body {
        background-color: #f8f9fa;
      }

      .navbar {
        margin-bottom: 20px;
      }

      .table {
        margin-top: 20px;
        background-color: #ffffff;
      }

      .table th, .table td {
        text-align: center;
        vertical-align: middle;
      }

      .table th {
        background-color: #007bff;
        color: #ffffff;
      }

      .table tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
      }

      .table tbody tr:hover {
        background-color: #e9ecef;
      }

      .btn-warning {
        margin-right: 5px;
      }

      .container {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
      }
    </Style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('home') }}">Perpustakaan Joseph</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('listanggota') }}">Data Anggota</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('listbuku') }}">Data Buku</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('peminjaman') }}">Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pinjam') }}">Tambah Peminjaman</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO. PINJAM</th>
                    <th>ID ANGGOTA</th>
                    <th>NAMA ANGGOTA</th>
                    <th>JUDUL BUKU</th>
                    <th>TANGGAL PINJAM</th>
                    <th>TANGGAL KEMBALI</th>
                    <th>DENDA</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pinjams as $pinjam)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pinjam->anggota?->idanggota ?? 'N/A'}}</td>
                    <td>{{ $pinjam->anggota?->nama ?? 'N/A' }}</td>
                    <td>{{ $pinjam->buku?->judulbuku ?? 'N/A'}}</td>
                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                    <td>{{ $pinjam->tanggal_kembali }}</td>
                    <td>{{ $pinjam->denda }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">BELUM ADA DATA PEMINJAMAN</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
