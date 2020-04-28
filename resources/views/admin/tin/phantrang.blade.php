@foreach($list as $l)
  <tr>
    <td> <a href="admin/tin/chitiettin/{{$l->Id_tin}}">  {{$l->Id_tin}}</a></td>
    <td> <a href="admin/tin/chitiettin/{{$l->Id_tin}}">{{$l->Tieude}}</a></td>

</tr>
@endforeach
<tr><td colspan="2">  {{$list->links()}}</td></tr>