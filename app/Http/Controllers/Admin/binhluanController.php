<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class binhluanController extends Controller
{
  function binhluan()
  {
    $comment = DB::table('binhluan')->orderBy('Trangthai')->orderByDesc('Thoigian')->get();
    return view('admin.binhluan.binhluan')->with(['comment' => $comment]);
  }
  function duyetbinhluan($id)
  {

    DB::table('binhluan')->where('Id_binhluan', $id)->update(['Trangthai' => 1]);
    return redirect('admin/binhluan/binhluan')->with('alert', 'Đã duyệt bình luận');
  }
  function xoabinhluan($id)
  {
    DB::table('binhluan')->where('Id_binhluan', $id)->delete();
    return redirect('admin/binhluan/binhluan')->with('alert', 'Xóa bình luận thành công');
  }
}
