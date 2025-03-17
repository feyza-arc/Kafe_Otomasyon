<?php
if(isset($_GET["pid"]))
{
    include("deneme.php");
    $sorgu=$vt->prepare('DELETE FROM urunListesi WHERE id=? ');
    $sonuc=$sorgu->execute([$_GET['pid']]);
    if($sonuc){
        header("location:windowurun.php");
    }
    else
        echo("ürün silinmedi.");
}
?>
