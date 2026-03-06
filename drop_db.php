<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;port=3309', 'root', '@dlh010404');
    $db->exec('DROP DATABASE IF EXISTS db_pertemuan3');
    $db->exec('CREATE DATABASE db_pertemuan3');
    echo "DB reset successfully.\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
