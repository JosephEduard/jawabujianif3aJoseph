<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku Perpustakaan</title>
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
        <h1>Edit Buku {{ $buku->judulbuku }}</h1>
        <form action="{{ route('updatebuku',$buku->kodebuku) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="coverbuku" class="form-label">Upload Cover Buku</label>
                 <input type="file" class="form-control" id="coverbuku" name="coverbuku" value="{{ old('coverbuku', $buku->coverbuku) }}" >
                @error('coverbuku')
                    <div class="text-danger">{{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="judulbuku" class="form-label">Judul Buku:</label>
                <input type="text" class="form-control" id="judulbuku" name="judulbuku" value="{{ old('judulbuku', $buku->judulbuku) }}" required>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang:</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required>
            </div>
            <div>
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="year" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
            </div>
            <div class="mb-3">
                <label for="genre">Genre Buku:</label>
                <select id="genre" name="genre"  value="{{ old('genre', $buku->genre) }}" required>
                    <option value="Horror">Horror</option>
                    <option value="Petualangan">Petualangan</option>
                    <option value="Science Fiction">Sci-Fi</option>
                    <option value="Comedy">Comedy</option>]
                    <option value="Romance">Romance</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Biography">Biography</option>
                    <option value="History">History</option>
                    <option value="Science">Science</option>
                    <option value="Cooking">Cooking</option>
                    <option value="Health">Health</option>
                    <option value="Travel">Travel</option>
                    <option value="Guide">Guide</option>
                    <option value="Children">Children</option>
                    <option value="Religion">Religion</option>
                    <option value="Spirituality">Spirituality</option>
                    <option value="Academic">Academic</option>
                    <option value="Encyclopedia">Encyclopedia</option>
                    <option value="Dictionary">Dictionary</option>
                    <option value="Comic">Comic</option>
                    <option value="Art">Art</option>
                    <option value="Cookbook">Cookbook</option>
                    <option value="Diary">Diary</option>
                    <option value="Journal">Journal</option>
                    <option value="Prayer">Prayer</option>
                    <option value="Devotional">Devotional</option>
                    <option value="Textbook">Textbook</option>
                    <option value="Self Help">Self Help</option>
                    <option value="Math">Math</option>
                    <option value="Computer">Computer</option>
                    <option value="Business">Business</option>
                    <option value="Finance">Finance</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Economics">Economics</option>
                    <option value="Management">Management</option>
                    <option value="Leadership">Leadership</option>
                    <option value="Motivational">Motivational</option>
                    <option value="Fantasy">Fantasy</option>
                 </select>
            </div>
            <div class="mb-3">
                <label for="stokbuku" class="form-label">Stok Buku:</label>
                <input type="int" class="form-control" id="stokbuku" name="stokbuku" value="{{ old('stokbuku', $buku->stokbuku) }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg">Perbarui</button>
            <a class="btn btn-warning btn-lg" href="{{ route('listbuku') }}" role="button">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>