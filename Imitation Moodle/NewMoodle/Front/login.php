<?php 
session_start();

if(isset($_POST['submit']))
{
  include_once("dbconnect.php");

$name = $_POST['name'];
$pass = $_POST['pass'];
$account = $_POST['account'];

          $post = 'name='.$name.'&pass='.$pass.'&account='.$account;

    $url = "web.njit.edu/~dp257/NewMoodle/Middle/loginMiddle.php";

             $ch = curl_init();//initialize

             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURL_POST, true); //true = 1
              curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post is the date of name value pair
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//get data bak = true

             $response = curl_exec($ch); //execute and get back data

              curl_close($ch);// close all curl connections


$a = json_decode($response);

$number = $a[0];
$sessionName = $a[1];
$sessionId = $a[2];



if($number >0)
{
   $_SESSION['user'] = $sessionName;
   $_SESSION['id'] = $sessionId;
   $_SESSION['acct'] = $_POST['account'];
 header("Location:successfulStudent.php");
}

else if($number < 0)
{
   $_SESSION['user'] = $sessionName;
    $_SESSION['id'] = $sessionId;
   $_SESSION['acct'] = $_POST['account'];
 header("Location:successfulTeacher.php");
}
else
{
 header("Location:unsuccessful.php");
}


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

   

 
    
  <div class="container">
  

<div class="row vertical-center" id="box">

      <div class="col-md-4">
      </div>

    <div class="col-md-4">
          <h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Login</h1>
                <form class=" " role="form" action="" method="post">
                    <div class="form-group">
                    <input type="usr" placeholder="Username" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" name="pass">
                    </div>
                      <div class="radio">
                     <label><input type="radio" name="account" id="s" value="s" checked >Student</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="account" id="t" value = "t">Teacher</label>
                     </div>
                   <button type="submit" class="btn btn-info" name="submit">Sign in</button>
                    
                </form>
<br>
                <span style="font-family: kodakku; font-size:28px; font-weight:;">"Simplicity is a virtue"</span>
          </div>


          <div class="col-md-4">
          </div>
</div>

<span>"simplicity is a virtue"</span>
       



    </div><!-- /.container -->


  
    
  </body>
</html>

