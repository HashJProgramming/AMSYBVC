<?php
include_once '../connection.php';
$id = $_POST['id'];
$sql = "UPDATE `users` SET `status` = 'approved' WHERE `id` = :user_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':user_id', $id);
$stmt->execute();
header('Location: ../../administrator/alumni.php?type=success&message=Successfully Approved');