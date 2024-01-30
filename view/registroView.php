<?php
include_once './public/loginHeader.php';
?>


<div class="container mt-5">
    <div class="row  justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Registrarse
                </div>
                <div class="card-body 
                ">
                    <?php if (isset($vars['mensaje'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            Credenciales incorrectos
                        </div>
                        <?php
                    } ?>
                    <!-- Formulario de registro-->
                    <form action="?controlador=Index&accion=registrarUsuario" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="nombreusuario" name="nombreusuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasenia" name="contrasenia" required>
                        </div>
                        <div class="d-flex justify-content-center"><button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
                <div class=" d-flex justify-content-center"><a href="?controlador=Index&accion=mostrar">Ya tengo
                                    cuenta</a>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include_once './public/footer.php';
    ?>