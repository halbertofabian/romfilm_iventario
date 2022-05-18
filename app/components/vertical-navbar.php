<script>
    var isFluid = JSON.parse(localStorage.getItem('isFluid'));
    if (isFluid) {
        var container = document.querySelector('[data-layout]');
        container.classList.remove('container');
        container.classList.add('container-fluid');
    }
</script>

<nav class="navbar navbar-dark navbar-vertical navbar-expand-xl bg-danger">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="<?= HTTP_HOST ?>">
            <div class="d-flex align-items-center py-2"><img class="me-2" src="<?= HTTP_HOST . 'app/' ?>assets/img/romfilm/logo.png" alt="" width="150" />
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <?php
                $menu = "";
                if ($_SESSION['session_usr']['usr_profile'] == 1) {
                    $menu = AppFrameWorkController::obtnerMenuAdmin();
                }
                foreach ($menu as $key => $mu) :
                ?>

                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#<?= $mu[0]['label'] ?>" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                            <div class="d-flex align-items-center"><span class="nav-link-icon"><?= $mu[0]['icon'] ?></span><span class="nav-link-text ps-1"><?= $mu[0]['label'] ?></span>
                            </div>
                        </a>
                        <ul class="nav collapse" id="<?= $mu[0]['label'] ?>">
                            <?php foreach ($mu[0]['modulos'] as $key => $li) : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= HTTP_HOST . $li['href'] ?>" data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1"><?= $li['label'] ?></span>
                                        </div>
                                    </a>
                                    <!-- more inner pages-->
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>