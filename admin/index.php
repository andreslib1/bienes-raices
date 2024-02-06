<?php
require ('autenti.php');
include ('header.php');
require ('../conexion.php');
?>
<style>

<?php
include ('../css/botones.css');
?>

</style>

<!-- Consulta en la base de datos -->
<?php

$consultadb = "SELECT * FROM u253606672_db1_proyectos.propiedades";

$query = mysqli_query($db,$consultadb);

$resultado = $_GET['resultado'] ?? null;    // ?? null nos define la variable nula si no hay envio tipo get 

// Ejecucion al ejecutar boton eliminar

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Elimina la imagen en el servidor

    $cod_propiedad = $_POST['cod_propiedad'];
    
    $imagen_eli = "SELECT IMAGEN FROM u253606672_db1_proyectos.propiedades WHERE COD_PROPIEDAD = ".$cod_propiedad."";

    $queryeli_img = mysqli_query($db,$imagen_eli);

    $eli_img =mysqli_fetch_assoc($queryeli_img);

    unlink('../imagenes/'.$eli_img['IMAGEN']);


    //Elimina la propiedad

     $consultaeli = "DELETE FROM u253606672_db1_proyectos.propiedades WHERE COD_PROPIEDAD = ".$cod_propiedad."";
    
     $queryeli = mysqli_query($db,$consultaeli);
    
        if ($queryeli){
    
            header('Location: index.php?resultado=1');
         }else{
     
            echo "Hubo un error al eliminar la propiedad, verifica la conexion a la base de datos"; 
         }
 }

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

?>

<main class="container" style="color: #fffffe; min-height: 79vh">
    <section class="row mt-3">
        <div class="text-center justify-content-center">
            <h5 class="display-6">Administrador de Bienes Raices</h3> <!-- Estilo aplicado en css/botones.css -->
<?php       
            if(intval($resultado == 1)) 

                echo "<div class='row col-3 mt-5'>
                            <div class='alert alert-success d-flex'  role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='20' height='20' role='img' aria-label='success:'><use xlink:href='#check-circle-fill'/></svg>
                                <div>
                                    Propiedad eliminada 
                                </div>
                            </div>
                        </div>";
?>

        </div>
        <div class="text-start  mt-3 m-2">
            <a href="crear.php"><button class="boton_ver">Nueva propiedad</button></a> 
        </div>
        <div>
             <table class="table table-dark table-hover" style="">
                     <thead class="text-center" >
                            <tr>                              
                                <th >ID</th>
                                <th >Titulod</th>
                                <th >Imagen</th>
                                <th class="col-3" >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
 <?php  
                                while ($row = mysqli_fetch_assoc($query)){
                                                                
                                    echo "<tr class='text-center align-middle'>
                                            <th>".$row['COD_PROPIEDAD']."</th>
                                            <td>".$row['TITULO']."</td>
                                            <td><img src='../imagenes/".$row['IMAGEN']."' style='width: 80px;' ></td>
                                            <td>
                                            <form method='POST' class=''>
                                                <input type='hidden' name='cod_propiedad' value='".$row['COD_PROPIEDAD']."'>
                                                <input class='btn btn-danger' type='submit' value='Eliminar'>
                                                <a href='actualizar.php?cod_propiedad=".$row['COD_PROPIEDAD']."'><input class='btn btn-light' style='margin-left: 10px;' type='button' value='Actualizar'></a></td>
                                            </form>
                                         </tr>";
                                }                       
 ?>
                        </tbody>
                </table>

<?php 

?>

           </div>
    </section>
</main>

<?php
include ('footer.php');
?>
