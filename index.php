<?php
    include "api/temperatura.php";
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Easy Trip</title>
	</head>
	
	<body>
	<form method="GET">
		<input type="number" name="zipCode">
		<input type="submit">
	</form>
	<?php
	    $zipcode = $_GET['zipCode'];
	    zipcodeCensius($zipcode);
	?>
	</body>
</html>