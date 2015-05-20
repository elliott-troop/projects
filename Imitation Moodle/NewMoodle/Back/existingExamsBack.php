<?php
include ('dbconnect.php');

$name = $_POST['name'];

        $sql = "SELECT ExamName FROM teacherExams";
        $result = mysqli_query($dbCon, $sql);
          $i = 0;
        if(mysqli_num_rows($result)>0)
        {
             while($row = mysqli_fetch_assoc($result))
               {
                 $myArray[$i] = '<form action="showExam.php" method = "post" role="form"><button class="btn-xl btn-info" id="box" type="submit" name = "submit"><input type="hidden" name = "theExam" value ="'.$row[ExamName].'"></input><span style="font-size:40px; font-family: kodakku;" >'.$row[ExamName].'</span></button></form><br />';
                 $i = $i+1;
             }
        }
        
echo json_encode($myArray);
	
				

?>