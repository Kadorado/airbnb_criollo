<?php
       header('Content-Type: text/html; charset=UTF-8');
        //Iniciar una nueva sesión o reanudar la existente.
        session_start();
        //si el rol es 1 es arrendatario entonces lo deja entrar
        if (!isset($_SESSION['rol'])){
            header('Location: ../views/Login.php');

        }else if($_SESSION['rol']==0){
            $cliente = $_SESSION['rol'];
        }
        else{
            header('Location: ../views/Lesseegalery.php');//si no lo redirecciona a la vista de arrendador  
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="../assests/css/styles.css"> -->

    <!-- BOOTSTRAP 4 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>¡House rent Armenia!</title>

    <link rel="stylesheet"  href="../assests/css/Navbarlessee.css">
    <link rel="stylesheet" href="../assests/css/NewHome.css">
    <link rel="stylesheet" href="../assests/css/footer.css">
</head>
<body>
    <!--Navbar--->
    <?php
    include("../views/layouts/NavbarLessor.php");
    ?>
    </br>

    <!--Form new house-->
    <div id="form" class="form">
        <form class="cd-form" id="form_add_house" autocomplete="off" enctype="multipart/form-data">
            <h1>Agregar una propiedad</h1>
            </br>
            <div class="container">
                <div>
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="title">Nombre de la propiedad</label>
                            </Br>
                            </Br>
                        <input class="text" type="text" placeholder="Nombre de la propiedad" name ="title" id="title" required>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-email" for="description">Descripción</label>
                        </Br>
                        </Br>
                        <input class="text" type="text" placeholder="Descripción" name="description" id="description" required>
                    </p>

                    <p class="fieldset">
                        <label class="update-box " for="description"><i class="fas fa-image"></i>Imagen Principal</label>
                    </p>
                    <p class="div-fill">
                        <label class="update-box" for="description">Agregar img</label>
                        </Br>
                        </Br>
                        <input  type="file"  name="main-picture" id="main-picture"  required accept="image/png, image/jpg , image/jpeg">
                    </p>

                    </Br>
                    </Br>
                    <!---->
                    <p class="fieldset">
                        <label class="update-box " for="description"><i class="fas fa-image"></i>Imagen de apoyo 1</label>
                    </p>
                    <p class="div-fill">
                        <label class="update-box" for="description">Agregar img</label>
                        </Br>
                        </Br>
                        <input  type="file"  name="additional-images" id="additional-images" required accept="image/png, image/jpg , image/jpeg">
                    </p>
                    </Br>
                    </Br>
                    <p class="fieldset">
                        <label class="update-box " for="description"><i class="fas fa-image"></i>Imagen de apoyo 2</label>
                    </p>
                    <p class="div-fill">
                        <label class="update-box" for="description">Agregar img</label>
                        </Br>
                        </Br>
                        <input  type="file"  name="additional-images-2" id="additional-images-2" required accept="image/png, image/jpg , image/jpeg">
                    </p>
                    <!---->
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="description"><i class="fas fa-bed"></i>Habitaciones</label>
                        </Br>
                        </Br>
                        <input class="number" type="number" placeholder="00" name="habitaciones" id="habitaciones" required>
                    </p>
        
                </div>
                <div>
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="description"><i class="fas fa-bath"></i>Baños</label>
                        </Br>
                        </Br>
                        <input class="number" type="number" placeholder="00" name="baños" id="baños" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="description"><i class="fas fa-directions"></i>Dirección</label>
                        </Br>
                        </Br>
                        <input class="text" type="text" pattern="^([A-Za-z]+[0-9]+[#- ]){25,100}$" placeholder="Carrera 14 # 9-41, Armenia, Quindío" name="direction" id="direction" required>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="description"><i class="fas fa-parking"></i>Parqueadero</label>
                        </Br>
                        </Br>
                        <select class="form-select" aria-label="Default select example" name="parqueadero"  id="parqueadero">
                            <option selected>Selecciona</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="description"><i class="fas fa-wifi"></i>Internet</label>
                        </Br>
                        </Br>
                        <select class="form-select" aria-label="Default select example" name="internet"  id="internet">
                            <option selected>Selecciona</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </p>
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="description">Servicios adicionales</label>
                        <p class="fieldset">
                        <input type="checkbox" id="checkbox_piscina" value="piscina" name="piscina">
                        <label for="accept-terms"><i class="fas fa-swimmer" ></i>Piscina</label>
                        </br>
                        </br>
                        <input type="checkbox" id="checkbox_servicios" value="limpieza" name="limpieza" >
                        <label for="accept-terms"><i class="fas fa-broom"></i>Limpieza</label>
                        </br>
                        </br>
                        <input type="checkbox" id="checkbox_aire" value="aire" name="aire">
                        <label for="accept-terms"><i class="fas fa-wind"></i>Aire acondicionado</label>
                        </br>
                        </br>
                        <input type="checkbox" id="checkbox_agua" value="agua" name="agua">
                        <label for="accept-terms"><i class="fas fa-shower"></i>Agua caliente</label>
                        </br>
                        </br>
                        <input type="checkbox" id="checkbox_sauna"  value="sauna" name="sauna">
                        <label for="accept-terms"><i class="fas fa-hot-tub"></i>Sauna</label>
                        </br>

                    </p>
                    <p class="fieldset">
                            <label class="price" for="description"><i class="fas fa-dollar-sign"></i>Valor por noche</label>
                            </Br>
                            </Br>
                            <input class="number" type="number" placeholder="eje.$50.000" name="price_noche" id="price_noche" required>
                    </p>
                </div>
            </div>
                   <div class="end">
                        </br>
                        <p class="fieldset">
                             <button class="button" type="submit" >Crear propiedad</button>
                        </p>
                   </div>
        </form>


    </div> <!-- cd-signup -->
    </div>


</form>
</div>





<?php
        include("../views/layouts/Footer.php");
?>

<script src="../assests/js/createHouse.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
     <!--footer-->

</body>
</html>