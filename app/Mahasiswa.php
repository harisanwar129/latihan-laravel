<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
   protected $table='mahasiswa';
    protected $primaryKey='npm';
    public $incrementing=false;
    protected $keyType='char';
}
