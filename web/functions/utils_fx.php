<?php  
/**
 * Esta funcion dibuja los <option> de un <select>, 
 * @param $datos | array con 2 indices llamados
 * value y option, al crear una consulta para utilizar
 * este funcion hay que utilizar los alias, AS, de SQL
 * para definir al id como value y al dato como option
 */
function selects(array $datos) {

  foreach ($datos as $key => $value) {
    echo '<option value="'.$value["value"].'">'.$value["option"].'</option>';
  }    
  
}

/**
 * Dibuja los renglones de la tabla de usuarios
 * @param $users | array
 */
function users_rows(array $users) {

  foreach ($users as $key => $user) {
  	echo '<tr>';
    echo '<td>'.$user["user"].'</td>';
    echo '<td>'.$user["email"].'</td>';
    echo '<td>'.$user["rol"].'</td>';
    echo '<td>'.$user["estado"].'</td>';
    echo '<td>'.$user["fecha_alta"].'</td>';
    echo '<td>';
    echo '<a class="btn" href="/web/users/show.php?user='.$user["id"].'" >ver</a>';
    echo '<a class="btn" href="/web/users/edit.php?user='.$user["id"].'" >editar</a>';
    echo '<a class="btn" href="/web/users/delete.php?user='.$user["id"].'" >borrar</a>';
    echo '</td>';
    echo '</tr>';
  }
  
}
