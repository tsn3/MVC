<?php require_once $_SERVER ['DOCUMENT_ROOT'] . '/views/header.php';?>
<?php
foreach ( $this->data['LIST'] as $section) {
    echo $section.'<br/>';
}?>
<?php require_once $_SERVER ['DOCUMENT_ROOT'] . '/views/footer.php';?>

