<!DOCTYPE html>
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
?>

<head>
    <link rel="stylesheet" href="Style.css?v=<?php echo time(); ?>">
    <title> Hotel Clara Stella </title>
    <meta charset="utf-8">
    <script src="jscs.js?v=<?php echo time(); ?>"></script>
</head>

<body>
    <?php
        include 'Banner.php';
        require 'koneksi.php';


    if(isset($_POST['Cari'])){
        $result = mysqli_query($conn, "SELECT * FROM daftar_reservasi WHERE Nama LIKE'%".$_POST['Cari']."%'");
    }
    else{
        $result = mysqli_query($conn, "SELECT * FROM daftar_reservasi");
    }

    $daftar = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $daftar[] = $row;
        }

    ?>


    <div class="blanks">
        <br>
        <form action="#" method="post">
            <input type="text" name="Cari" placeholder="Cari Nama" style='font-size: 20px' size=50>
            <input type="submit" name="Search_button" value="Cari" style='font-size: 20px'/>
            <br>
            <br>
        </form>
        <table width="100%" class="Content" border=1>
            <tr>
                <th colspan=5 style='font-size: xx-large'> Daftar Reservasi Diterima </th>
            </tr>
            <tr>
                <th width=10%>No.</td>
                <th width=40%>Nama</td>
                <th width=40%>Tanggal</td>
                <th width=5%>Lihat</td>
                <th width=5%>Ubah</td>
            </tr>
            <?php $i = 1; foreach ($daftar as $dft): ?>
            <tr>
                <td> <?php echo $i; ?> </td>
                <td> <?php echo $dft['Nama']; ?> </td>
                <td> <?php echo $dft['Tanggal'].' Jam '.$dft['Waktu']; ?> </td>
                <td> <a href="Reservation_note.php?ID=<?php echo $dft['ID']; ?>" style='text-decoration: none'
                target="print_popup"onclick="window.open('about:blank','print_popup','width=750,height=500');">
                <img src='https://cdn.pixabay.com/photo/2017/06/21/07/51/icon-2426369_1280.png' width=20%>
                </a> </td>
                <td> <a href="Edit.php?ID=<?php echo $dft['ID']; ?>" style='text-decoration: none'>
                <img src='https://www.nicepng.com/png/full/230-2304754_windows-10-icons-for-png-files-shown-in.png' width=20%>
                </a> </td>
            </tr>
            <?php $i++; endforeach ?>
        </table>
    </div>

</body>

<footer>
    <?php
        include 'Footer.php';
    ?>
</footer>

</html>