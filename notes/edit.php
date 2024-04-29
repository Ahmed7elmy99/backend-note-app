<?php

include "../connect.php";


$title = filterRequest("title");
$content = filterRequest("content");
$noteid = filterRequest("id");
$imagename=filterRequest("imagename");
if(isset($_FILES['file'])){
    deleteFile("../upload",$imagename);
    $imagename=imageUpload("file");
}


$stmt = $con->prepare(" UPDATE `notes` SET `notes_title`=?,`notes_content`=?,notesimage=? WHERE notes_id=? ");


$stmt->execute(array($title,$content, $imagename,$noteid));
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success"));
} else {

    echo json_encode(array("status" => "failure"));
}
