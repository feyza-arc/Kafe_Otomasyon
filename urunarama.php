<?php

$searchTerm = isset($_POST['searchTerm']) ? $_POST['$searchTerm'] : '';

// veritabanından ürün adı ve fiyatını alma işlemi
$stmt = $db->prepare("SELECT urunAdi, urunFiyati FROM urunlistesi");
$stmt->execute();
$urunler = $stmt->fetchAll(PDO::FETCH_ASSOC);

// arama sonuçlarını tutacak dinamik liste
$searchResults = [];

foreach ($urunler as $urun) {
    
    if (stripos($urun['urun_adi'], $searchTerm) !== false) {
        $searchResults[] = $urun;
    }
}

echo json_encode($searchResults);
?>