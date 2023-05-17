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

if (isset($_POST['resolve'])) {
    $id = $_POST['id'];

    // Update the status of the complaint
    $sql = "UPDATE `hostelcomplaint` SET `status`='RESOLVED' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
    echo "<div class='pop-up-container'><p class='pop-up'>Resolved successfully!</p></div>";
} else {
    echo "Error: " . mysqli_error($conn);
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complify</title>
    <style>
        .pop-up {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border-radius: 5px;
    font-weight: bold;
}
.pop-up-container {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    text-align: center;
}


    </style>
</head>
<body>

 
</body>
</html>
