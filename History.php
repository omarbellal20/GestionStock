<?php require ('Head.php'); ?>
<head>        
    <title>Produit Vendu</title>
</head>
<div class="box">
    <form action="" method="post">
        <h1>Produit Vendu</h1>
        <table align='center' style="text-align: center;" class="tables">
            <tr>
                <td colspan="2" class="ts">Nom Produit</td>             
                <td colspan="2" align="center">
                    <?php
                    // read from database
                    $query = "select nomproduit from p_produit";
                    $res = mysqli_query($con, $query);
                    if (!$res) {
                        //die("error");
                    }
                    // Write or display
                    echo "<select name='Nomproduit'>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '<option>' . $row["nomproduit"] . '</option>';
                    }
                    echo "</select>";
                    // clear
                    mysqli_free_result($res);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="ts">Quantité Vendu</td>
                <td colspan="2"><input type="text" name="qte" placeholder="Entrer Quantité"/>  </td>
            </tr>
            <tr>
                <td colspan="2" class="ts">Prix de vente</td>
                <td colspan="2"><input type="text" name="prix" placeholder="Entrer Prix"/>  </td>
            </tr>
        </table>
        <p  align='center'>
            <input type="submit" name="submit" value="Ajouter" width="150px"/> 
            <input type="submit" name="Afficher" value="Afficher"/> 
        </p> 
        <?php

        if (isset($_POST['Afficher'])) {
            header("location:aff_history.php");
        }

        if (isset($_POST['submit'])) {
            $np = $_POST['Nomproduit'];
            $qte = $_POST['qte'];
            $pp = $_POST['prix'];
            $query = "select Qte_stock,Prixachete from p_produit where Nomproduit='" . $np . "'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);
            if ($row['Qte_stock']-$qte<0){
                echo '<script>alert("Le Produit ne reste pas au stock\nou Quantité vendu plus grand que quantité de stock");</script>';
            }
            else{
            $query = "insert into history (Nomproduit,qte_vendu,date_vendu,Prix_vente) values ('" . $np . "','" . $qte . "',curdate(),'" . $pp . "')";
            $res = mysqli_query($con, $query);
            if (!$res) {
                //die("error in query");
            } else {
                echo '<script>alert("Data inserted");</script>';
            }
            if ($row['Prixachete']<=$pp){
                echo '<script>alert("Attention : Le Prix de vente est inférieure ou égale prix d achat");</script>';
            }
            $query = "update p_produit set Qte_stock=" . $row['Qte_stock'] . "-" . $qte . " where Nomproduit='" . $np . "'";
            $result = mysqli_query($con, $query);
            if (!$result) {
                //die("error in query 2");
            } else {
                //echo '<script>alert("Data Updated");</script>';
            }                
            }
        }
        ?>
    </form>

</div>
</body>
</html>
