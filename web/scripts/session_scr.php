<?php  
session_start();
require_once "../functions/session_fx.php";
require_once "../functions/users_fx.php";

/**
 * Procesar formulario de login
 */
if (isset($_POST["login"])) {
  // validar los datos!
  
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  
  $result = login($user);
  
  if ($result["query"]) {
    if ($result["rows"] !== 0) {
      
      if (password_verify($pass, $result["data"]['pass'])) {
        $_SESSION['user'] = $result["data"]['user'];
        $_SESSION['id'] = $result["data"]['id'];
        $_SESSION['email'] = $result["data"]['email'];
        $_SESSION['estado'] = $result["data"]['estado'];
        $_SESSION['rol_id'] = $result["data"]['rol_id'];
        $_SESSION['rol'] = $result["data"]['rol'];
        
        header('Location:/web/');
        exit();
        
      } else {
        echo '<script type="text/javascript">
        alert("clave incorrecta");
        window.location = "/web/";
        </script>';
        exit();
      }
    } else {
      echo '<script type="text/javascript">
      alert("usuario no registrado");
      window.location = "/web/";
      </script>';
      exit();
    }
    
  } else {
    echo $result["error"][2];
    exit();
  }
}

/**
 * Procesar formulario de registro del usuario
 */
if (isset($_POST["register"])) {
  $datos = [];
  $error = [];
  // validar los datos! Transformar esto en una funcion o varias
  if ( (isset($_POST['nombre'])) && (!empty(trim($_POST['nombre']) ?? '')) ) {
    if ((preg_match('/^[a-zA-ZñÑáéíóú ]+$/', $_POST['nombre'])) 
        && (strlen($_POST['nombre']) >= 2) 
        && (strlen($_POST['nombre']) <= 30)) {
      
      $datos["nombre"] = trim($_POST['nombre']);
      
    } else {      
      $error["nombre"] = $_POST['nombre']." no es válido";      
    }
  } else {
    $error["nombre"] = "el campo nombre es requerido y no puede estar vacio.";
  }
  
  if ( (isset($_POST['apellido'])) && (!empty(trim($_POST['apellido']) ?? '')) ) {
    if ((preg_match('/^[a-zA-ZñÑáéíóú ]+$/', $_POST['apellido'])) 
        && (strlen($_POST['apellido']) >= 2) 
        && (strlen($_POST['apellido']) <= 30)) {
      
      $datos["apellido"] = trim($_POST['apellido']);      
    } else {      
      $error["apellido"] = $_POST['apellido']." no es válido";      
    }
  } else {
    $error["apellido"] = "el campo apellido es requerido y no puede estar vacio.";
  }
  
  if ( (isset($_POST['email'])) && (!empty(trim($_POST['email']) ?? '')) ) {
    if (filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
      $datos["email"] = trim($_POST['email']);
    } else {
      $error["email"] = $_POST['email']." no es válido.";
    }
  } else {
    $error["email"] = "el campo email es requerido y no puede estar vacio.";
  }
  
  if ( (isset($_POST['pass'])) && (!empty(trim($_POST['pass']) ?? '')) ) {
    if ((preg_match('/^[a-zA-Znñ0-9]+$/', $_POST['pass'])) 
        && (strlen($_POST['pass']) >= 2) 
        && (strlen($_POST['pass']) <= 30)) {
      
      $datos["pass"] = password_hash($_POST['pass'], PASSWORD_DEFAULT);      
    } else {      
      $error["pass"] = $_POST['pass']." no es válido";      
    }
  } else {
    $error["pass"] = "el campo password es requerido y no puede estar vacio.";
  }
  
  if (empty($error)) {
    $datos["rol_id"] = 2;
    $result = insert($datos);
    
    if ($result["query"]) {
      echo '<script type="text/javascript">
      alert("Se registro el usuario correctamente");
      window.location = "/web/";
      </script>';
    } else {
      echo '<script type="text/javascript">
      alert("'.$result["error"][2].', intentalo más tarde. T-T ");
      </script>';
    }
  } else {
    # Crear una funcion para informar los errores
  }
  
}
