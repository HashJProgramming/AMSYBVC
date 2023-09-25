<?php
require_once '../connection.php';
$name = $_POST['name'];
$address = $_POST['address'];

$sql = 'INSERT INTO `departments` (`name`, `address`) VALUES (:name, :address)';
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':address', $address);
$stmt->execute();
header('Location: ../../administrator/departments.php?type=success&message=Successfully Added');

