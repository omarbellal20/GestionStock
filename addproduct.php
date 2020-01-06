<?php require ('Head.php'); ?>
<head>        
    <title>Ajouter Produit</title>
</head>
<div class="boxx">
    <form action="" method="post">
        <h1> Ajouter Produit </h1>
        <table align='center' style="text-align: center;" class="tables">
            <tr>
                <td colspan="2" class="ts">Nom Produit</td>
                <td colspan="2"><input type="text" name="Nomproduit" placeholder="Entrer Nom Produit" required/>  </td>
            </tr>
            <tr>
                <td colspan="2" class="ts" align="left">Categorie</td>
                <td colspan="2" align="center">    
                    <?php
                    // read from database
                    $query = "select nom_categorie from categorie";
                    $res = mysqli_query($con, $query);
                    if (!$res) {
                        //die("error");
                    }
                    // Write or display
                    echo "<select name='Categorie'>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '<option>' . $row["nom_categorie"] . '</option>';
                    }
                    echo "</select>";
                    // clear
                    mysqli_free_result($res);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="ts" align="left">Qualité</td>
                <td colspan="2" align="center">    
                    <?php
                    // read from database
                    $query = "select qualite from qualite";
                    $res = mysqli_query($con, $query);
                    if (!$res) {
                        //die("error");
                    }
                    // Write or display
                    echo "<select name='qualite'>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '<option>' . $row["qualite"] . '</option>';
                    }
                    echo "</select>";
                    // clear
                    mysqli_free_result($res);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="ts">Prix Achete</td>
                <td colspan="2"><input type="text" name="prix_achete" placeholder="Entrer Code Produit"/>  </td>
            </tr> 
            <tr>
                <td colspan="2" class="ts">Quantité</td>
                <td colspan="2"><input type="text" name="qte" placeholder="Entrer Quantité"/>  </td>
            </tr>
        </table>
        <p  align='center'>
            <input type="submit" name="submit" value="Ajouter" width="150px"/> 
            <input type="submit" name="delete" value="Supprimer"/> 
            <input type="submit" name="modifier" value="Modifier"/> 
        </p> 
        <?php
        // insert from database
        if (isset($_POST['submit'])) {
        if(!empty($_POST['prix_achete'])&&!empty($_POST['qte'])){
            $np = $_POST['Nomproduit'];
            $cat = $_POST['Categorie'];
            $pa = $_POST['prix_achete'];
            $q = $_POST['qualite'];
            $qte = $_POST['qte'];
            $query = "insert into p_produit (Nomproduit,Prixachete,nom_categorie,qualite,qte_stock) values ('" . $np . "','" . $pa . "','" . $cat . "','" . $q . "'," . $qte . ")";
            $res = mysqli_query($con, $query);
            if (!$res) {
               // die("error in query");
            } else {
                echo '<script>alert("Produit Ajouter");</script>';
            }
        }else{
           echo '<script>alert("Remplir tout les champs");</script>'; 
        }}
        if (isset($_POST['modifier'])) {
        if(!empty($_POST['prix_achete'])&&!empty($_POST['qte'])){
            $np = $_POST['Nomproduit'];
            $cat = $_POST['Categorie'];
            $pa = $_POST['prix_achete'];
            $q = $_POST['qualite'];
            $qte = $_POST['qte'];
            $query = "update p_produit set Prixachete ='" . $pa . "',nom_categorie='" . $cat . "',qualite='" . $q . "',qte_stock=" . $qte . " where Nomproduit='" . $np . "'";
            $res = mysqli_query($con, $query);
            if (!$res) {
                //die("error in query");
            } else {
                echo '<script>alert("Produit Modifier");</script>';
            }
        }else{
           echo '<script>alert("Remplir tout les champs");</script>'; 
        }
        }
        
        if (isset($_POST['delete'])) {
            $np = $_POST['Nomproduit'];
            $query = "delete from p_produit where Nomproduit='" . $np . "'";
            $res = mysqli_query($con, $query);
            if (!$res) {
                //die("error in query");
            } else {
                echo '<script>alert("Produit Supprimer");</script>';
            }
        }
        
        ?>
    </form>
    <form action="Afficherproduit.php" method="post">
        <p  align='center'>
            <input type="submit" name="Afficher" value="Afficher"/>      
        </p>
    </form>
</div>
</body>
</html>
