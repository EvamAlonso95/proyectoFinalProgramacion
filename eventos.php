<?php
$titlePage = "Eventos - Ágora";
require './components/header.php';
require './components/secretTokenHeader.php';
?>

<?php require './components/header-component.php'; ?>



<div class="container mb-4 d-flex justify-content-center">
    <div class="row">
        <!-- data-masonry='{"percentPosition": true }' -->
        <?php
        $result = $db->getEvents();
        // var_dump($result);
        // Hacer algo con los resultados...

        foreach ($result as $row) : ?>
            <div class="col-4 d-flex">
                <?php require './components/cardEvents.php'; ?>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php
require './components/footer.php'; ?>