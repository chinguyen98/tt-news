<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
class quantriController extends Controller
{
    function dsquantri()
    {
    	 $quantri=DB::table('admin')->get();
    	 return view('admin.quantri.quantri')->with(['quantri'=>$quantri]);
	
    }
    function xoaquantri($id)
    {	
    	
    	if(Auth::user()->Ten_admin=='admin')
    	{ 	if(Auth::id()==$id)
    		{
    			 return redirect('admin/quantri/quantri')->with('error','Không thể xóa chính bạn');
    		}
    		else
    		{
    		DB::table('admin')->where('id',$id)->delete();
    		return redirect('admin/quantri/quantri')->with('alert','Xóa thành công');
    		}
    	}
    	else
    	{
    		 return redirect('admin/quantri/quantri')->with('error','Bạn không có quyền xóa');
    	}	
    }
}
