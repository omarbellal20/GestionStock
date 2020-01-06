<?php require ('Head.php'); ?>
<head>        
    <title>Decodage & Flash</title>
</head>
<div class="box">
    <form action="" method="post">
        <h1>Flash Decodage</h1>
        <table align='center' style="text-align: center;" class="tables">
            <tr>
                <td colspan="2" class="ts">Nom Portable</td>             
                <td colspan="2"><input type="text" name="nonphone" placeholder="nom_phone"/>  </td>
            </tr>
            <tr>
                <td colspan="2" class="ts">Type</td>
                        <td colspan="2"><select name="type">
                                <option>Flash</option>
                                <option>Décodage</option>
                                <option>Root</option>
                                <option>Autres</option>
                    </select>  
                        </td>
            </tr>
            <tr>
                <td colspan="2" class="ts">Prix</td>
                <td colspan="2"><input type="text" name="prix" placeholder="Entrer Prix"/>  </td>
            </tr>
        </table>
        <p  align='center'>
            <input type="submit" name="submit" value="Ajouter" width="150px"/> 
            <input type="submit" name="Afficher" value="Afficher"/> 
        </p> 
        <?php
        // insert from database
        if (isset($_POST['Afficher'])) {
 	header("location:aff_dec.php");           
        }
        
        if (isset($_POST['submit'])) {
            $np = $_POST['nonphone'];
            $qte = $_POST['type'];
            $pp = $_POST['prix'];
            $query = "insert into decodage_flash (NomPhone,Type,Prix,date_fd) values ('" . $np . "','" . $qte . "','" . $pp . "',curdate())";
            $res = mysqli_query($con, $query);
            if (!$res) {
                //die("error in query");
            } else {
                //echo '<script>alert("Data inserted");</script>';
            }
        }
        /*    if (isset($_POST['submit'])) {
          $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
          $st = $con->prepare("select Qte_stock where Nomproduit=:n");
          $d = array(
          ":n" => $_POST["Nomproduit"]
          );
          $st->execute($d);
          $lignes = $st->fetchAll(PDO::FETCH_ASSOC);
          foreach ($lignes as $c => $v) {
          foreach ($v as $k => $val) {
          echo("$val");
          }
          }
          } */
        ?>
    </form>

</div>
</body>
</html>
