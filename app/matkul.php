<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    //
    protected $primaryKey = 'kodematkul';
    public $incrementing = false;
    protected $fillable = ['kodematkul', 'namamatkul', 'sks'];

    public function kelas(){
    	return $this->hasMany('App\kelas', 'kodematkul');
    }
}
