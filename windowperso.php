<?php
include("deneme.php");

$sorgu=$vt->prepare('SELECT *FROM personelListesi');
$sorgu->execute();
$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Personel Listesi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="windowperso.css">
</head>
  <body>

    <div class="container">
      <div  class="row justify-content-center">
        <div  class="col">
          <table  class="table table-bordered table-striped table-dark">
            <tr>
              <td>id</td>
              <td>kullaniciAdi</td>
              <td>sifre</td>
              <td>Sil</td>
              <td>Düzenle</td>
              
            </tr>
            <?php

            foreach($personellist as $person){?>
                <tr>
                  <td><?= $person->id           ?></td>
                  <td><?= $person->kullaniciAdi ?></td>
                  <td><?= $person->sifre        ?></td>
                  <td><a  href="personelsil.php?pid=<?=$person->id  ?>"  class="btn btn-danger">Sil</a></td>
                  <td><a href="personeledit.php?id=<?= $person->id ?>" class="btn btn-primary">Güncelle</a></td>
                </tr>

            <?php } ?>
          </table>
        </div>
      </div>
    </div>
    
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>