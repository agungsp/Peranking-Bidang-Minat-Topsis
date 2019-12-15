<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class savenilaid extends Model
{
    public $timestamps = false;
    protected $guarded = ['IdSaveNilaiD'];
    
    public static function rules(){
        return [
                 'IdSaveNilai' => 'required|Integer',
                 'IdMAlternatif' => 'required|Integer',
                 'IdMKriteria' => 'required|Integer',
                 'Nilai' => 'required|Numeric'
               ]; 
     }
}
