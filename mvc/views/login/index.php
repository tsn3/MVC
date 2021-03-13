<? require_once $_SERVER ['DOCUMENT_ROOT'] . '/views/header.php'; ?>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="h3">
            Авторизация
        </div>
        <? if (isset ($this->arResult['ERROR'])) { ?>
            <p class="error">
                <?= $this->arResult['ERROR'] ?>
            </p>
        <? } ?>
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
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="h3">
            Регистрация
        </div>
        <form name="form_registr" id="form_registr" method="post" action="/login/reg/">
            <label for="login">
                Логин*
            </label>
            <br/>
            <input type="text" name="login" required="required" value="" placeholder="Login" id="reg_login"/>
            <br/>
            <label for="name">
                Имя
            </label>
            <br/>
            <input type="text" name="name" value="" placeholder="Имя" id="name"/>
            <br/>
            <label for="phone">
                Телефон
            </label>
            <br/>
            <input type="phone" name="phone" value="" placeholder="Телефон" id="phone"/>
            <br/>
            <label for="email">
                Эл. почта
            </label>
            <br/>
            <input type="email" name="email" value="" placeholder="Email" id="email"/>
            <br/>
            <label for="pass_1">
                Пароль*
            </label>
            <br/>
            <input type="password" required="required" name="pass_1" value="" placeholder="" id="pass_1"/>
            <br/>
            <label for="pass_2">
                Подтверждение пароля*
            </label>
            <br/>
            <input type="password" required="required" name="pass_2" value="" placeholder="" id="pass_2"/>
            <br/><br/>
            <input type="submit" value="Войти">
        </form>
    </div>
</div>
<?php require_once $_SERVER ['DOCUMENT_ROOT'] . '/views/footer.php'; ?>

