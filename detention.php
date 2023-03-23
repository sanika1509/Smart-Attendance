<?php
session_start();
if (isset($_SESSION['user'])) 
 { 
  
 }
else 
 {
    header('location:index.php'); 
 }
    
//php_spreadsheet_export.php

include 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$classname=$_GET['clnm'];
if(isset($_GET['month']))
 {
    $mon=$_GET['month'];
 }
else 
{
    $mon='02';
    $month='01';
}
require 'includes.php';
$sql="select * from `$classname`;";
$mysqlresult= mysqli_query($conn, $sql);
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
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    </head>
    <body>
        <div class="container">
        <br />
        <h3 align="center">Detention List of the month <?php echo "($mon)"; ?> </h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <form method="get" action="detentionscript.php">
                    <div class="row">
                        <div class="col-md-5">User Data</div>
                        <div class="col-md-3">
                            <select name="month" value="<?php echo $mon;?>" class="form-control input-sm">
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
                            <input type="hidden" name="clnm" value="<?php echo $classname; ?>" >
            
                        </div> 
                        <div class="col-md-2">
                        <input type="submit" name="mksheet" class="btn btn-primary btn-sm btn-block" value="Make Sheet" />
                        </div>
                
                </form>
                <form method="get" action="detentionscript.php">
                    <input type="hidden" name="clnm" value="<?php echo $classname; ?>" >
                    <div class="col-md-2">
                       <input  name="export" class="btn btn-primary btn-sm btn-block"  onclick="ExportToExcel('xlsx')" value="Export" />
                    </div>
                </form>
                </div>
            </div>
            <div class="panel-body">
            <div class="table-responsive">
            <table id="tbl_exporttable_to_xls" class="table table-striped table-bordered">
                <tr>
                  <th>First Name</th>
                  <th>Roll Number</th>
                  <th>Enrollment Number</th>
                  <?php
                  if(isset($_GET["mksheet"]))
                  {
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
                  }
               ?>   
                      
                  <th>Total</th>     
                  
                  <th>Present</th>
                  <th>Average</th>
                  <th>Detended</th>
                </tr>
              
                <?php                    
                    $row= mysqli_fetch_assoc($mysqlresult);
                    foreach($result as $row)
                    {
                        echo "<tr> <td>".$row["studentname"]."</td>
                                    <td>".$row["rollnumber"]."</td>
                                    <td>".$row["enrollmentnumber"]."</td>";  
                        $presentdays=0;
                        $counter=0;
                            foreach($row as $var => $key)
                            {
                                $datearr=array();
                                $datearr=explode('-',$var);
                                if(sizeof($datearr)>1){
                                $month=$datearr[1];

                                if($month==$mon)
                                {
                                 $presentdays=$presentdays+(int)$key;
                                 echo "<td>$key</td>";
                                 $counter++;
                                }
                                else
                                {
                                 $month='0';
                                }
                                }
                                else if($month!='07')
                                {
                                 continue;
                                }
                                else
                                {

                                }
                            }
                            echo "<td> $counter </td>";
                            echo "<td> $presentdays </td>";
                            $avg=0;
                            if($counter!=0)
                            {
                            $avg=($presentdays/$counter)*100;
                            $avg=round($avg,2);
                            }
                            else{
                            echo '<h4 style="color:red;">No data present ...!</h4>';
                            break;
                            }
                            echo "<td>$avg % </td>";
                            if($avg<75)
                            {
                                echo "<td> <mark><b>Detained</b></mark> </td>";
                            }
                            else 
                            {
                                echo "<td>Clear</td>";
                            }
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
        <script>
            function ExportToExcel(type, fn, dl) {
                   var elt = document.getElementById('tbl_exporttable_to_xls');
                   var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
                   return dl ?
                     XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
                     XLSX.writeFile(wb, fn || ('MySheetName.' + (type || 'xlsx')));
                }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    </body>
</html>
