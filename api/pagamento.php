<?php
    

/*
 * ***********************************************************************
 Copyright [2011] [PagSeguro Internet Ltda.]

 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at

 http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.
 * ***********************************************************************
 */

require_once "../pagSeguro/PagSeguroLibrary/PagSeguroLibrary.php";
//require_once "credenciaispagamento.php";
/***
 * Provides for user a option to configure their credentials without changes in PagSeguroConfigWrapper.php file.
 */
 
class PagSeguroConfigWrapper
{
    public static function getConfig()
    {
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

        return $PagSeguroConfig;
    }
}

/**
 * Class with a main method to illustrate the usage of the domain class PagSeguroPaymentRequest
 */
class CreatePaymentRequest
{

    public static function main()
    {
        // Instantiate a new payment request
        $paymentRequest = new PagSeguroPaymentRequest();

        // Set the currency
        $paymentRequest->setCurrency("BRL");

        // Add an item for this payment request
        $paymentRequest->addItem('0001', 'Notebook prata', 2, 430.00);

        // Add another item for this payment request
        $paymentRequest->addItem('0002', 'Notebook rosa', 2, 560.00);

        // Set a reference code for this payment request. It is useful to identify this payment
        // in future notifications.
        $paymentRequest->setReference("REF123");

        // Set shipping information for this payment request
        $sedexCode = PagSeguroShippingType::getCodeByType('SEDEX');
        $paymentRequest->setShippingType($sedexCode);
        $paymentRequest->setShippingAddress(
            '01452002',
            'Av. Brig. Faria Lima',
            '1384',
            'apto. 114',
            'Jardim Paulistano',
            'São Paulo',
            'SP',
            'BRA'
        );

        // Set your customer information.
        $paymentRequest->setSender(
            'João Comprador',
            'email@comprador.com.br',
            '11',
            '56273440',
            'CPF',
            '156.009.442-76'
        );

        // Set the url used by PagSeguro to redirect user after checkout process ends
        $paymentRequest->setRedirectUrl("https://epdistribuidos-flashfox.c9users.io/");

        // Add checkout metadata information
        $paymentRequest->addMetadata('PASSENGER_CPF', '15600944276', 1);
        $paymentRequest->addMetadata('GAME_NAME', 'DOTA');
        $paymentRequest->addMetadata('PASSENGER_PASSPORT', '23456', 1);

        // Another way to set checkout parameters
        $paymentRequest->addParameter('notificationURL', 'http://www.lojamodelo.com.br/nas');
        $paymentRequest->addParameter('senderBornDate', '07/05/1981');
        $paymentRequest->addIndexedParameter('itemId', '0003', 3);
        $paymentRequest->addIndexedParameter('itemDescription', 'Notebook Preto', 3);
        $paymentRequest->addIndexedParameter('itemQuantity', '1', 3);
        $paymentRequest->addIndexedParameter('itemAmount', '200.00', 3);

        // Add discount per payment method
        $paymentRequest->addPaymentMethodConfig('CREDIT_CARD', 1.00, 'DISCOUNT_PERCENT');
        $paymentRequest->addPaymentMethodConfig('EFT', 2.90, 'DISCOUNT_PERCENT');
        $paymentRequest->addPaymentMethodConfig('BOLETO', 10.00, 'DISCOUNT_PERCENT');
        $paymentRequest->addPaymentMethodConfig('DEPOSIT', 3.45, 'DISCOUNT_PERCENT');
        $paymentRequest->addPaymentMethodConfig('BALANCE', 0.01, 'DISCOUNT_PERCENT');

        // Add installment without addition per payment method
        $paymentRequest->addPaymentMethodConfig('CREDIT_CARD', 6, 'MAX_INSTALLMENTS_NO_INTEREST');

        // Add installment limit per payment method
        $paymentRequest->addPaymentMethodConfig('CREDIT_CARD', 8, 'MAX_INSTALLMENTS_LIMIT');

        // Add and remove a group and payment methods
        $paymentRequest->acceptPaymentMethodGroup('CREDIT_CARD', 'DEBITO_ITAU');      
        $paymentRequest->excludePaymentMethodGroup('BOLETO', 'BOLETO');

        try {

            /*
             * #### Credentials #####
             * Replace the parameters below with your credentials
             * You can also get your credentials from a config file. See an example:
             * $credentials = new PagSeguroAccountCredentials("vendedor@lojamodelo.com.br",
             * "E231B2C9BCC8474DA2E260B6C8CF60D3");
             */

            // seller authentication
            $credentials = PagSeguroConfig::getAccountCredentials();

            // application authentication
            //$credentials = PagSeguroConfig::getApplicationCredentials();

            //$credentials->setAuthorizationCode("E231B2C9BCC8474DA2E260B6C8CF60D3");

            // Register this payment request in PagSeguro to obtain the payment URL to redirect your customer.
            $url = $paymentRequest->register($credentials);

            self::printPaymentUrl($url);

        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
    }

    public static function printPaymentUrl($url)
    {
        if ($url) {
            echo "<h2>Criando requisi&ccedil;&atilde;o de pagamento</h2>";
            echo "<p>URL do pagamento: <strong>$url</strong></p>";
            echo "<p><a title=\"URL do pagamento\" href=\"$url\">Ir para URL do pagamento.</a></p>";
        }
    }
}

class Pagamento
{

    public static function executa($parametros, $id)
    {

        //print_r($parametros[produtos]);

        // Inicia uma nova requisição de pagamento
        $paymentRequest = new PagSeguroPaymentRequest();

        // Configura a moeda
        $paymentRequest->setCurrency("BRL");

        // Add an item for this payment request
        $item = 1;
        foreach($parametros as $produto){
            //print_r($produto);
            if(empty($produto[preco])){
                $produto[preco] = 10.00;
            }
            $paymentRequest->addItem($item, $produto[tipo].': '.$produto[nome], 1, $produto[preco]);
            $item++;
        }
        //$carrinho = serialize($parametros);
        //$paymentRequest->addItem($item, $carrinho, 1, 10.01);
        
        // Set a reference code for this payment request. It is useful to identify this payment
        // in future notifications.
        $paymentRequest->setReference($id);

        // Set shipping information for this payment request
        $sedexCode = PagSeguroShippingType::getCodeByType('SEDEX');
        $paymentRequest->setShippingType($sedexCode);
        $paymentRequest->setShippingAddress(
            '01452002',
            'Av. Brig. Faria Lima',
            '1384',
            'apto. 114',
            'Jardim Paulistano',
            'São Paulo',
            'SP',
            'BRA'
        );

        // Set your customer information.
        $paymentRequest->setSender(
            'João Comprador',
            'email@comprador.com.br',
            '11',
            '56273440',
            'CPF',
            '156.009.442-76'
        );

        // Set the url used by PagSeguro to redirect user after checkout process ends
        //$carrinho = urlencode(serialize($parametros));
        $paymentRequest->setRedirectUrl("https://epdistribuidos-flashfox.c9users.io/caixa/checkout.php");

        try {

            /*
             * #### Credentials #####
             * Replace the parameters below with your credentials
             * You can also get your credentials from a config file. See an example:
             * $credentials = new PagSeguroAccountCredentials("vendedor@lojamodelo.com.br",
             * "E231B2C9BCC8474DA2E260B6C8CF60D3");
             */

            // seller authentication
            $credentials = PagSeguroConfig::getAccountCredentials();

            // application authentication
            //$credentials = PagSeguroConfig::getApplicationCredentials();

            //$credentials->setAuthorizationCode("E231B2C9BCC8474DA2E260B6C8CF60D3");

            // Register this payment request in PagSeguro to obtain the payment URL to redirect your customer.
            $url = $paymentRequest->register($credentials);

            //self::printPaymentUrl($url);

        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
        
        return $url;

    }
    
    public static function printPaymentUrl($url)
    {
        if ($url) {
            echo "<h2>Criando requisi&ccedil;&atilde;o de pagamento</h2>";
            echo "<p>URL do pagamento: <strong>$url</strong></p>";
            echo "<p><a title=\"URL do pagamento\" href=\"$url\">Ir para URL do pagamento.</a></p>";
        }
    }
}

/*
$parametros[produtos] = array();
$parametros[produtos][0][nome] = 'produto 1';
$parametros[produtos][0][quantidade] = 4;
$parametros[produtos][0][preco] = 10.40;
$parametros[produtos][1][nome] = 'produto 2';
$parametros[produtos][1][quantidade] = 70;
$parametros[produtos][1][preco] = 5.60;

echo '<pre>';
Pagamento::executa($parametros);
//CreatePaymentRequest::main();
echo '</pre>';
*/

?>