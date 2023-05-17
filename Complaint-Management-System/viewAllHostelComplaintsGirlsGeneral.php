<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: adminLogin.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset="UTF-8">
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link rel="stylesheet" href="categories.css">
</head>
<body>
    <header class="myheader">
  <a href="#" class="logo">
    Complify
  </a>
  <nav class="mynavbar">
    <?php if($_SESSION['username'] == 'admin'): ?>
      <a href="welcomeAdmin.php" class="mytext">Go to Admin Dashboard</a>
    <?php elseif($_SESSION['username'] == 'warden'): ?>
      <a href="welcomeWarden.php" class="mytext">Go to Warden Dashboard</a>
    <?php else: ?>
      <a href="welcomeUser.php" class="mytext">Go to User Dashboard</a>
    <?php endif; ?>
  </nav>
</header>

    <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
    <div style="display: flex; justify-content: center;">
    <a href="viewAllHostelComplaintsGirls.php"
      class="button"><b>All Complaints</b></a>
    <a href="viewAllHostelComplaintsGirlsInternet.php"
      class="button"><b>Internet</b></a>
    <a href="viewAllHostelComplaintsGirlsHygiene.php"
      class="button"><b>Hygiene</b></a>
    <a href="viewAllHostelComplaintsGirlsElectricity.php" class="button" ><b>Electricity</b></a>
    <a href="viewAllHostelComplaintsGirlsGeneral.php" 
      class="button"><b>General</b></a>
  </div>
</body>
</html>
<?php
// Connecting to the Database
$servername = "172.16.15.7";
$username = "root";
$password = "";
$database = "dbms19";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    // nothing
}

$sql = "SELECT * FROM `hostelcomplaint` where `hostel`='Girls Hostel' and `category`='General'";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);
echo"<br>";
echo "<div class='text-center' style='font-family: Arial, sans-serif; font-size: 16px; font-weight: bold; color: #333;'>";
echo $num . " records found in the Database<br>";
echo "</div><br>";
// Display the rows returned by the sql query
if($num > 0){
    $i = 1;
    while($row = mysqli_fetch_assoc($result)){
        echo "<div class='row row-book justify-content-center'>";
        echo "<button type='submit' class='btn btn-success col-md-12 col-sm-12 col-xs-12'><b>Complaint No." . $i . "</b></button>";
        echo "<div class='col-md-8 col-sm-7 col-xs-12 book-info'>";
        echo "<h1>" . $row['name'] . "</h1>";
        echo "<p>Enrollment No. : " . $row['rollno'] . "</p>";
        echo "<p>Email : " . $row['email'] . "</p>";
        echo "<p>Phone No : " . $row['phone'] . "</p>";
        echo "<p>Hostel: " . $row['hostel'] . "</p>";
        echo "<p>Complaint Details : " . $row['descr'] . "</p>";
        echo "<p>Register Date: " . $row['dt'] . "</p>";
        echo "<p>Status: " . $row['status'] . "</p>";
        echo "<div class='d-flex justify-content-center'>";
        if ($_SESSION['username']=='admin' && $row['status'] != 'RESOLVED') {
            echo "<form action='resolve.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit' name='resolve' id='resolve' class='button'>Resolve</button>";
            echo "</form>";
        } elseif ($row['status'] == 'RESOLVED') {
            echo "<a href='#' class='button' disabled><b>CLOSED</b></a>";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
        $i++;
    }
}
?>

