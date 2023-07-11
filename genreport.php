<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <title>Generate Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <style>
    /* CSS styles */
    body {
      padding: 0;
      margin: 0;
    }
    h4 {
      font-size: 40px;
      color: #000000;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 30px;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    .report-details {
      margin-bottom: 20px;
    }

    .report-details h2 {
      margin-bottom: 10px;
    }

    .report-table {
      margin-bottom: 20px;
      overflow-x: auto; /* Enable horizontal scroll for the table */
    }

    .report-table table {
      width: 100%;
      border-collapse: collapse;
    }

    .report-table th,
    .report-table td {
      padding: 8px;
      border: 1px solid #ddd;
    }

    .report-table th {
      background-color: #f2f2f2;
    }

    .totals {
      margin-top: 20px;
      font-weight: bold;
    }

     /* Search Form */
  .search-form {
    margin-bottom: 20px;
  }

  .search-form .form-group {
    display: flex;
    align-items: center;
  }

  .search-form .form-control {
    flex: 1;
    margin-right: 10px;
  }

  .search-form .submit-button {
    padding: 8px 20px;
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
  }

  .search-form .submit-button:hover {
    background-color: #0069d9;
    border-color: #0062cc;
  }

    @media print {
      .print-button,
      form {
        display: none;
      }
    }

    .report-table {
      margin-bottom: 20px;
    }

    .report-table table {
      width: 100%;
      border-collapse: collapse;
    }

    .report-table th,
    .report-table td {
      padding: 8px;
      border: 1px solid #000;
    }

    .report-table th {
      background-color: #f2f2f2;
      text-align: center;
    }
    @media print {
  
}
.right-container {
  float: left;
  width: 100%;
}

.overall-total {
  background-color: #f2f2f2;
    padding: 10px;
    margin-bottom: 20px;
    border: 2px solid #000000; /* Add border */
    clear: both; /* Clear float */
    overflow: auto; /* Fix float containment */
}
.overall-total h4 {
    float: left; /* Align "Overall Total" text to the left */
    margin-right: 20px; /* Add some spacing between the text and amount */
    padding-left: 60px;
}
.overall-total p {
    float: right; /* Align the amount to the right */
    margin: 0;
    padding-right: 40px; 
    font-size: 20px;
  }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <?php
error_reporting(0);
    $conn = mysqli_connect('localhost', 'root', '', 'fa');
    if(!$conn) {
      die('Unable to connect.');
    }
  ?>
  <!-- Main Content -->
  <div class="container">
    <p style="text-align: center;"><i>REPUBLIC OF THE PHILIPPINES</i></p>
    <h4>PHILIPPINE PHILHEALTH INSURANCE CORPORATION XI</h4>
    <p style="text-align: center;"><i>Valgosons Bldg. Bolton Ext. Pob., Davao City</i></p><br><br><br>
    <h4>COMPUTATION OF FINANCIAL ACCOUNTABILITIES</h4><br><br>
    <!-- Search Form -->
    <!-- Search Form -->
<form method="POST" class="search-form">
  <div class="form-group">
    <div class="input-group">
      <input type="text" name="id_no" id="searchId" class="form-control" placeholder="Enter ID Number">
      <div class="input-group-append">
        <input type="submit" name="search" value="Search" class="btn btn-primary submit-button">
      </div>
    </div>
  </div>
</form>


    <!-- Print Button -->
    <div class="print-button">
      <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>
    </div>
    <?php
    
    if(isset($_POST['search'])) {
      $id_no = $_POST['id_no'];
      $query = "SELECT * FROM employee WHERE fa_id_no='$id_no' ORDER BY fa_year";
      
      $result = mysqli_query($conn, $query);
      if(mysqli_num_rows($result) > 0) {
        // Group the records by year
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
          $year = $row['fa_year'];
          if (!isset($data[$year])) {
            $data[$year] = array();
          }
          $data[$year][] = $row;
        }

        // Display full name of the employee
        $employee_query = "SELECT fa_firstname, fa_middlename, fa_lastname FROM employee WHERE fa_id_no='$id_no' LIMIT 1";
        $employee_result = mysqli_query($conn, $employee_query);
        if(mysqli_num_rows($employee_result) > 0) {
          $employee = mysqli_fetch_assoc($employee_result);
          $full_name = $employee['fa_firstname'].' '.$employee['fa_middlename'].' '.$employee['fa_lastname'];
          echo '<div class="report-details">';
          echo "<p>ID Number:  ".$id_no."</p>";
          echo "<p>Name of Employee: ".$full_name."</p>";
          echo '</div>';
        }

        // Display tables for each year
        foreach ($data as $year => $records) {
          echo '<div class="report-table">';
          echo '<table>';
          echo '<tr>';
          echo '<th>PARTICULARS</th>';
          echo '<th>YEAR</th>';
          echo '<th>NOTICE OF DISALLOWANCE NUMBER/ DATE</th>';
          echo '<th>AMOUNT</th>';
          echo '</tr>';
          echo '<tr>';
          echo '<td colspan="4" style="text-align: center; font-size: 16px;">BENEFITS and ALLOWANCES DISALLOWED BY PRO COA AUDITOR</td>';
          echo '</tr>';

          $subtotal = 0; // Initialize subtotal for the current year

          // Combine records with the same particulars, year, and notice of disallowance number/date
          $combined_records = array();
          foreach ($records as $record) {
            $key = $record['fa_kind_of_disallowances'] . $record['fa_year'] . $record['fa_notice_of_disallowances_no'] . $record['fa_date_of_disallowances'];
            if (!isset($combined_records[$key])) {
              $combined_records[$key] = array(
                'particulars' => $record['fa_kind_of_disallowances'],
                'year' => $record['fa_year'],
                'notice' => $record['fa_notice_of_disallowances_no'] . ' / ' . $record['fa_date_of_disallowances'],
                'amount' => 0
              );
            }
            $combined_records[$key]['amount'] += $record['fa_amount']; // Add the amount to the combined record
          }
        
          // Display combined records for the current year
          foreach ($combined_records as $combined_record) {
            echo '<tr>';
            echo '<td style="text-align: center;">' . $combined_record['particulars'] . '</td>';
            echo '<td style="text-align: center;">' . $combined_record['year'] . '</td>';
            echo '<td style="text-align: center;">' . $combined_record['notice'] . '</td>';
            echo '<td style="text-align: center;">' . number_format($combined_record['amount'], 2) . '</td>';
            echo '</tr>';
        
            $subtotal += $combined_record['amount']; // Add the amount to the subtotal
          }

          // Display subtotal
          echo '<tr>';
          echo '<td colspan="3" style="text-align: right;"><b>Subtotal:</b></td>';
          echo '<td style="text-align: center;">'.number_format($subtotal, 2).'</td>';
          echo '</tr>';

          echo '</table>';
          echo '</div>';
        }
        $coa_query = "SELECT * FROM employee WHERE fa_id_no='$id_no' ORDER BY fa_year";
        $coa_result = mysqli_query($conn, $coa_query);
        if(mysqli_num_rows($coa_result) > 0) {
          echo '<div class="report-table">';
          echo '<table>';
          echo '<tr>';
          echo '<th> PARTICULARS</th>';
          echo '<th>YEAR</th>';
          echo '<th>NOTICE OF DISALLOWANCE NUMBER/ DATE</th>';
          echo '<th>AMOUNT</th>';
          echo '</tr>';
          echo '<tr>';
          echo '<td colspan="4" style="text-align: center; font-size: 16px;">BENEFITS AND ALLOWANCES DISALLOWED BY CENTRAL OFFICE COA AUDITOR</td>';
          echo '</tr>';
        
          $coa_subtotal = 0; // Initialize subtotal for the current year
          // Combine records with the same particulars, year, and notice of disallowance number/date
          $combined_records = array();
          foreach ($records as $record) {
            $key = $record['fa_kind_of_disallowances'] . $record['fa_year'] . $record['fa_notice_of_disallowances_no'] . $record['fa_date_of_disallowances'];
            if (!isset($combined_records[$key])) {
              $combined_records[$key] = array(
                'particulars' => $record['fa_kind_of_disallowances'],
                'year' => $record['fa_year'],
                'notice' => $record['fa_notice_of_disallowances_no'] . ' / ' . $record['fa_date_of_disallowances'],
                'amount' => 0
              );
            }
            $combined_records[$key]['amount'] += $record['fa_amount']; // Add the amount to the combined record
          }
        
          // Display combined records for the current year
          foreach ($combined_records as $combined_record) {
            echo '<tr>';
            echo '<td style="text-align: center;">' . $combined_record['particulars'] . '</td>';
            echo '<td style="text-align: center;">' . $combined_record['year'] . '</td>';
            echo '<td style="text-align: center;">' . $combined_record['notice'] . '</td>';
            echo '<td style="text-align: center;">' . number_format($combined_record['amount'], 2) . '</td>';
            echo '</tr>';
        
            $subtotal += $combined_record['amount']; // Add the amount to the subtotal
          }
         
        
            // Add the amount to the subtotal
          }
        
      


        // Calculate overall total
        $overall_total = 0;
        foreach ($data as $year => $records) {
          foreach ($records as $record) {
            $overall_total += $record['fa_amount'];
          }
        }

        // Display overall total in a container
        echo '<div class="right-container">';
        echo '<div class="overall-total">';
        echo '<h4>TOTAL FINANCIAL ACCOUNTABILITIES</h4>';
        echo '<p>'.number_format($overall_total, 2).'</p>';
        echo '</div>';
        echo '</div>';
      } else {
        echo "<p>NO AUDIT SUSPENSIONS, DISALLOWANCES AND CHARGES FROM PRO-XI COA AUDITOR FROM THE PERIOD . . .</p>";
      }
    }
    ?>
  </div>
  <script>
    // Get the text content of the h1 element
    var pageTitle = document.getElementById("pageTitle").textContent;
    console.log(pageTitle); // Output: Generate Report
  </script>
</body>
</html>
