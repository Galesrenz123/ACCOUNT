<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>User Account Management - Search Results</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  /* CSS styles */
  /* ... */

</style>
</head>
<body>
<?php include 'navbar.php'; ?>

<!-- Main Content -->
<div class="container">
  <h1>User Account Management</h1>
  <form class="search-form" method="POST">
    <div class="form-group">
      <input type="text" name="id_no" id="searchId" class="form-control" placeholder="Enter ID Number">
      <input type="submit" name="search" value="Search" class="submit-btn">
    </div>
  </form>

  <?php
// ...

if (isset($_POST['search'])) {
  $conn = mysqli_connect('localhost', 'root', '', 'fa');
  if (!$conn) {
    die('Unable to connect.');
  }

  $id_no = $_POST['id_no'];
  $query = "SELECT * FROM employee WHERE fa_id_no='$id_no'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo '<div class="search-results">';
        echo '<h2>Search Results</h2>';
        echo '<table>';
        echo '<tr><th>User ID</th><th>Lastname</th><th>Firstname</th><th>Middlename</th></tr>';
        echo '<tr>';
        echo '<td>' . $row['fa_id_no'] . '</td>';
        echo '<td>' . $row['fa_lastname'] . '</td>';
        echo '<td>' . $row['fa_firstname'] . '</td>';
        echo '<td>' . $row['fa_middlename'] . '</td>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<p>No results.</p>';
    }
}

 
  }


// ...

  
  ?>

  <!-- Action Buttons -->
  <div class="action-buttons">
    <a href="register.php" class="btn btn-success">New</a>
    <a href="update.php" class="btn btn-primary">Update</a>
  </div>
</div>

<footer class="footer">
  <p>&copy; 2023 PhilHealth Region-XI. JRMJ .</p>
</footer>

</body>
</html>
