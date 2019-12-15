<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class InputNilaiMK extends Controller
{
    public $Status = false;
    public $IsDebug = false;
    public $arrayDebug = [];

    public function index(Request $request)
    {
        $listMK1 = DB::table('MasterMKS')->where('IdMasterMK', '<', '8')->get();
        $listMK2 = DB::table('MasterMKS')->where('IdMasterMK', '>', '7')->where('IdMasterMK', '<', '15')->get();
        $listMK3 = DB::table('MasterMKS')->where('IdMasterMK', '>', '14')->where('IdMasterMK', '<', '22')->get();
        $listMK4 = DB::table('MasterMKS')->where('IdMasterMK', '>', '21')->get();
        $this->Status = true;

        if (!$this->IsDebug) {
            return view('InputNilaiMK', ['mk1' => $listMK1, 'mk2' => $listMK2, 'mk3' => $listMK3, 'mk4' => $listMK4,
                                        'nm_pendek' => $request->session()->get('login_state')->nama_pendek,
                                        'nm_panjang' => $request->session()->get('login_state')->nama]);
        }
    }

    public function insert(Request $request)
    {
        $all = $request->all;
        $rpl = $request->rpl;
        $ai = $request->ai;
        $jarkom = $request->jarkom;
        // dd($request);

        $alternatif = DB::table('MasterAlternatif')->get();
        foreach ($alternatif as $key) {
            ${$key->KdMAlternatif.'_rata2'} = (array_sum($all) + array_sum(${$key->KdMAlternatif})) / 
                                              (count($all) + count(${$key->KdMAlternatif}));
        }

        $nilaiMK = array("rpl" => $rpl_rata2,
                         "ai" => $ai_rata2,
                         "jarkom" => $jarkom_rata2);
        // dd($nilaiMK);

        if (!$this->IsDebug){
            $request->session()->put('nilaiMK', $nilaiMK);
        } else {
            $this->arrayDebug = (['nilaiMK' => $nilaiMK]);
            $this->Status = Arr::has($this->arrayDebug, 'nilaiMK');
        }

        if (!$this->IsDebug) {
            return redirect('InputNilaiKriteria');
        }
    }
}
