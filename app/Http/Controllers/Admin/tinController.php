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
     $list=DB::table('tin')->paginate(10);
     return view('admin.tin.tin')->with(['list'=>$list]);
 }
 function phantrang()
 {
    $list=DB::table('tin')->paginate(10);
    return view('admin.tin.phantrang')->with(['list'=>$list]);
}
function themtin()
{   $drand=DB::table('loaitin')->get();
return view('admin.tin.themtin')->with(['drand'=>$drand]);
}
function laydulieuthem (Request $request)
{
    $request->validate([
        'Ten_loaitin'=>'required',
        'Tieude'=>'required|min:10|max:255|unique:tin',
        'Hinhdaidien'=>'image|required',
        'Mota'=>'required|min:10|max:255',
        'Noidung'=>'required|min:10',
        'Ngaydangtin'=>'required',
        'Tacgia'=>'required',
    ],
    [
        'Ten_loaitin.required'=>"Thêm thất bại loại tin chưa được chọn",
        'Tieude.required'=>"Thêm thất bại tiều đề chưa nhập",
        'Hinhdaidien.required'=>"Thêm thất bại hình đại diện chưa có",
        'Hinhdaidien.uploaded'=>"Thêm thất bại  đuôi hình không hợp lệ",
        'Mota.required'=>"Thêm thất bại mô tả chưa nhập",
        'Noidung.required'=>"Thêm thất bại nội dung chưa nhập",
        'Ngaydangtin.required'=>"Thêm thất bại ngày chưa được chọn",
        'Tacgia.required'=>"Thêm thất bại tác giả chưa nhập",
        'Hinhdaidien.image'=>' Thêm thất bại File hình không hợp lệ',
        'Tieude.unique'=>"Thêm thất bại tiêu đề đã tồn tại",
        'Tieude.min'=>"Thêm thất bại tiều đề ít nhất 10 kí tự",
        'Noidung.min'=>"Thêm thất bại nội dung ít nhất 100 kí tự",
        'Mota.min'=>"Thêm thất bại mô tả ít nhất 10 kí tự",
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
        $ten=str::random(4)."_".$name;   
        $hinh->move('images/',$ten);
    }
    $data=array('Tieude'=>$td,'Hinhdaidien'=>$ten,'Mota'=>$mt,'Noidung'=>$nd,'Ngaydangtin'=>$ngay,'Tacgia'=>$tg,'Solanxem'=>$slx,'Tinhot'=>$hot,'Trangthai'=>$trangthai,'Id_loaitin'=>$id);
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
       // $list=DB::table('tin')->where('Tieude','like','%'.$request->search.'%')->orwhere('Id_tin',$request->search)->get();
       //        return view('admin.tin.tin')->with(['list'=>$list]); 
   if ($request->ajax()) {
    if($request->key=='')
    { 
        return redirect("/admin/tin/phantrang");
    }
    else{ 
        $output ="";
        $list = DB::table('tin')->where('Tieude','like','%'.$request->key.'%')->paginate(10);
        if ( $list->count()>0) {
            foreach ( $list as  $l) {
                $output .= '<tr>
                <td> <a href="admin/tin/chitiettin/'.$l->Id_tin.'">' .  $l->Id_tin. '</a> </td>
                <td><a href="admin/tin/chitiettin/'.$l->Id_tin.'">' .  $l->Tieude . '</a> </td>

                </tr>';
            }
        }
        else
        {
         echo "'<td colspan=2 style='text-align:center;font-size:20px;color:red '>Không tìm thấy </td>'";

        }
    }


    return Response($output);
}   
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
  $request->validate([
    'Ten_loaitin'=>'required',
    'Tieude'=>'required|min:10|max:255',
    'Hinhdaidien'=>'image',
    'Mota'=>'required|min:10|max:255',
    'Noidung'=>'required|min:10',
    'Ngaydangtin'=>'required',
    'Tacgia'=>'required',
],
[
    'Ten_loaitin.required'=>"Thêm thất bại loại tin chưa được chọn",
    'Tieude.required'=>"Thêm thất bại tiều đề chưa nhập",
    'Hinhdaidien.uploaded'=>"Thêm thất bại  đuôi hình không hợp lệ",
    'Mota.required'=>"Thêm thất bại mô tả chưa nhập",
    'Noidung.required'=>"Thêm thất bại nội dung chưa nhập",
    'Ngaydangtin.required'=>"Thêm thất bại ngày chưa được chọn",
    'Tacgia.required'=>"Thêm thất bại tác giả chưa nhập",
    'Hinhdaidien.image'=>' Thêm thất bại File hình không hợp lệ',
    'Tieude.unique'=>"Thêm thất bại tiêu đề đã tồn tại",
    'Tieude.min'=>"Thêm thất bại tiều đề ít nhất 10 kí tự",
    'Noidung.min'=>"Thêm thất bại nội dung ít nhất 100 kí tự",
    'Mota.min'=>"Thêm thất bại mô tả ít nhất 10 kí tự",
]);
  $id=$request->Ten_loaitin;
  $td=$request->Tieude;
  $mt=$request->Mota;
  $nd=$request->Noidung;
  $ngay=$request->Ngaydangtin;
  $tg=$request->Tacgia;
  $hot=$request->Hot;
  $trangthai=$request->AnHien;
  $list=DB::table('tin')->where('Tieude',$td)->Where('Id_tin','!=',$idtin)->first();
  $image=DB::table('tin')->select('Hinhdaidien')->Where('Id_tin',$idtin)->first();
  if($list!=null)
  {
     return redirect('admin/tin/dstin')->with('error','Cập nhật thất bại tiêu đề đã có');
 }
 else 
 {
     if($request->hasFile('Hinhdaidien'))
     {
         $hinh=($request->file('Hinhdaidien'));
         $name=$hinh->getClientOriginalName(); 
         $ten=str::random(4)."_".$name;   
         unlink('images/'.$image->Hinhdaidien);  
         $hinh->move('images/',$ten);
     }
     else
     {
        $ten=$image->Hinhdaidien;
    }


    $data=array('Tieude'=>$td,'Hinhdaidien'=>$ten,'Mota'=>$mt,'Noidung'=>$nd,'Ngaydangtin'=>$ngay,'Tacgia'=>$tg,'Tinhot'=>$hot,'Trangthai'=>$trangthai,'Id_loaitin'=>$id);
    DB::table('tin')->Where('Id_tin',$idtin)->update($data);
    return redirect('admin/tin/dstin')->with('alert','Cập nhật thành công');

}


}

}
