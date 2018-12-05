<!DOCTYPE html>
<html>
    
<head>
<title>Homepage</title>
<meta charset="UTF-8">
</head>

<body > 

<?php 
require_once '../header.php';
?>
    <div id="Image">
        <img src="wifi-image.jpg" alt="Wifi On Air">
    </div>
    
    <div id="SearchObjects">
        <button type="button" onclick="window.location.href='../searchPage/searchPage.php'">Search</button>
    </div>			

<?php
include '../footer.php';
?>

</body>

</html>
