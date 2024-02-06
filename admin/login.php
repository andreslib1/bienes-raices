<?php
require ('../conexion.php');
include ('header.php');

//Autenticacion de usuario

/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/


$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = mysqli_real_escape_string($db,$_POST['email']);
    $contraseña = mysqli_real_escape_string($db,$_POST['contraseña']);
// var_dump($_POST);
    if(!$email){
                                
        $errores[] = "Debes ingresar el correo";
    }

    if(!$contraseña){
        
        $errores[] = "Ingresa la contraseña";
    }

    // verifica usuario y contraseña ingresados

    if (empty($errores)){

                $query = "SELECT * FROM u253606672_db1_proyectos.vendedores WHERE EMAIL ='".$email."'";
                $consult =  mysqli_query($db, $query);
                $row = mysqli_fetch_assoc($consult);
                
            if($row != ''){
                
                    $autenticacion  = password_verify($contraseña,$row['PASS']); //verifica que el passwor ingresado sea correcto o no
                    
                    if ($autenticacion){

                             session_start();

                             $_SESSION['nom_usuario'] = $row['NOMBRE'];
                             $_SESSION['ape_usuario'] = $row['APELLIDO'];
                             $_SESSION['login'] = true ; 

                             header('Location: index.php');
                             
                            }else{

                                $errores[] = "La contraseña es incorrecta"; 
                            }

            }else{
                $errores[] = "El usuario no existe";
            }
     }

      //  $ejeucion = mysqli_query($db,$query); 

    }

?>

<main class="container" style="min-height: 76vh">
    <section class="row justify-content-center my-5">
<?php  foreach($errores as $error){
    
       echo "<div class='row  col-sm-7 mt-2'>
            <div class='alert alert-danger d-flex align-items-center'  role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='20' height='20' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                    <div>
                    ".$error."
                    </div>
            </div>
        </div>";
} ?>
        <form method="POST" class="p-4 m-3 col-6 text-center" style="background-color:#a7a9be; border-radius: 10px;">
        
            <div class="my-2 form-floating">
                    <input class="form-control" type="email" id="email" name="email" placeholder="email" value="" required>
                    <label class="" for="precio">Email</label>
            </div>
            <div class="my-2  form-floating">
                    <input class="form-control" type="password" id="contraseña" name="contraseña" placeholder="contraseña" value="" required>
                    <label class="" for="precio">Contraseña</label>
            </div>
            <input class="mt-2 btn btn-primary" type="submit" value="Iniciar Sesion">
        </form>
    </section>
</main>




<?php
include ('footer.php');
?>
