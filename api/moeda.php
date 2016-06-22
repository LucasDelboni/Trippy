<?php
    function converter($moeda){
        switch ($moeda){
            case 'EUR':
                $moeda = 21620;
                break;
            case 'BRL':
                return 1;
            case 'JPY':
                $moeda = 21622;
                break;
            case 'GBP':
                $moeda = 21624;
                break;
            case 'CHF':
                $moeda = 21626;
                break;
            case 'DKK':
                $moeda = 21628;
                break;
            case 'NOK':
                $moeda = 21630;
                break;
            case 'SEK':
                $moeda = 21632;
                break;
            case 'AUD':
                $moeda = 21634;
                break;
            case 'CAD':
                $moeda = 21636;
                break;
        }
        
        $client = new SoapClient('bancocentral.wsdl');
        $function = 'getUltimoValorXML';
         
        $arguments= array('getUltimoValorXML' => array(
                                'in0'   => '21620'
                        ));
        $options = array('location' => 'https://www3.bcb.gov.br/wssgs/services/FachadaWSSGS');
         
        $result = $client->__soapCall($function, $arguments, $options);
        var_dump($result);
        $xml = simplexml_load_string($result, "SimpleXMLElement", LIBXML_NOCDATA);
        var_dump($xml);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $array[SERIE][VALOR] = str_replace(',', '.', $array[SERIE][VALOR]);
        return $array[SERIE][VALOR];

        /*
        in0:
        CÓDIGO	NOME
        1	    Dólar (venda)
        10813	Dólar (compra)
        21619	Euro (venda)
        21620	Euro (compra)
        21621	Iene (venda)
        21622	Iene (compra)
        21623	Libra esterlina (venda)
        21624	Libra esterlina (compra)
        21625	Franco Suíço (venda)
        21626	Franco Suíço (compra)
        21627	Coroa Dinamarquesa (venda)
        21628	Coroa Dinamarquesa (compra)
        21629	Coroa Norueguesa (venda)
        21630	Coroa Norueguesa (compra)
        21631	Coroa Sueca (venda)
        21632	Coroa Sueca (compra)
        21633	Dólar Australiano (venda)
        21634	Dólar Australiano (compra)
        21635	Dólar Canadense (venda)
        21636	Dólar Canadense (compra)
        */
    }
    
    function emReais($valor, $moeda){
        
        $cambio = (converter($moeda));
        return 'Valor: '.$valor.' | Moeda: '.$moeda.' | Cambio: '.$cambio.' | Resultado: '.$cambio*$valor;
        
    }
?>
<html>
    <body>
        <pre><?php echo emReais(500.20, 'DKK');?></pre>
    </body>
</html>