<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = User::all();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $clases = Clas::all();
        return view('siswa.create', compact('clases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'clas_id' => 'required|exists:clases,id',
            'name' => 'required',
            'nisn' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'no_handphone' => 'required|unique:users,no_handphone',
            'photo' => 'nullable|image|max:2048'
        ]);

        $datasiswa_store = [
            'clas_id' => $request->clas_id,
            'name' => $request->name,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_handphone' => $request->no_handphone,
        ];

        if ($request->hasFile('photo')) {
            $datasiswa_store['photo'] = $request->file('photo')->store('profilesiswa', 'public');
        }

        User::create($datasiswa_store);

        return redirect('/');
    }

    public function destroy($id)
    {
        $datauser = User::find($id);

        if ($datauser != null) {
            Storage::disk('public')->delete($datauser->photo);
            $datauser->delete();
        }

        return redirect('/');
    }

    public function show($id)
    {
        $datauser = User::find($id);

        if ($datauser == null) {
            return redirect('/');
        }

        return view('siswa.show', compact('datauser'));

    }


    //fungsi untuk mengarahkan user ke halaman edit
    public function edit($id){
             //siapkan data clas dan tampung datanya ke dalam variabel
        $clases =Clas::all();

        //ambil data user berdasarkan id yang di kirimkan
        $datauser =User::find($id);
        if($datauser == null){
            return redirect('/');
        }
         return view('siswa.edit', compact('clases', 'datauser'));

        }

        //fungsi update data siswa
        public function update(Request $request, $id){
            //validasi data
            $request->validate([
            'name' => 'required',
            'nisn' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_handphone' => 'required',
        ]);

            //siapkan data yang akan diupdate : cari data siswa / user didatabase
            $datasiswa = User::find($id);

            //menyiapkan data dalam array untuk update data
            $datasiswa_update = [
            'clas_id' => $request->clas_id,
            'name' => $request->name,
            'nisn' => $request->nisn,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_handphone' => $request->no_handphone,
        ];
            //cek apakah user merubah password atau tidak
            if ($request->password !=null) {
                $datasiswa_update['password'] = $request->password;
            }

            //cek apakah user merubah gambar atau tidak
            if ($request->hasFile('photo')){
                //hapus gambar lama kalau ada
                    Storage::disk('public')->delete($datasiswa->photo);
                //upload gambar baru
                $datasiswa_update['photo'] = $request->file('photo')->store('profilesiswa', 'public');
            }

           //update data sesuai dengan data siswa/user yang sudah disiapkan
            $datasiswa->update($datasiswa_update);

            //kembalikan user ke halaman index
            return redirect('/');
        }
}
