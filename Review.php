<?php



session_start();
if (isset($_SESSION['user'])) 
 { 
  
 }
else {
     header('location:index.php'); 
 }
?>
<?php
$nd=0;
//php_spreadsheet_export.php

$year=2022;
    
include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

require 'includes.php';
$classname=$_GET['clnm'];
$sql="select * from `$classname`;";
$mysqlresult= mysqli_query($conn, $sql);
$sqlresult=mysqli_query($conn, $sql);

$connect = new PDO("mysql:host=localhost;dbname=demo", "root", "");


$query = "SELECT * FROM `$classname` ;";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();



?>
<!DOCTYPE html>
<html>
   <head>
     <title>Export Data From Mysql to Excel using PHPSpreadsheet</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   </head>
   <body>
     <div class="container">
      <br />
      <h3 align="center">Attendance List </h3>
      <br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
              <div class="row">
                <div class="col-md-6">User Data</div>
                <div class="col-md-4">
                 
                </div>
                <div class="col-md-2">
                      </div>
              </div>
            </form>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
           <table class="table table-striped table-bordered">
                <tr>

                  <?php
                  $e='F';
                  $mid=1;
                   
$row= mysqli_fetch_assoc($mysqlresult);

foreach($row as $var => $key)
{
    $datearr=array();
    $datearr=explode('-',$var);
    if(sizeof($datearr)>1){
    $month=$datearr[1];
    $year=$datearr[0];
    }
    else{
        $month='0';
    }   
    
         echo "<th>$var</th>";
 
              }
                ?>                 
                </tr>
                <?php
                  $mid=1;
                      
                    
while($row= mysqli_fetch_assoc($sqlresult))
{

foreach($row as $var => $key)
{
 
    $datearr=array();
    $datearr=explode('-',$var);
    
    if(sizeof($datearr)>1){
    $month=$datearr[1];
    }
    else{
        $month='0';
    }   
 
         echo "<td>$key</td>";
            }  echo "</tr>";
             
 
                
}      ?>

              </table>
          </div>
          </div>
        </div>
     </div>
      <br />
      <br />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
