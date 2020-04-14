<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;



class tinController extends Controller
{
     function dstin()
    {
    	$list=DB::table('tin')->get();
    	return view('admin.tin.tin')->with(['list'=>$list]);
    }
    function themtin()
    {   $drand=DB::table('loaitin')->get();
        return view('admin.tin.themtin')->with(['drand'=>$drand]);
    }
     function laydulieuthem (Request $request)
    {
        $kiemtra=$request->validate([
            'Ten_loaitin'=>'required',
            'Tieude'=>'required|min:10|max:255|unique:tin',
            'Hinhdaidien'=>'image|required',
            'Mota'=>'required|min:10|max:255',
            'Noidung'=>'required|min:10',
            'Ngaydangtin'=>'required',
            'Tacgia'=>'required',
        ],
        [
            'Ten_loaitin.required'=>"Loại tin chưa được chọn",
            'Tieude.required'=>"Tiều đề chưa nhập",
            'Hinhdaidien.required'=>"Hình đại diện chưa có",
            'Mota.required'=>"Mô tả chưa nhập",
            'Noidung.required'=>"Nội dung chưa nhập",
            'Ngaydangtin.required'=>"Ngày chưa được chọn",
            'Tacgia.required'=>"Tác giả chưa nhập",
            'Hinhdaidien.image'=>'File hình không hợp lệ',
            'Tieude.unique'=>"Tiêu đề đã tồn tại",
            'Tieude.min'=>"Tiều đề ít nhất 10 kí tự",
            'Noidung.min'=>"Nội dung ít nhất 100 kí tự",
            'Mota.min'=>"Mô tả ít nhất 10 kí tự",
        ]);
    $id=$request->Ten_loaitin;
    $td=$request->Tieude;
    $mt=$request->Mota;
    $nd=$request->Noidung;
    $ngay=$request->Ngaydangtin;
    $tg=$request->Tacgia;
    $hot=$request->Hot;
    $trangthai=$request->AnHien;
    $slx=0;
    if($request->hasFile('Hinhdaidien'))
    {
        $hinh=($request->file('Hinhdaidien'));
        $name=$hinh->getClientOriginalName();   
        $hinh->move('images',$name);
    }
    $data=array('Tieude'=>$td,'Hinhdaidien'=>$name,'Mota'=>$mt,'Noidung'=>$nd,'Ngaydangtin'=>$ngay,'Tacgia'=>$tg,'Solanxem'=>$slx,'Tinhot'=>$hot,'Trangthai'=>$trangthai,'Id_loaitin'=>$id);
    DB::table('tin')->insert($data);
    return redirect('admin/tin/dstin')->with('alert','Thêm thành công');
        
    }
    function chitiettin($id)
    {
        $list=DB::table('tin')->where('Id_tin',$id)->get();
        return view('admin.tin.chitiettin')->with(['list'=>$list]);
    }
     function ketquatimkiem(Request $request)
    {
       $list=DB::table('tin')->where('Tieude','like','%'.$request->search.'%')->orwhere('Id_tin',$request->search)->get();

             return view('admin.tin.ketquatimkiem')->with(['list'=>$list]);    
    }
    function xoatin($id,$idloai)
    {    $dem=DB::table('tin')->where('Id_loaitin',$idloai)->count('Id_tin'); 
    if($dem>1)
       { 
        DB::table('tin')->where('Id_tin',$id)->delete();
        return redirect('admin/tin/dstin')->with('alert','Xóa thành công');
        }
    else
        {
         return redirect('admin/tin/dstin')->with('error','Xóa thất bại tin không thể rỗng');
        }
    }
    function suatin($id)
    {
        $drand=DB::table('loaitin')->get();
        $list=DB::table('tin')->where('Id_tin',$id)->get();
        return view('admin.tin.suatin')->with(['drand'=>$drand,"list"=>$list]);
    }
    function laydulieusua(Request $request,$idtin)
    {
         $kiemtra=$request->validate([
            'Ten_loaitin'=>'required',
            'Tieude'=>'required|min:10|max:255|unique:tin',
            'Hinhdaidien'=>'image|required',
            'Mota'=>'required|min:10|max:255',
            'Noidung'=>'required|min:10',
            'Ngaydangtin'=>'required',
            'Tacgia'=>'required',
        ],
        [
            'Ten_loaitin.required'=>"Loại tin chưa được chọn",
            'Tieude.required'=>"Tiều đề chưa nhập",
            'Hinhdaidien.required'=>"Hình đại diện chưa có",
            'Mota.required'=>"Mô tả chưa nhập",
            'Noidung.required'=>"Nội dung chưa nhập",
            'Ngaydangtin.required'=>"Ngày chưa được chọn",
            'Tacgia.required'=>"Tác giả chưa nhập",
            'Hinhdaidien.image'=>'File hình không hợp lệ',
            'Tieude.unique'=>"Tiêu đề đã tồn tại",
            'Tieude.min'=>"Tiều đề ít nhất 10 kí tự",
            'Noidung.min'=>"Nội dung ít nhất 100 kí tự",
            'Mota.min'=>"Mô tả ít nhất 10 kí tự",
        ]);
    $id=$request->Ten_loaitin;
    $td=$request->Tieude;
    $mt=$request->Mota;
    $nd=$request->Noidung;
    $ngay=$request->Ngaydangtin;
    $tg=$request->Tacgia;
    $hot=$request->Hot;
    $trangthai=$request->AnHien;
    if($request->hasFile('Hinhdaidien'))
    {
        $hinh=($request->file('Hinhdaidien'));
        $name=$hinh->getClientOriginalName();   
        $hinh->move('images',$name);
      
    }
    $data=array('Tieude'=>$td,'Hinhdaidien'=>$name,'Mota'=>$mt,'Noidung'=>$nd,'Ngaydangtin'=>$ngay,'Tacgia'=>$tg,'Tinhot'=>$hot,'Trangthai'=>$trangthai,'Id_loaitin'=>$id);
    DB::table('tin')->Where('Id_tin',$idtin)->update($data);
    return redirect('admin/tin/dstin')->with('alert','Cập nhật thành công');
    }
}
