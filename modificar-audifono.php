 <?php include("includes/seguridad.php");
include("includes/security_token.php");
require_once("includes/connection.php");
mysql_query("SET NAMES 'utf8'");
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Audinor - Modificar Audifono</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function retroceder(){
window.history.back(-1);
}
</script>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><span>Audinor</span>Admin</a>
        <ul class="user-menu">
          <li class="dropdown pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $_SESSION['session_username'];?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>Perfil</a></li>
              <!-- <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg>Configuracion</a></li> -->
              <li><a href="cerrar_sesion.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>
              
    </div><!-- /.container-fluid -->
  </nav>
    
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
      <div class="form-group">
        <!-- <input type="text" class="form-control" placeholder="Search"> -->
      </div>
    </form>
    <ul class="nav menu">
      <li><a href="dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
      <!-- <li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li> -->
      <!-- <li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li> -->
      <li><a href="clientes.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg></use></svg>Clientes</a></li>
      <li class="active"><a href="audifonos.php"><svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"></use></svg>Audifonos</a></li>
      <!-- <li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li> -->
      <!-- <li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li> -->
      <li class="parent">
        <a href="seleccion-agregar.php">
          <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></span> Agregar... 
        </a>
      </li>
      <li role="presentation" class="divider"></li>
      <!-- <li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li> -->
    </ul>
    <div class="attribution">Template by <a href="http://www.medialoot.com/item/lumino-admin-bootstrap-template/">Medialoot</a><br/><a href="http://www.glyphs.co" style="color: #333;">Icons by Glyphs</a></div>
  </div><!--/.sidebar-->
    
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <!-- LINEA DE ESPACIO EN EL DIV CENTRAL -->
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header">Bienvenido <?php echo $_SESSION['session_username'];?></h3>
      </div>
    </div><!--/.row-->
                        

    <?php 
    $query = "SELECT * FROM audifonos WHERE id='".$_GET['id']."'";
    $resultado = mysql_query($query) or die("ERROR Consultando el cliente");
    $row = mysql_fetch_array($resultado);
    if (!is_null($row)){
    ?>

  <div id="cliente">
  <button type="submit" onclick="retroceder();" class="btn btn-primary glyphicon glyphicon-circle-arrow-left"></button>
    <h4>Actualización de datos de cliente...</h4>
    <form action="updateaudifono.php" method="post">
        <p>Marca:
        <input type="text" name="marca" size="30" value="<?php echo $row['marca']; ?>" required="required"/>
        Modelo:
        <input type="text" name="modelo" size="50" value="<?php echo $row['modelo']; ?>" required="required"/></p>
        <p>Activo:
        <?php
        if($row['activo']==0){
          ?>
          <select name="activo" id="activo">
          <option value="0" selected>No</option>
          <option value="1">Si</option>
        </select>
        <?php  
        }else{
          if($row['activo']==1){
            ?>
          <select name="activo" id="activo">
          <option value="0">No</option>
          <option value="1" selected>Si</option>
        </select>
        <?php  
          }
        }
        ?>
        
        </p>
        <input type="text" value="<?php echo $_GET['id'];?>" name="id" style="display: none;"/>
        <input type="submit" class="btn btn-primary center-block" name="send" value="Enviar"/>
    </form>
</div>

<?php
	}
?>

  </div>  <!--/.main-->

  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/chart.min.js"></script>
  <script src="js/chart-data.js"></script>
  <script src="js/easypiechart.js"></script>
  <script src="js/easypiechart-data.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
            $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
  </script> 
</body>

</html>