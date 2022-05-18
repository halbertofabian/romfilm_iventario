<main class="main" id="top">
    <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-7 col-xxl-5 col-md-12 py-3 position-relative"><img class="bg-auth-circle-shape" src="<?= HTTP_HOST . 'app/' ?>assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="<?= HTTP_HOST . 'app/' ?>assets/img/icons/spot-illustrations/shape-1.png" alt="" width="150">
                <div class="card overflow-hidden z-index-1">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-5 d-flex flex-center bg-danger">
                                    <img class="img-fluid" src="<?= HTTP_HOST . 'app/' ?>assets/img/romfilm/logo.png" width="90%" alt="">
                                    <!--/.bg-holder-->

                                    <!-- <div class="z-index-1 position-relative"><a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="">falcon</a>
                                        <p class="opacity-75 text-white">With the power of Falcon, you can now focus only on functionaries for your digital products, while leaving the UI design on us!</p>
                                    </div> -->
                                <!-- <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                    <p class="text-white">Don't have an account?<br><a class="text-decoration-underline link-light" href="../../../pages/authentication/card/register.html">Get started!</a></p>
                                    <p class="mb-0 mt-4 mt-md-5 fs--1 fw-semi-bold text-white opacity-75">Read our <a class="text-decoration-underline text-white" href="#!">terms</a> and <a class="text-decoration-underline text-white" href="#!">conditions </a></p>
                                </div> -->
                            </div>
                            <div class="col-md-7 d-flex flex-center">
                                <div class="p-4 p-md-5 flex-grow-1">
                                    <div class="row flex-between-center">
                                        <div class="col-auto">
                                            <h3>Iniciar sesión</h3>
                                        </div>
                                    </div>
                                    <form id="formLogin" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label" for="usr_id">ID / Correo / Teléfono</label>
                                            <input class="form-control" id="usr_id" name="usr_id" type="text" required />
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="usr_password">Contraseña</label>
                                            </div>
                                            <input class="form-control" id="usr_password" name="usr_password" type="password" required />
                                        </div>
                                        <div class="row flex-between-center">

                                            <!-- <div class="col-auto"><a class="fs--1" href="../../../pages/authentication/card/forgot-password.html">Forgot Password?</a></div>-->
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-danger d-block w-100 mt-3" type="submit" name="submit">Iniciar sesión</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="<?= HTTP_HOST . 'app/' ?>modules/users/views/login/login.js"></script>