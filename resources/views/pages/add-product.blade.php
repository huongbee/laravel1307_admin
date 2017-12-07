@extends('master')
@section('title',"Them san pham")

@section('content')	

	<section class="content">
      <div class="panel panel-default">
          <div class="panel-heading"><b>Add Product</b>
          </div>
          <div class="panel-body">
              <form class="form-horizontal" enctype="multipart/form-data" action="{{route('addProduct')}}" method="post">
              {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Name:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Enter name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Type:</label>
                    <div class="col-sm-10"> 
                        <select name="type" class="form-control">
                            @foreach($types as $loai)
                            <option value="{{$loai->id}}">{{$loai->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Price:</label>
                    <div class="col-sm-10"> 
                    <input type="text" class="form-control" name="price" placeholder="Enter price">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Promotion Price:</label>
                    <div class="col-sm-10"> 
                    <input type="text" class="form-control" name="promotion_price" placeholder="Enter promotion price">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Promotion:</label>
                    <div class="col-sm-10"> 
                    <input type="text" class="form-control" name="promotion" placeholder="Enter promotions">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Promotion:</label>
                    <div class="col-sm-10"> 
                    <input type="date" class="form-control" name="update_at">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Unit:</label>
                    <div class="col-sm-10"> 
                    <input type="text" class="form-control" name="unit">
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Summary:</label>
                    <div class="col-sm-10"> 
                    <textarea name="summary" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Detail:</label>
                    <div class="col-sm-10"> 
                    <textarea name="detail" rows="10" class="form-control"></textarea></textarea>
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="today" value='1'> Today</label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Choose Image:</label>
                    <div class="col-sm-10"> 
                        <input type="file" name="image">
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Add</button>
                    </div>
                </div>
            </form>
          </div>
      </div>
  	</section>
@endsection