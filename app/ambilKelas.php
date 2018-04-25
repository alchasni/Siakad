<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ambilKelas extends Model
{
    //
    public $incrementing = true;
    protected $fillable = ['nrp', 'kodekelas', 'uts', 'uas'];
    public $table = 'ambilKelas';

    public function kelas(){
    	return $this->belongsToMany('App\kelas', 'kodekelas', 'kodekelas');
    }

    public function mhs(){
    	return $this->belongsToMany('App\mhs', 'nrp', 'nrp');
    }
}
