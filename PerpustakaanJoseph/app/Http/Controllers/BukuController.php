<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('bukus.index', compact('bukus'));
    }

    public function tambahbuku()
    {
        return view('bukus.create');
    }

    public function storeBuku(Request $request)
    {
        $validatedData = $request->validate([
            'judulbuku' => 'required|string|max:255',
            'coverbuku' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|digits:4',
            'genre' => 'required|string|max:255',
            'stokbuku' => 'required|integer|min:0',
        ]);

        $cover = null;
        if($request->hasFile('coverbuku'))
        {
            $cover = $request->file('coverbuku')->store('coverbuku', 'public');
        }

        $validatedData['coverbuku'] = $cover;
        Buku::create($validatedData);

        return redirect()->route('listbuku')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    public function editBuku($id)
    {
        $buku = Buku::findOrFail($id);
        return view('bukus.edit', compact('buku'));
    }

    public function updateBuku(Request $request, $kodebuku)
    {
        $validatedData = $request->validate([
            'judulbuku' => 'required|string|max:255',
            'coverbuku' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|digits:4',
            'genre' => 'required|string|max:255',
            'stokbuku' => 'required|integer|min:0',
        ]);

        $book = Buku::findOrFail($kodebuku);

        $cover = $book->coverbuku;
        if($request->hasFile('coverbuku'))
        {
            if($book->coverbuku)
            {
                Storage::delete('public/' . $book->coverbuku);
            }
            $cover = $request->file('coverbuku')->store('coverbuku', 'public');
        }

        $validatedData['coverbuku'] = $cover;
        $book->update($validatedData);

        return redirect()->route('listbuku')
            ->with('success', 'Buku berhasil diupdate');
    }
    
    public function destroyBuku($kodebuku)
    {
        
        $buku = Buku::findOrFail($kodebuku);
        if($buku->coverbuku)
        {
            Storage::delete('public/' . $buku->coverbuku);
        }
        
        $deleted = DB::table('bukus')->where('kodebuku', $kodebuku)->delete();
        if($deleted){
            return redirect()->route('listbuku')
                ->with('success', 'Buku berhasil dihapus');
        }
        else {
            return redirect()->route('listbuku')
                ->with('error', 'Buku gagal dihapus');
        }
    }

}
