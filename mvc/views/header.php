<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        Title
    </title>
    <link rel="stylesheet" href="/public/css/style.css">
    <script type="text/javascript" src="/public/js/jquery.js"></script>
    <script type="text/javascript" src="/public/js/custom.js"></script>
</head>
<body>
    <div id="header">
        <a href="/">Главная</a>
        <a href="/catalog/">Каталог</a>
        <? if ( User::isLogin() ): ?>
            <a href="/login/logout/">Выйти</a>
        <? else:?>
            <a href="/login/">Войти</a>
        <? endif;?>
    </div>
<div id="main_container">