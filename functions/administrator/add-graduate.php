<?php
include_once '../connection.php';
$fullname = $_POST['fullname'];
$course = $_POST['course'];
$graduated = $_POST['graduated'];

$sql = "INSERT INTO `graduates` (`fullname`, `course`, `graduated`) VALUES (:fullname, :course, :graduated)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':fullname', $fullname);
$stmt->bindParam(':course', $course);
$stmt->bindParam(':graduated', $graduated);
$stmt->execute();

header('Location: ../../administrator/students.php?type=success&message=Successfully Added');