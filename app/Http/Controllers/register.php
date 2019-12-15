<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\masteruser;

class register extends Controller
{
    public $CanSignUp = false;
    public $IsDebug = false;

    public function index(Request $request)
    {
        return view('Register', ['msgType' => '']);
    }
    
    public function signup (Request $request)
    {
        $npm = $request->npm;
        $nama = $request->nama;
        $pass = md5($request->pass);

        $CekNPM = DB::table('MasterUsers')->selectRaw(DB::raw('COUNT(npm) as count'))
                                          ->where('npm', "$npm")
                                          ->get();

        if ($CekNPM[0]->count == 0) {
            $this->CanSignUp = true;
            if(!$this->IsDebug){
                masteruser::create([
                    'npm' => $npm,
                    'password' => $pass,
                    'nama' => $nama
                ]);
                return view('/Login', ['msgType' => 'success', 'msgStr' => 'user baru berhasil dibuat.']);
            }
        } else {
            if (!$this->IsDebug) {
                return view('/Register', ['msgType' => 'warning', 'msgStr' => 'user yang dibuat sudah ada.']);
            }
        }
    }
}
