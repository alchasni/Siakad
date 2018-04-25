<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $primaryKey = 'kodekelas';
    public $incrementing = false;
    protected $fillable = ['kodekelas', 'kodematkul', 'nip'];

    public function matkul(){
    	return $this->belongsToMany('App\matkul', 'kodematkul', 'kodematkul');
    }

    public function dosen(){
    	return $this->belongsTo('App\dosens', 'nip', 'nip');
    }

    public function ambilKelas(){
    	return $this->hasMany('App\ambilKelas', 'kodekelas');
    }
}
