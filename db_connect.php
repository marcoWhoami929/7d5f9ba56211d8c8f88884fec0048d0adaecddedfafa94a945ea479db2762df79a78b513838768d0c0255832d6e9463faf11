<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sanfranc_encuesta";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
printf("Connect failed: %sn", mysqli_connect_error());
exit();
}
?>