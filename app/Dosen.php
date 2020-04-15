<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Dosen extends Model
{
    //
    use softDeletes;
    protected $table='dosen';
    protected $primaryKey='nidn';
    public $incrementing=false;
    protected $keyType='char';
    protected $attributes=[
        'status'=>1 
    ];
    protected $fillable=[
        'nidn',
        'nama',
        'keterangan'
    ];
    public function mahasiswa(){
        return $this->hasOne('App\Mahasiswa','nidn');
        // return $this->hasOne('App\Mahasiswa','dosen_id')
    }
}
