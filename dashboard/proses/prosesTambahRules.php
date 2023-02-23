<?php

    include ("../../koneksi.php");

    
        $nama = $_POST["nama"];
        $smtga =  $_POST["smtga"];
        $smtge = $_POST["smtge"];
        $absen = $_POST["absen"];
        $perilaku = $_POST["perilaku"];
        $keptusan = $_POST["keputusan"];
   

    $input = "INSERT INTO rules VALUE ('','$nama', '$smtga', '$smtge', '$absen', '$perilaku', '$keptusan')";
    $result = mysqli_query($db, $input);

    header("Location: ../rules.php");
?>