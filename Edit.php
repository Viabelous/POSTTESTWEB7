<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if(isset($_SESSION['login'])) {
        if($_SESSION['login']  != "admin"){
            echo"<script>
                    alert('!!!!!!');
                    document.location.href = 'index.php';
                </script>";
        }
    }
    else{
        echo"<script>
        alert('!!!!!!');
        document.location.href = 'index.php';
        </script>";
    }


require 'koneksi.php';
$id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM daftar_reservasi WHERE ID=$id");
$daftar[] = mysqli_fetch_assoc($result);

$data = $daftar[0];


if (isset($_POST['Edit'])) {
    if(!isset($_FILES['foto'])){
        if(file_exists('Gambar Diri/'.$data['nama_foto'])){
            unlink('Gambar Diri/'.$data['nama_foto']);
        }
    }

    $editArr =  array('SuperiorSNum'   => isset($_POST['SuperiorS_room']) ? $_POST['SuperiorSnum'] : 0,
                      'SuperiorDNum'   => isset($_POST['SuperiorD_room']) ? $_POST['SuperiorDnum'] : 0,
                      'DeluxeSNum'     => isset($_POST['DeluxeS_room']) ? $_POST['DeluxeSnum'] : 0,
                      'DeluxeDNum'     => isset($_POST['DeluxeD_room']) ? $_POST['DeluxeDnum']: 0,
                      'JuniorSuiteNum' => isset($_POST['JuniorSuite_room']) ? $_POST['JuniorSuitenum'] : 0
    );

    $nama           = $_POST['name'];
    $arrival        = $_POST['arrival_date'];
    $depart         = $_POST['departure_date'];
    $SuperiorS      = isset($_POST['SuperiorS_room']) ? 1 : 0;
    $SuperiorSNum   = $editArr['SuperiorSNum'];
    $SuperiorD      = isset($_POST['SuperiorD_room']) ? 1 : 0;
    $SuperiorDNum   = $editArr['SuperiorDNum'];
    $DeluxeS        = isset($_POST['DeluxeS_room']) ? 1 : 0;
    $DeluxeSNum     = $editArr['DeluxeSNum'];
    $DeluxeD        = isset($_POST['DeluxeD_room']) ? 1 : 0;
    $DeluxeDNum     = $editArr['DeluxeDNum'];
    $JuniorSuite    = isset($_POST['JuniorSuite_room']) ? 1 : 0;
    $JuniorSuiteNum = $editArr['JuniorSuiteNum'];
    $AulaNum        = isset($_POST['aula']) ? 1 : 0;
    $RuangRapatNum  = isset($_POST['ruang_rapat']) ? 1 : 0;

    $namaFoto = $_POST['char_foto'];

    if(is_uploaded_file($_FILES['foto']['tmp_name']) AND !isset($_POST['delfoto']) == true){
        unlink("Gambar Diri/".$data['ID']."_".$data['nama_foto']);

        if(strpos($namaFoto, '.') !== false) {
            $base_eks = strtolower(end(explode('.',$namaFoto)));
            if($base_eks == 'jpg' OR $base_eks == 'jpeg' OR $base_eks == 'png'){
                $exp = explode('.', $namaFoto);
                unset($exp[count($exp)-1]);
                $namaFoto = implode('', $exp);
            }
        }

        $gambar = $_FILES['foto']['name'];
        $pisah = explode('.', $gambar);
        $ekstensi = strtolower(end($pisah));        
        $namaFotoAbsolut = $namaFoto.".".$ekstensi;

        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, 'Gambar Diri/'.$data['ID']."_".$namaFotoAbsolut);

        $namaFoto = $namaFotoAbsolut;
    }

    if(!is_uploaded_file($_FILES['foto']['tmp_name']) AND !isset($_POST['delfoto']) == true){
        if(strpos($namaFoto, '.') !== false) {
            $base_eks = strtolower(end(explode('.',$namaFoto)));
            if($base_eks == 'jpg' OR $base_eks == 'jpeg' OR $base_eks == 'png'){
                $exp = explode('.', $namaFoto);
                unset($exp[count($exp)-1]);
                $namaFoto = implode('', $exp);
            }
        }
        $ekstensi = end(explode('.', $data['nama_foto']));
        $namaFoto = "$namaFoto".".$ekstensi";
    }

    rename("Gambar Diri/".$data['ID']."_".$data['nama_foto'], "Gambar Diri/".$data['ID']."_".$namaFoto);

    if (isset($_POST['del_foto'])){
        unlink("Gambar Diri/".$data['ID']."_".$data['nama_foto']);
        $namaFoto = "blank.jpg";
    }

    

    $sql = "UPDATE daftar_reservasi SET
                Nama                  = '$nama',
                Datang                = '$arrival',
                Pulang                = '$depart',
                Superior_Single       = '$SuperiorS',
                Superior_Single_Value = '$SuperiorSNum',
                Superior_Double       = '$SuperiorD',
                Superior_Double_Value = '$SuperiorDNum',
                Deluxe_Single         = '$DeluxeS',
                Deluxe_Single_Value   = '$DeluxeSNum',
                Deluxe_Double         = '$DeluxeD',
                Deluxe_Double_Value   = '$DeluxeDNum',
                Junior_Suite          = '$JuniorSuite',
                Junior_Suite_Value    = '$JuniorSuiteNum',
                Aula                  = '$AulaNum',
                Ruang_Rapat           = '$RuangRapatNum',
                nama_foto             = '$namaFoto'
            WHERE ID = '$id';";

    $result = mysqli_query($conn, $sql);
    header("Location: Data_reservasi.php");
}

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="Style.css?v=<?php echo time(); ?>">
    <title> Hotel Clara Stella </title>
    <meta charset="utf-8">
    <script src="jscs.js?v=<?php echo time(); ?>"></script>
</head>

<body>
    <?php
        include 'Banner.php';
    ?>

    <div class="blanks">
        <hr>
        <table width="100%" class="Content">
            <tr>
                <th colspan="2" class="Content"><h1 id= "home"> Edit Data Reservasi </h1><hr></th>
            </tr>
            <form action="" method="post" enctype="multipart/form-data">
                <tr class = "contplace">
                    <td class="form_place" width=50%>
                        <label> Nama:</label><br>
                        <label> Tanggal Kedatangan: </label><br>
                        <label> Tanggal Pulang:     </label><br>
                    </td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="text" name="name" value="<?php echo $data['Nama']; ?>" required><br>
                        <input type="date" name="arrival_date" value="<?php echo $data['Datang']; ?>" required><br>
                        <input type="date" name="departure_date" value="<?php echo $data['Pulang']; ?>" required><br>
                    </td>
                </tr>
                

                <tr class= "contplace">
                    <td class="form_place">
                        <label> Superior Single: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="SuperiorS_room" id="SuperiorSCBox"
                        <?php if ($data['Superior_Single']==1){echo "checked";}?>
                        onclick="appear('SuperiorSCBox','SuperiorSingleBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="SuperiorSingleBox" <?php if($data['Superior_Single']==1){echo 'style="display:table-row;"';}?>>
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="SuperiorSnum" value="<?php echo $data['Superior_Single_Value']; ?>"><br>
                    </td>
                </tr>


                <tr class= "contplace">
                    <td class="form_place">
                        <label> Superior Double: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="SuperiorD_room" id="SuperiorDCBox"
                        <?php if ($data['Superior_Double']==1){echo "checked";}?>
                        onclick="appear('SuperiorDCBox','SuperiorDoubleBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="SuperiorDoubleBox" <?php if($data['Superior_Double']==1){echo 'style="display:table-row;"';}?>>
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="SuperiorDnum" value="<?php echo $data['Superior_Double_Value']; ?>"><br>
                    </td>
                </tr>


                <tr class= "contplace">
                    <td class="form_place">
                        <label> Deluxe Single: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="DeluxeS_room" id="DeluxeSCBox"
                        <?php if ($data['Deluxe_Single']==1){ echo "checked";}?>
                        onclick="appear('DeluxeSCBox','DeluxeSingleBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="DeluxeSingleBox" <?php if($data['Deluxe_Single']==1){echo 'style="display:table-row;"';}?>>
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="DeluxeSnum" value="<?php echo $data['Deluxe_Single_Value']; ?>"><br>
                    </td>
                </tr>


                <tr class= "contplace">
                    <td class="form_place">
                        <label> Deluxe Double: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="DeluxeD_room" id="DeluxeDCBox"
                        <?php if ($data['Deluxe_Double']==1){echo "checked";}?>
                        onclick="appear('DeluxeDCBox','DeluxeDoubleBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="DeluxeDoubleBox" <?php if($data['Deluxe_Double']==1){echo 'style="display:table-row;"';}?>>
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="DeluxeDnum"value="<?php echo $data['Deluxe_Double_Value']; ?>"><br>
                    </td>
                </tr>


                <tr class= "contplace">
                    <td class="form_place">
                        <label> Junior Suite: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="JuniorSuite_room" id="JuniorSuiteCBox"
                        <?php if ($data['Junior_Suite']==1){ echo "checked";}?>
                        onclick="appear('JuniorSuiteCBox','JuniorSuiteBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="JuniorSuiteBox" <?php if($data['Junior_Suite']==1){echo 'style="display:table-row;"';}?>>
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="JuniorSuitenum" value="<?php echo $data['Junior_Suite_Value']; ?>"><br>
                    </td>
                </tr>


                <tr class = "contplace">
                    <td class="form_place">
                        <label> Aula:</label><br>
                        <label> Ruang Rapat: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="aula"
                        <?php if ($data['Aula']==1){echo "checked";}?>> Ya <br>
                        <input type="checkbox" name="ruang_rapat"
                        <?php if ($data['Superior_Single']==1){echo "checked";}?>> Ya <br>
                    </td>
                </tr>
                
                <tr class = "contplace">
                    <td class="form_place">
                        <label> Foto Lama:</label><br>
                    </td>
                    <td>
                        <img src="Gambar Diri/<?php echo $data['ID'].'_'.$data['nama_foto']; ?>" width=10%>
                    </td>
                </tr>

                <tr class = "contplace">
                    <td class="form_place">
                        <label> Foto Diri:</label><br>
                    </td>
                    <td>
                        <input type="file" name="foto">
                    </td>
                </tr>


                <tr class = "contplace">
                    <td class="form_place">
                        <label> Nama Foto:</label><br>
                    </td>
                    <td>
                        <input type="text" name="char_foto" value="<?php echo $data['nama_foto'];?>"><br>
                    </td>
                </tr>

                <tr class = "contplace">
                    <td class="form_place">
                        <label> Kosongkan Foto:</label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="del_foto"><br>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right; font-size: 18px; padding-right: 30px">
                        <br>
                            <input type="submit" name="Edit"
                            style='background-color:lightgreen; border-color:greenyellow; border-radius: 4px;' value='Selesai Edit'/>
                        <br>
                    </td>
                    <td style="text-align: left; font-size: 18px; padding-left: 30px">
                        <br>
                            <input type="button" name="Delete" style='background-color:pink; border-color:red; border-radius: 4px;'
                            onclick="location.href='Delete.php?ID=<?php echo $data['ID']; ?>';" value="Hapus Data"/>
                        <br>
                    </td>
                </tr>

                <tr>
                    <td colspan=2 style="text-align:center;">
                        <br>
                        <input type="button" name="Kembali" style='background-color:aliceblue; border-color:skyblue; border-radius: 4px;'
                        onclick="location.href='Data_reservasi.php'" value="Kembali"/>
                    </td>
                </tr>
            </form>
        </table>
        <hr>
    </div>

</body>

<footer>
    <?php
        include 'Footer.php';
    ?>
</footer>

</html>