<?php
$titlePage = "Login - Ágora";
?>
<?php require './components/header.php'; ?>

<?php require './components/logo-login-register.php'; ?>


<!-- Contenedor del formulario -->

<div class="d-flex justify-content-center align-items-center h-custom-2">
  <form action="./controller/login.php" method="post" style="width: 23rem;">
    <h3 class="fw-normal mt-3 mb-3 pb-3" style="letter-spacing: 1px;">Acceso</h3>
    <!-- Correo -->
    <div class="form-floating mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      <label for="email">Correo electrónico</label>
    </div>
    <!-- Contraseña -->
    <div class="form-floating ">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <label for="password">Contraseña</label>
    </div>
    <!-- Submit Boton-->
    <div class="pt-1 mt-4 mb-4">
      <input class="btn btn-primary btn-lg btn-block " type="submit" value="Acceder">
    </div>
    <!-- Otros -->
    <p class="small mb-5 pb-lg-2 text-muted" title="Cooming soon ;)">¿Has olvidado tu contraseña?</p>
    <p>¿No tienes cuenta? <a href="./registro.php" class="link-info">Regístrate aquí</a></p>

  </form>

</div>

</div>
<!-- Imagen derecha de la página -->
<?php require './components/imglogreg.php'; ?>
</div>
</div>
</section>
<?php require './components/footer.php'; ?>