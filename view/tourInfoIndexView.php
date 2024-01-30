<?php
include_once './public/header.php';
foreach ($vars['tour'] as $tour) {
    ?>


    <div class="d-flex justify-content-center  contenido">
        <div class="row d-flex justify-content-center ">
            <div>

            <a href="?controlador=Index&accion=mostrarIndex" class="navbar-brand"><img src="./public/img/volver.png" alt=""></a>
            </div>

            <div class="col-12 text-center my-3 row">
                <h2 class="">
                    <?php echo $tour['nombre'] ?>
                </h2>
            </div>
            <div class="col-12 carrousel d-flex justify-content-center">
                <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-inner  ">
                        <?php
                        $contador = 0;
                        foreach ($vars['imgs'] as $value) {
                            if ($contador == 0) { ?>
                                <div class="carousel-item carrousel-item active">
                                    <img src="./public/img/<?php echo $value["img"] ?>.png" class="img-view border" alt="...">
                                </div>

                                <?php $contador++;
                            } else { ?>
                                <div class="carousel-item carrousel-item">
                                    <img src="./public/img/<?php echo $value["img"] ?>.png" class="img-view border" alt="...">
                                </div>
                            <?php }
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
            <div class="col-12 row d-flex justify-content-center">
                <h5>Descripción</h5>
                <p>
                    <?php echo $tour['descripcion'] ?>
                </p>
            </div>

            <div class="col-12 row d-flex justify-content-center">
                <h5>Valoración</h5>
                <p>
                    <?php echo $tour['valoracion'] ?>
                </p>
            </div>
            <div class="col-12 row d-flex justify-content-center">
                <h5>Ubicación</h5>
                <p>
                    <?php echo $tour['ubicacion'] ?>
                </p>
            </div>

        </div>
    </div>
    <?php
}
include_once './public/footer.php';
?>