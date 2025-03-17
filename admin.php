<?php
// Veritabanı bağlantısı
try {
    $db = new PDO('mysql:host=localhost;dbname=kafe_otomasyon', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Veritabanı bağlantısı başarılı.";
} catch(PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}



// Ürün ekleme işlemi
if(isset($_POST["buton"])) {
    $urunAdi = $_POST["urunAdi"];
    $urunFiyati = $_POST["urunFiyati"];
    
    try {
        $sql = "INSERT INTO urunListesi (urunAdi, urunFiyati) VALUES (:urunAdi, :urunFiyati)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':urunAdi', $urunAdi);
        $stmt->bindParam(':urunFiyati', $urunFiyati);
        $stmt->execute();
        echo "Ürün başarıyla eklendi.";
    } catch(PDOException $e) {
        echo "Hata oluştu, ürün eklenemedi: " . $e->getMessage();
    }
}

// Personel ekleme işlemi
if(isset($_POST["buton1"])) {
  $kullaniciAdi = $_POST["kullaniciAdi"];
  $sifre = $_POST["sifre"];
  
  try {
      // SQL sorgusu oluşturma ve çalıştırma
      $sql = "INSERT INTO personelListesi (kullaniciAdi, sifre) VALUES (:kullaniciAdi, :sifre)";
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':kullaniciAdi', $kullaniciAdi);
      $stmt->bindParam(':sifre', $sifre);
      $stmt->execute();
      
      // Başarı mesajı gösterme
      echo "Personel başarıyla eklendi.";
  } catch(PDOException $e) {
      // Hata mesajı gösterme
      echo "Hata oluştu, personel eklenemedi: " . $e->getMessage();

      
  }
}


?>



<!doctype html>
<html lang="en">
  <head>
    <title>Admin Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
  </head>


  <body>

  <header>
    
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
  <div class="position-sticky">
    <div class="list-group list-group-flush mx-3 mt-5">
      
    <a href="#" class="list-group-item list-group-item-action py-2 ripple" onclick="openModal('kategoriModal')">
      <i class="fas fa-users fa-fw me-3"></i><span>ÜRÜN EKLE</span>
    </a>
    
    <a href="#" class="list-group-item list-group-item-action py-2 ripple" onclick="openCenteredWindo()">
      <i class="fas fa-users fa-fw me-3"></i><span>ÜRÜN LİSTESİ</span>
    </a>

<script>
    function openCenteredWindo() {
        // Ekranın genişliği ve yüksekliği alınır
        var screenWidth = window.screen.width;
        var screenHeight = window.screen.height;

        // Pencerenin genişliği ve yüksekliği belirlenir
        var width = 600;
        var height = 600;

        // Pencere için x ve y konumları hesaplanır
        var left = (screenWidth - width) / 2;
        var top = (screenHeight - height) / 2;

        // Yeni pencereyi aç
        var attributes = "width=" + width + ",height=" + height + ",left=" + left + ",top=" + top;
        window.open("windowurun.php", "_blank", attributes);
    }
</script>

  <a href="#" class="list-group-item list-group-item-action py-2 ripple" onclick="openModal('personelModal')">
    <i class="fas fa-users fa-fw me-3"></i><span>PERSONEL</span>
  </a>
      
  <a href="#" class="list-group-item list-group-item-action py-2 ripple" onclick="openCenteredWindow()">
    <i class="fas fa-users fa-fw me-3"></i><span>PERSONEL LİSTESİ</span>
  </a>

<script>
    function openCenteredWindow() {
        // Ekranın genişliği ve yüksekliği alınır
        var screenWidth = window.screen.width;
        var screenHeight = window.screen.height;

        // Pencerenin genişliği ve yüksekliği belirlenir
        var width = 600;
        var height = 600;

        // Pencere için x ve y konumları hesaplanır
        var left = (screenWidth - width) / 2;
        var top = (screenHeight - height) / 2;

        // Yeni pencereyi aç
        var attributes = "width=" + width + ",height=" + height + ",left=" + left + ",top=" + top;
        window.open("windowperso.php", "_blank", attributes);
    }
</script>


<a href="#" class="list-group-item list-group-item-action py-2 ripple" onclick="openCenteredWin()">
    <i class="fas fa-users fa-fw me-3"></i><span>SATIŞLAR</span>
  </a>

<script>
    function openCenteredWin() {
        // Ekranın genişliği ve yüksekliği alınır
        var screenWidth = window.screen.width;
        var screenHeight = window.screen.height;

        // Pencerenin genişliği ve yüksekliği belirlenir
        var width = 800;
        var height = 700;

        // Pencere için x ve y konumları hesaplanır
        var left = (screenWidth - width) / 2;
        var top = (screenHeight - height) / 2;

        // Yeni pencereyi aç
        var attributes = "width=" + width + ",height=" + height + ",left=" + left + ",top=" + top;
        window.open("windowsatis.php", "_blank", attributes);
    }
</script>

<a href="#" class="list-group-item list-group-item-action py-2 ripple" onclick="openCenteredWi()">
    <i class="fas fa-users fa-fw me-3"></i><span>SATIŞ ANALİZİ</span>
  </a>

<script>
    function openCenteredWi() {
        // Ekranın genişliği ve yüksekliği alınır
        var screenWidth = window.screen.width;
        var screenHeight = window.screen.height;

        // Pencerenin genişliği ve yüksekliği belirlenir
        var width = 800;
        var height = 700;

        // Pencere için x ve y konumları hesaplanır
        var left = (screenWidth - width) / 2;
        var top = (screenHeight - height) / 2;

        // Yeni pencereyi aç
        var attributes = "width=" + width + ",height=" + height + ",left=" + left + ",top=" + top;
        window.open("windowanaliz.php", "_blank", attributes);
    }
</script>




      
    </div>
  </div>
</nav>

<!-- Modal Kategoriler -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kategoriModalLabel">Kategoriler</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Kategori içeriği buraya gelecek -->
        <button class="btn btn-primary" onclick="openModal('urunEkleModal')">Ürün Ekle</button>
        <ul id="urunlistesi" class="list-group mt-3">
          <!-- Eklenen ürünler burada listelenecek -->
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- Modal Ürün Ekle -->
<div class="modal fade" id="urunEkleModal" tabindex="-1" aria-labelledby="urunEkleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="urunEkleModalLabel">Ürün Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="modal-body" method="post">
    <div class="form-group">
        <label for="urunAdi">Ürün Adı</label>
        <input type="text" class="form-control" id="urunAdi" name="urunAdi">
    </div>
    <div class="form-group">
        <label for="urunFiyati">Ürün Fiyatı</label>
        <input type="number" class="form-control" id="urunFiyati" name="urunFiyati">
    </div>
    <button type="submit" class="btn btn-primary" name="buton">Kaydet</button>
</form>

    </div>
  </div>
</div>

<script>
  // Ürünlerin tutulacağı dizi
  var urunler = [];

  // Modal açma fonksiyonu
  function openModal(modalId) {
    $('#' + modalId).modal('show');
  }

  // Ürün ekleme fonksiyonu
  function ekleUrun() {
    var urunAdi = $('#urunAdi').val();
    var urunFiyati = $('#urunFiyati').val();
    var urun = { adi: urunAdi, fiyat: urunFiyati };
    urunler.push(urun);
    // Listeyi güncelle
    updateUrunlistesi();
    // Formu temizle
    $('#urunAdi').val('');
    $('#urunFiyati').val('');
    // Modalı kapat
    $('#urunEkleModal').modal('hide');
  }

  // Ürün listesini güncelleme fonksiyonu
  function updateUrunlistesi() {
    var html = '';
    urunler.forEach(function(urun, index) {
      html += '<li class="list-group-item d-flex justify-content-between align-items-center">' + urun.adi + ' - ' + urun.fiyat + ' TL <button class="btn btn-danger" onclick="silUrun(' + index + ')">Sil</button></li>';
    });
    $('#urunlistesi').html(html);
  }

  // Ürün silme fonksiyonu
  function silUrun(index) {
    urunler.splice(index, 1);
    // Listeyi güncelle
    updateUrunlistesi();
  }
</script>


<!-- Modal Personel -->
<div class="modal fade" id="personelModal" tabindex="-1" aria-labelledby="personelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personelModalLabel">Personel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <button class="btn btn-primary" onclick="openPersonelModal()">Personel Ekle</button>
        <ul id="personelListesi" class="list-group mt-3">
          <!-- Eklenen personeller burada listelenecek -->
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Personel Ekle Modal -->
<div class="modal fade" id="personelEkleModal" tabindex="-1" aria-labelledby="personelEkleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personelEkleModalLabel">Personel Ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="kullaniciAdi">Kullanıcı Adı</label>
            <input type="text" class="form-control" id="kullaniciAdi" name="kullaniciAdi">
          </div>
          <div class="form-group">
            <label for="sifre">Şifre</label>
            <input type="password" class="form-control" id="sifre"  name="sifre">
          </div>
          <button type="submit" class="btn btn-primary" onclick="eklePersonel()" name="buton1">Kaydet</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  // Personel listesini güncelleme fonksiyonu
  function updatePersonelListesi() {
    var html = '';
    personeller.forEach(function(personel, index) {
      html += '<li class="list-group-item d-flex justify-content-between align-items-center">' 
      + personel.kullaniciAdi + '<button class="btn btn-danger" onclick="silPersonel(' + index + ')">Sil</button></li>';
    });
    $('#personelListesi').html(html);
  }

  // Personel ekleme fonksiyonu
  function eklePersonel() {
    var kullaniciAdi = $('#kullaniciAdi').val();
    var sifre = $('#sifre').val();
    var personel = { kullaniciAdi: kullaniciAdi, sifre: sifre };
    personeller.push(personel);
    // Listeyi güncelle
    updatePersonelListesi();
    // Formu temizle
    $('#kullaniciAdi').val('');
    $('#sifre').val('');
    // Modalı kapat
    $('#personelEkleModal').modal('hide');
  }

  // Personel silme fonksiyonu
  function silPersonel(index) {
    personeller.splice(index, 1);
    // Listeyi güncelle
    updatePersonelListesi();
  }

  // Personel modalını açma fonksiyonu
  function openPersonelModal() {
    $('#personelEkleModal').modal('show');
  }
</script>


<!-- Modal Satış -->
<div class="modal fade" id="satisModal" tabindex="-1" aria-labelledby="satisModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="satisModalLabel">Satış</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Satış içeriği buraya gelecek -->
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
  function openModal(modalId) {
    $('#' + modalId).modal('show');
  }
</script>
  

  <!-- Navbar -->
  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#sidebarMenu"
        aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- marka -->
      <a class="navbar-brand" href="#">
        <img src="img/logo.jpg" height="50" alt="coffe Logo"
          loading="lazy" />
      </a>

      <!-- arama bölümü -->
      <form class="d-none d-md-flex input-group w-auto my-auto">
        <input autocomplete="off" type="search" class="form-control rounded"
          placeholder='arama' style="min-width: 300px;" />
          <span class="input-group-text border-0"><i class="fas fa-search"></i></span>

      </form>

      
      <ul class="navbar-nav ms-auto d-flex flex-row">
      
      <!-- Çıkış butonu -->
      <button id="logoutButton" class="btn bg-danger text-white" style="margin-left: 20px;">Çıkış Yap</button>

      <script>
      // Çıkış butonuna tıklandığında index.php'ye yönlendirme işlemi
      document.getElementById("logoutButton").addEventListener("click", function() {
      window.location.href = "index_1.php";
      });
      </script>
     
      <!-- Avatar -->         
      <img src="img/logo1.jpg" class="rounded-circle"
       height="40" alt="Avatar" loading="lazy" />

    </div>
  </nav>
 
</header>
  
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>