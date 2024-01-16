<div class="modal fade" id="marcas<?php echo $fila['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../actualizar/marcas.php">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Marca:</label>
                            <input type="text" class="form-control" id="recipient-name" name="marca" value="<?php echo $fila['nombre_marca']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Descripcion:</label>
                            <input type="text" class="form-control" id="recipient-name" name="descripcion" value="<?php echo $fila['descripcion']; ?>">
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