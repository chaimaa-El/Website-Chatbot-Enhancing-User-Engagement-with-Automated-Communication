<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php

$connect = mysqli_connect('localhost', 'root', '','archibot');

 $query = "SELECT * FROM condidat";
 $res = mysqli_query($connect, $query);
 if(mysqli_num_rows($res) > 0)
 {
 $export = '
 <table> 
 <tr> 
 <th> id </th>
 <th>nom</th> 
 <th>prenom</th> 
 <th>cne</th>
 <th>cin</th>
 <th>email</th>
 <th>tel</th>  
 <th>cv</th> 
 <th>lettre_motiv</th>  
 
 </tr>
 ';?>
 <h2><?php
   echo($export);
 ?><h2>
 <?php
 while($row = mysqli_fetch_array($res))
 {
 $export .= '
 <tr>
 <td>'.$row["id"].'</td> 
 <td>'.$row["nom"].'</td> 
 <td>'.$row["prenom"].'</td> 
 <td>'.$row["cne"].'</td> 
 <td>'.$row["cin"].'</td> 
 <td>'.$row["email"].'</td> 
 <td>'.$row["tel"].'</td> 
 <td>'.$row["cv"].'</td> 
 <td>'.$row["lettre_motiv"].'</td> 
 
 
 </tr>
 ';
 }
 $export .= '</table>';
 header('Content-Type: application/xls');
 header('Content-Disposition: attachment; filename=condidats.xls');
 echo $export;
 }



?>

</body>
</html>