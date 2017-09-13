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
<title>Audinor - Modificar</title>

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
      <li class="active"><a href="clientes.php"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg></use></svg>Clientes</a></li>
      <li><a href="#"><svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"></use></svg>Audifonos</a></li>
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
    $query = "SELECT full_name
    				,sede
    				,direccion
    				,municipio
    				,provincia
    				,codigo_postal
    				,telefono
    				,email
    				,publicidad
    				,dni
    				,fecha_nacimiento
    				,procedencia
    				,profesion
    				,observaciones
    				,acompanante
    				,actual_uno
    				,actual_dos
    				,tipo_adaptacion
    				FROM cliente WHERE clave='".$_GET['p']."' AND sede='".$_GET['s']."';";

    $resultado = mysql_query($query);
    $row = mysql_fetch_array($resultado);
    	if (!is_null($row)){
    ?>

  <div id="cliente">
  <button type="submit" onclick="retroceder();" class="btn btn-primary glyphicon glyphicon-circle-arrow-left"></button>
    <h4>Actualización de datos de cliente...</h4>
    <form action="#" method="post">
        <p>Nombre Completo:
        <input type="text" name="nombre" size="30" value="<?php echo $row['full_name']; ?>" required="required"/>
        Dirección:
        <input type="text" name="direccion" size="50" value="<?php echo $row['direccion']; ?>" required="required"/></p>
        <p>Municipio:
        <input type="text" name="municipio" size="25" value="<?php echo $row['municipio']; ?>" required="required"/>
        Provincia:
        <input type="text" name="provincia" size="25"  value="<?php echo $row['provincia']; ?>" required="required"/>
        Codigo Postal:
        <input type="number" name="codpostal" size="10" value="<?php echo $row['codigo_postal']; ?>" required="required"/> </p>
        Sede:
        <?php 
        $ssede = $row['sede'];
        	if ($ssede=='FERROL'){
        ?>
        <select class="form-control" id="sede" name="sede">
          <option value="lugo" >Lugo</option>
          <option value="ferrol" selected>Ferrol</option>
        </select>
        <?php 
        	}else
           	if ($ssede == 'LUGO'){
        ?>
        <select class="form-control" id="sede" name="sede">
          <option value="lugo" selected>Lugo</option>
          <option value="ferrol">Ferrol</option>
        </select>
        <?php 
        	}
         ?>
        <p>Teléfono:
        <input type="tel" name="telefono" size="25" value="<?php if($row['telefono'] != "NULL") echo $row['telefono'];else echo "0";?>" pattern="[0-9]{9}" required="required"/>
        e-mail:
        <input type="email" name="email" size="25" value="<?php if($row['email'] != "NULL") echo $row['telefono'];else echo "0";?>" required/></p>
        ¿Publicidad?:
        <?php 
           	if ($row['publicidad']=='0'){
        ?>
        <select class="form-control" id="publicidad" name="publicidad">
          <option value="true">Si</option>
          <option value="false" selected>No</option>
        </select>
        <?php 
        	}else
        	if($row['publicidad']=='1'){
        ?>
        <select class="form-control" id="publicidad" name="publicidad">
          <option value="false">No</option>
          <option value="true" selected>Si</option>
        </select>
        <?php
        }
        ?>
        <p>DNI:
        <input type="text" name="dni" size="15" value="<?php if($row['dni'] != "NULL") echo $row['dni'];else echo "0";?>" required/>
        Fecha de Nacimiento:
        <input type="date" name="fechanacimiento" size="25" value="<?php if($row['fecha_nacimiento'] != "NULL") echo $row['fecha_nacimiento'];else echo "0";?>" required/></p>
        <p>Procedencia:
        <input type="text" name="procedencia" size="50" value="<?php if($row['procedencia'] != "NULL") echo $row['procedencia'];else echo "0";?>" required/>
        Profesión:
        <input type="text" name="profesion" size="30" value="<?php if($row['profesion'] != "NULL") echo $row['profesion'];else echo "0";?>" required="required"/></p>
        <p>Observaciones:
        <textarea value="<?php echo $row['observaciones'];?>" name="observaciones"></textarea>
        Acompañante:
        <input type="textarea" value="<?php echo $row['acompanante'];?>" name="acompanante"/></p>
        Adaptación:
        <select class="form-control" id="tipoadaptacion" name="tipoadaptacion">
          <option value="monoaural">Monoaural</option>
          <option value="binaural">Bianaural</option>
        </select>
        Audifono 1
        <select class="form-control" id="audifonouno" name="audifonouno">
          <option value="ninguno">Ninguno</option>
          <option value="">Modelo 1</option>
          <option value="">Modelo 2</option>
        </select>
        Audifono 2
        <select class="form-control" id="audifonodos" name="audifonodos">
          <option value="ninguno">Ninguno</option>
          <option value="">Modelo 1</option>
          <option value="">Modelo 2</option>
        </select>

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