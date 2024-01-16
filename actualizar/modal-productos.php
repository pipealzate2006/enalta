<div class="modal fade" id="productos<?php echo $fila[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="../actualizar/productos.php">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $fila[0]; ?>">
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Nombre del producto:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nombre" value="<?php echo $fila[1]; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Precio:</label>
                            <input type="number" class="form-control" id="recipient-name" name="precio" value="<?php echo $fila['precio']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Imagen del producto:</label>
                            <img src="../<?php echo $fila[3]; ?>" width="70px">
                            <input type="file" class="form-control" id="recipient-name" name="imagen" value="<?php echo $fila[3]; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Descripcion del producto:</label>
                            <input type="text" class="form-control" id="recipient-name" name="descripcion" value="<?php echo $fila[4]; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Selecciona la Marca del producto a la que quieres actualizar:</label>
                            <select class="form-select" aria-label="Default select example" name="marca">
                                <?php
                                include '../conexion/conexion.php';
                                $queryMarcas = "SELECT * FROM marcas";
                                $consultaMarcas = mysqli_query($conexion, $queryMarcas);

                                while ($marca = mysqli_fetch_array($consultaMarcas)) {
                                    $selected = ($marca['id'] == $fila['marcas_id']) ? 'selected' : '';
                                    echo "<option value='" . $marca[0] . "' " . $selected . ">" . $marca[1] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Selecciona el proveedor del producto a la que quieres actualizar:</label>
                            <select class="form-select" aria-label="Default select example" name="proveedor">
                                <?php
                                $queryProveedores = "SELECT * FROM proveedores";
                                $consultaProveedores = mysqli_query($conexion, $queryProveedores);

                                while ($proveedor = mysqli_fetch_array($consultaProveedores)) {
                                    $selected = ($proveedor['id'] == $fila['proveedores_id']) ? 'selected' : '';
                                    echo "<option value='" . $proveedor[0] . "' " . $selected . ">" . $proveedor[2] . " " . $proveedor['3'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>