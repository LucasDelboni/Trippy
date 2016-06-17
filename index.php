<pre>
<?php
    include "api/temperatura.php";
    include "api/aviao.php";

	$destinos = json_decode(respostaLocation(), true);
	
	//print_r($destinos[GetBA_LocationsResponse][Country]);
	//die();
	
?>
<html>
	<head>
		
	</head>
	<body>
		<select>
			<?php 
				$paises = paisesDestino(respostaLocation());
				foreach ($paises as $pais){
					echo "<option value=".$pais.">".$pais."</option>";
				}
			?>
			
		</select>
	</body>
</html>
</pre>