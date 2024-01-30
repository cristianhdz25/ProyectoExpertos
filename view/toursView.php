<?php
include_once './public/header.php';
?>


<div class="container my-4 mb-3 ">
    <?php if ($vars['tours'] == null) { ?>
        <div class="alert alert-danger text-center mb-3" role="alert">
            No se encontraron tours
        </div>

    <?php } else { ?>
        <div class="d-flex justify-content-beetween row">
            <?php foreach ($vars['tours'] as $value) {
                ?>
                <div class="card mx-3 my-3 col-3" style="width: 18rem;">
                    <img src="./public/img/<?php echo $value['img_def']?>.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">

                            <?php echo $value['nombre'] ?>
                        </h5>
                        <p class="card-text">Ubicación:
                            <?php echo $value['ubicacion'] ?>
                        </p>
                        <p class="card-text">Valoración:

                            <?php
                            echo $value['valoracion'] ?>
                        </p>
                        <form action="?controlador=Tours&accion=mostrarTour" method="post">
                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo $vars['busqueda'] ?>">
                            <button type="submit" class="btn btn-primary">Ver info</button>
                        </form>
                    </div>
                </div>
            <?php }
    } ?>
    </div>
</div>

<?php
include_once './public/footer.php';
?>