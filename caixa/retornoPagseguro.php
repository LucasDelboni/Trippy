<?php
    $db = new PDO('mysql:host=54.207.22.190;dbname=easytrip', 'trubby', 'raiztrubby');
    
    $stmt = $GLOBALS['db']->prepare(
        'INSERT INTO  `easytrip`.`vendas` (
        `id_usuario` ,`id_venda` ,`codigo_identificador` ,`pago`)
        VALUES (:id_usuario,  :id_venda,  :codigo_identificador,  :pago)');
        
    $stmt->execute(array(
        'id_usuario' => 1,
        'id_venda' => 2,
        'codigo_identificador' => '123',//era pra colocar o _POST do codigo do pagseguro aqui
        'pago' => 0
    ));
?>

