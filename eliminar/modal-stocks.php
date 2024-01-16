<div class="modal fade" id="stocksEliminar<?php echo $fila[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Seguro que quieres eliminar este registro?
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a href="../eliminar/stocks.php?id=<?php echo $fila[0] ?>" type="button" class="btn btn-danger">ELIMINAR</a>
            </div>
        </div>
    </div>
</div>