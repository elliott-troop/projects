<?php 

session_start();
include_once("dbconnect.php");

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


$name = $_POST['name'];


$post = 'name='.$name;

    $url = "web.njit.edu/~dp257/NewMoodle/Middle/releaseGradesMiddle.php";

    $ch = curl_init();//initialize

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURL_POST, true); //true = 1
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post is the date of name value pair
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//get data bak = true

    $response = curl_exec($ch); //execute and get back data

    curl_close($ch);// close all curl connections

    $a = json_decode($response);


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
 
  

}

#box{
  margin-top: 20px;
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
 

    

           
   
  </head>

  <body >

   

 
    
  <div class="container">
  
<h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Pick an Exam Grades to Release</h1>
<form action="logout.php" method="post">
       <button type="submit" name="submit"  class="btn btn-info" >Logout</button> 
</form>

          

   <div  class="row">
            <div class="col-md-6">
            <h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Available Tests:</h1>
      
        <?php
              //loop thru all exams here
     
        for ($i=0; $i < sizeof($a); $i++) 
        { 
          echo $a[$i];

       }
              

        ?>
        
           
           </div>
        

          <div class="col-md-6">
            
          </div>
</div>

 <a href="successfulTeacher.php">
  <button class="btn btn-info"> Go Back</button>
  </a>
         

       <?php  ?>



    </div><!-- /.container -->


  
    
  </body>
</html>

<script>
function myFunction() {
 
    if (confirm("Are you sure you want to release the grades?") == true) 
    {
       window.alert('STUDENT GRADES HAVE BEEN RELEASED!')
      window.location.href='successfulTeacher.php'
    
    }
    else {
        
    }
}
</script>