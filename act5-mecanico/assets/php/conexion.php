<?php

define("host", 'localhost');
define("user", 'root');
define("pass", "");
define("db", "mecanico");

$conec = mysqli_connect(host, user, pass, db);

// if(!$conec){
//     echo 'Error: ' . mysqli_error();
// }else{
//     echo 'conectado';
// }

?>