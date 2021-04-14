

<?php ob_start() ?>
<?php

require_once "../models/AditionalServerHelp.php";

session_start();



if (isset($_POST["operationHouse"])){
    $id_house = $_POST["id"]; 
    $operation = $_POST['operationHouse'];
    $id_lessor=  $_SESSION['iduser'];

   switch($operation){
      case 'editservice':
         $servicesObj = new AditionalServerHelp();
         $uservices = $servicesObj->getHouseServices($id_house);


         echo json_encode($uservices);
         break;

         case 'update_services':
            $id_house = $_POST["id"];
            $piscina = $_POST["piscina"];
            $limpieza = $_POST["limpieza"];
            $aire = $_POST["aire"];
            $agua = $_POST["agua"];
            $sauna = $_POST["sauna"];


            $servicesObje = new AditionalServerHelp();
            $result =$servicesObje->deleteService($id_house);

            $services = array($piscina, $limpieza, $aire, $agua, $sauna);

           
            foreach($services as $servi )
            {
               if($servi != NULL){
                  $servicesObje->setService($servi);
                  $idservice =$servicesObje->idService();
                 
                  // set for add service
                  $servicesObje->setServiceHelp($id_house, $idservice["idadditional_services"]);
                  $servicesObje->createServiceHelp();
               }
            }


            $resultservis = $servicesObje->getHouseServices($id_house);

            session_start();
            $_SESSION['houseServices'] = $resultservis;

            echo json_encode($resultservis);
            break;

         default:
         break;
   }

}
