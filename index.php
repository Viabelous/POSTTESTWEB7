<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
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
        <table width="100%" class="Content">
            <tr>
                <th colspan="2" class="Content"><h1 id= "home"> Selamat Datang di Hotel Clara Stella </h1></th>
            </tr>
            <tr class = "contplace">
                <td width="50%">
                <br>
                <br>
                <br>
                <p> Hotel Clara Stella </p>
                <p>
                    adalah hotel dengan empat lantai dan dua gedung terpisah <br>
                    dengan banyak fasilitas seperti aula, ruang rapat, kafetaria, <br>
                    kolam renang, dan masih banyak lagi.
                </p>
                <p>
                    Terletak di: <br>
                    Kampus Gunung Kelua
                    Jl. Sambaliung No.9 Samarinda 75119
                </p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                </td>
                <td>
                    <img src="Clara Stella Image.jpeg" width="70%">
                </td>
            </tr>
        </table>
    </div>
</body>

<footer>
    <?php
        include 'Footer.php';
    ?>
</footer>

</html>