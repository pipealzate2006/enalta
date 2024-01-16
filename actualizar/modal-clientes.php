<div class="modal fade" id="clientes<?php echo $fila['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../actualizar/clientes.php" class="row g-3">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Cedula:</label>
                            <input type="number" class="form-control" id="recipient-name" name="cedula" value="<?php echo $fila['cedula']; ?>" placeholder="Ingrese el nuevo # de cedula">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nombre" value="<?php echo $fila['nombre_clientes']; ?>" placeholder="Ingrese el nuevo nombre">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Apellido:</label>
                            <input type="text" class="form-control" id="recipient-name" name="apellido" value="<?php echo $fila['apellido']; ?>" placeholder="Ingrese el nuevo apellido">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Direccion:</label>
                            <input type="text" class="form-control" id="recipient-name" name="direccion" value="<?php echo $fila['direccion']; ?>" placeholder="Ingrese la nueva dirección">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Telefono:</label>
                            <input type="number" class="form-control" id="recipient-name" name="telefono" value="<?php echo $fila['telefono']; ?>" placeholder="Ingrese el nuevo telefono">
                        </div>
                        <div class="col-md-6">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="recipient-name" name="correo" value="<?php echo $fila['correo']; ?>" placeholder="Ingrese el nuevo correo">
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