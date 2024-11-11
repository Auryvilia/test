<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = Pasien::orderBy('kode_pasien', 'asc')->paginate();

        $data['judul'] = 'Data Pasien';
        return view('pasien_index', $data);
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['jenis_kelamin']= ['Laki-laki', 'Perempuan'];
        $data['status'] = ['Aktif', 'Tidak Aktif'];
        return view("pasien_create", $data);

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pasien'=>'required',
            'nama_pasien'=>'required',
            'jenis_kelamin'=>'required',
            'status'=>'required',
            'alamat'=>'required',

        ]);


        $pasien = new Pasien();
        $pasien->kode_pasien = $request->kode_pasien;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat;
        $pasien->save();
        return redirect()->route('pasien.index')->with('success', 'Data Berhasil ditambahkan');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] =  Pasien::findOrFail($id);
        $data['jenis_kelamin']= ['Laki-laki', 'Perempuan'];
        $data['status'] = ['Aktif', 'Tidak Aktif'];
        return view("pasien_edit", $data);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pasien'=>'required',
            'nama_pasien'=>'required',
            'jenis_kelamin'=>'required',
            'status'=>'required',
            'alamat'=>'required',

        ]);


        $pasien =  Pasien::findOrFail($id);
        $pasien->kode_pasien = $request->kode_pasien;
        $pasien->nama_pasien = $request->nama_pasien;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->status = $request->status;
        $pasien->alamat = $request->alamat;
        $pasien->save();
        return redirect()->route('pasien.index')->with('success', 'Data Berhasil diubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $pasien =  Pasien::findOrFail($id);
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data Berhasil dihapus');
        //
    }

    public function laporan(){
        $data['pasien'] = Pasien::all()->sortBy('kode_pasien');
        $data['judul'] = 'Laporan Pasien';
        return view('pasien_laporan', $data);
    }
}
