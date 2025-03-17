<?php 
// database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "kafe_otomasyon";

$connection = new mysqli($servername, $username, $password, $database);

// database connection controls
if ($connection->connect_error) {
    die("Veritabanına bağlanamadı: "+ $connection->connect_error);
}

// data extraction

$sql = "SELECT * FROM `urunlistesi`";
$result = $connection->query($sql);

// if there is a results
if ($result->num_rows > 0) {
    echo '<ul id = "urunListesi" class="list-group">';
    while ($row = $result-> fetch_assoc()) {
        echo '<li class="list-group-item">';
        echo '<span class="urunAdi" style="float: left;">' . $row["urunAdi"] . '</span>'; // Ürün adı sola hizalanır
        echo '<span class="urunFiyati" style="float: right;">' . $row["urunFiyati"] . '</span>'; // Ürün fiyatı sağa hizalanır
        //echo '<div style="clear: both;"></div>'; // Float özelliklerinin sonlandırılması için clear div eklenir
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo "Hiçbir sonuç bulunmadı";
}

// database connection close
$connection->close();
?>