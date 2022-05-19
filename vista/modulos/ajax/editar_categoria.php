<?php

include '../../../controlador/controlador.php';
include '../../../modelo/crud.php';

$vistaUsuario = new MvcControlador();
$vistaUsuario->actualizarCategoriaControlador();
$vistaUsuario->vistaCategoriaControlador();

ob_end_flush();

?>