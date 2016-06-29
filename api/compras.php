<?php
    require_once "dadosPagamento.php";
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
    
    function insereCompra($idUsuario, $detalhes, $preco){
        $client = new SoapClient('http://distribuidossoap-ztck.c9users.io/webservice?wsdl');
        $function = 'InsereCompra';
         
        $arguments= array(
                                'id_usuario'   => $idUsuario,
                                'detalhes'     => $detalhes,
                                'preco'        => $preco
                        );
        $options = array('location' => 'http://distribuidossoap-ztck.c9users.io/webservice');
         
        $result = $client->__soapCall($function, $arguments, $options);
        
        var_dump($result);
        $resultado = simplexml_load_string($result, "SimpleXMLElement", LIBXML_NOCDATA);
        
        return $resultado;
    }
    
    function colocaComoPago($id){
        $client = new SoapClient('http://distribuidossoap-ztck.c9users.io/webservice?wsdl');
        $function = 'AtualizaCompra';
         
        $arguments= array(
                                'id'   => $id
                        );
        $options = array('location' => 'http://distribuidossoap-ztck.c9users.io/webservice');
         
        $result = $client->__soapCall($function, $arguments, $options);
        
        $resultado = simplexml_load_string($result, "SimpleXMLElement", LIBXML_NOCDATA);
        
        return $resultado;
    }
?>