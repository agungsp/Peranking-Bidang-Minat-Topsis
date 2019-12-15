<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use App\Model\savetopsis;

class SaveTopsisTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testModelSaveTopsisGagal1()
    {
        $input = [
            'IdMUser' => ''
        ];
        $validator = Validator::make($input, savetopsis::rules());
        if (!$validator->fails()){
            $user = factory(savetopsis::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('savetopsiss', ['IdMUser' => '10']);  
    }

    public function testModelSaveTopsisGagal2()
    {
        $input = [
            'IdMUser' => 'abc'
        ];
        $validator = Validator::make($input, savetopsis::rules());
        if (!$validator->fails()){
            $user = factory(savetopsis::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('savetopsiss', ['IdMUser' => '10']);  
    }

    public function testModelSaveTopsisBerhasil()
    {
        $input = [
            'IdMUser' => 10
        ];
        $validator = Validator::make($input, savetopsis::rules());
        if (!$validator->fails()){
            $user = factory(savetopsis::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('savetopsiss', ['IdMUser' => '10']);  
    }
}
