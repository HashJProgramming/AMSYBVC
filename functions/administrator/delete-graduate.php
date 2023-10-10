<?php
include_once '../connection.php';
$id = $_POST['id'];

$sql = "DELETE FROM `graduates` WHERE `id` = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: ../../administrator/students.php?type=success&message=Successfully Deleted');