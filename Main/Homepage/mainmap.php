<!DOCTYPE html>
<html>
    
<head>
<title>Main map</title>
<script type="text/javascript" src="../Javascript/script.js"></script>
<meta charset="UTF-8">
</head>

<body > 

<?php 
require_once '../header.php';
?>
		<div id="mapAPI">		
		</div>			
    	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdPFSi4lp2M0b8Fn_8HrkAEFYJ9p9KtM&callback=initMap"
    async defer></script>
<?php
include '../footer.php';
?>

</body>

</html>
