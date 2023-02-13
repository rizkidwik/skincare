<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view('soal',[
            'pertanyaan' => $pertanyaan
        ]);
    }

    public function proses(Request $request)
    {
        $result = $request->data;
        return $result;
    }
}
