<?php 
define('DB_SERVER', '172.16.15.7');
define('DB_USERNAME', 'dbms19');
define('DB_PASSWORD', 'dbms@19');
define('DB_NAME', 'dbms19');

$link=mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($link==false){
    die('Error: cant connect');
}
?>