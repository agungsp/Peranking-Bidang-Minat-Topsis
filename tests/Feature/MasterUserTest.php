<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Validator;
use App\Model\masteruser;

class MasterUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testModelMasterUserGagal1()
    {
        $input = [
            'npm' => '', // NPM KOSONG
            'nama' => 'Budi Setyawan', // NAMA TERISI
            'password' => md5('12345') // PASSWORD < 8 
        ];
        $validator = Validator::make($input, masteruser::rules());        
        if (!$validator->fails()){
            $user = factory(masteruser::class, 1)->create($input);
        }        
        return $this->assertDatabaseHas('masterusers', [
            'nama' => 'Budi Setyawan'
        ]);              
    }

    public function testModelMasterUserGagal2()
    {
        $input = [
            'npm' => '06.2014.1.00002', // NPM TERISI
            'nama' => '', // NAMA KOSONG
            'password' => md5('12345') // PASSWORD < 8
        ];
        $validator = Validator::make($input, masteruser::rules());
        if (!$validator->fails()){
            $user = factory(masteruser::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('masterusers', [
            'nama' => 'Budi Setyawan'
        ]);   
    }

    public function testModelMasterUserBerhasil()
    {
        $input = [
            'npm' => '06.2014.1.00002', // NPM TERISI
            'nama' => 'Budi Setyawan', // NAMA TERISI
            'password' => md5('12345678') // PASSWORD = 8
        ];
        $validator = Validator::make($input, masteruser::rules());
        if (!$validator->fails()){
            $user = factory(masteruser::class, 1)->create($input);
        }
        return $this->assertDatabaseHas('masterusers', [
            'nama' => 'Budi Setyawan'
        ]);      
    }
}
