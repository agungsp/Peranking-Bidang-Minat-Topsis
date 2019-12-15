<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class savetopsisd extends Model
{
    public $timestamps = false;
    protected $guarded = ['IdSaveTopsisD'];

    public static function rules(){
        return [
                 'IdSaveTopsis' => 'required|Integer',
                 'IdMAlternatif' => 'required|Integer',
                 'Nilai' => 'required|Numeric'
               ]; 
    }
}
