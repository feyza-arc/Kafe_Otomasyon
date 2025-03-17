<?php
// database connection
try {
    $db = new PDO('mysql:host=localhost;dbname=kafe_otomasyon', 'root','');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Formdan gelen verileri kontrol et
        if(isset($_POST['odeme'], $_POST['toplamFiyat'])) {
            $odemeYontemi = $_POST['odeme'];
            $toplamFiyat = $_POST['toplamFiyat'];
            $tarih = date('Y-m-d H:i:s');

            // database record
            $stmt = $db->prepare("INSERT INTO odemeler (odeme_yontemi, toplam_fiyat, tarih) VALUES (?, ?, ?)");
            $stmt->execute([$odemeYontemi, $toplamFiyat, $tarih]);
            
            echo '<script>alert("Ödeme başarıyla kaydedildi!");</script>';
            header('Location: anasayfa.php');
exit();

        } else {
            echo '<script>("Ödeme bilgileri eksik!")</script>';
            header('Location: anasayfa.php');
exit();

        }
    }
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>
