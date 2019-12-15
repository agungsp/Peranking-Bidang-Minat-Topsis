<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Login;
use Illuminate\Http\Request;
// use Illuminate\Session\Store;
// use SessionHandlerInterface;
// use Illuminate\Session\SessionManager;
// use Illuminate\Session\Console;
// use Illuminate\Support\Facades\Session;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testLoginBenar()
    {
        $login = new Login();
        $request = new Request();
        $request->request->add([
            "_method" => "PUT",
            "_token" => csrf_token(),
            "npm" => "06.2014.1.06361", //BENAR
            "nama" => "Agung Setyo Pribadi",
            "pass" => "agungsetyo", //BENAR
            "submit" => null
        ]);        
        $request->setMethod("PUT");
        
        $login->IsDebug = true;
        $login->login($request);
        
        $this->assertTrue($login->LoginStatus);
    }

    public function testLoginSalah1()
    {
        $login = new Login();
        $request = new Request();
        $request->request->add([
            "_method" => "PUT",
            "_token" => csrf_field(),
            "npm" => "06.2014.1.06361", //BENAR
            "pass" => "agung123", //SALAH
            "submit" => null
        ]);        
        $request->setMethod("PUT");
        
        $login->IsDebug = true;
        $login->login($request);

        $this->assertTrue($login->LoginStatus);
    }

    public function testLoginSalah2()
    {
        $login = new Login();
        $request = new Request();
        $request->request->add([
            "_method" => "PUT",
            "_token" => csrf_field(),
            "npm" => "06.2014.1.09999", //SALAH
            "pass" => "agungsetyo", //BENAR
            "submit" => null
        ]);        
        $request->setMethod("PUT");
        
        $login->IsDebug = true;
        $login->login($request);

        $this->assertTrue($login->LoginStatus);
    }

    public function testLoginSalah3()
    {
        $login = new Login();
        $request = new Request();
        $request->request->add([
            "_method" => "PUT",
            "_token" => csrf_field(),
            "npm" => "06.2014.1.09999", //SALAH
            "pass" => "agung123", //SALAH
            "submit" => null
        ]);        
        $request->setMethod("PUT");
        
        $login->IsDebug = true;
        $login->login($request);

        $this->assertTrue($login->LoginStatus);
    }

    // public function testLogout()
    // {
    //     // $login = new Login();
    //     // $request = new Request();
    //     // $ses = $this->session(['foo' => 'bar']);
    //     // $ses->flushSession();

    //     // $request->request->add([
    //     //     "_method" => "PUT",
    //     //     "_token" => csrf_field(),
    //     //     "npm" => "06.2014.1.06361", //BENAR
    //     //     "nama" => "Agung Setyo Pribadi",
    //     //     "pass" => "agung", //BENAR
    //     //     "submit" => null
    //     // ]);        
    //     // $request->setMethod("PUT");
    //     // // $request->setSession($ses);
    //     // dd($ses);
    //     // // $request->session()->put('nama', 'agung');
        
    //     // $login->IsDebug = true;
    //     // $login->login($request);

    //     // $this->assertTrue($login->LoginStatus);

    //     $response = $this->post('/Login', [
    //                             'npm'  => '06.2014.1.06361',
    //                             'pass' => 'agung',
    //                         ]);

    //     // Cek pada session apakah ada error untuk field nama dan description
    //     $response->assertRedirect('/Login');
    // }
}
