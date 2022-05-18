<?php
$user = UsersModel::mdlGetAllUsersByID($rute[2]);
?>
<div class="row justify-content-center">
    <div class="col-md-6 col-10 ">
        <h3 class=" text-center text-primary">Edición de usuarios</h3>
        <form id="FormEditUsers">
            <div class="form-group">
                <label for="usr_full_name">Nombre</label>
                <input id="usr_full_name" class="form-control" type="text" name="usr_full_name" value="<?= $user['usr_full_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="usr_profile">Perfil</label>
                <select id="usr_profile" name="usr_profile" class="form-control" required>

                    <?php
                    $array_profile = AppFrameWorkController::getProfile();
                    foreach ($array_profile as  $profiles) :

                    ?>
                        <option value="<?= $profiles['id'] ?>"><?= $profiles['type'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?php
                $app->defaultSelected($user['usr_profile'], 'usr_profile');
                ?>
            </div>
            <div class="form-group">
                <label for="usr_email">Email</label>
                <input id="usr_email" class="form-control" type="email" name="usr_email" value="<?= $user['usr_email'] ?>" required>
                <input type="hidden" name="usr_id" value="<?= $user['usr_id'] ?>">
            </div>
            <div class="form-group">
                <label for="usr_phone">Telefono</label>
                <input id="usr_phone" class="form-control" type="number" name="usr_phone" value="<?= $user['usr_phone'] ?>" required>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" class="btn btn-block  btn-primary mt-3" name="btnNewUsers" value="Editar">
                </div>
            </div>

        </form>

    </div>
</div>
<script src="<?= HTTP_HOST . 'app/' ?>modules/users/views/edit/edit.js">
</script>