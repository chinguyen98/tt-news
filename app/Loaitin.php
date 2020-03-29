<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    public function listTin(){
        return $this->hasMany(Tin::class, 'Id_loaitin', 'Id_loaitin');
    }

    protected $primaryKey = 'Id_loaitin';
    protected $table = 'loaitin';
}
