<?php
include("deneme.php");

$sorgu=$vt->prepare('SELECT odeme_yontemi, COUNT(*) AS odeme_turu_toplamı, (COUNT(*) * 100.0 / (SELECT COUNT(*) FROM odemeler)) as yüzdelik, SUM(toplam_fiyat) as toplam_satış FROM odemeler GROUP BY odeme_yontemi;');
$sorgu->execute();
$personellist=$sorgu-> fetchAll(PDO::FETCH_OBJ);


?>


<!doctype html>
<html lang="en">
  <head>
    <title>ANALIZLER</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="windowsatis.css">
</head>
  <body>

    <div class="container">
      <div  class="row justify-content-center">
        <div  class="col">
          <table  class="table table-bordered table-striped table-dark">
            <tr>
              <td>odeme_yontemi</td>
              <td>odeme_turu_toplamı</td>
              <td>yüzdelik</td>
              <td>toplam_satış</td>
              
              
            </tr>
            <?php

            foreach($personellist as $person){?>
                <tr>
                  <td><?= $person->odeme_yontemi           ?></td>
                  <td><?= $person->odeme_turu_toplamı ?></td>
                  <td><?= $person->yüzdelik        ?></td>
                  <td><?= $person->toplam_satış        ?></td>
                 
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