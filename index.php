<?php
    session_start();
    include("php/db.php");

    
    if(isset($_SESSION['accountid'])) {
        header("Location: landing.php");
    }

 
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="styles/styles.css" rel="stylesheet">
</head>
<body>



<div class="backgroundimg">



<div class="topbuffer">
</div>



<div class="container">
  <div class="row justify-content-md-center">
   
    <div class="col-md-intro">
        <p class = 'intro'>
        </p>
        <img class = 'logo' src="img/logored.png">
        <a href="secure/login.php" button type="buttoncustom" class="btn btn-secondary btn-lg w-50">Login</a>
        <a href="landing.php" button type="buttoncustom" class="btn btn-secondary btn-lg w-50">Continue as guest</a>
    </div>
   
  
  </div>
</div>

</div>


 



            
              
        
  
                

   








 
</body>
</html>