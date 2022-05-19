<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Libros</title>
        
        <meta charset="utf-8" />
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link href="vista/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="vista/assets/css/style.css" />
  <style>
   body
   {
    background-color:#f1f1f1;
    background:url('../assets/images/admin.jpg');
    background-repeat: no-repeat;
    background-size: cover;
   }
  </style>

	</head>
    <body>

<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="index.php?action=libros">Libros</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?action=categorias">Categorías</a>
  </li>
</ul>

<div class="container-fluid" style="margin-top: 20px;">
  <div class="card" >

  <div class="card-body">
  <div class="row">
    <div class="col-md-10">
        <h1 class="card-title">Libros </h1>
    </div>
  </div>  

<br><br>
<?php
    $vistaUsuario = new MvcControlador();
    $vistaUsuario->vistaNuevoCatalogoControlador();
?>
<div class="row">
    <div class="col-md-12 btn-derecho">
        <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#RegistroModal">Nuevo Libro</a>
    </div>
</div>

<hr>

<table class="table table-bordered table-hover" id="tabla">
<thead>
    <tr>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Portada</th>
        <th>Categoría</th>
        <th></th>
        <th></th>
    </tr>
</thead>
<tbody id="tbody">

    <?php
        $vistaUsuario->actualizarCatalogoControlador();
        $vistaUsuario->vistaCatalogoControlador();
    ?>

</tbody>
</table> 
<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


<script  src="vista/assets/js/datatable.js"></script>
<script  src="vista/assets/js/ini.js"></script>


</html>
<?php
ob_end_flush();
?>