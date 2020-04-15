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
        <h2> Thêm LoạiTin</h2>
          @include('error.note')
        <ul class="header-dropdown m-r--5">
        </ul>
      </div>

      <div class="body">
        <form class="form-horizontal" method="post" action="admin/loaitin/laydulieuthem">
          @csrf

  
      <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label for="Ten_KhongDau" >Tên nhóm tin</label>
            </div>
            <div class="col-sm-9">
           <select name="Id_nhomtin" >
            @foreach($group as $gr)
              <option value="{{$gr->Id_nhomtin}}">{{$gr->Ten_nhomtin}}</option>
            @endforeach
              </select>
       </div>
          </div>
          <div class="row clearfix">
            <div class="col-sm-3 form-control-label">
              <label for="Tên_loạitin" >Tên loại tin</label>
            </div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-line">
                  <input type="text" class="form-control" placeholder="Tên loại tin" id="ten" name="Ten_loaitin" value="{{old('Ten_loaitin')}}">
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
                  <input type="radio" id="AH1" name="AnHien" value="1" checked="checked">
                  <label for="AH1">Hiện</label>
                  <input type="radio" id="AH0" name="AnHien" value="0" >
                  <label for="AH0">Ẩn</label>
                </div>
              </div>
            </div>
          </div>
      
          <div class="row clearfix">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
              <button type="submit" class="btn btn-primary m-t-15 waves-effect">Thêm loại tin</button>
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