<script type="text/javascript" languuage="javascript">
function check(var classname)
{
alert('total selected students are 78');  
}
</script>
<?php
include 'requires.php';
$data="select * from $classname";
$students= mysqli_num_rows($data);
document.write($students);

?>