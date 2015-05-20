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
  
//------------------
if(isset($_POST['submit']))
{
   if (!$_POST['question'] || !$_POST['choiceA'] || !$_POST['choiceB'] || !$_POST['choiceC'] || !$_POST['choiceD'])
      {
           echo ("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('You did not complete all of the required fields')
                    window.location.href='addMult.php'
                </SCRIPT>");
          die();
       }
    else
    {
         $question = $_POST['question'];
         $a = $_POST['choiceA'];
         $b = $_POST['choiceB'];
         $c = $_POST['choiceC'];
         $d = $_POST['choiceD'];
         $answer = $_POST['answer'];
          $feedback = $_POST['feedback'];

       
        $post = 'question='.$question.'&answer='.$answer.'&choiceA='.$a.'&choiceB='.$b.'&choiceC='.$c.'&choiceD='.$d.'&feedback='.$feedback;
	
    $url = "web.njit.edu/~dp257/NewMoodle/Middle/addMultFromMiddle.php";
			
            $ch = curl_init();//initialize

             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURL_POST, true); //true = 1
              curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post is the date of name value pair
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//get data bak = true

             $response = curl_exec($ch); //execute and get back data
		
              curl_close($ch);// close all curl connections
				
			echo json_decode($response);
		
		
     }
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

.row{
  font-family: kodakku;
  font-size: 25px;
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
  
<h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Add Multiple Choice </h1>
<form action="logout.php" method="post">
       <button type="submit" name="submit"  class="btn btn-info" >Logout</button> 
</form>


          
<div class="row">
    
      <div class="col-md-6">

         

<form method ="POST" action="addMult.php" class="form">
<div class="form-group">Question:<input class="form-control" type="text" name="question"  size="40"></div>

Choices: <br>
A:<input type = "text" name = "choiceA" size="60"  class="form-control">
B:<input type = "text" name = "choiceB" size="60"  class="form-control">
C:<input type = "text" name = "choiceC" size="60"  class="form-control">
D:<input type = "text" name = "choiceD" size="60"  class="form-control">


Correct Answer:
                  <div class="radio">
                     <label><input type="radio" name="answer" id="a" value="a" checked >A</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="answer" id="b" value = "b">B</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="answer" id="c" value="c"  >C</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="answer" id="d" value = "d">D</label>
                     </div>
Feedback (Why the answer is what it is):
<div class="form-group"><input class="form-control" type="text" name="feedback"  size="40"></div>

<br>

<input class="btn btn-info" type="submit" name="submit" value="Add">
<a href="addQuestion.php" class="btn btn-info" type="submit" name="cancel">Cancel</a>
</form>


          



     </div>

        <div class="col-md-6">
            
      </div>

    
 </div>


          
</div>
       



    </div><!-- /.container -->


  
    
  </body>
</html>

