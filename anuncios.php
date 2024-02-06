<?php
include ('header_mod.php');
require ('conexion.php')
?>

<style>
<?php

include ('css/botones.css');
?>
</style>

<main class="container">
    <div class="mt-4 text-center">
        <h2 class="display-6" style="color:#fffffe;">Casas y departamentos en venta</h2>
    </div>
         <div class="row my-5 justify-content-around" style="color: #0f0e17">

<?php 
                $consult = "SELECT * FROM u253606672_db1_proyectos.propiedades";

                $query = mysqli_query($db,$consult); 
                                    
                while( $row = mysqli_fetch_assoc($query)){
?>
            <div class="col-md-3 m-2 p-2" style="background-color:#fffffe; padding:0px; border-radius: 20px;">
                <div style="height: 200px; overflow: hidden;">
                    <img class="img-fluid m-2" src="imagenes/<?php echo $row['IMAGEN']?>" style="width: 300px;">
                </div>
                <h4 class="p-2 m-0"> <?php echo $row['TITULO']?> </h4> 
                <p class="p-2 m-0" > <?php echo substr($row['DESCRIPCION'], 0, 80); ?> ...</p>
                <p class="ps-2 m-0"><strong style="color:#f25f4c;">$ <?php echo number_format($row['PRECIO']); ?> </strong></p>
                <div class="py-2">
                    <img class="m-2" src="img/icono_wc.svg" alt="baño_imagen" style="width: 35px;"><?php echo ($row['HABITACIONES']); ?>
                    <img class="m-2" src="img/icono_dormitorio.svg" alt="dormi_imagen"><?php echo ($row['BANIOS']); ?>
                    <img class="m-2" src="img/icono_estacionamiento.svg" alt="estacio_imagen"><?php echo ($row['ESTACIONAMIENTO']); ?>
                </div>
                <div class="text-center my-3">
                        <a href="anuncio.php?cod_propiedad=<?php echo $row['COD_PROPIEDAD']?>"><button class="boton_ver">Ver propiedad</button></a><!-- Estilo aplicado en css/botones.css -->
                </div>
            </div>
<?php }  ?>
        </div>
     </div>
  </div>
</main>

<?php
include ('footer.php');
?>