<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        MVC
    </title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/public/css/style.css?<?= rand(100, 1000)?>">
<!--    <script type="text/javascript" src="/public/js/jquery.js"></script>-->
    <script type="text/javascript" src="/public/js/custom.js?<?= rand(100, 1000)?>"></script>
</head>
<body>
    <div id="header">
        <div class="container">
            <a href="/">Главная</a>
            <a href="/catalog/">Каталог</a>
            <? if ( User::isLogin() ): ?>
                <a href="/login/logout/">Выйти</a>
            <? else:?>
                <a href="/login/">Войти</a>
            <? endif;?>
        </div>
    </div>
<div id="main_container">
    <div class="container">