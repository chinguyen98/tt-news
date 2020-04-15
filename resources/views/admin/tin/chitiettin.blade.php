@extends('layouts.index')
@section('content')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Danh Sách Tin Tức
                            </h2>
                       
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table  class=" table table-bordered table-striped table-hover js-basic-example dataTable ">
                                    <thead>
                                        <tr>
                                            <th>Hình</th>
                                            <th>Mô tả</th> 
                                            <th>Nội dung</th>
                                            <th>Ngày đăng</th>
                                            <th>Tác giả</th>
                                            <th>Số lần xem </th>
                                            <th>Tin hot</th>
                                            <th>Trang thái</th>
                                            <th>Id loại tin</th>
                                            <th>Cập nhật/Xóa</th>  
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            
                                   @foreach($list as $l)
                                        <tr>
                                            <td>{{$l->Hinhdaidien}}</td>
                                            <td>{{$l->Mota}}</td>
                                            <td>{{$l->Noidung}}</td>
                                            <td>{{$l->Ngaydangtin}}</td>
                                            <td>{{$l->Tacgia}}</td>
                                            <td>{{$l->Solanxem}}</td>
                                            <td>{{$l->Tinhot}}</td>
                                            <td>{{($l->Trangthai)==1?'Hiện':'Ẩn'}}</td>
                                            <td>
                                            {{$l->Id_loaitin}}</td>
                                            <td>  
                                            <a href="admin/tin/suatin/{{$l->Id_tin}}" class="btn bg-blue waves-effect">Cập Nhật</a>
                                            <a href="admin/tin/xoatin/{{$l->Id_tin}}/{{$l->Id_loaitin}}" class="btn bg-red waves-effect" onClick="return confirm ('Bạn có muốn xóa không')">Xoá</a>
                                              &nbsp;  
                                            </td>
                                        </tr>
                                 @endforeach
                                    </tbody>
                                </table>
      <a href="admin/tin/dstin" class="btn bg-primary waves-effect"><-Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            
            <!-- #END# Exportable Table -->
        </div>
        <!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="js/pages/tables/jquery-datatable.js"></script>
</html>
@endsection