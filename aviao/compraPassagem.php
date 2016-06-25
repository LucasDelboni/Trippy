<?php
    require_once "../api/aviao.php";
    $origem=$_POST["origem"];
    $destino=$_POST["destino"];
    $cabine=$_POST["cabine"];
    $tipo=$_POST["tipo"];
    $range = $_POST["range"];

    //$jsonMenorPreco = menorPreco($origem, $destino, $cabine, $tipo, $range, 'json')
    $jsonMenorPreco = respostaMenorPreco();
?>

<html>
    <head>
        
    </head>
    <body>
        <pre>
            <?php print_r($jsonMenorPreco); ?>
        </pre>
    </body>
</html>