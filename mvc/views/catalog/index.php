<?php require_once $_SERVER ['DOCUMENT_ROOT'] . '/views/header_second.php';?>
<?php
$data = File("products.csv");
echo "<b><i><h2><center>Прайс-лист</b></i></h2></center>";
echo "<center><table><tr>";
$dat_arr = explode(";", $data[0]);

for ($p=0;$p<count($dat_arr);$p++) {
    echo "<td ><center><b><i>$dat_arr[$p]";
}
echo "</tr>";
for ($i=1;$i<count($data);$i++) {
    $data_array = explode(";", $data[$i]);
    echo "<tr>";
    for ($f=0;$f<count($data_array);$f++) {
        echo "<td><center><b><i>$data_array[$f]";
    }
    echo "</tr>";}echo "</table></center>";
?>

<?php require_once $_SERVER ['DOCUMENT_ROOT'] . '/views/footer.php';?>