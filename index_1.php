<?php
require 'baglan.php';
ob_start();


?>

<!Doctype html>
<html lang="en">
  <head>
    <title>özel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index_1.css">  

  </head>
  <body>
  
  <div id="container" class="container p-1">
    <div class="card p-5">
        <div class="form">

        <?php
              if(isset($_POST['giris'])) {
                $Kullanici_Adi = $_POST['Kullanici_Adi'] ;
                $sifre = $_POST['sifre'] ;

                $sorgu = $db -> prepare('SELECT * FROM kullanici_giris WHERE Kullanici_Adi=:Kullanici_Adi and sifre=:sifre ') ;
                $sorgu -> execute ([
                  'Kullanici_Adi' => $Kullanici_Adi ,
                  'sifre' => $sifre
               
                  

                ]);
                $say = $sorgu -> rowCount();
                if ($say == 1){
                  $_SESSİON['Kullanici_Adi'] = $Kullanici_Adi;
                  echo '<div class="alert alert-primary text-center" role= "alert">
                  <strong> İŞLEM BAŞARILI ADMİN PANELİNE YÖNLENDİRİLİYORSUNUZ... </STRONG>
                  </div>';
                     header ('Refresh:2; admin.php');
                } else{
                  echo '<div class="alert alert-danger text-center" role= "alert">
                  <strong> HATALI GİRİŞ! </STRONG>
                  </div>';
                     header ('Refresh:2; index_1.php');

                }
              }

              ?>


            <div class="text-center mb-6"><h1>ADMİN GİRİŞ</h1></div>
            <form action="" method="post">
                <input type="text" name="Kullanici_Adi" class="form-control" placeholder="Kullanıcı adı giriniz"><br>
                <input type="password" name="sifre" class="form-control" placeholder="Şifre giriniz"><br>       
            
                <div class="text-center">
                    <input type="submit" class="btn bg-primary" id="giris" name="giris"  value="Gönder">
                    <a href="index.php" class="btn btn-danger">PERSONEL GİRİŞİNE DÖN</a>
            </div>
            </form>    
   
            
            

        </div>
    </div>
</div>

<script>
    // Personel girişine dön butonuna tıklandığında index.php sayfasına yönlendirme yap
    document.getElementById('donBtn').addEventListener('click', function() {
        window.location.href = 'index.php';
    });
</script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>