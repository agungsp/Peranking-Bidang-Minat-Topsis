<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class masteruser extends Model
{
    protected $fillable = ['npm', 'password', 'nama'];

    public static function rules(){
       return [
                'npm' => 'required',
                'password' => 'required|min:8',
                'nama' => 'required'
              ]; 
    }
}
