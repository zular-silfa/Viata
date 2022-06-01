<?php

namespace App\Http\Controllers;

use App\Models\Perawatan;
use Illuminate\Http\Request;

class PerawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perawatan = Perawatan::all();
        return view('perawatan.index', [
            'perawatan' => $perawatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perawatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kucing' => 'required',
            'foto' => 'required',
            'ciri-ciri' => 'required',
            'perawatan' => 'required'
        ]);
        $array = $request->only([
            'jenis_kucing', 'foto', 'ciri-ciri', 'perawatan'
        ]);
        $perawatan = Perawatan::create($array);
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotokucing/', $request->file('foto')->getClientOriginalName());
        }
        return redirect()->route('perawatan.index')
            ->with('success_message', 'Data perawatan baru berhasil disimpan');

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
        $perawatan = Perawatan::find($id);
        if ($perawatan) return redirect()->route('perawatan.index')
            ->with('error_message', 'Perawatan dengan id'.$id.'tidak ditemukan');
        return view('perawatan.edit', [
            'perawatan' => $perawatan
        ]);
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
        $request->validate([
            'jenis_kucing' => 'required',
            'foto' => 'required',
            'ciri-ciri' => 'required',
            'perawatan' => 'required'
        ]);
        $perawatan = Perawatan::find($id);
        $perawatan->jenis_kucing = $request->jenis_kucing;
        $perawatan->foto = $request->foto;
        $perawatan->ciri_ciri = $request->ciri_ciri;
        $perawatan->perawatan = $request->perawatan;
        $perawatan->save();
        return redirect()->route('perawatan.index')
            ->with('success_message', 'Berhasil mengubah Perawatan Kucing');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('perawatan')->where('id',$id)->delete();
        return redirect()->route('perawatan.index')
        ->with('success_message', 'Data perawatan berhasil dihapus');
    }
}
