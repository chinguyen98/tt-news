<?php

namespace App\Http\Controllers;

use App\Loaitin;
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
            $result = DB::select('SELECT tin.Id_tin, tin.Tieude, tin.Ngaydangtin, tin.Hinhdaidien, tin.Tacgia from nhomtin JOIN loaitin on nhomtin.Id_nhomtin=loaitin.Id_nhomtin JOIN tin on loaitin.Id_loaitin=tin.Id_loaitin where nhomtin.Id_nhomtin=? ORDER BY tin.Ngaydangtin DESC LIMIT 1', [$nhomtin->Id_nhomtin]);
            $result[0]->tenNhomTin = $nhomtin->Ten_nhomtin;
            $result[0]->Id_nhomtin = $nhomtin->Id_nhomtin;
            $listLastestNew[] = $result[0];
        }

        $trendingList = DB::table('tin')->where('Tinhot', 1)->orderBy('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $latestNewsList = DB::table('tin')->orderBy('Ngaydangtin')->limit(6)->get(['Id_tin', 'Tieude', 'Tacgia', 'Hinhdaidien', 'Ngaydangtin']);

        return view('home')->with(['title' => 'Trang chủ', 'listnhomtin' => $listnhomtin, 'listLastestNew' => $listLastestNew, 'trendingList' => $trendingList, 'latestNewsList' => $latestNewsList]);
    }

    public function renderNhomTin($id)
    {
        $listnhomtin = Nhomtin::all();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->orderBy('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $nhomtin = Nhomtin::find($id);

        return view('nhomtin')->with(['title' => $nhomtin->Ten_nhomtin, 'nhomtin' => $nhomtin, 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList]);
    }

    public function renderLoaiTin($id)
    {
        $listnhomtin = Nhomtin::all();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->orderBy('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $loaitin = Loaitin::find($id);

        return view('loaitin')->with(['title' => $loaitin->Ten_loaitin, 'loaitin' => $loaitin, 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList]);
    }
}
