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
                          <ul class="header-dropdown col-md-6  ">
                          
                              <form action="admin/tin/ketquatimkiem" method="post" accept-charset="utf-8" >  
                               @csrf
                        <input name="search" type="text" class="form-control" placeholder="Search Here " target="_self">
                            </ul>
                        </div>
                            <div> @include('error.note')</div>
                        <div class="body">
                            <div class="table-responsive">
                                <table  class=" table table-bordered table-striped table-hover js-basic-example dataTable ">
                                    <thead>
                                        <tr>
                                         <th>Id tin</th>
                                            <th>Tiêu đề</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            
                                   @foreach($list as $l)
                                        <tr>
                                            <td> <a href="admin/tin/chitiettin/{{$l->Id_tin}}">  {{$l->Id_tin}}</a></td>
                                           <td> <a href="admin/tin/chitiettin/{{$l->Id_tin}}">{{$l->Tieude}}</a></td>
                                      
                                        </tr>
                                 @endforeach
                                    </tbody>
                                </table>
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