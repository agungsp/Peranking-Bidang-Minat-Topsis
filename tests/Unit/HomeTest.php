<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Home;
use Illuminate\Http\Request;

class HomeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHomeBenar()
    {
        //SALAH
        $response = $this->s
                         ->get('/');
        dd($response);
                         
    }
}
