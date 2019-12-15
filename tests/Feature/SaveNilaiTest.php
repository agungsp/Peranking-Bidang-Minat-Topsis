<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use App\Model\savenilai;

class SaveNilaiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testModelSaveNilaiGagal1()
    {
        $input = [
            'IdMUser' => 'abc'
        ];
        $validator = Validator::make($input, savenilai::rules());
        if (!$validator->fails()) {
            $user = factory(savenilai::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('savenilais', [
            'IdMUser' => '10'
        ]);
    }

    public function testModelSaveNilaiGagal2()
    {
        $input = [
            'IdMUser' => ''
        ];
        $validator = Validator::make($input, savenilai::rules());
        if (!$validator->fails()) {
            $user = factory(savenilai::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('savenilais', [
            'IdMUser' => '10'
        ]);
    }
    
    public function testModelSaveNilaiBerhasil()
    {
        $input = [
            'IdMUser' => 10
        ];
        $validator = Validator::make($input, savenilai::rules());
        if (!$validator->fails()) {
            $user = factory(savenilai::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('savenilais', [
            'IdMUser' => '10'
        ]);
    }
}