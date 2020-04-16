<?php

namespace App\Http\Controllers;

use App\Loaitin;
use App\Nhomtin;
use App\Tin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $listnhomtin = Nhomtin::where('Trangthai', '!=', 0)->get();

        $listLastestNew = array();
        foreach ($listnhomtin as $nhomtin) {
            $result = DB::select('SELECT tin.Id_tin, tin.Tieude, tin.Ngaydangtin, tin.Hinhdaidien, tin.Tacgia from nhomtin JOIN loaitin on nhomtin.Id_nhomtin=loaitin.Id_nhomtin JOIN tin on loaitin.Id_loaitin=tin.Id_loaitin where nhomtin.Id_nhomtin=? and tin.Trangthai=1 ORDER BY tin.Ngaydangtin DESC LIMIT 1', [$nhomtin->Id_nhomtin]);
            $result[0]->tenNhomTin = $nhomtin->Ten_nhomtin;
            $result[0]->Id_nhomtin = $nhomtin->Id_nhomtin;
            $listLastestNew[] = $result[0];
        }

        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderBy('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $latestNewsList = DB::table('tin')->where('Trangthai', 1)->orderBy('Ngaydangtin')->limit(6)->get(['Id_tin', 'Tieude', 'Tacgia', 'Hinhdaidien', 'Ngaydangtin']);

        return view('home')->with(['title' => 'Trang chủ', 'listnhomtin' => $listnhomtin, 'listLastestNew' => $listLastestNew, 'trendingList' => $trendingList, 'latestNewsList' => $latestNewsList]);
    }

    public function renderNhomTin($id)
    {
        $listnhomtin = Nhomtin::where('Trangthai', '!=', 0)->get();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderBy('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $nhomtin = Nhomtin::find($id);

        return view('nhomtin')->with(['title' => $nhomtin->Ten_nhomtin, 'nhomtin' => $nhomtin, 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList]);
    }

    public function renderLoaiTin($id)
    {
        $listnhomtin = Nhomtin::where('Trangthai', '!=', 0)->get();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderBy('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $loaitin = Loaitin::find($id);

        return view('loaitin')->with(['title' => $loaitin->Ten_loaitin, 'loaitin' => $loaitin, 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList]);
    }

    public function renderTin($id)
    {
        $listnhomtin = Nhomtin::where('Trangthai', '!=', 0)->get();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderBy('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $listBinhLuan = DB::table('binhluan')->where('Id_tin', $id)->orderByDesc('Thoigian')->get();

        $tin = Tin::find($id);

        $relatedPosts = DB::table('tin')->where('Id_loaitin', $tin->Id_loaitin)->orderByDesc('Ngaydangtin')->limit(3)->get(['Id_tin', 'Hinhdaidien', 'Tieude', 'Ngaydangtin']);

        return view('tin')->with(['title' => $tin->Tieude, 'listBinhluan' => $listBinhLuan, 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList, 'tin' => $tin, 'relatedPosts' => $relatedPosts]);
    }
}
