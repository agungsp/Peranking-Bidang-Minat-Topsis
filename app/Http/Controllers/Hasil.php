<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Model\savenilai;
use App\Model\savenilaid;
use App\Model\savetopsis;
use App\Model\savetopsisd;
use App\Lib\topsis;


class Hasil extends Controller
{
    public $IsDebug = false;
    public $Status = false;
    public $arrayDebug = [];

    public function index(Request $request)
    {
        $topsis = new topsis;
        $CanProcess = true;

        $kriteria = DB::table('MasterKriteria')->get();
        $alternatif = DB::table('MasterAlternatif')->get();
        $MaxIDSave = DB::table('savenilais')->count();
        
        if (!$this->IsDebug){
            for ($i=0; $i < 4; $i++) {
                ${$kriteria[$i]->KdMKriteria.'val'} = SESSION::get("{$kriteria[$i]->KdMKriteria}");
            }
        } else {
            $dataKriteria = $request->request->get('kriteria');
            $dataSession = $request->request->get('dataSession');
            // dd($dataKriteria[0]['KdMKriteria']);
            // dd($dataSession[0]["pekerjaan"]);

            for ($i=0; $i < 4; $i++) {
                ${$dataKriteria[$i]['KdMKriteria'].'val'} = $dataSession[$i]["{$dataKriteria[$i]['KdMKriteria']}"];
            }
        }

        if (!$this->IsDebug){
            if ($request->hasSession()){
                if ($request->session()->has('submit')){
                    if ($request->session()->get('submit') != 1 ){
                        $CanProcess = false;    
                    }
                } else {
                    $CanProcess = false;
                }
            } else {
                $CanProcess = false;
            }
        }

        if ($CanProcess) {
            if (!$this->IsDebug){
                for ($i=0; $i < 4; $i++) {
                    ${$kriteria[$i]->KdMKriteria} = array(
                        "{$alternatif[0]->KdMAlternatif}" => ${$kriteria[$i]->KdMKriteria.'val'}["{$alternatif[0]->KdMAlternatif}"],
                        "{$alternatif[1]->KdMAlternatif}" => ${$kriteria[$i]->KdMKriteria.'val'}["{$alternatif[1]->KdMAlternatif}"],
                        "{$alternatif[2]->KdMAlternatif}" => ${$kriteria[$i]->KdMKriteria.'val'}["{$alternatif[2]->KdMAlternatif}"]
                    );

                    for ($j=0; $j < count($alternatif); $j++) {
                        savenilaid::create([
                            'IdSaveNilai' => $MaxIDSave+1,
                            'IdMAlternatif' => $alternatif[$j]->IdMAlternatif,
                            'IdMKriteria' => $kriteria[$i]->IdMKriteria,
                            'Nilai' => ${$kriteria[$i]->KdMKriteria}[$alternatif[$j]->KdMAlternatif]
                        ]);
                    }
                }

                savenilai::create([
                    'IdMUser' => $request->session()->get('login_state')->IdMUser
                ]);
            } else {
                for ($i=0; $i < 4; $i++) { 
                    ${$dataKriteria[$i]['KdMKriteria']} = array(
                        "{$alternatif[0]->KdMAlternatif}" => ${$dataKriteria[$i]['KdMKriteria'].'val'}["{$alternatif[0]->KdMAlternatif}"],
                        "{$alternatif[1]->KdMAlternatif}" => ${$dataKriteria[$i]['KdMKriteria'].'val'}["{$alternatif[1]->KdMAlternatif}"],
                        "{$alternatif[2]->KdMAlternatif}" => ${$dataKriteria[$i]['KdMKriteria'].'val'}["{$alternatif[2]->KdMAlternatif}"]
                    );
                }
            }

            for ($i=0; $i < 4; $i++) {
                if (!$this->IsDebug){
                    $topsis->setDatasets("{$kriteria[$i]->KdMKriteria}", ${$kriteria[$i]->KdMKriteria}, $kriteria[$i]->Bobot);
                } else {
                    $topsis->setDatasets("{$dataKriteria[$i]['KdMKriteria']}", ${$dataKriteria[$i]['KdMKriteria']}, $dataKriteria[$i]['Bobot']);
                }
            }

            $topsis->run();
            // dd($topsis->getAllDatasets());
            // dd($topsis->getAllPembagi());
            // dd($topsis->getAllNormalisasi());
            // dd($topsis->getAllTerbobot());
            // dd($topsis->getAllA_Plus());
            // dd($topsis->getAllA_Min());
            // dd($topsis->getAllD_Plus());
            // dd($topsis->getAllD_Min());
            // dd($topsis->getAllV());
            $this->arrayDebug = $topsis->getAllV();
            $this->Status = !empty($topsis->getAllV());
            if (!$this->IsDebug) {
                $UserCount = DB::table('SaveTopsiss')->where('IdMUser', $request->session()->get('login_state')->IdMUser)->count();
                if ($UserCount > 0) {
                    // Update
                    $Master = DB::table('SaveTopsiss')->where('IdMUser', $request->session()->get('login_state')->IdMUser)->get();

                    $Detail = savetopsisd::where('IdSaveTopsis', $Master[0]->IdSaveTopsis)->delete();
                    $V = $topsis->getAllV();
                    foreach ($V as $key => $value) {
                        $al = DB::table('MasterAlternatif')->where('KdMAlternatif', $key)->get();

                        savetopsisd::create([
                            'IdSaveTopsis' => $Master[0]->IdSaveTopsis,
                            'IdMAlternatif' => $al[0]->IdMAlternatif,
                            'Nilai' => $value
                        ]);
                    }
                }
                else {
                    // Insert
                    savetopsis::create([
                        'IdMUser' => $request->session()->get('login_state')->IdMUser
                    ]);

                    $Master = DB::table('SaveTopsiss')->where('IdMUser', $request->session()->get('login_state')->IdMUser)->get();

                    $Detail = savetopsisd::where('IdSaveTopsis', $Master[0]->IdSaveTopsis)->delete();
                    $V = $topsis->getAllV();
                    foreach ($V as $key => $value) {
                        $al = DB::table('MasterAlternatif')->where('KdMAlternatif', $key)->get();
                        savetopsisd::create([
                            'IdSaveTopsis' => $Master[0]->IdSaveTopsis,
                            'IdMAlternatif' => $al[0]->IdMAlternatif,
                            'Nilai' => $value
                        ]);
                    }
                }

                $request->session()->forget('submit');

                

                $TopsisTable = DB::table('gettopsisview')
                                -> selectRaw(DB::raw('NmMAlternatif, Nilai'))
                                -> where('IdMUser', $request->session()->get('login_state')->IdMUser)
                                -> get();

                $TopsisResult = array();
                for ($i=0; $i < count($TopsisTable); $i++) {
                    $TopsisResult[$TopsisTable[$i]->NmMAlternatif] = $TopsisTable[$i]->Nilai;
                }

                return view('hasil', ['topsis' => $TopsisResult, 'kriteria' => $kriteria, 'alternatif' => $alternatif,
                                    'nm_pendek' => $request->session()->get('login_state')->nama_pendek,
                                    'nm_panjang' => $request->session()->get('login_state')->nama]);
            }      
        }
    }
}
