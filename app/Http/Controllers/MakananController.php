<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakananRequest;
use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanan = Makanan::latest()->get();
        return view('makanan.index', compact('makanan'));
    }

    public function create()
    {
        return view('makanan.create');
    }

    public function store(MakananRequest $request)
    {
        $data = $request->validated();
        Makanan::create($data);
        return redirect(route('makanan.index'));
    }


    public function edit(Makanan $makanan)
    {
        return view('makanan.edit', compact('makanan'));
    }


    public function update(MakananRequest $request, Makanan $makanan)
    {
        $data = $request->validated();
        $makanan->update($data);
        return redirect(route('makanan.index'));
    }


    public function destroy(Makanan $makanan)
    {
        $makanan->delete();
        return redirect(route('makanan.index'));
    }
}
