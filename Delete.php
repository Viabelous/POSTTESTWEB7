<?php

require 'koneksi.php';

$id = $_GET['ID'];

$result = mysqli_query($conn, "DELETE FROM daftar_reservasi WHERE ID = $id");

header("Location: Data_reservasi.php");

?>