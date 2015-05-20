<?php
include ('dbconnect.php');

$name = $_POST['name'];

			
		$sql1 = "SELECT COUNT(ExamName) FROM teacherExams";
		$result1 = 	mysqli_query($dbCon, $sql1);
		$something = mysqli_fetch_row($result1);
	   $myArray[0] = $something;
	   
        $sql = "SELECT ExamName FROM teacherExams";
        $result = mysqli_query($dbCon, $sql);
        $i = 1;
        if(mysqli_num_rows($result)>0)
        {
             while($row = mysqli_fetch_assoc($result))
               {
                 $myArray[$i] = '<form action="checkTest.php" method = "post" role="form"><button class="btn-xl btn-info" id="box" type="submit" name = "submit"><input type="hidden" name = "theExam" value ="'.$row[ExamName].'"></input><span style="font-size:40px; font-family: kodakku;" >'.$row[ExamName].'</span></button></form><br />';
                 $i = $i+1;
				}
        }
		
echo json_encode($myArray);


/*include ('dbconnect.php');

$name = $_POST['name'];

/*
$a = "SELECT teacherExams.TotalPoints 
     FROM teacherExams
     INNER JOIN studentExams on teacherExams.ExamName = studentExams.ExamName";
$b = mysqli_query($dbCon, $a);
$c = mysqli_fetch_row($b);

$allPoints = $c[0];

$sql1 = "SELECT COUNT(ExamName) FROM studentExams
		WHERE studentExams.Username = '$name'";
$result1 = mysqli_query($dbCon, $sql1);
//$myArray[0] = mysqli_fetch_assoc($result1);
$myArray[0] = mysqli_fetch_assoc($result1);
//$sql="SELECT ExamName, Grade, Feedback FROM studentExams WHERE Username = '$name'";
/*
$myArray[0] = "SELECT COUNT(ExamName) AS TakenTests FROM studentExams
		WHERE studentExams.Username = '$name'";

$sql="SELECT ExamName FROM studentExams WHERE Username = '$name'";
$query = mysqli_query($dbCon, $sql);
$result = mysqli_fetch_row($query);
//$myArray[0] = mysqli_num_rows($result);
$i = 1;
if(mysqli_num_rows($result)>0)
        {
             while($row = mysqli_fetch_assoc($result))
               {
                 $myArray[$i] = '<form action="checkTest.php" method = "post" role="form"><button class="btn-xl btn-info" id="box" type="submit" name = "submit"><input type="hidden" name = "theExam" value ="'.$row[$i].'"></input><span style="font-size:40px; font-family: kodakku;" >'.$row[$i].'</span></button></form><br />';
                 $i = $i+1;
				}
        }

//$exName = $row[0];
/*$grade = $row[1];
$feedback = $row[2];


//$theArray[0]=$allPoints;
//$theArray[0]=$exName;
//$theArray[2]=$grade;
//$theArray[3]=$feedback; 

echo json_encode($myArray); */

?>
