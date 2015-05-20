<?php 

include_once("dbconnect.php");

$name = $_POST['name'];
$xx = $_POST['exname'];


/*$sql = "SELECT teacherExams.Question1, teacherExams.Question1Points, studentExams.Answer1,  teacherExams.Question2, teacherExams.Question2Points, studentExams.Answer2,  teacherExams.Question3, teacherExams.Question3Points, studentExams.Answer3
        FROM studentExams
        INNER JOIN teacherExams on studentExams.ExamName = teacherExams.ExamName";

$query = mysqli_query($dbCon, $sql);
$row = mysqli_fetch_row($query);*/

$sql = "SELECT teacherExams.Question1, teacherExams.Question2,teacherExams.Question3, teacherExams.Question4,teacherExams.Question5,teacherExams.Question6,teacherExams.Question7,teacherExams.Question8,teacherExams.Question9,teacherExams.Question10
        FROM teacherExams
		WHERE teacherExams.ExamName = '$xx'";
$query = mysqli_query($dbCon, $sql);
$questions = mysqli_fetch_row($query);

$sql1 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question1";
$query1 = mysqli_query($dbCon, $sql1);
$Answer1 = mysqli_fetch_row($query1);

$sql2 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question2";
$query2 = mysqli_query($dbCon, $sql2);
$Answer2 = mysqli_fetch_row($query2); 

$sql3 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question3";
$query3 = mysqli_query($dbCon, $sql3);
$Answer3 = mysqli_fetch_row($query3);  

$sql4 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question4";
$query4 = mysqli_query($dbCon, $sql4);
$Answer4 = mysqli_fetch_row($query4); 

$sql5 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question5";
$query5 = mysqli_query($dbCon, $sql5);
$Answer5 = mysqli_fetch_row($query5); 

$sql6 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question6";
$query6 = mysqli_query($dbCon, $sql6);
$Answer6 = mysqli_fetch_row($query6); 

$sql7 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question7";
$query7 = mysqli_query($dbCon, $sql7);
$Answer7 = mysqli_fetch_row($query7); 

$sql8 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question8";
$query8 = mysqli_query($dbCon, $sql8);
$Answer8 = mysqli_fetch_row($query8); 

$sql9 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question9";
$query9 = mysqli_query($dbCon, $sql9);
$Answer9 = mysqli_fetch_row($query9); 

$sql10 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question10";
$query10 = mysqli_query($dbCon, $sql10);
$Answer10 = mysqli_fetch_row($query10); 
//-------------------------------------------------------------------------------------
$sql11 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question1";
$query11 = mysqli_query($dbCon, $sql11);
$Feedback1 = mysqli_fetch_row($query11);

$sql12 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question2";
$query12 = mysqli_query($dbCon, $sql12);
$Feedback2 = mysqli_fetch_row($query12);

$sql13 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question3";
$query13 = mysqli_query($dbCon, $sql13);
$Feedback3 = mysqli_fetch_row($query13); 

$sql14 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question4";
$query14 = mysqli_query($dbCon, $sql14);
$Feedback4 = mysqli_fetch_row($query14);

$sql15 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question5";
$query15 = mysqli_query($dbCon, $sql15);
$Feedback5 = mysqli_fetch_row($query15);

$sql16 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question6";
$query16 = mysqli_query($dbCon, $sql16);
$Feedback6 = mysqli_fetch_row($query16);

$sql17 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question7";
$query17 = mysqli_query($dbCon, $sql17);
$Feedback7 = mysqli_fetch_row($query17);

$sql18 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question8";
$query18 = mysqli_query($dbCon, $sql18);
$Feedback8 = mysqli_fetch_row($query18);

$sql19 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question9";
$quer19= mysqli_query($dbCon, $sql19);
$Feedback9 = mysqli_fetch_row($query19);

$sql20 = "SELECT examQuestions.Feedback
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question10";
$query20 = mysqli_query($dbCon, $sql20);
$Feedback10 = mysqli_fetch_row($query20);

//-----------------------------------------------------------------------------------------------


$sql21 = "SELECT teacherExams.Question1Points, teacherExams.Question2Points,teacherExams.Question3Points ,teacherExams.Question4Points ,teacherExams.Question5Points ,teacherExams.Question6Points ,teacherExams.Question7Points ,teacherExams.Question8Points ,teacherExams.Question9Points ,teacherExams.Question10Points
        FROM teacherExams
		WHERE teacherExams.ExamName = '$xx'";
$query21 = mysqli_query($dbCon, $sql21);
$maxPoints = mysqli_fetch_row($query21);


$sql22 = "SELECT studentExams.Answer1, studentExams.Answer2, studentExams.Answer3 , studentExams.Answer4 , studentExams.Answer5 , studentExams.Answer6 , studentExams.Answer7 , studentExams.Answer8 , studentExams.Answer9 , studentExams.Answer10
        FROM studentExams
		WHERE studentExams.ExamName = '$xx'";
$query22 = mysqli_query($dbCon, $sql22);
$studentAnswers = mysqli_fetch_row($query22);

$myArray[0] = $questions;
$myArray[1] = $Answer1;
$myArray[2] = $Answer2;
$myArray[3] = $Answer3;
$myArray[4] = $Answer4;
$myArray[5] = $Answer5;
$myArray[6] = $Answer6;
$myArray[7] = $Answer7;
$myArray[8] = $Answer8;
$myArray[9] = $Answer9;
$myArray[10] = $Answer10;


$myArray[11] = $Feedback1;
$myArray[12] = $Feedback2;
$myArray[13] = $Feedback3;
$myArray[14] = $Feedback4;
$myArray[15] = $Feedback5;
$myArray[16] = $Feedback6;
$myArray[17] = $Feedback7;
$myArray[18] = $Feedback8;
$myArray[19] = $Feedback9;
$myArray[20] = $Feedback10;


$myArray[21] = $maxPoints;

$myArray[22] = $studentAnswers;

echo json_encode($myArray);

?>