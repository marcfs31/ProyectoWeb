<?php
//include database connection file
require_once 'connect.php';


// verifying user from database using PDO
$stmt = $DBcon->prepare("SELECT email, password from user WHERE email='".$_POST['email']."' && password='".$_POST['password']."'");
$stmt->execute();
$row = $stmt->rowCount();
if ($row > 0){
    echo "correct";
} else{
    echo 'wrong';
}

?>
