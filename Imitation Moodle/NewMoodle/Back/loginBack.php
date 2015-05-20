<?php
include ('dbconnect.php');

$name = $_POST['name'];
$pass = $_POST['pass'];
$account = $_POST['account'];

if(empty($name) == false )
{
		if($account == "s")
			{

				$sql = " SELECT id, Username, Password FROM studentAccounts WHERE Username = '$name' ";
				$query = mysqli_query($dbCon, $sql);
				$row = mysqli_fetch_row($query);

				$dbid = $row[0];
				$dbName = $row[1];
				$dbPass = $row[2];
				
			
				

   				 if($name == $dbName && $pass == $dbPass)
     				 {

    					  $num = 100;
				         $myArray = array($num, $name, $dbid);
                         echo json_encode($myArray);
    				  }
    			  else
    			  {
      				   echo "n";
     			      
      				} 
            }
       else if ($account == "t")
          {

           $sql = " SELECT id, Username, Password FROM teacherAccounts WHERE Username = '$name' ";
           $query = mysqli_query($dbCon, $sql);
           $row = mysqli_fetch_row($query);

			$dbid = $row[0];
			$dbName = $row[1];
			$dbPass = $row[2];

   				 if($name == $dbName && $pass == $dbPass)
    				  {

                         $num = -1;
				         $myArray = array($num, $name, $dbid);
                         echo json_encode($myArray);
     				  }
      			else
    			  {
     				    echo "n";
       				  
     			  } 

           }
    }
    else
    {
    	echo "empty";
    }

?>