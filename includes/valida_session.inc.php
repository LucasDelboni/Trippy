<?php

$dados_usuario = array();

session_start();

if(isset($_SESSION[email])) $email_usuario = $_SESSION[email];
if(isset($_SESSION[senha])) $senha_usuario = $_SESSION[senha];

ini_set("soap.wsdl_cache_enabled", 0);

$client = new SoapClient('http://distribuidossoap-ztck.c9users.io/webservice?wsdl');
$options = array('location' => 'http://distribuidossoap-ztck.c9users.io/webservice');

$function = 'ValidaSecao';
 
$arguments= array(
    'email'   => $email_usuario,
    'senha'   => $senha_usuario
);

$result = $client->__soapCall($function, $arguments, $options);
$xml = simplexml_load_string($result, "SimpleXMLElement", LIBXML_NOCDATA);
$json = json_encode($xml);
$array = json_decode($json, TRUE);
    

/*
echo '<pre>';
echo 'array </br>';
print_r($array);
echo 'result </br>';
echo $result;
echo 'arguments </br>';
print_r($arguments);
echo '</pre>';

die();
*/


if(!(empty($email_usuario) OR empty($senha_usuario))){

    if($array[validade] == 1){
    
        $dados_usuario = $array;
    
    } else {
        
        session_unset();
	    session_destroy();
    
    }

} else {

    session_unset();
	session_destroy();

    
}

?>