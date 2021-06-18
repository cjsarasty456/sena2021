<?php
$requiereSesion=true;
$idPagina=18;
require_once '../head.php';
?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tienda</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
    <?php
        for($i=1;$i<=3;$i++){
        ?>
        <div class="col col-4">
            <a href="detalleProducto.php" class="card" style="color:black;">
                <img src="../../assets/img/1.jpg" class="card-img-top" alt="...">
                <div class="ribbon-wrapper ribbon">
                    <div class="ribbon bg-info">
                        Nuevo
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">precio</h5>
                    <p class="card-text">Producto</p>
                </div>
            </a>
        </div>
    
    <?php
        }
     ?>
        <div class="container">
    <?php
        for($i=1;$i<=3;$i++){
        ?>  
            <a href="detalleProducto.php" class="card" style="color:black;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="../../assets/img/1.jpg" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Producto</h5>
                        <p class="card-text">Precio</p>
                        <p class="card-text"><small class="text-muted">Descripción</small></p>
                    </div>
                    </div>
                </div>
                <div class="ribbon-wrapper ribbon">
                    <div class="ribbon bg-info">
                        Nuevo
                    </div>
                </div>
            </a>
    <?php
        }
     ?>
        </div>
    </div>
</div>


<?php
$requiereSesion=true;
require_once '../footer.php';
?>