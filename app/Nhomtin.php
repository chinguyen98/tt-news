<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhomtin extends Model
{
    public function listLoaiTin()
    {
        return $this->hasMany(Loaitin::class, 'Id_nhomtin', 'Id_nhomtin');
    }

    protected $primaryKey = 'Id_nhomtin';
    protected $table = 'nhomtin';
}
