<?php
$mon=$_POST['month'];
$clnm=$_POST['clnm'];
echo $mon;
echo $clnm;
require 'includes.php';

header("location:print.php?clnm=$clnm&a_error=Presenty Marked Succesfully....!&month=$mon");


?>