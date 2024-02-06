<?php
include ('header_mod.php');
?>

<main class="container">
        <section class="row justify-content-center">
            <div class="col-9 text-center" style="color:#fffffe;">

                <h3 class="display-6 my-3"> Contacto </h3>
               
                <div>
                    <img class="img-fluid" src="img/destacada3.jpg" alt="destacada">
                </div>

                <h3 class="display-6 my-3">llenar el formulario de contacto</h3>

            </div>

                <div class="col-6 my-4">
                        <form class="p-4" style="background-color:#a7a9be; border-radius: 10px;">
                           <p class="display-5 fs-4 ">Informacion personal</p>
                            <div class="my-2 form-floating">
                                <input class="form-control" type="text" id="nombre" placeholder="nombre">
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="my-2 form-floating">
                                <input class="form-control" type="text" id="email" placeholder="nombre">
                                <label class="" for="email">Email</label>
                            </div>
                            <div class="my-2 form-floating">
                                <input class="form-control" type="text" id="telefono" placeholder="nombre">
                                <label class="" for="telefono">Telefono</label>
                            </div>
                            <div class="my-2 form-floating">
                                <textarea class="form-control" type="text" id="mensaje" placeholder="nombre"></textarea>
                                <label class="" for="mensaje">Mensaje</label>
                            </div>
                            <p class="mt-4 display-5 fs-4 ">Informacion sobre propiedad</p>
                            <div class="my-2 form-floating">
                                <select class="form-control" id="pais" name="pais">
                                    <option>Vender</option>
                                    <option>Comprar</option>
                                </select>
                                <label for="pais">Vende o compra</label>
                            </div>
                            <div class="my-2 form-floating">
                                <input class="form-control" type="text" id="cantidad" placeholder="nombre">
                                <label for="cantidad">Cantidad</label>
                            <p class="mt-4 display-5 fs-4 ">Contacto</p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Telefono
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Email
                                </label>
                            </div>
                            <p class="mt-1 display-5 fs-5 ">Si eligio telefono elija la fecha</p>
                            <div class="my-2 form-floating">
                                <input class="form-control" type="date" id="fecha" placeholder="nombre">
                                <label for="fecha">Fecha</label>
                            </div>

                            <style>
                                    .btn_enviar{
                                        border-radius: 5px;
                                        border: 0px;
                                        text-decoration: none; 
                                        color: #0f0e17;
                                        padding: 5px 15px 5px 15px;                                    }

                                    .btn_enviar:hover {
                                        background-color:#ff8906;
                                        color: #fffffe;
                                        transition: all 250ms;
                                    }

                            </style>

                            <div class="text-start my-3">
                                <input class="btn_enviar" type="button" value="Enviar"> 
                            </div>
                        </form>

                </div>
            
        </section>

</main>

<?php
include ('footer.php');
?>