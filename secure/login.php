<?php
    session_start();
    if(isset($_SESSION['accountid'])) {
      header("Location: ../landing.php");
  }
    include("../php/db.php");

 
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../styles/styles.css" rel="stylesheet">
  
</head>
<body>



<div class="backgroundimg">



<div class="topbuffer">
</div>




  <div class="row justify-content-md-center">
   
    <div class="col-md-intro">
        <p class = 'intro'>
        </p>
        <img class = 'logo' src="../img/logored.png">
        <form method="post" action="login.php">
          <div class="row signupform justify-content-md-center">
           
       <div class="row signupform justify-content-md-center">
            <div class="col-md-8">
              <input type="text" class="form-control" placeholder="Email Address" name='email'>
           </div>
       </div>
       <div class="row signupform justify-content-md-center">
            <div class="col-md-8">
              <input type="password" class="form-control" placeholder="Password" name='password'> 
           </div>
       </div>
       <div class="row signupform justify-content-md-center">
          <div class="col-md-8">
                <input type='submit' class='btn btn-danger btn-lg w-100' name = 'loginbutton' value='Login'/>
            </div>
      </div>

    </form>

    <div class="row signupform justify-content-md-center">
          <div class="col-md-8">
          <a href="signup.php" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Sign up</a>
            </div>
  </div>

  <div class="row signupform justify-content-md-center">
          <div class="col-md-8">
          <a href="../index.php" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Back</a>
            </div>
  </div>

  

  
    </div>

<?php
    if (isset($_POST['loginbutton'])) {
    
    if (empty($_POST['email']) || empty($_POST['password'])) {
      
      echo "<h5 class = 'error'> Please complete all forms </h5>";

    
    } else {
      $email = $_POST['email'];
      $password = $_POST['password'];
     
      $stmt = $mysqli->prepare("SELECT * from account WHERE account_email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();
      

      $account = array();
      while($rowdata = $result->fetch_assoc()){
      array_push($account, $rowdata);
     }

  
    

 
      


      if ($result->num_rows == 0) {
        echo "<h5 class = 'error'> Your email or password is incorrect. </h5>";
      } else if ($result->num_rows == 1) {
        $passworddatabase = $account[0]['account_password'];
     
        if (password_verify($password, $passworddatabase)) {
          
          $_SESSION["accountid"] = $account[0]['account_id'];
          $_SESSION["accounttype"] = $account[0]['account_type_id'];
          $_SESSION["forename"] = $account[0]['account_forename'];
          $_SESSION["surname"] = $account[0]['account_surname'];
          $_SESSION["email"] = $account[0]['account_email'];
          
          
         header("Location: ../landing.php");
        } else if (!password_verify($password, $passworddatabase)) {
        
          echo "<h5 class = 'error'> Your email or password is incorrect. </h5>";
         
        }

      }
      
      
      
    }
   } 

   
?>

    
</div>




 



            
              
        
  
                

   








 
</body>
</html>