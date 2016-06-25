<?php

/*
 *  Página responsável por receber as requisições sobre login da API Trubby.
 *	******POST*******
        entrada:
        saída:
 
 *	******PUT********
		entrada: JSON com nome de usuário e senha informados pelo cliente
		saída: JSON com id_usuario e "validade" informando TRUE ou FALSE caso o login seja válido ou não
 
 *	******DELETE********
		entrada: id_usuario de quem deve ser deletado escrito na URL da requisição (envio GET)
		saída: vazia
 
 
 */


require_once("functions.inc.php");
require_once("connection.php");


// ****************************************************************************
// Checa qual o tipo de requisição recebida e encaminha o comando para a função adequada
// ****************************************************************************
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        cadastro();
        break;
        
    case 'PUT':
        login_valida();
        break;
    
    case 'DELETE':
        deleta();
        break;
    
    default:
        requisicao_incorreta();
        break;
}

// ****************************************************************************
// POST
// ****************************************************************************
function cadastro(){
    
    $entrada = leJSON();
    
    $sql =  "INSERT INTO easytrip.usuarios (
                    nome ,
                    email ,
                    senha
                )
                VALUES (
                    '".$entrada[nome]."', 
                    '".$entrada[email]."', 
                    '".$entrada[senha]."' 
                    );";
                
    $resultado = mysql_query($sql) or die(mysql_error());
                
}

// ****************************************************************************
// PUT
// ****************************************************************************
function login_valida(){
    
    $entrada = leJSON();
    
    $sql = "SELECT * FROM `usuarios` WHERE email = '$entrada[email]' AND senha = '$entrada[senha]'";
    
    $resultado = mysql_query($sql);
    
    // prepara retorno
    $retorno['id_usuario'] = "";
    $retorno['nome'] = "";
    $retorno['validade'] = "FALSE";
    
    // caso o usuário não tenha tenha fornecido as informações de login corretas
    if(mysql_num_rows($resultado) != 1){
        echo escreveJSON($retorno);
        return;
    }
    
    // caso as informações de login estejam corretas, prepara os dados para envio
    $linha = mysql_fetch_assoc($resultado);
    
    $retorno[email] = $linha [email];
    $retorno['id_usuario'] = $linha['id_usuario'];
    $retorno['nome'] = $linha['nome'];
    $retorno['validade'] = "TRUE";
    
    echo escreveJSON($retorno);
    
}




// ****************************************************************************
// DELETE
// ****************************************************************************
function deleta(){
    
    mysql_query("DELETE FROM `trubby`.`usuarios` WHERE  `id_usuario`=$_GET[id_usuario];") or die(mysql_error());
    
}


?>