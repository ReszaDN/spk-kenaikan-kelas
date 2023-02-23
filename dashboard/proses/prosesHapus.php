<?php
        include ("../../koneksi.php");
        if(isset($_POST["hapus"])){
            $id=$_POST["id"];
            
            $sql = "DELETE FROM rules WHERE id_rules = '$id'";
            $result = mysqli_query($db,$sql);
        }

        
        header("Location: ../rules.php");
?>