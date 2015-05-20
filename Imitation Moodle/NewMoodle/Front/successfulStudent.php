<?php 


session_start();

if(!isset($_SESSION['id']))
{

header("Location: noAccess.php"); 
exit;
    
}
else
{
  $uid = $_SESSION['id'];
  $name = $_SESSION['user'];
  $account = $_SESSION['acct'];
}

?>







<style>

@font-face { font-family: "allStar"; src: url('fonts/allStar.ttf'); } 
@font-face { font-family: "kodakku"; src: url('fonts/kodakku.ttf'); } 
@font-face { font-family: "steelfish"; src: url('fonts/steelfish.ttf'); } 

body {

}



.container{
  width:100% !important;
  height:100% !important;
  

}

#stuff{
  margin-top: 75px;
  width: 75%;
  margin: 0 auto;
  text-align: center;

}

#box{
  margin-right: 20px;
}

.btn-xl {
    padding: 18px 28px;
  
  width: 400px;
  height: 200px;
    line-height: normal;
    border-radius: 8px;
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

   

 
    
  <div class="container">
  
<h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Welcome <?php echo $name ?>!</h1>
<form action="logout.php" method="post">
       <button type="submit" name="submit"  class="btn btn-info" >Logout</button> 
</form>

          

           <div id= "stuff">
            <a href="chooseTest.php">
               <button class="btn-xl btn-info"  id="box">
               <span style="font-size:55px; font-family: kodakku;">Take</span><br />
               <span style="font-size:55px; font-family: kodakku;">Test</span>
              </button>
            </a>
             <a href="checkResults.php">
              <button class="btn-xl btn-info" href=" " id="box">
               <span style="font-size:55px; font-family: kodakku;">See Test</span><br />
               <span style="font-size:55px; font-family: kodakku;">Results</span>
              </button>
            </a>

          </div>

         

       



    </div><!-- /.container -->


  
    
  </body>
</html>

