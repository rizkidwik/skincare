<?php

namespace App\Http\Controllers\User;

use App\Models\Answer;
use App\Models\Kategori;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view('survei',[
            'pertanyaan' => $pertanyaan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function proses(Request $request)
    {
        $validReq = $request->validate(
            [
                'vector' => 'required|array',
            ],
            [
                'vector.required' => 'Pertanyaan harus diisi',
            ]
        );
        $allPertanyaan = Pertanyaan::all();
        foreach($allPertanyaan as $pertanyaan)
        {
            $vectorPertanyaan[] =json_decode($pertanyaan->vector);
        }

        $answer = array_values($validReq['vector']);

            for($j=0;$j<count($vectorPertanyaan[$j]);$j++):
        for($i=0;$i < count($answer);$i++):
            $hasilHitung_x[] = pow((int)$vectorPertanyaan[$i][$j] - $answer[$i],2);
    endfor;
endfor;
    $hasil = array_chunk($hasilHitung_x,20);
    for($i=0; $i < count($hasil);$i++){
        $hasil_jumlah[] = sqrt(array_sum($hasil[$i]));
    }

    asort($hasil_jumlah, SORT_NUMERIC);
    // $hasil_knn = array_slice($hasil_jumlah, 0, 3);
    $kategori = Kategori::all();
    print_r($hasil);
    print_r($hasil_jumlah);
    // print_r($hasil_knn);
        $i = 0;
        foreach($hasil_jumlah as $key => $value)
        {
            echo $kategori[$key]->kategori . ",";
            if(++$i > 2) break;
        }

    }
}
