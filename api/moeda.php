<?php
    function converter($moeda){
        $client = new SoapClient('bancocentral.wsdl');
        $function = 'getUltimoValorXML';
         
        $arguments= array('getUltimoValorXML' => array(
                                'in0'   => '1'
                        ));
        $options = array('location' => 'https://www3.bcb.gov.br/wssgs/services/FachadaWSSGS');
         
        $result = $client->__soapCall($function, $arguments, $options);

        echo 'Response: ';
        var_dump($result);

/*
CÓDIGO	NOME
1	Dólar (venda)
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
?>
<html>
    <body>
        <h1><?php echo converter('1');?></h1>
    </body>
</html>