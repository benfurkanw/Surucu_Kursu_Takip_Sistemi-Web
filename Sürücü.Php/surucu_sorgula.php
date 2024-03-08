<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../db_connection.php');

$surucuAd = isset($_POST['sürücüad']) ? $_POST['sürücüad'] : '';
$surucuSoyad = isset($_POST['sürücüsoyad']) ? $_POST['sürücüsoyad'] : '';

$stmt = $conn->prepare("SELECT s.Surucu_No, o.Odenen, o.OdemeKalan, o.ToplamOdeme
                        FROM surucukayit_tablosu s
                        JOIN surucuOdemeleri o ON s.Surucu_No = o.Surucu_No
                        WHERE s.Surucu_Ad = ? AND s.Surucu_Soyad = ?");

if (!$stmt) {
    die('prepare() hatası: ' . $conn->error);
}

$stmt->bind_param("ss", $surucuAd, $surucuSoyad);

$stmt->execute();
$stmt->store_result();
$stmt->bind_result($surucuNo, $odenen, $odemeKalan, $toplamOdeme);

if ($stmt->fetch()) {
    session_start();
    $_SESSION['surucuAd'] = $surucuAd;
    $_SESSION['surucuSoyad'] = $surucuSoyad;
    $_SESSION['surucuNo'] = $surucuNo;
    $_SESSION['odenen'] = $odenen;
    $_SESSION['odemeKalan'] = $odemeKalan;
    $_SESSION['toplamOdeme'] = $toplamOdeme;

    echo "<script>alert('Sorgulama Başarılı'); window.location.href = '../home.php';</script>";
} else {
    echo "<script>alert('Sürücü Bulunamadı'); window.location.href = '../home.php';</script>";
}

$stmt->close();
$conn->close();
?>

