<?php
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

// Veritabanından verileri çek
$sql = "SELECT * FROM personelkayit_tablosu";
$result = $conn->query($sql);

// Tablo içeriğini oluştur
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Personel_No'] . "</td>";
        echo "<td>" . $row['Personel_Gtarihi'] . "</td>";
        echo "<td>" . $row['Personel_Ad'] . "</td>";
        echo "<td>" . $row['Personel_Soyad'] . "</td>";
        echo "<td>" . $row['Personel_Gorevi'] . "</td>";
        echo "<td>" . $row['Personel_Maasi'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tabloda veri bulunamadı</td></tr>";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
