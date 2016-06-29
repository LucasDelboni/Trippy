<?php
include "api/aviao.php";
require_once "api/moeda.php";

function horario($datas, $i){
  if($i==0){
    $data = str_split($datas,19);
    $data = $data[0].'Z';
    return $data;
  }
  $data=str_split($datas,28);
  $nova = $data[1];
  $nova = str_split($nova,19);
  $nova = $nova[0].'Z';
  return $nova;
}

              $datas = $_POST[datas];
              $origem = $_POST[origem];
              $destino = $_POST[destino];
              $cabine = $_POST[cabine];
              $numeroAdultos = $_POST[numeroAdulto];
              $numeroCriancas = $_POST[numeroCriancas];
              $numeroInfantil = $_POST[numeroInfantil];

            
            $cabine="Economy";
            $horario =horario($datas,0);
            
            //$jsonMenorPreco = respostaCertaNaoMexeNissoVouTeMatar();
            $jsonMenorPreco = procuraPassagem($horario, $origem, $destino, $cabine, $numeroAdultos, $numeroCriancas, $numeroInfantil);
            
            $array = json_decode($jsonMenorPreco, TRUE);

            //echo $jsonMenorPreco;
            //print_r($array);
            
            //print_r($jsonMenorPreco);
            $voos = $array[OTA_AirLowFareSearchRS][PricedItineraries][PricedItinerary];
            
            echo '<div class="col-md-12">';
            echo '<div class="box-header">
                    <h4><b>Ida</b></h4>
                  </div>';
            foreach($voos as $key=>$voo){
              $opcoes = $voo[AirItinerary][OriginDestinationOptions][OriginDestinationOption][FlightSegment];
              $preco = $voo[AirItineraryPricingInfo][ItinTotalFare][TotalFare];
              echo '<div class="col-md-4">';
                echo '<div class="box">';
                  echo '<div class="box-body">';
                    echo 'Saída: '.$opcoes['@DepartureDateTime'].'</br>';
                    echo 'Chegada: '.$opcoes['@ArrivalDateTime'].'</br>';
                    echo 'País de Saída: '.$opcoes[DepartureAirport]['@LocationCode'].'</br>';
                    echo 'País de Chegada: '.$opcoes[ArrivalAirport]['@LocationCode'].'</br>';
                    echo 'Companhia Áerea: '.$opcoes[OperatingAirline]['@CompanyShortName'].'</br>';
                    echo 'Assento: '.$opcoes[TPA_Extensions][CabinInfo]['@CabinName'].'</br>';
                    echo 'Preço: '.$preco['@Amount'].'</br>';
                    echo 'Moeda: '.$preco['@CurrencyCode'].'</br>';
                    
                    $reais = emReais($preco['@Amount'], $preco['@CurrencyCode']);
                    //$reais =10;
                    
                    echo '<form class= "form-inline" action="" method="POST" id = "adicionaviagem">';
                      echo '<div class="form-group">';
                        echo '<input class = "form-control" type="hidden" name="nome" value="'.$opcoes[DepartureAirport]['@LocationCode'].' para '.$opcoes[ArrivalAirport]['@LocationCode'].'" readonly/>';
                      echo '</div>';
                      echo '<div class="form-group">';
                        echo '<input class = "form-control" type="hidden" name="datas" value="'.$datas.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="origem" value="'.$origem.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="destino" value="'.$destino.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="cabine" value="'.$cabine.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="numeroAdulto" value="'.$numeroAdultos.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="numeroCriancas" value="'.$numeroCriancas.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="numeroInfantil" value="'.$numeroInfantil.'" readonly/>';
                        
                        echo '<label for="preco">Preço em Reais</label>';
                        echo '<input class = "form-control" type="text" name="preco" value="'.$reais.'" readonly/>';
                      echo '</div>';
                      echo '<input class="btn btn-default btn-block btn-sm" type="submit" id="adicionaviagem" name="adicionaviagem" value="Adicionar"/>';
                    echo '</form>';
                    
                    
                  echo '</div>';
                echo '</div>';
              echo '</div>';
              
              
            
            }
            echo '</div>';
            echo '<div class="col-md-12">';
            echo '<div class="box-header">
                    <h4><b>Volta</b></h4>
                  </div>';

            
            $horario =horario($datas,1);
            
            $jsonMenorPreco = procuraPassagem($horario, $destino, $origem, $cabine, $numeroAdultos, $numeroCriancas, $numeroInfantil);
            //$jsonMenorPreco = respostaCertaNaoMexeNissoVouTeMatar();
            //$array = json_decode($jsonMenorPreco, TRUE);
            //print_r($jsonMenorPreco);
            $voos = $array[OTA_AirLowFareSearchRS][PricedItineraries][PricedItinerary];
            
            foreach($voos as $key=>$voo){
              $opcoes = $voo[AirItinerary][OriginDestinationOptions][OriginDestinationOption][FlightSegment];
              $preco = $voo[AirItineraryPricingInfo][ItinTotalFare][TotalFare];
              echo '<div class="col-md-4">';
                echo '<div class="box">';
                  echo '<div class="box-body">';
                    echo 'Saída: '.$opcoes['@DepartureDateTime'].'</br>';
                    echo 'Chegada: '.$opcoes['@ArrivalDateTime'].'</br>';
                    echo 'País de Saída: '.$opcoes[DepartureAirport]['@LocationCode'].'</br>';
                    echo 'País de Chegada: '.$opcoes[ArrivalAirport]['@LocationCode'].'</br>';
                    echo 'Companhia Áerea: '.$opcoes[OperatingAirline]['@CompanyShortName'].'</br>';
                    echo 'Assento: '.$opcoes[TPA_Extensions][CabinInfo]['@CabinName'].'</br>';
                    echo 'Preço: '.$preco['@Amount'].'</br>';
                    echo 'Moeda: '.$preco['@CurrencyCode'].'</br>';
                    
                    //$reais = emReais($preco['@Amount'], $preco['@CurrencyCode']);
                    $reais =11;
                    
                    echo '<form class= "form-inline" action="" method="POST" id = "adicionaviagem">';
                      echo '<div class="form-group">';
                        echo '<label for="numero">Número do voo</label>';
                        echo '<input class = "form-control" type="hidden" name="nome" value="'.$opcoes[DepartureAirport]['@LocationCode'].' para '.$opcoes[ArrivalAirport]['@LocationCode'].'" readonly/>';
                      echo '</div>';
                      echo '<div class="form-group">';
                        echo '<input class = "form-control" type="hidden" name="datas" value="'.$datas.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="origem" value="'.$origem.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="destino" value="'.$destino.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="cabine" value="'.$cabine.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="numeroAdulto" value="'.$numeroAdultos.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="numeroCriancas" value="'.$numeroCriancas.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="numeroInfantil" value="'.$numeroInfantil.'" readonly/>';
                        
                        echo '<label for="preco">Preço em Reais</label>';
                        echo '<input class = "form-control" type="type" name="preco" value="'.$reais.'" readonly/>';
                      echo '</div>';
                      echo '<input class="btn btn-default btn-block btn-sm" type="submit" id="adicionaviagem" name="adicionaviagem" value="Adicionar"/>';
                    echo '</form>';
                    
                    
                  echo '</div>';
                echo '</div>';
              echo '</div>';
              
              
            
            }
            echo '</div>';

        
        ?>