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

           $url = "web.njit.edu/~dp257/NewMoodle/Middle/takeTestMiddle.php";

             $ch = curl_init();//initialize

             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURL_POST, true); //true = 1
              curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post is the date of name value pair
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//get data bak = true

             $response = curl_exec($ch); //execute and get back data

              curl_close($ch);// close all curl connections

//$a = json_decode($response);


$a = json_decode($response) ;
 
$row = $a[0];
$row1 = $a[1];
$row2 = $a[2];
$row3 = $a[3];
$row4 = $a[4];
$row5 = $a[5];
$row6 = $a[6];
$row7 = $a[7];
$row8 = $a[8];
$row9 = $a[9];
$row10 = $a[10];







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
 

    
<script></script>
           
   
  </head>

  <body >

   

 
    
  <div class="container">

<h1 style="font-family: kodakku; font-size:52px; font-weight:bold;"><?php echo $xx; echo " (".$row[20]."pts TOTAL)"; ?></h1>
  
 <div class="well" style="font-size:30px;">
<span id="countdown">loading time...</span> left in your exam.

<script>
// set the date we're counting down to
var target_date = new Date().getTime()+3600000;

// variables for time units
var days, hours, minutes, seconds;

// get tag element
var countdown = document.getElementById("countdown");

// update the tag with id "countdown" every 1 second
setInterval(function () {

    // find the amount of "seconds" between now and target
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;

    // do some time calculations
    days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;
    
    hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;
    
    minutes = parseInt(seconds_left / 60);
    seconds = parseInt(seconds_left % 60);
    
    // format countdown string + set tag value
    countdown.innerHTML =  hours + "h: " + minutes + "m: " + seconds + "s";   

}, 1000);
</script>
</div>

   <div id="exam" style="font-family: Arial; font-size:32px; font-weight:bold;">
      <form   method = "post" role="form" class="form-group" id = "form">
         <div >
          <?php 
              echo $row[0]; 
              echo " (".$row[1]."pts) <br />";

            
              if($row1[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q1" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q1" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row1[0] ==2)
                {

                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[0]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q1" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q1" id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q1" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q1" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';

                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q1" >';
                 } 
          ?>
        </div>

        <div>
          <?php
              echo $row[2]; 
              echo " (".$row[3]."pts) <br />";


              if($row2[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q1" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q1" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row2[0] ==2)
                {

                 
                  $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[2]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q2" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q2" id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q2" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q2" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q2" >';
                 } 
           ?>
      </div>

      <div>
          <?php 
            echo $row[4]; 
            echo " (".$row[5]."pts) <br />"; 



              if($row3[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q3" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row3[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[4]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q3" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q3" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q3" >';
                 } 

             
          ?>
        </div>

         <div>
          <?php 
            echo $row[6]; 
            echo " (".$row[7]."pts) <br />"; 



              if($row4[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q4" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q4" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row4[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[6]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q4" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q4 id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q4" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q4" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q4" >';
                 } 

             
          ?>
        </div>

         <div>
          <?php 
            echo $row[8]; 
            echo " (".$row[9]."pts) <br />"; 



              if($row5[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q5" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q5" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row5[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[8]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q5" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q5" id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q5" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q5" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q5" >';
                 } 

             
          ?>
        </div>

         <div>
          <?php 
            echo $row[10]; 
            echo " (".$row[11]."pts) <br />"; 



              if($row6[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q6" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q6" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row6[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[10]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q6" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q6" id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q6" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q6" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q6" >';
                 } 

             
          ?>
        </div>

         <div>
          <?php 
            echo $row[12]; 
            echo " (".$row[13]."pts) <br />"; 



              if($row7[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q7" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q7" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row7[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[12]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q7" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q7" id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q7" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q7" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q7" >';
                 } 

             
          ?>
        </div>

         <div>
          <?php 
            echo $row[14]; 
            echo " (".$row[15]."pts) <br />"; 



              if($row8[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q8" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q8" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row8[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[14]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q8" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q8" id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q8" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q8" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q8" >';
                 } 

             
          ?>
        </div>

         <div>
          <?php 
            echo $row[16]; 
            echo " (".$row[17]."pts) <br />"; 



              if($row9[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q9" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q9" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row9[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[16]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q9" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q9" id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q9" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q9" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q9" >';
                 } 

             
          ?>
        </div>

         <div>
          <?php 
            echo $row[18]; 
            echo " (".$row[19]."pts) <br />"; 



              if($row10[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q10" id="true" value="true"  >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q10" id="false" value = "false" >False</label>
                     </div>';
                } 
                else if ( $row10[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[18]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q10" id="a" value="a"  >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q10" id="b" value = "b" >'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q10" id="c" value="c" >'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q10" id="d" value = "d" >'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q10" >';
                 } 

             
          ?>
        </div>
         
<input type="hidden" name="thename" value= "<?php echo $xx; ?>">

  <button type="submit" class="btn-lg btn-info" name="add">Submit</button>
        </form>
     </div>    

       



  </div><!-- /.container -->




 <?php
 
// $sqlExam = " INSERT into studentExams (ExamName) VALUES ('$xx')";
 //mysqli_query($dbCon, $sqlExam); 
 

 if(isset($_POST['add']))
{
    $q1Answer = $_POST['q1'];
    $q2Answer = $_POST['q2'];
    $q3Answer = $_POST['q3'];
     $q4Answer = $_POST['q4'];
    $q5Answer = $_POST['q5'];
    $q6Answer = $_POST['q6'];
     $q7Answer = $_POST['q7'];
    $q8Answer = $_POST['q8'];
    $q9Answer = $_POST['q9'];
     $q10Answer = $_POST['q10'];
   
    $ename = $_POST['thename'];

$sqladd = "INSERT INTO studentExams (Username, ExamName, Answer1, Answer2, Answer3, Answer4, Answer5, Answer6, Answer7, Answer8, Answer9, Answer10) VALUES ('$name', '$ename', '$q1Answer', '$q2Answer', '$q3Answer', '$q4Answer', '$q5Answer', '$q6Answer', '$q7Answer', '$q8Answer', '$q9Answer', '$q10Answer')";
 mysqli_query($dbCon, $sqladd); 

 echo ("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('Your test Submission  was Added!')
                    window.location.href='successfulStudent.php'
                </SCRIPT>");


}
  ?>
    





  </body>
</html>