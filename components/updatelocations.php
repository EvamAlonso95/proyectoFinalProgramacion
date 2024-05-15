<?php
$locations = $db->getLocations();
?>


<div class="form-floating mb-3">
    <select class="form-select" id="idLocation" name="idLocation" required>
        <?php foreach ($locations as $value) : ?>
            <option value="<?= $value['idLocation']; ?>" <?php
                                                            if ($value['name'] == $rsEvent[0]['nameLocation']) {
                                                                echo "selected";
                                                            } ?>><?php echo $value['name'] ?></option>
        <?php endforeach ?>
    </select>
    <label for="idLocation">Localidad</label>
</div>