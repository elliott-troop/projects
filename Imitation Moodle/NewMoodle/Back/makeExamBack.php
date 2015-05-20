<?php

include ('dbconnect.php');

$sql = "SELECT COUNT(Type) FROM examQuestions WHERE examQuestions.Type = 2";
		$result = 	mysqli_query($dbCon, $sql);
		$numOfMC = mysqli_fetch_row($result);
		$myArray[0] = $numOfMC;
		
$sql1 = "SELECT COUNT(Type) FROM examQuestions WHERE examQuestions.Type = 1";
		$result1 = 	mysqli_query($dbCon, $sql1);
		$numOfTF = mysqli_fetch_row($result1);
		$myArray[1] = $numOfTF;
		
$sql2 = "SELECT COUNT(Type) FROM examQuestions WHERE examQuestions.Type = 3";
		$result2 = 	mysqli_query($dbCon, $sql2);
		$numOfFITB = mysqli_fetch_row($result2);
		$myArray[2] = $numOfFITB;
		
$sql3 = "SELECT COUNT(Type) FROM examQuestions WHERE examQuestions.Type = 4";
		$result3 = 	mysqli_query($dbCon, $sql3);
		$numOfP = mysqli_fetch_row($result3);
		$myArray[3] = $numOfP;


$sql4 = "SELECT Question FROM examQuestions WHERE Type = 2";
$query4 = mysqli_query($dbCon, $sql4);
$i = 0;
if(mysqli_num_rows($query4)>0)
        {
             while($row = mysqli_fetch_assoc($query4))
               {
                 //$mcQuestions[$i] = $row[Question];
				 $mcQuestions[$i] = '<input type="checkbox" name="checkboxvar[]" value="'.$row["Question"].'">'.$row["Question"].'<input placeholder="10" class="form-control" type="number" name="points[]">';
                 $i = $i+1;
				}
        }
//$mcQuestions = mysqli_fetch_row($query4);
//'<form action="checkTest.php" method = "post" role="form"><button class="btn-xl btn-info" id="box" type="submit" name = "submit"><input type="hidden" name = "theExam" value ="'.$row[ExamName].'"></input><span style="font-size:40px; font-family: kodakku;" >'.$row[ExamName].'</span></button></form><br />';

$sql5 = "SELECT Question FROM examQuestions WHERE Type = 1";
$query5 = mysqli_query($dbCon, $sql5);
$i = 0;
if(mysqli_num_rows($query5)>0)
        {
             while($row = mysqli_fetch_assoc($query5))
               {
                 //$mcQuestions[$i] = $row[Question];
				 $tfQuestions[$i] = '<input type="checkbox" name="checkboxvar[]" value="'.$row["Question"].'">'.$row["Question"].'<input placeholder="10" class="form-control" type="number" name="points[]">';
                 $i = $i+1;
				}
        }
//$tfQuestions = mysqli_fetch_row($query5);

$sql6 = "SELECT Question FROM examQuestions WHERE Type = 3";
$query6 = mysqli_query($dbCon, $sql6);
$i = 0;
if(mysqli_num_rows($query6)>0)
        {
             while($row = mysqli_fetch_assoc($query6))
               {
                 //$mcQuestions[$i] = $row[Question];
				 $fitbQuestions[$i] = '<input type="checkbox" name="checkboxvar[]" value="'.$row["Question"].'">'.$row["Question"].'<input placeholder="10" class="form-control" type="number" name="points[]">';
                 $i = $i+1;
				}
        }
//$fitbQuestions = mysqli_fetch_row($query6);

$sql7 = "SELECT Question FROM examQuestions WHERE Type = 4";
$query7 = mysqli_query($dbCon, $sql7);
$i = 0;
if(mysqli_num_rows($query7)>0)
        {
             while($row = mysqli_fetch_assoc($query7))
               {
                 //$mcQuestions[$i] = $row[Question];
				 $pQuestions[$i] = '<input type="checkbox" name="checkboxvar[]" value="'.$row["Question"].'">'.$row["Question"].'<input placeholder="10" class="form-control" type="number" name="points[]">';
                 $i = $i+1;
				}
        }
//$pQuestions = mysqli_fetch_row($query7);

$myArray[4] = $mcQuestions;
$myArray[5] = $tfQuestions;
$myArray[6] = $fitbQuestions;
$myArray[7] = $pQuestions;

echo json_encode($myArray);
/*
$sql8 = " SELECT Question  FROM examQuestions";
$result8 = mysqli_query($dbCon, $sql8);

$i = 8;

if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result8))
  {
    $myArray[$i] = '<input type="checkbox" name="checkboxvar[]" value="'.$row["Question"].'">'.$row["Question"].'<input placeholder="10" class="form-control" type="number" name="points[]">';
     $i = $i +1;
  }
}
*/



/*
$sql = " SELECT Question  FROM examQuestions";
$result = mysqli_query($dbCon, $sql);

$i = 0;

if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    $myArray[$i] = '<input type="checkbox" name="checkboxvar[]" value="'.$row["Question"].'">'.$row["Question"].'<input placeholder="10" class="form-control" type="number" name="points[]">';
     $i = $i +1;
  }
}

echo json_encode($myArray);
*/

?>


