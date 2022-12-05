<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function index(Request $request) {
        $datas = DB::select('select * from obat WHERE nama_obat like :search',[
            'search'=>'%'.$request->search.'%',
        ]);
        
        return view('obat.index')
            ->with('datas', $datas);
        }

    public function create() {
        return view('obat.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_obat' => 'required',
            'nama_obat' => 'required',
            'jenis' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO obat(id_obat, nama_obat, jenis) VALUES (:id_obat, :nama_obat, :jenis)',
        [
            'id_obat' => $request->id_obat,
            'nama_obat' => $request->nama_obat,
            'jenis' => $request->jenis,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('obat.index')->with('success', 'Data produk berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('obat')->where('id_obat', $id)->first();

        return view('obat.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_obat' => 'required',
            'nama_obat' => 'required',
            'jenis' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE obat SET id_obat = :id_obat, nama_obat = :nama_obat, jenis = :jenis WHERE id_obat = :id',
        [
            'id' => $id,
            'id_obat' => $request->id_obat,
            'nama_obat' => $request->nama_obat,
            'jenis' => $request->jenis,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'jenis_biji' => $request->jenis_biji,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('obat.index')->with('success', 'Data Obat berhasil diubah');
    }

    public function delete($id) {
        DB::delete('DELETE FROM obat WHERE id_obat = :id_obat', ['id_obat' => $id]);
        return redirect()->route('obat.index')->with('success', 'Data Obat berhasil dihapus');
    }
}



