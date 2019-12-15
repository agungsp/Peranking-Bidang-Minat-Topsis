<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use App\Model\savetopsisd;

class SaveTopsisDTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testModelSaveTopsisDGagal1()
    {
        $input = [
            'IdSaveTopsis' => '',
            'IdMAlternatif' => '',
            'Nilai' => '' 
        ];
        $validator = Validator::make($input, savetopsisd::rules());
        if (!$validator->fails()){
            $user = factory(savetopsisd::class, 1)->create($input);
        }        
        return $this->assertDatabaseHas('savetopsisds', [
            'IdSaveTopsis' => 10,
            'IdMAlternatif' => 3,
            'Nilai' => 0.50
        ]);   
    }

    public function testModelSaveTopsisDGagal2()
    {
        $input = [
            'IdSaveTopsis' => 'abc',
            'IdMAlternatif' => 'abc',
            'Nilai' => 'abc' 
        ];
        $validator = Validator::make($input, savetopsisd::rules());
        if (!$validator->fails()){
            $user = factory(savetopsisd::class, 1)->create($input);
        }        
        return $this->assertDatabaseHas('savetopsisds', [
            'IdSaveTopsis' => 10,
            'IdMAlternatif' => 3,
            'Nilai' => 0.50
        ]);   
    }

    public function testModelSaveTopsisDBerhasil()
    {
        $input = [
            'IdSaveTopsis' => 10,
            'IdMAlternatif' => 3,
            'Nilai' => 0.50 
        ];
        $validator = Validator::make($input, savetopsisd::rules());
        if (!$validator->fails()){
            $user = factory(savetopsisd::class, 1)->create($input);
        }        
        return $this->assertDatabaseHas('savetopsisds', [
            'IdSaveTopsis' => 10,
            'IdMAlternatif' => 3,
            'Nilai' => 0.50
        ]);   
    }
}
