<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->all();

        if ($request->has('foto')) {
            $path = $request->file('foto')->store('fotopenyakit');
            $data['foto'] = $path;
        }

        $penyakit = Penyakit::create($data);
        $penyakit->save();

        return redirect()->route('penyakit.index')->with('success_message', ' Data berhasil ditambahkan');
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
            ->with('error_message', 'Penyakit dengan id' . $id . 'tidak ditemukan');
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
        $data = $request->all();
        $penyakit = Penyakit::find($id);
        if ($request->has('foto')) {
            $data['foto'] = $request->file('foto')->store('fotopenyakit');
        }
        $penyakit->update($data);
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
