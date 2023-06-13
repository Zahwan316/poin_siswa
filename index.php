<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PoinSiswa | Login</title>
    <link rel="shortcut icon" href="asset/logo_smkn1banjar.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="shortcut icon" href="../asset/logo_smkn1banjar.png" type="image/x-icon">
</head>
<body>
    <main class='login'>
        <div class="title-main">
            <h2>Poin Siswa SMKN 1 Banjar</h2>
        </div>  
        <div class="logo-main">
            <img src="asset/logo_smkn1banjar.png" alt="">
        </div>
        <div class="box">
            <!-- <div class="title">
                 <h2>Login</h2> 
            </div> -->
            <div class="mainform">
                <form action="function/login.php" method="post">
                    <ul>
                        <li>
                            <label for="">Username</label>
                            <input type="text" name="input_name" id="">
                        </li>
                        <li>
                            <label for="">Password</label>
                            <input type="password" name="input_password" id="">
                        </li>
                        <li>
                            <input type="submit" value="Login" name='input_submit' class="login_btn">
                        </li>    
                    </ul>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>