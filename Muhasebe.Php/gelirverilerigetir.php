<?php
include('../db_connection.php'); // db_connection.php dosyasını projenize uygun olarak güncelleyin

// Veritabanından verileri çek
$sql = "SELECT * FROM gelirkayit_tablosu";
$result = $conn->query($sql);

// Tablo içeriğini oluştur
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Gelir_Tarih'] . "</td>";
        echo "<td>" . $row['Gelir_Ad'] . "</td>";
        echo "<td>" . $row['Gelir_Miktar'] . "</td>";
        echo "<td>" . $row['Gelir_Aciklama'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Tabloda veri bulunamadı</td></tr>";
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
