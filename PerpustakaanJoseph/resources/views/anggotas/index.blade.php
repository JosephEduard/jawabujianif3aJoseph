<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Data Anggota | Perpustakaan Joseph</title>
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
                <a class="nav-link active" aria-current="page" href="{{ route('listanggota') }}">Data Anggota</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('listbuku') }}">Data Buku</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('peminjaman') }}">Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tambahanggota') }}">Tambah Anggota</a>
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
                    <th>ID ANGGOTA</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>NO TELP</th>
                    <th>ALAMAT</th>
                    <th>JENIS KELAMIN</th>
                    <th>TANGGAL LAHIR</th>
                    <th>TANGGAL DAFTAR</th>
                    <th>UPDATED_AT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($anggotas as $anggota)
                <tr>
                    <td>{{ $anggota->idanggota }}</td>
                    <td>{{ $anggota->nama }}</td>
                    <td>{{ $anggota->email }}</td>
                    <td>{{ $anggota->notelp }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>{{ $anggota->jeniskelamin }}</td>
                    <td>{{ $anggota->tgllahir }}</td>
                    <td>{{ $anggota->created_at }}</td>
                    <td>{{ $anggota->updated_at }}</td>
                    <td>
                        <a href="{{ route('editanggota', $anggota->idanggota) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('deleteanggota', $anggota->idanggota) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">TIDAK ADA DATA</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
