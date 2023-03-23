<?php

//import.php

include 'vendor/autoload.php';


if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);
 $classname=$_POST['class_name'];
 $classdes=$_POST['class_des'];
 $tb_name=$classname.$classdes;
 
function createtb($tb_name)
{
	
$connect = new PDO("mysql:host=localhost;dbname=demo", "root", "");
	$tn=$tb_name;
	$tbquery = "
   create table `$tn`
   (id int NOT NULL AUTO_INCREMENT , rollnumber int, enrollmentnumber long, studentname varchar(40), phonenumber long, emailaddress varchar(30),PRIMARY KEY (id)) 
   ";

   $statement =$connect->prepare($tbquery);
   $statement->execute();
$connect= null;

   
   
}

function insertdata($insert_data,$tb_name)
{
	
	
$connect = new PDO("mysql:host=localhost;dbname=demo", "root", "");
   $query = "
   INSERT INTO `$tb_name`
   ( rollnumber, enrollmentnumber,studentname, phonenumber, emailaddress) 
   VALUES ( :rollnumber, :enrollmentnumber, :studentname, :phonenumber, :emailaddress)
   ";

   $statement = $connect->prepare($query);
   $statement->execute($insert_data);
   $connect = null;
}
 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  createtb($tb_name);
  $data = $spreadsheet->getActiveSheet()->toArray();

  foreach($data as $row)
  {
   $insert_data = array(
   
    ':rollnumber'  => $row[0],
    ':enrollmentnumber'  => $row[1],
        ':studentname'  => $row[2],
    ':phonenumber'  => $row[3],
	':emailaddress'  => $row[4]
   );

  
  
  insertdata($insert_data,$tb_name);

 } 
  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>
