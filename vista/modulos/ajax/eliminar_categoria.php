<?php

include '../../../controlador/controlador.php';
include '../../../modelo/crud.php';

$vistaUsuario = new MvcControlador();
$vistaUsuario->borrarCategoriaControlador();
$vistaUsuario->vistaCategoriaControlador();

ob_end_flush();

?>