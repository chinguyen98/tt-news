@extends('layouts.index')
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   Danh Sách Tin Tức
               </h2>
               <ul class="header-dropdown col-md-6  ">
                <input name="search" id="search"  type="text" class="form-control" placeholder="tìm kiếm " target="_self">
            </ul>
        </div>
        <div> @include('error.note')</div>
        <div class="body">
            <div class="table-responsive ">
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
                <tr><td colspan="2" >  {{$list->links()}}</td></tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('ajax')
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ route('search') }}',
            data: {
                'key': $value
            },
            success:function(result){
                $('tbody').html(result);
            }

        });
    })
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>

    $(document).on('click','.pagination a', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getNews(page);
        
    });
    function getNews(page){
        $.ajax({
            url: '/admin/tin/phantrang?page='+page,
            success:function(result){
                $('tbody').html(result);
            }


        });
    }

</script>
@endsection()