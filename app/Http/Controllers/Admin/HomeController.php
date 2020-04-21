<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $binhluan = DB::table('binhluan')->where('Thoigian', today())->count();
        $tintuc = DB::table('tin')->where('Ngaydangtin', today())->count();
        return view('admin/home')->with(['binhluan' => $binhluan, 'tintuc' => $tintuc]);
    }
}
