<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/valida_session.inc.php";
include "../api/pagamento.php";


session_start();

$url = Pagamento::executa($_SESSION[carrinho]);
//CreatePaymentRequest::main();

unset($_SESSION['carrinho']);

header("Location: $url");

    
?>
