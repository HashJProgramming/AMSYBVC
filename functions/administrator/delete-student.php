<?php
include_once '../connection.php';
$id = $_POST['id'];
$sql = "DELETE FROM `students` WHERE `user_id` = :user_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':user_id', $id);
$stmt->execute();
header('Location: ../../administrator/alumni.php?type=success&message=Successfully Deleted');