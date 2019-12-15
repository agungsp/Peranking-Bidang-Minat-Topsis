<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lib\topsis;

class Home extends Controller
{
    public $IsDebug = false;

    public function index(Request $request)
    {
        //tampilhan hasil topsis pada halaman home\
        if ($request->session()->has('login_state') || $this->IsDebug) {
            $topsis = new topsis;
            $kriteria = DB::table('MasterKriteria')->get();
            $alternatif = DB::table('MasterAlternatif')->get();

            $TopsisTable = DB::table('gettopsisview')
                            -> selectRaw(DB::raw('NmMAlternatif, Nilai'))
                            -> where('IdMUser', $request->session()->get('login_state')->IdMUser)
                            -> get();

            $TopsisResult = array();
            for ($i=0; $i < count($TopsisTable); $i++) {
                $TopsisResult[$TopsisTable[$i]->NmMAlternatif] = $TopsisTable[$i]->Nilai;
            }

            return view('home', ['topsis' => $TopsisResult,
                                 'nm_pendek' => $request->session()->get('login_state')->nama_pendek,
                                 'nm_panjang' => $request->session()->get('login_state')->nama]);
        }
        else {
            return view('Login', ['msgType' => '']);
        }
    }
}
