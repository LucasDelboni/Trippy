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
    
    
    
    
    
    
    
    
    
    
    
    
    
    function comprasUsuarioB($idUsuario){
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://distribuidosrest-ztck.c9users.io/webservice?id='.$idUsuario,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        
        $resp = curl_exec($curl);
        curl_close($curl);
        
        
        $xml = simplexml_load_string($resp, "SimpleXMLElement", LIBXML_NOCDATA);
        
        return $xml;
        
    }
    
    function insereCompraB($idUsuario, $detalhes, $preco){
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://distribuidosrest-ztck.c9users.io/webservice',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array( 
                'id' => $idUsuario,
                'detalhes' => $detalhes,
                'preco' => $preco
                )
        ));
        
        $resp = curl_exec($curl);
        curl_close($curl);
        
        $xml = simplexml_load_string($resp, "SimpleXMLElement", LIBXML_NOCDATA);
        
        return $xml;
    }
    
    function colocaComoPagoB($id){

        $data = array( 
                'id' => $id
                );
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://distribuidosrest-ztck.c9users.io/webservice',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => http_build_query($data)
        ));
        
        $resp = curl_exec($curl);
        curl_close($curl);

        
        $xml = simplexml_load_string($resp, "SimpleXMLElement", LIBXML_NOCDATA);
        
        return $xml;
    }
?>