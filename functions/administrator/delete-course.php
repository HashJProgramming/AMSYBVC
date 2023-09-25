<?php
require_once '../connection.php';
$id = $_POST['id'];

$sql = 'DELETE FROM `courses` WHERE `id` = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: ../../administrator/course.php?type=success&message=Successfully Deleted');

