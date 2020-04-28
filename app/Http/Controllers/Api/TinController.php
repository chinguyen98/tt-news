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
        $result = DB::select('SELECT tin.Id_tin, tin.Tieude, tin.Ngaydangtin, tin.Hinhdaidien, tin.Tacgia from nhomtin JOIN loaitin on nhomtin.Id_nhomtin=loaitin.Id_nhomtin JOIN tin on loaitin.Id_loaitin=tin.Id_loaitin where nhomtin.Id_nhomtin=? and tin.Trangthai=1 ORDER BY tin.Ngaydangtin DESC LIMIT ?, 6', [$id, $page * 6]);
        return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
