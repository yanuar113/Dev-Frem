<?php

namespace App\Http\Controllers;

use App\Models\RakBuku;
use Illuminate\Http\Request;

class RakBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rak = RakBuku::all();
        // $this->pre($request->session()->all());
        return view('rak_buku.index', ['rak' => $rak]);
    }
    /**
     * Show the form for creating a new resource.
     */
    private function pre ($arr = [])
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
    public function create()
    {
        $data['store'] = 'Input';
        $data['rak'] = new RakBuku();
        $data['action'] = url('rak_buku');
        return view('rak_buku.form', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rak = new RakBuku();
        $rak->nama = $request->input('nama');
        $rak->lokasi = $request->input('lokasi');
        $rak->keterangan = $request->input('keterangan');
        $validated = $request->validate([
            'nama'=> 'required |max:50',
            'lokasi'=> 'required |max:50'
        ],[
            'nama.required' => 'Nama Wajib Diisi',
            'nama.max' => 'Nama Tidak Boleh Lebih Dari 50 Karakter',
            'lokasi.required' => 'Lokasi Wajib Diisi',
            'lokasi.max' => 'Loaksi Tidak Boleh Lebih Dari 50 Karakter',

        ]);

        if ($validated){
            $request->session()->put('rak', $rak);
            $rak->save();
            $request->session()->flash('pesan', 'Data telah berhasil tersimpan.');
        }
        return redirect('/dashboard');
    }
    /**
     * Display the specified resource.
     */
    public function show(RakBuku $rakBuku)
    {
        return view('rak_buku.destroy', ['rak' => $rakBuku]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RakBuku $rakBuku)
    {
        $data['store'] = 'Ubah';
        $data['rak'] = $rakBuku;
        $data['action'] = url('rak_buku' . '/' . $rakBuku->id);
        return view('rak_buku.form', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RakBuku $rakBuku)
    {
        $rakBuku->nama = $request->input('nama');
        $rakBuku->lokasi = $request->input('lokasi');
        $rakBuku->keterangan = $request->input('keterangan');
        $validated = $request->validate([
            'nama'=> 'required |max:50',
            'lokasi'=> 'required |max:50'
        ],[
            'nama.required' => 'Nama Wajib Diisi',
            'nama.max' => 'Nama Tidak Boleh Lebih Dari 50 Karakter',
            'lokasi.required' => 'Lokasi Wajib Diisi',
            'lokasi.max' => 'Loaksi Tidak Boleh Lebih Dari 50 Karakter',
        ]);
        if ($validated){
        
        $rakBuku->save();
        $request->session()->flash('pesan', 'Data telah berhasil diubah.');
        }
        return redirect('/rak_buku');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, RakBuku $rakBuku)
    {
        $rakBuku->delete();
        $request->session()->flash('pesan', 'Data telah berhasil dihapus.');
        return redirect('/rak_buku');
    }
}
