<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class savetopsis extends Model
{
    protected $table = 'savetopsiss';
    protected $fillable = ['IdMUser'];

    public static function rules(){
        return [
                 'IdMUser' => 'required|Integer'
               ]; 
    }
}
