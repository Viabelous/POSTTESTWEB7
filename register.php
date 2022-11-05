<?php
    require 'koneksi.php';

    echo'
        <div id="regist">
            <div class="bg-color">
                <div class="modalreg" id="modal">
                    <p><a href="#"> X </a></p>
                    <a href="#regist" class="see" onclick="seePass()"> [PEEK] </a>
                    <h1> Register </h1>

                    <form action="" method="post">
                        <label for="nama">Nama:</label>
                        <input type="text" placeholder="Masukkan Nama" name="nama" class="logto" required>

                        <label for="email">Email:</label>
                        <input type="text" placeholder="Masukkan Email" name="email" class="logto" required>
                        <note class="notify"> </note>

                        <label for="usn">Username:</label>
                        <input type="text" placeholder="Masukkan Username" name="usn" class="logto" required>
                        <note class="notify"> </note>
            
                        <label for="sandi">Password:</label> <label for=""> </label>
                        <input type="password" placeholder="Masukkan Password" name="sandi" class="logto" required>

                        <button type="submit" name="reg" class="btn"> Daftar </button> <br>
                    </form>
                </div>
            </div>
        </div>
        ';

        if(isset($_POST['reg'])){
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $username = $_POST['usn'];
            $password = $_POST['sandi'];
            $fail = false;
    
            // cek username telah digunakan atau belom
            $user = $conn->query("SELECT * FROM akun WHERE username='$username'");
            if(mysqli_num_rows($user) > 0){
                $fail = true;
         
                echo '<script type="text/javascript">',
                'fail(1, false);',
                '</script>';
            }
            else{
                echo '<script type="text/javascript">',
                'fail(1, true);',
                '</script>';
            }
    
            $user = $conn->query("SELECT * FROM akun WHERE email='$email'");
            if(mysqli_num_rows($user) > 0){
                $fail = true;
                echo '<script type="text/javascript">',
                'fail(0, false);',
                '</script>';
            }
            else{
                echo '<script type="text/javascript">',
                'fail(0, true);',
                '</script>';
            }
    
            if($fail == false){
                // konfirmasi password uda bener atau belom
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO akun VALUES ('$username','$email', '$nama', '$password', 'user')";
                $result = $conn->query($query);
                header("Location: #");
                }
        }

?>