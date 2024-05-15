<?php
$titlePage = "Sign up - Ágora";
?>

<?php require './components/header.php';
require './components/logo-login-register.php';
?>



<!-- Contenedor del formulario -->
<div class="d-flex justify-content-center align-items-center h-custom-2">

    <form action="./controller/register.php" method="post" style="width: 23rem;">

        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">¡Bienvenid@ a Ágora!</h3>
        <!-- Nombre -->
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="username" id="username" placeholder="name" required>
            <label for="username">Nombre</label>
        </div>
        <!-- Edad -->
        <div class="form-floating mb-3">
            <input type="number" class="form-control" name="age" id="age" placeholder="age" required>
            <label for="age">Edad</label>
        </div>
        <!-- Localidad -->
        <?php require  './components/locations.php'; ?>

        <!-- Correo -->
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            <label for="email">Correo electrónico</label>
        </div>
        <!-- Contraseña -->
        <div class="form-floating ">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Contraseña</label>
            <div id="passwordHelp" class="form-text">
                La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una minúscula y un número.
            </div>
        </div>
        <!-- Submit -->
        <div class="pt-1 mt-4 mb-4">
            <input class="btn btn-primary btn-lg btn-block " type="submit" value="Registrarte">
        </div>

    </form>

</div>

</div>
<?php require './components/imglogreg.php'; ?>
</div>
</div>
</section>
<?php require './components/footer.php'; ?>