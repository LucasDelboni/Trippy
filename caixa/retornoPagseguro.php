<?php
/*
 ************************************************************************
 Copyright [2014] [PagSeguro Internet Ltda.]

 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at

 http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.
 ************************************************************************
 */
header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
//header("access-control-allow-origin: https://pagseguro.uol.com.br");


require_once "../pagSeguro/PagSeguroLibrary/PagSeguroLibrary.php";

class NotificationListener
{

    public static function main()
    {

        $code = (isset($_POST['notificationCode']) && trim($_POST['notificationCode']) !== "" ?
            trim($_POST['notificationCode']) : null);
        $type = (isset($_POST['notificationType']) && trim($_POST['notificationType']) !== "" ?
            trim($_POST['notificationType']) : null);

        if ($code && $type) {

            $notificationType = new PagSeguroNotificationType($type);
            $strType = $notificationType->getTypeFromValue();

            switch ($strType) {

                case 'TRANSACTION':
                    self::transactionNotification($code);
                    break;

                case 'APPLICATION_AUTHORIZATION':
                    self::authorizationNotification($code);
                    break;

                case 'PRE_APPROVAL':
                    self::preApprovalNotification($code);
                    break;

                default:
                    LogPagSeguro::error("Unknown notification type [" . $notificationType->getValue() . "]");

            }

            self::printLog($strType);

        } else {

            LogPagSeguro::error("Invalid notification parameters.");
            self::printLog();

        }

    }

    private static function transactionNotification($notificationCode)
    {

        $credentials = new PagSeguroAccountCredentials("lucas_cd460@hotmail.com",
                "75332FD00B3642C3865C96E3EA3AAA11");

        try {
            $transaction = PagSeguroNotificationService::checkTransaction($credentials, $notificationCode);
            
            $db = new PDO('mysql:host=54.207.22.190;dbname=easytrip', 'trubby', 'raiztrubby');

            $stmt = $GLOBALS['db']->prepare(
                'INSERT INTO  vendas (
                id_usuario, id_venda, codigo_identificador, pago)
                VALUES (:id_usuario,  :id_venda,  :codigo_identificador,  :pago)');
                
            $stmt->execute(array(
                'id_usuario' => 10,
                'id_venda' => 20,
                'codigo_identificador' => json_encode($transaction),//era pra colocar o _POST do codigo do pagseguro aqui
                'pago' => 1
            ));            

        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
    }

    private static function authorizationNotification($notificationCode)
    {

        $credentials = new PagSeguroAccountCredentials("lucas_cd460@hotmail.com",
                "75332FD00B3642C3865C96E3EA3AAA11");


        try {
            $authorization = PagSeguroNotificationService::checkAuthorization($credentials, $notificationCode);

            $transaction = PagSeguroNotificationService::checkTransaction($credentials, $notificationCode);
            
            $db = new PDO('mysql:host=54.207.22.190;dbname=easytrip', 'trubby', 'raiztrubby');

            $stmt = $GLOBALS['db']->prepare(
                'INSERT INTO  vendas (
                id_usuario, id_venda, codigo_identificador, pago)
                VALUES (:id_usuario,  :id_venda,  :codigo_identificador,  :pago)');
                
            $stmt->execute(array(
                'id_usuario' => 10,
                'id_venda' => 20,
                'codigo_identificador' => $transaction,//era pra colocar o _POST do codigo do pagseguro aqui
                'pago' => 1
            )); 
        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
    }

    private static function preApprovalNotification($preApprovalCode)
    {

        $credentials = new PagSeguroAccountCredentials("lucas_cd460@hotmail.com",
                "75332FD00B3642C3865C96E3EA3AAA11");


        try {
            $preApproval = PagSeguroNotificationService::checkPreApproval($credentials, $preApprovalCode);
            $url = 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/
                                '.$notificationCode.'
                                ?email=lucas_cd460@hotmail.com
                                &token=75332FD00B3642C3865C96E3EA3AAA11';
            
            $curl = curl_init();
    
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => 'Codular Sample cURL Request'
            ));
            
            $resp = curl_exec($curl);
            
            curl_close($curl);
            
            $xml = simplexml_load_string($resp, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
            
            $db = new PDO('mysql:host=54.207.22.190;dbname=easytrip', 'trubby', 'raiztrubby');

            $stmt = $GLOBALS['db']->prepare(
                'INSERT INTO  vendas (
                id_usuario, id_venda, codigo_identificador, pago)
                VALUES (:id_usuario,  :id_venda,  :codigo_identificador,  :pago)');
                
            $stmt->execute(array(
                'id_usuario' => 10,
                'id_venda' => 20,
                'codigo_identificador' => $resp,//era pra colocar o _POST do codigo do pagseguro aqui
                'pago' => 1
            ));
            
        } catch (PagSeguroServiceException $e) {
            die($e->getMessage());
        }
    }

    private static function printLog($strType = null)
    {
        $count = 4;
        echo "<h2>Receive notifications</h2>";
        if ($strType) {
            echo "<h4>notifcationType: $strType</h4>";
        }
        echo "<p>Last <strong>$count</strong> items in <strong>log file:</strong></p><hr>";
        echo LogPagSeguro::getHtml($count);
    }
}

NotificationListener::main();

