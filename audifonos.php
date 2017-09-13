<?php include("includes/seguridad.php");
include("includes/security_token.php");
require_once("includes/connection.php");
mysql_query("SET NAMES 'utf8'");
 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Audifonos</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
function godelete(id) {
    window.location.href='eliminar-audifono.php?id='+id;
    }
function gomodify(id) {
    window.location.href='modificar-audifono.php?id='+id;
    }
function activate(id) {
    window.location.href='activar-audifono.php?id='+id;
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
				<!-- <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li> -->
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Aufidonos</div>
					<div class="panel-body">
						<table data-toggle="table" data-url=""  data-show-refresh="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="asc">
						    <thead>
						    <tr>
						        <th data-field="id-audifono" data-sortable="false">Acción</th>
						        <th data-field="id" data-sortable="true">CODIGO</th>
						        <th data-field="marca" data-sortable="true">Marca</th>
						        <th data-field="modelo" data-sortable="true">Modelo</th>
						        <th data-field="activar" data-sortable="true">Activo</th>
						        
						    </tr>
						    </thead>
						    <?php  
                  //include("includes/connection.php");  
                  $query = mysql_query("SELECT id,marca,modelo,activo FROM audifonos WHERE 1");  
                  while ($row = mysql_fetch_array($query)){   
                    echo "<tr>";  
                    echo "<td><button title='Modificar' class='btn glyphicon glyphicon-pencil' onclick='gomodify(".$row["id"].");'></button>
                    		<button title='Eliminar' class='btn glyphicon glyphicon-remove' onclick='godelete(".$row["id"].");'></button></td>";   
                    echo "<td>".$row["id"]."</td>";   
                    echo "<td>".$row["marca"]."</td>";
                    echo "<td>".$row["modelo"]."</td>";
                    if ($row['activo'] == '0') echo "<td><button type='submit' class='btn glyphicon glyphicon-minus-sign' onclick='activate(".$row["id"].");'></button></td>";
                    else echo "<td><button type='submit' class='btn glyphicon glyphicon-ok' onclick='activate(".$row["id"].");'> </button></td>";

                    	//echo "<td> <svg class='glyph stroked cancel' width='50' height='50' onclick='mifuncion();'><use xlink:href='#stroked-cancel'/> </svg></td>";  else echo "<td> <svg class='glyph stroked checkmark' width='50' height='50'><use xlink:href='#stroked-checkmark'/></svg></td>";
                    echo "</tr>";  
                  }  
                  ?>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
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
