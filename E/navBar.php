<!DOCTYPE html>
<!--
Ahmed Almafrachi
Web Programming CSIS 2440
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>ACME company</title>
        <link rel="stylesheet" type="text/css" href="acme.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<!--NAVIGATION BAR-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <!--MOBILE MENU-->
      <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <!--LOGO-->
        <a class="navbar-brand" href="home.php"><img src="images/acme.png" id="miniLogo" alt="ACME LOGO"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li id="alert"><a href="catalogue.php">Products</a></li>
       
       
      </ul>
        
        <!--LOGIN AND SHOPPING CART-->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span>Sign in</a></li>
        
      </ul>
    </div>
  </div>
</nav>
</body>
</html>