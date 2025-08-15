<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\User;
use Illuminate\Http\Request;

class ClasController extends Controller
{
    public function index()
    {
        $clases = Clas::all();
        return view('clas.index', compact('clases'));
    }

    public function show($id)
    {
        $dataclas = Clas::find($id);
        $datauser = User::where('clas_id', $id)->get();

        if (is_null($dataclas)) {
            return redirect('/clas')->with('error', 'Kelas tidak ditemukan.');
        }

        return view('clas.show', compact('dataclas', 'datauser'));
    }

    public function create()
    {
        return view('clas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Clas::create($request->all());
        return redirect()->route('clas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $clas = Clas::findOrFail($id);
        return view('clas.edit', compact('clas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $clas = Clas::findOrFail($id);
        $clas->update($request->all());
        return redirect()->route('clas.index');
    }

    public function destroy($id)
    {
        $clas = Clas::findOrFail($id);
        $clas->delete();
        return redirect()->route('clas.index')->with('success', 'Kelas berhasil dihapus.');
    }

    public function siswaIndex($id)
    {
        $dataclas = Clas::findOrFail($id);
        $datauser = User::where('clas_id', $id)->get();

        return view('clas.siswa', compact('dataclas', 'datauser'));
    }
}
