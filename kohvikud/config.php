<?php
$kasutaja ="ssilvet";
$dbserver ="localhost";
$andmebaas ="kohvikud";
$pw ="parool";
$yhendus = mysqli_connect($dbserver, $kasutaja, $pw, $andmebaas);

if(!$yhendus){
    
    die("EI saa ühendust!");
}
?>