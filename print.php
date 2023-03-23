
<?php

//php_spreadsheet_export.php

session_start();
if (isset($_SESSION['user'])) 
 { 
  
 }
else {
     header('location:index.php'); 
 }
    
include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

require 'includes.php';

$classname=$_GET['clnm'];
$sql="select * from `$classname`;";
$mysqlresult= mysqli_query($conn, $sql);
$yeararr=explode('-',$classname);
$year=$yeararr[2];
if(isset($_GET['month']))
{
$mon=$_GET['month'];
}
 else {
    $mon='07';
}
$connect = new PDO("mysql:host=localhost;dbname=demo", "root", "");


$query = "SELECT * FROM `$classname` where column like `$year-$mon-%`;";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'Student Name');
  $active_sheet->setCellValue('B1', 'Roll Number');
  $active_sheet->setCellValue('C1', 'Enrollment Number');
  $active_sheet->setCellValue('D1', 'Phone Number');

  $active_sheet->setCellValue('E1', 'Email Address');
  $e='F';
  if($mon=='01'&&$mon=='03'&&$mon=='05'&&$mon=='07'&&$mon=='08'&&$mon=='10'&&$mon=='12')
  {
      for($i=1;$i<=31;$i++)
      {
          
  $active_sheet->setCellValue($e.'1', $i.'');
  $e++;
      }
  }
  else if($mon=='02')
  {
      for($i=1;$i<=28;$i++)
      {
          
  $active_sheet->setCellValue($e.'1', $i.'');
  $e++;
      }
  }else
  {
     for($i=1;$i<=30;$i++)
      {
          
  $active_sheet->setCellValue($e.'1', $i.'');
  $e++;
      }   
  }
  $count = 2;
  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["studentname"]);
    $active_sheet->setCellValue('B' . $count, $row["rollnumber"]);
    $active_sheet->setCellValue('C' . $count, $row["enrollmentnumber"]);
    $active_sheet->setCellValue('D' . $count, $row["phonenumber"]);
    $active_sheet->setCellValue('E' . $count, $row["emailaddress"]);

 
 
    $count = $count + 1;
  }

 
}

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
      <h3 align="center">Attendance of the month <?php echo "($mon)"; ?></h3>
      <br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post" action="printscript.php">
              <div class="row">
                <div class="col-md-6">User Data</div>
                  <div class="col-md-2">
                  <select name="month" value="<?php echo $mon.'-'.$year;?>" class="form-control input-sm">
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="printbtn" class="btn btn-primary btn-block" value="Make Sheet"/>
                </div>
                <input type="hidden" name="clnm" value="<?php echo $classname; ?>" >
                <div class="col-md-2">
                  <input type="submit" name="printbtn" class="btn btn-primary btn-block" value="Print" onclick="window.print()"/>
                </div>
              </div>
            </form>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
           <table class="table table-striped table-bordered">
                <tr>
                  <th>Roll Number</th>
                  <th>Enrollment Number</th>
                  
                  <?php
                               
                         
$row= mysqli_fetch_assoc($mysqlresult);

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
    if($month==$mon)
    {
        echo "<th>$var</th>";
    }
 else if($month!='07')
 {
     continue;
    }
    else{
        
    }
}

                        
                   ?>               
                </tr>
               
<?php
              
                
                
                                      
$row= mysqli_fetch_assoc($mysqlresult);
foreach($result as $row)
{
     echo "  
                  <tr>
                  
                    <td>".$row["rollnumber"]."</td>
                    <td>".$row["enrollmentnumber"]."</td>
                    ";  
    //$presentdays=0;
   //$counter=0;
foreach($row as $var => $key)
{
    $datearr=array();
    $datearr=explode('-',$var);
    if(sizeof($datearr)>1){
    $month=$datearr[1];
   
    if($month==$mon)
    {
   //  $presentdays=$presentdays+(int)$key;
         echo "<td>$key</td>";
              
    // $counter++;
     
     
      }
    else{
        $month='0';
    }
    }
 else if($month!='07')
 {
     continue;
    }
    else{
        
        
    }
}
        // echo "<td> $counter </td>";
        // echo "<td> $presentdays </td>";
//$avg=0;
//if($counter!=0)
//{
//$avg=($presentdays/$counter)*100;
//$avg=round($avg,2);
//}
//else{
//    echo '<h4 style="color:red;">No data present ...!</h4>';
//    break;
//}
 
        // echo "<td>$avg % </td>";
//if($avg<75)
//{
                 
 //        echo "<td> <mark><b>Detained</b></mark> </td>";
//}
//else {
    
        // echo "<td>Clear</td>";
//}

echo "</tr>";
}
                     
                 
                 
                 
                 
                ?>

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
