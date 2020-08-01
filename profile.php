<?php
session_start();
if(!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
    header("Location: /"); }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/styles/style1.css">
    <title>Изменить профиль</title>
    <link href="/public/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="/public/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</head>
<style>
    /*описание стилей*/
    #loadImg{position:absolute; z-index:1000; display:none}
</style>
<body>
<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global"
                                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav navbar-nav-hover navbar-nav align-items-lg-center ml-lg-auto">
                <?php if(isset($_SESSION['login']) && isset($_SESSION['password'])): ?>
                <li class="nav-item">
                        <i class="ni ni-shop d-lg-none"></i>
                        <span style="color: rgba(255, 255, 255, 0.95); font-size: 0.9rem;" class="nav-link-inner--text">Привет, <?php echo ucfirst($_SESSION['login']); ?></span>
                </li>
                    <li class="nav-item">
                        <a href="?exit" class="nav-link" data-toggle="dropdown" role="button">
                            <i class="ni ni-shop d-lg-none"></i>
                            <span class="nav-link-inner--text">Выйти</span>
                        </a>
                    </li>
                <?php if (isset($_GET['exit'])) {
                   unset($_SESSION['login']);
                   unset($_SESSION['password']);
                   session_destroy();
                    } ?>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="/" class="nav-link" data-toggle="dropdown" role="button">
                            <i class="ni ni-shop d-lg-none"></i>
                            <span class="nav-link-inner--text">Авторизация</span>
                        </a>
                    </li>
                <?php endif; ?>
        </div>
    </nav>
</header>
<div class="container-wide">
    <?php if(isset($_SESSION['login']) && isset($_SESSION['password'])): ?>
    <?php
    require_once 'Classes\Db.php';
    $connect = new Db();
    $login = $_SESSION['login'];
    $query = $connect->query("SELECT `first_name`, `last_name`, `patronymic`, `password` FROM `users` WHERE `login` = '$login'");
    $rows = $query->fetch();
    ?>
    <h1 class="h1-adaptive page-title">Изменить профиль</h1>
    <form id="register" action="Classes/Profile.php" method="POST" accept-charset="UTF-8">
        <div class="form-group">
            <label for="first_name">Имя</label>
            <input name="first_name" type="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rows['first_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="last_name">Фамилия</label>
            <input name="last_name" type="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rows['last_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="patronymic">Отчество</label>
            <input name="patronymic" type="patronymic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rows['patronymic']; ?>" required>
        </div>
            <input name="login" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $login; ?>">
        <div class="form-group">
            <label for="password">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите новый пароль" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
    <div class="gallery" id="content">
    </div>
    <?php else: ?>
        <h1 class="h1-adaptive page-title">Вы не авторизованы!</h1>
        <a href="/"><button class="btn btn-primary mt-3">Авторизация</button></a>
        <a href="registration.php"><button class="btn btn-primary mt-3">Регистрация</button></a>
    <?php endif; ?>
</div>
<footer class="bg-gradient-dark py-4 text-white footer-section">
    <div class="container-wide">
        <div class="row mt-4">
            <div class="col-lg-7 pb-3 pb-sm-0">
            </div>
            <div class="col-lg-5">
                <div class="footer-text">
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <span class="h6 modal-title" id="modal-title-default"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="map-placeholder">
                    <div id="map5" style="width: 1100px; height: 300px"></div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-pinterest ml-auto" data-dismiss="modal">Закрыть</button>
            </div>

        </div>
    </div>


</body>

</html>