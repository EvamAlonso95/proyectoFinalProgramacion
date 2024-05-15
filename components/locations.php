<?php
$locations = $db->getLocations();
?>


<div class="form-floating mb-3">
    <select class="form-select" id="idLocation" name="idLocation" required>
        <?php foreach ($locations as $value) : ?>
            <option value="<?= $value['idLocation']; ?>"><?= $value['name']; ?></option>
        <?php endforeach ?>
    </select>
    <label for="idLocation">Localidad</label>
</div>