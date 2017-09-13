<?php include("includes/seguridad.php");
include("includes/security_token.php");
require_once("includes/connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Audinor - Seleccion Agregar</title>

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
function mostrar(id) {
    if (id == "cliente") {
        $("#cliente").show();
        $("#audifono").hide();
        $("#visita").hide();
        $("#administrador").hide();
    }

    if (id == "audifono") {
        $("#cliente").hide();
        $("#audifono").show();
        $("#visita").hide();
        $("#administrador").hide();
    }

    if (id == "visita") {
        $("#cliente").hide();
        $("#audifono").hide();
        $("#visita").show();
        $("#administrador").hide();
    }

    if (id == "administrador") {
        $("#cliente").hide();
        $("#audifono").hide();
        $("#visita").hide();
        $("#administrador").show();
    }
}

function mostrarpreciouno(id) {
    if (id != "ninguno") {
        $("#preciouno").show();
    }
    if (id == "ninguno") {
        $("#preciouno").hide();
    }
}
function mostrarpreciodos(id) {
    if (id != "ninguno") {
        $("#preciodos").show();
    }
    if (id == "ninguno") {
        $("#preciodos").hide();
    }
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
      <li><a href="audifonos.php"><svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"></use></svg>Audifonos</a></li>
      <!-- <li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li> -->
      <!-- <li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li> -->
      <li class="parent active">
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
        <h3 class="page-header">Dashboard - Bienvenido <?php echo $_SESSION['session_username'];?></h3>
      </div>
    </div><!--/.row-->
    
    <form action="" method="get" accept-charset="utf-8">
        <div class="form-group">
                  <label>Seleccione qué desea agregar</label>
                  <select class="form-control" id="status" name="status" onChange="mostrar(this.value);">
                    <option value="cliente">Cliente</option>
                    <option value="audifono">Audifono</option>
                    <option value="administrador">Administrador</option>
                  </select>
                </div>
               
    </form>
                    
  <div id="cliente">
    <h4>Datos del Nuevo Cliente...</h4>
    <form action="s-addnuevocliente.php" method="post">
        <p>Nombre Completo:
        <input type="text" name="nombre" size="30" required="required"/>
        Dirección:
        <input type="text" name="direccion" size="50" required="required"/></p>
        <p>Municipio:
        <input type="text" name="municipio" size="25" required="required"/>
        Provincia:
        <input type="text" name="provincia" size="25" required="required"/>
        Codigo Postal:
        <input type="number" name="codpostal" size="10" required="required"/>
        DNI:
        <input type="text" name="dni" size="15" required="required"/></p>
        Sede:
        <select class="form-control" id="sede" name="sede">
          <option value="lugo">Lugo</option>
          <option value="ferrol">Ferrol</option>
        </select>
        <p>Teléfono:
        <input type="text" name="telefono" size="50" required/>
        Acompañante:
        <input type="textarea" name="acompanante"/></p>
        <p>Procedencia:
        <input type="text" name="procedencia" size="20" required="required"/>
        Profesión:
        <input type="text" name="profesion" size="20" required="required"/>
        e-mail:
        <input type="email" name="email" size="25" required="required"/></p>
        ¿Publicidad?:
        <select class="form-control" id="publicidad" name="publicidad">
          <option value="0">No</option>
          <option value="1">Si</option>
        </select>
        <p>
        Observaciones:
        <textarea name="observaciones" rows="5" cols="50"></textarea>
        Fecha de Nacimiento:
        <input type="date" name="fechanacimiento" size="25" required="required"/></p>
        Audifono 1
        <select class="form-control" id="audifonouno" name="audifonouno" onChange="mostrarpreciouno(this.value);">
          <option value="ninguno">Ninguno</option>
          <?php
          $query = "SELECT * FROM audifonos WHERE activo='1';";
          $resultado = mysql_query($query);
          while($row = mysql_fetch_array($resultado)){
            echo "<option  value='".$row["id"]."'>".$row["marca"]." ".$row["modelo"]."</option>"; 
          }
          ?>
        </select>
        <div id="preciouno" style="display: none;">
        <p>Precio:
        <input type="text" name="preciouno" size="5" />
        Serie:
        <input type="text" name="serieuno" size="10" /></p>	
        <p>Garantia
        <input type="date" name="garantiauno" size="5" />
        Pila:
        <input type="text" name="pilauno" size="10" /></p>	
        </div>
        
        Audifono 2
        <select class="form-control" id="audifonodos" name="audifonodos" onChange="mostrarpreciodos(this.value);">
          <option value="ninguno">Ninguno</option>
          <?php
          $query = "SELECT * FROM audifonos WHERE activo='1';";
          $resultado = mysql_query($query);
          while($row = mysql_fetch_array($resultado)){
            echo "<option  value='".$row["id"]."'>".$row["marca"]." ".$row["modelo"]."</option>"; 
          }
          ?>
        </select>
        <div id="preciodos" style="display: none;">
        <p>Precio
        <input type="text" name="preciodos" size="5" />
        Serie:
        <input type="text" name="seriedos" size="10" /></p>	
        <p>Garantia
        <input type="date" name="garantiados" size="5" />
        Pila:
        <input type="text" name="pilados" size="10" /></p>		
        </div>

        <input type="submit" class="btn btn-primary center-block" name="send" value="Enviar" align="center" />
    </form>
</div>



<div id="audifono" style="display: none;">
    <h4>Datos del Nuevo Audifono...</h4>
    <form action="s-addnuevoaudifono.php" method="post">
        <p>Marca:
        <input type="text" name="marca" required/>
        Modelo:
        <input type="text" name="modelo" required/>
        <input type="submit" class="btn btn-primary center-block" name="send" value="Enviar" />
    </form>
</div>

<div id="visita" style="display: none;">
    <h4>Visita...</h4>
    <form action="index.php" method="post">
        Cliente:
        <select name="visitacliente" id="form-control">
          <option value="">Cliente 1</option>
          <option value="">Cliente 2</option>
          <option value="">Cliente 3</option>
        </select>

        Audiopritesista:
        <select name="Audiopritesista" id="form-control">
          <option value="">Audiopritesista 1</option>
          <option value="">Audiopritesista 2</option>
          <option value="">Audiopritesista 3</option>
        </select>

        <p>Observaciones:
        <input type="textarea" name="nombre"/>
        </p>
        <input type="submit" class="btn btn-primary center-block" name="send" value="Enviar" />
    </form>
</div>

<div id="administrador" style="display: none;">
    <h4>Nuevo ADMINISTRADOR...</h4>
    <form action="s-addnuevoadmin.php" method="post">
        <p>Nombre Completo:<br/>
        <input type="text" name="nombreadmin" /></p>
        <p>Username:<br/>
        <input type="text" name="username" /></p>
        <p>Password:<br/>
        <input type="password" name="pass" /></p>
        <p>email:<br/>
        <input type="email" name="emailadmin" /></p>
        <input type="submit" class="btn btn-primary center-block" name="send" value="Enviar" />
    </form>
</div>

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
