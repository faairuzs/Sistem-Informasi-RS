<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KamarController extends Controller
{
    public function index(Request $request) {
        $datas = DB::select('select * from kamar WHERE nama_ruang like :search',[
            'search'=>'%'.$request->search.'%',
        ]);
        
        return view('kamar.index')
            ->with('datas', $datas);
        }
        
    public function create() {
        return view('kamar.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_kamar' => 'required',
            'id_pasien' => 'required',
            'nama_ruang' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO kamar(id_kamar, id_pasien, nama_ruang) VALUES (:id_kamar, :id_pasien, :nama_ruang)',
        [
            'id_kamar' => $request->id_kamar,
            'id_pasien' => $request->id_pasien,
            'nama_ruang' => $request->nama_ruang,
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

        return redirect()->route('kamar.index')->with('success', 'Data produk berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('kamar')->where('id_kamar', $id)->first();

        return view('kamar.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_kamar' => 'required',
            'id_pasien' => 'required',
            'nama_ruang' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE kamar SET id_kamar = :id_kamar, id_pasien = :id_pasien, nama_ruang = :nama_ruang WHERE id_kamar = :id',
        [
            'id' => $id,
            'id_kamar' => $request->id_kamar,
            'id_pasien' => $request->id_pasien,
            'nama_ruang' => $request->nama_ruang,
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

        return redirect()->route('kamar.index')->with('success', 'Data Kamar berhasil diubah');
    }

    public function delete($id) {
        DB::delete('DELETE FROM kamar WHERE id_kamar = :id_kamar', ['id_kamar' => $id]);
        return redirect()->route('kamar.index')->with('success', 'Data Kamar berhasil dihapus');
    }
}


