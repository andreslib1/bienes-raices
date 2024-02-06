<?php
include ('header.php');
require ('conexion.php')
?>



<main>
    <section class="container">
        <div class="mt-4 text-center">
            <h3 style="color: #fffffe">Mas sobre nosotros</h3>
        </div>
        <div class="row mt-5" style="color: #fffffe">
            <div class="col-md-4 text-center" style="">
                <img class="my-1" src="img/icono1.svg" style="width: 80px;">
                <h4 class="my-1">Seguridad</h3>
                <p class="my-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla qui omnis repudiandae tempora, in quod.</p>
            </div>
            <div class="col-md-4 text-center" style="">
                <img class="my-1" src="img/icono2.svg" style="width: 80px;" >
                <h4 class="my-1">Precio</h3>
                <p class="my-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla qui omnis repudiandae tempora, in quod.</p>
            </div>
            <div class="col-md-4 text-center" style="">
                <img class="my-1" src="img/icono3.svg" style="width: 62px;">
                <h4 class="my-1">A tiempo</h3> 
                <p class="my-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla qui omnis repudiandae tempora, in quod.</p>
            </div>
        </div>
            <div class="mt-5 text-center">
                <h3 style="color: #fffffe">Casa y Departamentos en venta</h3>
            </div>
        <div class="container row mt-5 justify-content-around" style="color: #0f0e17">

<?php 
      $consult = "SELECT * FROM u253606672_db1_proyectos.propiedades ORDER BY COD_PROPIEDAD DESC LIMIT 3;";

      $query = mysqli_query($db,$consult); 
                        
      while( $row = mysqli_fetch_assoc($query)){
?>
            <div class="col-md-3 m-2 p-2" style="background-color:#fffffe; padding:0px; border-radius: 20px;">
                <div style="height: 200px; overflow: hidden;">
                    <img class="img-fluid" src="imagenes/<?php echo $row['IMAGEN']?>" style="width: 300px;">
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
                <div class="row my-3 text-end" >
                    <a href="anuncios.php"><button class="btn_ver_todas">Ver Todas</button></a> <!-- Estilo aplicado en css/botones.css -->
                </div> 
        </div>
    </section>
    <div class="text-center pt-4" style="background: url(img/encuentra.jpg); background-size: cover; height: 250px; width:100%;">
          <h3 class="" style="color:#fffffe;"><strong>Encuentra la casa de tus sueños</h3>
          <h5 style="color:#fffffe;">LLena el formulario de contacto y un asesor se pondra en contacto contigo.</h5>
          <div class="row mt-5 justify-content-center" >
          <a href="contacto.php"> <button class="btn_ver_todas" >Contactanos</button> </a> <!-- Estilo aplicado en css/botones.css -->
          </div>
    </div>
    <section class="row justify-content-center my-5"  style="color:#fffffe;">
        <div class="col-md-6">
            <div class="text-center">
                <h4>Nuestro blog</h3>
            </div>
            <div class="row mt-4">
                <div class="col-md-3 p-0">
                  <img class="img-fluid mt-2" src="img/blog1.jpg" style="">
                </div>
                <div class="col-md-8">
                    <h3>Terraza en el techo de tu casa</h3>
                    <p>Escrito el <strong>00/00/000</strong> por: <strong>Admin</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-3 p-0">
                  <img class="img-fluid mt-2" src="img/blog2.jpg" style="">
                </div>
                <div class="col-md-8">
                    <h3>Terraza en el techo de tu casa</h3>
                    <p>Escrito el <strong>00/00/000</strong> por: <strong>Admin</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div>
                <h4>Testimonios</h3>
            </div>
            <div class="mt-4" style="background: #ff8906; border-radius: 10px 100px / 120px;" >
               <p class="p-4" p->Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste sint amet veniam molestiae ratione commodi dolore nihil totam eos ut, ipsam incidunt debitis exercitationem enim.</p>
            </div>
        </div>

    </section>

</main>

<?php
include ('footer.php');
?>