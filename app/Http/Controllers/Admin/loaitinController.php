<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class loaitinController extends Controller
{
    function dsloaitin()
    {
    	$drand=DB::table('loaitin')->get();
    	return view('admin.loaitin.loaitin')->with(['drand'=>$drand]);
    }
       function sualoaitin($id)
    {
    	$group=DB::table('nhomtin')->get();
    	$drand=DB::table('loaitin')->where('Id_loaitin',$id)->get();
    	return view('admin.loaitin.sualoaitin')->with(['drand'=>$drand,'group'=>$group]);	
    }
    
      function laydulieusua(request $request,$id)
    {
         $request->validate([
           'Id_nhomtin'=>'required',
           'Ten_loaitin'=>'required|min:2|max:255',
         
        ],
        [
            'Id_nhomtin.required'=>'Chưa chọn tên nhóm tin',
            'Ten_loaitin.required'=>'Chưa nhập tên loại tin',
            'Ten_loaitin.min'=>'Tên loại tin ít nhất 2 kí tự',
        ]
        );
    	$Id_nhomtin=$request->Id_nhomtin;
    	$Ten_loaitin=$request->Ten_loaitin;
    	$Trangthai=$request->AnHien;
        $drand=DB::table('loaitin')->where('Ten_loaitin',$Ten_loaitin)->where('Id_loaitin','!=',$id)->first();
        if($drand!=null)
        {
            return redirect('admin/loaitin/dsloaitin')->with('error','Cập nhật thất bại tên đã có');
        }
        else
        {
           $data=array('Ten_loaitin'=>$Ten_loaitin,'Trangthai'=>$Trangthai,'Id_nhomtin'=>$Id_nhomtin);
            DB::table('loaitin')->where('Id_loaitin',$id)->update($data);
            return redirect('admin/loaitin/dsloaitin')->with('alert','Cập nhật thành công'); 
        }
    	
    	
    	
    }
     function xoaloaitin($id)
    {
    	$kt =DB::table('tin')->where('Id_loaitin',$id)->first();
    	if($kt != null)
    	{
    		return redirect('admin/loaitin/dsloaitin')->with('error','Không thể xóa loại tin này ');
    	}
    	else
    	{
    		DB::table('loaitin')->where('Id_loaitin',$id)->delete();
    	return redirect('admin/loaitin/dsloaitin')->with('alert','Xóa thành công');
    	}
    }
     function themloaitin()
    { 	$group= DB::table('nhomtin')->get();
    	return view('admin.loaitin.themloaitin')->with(['group'=>$group]);
    }
     function laydulieuthem(Request $request)
    {	
        $request->validate([
           'Id_nhomtin'=>'required',
           'Ten_loaitin'=>'required|unique:loaitin|min:2|max:255',
           'AnHien'=>'required',
        ],
        [
            'Id_nhomtin.required'=>'Chưa chọn tên nhóm tin',
            'Ten_loaitin.required'=>'Thêm thất bại chưa nhập tên loại tin',
            'Ten_loaitin.unique'=>'Thêm thất bại tên loại tin đã trùng lặp',
            'AnHien.required'=>'Chưa chọn trạng thái',
            'Ten_loaitin.min'=>'Thêm thất bại tên loại tin ít nhất 2 kí tự',
        ]
        );
        $Id_nhomtin=$request->Id_nhomtin;
    	$Ten_loaitin=$request->Ten_loaitin;
    	$Trangthai=$request->AnHien;
    	//$ten =DB::table('loaitin')->where('Ten_loaitin',$Ten_loaitin)->first();
    	$data=array('Ten_loaitin'=>$Ten_loaitin,'Trangthai'=>$Trangthai,'Id_nhomtin'=>$Id_nhomtin);
    	DB::table('loaitin')->insert($data);
    	return redirect('admin/loaitin/dsloaitin')->with('alert','Thêm thành công');
    	
    	
    }
    //  function ketquatimkiem(Request $request)
    // {
    //     $drand=DB::table('loaitin')->where('Ten_loaitin','like','%'.$request->search.'%')->orwhere('Id_loaitin',$request->search)->get();

    //          return view('admin.loaitin.ketquatimkiem')->with(['drand'=>$drand]);    
    // }
}
