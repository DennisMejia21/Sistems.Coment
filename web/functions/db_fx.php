<?php  
/**
 * 
 */

function connect() {
  
  $dns = "mysql:host=".$_ENV["SQL_SERVER"]."; dbname=example";
  $user = "root";
  $pass = $_ENV['SQL_PASS'];
  
  $link = new PDO($dns, $user, $pass);
  $link->exec("set names utf8");
  return $link;
  
}