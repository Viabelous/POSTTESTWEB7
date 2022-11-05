<!DOCTYPE html>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<html>

<head>
    <link rel="stylesheet" href="Style.css?v=<?php echo time(); ?>">
    <title> Hotel Clara Stella </title>
    <meta charset="utf-8">
    <script src="jscs.js?v=<?php echo time(); ?>"></script>
</head>

<body oncopy="alert('Dilarang Menyalin!');return false">
    <?php
        include 'Banner.php';
    ?>

    <div class="blanks">
        <table width="100%" class="Content">
            <tr>
                <th colspan="2" class="Content"><h1 class="profile"> Manager </h1></th>
            </tr>
            <tr class = "contplace">
                <td width = 30% class="profilepic">
                    <img src="Foto Manager.jpeg" width="40%">
                </td>
                <td width="70%">
                    <p> Ibnu Yafi Arya Wardana </p>
                    <p>
                        NIK : 2109106039 <br>
                        Pendidikan Terakhir: S1 Informatika, Universitas Mulawarman <br>
                        Kewarganegaraan: Indonesia <br>
                        Domisili: Samarinda <br>
                        <br><br>
                        Kode Pegawai: A21_A2
                    </p>
                    <br>
                    <br>
                </td>
            </tr>

            <tr>
                <th colspan="2" class="Content"><h1 class="profile"> Staf </h1></th>
            </tr>

            <tr class = "contplace">
                <td width = 30% class="profilepic">
                    <img src="Hendric Formality.jpeg" width="40%">
                </td>
                <td width="70%">
                    <br>
                    <p> Hendric Formality </p>
                    <p>
                        NIK : 2100000001 <br>
                        Pendidikan Terakhir: S1 Informatika, Universitas Mulawarman <br>
                        Kewarganegaraan: Belanda <br>
                        Domisili: Samarinda <br>
                        <br><br>
                        Kode Pegawai: SP01
                    </p>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>

            <tr class = "contplace">
                <td width = 30% class="profilepic">
                    <img src="Al-Fakhuman.jpeg" width="40%">
                </td>
                <td width="70%">
                    <br>
                    <p> Al-Fakhuman </p>
                    <p>
                        NIK : 1100000001 <br>
                        Pendidikan Terakhir: S1 Informatika, Universitas Mulawarman <br>
                        Kewarganegaraan: Saudi Arabia <br>
                        Domisili: Samarinda <br>
                        <br><br>
                        Kode Pegawai: SP02
                    </p>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>

            <tr class = "contplace">
                <td width = 30% class="profilepic">
                    <img src="Betty Notreel.jpeg" width="40%">
                </td>
                <td width="70%">
                    <br>
                    <p> Betty Notreel </p>
                    <p>
                        NIK : 1200000001 <br>
                        Pendidikan Terakhir: S1 Informatika, Universitas Mulawarman <br>
                        Kewarganegaraan: Belanda <br>
                        Domisili: Samarinda <br>
                        <br><br>
                        Kode Pegawai: SP03
                    </p>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
    </div>

<footer>
    <?php
        include 'Footer.php';
    ?>
</footer>

</body>

</html>