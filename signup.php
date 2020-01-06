<?php  require ('Head.php');?>
<head>        
    <title>Sing Up</title>
</head>
        <div class="box" align="center">
            <h1>Sign Up</h1>
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
                    $np = $_POST['user'];
                    $cat = $_POST['pass'];
                    $query = "insert into logins (username,password) values ('" . $np . "','" . $cat . "')";
                    $res = mysqli_query($con, $query);
                    if (!$res) {
                        //die("error in query");
                        echo '<script>alert("UserName existe deja");</script>';
                    } else {
                        //echo '<script>alert("Data inserted");</script>';
                    }
                }
                ?>
            </body>

</html>
