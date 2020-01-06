<?php require ('Head.php'); ?>
<head>        
    <title>Produit Rechercher</title>
</head>
<body>
    <div class="bos">
        <form action="" method="post">
            <h1>Produits</h1>


            <table align='center' style="text-align: center;" class="tables" id="tabless" border="2">

                <?php
                $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
                $st = $con->prepare("select Nomproduit,nom_categorie,qualite,Prixachete,Qte_stock from p_produit where Nomproduit=:m");
                $d = array(
                    ":m" => $_GET["search"]
                );
                $st->execute($d);
                $lignes = $st->fetchAll(PDO::FETCH_ASSOC);
                echo'<tr class="tt">
                <td class="ts">Nom Produit</td>
                <td class="ts">Categorie</td>
                <td class="ts">Qualite</td>
                <td class="ts">Prix Achete</td>
                <td class="ts">Qte_stock</td>
                </tr>';
                if(empty($lignes[0]["Nomproduit"]))
                    echo '<script>alert("Ce Produit n existe pas");</script>';
                else {
                ?>

                <tr><td><?php echo($lignes[0]["Nomproduit"]); ?></td>
                    <td><?php echo($lignes[0]["nom_categorie"]); ?></td>
                    <td><?php echo($lignes[0]["qualite"]); ?></td>
                    <td><?php echo($lignes[0]["Prixachete"]); ?></td>
                    <?php
                    if ($lignes[0]["Qte_stock"] == 2) {
                        echo("<td style='background-color: yellow;'>");
                        echo $lignes[0]["Qte_stock"];
                        echo '</td>';
                    } elseif ($lignes[0]["Qte_stock"] == 1) {
                        echo("<td style='background-color: orange;'>");
                        echo $lignes[0]["Qte_stock"];
                        echo '</td>';                                          
                    } elseif ($lignes[0]["Qte_stock"] == 0) {
                        echo("<td style='background-color: red;'>");
                        echo $lignes[0]["Qte_stock"];
                        echo '</td>';                                            
                    } else {
                        echo("<td>");
                        echo $lignes[0]["Qte_stock"];
                echo '</td>';                     }}
                    ?>
                </tr>
            </table>
    </div>
</form>

</body>
</html>