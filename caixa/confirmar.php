<?php
header('Content-Type: text/html; charset=utf-8');

include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/valida_session.inc.php";
include "../api/pagamento.php";
include "../api/compras.php";

session_start();

$idUsuario=$dados_usuario[id];
$detalhes='';
$preco = 0;


foreach ($_SESSION[carrinho] as  $item){
    $detalhes =$detalhes.$item[tipo].': '.$item[nome].': '.$item[preco].';';
    $preco = $preco + $item[preco];
}
  $resultado = insereCompra($idUsuario, $detalhes, $preco);
  $idVenda = (int)$resultado->mensagem;
  


$url = Pagamento::executa($_SESSION[carrinho], $idVenda);//segundo parametro é o id da venda
CreatePaymentRequest::main();

unset($_SESSION['carrinho']);

header("Location: $url");

    
?>



