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

    $url = "web.njit.edu/~dp257/NewMoodle/Middle/makeExamMiddle.php";

    $ch = curl_init();//initialize

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURL_POST, true); //true = 1
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);//post is the date of name value pair
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//get data bak = true

    $response = curl_exec($ch); //execute and get back data

    curl_close($ch);// close all curl connections
    
    $a = json_decode($response);
	
	$numOfMC = $a[0];
	$numOfTF = $a[1];
	$numOfFITB = $a[2];
	$numOfP = $a[3];
	$mcQuestions = $a[4];
	$tfQuestions = $a[5];
	$fitbQuestions = $a[6];
	$pQuestions = $a[7];

    
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
  
<h1 style="font-family: kodakku; font-size:52px; font-weight:bold;">Make an Exam</h1>
<form action="logout.php" method="post">
       <button type="submit" name="submit"  class="btn btn-info" >Logout</button> 
</form>

<div class="row">
  <div class="col-md-6">
           

<form role="form" action="makeExam.php" method="post">
 
  <div class="form-group">
         <span style="font-family: kodakku; font-size:40px; font-weight:bold;">Exam Name (No Spaces): </span><input type="text" placeholder="Exam name..." class="form-control" name="examName">
   </div>
<span style="font-family: kodakku; font-size:52px; font-weight:bold;">Select 10 Questions from below:</span><br>
<span style="font-family: kodakku; font-size:25px; font-weight:bold; color: red;">Add desired point total for each(default: 0)</span><br>

<!--
<form method="get">   
    <label for="question">Search by Question</label>
    <input id="name" name="question" placeholder="Enter the question" />
    <button class="btnSearch">Search</button>   
</form>
<form method="get">   
    <label for="questionType">Search by Type</label>
    <input id="name" name="questionType" placeholder="Enter the type" />
    <button class="btnSearch">Search</button>   
</form>


<table id="resultTable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
-->
<span style="font-family: kodakku; font-size:35px; font-weight:bold;"><u>Multiple Choice:</u></span><br>
<?php 
//echo "Number of questions for this type: ".$numOfMC[0];

//var_dump($mcQuestions);
for ($i=0; $i < $numOfMC[0]; $i++) 
{ 
  echo $mcQuestions[$i];
}

?>
<br>
<span style="font-family: kodakku; font-size:35px; font-weight:bold;"><u>True or False:</u></span><br>
<?php
//echo "Number of questions for this type: ".$numOfTF[0]; 
//var_dump($tfQuestions);

for ($i=0; $i <$numOfTF[0]; $i++) 
{ 
  echo $tfQuestions[$i];
}

?>
<br>
<span style="font-family: kodakku; font-size:35px; font-weight:bold;"><u>Fill in the Blank:</u></span><br>
<?php 
//echo "Number of questions for this type: ".$numOfFITB[0];
//var_dump($fitbQuestions);

for ($i=0; $i <$numOfFITB[0]; $i++) 
{ 
  echo $fitbQuestions[$i];
}

?>
<br>
<span style="font-family: kodakku; font-size:35px; font-weight:bold;"><u>Programming:</u></span><br>
<?php 
//echo "Number of questions for this type: ".$numOfP[0];
//var_dump($pQuestions);

for ($i=0; $i <$numOfP[0]; $i++) 
{ 
  echo $pQuestions[$i];
}
?>
<div style="font-family: kodakku; font-size:25px; font-weight:bold;">


<br>
</div>



  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 
</form>       




 <a href="successfulTeacher.php">
  <button class="btn btn-primary"> Cancel</button>
  </a>
</div>

    </div><!-- /.container -->

<script src="js/jquery-1.10.2.js"></script>
  
    
  </body>
</html>
<?php 

if(isset($_POST['submit']))
  {

    $checkboxvar = $_POST['checkboxvar'];
     $examName = $_POST['examName'];
     $questionWorth = $_POST['points'];
   
    if (!$_POST['examName'] || (strpos(trim($examName), ' ') !== false) ||  (sizeof($checkboxvar)!=10)  )
      {
           echo ("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('You did not complete all of the required fields')
                    window.location.href='makeExam.php'
                </SCRIPT>");
          die();
       }

       else
       {
  

    
$sql = "INSERT into teacherExams (ExamName) VALUES ('$examName')";
 mysqli_query($dbCon, $sql); 

$i=1;
$total = 0;
$questionWorth = array_filter($questionWorth);
$questionWorth = array_values($questionWorth);
echo $examName."<br />";
while($i <11)
  {
    $x = $i - 1;

     $sql2 = "UPDATE teacherExams SET Question".$i." = '$checkboxvar[$x]' WHERE ExamName = '$examName' ";
      mysqli_query($dbCon, $sql2);
   

     $sql3 = "UPDATE teacherExams SET Question".$i."Points = '$questionWorth[$x]' WHERE ExamName = '$examName' ";
      mysqli_query($dbCon, $sql3);

   // echo $checkboxvar[$x];
  //  echo $questionWorth[$x]."<br />";
      $total = $total + $questionWorth[$x];
      $i = $i +1; 

  }

//echo $total;

 
$sql4 = "UPDATE teacherExams SET TotalPoints = '$total' WHERE ExamName = '$examName'";
 mysqli_query($dbCon, $sql4);

      echo ("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('Your Exam Was Added!')
                    window.location.href='successfulTeacher.php'
                </SCRIPT>");
          

 
}

   }


?>