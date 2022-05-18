<div class="row justify-content-center">
    <div class="col-xl-10 col-md-10 col-12">
        <h3 class="text-center text-danger">Nuevo inventario</h3>
        <form id="formNewInventory" class="row g-3">
            <div class="col-md-6 col-12">
                <label for="ivt_nombre" class="form-label">Nombre del inventario</label>
                <input type="text" class="form-control text-uppercase" name="ivt_nombre" id="ivt_nombre" required>
            </div>
            <div class="col-md-6">
                <label for="ivt_fecha" class="form-label">Fecha y hora</label>
                <input type="datetime-local" class="form-control" name="ivt_fecha" id="ivt_fecha" required>
            </div>
            <div class="col-md-6 col-12">
                <h3>Importa tu lista de productos</h3>
                <p>Instrucciones:</p>
                <ol>

                    <li> Descargar el archivo de ejemplo <a href="<?= HTTP_HOST . 'app/documents/formatoImportarInventario.xlsx' ?>" class="btn"> <i class="fa fa-file-excel"></i> Archivo de ejemplo</a></li>
                    <li> Llena tu Excel siguiendo el ejemplo </li>
                    <li> Guardalo con extensión .xls o .csv </li>
                    <li> Cargue el archivo excel permitido </li>
                    <li> Una vez realizado estos pasos, da click en el botón Importar productos </li>

                </ol>
            </div>
            <div class="col-12 col-md-6">
                <div class=" card-body">
                    <h4 class="card-title">Cargar archivo</h4>
                    <input type="file" class="form-control" name="input_file" id="input_file" required>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success float-end"><i class="fas fa-file-excel"></i> Importar productos</button>
            </div>
        </form>
    </div>
</div>



<script src="<?= HTTP_HOST . 'app/' ?>modules/inventory/views/new/new.js"></script>