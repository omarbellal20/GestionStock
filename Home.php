<?php
// Connect to database
$host = "127.0.0.1";
$user = "root";
$pass = "12345";
$database = "admins";
$con = mysqli_connect($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
    die("Cannot Connect to database:" . mysqli_connect_error());
} else {
    //echo 'Connected';
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <title>Sign In</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">        
        <style>
            b{
                color: red;
            }
            table{
                text-align: center;
            }

        </style>
    </head>
    <body class="boss">
        <h1 align="center" style="color: black;">Abou Malik Phone</h1>
        <div class="box" align="center">
            <h1>Sign In</h1>
            <form method="post" action=#>
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="in">
                    <input type="text" name="user" required /><label>Username</label><br>
                </div>
                <div class="in">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input type="password" name="pass" required /><label>Password</label><br>
                </div>
                <input type="submit" value="Submit" name="submit" />
            </form>
        </div>
        <?php
        // insert from database
        if (isset($_POST['submit'])) {
            $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
            $st = $con->prepare("select username,password from logins");
            $st->execute();
            $lignes = $st->fetchAll();
            foreach ($lignes as $c => $v) {
                foreach ($v as $k => $val) {
                    if ($v["username"] == $_POST["user"] && $v["password"] == $_POST["pass"]) {
                        header("location:History.php");
                    } else {
                        echo '<script>alert("Username or Password Incorrect");</script>';
                    }
                }
            }
        }
        ?>
    </body>

</html>
