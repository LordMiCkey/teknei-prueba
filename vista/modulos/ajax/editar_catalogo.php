<?php

include '../../../controlador/controlador.php';
include '../../../modelo/crud.php';

$vistaUsuario = new MvcControlador();
$vistaUsuario->actualizarCatalogoControlador();
$vistaUsuario->vistaCatalogoControlador();

ob_end_flush();

?>