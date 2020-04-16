<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    public function loaitin()
    {
        return $this->belongsTo(Loaitin::class, 'Id_loaitin');
    }

    public function listBinhLuan()
    {
        return $this->hasMany(Binhluan::class, 'Id_tin', 'Id_tin');
    }

    protected $primaryKey = 'Id_tin';
    protected $table = 'tin';
}
