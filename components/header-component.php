<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <i class="fas fa-crow fa-2x me-3"><img src="./img/logo.png"></i>
        <a class="text-decoration-none enlace-cabecera" href="../eventos.php?st=<?php echo $st; ?>">
            <h1 class="fs-4">Eventos de Ágora</h1>
        </a>
    </div>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="../newevent.php?st=<?php echo $st; ?>" class="nav-link active" aria-current="page">Crear evento</a></li>
        <li class="nav-item"><a href="../miperfil.php?st=<?php echo $st; ?>" class="nav-link">Mi perfil</a></li>
        <li class="nav-item"><a href="#" class="nav-link" default>FAQs</a></li>
        <li class="nav-item"><a href="./index.php" class="nav-link">Desconectarse</a></li>
    </ul>
</header>