<?php
include('libs/iWorkData.php');
$cok = new Cookie();
//$cok ->saveData("user5","21");
//$cok ->deleteData("user5");
//$cok ->getData("user5");

$ses = new Session();
//$ses ->saveData("21","session");
//$ses ->getData("21");

$sql = new Mysql();
$sql ->saveData("user5","MyTest");
include('templates/index.php');
?>
