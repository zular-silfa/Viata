<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        return view('penyakit.index', [
            'penyakit' => $penyakit
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyakit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penyakit = Penyakit::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopenyakit/', $request->file('foto')->getClientOriginalName());
            $penyakit->foto = $request->file('foto')->getClientOriginalName();
            $penyakit->save();
        }
        return redirect()->route('penyakit.index')->with('success_message',' Data berhasil ditambahkan');
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
        $penyakit = Penyakit::find($id);
        if (!$penyakit) return redirect()->route('penyakit.index')
            ->with('error_message', 'Penyakit dengan id'.$id.'tidak ditemukan');
        return view('penyakit.edit', [
            'penyakit' => $penyakit
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
        $penyakit = Penyakit::find($id);
        $penyakit->update($request->all());
        return redirect()->route('penyakit.index')
            ->with('success_message', 'Berhasil mengubah Penyakit Kucing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyakit = Penyakit::find($id);
        $penyakit->delete();
        return redirect()->route('penyakit.index')
        ->with('success_message', 'Data penyakit berhasil dihapus');
    }
}
