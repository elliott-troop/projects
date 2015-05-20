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


        

  
          $post = 'name='.$name;
           $url = "web.njit.edu/~dp257/NewMoodle/Middle/gradeExamMiddle.php";

            $ch = curl_init();//initialize

             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURL_POST, true); //true = 1
              curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post is the date of name value pair
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//get data bak = true

             $response = curl_exec($ch); //execute and get back data

              curl_close($ch);// close all curl connections
              $a = json_decode($response);
              $row = $a[0];
              $AnswerRow = $a[1];
              $AnswerRow1 = $a[2];
              $AnswerRow2 = $a[3];

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
<h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Grade Exams</h1>

<form action="logout.php" method="post">
       <button type="submit" name="submit"  class="btn btn-info" >Logout</button> 
</form>  
<h1 style="font-family: kodakku; font-size:20px; font-weight:bold; color:red;">Check student answer to correct answer(leave pts blank for a marking of zero.)</h1>

<form action="" method="post" role = "form">

<?php




echo "Exam: ".$row[0] ."<br />";
echo "User: ".$row[1] ."<br /><br />";


echo '<div style="font-family: kodakku; font-size:25px; font-weight:bold;">';
echo "Question1: ".$row[2] ." ".$row[3]."Pts <br />";
echo "Student Answer :".$row[4]. "<br />";

     
echo "Correct Answer: ".$AnswerRow[0]. "<br />";
echo "Points:<br />";
echo '<input name = "1points" type="text" placeholder="10" class="form-control" ><br />' ; 
echo '</div>';        


echo '<div style="font-family: kodakku; font-size:25px; font-weight:bold;">';
echo "Question2: ".$row[5] ." ".$row[6]."Pts <br />";
echo "Student Answer :".$row[7]. "<br />";

    
echo "Correct Answer: ".$AnswerRow1[0]. "<br />";
echo "Points:<br />";

echo '<input name = "2points" type="text" placeholder="10" class="form-control" ><br />' ; 
echo '</div>';

echo '<div style="font-family: kodakku; font-size:25px; font-weight:bold;">';
echo "Question3: ".$row[8] ." ".$row[9]."Pts <br />";
echo "Student Answer :".$row[10]. "<br />";

   
echo "Correct Answer: ".$AnswerRow2[0]. "<br />";
echo "Points:<br />";

 echo '<input name = "3points" type="text" placeholder="10" class="form-control" ><br />' ; 
echo '</div>';

echo '<div style="font-family: kodakku; font-size:25px; font-weight:bold;">';
echo "Feedback <br />";
echo '<input name = "fb" type="text" placeholder="Your test feedback here" class="form-control">' ; 
echo '<input type="hidden" name="examname" value="'.$row[0].'"';
echo '</div>';
?>


<br>
 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 
</form>       



</div>
 <a href="successfulTeacher.php">
  <button class="btn btn-primary"> Cancel</button>
  </a>
   <div class="col-md-6">
  </div>

</div><!-- /.row -->

    </div><!-- /.container -->


  
    
  </body>
</html>
<?php


if(isset($_POST['submit']))
  {



     
         $p1 = $_POST['1points'];
          $p2 = $_POST['2points'];
          $p3 = $_POST['3points'];
          $xname = $_POST['examname'];

          $feed = $_POST['fb'];
          $tp = $p1+$p2+$p3;


        $sql2 = "UPDATE studentExams SET Grade = '$tp' WHERE ExamName = '$xname'";

         $query2 = mysqli_query($dbCon, $sql2);
           $row2 = mysqli_fetch_row($query2);

           $sql3 = "UPDATE studentExams SET Feedback = '$feed' WHERE ExamName = '$xname'";

            $query3 = mysqli_query($dbCon, $sql3);
          $row3 = mysqli_fetch_row($query3);

          echo ("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('You graded the exam!')
                    window.location.href='successfulTeacher.php'
                </SCRIPT>"); 
        
          
}
?>