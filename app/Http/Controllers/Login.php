<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Login extends Controller
{
    public $LoginStatus = false;
    public $IsDebug = false;

    public function index(Request $request)
    {
        return view('Login', ['msgType' => '']);
    }

    public function login(Request $request)
    {
        $npm = $request->npm;
        $pass = $request->pass;
        $err_msg = "";

        $user_count = DB::table('MasterUsers')->where('npm', $npm)
                                              ->where('password', md5($pass))
                                              ->count();

        if ($user_count > 0) {
            $this->LoginStatus = true;
            if(!$this->IsDebug){
                $user = DB::table('MasterUsers')->where('npm', $npm)
                                                ->where('password', md5($pass))
                                                ->get();

                $user_arr = $user[0];
                $nm_pendek = explode(" ", $user_arr->nama);
                $user_arr->nama_pendek = $nm_pendek[0];
                $user_arr->logged_at = Carbon::now()->toDateTimeString();

                $request->session()->put('login_state', $user_arr);
                // dd($request);
                return redirect('/');
            }
        }
        else {
            $err_msg = "NPM atau Password Salah!";
            if(!$this->IsDebug){
                return view('Login', ['msgType' => 'warning', 'msgStr' => $err_msg]);
            }
        }
    }
    public function out(Request $request)
    {
        $request->session()->flush();

        if(!$this->IsDebug){
            return redirect('/');
        } else {
            if(!$request->session()->has("login_state")){
                $this->LoginStatus = false;
            }
        }
    }
}
