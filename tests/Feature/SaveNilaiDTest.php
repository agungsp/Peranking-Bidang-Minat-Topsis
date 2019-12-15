<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use App\Model\savenilaid;

class SaveNilaiDTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testModelSaveNilaiDGagal1()
    {
        $input = [
            'IdSaveNilai' => '',
            'IdMAlternatif' => '',
            'IdMKriteria' => '',
            'Nilai' => '' 
        ];
        $validator = Validator::make($input, savenilaid::rules());
        if (!$validator->fails()){
            $user = factory(savenilaid::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('savenilaids', [
            'IdSaveNilai' => 18,
            'IdMAlternatif' => 1,
            'IdMKriteria' => 1,
            'Nilai' => 30 
        ]);   
    }

    public function testModelSaveNilaiDGagal2()
    {
        $input = [
            'IdSaveNilai' => 10,
            'IdMAlternatif' => 'abc',
            'IdMKriteria' => 7.5,
            'Nilai' => 40 
        ];
        $validator = Validator::make($input, savenilaid::rules());
        if (!$validator->fails()){
            $user = factory(savenilaid::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('savenilaids', [
            'IdSaveNilai' => 18,
            'IdMAlternatif' => 1,
            'IdMKriteria' => 1,
            'Nilai' => 30 
        ]);   
    }

    public function testModelSaveNilaiDBerhasil()
    {
        $input = [
            'IdSaveNilai' => 18,
            'IdMAlternatif' => 1,
            'IdMKriteria' => 1,
            'Nilai' => 30 
        ];
        $validator = Validator::make($input, savenilaid::rules());
        if (!$validator->fails()){
            $user = factory(savenilaid::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('savenilaids', [
            'IdSaveNilai' => 18,
            'IdMAlternatif' => 1,
            'IdMKriteria' => 1,
            'Nilai' => 30 
        ]);   
    }
}
