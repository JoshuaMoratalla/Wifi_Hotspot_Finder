<?php
//Setup PDO with the database and allow errors
$pdo = new PDO('mysql:host=localhost;dbname=n9888616', 'n9888616', 'myNewPassword');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>