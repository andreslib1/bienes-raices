<?php
include ('header_mod.php');
require ('conexion.php');

/*echo "<pre>";
print_r($_GET);
echo "</pre>";*/

$cod_propiedad = $_GET['cod_propiedad'];

$cod_propiedad = filter_var($cod_propiedad, FILTER_VALIDATE_INT); // Me permite validar que la variable sea un numero (en GET), si no lo es, retornara a falso. 

if(!$cod_propiedad){
        
    header ('Location: index.php');
}


$consult = "SELECT * FROM u253606672_db1_proyectos.propiedades p INNER JOIN u253606672_db1_proyectos.vendedores v ON p.COD_VENDEDOR = v.COD_VENDEDOR WHERE COD_PROPIEDAD = $cod_propiedad;";

$query = mysqli_query($db,$consult); 

$row = mysqli_fetch_assoc($query)

?>



<main class="container">
    <section class="row justify-content-center" style="color:#fffffe;">
        <div class="col-8 col-md-6 my-4">
            <div class="text-center my-4">
                <h3 class="display-6"><?php echo $row['TITULO']?></h3>
            </div>
            <div class="my-4">
                <img class="img-fluid " src="imagenes/<?php echo $row['IMAGEN']?>" alt="imagen1">
            </div>
            <p class="fs-4 my-2"><strong style="color:#f25f4c;"><?php echo number_format($row['PRECIO'])?></strong></p>
            <div>
                <p>Escrito el <strong><?php echo $row['FECHA_CREACION']?></strong> por: <strong><?php echo $row['NOMBRE']." ".$row['APELLIDO'] ?></strong></p>
            </div>
            <div class="py-2">
                    <img class="m-2 p-1" src="img/icono_wc.svg" alt="baño_imagen" style="width: 40px; background-color: #fffffe; border-radius: 5px;"><?php echo $row['HABITACIONES']?>
                    <img class="m-2 p-1" src="img/icono_dormitorio.svg" alt="dormi_imagen" style="width: 47px; background-color: #fffffe; border-radius: 5px;"><?php echo $row['BANIOS']?>
                    <img class="m-2 p-1" src="img/icono_estacionamiento.svg" alt="estacio_imagen" style="width: 47px; background-color: #fffffe; border-radius: 5px;"><?php echo $row['ESTACIONAMIENTO']?>
            </div>
            <div class="mt-3">
                <p><?php echo $row['DESCRIPCION']?></p>
            </div>
        </div>
    </section>
</main>

<?php
include ('footer.php');
?>