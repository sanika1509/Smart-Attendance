<?php
class attendance
{
	public $conn;
function __construct($cn){
$host="localhost:3306";
$user="root";
$pass="";
$dbname="demo";
$conn=mysqli_connect($host,$user,$pass,$dbname);
if(!$conn)
{
die('Error :'.mysqli_connect_error());
}
else
{

$sql = "select * from `$cn`";
$result = mysqli_query($conn,$sql);
if (!$result) {
    echo "DB Error, could not list data\n";
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}
$total_rows_feched=mysqli_num_rows($result);
$ch=1;$n=1;
while($row = mysqli_fetch_row($result)) 
{   
	disp($row,$ch,$n,$total_rows_feched);
	$ch++;$n++;
}

}
}}
$a1=new attendance($classname);


?>