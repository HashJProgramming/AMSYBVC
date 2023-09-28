<?php
function get_courses(){
    global $db;
    $sql = "SELECT * FROM `courses`";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
}
