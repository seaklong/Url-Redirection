<?php
$servername = "localhost";
$username = "root";
$password = "Long123!";
$dbname = "kounsva_db";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

// Perform query

$url =  (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $url;
$testUrl = $_GET['url'];
$link = 'https://kounsvachhlat.com/v/KO3P1E1';

// check with .../v check first.
// return exit

$sql = $mysqli -> query("SELECT * FROM qrcode where link = '$testUrl' ");

if ($sql -> num_rows > 0) {
    
    $data = $sql->fetch_assoc();
   $newLink = $data["embedLink"];
   echo '<br />'.$newLink;
//    header("Location: $newLink");
//     exit;
}
    
$mysqli->close();

?>