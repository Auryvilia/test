<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use \App\Models\Dokter;
class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *  @return \Illuminate\Contracts\View\View
     */
   
    public function index()
    {
        $data['dokter'] = Dokter::orderBy('kode_dokter', 'asc')->paginate();

        $data['judul'] = 'Data Dokter';
        return view('dokter_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_sp'] = ['umum', 'kandungan', 'anak', 'THT'];
        return view("dokter_create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_dokter'=>'required', 
            'nama_dokter'=>'required', 
            'spesialis'=>'required', 
            'nomor_hp'=>'required'
        ]);

        $dokter = new Dokter();
        $dokter->kode_dokter = $request->kode_dokter;
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->nomor_hp = $request->nomor_hp;
        $dokter->save();
        return redirect()->route('dokter.index')->with('success', 'Data Berhasil ditambahkan');
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

        $data['dokter'] =  Dokter::findOrFail($id);
        $data['list_sp'] = ['umum', 'kandungan', 'anak', 'THT'];
        return view("dokter_edit", $data);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'kode_dokter'=>'required',
            'nama_dokter'=>'required',
            'spesialis'=>'required',
            'nomor_hp'=>'required'
        ]);

        $dokter =  Dokter::findOrFail($id);
        $dokter->kode_dokter = $request->kode_dokter;
        $dokter->nama_dokter = $request->nama_dokter;
        $dokter->spesialis = $request->spesialis;
        $dokter->nomor_hp = $request->nomor_hp;
        $dokter->save();
        return redirect()->route('dokter.index')->with('success', 'Data Berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $dokter =  Dokter::findOrFail($id);
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Data Berhasil dihapus');
        //
    }

    public function laporan(){
        $data['dokter'] = Dokter::all()->sortBy('kode_dokter');
        $data['judul'] = 'Laporan Dokter';
        return view('dokter_laporan', $data);
    }
}
