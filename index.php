<?php
include "$_SERVER[DOCUMENT_ROOT]/includes/usa_api.inc.php";
include "$_SERVER[DOCUMENT_ROOT]/includes/valida_session.inc.php";
include "api/temperatura.php";
include "api/aviao.php";

$destinos = json_decode(respostaLocation(), true);

//print_r($destinos[GetBA_LocationsResponse][Country]);

$lista = $destinos[GetBA_LocationsResponse][Country];


// GRAVATAR
$email = $dados_usuario[email];
$default = "retro";
$size = 80;

$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
// GRAVATAR

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
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  


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
<body class="hold-transition skin-black layout-boxed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    <script>
  	function verificaCidade(){
  		var e = document.getElementById("origem");
  		var origem = e.options[e.selectedIndex].value;
  		e = document.getElementById("destino");
  		var destino = e.options[e.selectedIndex].value;
  		if(origem===destino){
  			document.getElementById('procuraPassagem').disabled = true;
  		}
  		else{
  			document.getElementById('procuraPassagem').disabled = false;
  		}
    }
  </script>

    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>bb</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Easy<b>Trip</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
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
              <span class="label label-success"><?=$dados_usuario[qtd]?></span>
            </a>
            <ul class="dropdown-menu">
              <?php
                if(!$dados_usuario[validade]){
                  echo '<li class="header">Você precisa estar logado para usar o carrinho</li>';
                } else {
                  echo '
                    <li class="header">You have 4 messages</li>
                    <li>
                      <!-- inner menu: contains the messages -->
                      <ul class="menu">
                        <li><!-- start message -->
                          <a href="#">
                            <div class="pull-left">
                              <!-- User Image -->
                              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                            <!-- Message title and timestamp -->
                            <h4>
                              Support Team
                              <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <!-- The message -->
                            <p>Why not buy a new awesome theme?</p>
                          </a>
                        </li>
                        <!-- end message -->
                      </ul>
                      <!-- /.menu -->
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                  ';
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
      <div class="user-panel">
        <?php
          if(!$dados_usuario[validade]){
            echo '<a href="../usuario/login.php" class="btn btn-default btn-block btn-sm"><font color="black"><b>Entrar</b></font></a>';
            echo '<a href="../usuario/cadastro.php" class="btn btn-info btn-block btn-sm"><font color="black"><b>Cadastro</b></font></a>';
          } else {
            echo '<div class="pull-left image">
                    <img src="'.$grav_url.'" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                    <p>'.$dados_usuario[nome].'</p>
                    <!-- Status -->
                    <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                  </div>
                  </br></br></br>
                  <a href="../usuario/logout.php" class="btn btn-danger btn-block btn-sm"><i class="fa fa-power-off"></i></a>';
          }  
        ?>
      </div>

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
          <div class="box box-default collapsed-box">
            <div class="box-header">
              <h4>Formulário</h4>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
            </div>    
            <div class="box-body">
              <form class= 'form-inline' action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                  <div class="form-group">
                    <label for="origem">Origem</label>
                    <select  name="origem" id="origem" onchange="verificaCidade()">
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
                    <label for="destino">Origem</label>
                    <select name="destino" id='destino' onchange="verificaCidade()">
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
                    <select name="cabine">
              				<option value="economy">Economica</option>
              				<option value="premiumEconomy">Economica premium</option>
              				<option value="business">Trabalho</option>
              				<option value="first">Primeira classe</option>
              			</select>
                </div>
                <div class="form-group">
                    <label for="dataida">Data de Ida</label>
              			<input type="datetime" name="dataida"/>
                </div>
                <div class="form-group">
                    <label for="datavolta">Data de Volta</label>
              			<input type="datetime" name="datavolta"/>
                </div>
          			<input class="btn btn-default btn-block btn-sm" type="submit" id='procuraPassagem' value="Procurar passagens" disabled="true"/>
          		</form>
            </div>
          </div>
        </div>
        
        <?php
          if(!empty($_POST)){
            echo '<div class="col-md-12">
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Resultados</h3>
          
                      </div>
                      <div class="box-body">
                        <pre>';
                        print_r($_POST);
                        echo '</pre>
                      </div>
                      <!-- /.box-body-->
                    </div>
                    <!-- /.box -->
                  </div>';
          }
        ?>
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
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- FLOT CHARTS -->
<script src="../../plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../../plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../../plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="../../plugins/flot/jquery.flot.categories.min.js"></script>

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

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
