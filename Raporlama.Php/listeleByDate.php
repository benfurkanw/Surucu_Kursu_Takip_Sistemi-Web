<?php
include('../db_connection.php');

$baslangicTarihi = $_GET['baslangicTarihi'];
$bitisTarihi = $_GET['bitisTarihi'];

$sql = "SELECT * FROM surucukayit_tablosu WHERE Surucu_DogumTarihi BETWEEN '$baslangicTarihi' AND '$bitisTarihi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1; // Sayaç başlangıç değeri

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $counter . "</td>"; // Sayaç değeri
        echo "<td>" . $row['Surucu_No'] . "</td>";
        echo "<td>" . $row['Surucu_Tc'] . "</td>";
        echo "<td>" . $row['Surucu_ad'] . "</td>";
        echo "<td>" . $row['Surucu_Soyad'] . "</td>";
        echo "<td>" . $row['Surucu_EhliyetSinifi'] . "</td>";
        echo "<td>" . $row['Surucu_DogumTarihi'] . "</td>";
        // Diğer sütunları ekleyin
        echo "</tr>";

        $counter++; // Sayaç artışı
    }
} else {
    echo "<tr><td colspan='7'>Kayıt bulunamadı.</td></tr>";
}

$conn->close();
?>
