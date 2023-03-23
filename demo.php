<?php
require 'includes.php';


$sql="select * from tyco202122;";
$result= mysqli_query($conn, $sql);

$row= mysqli_fetch_assoc($result);
foreach($result as $row)
{
    $presentdays=0;
    $counter=0;
foreach($row as $var => $key)
{
    echo "$var - $key<br>";
    $datearr=array();
   // $datearr=split('-',$var);
    $datearr=explode('-',$var);
    print_r($datearr);
    if(sizeof($datearr)>1){
    $month=$datearr[1];
    }
    else{
        $month='0';
    }
    if($month=='07')
    {
        $presentdays=$presentdays+(int)$key;
        echo "$key<br>";
        $counter++;
    }
 else if($month!='07')
 {
     continue;
    }
    else{
        
    }
}
echo "<b>presendays = $presentdays </b><br>";

echo "<b>counter = $counter </b><br>";
$avg=0;
$avg=($presentdays/$counter)*100;
$avg=round($avg,2);
echo "<b>Average = $avg % </b><br>";
if($avg<75)
{
    echo "<b>Detained</b>";
}
 else {
    
    echo "<b>Clear<br></b>";
        
}}

?>