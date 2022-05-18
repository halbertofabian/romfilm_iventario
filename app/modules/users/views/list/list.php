    <?php // $app->deniedAccess([]); 
    ?>
    <div class="row">

        <div class="col-md-12 mb-3">
            <a href="<?= HTTP_HOST . 'users/new' ?>" class="btn btn-secondary float-end"> <i class="fas fa-plus"></i> Nuevo usuario</a>
        </div>
        <div class="col-12">
            <table class="table table-striped table-hover tablas" style="width: 100%;">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>PERFIL</th>
                        <?php if ($_SESSION['session_usr']['usr_profile'] == 1) : ?>
                            <th>STATUS</th>
                        <?php endif; ?>
                        <th>FECHA REGISTRO</th>
                        <th>TELEFONO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = UsersModel::mdlGetAllUsers($_SESSION['session_usr']['usr_profile']);
                    foreach ($users as $user) : ?>
                        <tr class="text-center">

                            <td><?= $user['usr_full_name'] ?></td>
                            <td><?= $user['usr_email'] ?></td>
                            <td><?= $app->getProfileID($user['usr_profile']) ?></td>
                            <?php if ($_SESSION['session_usr']['usr_profile'] == 1) : ?>
                                <td><?= $app->getStatus($user['usr_status']) ?>
                                <?php endif; ?>
                                <td><?= $user['usr_date_log'] ?></td>
                                <td><?= $user['usr_phone'] ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                            <a class="dropdown-item btnEditUser" data-toggle="tooltip" data-placement="top" title="Editar Usuario" href="<?= HTTP_HOST . "users/edit/" . $user['usr_id'] ?>"><i class="fa fa-edit"></i> Editar</a>
                                            <?php if ($_SESSION['session_usr']['usr_id'] != $user['usr_id']) :
                                                if ($user['usr_status'] == 1) :
                                            ?>
                                                    <button class="dropdown-item btnDeleteUser" data-toggle="tooltip" data-placement="top" title="Eliminar Usuario" user_status="0" user_id="<?= $user['usr_id'] ?>"><i class="fa fa-trash-alt"></i> Eliminar</button>
                                                <?php elseif ($user['usr_status'] == 0) : ?>
                                                    <button class="dropdown-item btnDeleteUser" data-toggle="tooltip" data-placement="top" title="Activar Usuario" user_status="1" user_id="<?= $user['usr_id'] ?>"><i class="fa fa-check"></i>Activar</button>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <a class="dropdown-item btnEditPassword" href="#" data-bs-toggle="modal" data-bs-target="#ModalPassword" usr_id="<?= $user['usr_id'] ?>"><i class="fa fa-key"></i> Editar contraseña</a>
                                        </div>
                                    </div>


                                </td>


                        </tr>

                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="ModalPassword" tabindex="-1" aria-labelledby="ModalPassword" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="my-input">Nueva Contraseña</label>
                        <input id="password1" class="form-control" type="password" name="">
                    </div>
                    <input type="hidden" id="usr_hiden_id" name="">
                    <div class="form-group">
                        <label for="my-input">Repetir Contraseña</label>
                        <input id="password2" class="form-control" type="password" name="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btnUpdatePassword">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>




    <script src="<?= HTTP_HOST . 'app/' ?>modules/users/views/list/list.js"></script>