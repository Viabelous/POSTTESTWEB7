<?php

require 'login.php';

echo '
<hr class="garisputih">
    <table id="header">
        <tr>
            <td width="50">
                <a href="#" onclick="bannerHotel()">
                    <img src="Clara Stella Icon.png" id="icon"></img>
                </a>
            </td>
            <td>
                <h1 id="namaHotel">Hotel Clara Stella</h1>
            </td>
            <td width="10%">
                <a href="#" onclick="return changeMode()">
                    <img src="DarkModeButton.png" id="modeimage"></img>
                </a>
            </td>
        </tr>
    </table>

    <hr class="garisputih">

    <nav>
        <ul>
            <li><a href="index.php"> Home </a></li><li>
            <div class="line"></div>
            <li><a href="About Us.php"> About Us </a></li><li>
            <div class="line"></div>
            <li><a href="Reservasi.php"> Reservasi </a></li><li>
            <div class="line"></div>
            <li><a href="#" onclick="return tidakBukaLowongan()"> Lowongan </a></li><li>
            <div class="line"></div>';

if(isset($_SESSION['login'])){
if($_SESSION['login'] == 'admin'){
    echo'
            <li><a href="Data_reservasi.php"> Data </a></li><li>
            <div class="line"></div>';
    }
}
if(isset($_SESSION['login'])){
echo'
            <li><a href="logout.php"> Logout </a></li>';
} else{
echo'
            <li><a href="#login"> Login </a></li>';}
echo'
        </ul>
    </nav>

    <br>';
?>