<?php
if(isset($_GET['mksheet']))
{
$mon=$_GET['month'];
$clnm=$_GET['clnm'];
$mksheet=$_GET['mksheet'];
echo $mon;
echo $clnm;
header("location:detention.php?clnm=$clnm&a_error=Presenty Marked Succesfully....!&month=$mon&mksheet=$mksheet");

}
if(isset($_GET['export']))
{
$filetype=$_GET['file_type'];
$export=$_GET['export'];
$clnm=$_GET['clnm'];
echo $filetype;
echo $export;
echo $clnm;
header("location:detention.php?clnm=$clnm&a_error=Presenty Marked Succesfully....!&file_type=$filetype&export=$export");

}
require 'includes.php';
//die();


?>