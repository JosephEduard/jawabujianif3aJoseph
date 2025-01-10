<?php

namespace App\Http\Controllers;
use App\Models\Pinjam;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjams = Pinjam::with(['anggota', 'buku'])->latest()->paginate(10);
        return view('pinjams.index', compact('pinjams'));
    }

    public function pinjam()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::where('stokbuku', '>', 0)->get();
        return view('pinjams.create', compact('anggotas', 'bukus'));
    }

    public function storePinjam(Request $request)
    {
        $validatedData = $request->validate([
            'idanggota' => 'required|exists:anggotas,idanggota',
            'kodebuku' => 'required|exists:bukus,kodebuku',
            'tanggal_pinjam' => 'required|date',
            'denda' => 'required|integer|min:0',
        ]);

        Pinjam::create($validatedData);

        $buku = Buku::findOrFail($request->kodebuku);
        $buku->stokbuku = $buku->stokbuku - 1;
        $buku->save();

        return redirect()->route('peminjaman')
            ->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function editPinjam($nopinjam)
    {
        $pinjam = Pinjam::findOrFail($nopinjam);
        $anggotas = Anggota::all();
        $bukus = Buku::where('stokbuku', '>', 0)->get();
        return view('pinjams.edit', compact('pinjam', 'anggotas', 'bukus'));
    }

    public function updatePinjam(Request $request, $nopinjam)
    {
        $request->validate([
            'idanggota' => 'required|exists:anggotas,idanggota',
            'kodebuku' => 'required|exists:bukus,kodebuku',
            'tanggal_pinjam' => 'required|date',
            'denda' => 'required|integer|min:0',
        ]);

        $pinjam = Pinjam::findOrFail($nopinjam);
        $pinjam->update($request->all());

        return redirect()->route('peminjaman')
            ->with('success', 'Peminjaman berhasil diupdate');
    }
}