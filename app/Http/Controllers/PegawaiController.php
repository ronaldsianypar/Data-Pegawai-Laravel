<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Jabatan;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jml_pegawai = Pegawai::all()->count();
        $data_pegawai = Pegawai::with('jabatan')->latest()->paginate(10);
        return view('Pegawai.data-pegawai', compact('data_pegawai',));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jab = Jabatan::all();
        return view('Pegawai.create-pegawai', compact('jab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Pegawai::create([
        'nama' => $request->nama,
        'jabatan_id' => $request->jabatan_id,
        'alamat' => $request->alamat,
        'tgl_lahir' => $request->tgl_lahir,
        ]);

        return redirect('data-pegawai')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jab = Jabatan::all();
        $peg = Pegawai::with('jabatan')->findorfail($id);
        return view('Pegawai.edit-pegawai', compact('peg', 'jab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peg = Pegawai::findorfail($id);
        $peg->update($request->all());
        return redirect('data-pegawai')->withSuccess('Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peg = Pegawai::findorfail($id);
        $peg->delete();
        return back()->with('info','Data Berhasil Dihapus!');
    }

    // untuk mencetak seluruh data
    public function print()
    {
        $cetakdata_pegawai = Pegawai::all();
        return view('Pegawai.cetak-pegawai', compact('cetakdata_pegawai'));
            // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function printForm()
    {
        return view('Pegawai.cetak-pegawaiForm');
    }

    public function printFormPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakPertanggal = Pegawai::with('jabatan')->latest()->whereBetween('tgl_lahir', [$tglawal, $tglakhir])->get();
        return view('Pegawai.cetak-pegawai-pertanggal', compact('cetakPertanggal'));
    }
}
