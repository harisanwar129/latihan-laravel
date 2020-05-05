<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Dosen extends Model
{
    //
    use SoftDeletes;
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
    public function allMhs(){
        return $this->hasMany('App\Mahasiswa','nidn');

    }
    // many to many
    public function matkul(){
        return $this->belongsToMany('App\Matakuliah','jadwal','nidn','kode_matakuliah');
    }
    // onehastthroug on
    public function oneKrs(){
        return $this->hasOneThrough('App\Krs','App\Mahasiswa','nidn','npm','nidn','npm');
    }
    // many hastthroug
    public function manyKrs(){
        return $this->hasManyThrough('App\Krs','App\Mahasiswa','nidn','npm','nidn','npm');
    }
    public static function getDosen($nidn){
        $dosen=Dosen::where('nidn',$nidn)->get();
        return $dosen;
    }
}
