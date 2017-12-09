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
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
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
                        <td id="tensp-{{$food->id}}">{{$food->name}}</td>
                        <td>{{$food->FoodType->name}}</td>
                        <td>{{number_format($food->price)}}</td>
                        <td style="width:35%">{{$food->summary}}</td>
                        <td><img src="source/images/hinh_mon_an/{{$food->image}}" style="width:80px"/></td>
                        <td>
                            <a href="{{route('editProduct',$food->id)}}">Edit</a> |
                            <a  class="delete" dataID="<?=$food->id?>">Delete</a>
                        </td>
                    </tr>
                    <?php $stt++?>
                    @endforeach
                </tbody>
            </table>

          </div>
      </div>

  	</section>
    
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-body">
            <p>Bạn có chắc chắn muốn xoá <span class="nameFood">name</span> hay không?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success btnExcept" dataID="">OK</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();

        $('.delete').click(function(){
            var id = $(this).attr('dataID')
            var name = $('#tensp-'+id).text()
            $('.nameFood').html('<b>'+name+'</b>')
            $('#myModal').modal('show')
            $('#myModal').on('hidden.bs.modal', function (e) {
                id = '';
                name = '';
            })
            $('.btnExcept').click(function(){
              
                var route = "{{route('deleteProduct','id')}}";
                route = route.replace('id',id)
                //console.log(route)
                $.ajax({
                    url:route,
                    data:{
                        idSP:id,
                        _token:"{{csrf_token()}}"
                    },
                    type:"POST",
                    success:function(data){
                        if($.trim(data)=="success"){
                            location.reload(true)
                        }
                        if($.trim(data)=="error"){
                            $('.modal-body').html('<p>Error!! Vui lòng thử lại sau</p>')
                           // $('#myModal').modal('hide')
                        
                        }
                    },
                    error:function(data){
                        console.log(data)
                    }

                })
                $('#myModal').on('hidden.bs.modal', function (e) {
                    $('.modal-body').html('<p>Bạn có chắc chắn muốn xoá <span class="nameFood">name</span> hay không?</p>')
                })
            })
        })

    } );
    </script>
@endsection