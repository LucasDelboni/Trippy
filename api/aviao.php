<?php
    require_once 'chaves.php';
    //retorna o menor preco para uma determinada rota dentor d 1 ano ou 1 mes
    //cabine pode ser 'economy' 'premiumEcononmy'...
    //format pode ser json ou xml
    //https://developer.ba.com/io-docs
    function menorPreco($origem, $destino, $cabine, $tipo, $range, $formato){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.ba.com/rest-v1/v1/flightOfferBasic;departureCity='.$origem
        .';arrivalCity='.$destino.';cabin='.$cabine.';journeyType='.$tipo.';range='.$range.'.'.$formato);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Client-Key: 79hzmmeae79pbh47gccrymmr'));
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;//um json gigante
    }
    
    function destinos(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.ba.com/rest-v1/v1/balocations');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Client-Key: '.$chaveAviao));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;//um json gigante
    
    }
    
    //usar essa funcao para testar e nao gastar a api dos cara
    function respostaLocation(){
        return '{"GetBA_LocationsResponse":{"Country":[{"CountryName":"United Arab Emirates","CountryCode":"AE","City":[{"CityName":"Abu Dhabi","CityCode":"AUH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Abu Dhabi","AirportCode":"AUH","Position":{"Latitude":24.43,"Longitude":54.65}}},{"CityName":"Dubai","CityCode":"DXB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Dubai","AirportCode":"DXB","Position":{"Latitude":25.25,"Longitude":55.36}}}]},{"CountryName":"Antigua","CountryCode":"AG","City":{"CityName":"Antigua","CityCode":"ANU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Antigua","AirportCode":"ANU","Position":{"Latitude":17.14,"Longitude":-61.79}}}},{"CountryName":"Albania","CountryCode":"AL","City":{"CityName":"Tirana","CityCode":"TIA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tirana","AirportCode":"TIA","Position":{"Latitude":41.41,"Longitude":19.72}}}},{"CountryName":"Angola","CountryCode":"AO","City":{"CityName":"Luanda","CityCode":"LAD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Luanda","AirportCode":"LAD","Position":{"Latitude":-8.86,"Longitude":13.23}}}},{"CountryName":"Argentina","CountryCode":"AR","City":{"CityName":"Buenos Aires","CityCode":"BUE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Buenos Aires","AirportCode":"EZE","Position":{"Latitude":-34.82,"Longitude":-58.54}}}},{"CountryName":"Austria","CountryCode":"AT","City":[{"CityName":"Salzburg","CityCode":"SZG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Salzburg","AirportCode":"SZG","Position":{"Latitude":47.79,"Longitude":13}}},{"CityName":"Vienna","CityCode":"VIE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Vienna","AirportCode":"VIE","Position":{"Latitude":48.11,"Longitude":16.57}}}]},{"CountryName":"Australia","CountryCode":"AU","City":[{"CityName":"Albury","CityCode":"ABX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Albury","AirportCode":"ABX","Position":{"Latitude":-36.07,"Longitude":146.96}}},{"CityName":"Adelaide","CityCode":"ADL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Adelaide","AirportCode":"ADL","Position":{"Latitude":-34.95,"Longitude":138.53}}},{"CityName":"Brisbane","CityCode":"BNE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Brisbane","AirportCode":"BNE","Position":{"Latitude":-27.38,"Longitude":153.12}}},{"CityName":"Canberra","CityCode":"CBR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Canberra","AirportCode":"CBR","Position":{"Latitude":-35.31,"Longitude":149.2}}},{"CityName":"Coffs Harbour","CityCode":"CFS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Coffs Harbour","AirportCode":"CFS","Position":{"Latitude":-30.32,"Longitude":153.12}}},{"CityName":"Cairns","CityCode":"CNS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cairns","AirportCode":"CNS","Position":{"Latitude":-16.89,"Longitude":145.76}}},{"CityName":"Melbourne","CityCode":"MEL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Melbourne","AirportCode":"MEL","Position":{"Latitude":-37.67,"Longitude":144.84}}},{"CityName":"Gold Coast","CityCode":"OOL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Gold Coast","AirportCode":"OOL","Position":{"Latitude":-28.16,"Longitude":153.5}}},{"CityName":"Perth","CityCode":"PER","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Perth","AirportCode":"PER","Position":{"Latitude":-31.94,"Longitude":115.97}}},{"CityName":"Sydney","CityCode":"SYD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Sydney","AirportCode":"SYD","Position":{"Latitude":-33.95,"Longitude":151.18}}}]},{"CountryName":"Aruba","CountryCode":"AW","City":{"CityName":"Aruba","CityCode":"AUA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Aruba","AirportCode":"AUA","Position":{"Latitude":12.5,"Longitude":-70.02}}}},{"CountryName":"Barbados","CountryCode":"BB","City":{"CityName":"Bridgetown (Barbados)","CityCode":"BGI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bridgetown","AirportCode":"BGI","Position":{"Latitude":13.07,"Longitude":-59.49}}}},{"CountryName":"Bangladesh","CountryCode":"BD","City":{"CityName":"Dhaka","CityCode":"DAC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Hazrat Shahjalal Intl","AirportCode":"DAC","Position":{"Latitude":23.84,"Longitude":90.4}}}},{"CountryName":"Belgium","CountryCode":"BE","City":{"CityName":"Brussels","CityCode":"BRU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Brussels","AirportCode":"BRU","Position":{"Latitude":50.9,"Longitude":4.48}}}},{"CountryName":"Bulgaria","CountryCode":"BG","City":{"CityName":"Sofia","CityCode":"SOF","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Sofia","AirportCode":"SOF","Position":{"Latitude":42.7,"Longitude":23.41}}}},{"CountryName":"Bahrain","CountryCode":"BH","City":{"CityName":"Bahrain","CityCode":"BAH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bahrain","AirportCode":"BAH","Position":{"Latitude":26.27,"Longitude":50.63}}}},{"CountryName":"Bermuda","CountryCode":"BM","City":{"CityName":"Bermuda","CityCode":"BDA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bermuda","AirportCode":"BDA","Position":{"Latitude":32.36,"Longitude":-64.68}}}},{"CountryName":"Brazil","CountryCode":"BR","City":[{"CityName":"Rio de Janeiro ","CityCode":"RIO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Rio De janeiro Intl","AirportCode":"GIG","Position":{"Latitude":-22.81,"Longitude":-43.25}}},{"CityName":"Sao Paulo","CityCode":"SAO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Guarulhos Intl","AirportCode":"GRU","Position":{"Latitude":-23.44,"Longitude":-46.47}}}]},{"CountryName":"Bahamas","CountryCode":"BS","City":{"CityName":"Nassau","CityCode":"NAS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Nassau","AirportCode":"NAS","Position":{"Latitude":25.04,"Longitude":-77.47}}}},{"CountryName":"Belize","CountryCode":"BZ","City":{"CityName":"Belize City","CityCode":"BZE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"P.S.W. Goldson Intl","AirportCode":"BZE","Position":{"Latitude":17.54,"Longitude":-88.31}}}},{"CountryName":"Canada","CountryCode":"CA","City":[{"CityName":"Montreal","CityCode":"YMQ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Montreal","AirportCode":"YUL","Position":{"Latitude":45.47,"Longitude":-73.74}}},{"CityName":"Toronto","CityCode":"YTO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Toronto","AirportCode":"YYZ","Position":{"Latitude":43.68,"Longitude":-79.63}}},{"CityName":"Vancouver","CityCode":"YVR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Vancouver","AirportCode":"YVR","Position":{"Latitude":49.19,"Longitude":-123.18}}},{"CityName":"Calgary","CityCode":"YYC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Calgary","AirportCode":"YYC","Position":{"Latitude":51.12,"Longitude":-114.01}}}]},{"CountryName":"Switzerland","CountryCode":"CH","City":[{"CityName":"Basel","CityCode":"BSL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Basel","AirportCode":"BSL","Position":{"Latitude":47.59,"Longitude":7.53}}},{"CityName":"Geneva","CityCode":"GVA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Geneva","AirportCode":"GVA","Position":{"Latitude":46.24,"Longitude":6.11}}},{"CityName":"Zurich","CityCode":"ZRH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Zurich","AirportCode":"ZRH","Position":{"Latitude":47.46,"Longitude":8.55}}}]},{"CountryName":"Chile","CountryCode":"CL","City":{"CityName":"Santiago","CityCode":"SCL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Santiago","AirportCode":"SCL","Position":{"Latitude":-33.39,"Longitude":-70.79}}}},{"CountryName":"China","CountryCode":"CN","City":[{"CityName":"Beijing","CityCode":"BJS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Beijing","AirportCode":"PEK","Position":{"Latitude":40.07,"Longitude":116.6}}},{"CityName":"Chengdu","CityCode":"CTU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Chengdu","AirportCode":"CTU","Position":{"Latitude":30.58,"Longitude":103.95}}},{"CityName":"Shanghai","CityCode":"SHA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Pu Dong","AirportCode":"PVG","Position":{"Latitude":31.15,"Longitude":121.79}}}]},{"CountryName":"Colombia","CountryCode":"CO","City":[{"CityName":"Bogota","CityCode":"BOG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bogota","AirportCode":"BOG","Position":{"Latitude":4.7,"Longitude":-74.15}}},{"CityName":"Cali","CityCode":"CLO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cali","AirportCode":"CLO","Position":{"Latitude":3.54,"Longitude":-76.38}}},{"CityName":"Medellin","CityCode":"MDE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Jose Cordoba Apo","AirportCode":"MDE","Position":{"Latitude":6.16,"Longitude":-75.42}}}]},{"CountryName":"Costa Rica","CountryCode":"CR","City":{"CityName":"San Jose (Costa Rica)","CityCode":"SJO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"San Jose","AirportCode":"SJO","Position":{"Latitude":9.99,"Longitude":-84.21}}}},{"CountryName":"Cyprus","CountryCode":"CY","City":[{"CityName":"Larnaca","CityCode":"LCA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Larnaca","AirportCode":"LCA","Position":{"Latitude":34.88,"Longitude":33.63}}},{"CityName":"Paphos","CityCode":"PFO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Paphos","AirportCode":"PFO","Position":{"Latitude":34.72,"Longitude":32.49}}}]},{"CountryName":"Czech Republic","CountryCode":"CZ","City":{"CityName":"Prague","CityCode":"PRG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Prague","AirportCode":"PRG","Position":{"Latitude":50.1,"Longitude":14.26}}}},{"CountryName":"Germany","CountryCode":"DE","City":[{"CityName":"Berlin","CityCode":"BER","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tegel","AirportCode":"TXL","Position":{"Latitude":52.56,"Longitude":13.29}}},{"CityName":"Cologne","CityCode":"CGN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cologne","AirportCode":"CGN","Position":{"Latitude":50.87,"Longitude":7.14}}},{"CityName":"Dresden","CityCode":"DRS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Dresden","AirportCode":"DRS","Position":{"Latitude":51.13,"Longitude":13.77}}},{"CityName":"Dusseldorf","CityCode":"DUS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Dusseldorf","AirportCode":"DUS","Position":{"Latitude":51.28,"Longitude":6.76}}},{"CityName":"Frankfurt","CityCode":"FRA","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Frankfurt","AirportCode":"FRA","Position":{"Latitude":50.03,"Longitude":8.57}},{"AirportName":"HAHN","AirportCode":"HHN","Position":{"Latitude":49.95,"Longitude":7.26}}]},{"CityName":"Hanover","CityCode":"HAJ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Hanover","AirportCode":"HAJ","Position":{"Latitude":52.46,"Longitude":9.68}}},{"CityName":"Hamburg","CityCode":"HAM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Hamburg","AirportCode":"HAM","Position":{"Latitude":53.63,"Longitude":9.99}}},{"CityName":"Munich","CityCode":"MUC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Munich","AirportCode":"MUC","Position":{"Latitude":48.35,"Longitude":11.79}}},{"CityName":"Nuremberg","CityCode":"NUE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Nuremberg","AirportCode":"NUE","Position":{"Latitude":49.5,"Longitude":11.07}}},{"CityName":"Stuttgart","CityCode":"STR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Stuttgart","AirportCode":"STR","Position":{"Latitude":48.69,"Longitude":9.22}}}]},{"CountryName":"Denmark","CountryCode":"DK","City":[{"CityName":"Aalborg","CityCode":"AAL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Aalborg","AirportCode":"AAL","Position":{"Latitude":57.09,"Longitude":9.85}}},{"CityName":"Aarhus","CityCode":"AAR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Aarhus","AirportCode":"AAR","Position":{"Latitude":56.3,"Longitude":10.62}}},{"CityName":"Billund","CityCode":"BLL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Billund","AirportCode":"BLL","Position":{"Latitude":55.74,"Longitude":9.15}}},{"CityName":"Copenhagen","CityCode":"CPH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Copenhagen","AirportCode":"CPH","Position":{"Latitude":55.62,"Longitude":12.66}}}]},{"CountryName":"Dominican Rep","CountryCode":"DO","City":[{"CityName":"Puerto Plata","CityCode":"POP","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Puerto Plata","AirportCode":"POP","Position":{"Latitude":19.76,"Longitude":-70.57}}},{"CityName":"Punta Cana","CityCode":"PUJ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Punta Cana","AirportCode":"PUJ","Position":{"Latitude":18.57,"Longitude":-68.37}}},{"CityName":"Santo Domingo","CityCode":"SDQ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Santo Domingo","AirportCode":"SDQ","Position":{"Latitude":18.43,"Longitude":-69.67}}}]},{"CountryName":"Algeria","CountryCode":"DZ","City":{"CityName":"Algiers","CityCode":"ALG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Algiers","AirportCode":"ALG","Position":{"Latitude":36.69,"Longitude":3.21}}}},{"CountryName":"Estonia","CountryCode":"EE","City":{"CityName":"Tallinn","CityCode":"TLL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tallinn","AirportCode":"TLL","Position":{"Latitude":59.41,"Longitude":24.83}}}},{"CountryName":"Egypt","CountryCode":"EG","City":{"CityName":"Cairo","CityCode":"CAI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cairo","AirportCode":"CAI","Position":{"Latitude":30.11,"Longitude":31.41}}}},{"CountryName":"Spain","CountryCode":"ES","City":[{"CityName":"Arrecife","CityCode":"ACE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Arrecife","AirportCode":"ACE","Position":{"Latitude":28.95,"Longitude":-13.61}}},{"CityName":"Malaga","CityCode":"AGP","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Malaga","AirportCode":"AGP","Position":{"Latitude":36.67,"Longitude":-4.5}}},{"CityName":"Alicante","CityCode":"ALC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Alicante","AirportCode":"ALC","Position":{"Latitude":38.28,"Longitude":-0.56}}},{"CityName":"Barcelona","CityCode":"BCN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Barcelona","AirportCode":"BCN","Position":{"Latitude":41.3,"Longitude":2.08}}},{"CityName":"Bilbao","CityCode":"BIO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bilbao","AirportCode":"BIO","Position":{"Latitude":43.3,"Longitude":-2.91}}},{"CityName":"San Sebastian","CityCode":"EAS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"San Sebastian","AirportCode":"EAS","Position":{"Latitude":43.36,"Longitude":-1.79}}},{"CityName":"Fuerteventura","CityCode":"FUE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Fuerteventura","AirportCode":"FUE","Position":{"Latitude":28.45,"Longitude":-13.86}}},{"CityName":"Granada","CityCode":"GRX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Granada","AirportCode":"GRX","Position":{"Latitude":37.19,"Longitude":-3.78}}},{"CityName":"Ibiza","CityCode":"IBZ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Ibiza","AirportCode":"IBZ","Position":{"Latitude":38.87,"Longitude":1.37}}},{"CityName":"La Coruna","CityCode":"LCG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"La Coruna","AirportCode":"LCG","Position":{"Latitude":43.3,"Longitude":-8.38}}},{"CityName":"Almeria","CityCode":"LEI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Almeria","AirportCode":"LEI","Position":{"Latitude":36.84,"Longitude":-2.37}}},{"CityName":"Gran Canaria","CityCode":"LPA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Gran Canaria","AirportCode":"LPA","Position":{"Latitude":27.93,"Longitude":-15.39}}},{"CityName":"Madrid","CityCode":"MAD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Madrid","AirportCode":"MAD","Position":{"Latitude":40.47,"Longitude":-3.56}}},{"CityName":"Menorca","CityCode":"MAH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Menorca","AirportCode":"MAH","Position":{"Latitude":39.86,"Longitude":4.22}}},{"CityName":"Murcia","CityCode":"MJV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Murcia","AirportCode":"MJV","Position":{"Latitude":37.77,"Longitude":-0.81}}},{"CityName":"Melilla","CityCode":"MLN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Melilla","AirportCode":"MLN","Position":{"Latitude":35.28,"Longitude":-2.96}}},{"CityName":"Asturias","CityCode":"OVD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Asturias","AirportCode":"OVD","Position":{"Latitude":43.56,"Longitude":-6.03}}},{"CityName":"Palma","CityCode":"PMI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Palma","AirportCode":"PMI","Position":{"Latitude":39.55,"Longitude":2.74}}},{"CityName":"Pamplona","CityCode":"PNA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Pamplona","AirportCode":"PNA","Position":{"Latitude":42.77,"Longitude":-1.65}}},{"CityName":"Reus","CityCode":"REU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Reus","AirportCode":"REU","Position":{"Latitude":41.15,"Longitude":1.17}}},{"CityName":"Santiago De Compostela","CityCode":"SCQ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Santiago De Compostela","AirportCode":"SCQ","Position":{"Latitude":42.9,"Longitude":-8.42}}},{"CityName":"Santander","CityCode":"SDR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Santander","AirportCode":"SDR","Position":{"Latitude":43.43,"Longitude":-3.82}}},{"CityName":"Santa Cruz de la Palma","CityCode":"SPC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"La Palma","AirportCode":"SPC","Position":{"Latitude":28.63,"Longitude":-17.76}}},{"CityName":"Seville","CityCode":"SVQ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Seville","AirportCode":"SVQ","Position":{"Latitude":37.42,"Longitude":-5.9}}},{"CityName":"Tenerife","CityCode":"TCI","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Norte Los Rodeos","AirportCode":"TFN","Position":{"Latitude":28.48,"Longitude":-16.34}},{"AirportName":"Sur Reina Sofia","AirportCode":"TFS","Position":{"Latitude":28.04,"Longitude":-16.57}}]},{"CityName":"Vigo","CityCode":"VGO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Vigo","AirportCode":"VGO","Position":{"Latitude":42.23,"Longitude":-8.63}}},{"CityName":"Valencia","CityCode":"VLC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Valencia","AirportCode":"VLC","Position":{"Latitude":39.49,"Longitude":-0.48}}},{"CityName":"Jerez De La Frontera","CityCode":"XRY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Jerez De La Frontera","AirportCode":"XRY","Position":{"Latitude":36.74,"Longitude":-6.06}}}]},{"CountryName":"Ethiopia","CountryCode":"ET","City":{"CityName":"Addis Ababa","CityCode":"ADD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Addis Ababa","AirportCode":"ADD","Position":{"Latitude":8.98,"Longitude":38.8}}}},{"CountryName":"Finland","CountryCode":"FI","City":[{"CityName":"Helsinki","CityCode":"HEL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Helsinki","AirportCode":"HEL","Position":{"Latitude":60.32,"Longitude":24.96}}},{"CityName":"Oulu","CityCode":"OUL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Oulu","AirportCode":"OUL","Position":{"Latitude":64.93,"Longitude":25.36}}}]},{"CountryName":"France","CountryCode":"FR","City":[{"CityName":"Angers","CityCode":"ANE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Angers","AirportCode":"ANE","Position":{"Latitude":47.56,"Longitude":-0.31}}},{"CityName":"Bastia","CityCode":"BIA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bastia","AirportCode":"BIA","Position":{"Latitude":42.55,"Longitude":9.48}}},{"CityName":"Biarritz","CityCode":"BIQ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Biarritz","AirportCode":"BIQ","Position":{"Latitude":43.47,"Longitude":-1.53}}},{"CityName":"Bordeaux","CityCode":"BOD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bordeaux","AirportCode":"BOD","Position":{"Latitude":44.83,"Longitude":-0.72}}},{"CityName":"BERGERAC","CityCode":"EGC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"BERGERAC","AirportCode":"EGC","Position":{"Latitude":44.82,"Longitude":0.52}}},{"CityName":"Figari","CityCode":"FSC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Figari","AirportCode":"FSC","Position":{"Latitude":41.5,"Longitude":9.1}}},{"CityName":"Lyon","CityCode":"LYS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lyon (Saint Exupery)","AirportCode":"LYS","Position":{"Latitude":45.73,"Longitude":5.08}}},{"CityName":"Marseille","CityCode":"MRS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Marseille","AirportCode":"MRS","Position":{"Latitude":43.44,"Longitude":5.22}}},{"CityName":"Nice","CityCode":"NCE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Nice","AirportCode":"NCE","Position":{"Latitude":43.67,"Longitude":7.22}}},{"CityName":"Paris ","CityCode":"PAR","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Charles de Gaulle","AirportCode":"CDG","Position":{"Latitude":49.01,"Longitude":2.55}},{"AirportName":"Orly","AirportCode":"ORY","Position":{"Latitude":48.72,"Longitude":2.38}}]},{"CityName":"Perpignan","CityCode":"PGF","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Perpignan","AirportCode":"PGF","Position":{"Latitude":42.74,"Longitude":2.87}}},{"CityName":"Toulouse","CityCode":"TLS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Toulouse","AirportCode":"TLS","Position":{"Latitude":43.64,"Longitude":1.37}}},{"CityName":"Quimper","CityCode":"UIP","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cornouaille","AirportCode":"UIP","Position":{"Latitude":47.98,"Longitude":-4.17}}}]},{"CountryName":"United Kingdom","CountryCode":"GB","City":[{"CityName":"Aberdeen","CityCode":"ABZ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Aberdeen","AirportCode":"ABZ","Position":{"Latitude":57.2,"Longitude":-2.2}}},{"CityName":"Belfast","CityCode":"BFS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Belfast City Airport","AirportCode":"BHD","Position":{"Latitude":54.62,"Longitude":-5.87}}},{"CityName":"Birmingham","CityCode":"BHX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Birmingham","AirportCode":"BHX","Position":{"Latitude":52.45,"Longitude":-1.75}}},{"CityName":"Bristol","CityCode":"BRS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bristol","AirportCode":"BRS","Position":{"Latitude":51.38,"Longitude":-2.72}}},{"CityName":"Cambridge","CityCode":"CBG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cambridge","AirportCode":"CBG","Position":{"Latitude":52.21,"Longitude":0.18}}},{"CityName":"Cardiff","CityCode":"CWL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cardiff","AirportCode":"CWL","Position":{"Latitude":51.4,"Longitude":-3.34}}},{"CityName":"DONCASTER","CityCode":"DSA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"SHEFFIELD","AirportCode":"DSA","Position":{"Latitude":53.48,"Longitude":-1}}},{"CityName":"Edinburgh","CityCode":"EDI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Edinburgh","AirportCode":"EDI","Position":{"Latitude":55.95,"Longitude":-3.37}}},{"CityName":"Glasgow","CityCode":"GLA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Glasgow","AirportCode":"GLA","Position":{"Latitude":55.87,"Longitude":-4.43}}},{"CityName":"Humberside","CityCode":"HUY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Humberside","AirportCode":"HUY","Position":{"Latitude":53.57,"Longitude":-0.35}}},{"CityName":"Inverness","CityCode":"INV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Inverness","AirportCode":"INV","Position":{"Latitude":57.54,"Longitude":-4.05}}},{"CityName":"Isle of Man","CityCode":"IOM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Isle of Man","AirportCode":"IOM","Position":{"Latitude":54.08,"Longitude":-4.62}}},{"CityName":"Jersey","CityCode":"JER","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Jersey","AirportCode":"JER","Position":{"Latitude":49.21,"Longitude":-2.2}}},{"CityName":"Kirkwall","CityCode":"KOI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kirkwall","AirportCode":"KOI","Position":{"Latitude":58.96,"Longitude":-2.9}}},{"CityName":"Leeds","CityCode":"LBA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Leeds Bradford International","AirportCode":"LBA","Position":{"Latitude":53.87,"Longitude":-1.66}}},{"CityName":"London","CityCode":"LON","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"City Airport","AirportCode":"LCY","Position":{"Latitude":51.51,"Longitude":0.06}},{"AirportName":"Gatwick","AirportCode":"LGW","Position":{"Latitude":51.15,"Longitude":-0.19}},{"AirportName":"Heathrow","AirportCode":"LHR","Position":{"Latitude":51.48,"Longitude":-0.46}},{"AirportName":"Luton","AirportCode":"LTN","Position":{"Latitude":51.87,"Longitude":-0.37}},{"AirportName":"Southend","AirportCode":"SEN","Position":{"Latitude":51.57,"Longitude":0.69}},{"AirportName":"Stansted","AirportCode":"STN","Position":{"Latitude":51.89,"Longitude":0.24}}]},{"CityName":"Liverpool","CityCode":"LPL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Liverpool","AirportCode":"LPL","Position":{"Latitude":53.33,"Longitude":-2.85}}},{"CityName":"Manchester","CityCode":"MAN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Manchester","AirportCode":"MAN","Position":{"Latitude":53.35,"Longitude":-2.28}}},{"CityName":"Newcastle","CityCode":"NCL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Newcastle International","AirportCode":"NCL","Position":{"Latitude":55.04,"Longitude":-1.69}}},{"CityName":"Newquay","CityCode":"NQY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Newquay","AirportCode":"NQY","Position":{"Latitude":50.44,"Longitude":-5}}},{"CityName":"Shetland Islands","CityCode":"SDZ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Sumburgh","AirportCode":"LSI","Position":{"Latitude":59.88,"Longitude":-1.3}}},{"CityName":"Stornoway","CityCode":"SYY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Stornoway","AirportCode":"SYY","Position":{"Latitude":58.21,"Longitude":-6.33}}}]},{"CountryName":"Grenada","CountryCode":"GD","City":{"CityName":"Grenada","CityCode":"GND","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Grenada","AirportCode":"GND","Position":{"Latitude":12,"Longitude":-61.79}}}},{"CountryName":"Ghana","CountryCode":"GH","City":{"CityName":"Accra","CityCode":"ACC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Accra","AirportCode":"ACC","Position":{"Latitude":5.6,"Longitude":-0.17}}}},{"CountryName":"Gibraltar (UK)","CountryCode":"GI","City":{"CityName":"Gibraltar","CityCode":"GIB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Gibraltar","AirportCode":"GIB","Position":{"Latitude":36.15,"Longitude":-5.35}}}},{"CountryName":"Greece","CountryCode":"GR","City":[{"CityName":"Athens","CityCode":"ATH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Athens","AirportCode":"ATH","Position":{"Latitude":37.94,"Longitude":23.94}}},{"CityName":"Corfu","CityCode":"CFU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kapodistrais","AirportCode":"CFU","Position":{"Latitude":39.6,"Longitude":19.91}}},{"CityName":"Chania","CityCode":"CHQ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Chania","AirportCode":"CHQ","Position":{"Latitude":35.53,"Longitude":24.15}}},{"CityName":"Heraklion","CityCode":"HER","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Heraklion","AirportCode":"HER","Position":{"Latitude":35.34,"Longitude":25.18}}},{"CityName":"Mykonos","CityCode":"JMK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Mikonos","AirportCode":"JMK","Position":{"Latitude":37.44,"Longitude":25.35}}},{"CityName":"Thira","CityCode":"JTR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Thira","AirportCode":"JTR","Position":{"Latitude":36.4,"Longitude":25.48}}},{"CityName":"Kos","CityCode":"KGS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kos","AirportCode":"KGS","Position":{"Latitude":36.79,"Longitude":27.09}}},{"CityName":"Kalamata","CityCode":"KLX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kalamata","AirportCode":"KLX","Position":{"Latitude":37.07,"Longitude":22.03}}},{"CityName":"Lemnos","CityCode":"LXS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lemnos","AirportCode":"LXS","Position":{"Latitude":39.92,"Longitude":25.24}}},{"CityName":"Preveza","CityCode":"PVK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Preveza","AirportCode":"PVK","Position":{"Latitude":38.93,"Longitude":20.77}}},{"CityName":"Rhodes","CityCode":"RHO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Rhodes","AirportCode":"RHO","Position":{"Latitude":36.41,"Longitude":28.09}}},{"CityName":"Thessaloniki","CityCode":"SKG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Thessaloniki","AirportCode":"SKG","Position":{"Latitude":40.52,"Longitude":22.97}}}]},{"CountryName":"Guatemala","CountryCode":"GT","City":{"CityName":"Guatemala City","CityCode":"GUA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Guatemala City","AirportCode":"GUA","Position":{"Latitude":14.58,"Longitude":-90.53}}}},{"CountryName":"Hong Kong","CountryCode":"HK","City":{"CityName":"Hong Kong","CityCode":"HKG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Hong Kong","AirportCode":"HKG","Position":{"Latitude":22.31,"Longitude":113.91}}}},{"CountryName":"Croatia","CountryCode":"HR","City":[{"CityName":"Dubrovnik","CityCode":"DBV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Dubrovnik","AirportCode":"DBV","Position":{"Latitude":42.56,"Longitude":18.27}}},{"CityName":"Split","CityCode":"SPU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Split","AirportCode":"SPU","Position":{"Latitude":43.54,"Longitude":16.3}}},{"CityName":"Zagreb","CityCode":"ZAG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Zagreb","AirportCode":"ZAG","Position":{"Latitude":45.74,"Longitude":16.07}}}]},{"CountryName":"Hungary","CountryCode":"HU","City":{"CityName":"Budapest","CityCode":"BUD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Budapest","AirportCode":"BUD","Position":{"Latitude":47.44,"Longitude":19.26}}}},{"CountryName":"Indonesia","CountryCode":"ID","City":[{"CityName":"Jakarta ","CityCode":"JKT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Soekarno Hatta Intl","AirportCode":"CGK","Position":{"Latitude":-6.12,"Longitude":106.66}}},{"CityName":"Surabaya","CityCode":"SUB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Surabaya","AirportCode":"SUB","Position":{"Latitude":-7.38,"Longitude":112.78}}}]},{"CountryName":"Ireland","CountryCode":"IE","City":[{"CityName":"Carrickfinn","CityCode":"CFN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Carrickfinn","AirportCode":"CFN","Position":{"Latitude":55.04,"Longitude":-8.34}}},{"CityName":"Dublin","CityCode":"DUB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Dublin","AirportCode":"DUB","Position":{"Latitude":53.42,"Longitude":-6.27}}},{"CityName":"Kerry County","CityCode":"KIR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kerry County","AirportCode":"KIR","Position":{"Latitude":52.18,"Longitude":-9.52}}},{"CityName":"Knock","CityCode":"NOC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Knock","AirportCode":"NOC","Position":{"Latitude":53.91,"Longitude":-8.82}}},{"CityName":"Cork","CityCode":"ORK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cork","AirportCode":"ORK","Position":{"Latitude":51.84,"Longitude":-8.49}}},{"CityName":"Shannon","CityCode":"SNN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Shannon","AirportCode":"SNN","Position":{"Latitude":52.7,"Longitude":-8.92}}}]},{"CountryName":"Israel","CountryCode":"IL","City":{"CityName":"Tel Aviv","CityCode":"TLV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tel Aviv","AirportCode":"TLV","Position":{"Latitude":32.01,"Longitude":34.89}}}},{"CountryName":"India","CountryCode":"IN","City":[{"CityName":"Bengaluru","CityCode":"BLR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bangalore","AirportCode":"BLR","Position":{"Latitude":13.2,"Longitude":77.71}}},{"CityName":"Mumbai","CityCode":"BOM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Chhatrapati Shivaji Intl","AirportCode":"BOM","Position":{"Latitude":19.09,"Longitude":72.87}}},{"CityName":"New Delhi","CityCode":"DEL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Indira Gandhi Intl","AirportCode":"DEL","Position":{"Latitude":28.57,"Longitude":77.11}}},{"CityName":"Hyderabad","CityCode":"HYD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Rajiv Gandhi Intl","AirportCode":"HYD","Position":{"Latitude":17.24,"Longitude":78.43}}},{"CityName":"Chennai","CityCode":"MAA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Chennai","AirportCode":"MAA","Position":{"Latitude":13,"Longitude":80.18}}}]},{"CountryName":"Iceland","CountryCode":"IS","City":{"CityName":"Reykjavik","CityCode":"REK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Keflavik","AirportCode":"KEF","Position":{"Latitude":63.99,"Longitude":-22.61}}}},{"CountryName":"Italy","CountryCode":"IT","City":[{"CityName":"Bologna","CityCode":"BLQ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bologna","AirportCode":"BLQ","Position":{"Latitude":44.53,"Longitude":11.3}}},{"CityName":"Bari","CityCode":"BRI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bari","AirportCode":"BRI","Position":{"Latitude":41.14,"Longitude":16.77}}},{"CityName":"Cagliari","CityCode":"CAG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cagliari","AirportCode":"CAG","Position":{"Latitude":39.25,"Longitude":9.06}}},{"CityName":"Catania","CityCode":"CTA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Catania","AirportCode":"CTA","Position":{"Latitude":37.47,"Longitude":15.06}}},{"CityName":"Florence","CityCode":"FLR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Peretola","AirportCode":"FLR","Position":{"Latitude":43.81,"Longitude":11.2}}},{"CityName":"Genoa","CityCode":"GOA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Genoa","AirportCode":"GOA","Position":{"Latitude":44.41,"Longitude":8.84}}},{"CityName":"Milan","CityCode":"MIL","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Linate","AirportCode":"LIN","Position":{"Latitude":45.45,"Longitude":9.28}},{"AirportName":"Malpensa","AirportCode":"MXP","Position":{"Latitude":45.63,"Longitude":8.72}}]},{"CityName":"Naples","CityCode":"NAP","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Naples","AirportCode":"NAP","Position":{"Latitude":40.88,"Longitude":14.29}}},{"CityName":"Olbia","CityCode":"OLB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Olbia","AirportCode":"OLB","Position":{"Latitude":40.9,"Longitude":9.52}}},{"CityName":"Palermo","CityCode":"PMO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Palermo","AirportCode":"PMO","Position":{"Latitude":38.18,"Longitude":13.1}}},{"CityName":"Pisa","CityCode":"PSA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Pisa","AirportCode":"PSA","Position":{"Latitude":43.68,"Longitude":10.4}}},{"CityName":"Rome","CityCode":"ROM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Fiumicino","AirportCode":"FCO","Position":{"Latitude":41.8,"Longitude":12.24}}},{"CityName":"Turin","CityCode":"TRN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Turin","AirportCode":"TRN","Position":{"Latitude":45.2,"Longitude":7.65}}},{"CityName":"Venice","CityCode":"VCE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Venice","AirportCode":"VCE","Position":{"Latitude":45.51,"Longitude":12.35}}},{"CityName":"Verona","CityCode":"VRN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Valerio Catullo","AirportCode":"VRN","Position":{"Latitude":45.4,"Longitude":10.89}}}]},{"CountryName":"Jamaica","CountryCode":"JM","City":[{"CityName":"Kingston","CityCode":"KIN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kingston","AirportCode":"KIN","Position":{"Latitude":17.94,"Longitude":-76.79}}},{"CityName":"Montego Bay","CityCode":"MBJ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Montego Bay","AirportCode":"MBJ","Position":{"Latitude":18.5,"Longitude":-77.91}}}]},{"CountryName":"Jordan","CountryCode":"JO","City":{"CityName":"Amman","CityCode":"AMM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Amman","AirportCode":"AMM","Position":{"Latitude":31.72,"Longitude":35.99}}}},{"CountryName":"Japan","CountryCode":"JP","City":[{"CityName":"Fukuoka","CityCode":"FUK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Fukuoka","AirportCode":"FUK","Position":{"Latitude":33.58,"Longitude":130.45}}},{"CityName":"Hiroshima","CityCode":"HIJ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Hiroshima Intl","AirportCode":"HIJ","Position":{"Latitude":34.44,"Longitude":132.92}}},{"CityName":"Izumo","CityCode":"IZO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Izumo","AirportCode":"IZO","Position":{"Latitude":35.41,"Longitude":132.89}}},{"CityName":"Kagoshima","CityCode":"KOJ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kagoshima","AirportCode":"KOJ","Position":{"Latitude":31.8,"Longitude":130.72}}},{"CityName":"Nagoya","CityCode":"NGO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Chubu Centrair","AirportCode":"NGO","Position":{"Latitude":34.86,"Longitude":136.81}}},{"CityName":"Nagasaki","CityCode":"NGS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Nagasaki","AirportCode":"NGS","Position":{"Latitude":32.92,"Longitude":129.91}}},{"CityName":"Okinawa","CityCode":"OKA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Naha","AirportCode":"OKA","Position":{"Latitude":26.2,"Longitude":127.65}}},{"CityName":"Okayama","CityCode":"OKJ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Okayama","AirportCode":"OKJ","Position":{"Latitude":34.75,"Longitude":133.86}}},{"CityName":"Osaka","CityCode":"OSA","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Itami","AirportCode":"ITM","Position":{"Latitude":34.78,"Longitude":135.44}},{"AirportName":"Osaka","AirportCode":"KIX","Position":{"Latitude":34.43,"Longitude":135.23}}]},{"CityName":"Sapporo","CityCode":"SPK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Chitose","AirportCode":"CTS","Position":{"Latitude":42.78,"Longitude":141.69}}},{"CityName":"Tokyo","CityCode":"TYO","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Haneda","AirportCode":"HND","Position":{"Latitude":35.55,"Longitude":139.78}},{"AirportName":"Narita","AirportCode":"NRT","Position":{"Latitude":35.77,"Longitude":140.39}}]}]},{"CountryName":"Kenya","CountryCode":"KE","City":{"CityName":"Nairobi","CityCode":"NBO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Nairobi","AirportCode":"NBO","Position":{"Latitude":-1.32,"Longitude":36.93}}}},{"CountryName":"Cambodia","CountryCode":"KH","City":[{"CityName":"Phnom Penh","CityCode":"PNH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Phnom Penh","AirportCode":"PNH","Position":{"Latitude":11.55,"Longitude":104.84}}},{"CityName":"SIEM REAP","CityCode":"REP","Position":{"Latitude":0,"Longitude":0}}]},{"CountryName":"St Kitts and Nevis","CountryCode":"KN","City":{"CityName":"St Kitts","CityCode":"SKB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Robert L Bradshaw International","AirportCode":"SKB","Position":{"Latitude":17.31,"Longitude":-62.72}}}},{"CountryName":"South Korea","CountryCode":"KR","City":[{"CityName":"Busan","CityCode":"PUS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Gimhae Airport","AirportCode":"PUS","Position":{"Latitude":35.18,"Longitude":128.94}}},{"CityName":"Seoul","CityCode":"SEL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Incheon International","AirportCode":"ICN","Position":{"Latitude":37.46,"Longitude":126.44}}}]},{"CountryName":"Kuwait","CountryCode":"KW","City":{"CityName":"Kuwait","CityCode":"KWI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kuwait","AirportCode":"KWI","Position":{"Latitude":29.23,"Longitude":47.98}}}},{"CountryName":"Cayman Islands","CountryCode":"KY","City":{"CityName":"Grand Cayman","CityCode":"GCM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Grand Cayman","AirportCode":"GCM","Position":{"Latitude":19.29,"Longitude":-81.36}}}},{"CountryName":"Lebanon","CountryCode":"LB","City":{"CityName":"Beirut","CityCode":"BEY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Beirut","AirportCode":"BEY","Position":{"Latitude":33.82,"Longitude":35.49}}}},{"CountryName":"St Lucia","CountryCode":"LC","City":{"CityName":"St Lucia","CityCode":"SLU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"St Lucia","AirportCode":"UVF","Position":{"Latitude":13.73,"Longitude":-60.95}}}},{"CountryName":"Sri Lanka","CountryCode":"LK","City":{"CityName":"Colombo","CityCode":"CMB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bandarnayike International","AirportCode":"CMB","Position":{"Latitude":7.18,"Longitude":79.89}}}},{"CountryName":"Lithuania","CountryCode":"LT","City":{"CityName":"Vilnius","CityCode":"VNO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Vilnius","AirportCode":"VNO","Position":{"Latitude":54.64,"Longitude":25.29}}}},{"CountryName":"Luxembourg","CountryCode":"LU","City":{"CityName":"Luxembourg","CityCode":"LUX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Luxembourg","AirportCode":"LUX","Position":{"Latitude":49.62,"Longitude":6.2}}}},{"CountryName":"Latvia","CountryCode":"LV","City":{"CityName":"Riga","CityCode":"RIX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Riga","AirportCode":"RIX","Position":{"Latitude":56.92,"Longitude":23.97}}}},{"CountryName":"Morocco","CountryCode":"MA","City":[{"CityName":"Casablanca","CityCode":"CAS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Casablanca","AirportCode":"CMN","Position":{"Latitude":33.36,"Longitude":-7.58}}},{"CityName":"Marrakech","CityCode":"RAK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Marrakech","AirportCode":"RAK","Position":{"Latitude":31.61,"Longitude":-8.04}}},{"CityName":"Tangier","CityCode":"TNG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tangier","AirportCode":"TNG","Position":{"Latitude":35.73,"Longitude":-5.92}}}]},{"CountryName":"Malta","CountryCode":"MT","City":{"CityName":"Malta","CityCode":"MLA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Malta","AirportCode":"MLA","Position":{"Latitude":35.86,"Longitude":14.48}}}},{"CountryName":"Mauritius","CountryCode":"MU","City":{"CityName":"Mauritius","CityCode":"MRU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Mauritius","AirportCode":"MRU","Position":{"Latitude":-20.43,"Longitude":57.68}}}},{"CountryName":"Mexico","CountryCode":"MX","City":[{"CityName":"Leon\/Guanajuato","CityCode":"BJX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Leon\/Guanajuato","AirportCode":"BJX","Position":{"Latitude":20.99,"Longitude":-101.48}}},{"CityName":"Cancun","CityCode":"CUN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cancun International","AirportCode":"CUN","Position":{"Latitude":21.04,"Longitude":-86.87}}},{"CityName":"Chihuahua","CityCode":"CUU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Chihuahua","AirportCode":"CUU","Position":{"Latitude":28.7,"Longitude":-105.96}}},{"CityName":"Guadalajara","CityCode":"GDL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Guadalajara","AirportCode":"GDL","Position":{"Latitude":20.52,"Longitude":-103.31}}},{"CityName":"Mexico City","CityCode":"MEX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Mexico","AirportCode":"MEX","Position":{"Latitude":19.44,"Longitude":-99.07}}},{"CityName":"Morelia","CityCode":"MLM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Morelia","AirportCode":"MLM","Position":{"Latitude":19.85,"Longitude":-101.03}}},{"CityName":"Monterrey","CityCode":"MTY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Monterrey","AirportCode":"MTY","Position":{"Latitude":25.78,"Longitude":-100.11}}},{"CityName":"Puerto Vallarta","CityCode":"PVR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Puerto Vallarta","AirportCode":"PVR","Position":{"Latitude":20.68,"Longitude":-105.25}}},{"CityName":"San Jose Del Cabo","CityCode":"SJD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"San Jose Del Cabo","AirportCode":"SJD","Position":{"Latitude":23.15,"Longitude":-109.72}}}]},{"CountryName":"Malaysia","CountryCode":"MY","City":{"CityName":"Kuala Lumpur","CityCode":"KUL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kuala Lumpur","AirportCode":"KUL","Position":{"Latitude":2.74,"Longitude":101.7}}}},{"CountryName":"Namibia","CountryCode":"NA","City":{"CityName":"Windhoek","CityCode":"WDH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Windhoek","AirportCode":"WDH","Position":{"Latitude":-22.48,"Longitude":17.47}}}},{"CountryName":"Nigeria","CountryCode":"NG","City":[{"CityName":"Abuja","CityCode":"ABV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Abuja","AirportCode":"ABV","Position":{"Latitude":9.01,"Longitude":7.26}}},{"CityName":"Lagos","CityCode":"LOS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lagos","AirportCode":"LOS","Position":{"Latitude":6.58,"Longitude":3.32}}}]},{"CountryName":"Nicaragua","CountryCode":"NI","City":{"CityName":"Managua","CityCode":"MGA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Managua","AirportCode":"MGA","Position":{"Latitude":12.14,"Longitude":-86.17}}}},{"CountryName":"Netherlands","CountryCode":"NL","City":[{"CityName":"Amsterdam","CityCode":"AMS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Amsterdam","AirportCode":"AMS","Position":{"Latitude":52.31,"Longitude":4.76}}},{"CityName":"Rotterdam","CityCode":"RTM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Rotterdam","AirportCode":"RTM","Position":{"Latitude":51.96,"Longitude":4.44}}}]},{"CountryName":"Norway","CountryCode":"NO","City":[{"CityName":"Bergen","CityCode":"BGO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Flesland","AirportCode":"BGO","Position":{"Latitude":60.29,"Longitude":5.22}}},{"CityName":"Oslo","CityCode":"OSL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Oslo","AirportCode":"OSL","Position":{"Latitude":60.2,"Longitude":11.08}}},{"CityName":"Stavanger","CityCode":"SVG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Stavanger","AirportCode":"SVG","Position":{"Latitude":58.88,"Longitude":5.64}}}]},{"CountryName":"New Zealand","CountryCode":"NZ","City":[{"CityName":"Auckland","CityCode":"AKL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Auckland","AirportCode":"AKL","Position":{"Latitude":-37.01,"Longitude":174.79}}},{"CityName":"Christchurch","CityCode":"CHC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Christchurch","AirportCode":"CHC","Position":{"Latitude":-43.49,"Longitude":172.53}}},{"CityName":"Wellington","CityCode":"WLG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Wellington","AirportCode":"WLG","Position":{"Latitude":-41.33,"Longitude":174.81}}},{"CityName":"Queenstown","CityCode":"ZQN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Queenstown","AirportCode":"ZQN","Position":{"Latitude":-45.02,"Longitude":168.74}}}]},{"CountryName":"Oman","CountryCode":"OM","City":{"CityName":"Muscat","CityCode":"MCT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Muscat","AirportCode":"MCT","Position":{"Latitude":23.59,"Longitude":58.28}}}},{"CountryName":"Panama","CountryCode":"PA","City":{"CityName":"Panama City","CityCode":"PTY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Panama City","AirportCode":"PTY","Position":{"Latitude":9.07,"Longitude":-79.38}}}},{"CountryName":"Peru","CountryCode":"PE","City":{"CityName":"Lima","CityCode":"LIM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lima","AirportCode":"LIM","Position":{"Latitude":-12.02,"Longitude":-77.11}}}},{"CountryName":"Pakistan","CountryCode":"PK","City":[{"CityName":"Islamabad","CityCode":"ISB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Islamabad","AirportCode":"ISB","Position":{"Latitude":33.62,"Longitude":73.1}}},{"CityName":"Karachi","CityCode":"KHI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Karachi","AirportCode":"KHI","Position":{"Latitude":24.91,"Longitude":67.16}}},{"CityName":"Lahore","CityCode":"LHE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lahore","AirportCode":"LHE","Position":{"Latitude":31.52,"Longitude":74.4}}},{"CityName":"PESHAWAR","CityCode":"PEW","Position":{"Latitude":0,"Longitude":0}}]},{"CountryName":"Poland","CountryCode":"PL","City":[{"CityName":"Krakow","CityCode":"KRK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Krakow","AirportCode":"KRK","Position":{"Latitude":50.08,"Longitude":19.78}}},{"CityName":"Warsaw","CityCode":"WAW","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Warsaw","AirportCode":"WAW","Position":{"Latitude":52.17,"Longitude":20.97}}}]},{"CountryName":"Puerto Rico","CountryCode":"PR","City":{"CityName":"San Juan","CityCode":"SJU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Luis Munoz Marin",
        "AirportCode":"SJU","Position":{"Latitude":18.44,"Longitude":-66}}}},{"CountryName":"Portugal","CountryCode":"PT","City":[{"CityName":"Faro","CityCode":"FAO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Faro","AirportCode":"FAO","Position":{"Latitude":37.01,"Longitude":-7.97}}},{"CityName":"Funchal","CityCode":"FNC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Funchal","AirportCode":"FNC","Position":{"Latitude":32.69,"Longitude":-16.78}}},{"CityName":"Lisbon","CityCode":"LIS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lisbon","AirportCode":"LIS","Position":{"Latitude":38.77,"Longitude":-9.13}}},{"CityName":"Porto","CityCode":"OPO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Porto","AirportCode":"OPO","Position":{"Latitude":41.24,"Longitude":-8.68}}}]},{"CountryName":"Qatar","CountryCode":"QA","City":{"CityName":"Doha","CityCode":"DOH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Doha","AirportCode":"DOH","Position":{"Latitude":25.27,"Longitude":51.61}}}},{"CountryName":"Romania","CountryCode":"RO","City":{"CityName":"Bucharest","CityCode":"BUH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bucharest","AirportCode":"OTP","Position":{"Latitude":44.57,"Longitude":26.09}}}},{"CountryName":"Russia","CountryCode":"RU","City":[{"CityName":"Adler\/Sochi","CityCode":"AER","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Adler\/Sochi","AirportCode":"AER","Position":{"Latitude":43.44,"Longitude":39.95}}},{"CityName":"Krasnodar","CityCode":"KRR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Krasnodar","AirportCode":"KRR","Position":{"Latitude":45.04,"Longitude":39.17}}},{"CityName":"Samara","CityCode":"KUF","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Samara","AirportCode":"KUF","Position":{"Latitude":53.5,"Longitude":50.15}}},{"CityName":"Kazan","CityCode":"KZN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kazan","AirportCode":"KZN","Position":{"Latitude":55.61,"Longitude":49.28}}},{"CityName":"St Petersburg","CityCode":"LED","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"St Petersburg","AirportCode":"LED","Position":{"Latitude":59.8,"Longitude":30.26}}},{"CityName":"Moscow","CityCode":"MOW","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Domodedovo","AirportCode":"DME","Position":{"Latitude":55.41,"Longitude":37.91}}},{"CityName":"PERM","CityCode":"PEE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"PERM","AirportCode":"PEE","Position":{"Latitude":57.91,"Longitude":56.02}}},{"CityName":"Rostov","CityCode":"ROV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Rostov","AirportCode":"ROV","Position":{"Latitude":47.26,"Longitude":39.82}}}]},{"CountryName":"Saudi Arabia","CountryCode":"SA","City":[{"CityName":"Jeddah","CityCode":"JED","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"King Abdul Aziz International","AirportCode":"JED","Position":{"Latitude":21.68,"Longitude":39.16}}},{"CityName":"Riyadh","CityCode":"RUH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"King Khalid International","AirportCode":"RUH","Position":{"Latitude":24.96,"Longitude":46.71}}}]},{"CountryName":"Sweden","CountryCode":"SE","City":[{"CityName":"Gothenburg","CityCode":"GOT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Gothenburg","AirportCode":"GOT","Position":{"Latitude":57.66,"Longitude":12.29}}},{"CityName":"Stockholm","CityCode":"STO","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Arlanda","AirportCode":"ARN","Position":{"Latitude":59.65,"Longitude":17.92}},{"AirportName":"Bromma","AirportCode":"BMA","Position":{"Latitude":59.35,"Longitude":17.94}}]}]},{"CountryName":"Singapore","CountryCode":"SG","City":{"CityName":"Singapore","CityCode":"SIN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Changi","AirportCode":"SIN","Position":{"Latitude":1.36,"Longitude":103.99}}}},{"CountryName":"El Salvador","CountryCode":"SV","City":{"CityName":"San Salvador","CityCode":"SAL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"San Salvador","AirportCode":"SAL","Position":{"Latitude":13.44,"Longitude":-89.06}}}},{"CountryName":"Turks Caicos","CountryCode":"TC","City":{"CityName":"Providenciales","CityCode":"PLS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Providenciales","AirportCode":"PLS","Position":{"Latitude":21.77,"Longitude":-72.27}}}},{"CountryName":"Thailand","CountryCode":"TH","City":[{"CityName":"Bangkok","CityCode":"BKK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bangkok","AirportCode":"BKK","Position":{"Latitude":13.69,"Longitude":100.75}}},{"CityName":"Chiang Mai","CityCode":"CNX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Chiang Mai","AirportCode":"CNX","Position":{"Latitude":18.77,"Longitude":98.96}}},{"CityName":"Phuket","CityCode":"HKT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Phuket","AirportCode":"HKT","Position":{"Latitude":8.11,"Longitude":98.31}}},{"CityName":"KOH SAMUI","CityCode":"USM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Koh Samui Airport","AirportCode":"USM","Position":{"Latitude":9.55,"Longitude":100.06}}}]},{"CountryName":"Turkey","CountryCode":"TR","City":[{"CityName":"Bodrum","CityCode":"BXN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Milas","AirportCode":"BJV","Position":{"Latitude":37.25,"Longitude":27.68}}},{"CityName":"Dalaman","CityCode":"DLM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Dalaman","AirportCode":"DLM","Position":{"Latitude":36.71,"Longitude":28.79}}},{"CityName":"Istanbul","CityCode":"IST","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Ataturk","AirportCode":"IST","Position":{"Latitude":40.98,"Longitude":28.81}}},{"CityName":"Izmir","CityCode":"IZM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Adnan Menderes","AirportCode":"ADB","Position":{"Latitude":38.29,"Longitude":27.16}}}]},{"CountryName":"Trinidad and Tobago","CountryCode":"TT","City":[{"CityName":"Port of Spain","CityCode":"POS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Port of Spain","AirportCode":"POS","Position":{"Latitude":10.6,"Longitude":-61.34}}},{"CityName":"Tobago","CityCode":"TAB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tobago","AirportCode":"TAB","Position":{"Latitude":11.15,"Longitude":-60.83}}}]},{"CountryName":"Ukraine","CountryCode":"UA","City":{"CityName":"Kiev","CityCode":"IEV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kiev","AirportCode":"KBP","Position":{"Latitude":50.34,"Longitude":30.89}}}},{"CountryName":"Uganda","CountryCode":"UG","City":{"CityName":"Entebbe","CityCode":"EBB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Entebbe","AirportCode":"EBB","Position":{"Latitude":0.04,"Longitude":32.44}}}},{"CountryName":"USA","CountryCode":"US","City":[{"CityName":"Albuquerque","CityCode":"ABQ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Albuquerque","AirportCode":"ABQ","Position":{"Latitude":35.04,"Longitude":-106.61}}},{"CityName":"Albany","CityCode":"ALB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Albany","AirportCode":"ALB","Position":{"Latitude":42.75,"Longitude":-73.8}}},{"CityName":"Amarillo","CityCode":"AMA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Amarillo","AirportCode":"AMA","Position":{"Latitude":35.22,"Longitude":-101.71}}},{"CityName":"Anchorage","CityCode":"ANC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Anchorage","AirportCode":"ANC","Position":{"Latitude":61.17,"Longitude":-150}}},{"CityName":"Atlanta","CityCode":"ATL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Atlanta","AirportCode":"ATL","Position":{"Latitude":33.64,"Longitude":-84.43}}},{"CityName":"Austin","CityCode":"AUS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Bergstrom Intl","AirportCode":"AUS","Position":{"Latitude":30.19,"Longitude":-97.67}}},{"CityName":"WAUSAU WIS","CityCode":"AUW","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Wausau","AirportCode":"CWA","Position":{"Latitude":44.78,"Longitude":-89.67}}},{"CityName":"Kalamazoo","CityCode":"AZO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kalamazoo","AirportCode":"AZO","Position":{"Latitude":42.23,"Longitude":-85.55}}},{"CityName":"Birmingham","CityCode":"BHM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Birmingham","AirportCode":"BHM","Position":{"Latitude":33.56,"Longitude":-86.75}}},{"CityName":"Nashville","CityCode":"BNA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Nashville","AirportCode":"BNA","Position":{"Latitude":36.12,"Longitude":-86.68}}},{"CityName":"Boston","CityCode":"BOS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Boston","AirportCode":"BOS","Position":{"Latitude":42.36,"Longitude":-71.01}}},{"CityName":"Brownsville","CityCode":"BRO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Brownsville","AirportCode":"BRO","Position":{"Latitude":25.91,"Longitude":-97.43}}},{"CityName":"Baton Rouge","CityCode":"BTR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Baton Rouge","AirportCode":"BTR","Position":{"Latitude":30.53,"Longitude":-91.15}}},{"CityName":"Buffalo","CityCode":"BUF","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Buffalo","AirportCode":"BUF","Position":{"Latitude":42.94,"Longitude":-78.73}}},{"CityName":"Baltimore (Washington DC)","CityCode":"BWI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Baltimore","AirportCode":"BWI","Position":{"Latitude":39.18,"Longitude":-76.67}}},{"CityName":"Columbia","CityCode":"CAE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Columbia","AirportCode":"CAE","Position":{"Latitude":33.94,"Longitude":-81.12}}},{"CityName":"Chicago","CityCode":"CHI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"OHare","AirportCode":"ORD","Position":{"Latitude":41.98,"Longitude":-87.91}}},{"CityName":"Charleston","CityCode":"CHS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Charleston","AirportCode":"CHS","Position":{"Latitude":32.9,"Longitude":-80.04}}},{"CityName":"Cedar Rapids","CityCode":"CID","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cedar Rapids","AirportCode":"CID","Position":{"Latitude":41.88,"Longitude":-91.71}}},{"CityName":"Cleveland","CityCode":"CLE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Hopkins Intl","AirportCode":"CLE","Position":{"Latitude":41.41,"Longitude":-81.85}}},{"CityName":"College Station","CityCode":"CLL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"College Station","AirportCode":"CLL","Position":{"Latitude":30.59,"Longitude":-96.36}}},{"CityName":"Charlotte","CityCode":"CLT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Charlotte","AirportCode":"CLT","Position":{"Latitude":35.21,"Longitude":-80.95}}},{"CityName":"Columbus","CityCode":"CMH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Columbus","AirportCode":"CMH","Position":{"Latitude":40,"Longitude":-82.89}}},{"CityName":"Champaign","CityCode":"CMI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Champaign","AirportCode":"CMI","Position":{"Latitude":40.04,"Longitude":-88.28}}},{"CityName":"Colorado Springs","CityCode":"COS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Colorado Springs","AirportCode":"COS","Position":{"Latitude":38.81,"Longitude":-104.7}}},{"CityName":"Corpus Christi","CityCode":"CRP","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Corpus Christi","AirportCode":"CRP","Position":{"Latitude":27.77,"Longitude":-97.5}}},{"CityName":"Cincinnati","CityCode":"CVG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"North Kentucky","AirportCode":"CVG","Position":{"Latitude":39.05,"Longitude":-84.67}}},{"CityName":"Dayton","CityCode":"DAY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Dayton","AirportCode":"DAY","Position":{"Latitude":39.9,"Longitude":-84.22}}},{"CityName":"Denver","CityCode":"DEN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Denver","AirportCode":"DEN","Position":{"Latitude":39.86,"Longitude":-104.67}}},{"CityName":"Dallas","CityCode":"DFW","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Dallas Fort Worth","AirportCode":"DFW","Position":{"Latitude":32.9,"Longitude":-97.04}}},{"CityName":"Des Moines","CityCode":"DSM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Des Moines","AirportCode":"DSM","Position":{"Latitude":41.53,"Longitude":-93.66}}},{"CityName":"Detroit","CityCode":"DTT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Detroit","AirportCode":"DTW","Position":{"Latitude":42.21,"Longitude":-83.35}}},{"CityName":"El Paso","CityCode":"ELP","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"El Paso","AirportCode":"ELP","Position":{"Latitude":31.81,"Longitude":-106.38}}},{"CityName":"Evansville","CityCode":"EVV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Evansville","AirportCode":"EVV","Position":{"Latitude":38.04,"Longitude":-87.53}}},{"CityName":"Key West","CityCode":"EYW","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Key West","AirportCode":"EYW","Position":{"Latitude":24.56,"Longitude":-81.76}}},{"CityName":"Fargo","CityCode":"FAR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Fargo","AirportCode":"FAR","Position":{"Latitude":46.92,"Longitude":-96.82}}},{"CityName":"Fresno","CityCode":"FAT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Fresno","AirportCode":"FAT","Position":{"Latitude":36.78,"Longitude":-119.72}}},{"CityName":"Fort Lauderdale","CityCode":"FLL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Fort Lauderdale","AirportCode":"FLL","Position":{"Latitude":26.07,"Longitude":-80.15}}},{"CityName":"Fort Myers","CityCode":"FMY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Fort Myers","AirportCode":"RSW","Position":{"Latitude":26.54,"Longitude":-81.76}}},{"CityName":"Flint","CityCode":"FNT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Flint","AirportCode":"FNT","Position":{"Latitude":42.97,"Longitude":-83.74}}},{"CityName":"Fort Wayne","CityCode":"FWA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Fort Wayne","AirportCode":"FWA","Position":{"Latitude":40.98,"Longitude":-85.2}}},{"CityName":"Fayetteville","CityCode":"FYV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"NW Arkansas","AirportCode":"XNA","Position":{"Latitude":36.28,"Longitude":-94.31}}},{"CityName":"Grand Junction","CityCode":"GJT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Grand Junction","AirportCode":"GJT","Position":{"Latitude":39.12,"Longitude":-108.53}}},{"CityName":"Gulfport","CityCode":"GPT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Gulfport","AirportCode":"GPT","Position":{"Latitude":30.41,"Longitude":-89.07}}},{"CityName":"Green Bay","CityCode":"GRB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Green Bay","AirportCode":"GRB","Position":{"Latitude":44.48,"Longitude":-88.13}}},{"CityName":"Grand Rapids","CityCode":"GRR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Grand Rapids","AirportCode":"GRR","Position":{"Latitude":42.88,"Longitude":-85.52}}},{"CityName":"Hartford","CityCode":"HFD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Hartford","AirportCode":"BDL","Position":{"Latitude":41.94,"Longitude":-72.68}}},{"CityName":"Honolulu","CityCode":"HNL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Honolulu","AirportCode":"HNL","Position":{"Latitude":21.32,"Longitude":-157.92}}},{"CityName":"Houston","CityCode":"HOU","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Hobby","AirportCode":"HOU","Position":{"Latitude":29.65,"Longitude":-95.28}},{"AirportName":"G.Bush Intercont","AirportCode":"IAH","Position":{"Latitude":29.98,"Longitude":-95.34}}]},{"CityName":"Huntsville","CityCode":"HSV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Huntsville","AirportCode":"HSV","Position":{"Latitude":34.64,"Longitude":-86.78}}},{"CityName":"Wichita","CityCode":"ICT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Wichita","AirportCode":"ICT","Position":{"Latitude":37.65,"Longitude":-97.43}}},{"CityName":"Indianapolis","CityCode":"IND","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Indianapolis","AirportCode":"IND","Position":{"Latitude":39.72,"Longitude":-86.29}}},{"CityName":"Jackson Hole","CityCode":"JAC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Jackson Hole","AirportCode":"JAC","Position":{"Latitude":43.61,"Longitude":-110.74}}},{"CityName":"Jackson","CityCode":"JAN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Jackson","AirportCode":"JAN","Position":{"Latitude":32.31,"Longitude":-90.08}}},{"CityName":"Jacksonville","CityCode":"JAX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Jacksonville","AirportCode":"JAX","Position":{"Latitude":30.49,"Longitude":-81.69}}},{"CityName":"Kona","CityCode":"KOA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kona","AirportCode":"KOA","Position":{"Latitude":19.74,"Longitude":-156.05}}},{"CityName":"Las Vegas","CityCode":"LAS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"McCarran Intl","AirportCode":"LAS","Position":{"Latitude":36.08,"Longitude":-115.15}}},{"CityName":"Los Angeles","CityCode":"LAX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Los Angeles","AirportCode":"LAX","Position":{"Latitude":33.94,"Longitude":-118.41}}},{"CityName":"Lubbock","CityCode":"LBB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lubbock","AirportCode":"LBB","Position":{"Latitude":33.66,"Longitude":-101.82}}},{"CityName":"Lexington","CityCode":"LEX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lexington","AirportCode":"LEX","Position":{"Latitude":38.04,"Longitude":-84.61}}},{"CityName":"Lafayette","CityCode":"LFT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lafayette","AirportCode":"LFT","Position":{"Latitude":30.21,"Longitude":-91.99}}},{"CityName":"Kauai Island","CityCode":"LIH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lihue","AirportCode":"LIH","Position":{"Latitude":21.98,"Longitude":-159.34}}},{"CityName":"Little Rock","CityCode":"LIT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Little Rock","AirportCode":"LIT","Position":{"Latitude":34.73,"Longitude":-92.22}}},{"CityName":"La Crosse","CityCode":"LSE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"La Crosse","AirportCode":"LSE","Position":{"Latitude":43.88,"Longitude":-91.26}}},{"CityName":"Midland","CityCode":"MAF","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Midland","AirportCode":"MAF","Position":{"Latitude":31.94,"Longitude":-102.2}}},{"CityName":"Memphis","CityCode":"MEM","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Memphis","AirportCode":"MEM","Position":{"Latitude":35.04,"Longitude":-89.98}}},{"CityName":"McAllen","CityCode":"MFE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"McAllen","AirportCode":"MFE","Position":{"Latitude":26.18,"Longitude":-98.24}}},{"CityName":"Manhattan","CityCode":"MHK","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Manhattan Mnpl","AirportCode":"MHK","Position":{"Latitude":39.14,"Longitude":-96.67}}},{"CityName":"Miami","CityCode":"MIA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Miami","AirportCode":"MIA","Position":{"Latitude":25.8,"Longitude":-80.29}}},{"CityName":"KANSAS CITY","CityCode":"MKC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kansas City","AirportCode":"MCI","Position":{"Latitude":39.3,"Longitude":-94.71}}},{"CityName":"Milwaukee","CityCode":"MKE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"General Mitchell","AirportCode":"MKE","Position":{"Latitude":42.95,"Longitude":-87.9}}},{"CityName":"MOBILE","CityCode":"MOB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Mobile Regional Airport","AirportCode":"MOB","Position":{"Latitude":30.69,"Longitude":-88.24}}},{"CityName":"Madison","CityCode":"MSN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Madison","AirportCode":"MSN","Position":{"Latitude":43.14,"Longitude":-89.34}}},{"CityName":"Minneapolis","CityCode":"MSP","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"St Paul Intl","AirportCode":"MSP","Position":{"Latitude":44.88,"Longitude":-93.22}}},{"CityName":"New Orleans","CityCode":"MSY","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Louis Armstrong Intl","AirportCode":"MSY","Position":{"Latitude":29.99,"Longitude":-90.26}}},{"CityName":"New York","CityCode":"NYC","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Newark","AirportCode":"EWR","Position":{"Latitude":40.69,"Longitude":-74.17}},{"AirportName":"John F Kennedy","AirportCode":"JFK","Position":{"Latitude":40.64,"Longitude":-73.78}},{"AirportName":"La Guardia","AirportCode":"LGA","Position":{"Latitude":40.78,"Longitude":-73.87}}]},{"CityName":"Kahului","CityCode":"OGG","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Kahului","AirportCode":"OGG","Position":{"Latitude":20.9,"Longitude":-156.43}}},{"CityName":"Oklahoma City","CityCode":"OKC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Oklahoma City","AirportCode":"OKC","Position":{"Latitude":35.39,"Longitude":-97.6}}},{"CityName":"Omaha","CityCode":"OMA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Omaha","AirportCode":"OMA","Position":{"Latitude":41.3,"Longitude":-95.89}}},{"CityName":"Ontario (S. California)","CityCode":"ONT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Ontario","AirportCode":"ONT","Position":{"Latitude":34.06,"Longitude":-117.6}}},{"CityName":"Norfolk","CityCode":"ORF","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Norfolk","AirportCode":"ORF","Position":{"Latitude":36.89,"Longitude":-76.2}}},{"CityName":"Orlando","CityCode":"ORL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Orlando","AirportCode":"MCO","Position":{"Latitude":28.43,"Longitude":-81.31}}},{"CityName":"West Palm Beach","CityCode":"PBI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"West Palm Beach","AirportCode":"PBI","Position":{"Latitude":26.68,"Longitude":-80.1}}},{"CityName":"Portland","CityCode":"PDX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Portland","AirportCode":"PDX","Position":{"Latitude":45.59,"Longitude":-122.6}}},{"CityName":"Philadelphia","CityCode":"PHL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Philadelphia","AirportCode":"PHL","Position":{"Latitude":39.87,"Longitude":-75.24}}},{"CityName":"Phoenix","CityCode":"PHX","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Phoenix","AirportCode":"PHX","Position":{"Latitude":33.43,"Longitude":-112.01}}},{"CityName":"Peoria","CityCode":"PIA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Peoria","AirportCode":"PIA","Position":{"Latitude":40.66,"Longitude":-89.69}}},{"CityName":"Pittsburgh (Pa)","CityCode":"PIT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Pittsburgh","AirportCode":"PIT","Position":{"Latitude":40.49,"Longitude":-80.23}}},{"CityName":"Pensacola","CityCode":"PNS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Pensacola","AirportCode":"PNS","Position":{"Latitude":30.47,"Longitude":-87.19}}},{"CityName":"Palm Springs","CityCode":"PSP","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Palm Springs","AirportCode":"PSP","Position":{"Latitude":33.83,"Longitude":-116.51}}},{"CityName":"Raleigh Durham","CityCode":"RDU","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Raleigh Durham","AirportCode":"RDU","Position":{"Latitude":35.88,"Longitude":-78.79}}},{"CityName":"Richmond","CityCode":"RIC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Richmond","AirportCode":"RIC","Position":{"Latitude":37.51,"Longitude":-77.32}}},{"CityName":"Reno","CityCode":"RNO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Reno","AirportCode":"RNO","Position":{"Latitude":39.5,"Longitude":-119.77}}},{"CityName":"Rochester","CityCode":"ROC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Rochester","AirportCode":"ROC","Position":{"Latitude":43.12,"Longitude":-77.67}}},{"CityName":"Rochester","CityCode":"RST","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Rochester","AirportCode":"RST","Position":{"Latitude":43.91,"Longitude":-92.5}}},{"CityName":"Scaramento","CityCode":"SAC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Sacramento","AirportCode":"SMF","Position":{"Latitude":38.7,"Longitude":-121.59}}},{"CityName":"Santa Fe","CityCode":"SAF","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Santa Fe","AirportCode":"SAF","Position":{"Latitude":35.62,"Longitude":-106.09}}},{"CityName":"San Diego","CityCode":"SAN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"San Diego","AirportCode":"SAN","Position":{"Latitude":32.73,"Longitude":-117.19}}},{"CityName":"San Antonio","CityCode":"SAT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"San Antonio","AirportCode":"SAT","Position":{"Latitude":29.53,"Longitude":-98.47}}},{"CityName":"Savannah","CityCode":"SAV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Savannah","AirportCode":"SAV","Position":{"Latitude":32.13,"Longitude":-81.2}}},{"CityName":"Louisville","CityCode":"SDF","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Louisville","AirportCode":"SDF","Position":{"Latitude":38.17,"Longitude":-85.74}}},{"CityName":"Seattle","CityCode":"SEA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Seattle","AirportCode":"SEA","Position":{"Latitude":47.45,"Longitude":-122.31}}},{"CityName":"San Francisco","CityCode":"SFO","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"San Francisco International","AirportCode":"SFO","Position":{"Latitude":37.62,"Longitude":-122.38}}},{"CityName":"Springfield","CityCode":"SGF","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Springfield","AirportCode":"SGF","Position":{"Latitude":37.25,"Longitude":-93.39}}},{"CityName":"Shreveport","CityCode":"SHV","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Shreveport","AirportCode":"SHV","Position":{"Latitude":32.45,"Longitude":-93.83}}},{"CityName":"San Jose (California)","CityCode":"SJC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"San Jose","AirportCode":"SJC","Position":{"Latitude":37.36,"Longitude":-121.93}}},{"CityName":"Salt Lake City","CityCode":"SLC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Salt Lake City","AirportCode":"SLC","Position":{"Latitude":40.79,"Longitude":-111.98}}},{"CityName":"Santa Ana (CA)","CityCode":"SNA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Orange County","AirportCode":"SNA","Position":{"Latitude":33.68,"Longitude":-117.87}}},{"CityName":"St Louis","CityCode":"STL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Lambert","AirportCode":"STL","Position":{"Latitude":38.75,"Longitude":-90.37}}},{"CityName":"Syracuse","CityCode":"SYR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Syracuse","AirportCode":"SYR","Position":{"Latitude":43.11,"Longitude":-76.11}}},{"CityName":"Tallahassee","CityCode":"TLH","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tallahassee","AirportCode":"TLH","Position":{"Latitude":30.4,"Longitude":-84.35}}},{"CityName":"Toledo","CityCode":"TOL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Toledo","AirportCode":"TOL","Position":{"Latitude":41.59,"Longitude":-83.81}}},{"CityName":"Tampa","CityCode":"TPA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tampa","AirportCode":"TPA","Position":{"Latitude":27.98,"Longitude":-82.53}}},{"CityName":"Tulsa","CityCode":"TUL","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tulsa","AirportCode":"TUL","Position":{"Latitude":36.2,"Longitude":-95.89}}},{"CityName":"Tucson","CityCode":"TUS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Tucson","AirportCode":"TUS","Position":{"Latitude":32.12,"Longitude":-110.94}}},{"CityName":"Traverse City","CityCode":"TVC","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Traverse City","AirportCode":"TVC","Position":{"Latitude":44.74,"Longitude":-85.58}}},{"CityName":"Knoxville","CityCode":"TYS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Knoxville","AirportCode":"TYS","Position":{"Latitude":35.81,"Longitude":-84}}},{"CityName":"Valparaiso","CityCode":"VPS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Valparaiso","AirportCode":"VPS","Position":{"Latitude":30.48,"Longitude":-86.53}}},{"CityName":"Washington DC","CityCode":"WAS","Position":{"Latitude":0,"Longitude":0},"Airport":[{"AirportName":"Reagan National","AirportCode":"DCA","Position":{"Latitude":38.85,"Longitude":-77.04}},{"AirportName":"Dulles","AirportCode":"IAD","Position":{"Latitude":38.95,"Longitude":-77.46}}]}]},{"CountryName":"Uruguay","CountryCode":"UY","City":{"CityName":"Montevideo","CityCode":"MVD","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Montevideo","AirportCode":"MVD","Position":{"Latitude":-34.83,"Longitude":-56.03}}}},{"CountryName":"Venezuela","CountryCode":"VE","City":{"CityName":"Caracas","CityCode":"CCS","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Caracas","AirportCode":"CCS","Position":{"Latitude":10.6,"Longitude":-66.99}}}},{"CountryName":"US Virgin Islands","CountryCode":"VI","City":{"CityName":"St Thomas","CityCode":"STT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"St Thomas","AirportCode":"STT","Position":{"Latitude":18.34,"Longitude":-64.97}}}},{"CountryName":"Vietnam","CountryCode":"VN","City":{"CityName":"Ho Chi Minh City","CityCode":"SGN","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Ho Chi Minh City","AirportCode":"SGN","Position":{"Latitude":10.82,"Longitude":106.66}}}},{"CountryName":"South Africa","CountryCode":"ZA","City":[{"CityName":"Cape Town","CityCode":"CPT","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Cape Town","AirportCode":"CPT","Position":{"Latitude":-33.97,"Longitude":18.6}}},{"CityName":"Durban","CityCode":"DUR","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Durban","AirportCode":"DUR","Position":{"Latitude":-29.61,"Longitude":31.12}}},{"CityName":"Johannesburg","CityCode":"JNB","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Johannesburg","AirportCode":"JNB","Position":{"Latitude":-26.13,"Longitude":28.24}}},{"CityName":"Port Elizabeth","CityCode":"PLZ","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Port Elizabeth","AirportCode":"PLZ","Position":{"Latitude":-33.99,"Longitude":25.61}}}]},{"CountryName":"Zambia","CountryCode":"ZM","City":{"CityName":"Livingstone","CityCode":"LVI","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Livingstone","AirportCode":"LVI","Position":{"Latitude":-17.82,"Longitude":25.82}}}},{"CountryName":"Zimbabwe","CountryCode":"ZW","City":[{"CityName":"Harare","CityCode":"HRE","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Harare","AirportCode":"HRE","Position":{"Latitude":-17.93,"Longitude":31.09}}},{"CityName":"Victoria Falls","CityCode":"VFA","Position":{"Latitude":0,"Longitude":0},"Airport":{"AirportName":"Victoria Falls","AirportCode":"VFA","Position":{"Latitude":-18.09,"Longitude":25.84}}}]}]}}';
    }
    
    function respostaMenorPreco(){
        //menorPreco('LON', 'NYC', 'economy', 'roundTrip', 'yearLow', 'json');
        return '{"PricedItinerariesResponse":{"PricedItinerary":{"DepartureCity":"London",
        "DepartureCityCode":"LON","ArrivalCity":"New York","ArrivalCityCode":"NYC","Cabin":
            "economy","TravelMonth":"OCT","JourneyType":"roundtrip","Price":{"Amount":
                {"Amount":434.65,"CurrencyCode":"GBP"},"IsTaxIncluded":true}}}}';
        //TODO: retornar um objeto com as ifnos de DepartureCity em diante
    }
    
    function respostaCertaNaoMexeNissoVouTeMatar(){
        return '{
    "OTA_AirLowFareSearchRS": {
        "Success": "",
        "PricedItineraries": {
            "PricedItinerary": [{
                "@SequenceNumber": "1",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T11:05:00",
                                "@DepartureDateTime": "2016-08-22T08:30:00",
                                "@FlightNumber": "117",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "2",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T12:10:00",
                                "@DepartureDateTime": "2016-08-22T09:40:00",
                                "@FlightNumber": "175",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "3",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T13:00:00",
                                "@DepartureDateTime": "2016-08-22T10:15:00",
                                "@FlightNumber": "1516",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "3"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "American Airlines"
                                },
                                "Equipment": {
                                    "@AirEquipType": "772"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "Economy"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "4",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T13:55:00",
                                "@DepartureDateTime": "2016-08-22T11:20:00",
                                "@FlightNumber": "173",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "5",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T15:50:00",
                                "@DepartureDateTime": "2016-08-22T13:10:00",
                                "@FlightNumber": "177",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "6",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T17:20:00",
                                "@DepartureDateTime": "2016-08-22T14:30:00",
                                "@FlightNumber": "115",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "7",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T18:05:00",
                                "@DepartureDateTime": "2016-08-22T15:15:00",
                                "@FlightNumber": "1506",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "3"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "American Airlines"
                                },
                                "Equipment": {
                                    "@AirEquipType": "772"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "Economy"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "8",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T18:55:00",
                                "@DepartureDateTime": "2016-08-22T16:15:00",
                                "@FlightNumber": "113",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "9",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T20:05:00",
                                "@DepartureDateTime": "2016-08-22T17:15:00",
                                "@FlightNumber": "1510",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "3"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "American Airlines"
                                },
                                "Equipment": {
                                    "@AirEquipType": "77W"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "Economy"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "10",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T21:00:00",
                                "@DepartureDateTime": "2016-08-22T18:10:00",
                                "@FlightNumber": "179",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "11",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T22:20:00",
                                "@DepartureDateTime": "2016-08-22T19:30:00",
                                "@FlightNumber": "1593",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "3"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "American Airlines"
                                },
                                "Equipment": {
                                    "@AirEquipType": "772"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "Economy"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }, {
                "@SequenceNumber": "12",
                "AirItinerary": {
                    "OriginDestinationOptions": {
                        "OriginDestinationOption": {
                            "FlightSegment": {
                                "@ArrivalDateTime": "2016-08-22T22:45:00",
                                "@DepartureDateTime": "2016-08-22T20:05:00",
                                "@FlightNumber": "183",
                                "@ResBookDesigCode": "Y",
                                "DepartureAirport": {
                                    "@LocationCode": "LHR",
                                    "@Terminal": "5"
                                },
                                "ArrivalAirport": {
                                    "@LocationCode": "JFK"
                                },
                                "OperatingAirline": {
                                    "@CompanyShortName": "British Airways"
                                },
                                "Equipment": {
                                    "@AirEquipType": "744"
                                },
                                "MarketingAirline": {
                                    "@Code": "BA"
                                },
                                "TPA_Extensions": {
                                    "CabinInfo": {
                                        "@CabinCode": "M",
                                        "@CabinName": "World Traveller"
                                    }
                                }
                            }
                        }
                    }
                },
                "AirItineraryPricingInfo": {
                    "ItinTotalFare": {
                        "BaseFare": {
                            "@Amount": "1030",
                            "@CurrencyCode": "GBP"
                        },
                        "Taxes": {
                            "Tax": {
                                "@Amount": "209.65",
                                "@CurrencyCode": "GBP",
                                "@TaxCode": "TOTALTAX"
                            }
                        },
                        "TotalFare": {
                            "@Amount": "1239.65",
                            "@CurrencyCode": "GBP"
                        }
                    },
                    "PTC_FareBreakdowns": {
                        "PTC_FareBreakdown": {
                            "PassengerTypeQuantity": {
                                "@Code": "ADT",
                                "@Quantity": "1"
                            },
                            "FareInfo": {
                                "PassengerFare": {
                                    "BaseFare": {
                                        "@Amount": "1030",
                                        "@CurrencyCode": "GBP"
                                    },
                                    "Taxes": {
                                        "Tax": {
                                            "@Amount": "209.65",
                                            "@CurrencyCode": "GBP",
                                            "@TaxCode": "TOTALTAX"
                                        }
                                    },
                                    "TotalFare": {
                                        "@Amount": "1239.65",
                                        "@CurrencyCode": "GBP"
                                    }
                                }
                            }
                        }
                    }
                }
            }]
        }
    }
}
';
    }
    
    function paisesDestino($json){
        $destinos = json_decode($json, true);
        $aux = $destinos[GetBA_LocationsResponse][Country];
        $retorno = array();
        foreach ($aux as $country){
            array_push($retorno, $country[CountryName]."(".$country[CountryCode].")");
        }
        return $retorno;
    } 
    
    //exemplo horario: 2016-08-22T00:00:00-03:00
    function procuraPassagem($horario, $origem, $destino, $cabine, $numeroAdultos, $numeroCriancas, $numeroInfantil){
        $ch = curl_init();
        $url ='https://api.ba.com/rest-v1/v1/flightOfferMktAffiliates;departureDateTimeOutbound='.$horario.';locationCodeOriginOutbound='.$origem.';locationCodeDestinationOutbound='.$destino.';cabin='.$cabine.';ADT='.$numeroAdultos.';CHD='.$numeroCriancas.';INF='.$numeroCriancas.';format=.json';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Client-Key: 79hzmmeae79pbh47gccrymmr'));
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;//um json gigante
    }
?>