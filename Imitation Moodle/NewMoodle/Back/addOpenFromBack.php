<?php

include ('dbconnect.php');

$question = $_POST['question'];
$answer = $_POST['answer'];
 $feedback = $_POST['feedback'];

$sql = "INSERT into examQuestions (Type, Question, Answer, Feedback) VALUES (3, '$question', '$answer', '$feedback')";
$query = mysqli_query($dbCon, $sql);
$row = mysqli_fetch_row($query);
		 
echo json_encode(("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('Your Open Ended question has been Added!')
                    window.location.href='addQuestion.php'
                </SCRIPT>"));
?>