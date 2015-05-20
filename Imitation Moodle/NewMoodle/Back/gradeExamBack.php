<?php 

include_once("dbconnect.php");

$name = $_POST['name'];



$sql = "SELECT studentExams.ExamName, studentExams.UserName, teacherExams.Question1, teacherExams.Question1Points, studentExams.Answer1,  teacherExams.Question2, teacherExams.Question2Points, studentExams.Answer2,  teacherExams.Question3, teacherExams.Question3Points, studentExams.Answer3
        FROM studentExams
        INNER JOIN teacherExams on studentExams.ExamName = teacherExams.ExamName";

$query = mysqli_query($dbCon, $sql);
$row = mysqli_fetch_row($query);

$sql2 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question1";
$query2 = mysqli_query($dbCon, $sql2);
$AnswerRow = mysqli_fetch_row($query2);

$sql3 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question2";
$query3 = mysqli_query($dbCon, $sql3);
$AnswerRow1 = mysqli_fetch_row($query3); 

$sql4 = "SELECT examQuestions.Answer
          FROM examQuestions 
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question3";
$query4 = mysqli_query($dbCon, $sql4);
$AnswerRow2 = mysqli_fetch_row($query4);  

$myArray[0] = $row;
$myArray[1] = $AnswerRow;
$myArray[2] = $AnswerRow1;
$myArray[3] = $AnswerRow2;

echo json_encode($myArray);

?>