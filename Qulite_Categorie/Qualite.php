<?php  require ('Head.php');?>
<head>        
    <title>Qualité</title>
</head>
<body>
        <div class="box">
            <form action="" method="post">
                <h1>Les Qualités</h1>
                <table align='center' style="text-align: center;" class="tables">
                    <tr>
                        <td colspan="2" class="ts">Qualité</td>
                        <td colspan="2"><input type="text" name="Qualite" placeholder="Entrer Qualite"/>  </td>
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
                            $query = "select Qualite from Qualite order by Qualite";
                            $res = mysqli_query($con, $query);
                            if (!$res) {
                               // die("error in query");
                            }
                            // Write or display
                            echo "<select>";
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo '<option>' . $row["Qualite"] . '</option>';
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
                    $cat = $_POST['Qualite'];
                    $query = "insert into Qualite (Qualite) values ('" . $cat . "')";
                    $res = mysqli_query($con, $query);
                    if (!$res) {
                        //die("error in query");
                    } else {
                        //echo '<script>alert("Data inserted");</script>';
                    }
                }
                if (isset($_POST['delete'])) {
                    $cat = $_POST['Qualite'];
                    $query = "delete from Qualite where Qualite='" . $cat . "' ";
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