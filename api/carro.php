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
    
    function procuraCarro($destino, $chegada, $saida){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.ba.com/rest-v1/v1/cars;destination='.$destino.';pickUpDate='.$chegada.';dropOffDate='.$saida.';format=.json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Client-Key: '.$chaveHotel));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;//um json gigante
    }
    
    
    //https://api.ba.com/rest-v1/v1/carPackages;origin=LHR;destination=NCL;departureDate=2016-06-27T12:00:00Z
    function exemploRetornoPacote(){
        $retorno= '{
    "CarSearchResponse": {
        "CarSearch": [{
            "AncillaryID": 1491004,
            "CarDepotLocation": "Munich Airport",
            "CarDuration": 1,
            "CarGroup": "Group A - Volkswagen Polo or similar",
            "CarGroupDescription": "Volkswagen Polo or similar",
            "CarGroupDescriptionShort": "Volkswagen Polo",
            "CarGroupIdentifier": "A",
            "CarGroupShort": "Group A",
            "CarRentalPlan": 101,
            "CarSupplier": "Avis",
            "CarType": "Manual",
            "CategoryCode": "E",
            "CurrencyCode": "GBP",
            "DailyPrice": 67,
            "DeepLink": "http:\/\/www.ba.com\/travel\/car\/public\/gb?saleOption=CO&depCountry=GB&carGOTo=MUC&ojDd=AIR_MUC_DE&ojGw=MUC&pickUpGO=26\/07\/16&dropOffGO=27\/07\/16&pickUpTimeHr=09&pickUpTimeMin=00&dropOffTimeHr=09&dropOffTimeMin=00&adcar=0&chcar=0&infcar=0&carGOAgeConfirm=true&eId=111081&totalPrice=67&currencyCode=GBP",
            "DestinationAirportCode": "MUC",
            "DestinationCityName": "Muenchen",
            "DropOffDate": "2016-07-27T12:00:00Z",
            "ExtendedLocationCode": "MUC",
            "MakeModelId": "ECMR",
            "Market": "GB",
            "PickUpDate": "2016-07-26T12:00:00Z",
            "TotalPrice": 67
        }, {
            "AncillaryID": 1491004,
            "CarDepotLocation": "Munich Airport",
            "CarDuration": 1,
            "CarGroup": "Group E - Mercedes Benz C Klasse (GPS) or similar",
            "CarGroupDescription": "Mercedes Benz C Klasse (GPS) or similar",
            "CarGroupDescriptionShort": "Mercedes Benz C Klasse (GPS)",
            "CarGroupIdentifier": "E",
            "CarGroupShort": "Group E",
            "CarRentalPlan": 101,
            "CarSupplier": "Avis",
            "CarType": "Manual",
            "CategoryCode": "F",
            "CurrencyCode": "GBP",
            "DailyPrice": 107,
            "DeepLink": "http:\/\/www.ba.com\/travel\/car\/public\/gb?saleOption=CO&depCountry=GB&carGOTo=MUC&ojDd=AIR_MUC_DE&ojGw=MUC&pickUpGO=26\/07\/16&dropOffGO=27\/07\/16&pickUpTimeHr=09&pickUpTimeMin=00&dropOffTimeHr=09&dropOffTimeMin=00&adcar=0&chcar=0&infcar=0&carGOAgeConfirm=true&eId=111081&totalPrice=107&currencyCode=GBP",
            "DestinationAirportCode": "MUC",
            "DestinationCityName": "Muenchen",
            "DropOffDate": "2016-07-27T12:00:00Z",
            "ExtendedLocationCode": "MUC",
            "MakeModelId": "FXMR",
            "Market": "GB",
            "PickUpDate": "2016-07-26T12:00:00Z",
            "TotalPrice": 107
        }, {
            "AncillaryID": 1491004,
            "CarDepotLocation": "Munich Airport",
            "CarDuration": 1,
            "CarGroup": "Group B - Volkswagen Golf or similar",
            "CarGroupDescription": "Volkswagen Golf or similar",
            "CarGroupDescriptionShort": "Volkswagen Golf",
            "CarGroupIdentifier": "B",
            "CarGroupShort": "Group B",
            "CarRentalPlan": 101,
            "CarSupplier": "Avis",
            "CarType": "Manual",
            "CategoryCode": "C",
            "CurrencyCode": "GBP",
            "DailyPrice": 77,
            "DeepLink": "http:\/\/www.ba.com\/travel\/car\/public\/gb?saleOption=CO&depCountry=GB&carGOTo=MUC&ojDd=AIR_MUC_DE&ojGw=MUC&pickUpGO=26\/07\/16&dropOffGO=27\/07\/16&pickUpTimeHr=09&pickUpTimeMin=00&dropOffTimeHr=09&dropOffTimeMin=00&adcar=0&chcar=0&infcar=0&carGOAgeConfirm=true&eId=111081&totalPrice=77&currencyCode=GBP",
            "DestinationAirportCode": "MUC",
            "DestinationCityName": "Muenchen",
            "DropOffDate": "2016-07-27T12:00:00Z",
            "ExtendedLocationCode": "MUC",
            "MakeModelId": "CDMR",
            "Market": "GB",
            "PickUpDate": "2016-07-26T12:00:00Z",
            "TotalPrice": 77
        }, {
            "AncillaryID": 1491004,
            "CarDepotLocation": "Munich Airport",
            "CarDuration": 1,
            "CarGroup": "Group D - Ford Mondeo or similar",
            "CarGroupDescription": "Ford Mondeo or similar",
            "CarGroupDescriptionShort": "Ford Mondeo",
            "CarGroupIdentifier": "D",
            "CarGroupShort": "Group D",
            "CarRentalPlan": 101,
            "CarSupplier": "Avis",
            "CarType": "Manual",
            "CategoryCode": "I",
            "CurrencyCode": "GBP",
            "DailyPrice": 94,
            "DeepLink": "http:\/\/www.ba.com\/travel\/car\/public\/gb?saleOption=CO&depCountry=GB&carGOTo=MUC&ojDd=AIR_MUC_DE&ojGw=MUC&pickUpGO=26\/07\/16&dropOffGO=27\/07\/16&pickUpTimeHr=09&pickUpTimeMin=00&dropOffTimeHr=09&dropOffTimeMin=00&adcar=0&chcar=0&infcar=0&carGOAgeConfirm=true&eId=111081&totalPrice=94&currencyCode=GBP",
            "DestinationAirportCode": "MUC",
            "DestinationCityName": "Muenchen",
            "DropOffDate": "2016-07-27T12:00:00Z",
            "ExtendedLocationCode": "MUC",
            "MakeModelId": "IDMR",
            "Market": "GB",
            "PickUpDate": "2016-07-26T12:00:00Z",
            "TotalPrice": 94
        }, {
            "AncillaryID": 1491004,
            "CarDepotLocation": "Munich Airport",
            "CarDuration": 1,
            "CarGroup": "Group J - Mercedes S Klasse (GPS) or similar",
            "CarGroupDescription": "Mercedes S Klasse (GPS) or similar",
            "CarGroupDescriptionShort": "Mercedes S Klasse (GPS)",
            "CarGroupIdentifier": "J",
            "CarGroupShort": "Group J",
            "CarRentalPlan": 101,
            "CarSupplier": "Avis",
            "CarType": "Automatic",
            "CategoryCode": "L",
            "CurrencyCode": "GBP",
            "DailyPrice": 222,
            "DeepLink": "http:\/\/www.ba.com\/travel\/car\/public\/gb?saleOption=CO&depCountry=GB&carGOTo=MUC&ojDd=AIR_MUC_DE&ojGw=MUC&pickUpGO=26\/07\/16&dropOffGO=27\/07\/16&pickUpTimeHr=09&pickUpTimeMin=00&dropOffTimeHr=09&dropOffTimeMin=00&adcar=0&chcar=0&infcar=0&carGOAgeConfirm=true&eId=111081&totalPrice=222&currencyCode=GBP",
            "DestinationAirportCode": "MUC",
            "DestinationCityName": "Muenchen",
            "DropOffDate": "2016-07-27T12:00:00Z",
            "ExtendedLocationCode": "MUC",
            "MakeModelId": "LXAR",
            "Market": "GB",
            "PickUpDate": "2016-07-26T12:00:00Z",
            "TotalPrice": 222
        }, {
            "AncillaryID": 1491004,
            "CarDepotLocation": "Munich Airport",
            "CarDuration": 1,
            "CarGroup": "Group F - Mercedes E-Klasse (GPS) or similar",
            "CarGroupDescription": "Mercedes E-Klasse (GPS) or similar",
            "CarGroupDescriptionShort": "Mercedes E-Klasse (GPS)",
            "CarGroupIdentifier": "F",
            "CarGroupShort": "Group F",
            "CarRentalPlan": 101,
            "CarSupplier": "Avis",
            "CarType": "Automatic",
            "CategoryCode": "P",
            "CurrencyCode": "GBP",
            "DailyPrice": 147,
            "DeepLink": "http:\/\/www.ba.com\/travel\/car\/public\/gb?saleOption=CO&depCountry=GB&carGOTo=MUC&ojDd=AIR_MUC_DE&ojGw=MUC&pickUpGO=26\/07\/16&dropOffGO=27\/07\/16&pickUpTimeHr=09&pickUpTimeMin=00&dropOffTimeHr=09&dropOffTimeMin=00&adcar=0&chcar=0&infcar=0&carGOAgeConfirm=true&eId=111081&totalPrice=147&currencyCode=GBP",
            "DestinationAirportCode": "MUC",
            "DestinationCityName": "Muenchen",
            "DropOffDate": "2016-07-27T12:00:00Z",
            "ExtendedLocationCode": "MUC",
            "MakeModelId": "PXAR",
            "Market": "GB",
            "PickUpDate": "2016-07-26T12:00:00Z",
            "TotalPrice": 147
        }]
    }
}';
        return $retorno;
    }

?>