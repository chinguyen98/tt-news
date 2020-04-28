<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TinController extends Controller
{
    public function show(Request $request, $id)
    {
        $page = $request->query('page') - 1;
        $tins = DB::select('SELECT * FROM tin JOIN loaitin ON tin.Id_loaitin=loaitin.Id_loaitin JOIN nhomtin on loaitin.Id_nhomtin = nhomtin.Id_nhomtin WHERE nhomtin.Id_nhomtin=? and tin.Trangthai=1 and loaitin.Trangthai=1 and nhomtin.Trangthai = 1 ORDER BY tin.Ngaydangtin DESC limit ?,6', [$id, $page * 6]);
        return response()->json($tins, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
