<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Model\masteruser;

class AksesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomeAkses()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertDontSeeText('Selamat')
                 ->assertSee('Login');
    }

    public function testLoginAkses()
    {
        $response = $this->get('/Login');

        $response->assertStatus(200)
                 ->assertSee('Login')
                 ->assertSee('NPM')
                 ->assertSee('Password')
                 ->assertSee('Register')
                 ->assertSee('Skripsi');
    }   

    public function testRegisterAkses()
    {
        $response = $this->get('/Register');

        $response->assertStatus(200)
                 ->assertSee('Register')
                 ->assertSee('NPM')
                 ->assertSee('Password')
                 ->assertSee('Register')
                 ->assertSee('Skripsi');
    }

    public function testInputNilaiMKAkses()
    {
        // $response = $this->withSession(["login_state" => ["IdMUser" => 1,
        //                                                   "npm" => "06.2014.1.06361",
        //                                                   "password" => "e59cd3ce33a68f536c19fedb82a7936f",
        //                                                   "nama" => "Agung Setyo Pribadi",
        //                                                   "created_at" => "2019-05-08 04:40:59",
        //                                                   "updated_at" => "2019-05-08 04:41:04",
        //                                                   "nama_pendek" => "Agung",
        //                                                   "logged_at" => "2019-06-20 17:52:18",
        //                                                 ]])
        //                 ->get('/InputNilaiMK');

        $response = $this->get('/InputNilaiMK')->see("Selamat");
        $response->assertResponseOk();
        // $response->assertStatus(200);
                //  ->assertSee('Login')    
                //  ->assertSee('NPM')
                //  ->assertSee('Password')
                //  ->assertSee('Register')
                //  ->assertSee('Skripsi');
    }

    public function testInputNilaiKriteriaAkses()
    {
        $response = $this->get('/InputNilaiKriteria');

        $response->assertStatus(200);
    }

    public function testHasilAkses()
    {
        $response = $this->get('/Hasil');

        $response->assertStatus(200);
    }

    public function testLogoutAkses()
    {
        $response = $this->get('/Logout');

        $response->assertRedirect('/');
    }

    public function testModelMasterUser()
    {
        $input = [
            'npm' => '',
            'nama' => 'Budi Darmanto',
            'password' => md5('Agung')
        ];

        $validator = Validator::make($input, masteruser::rules());

        if (!$validator->fails()){
            $user = factory(masteruser::class, 1)->create($input);
            return $this->assertDatabaseHas('masterusers', [
                'nama' => 'Paijo'
            ]);   
        } else {
            return $this->assertDatabaseHas('masterusers', [
                'nama' => 'Paijo'
            ], $validator->errors()->first());   
        }   
    }
}
