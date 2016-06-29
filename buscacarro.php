<?php
include "api/carro.php";
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


            $cidade = $_POST['cidade'];
            $datas = $_POST['datas'];
            $chegada = horario($datas,0);
            $saida = horario($datas,1);
            
            $retorno = json_decode(exemploRetornoPacote(), true);
            $carros = $retorno[CarPackageResponse][CarPackageSearch];
            
              
   
            echo '<div class="col-md-12">';
            echo '<div class="box-header">
                    <h4><b>Carros</b></h4>
                  </div>';
            foreach($carros as $key=>$carro){
              echo '<div class="col-md-4">';
                echo '<div class="box">';
                  echo '<div class="box-body">';
                    echo '<img src="'.$carro[imgURL].'"></br>';
                    echo 'Nome: '.$carro[carGroupDescriptionShort].'</br>';
                    echo 'Tipo: '.$carro[carType].'</br>';
                    echo 'Moeda: '.$carro[currencyCode].'</br>';
                    echo 'Preço: '.$carro[totalPrice].'</br>';
                    
                    $reais = emReais($carro[totalPrice], $carro[currencyCode]);
                    //$reais =13;
                    
                    echo '<form class= "form-inline" action="" method="POST" id = "adicionacarro">';
                      echo '<div class="form-group">';
                        echo '<input class = "form-control" type="hidden" name="nome" value="'.$carro[carGroupDescriptionShort].'" readonly/>';
                      echo '</div>';
                      echo '<div class="form-group">';
                        echo '<input class = "form-control" type="hidden" name="cidade" value="'.$cidade.'" readonly/>';
                        echo '<input class = "form-control" type="hidden" name="datas" value="'.$datas.'" readonly/>';
                        echo '<label for="preco">Preço em Reais</label>';
                        echo '<input class = "form-control" type="text" name="preco" value="'.$reais.'" readonly/>';
                      echo '</div>';
                      echo '<input class="btn btn-default btn-block btn-sm" type="submit" id="adicionacarro" name="adicionacarro" value="Adicionar"/>';
                    echo '</form>';
                    
                    
                  echo '</div>';
                echo '</div>';
              echo '</div>';
              
              
            
            }
            echo '</div>';
            

        ?>