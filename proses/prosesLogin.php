<?php

    include("../koneksi.php");
    session_start();
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
    }

    $sql = mysqli_query($db,"SELECT * FROM admin WHERE username = '$username' AND password ='$password'");

    if(mysqli_num_rows($sql) === 1){
        $row = mysqli_fetch_array($sql);
        $_SESSION["id"] = $row["id_admin"];
        header("Location: ../dashboard");
    }else{
        header("Location: ../index.php");
    }



?>