<?php
include_once './public/loginHeader.php';
?>


<div class="container mt-5">
    <div class="row  justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header ">
                    <p class="bold"> Iniciar sesión </p>
                </div>
                <div class="card-body  my-2
                ">


                    <?php if (isset($vars['registro'])) { ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {

                                notifySuccess('Registro existoso', 'Se ha creado correctamente su cuenta')
                            });
                        </script>
                        <?php
                    } ?>


                    <?php if (isset($vars['mensaje'])) { ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {

                                notifyError('Error', 'Credenciales incorrectos')
                            });

                        </script>
                        <?php
                    } ?>

                    <!-- Formulario de inicio de sesión -->
                    <form action="?controlador=Index&accion=iniciarSesion" method="post">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="nombreusuario" name="nombreusuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
                        </div>
                        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary">Iniciar
                                sesión</button>
                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-center  my-2">
                    <a href="?controlador=Index&accion=registrarse" class="link-opacity-100-hover">Registrarse</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once './public/footer.php';
?>