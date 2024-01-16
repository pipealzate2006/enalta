<div class="modal fade" id="stocks<?php echo $fila[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../actualizar/stocks.php">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $fila[0]; ?>">
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="recipient-name" name="cantidad" value="<?php echo $fila['cantidad']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Fecha de vencimiento:</label>
                            <input type="date" class="form-control" id="recipient-name" name="fecha" value="<?php echo $fila['fecha_vencimiento']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Selecciona la Marca del producto a la que quieres actualizar:</label>
                            <select class="form-select" aria-label="Default select example" name="productos">
                                <?php
                                include '../conexion/conexion.php';
                                $queryProductos = "SELECT * FROM productos";
                                $consultaProductos = mysqli_query($conexion, $queryProductos);

                                while ($productos = mysqli_fetch_array($consultaProductos)) {
                                    $selected = ($productos['id'] == $fila['productos_id']) ? 'selected' : '';
                                    echo "<option value='" . $productos[0] . "' " . $selected . ">" . $productos[1] . "</option>";
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