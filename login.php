<?php
    require 'koneksi.php';
    require 'register.php';

    echo'
        <div id="login">
            <div class="bg-color">
                <div class="modal">
                    <p><a href="#"> X </a></p>
                    <h1>Login</h1>

                    <form action="" method="post">
                        <label for="">Username:</label>
                        <input type="text" placeholder="Masukkan Email atau Username" name="usn_log" class="logto" required>
            
                        <label for="">Password:</label>
                        <input type="password" placeholder="Masukkan Password" name="sandi_log" class="logto" required>

                        <button type="submit" name="login" class="btn"> Login </button> <br>
                        <a href="#regist" id="regist"> register </a>
                    </form>
                </div>
            </div>
        </div>
        ';

    if(isset($_POST["login"])){
        $username = $_POST["usn_log"];
        $password = $_POST["sandi_log"];
        
        $rows = $conn->query("SELECT * FROM akun
                                WHERE username = '$username'
                                OR email='$username'");

        $account = mysqli_fetch_array($rows);

        if(isset($account['jenis'])){
            if(password_verify($password, $account['password'])){
                $_SESSION['login'] = $account['jenis'];
    
                echo "<script>
                    alert('Selamat Datang $username');
                    document.location.href = 'index.php';
                    </script>";
                }
            else{
                echo "<script>
                        alert('Username dan Password salah');
                        </script>";
            }
        }
        else{
            echo "<script>
                  alert('Username dan Password salah');
                  </script>";
        }

    }
?>