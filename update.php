<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
header('Access-Control-Allow-Origin: http://127.0.0.1:88');

if($_POST){
$title = $_POST['title'];
$content = $_POST['content'];
$table = $_GET['table'];


$servername = "localhost";
$username = "blakesti_cms";
$password = "silly12fish";
$dbname = "blakesti_cms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['title'])){
$sql = "INSERT INTO $table VALUES ('', '$title', '$content')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully.<br />
	Title: ".$title."<br />Content: ".$content;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
}
if($_GET){
$title = $_GET['title'];
$content = $_GET['content'];
$table = $_GET['table'];


$servername = "localhost";
$username = "blakesti_cms";
$password = "silly12fish";
$dbname = "blakesti_cms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_GET['title'])){
$sql = "INSERT INTO $table VALUES ('', '$title', '$content')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully.<br />
	Title: ".$title."<br />Content: ".$content;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
}
?>