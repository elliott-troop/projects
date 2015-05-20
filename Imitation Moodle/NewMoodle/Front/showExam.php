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

           $url = "web.njit.edu/~dp257/NewMoodle/Middle/showExamMiddle.php";

             $ch = curl_init();//initialize

             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURL_POST, true); //true = 1
              curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post is the date of name value pair
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//get data bak = true

             $response = curl_exec($ch); //execute and get back data

              curl_close($ch);// close all curl connections
//echo $response;
//echo json_decode($response);
             $a = json_decode($response);

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

<h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">The <?php echo $xx; echo " Exam (".$row[20]."pts TOTAL)"; ?></h1>
   
   <div id="exam" style="font-family: Arial; font-size:32px; font-weight:bold;">
      <form  action="test2.php" method = "post" role="form" class="form-group">
        <div >
          <?php 
              echo $row[0]; 
              echo " (".$row[1]."pts) <br />";

            
              if($row1[0]==1)
                {
                
                 echo '<div class="radio">
                     <label><input type="radio" name="q1" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q1" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row1[0] ==2)
                {

                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[0]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q1" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q1" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q1" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q1" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';

                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q1" disabled>';
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
                     <label><input type="radio" name="q1" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q1" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row2[0] ==2)
                {

                 
                  $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[2]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q2" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q2" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q2" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q2" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q2" disabled>';
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
                     <label><input type="radio" name="q3" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row3[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[4]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q3" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q3" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q3" disabled>';
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
                     <label><input type="radio" name="q3" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row4[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[6]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q3" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q3" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q3" disabled>';
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
                     <label><input type="radio" name="q3" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row5[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[8]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q3" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q3" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q3" disabled>';
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
                     <label><input type="radio" name="q3" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row6[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[10]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q3" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q3" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q3" disabled>';
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
                     <label><input type="radio" name="q3" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row7[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[12]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q3" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q3" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q3" disabled>';
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
                     <label><input type="radio" name="q3" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row8[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[14]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q3" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q3" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q3" disabled>';
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
                     <label><input type="radio" name="q3" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row9[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[16]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q3" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q3" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q3" disabled>';
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
                     <label><input type="radio" name="q3" id="true" value="true" disabled >True</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="false" value = "false" disabled>False</label>
                     </div>';
                } 
                else if ( $row10[0] ==2)
                {

                  
                   $testsql = " SELECT OptionA, OptionB, OptionC, OptionD FROM examQuestions WHERE Question = '$row[18]' ";
                   $testquery = mysqli_query($dbCon, $testsql);
                   $testrow = mysqli_fetch_row($testquery);

              

                    echo '<div class="radio">
                     <label><input type="radio" name="q3" id="a" value="a" disabled >'.$testrow[0].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="b" value = "b" disabled>'.$testrow[1].'</label>
                     </div>
                     <div class="radio">
                     <label><input type="radio" name="q3" id="c" value="c" disabled>'.$testrow[2].'</label>
                     </div>
                     <div class="radio">
                       <label><input type="radio" name="q3" id="d" value = "d" disabled>'.$testrow[3].'</label>
                     </div>';
                }
                else
                {
                     echo '<input  class="form-control" type="text" name = "q3" disabled>';
                 } 

             
          ?>
        </div>


         

        </form>

  <a href="existingExams.php">
  <button class="btn btn-info"> Go Back</button>
  </a>
  
 




     </div>    

       



  </div><!-- /.container -->


  
    
  </body>
</html>


