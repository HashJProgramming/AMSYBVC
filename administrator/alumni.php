<?php
require_once '../functions/connection.php';
include_once '../functions/get-data.php';
include_once '../functions/administrator/get-data-table.php';
include_once '../functions/get-announcement.php';
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" id="bg-animate" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Alumni - Alumni Management System for Yllana Bay View College</title>
    <meta name="twitter:image" content="../assets/img/logo3.webp">
    <meta name="description" content="Web-Based Alumni Management System for Yllana Bay View College">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Nunito.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="../assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Basic-icons.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-expand shadow mb-5 topbar static-top navbar-light shadow-sm">
        <div class="container-fluid"><a href="index.php"><img src="../assets/img/blue.png" style="width: 10em;"></a><button class="btn rounded-3 ms-auto shadow-sm" type="button" data-bs-target="#menu" data-bs-toggle="offcanvas"><i class="fas fa-align-justify"></i></button></div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <section>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-2">Alumni Management</h3>
                        <div class="row">
                            <div class="col"><button class="btn btn-outline-primary mx-2 mb-2 py-0" type="button" data-bs-target="#invite" data-bs-toggle="modal">Bulk Invitation</button></div>
                            <div class="col"><button class="btn btn-outline-primary mx-2 mb-2" type="button" data-bs-target="#add" data-bs-toggle="modal">Add Alumni</button></div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Alumni List</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Fullname</th>
                                            <th>Course</th>
                                            <th>Email</th>
                                            <th>Civil Status</th>
                                            <th>Children</th>
                                            <th>Age</th>
                                            <th>Birthdate</th>
                                            <th>Year Graduated</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php get_students(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include_once '../functions/administrator/offcanva-menu.php'; ?>
    <div class="modal fade" role="dialog" tabindex="-1" id="add">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header"><img src="../assets/img/blue.png" style="width: 10em;"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <form class="needs-validation" action="../functions/administrator/add-student.php" method="post" novalidate>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="username" placeholder="Username" required><label class="form-label" for="floatingInput">Username : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="password" name="password" placeholder="Password" required><label class="form-label" for="floatingInput">Password : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="firstname" placeholder="Firstname" required><label class="form-label" for="floatingInput">Firstname : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="lastname" placeholder="Lastname" required><label class="form-label" for="floatingInput">Lastname : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" name="birthdate" type="date" required><label class="form-label" for="floatingInput">Birthdate : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="email" name="email" placeholder="Email" required><label class="form-label" for="floatingInput">Email : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><select class="form-select" required name="course">
                                        <optgroup label="Course">
                                            <?php get_courses(); ?>
                                        </optgroup>
                                    </select><label class="form-label" for="floatingInput">Course :&nbsp;</label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><select class="form-select" required name="civil">
                                        <optgroup label="Status">
                                            <option value="Signle" selected="">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                        </optgroup>
                                    </select><label class="form-label" for="floatingInput">Civil Status : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="date" name="graduated" placeholder="graudate" required><label class="form-label" for="floatingInput">Graduated at: </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="number" name="children" placeholder="children"><label class="form-label" for="floatingInput">Number of children if Married :</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="tel" name="phone" placeholder="phone" required><label class="form-label" for="floatingInput">Contact #: </label></div>
                            </div>
                        </div>
                        <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="present_address" placeholder="Present Address" required><label class="form-label" for="floatingInput">Present Address : </label></div>
                        <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="work_address" placeholder="Present Address"><label class="form-label" for="floatingInput">Work Address : </label></div><button class="btn btn-primary w-100 mb-3" type="submit">Add Student</button>
                        <div class="d-flex flex-column align-items-center mb-4"></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="update">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header"><img src="../assets/img/blue.png" style="width: 10em;"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <form class="needs-validation" action="../functions/administrator/update-student.php" method="post" novalidate>
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="username" placeholder="Username" required><label class="form-label" for="floatingInput">Username : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="password" name="password" placeholder="Password"><label class="form-label" for="floatingInput">Password : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="firstname" placeholder="Firstname" required><label class="form-label" for="floatingInput">Firstname : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="lastname" placeholder="Lastname" required><label class="form-label" for="floatingInput">Lastname : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" name="birthdate" type="date" required><label class="form-label" for="floatingInput">Birthdate : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="email" name="email" placeholder="Email" required><label class="form-label" for="floatingInput">Email : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><select class="form-select" required name="course">
                                        <optgroup label="Course">
                                            <?php get_courses(); ?>
                                        </optgroup>
                                    </select><label class="form-label" for="floatingInput">Course :&nbsp;</label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><select class="form-select" required name="civil">
                                        <optgroup label="Status">
                                            <option value="Signle" selected="">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                        </optgroup>
                                    </select><label class="form-label" for="floatingInput">Civil Status : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="date" name="graduated" placeholder="graudate" required><label class="form-label" for="floatingInput">Graduated at: </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="number" name="children" placeholder="children"><label class="form-label" for="floatingInput">Number of children if Married :</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="tel" name="phone" placeholder="phone" required><label class="form-label" for="floatingInput">Contact #: </label></div>
                            </div>
                        </div>
                        <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="present_address" placeholder="Present Address" required><label class="form-label" for="floatingInput">Present Address : </label></div>
                        <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="work_address" placeholder="Present Address"><label class="form-label" for="floatingInput">Work Address : </label></div><button class="btn btn-primary w-100 mb-3" type="submit">Update Student</button>
                        <div class="d-flex flex-column align-items-center mb-4"></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this alumni?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <form class="needs-validation" action="../functions/administrator/delete-student.php" method="post">
                        <input type="hidden" name="id">
                        <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="approve">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Approve</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to approve this alumni?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                <form class="needs-validation" action="../functions/administrator/approve-student.php" method="post" method="post" novalidate>
                        <input type="hidden" name="id">
                        <button class="btn btn-primary" type="submit">Approve</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="invite">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header"><img src="../assets/img/blue.png" style="width: 10em;"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <form action="../functions/administrator/get-students.php" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" name="start" placeholder="Username" type="date"><label class="form-label" for="floatingInput">Start : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" name="end" placeholder="Password" type="date"><label class="form-label" for="floatingInput">End : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="title" placeholder="Lastname" required=""><label class="form-label" for="floatingInput">Title :</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="description" placeholder="Lastname" required=""><label class="form-label" for="floatingInput">Description :</label></div>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center mb-4">
                            <button class="btn btn-primary w-100 mb-3" type="submit">Send Invitation</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script src="../assets/js/three.min.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/Lightbox-Gallery.js"></script>
    <script src="../assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>
    <script src="../assets/js/vanta.fog.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>