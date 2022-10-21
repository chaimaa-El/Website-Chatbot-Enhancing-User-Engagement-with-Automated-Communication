<?php
// database connection code

// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');


if(isset($_POST['submit']))
{    
	$con = mysqli_connect('localhost', 'root', '','archibot');

	// get the post records
	
	$formation = $_POST['formation'];
	$Nbr_Employer = $_POST['Nbr_Employer'];
	$perspective = $_POST['perspective'];
	
	
	
	$sql = "INSERT INTO `demande_formation` (`Id`, `formation`, `Nbr_Employer`,  `perspective` ) VALUES ('0' , '$formation', '$Nbr_Employer' , '$perspective')";
	// insert in database 
	$rs = mysqli_query($con, $sql);

     if ($rs) {
        // echo "New record has been added successfully !";
		readfile('demandeFormationForm.html');
     } else {
        // echo "Error: " . $sql . ":-" . mysqli_error($con);
     }
     mysqli_close($con);
}

?>


