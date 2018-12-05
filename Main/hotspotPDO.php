<?php
$pdo = new PDO('mysql:host=localhost;dbname=n9888616', 'n9888616', 'myNewPassword');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
$result = $pdo->query('SELECT * FROM items ');

} catch (PDOException $e) {
echo $e->getMessage();
}
?>