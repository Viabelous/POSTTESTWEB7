<!DOCTYPE html>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    if(!isset($_SESSION['login'])){
        echo"<script>
                alert('Mohon login terlebih dahulu');
                document.location.href = 'index.php';
             </script>";
    }
?>
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
                <th colspan="2" class="Content"><h1 id= "home"> Reservasi </h1><hr></th>
            </tr>
            <form action="Add.php" method="post" target="print_popup"
            onsubmit="window.open('about:blank','print_popup','width=750,height=500');"
            enctype="multipart/form-data">
                <tr class = "contplace">
                    <td class="form_place" width=50%>
                        <label> Nama:</label><br>
                        <label> Tanggal Kedatangan: </label><br>
                        <label> Tanggal Pulang:     </label><br>
                    </td>
                    <td>
                        <input type="text" name="name" required><br>
                        <input type="date" name="arrival_date" min="<?php echo date("Y-m-d"); ?>" required><br>
                        <input type="date" name="departure_date" min="<?php echo date("Y-m-d"); ?>" required><br>
                    </td>
                </tr>
                

                <tr class= "contplace">
                    <td class="form_place">
                        <label> Superior Single: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="SuperiorS_room" id="SuperiorSCBox" onclick="appear('SuperiorSCBox','SuperiorSingleBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="SuperiorSingleBox">
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="SuperiorSnum" min="1"><br>
                    </td>
                </tr>


                <tr class= "contplace">
                    <td class="form_place">
                        <label> Superior Double: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="SuperiorD_room" id="SuperiorDCBox" onclick="appear('SuperiorDCBox','SuperiorDoubleBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="SuperiorDoubleBox">
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="SuperiorDnum" min="1"><br>
                    </td>
                </tr>


                <tr class= "contplace">
                    <td class="form_place">
                        <label> Deluxe Single: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="DeluxeS_room" id="DeluxeSCBox" onclick="appear('DeluxeSCBox','DeluxeSingleBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="DeluxeSingleBox">
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="DeluxeSnum" min="1"><br>
                    </td>
                </tr>


                <tr class= "contplace">
                    <td class="form_place">
                        <label> Deluxe Double: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="DeluxeD_room" id="DeluxeDCBox" onclick="appear('DeluxeDCBox','DeluxeDoubleBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="DeluxeDoubleBox">
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="DeluxeDnum" min="1"><br>
                    </td>
                </tr>


                <tr class= "contplace">
                    <td class="form_place">
                        <label> Junior Suite: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="JuniorSuite_room" id="JuniorSuiteCBox" onclick="appear('JuniorSuiteCBox','JuniorSuiteBox')" > Ya <br>
                    </td>
                </tr>
                <tr id="JuniorSuiteBox">
                    <td class="form_place">
                        <label> Jumlah Kamar: </label><br>
                    </td>
                    <td>
                        <input type="number" name="JuniorSuitenum" min="1"><br>
                    </td>
                </tr>



                <tr class = "contplace">
                    <td class="form_place">
                        <label> Aula:</label><br>
                        <label> Ruang Rapat: </label><br>
                    </td>
                    <td>
                        <input type="checkbox" name="aula"> Ya <br>
                        <input type="checkbox" name="ruang_rapat"> Ya <br>
                    </td>
                </tr>


                <tr class = "contplace">
                    <td class="form_place">
                        <label> Foto Diri:</label><br>
                    </td>
                    <td>
                        <input type="file" name="foto" required>
                    </td>
                </tr>


                <tr class = "contplace">
                    <td class="form_place">
                        <label> Nama Foto:</label><br>
                    </td>
                    <td>
                        <input type="text" name="char_foto" require><br>
                    </td>
                </tr>


                <tr>
                    <td colspan="2" style="text-align: center; font-size: 18px">
                        <br>
                        <input type="hidden" name="date_of_submit" Value="<?php date_default_timezone_set("America/New_York"); echo date("Y-m-d"); ?>"/>
                        <input type="hidden" name="time_of_submit" Value="<?php date_default_timezone_set("America/New_York"); echo date("h:i:sa"); ?>"/>
                        <input type="submit" name="my_form_submit_button" value="Lihat Reservasi"/>
                        <br>
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