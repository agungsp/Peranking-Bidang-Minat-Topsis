<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\register;
use Illuminate\Http\Request;

class RegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSignUpBenar()
    {
        $register = new register();
        $request = new Request();
        $request->request->add([
            "_method" => "PUT",
            "_token" => csrf_field(),
            "npm" => "06.2014.1.00001", //BENAR
            "pass" => "agung1234", 
            "submit" => null
        ]);        
        $request->setMethod("PUT");
        
        $register->IsDebug = true;
        $register->signup($request);

        $this->assertTrue($register->CanSignUp);
    }

    public function testSignUpSalah()
    {
        $register = new register();
        $request = new Request();
        $request->request->add([
            "_method" => "PUT",
            "_token" => csrf_field(),
            "npm" => "06.2014.1.06361", //SALAH
            "pass" => "agung1234", 
            "submit" => null
        ]);        
        $request->setMethod("PUT");
        
        $register->IsDebug = true;
        $register->signup($request);

        $this->assertTrue($register->CanSignUp);
    }
}
