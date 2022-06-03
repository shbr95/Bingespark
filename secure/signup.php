<?php
    session_start();
    include("../php/db.php");
    if(isset($_SESSION['accountid'])) {
      header("Location: ../landing.php");
  }
 
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
        <form method="post" action="signup.php">
         <div class="row signupform justify-content-md-center">
            <div class="col-md-3">
              <input type="text" class="form-control name" placeholder="First name" name="forename">
           </div>
          <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Last name" name="surname">
         </div>
       </div>
       <div class="row signupform justify-content-md-center">
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Email Address" name="email">
           </div>
       </div>
       <div class="row signupform justify-content-md-center">
            <div class="col-md-6">
              <input type="password" class="form-control" placeholder="Password" name="password">
           </div>
       </div>
       <div class="row signupform justify-content-md-center">
            <div class="col-md-6">
              <input type="password" class="form-control" placeholder="Re-enter password" name="passwordrepeat">
           </div>
       </div>
       <div class="row signupform justify-content-md-center">
       <div class="col-md-6">
                <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'submitbutton' value='Create account'/>
            </div>
          
       </div>

       <div class="row signupform justify-content-md-center">
          <div class="col-md-6">
          <a href="login.php" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Login</a>
            </div>

            
  </div>

  <div class="row signupform justify-content-md-center">
          <div class="col-md-6">
          <a href="../index.php" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Back</a>
            </div>

            
  </div>
     

    </form>
    <?php
   if (isset($_POST['submitbutton'])) {
     $email = $_POST['email'];
     $duplicateaccount = "SELECT * from account WHERE account_email = '$email'";
         $check = $mysqli->query($duplicateaccount); 
         if ($check->num_rows != 0) {
          echo "<h5 class = 'error'> Account with entered email already exits! </h5>";
          } else if (!strstr($email, '@')){
            echo "<h5 class = 'error'> Not a valid email address! </h5>";

         } else if (empty($_POST['forename']) || empty($_POST['surname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['passwordrepeat'])) {
          echo "<h5 class = 'error'> Please complete all forms. </h5>";
         } else if ($_POST['password'] != $_POST['passwordrepeat']){
          echo "<h5 class = 'error'> Passwords do not match! </h5>";
        } else if (strlen($_POST['password']) < 8){
          echo "<h5 class = 'error'> Passwords must be more that 8 characters! </h5>";
    
    } else {
      $forename = $_POST['forename'];
      $surname = $_POST['surname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
     
      $stmt = $mysqli->prepare("INSERT INTO account(account_id, account_type_id, account_forename, account_surname, account_email, account_password) VALUES (null, 2, ?, ?, ?, ?)");
      $stmt->bind_param("ssss", $forename, $surname, $email, $hashed_password);
      $stmt->execute();
      echo "<h5 class = 'error'> Account created. Please continue to the login page. </h5>";
      
    }
   } else {
     
   }

?>
    </div>

   
  </div>
</div>




 



            
              
        
  
                

   








  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>