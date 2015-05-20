<?php
include ('dbconnect.php');

$question = $_POST['question'];
$correctAnswer = $_POST['correctAnswer'];
 $feedback = $_POST['feedback'];
		 

	$sql = "INSERT INTO examQuestions (Type, Question, Answer, Feedback) VALUES (1, '$question', '$correctAnswer', '$feedback')";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	
				
	echo json_encode(("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('Your True or False question has been Added!')
                    window.location.href='addQuestion.php'
                </SCRIPT>"));

?>