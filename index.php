<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/styles/style1.css">
    <title></title>
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
        </div>
    </nav>
</header>
<div class="container-wide">
    <h1 class="h1-adaptive page-title">Вход на сайт</h1>
    <form id="register" action="Classes/Auth.php" method="POST" accept-charset="UTF-8">
        <div class="form-group">
            <label for="login">Ваш логин</label>
            <input name="login" type="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваш логин" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" required>
        </div>
        <button type="submit" class="btn btn-primary">Вход на сайт</button>
    </form>
    <a href="registration.php"><button class="btn btn-primary mt-3">Регистрация</button></a>
    <div class="gallery" id="content">
    </div>

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