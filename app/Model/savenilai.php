<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class savenilai extends Model
{
    protected $fillable = ['IdMUser'];

    public static function rules(){
        return [
                 'IdMUser' => 'required|Integer'
               ]; 
     }
}
