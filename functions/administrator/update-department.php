<?php
require_once '../connection.php';
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];

$sql = 'UPDATE `departments` SET `name` = :name, `address` = :address WHERE `id` = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':address', $address);
$stmt->execute();
header('Location: ../../administrator/departments.php?type=success&message=Successfully Updated');

