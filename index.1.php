<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/valida_session.inc.php";
include "api/temperatura.php";
include "listadepaises.php";
include "api/moeda.php";
//include "api/hotel.php";
//include "api/carro.php";

$destinos = json_decode(respostaLocation(), true);
//print_r($destinos[GetBA_LocationsResponse][Country]);
$lista = $destinos[GetBA_LocationsResponse][Country];

// GRAVATAR
$email = $dados_usuario[email];
$default = "retro";
$size = 80;

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
// GRAVATAR

if (!empty($_POST['adicionaviagem'])) {
  if(empty($dados_usuario[email])){
    header("Location: ../usuario/login.php");
  } else {
    $_SESSION[carrinho][count($_SESSION[carrinho])] = array(
        'tipo' => 'Viagem',
        'nome' => $_POST[nome],
        'preco' => $_POST[preco]
        //'estado' => 'Esperando pagamento'
      );
  }
}

if (!empty($_POST['adicionahotel'])) {
  if(empty($dados_usuario[email])){
    header("Location: ../usuario/login.php");
  } else {
    $_SESSION[carrinho][count($_SESSION[carrinho])] = array(
        'tipo' => 'Hotel',
        'nome' => $_POST[nome],
        'preco' => $_POST[preco]
        //'estado' => 'Esperando pagamento'
      );
  }
}

if (!empty($_POST['adicionacarro'])) {
  if(empty($dados_usuario[email])){
    header("Location: ../usuario/login.php");
  } else {
    $_SESSION[carrinho][count($_SESSION[carrinho])] = array(
        'tipo' => 'Carro',
        'nome' => $_POST[nome],
        'preco' => $_POST[preco]
        //'estado' => 'Esperando pagamento'
      );
  }
}


function horarioi($datas, $i){
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

function numeroNoitesi($chegada, $saida){
    
    //2016-06-23T00:00:00-03:00 - 2016-06-24T23:59:59-03:00
    $novaChegada = str_split($chegada,10);
    
    $novaSaida = str_split($saida,10);
      
    $chegada = new DateTime( $novaChegada[0] );
    
    $saida = new DateTime( $novaSaida[0] );
    $intervalo = $chegada->diff( $saida );
    
    // garante que nunca voltará 0 noites de estada
    if($intervalo->d==0) return 1;
    return $intervalo->d;  
}

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  
  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EasyTrip</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- Pace style -->
  <link rel="stylesheet" href="../../plugins/pace/pace.min.css">
  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red layout-boxed sidebar-mini">
  <pre>
    <?php
      print_r($_SESSION);
    ?>
  </pre>

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    <script>
    	function verificaCidade1(){
    		var e = document.getElementById("origem1");
    		var origem = e.options[e.selectedIndex].value;
    		e = document.getElementById("destino1");
    		var destino = e.options[e.selectedIndex].value;
    		if(origem===destino){
    			document.getElementById('procuraPassagem1').disabled = true;
    		}
    		else{
    			document.getElementById('procuraPassagem1').disabled = false;
    		}
      }
    </script>
    
    <script>
    	function verificaCidade2(){
    		var e = document.getElementById("origem2");
    		var origem = e.options[e.selectedIndex].value;
    		e = document.getElementById("destino2");
    		var destino = e.options[e.selectedIndex].value;
    		if(origem===destino){
    			document.getElementById('procuraViagemb').disabled = true;
    		}
    		else{
    			document.getElementById('procuraViagemb').disabled = false;
    		}
      }
    </script>

    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ET</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Easy<b>Trip</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Navegação</span>
      </a>
      <!-- Sidebar toggle button-->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-success"><?=count($_SESSION[carrinho])?></span>
            </a>
            <ul class="dropdown-menu">
              <?php
                if(!$dados_usuario[validade]){
                  echo '<li class="header">Você precisa estar logado para usar o carrinho</li>';
                } else {
                  echo '
                      <li class="header">Seus Itens</li>
                      <li>';
                  if (isset($_SESSION[carrinho])){
                    echo '
                        <!-- inner menu: contains the messages -->
                        <ul class="menu">';
                          foreach($_SESSION[carrinho] as $item){
                            echo '<li>
                              <a href="#">';
                              echo '<h4>';
                                echo $item[tipo];
                              echo '</h4>';
                              echo '<p>Nome: '.$item[nome].'</p>';
                              echo '<p>Preço: '.$item[preco].'</p>';
                            echo '</a>
                            </li>';
                          }
                        echo '
                        </ul>';
                  }
                        echo '<!-- /.menu -->
                      </li>';
                }
              
              
              ?>
            </ul>
          </li>
          <!-- /.messages-menu -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
        <?php
          if($dados_usuario[validade]){
            echo '<div class="user-panel">';
            echo '<div class="pull-left image">
                    <img src="'.$grav_url.'" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                    <p>'.$dados_usuario[nome].'</p>
                    <!-- Status -->
                    <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                  </div>
                  </br></br></br>
                  <div class="sidebar-form">
                    <a href="../usuario/logout.php" class="btn btn-danger btn-block btn-sm">Sair</a>
                  </div>';
            echo '</div>';
          }  
        
        if(!$dados_usuario[validade]){
          echo '<div class="sidebar-form">';
            echo '<a href="../usuario/login.php" class="btn btn-default btn-block btn-sm"><font color="black"><b>Entrar</b></font></a>';
            echo '<a href="../usuario/cadastro.php" class="btn btn-info btn-block btn-sm"><font color="black"><b>Cadastro</b></font></a>';
          echo '</div>';
        }
      
      ?>
      <!-- search form (Optional)
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li><a href="../"><i class="fa fa-home"></i> <span>Página Inicial</span></a></li>
        <li><a href="../caixa/"><i class="fa fa-shopping-cart"></i> <span>Carrinho</span></a></li>
        <!-- Optionally, you can add icons to the links -->
        <!-- Menu Ativo
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        Menu Ativo -->
        <!-- Menu com su-bitens
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
        Menu com sub-itens -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Busca
      </h1><!--
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="col-md-6">
          <div class="box box-default collapsed-box">
            <div class="box-header">
              <h4>Infos</h4>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>    
            <div class="box-body">
              <ul>
                <li>Realize sua busca em um dos três formulários.</li>
                <li>Adicione os itens desejados no carrinho de compras</li>
                <li>Faça o Checkout com o PagSeguro</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-default collapsed-box">
            <div class="box-header">
              <h4>Passagem</h4>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>    
            <div class="box-body">
              <form action="" method="post" id="procuraViagem">
                  <div class="form-group">
                    <label for="origem">Origem</label>
                    <select class = 'select2' name="origem" id="origem2" onchange="verificaCidade2()" style="width: 100%;">
            				<?php 
            					foreach($lista as $pais){
            						echo '<optgroup label='.$pais[CountryName].'>';
            						
            						$cidades = $pais[City];
            						
            						if(isset($cidades[CityName])){
            							//
            							echo '<option value='.$cidades[CityCode].'>';
            							echo $cidades[CityName];
            							echo '</option>';
            						} else {
            							foreach($cidades as $cidade){
            								echo '<option value='.$cidade[CityCode].'>';
            								echo $cidade[CityName];
            								echo '</option>';
            							}	
            						}
            					}
            				?>
            			</select>
                </div>
                <div class="form-group">
                    <label for="destino">Destino</label>
                    <select class = 'select2' name="destino" id='destino2' onchange="verificaCidade2()" style="width: 100%;">
            				<?php 
            					foreach($lista as $pais){
            						echo '<optgroup label='.$pais[CountryName].'>';
            						
            						$cidades = $pais[City];
            						
            						if(isset($cidades[CityName])){
            							//
            							echo '<option value='.$cidades[CityCode].'>';
            							echo $cidades[CityName];
            							echo '</option>';
            						} else {
            							foreach($cidades as $cidade){
            								echo '<option value='.$cidade[CityCode].'>';
            								echo $cidade[CityName];
            								echo '</option>';
            							}	
            						}
            					}
            				?>
            			</select>
                </div>
                <div class="form-group">
                    <label for="cabine">Selecione a cabine</label>
                    <select class="form-control select2" name="cabine" style="width: 100%;">
              				<option value="Economy">Economica</option>
              				<option value="First">Primeira classe</option>
              				<option value="Business">Trabalho</option>
              			</select>
                </div>

                
                <div class="form-group">
                  <label for="datas">Datas:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="datas" id="reservationtime">
                  </div>

                  <!-- /.input group -->
                </div>
                
                <div class="form-group">
                    <label for="numeroAdulto">Quantidade de adultos</label>
                    <input class = "form-control" type="number" min="0" step="1" name="numeroAdulto" id="numeroAdulto"/>
                </div>
                
                <div class="form-group">
                    <label for="numeroCriancas">Quantidade de crianças</label>
                    <input class = "form-control" type="number" min="0" step="1" name="numeroCriancas" id="numeroCriancas"/>
                </div>
                
                <div class="form-group">
                    <label for="numeroInfantil">Quantidade de bebês</label>
                    <input class = "form-control" type="number" min="0" step="1" name="numeroInfantil" id="numeroInfantil"/>
                </div>
                
                
                </br></br>
          			<input class="btn btn-default btn-block btn-sm" type="submit" id='procuraViagemb' name="procuraViagem" value="Procurar passagens" disabled="true"/>
          		</form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-default collapsed-box">
            <div class="box-header">
              <h4>Hotel</h4>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>    
            <div class="box-body">
              <form action="" method="post" id="procuraHotel">
                  <div class="form-group">
                    <label for="origem">Pais</label>
                    <select class = 'select2' name="pais" id="pais" style="width: 100%;">
            				<?php
            				  foreach($lista as $pais){
            						echo '<option value='.$pais[CountryCode].'>';
            						echo $pais[CountryName];
            						echo '</option>';
            					}
            				?>
            			</select>
                </div>
                <div class="form-group">
                    <label for="destino">Cidade</label>
                    <select class = 'select2' name="cidade" id='cidade' style="width: 100%;">
            				<?php 
            					foreach($lista as $pais){
            						echo '<optgroup label='.$pais[CountryName].'>';
            						
            						$cidades = $pais[City];
            						
            						if(isset($cidades[CityName])){
            							//
            							echo '<option value='.$cidades[CityCode].'>';
            							echo $cidades[CityName];
            							echo '</option>';
            						} else {
            							foreach($cidades as $cidade){
            								echo '<option value='.$cidade[CityCode].'>';
            								echo $cidade[CityName];
            								echo '</option>';
            							}	
            						}
            					}
            				?>
            			</select>
                </div>
                <div class="form-group">
                  <label for="datas">Datas:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="datas" id="reservationtime2">
                  </div>

                  <!-- /.input group -->
                </div>
                
                </br></br>
          			<input class="btn btn-default btn-block btn-sm" type="submit" id='procuraHotel' name="procuraHotel" value="Procurar hotéis"/>
          		</form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-default collapsed-box">
            <div class="box-header">
              <h4>Carro</h4>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
              </div>
            </div>    
            <div class="box-body">
              <form action="" method="post" id="procuraCarro">
                <div class="form-group">
                    <label for="destino">Cidade</label>
                    <select class = 'select2' name="cidade" id='cidade' style="width: 100%;">
            				<?php 
            					foreach($lista as $pais){
            						echo '<optgroup label='.$pais[CountryName].'>';
            						
            						$cidades = $pais[City];
            						
            						if(isset($cidades[CityName])){
            							//
            							echo '<option value='.$cidades[CityCode].'>';
            							echo $cidades[CityName];
            							echo '</option>';
            						} else {
            							foreach($cidades as $cidade){
            								echo '<option value='.$cidade[CityCode].'>';
            								echo $cidade[CityName];
            								echo '</option>';
            							}	
            						}
            					}
            				?>
            			</select>
                </div>
                <div class="form-group">
                  <label for="datas">Datas:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="datas" id="reservationtime3">
                  </div>

                  <!-- /.input group -->
                </div>
                
                </br></br>
          			<input class="btn btn-default btn-block btn-sm" type="submit" id='procuraCarro' name="procuraCarro" value="Procurar carros"/>
          		</form>
            </div>
          </div>
        </div>
        </div>
        

              <div class="ajax-content">
              

        
        <?php
          if(!empty($_POST[adicionaviagem])){
            
              include 'buscaviagem.php';
              
          }
          
        ?>
        <?php
          if(!empty($_POST[adicionahotel])){
            
              include 'buscahotel.php';
              
          }

        ?>
        
        <?php
          if(!empty($_POST[adicionacarro])){
            
              include 'buscacarro.php';
          
          }

        ?>
        
        </div>

        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">TESTES</h3>

            </div>
            <div class="box-body">
              <div class="row">
              <div class="col-xs-12 text-center">
              <button type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
                <i class="fa fa-spin fa-refresh"></i>&nbsp; Get External Content
              </button>
              </div>
              </div>
              <div class="ajax-content">
              </div>
              <form method="post" action="" id="ajax_form">
            		<label><input type="hidden" name="id" value="" /></label>
            		<label>Nome: <input type="text" name="nome" value="" /></label>
            		<label>Email: <input type="text" name="email" value="" /></label>
            		<label>Telefone: <input type="text" name="telefone" value="" /></label>
            
            		<label><input type="submit" name="enviar" value="Enviar" /></label>
            	</form>
              <pre>
                <?php
                  $carrinho = serialize($_SESSION[carrinho]);
        
                  echo $carrinho;
                  echo '</br>';
                  echo urlencode($carrinho);
                  echo '</br>';
                  echo urldecode($carrinho);
                  
                  print_r($_POST);
                
                ?>
                
                
              </pre>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
      </div>      
      <!-- Your Page Content Here -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">EasyTrip</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- FLOT CHARTS -->
<script src="../plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="../plugins/flot/jquery.flot.categories.min.js"></script>
<!-- PACE -->
<script src="../../plugins/pace/pace.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../plugins/iCheck/icheck.min.js"></script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 5, format: 'YYYY-MM-DDTHH:mm:ssZ'});
    //Date range picker with time picker
    $('#reservationtime2').daterangepicker({timePicker: true, timePickerIncrement: 5, format: 'YYYY-MM-DDTHH:mm:ssZ'});
    $('#reservationtime3').daterangepicker({timePicker: true, timePickerIncrement: 5, format: 'YYYY-MM-DDTHH:mm:ssZ'});
    
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

<script>
    $(document).on("click", ".open-DeletaDialog", function () {
         var id = $(this).data("id");
         $(".modal-body #id_produto").val(id);
    });
</script>

<script>
    $(document).on("click", ".open-ModificaDialog", function () {
        var id_item = $(this).data("id");
        var nome_item = $(this).data("nome");
        var qnt = $(this).data("qnt");
        var tipo = $(this).data("qnttipo");
        var custo = $(this).data("custo");
        $(".modal-body #id_item").val( id_item );
        $(".modal-body #nome_item").val(nome_item);
        $(".modal-body #quantidade").val(qnt);
        $(".modal-body #unidade").val(tipo);
        $(".modal-body #preco_unidade").val(custo);
    });
    
</script>

<script>
  $(function () {
    $("#tabela-estoque").DataTable();
  });
</script>

<script>

/*
 * BAR CHART
 * ---------
 */

var bar_data = {
  data: [<?php
    
    $loops = 1;
    
    foreach($tabela_barras as $key => $aux3){
      if($loops < (count($tabela_barras))) 
        // ainda não estou no último item de cardapio
        echo "[\"".$key."\", ".$aux3."], "; 
      else
        // estou no ultimo item de cardapio
        echo "[\"".$key."\", ".$aux3."]";
      $loops++;
    }
    
    ?>],
  color: "#dd4b39"
};
$.plot("#bar-chart", [bar_data], {
  grid: {
    borderWidth: 1,
    borderColor: "#f3f3f3",
    tickColor: "#f3f3f3"
  },
  series: {
    bars: {
      show: true,
      barWidth: 0.5,
      align: "center"
    }
  },
  xaxis: {
    mode: "categories",
    tickLength: 0
  }
});
/* END BAR CHART */

    
</script>
<script type="text/javascript">
	// To make Pace works on Ajax calls
	$(document).ajaxStart(function() { Pace.restart(); });
    $('.ajax').click(function(){
        //$.ajax({url: '#', success: function(result){
        //    $('.ajax-content').html('');
        //}});
        $.ajax({
            method: "POST",
            url: "index.1.php",
            data: { cidade: 'AUH', datas: '', procuraCarro: 'Procurar carros' }
          });
        location.reload(true);
    });
</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#procuraCarro').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "buscacarro.php",
				data: dados,
				success: function( data )
				{
					$('.ajax-content').html(data);
				}
			});
			
			return false;
		});
	});
	</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#adicionacarro').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "adicionacarro.php",
				data: dados
			});
			
			return false;
		});
	});
	</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#procuraHotel').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "buscahotel.php",
				data: dados,
				success: function( data )
				{
					$('.ajax-content').html(data);
				}
			});
			
			return false;
		});
	});
	</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#adicionahotel').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "adicionahotel.php",
				data: dados
			});
			
			return false;
		});
	});
	</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#procuraViagem').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "buscaviagem.php",
				data: dados,
				success: function( data )
				{
					$('.ajax-content').html(data);
				}
			});
			
			return false;
		});
	});
	</script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#adicionaviagem').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "adicionaviagem.php",
				data: dados
			});
			
			return false;
		});
	});
	</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
