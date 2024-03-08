<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

$Personelad = isset($_POST['Personelad']) ? $_POST['Personelad'] : '';
$Personelsoyad = isset($_POST['Personelsoyad']) ? $_POST['Personelsoyad'] : '';

$stmt = $conn->prepare("SELECT s.Personel_No, o.Odenen, o.OdemeKalan, o.ToplamOdeme
                        FROM personelkayit_tablosu s
                        JOIN personelOdemeleri o ON s.Personel_No = o.Personel_No
                        WHERE s.Personel_Ad = ? AND s.Personel_Soyad = ?");

if (!$stmt) {
    die('prepare() hatası: ' . $conn->error);
}

$stmt->bind_param("ss", $Personelad, $Personelsoyad);

$stmt->execute();
$stmt->bind_result($personelNo, $odenen2, $odemeKalan2, $toplamOdeme2);

if ($stmt->fetch()) {
    session_start();
    $_SESSION['Personelad'] = $Personelad;
    $_SESSION['Personelsoyad'] = $Personelsoyad;
    $_SESSION['personelNo'] = $personelNo;
    $_SESSION['odenen2'] = $odenen2;
    $_SESSION['odemeKalan2'] = $odemeKalan2;
    $_SESSION['toplamOdeme2'] = $toplamOdeme2;

    echo "<script>alert('Sorgulama Başarılı'); window.location.href = '../home.php';</script>";
} else {
    echo "<script>alert('Personel Bulunamadı'); window.location.href = '../home.php';</script>";
}

$stmt->close();
$conn->close();


$stmt->close();
$conn->close();
?>