<?php
  $id = $_GET['id'];
  include 'db.php';

  
  $sql="SELECT * from parser where id = $id";
  $query=mysqli_query($con,$sql);
  $info=mysqli_fetch_array($query);
//   echo '<img src="data:image/jpg;base64,'.base64_encode($info['image']) .'" />'; 
//   echo $info['nom'];
//   echo $info['email'];
  $email = $info['email'];
//   echo $email;
  $sql1 = "SELECT * from condidat"; 
  $query1=mysqli_query($con,$sql1);

//    while($row = mysqli_fetch_assoc($query1)){
//      if($row['email'] == $email){
//         echo  $row['cv'];
//         // echo  $row['motiv'];
//         echo $row['ville'];
//      }
    
    
//    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Condidat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="style.css"/>
    
</head>
<style>
    * {

text-align: center;

}
    body{
         align-items: center;
    }
      embed{
        border: 5px solid #1abc9c;
        border-radius: 2%;
        margin-top: 30px;
        margin-left:30px;
        border-color:
      }
      .div1{
        justify-content:center;
        margin-left: 170px;
      }
      h3{
        color: black;
        margin-top:50px;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
        margin-bottom: 0.7rem;
      }
</style>
<body>
 
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
<span class="circle one"></span>
          <span class="circle two"></span>
<?php while ($row=mysqli_fetch_array($query1)) {
    if($row['email'] == $email){?>
      <h3><?php echo $row['prenom']." ".$row['nom']." de ".$row['ville']; ?></h3> 
      <?php echo '<img src="data:image/jpg;base64,'.base64_encode($info['image']) .'" style="width: 250px;height:250px;border-radius:30px;"/>'; ?>
      <h3>Cv :</h3>
      <embed type="application/pdf" src="cv/<?php echo $row['cv'] ; ?>" width="800" height="500" >
      <h3>Lettre de motivation :</h3>
      <embed type="application/pdf" src="motiv/<?php echo $row['lettre_motiv']; ?>" width="800" height="500" >
    <?php
    
    }
      }
      
      ?>

    
</body>
</html>
   
 