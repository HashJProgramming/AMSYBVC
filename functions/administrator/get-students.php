<?php
require_once '../connection.php';
include_once 'email-sender.php';
$start = $_POST['start'];
$end = $_POST['end'];
$title = $_POST['title'];
$description = $_POST['description'];


$sql = "SELECT s.*, u.status AS `status` FROM students s 
LEFT JOIN `users` u ON s.user_id = u.id 
WHERE `graduated` BETWEEN :start_year AND :end_year AND `status` = 'approved'";

$stmt = $db->prepare($sql);
$stmt->bindParam(':start_year', $start);
$stmt->bindParam(':end_year', $end);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($students as $student){
    $email = $student['email'];
    send_mail($email, $start, $end, $title, $description);
}
header('Location: ../../administrator/alumni.php?type=success&message=Emails have been sent successfully.');