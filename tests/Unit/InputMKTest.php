<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\InputNilaiMK;
use Illuminate\Http\Request;

class InputMKTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAkses()
    {
        $inputMK = new InputNilaiMK();
        $request = new Request();
        $request->request->add([
            "foo" => "bar"            
        ]);        
        $request->setMethod("GET");
        
        $inputMK->IsDebug = true;
        $inputMK->index($request);

        $this->assertTrue($inputMK->Status);
    }

    public function testInput()
    {
        $inputMK = new InputNilaiMK();
        $request = new Request();
        $request->request->add([
            "_method" => "PUT",
            "_token" => csrf_field(),
            "all" => [0 => "80", 1 => "86", 2 => "78", 3 => "98", 4 => "93",
                      5 => "91", 6 => "77", 7 => "79",8 => "84", 9 => "85", 10 => "82"],
            "rpl" => [0 => "96", 1 => "83", 2 => "84", 3 => "85", 4 => "87"],
            "ai"  => [0 => "78", 1 => "96", 2 => "86", 3 => "83", 4 => "83"],
         "jarkom" => [0 => "75", 1 => "77", 2 => "78", 3 => "90", 4 => "96"]
        ]);        
        $request->setMethod("PUT");
        $inputMK->IsDebug = true;
        $inputMK->insert($request);        

        print_r($inputMK->arrayDebug);
        $this->assertTrue($inputMK->Status);
    }
}
