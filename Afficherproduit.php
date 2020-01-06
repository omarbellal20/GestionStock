<?php require ('Head.php'); ?>
<head>        
    <title>Afficher Produit</title>
</head>
<body>
    <div class="bos">
        <form action="" method="post">
            <h1> Afficher les Produits </h1>
            <div class="boxxx"><table align='center' style="text-align: center;" class="tables">
                    <tr>
                        <td>Nom</td>
                        <td><input type="text" name="Nomproduit" placeholder="Entrer Nom Produit"/>  </td>
                        <td><input type="submit" name="rechercher_nom" value="Rechercher"/></td>
                    </tr><tr>
                        <td class="ts" align="left">Categorie</td>
                        <td align="center">
                            <?php
                            // read from database
                            $query = "select nom_categorie from categorie";
                            $res = mysqli_query($con, $query);
                            if (!$res) {
                               // die("error");
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
                        <td><input type="submit" name="rechercher_cat" value="Rechercher"/></td>
                    </tr>
                </table>
            </div>

            <table align='center' style="text-align: center;" class="tables" id="tabless" border="2">

                <?php
                if (!isset($_POST["rechercher_cat"]) && !isset($_POST["rechercher_nom"])) {
                    $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
                    $st = $con->prepare("select Nomproduit,nom_categorie,qualite,Prixachete,Qte_stock from p_produit");
                    $st->execute();
                    $lignes = $st->fetchAll(PDO::FETCH_ASSOC);
                    echo'<tr class="tt">
                <td class="ts">Nom Produit</td>
                <td class="ts">Categorie</td>
                <td class="ts">Qualite</td>
                <td class="ts">Prix Achete</td>
                <td class="ts">Qte_stock</td>
                </tr>';

                    foreach ($lignes as $c => $v) {
                        echo("<tr>");
                        foreach ($v as $k => $val) {
                            if ($v["Qte_stock"] == 2) {
                                echo("<td style='background-color: yellow;'>$val</td>");
                            } elseif ($v["Qte_stock"] == 1) {
                                echo("<td style='background-color: orange;'>$val</td>");
                            } elseif ($v["Qte_stock"] == 0) {
                                echo("<td style='background-color: red;'>$val</td>");
                            } else {
                                echo("<td>$val</td>");
                            }
                        }
                        echo("</tr>");
                    }
                }
                if (isset($_POST["rechercher_cat"])) {
                    $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
                    $st = $con->prepare("select Nomproduit,nom_categorie,qualite,Prixachete,Qte_stock from p_produit where nom_categorie=:c");
                    $d = array(
                        ":c" => $_POST["Categorie"]
                    );
                    $st->execute($d);
                    $lignes = $st->fetchAll(PDO::FETCH_ASSOC);
                    echo'<tr class="tt">
                <td class="ts">Nom Produit</td>
                <td class="ts">Categorie</td>
                <td class="ts">Qualite</td>
                <td class="ts">Prix Achete</td>
                <td class="ts">Quantité de Stock</td>
                </tr>';
                    foreach ($lignes as $c => $v) {
                        echo("<tr>");
                        foreach ($v as $k => $val) {
                            if ($v["Qte_stock"] == 2) {
                                echo("<td style='background-color: yellow;'>$val</td>");
                            } elseif ($v["Qte_stock"] == 1) {
                                echo("<td style='background-color: orange;'>$val</td>");
                            } elseif ($v["Qte_stock"] == 0) {
                                echo("<td style='background-color: red;'>$val</td>");
                            } else {
                                echo("<td>$val</td>");
                            }
                        }
                        echo("</tr>");
                    }
                }
                if (isset($_POST["rechercher_nom"])) {
                    $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
                    $st = $con->prepare("select Nomproduit,nom_categorie,qualite,Prixachete,Qte_stock from p_produit where Nomproduit=:n");
                    $d = array(
                        ":n" => $_POST["Nomproduit"]
                    );
                    $st->execute($d);
                    $lignes = $st->fetchAll(PDO::FETCH_ASSOC);
                    echo'<tr class="tt">
                <td class="ts">Nom Produit</td>
                <td class="ts">Categorie</td>
                <td class="ts">Qualite</td>
                <td class="ts">Prix Achete</td>
                <td class="ts">Quantité de Stock</td>
                </tr>';
                    foreach ($lignes as $c => $v) {
                        echo("<tr>");
                        foreach ($v as $k => $val) {
                            if ($v["Qte_stock"] == 2) {
                                echo("<td style='background-color: yellow;'>$val</td>");
                            } elseif ($v["Qte_stock"] == 1) {
                                echo("<td style='background-color: orange;'>$val</td>");
                            } elseif ($v["Qte_stock"] == 0) {
                                echo("<td style='background-color: red;'>$val</td>");
                            } else {
                                echo("<td>$val</td>");
                            }
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