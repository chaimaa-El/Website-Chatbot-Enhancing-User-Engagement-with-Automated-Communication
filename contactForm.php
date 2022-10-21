<?php
include 'db.php';
// database connection code
 
	 

// get the post records

$nom = $_POST['nom'];
echo "nom: ".$nom;
$prenom = $_POST['prenom'];

$cin = $_POST['cin'];

$email = $_POST['email'];
$telephone = $_POST['telephone'];

$message = $_POST['message'];




$sql = "INSERT INTO `client` (`Id`, `nom`, `prenom`,  `cin`, `email`, `telephone`,`message`) VALUES ('0' , '$nom', '$prenom' ,  '$cin','$email','$telephone ','$message')";
    // insert in database 
$rs = mysqli_query($con, $sql);
if($rs){
	    readfile('contactForm.html');
    	// echo "Contact Records Inserted";
}

else
{
	echo "Are you a genuine visitor?";
	
}
?>


