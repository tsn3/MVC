<? require_once $_SERVER ['DOCUMENT_ROOT'].'/views/header.php';?>

    <h1>
        Войти
    </h1>
    <? if ( isset ($this->arResult['ERROR']) ){?>
    <p class="error">
        <?=$this->arResult['ERROR']?>
    </p>
    <?}?>
    <form name="form_login" method="post" action="/login/login/">
        <label for="login">
            Логин
        </label>
        <br/>
        <input type="text" name="login" placeholder="Login" id="login"/>
        <br/>
        <label for="password">
            Пароль
        </label>
        <br/>
        <input type="password" name="password" placeholder="Password" id="password"/>
        <br/>
        <br/>
        <input type="submit" value="Войти">
    </form>
<?php require_once $_SERVER ['DOCUMENT_ROOT'].'/views/footer.php';?>

