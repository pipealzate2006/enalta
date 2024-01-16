<div class="modal fade" id="empleados<?php echo $fila[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../actualizar/empleados.php">
                    <input type="hidden" name="id" value="<?php echo $fila[0]; ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cedula" class="form-label">Cedula:</label>
                            <input type="number" class="form-control" id="cedula" name="cedula" value="<?php echo $fila['cedula']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $fila['apellido']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $fila['direccion']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo:</label>
                            <input type="email" class="form-control" id="email" name="correo" value="<?php echo $fila['correo']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="Estado" class="form-label">Estado:</label>
                            <select class="form-select" aria-label="Default select example" name="estado">
                                <option selected value="<?php echo $fila['estado'] ?>"><?php echo $fila['estado'] ?></option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Telefono:</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" value="<?php echo $fila['telefono']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>