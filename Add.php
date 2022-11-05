<?php
$data =  array('SuperiorSNum'   => isset($_POST['SuperiorS_room']) ? $_POST['SuperiorSnum'] : 0,
               'SuperiorDNum'   => isset($_POST['SuperiorD_room']) ? $_POST['SuperiorDnum'] : 0,
               'DeluxeSNum'     => isset($_POST['DeluxeS_room']) ? $_POST['DeluxeSnum'] : 0,
               'DeluxeDNum'     => isset($_POST['DeluxeD_room']) ? $_POST['DeluxeDnum'] : 0,
               'JuniorSuiteNum' => isset($_POST['JuniorSuite_room']) ? $_POST['JuniorSuitenum'] : 0,
               'Tanggal'        => $_POST['date_of_submit'],
               'Waktu'          => $_POST['time_of_submit'],
);

require 'koneksi.php';


$result = mysqli_query($conn, "SELECT * FROM daftar_reservasi");
$daftar = [];

while ($row = mysqli_fetch_assoc($result)) {
    $daftar[] = $row;
}

$i = 1; foreach ($daftar as $df): $i++;endforeach;

$nama           = $_POST['name'];
$arrival        = $_POST['arrival_date'];
$depart         = $_POST['departure_date'];
$SuperiorS      = isset($_POST['SuperiorS_room']) ? 1 : 0;
$SuperiorSNum   = $data['SuperiorSNum'];
$SuperiorD      = isset($_POST['SuperiorD_room']) ? 1 : 0;
$SuperiorDNum   = $data['SuperiorDNum'];
$DeluxeS        = isset($_POST['DeluxeS_room']) ? 1 : 0;
$DeluxeSNum     = $data['DeluxeSNum'];
$DeluxeD        = isset($_POST['DeluxeD_room']) ? 1 : 0;
$DeluxeDNum     = $data['DeluxeDNum'];
$JuniorSuite    = isset($_POST['JuniorSuite_room']) ? 1 : 0;
$JuniorSuiteNum = $data['JuniorSuiteNum'];
$AulaNum        = isset($_POST['aula']) ? 1 : 0;
$RuangRapatNum  = isset($_POST['ruang_rapat']) ? 1 : 0;
$Tanggal        = $data['Tanggal'];
$Waktu          = $data['Waktu'];


if(!isset($_POST['char_foto'])){
    $namaFoto = '#';
}
else{
    $namaFoto = $_POST['char_foto'];
}

$gambar = $_FILES['foto']['name'];
$pisah = explode('.', $gambar);
$ekstensi = strtolower(end($pisah));
$namaFotoAbsolut = $namaFoto.".".$ekstensi;


$sql = "INSERT INTO daftar_reservasi
        VALUES(default,
               '$nama',
               '$arrival',
               '$depart',
               '$SuperiorS',
               '$SuperiorSNum',
               '$SuperiorD',
               '$SuperiorDNum',
               '$DeluxeS',
               '$DeluxeSNum',
               '$DeluxeD',
               '$DeluxeDNum',
               '$JuniorSuite',
               '$JuniorSuiteNum',
               '$AulaNum',
               '$RuangRapatNum',
               '$Tanggal',
               '$Waktu',
               '$namaFotoAbsolut')";

$result = mysqli_query($conn, $sql);

if($result){
    $result = mysqli_query($conn, "SELECT ID FROM daftar_reservasi WHERE Nama='$nama' AND nama_foto='$namaFotoAbsolut'");

    $cari = mysqli_fetch_assoc($result);
    $ID = $cari['ID'];

    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, 'Gambar Diri/'.$ID."_".$namaFotoAbsolut);

    echo'<html>
        <form id="hidden_form" action="Reservation_note.php" method="GET">
            <input type="hidden" name="hidden_id" value='.$ID.' />
        </form>

        <script>
            document.getElementById("hidden_form").submit();
        </script>
    </html>';
}

?>"
