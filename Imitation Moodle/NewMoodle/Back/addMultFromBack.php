<?php

include ('dbconnect.php');

 $question = $_POST['question'];
         $a = $_POST['choiceA'];
         $b = $_POST['choiceB'];
         $c = $_POST['choiceC'];
         $d = $_POST['choiceD'];
         $answer = $_POST['answer'];
          $feedback = $_POST['feedback'];

$sql = "INSERT into examQuestions (Type, Question, Answer, OptionA, OptionB, OptionC, OptionD, Feedback) VALUES (2, '$question', '$answer', '$a', '$b', '$c', '$d', '$feedback')";
mysqli_query($dbCon, $sql);
$row = mysqli_fetch_row($query);
		 
echo json_encode(("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('Your Multiple Choice question has been Added!')
                    window.location.href='addQuestion.php'
                </SCRIPT>"));
				
?>