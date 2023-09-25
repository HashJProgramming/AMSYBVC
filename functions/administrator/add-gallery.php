<?php
$image = $_FILES['photo']['name'];
$target = "../images/gallery/".basename($image);
move_uploaded_file($_FILES['photo']['tmp_name'], $target);
header("Location: ../../administrator/gallery.php?type=success&message=Photo added successfully.");