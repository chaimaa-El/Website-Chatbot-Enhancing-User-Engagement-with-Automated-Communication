<?php
$host = "localhost"; //IP of your database
$userName = "root"; //Username for database login
$userPass = ""; //Password associated with the username
$database = "archibot"; //Your database name

$connectQuery = mysqli_connect($host,$userName,$userPass,$database);

if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}else{
    $selectQuery = "SELECT * FROM `parser` ";
    $result = mysqli_query($connectQuery,$selectQuery);
    
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
    }
}




?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Candidats</title> 
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
     /* Google Font CDN Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  display: flex;
  min-height: 100vh;
  align-items: center;
  justify-content: center;
  background: #f2f2f2;
  position: relative;
}
body::before{
  content: '';
  position: absolute;
  width: 100%;
  background: #009789;
  clip-path: inset(47% 0 0 0);
  z-index: -1;
  height: 100%;
}
::selection{
  background:	#009789;
  color: #fff;
}
.container{
  max-width: 950px;
  width: 100%;
  overflow: hidden;
  padding: 80px 0;
}
.container .main-card{
  display: flex;
  justify-content: space-evenly;
  width: 200%;
  transition: 1s;
}
#two:checked ~ .main-card{
  margin-left: -100%;
}
.container .main-card .cards{
  width: calc(100% / 2 - 10px);
  display: flex;
  flex-wrap: wrap;
  margin: 0 20px;
  justify-content: space-between;
}
.main-card .cards .card{
  width: calc(100% / 3 - 10px);
  background: #fff;
  border-radius: 12px;
  padding: 30px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.4s ease;
}
.main-card .cards .card:hover{
  transform: translateY(-15px);
}
.cards .card .content{
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}
.cards .card .content .img{
  height: 130px;
  width: 130px;
  border-radius: 50%;
  padding: 3px;
  background: #009789;
  margin-bottom: 14px;
}
.card .content .img img{
  height: 100%;
  width: 100%;
  border: 3px solid #ffff;
  border-radius: 50%;
  object-fit: cover;
}
.card .content .name{
  font-size: 20px;
  font-weight: 500;
}
.card .content .job{
  font-size: 20px;
  color: #009789;
}
.card .content .media-icons{
  margin-top: 10px;
  display: flex;

}
.media-icons a{
  text-align: center;
  line-height: 33px;
  height: 35px;
  width: 35px;
  margin: 0 4px;
  font-size: 14px;
  color: #FFF;
  border-radius: 50%;
  border: 2px solid transparent;
  background: #009789;
  transition: all 0.3s ease;
}
.media-icons a:hover{
  color: #009789;
  background-color: #fff;
  border-color: #009789;
}
 .container .button{
  width: 100%;
  display: flex;
  justify-content: center;
  margin: 20px;
}
.button label{
  height: 15px;
  width: 15px;
  border-radius: 20px;
  background: #fff;
  margin: 0 4px;
  cursor: pointer;
  transition: all 0.5s ease;
}
.button label.active{
  width: 35px;
}
#one:checked ~ .button .one{
  width: 35px;
}
#one:checked ~ .button .two{
  width: 15px;
}
#two:checked ~ .button .one{
  width: 15px;
}
#two:checked ~ .button .two{
  width: 35px;
}
input[type="radio"]{
  display: none;
}
@media (max-width: 768px) {
  .main-card .cards .card{
    margin: 20px 0 10px 0;
    width: calc(100% / 2 - 10px);
  }
}
@media (max-width: 600px) {
  .main-card .cards .card{
    /* margin: 20px 0 10px 0; */
    width: 100%;
  }
}
   </style>
<body style="color:#009789 ">
  <div class="container" style="color:#009789 ">
    <input type="radio" name="dot" id="one">
    <input type="radio" name="dot" id="two">
    <div class="main-card">
      <?echo($msg);?>
      <div class="cards">
       <?php
                while($row = mysqli_fetch_assoc($result)){?>
        <div class="card">
         <div class="content">
           <div class="img" style="background:#009789 ">
           <!-- <img src="data:image/png;base64,'.base64_encode($row['image']).'"/> -->
           
           <?php  echo '<img src="data:image/jpg;base64,'.base64_encode($row['image']) .'" />'; ?>
           </div>
           <div class="details">
            
             <div class="name"><?php echo $row['nom']; ?></div>
             <div class="job" style="color:#009789  "><font size="-1">Email: <?php echo $row['email']; ?></font></div>
             <div class="job" style="color:#009789 "><font size="-1">Tél: <?php echo $row['tel']; ?></font></div>
           </div>
           <div >
          <a href="CondidatDetails.php?id=<?php echo $row['id']?>" target="_blank"> 
              <button style="width:100px;height:30px;border:none;" >Voir plus</button>
            </a>
            
           </div>
         </div> 
        </div>
       
         
        
       <?php      }?>
      </div>
        

    </div>
    <div class="button">
      <label for="one" class=" active one"></label>
      <label for="two" class="two"></label>
    </div>
  </div>
</body>
</html>