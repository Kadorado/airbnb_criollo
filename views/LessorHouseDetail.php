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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡House rent Armenia!</title>
    <!-- FONT AWESOEM-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        
    <link rel="stylesheet"  href="../assests/css/Navbarlessee.css">
    <link rel="stylesheet"  href="../assests/css/Lessehouse.css">
    <link rel="stylesheet" href="../assests/css/footer.css">

</head>
<body>
    <!--Navbar-->
    <?php
    include("../views/layouts/NavbarLessor.php");
    ?>

    <!--Info de cada casa-->
        <!--galeria slider-->
        <!--nombre 
            descripcion-->
        <!--Detalles
            Detalles de precio (aun que creo que deberia ir de ultimas)
            Descripcción general del departamento (esto depende de los campos)-->
        <!--Medios de pago (no se si es una prioridad la verdad)-->
    <!--Boton de alquilar-->

    <?php
         $imageMain =$_SESSION['houseImagesMain'] ;
         $imagesHelp=$_SESSION['houseImagesHelp'] ;
    ?>
    <div class="container">
    <!--Inicia la galeria para hacer un trajeta con esto-->
        <div class="container-one">
            <div class="House">
                <div class="product">
                    <img id="image-box" src="../imagenes/<?php echo $imageMain['url']?> " onclick="img(this)">
                </div>
                <div class="product-small">
                    <img id="image-box" src="../imagenes/<?php echo $imageMain['url']?>" onclick="img(this)">
                    <?php foreach($imagesHelp as $image) { ?>
                        <img src="../imagenes/<?php echo $image['url']?>" onclick="img(this)">
                    <?php
                    }
                    ?>
                    </div>
            </div>
            <div class="info">
            <?php
                    $house = $_SESSION['houseDetail'];
                    foreach ($house as $houseTemp) {
                        $idHouse = $houseTemp['idhouses'];
                        $name=$houseTemp['name'];
                        $description = $houseTemp['description'];
                        $beds= $houseTemp['num_rooms'];
                        $baths = $houseTemp['num_toilets'];
                        $price = $houseTemp['price_pn'];
                        $parking = $houseTemp['parking_lot'];
                        $internet = $houseTemp['internet'];
                        $direction = $houseTemp['direccion'];
                        echo "
                        <h1>$name</h1>
                        <p>$description</p>
                        <div class='data'>
                            <div class='items'>
                                <h2>Habitaciones:</h2>
                                <p>$beds</p>
                            </div>
                            <div class='items'>
                                <h2>Baños:</h2>
                                <p>$baths</p>
                            </div>
                            <div class='items'>
                                <h2>Parqueadero:</h2>
                                <p>$parking</p>
                            </div>
                            <div class='items'>
                                <h2>Internet:</h2>
                                <p>$internet</p>
                            </div>
                        </div>
                        <div class='direction'>
                                <h3>Dirección:</h3>
                                <p> $direction</p>
                        </div>
                        <div class='price'>
                                <h3>Precio:</h3>
                                <p>$price</p>
                                
                                    <button onclick = 'editServices($idHouse)'>Actualizar servicios</button>
                                
                        </div>";


                    }
                ?>
                        <div class='data-two' >
                            <h2>Servicios adicionales</h2>
                            <div class='items' id="data-two">
                                <?php
                                    $services = $_SESSION['houseServices'];
                                    foreach($services as $s){
                                        echo "<i class='fas' id=$s></i>";}
                                ?>
                            </div>
                        </div>
                </div>
                </div>


     <!--Footer-->
     <?php
        include("../views/layouts/Footer.php");
    ?>


   
    <script src="../assests/js/imageHouse.js"></script>
    <script src="../assests/js/setIconService.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    
</body>
</html>