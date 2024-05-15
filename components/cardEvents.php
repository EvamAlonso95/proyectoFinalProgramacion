<div class="card bg-primary-subtle mt-4">
    <img src="../<?php echo $row['imagen'] ?>" class="card-img-top card-imagen" alt="...">
    <div class="card-body">

        <h5 class="card-title"><?= $row['name'] ?></h5>
        <p class="card-text"><?= $row['description'] ?></p>
    </div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">Lugar: <?= $db->getLocationById($row['idLocation'])['name'] ?> </li>
        <li class="list-group-item">Cúando: <?= $row['dateTime'] ?></li>
        <li class="list-group-item">Aforo: <?= $db->getParticipantsByEvent($row['idEvent']) ?></li>
    </ul>
    <div class="card-body">
        <?php if (!$db->isUserInEvent($idUser, $row['idEvent'])) : ?>
            <a href="../controller/join.php?st=<?php echo $st; ?>&idEvent=<?php echo $row['idEvent']; ?>" class="btn btn-primary">Apuntarse</a>
        <?php else : ?>
            <a href="../controller/disjoin.php?st=<?php echo $st; ?>&idEvent=<?php echo $row['idEvent']; ?>" class="btn btn-outline-danger">Desapuntarse</a>
        <?php endif ?>

        <?php if ($db->isUserCreator($row['idEvent'], $idUser)) : ?>
            <a href="../update.php?st=<?php echo $st; ?>&idEvent=<?php echo $row['idEvent']; ?>" class="btn btn-warning">Editar</a>
            <a href="../controller/delete.php?st=<?php echo $st; ?>&idEvent=<?php echo $row['idEvent']; ?>" class="btn btn-danger">Eliminar</a>
        <?php endif ?>

    </div>
</div>