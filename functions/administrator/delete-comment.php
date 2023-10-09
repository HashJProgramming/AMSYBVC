<?php
include_once '../connection.php';
$id = $_POST['id'];
$announcement_id = $_POST['announcement_id'];
$sql = "DELETE FROM `comments` WHERE `id` = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header("Location: ../../administrator/comment.php?id=$announcement_id&type=success&message=Comment deleted successfully.");
