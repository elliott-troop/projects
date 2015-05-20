<?php
include ('dbconnect.php');

$name = $_POST['name'];

	/*
				$a = "SELECT * 
         FROM studentExams
         WHERE Username = '$name'";
        $b = mysqli_query($dbCon, $a);
        $c = mysqli_fetch_row($b);

				 $allPoints = $c[1]; //there is an answer1

     if ($allPoints == null)
      $onoroff = "disabled";
    else
      $onoroff = " ";*/


        $sql = "SELECT ExamName FROM teacherExams";
        $result = mysqli_query($dbCon, $sql);

        $i = 0;
   

       if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result))
          {

            $x = "SELECT Answer1 FROM studentExams WHERE ExamName = '$row[ExamName]' ";
            $y = mysqli_query($dbCon, $x);
            $r = mysqli_fetch_assoc($y);
      
         if ($r[Answer1] == "")
            $onoroff = " ";      
         else
          $onoroff = "disabled"; 

          //$onoroff = " ";


             $myArray[$i] = '<form action="takeTest.php" method = "post" role="form"><button '.$onoroff.' class="btn-xl btn-info" id="box" type="submit" name = "submit"><input type="hidden" name = "theExam" value ="'.$row[ExamName].'"></input><span style="font-size:40px; font-family: kodakku;" >'.$row[ExamName].'</span></button></form><br />';
            $i = $i+1;
           }
        }
       

          echo json_encode($myArray);
          
          
 
       

     

				//echo $allPoints;

?>