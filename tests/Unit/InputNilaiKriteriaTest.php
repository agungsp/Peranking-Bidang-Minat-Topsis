<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\InputNilaiKriteria;
use Illuminate\Http\Request;

class InputNilaiKriteriaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAkses()
    {
        $inputNilaiKriteria = new InputNilaiKriteria();
        $request = new Request();
        $request->request->add([
            "foo" => "bar"            
        ]);        
        $request->setMethod("GET");
        
        $inputNilaiKriteria->IsDebug = true;
        $inputNilaiKriteria->index($request);

        $this->assertTrue($inputNilaiKriteria->Status);
    }

    public function testInput()
    {
        $inputNilaiKriteria = new InputNilaiKriteria();
        $request = new Request();
        $request->request->add([
            "_method" => "PUT",
            "_token" => csrf_field(),
            "rpl" => [0 => "5", 1 => "3", 2 => "3"],
            "ai"  => [0 => "3", 1 => "2", 2 => "4"],
         "jarkom" => [0 => "2", 1 => "3", 2 => "4"]         
        ]);        
        $request->setMethod("PUT");
        
        $inputNilaiKriteria->IsDebug = true;
        $inputNilaiKriteria->insert($request);

        print_r($inputNilaiKriteria->arrayDebug);
        $this->assertTrue($inputNilaiKriteria->Status);
    }
}
