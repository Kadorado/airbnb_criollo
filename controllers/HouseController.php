<?php ob_start() ?>
<?php
require_once "../models/House.php";
require_once "../models/AditionalServerHelp.php";
require_once "../models/Imagenes.php";

session_start();


// VIEW MORE DETAIL HOUSE

$action = $_GET['action'];
switch ($action){
   case "detail":
      $houseId = $_GET['id'];
      $houseObj = new House();
      $house = $houseObj->getHouse($houseId);
      $servicesObj = new AditionalServerHelp();
      $services = $servicesObj->getHouseServices($houseId);

      session_start();
      $_SESSION['houseDetail'] = $house;
      $_SESSION['houseServices'] = $services;


      $imagenObj = new Imagenes();
      $imagenMain = $imagenObj->imageMain($houseId);
      $imagenHelp = $imagenObj->imageHelps($houseId);

      $_SESSION['houseImagesMain'] = $imagenMain;
      $_SESSION['houseImagesHelp'] = $imagenHelp;
      
    

      header('Location: ../views/LessorHouseDetail.php');
      break;

      default:
      break;
}




// DELETE AND EDIT HOUSE WITH  AJAX

if (isset($_POST["typeoperation"])){

   $id_house = $_POST["id"];
   $type_query = $_POST["typeoperation"];
   $id_lessor=  $_SESSION['iduser'];


   switch($type_query){
      case 'delete':
         $house = new House();
         $newHouse =$house->deleteHouse($id_house,$id_lessor);
         $house->setSessionHouse($id_lessor);
         echo json_encode($newHouse);
        break;
        case 'edit':
         $house = new House();
         $getHouse =$house->getHouse($id_house);
         echo json_encode($getHouse);
        break;
        case 'update':
         $id_house = $_POST["id_u"];
         $name = $_POST["name_u"];
         $description = $_POST["description_u"];
         $num_rooms = $_POST["num_rooms_u"];
         $num_toilets = $_POST["num_toilets_u"];
         $parking_lot = $_POST["parqueadero_u"];
         $internet = $_POST["internet_u"];
         $price_pn = $_POST["price_pn_u"];
         $direction = $_POST["direction_u"];

         $house = new House();
         $updateHouse = $house->updateHouse($id_house, $id_lessor,$name, $description, $num_rooms, $num_toilets, $parking_lot, $internet, $price_pn, $direction);
         $house->setSessionHouse($id_lessor);

         echo json_encode($updateHouse);

        break;

        case 'insert':
         $name_house = $_POST["title"] ;
         $description = $_POST["description"];
         $num_rooms =$_POST["habitaciones"];
         $num_toilets=$_POST["baños"];
         $parking_lot =$_POST["parqueadero"];
         $internet= $_POST["internet"];
         $price_pn=$_POST["price_noche"];
         $direction = $_POST["direction"];

         $house = new House();
         $house->setHouse($name_house, $description, $num_rooms, $num_toilets, $parking_lot, $internet,  $_SESSION['iduser'],$price_pn, $direction);

         $create_house=$house->createHouse();
         $lastid_house= $house->Last_id();

         // ADDITIONAL SERVICES
         $piscina = $_POST["piscina"];
         $limpieza = $_POST["limpieza"];
         $aire = $_POST["aire"];
         $agua = $_POST["agua"];
         $sauna = $_POST["sauna"];

         $services = array($piscina, $limpieza, $aire, $agua, $sauna);

         foreach($services as $service )
         {
               if($service != NULL){
                  $serviceadd  = new AditionalServerHelp();
                  // set for id service
                  $serviceadd->setService($service);
                  $idservice =$serviceadd->idService();
                  // set for add service
                  $serviceadd->setServiceHelp($lastid_house["idhouses"], $idservice["idadditional_services"]);
                  $serviceadd->createServiceHelp();
               }
         }


         // storage
         $imagen_name = 'main-picture';
         $main =1;
         loadImages($imagen_name, $main, $lastid_house["idhouses"]);

         //Image help1

         $images_apoyo = array('additional-images','additional-images-2');
         $main_a=0;

         foreach ($images_apoyo as $imagen_a) {
            loadImages($imagen_a, $main_a, $lastid_house["idhouses"]);
         }
         unset($imagen_a);

         echo json_encode($create_house);
         break;
        default:
         break;

   }

}



// SHOW HOUSE

else
{
   $house = new House();
   $house->setSessionHouse($_SESSION['iduser']);
   echo '<script type="text/javascript">
   window.location.href="../views/LessorHouse.php";
   </script>';
}

// LOAD IMAGES
function loadImages($nameform, $main, $lastid_house){
   //  THIS FUNCTION SHOULD BE BETTER
   $imagen = $_FILES[$nameform]['name'];
   $type=$_FILES[$nameform] ['type'];
   $nombre = time();
   $url = $nombre."-".$imagen;
   $storage_img=$_SERVER['DOCUMENT_ROOT'];

      if ( $type=='image/png'||$type=='image/jpeg'||$type=='image/jpg') {
         $temp  = $_FILES[$nameform]['tmp_name'];
         $Imagen = new Imagenes();
         $Imagen->setImagen($url, $main , $lastid_house);
         $Imagen->createImagenMain();

         move_uploaded_file($temp,$storage_img."/"."airbnb_criollo"."/"."imagenes"."/".$url);
      }
      else{
         echo "formato no permitido";
      }
}




?>


<?php ob_end_flush();?>

