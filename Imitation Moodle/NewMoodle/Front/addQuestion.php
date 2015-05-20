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
  
<h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Add Question</h1>
<form action="logout.php" method="post">
       <button type="submit" name="submit"  class="btn btn-info" >Logout</button> 
</form>

          <h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Choose Question Type:</h1>


           <div id= "stuff">
            <a href="addMult.php">
               <button class="btn-xl btn-info"  id="box">
               <span style="font-size:55px; font-family: kodakku;">Multiple</span><br />
               <span style="font-size:55px; font-family: kodakku;">Choice</span>
              </button>
            </a>
             <a href="addOpen.php">
              <button class="btn-xl btn-info" href=" " id="box">
               <span style="font-size:55px; font-family: kodakku;">Fill in</span><br />
               <span style="font-size:55px; font-family: kodakku;">the Blank</span>
              </button>
            </a>

            <br> <br>
               <a href="addTF.php">
               <button class="btn-xl btn-info"  id="box">
                <span style="font-size:55px; font-family: kodakku;">True or</span><br />
               <span style="font-size:55px; font-family: kodakku;">False</span>
              </button>
            </a>
             <a href="addProg.php">
               <button class="btn-xl btn-info"  id="box">
                <span style="font-size:55px; font-family: kodakku;">Create</span><br />
               <span style="font-size:55px; font-family: kodakku;">Program</span>
              </button>
            </a>
             


          </div>

          <a href="successfulTeacher.php" class=" btn btn-info">Go Back</a>

         

       



    </div><!-- /.container -->


  
    
  </body>
</html>

