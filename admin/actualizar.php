<?php
require ('autenti.php');
include ('header.php');
require ('../conexion.php')
?>

<style>

<?php
include ('../css/botones.css');
?>

</style>

<?php

$cod_propiedad = $_GET['cod_propiedad'];

$cod_propiedad = filter_var($cod_propiedad, FILTER_VALIDATE_INT); // Me permite validar que la variable sea un numero (en GET), si no lo es, retornara a falso. 

if(!$cod_propiedad){
        
        header ('Location: index.php');
}

?>

<main class="container">
        <section class="row justify-content-center">

            <div class="col-9 text-center mt-3" style="color:#fffffe;">

                <h3 class="display-6 m-0"> Actualizar propiedad </h3>

            </div>
         
<?php

        $query_tra = "SELECT * FROM u253606672_db1_proyectos.propiedades where COD_PROPIEDAD = $cod_propiedad";
                                        
        $consult = mysqli_query($db,$query_tra); 
        $result= mysqli_fetch_assoc($consult);


        

                    $errores = []; //arreglo donde se almacenan los errores


                    $titulo = $result['TITULO'];
                    $precio = $result['PRECIO'];
                    $descripcion = $result['DESCRIPCION'];
                    $imagen = $result['IMAGEN'];
                    $habitaciones = $result['HABITACIONES'];
                    $banios = $result['BANIOS'] ;
                    $estacionamiento = $result['ESTACIONAMIENTO'] ;
                    $vendedorID =  $result['COD_VENDEDOR'];

                    // Datos obtenidos de la etiqueta form al dar click en ACTUALIZAR

                    if($_SERVER['REQUEST_METHOD'] === 'POST'){

                        $titulo = $_POST['titulo'];
                        $precio = $_POST['precio'];
                        $descripcion = $_POST['descripcion'];
                        $imagen = $_FILES['imagen'];
                        $habitaciones = $_POST['habitaciones'];
                        $banios = $_POST['banios'];
                        $estacionamiento = $_POST['estacionamiento'];
                        $vendedorID = $_POST['vendedorID'];


                        if(!$titulo){
                            
                            $errores[] = "No se encuentra registrado ningun titulo";
                        }


                        if(!$precio){
                            
                            $errores[] = "Debes colocar el precio";
                        }

                        if(strlen($descripcion) > 500 ){
                            
                            $errores[] = "la descripcion supero el limite de caracteres";
                        }


                        if(!$habitaciones){
                            
                            $errores[] = "Falta por ingresar el numero de habitaciones";
                        }

                        if(!$banios){
                            
                            $errores[] = "Falta por ingresar el numero de baños";
                        }

                        if(!$estacionamiento){
                            
                            $errores[] = "Falta por ingresar el numero de estacionamientos";
                        }

                        if(!$vendedorID ){
                            
                            $errores[] = "Selecciona el vendedor";

                        }

                        //validar tamaño imagen (100 kb maximo)

                        $medida = 3000 * 100; 

                        if ($imagen['size']> $medida ){

                            $errores[] = 'La imagen es muy pesada'; 
                        }



                      /*  
                        $query_con = "SELECT * FROM u253606672_db1_proyectos.propiedades";
                                        
                        $consulta = mysqli_query($db,$query_con); 
                        
                        while( $titulo_pub = mysqli_fetch_assoc($consulta)){

                        

                            if($titulo_pub['TITULO'] == $titulo && $titulo_pub['PRECIO'] == $precio && $titulo_pub['HABITACIONES'] == $habitaciones && $titulo_pub['BANIOS'] == $banios && $titulo_pub['ESTACIONAMIENTO'] == $estacionamiento){
                                echo "<div class='row justify-content-center col-sm-7 mt-5'>
                                        <div class='alert alert-warning d-flex align-items-center'  role='alert'>
                                        <svg class='bi flex-shrink-0 me-2' width='20' height='20' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                                            <div>
                                                Esta publicacion ya fue registrada
                                            </div>
                                        </div>
                                    </div>"; 
                                exit; 
                        
                            }}
                        */

                         //validacion para no subir imagenes que tengan el mismo nombre en la base de datos  (evita generar cruse de imagenes entre las propiedades)

                         $query_con = "SELECT * FROM u253606672_db1_proyectos.propiedades";

                         $consulta_ima = mysqli_query($db,$query_con); 

                         while( $row = mysqli_fetch_assoc($consulta_ima) ){
 
                                 if($imagen['name'] == $row['IMAGEN']){
 
                                 $errores [] = "Debes cambiar el nombre de la imagen"; 
 
                                  }
                         }


                        if(empty($errores)){



                            //Subir archivos (imagen)

                              
                           $carpetaImagenes ='../imagenes'; 

                                if(!is_dir($carpetaImagenes)){
                                    mkdir($carpetaImagenes); 
                                }
                            

                                $nombreImagen = ''; 

                                //Eliminacion de imagen previa (reemplaza la imagen que esta en el servidor web)
                                if($imagen['name']){

                                    unlink($carpetaImagenes."/". $result['IMAGEN']);

                                    $nombreImagen = $imagen['name'];

                                    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/".$nombreImagen);
                                }else{
                                    
                                    $nombreImagen = $result['IMAGEN'];

                                }


                                


                                $query = "UPDATE u253606672_db1_proyectos.propiedades 
                                          SET TITULO = '$titulo', PRECIO = $precio, IMAGEN ='". $nombreImagen."',  DESCRIPCION = '$descripcion', HABITACIONES = $habitaciones, BANIOS = $banios, ESTACIONAMIENTO = $estacionamiento, COD_VENDEDOR = $vendedorID, FECHA_CREACION = NOW()
                                          WHERE COD_PROPIEDAD = $cod_propiedad";
                                
                                //echo $query;  //validar query
                                $enviar = mysqli_query($db,$query); 
        
        
        
                                if ($enviar) {


                                    echo "<div class='row justify-content-center col-sm-7 mt-2'>
                                            <div class='text-start my-2'>
                                                <a href='index.php'><button class='boton_ver'>Volver</button></a> <!-- Estilo aplicado en css/botones.css -->
                                            </div>
                                                <div class='alert alert-success d-flex align-items-center'  role='alert'>
                                                <svg class='bi flex-shrink-0 me-2' width='20' height='20' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                                                    <div>
                                                        La publicacion fue actualizada correctamente
                                                    </div>
                                                </div>
                                        </div>";

                                    exit;

                                }else{
                                    echo "<div class='row justify-content-center col-sm-7 mt-2'>
                                                <div class='alert alert-warning d-flex align-items-center'  role='alert'>
                                                <svg class='bi flex-shrink-0 me-2' width='20' height='20' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                                                    <div>
                                                        Error al insertar los datos a la base de datos
                                                    </div>
                                                </div>
                                        </div>";
                                }
                        }else{

                        // Revisa que el array de $errores este vacio

                        foreach ($errores as $error){
                                        
                             echo "<div class='row justify-content-center col-sm-7 mt-2'>
                                        <div class='alert alert-danger d-flex align-items-center'  role='alert'>
                                            <svg class='bi flex-shrink-0 me-2' width='20' height='20' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                                            <div>
                                                ".$error."
                                            </div>
                                        </div>
                                   </div>";
                         }
                      }
                    }
                   

?>

                <div class="col-6 mb-4 ">
                         <div class="text-start my-2">
                            <a href="index.php"><button class="boton_ver">Volver</button></a> <!-- Estilo aplicado en css/botones.css -->
                         </div>
                        <form class="p-4" id="formul" method="POST"  enctype="multipart/form-data" style="background-color:#a7a9be; border-radius: 10px;">
                            <p class="display-5 fs-4 ">Informacion general</p>
                                <div class="my-2 form-floating">
                                    <input class="form-control" type="text" id="titulo" name="titulo" placeholder="Titulo" value="<?php echo $titulo; ?>">
                                    <label for="titulo">Titulo</label>
                                </div>
                                <div class="my-2 form-floating">
                                    <input class="form-control" type="number" id="precio" name="precio" placeholder="precio" value="<?php echo $precio; ?>">
                                    <label class="" for="precio">Precio</label>
                                </div>
                                <p class="mt-2 display-5 fs-6 ">Imagen</p>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/jpeg, image/png">
                                </div>
                                <div class="input-group mb-3">
                                <p class="mt-2 display-5 fs-6 col-12">Imagen Actual</p>
                                    <img src="../imagenes/<?php echo $result['IMAGEN']; ?>" style="width: 80px;">
                                </div>
                                <div class="my-2 form-floating">
                                    <textarea class="form-control" type="text" id="descripcion" name="descripcion" placeholder="descripcion"><?php echo $descripcion; ?></textarea>
                                    <label class="" for="descripcion">Descripcion</label>
                                </div>
                                <p class="display-5 fs-4 ">Informacion de la propiedad</p>
                                <div class="my-3 form-floating">
                                    <input class="form-control" id="habitaciones" placeholder="habitaciones" name="habitaciones" type="number" min="1" max="10" value="<?php echo $habitaciones; ?>">
                                    <label class="" for="habitaciones" >Numero de habitaciones</label>
                                </div>
                                <div class="my-3 form-floating">
                                    <input class="form-control" id="banios" name="banios" placeholder="banios" type="number" min="1" max="10" value="<?php echo $banios; ?>">
                                    <label class="" for="telefono">Baños</label>
                                </div>
                                <div class="my-3 form-floating">
                                    <input class="form-control" id="estacionamiento" name="estacionamiento" placeholder="estacionamiento" type="number" min="0" max="10" value="<?php echo $estacionamiento; ?>">
                                    <label class="" for="telefono">Estacionamiento</label>
                                </div>
                                <div class="my-2 form-floating">
                                <select class="form-control" id="vendedorID" name="vendedorID" value="<?php echo $vendedorID; ?>">
                                <option value="">Seleccione</option>
                                <?php

                                        $querydos = "SELECT * FROM u253606672_db1_proyectos.vendedores";
                                        $select_vend = mysqli_query($db,$querydos);

                                        while( $vendedor = mysqli_fetch_assoc($select_vend)){

                                            echo "<option value='".$vendedor['COD_VENDEDOR']."'>".$vendedor['NOMBRE']." ".$vendedor['APELLIDO']."</option>";
                                        }

                                ?>

                                </select>
                                <label for="pais">Vendedor</label>
                                </div>
                                <style>
                                        .btn_enviar{
                                            border-radius: 5px;
                                            border: 0px;
                                            text-decoration: none; 
                                            color: #0f0e17;
                                            padding: 5px 15px 5px 15px;                               
                                             }
                                        .btn_enviar:hover {
                                            background-color:#ff8906;
                                            color: #fffffe;
                                            transition: all 250ms;
                                        }

                                </style>

                                <div class="text-start my-3">
                                    <input class="btn_enviar" type="submit" value="Actualizar cambios"> 
                                </div>
                        </form>

                </div>
            
        </section>

</main>
<?php
include ('footer.php');
?>