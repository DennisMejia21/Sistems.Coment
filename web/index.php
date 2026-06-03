<?php
/**
 * Nuestro index siempre valida que exista sesion iniciada para
 * redirigir a home, de lo contrario redirige al login
 */
session_start();

if (isset($_SESSION['user'])) {
	header('Location:home.php');
  exit();
} else {
	header('Location:login.php');
  exit();
}
