<?php
$titlePage = "Mi perfil - Ágora";
require './components/header.php';
require './components/header-component.php';
require './components/secretTokenHeader.php';
$rsUser = $db->getUser($idUser);

$nameUser = $rsUser[0]['name'];
$ageUser = $rsUser[0]['age'];
$countryUser = $rsUser[0]['country'];

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto"> <!-- Profile widget -->
            <div class=" bg-white shadow rounded overflow-hidden">
                <div class=" bg-primary-subtle px-4 pt-0 pb-2 cover">
                    <div class="media align-items-end profile-head">
                        <div class="media-body mb-5 text-black">
                            <h4 class="pt-4 mb-3"><?php echo $nameUser ?></h4>
                            <p class="small mb-3"> <i class="fas fa-map-marker-alt mr-2"></i>Edad: <?php echo $ageUser ?></p>
                            <p class="small mb-3"> <i class="fas fa-map-marker-alt mr-2"></i>Localidad: <?php echo $countryUser ?></p>
                        </div>
                    </div>
                </div>

                <!-- MIS EVENTOS -->

                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Mis eventos creados:</h5>
                    </div>
                    <div class="container mb-4">
                        <div class="row">
                            <!-- data-masonry='{"percentPosition": true }' -->
                            <?php
                            $result = $db->getEvents();
                            // Hacer algo con los resultados...

                            foreach ($result as $row) :
                                // $idEvent = $db->getIdEvents();



                                if ($db->isUserCreator($row["idEvent"], $idUser)) :
                            ?>
                                    <div class="col-6">
                                        <?php require './components/cardEvents.php'; ?>
                                    </div>
                            <?php endif;
                            endforeach ?>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>




























<?php require './components/footer.php'; ?>