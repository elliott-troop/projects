<?php 

session_start();
session_destroy();

if(isset($_SESSION['user']))
{
   $msg = " You have logged out!";  
}
else
{
  header("Location: noAccess.php"); 
}
   
?>








<style>

@font-face { font-family: "allStar"; src: url('fonts/allStar.ttf'); } 
@font-face { font-family: "kodakku"; src: url('fonts/kodakku.ttf'); } 
@font-face { font-family: "steelfish"; src: url('fonts/steelfish.ttf'); } 

body {

}





textarea{
  resize:none;
}

#box{


  }

.vertical-center {

 min-height: 100%;
  min-height: 100vh;
   display: flex;
  align-items: center;
}


</style>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>CS490 Proj</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/prettify.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>
 

    
<script></script>
           
   
  </head>

  <body >

   

 
    
  <div class="container" style="font-family: kodakku; font-size:52px; font-weight:bold;">
  

<?php
echo $msg;
?>
<br>
<p><a href="login.php" > Click here</a> to return to login</p>



    </div><!-- /.container -->


  
    
  </body>
</html>

