<?php
require 'koneksi.php';

if(ISSET($_GET['hidden_id'])){
    $id = $_GET['hidden_id'];
}
else{
    $id = $_GET['ID'];
}


$result = mysqli_query($conn, "SELECT * FROM daftar_reservasi WHERE ID=$id");
$daftar = [];


$daftar[] = mysqli_fetch_assoc($result);

$data = $daftar[0];



$SuperiorSingle    = ($data['Superior_Single'] == 1)? "Ya" : "";
$SuperiorSingleN    = ($data['Superior_Single'] == 1)? $data['Superior_Single_Value'] : "";
$SuperiorDouble    = ($data['Superior_Double'] == 1)? "Ya" : "";
$SuperiorDoubleN    = ($data['Superior_Double'] == 1)? $data['Superior_Double_Value'] : "";
$DeluxeSingle      = ($data['Deluxe_Single'] == 1)? "Ya" : "";
$DeluxeSingleN      = ($data['Deluxe_Single'] == 1)? $data['Deluxe_Single_Value'] : "";
$DeluxeDouble      = ($data['Deluxe_Double'] == 1)? "Ya" : "";
$DeluxeDoubleN      = ($data['Deluxe_Double'] == 1)? $data['Deluxe_Double_Value'] : "";
$JuniorSuite       = ($data['Junior_Suite'] == 1)? "Ya" : "";
$JuniorSuiteN       = ($data['Junior_Suite'] == 1)? $data['Junior_Suite_Value'] : "";
$Aula              = ($data['Aula'] == 1)? "Ya" : "";
$Aula_Value        = ($data['Aula'] == 1)? "1" : "";
$Ruang_Rapat       = ($data['Ruang_Rapat'] == 1)? "Ya" : "";
$Ruang_Rapat_Value = ($data['Ruang_Rapat'] == 1)? "1" : "";
$filefoto          = $id."_".$data['nama_foto']; 


echo '
<style>
.centralData{
    text-align: center;
}
</style>

<br>
<br>
<br>
<table width=50% border=1 align="center">
    <tr style="background-color: darkcyan">
        <td width=20% align="center"><img src="Clara Stella Icon.png" width=70%> </img>
        <th style="color: white;" colspan="2">Data Formulir Reservasi Clara Stella </th>
    </tr>
    <tr>
        <td colspan="2"><p> Nama: '.$data['Nama'].'
            <br> Jadwal Kedatangan: '.$data['Datang'].'
            <br> Jadwal Kepulangan: '.$data['Pulang'].'
            <p>
        </td>
        <td width=20%> 
            <img src="Gambar Diri/'.$filefoto.'"/ width=100% alt="">
        </td>
    </tr>
    <tr>    
        <table width=50% border=1 align="center">
            <tr>
                <th> Ruangan / Kamar </th>
                <th> Dilakukan Pemesanan </th>
                <th> Jumlah </th>
            </tr>
            <tr>
                <td> Superior Single </td>
                <td class="centralData"> '.$SuperiorSingle.' </td>
                <td class="centralData"> '.$SuperiorSingleN.' </td>
            </tr>
            <tr>
                <td> Superior Double </td>
                <td class="centralData"> '.$SuperiorDouble.' </td>
                <td class="centralData"> '.$SuperiorDoubleN.' </td>
            </tr>
            <tr>
                <td> Deluxe Single </td>
                <td class="centralData"> '.$DeluxeSingle.' </td>
                <td class="centralData"> '.$DeluxeSingleN.' </td>
            </tr>
            <tr>
                <td> Deluxe Double </td>
                <td class="centralData"> '.$DeluxeDouble.' </td>
                <td class="centralData"> '.$DeluxeDoubleN.' </td>
            </tr>
            <tr>
                <td> Junior Suite </td>
                <td class="centralData"> '.$JuniorSuite.' </td>
                <td class="centralData"> '.$JuniorSuiteN.' </td>
            </tr>
            <tr>
                <td> Aula </td>
                <td class="centralData"> '.$Aula.' </td>
                <td class="centralData"> '.$Aula_Value.' </td>
            </tr>
            <tr>
                <td> Ruang Rapat </td>
                <td class="centralData"> '.$Ruang_Rapat.' </td>
                <td class="centralData"> '.$Ruang_Rapat_Value.' </td>
            </tr>
            <tr>
                <th colspan=3>'.$data['Tanggal'].' . '.$data['Waktu'].'</th>
            </tr>
        </table>
    </tr>
</table>';
?>