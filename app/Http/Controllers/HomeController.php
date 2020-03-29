<?php

namespace App\Http\Controllers;

use App\Nhomtin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $listnhomtin = Nhomtin::all();
        return view('home')->with(['title' => 'Trang chủ', 'listnhomtin' => $listnhomtin]);
    }
}
