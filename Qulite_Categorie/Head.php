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
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">    
        <link rel="stylesheet" type="text/css" href="../css/style_1.css">    
        <style>
            b{
                color: red;
            }
            table{
                text-align: center;
            }

        </style>
    </head>
    <body class="bos">
                <ul id="menu-deroulant">
                    <li>
                        <a href="Home.php">Home</a>
                    </li>

                    <li>
                        <a href="#">Stock</a>
                        <ul>
                            <li><a href="../addproduct.php">Ajouter Produit</a></li><br>
                            <li><a href="../Afficherproduit.php">Afficher Stock</a></li><br>
                            <li><a href="../Qulite_Categorie/Categorie.php">Ajouter Catégorie</a></li><br>
                            <li><a href="../Qulite_Categorie/Qualite.php">Ajouter Qualité</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Vendre</a>
                        <ul>
                            <li><a href="../History.php">Produit</a></li><br>
                            <li><a href="../decflash.php">Flash & Décodage</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Afficher</a>
                        <ul>
                            <li><a href="../aff_history.php">Historique Produit</a></li><br>
                            <li><a href="../aff_dec.php">Historique Flash & Décodage</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Users</a>
                        <ul>
                            <li><a href="../signup.php">Add User</a></li><br>
                            <li><a href="../aff_user.php">Afficher User</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Autres</a>
                        <ul>
                            <li><a href="../call_phone.php">Thelephone</a></li>
                        </ul>
                    </li>
                </ul>
        <div class="menu">
            <form class="for">
                <button class="btn" ><a href="Home.php">Sign Out</a></button>

            </form>
            <form action="search.php" method="get">
                <input type="text" name="search" placeholder="search" />
                <button class="button">Search</button>
            </form>
        </div>