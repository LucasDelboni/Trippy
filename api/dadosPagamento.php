<?php
//exemplo chamado https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/D6E4559008720872E09224C42FB2AA3EAF1E?email=lucas_cd460@hotmail.com&token=75332FD00B3642C3865C96E3EA3AAA11
    function estadoPagamento($codigoNotificacao){
        $xml = consulta($codigoNotificacao);
        $estado = leXML($xml);
        $estado = (int)$estado;
        
        switch ($estado){
            case 1:
                return 'Aguardando pagamento';
            case 2:
                return 'Em análise';
            case 3:
                return 'Pago';
            case 7:
                return 'Cancelada';
        }
        
    }
    
    function consulta($codigoNotificacao){
        $ch = curl_init();
        $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/'.$codigoNotificacao.'?email=lucas_cd460@hotmail.com&token=75332FD00B3642C3865C96E3EA3AAA11';
        curl_setopt($ch, CURLOPT_URL, $url);
        
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;//um xml gigante
    }
    
    function leXML($xml){
        libxml_use_internal_errors(true);
        $resultado = simplexml_load_string($xml);
        return $resultado->status;
    }
    
    function codigoReferencia($codigoNotificacao){
        $xml = consulta($codigoNotificacao);
        libxml_use_internal_errors(true);
        $resultado = simplexml_load_string($xml);
        $resposta = (int)$resultado->reference;
        return $resposta;
    }
    
    
?>




