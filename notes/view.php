<?php

include "../connect.php";


$userid = filterRequest("id");

$stmt = $con->prepare("SELECT * FROM notes WHERE notes_users=?");
$stmt->execute(array($userid));
$date=$stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success","data"=>$date));
} else {

    echo json_encode(array("status" => "failure"));
}
