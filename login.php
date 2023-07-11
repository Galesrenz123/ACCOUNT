<?php
  $conn = mysqli_connect('localhost', 'root', '', 'fa');
  
  // Insert the data into the table
  if(isset($_POST['login'])) {
    $userID = $_POST['userID'];
    $password = $_POST['password'];
    
    // Check if the fields are not empty
    if(empty($userID) || empty($password)) {
      echo "Please fill in all fields.";
    } else {
      $sql = "INSERT INTO employee(Userid, password) VALUES ('$userID', '$password')";
      
      if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully!";
        header("Location: dashboard.php");
        exit(); // Terminate the script after redirecting
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login Page</title>
  <!-- CSS and JavaScript code -->
</head>
<body>
  <!-- HTML code -->
</body>
</html>



<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  <title>Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
    integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP"
    crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
    body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      background: #1b2223 !important;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .user_card {
      height: 400px;
      width: 350px;
      margin-top: auto;
      margin-bottom: auto;
      background: #F4FEFD;
      position: relative;
      display: flex;
      justify-content: center;
      flex-direction: column;
      padding: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      border-radius: 5px;
    }

    .brand_logo_container {
      height: 170px;
      width: 170px;
      border-radius: 50%;
      background: #60a3bc;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-left: auto;
      margin-right: auto;
    }

    .brand_logo {
      height: 150px;
      width: 150px;
      border-radius: 50%;
      border: 2px solid white;
    }

    .form_container {
      margin-top: 30px; /* Adjust the margin-top value to your preference */
      margin-bottom: 80px; /* Adjust the margin-bottom value to your preference */
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .login_btn {
      width: 50%; /* Adjust the width of the button */
      margin: 10px auto; /* Center the button horizontally */
      background: #1F6E8C !important;
      color: white !important;
    }

    .login_btn:focus {
      box-shadow: none !important;
      outline: 0px !important;
    }

    .login_container {
      padding: 0 2rem;
    }

    .input-group-text {
      background: #3A4F50 !important;
      color: white !important;
      border: 0 !important;
      border-radius: 0.25rem 0 0 0.25rem !important;
    }

    .input_user,
    .input_pass:focus {
      box-shadow: none !important;
      outline: 0px !important;
    }

    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
      background-color: #c0392b !important;
    }

    .input-group {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body>
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="images/hello.png" class="brand_logo" alt="">
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
          <form method="POST">
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="userID" class="form-control input_user" value="" placeholder="UserID">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlInline">
                <label class="custom-control-label" for="customControlInline">Remember me</label>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <input type="submit" name="login" value="Login" class="login_btn">
            </div>
            <div class="d-flex justify-content-center links">
              Don't have an account? <a href="register.php" class="ml-2">Sign Up</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
