<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    require 'db.php';
    unset(
        $_SESSION["id"],
    );
    echo '<script language="javascript">
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: "error",
            title: "You have logged out",
            text: "",
            confirmButtonColor: "#28a745",
            confirmButtonText: "OK",
        }).then(function() {
            window.location.href = "../administrator/login.php";
        });
    });
  </script>';