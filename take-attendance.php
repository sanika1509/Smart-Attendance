<?php 
session_start();
if (isset($_SESSION['user'])) 
 { 
  
 }
else {
     header('location:index.php'); 
 }
        
$classname=$_GET['clnm'];
$chn=0; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Attedance Management</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product-1.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product.css">
    <script language="javascript" type='text/javascript'>
   
</script>
      
</head>

<body style="font-family: Poppins, sans-serif;border-style: none;border-radius: 0px;">
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="font-family: Poppins, sans-serif;box-shadow: 5px 0px 20px var(--bs-gray-300);border-style: none;">
        <div class="container container-sm"><a class="navbar-brand" href="#">Attendance.io</a></div>
    </nav>
   
    <div class="container-sm" style="padding: 0;margin-top: 20px;padding-left: 20px;padding-right: 20px;">
        <div class="d-flex align-items-center container-sm" style="padding: 20px;font-family: Poppins, sans-serif;border-radius: 20px;border: 3px solid #EBEBEB ;border-bottom-style: solid;">
            <h5 style="margin-bottom: 0;">Class Name - TYCO - 2022 <?php echo $classname; ?></h5>
        </div>
        <form action="markattendance.php?clnm="<?php echo $classname;?> method="get">
            <div class="d-flex flex-row justify-content-between flex-wrap container-sm" style="margin-top: 30px;margin-bottom: 30px;">
                <div class="d-flex flex-row align-items-baseline flex-nowrap" style="padding: 10px;margin-top: 0;margin-bottom: 0;width: max-content;">
                    <h5 style="width: max-content;margin-right: 20px;">Date</h5><input class="form-control" type="date" style="margin-right: 20px;border-style: none;background: #efefef;padding: 5px;border-radius: 5px;" required="" name="lecdate">
                    <h5 style="width: max-content;margin-right: 20px;margin-top: 3px;">Time</h5><input class="form-control" type="time" style="margin-right: 20px;border-style: none;background: #efefef;padding: 5px;border-radius: 5px;margin-top: 3px;" required="" name="lectime">
                </div>
                <div class="d-flex flex-row align-items-baseline" style="padding: 10px;margin-top: 0;margin-bottom: 0;width: max-content;">
                    <button class="btn btn-success" type="submit" style="margin-right: 20px;" name="confirm" >
                      Confirm</button><button class="btn btn-danger" type="reset">Cancel</button></div>
                      <input type="hidden" name="inputhidden" value="<?php echo $classname; ?>" >
            </div>
            <div class="container-sm">
                <div class="table-responsive" style="border-radius: 6px;text-align: center;">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 100px;padding: 10px;">Roll No</th>
                                <th style="width: 200px;padding: 10px;">Enrollment No</th>
                                <th style="width: 400px;padding: 10px;">Student Name</th>
                                <th style="padding: 10px;width: 100px;">Attendance</th>
                            </tr>
                        </thead>
                       
                        
		<?php require 'take.php'; ?>
                        <tbody style="border-radius: 3px;">
			<?php  function disp($row,$ch,$n,$total_rows_feched) {?>
                            <tr style="border-radius: 0;">
				<?php $studcnt=$total_rows_feched; ?>
                                <input type="hidden" name="stud_count" value="<?php echo $studcnt; ?>" />
                                <td><?php echo $row[1];?></td>
                                <td><?php echo $row[2];?></td>
                                <td><?php echo $row[3];?></td>
                                
                                <td><input type="checkbox" checked="true" style="width: 25px;height: 25px;" name="<?php echo $row[1];?>" id="<?php echo $row[1];?>" value="<?php echo 'ch'.$n;?>"></td>
                            </tr>
			<?php 
                        }
                        
                        ?>				

                         
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js"></script>
</body>

</html>