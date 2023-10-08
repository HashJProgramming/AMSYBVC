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
            <section id="alumni" class="py-4 py-xl-5">
                <div class="container">
                    <div class="text-dark bg-light border rounded border-0 border-light d-flex flex-column justify-content-between align-items-center flex-lg-row p-4 p-lg-5 shadow-sm" data-bs-theme="light">
                        <div class="text-center text-lg-start py-3 py-lg-1">
                            <h2 class="fw-bold mb-2">Batch Alumni List</h2>
                            <p class="mb-0">YBVC ALUMNI ASSOCIATION -
"THE BUILDER OF FUTURE LEADERS"</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-4 py-xl-5 mb-5">
                <div class="container py-4 py-xl-5">
                    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-2">

                        <?php include_once '../functions/administrator/get-alumni.php'?>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php include_once '../functions/administrator/offcanva-menu.php'; ?>
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
        new DataTable('table.display', {
        // dom: 'Blfrtip',
        dom: "Bfrtip",
        responsive: true,
        buttons: [
          {
            extend: "excel",
            title: "ALUMNI ASSOCIATION",
            exportOptions: {
                stripHtml: false
            }
          },
          {
            extend: "pdf",
            title: "ALUMNI ASSOCIATION",
            exportOptions: {
                stripHtml: false
            }
          },
          {
            extend: "print",
            title: "ALUMNI ASSOCIATION",
            autoPrint: true,
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
            exportOptions: {
                stripHtml: false
            }
          },
        ],
        
      });
        
    </script>
</body>

</html>