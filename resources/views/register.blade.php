
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:42:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Register Page</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap core CSS -->
    <link href="source/css/bootstrap.min.css" rel="stylesheet">
    <link href="source/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="source/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="source/css/owl.carousel.css" type="text/css">

    <link href="source/css/style-responsive.css" rel="stylesheet" />
    <link href="source/css/login-form.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<style>
.card-container.card {
    max-width: 500px;
}
body{
    height: auto;
    background-size: cover
}
</style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="source/js/html5shiv.js"></script>
      <script src="source/js/respond.min.js"></script>
    <![endif]-->
</head>

  <body>
    <div class="container">
        <div class="card card-container">
            <h2>Register</h2><br>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br/>
                    @endforeach
                </div>
            @endif
            <form  class="form-horizontal" method="post" action="{{route('register')}}">
                {{csrf_field() }}
                <div class="form-group">
                    <label for="username" class="col-md-3">Username:</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="username">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fullname" class="col-md-3">Fullname:</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="fullname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-3">Email address:</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthdate" class="col-md-3">Birthdate:</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" name="birthdate">
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthdate" class="col-md-3">Address:</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="address">
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthdate" class="col-md-3">Phone:</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phone">
                    </div>
                </div>

                <div class="form-group">
                    <label for="birthdate" class="col-md-3">Gender:</label>
                    <label class="radio-inline">
                      <input type="radio" name="gender" value="nu"> Nữ
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="gender"  value="nam"> Nam
                    </label>
                </div>
                <div class="form-group">
                    <label for="pwd"  class="col-md-3">Password:</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-9">
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
            </form>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="source/js/jquery.js"></script>
    <script src="source/js/bootstrap.min.js"></script>
    
  </body>
</html>
