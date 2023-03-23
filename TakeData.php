<?php

if(!isset($_SESSION['user']))
{
    session_start();
}
else
{header("location:index.html");

    
}
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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="font-family: Poppins, sans-serif;box-shadow: 5px 0px 20px var(--bs-gray-300);border-style: none;">
        <div class="container container-sm"><a class="navbar-brand" href="#">Attendance.io</a></div>
    </nav>
    <div class="d-lg-flex justify-content-lg-center align-items-lg-center container-sm flex-column justify-content-center align-items-center" style="padding: 50px;font-family: Poppins, sans-serif;">
        
           <span id="message"></span>
		<form class="d-flex d-lg-flex flex-column justify-content-lg-center align-items-lg-center" action="importclass.php" method="post" id="import_excel_form" enctype="multipart/form-data">
            <h1 style="font-family: Poppins, sans-serif;text-align: center;margin-bottom: 50px;">Please upload .excel file of student details</h1>
            <h1 style="font-family: Poppins, sans-serif;text-align: center;margin-bottom: 50px;font-size: 18px;color: var(--bs-red);">It Should have only 5 columns, In order with Student name, Roll No, Enrollment No, Phone number, Email address, etc. and Should not have header row.</h1>
			<input class="form-control form-control-lg d-lg-flex justify-content-lg-start" type="file" name="import_excel" style="text-align: center;width: max-content;" required="">
			<input class="form-control form-control-lg d-lg-flex justify-content-lg-start" type="text" name="class_name" style="margin-top: 30px;width: max-content+500px;" placeholder="Class Name (Subject Name)" required="">
			<input class="form-control form-control-lg d-lg-flex justify-content-lg-start" type="text" name="class_des" style="margin-top: 30px;" placeholder="Class Description (Eg. TYCO-2022)" autocomplete="on" maxlength="12" required="">
			<input class="btn btn-primary btn-lg" type="submit" name="import" id="import" style="margin-top: 40px;" value="import">
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js"></script>
	
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</body>

</html>
<script>
$(document).ready(function(){
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"importclass.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
});
</script>