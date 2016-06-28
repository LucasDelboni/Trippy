<?php
    include "dadosPagamento.php";
    function comprasUsuario($idUsuario){
        $client = new SoapClient('http://distribuidossoap-ztck.c9users.io/webservice?wsdl');
        $function = 'BuscaCompras';
         
        $arguments= array(
                                'id'   => $idUsuario
                        );
        $options = array('location' => 'http://distribuidossoap-ztck.c9users.io/webservice');
         
        $result = $client->__soapCall($function, $arguments, $options);

        $resultado = simplexml_load_string($result, "SimpleXMLElement", LIBXML_NOCDATA);
        
        return $resultado;
        
    }
?>