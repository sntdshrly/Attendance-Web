<?php
// Nisa Deviani 2072051
session_start();
include_once 'entity/Dosen.php';
include_once 'entity/Detail.php';


include_once 'controller/DosenController.php';
include_once 'controller/DetailController.php';


include_once 'dao/DosenDaoImpl.php';
include_once 'dao/DetailDaoImpl.php';

include_once 'util/ConnectionUtil.php';

if (!isset($_SESSION['web_is_logged'])){
    $_SESSION['web_is_logged'] = false;
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Nisa (2072051)">
    <title>Attendance Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--datatables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/c443ba26e3.js" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
    <?php
    if($_SESSION['web_is_logged']){
        ?>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="?webmenu=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="?webmenu=logout">Logout</a>
            </li>
        </ul>
        <?php
        $menu = filter_input(INPUT_GET,'webmenu');
        switch ($menu){
//            case 'home';
//                include_once 'view/home-view.php';
//                break;
            case 'home':
                $detailController = new DetailController();
                $detailController->index();
                break;
            case 'logout';
                session_unset();
                session_destroy();
                header('location:index.php');
                break;
            default;
//                include_once 'view/home-view.php';
                $detailController = new DetailController();
                $detailController->index();
        }
    } else {
        $dosenController = new DosenController();
        $dosenController->index();
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--datatables-->
<script>
    $(document).ready(function(){
        $("#tableView").DataTable();
    })
</script>
</body>
</html>