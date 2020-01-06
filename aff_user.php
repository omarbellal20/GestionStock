<?php require ('Head.php'); ?>
<head>        
    <title>Afficher User</title>
</head>
<body>
    <div class="bos">
        <form action="" method="post">
         <h1 align="center" style="color: white; margin-top:50px;">Table Utilisateur</h1>
           <table align='center' style="text-align: center; margin-top: 80px; background-color: #00CED1;" class="tables" id="tabless" border="2">
                <?php
                $totv = 0;
                if (!isset($_POST["rechercher"])) {
                    $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
                    $st = $con->prepare("select *  from logins");
                    $st->execute();
                    $lignes = $st->fetchAll(PDO::FETCH_ASSOC);
                    echo'<tr class="tt">
                <td class="ts" style="font-size: 45px; padding: 30px;"> Username </td>
                <td class="ts" style="font-size: 45px; padding: 30px;"> Password </td>
                </tr>';
                    foreach ($lignes as $c => $v) {
                        echo('<tr class="tt">');
                        foreach ($v as $k => $val) {
                            echo('<td style="font-size: 35px">');
                            echo $val;
                            echo '</td>';
                        }
                            echo("</tr>");
                    }
                }
                ?>
            </table>
    </div>
</form>

</body>
</html>