<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Perawatan;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getTreatmentList()
    {
        $treatments =  Perawatan::latest()->get();
        return $treatments;
    }

    public function getFoodList()
    {
        $foods = Makanan::latest()->get();
        return $foods;
    }
}
