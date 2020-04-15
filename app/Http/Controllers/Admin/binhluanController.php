<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class binhluanController extends Controller
{
     function binhluan()
    {
    	$comment=DB::table('binhluan')->get();
    	return view('admin.binhluan.binhluan')->with(['comment'=>$comment]);
    }
}
