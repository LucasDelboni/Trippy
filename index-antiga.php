<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/i18n/defaults-*.min.js"></script>


<script>
	function verificaCidade(){
		var e = document.getElementById("origem");
		var origem = e.options[e.selectedIndex].value;
		e = document.getElementById("destino");
		var destino = e.options[e.selectedIndex].value;
		if(origem===destino){
			document.getElementById('procuraPassagem').disabled = true;
		}
		else{
			document.getElementById('procuraPassagem').disabled = false;
		}
	}
</script>


<?php
    include "api/temperatura.php";
    include "api/aviao.php";

	$destinos = json_decode(respostaLocation(), true);
	
	//print_r($destinos[GetBA_LocationsResponse][Country]);
	
	$lista = $destinos[GetBA_LocationsResponse][Country];

?>
<html>
	<head>
		
	</head>
	<body>
		
		<form action="/aviao/compraPassagem.php" method="POST">
			<p>Origem</p>
			<select  name="origem" id="origem" onchange="verificaCidade()">
				<?php 
					foreach($lista as $pais){
						echo '<optgroup label='.$pais[CountryName].'>';
						
						$cidades = $pais[City];
						
						if(isset($cidades[CityName])){
							//
							echo '<option value='.$cidades[CityCode].'>';
							echo $cidades[CityName];
							echo '</option>';
						} else {
							foreach($cidades as $cidade){
								echo '<option value='.$cidade[CityCode].'>';
								echo $cidade[CityName];
								echo '</option>';
							}	
						}
					}
				?>
			</select>
			<p>Destino:</p>
			<select name="destino" id='destino' onchange="verificaCidade()">
				<?php 
	
					foreach($lista as $pais){
						echo '<optgroup label='.$pais[CountryName].'>';
						
						$cidades = $pais[City];
						
						if(isset($cidades[CityName])){
							echo '<option value='.$cidades[CityCode].'>';
							echo $cidades[CityName];
							echo '</option>';
						} else {
							foreach($cidades as $cidade){
								echo '<option value='.$cidade[CityCode].'>';
								echo $cidade[CityName];
								echo '</option>';
							}	
						}
					}
				?>
			</select>
			<p>Selecione a cabine</p>
			<select name="cabine">
				<option value="economy">Economica</option>
				<option value="premiumEconomy">Economica premium</option>
				<option value="business">Trabalho</option>
				<option value="first">Primeira classe</option>
			</select>
			<p>Data:</p>
			<input type="date" name="data"/>
			<input type="submit" id='procuraPassagem' value="Procurar passagens" disabled="true"/>
		</form>
		

	</body>
</html>