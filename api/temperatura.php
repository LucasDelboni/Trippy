<?php
    function fahrenheitToCelsius($celsius){
        $client = new SoapClient('http://www.webservicex.net/ConvertTemperature.asmx?WSDL');
     
        $function = 'ConvertTemp';
         
        $arguments= array('ConvertTemp' => array(
                                'Temperature'   => $celsius,
                                'FromUnit'      => 'degreeCelsius',
                                'ToUnit'        => 'degreeFahrenheit'
                        ));
        $options = array('location' => 'http://www.webservicex.net/ConvertTemperature.asmx');
         
        $result = $client->__soapCall($function, $arguments, $options);
         
        echo 'Response: ';
        print_r($result);
        return $result;
    }
    
    function celsiusToFahrenheit($fahrenheit){
        $client = new SoapClient('http://www.webservicex.net/ConvertTemperature.asmx?WSDL');
     
        $function = 'ConvertTemp';
         
        $arguments= array('ConvertTemp' => array(
                                'Temperature'   => $fahrenheit,
                                'FromUnit'      => 'degreeCelsius',
                                'ToUnit'        => 'degreeFahrenheit'
                        ));
        $options = array('location' => 'http://www.webservicex.net/ConvertTemperature.asmx');
         
        $result = $client->__soapCall($function, $arguments, $options);
         
        echo 'Response: ';
        print_r($result);
        return $result;
    }
?>