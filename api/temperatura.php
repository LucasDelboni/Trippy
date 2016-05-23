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
                                'FromUnit'      => 'degreeFahrenheit',
                                'ToUnit'        => 'degreeCelsius'
                        ));
        $options = array('location' => 'http://www.webservicex.net/ConvertTemperature.asmx');
         
        $result = $client->__soapCall($function, $arguments, $options);
         
        echo 'Response: ';
        print_r($result);
        return $result;
    }
    
    function zipcodeCensius($zipCode){
        $client = new SoapClient('http://wsf.cdyne.com/WeatherWS/Weather.asmx?wsdl');
     
        $function = 'getCityForecastByZIP';
         
        $arguments= array('getCityForecastByZIP' => array(
                                'ZIP'   => $zipCode
                        ));
        $options = array('location' => 'http://wsf.cdyne.com/WeatherWS/Weather.asmx');
         
        $result = $client->__soapCall($function, $arguments, $options);
         
        echo 'Response: ';
        print_r($result);
        return $result;
    }
?>