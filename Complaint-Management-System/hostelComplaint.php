<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: userLogin.php");
}


?>
<?php
$insert = false;
if (isset($_POST['name'])){
    
    $server="172.16.15.7";
    $username="root";
    $password="";

    $con = mysqli_connect($server, $username, $password);
    if (!$con){
        die("connection to this database failed due to " . mysqli_connect_error());
    }
        // echo "Success connecting to the db";
    $name = $_POST['name'];
    $userid = $_SESSION['username'];
    $rollno = $_POST['rollno'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $hostel="";
    $hostelname=$_POST['hostelname'];
    if (strpos($hostelname, 'GH-1') !== false || strpos($hostelname, 'GH-2') !== false || strpos($hostelname, 'GH-3') !== false) {
        $hostel = 'Girls Hostel';
    }
    else{
        $hostel = 'Boys Hostel';
    }
    $room = $_POST['room'];
    $category = $_POST['category'];
    $descr =  $_POST['descr'];
    $sql = "INSERT INTO `dbms19`.`hostelcomplaint` (`name`, `userid`, `rollno`, 
    `email`, `phone`, `hostel`,`hostelname`, `room`, `category`, `descr`, `dt`) VALUES
    ('$name', '$userid', '$rollno', '$email', '$phone', '$hostel','$hostelname','$room', 
    '$category', '$descr', current_timestamp());";
    // echo $sql;
    
    if ($con->query($sql)==true){
        //  echo "Successfully inserted";
        $insert=true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close(); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complify</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="hostelComplaint.css">
</head>

<body>
    <!-- <img class="bg" src="bg.jpg" alt="IIIT Allahabad"> -->
    <div class="container">
        <h1>Welcome to Online Hostel & Mess Complaint Registration System</h1>
        <h3>General Hostel Complaint</h3>

        <p>Please fill in the required details: </p>
        <?php if($insert == true){
        echo "<p class='submitMsg'>Your complaint has been registered! </p>";}?> 
        <form action="hostelComplaint.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>

            <input type="text" name="rollno" id="rollno" placeholder="Enter your enrollment number" required>
            <input type="email" name="email" id="email" placeholder="Enter your email id" required>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" pattern="^\d{10}$" required>

            <div class="radio-container">
                <p class="radio-p">Please select your hostel: </p>

                <select name="hostelname" id="hostelname" class="select1" required>
                    <option value="GH-1">GH-1</option>
                    <option value="GH-2">GH-2</option>
                    <option value="GH-3">GH-3</option>
                    <option value="BH-1">BH-1</option>
                    <option value="BH-2">BH-2</option>
                    <option value="BH-3">BH-3</option>
                    <option value="BH-4">BH-4</option>
                    <option value="BH-5">BH-5</option>
                </select>
            </div>

            <div class="form-check form-check-inline"></div>
            <input type="text" name="room" id="room" placeholder="Enter your room number" required>

            <div class="radio-container">
                <p class="radio-p">Please select category of complaint: </p>

                <select name="category" id="category" class="select1" required>
                    <option value="Electricity">Electricity</option>
                    <option value="Hygiene">Hygiene</option>
                    <option value="Internet">Internet</option>
                    <option value="General">General</option>
                </select>
            </div>


            <!-- <input type="text" name="category" id="category" placeholder="Chooose category of complaint"> -->
            <textarea name="descr" id="descr" cols="30" rows="10"
                placeholder="Please describe your complaint" required></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>

</body>

</html>