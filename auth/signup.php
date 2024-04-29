<?php

include "../connect.php";

$username = filterRequest("username");
$password = sha1($_POST['password']);
$email = filterRequest("email");
$phone = filterRequest("phone");


$stmt = $con->prepare("SELECT * FROM users WHERE email = ? OR phone = ? ");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("PHONE OR EMAIL exist");
} else {

    $data = array(
        "username" => $username,
        "password" =>  $password,
        "email" => $email,
        "phone" => $phone,
    
    );
  
    insertData("users" , $data) ; 

}
