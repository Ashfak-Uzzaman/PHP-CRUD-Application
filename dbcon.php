<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "student_db");

// This function will make conncection between application and database 
// and will store the connection in $connection veriable
$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$connection) {
    die("Connection Failed");
} 
// else {
//     echo "yesss";
// }

?>