<?php
$titlePage = "Editar Evento - Ágora"; ?>
<?php require './components/header.php';
require './components/secretTokenHeader.php';
$idEvent = $_GET['idEvent'];
require './components/header-component.php';
$rsEvent = $db->getEventById($idEvent);
?>


<div class="container">
    <h2>Edita tu evento</h2>
    <div class="container">
        <form action="./controller/updateEvent.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="secretToken" value="<?php echo $st; ?>">
            <input type="hidden" name="idEvent" value="<?php echo $idEvent; ?>">
            <!-- Nombre Evento -->
            <div class="form-floating mb-3">
                <input required type="text" class="form-control" id="floatingInput" placeholder="eventName" name="eventName" value="<?php echo $rsEvent[0]['nameEvent'] ?>">
                <label for="floatingInput">Nombre de tu evento</label>
            </div>

            <!-- Localidad Evento -->
            <?php require  './components/updatelocations.php'; ?>

            <!-- Fecha Evento -->
            <div class="form-outline datetimepicker mb-3">
                <label for="datetimepickerExample" class="form-label">Seleciona día y fecha</label>
                <input required type="datetime-local" class="form-control" value="<?php echo $rsEvent[0]['dateTime'] ?>" name="eventDate" id="datetimepickerExample">
            </div>
            <!-- Descripción Evento -->
            <div class="form-floating">
                <textarea class="form-control" placeholder="Descipción del evento" id="floatingTextarea" name="eventDescription"><?php echo $rsEvent[0]['description'] ?></textarea>
                <label for="floatingTextarea">Descipción del evento</label>
            </div>
            <!-- Imagen del Evento -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Sube una imagen de tu evento</label>
                <input class="form-control" name="eventImg" type="file" id="formFile">
                <input type="hidden" name="actualImage" value="<?php echo $rsEvent[0]['imagen'] ?>">
            </div>
            <div class="pt-1 mt-4 mb-4">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit">Editar Evento</button>
            </div>
        </form>
    </div>
</div>

<?php require './components/footer.php'; ?>