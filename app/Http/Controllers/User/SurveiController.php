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


    public function proses(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validReq = $request->validate(
            [
                'vector' => 'required|array',
            ],
            [
                'vector.required' => 'Pertanyaan harus diisi',
            ]
        );

        // Ambil data pertanyaan
        $allPertanyaan = Pertanyaan::all();
        foreach($allPertanyaan as $pertanyaan)
        {
            $vectorPertanyaan[] =json_decode($pertanyaan->vector);
        }

        // Ambil hanya data angka tanpa label
        $answer = array_values($validReq['vector']);

        //  Lakukan perhitungan array dengan perulangan
            for($j=0;$j<count($vectorPertanyaan[$j]);$j++):
                for($i=0;$i < count($answer);$i++):
                    $hasilHitung_x[] = pow((int)$vectorPertanyaan[$i][$j] - $answer[$i],2);
                endfor;
            endfor;

    // bagi array sesuai dengan jumlah pertanyaan
    $hasil = array_chunk($hasilHitung_x,count($vectorPertanyaan));
    // lakukan perhitungan akar
    for($i=0; $i < count($hasil);$i++){
        $hasil_jumlah[] = sqrt(array_sum($hasil[$i]));
    }

    // urutkan array
    asort($hasil_jumlah, SORT_NUMERIC);

    $kategori = Kategori::all();

    $arr_hasil = array();

    $arr_cek = $hasil_jumlah;
    for($i=0;$i<count($hasil_jumlah);$i++)
    {
        $cek_array = array_search(min($hasil_jumlah),$arr_cek);
        // hapus data array yang sama dengan data terkecil
        array_push($arr_hasil,$cek_array);
        unset($arr_cek[$cek_array]);
    }

    // hilangkan data kosong dengan 'strlen'
    $arr_hasil = array_filter($arr_hasil,'strlen');
    $hasil_kategori = array();
    $hasil_keterangan = array();
    $hasil_icon = array();

    // ambil data-data pada array dan masukkan sesuai dengan field
    for($i=0;$i<count($arr_hasil);$i++)
    {
        array_push($hasil_kategori,$kategori[$arr_hasil[$i]]->kategori);
        array_push($hasil_keterangan,$kategori[$arr_hasil[$i]]->keterangan);
        array_push($hasil_icon,$kategori[$arr_hasil[$i]]->icon);
    }

    // Insert data ke database
    Answer::create([
        'id_user' => Auth::user()->id,
        'answer' => json_encode($answer),
        'result' => json_encode($hasil_kategori),
    ]);

    // kembalikan ke tampilan / view dengan data-data
    return view('user.hasil')->with([
        'hasil_kategori' => $hasil_kategori,
        'hasil_keterangan' => $hasil_keterangan,
        'hasil_icon' => $hasil_icon,
        'all_result' => $hasil_jumlah,
    ]);

    }

    public function history()
    {
        $answer = Answer::where('id_user',Auth::user()->id)->get();
        return view('user.history',[
            'answer' => $answer,
        ]);
    }
}
