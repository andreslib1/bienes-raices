<?php
require ('../conexion.php');
include ('header.php');

$pass = "11";

$pass_hash = password_hash($pass, PASSWORD_BCRYPT);

$query = "UPDATE u253606672_db1_proyectos.vendedores SET PASS ='".$pass_hash."'WHERE EMAIL = 'juan@gmail.com'";

$ejeucion = mysqli_query($db,$query); 

