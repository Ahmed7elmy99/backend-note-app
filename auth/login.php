<?php

include "../connect.php";

$password = sha1($_POST['password']);
$email = filterRequest("email");

$stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND `password` = ?");
$stmt->execute(array($email, $password));
$date=$stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
result($count,$date);