<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    public function index(Request $request) {
        $datas = DB::select('select * from dokter WHERE nama_dokter like :search',[
            'search'=>'%'.$request->search.'%',
        ]);
        
        return view('dokter.index')
            ->with('datas', $datas);
        }

    public function create() {
        return view('dokter.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_dokter' => 'required',
            'nama_dokter' => 'required',
            'spesialis' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO dokter(id_dokter, nama_dokter, spesialis) VALUES (:id_dokter, :nama_dokter, :spesialis)',
        [
            'id_dokter' => $request->id_dokter,
            'nama_dokter' => $request->nama_dokter,
            'spesialis' => $request->spesialis,
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

        return redirect()->route('dokter.index')->with('success', 'Data produk berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('dokter')->where('id_dokter', $id)->first();

        return view('dokter.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_dokter' => 'required',
            'nama_dokter' => 'required',
            'spesialis' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE dokter SET id_dokter = :id_dokter, nama_dokter = :nama_dokter, spesialis = :spesialis WHERE id_dokter = :id',
        [
            'id' => $id,
            'id_dokter' => $request->id_dokter,
            'nama_dokter' => $request->nama_dokter,
            'spesialis' => $request->spesialis,
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

        return redirect()->route('dokter.index')->with('success', 'Data Dokter berhasil diubah');
    }

    public function delete($id) {
        DB::delete('DELETE FROM dokter WHERE id_dokter = :id_dokter', ['id_dokter' => $id]);
        return redirect()->route('dokter.index')->with('success', 'Data Dokter berhasil dihapus');
    }
}
