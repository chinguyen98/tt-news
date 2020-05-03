@extends('layouts.index')
@section('content')
<div class="container-fluid">
            <div class="block-header">
                <h2>Trang chủ</h2>
            </div>

            <div class="row clearfix">
                <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Bảng thông báo hằng ngày</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>Ngày {{date('d-m-Y ')}}</th>
                                            <th>Hoạt động </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tin tức</td>
                                            <td>
                                                {{$tintuc}} 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bình luận</td>
                                            <td>
                                               {{$binhluan}} 
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        @endsection