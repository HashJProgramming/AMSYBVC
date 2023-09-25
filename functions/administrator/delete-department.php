<?php
require_once '../connection.php';
$id = $_POST['id'];

$sql = 'DELETE FROM `departments` WHERE `id` = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: ../../administrator/departments.php?type=success&message=Successfully Deleted');

