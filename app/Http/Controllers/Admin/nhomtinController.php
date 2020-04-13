<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class nhomtinController extends Controller
{
     function dsnhomtin()
    {
    	$group=DB::table('nhomtin')->get();
    	return view('admin.nhomtin.nhomtin')->with(['group'=>$group]);
    }
    function suanhomtin($id)
    {
    	$group=DB::table('nhomtin')->where('Id_nhomtin',$id)->get();
    	return view('admin.nhomtin.suanhomtin')->with(['group'=>$group]);	
    }
     function laydulieusua(request $request,$id)
    {
    	
       $kiemtra=$request->validate([
        'Ten_nhomtin'=>'required|unique:nhomtin|max:255|min:2',

        ],
        [
          'Ten_nhomtin.required'=>'Chưa nhập tên',  
          'Ten_nhomtin.unique'=>'Tên nhóm đã trùng lặp ,cập nhật thất bại', 
          'Ten_nhomtin.min'=>'Tên nhóm tin it nhất 2 kí tự'
        ]); 
    	 $Ten_nhomtin=$request->Ten_nhomtin;
    	 $Trangthai=$request->AnHien;	
    	$data=array('Ten_nhomtin'=>$Ten_nhomtin,'Trangthai'=>$Trangthai);
    	DB::table('nhomtin')->where('Id_nhomtin',$id)->update($data);
    	return redirect('admin/nhomtin/dsnhomtin')->with('alert','Cập nhật thành công');
    	
    	
    }
     function xoanhomtin($id)
    {
    	$kt =DB::table('loaitin')->where('Id_nhomtin',$id)->first();
    	if($kt != null)
    	{
    		return redirect('admin/nhomtin/dsnhomtin')->with('error','Không thể xóa nhóm tin này ');
    	}
    	else
    	{
    		DB::table('nhomtin')->where('Id_nhomtin',$id)->delete();
    	   return redirect('admin/nhomtin/dsnhomtin')->with('alert','Xóa thành công');
    	}
    }
     function themnhomtin()
    {
    	return view('admin.nhomtin.themnhomtin');
    }
     function laydulieuthem(Request $request)
    { $kiemtra=$request->validate([
        'Ten_nhomtin'=>'required|unique:nhomtin|max:255|min:2',

        ],
        [
          'Ten_nhomtin.required'=>'Chưa nhập tên',  
          'Ten_nhomtin.unique'=>'Tên nhóm đã trùng lặp', 
          'Ten_nhomtin.min'=>'Tên nhóm tin it nhất 2 kí tự'
        ]);
    	 $Ten_nhomtin=$request->Ten_nhomtin;
    	 $Trangthai=$request->AnHien;
    	$data=array('Ten_nhomtin'=>$Ten_nhomtin,'Trangthai'=>$Trangthai);
    	DB::table('nhomtin')->insert($data);
    	return redirect('admin/nhomtin/dsnhomtin')->with('alert','Thêm thành công');
    	
    }
    function ketquatimkiem(Request $request)
    {
        $group=DB::table('nhomtin')->where('Ten_nhomtin','like','%'.$request->search.'%')->orwhere('Id_nhomtin',$request->search)->get();

             return view('admin.nhomtin.ketquatimkiem')->with(['group'=>$group]);    
    }
}
