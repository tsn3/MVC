<?php require_once $_SERVER ['DOCUMENT_ROOT'] . '/views/header_second.php';?>
<?php
$csvData = file_get_contents("products.csv");
$lines = explode(PHP_EOL, $csvData);
$array = array();
foreach ($lines as $line) {
    $array[] = str_getcsv($line);
//    return $line;
}
//echo '<pre>';
//print_r($array);
//echo '</pre>';
//echo 'View Catalog <br/>';
?>

        <ul>
            <?php foreach($lines as $line){
                $array[] = str_getcsv($line);
                echo $line?>
                <li><span><?php echo $line['title'] . ' - ' . $line['price'] . '$';?></span></li>
            <?php } ?>
        </ul>

<?php require_once $_SERVER ['DOCUMENT_ROOT'] . '/views/footer.php';?>