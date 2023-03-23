<?php
								
function add()
{
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
//echo "Connection succesful...!";
}
$sql = "SHOW TABLES FROM $dbname";
$result = mysqli_query($conn,$sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}

while($row = mysqli_fetch_row($result)) 
{
 	disdash($row[0]);

}
//mysqli_free_result($result);
							
}
add();							
?>