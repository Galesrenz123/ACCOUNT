<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "fa";

// Get the submitted values from the form
$auditReportFrom = $_POST['audit_report_from'];
$disallowanceNumber = $_POST['disallowance_number'];
$bonusDescription = $_POST['bonus_description'];

// Validate uniqueness of the Notice of Disallowance #
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute a query to check if the Notice of Disallowance # already exists
$stmt = $conn->prepare("SELECT * FROM employee WHERE disallowance_number = ?");
$stmt->bind_param("s", $disallowanceNumber);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Notice of Disallowance # already exists, show an error message or take appropriate action
    echo "Error: Notice of Disallowance # already exists";
} else {
    // Notice of Disallowance # is unique, proceed with uploading the records
    // Perform the necessary database insertions or any other actions
    // ...
    echo "Records uploaded successfully";
}

$stmt->close();
$conn->close();
?>