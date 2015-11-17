<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
header('Access-Control-Allow-Origin: http://127.0.0.1:88');

if($_POST){
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$table = $_POST['table'];
}

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
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Data</title>
<link href="bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<?php
if(isset($_GET['id'])){
	$table = $_GET['table'];
$sql = "SELECT id, title FROM $table;";
$result = mysqli_query($conn, $sql);
}
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#inverseNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="inverseNavbar1">
      <ul class="nav navbar-nav">
         <?php
          if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li><a href='?id=".$row["id"]."&table=".$table."'>".$row["title"]. "</a></li>";
    }
} else {
    echo "0 results";
}

            ?>
      </ul>

      <ul class="nav navbar-nav">
              <?php
          if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li><a href='?id=".$row["id"]."&table=".$table."'>".$row["title"]. "</a></li>";
    }
} else {
    echo "0 results";
}

            ?>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
$sql = "SELECT title, content FROM $table WHERE id = '$id';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>".$row["title"]. "</h3><p>".$row["content"]. "</p>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
}
?>
<script src="jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="bootstrap.js" type="text/javascript"></script>
</body>
</html>