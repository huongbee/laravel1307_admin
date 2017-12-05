@extends('master')

@section('title',"Danh sách sản phẩm")

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
	<section class="content">
      <div class="panel panel-default">
          <div class="panel-heading">
                <b>
                    Danh sách sản phẩm 
                    @if(isset($type))thuộc loại <span style="color:red">{{$type->name}}</span>@endif
                </b>
          </div>
          <div class="panel-body">
              
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Mã món</th>
                        <th>Tên món</th>
                        <th>Tên loại</th>
                        <th>Đơn giá</th>
                        <th style="width:35%">Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã món</th>
                        <th>Tên món</th>
                        <th>Tên loại</th>
                        <th>Đơn giá</th>
                        <th style="width:35%">Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Options</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php $stt =1;?>
                    @foreach($foods as $food)
                    <tr>
                        <td>{{$stt}}</td>
                        {{--  <td>{{$food->id}}</td>  --}}
                        <td>{{$food->name}}</td>
                        <td>{{$food->FoodType->name}}</td>
                        <td>{{number_format($food->price)}}</td>
                        <td style="width:35%">{{$food->summary}}</td>
                        <td><img src="source/images/hinh_mon_an/{{$food->image}}" style="width:80px"/></td>
                        <td>
                            Edit |
                            Delete
                        </td>
                    </tr>
                    <?php $stt++?>
                    @endforeach
                </tbody>
            </table>

          </div>
      </div>
  	</section>
    
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
@endsection