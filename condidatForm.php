<?php
include 'db.php';
// database connection code
if(isset($_POST['nom']) && !empty($_FILES['cv']['name']))
{

// get the post records

$nom = $_POST['nom'];
// echo($nom);
// echo("\n");
$prenom = $_POST['prenom'];
// echo($prenom);
// echo("\n");
$obj = $_POST['obj']; 
// echo($obj);
// echo("\n");

$email = $_POST['email'];
// echo($email);
// echo("\n");
$ville = $_POST['ville'];
// echo($ville);
// echo("\n");
 

$telephone = $_POST['telephone'];

// echo($telephone);
// echo("\n");
$cv=$_FILES['cv']['name'];
// echo 'Name: '.$cv;

// echo($cv);
// echo("\n");


$cv_type=$_FILES['cv']['type'];
$cv_size=$_FILES['cv']['size'];
$cv_tem_loc=$_FILES['cv']['tmp_name'];
$cv_store="cv/".$cv;

move_uploaded_file($cv_tem_loc,$cv_store);


$motiv=$_FILES['motiv']['name'];
// echo 'Name: '.$motiv;
$motiv_type=$_FILES['motiv']['type'];
$motiv_size=$_FILES['motiv']['size'];
$motiv_tem_loc=$_FILES['motiv']['tmp_name'];
$motiv_store="motiv/".$motiv;

move_uploaded_file($motiv_tem_loc,$motiv_store);

 $sql = "INSERT INTO `condidat` (`id`, `nom`, `prenom`, `obj`,`email`, `tel`, `cv`,`lettre_motiv`,`ville`) VALUES ('0' , '$nom', '$prenom' ,'$obj','$email','$telephone ','$cv ','$motiv','$ville')";
    // insert in database 
    $rs = mysqli_query($con, $sql);
    
    if($rs){
        readfile('condidatForm.html');
    }
    else{
        echo("Eror");
        // print_r($con);
        // echo("\n");
    }
}
 
?>