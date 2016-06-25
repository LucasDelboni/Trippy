<?php
    /***
     * Provides for user a option to configure their credentials without changes in PagSeguroConfigWrapper.php file.
     */ 

            $PagSeguroConfig = array();
    
            $PagSeguroConfig['environment'] = "sandbox"; // production, sandbox
    
            $PagSeguroConfig['credentials'] = array();
            $PagSeguroConfig['credentials']['email'] = "lucas_cd460@hotmail.com";
            $PagSeguroConfig['credentials']['token']['production'] = "your_production_pagseguro_token";
            $PagSeguroConfig['credentials']['token']['sandbox'] = "75332FD00B3642C3865C96E3EA3AAA11";
            $PagSeguroConfig['credentials']['appId']['production'] = "your__production_pagseguro_application_id";
            $PagSeguroConfig['credentials']['appId']['sandbox'] = "app4749159973";
            $PagSeguroConfig['credentials']['appKey']['production'] = "your_production_application_key";
            $PagSeguroConfig['credentials']['appKey']['sandbox'] = "E0139443DDDD443994250FBB9480ECF2";
    
            $PagSeguroConfig['application'] = array();
            $PagSeguroConfig['application']['charset'] = "UTF-8"; // UTF-8, ISO-8859-1
    
            $PagSeguroConfig['log'] = array();
            $PagSeguroConfig['log']['active'] = false;
            // Informe o path completo (relativo ao path da lib) para o arquivo, ex.: ../PagSeguroLibrary/logs.txt
            $PagSeguroConfig['log']['fileLocation'] = "";
    
            $credentials = $PagSeguroConfig;

?>


<!--option

Email: c21172920624982439824@sandbox.pagseguro.com.br
Senha: 75WklC0XmdmwEY5b

Número: 4111111111111111 
Bandeira: VISA Válido até: 12/2030 CVV: 123
-->