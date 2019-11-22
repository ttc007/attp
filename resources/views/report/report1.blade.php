@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/lib/bootstrap-table/bootstrap-table.min.css')}}">
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<table class="table table-bordered">
  <tr>
    <th rowspan="2"></th>
    @foreach($data_total as $category_total)
      <th colspan="5" class="text-center">
        @if($category_total->category_name)
          {{$category_total->category_name}}({{$category_total->cnt}})
        @else
          Chưa phân nhóm({{$category_total->cnt}})
        @endif
      </th>
    @endforeach
  </tr>
  <tr>
    @foreach($data_total as $category_total)
      <th title="Đạt">P</th>
      <th title="Chưa đạt">U-P</th>
      <th title="Chưa kiểm tra">U-C</th>
      <th title="Tỉ lệ đạt/kiểm tra">R-P</th>
      <th title="Tỉ lệ kiểm tra/tổng">R-C</th>
    @endforeach
  </tr>
  @foreach($data_month as $key => $data)
      <tr>
        <td>{{$key}}</td>
        @foreach($data as $data1)
          <td class="text-center">
            {{$data1->DAT}}
          </td>
          <td class="text-center">
            {{$data1->CHUADAT}}
          </td>
          <td class="text-center">
            {{$data1->KHONGKIEMTRA}}
          </td>
          <td></td>
          <td></td>
        @endforeach
      </tr>
  @endforeach
</table>

@endsection