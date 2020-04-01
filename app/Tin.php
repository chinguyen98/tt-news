<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    public function loaitin()
    {
        return $this->belongsTo(Loaitin::class, 'Id_loaitin');
    }

    protected $primaryKey = 'Id_tin';
    protected $table = 'tin';
}
