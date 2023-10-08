$(document).ready(function () {
    const currentPath = window.location.pathname.toLowerCase();
    console.log(currentPath);
    const urlParams = new URLSearchParams(window.location.search);
    const type = urlParams.get("type");
    const message = urlParams.get("message");
    VANTA.FOG({
      el: "#bg-animate",
      mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 200.0,
      minWidth: 200.0,
      highlightColor: 0xd0f9ff,
      midtoneColor: 0xdcdeff,
      lowlightColor: 0xd4cbff,
      baseColor: 0xffffff,
      speed: 5.5,
      zoom: 2.7,
    });
  
    if (type == "success") {
      Swal.fire("Success!", message, "success");
    } else if (type == "error") {
      Swal.fire("Error!", message, "error");
    }
  
    if (currentPath.includes("/administrator/course.php")) {
      $('button[data-bs-target="#update"]').on("click", function () {
        var id = $(this).data("id");
        var name = $(this).data("name");
        $('input[name="id"]').val(id);
        $('input[name="name"]').val(name);
        console.log(id, name);
      });
  
    }else if (currentPath.includes("/administrator/announcement.php")) {
      $('button[data-bs-target="#update"]').on("click", function () {
        var id = $(this).data("id");
        var description = $(this).data("description");
        $('input[name="id"]').val(id);
        $('textarea[name="description"]').val(description);
        console.log(id, name);
      });
  
    }else if (currentPath.includes("/administrator/alumni.php")) {
      $('button[data-bs-target="#update"]').on("click", function () {
        var id = $(this).data("id");
        var username = $(this).data("username");
        var firstname = $(this).data("firstname");
        var lastname = $(this).data("lastname");
        var birthdate = $(this).data("birthdate");
        var email = $(this).data("email");
        var course = $(this).data("course");
        var civil = $(this).data("civil");
        var graduated = $(this).data("graduated");
        var children = $(this).data("children");
        var phone = $(this).data("phone");
        var present = $(this).data("present");
        var work = $(this).data("work");
        $('input[name="id"]').val(id);
        $('input[name="username"]').val(username);
        $('input[name="firstname"]').val(firstname);
        $('input[name="lastname"]').val(lastname);
        $('input[name="birthdate"]').val(birthdate);
        $('input[name="email"]').val(email);
        $('input[name="course"]').val(course);
        $('input[name="civil"]').val(civil);
        $('input[name="graduated"]').val(graduated);
        $('input[name="children"]').val(children);
        $('input[name="phone"]').val(phone);
        $('input[name="present_address"]').val(present);
        $('input[name="work_address"]').val(work);
        console.log(id, username, firstname, lastname, birthdate, email, course, civil, graduated, children, phone, present, work);
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
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
            },
          },
          {
            extend: "pdf",
            title: "ALUMNI ASSOCIATION",
            className: "btn btn-primary text-danger",
            text: '<i class="fa fa-file-pdf"></i> PDF',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
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
              columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
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
  
    }
  
    $('button[data-bs-target="#delete"]').on("click", function () {
      var id = $(this).data("id");
      $('input[name="id"]').val(id);
      console.log(id);
    });
  });
  
  (function () {
    "use strict";
    var forms = document.querySelectorAll(".needs-validation");
  
    Array.prototype.slice.call(forms).forEach(function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
  
          form.classList.add("was-validated");
        },
        false
      );
    });
  })();
  