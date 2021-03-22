<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
           <?= isset($this->title) ? $this->title : "Пусто" ?>
        </title>





                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>-->

        <link rel="stylesheet" href="/public/css/style.css?<?= rand(100, 1000000)?>">
        <script type="text/javascript" src="/public/js/custom.js?<?= rand(100, 1000000)?>"></script>

        <?if (isset($this->djs) ): ?>
            <script type="text/javascript" src="<?=$this->djs?>?<?= rand(100, 1000000)?>"></script>
        <?endif?>
        <?if (isset($this->dcss) ): ?>
            <link rel="stylesheet" href="<?=$this->dcss?>?<?= rand(100, 1000000)?>">
        <?endif?>
    </head>
<body>
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">MVC</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Главная</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/catalog/">Каталог</a>
                            </li>
                            <?if (isset($_SESSION['USER_ROLE']) && ($_SESSION['USER_ROLE'] == 'admin' || $_SESSION['USER_ROLE'] =='root')):?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Админка
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/admin_catalog_sections/">Категории</a></li>
                                    <li><a class="dropdown-item" href="#">Товары</a></li>
                                    <li><a class="dropdown-item" href="#">Пользователи</a></li>
                                    <li><a class="dropdown-item" href="#">Заказы</a></li>
                                </ul>
                            </li>
                            <?endif?>
                            <? if ( User::isLogin() ): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/account/">Личный кабинет</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/login/logout/">Выйти</a>
                                </li>
                            <? else:?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/login/">Войти</a>
                                </li>
                            <? endif?>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Поиск</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
<div id="main_container">
    <div class="container">