<?php
include_once '../connection.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];
$course = $_POST['course'];
$civil = $_POST['civil'];
$graduated = $_POST['graduated'];
$children = $_POST['children'];
$phone = $_POST['phone'];
$present_address = $_POST['present_address'];
$work_address = $_POST['work_address'];
$status = 'pending';

$sql = "SELECT * FROM `users` WHERE `username` = :username";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    header('Location: ../../administrator/alumni.php?type=error&message=' . $username . ' is already exist');
    exit;
}

    $sql = "INSERT INTO `users` (`username`, `password`) 
            VALUES (:username, :password)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user_id = $db->lastInsertId();

    $sql = "INSERT INTO `students` (user_id, `firstname`, `lastname`, `birthdate`, `email`, `course`, `civil`, `graduated`, `children`, `phone`, `present_address`, `work_address`) 
            VALUES (:user_id, :firstname, :lastname, :birthdate, :email, :course, :civil, :graduated, :children, :phone, :present_address, :work_address)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':civil', $civil);
        $stmt->bindParam(':graduated', $graduated);
        $stmt->bindParam(':children', $children);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':present_address', $present_address);
        $stmt->bindParam(':work_address', $work_address);
        $stmt->execute();
        header('Location: ../../administrator/alumni.php?type=success&message=Successfully Registered - Please wait for the approval of the administrator');