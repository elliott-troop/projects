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


        
$xx = $_POST['theExam'];
  
          $post = 'name='.$name.'&exname='.$xx;
           $url = "web.njit.edu/~dp257/NewMoodle/Middle/checkTestMiddle.php";

            $ch = curl_init();//initialize

             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURL_POST, true); //true = 1
              curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post is the date of name value pair
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//get data bak = true

             $response = curl_exec($ch); //execute and get back data

              curl_close($ch);// close all curl connections
              $a = json_decode($response);
			  
              $questions = $a[0];

              $Answer1 = $a[1];
              $Answer2 = $a[2];
              $Answer3 = $a[3];
              $Answer4 = $a[4];
              $Answer5 = $a[5];
              $Answer6 = $a[6];
              $Answer7 = $a[7];
              $Answer8 = $a[8];
              $Answer9 = $a[9];
              $Answer10 = $a[10];
             

			  $Feedback1 = $a[11];
			  $Feedback2 = $a[12];
			  $Feedback3 = $a[13];
        $Feedback4 = $a[14];
        $Feedback5 = $a[15];
        $Feedback6 = $a[16];
        $Feedback7 = $a[17];
        $Feedback8 = $a[18];
        $Feedback9 = $a[19];
        $Feedback10 = $a[20];
      

			  $maxPoints = $a[21];

			  $studentAnswers = $a[22];


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

.checkbox{
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
  <div class = "row">
    <div class="col-md-6">
<h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Graded Exams</h1>

<form action="logout.php" method="post">
       <button type="submit" name="submit"  class="btn btn-info" >Logout</button> 
</form>  
<form action="" method="post" role = "form">

<?php

$givenPoints;
$totalPointsEarned = 0;

echo '<div style="font-family: kodakku; font-size:25px; font-weight:bold;">';

echo "Exam Name: ".$xx."<br /><br />";


echo "Question 1: ".$questions[0]."<br />Max Points: ".$maxPoints[0]." Pts <br />";
echo "Student Answer: ".$studentAnswers[0]. "<br />";     
echo "Correct Answer: ".$Answer1[0]. "<br />";

if($studentAnswers[0] == $Answer1[0])
{
	$givenPoints = $maxPoints[0];
	$totalPointsEarned += $givenPoints;
	echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
	$givenPoints = 0;
	$totalPointsEarned += $givenPoints;
	echo "Received Points: ".$givenPoints."<br /><br>";
	echo "Feedback: ".$Feedback1[0]."<br /><br>";
}


echo "Question 2: ".$questions[1]."<br />Max Points: ".$maxPoints[1]." Pts <br />";
echo "Student Answer: ".$studentAnswers[1]. "<br />";     
echo "Correct Answer: ".$Answer2[0]. "<br />";

if($studentAnswers[1] == $Answer2[0])
{
	$givenPoints = $maxPoints[1];
	$totalPointsEarned += $givenPoints;
	echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
	$givenPoints = 0;
	$totalPointsEarned += $givenPoints;
	echo "Received Points: ".$givenPoints."<br /><br>";
	echo "Feedback: ".$Feedback2[0]."<br /><br>";
}


echo "Question 3: ".$questions[2]."<br />Max Points: ".$maxPoints[2]." Pts <br />";
echo "Student Answer: ".$studentAnswers[2]. "<br />";     
echo "Correct Answer: ".$Answer3[0]. "<br />";

if($studentAnswers[2] == $Answer3[0])
{
	$givenPoints = $maxPoints[2];
	$totalPointsEarned += $givenPoints;
	echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
	$givenPoints = 0;
	$totalPointsEarned += $givenPoints;
	echo "Received Points: ".$givenPoints."<br />";
	echo "Feedback: ".$Feedback3[0]."<br /><br>";

}

echo "Question 4: ".$questions[3]."<br />Max Points: ".$maxPoints[3]." Pts <br />";
echo "Student Answer: ".$studentAnswers[3]. "<br />";     
echo "Correct Answer: ".$Answer4[0]. "<br />";

if($studentAnswers[3] == $Answer4[0])
{
  $givenPoints = $maxPoints[3];
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
  $givenPoints = 0;
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br />";
  echo "Feedback: ".$Feedback4[0]."<br /><br>";

}

echo "Question 5: ".$questions[4]."<br />Max Points: ".$maxPoints[4]." Pts <br />";
echo "Student Answer: ".$studentAnswers[4]. "<br />";     
echo "Correct Answer: ".$Answer5[0]. "<br />";

if($studentAnswers[4] == $Answer5[0])
{
  $givenPoints = $maxPoints[4];
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
  $givenPoints = 0;
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br />";
  echo "Feedback: ".$Feedback5[0]."<br /><br>";

}

echo "Question 6: ".$questions[5]."<br />Max Points: ".$maxPoints[5]." Pts <br />";
echo "Student Answer: ".$studentAnswers[5]. "<br />";     
echo "Correct Answer: ".$Answer6[0]. "<br />";

if($studentAnswers[5] == $Answer6[0])
{
  $givenPoints = $maxPoints[5];
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
  $givenPoints = 0;
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br />";
  echo "Feedback: ".$Feedback6[0]."<br /><br>";

}

echo "Question 7: ".$questions[6]."<br />Max Points: ".$maxPoints[6]." Pts <br />";
echo "Student Answer: ".$studentAnswers[6]. "<br />";     
echo "Correct Answer: ".$Answer7[0]. "<br />";

if($studentAnswers[6] == $Answer7[0])
{
  $givenPoints = $maxPoints[6];
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
  $givenPoints = 0;
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br />";
  echo "Feedback: ".$Feedback7[0]."<br /><br>";

}

echo "Question 8: ".$questions[7]."<br />Max Points: ".$maxPoints[7]." Pts <br />";
echo "Student Answer: ".$studentAnswers[7]. "<br />";     
echo "Correct Answer: ".$Answer8[0]. "<br />";

if($studentAnswers[7] == $Answer8[0])
{
  $givenPoints = $maxPoints[7];
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
  $givenPoints = 0;
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br />";
  echo "Feedback: ".$Feedback8[0]."<br /><br>";

}

echo "Question 9: ".$questions[8]."<br />Max Points: ".$maxPoints[8]." Pts <br />";
echo "Student Answer: ".$studentAnswers[8]. "<br />";     
echo "Correct Answer: ".$Answer9[0]. "<br />";

if($studentAnswers[8] == $Answer9[0])
{
  $givenPoints = $maxPoints[8];
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
  $givenPoints = 0;
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br />";
  echo "Feedback: ".$Feedback9[0]."<br /><br>";

}

echo "Question 10: ".$questions[9]."<br />Max Points: ".$maxPoints[9]." Pts <br />";
echo "Student Answer: ".$studentAnswers[9]. "<br />";     
echo "Correct Answer: ".$Answer10[0]. "<br />";

if($studentAnswers[9] == $Answer10[0])
{
  $givenPoints = $maxPoints[9];
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br /><br>";
}

else
{
  $givenPoints = 0;
  $totalPointsEarned += $givenPoints;
  echo "Received Points: ".$givenPoints."<br />";
  echo "Feedback: ".$Feedback10[0]."<br /><br>";

}

$totalPoints = 0;

for($i = 0; $i < 10; $i++)
{
	$totalPoints += $maxPoints[$i];
}
echo '<div style="font-family: kodakku; font-size:55px; font-weight:bold; color:red;">';
echo "Your Grade is : ".$totalPointsEarned;
echo "/";
echo $totalPoints;
echo ' pts</div>';

echo '<div style="font-family: kodakku; font-size:25px; font-weight:bold;">'; 
echo '<input type="hidden" name="examname" value="'.$xx.'"';
echo '</div>';


?>


<br>
 
</form>       



</div>

   <div class="col-md-6">
  </div>
</div><!-- /.row -->

<a href="checkResults.php">
  <button class="btn btn-info"> Go Back</button>
  </a>

    </div><!-- /.container -->


  
    
  </body>
</html>
