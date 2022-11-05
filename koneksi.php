<?php
    $conn = mysqli_connect("localhost", "root", "", "posttest_pweb");

    if (!$conn) {
        die("Gagal terhubung ke database". mysqli_connect_eror());
    }
?>