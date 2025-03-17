<?php
try {
    $db = New PDO ('mysql:host = localhost; dbname=kafe_otomasyon', 'root', '');
    
} catch (Exception $e) {
    $e -> getMessage();
}
?>