<?php
include ('dbconnect.php');

$question = $_POST['question'];
 $feedback = $_POST['feedback'];

	$sql = "INSERT INTO examQuestions (Type, Question, Feedback) VALUES (4, '$question', '$feedback')";
	$query = mysqli_query($dbCon, $sql);
	$row = mysqli_fetch_row($query);
	
				
	echo json_encode(("<SCRIPT LANGUAGE='JavaScript'>
                   window.alert('Your Programming question has been Added!')
                    window.location.href='addQuestion.php'
                </SCRIPT>"));

?>