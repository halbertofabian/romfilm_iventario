<div class="row">

    <div class="col-md-12 mb-3">
        <a href="<?= HTTP_HOST . 'inventory/new' ?>" class="btn btn-secondary float-end"> <i class="fas fa-plus"></i> Añadir inventario</a>
    </div>
    <div class="col-12">
        <table class="table table-striped table-hover tablas" style="width: 100%;">
            <thead class="table-light">
                <tr class="text-center">
                    <th>CODIGO</th>
                    <th>DESCRIPCION</th>
                    <th>EXISTENCIA</th>
                    <th>EXISTENCIA FISICA</th>
                    <th>CATEGORIA</th>
                    <th>ALMACEN</th>
                    <th>INVENTARIO</th>
                    <th>COSTO</th>
                    <th>PRECIO PUBLICO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $products = InventoryModel::mdlGetAllInventory();
                foreach ($products as $product) :
                ?>
                    <tr class="text-center">
                        <td><?= $product['mca_codigo'] ?></td>
                        <td><?= $product['mca_descripcion'] ?></td>
                        <td><?= $product['mca_existencia'] ?></td>
                        <td><?= $product['mca_existencia_fisica'] ?></td>
                        <td><?= $product['mca_categoria'] ?></td>
                        <td><?= $product['mca_almacen'] ?></td>
                        <td><?= $app->getNameInventary($product['mca_inventario']) ?></td>
                        <td><?= number_format($product['mca_costo'], 2) ?></td>
                        <td><?= number_format($product['mca_precio_publico'], 2) ?></td>
                        <td></td>
                    </tr>

                <?php endforeach; ?>


            </tbody>
        </table>
    </div>
</div>


<script src="<?= HTTP_HOST . 'app/' ?>modules/inventory/views/list/list.js"></script>