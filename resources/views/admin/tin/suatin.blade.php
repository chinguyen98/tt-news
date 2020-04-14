
@extends('layouts.index')
@section('content')

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
.form-group .form-line {border-bottom:none}
.form-group .form-control {padding:3px; border:1px solid #999}
.form-group .form-line.abc {padding-top:5px;}
</style>
<body>
<div class="row clearfix">
  <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
    <div class="card">
      <div class="header">
        <h2> Cập nhật tin tức</h2>
          @include('error.note')
      </div>
      <div class="body">
         @foreach($list as $l)
        <form class="form-horizontal " method="post" action="admin/tin/laydulieusua/{{$l->Id_tin}}" enctype="multipart/form-data" >
         @csrf
          <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label for="Loại Tin" >Loại Tin</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line">
                <select  name="Ten_loaitin" >

    @foreach($drand as $dr)
    	
                  <option @if($l->Id_loaitin==$dr->Id_loaitin) 
                  						{{'selected'}} 
                  			@endif
                  value="{{$dr->Id_loaitin}}">
                  	{{$dr->Ten_loaitin}}</option>
    @endforeach          
                </select>
                </div>
              </div>
            </div>
          </div>
   
          <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label for="Tieu đề">Tieu đề</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line">
                  <input type="text" id="Tieude" name="Tieude" class="form-control" placeholder= "Nhập tiêu đề" required min="1" max="1000" value="{{$l->Tieude}}">
                </div>
              </div>
            </div>
          </div>
             <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label>Hình đại diện</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line abc">
                  <input type="file" class="form-control" id="Hinhdaidien" name="Hinhdaidien" >
                </div>  
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label>Mô Tả</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line abc">
                   <textarea class="form-control" id="Mota" name="Mota" rows="3" >{{$l->Mota}}</textarea>
                </div>
              </div>
            </div>
          </div>
           <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label>Nội dung</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line abc">
                   <textarea class="form-control ckeditor" id="Noidung" name="Noidung" rows="3"  >{{$l->Noidung}}</textarea>
                </div>
              </div>
            </div>
          </div>
           <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label>Ngày đăng tin</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line abc">
                  <input type="date" class="form-control" id="Ngaydangtin" name="Ngaydangtin" value="{{$l->Ngaydangtin}}" >
                </div>
              </div>
            </div>
          </div>
              <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label>Tác giả</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line abc">
                  <input type="text" class="form-control" id="Tacgia" name="Tacgia" placeholder="Tên tác giả" value="{{$l->Tacgia}}">
                </div>
              </div>
            </div>
          </div>
             <div class="row clearfix">
         <div class="col-sm-3 form-control-label">
              <label>Tin hot</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line abc">
                  <input type="radio" id="AH1" name="Hot" value="1" checked="checked" {{($l->Tinhot)==1?'checked':""}} >
                  <label for="AH1">Hiện</label>
                  <input type="radio" id="AH2" name="Hot" value="0" {{($l->Tinhot)==0?'checked':""}}>
                  <label for="AH2">Ẩn</label>
                </div>
              </div>
            </div>
            </div>
         
           <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label>Trạng thái</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line abc">
                  <input type="radio" id="AH3" name="AnHien" value="1" checked="checked" {{($l->Trangthai)==1?'checked':""}}>
                  <label for="AH3">Hiện</label>
                  <input type="radio" id="AH4" name="AnHien" value="0"
                  {{($l->Trangthai)==0?'checked':""}}  >
                  <label for="AH4">Ẩn</label>
                </div>
              </div>
            </div>
          </div>
    @endforeach
          <div class="row clearfix">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
              <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cập nhập tin tức</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
@endsection

