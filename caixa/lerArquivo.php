<?php
    function estadoCompra($codigo){
        $palavra = '\'reference\' => \''.$codigo.'\',';
        
        $arquivo = "LOG.txt";
        
        $fd = fopen($arquivo, 'r');
        
        $le_arquivo = fread($fd, filesize($arquivo));
        
        //posicao onde ta a palavra
        $procura = strrpos($le_arquivo,"$palavra");
        
        
        // string da linha q ele achou a palavra
        $frase =substr($le_arquivo,$procura,10000);
        
        
        $teste = explode(',',$frase);
        
        
        $resultado = explode('=> ',$teste[1]);
        
        $estado = explode('\'',$resultado[1]);
        
        $numero = (int)$estado[1];
        
        switch ($numero){
            case 1:
                return 'Aguardando pagamento';
            case 2:
                return 'Em análise';
            case 3:
                return 'Pago';
            case 7:
                return 'Cancelada';
        }
        return 0;
        /*

4  Disponível: a transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta.
5  Em disputa: o comprador, dentro do prazo de liberação da transação, abriu uma disputa.
6  Devolvida: o valor da transação foi devolvido para o comprador.
8  Debitado: o valor da transação foi devolvido para o comprador.
9  Retenção temporária: o comprador contestou o pagamento junto à operadora do cartão de crédito ou abriu uma demanda judicial ou administrativa (Procon).

        */
        
        
        
        return $numero;
    }
?>
<!--<hi><?php //echo estadoCompra(30);?></hi>-->