<?php

    include("../../koneksi.php");

    $SMTGa = $_POST["SMTGa"]; //anggap ambil dari database nilai
    $SMTGe = $_POST["SMTGe"]; //anggap ambil dari database nilai
    $absensi = $_POST["absensi"]; //anggap ambil dari database nilai
    $akhlak = $_POST["perilaku"]; //anggap ambil dari database nilai
    

// FUZZYFIKASI

    // Nilai Rata-rata Ujian SMT Ganjil Buruk
    if($SMTGa <= 60){
        $SMTGaBuruk = 1;
    }
    else if($SMTGa >= 60 && $SMTGa <= 70){
        $SMTGaBuruk = (70 - $SMTGa)/(70-60);
    }
    else if($SMTGa >= 70){
        $SMTGaBuruk = 0;
    }

    // Nilai Rata-rata Ujian SMT Ganjil Cukup
    if($SMTGa >= 70 && $SMTGa <=80){
        $SMTGaCukup = 1;
    }
    else if($SMTGa >= 60 && $SMTGa <= 70){
        $SMTGaCukup = ($SMTGa - 60)/(70-60);
    }
    else if($SMTGa >= 80 && $SMTGa <= 90){
        $SMTGaCukup = (90 - $SMTGa)/(90-80);
    }
    else if($SMTGa <= 60 || $SMTGa >= 90){
        $SMTGaCukup = 0;
    }

    //Nilai Rata-rata Ujian SMT Ganjil Baik
    if($SMTGa >= 90){
        $SMTGaBaik = 1;
    }
    else if($SMTGa >= 80 && $SMTGa <= 90){
        $SMTGaBaik = ($SMTGa - 80)/(90-80);
    }
    else if($SMTGa <= 80){
        $SMTGaBaik = 0;
    }

    // Nilai Rata-rata Ujian SMT Genap Buruk
    if($SMTGe <= 60){
        $SMTGeBuruk = 1;
    }
    else if($SMTGe >= 60 && $SMTGe <= 70){
        $SMTGeBuruk = (70 - $SMTGe)/(70-60);
    }
    else if($SMTGe >= 70){
        $SMTGeBuruk = 0;
    }

    // Nilai Rata-rata Ujian SMT Genap Cukup
    if($SMTGe >= 70 && $SMTGe <= 80){
        $SMTGeCukup = 1;
    }
    else if($SMTGe >= 60 && $SMTGe <= 70){
        $SMTGeCukup = ($SMTGe - 60)/(70-60);
    }
    else if($SMTGe >= 80 && $SMTGe <= 90){
        $SMTGeCukup = (90 - $SMTGe)/(90-80);
    }
    else if($SMTGe <= 60 || $SMTGe >= 90){
        $SMTGeCukup = 0;
    }
    
    //Nilai Rata-rata Ujian SMT Genap Terlampaui
    if($SMTGe >= 90){
        $SMTGeBaik = 1;
    }
    else if($SMTGe >= 80 && $SMTGe <= 90){
        $SMTGeBaik = ($SMTGe - 80)/(90-80);
    }
    else if($SMTGe <= 80){
        $SMTGeBaik = 0;
    }

    // Absensi Baik
    if($absensi <= 4){
        $absensiBaik = 1;
    }
    else if($absensi >= 10){
        $absensiBaik = 0;
    }
    else if($absensi >= 4 && $absensi <= 10){
        $absensiBaik = (10 - $absensi)/(10-4);
    }

    //absensi Buruk
    if($absensi >= 10){
        $absensiBuruk = 1;
    }
    else if($absensi >= 4 && $absensi <= 10){
        $absensiBuruk = ($absensi - 4)/(10-4);

    }else if($absensi <= 4){
        $absensiBuruk = 0;
    }

    // Nilai Perilaku Buruk
    if($perilaku <= 50){
        $akhlakBuruk = 1;
    }
    else if($perilaku >= 50 && $perilaku <= 60){
        $perilakuBuruk = (60 - $perilaku)/(60-50);
    }
    else if($akhlak >= 60){
        $perilakuBuruk = 0;
    }

    // Nilai Perilaku Cukup
    if($perilaku >= 60 && $perilaku <= 70){
        $perilakuCukup = 1;
    }
    else if($perilaku >= 50 && $perilaku <= 60){
        $perilakuCukup = ($perilaku - 50)/(60-50);
    }
    else if($perilaku >= 70 && $perilaku <= 80){
        $perilakuCukup = (80 - $perilaku)/(80-70);
    }
    else if($perilaku <= 50 || $perilaku >= 80){
        $perilakuCukup = 0;
    }

    //Nilai Perilaku Baik
    if($perilaku >= 80){
        $perilakuBaik = 1;
    }
    else if($perilaku >= 70 && $perilaku <= 80){
        $perilakuBaik = ($perilaku - 70)/(80-70);
    }
    else if($perilaku <= 70){
        $perilakuBaik = 0;
    }

    //Penyesuaian Hasil Fuzzyfikasi Dengan Rules
        $i=0;
        $sql = mysqli_query($db, "SELECT * FROM rules");
            while($row = mysqli_fetch_array($sql)){
                
                if($row["smtga"] == "Buruk"){
                    $DataGanjil = $SMTGaBuruk;
                }else if($row["smtga"] == "Cukup"){
                    $DataGanjil = $SMTGaCukup;
                }else{
                    $DataGanjil = $SMTGaBaik;
                }

                if($row["smtge"] == "Buruk"){
                    $DataGenap = $SMTGeBuruk;
                }else if($row["smtge"] == "Cukup"){
                    $DataGenap = $SMTGeCukup;
                }else{
                    $DataGenap = $SMTGeBaik;
                }

                if($row["absen"] == "Buruk"){
                    $DataAbsen = $absensiBuruk;
                }else{
                    $DataAbsen = $absensiBaik;
                }

                if($row["perilaku"] == "Buruk"){
                    $DataPerilaku = $perilakuBuruk;
                }else if($row["perilaku"] == "Cukup"){
                    $DataPerilaku = $perilakuCukup;
                }else{
                    $DataPerilaku = $perilakuBaik;
                }

                //Inferensi Fuzzy
                $a[$i] = min($DataGanjil, $DataGenap, $DataAbsen, $DataPerilaku);
                
                if($row["keputusan"] == "Tidak Naik" ){
                    $rumus = 100 - $a[$i] * (100-60);
                }else{
                    $rumus = $a[$i] * (100-60) + 60;
                }
                
                $z[$i] = $rumus;
                $AiZi[$i] = $a[$i]*$z[$i];
            }


?>