<?php
$titlePage = "Nuevo Evento - Ágora";
?>
<?php require './components/header.php'; 
require './components/secretTokenHeader.php';
require './components/header-component.php';


?>
<div class="container">

    <div class="container">
			<!-- Es necesario añadir ese enctype para poder enviar imagenes a traves de un formulario, SIEMPRE  POST -->
        <form action="./controller/registerEvent.php?st=<?php echo $st; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="secretToken" value="<?php echo $st; ?>">
            <!-- Nombre Evento -->
            <div class="form-floating mb-3">
                <input  required type="text" class="form-control" id="floatingInput" placeholder="eventName" name="eventName">
                <label for="floatingInput">Nombre de tu evento</label>
            </div>

            <!-- Localidad Evento -->
            <?php require  './components/locations.php'; ?>

            <!-- Fecha Evento -->
            <div class="form-outline datetimepicker mb-3">
                <label for="datetimepickerExample" class="form-label">Seleciona día y fecha</label>
                <input  required type="datetime-local" class="form-control" value="22/12/2020, 14:12:56" name="eventDate" id="datetimepickerExample">
            </div>
            <!-- Descripción Evento -->
            <div class="form-floating">
                <textarea class="form-control" placeholder="Descipción del evento" id="floatingTextarea" name="eventDescription"></textarea>
                <label for="floatingTextarea">Descipción del evento</label>
            </div>
            <!-- Imagen del Evento -->
            <div class="mb-3">
                <label for="formFile" class="form-label">Sube una imagen de tu evento</label>
                <input  required class="form-control" name="eventImg" type="file" id="formFile" required>
            </div>
            <div class="pt-1 mt-4 mb-4">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit">Crear Evento</button>
            </div>
        </form>
    </div>
</div>

<?php require './components/footer.php'; ?>