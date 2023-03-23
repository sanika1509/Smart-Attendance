<script type="text/javascript" language="javascript">
function jsfunction()
{
    alert("Presenty marked succesfully ...!");
}
</script>
 
<?php

class markattendance
{
function __construct(){
require  'includes.php';
$clnm=$_GET['inputhidden'];

if(!$conn)
{
die('Error :'.mysqli_connect_error());
}
else
{
}
$sql="Select * from `$clnm`;";

$result = mysqli_query($conn,$sql);

if(!$result) {
    echo "DB Error, could not list data\n";
    echo 'MySQL Error: ' . mysqli_error();
    exit;
}else
{
    
$sql="Select * from `$clnm` where rollnumber = ( select min(rollnumber) from `$clnm` );";
$min = mysqli_query($conn,$sql);
$rowmin= mysqli_fetch_array($min);
$minimum=$rowmin['rollnumber'];
$sql="Select * from `$clnm` where rollnumber = ( select max(rollnumber) from `$clnm` );";
$max = mysqli_query($conn,$sql);
$rowmax= mysqli_fetch_array($max);
$maximum=$rowmax['rollnumber'];
echo $minimum;
echo "<br>".$maximum;
$num=0;
$absent=0;
//for creating new column
$clmnm=$_GET['lecdate'];
$ulttbl="alter table `$clnm` add `$clmnm` int(10) not null default 1;";
mysqli_query($conn, $ulttbl);
for($minimum;$minimum<=$maximum;$minimum++)
{
    if(isset($_GET["$minimum"]))
    {
        $num++;
        
    }else
    {
       // echo $clnm." ".$clmnm." ".$minimum;
        $addabsenty="update `$clnm` set `$clmnm`=0 where rollnumber=$minimum;";
        mysqli_query($conn, $addabsenty);
        $absent++;
    }
    
}
echo "<br>$absent students are absent ...!";


echo '<script type="text/javascript" language="javascript">jsfunction()</script>';
}
}
}
$a1=new markattendance();

//$clnm=$_GET['inputhidden'];
header("location:dashboard.php");
?>


                               
    

    