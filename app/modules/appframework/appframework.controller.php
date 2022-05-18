
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 30/03/2022 12:18
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class AppFrameWorkController
{
    public function loadView($view)
    {
        $app = new AppFrameWorkController();
        $rute = AppFrameWorkController::loadRute();
        include_once 'app/modules/' . $view . '/' . $view . '.php';
    }

    public function loadView2($view)
    {
        $app = new AppFrameWorkController();
        $rute = AppFrameWorkController::loadRute();
        include_once 'app/modules/' . $view . '.php';
    }

    public function loadComponent($component)
    {
        $app = new AppFrameWorkController();
        $rute = AppFrameWorkController::loadRute();
        include_once 'app/components/' . $component . '.php';
    }
    public function loadHeaderPage($hp)
    {
        $app = new AppFrameWorkController();
        $rute = AppFrameWorkController::loadRute();
        include_once 'app/components/header-page.php';
    }
    public function loadApp()
    {
        $app = new AppFrameWorkController();
        $rute = AppFrameWorkController::loadRute();

        include_once 'app/template.php';
    }


    public function showView($array_view, $module, $default_page = "default_page")
    {
        $app = new AppFrameWorkController();
        $rute = AppFrameWorkController::loadRute();
        $_404 = true;

        if (!isset($rute[1])) {
            $app->loadView2($module . '/views/' . $default_page . '/' . $default_page);
        } else {
            foreach ($array_view as $view) {
                if ($rute[1] == $view) {
                    $app->loadView2($module . '/views/' . $view . '/' . $view);
                    $_404 = false;
                }
            }
            if ($_404) {
                $app->loadView2('appframework/views/404');
            }
        }
    }
    public function showView2($array_view, $module, $default_page = "default_page")
    {
        $app = new AppFrameWorkController();
        $rute = AppFrameWorkController::loadRute();
        $_404 = true;

        if (!isset($rute[1])) {
            echo '<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">';
            $app->loadView2($module . '/views/' . $default_page . '/' . $default_page);
            echo ' </div>
            </div>
        </div>
    </div>';
            $app->loadView2($module . '/views/' . $default_page . '/' . $default_page);
        } else {
            foreach ($array_view as $view) {
                if ($rute[1] == $view['page']) {
                    $app->loadHeaderPage($view['header_page']);
                    echo '<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">';
                    $app->loadView2($module . '/views/' . $view['page'] . '/' . $view['page']);
                    echo ' </div>
                    </div>
                </div>
            </div>';

                    $_404 = false;
                }
            }
            if ($_404) {
                $app->loadView2('appframework/views/404');
            }
        }
    }
    public static function loadRute()
    {
        $rute = array();
        if (isset($_GET['ruta'])) {
            $rute = explode('/', $_GET['ruta']);
        }
        return $rute;
    }

    public function preArray($array)
    {
        echo "<pre>", var_dump($array), "</pre>";
    }


    public static function getProfile()
    {
        $array_profile = array(
            array(
                'id' => 1,
                'type' => 'Desarrollador'
            ),
            array(
                'id' => 2,
                'type' => 'Administrador'
            ),
            array(
                'id' => 3,
                'type' => 'Gerente'
            ),
            array(
                'id' => 4,
                'type' => 'Operador'
            ),
            array(
                'id' => 5,
                'type' => 'Vendedor'
            ),

        );
        return $array_profile;
    }
    public static function get_srv_type()
    {
        $array_srv_type = array(
            array(
                'type' => 'Detallado'
            ),
            array(
                'type' => 'Pintura'
            ),
            array(
                'type' => 'Blindaje'
            ),
            array(
                'type' => 'Lote'
            ),
        );
        return $array_srv_type;
    }
    public static function get_status_quotation()
    {
        $array_qton_status = array(
            array(
                'status' => 'PENDIENTE'
            ),
            array(
                'status' => 'APROBADA'
            ),
        );
        return $array_qton_status;
    }


    public static function getProfileID($usr_profile)
    {
        switch ($usr_profile) {
            case 1:
                $prefil = "Desarrollador";
                break;
            case 2:
                $prefil = "Administrador";
                break;
            case 3:
                $prefil = "Gerente";
                break;
            case 4:
                $prefil = "Operador";
                break;
            case 5:
                $prefil = "Vendedor";
                break;

            default:
                $prefil = "";
                break;
        }
        return $prefil;
    }



    //  saludo clients
    public static function getSaludo()
    {
        $array_saludo = array(
            array(
                'id' => 1,
                'type' => 'Ing.'
            ),
            array(
                'id' => 2,
                'type' => 'Lic.'
            ),
            array(
                'id' => 3,
                'type' => 'Dr.'
            ),
            array(
                'id' => 4,
                'type' => 'Dra.'
            ),
            array(
                'id' => 5,
                'type' => 'Arq.'
            ),
            array(
                'id' => 6,
                'type' => 'Sr.'
            ),
            array(
                'id' => 7,
                'type' => 'Sra.'
            ),
            array(
                'id' => 8,
                'type' => 'Srta.'
            ),
            array(
                'id' => 9,
                'type' => 'Prof.'
            ),
            array(
                'id' => 10,
                'type' => 'Profra.'
            )

        );
        return $array_saludo;
    }

    public static function getSaludoID($saludos)
    {
        switch ($saludos) {
            case 1:
                $saludo = "Ing.";
                break;
            case 2:
                $saludo = "Lic.";
                break;
            case 3:
                $saludo = "Dr.";
                break;
            case 4:
                $saludo = "Arq.";
                break;
            default:
                $saludo = "";
                break;
        }
        return $saludo;
    }

    public static function getStatus($status)
    {
        switch ($status) {
            case 0:
                # code...
                $get_status = '<strong class="text-danger">DESACTIVADO</strong>';
                break;
            case 1:
                # code...
                $get_status = '<strong class="text-success">ACTIVO</strong>';
                break;

            default:
                # code...
                break;
        }
        return $get_status;
    }
    public static function getStatusQuotation($status)
    {
        switch ($status) {
            case 'ELIMINADA':
                # code...
                $get_status = '<strong class="text-danger"><i class="fas fa-times"></i> ELIMINADA</strong>';
                break;
            case 'PENDIENTE':
                # code...
                $get_status = '<strong class="text-dark"><i class="fas fa-clock"></i> PENDIENTE</strong>';
                break;
            case 'APROBADA':
                # code...
                $get_status = '<strong class="text-success"><i class="fas fa-check"></i> APROBADA</strong>';
                break;

            default:
                # code...
                break;
        }
        return $get_status;
    }

    public function defaultSelected($select, $id_select)
    {
        echo ' <script>
        var select = "' . $select . '";
        $("#' . $id_select . '").val(select).trigger("change");
    </script>';
    }

    public static function  deniedAccess($array_profile)
    {
        $usr_profile = $_SESSION['session_usr']['usr_profile'];
        $app = new AppFrameWorkController();
        $rute = AppFrameWorkController::loadRute();
        $access = true;
        if (!$array_profile) {
            $access = true;
        } else {
            foreach ($array_profile as $key => $profile) {
                if ($usr_profile == $profile) {
                    $access = false;
                }
            }
        }
        if (!$access) {
            echo "
           
            <p class='text-center'> <img src='https://sign.gt/wp-content/uploads/2019/10/PROHIBICION-38.png' widht='100'  /> <br></p>
            
            ";
            die();
        }
    }
    public static function getNameInventary($ivt_id)
    {
        $res = InventoryModel::mdlGetInventoryById($ivt_id);
        if ($res) {
            return $res['ivt_nombre'];
        } else {
            return "";
        }
    }
    public static function getNameUser($usr_id)
    {
        $res = UsersModel::mdlGetAllUsersByID($usr_id);
        if ($res) {
            return $res['usr_full_name'];
        } else {
            return "";
        }
    }
    function fechaCastellano($fecha)
    {
        $hora = substr($fecha, 10, 10);
        $fecha = substr($fecha, 0, 10);

        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio . ' - ' . $hora;
    }

    //Menus
    public static function obtnerMenuAdmin()
    {
        return array(

            '1' => array(
                [
                    'label' => 'Usuarios',
                    'icon' => '<i class="fas fa-user"></i>',
                    'href' => '#',
                    'modulos' =>
                    array(
                        [
                            'icon' => '',
                            'label' => 'Lista usuarios',
                            'href' => 'users/list'
                        ],

                        [
                            'icon' => '',
                            'label' => 'Nuevo usuario',
                            'href' => 'users/new'
                        ],

                        // Aqui más item de menu
                    ),
                ]
            ),
            '2' => array(
                [
                    'label' => 'Inventario',
                    'icon' => '<i class="fas fa-box-open"></i>',
                    'href' => '#',
                    'modulos' =>
                    array(
                        [
                            'icon' => '',
                            'label' => 'Lista inventario',
                            'href' => 'inventory/list'
                        ],
                        [
                            'icon' => '',
                            'label' => 'Crear inventario',
                            'href' => 'inventory/new'
                        ],
                        // Aqui más item de menu
                    ),
                ]
            ),
        );
    }
}
