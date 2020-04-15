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
       $request->validate([
        'ten_nhomtin'=>'required|max:255|min:2',

        ],
        [
          'ten_nhomtin.required'=>'Cập nhật không thành công chưa nhập tên',  
          'ten_nhomtin.min'=>'Cập nhật không thành công tên nhóm tin it nhất 2 kí tự'
        ]); 
       
    	 $Ten_nhomtin=$request->ten_nhomtin;
    	 $Trangthai=$request->AnHien;	
         $group=DB::table('nhomtin')->where('Ten_nhomtin',$Ten_nhomtin)->where('Id_nhomtin', '!=', $id)->first();
         if($group!=null)
         {
                return redirect('admin/nhomtin/dsnhomtin')->with('error','Cập nhật thất bại tên đã có');
         }
         else
         {
                    
                $data=array('Ten_nhomtin'=>$Ten_nhomtin,'Trangthai'=>$Trangthai);
                 DB::table('nhomtin')->where('Id_nhomtin',$id)->update($data);
                 return redirect('admin/nhomtin/dsnhomtin')->with('alert','Cập nhật thành công');
         }
    
    	
    	
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
    {
        $request->validate([
        'Ten_nhomtin'=>'required|unique:nhomtin|string|max:255|min:2',

        ],
        [
          'Ten_nhomtin.required'=>'Thêm không thành công chưa nhập tên',  
          'Ten_nhomtin.unique'=>'Thêm không thành công tên nhóm đã có', 
          'Ten_nhomtin.min'=>' Thêm không thành công tên nhóm tin it nhất 2 kí tự'
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
