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
                        <h3 class="text-dark mb-2">Graduates Management</h3>
                        <div class="row">
                            <div class="col"><button class="btn btn-outline-primary mx-2 mb-2" type="button" data-bs-target="#add" data-bs-toggle="modal">Add Student</button></div>
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
                                            <th>ID</th>
                                            <th>Fullname</th>
                                            <th>Course</th>
                                            <th>Year Graduated</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php get_students_graduated(); ?>
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
                    <form class="needs-validation" action="../functions/administrator/add-graduate.php" method="post" novalidate>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="fullname" placeholder="Fullname" required><label class="form-label" for="floatingInput">fullname : </label></div>
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
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="date" name="graduated" placeholder="graudate" required><label class="form-label" for="floatingInput">Graduated at: </label></div>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 mb-3" type="submit">Add Student</button>
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
                    <form class="needs-validation" action="../functions/administrator/update-graduate.php" method="post" novalidate>
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="fullname" placeholder="Fullname" required><label class="form-label" for="floatingInput">fullname : </label></div>
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
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="date" name="graduated" placeholder="graudate" required><label class="form-label" for="floatingInput">Graduated at: </label></div>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 mb-3" type="submit">Update Student</button>
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
                <form class="needs-validation" action="../functions/administrator/delete-graduate.php" method="post">
                        <input type="hidden" name="id">
                        <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
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
    <script>
        $(document).ready(function(){
            $('button[data-bs-target="#update"]').on("click", function () {
        var id = $(this).data("id");
        var fullname = $(this).data("fullname");
        var course = $(this).data("course");
        var graduated = $(this).data("graduated");
        $('input[name="id"]').val(id);
        $('input[name="fullname"]').val(fullname);
        $('input[name="course"]').val(course);
        $('input[name="graduated"]').val(graduated);
        console.log(id, fullname, lastname, course, graduated);
      });
      $("#dataTable").DataTable({
        // dom: 'Blfrtip',
        dom: "Bfrtip",
        responsive: true,
        buttons: [
          {
            extend: "excel",
            title: "ALUMNI ASSOCIATION",
            className: "btn btn-primary text-primary",
            text: '<i class="fa fa-file-excel"></i> EXCEL',
            exportOptions: {
              columns: [0, 1, 2, 3, 4],
            },
          },
          {
            extend: "pdf",
            title: "ALUMNI ASSOCIATION",
            className: "btn btn-primary text-danger",
            text: '<i class="fa fa-file-pdf"></i> PDF',
            exportOptions: {
              columns: [0, 1, 2, 3, 4]
            },
          },
          {
            extend: "print",
            className: "btn btn-primary text-info",
            text: '<i class="fa fa-print"></i> Print',
            title: "ALUMNI ASSOCIATION",
            autoPrint: true,
            exportOptions: {
              columns: ":visible",
              columns: [0, 1, 2, 3, 4],
            },
            customize: function (win) {
              $(win.document.body)
                .find("table")
                .addClass("display")
                .css("font-size", "9px");
              $(win.document.body)
                .find("tr:nth-child(odd) td")
                .each(function (index) {
                  $(this).css("background-color", "#D0D0D0");
                });
              $(win.document.body).find("h1").css("text-align", "center");
            },
          },
        ],
      });  
      $('button[data-bs-target="#approve"]').on("click", function () {
        var id = $(this).data("id");
        $('input[name="id"]').val(id);
        console.log(id);
      });
        })
    </script>
</body>

</html>