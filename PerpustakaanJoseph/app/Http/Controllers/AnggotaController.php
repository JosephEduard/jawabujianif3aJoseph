<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function tampilanggota()
    {
        $anggotas = Anggota::all();
        return view('anggotas.index', compact('anggotas'));
    }

    public function tambahanggota()
    {
        return view('anggotas.create');
    }

    public function storeAnggota (Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'notelp' => 'required|string|max:14',
            'alamat' => 'required|string|max:255',
            'jeniskelamin' => 'required',
            'tgllahir' => 'required',
        ]);

        Anggota::create($validatedData);

        return redirect()->route('listanggota')
            ->with('success', 'Anggota berhasil ditambahkan');
    }

    public function editAnggota($idanggota)
    {
        $anggota = Anggota::where('idanggota', $idanggota)->firstOrFail();
        return view('anggotas.edit',compact('anggota'));
    }

    public function updateAnggota(Request $request, $idanggota)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'notelp' => 'required|string|max:14',
            'alamat' => 'required|string|max:255',
        ]);

        $anggota = Anggota::where('idanggota', $idanggota)->firstOrFail();
        $anggota->update($request->all());

        return redirect()->route('listanggota')
            ->with('success', 'Anggota berhasil diupdate');
    }

    public function destroyAnggota($idanggota)
    {
        $deleted = DB::table('anggotas')->where('idanggota', $idanggota)->delete();

        if($deleted ){
            return redirect()->route('listanggota')
                ->with('success', 'Anggota berhasil dihapus');
        }
        else {
            return redirect()->route('listanggota')
                ->with('error', 'Anggota gagal dihapus');
        }
    }


}
