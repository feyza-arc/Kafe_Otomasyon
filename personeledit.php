<?php 
include("deneme.php");

// Personel bilgilerini almak için id parametresini kontrol et
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Veritabanından ilgili personelin bilgilerini al
    $query = $vt->prepare("SELECT * FROM personelListesi WHERE id = ?");
    $query->execute([$id]);

    $personel = $query->fetch(PDO::FETCH_OBJ);

    // Eğer personel bulunamazsa hata mesajı göster
    if (!$personel) {
        echo "Personel bulunamadı.";
        die();
    }
} else {
    // Eğer id parametresi belirtilmemişse hata mesajı göster
    echo "Personel id belirtilmedi.";
    die();
}

// Eğer form gönderildiyse, güncelleme işlemini yap
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form verilerini al
    $kullaniciAdi = $_POST['kullaniciAdi'];
    $sifre = $_POST['sifre'];

    // Veritabanında güncelleme işlemini yap
    $updateQuery = $vt->prepare("UPDATE personelListesi SET kullaniciAdi = :kullaniciAdi, sifre = :sifre WHERE id = :id");
    $updateQuery->execute(['kullaniciAdi' => $kullaniciAdi, 'sifre' => $sifre, 'id' => $id]);

    // Başarılı bir şekilde güncellendiğini kullanıcıya bildir
    echo "Personel bilgileri güncellendi.";
}

?>





<!doctype html>
<html lang="tr">
  <head>
    <title>Personel Düzenle</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="personeledit.css">

</head>
  <body>


<!-- Personel bilgilerini düzenlemek için form -->
<form method="POST" style="padding: 20px; border: 4px solid #ccc; border-radius: 5px;   bg-color:blue; ">
    <div class="form-group">
    <label for="kullaniciAdi" style="color: white; font-weight: bold;">Kullanıcı Adı:</label>

        <input type="text" id="kullaniciAdi" name="kullaniciAdi" class="form-control" value="<?= $personel->kullaniciAdi ?>">
    </div>
    <div class="form-group">
    <label for="sifre" style="color: white; font-weight: bold;">Şifre:</label>

        <input type="password" id="sifre" name="sifre" class="form-control" value="<?= $personel->sifre ?>">
    </div>
    <button type="submit" class="btn btn-primary">Güncelle</button>
</form>














      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>