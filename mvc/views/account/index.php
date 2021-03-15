<?php require_once $_SERVER ['DOCUMENT_ROOT'].'/views/header.php';?>
<h1>
    Бобро пожаловать, <?=User::getName()?>! <?= isset($this->arResult['NEW_USER']) && $this->arResult['NEW_USER']?  'Успешно зарегистрированы!':''?>
</h1>
<?php
echo 'View Account <br/>';
?>
<?php require_once $_SERVER ['DOCUMENT_ROOT'].'/views/footer.php';?>

