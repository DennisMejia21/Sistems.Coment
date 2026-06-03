<?php  
/**
 * Este pequeño script valida la sesion, lo incluimos 
 * al principio de cada pagina nueva que escribamos, si
 * no hay sesion iniciada va a la raiz del proyecto y
 * cae en index.php
 */
session_start();

if (!isset($_SESSION['user'])) {
	header('Location:/web/');
	exit();
}