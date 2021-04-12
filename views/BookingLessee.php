
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
    <link rel="stylesheet"  href="../assests/css/lesseefilter.css">
    <link rel="stylesheet" href="../assests/css/footer.css">
</head>
<body>
    <?php
    include("../views/layouts/NavbarLessee.php");
    ?>
    </br>
    </br>

    <!--Filter-->

    <div class="galery">
        </br>
        </br>
        <h1>Reservas</h1>
        </br>
        </br>
    </div>
    <!--Galery-->
    <div class="container"  id="card-house">
    <?php
                $bookings = $_SESSION['userBookings'];
                foreach ($bookings as $houseTemp) {
                    $idHouse = $houseTemp['idhouses'];
                    $idB = $houseTemp['idBookings'];
                    $name=$houseTemp['name'];
                    $description = $houseTemp['description'];
                    $beds= $houseTemp['num_rooms'];
                    $baths = $houseTemp['num_toilets'];
                    $price = $houseTemp['price_pn'];
                    $parking = $houseTemp['parking_lot'];
                    $internet = $houseTemp['internet'];
                    $total = $houseTemp['total'];
                    $start = $houseTemp['start_date'];
                    $end = $houseTemp['final_date'];
                    $img = $houseTemp['url'];
                    echo "        <div class='card'>
                                    <!-- Data main -->
                                    <img src='../imagenes/$img' class='card-img-top' alt='photos'>
                                    <div class='card-body'>
                                        <h3 class='card-title'>".$name."</h3>

                                        <div>
                                            <p class='card-text'>".$description."</p>
                                        </div>
                                    </div>

                                    <!-- House Components -->
                                    <ul class='list-group'>
                                        <li class='list-group-item'><i class='fas fa-bed'></i>".$beds." Habitaciones </li>
                                        <li class='list-group-item'><i class='fas fa-bath'></i>".$bahts." Baños</li>
                                    </ul>

                                    <div class='booking'>
                                        <div><h4>Fechas de reserva:</h4></div>
                                        <div class='booking-item'><h4>Inicio:</h4><p>$start</p></div>
                                        <div class='booking-item'><h4>Inicio:</h4><p>$end</p></div>
                                    </div>

                                    <ul class='list-group-two'>
                                        <li class='list-group-item'><i class='fas fa-directions'></i>dirección</li>
                                    </ul>

                                    <ul class='list-group-two'>
                                        <li class='list-group-item'><i class='fas fa-dollar-sign'></i>".$price." Valor por noche </li>
                                    </ul>

                                    <!-- Buttons Crud -->
                                    <div class='buttons'>
                                    <a href='../controllers/BookingController.php?action=delete&idB=$idB''>
                                        <button class='btn-danger'>
                                            Eliminar reserva
                                        </button>
                                    </a>
                                        </br>
                                    </div>
                                </div>";
            
                // $this->$email= $row['email'] <a href='../controllers/BookingController.php?action=book&id=".$idHouse."'>;
                };
            ?>
    </div>
    
     <!--footer-->
     
    <?php
        include("../views/layouts/Footer.php");
    ?>
    <script src="../assests/js/validateDate.js"></script>
</body>
</html>