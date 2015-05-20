<?php 

include_once("dbconnect.php");
$name = $_POST['name'];
$xx = $_POST['exname'];


 
  $sql = " SELECT Question1, Question1Points, Question2, Question2Points, Question3, Question3Points, Question4, Question4Points, Question5, Question5Points, Question6, Question6Points, Question7, Question7Points, Question8, Question8Points, Question9, Question9Points, Question10, Question10Points, TotalPoints FROM teacherExams WHERE ExamName = '$xx' ";
  $query = mysqli_query($dbCon, $sql);
  $row = mysqli_fetch_row($query);



$sql1 = " SELECT examQuestions.Type, teacherExams.Question1 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question1 " ; 

  $query1 = mysqli_query($dbCon, $sql1);
  $row1 = mysqli_fetch_row($query1);
//---------------------------------------------------------------------

  $sql2 = " SELECT examQuestions.Type, teacherExams.Question2 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question2 " ; 

  $query2 = mysqli_query($dbCon, $sql2);
  $row2 = mysqli_fetch_row($query2);
//--------------------------------------------------------------------------------
  $sql3 = " SELECT examQuestions.Type, teacherExams.Question3 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question3 " ; 

  $query3 = mysqli_query($dbCon, $sql3);
  $row3 = mysqli_fetch_row($query3);
  //--------------------------------------------------------------------------------
  $sql4 = " SELECT examQuestions.Type, teacherExams.Question4 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question4 " ; 

  $query4 = mysqli_query($dbCon, $sql4);
  $row4 = mysqli_fetch_row($query4);
  //--------------------------------------------------------------------------------
  $sql5 = " SELECT examQuestions.Type, teacherExams.Question5 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question5 " ; 

  $query5 = mysqli_query($dbCon, $sql5);
  $row5 = mysqli_fetch_row($query5);
  //--------------------------------------------------------------------------------
  $sql6 = " SELECT examQuestions.Type, teacherExams.Question6 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question6 " ; 

  $query6 = mysqli_query($dbCon, $sql6);
  $row6 = mysqli_fetch_row($query6);
  //--------------------------------------------------------------------------------
  $sql7 = " SELECT examQuestions.Type, teacherExams.Question7 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question7 " ; 

  $query7 = mysqli_query($dbCon, $sql7);
  $row7 = mysqli_fetch_row($query7);
  //--------------------------------------------------------------------------------
  $sql8 = " SELECT examQuestions.Type, teacherExams.Question8 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question8 " ; 

  $query8 = mysqli_query($dbCon, $sql8);
  $row8 = mysqli_fetch_row($query8);
  //--------------------------------------------------------------------------------
  $sql9 = " SELECT examQuestions.Type, teacherExams.Question9 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question9 " ; 

  $query9 = mysqli_query($dbCon, $sql9);
  $row9 = mysqli_fetch_row($query9);
  //--------------------------------------------------------------------------------
  $sql10 = " SELECT examQuestions.Type, teacherExams.Question10 
          FROM examQuestions
          INNER JOIN teacherExams on examQuestions.Question = teacherExams.Question10 " ; 

  $query10 = mysqli_query($dbCon, $sql10);
  $row10 = mysqli_fetch_row($query10);

     $myArray[0] = $row;
      $myArray[1] = $row1;
       $myArray[2] = $row2;
        $myArray[3] = $row3;
        $myArray[4] = $row4;
      $myArray[5] = $row5;
       $myArray[6] = $row6;
        $myArray[7] = $row7;
        $myArray[8] = $row8;
      $myArray[9] = $row9;
       $myArray[10] = $row10;
      

        echo json_encode($myArray); 
      //  echo $row2[0];

?>