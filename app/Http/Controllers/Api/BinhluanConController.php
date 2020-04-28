<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BinhluanConController extends Controller
{
    public function show($id)
    {
        $binhluans = DB::table('binhluan')->where('Binhluan_cha', $id)->where('Trangthai', 1)->get();
        return response()->json($binhluans, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
