<?php  
require_once "../functions/users_fx.php";

/**
 * Procesar formulario de nuevo del usuario del admin
 */
if (isset($_POST["new_user"])) {
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
  
  $datos["rol_id"] = $_POST["role"];
  
  if (empty($error)) {
    $result = insert($datos);
    
    if ($result["query"]) {
      echo '<script type="text/javascript">
      alert("Se registro el usuario correctamente");
      window.location = "/web/users/";
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

/**
 * Procesar formulario de actualizar datos de usuario del admin
 */
if (isset($_POST["update_user"])) {
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

  $datos["rol_id"] = $_POST["role"];
  $datos["id"] = $_POST["id"];
  
  if (empty($error)) {
    $result = update($datos);
    
    if ($result["query"]) {
      echo '<script type="text/javascript">
      alert("Se actualizo correctamente");
      window.location = "/web/users/";
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

if (isset($_POST["delete_user"])) {
  
  $id = intval($_POST['user_id']);

  $result = kill($id);

  if ($result["query"]) {
    echo '<script type="text/javascript">
    alert("Se elimino el registro correctamente");
    window.location = "/web/users/";
    </script>';
  } else {
    echo '<script type="text/javascript">
    alert("'.$result["error"][2].', intentalo más tarde. T-T ");
    </script>';
  }

}