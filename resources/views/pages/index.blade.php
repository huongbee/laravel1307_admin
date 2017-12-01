@extends('master')
@section('title',"Home")

@section('content')	

	<section class="content">
      <div class="panel panel-default">
          <div class="panel-heading"><b>Admin</b>
          </div>
          <div class="panel-body">
              @if(Auth::check())
              		Chào bạn, {{Auth::user()->fullname}}
              @else
              	Bạn chưa đăng nhập
              @endif
          </div>
      </div>
  	</section>
@endsection