<?php
//  error_reporting(E_ALL);
//  ini_set('display_errors', 1);

$servername="localhost";
$username= "root";
$password= "rady1234";
$database= "dev_crud";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) { 
    error_log("DB Connection failed: " . $conn->connect_error);
   die(" Error! Database Connection Failed". $conn->connect_error);

}
// else {
//     print_r('Database connected successfully <br>');
// }