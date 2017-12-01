
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

    <title>Login Page</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap core CSS -->
    <link href="source/css/bootstrap.min.css" rel="stylesheet">
    <link href="source/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="source/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="source/css/owl.carousel.css" type="text/css">

    <link href="source/css/style-responsive.css" rel="stylesheet" />
    <link href="source/css/login-form.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="source/js/html5shiv.js"></script>
      <script src="source/js/respond.min.js"></script>
    <![endif]-->
</head>

  <body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="https://cdn0.iconfinder.com/data/icons/PRACTIKA/256/user.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="{{route('login')}}">
                {{csrf_field()}}
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="source/js/jquery.js"></script>
    <script src="source/js/bootstrap.min.js"></script>
    
  </body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
</html>
