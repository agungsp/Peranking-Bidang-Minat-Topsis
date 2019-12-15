<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class InputNilaiKriteria extends Controller
{
    public $IsDebug = false;
    public $Status = true;
    public $arrayDebug = [];

public function index(Request $request)
{
$alternatif = DB::table('MasterAlternatif')->get(); 

$kriteria = DB::table('MasterKriteria')->get();

// $desk_pekerjaan = ['rpl' => 'Software Engineer, System Analyst, Database Analyst, Application Developer, Game Developer, Web Engineer / Web Administrator, Software Tester, Konsultan IT, Digital Startup, Dosen',
//                     'ai' => 'Researcher, Data Scientist, Machine Learning Engineer, Automation Engineer, Application Developer, Game Developer, Intelligent System Developer, Digital Startup, Dosen',
//                     'jarkom' => 'Network Administrator, Network Security, Network Consultant, Networking engineer, Data Communication Engineer, Digital Startup, Dosen'];

$desk_menarik = 'Keinginan, kesukaan, dan kemauan terhadap suatu hal.';
// $salary = ['Database Administrator' => '4,5 jt - 12 jt',
//             'Programmer' => '4,5 jt - 14 jt',
//             'Web Programmer' => '4 jt - 12 jt',
//             'Game Developer' => '6 jt - 13 jt',
//             'Data Scientist' => '5,2 jt - 20 jt',
//             'Network Security' => '5,5 jt - 7,1 jt',
//             'Network Consultant' => '8 jt - 16 jt',
//             'Network Administrator' => '5,8 jt -  7 jt',
//             'Network Engineer' => '8 jt - 12 jt'];

$desk_lingkungan = 'Tempat berlangsungnya kegiatan belajar yang mendapatkan pengaruh dari luar terhadap keberlangsungan kegiatan tersebut';
$desk_pekerjaan = 'Kegiatan yang dilakukan atas dasar keinginan untuk mendapatkan pekerjaan yang diharapkan';
// $figure = ['Bill Gates' => ['pic' => asset('storage/Bill Gates.jpg'),
//                             'data' => 'Pendiri Microsoft'],
//             'Mark Zuckerberg' => ['pic' => asset('storage/Mark Zuckerberg.jpg'),
//                                     'data' => 'Pendiri Facebook'],
//             'Elon Musk' => ['pic' => asset('storage/Elon Musk.jpg'),
//                             'data' => 'Pendiri PayPal'],
//             'Jeff Bezos' => ['pic' => asset('storage/Jeff Bezos.jpg'),
//                             'data' => 'Pendiri Amazon'],
//             'Gabe Newell' => ['pic' => asset('storage/Gabe Newell.png'),
//                                 'data' => 'Pendiri Steam'],
//             'Steve Jobs' => ['pic' => asset('storage/Steve Jobs.jpg'),
//                             'data' => 'Pendiri Apple'],
//             'Arief Widhiyasa' => ['pic' => asset('storage/Arief Widhiyasa.jpg'),
//                                     'data' => 'Pendiri Agate Studio'],
//             'Achmad Zaky' => ['pic' => asset('storage/Achmad Zaky.jpg'),
//                                 'data' => 'Pendiri Bukalapak'],
//             'William Tanuwijaya' => ['pic' => asset('storage/William Tanuwijaya.jpg'),
//                                     'data' => 'Pendiri Tokopedia'],
//             'Andrew Darwis' => ['pic' => asset('storage/Andrew Darwis.jpg'),
//                                 'data' => 'Pendiri Kaskus'],
//             'Jim Geovedi' => ['pic' => asset('storage/Jim Geovedi.png'),
//                                 'data' => 'Expert Hacker']
//             ];

        if ($this->IsDebug){
            if ($this->Status){
                $this->Status = !empty($alternatif);
            }

            if ($this->Status){
                $this->Status = !empty($kriteria);
            }

            // if ($this->Status){
            //     $this->Status = !empty($desk_pekerjaan);
            // }

            // if ($this->Status){
            //     $this->Status = !empty($desk_menarik);
            // }

            // if ($this->Status){
            //     $this->Status = !empty($salary);
            // }

            // if ($this->Status){
            //     $this->Status = !empty($desk_motivasi);
            // }

            // if ($this->Status){
            //     $this->Status = !empty($figure);
            // }
        }

        if (!$this->IsDebug){
            // return view('InputNilaiKriteria', ['alternatif' => $alternatif, 'kriteria' => $kriteria,
            //                                'desk_pekerjaan' => $desk_pekerjaan,
            //                                'desk_menarik' => $desk_menarik,
            //                                'desk_motivasi' => $desk_motivasi,
            //                                'salary' => $salary,
            //                                'figure' => $figure,
            //                                'nm_pendek' => $request->session()->get('login_state')->nama_pendek,
            //                                'nm_panjang' => $request->session()->get('login_state')->nama]);
            return view('InputNilaiKriteria', ['alternatif' => $alternatif, 'kriteria' => $kriteria,
                                            'desk_menarik' => $desk_menarik,
                                            'desk_lingkungan' => $desk_lingkungan,
                                            'desk_pekerjaan' => $desk_pekerjaan,
                                           'nm_pendek' => $request->session()->get('login_state')->nama_pendek,
                                           'nm_panjang' => $request->session()->get('login_state')->nama]);
        }
    }

    public function insert(Request $request)
    {
        $rpl = $request->rpl;
        $ai = $request->ai;
        $jarkom = $request->jarkom;

        $alternatif = DB::table('MasterAlternatif')->get();
        $kriteria = DB::table('MasterKriteria')->get();

        for ($i=0; $i < 3; $i++) {
            ${$kriteria[$i]->KdMKriteria} = array("rpl" => $rpl[$i],
                                                  "ai" => $ai[$i],
                                                  "jarkom" => $jarkom[$i]);
        }

        for ($i=0; $i < 3 ; $i++) {
            if (!$this->IsDebug){
                $request->session()->put("{$kriteria[$i]->KdMKriteria}", ${$kriteria[$i]->KdMKriteria});
            } else {
                $this->arrayDebug["{$kriteria[$i]->KdMKriteria}"] = ${$kriteria[$i]->KdMKriteria};
            }
        }

        $this->Status = !empty($this->arrayDebug);

        if (!$this->IsDebug){
            $request->session()->put('submit', 1);
            return redirect('Hasil');
        }
    }
}
