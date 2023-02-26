<?php
// The database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "astroresearch";

$conn = new mysqli($servername, $username, $password, $dbname);

// Connection checker
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Checker- Is Form Submitted?
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $jobtitle = $_POST["jobtitle"];
  $month = $_POST["month"];
  $day = $_POST["day"];
  $year = $_POST["year"];
  $email = $_POST["email"];

// Escape special characters in the form data
  $jobtitle = mysqli_real_escape_string($conn, $jobtitle);
  $email = mysqli_real_escape_string($conn, $email);
  $phone = mysqli_real_escape_string($conn, $phone);

// INSERT the form data into the database
  $sql = "INSERT INTO Mytable (jobtitle, month, day, year, email) VALUES ('$jobtitle', '$month', '$day', '$year', '$email')";

  if ($conn->query($sql) === TRUE) {
    // If the data was saved successfully, redirect to Success Page
    header('Location: success-page.php');
    exit();
  } else {
    // If there was an error saving the data, redirect to Error Page
    header('Location: error-page.php');
    exit();
  }
}
// Close the database connection
  $conn->close();


?>
<!-- -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
	<title>Questionnaire | By Roosie Kuloba</title>
</head>

<body class="home">

	<form method="POST" class="red-border" id="form">
     <!-- Introduction -->
		<p>Hi!
			<br>
			<br>
			Welcome to Roosie Kuloba's questionnaire for a University Research project entitled <strong> The Success of Astrological Principles Amongst Career Choices in Kenya.</strong> Her research is aimed at investigating whether there is a relationship between Zodiac Signs and career choices amongst Kenyans. Please share this link to all your friends and family after you are done filling in this questionnaire. Thank you in advance, for choosing to support her academic endeavours.
    </p>
	<!-- Frequently Asked Questions -->
    	<a href="FAQ.html">Frequently Asked Questions</a>

	<!-- Instruction -->
		<p><em> Please fill in the details below:</em></p>
		<p>(If you are not currently employed, please provide the job title of your most recent position held)</p>
  	
    <!-- -->
  		<label for="jobtitle">Your Job Title:</label>
  		  <input type="text" id="jobtitle" name="jobtitle" required> 
  		<br>
  		<br>

  		<label for="birthdate"> Your Date of Birth:</label>
        <select name="month" id="month" required>
          <option value="">Month</option>
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
    
        <select name="day" id="day" required>
          <option value="">Day</option>
            <?php
              $start_day = 1;
              $end_day = 31;
              for($i=$end_day; $i>=$start_day; $i--) {
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
            ?>
        </select>
    
        <select name="year" id="year" required>
          <option value="">Year</option>
            <?php
              $start_year = 1923;
              $end_year = 2001;
              for($i=$end_year; $i>=$start_year; $i--) {
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
            ?>
        </select>
		<br>
		<br> 

    <!-- Instruction -->
		<p> (If you would like to receive a copy of the Research Findings, please fill in your contact details below)</p>

    <!-- -->
		<label for="email">Email:</label>
  		<input type="email" id="email" name="email">
  	<br>
  	<br>

  	<input type="submit" value="Submit" id="submitBtn">
  		
</form>

</body>

</html>