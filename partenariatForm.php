<?php
// database connection code

// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');


if(isset($_POST['submit']))
{    
	$con = mysqli_connect('localhost', 'root', '','archibot');

	// get the post records
	
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$nom_entreprise = $_POST['nom_entreprise'];
	$nature_entreprise = $_POST['nature_entreprise'];
	$activite = $_POST['activite'];
	
	
	
	$sql = "INSERT INTO `partenaire` (`Id`, `nom`, `prenom`,  `email`, `tel`, `nom_entreprise`, `nature_entreprise`,`activite`) VALUES ('0' , '$nom', '$prenom' , '$email','$telephone ','$nom_entreprise ','$nature_entreprise ','$activite')";
	// insert in database 
	$rs = mysqli_query($con, $sql);

     if ($rs) {
		readfile('partenariatForm.html');
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
     }
     mysqli_close($con);
}

?>


