<?php
// Veritabanı bağlantısı
try {
    $db = new PDO('mysql:host=localhost;dbname=kafe_otomasyon', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Veritabanı bağlantısı başarılı.";
} catch(PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Anasayfa</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="anasayfa.css">

        <style>
        /* Sidebar style */
        .sidebar {
            height: 100vh;
            width: 350px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding: 20px;
            opacity: 0.7;
        }
        /* Hesap makinesi style */
        .calculator {
            height: 100vh;
            width: 350px;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f8f9fa;
            padding: 20px;
            opacity: 0.7;
        }

        #urunListesi{
            max-height: 400px; /* Maksimum yükseklik */
            overflow-y: auto;
        }
        #secilenUrunler {
            max-height: 400px; /* Maksimum yükseklik */
            overflow-y: auto; /* Dikey kaydırma çubuğunu etkinleştir */
        }

        #logoutButton{
            position: fixed;
            top: 700px;
            right: 0;
        }
        .search-container {
            max-width: 500px;
            margin: 20px auto;
            text-align: center;
        }

        .search-input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .search-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
        
    </head>

    <body>     
        <!-- Sol taraftaki sidebar -->
<div class="sidebar">

    <hr>
    <h4>Kaydedilen Ürünler</h4>
    <ul id="urunListesi" class="list-group">
        <!-- Kaydedilen ürünler burada listelenecek -->
        <?php include 'urunler.php'; ?>
    </ul>
</div>
<!-- jQuery ve Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
     
<!-- Sağ taraftaki hesap makinesi -->
<div class="calculator">
    <h4>Hesap</h4>
    <form id="odemeForm" method = "post" action="odeme.php">
        <button class="btn btn-primary mt-3" type="submit">Ödeme Yap</button>
        <p>Ara Toplam: <span id="araToplam"> 0 TL</span></p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="odeme" id="krediKarti" value="Kredi Kartı">
            <label class="form-check-label" for="krediKarti">Kredi Kartı</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="odeme" id="nakit" value="Nakit">
            <label class="form-check-label" for="nakit">Nakit</label>
        </div>
        <input type="hidden" name="toplamFiyat" id="toplamFiyat" value="0">
        <input type="hidden" name="sepet" id="sepet">
            <ul id="secilenUrunler" class="list-group">
                <!-- Seçilen ürünler burada listelenecek -->
        
            </ul>
    </form>
    

    
    <ul class="navbar-nav ms-auto d-flex flex-row">
      
      <!-- Çıkış butonu -->
      <button id="logoutButton" class="btn bg-danger text-white" style="margin-left: 20px; margin-top: -40px; margin-right: 10px;">Çıkış Yap</button>  
      
      <script>
      // Çıkış butonuna tıklandığında index.php'ye yönlendirme işlemi
      document.getElementById("logoutButton").addEventListener("click", function() {
      window.location.href = "index.php";
      });
      
      
      </script>
             
    
</div>

<!-- jQuery ve Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script>
// Ürün ekleme formunu işle
$('#urunEkleForm').submit(function (e) {
    e.preventDefault();
    var urunAdi = $('#urunAdi').val();
    var urunFiyati = parseFloat($('#urunFiyati').val());

    // Ürün adını ve fiyatını düzgün bir şekilde listeye ekle
    var urunSatiri = $('<li class="list-group-item"></li>');
    var urunAdiSpan = $('<span class="urunAdi"></span>').text(urunAdi);
    var urunFiyatiSpan = $('<span class="urunFiyati" style="float: left;"></span>').text(urunFiyati.toFixed(2) + ' TL');
    urunSatiri.append(urunAdiSpan).append(urunFiyatiSpan);
    $('#urunListesi').append(urunSatiri);

    // Formu sıfırla
    $('#urunAdi').val('');
    $('#urunFiyati').val('');
});

// Ürünlerin fiyatlarını toplamak için bir değişken oluştur
var toplamFiyat = 0;

// Ürün seçme işlemi
$('#urunListesi').on('click', 'li', function () {
    var secilenUrun = $(this).find('.urunAdi').text();
    var fiyat = parseFloat($(this).find('.urunFiyati').text());

    // Toplam fiyata ekleme yap
    toplamFiyat += fiyat;
    $('#araToplam').text(toplamFiyat.toFixed(2) + ' TL');

    // Seçilen ürünü başka bir liste olarak göster
    var secilenUrunSatiri = $('<li class="list-group-item"></li>');
    var secilenUrunAdiSpan = $('<span class="secilenUrunAdi"></span>').text(secilenUrun);
    var secilenUrunFiyatiSpan = $('<span class="secilenUrunFiyati" style="float: right;"></span>').text(fiyat.toFixed(2) + ' TL');
    secilenUrunSatiri.append(secilenUrunAdiSpan).append(secilenUrunFiyatiSpan);
    $('#secilenUrunler').append(secilenUrunSatiri);
});

// Silme işlemi
$('#secilenUrunler').on('click', 'li', function() {
    var fiyat = parseFloat($(this).find('.secilenUrunFiyati').text());

    // Toplam fiyattan sadece silinen ürünün fiyatını çıkar
    toplamFiyat -= fiyat;

    // Ara toplamı güncelle
    $('#araToplam').text(toplamFiyat.toFixed(2) + ' TL');

    // Onay al ve ürünü sil
    if (confirm("Bu ürünü silmek istediğinize emin misiniz?")) {
        $(this).remove();
    }
});

$('#odemeForm').submit(function e() {
    var odemeYontemi = $('input[name="odeme"]:checked').val();
    var sepet = [];
    $('#secilenUrunler .secilenUrunAdi').each(function() {
        sepet.push($(this).text());
    });

    if(!odemeYontemi) {
        alert("Lütfen bir ödeme yöntemi seçiniz");
        e.preventDefault();
    } else {
        $('#toplamFiyat').val(toplamFiyat.toFixed(2));
        $('#sepet').val(sepet.join(','));
    }
    window.location.href = "anasyfa.php";
});



</script>


    </body>
</html>
