<?php
header('Access-Control-Allow-Origin: http://127.0.0.1:88');
//header('Access-Control-Allow-Origin: 208.79.61.126');
// header('Access-Control-Allow-Credentials: true');
?>

<!DOCTYPE html>
<html lang="en">
<head><title>Form Data</title>
<meta name="viewport" content="width=400, initial-scale=1.2, maximum-scale=1.4">
</head>
<body>
<div style="width:80%">
<?php

if($_POST){
	$email = $_POST['Email'];
foreach ($_POST as $field_num => $field_value) {

        $submission .= "$field_num : $field_value <br />\n";
}


print $submission;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: ".$email. "\r\n";
mail($_POST['toEmail'], "Angular Form Submission", $submission, $headers);
print "Your email Has been sent.";
}

if($_GET){
	$email = $_GET['Email'];
foreach ($_GET as $field_num => $field_value) {

        $submission .= "$field_num : $field_value <br />\n";
}


print $submission;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: ".$email. "\r\n";
mail($_GET['toEmail'], "Angular Form Submission", $submission, $headers);
print "Your email Has been sent.";
}
?> 
</div>
</body>
</html>