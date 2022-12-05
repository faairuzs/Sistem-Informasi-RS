<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index(Request $request) {
        if ($request->has('search')){
        $datas = DB::select('select * from pasien WHERE nama_pasien like :search',[
            'search'=>'%'.$request->search.'%',
        ]);

        $datasrecycle = DB::select('select * from pasien WHERE nama_pasien like :search AND recycle=1',[
            'search'=>'%'.$request->search.'%',
        ]);
        
        return view('pasien.index')
            ->with('datas', $datas)
            ->with('datasrecycle', $datasrecycle);
        }
        else{
            $datas = DB::select('select * from pasien WHERE recycle=0');
            $datasrecycle = DB::select('select * from pasien WHERE recycle=1');
    
            return view('pasien.index')
                ->with('datas', $datas)
                ->with('datasrecycle', $datasrecycle);   
           }
        }

    public function join(Request $request) {
        if($request->has('search')){
            $datas = DB::select('SELECT pasien.id_pasien,pasien.nama_pasien,pasien.telepon,pasien.alamat,dokter.nama_dokter,obat.nama_obat,obat.jenis,kamar.nama_ruang FROM `dokter` RIGHT JOIN pasien ON pasien.id_dokter = dokter.id_dokter LEFT JOIN kamar on kamar.id_pasien = pasien.id_pasien LEFT JOIN obat on obat.id_obat = pasien.id_obat WHERE pasien.nama_pasien like :search',[
                'search'=>'%'.$request->search.'%',
            ]);

        return view('join')
            ->with('datas', $datas);
        }
        else {
            $datas = DB::select('SELECT pasien.id_pasien,pasien.nama_pasien,pasien.telepon,pasien.alamat,dokter.nama_dokter,obat.nama_obat,obat.jenis,kamar.nama_ruang FROM `dokter` RIGHT JOIN pasien ON pasien.id_dokter = dokter.id_dokter LEFT JOIN kamar on kamar.id_pasien = pasien.id_pasien LEFT JOIN obat on obat.id_obat = pasien.id_obat ');

        return view('join')
            ->with('datas', $datas);
        }
    }
    public function create() {
        return view('pasien.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'id_obat' => 'required',
            'nama_pasien' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pasien(id_pasien, id_dokter, id_obat, nama_pasien, telepon, alamat) VALUES (:id_pasien, :id_dokter, :id_obat, :nama_pasien, :telepon, :alamat)',
        [
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'id_obat' => $request->id_obat,
            'nama_pasien' => $request->nama_pasien,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]
        );

        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pasien')->where('id_pasien', $id)->first();

        return view('pasien.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'id_obat' => 'required',
            'nama_pasien' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pasien SET id_pasien = :id_pasien, id_dokter = :id_dokter, id_obat = :id_obat, nama_pasien = :nama_pasien, telepon = :telepon, alamat = :alamat WHERE id_pasien = :id',
        [
            'id' => $id,
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'id_obat' => $request->id_obat,
            'nama_pasien' => $request->nama_pasien,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
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

        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil diubah');
    }

    public function delete($id) {
        DB::delete('DELETE FROM pasien WHERE id_pasien = :id_pasien', ['id_pasien' => $id]);
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil dihapus');
    }
    public function recycle($id) {
        DB::update('UPDATE pasien set recycle = 1 WHERE id_pasien = :id_pasien', ['id_pasien' => $id]);
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil dihapus');
    }
    public function restore($id) {
        DB::update('UPDATE pasien set recycle = 0 WHERE id_pasien = :id_pasien', ['id_pasien' => $id]);
        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil dihapus');
    }
}




