<?php

namespace App\Http\Controllers\User;

use App\Models\Answer;
use App\Models\Kategori;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        return view('user.survei',[
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

        $id_user = Auth::user()->id;
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
    // $hitung = array_count_values($hasil_jumlah);
    // print_r($hitung);
    $arr_hasil = array();

    $arr_cek = $hasil_jumlah;
    for($i=0;$i<count($hasil_jumlah);$i++)
    {
        $cek_array = array_search(min($hasil_jumlah),$arr_cek);
        // hapus data array
        array_push($arr_hasil,$cek_array);
        unset($arr_cek[$cek_array]);
    }
    // print_r($hasil_jumlah);
    $arr_hasil = array_filter($arr_hasil,'strlen');
    $hasil_akhir = array();
    for($i=0;$i<count($arr_hasil);$i++)
    {
        array_push($hasil_akhir,$kategori[$arr_hasil[$i]]->kategori);
    }
    // var_dump("Sukses",$hasil_akhir);
    return view('user.hasil')->with([
        'hasil_akhir' => $hasil_akhir
    ]);

    Answer::create([
        'id_user' => $id_user,
        'answer' => json_encode($answer)
    ]);
    }
}
