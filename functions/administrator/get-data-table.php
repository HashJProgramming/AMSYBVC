<?php

function get_course_datatable(){
    global $db;
    $sql = 'SELECT * FROM `courses`';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($courses as $course) {
    ?>
    <tr>
            <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/logo3.webp"><?php echo $course['name']?></td>
            <td><?php echo $course['created_at']?></td>
            <td class="text-center">
                <button class="btn btn-outline-warning mx-1" type="button" data-bs-target="#update" data-bs-toggle="modal" 
                    data-id="<?php echo $course['id']?>"
                    data-name="<?php echo $course['name']?>">Update</button>
                <button class="btn btn-outline-danger mx-1" type="button" data-bs-target="#delete" data-bs-toggle="modal" data-id="<?php echo $course['id']?>">Delete</button>
            </td>
        </tr>
    <?php
    }
}


function get_students(){
    global $db;
    $sql = 'SELECT s.*, c.name AS course_name, u.id as user_id, u.* FROM `students` s
        LEFT JOIN `courses` c ON s.course = c.id
        LEFT JOIN `users` u ON s.user_id = u.id
        WHERE u.status = "approved"';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($students as $student) {
        $age =  date_diff(date_create($student['birthdate']), date_create('now'))->y;
    ?>
        <tr>
            <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/logo3.webp"><?php echo $student['firstname'].' '.$student['lastname'] ?></td>
            <td><?php echo $student['course_name']?></td>
            <td><?php echo $student['email']?></td>
            <td><?php echo $student['civil']?></td>
            <td><?php echo $student['children']?></td>
            <td><?php echo $age ?></td>
            <td><?php echo $student['birthdate']?></td>
            <td><?php echo $student['graduated']?></td>
            <td><?php echo $student['status']?></td>
            <td class="text-center">
                <button class="btn btn-outline-warning mx-1" type="button" data-bs-target="#update" data-bs-toggle="modal" 
                data-id="<?php echo $student['user_id']?>"
                data-username="<?php echo $student['username']?>"
                data-firstname="<?php echo $student['firstname']?>"
                data-lastname="<?php echo $student['lastname']?>"
                data-birthdate="<?php echo $student['birthdate']?>"
                data-email="<?php echo $student['email']?>"
                data-course="<?php echo $student['course_name']?>"
                data-civil="<?php echo $student['civil']?>"
                data-graduated="<?php echo $student['graduated']?>"
                data-children="<?php echo $student['children']?>"
                data-phone="<?php echo $student['phone']?>"
                data-present="<?php echo $student['present_address']?>"
                data-work="<?php echo $student['work_address']?>"
                >Update</button>
                <button class="btn btn-outline-danger mx-1" type="button" data-bs-target="#delete" data-bs-toggle="modal" 
                data-id="<?php echo $student['user_id']?>"
                >Delete</button></td>
        </tr>
    <?php
    }
}

function get_students_pending(){
    global $db;
    $sql = 'SELECT s.*, c.name AS course_name, u.id as user_id, u.* 
        FROM `students` s
        LEFT JOIN `courses` c ON s.course = c.id
        LEFT JOIN `users` u ON s.user_id = u.id 
        WHERE u.status = "pending"';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($students as $student) {
        $age =  date_diff(date_create($student['birthdate']), date_create('now'))->y;
    ?>
        <tr>
            <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/logo3.webp"><?php echo $student['firstname'].' '.$student['lastname'] ?></td>
            <td><?php echo $student['course_name']?></td>
            <td><?php echo $student['email']?></td>
            <td><?php echo $student['civil']?></td>
            <td><?php echo $student['children']?></td>
            <td><?php echo $age ?></td>
            <td><?php echo $student['birthdate']?></td>
            <td><?php echo $student['graduated']?></td>
            <td><?php echo $student['status']?></td>
            <td class="text-center">
                <button class="btn btn-outline-info mx-1 mb-1" type="button" data-bs-target="#approve" data-bs-toggle="modal" 
                data-id="<?php echo $student['user_id']?>"
                >Approve</button>
                <button class="btn btn-outline-warning mx-1" type="button" data-bs-target="#update" data-bs-toggle="modal" 
                data-id="<?php echo $student['user_id']?>"
                data-username="<?php echo $student['username']?>"
                data-firstname="<?php echo $student['firstname']?>"
                data-lastname="<?php echo $student['lastname']?>"
                data-birthdate="<?php echo $student['birthdate']?>"
                data-email="<?php echo $student['email']?>"
                data-course="<?php echo $student['course_name']?>"
                data-civil="<?php echo $student['civil']?>"
                data-graduated="<?php echo $student['graduated']?>"
                data-children="<?php echo $student['children']?>"
                data-phone="<?php echo $student['phone']?>"
                data-present="<?php echo $student['present_address']?>"
                data-work="<?php echo $student['work_address']?>"
                >Update</button>
                <button class="btn btn-outline-danger mx-1" type="button" data-bs-target="#delete" data-bs-toggle="modal" 
                data-id="<?php echo $student['user_id']?>"
                >Delete</button></td>
        </tr>
    <?php
    }
}

function get_announcements(){
    global $db;
    $sql = 'SELECT * FROM `announcements`';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($announcements as $announcement) {
    ?>
    <tr>
            <td><img class="rounded-circle me-2" width="30" height="30" src="../assets/img/logo3.webp"><?php echo $announcement['id']?></td>
            <td><?php echo $announcement['description']?></td>
            <td><?php echo $announcement['created_at']?></td>
            <td class="text-center">
                <a class="btn btn-outline-danger mx-1" type="button" href="comment.php?id=<?php echo $announcement['id']?>">View</a>
                <button class="btn btn-outline-warning mx-1" type="button" data-bs-target="#update" data-bs-toggle="modal" 
                    data-id="<?php echo $announcement['id']?>"
                    data-description="<?php echo $announcement['description']?>">Update</button>
                <button class="btn btn-outline-danger mx-1" type="button" data-bs-target="#delete" data-bs-toggle="modal" data-id="<?php echo $announcement['id']?>">Delete</button>
            </td>
        </tr>
    <?php
    }
}

function get_gallery(){
    $path = "../functions/images/gallery/*.*";
    $files = glob($path);
    foreach ($files as $file) {
        ?>
        <tr>
            <td><img class="rounded-circle me-2" width="30" height="30" src="<?php echo $file?>"><?php echo basename($file)?></td>
            <td class="text-center">
                <button class="btn btn-outline-danger mx-1" type="button" data-bs-target="#delete" data-bs-toggle="modal" data-id="<?php echo $file?>">Delete</button>
            </td>
        </tr>
        <?php
    }
   
}


