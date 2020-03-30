<?php

namespace App\Http\Controllers;

use App\Nhomtin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $listnhomtin = Nhomtin::all();
        $listLastestNew = array();
        foreach ($listnhomtin as $nhomtin) {
            $result = DB::select('SELECT tin.Tieude, tin.Ngaydangtin, tin.Hinhdaidien, tin.Tacgia from nhomtin JOIN loaitin on nhomtin.Id_nhomtin=loaitin.Id_nhomtin JOIN tin on loaitin.Id_loaitin=tin.Id_loaitin where nhomtin.Id_nhomtin=? ORDER BY tin.Ngaydangtin DESC LIMIT 1', [$nhomtin->Id_nhomtin]);
            $result[0]->tenNhomTin = $nhomtin->Ten_nhomtin;
            $listLastestNew[] = $result[0];
        }
        //var_dump($listLastestNew);
        return view('home')->with(['title' => 'Trang chủ', 'listnhomtin' => $listnhomtin, 'listLastestNew' => $listLastestNew]);
    }
}
