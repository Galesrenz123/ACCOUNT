<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <style>
    /* CSS styles */
    @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    @media(min-width:768px) {
        body {
            margin-top: 50px;
        }
    }

    #wrapper {
        background: url("philhealthbg") no-repeat center center fixed;
        background-size: cover;
        padding-left: 0;    
    }

    #page-wrapper {
        width: 100%;        
        padding: 0;
        background-color: #fff;
    }

    @media(min-width:768px) {
        #wrapper {
            padding-left: 225px;
        }

        #page-wrapper {
            padding: 22px 10px;
        }
    }

    /* Top Navigation */

    .top-nav {
        padding: 0 60px;
    }

    .top-nav>li {
        display: inline-block;
        float: left;
    }

    .top-nav>li>a {
        padding-top: 20px;
        padding-bottom: 20px;
        line-height: 20px;
        color: #fff;
    }

    .top-nav>li>a:hover,
    .top-nav>li>a:focus,
    .top-nav>.open>a,
    .top-nav>.open>a:hover,
    .top-nav>.open>a:focus {
        color: #fff;
        background-color: #025464;
    }

    /* Side Navigation */

    @media(min-width:768px) {
        .side-nav {
            position: fixed;
            top: 60px;
            left: 225px;
            width: 225px;
            margin-left: -225px;
            border: none;
            border-radius: 0;
            border-top: 1px rgba(0,0,0,.5) solid;
            overflow-y: auto;
            background-color: #025464;
            bottom: 0;
            overflow-x: hidden;
            padding-bottom: 40px;
        }

        .side-nav>li>a {
            width: 225px;
            border-bottom: 1px rgba(0,0,0,.3) solid;
        }

        .side-nav li a:hover,
        .side-nav li a:focus {
            outline: none;
            background-color: #025464 !important;
        }
    }

    .side-nav>li>ul {
        padding: 0;
        border-bottom: 1px rgba(0,0,0,.3) solid;
    }

    .side-nav>li>ul>li>a {
        display: block;
        padding: 10px 15px 10px 38px;
        text-decoration: none;
        color: #fff;    
    }

    .side-nav>li>ul>li>a:hover {
        color: #fff;
    }

    h1 {
        text-align: center;
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #003333;
        color: #fff;
        padding: 20px;
        text-align: center;
    }

    .footer p {
        margin: 0;
        padding-left: 180px;
    }
     /* Set the background image */
    body {
        background-image: url("images/leafbg.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
  </style>
</head>
<body>
  <div id="throbber" style="display:none; min-height:120px;"></div>
  <div id="noty-holder"></div>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">FINANCIAL ACCOUNTABILITIES</a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        <li class="dropdown">
          <a href="logout.php" class="dropdown-toggle" data-toggle="dropdown">LOGOUT</a>
        </li>
      </ul>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li>
            <a href="upload.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-star"></i> UPLOAD ND</a>
          </li>
          <li>
            <a href="genreport.php" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-search"></i> GENERATE REPORT</a>
          </li>
          <li>
            <a href="admin.php"><i class="fa fa-fw fa-user-plus"></i> USER ACCOUNT MANAGEMENT</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
      <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row" id="main">
          <div class="col-sm-12 col-md-12 well" id="content">
            <h1>Welcome!</h1>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
  </div><!-- /#wrapper -->

  <footer class="footer">
    <p>&copy; 2023 PhilHealth Region-XI. JRMJ.</p>
  </footer>
</body>
</html>
