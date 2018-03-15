<?php
//include database connection file
require_once 'config_login.php';
 
//define database object
global $dbc;
 
$stmt = $dbc->prepare("SELECT username, password from users WHERE username='".$_POST['username']."' && password='".  md5($_POST['password'])."'");
 
$stmt->execute();
 
$row = $stmt->rowCount();
 
if ($row > 0){    
    echo 'correct';
} else{ 
    echo 'wrong';
}
 
?>