<?php
    require_once "chaves.php";
    //exemplo de data: 2016-06-27T12:00:00Z
    function pacoteCarroAviao($origem, $destino, $data){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.ba.com/rest-v1/v1/carPackages;origin='.$origem.';
        destination='.$destino.';departureDate='.$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Client-Key: '.$chaveHotel));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;//um json gigante
    }
    
    
    //https://api.ba.com/rest-v1/v1/carPackages;origin=LHR;destination=NCL;departureDate=2016-06-27T12:00:00Z
    function exemploRetornoPacote(){
        $retorno= '{
                    "CarPackageResponse": {
                        "CarPackageSearch": [{
                            "arrAirportCode_1_O": "NCL",
                            "arrAirportCode_2_I": "LHR",
                            "arrAirportName_1_O": "Newcastle International",
                            "arrAirportName_2_I": "Heathrow",
                            "arrivalAirport": "NCL",
                            "arrivalDate": "2016-06-29T12:00:00Z",
                            "cabinCode_1_O": "M",
                            "cabinCode_2_I": "M",
                            "carDepotLocation": "Newcastle Airport",
                            "carDuration": 2,
                            "carGroup": "Group F - Ford Mondeo or similar",
                            "carGroupDescription": "Ford Mondeo or similar",
                            "carGroupDescriptionShort": "Ford Mondeo",
                            "carGroupIdentifier": "F",
                            "carGroupShort": "Group F",
                            "carRentalCompanyName": "Avis",
                            "carRentalPlan": 101,
                            "carType": "Manual",
                            "categoryCode": "S",
                            "currencyCode": "GBP",
                            "deepLink": "http:\/\/www.ba.com\/travel\/fx\/public\/en_GB?saleOption=PAKFC&depCountryPkg=GB&fromPkg=LON&packageTo=AIR_NCL_GB&ojDd=AIR_NCL_GB&ojGw=AIR_NCL_GB&adcar=2&chcar=0&infcar=0&flightCarDate=Y&carPkgAgeConfirm=true&eId=111077&depDate=27\/06\/16&retDate=29\/06\/16&cabin=M&restrictionType=Restricted&totalPrice=371.0&currencyCode=GBP",
                            "depAirportCode_1_O": "LHR",
                            "depAirportCode_2_I": "NCL",
                            "depAirportName_1_O": "Heathrow",
                            "depAirportName_2_I": "Newcastle International",
                            "departureAirport": "LON",
                            "departureDate": "2016-06-27T12:00:00Z",
                            "destinationCityName": "Newcastle International",
                            "dropOffDate": "2016-06-29T18:30:00Z",
                            "extendedLocationCode": "NCL",
                            "flightArrDate_1_O": "2016-06-27T22:05:00Z",
                            "flightArrDate_2_I": "2016-06-29T21:40:00Z",
                            "flightDepDate_1_O": "2016-06-27T20:55:00Z",
                            "flightDepDate_2_I": "2016-06-29T20:30:00Z",
                            "imgURL": "http:\/\/www.britishairways.com\/badp\/static\/external\/avis\/gb0_f_lrg01.jpg",
                            "market": "GB",
                            "packageDuration": 2,
                            "pickUpDate": "2016-06-27T22:05:00Z",
                            "pricePP": 186,
                            "totalPrice": 371
                        }, {
                            "arrAirportCode_1_O": "NCL",
                            "arrAirportCode_2_I": "LHR",
                            "arrAirportName_1_O": "Newcastle International",
                            "arrAirportName_2_I": "Heathrow",
                            "arrivalAirport": "NCL",
                            "arrivalDate": "2016-06-29T12:00:00Z",
                            "cabinCode_1_O": "M",
                            "cabinCode_2_I": "M",
                            "carDepotLocation": "Newcastle Airport",
                            "carDuration": 2,
                            "carGroup": "Group K - Mercedes C Class or similar",
                            "carGroupDescription": "Mercedes C Class or similar",
                            "carGroupDescriptionShort": "Mercedes C Class",
                            "carGroupIdentifier": "K",
                            "carGroupShort": "Group K",
                            "carRentalCompanyName": "Avis",
                            "carRentalPlan": 101,
                            "carType": "Automatic",
                            "categoryCode": "P",
                            "currencyCode": "GBP",
                            "deepLink": "http:\/\/www.ba.com\/travel\/fx\/public\/en_GB?saleOption=PAKFC&depCountryPkg=GB&fromPkg=LON&packageTo=AIR_NCL_GB&ojDd=AIR_NCL_GB&ojGw=AIR_NCL_GB&adcar=2&chcar=0&infcar=0&flightCarDate=Y&carPkgAgeConfirm=true&eId=111077&depDate=27\/06\/16&retDate=29\/06\/16&cabin=M&restrictionType=Restricted&totalPrice=642.0&currencyCode=GBP",
                            "depAirportCode_1_O": "LHR",
                            "depAirportCode_2_I": "NCL",
                            "depAirportName_1_O": "Heathrow",
                            "depAirportName_2_I": "Newcastle International",
                            "departureAirport": "LON",
                            "departureDate": "2016-06-27T12:00:00Z",
                            "destinationCityName": "Newcastle International",
                            "dropOffDate": "2016-06-29T18:30:00Z",
                            "extendedLocationCode": "NCL",
                            "flightArrDate_1_O": "2016-06-27T22:05:00Z",
                            "flightArrDate_2_I": "2016-06-29T21:40:00Z",
                            "flightDepDate_1_O": "2016-06-27T20:55:00Z",
                            "flightDepDate_2_I": "2016-06-29T20:30:00Z",
                            "imgURL": "http:\/\/www.britishairways.com\/badp\/static\/external\/avis\/gb0_k_lrg01.jpg",
                            "market": "GB",
                            "packageDuration": 2,
                            "pickUpDate": "2016-06-27T22:05:00Z",
                            "pricePP": 321,
                            "totalPrice": 642
                        }, {
                            "arrAirportCode_1_O": "NCL",
                            "arrAirportCode_2_I": "LHR",
                            "arrAirportName_1_O": "Newcastle International",
                            "arrAirportName_2_I": "Heathrow",
                            "arrivalAirport": "NCL",
                            "arrivalDate": "2016-06-29T12:00:00Z",
                            "cabinCode_1_O": "M",
                            "cabinCode_2_I": "M",
                            "carDepotLocation": "Newcastle Airport",
                            "carDuration": 2,
                            "carGroup": "Group A - Fiat 500 or similar",
                            "carGroupDescription": "Fiat 500 or similar",
                            "carGroupDescriptionShort": "Fiat 500",
                            "carGroupIdentifier": "A",
                            "carGroupShort": "Group A",
                            "carRentalCompanyName": "Avis",
                            "carRentalPlan": 101,
                            "carType": "Manual",
                            "categoryCode": "M",
                            "currencyCode": "GBP",
                            "deepLink": "http:\/\/www.ba.com\/travel\/fx\/public\/en_GB?saleOption=PAKFC&depCountryPkg=GB&fromPkg=LON&packageTo=AIR_NCL_GB&ojDd=AIR_NCL_GB&ojGw=AIR_NCL_GB&adcar=2&chcar=0&infcar=0&flightCarDate=Y&carPkgAgeConfirm=true&eId=111077&depDate=27\/06\/16&retDate=29\/06\/16&cabin=M&restrictionType=Restricted&totalPrice=310.0&currencyCode=GBP",
                            "depAirportCode_1_O": "LHR",
                            "depAirportCode_2_I": "NCL",
                            "depAirportName_1_O": "Heathrow",
                            "depAirportName_2_I": "Newcastle International",
                            "departureAirport": "LON",
                            "departureDate": "2016-06-27T12:00:00Z",
                            "destinationCityName": "Newcastle International",
                            "dropOffDate": "2016-06-29T18:30:00Z",
                            "extendedLocationCode": "NCL",
                            "flightArrDate_1_O": "2016-06-27T22:05:00Z",
                            "flightArrDate_2_I": "2016-06-29T21:40:00Z",
                            "flightDepDate_1_O": "2016-06-27T20:55:00Z",
                            "flightDepDate_2_I": "2016-06-29T20:30:00Z",
                            "imgURL": "http:\/\/www.britishairways.com\/badp\/static\/external\/avis\/gb0_a_lrg01.jpg",
                            "market": "GB",
                            "packageDuration": 2,
                            "pickUpDate": "2016-06-27T22:05:00Z",
                            "pricePP": 155,
                            "totalPrice": 310
                        }, {
                            "arrAirportCode_1_O": "NCL",
                            "arrAirportCode_2_I": "LHR",
                            "arrAirportName_1_O": "Newcastle International",
                            "arrAirportName_2_I": "Heathrow",
                            "arrivalAirport": "NCL",
                            "arrivalDate": "2016-06-29T12:00:00Z",
                            "cabinCode_1_O": "M",
                            "cabinCode_2_I": "M",
                            "carDepotLocation": "Newcastle Airport",
                            "carDuration": 2,
                            "carGroup": "Group N - Mercedes E Class or similar",
                            "carGroupDescription": "Mercedes E Class or similar",
                            "carGroupDescriptionShort": "Mercedes E Class",
                            "carGroupIdentifier": "N",
                            "carGroupShort": "Group N",
                            "carRentalCompanyName": "Avis",
                            "carRentalPlan": 101,
                            "carType": "Automatic",
                            "categoryCode": "L",
                            "currencyCode": "GBP",
                            "deepLink": "http:\/\/www.ba.com\/travel\/fx\/public\/en_GB?saleOption=PAKFC&depCountryPkg=GB&fromPkg=LON&packageTo=AIR_NCL_GB&ojDd=AIR_NCL_GB&ojGw=AIR_NCL_GB&adcar=2&chcar=0&infcar=0&flightCarDate=Y&carPkgAgeConfirm=true&eId=111077&depDate=27\/06\/16&retDate=29\/06\/16&cabin=M&restrictionType=Restricted&totalPrice=737.0&currencyCode=GBP",
                            "depAirportCode_1_O": "LHR",
                            "depAirportCode_2_I": "NCL",
                            "depAirportName_1_O": "Heathrow",
                            "depAirportName_2_I": "Newcastle International",
                            "departureAirport": "LON",
                            "departureDate": "2016-06-27T12:00:00Z",
                            "destinationCityName": "Newcastle International",
                            "dropOffDate": "2016-06-29T18:30:00Z",
                            "extendedLocationCode": "NCL",
                            "flightArrDate_1_O": "2016-06-27T22:05:00Z",
                            "flightArrDate_2_I": "2016-06-29T21:40:00Z",
                            "flightDepDate_1_O": "2016-06-27T20:55:00Z",
                            "flightDepDate_2_I": "2016-06-29T20:30:00Z",
                            "imgURL": "http:\/\/www.britishairways.com\/badp\/static\/external\/avis\/gb0_n_lrg01.jpg",
                            "market": "GB",
                            "packageDuration": 2,
                            "pickUpDate": "2016-06-27T22:05:00Z",
                            "pricePP": 369,
                            "totalPrice": 737
                        }, {
                            "arrAirportCode_1_O": "NCL",
                            "arrAirportCode_2_I": "LHR",
                            "arrAirportName_1_O": "Newcastle International",
                            "arrAirportName_2_I": "Heathrow",
                            "arrivalAirport": "NCL",
                            "arrivalDate": "2016-06-29T12:00:00Z",
                            "cabinCode_1_O": "M",
                            "cabinCode_2_I": "M",
                            "carDepotLocation": "Newcastle Airport",
                            "carDuration": 2,
                            "carGroup": "Group D - Citroen Picasso or similar",
                            "carGroupDescription": "Citroen Picasso or similar",
                            "carGroupDescriptionShort": "Citroen Picasso",
                            "carGroupIdentifier": "D",
                            "carGroupShort": "Group D",
                            "carRentalCompanyName": "Avis",
                            "carRentalPlan": 101,
                            "carType": "Manual",
                            "categoryCode": "I",
                            "currencyCode": "GBP",
                            "deepLink": "http:\/\/www.ba.com\/travel\/fx\/public\/en_GB?saleOption=PAKFC&depCountryPkg=GB&fromPkg=LON&packageTo=AIR_NCL_GB&ojDd=AIR_NCL_GB&ojGw=AIR_NCL_GB&adcar=2&chcar=0&infcar=0&flightCarDate=Y&carPkgAgeConfirm=true&eId=111077&depDate=27\/06\/16&retDate=29\/06\/16&cabin=M&restrictionType=Restricted&totalPrice=333.0&currencyCode=GBP",
                            "depAirportCode_1_O": "LHR",
                            "depAirportCode_2_I": "NCL",
                            "depAirportName_1_O": "Heathrow",
                            "depAirportName_2_I": "Newcastle International",
                            "departureAirport": "LON",
                            "departureDate": "2016-06-27T12:00:00Z",
                            "destinationCityName": "Newcastle International",
                            "dropOffDate": "2016-06-29T18:30:00Z",
                            "extendedLocationCode": "NCL",
                            "flightArrDate_1_O": "2016-06-27T22:05:00Z",
                            "flightArrDate_2_I": "2016-06-29T21:40:00Z",
                            "flightDepDate_1_O": "2016-06-27T20:55:00Z",
                            "flightDepDate_2_I": "2016-06-29T20:30:00Z",
                            "imgURL": "http:\/\/www.britishairways.com\/badp\/static\/external\/avis\/gb0_d_lrg01.jpg",
                            "market": "GB",
                            "packageDuration": 2,
                            "pickUpDate": "2016-06-27T22:05:00Z",
                            "pricePP": 167,
                            "totalPrice": 333
                        }, {
                            "arrAirportCode_1_O": "NCL",
                            "arrAirportCode_2_I": "LHR",
                            "arrAirportName_1_O": "Newcastle International",
                            "arrAirportName_2_I": "Heathrow",
                            "arrivalAirport": "NCL",
                            "arrivalDate": "2016-06-29T12:00:00Z",
                            "cabinCode_1_O": "M",
                            "cabinCode_2_I": "M",
                            "carDepotLocation": "Newcastle Airport",
                            "carDuration": 2,
                            "carGroup": "Group B - Ford Fiesta or similar",
                            "carGroupDescription": "Ford Fiesta or similar",
                            "carGroupDescriptionShort": "Ford Fiesta",
                            "carGroupIdentifier": "B",
                            "carGroupShort": "Group B",
                            "carRentalCompanyName": "Avis",
                            "carRentalPlan": 101,
                            "carType": "Manual",
                            "categoryCode": "E",
                            "currencyCode": "GBP",
                            "deepLink": "http:\/\/www.ba.com\/travel\/fx\/public\/en_GB?saleOption=PAKFC&depCountryPkg=GB&fromPkg=LON&packageTo=AIR_NCL_GB&ojDd=AIR_NCL_GB&ojGw=AIR_NCL_GB&adcar=2&chcar=0&infcar=0&flightCarDate=Y&carPkgAgeConfirm=true&eId=111077&depDate=27\/06\/16&retDate=29\/06\/16&cabin=M&restrictionType=Restricted&totalPrice=312.0&currencyCode=GBP",
                            "depAirportCode_1_O": "LHR",
                            "depAirportCode_2_I": "NCL",
                            "depAirportName_1_O": "Heathrow",
                            "depAirportName_2_I": "Newcastle International",
                            "departureAirport": "LON",
                            "departureDate": "2016-06-27T12:00:00Z",
                            "destinationCityName": "Newcastle International",
                            "dropOffDate": "2016-06-29T18:30:00Z",
                            "extendedLocationCode": "NCL",
                            "flightArrDate_1_O": "2016-06-27T22:05:00Z",
                            "flightArrDate_2_I": "2016-06-29T21:40:00Z",
                            "flightDepDate_1_O": "2016-06-27T20:55:00Z",
                            "flightDepDate_2_I": "2016-06-29T20:30:00Z",
                            "imgURL": "http:\/\/www.britishairways.com\/badp\/static\/external\/avis\/gb0_b_lrg01.jpg",
                            "market": "GB",
                            "packageDuration": 2,
                            "pickUpDate": "2016-06-27T22:05:00Z",
                            "pricePP": 156,
                            "totalPrice": 312
                        }, {
                            "arrAirportCode_1_O": "NCL",
                            "arrAirportCode_2_I": "LHR",
                            "arrAirportName_1_O": "Newcastle International",
                            "arrAirportName_2_I": "Heathrow",
                            "arrivalAirport": "NCL",
                            "arrivalDate": "2016-06-29T12:00:00Z",
                            "cabinCode_1_O": "M",
                            "cabinCode_2_I": "M",
                            "carDepotLocation": "Newcastle Airport",
                            "carDuration": 2,
                            "carGroup": "Group E - Opel\/Vauxhall Astra or similar",
                            "carGroupDescription": "Opel\/Vauxhall Astra or similar",
                            "carGroupDescriptionShort": "Opel\/Vauxhall Astra",
                            "carGroupIdentifier": "E",
                            "carGroupShort": "Group E",
                            "carRentalCompanyName": "Avis",
                            "carRentalPlan": 101,
                            "carType": "Manual",
                            "categoryCode": "C",
                            "currencyCode": "GBP",
                            "deepLink": "http:\/\/www.ba.com\/travel\/fx\/public\/en_GB?saleOption=PAKFC&depCountryPkg=GB&fromPkg=LON&packageTo=AIR_NCL_GB&ojDd=AIR_NCL_GB&ojGw=AIR_NCL_GB&adcar=2&chcar=0&infcar=0&flightCarDate=Y&carPkgAgeConfirm=true&eId=111077&depDate=27\/06\/16&retDate=29\/06\/16&cabin=M&restrictionType=Restricted&totalPrice=322.0&currencyCode=GBP",
                            "depAirportCode_1_O": "LHR",
                            "depAirportCode_2_I": "NCL",
                            "depAirportName_1_O": "Heathrow",
                            "depAirportName_2_I": "Newcastle International",
                            "departureAirport": "LON",
                            "departureDate": "2016-06-27T12:00:00Z",
                            "destinationCityName": "Newcastle International",
                            "dropOffDate": "2016-06-29T18:30:00Z",
                            "extendedLocationCode": "NCL",
                            "flightArrDate_1_O": "2016-06-27T22:05:00Z",
                            "flightArrDate_2_I": "2016-06-29T21:40:00Z",
                            "flightDepDate_1_O": "2016-06-27T20:55:00Z",
                            "flightDepDate_2_I": "2016-06-29T20:30:00Z",
                            "imgURL": "http:\/\/www.britishairways.com\/badp\/static\/external\/avis\/gb0_e_lrg01.jpg",
                            "market": "GB",
                            "packageDuration": 2,
                            "pickUpDate": "2016-06-27T22:05:00Z",
                            "pricePP": 161,
                            "totalPrice": 322
                        }]
                    }
                }';
        return $retorno;
    }

?>