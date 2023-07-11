<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Navbar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    /* CSS styles */
    .navbar {
      background-color: #025464;
      color: #fff;
      padding: 5px;
    }

    .navbar-brand {
      color: #fff;
      font-size: 24px;
      font-weight: bold;
    }

    .navbar-nav.ml-auto {
      margin-right: 10px;
    }

    .navbar-nav.ml-auto .nav-item {
      margin-left: 10px;
    }

    .navbar-nav.ml-auto .nav-link {
      color: #fff;
    }

    .navbar-nav.ml-auto .nav-link:hover {
      color: #fff;
      background-color: #014756;
    }

    .logout-link {
      color: #fff;
      font-weight: bold;
      margin-left: 10px;
    }

    .logout-link:hover {
      color: #fff;
      text-decoration: none;
      background-color: #014756;
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <a class="navbar-brand" href="dashboard.php">Financial Accountabilities</a>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="genreport.php">Generate Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="upload.php">Upload ND</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">User Account Management</a>
        </li>
      </ul>
      <a class="logout-link" href="logout.php">Logout</a>
    </div>
  </nav>
</body>
</html>
