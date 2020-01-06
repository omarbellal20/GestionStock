<?php require ('Head.php'); ?>
<head>        
    <title>Afficher Decodage</title>
</head>
<body>
<div class="bos">
    <form action="" method="post">
        <div class="boxxx"><table align='center' style="text-align: center;" class="tables">
                <tr>
                    <td>Date</td>
                    <td><input type="date" name="Date1" placeholder="Entrer la date premiere"/>  </td>
                    <td><input type="date" name="Date2" value="Entrer la deusieme date"/></td>
                    <td><input type="submit" name="rechercher" value="Rechercher"/></td>
                </tr>
            </table>
        </div>

        <table align='center' style="text-align: center;" class="tables" id="tabless" border="2">
            <?php
            $totv=0;
            if (!isset($_POST["rechercher"])) {
                $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
                $st = $con->prepare("select date_fd,NomPhone,Type,Prix  from decodage_flash order by date_fd,NomPhone");
                $st->execute();
                $lignes = $st->fetchAll(PDO::FETCH_ASSOC);              
                echo'<tr class="tt">
                <td class="ts">Date</td>
                <td class="ts">Nom Telephone</td>
                <td class="ts">Type</td>
                <td class="ts">Prix</td>
                </tr>';
                foreach ($lignes as $c => $v) {
                    echo("<tr>");
                    foreach ($v as $k => $val) {
                        if($val==$v["Prix"]){
                           $totv=$totv+$val;
                        echo("<td>$val Dh</td>");
                        }else
                        echo("<td>$val</td>");                            
                        }
                    echo("</tr>");
                }
                echo '<tr>';
                echo '<td colspan="3">Totale </td><td>'.$totv.' Dh </td>';
            }
            if (isset($_POST["rechercher_cat"])) {
                $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
                $st = $con->prepare("select h.date_vendu,p.Nomproduit,p.nom_categorie,p.qualite,h.qte_vendu,p.Prixachete,h.prix_vente,h.qte_vendu*h.prix_vente,h.qte_vendu*h.prix_vente-h.qte_vendu*p.Prixachete "
                        . "from p_produit p,history h "
                        . "where p.Nomproduit=h.Nomproduit and h.date_vendu btween(:d1,:d2) order by date_vendu,Nomproduit");
                $d = array(
                    ":d1" => $_POST["Date1"],
                    ":d2" => $_POST["Date2"]
                );
                $st->execute($d);    
                $lignes = $st->fetchAll(PDO::FETCH_ASSOC);
                echo'<tr class="tt">
                <td class="ts">Date Vente</td>
                <td class="ts">Nom Produit</td>
                <td class="ts">Categorie</td>
                <td class="ts">Qualite</td>
                <td class="ts">Qte Vendu</td>
                <td class="ts">Prix Achete</td>
                <td class="ts">Prix de Vente</td>
                <td class="ts">Total</td>
                <td class="ts">Bénifice</td>
                </tr>';
                foreach ($lignes as $c => $v) {
                    echo("<tr>");
                    foreach ($v as $k => $val) {
                        echo("<td>$val</td>");
                    }
                    echo("</tr>");
                }
            }
            if (isset($_POST["rechercher_nom"])) {
                $con = new PDO("mysql:host=localhost;dbname=admins", "root", "12345");
                $st = $con->prepare("select Nomproduit,nom_categorie,qualite,Prixachete,Qte_stock where Nomproduit=:n");
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
                <td class="ts">Qte_stock</td>
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