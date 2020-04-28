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

        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderByDesc('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $latestNewsList = DB::table('tin')->where('Trangthai', 1)->orderByDesc('Ngaydangtin')->limit(6)->get(['Id_tin', 'Tieude', 'Tacgia', 'Hinhdaidien', 'Ngaydangtin']);

        return view('home')->with(['title' => 'Trang chủ', 'listnhomtin' => $listnhomtin, 'listLastestNew' => $listLastestNew, 'trendingList' => $trendingList, 'latestNewsList' => $latestNewsList]);
    }

    public function renderNhomTin($id)
    {
        $listnhomtin = Nhomtin::where('Trangthai', '!=', 0)->get();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderByDesc('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $nhomtin = Nhomtin::find($id);

        $tins = DB::select('SELECT * FROM tin JOIN loaitin ON tin.Id_loaitin=loaitin.Id_loaitin JOIN nhomtin on loaitin.Id_nhomtin = nhomtin.Id_nhomtin WHERE nhomtin.Id_nhomtin=? and tin.Trangthai=1 and loaitin.Trangthai=1 and nhomtin.Trangthai = 1 ORDER BY tin.Ngaydangtin DESC', [$id]);

        return view('nhomtin')->with(['title' => $nhomtin->Ten_nhomtin, 'tins' => $tins, 'nhomtin' => $nhomtin, 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList]);
    }

    public function renderLoaiTin($id)
    {
        $listnhomtin = Nhomtin::where('Trangthai', '!=', 0)->get();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderByDesc('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $loaitin = Loaitin::find($id);

        return view('loaitin')->with(['title' => $loaitin->Ten_loaitin, 'loaitin' => $loaitin, 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList]);
    }

    public function renderTin($id)
    {
        $listnhomtin = Nhomtin::where('Trangthai', '!=', 0)->get();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderByDesc('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $listBinhLuan = DB::table('binhluan')->where('Id_tin', $id)->orderByDesc('Thoigian')->get();

        $tin = Tin::find($id);

        $relatedPosts = DB::table('tin')->where('Id_loaitin', $tin->Id_loaitin)->orderByDesc('Ngaydangtin')->limit(3)->get(['Id_tin', 'Hinhdaidien', 'Tieude', 'Ngaydangtin']);

        return view('tin')->with(['title' => $tin->Tieude, 'listBinhluan' => $listBinhLuan, 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList, 'tin' => $tin, 'relatedPosts' => $relatedPosts]);
    }

    protected function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);

        foreach ($words as $key => $word) {
            /*
            * applying + operator (required word) only big words
            * because smaller ones are not indexed by mysql
            */
            if (strlen($word) >= 1) {
                $words[$key] = '+' . $word . '*';
            }
        }

        $searchTerm = implode(' ', $words);

        return $searchTerm;
    }

    public function search(Request $request)
    {
        $listnhomtin = Nhomtin::where('Trangthai', '!=', 0)->get();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderByDesc('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        $str = $this->fullTextWildcards($request->query('noidung'));
        $searchResult = Tin::whereRaw('MATCH (Tieude, Mota) AGAINST (?)', array($str))->get();

        return view('userSearch')->with(['title' => 'Tìm kiếm', 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList, 'searchResult' => $searchResult, 'searchKey' => $request->query('noidung')]);
    }

    public function renderAbout(Request $request)
    {
        $listnhomtin = Nhomtin::where('Trangthai', '!=', 0)->get();
        $trendingList = DB::table('tin')->where('Tinhot', 1)->where('Trangthai', 1)->orderBy('Ngaydangtin')->limit(5)->get(['Id_tin', 'Tieude', 'Hinhdaidien', 'Ngaydangtin']);

        return view('about')->with(['title' => 'Về chúng tôi', 'listnhomtin' => $listnhomtin, 'trendingList' => $trendingList]);
    }
}
