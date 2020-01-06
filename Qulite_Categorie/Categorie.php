<?php require ('Head.php'); ?>
<head>        
    <title>Categorie</title>
</head>
<body>
    <div class="box">
        <form action="" method="post">
            <h1>Les Categorie</h1>
            <table align='center' style="text-align: center;" class="tables">
                <tr>
                    <td colspan="2" class="ts">Categorie</td>
                    <td colspan="2"><input type="text" name="Categorie" placeholder="Entrer Categorie"/>  </td>
                </tr>
            </table>
            <p  align='center'>
                <input type="submit" name="submit" value="Ajouter" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="delete" value="Supprimer" /> 
            </p>
            <table align='center' style="text-align: center;" class="tables">
                <tr>
                    <td>
                        <?php
                        $query = "select nom_categorie from categorie order by nom_categorie";
                        $res = mysqli_query($con, $query);
                        if (!$res) {
                            // die("error in query");
                        }
                        // Write or display
                        echo "<select>";
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo '<option>' . $row["nom_categorie"] . '</option>';
                        }
                        echo "</select>";
                        // clear
                        mysqli_free_result($res);
                        ?>
                    </td>
                </tr>
            </table>
            <?php
            // insert from database
            if (isset($_POST['submit'])) {
                $cat = $_POST['Categorie'];
                $query = "insert into categorie (nom_categorie) values ('" . $cat . "')";
                $res = mysqli_query($con, $query);
                if (!$res) {
                    //die("error in query");
                } else {
                    //echo '<script>alert("Data inserted");</script>';
                }
            }
            if (isset($_POST['delete'])) {
                $cat = $_POST['Categorie'];
                $query = "delete from categorie where nom_categorie='" . $cat . "' ";
                $res = mysqli_query($con, $query);
                if (!$res) {
                    //die("error in query");
                } else {
                    //echo '<script>alert("Data inserted");</script>';
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
<?php
//      <script>alert("Data Inserted");</script>    
mysqli_close($con);
?>