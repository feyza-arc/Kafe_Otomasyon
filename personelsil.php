<?php
if(isset($_GET["pid"]))
{
    include("deneme.php");
    $sorgu=$vt->prepare('DELETE FROM personelListesi WHERE id=? ');
    $sonuc=$sorgu->execute([$_GET['pid']]);
    if($sonuc){
        header("location:windowperso.php");
    }
    else
        echo("kayıt silinmedi.");
}
?>
