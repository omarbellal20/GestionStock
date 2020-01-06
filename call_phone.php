<?php require ('Head.php'); ?>
<head>        
    <title>Call phone</title>
</head>
<form action="" method="post">
    <div class="bos">
        <div class="boxxx">
            <h1>Call Phone</h1>
            <table align='center' style="text-align: center;" class="tables">
                <tr>
                    <td class="ts">Nom et Prenom</td>
                    <td><input type="text" name="nom_prenom" placeholder="Entrer Nom Produit"/>  </td>
                </tr>
                <tr>
                    <td class="ts">Numero Telephone</td>
                    <td><input type="text" name="num_tel" placeholder="Entrer Numero Telephone"/>  </td>
                </tr> 
                <tr>
                    <td class="ts" align="left">Type</td>
                    <td allign="center">
                        <select name='type_cl'>
                            <option>Client</option>
                            <option>Fournisseur</option>
                            <option>Revendeur</option>
                            <option>Autre</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="ts">Commentaire</td>
                    <td><input type="text" name="comment" placeholder="Entrer un Commentaire"/>  </td>
                </tr>
            </table>
            <p  align='center'>
                <input type="submit" name="submit" value="Ajouter" width="150px"/> 
                <input type="submit" name="delete" value="Supprimer"/> 
                <input type="submit" name="modifier" value="Modifier"/>
                <input type="submit" name="rechercher" value="Rechercher"/>
            </p> 

            <?php
            // insert from database
            if (isset($_POST['submit'])) {
                if (!empty($_POST['nom_prenom']) && !empty($_POST['num_tel'])) {
                    $np = $_POST['nom_prenom'];
                    $type = $_POST['type_cl'];
                    $num = $_POST['num_tel'];
                    $com = $_POST['comment'];
                    $query = "insert into call_phone (Nom_prenom,type_c,numero_tel,comments) values ('" . $np . "','" . $type . "','" . $num . "','" . $com . "')";
                    $res = mysqli_query($con, $query);
                    if (!$res) {
                        //die("error in query");
                    } else {
                        echo '<script>alert("Data inserted");</script>';
                    }
                } else {
                    echo '<script>alert("Remplir le Nom et Numero Tel");</script>';
                }
            }
            if (isset($_POST['modifier'])) {
                if (!empty($_POST['num_tel'])) {
                    $np = $_POST['nom_prenom'];
                    $type = $_POST['type_cl'];
                    $num = $_POST['num_tel'];
                    $com = $_POST['comment'];
                    $query = "update call_phone set type_c='" . $type . "',Nom_prenom='" . $np . "',comments=" . $com . " where numero_tel ='" . $num . "'";
                    $res = mysqli_query($con, $query);
                    if (!$res) {
                        //die("error in query");
                    } else {
                        echo '<script>alert("Data Modified");</script>';
                    }
                } else {
                    echo '<script>alert("Remplir le Numero Tel");</script>';
                }
            }

            if (isset($_POST['delete'])) {
                if (!empty($_POST['num_tel'])) {
                    $num = $_POST['num_tel'];
                    $query = "delete from call_phone where numero_tel='" . $num . "'";
                    $res = mysqli_query($con, $query);
                    if (!$res) {
                        //die("error in query");
                    } else {
                        echo '<script>alert("Data deleted");</script>';
                    }
                } else {
                    echo '<script>alert("Remplir le Numero Tel");</script>';
                }
            }
            ?>
        </div>

        <table align='center' style="text-align: center;" class="tables" id="tabless" border="2">

            <?php
            if (!isset($_POST["rechercher"])) {
            $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
            $st = $con->prepare("select Nom_prenom,numero_tel,type_c,comments from call_phone");
            $st->execute();
            $lignes = $st->fetchAll(PDO::FETCH_ASSOC);
            echo'<tr>
                <td class="ts">Nom et Prenom</td>
                <td class="ts">Numero Telephone</td>
                <td class="ts">Type</td>
                <td class="ts">Commentaire</td>
                </tr>';
            foreach ($lignes as $c => $v) {
                echo("<tr>");
                foreach ($v as $k => $val) {
                    echo("<td>$val</td>");
                }
                echo("</tr>");
            }
            }

            if (isset($_POST["rechercher"])) {
                $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
                $st = $con->prepare("select Nom_prenom,numero_tel,type_c,comments from call_phone where Nom_prenom=:np or numero_tel=:nm");
                $d = array(
                    ":np" => $_POST['nom_prenom'],
                    ":nm" => $_POST['num_tel']
                    );
                $st->execute($d);
                $lignes = $st->fetchAll(PDO::FETCH_ASSOC);
                echo'<tr>
                <td class="ts">Nom et Prenom</td>
                <td class="ts">Numero Telephone</td>
                <td class="ts">Type</td>
                <td class="ts">Commentaire</td>
                </tr>';
                foreach ($lignes as $c => $v) {
                    echo("<tr>");
                    foreach ($v as $k => $val) {
                        echo("<td>$val</td>");
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
