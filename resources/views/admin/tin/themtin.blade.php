
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
        <h2> Thêm tin tức</h2>
          @include('error.note')
      </div>
      <div class="body">
        <form class="form-horizontal " method="post" action="admin/tin/laydulieuthem" enctype="multipart/form-data" >
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
                  <option value="{{$dr->Id_loaitin}}">{{$dr->Ten_loaitin}}</option>
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
                  <input type="text" id="Tieude" name="Tieude" class="form-control" placeholder= "Nhập tiêu đề"  min="1" max="1000" value="{{old('Tieude')}}">
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
                  <input type="file" class="form-control" id="Hinhdaidien" name="Hinhdaidien"   >
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
                   <textarea class="form-control" id="Mota" name="Mota" rows="3" >{{old('Mota')}}</textarea>
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
                   <textarea class="form-control ckeditor" id="Noidung" name="Noidung" rows="3" >{{old('Noidung')}}</textarea>
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
                  <input type="date" class="form-control" id="Ngaydangtin" name="Ngaydangtin" value="{{old('Ngaydangtin')}}" >
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
                  <input type="text" class="form-control" id="Tacgia" name="Tacgia" placeholder="Tên tác giả" value="{{old('Tacgia')}}">
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
                  <input type="radio" id="AH1" name="Hot" value="1" checked="checked" >
                  <label for="AH1">Hiện</label>
                  <input type="radio" id="AH2" name="Hot" value="0" >
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
                  <input type="radio" id="AH3" name="AnHien" value="1" checked="checked">
                  <label for="AH3">Hiện</label>
                  <input type="radio" id="AH4" name="AnHien" value="0"  >
                  <label for="AH4">Ẩn</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row clearfix">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
              <button type="submit" class="btn btn-primary m-t-15 waves-effect">Thêm tin tức</button>
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