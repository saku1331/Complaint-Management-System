<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: wardenLogin.php");
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Complify</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="welcomeUser.css">
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header class="header">
            <a href="#" class="logo">
                Complify
            </a>
            <nav class="navbar">
               
                <a href="#"><span class="wel-nav"><?php echo  $_SESSION['username']?></span></a>
                <a href="userLogout.php" ><span class="fade-nav">Logout</span></a>
              
            </nav>
        </header> 
        <br>
        <br>
        
        <div class="mid">
            <div class="user-sec">
                <h2 class="in-h2"><?php echo "Welcome ". $_SESSION['username']?>! </h2>
               

                <div class="new-reg">
                    <h2>View Registered Complaints</h2>
                    <section class="articles">
                      <article class="card">
                        <div class="card-wrapper">
                          <div class="card-body">
                            <h2>Hostel Complaint</h2>
                            <p>To view registered hostel complaints.        </p>
                            <a href="categoryComplaints.html" class="read-more">Click Here <span class="sr-only">about this is some title</span></a>
                          </div>
                        </div>
                      </article>
                      <article class="card">
                        <div class="card-wrapper">
                          <div class="card-body">
                            <h2>Mess Complaint</h2>
                            <p>To view registered hostel complaints.            </p>
                            <a href="messCategory.html" class="read-more">Click Here <span class="sr-only">about this is some title</span></a>
                          </div>
                        </div>
                      </article>
                    </section>
                </div>
                
        </div>
    </div>

    <script src="" async defer></script>


        
        <script src="" async defer></script>
    </body>
</html>





