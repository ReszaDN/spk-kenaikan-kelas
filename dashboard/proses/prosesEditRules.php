<?php
    include ("../../koneksi.php");
    
    $idR = $_GET["id"];
    $smtga = $_POST["smtga"];
    $smtge = $_POST["smtge"];
    $absen = $_POST["absen"];
    $perilaku = $_POST["perilaku"];
    $keputusan = $_POST["keputusan"];


    $sql = "UPDATE rules SET smtga = '$smtga', smtge = '$smtge', absen = '$absen', perilaku = '$perilaku', keputusan = '$keputusan' WHERE id_rules = '$idR'";
    $data = mysqli_query($db,$sql);

    header("Location: ../rules.php");
?>