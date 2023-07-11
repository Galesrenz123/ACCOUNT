<?php
// PHP code to handle the logout functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Perform any logout actions or session cleanup here
  // Example:
  session_start();
  session_destroy();

  // Redirect to the login page after logout
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Logout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #1B2223;
      height: 50vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logout-container {
      max-width: 400px;
      background-color: #ffffff;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .logout-container h2 {
      margin-top: 0;
    }

    .logout-container p {
      margin-bottom: 30px;
    }

    .logout-container button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .logout-container button:hover {
      background-color: #0069d9;
    }
  </style>
</head>
<body>
  <div class="logout-container">
    <h2>Logout</h2>
    <p>Are you sure you want to logout?</p>
    <form method="POST" action="logout.php">
      <button type="submit">Logout</button>
    </form>
  </div>
</body>
</html>
