<?php
function destinos(){
    $url= "https://api.ba.com/rest-v1/v1/balocations";
    $header = "Client-Key: 79hzmmeae79pbh47gccrymmr";
    
    $cliente = curl_init($url);
    
    curl_setopt();
    
    $resposta = curl_exec($cliente);
    
    
    
    echo $resposta;

}


?>

<?php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.ba.com/rest-v1/v1/balocations');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Client-Key: 79hzmmeae79pbh47gccrymmr'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $result = curl_exec($ch);
    curl_close($ch);
    echo $result;
?>