<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Hasil;
use Illuminate\Http\Request;

class HasilTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHasil()
    {
        $hasil = new Hasil();
        $request = new Request();
        $kriteria = array ('kriteria' => [
            ['KdMKriteria' => 'pekerjaan', 'Bobot' => 5],
            ['KdMKriteria' => 'tertarik', 'Bobot' => 4], 
            ['KdMKriteria' => 'motivasi', 'Bobot' => 3],
            ['KdMKriteria' => 'nilaiMK', 'Bobot' => 3],
        ]);

        $dataSession = array ('dataSession' => [
                                            ["pekerjaan" => ["rpl" => 5, "ai" => 3, "jarkom" => 2]],
                                            ["tertarik" => ["rpl" => 3, "ai" => 2, "jarkom" => 3]],
                                            ["motivasi" => ["rpl" => 3, "ai" => 4, "jarkom" => 4]],
                                            ["nilaiMK" => ["rpl" => 2.6875, "ai" => 2.125, "jarkom" => 2.6875]]                                            
                                         ]);

        $request->request->add($kriteria);  
        $request->request->add($dataSession);          
        $hasil->IsDebug = true;
        $hasil->index($request);
        print_r($hasil->arrayDebug);
        $this->assertTrue($hasil->Status);        
    }
}
