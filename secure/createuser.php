<?php
session_start();
if($_SESSION["accounttype"] != 1)  {
  header("Location: login.php");
}

    include("../php/db.php");
    include("../php/createuserdb.php");

   
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




  


<div class="maincontainer">
<div class="container">

<h1>Create User</h1>

<div class="row align-items-star">
   
   <div class="col-md-intro">
       <form method="post" action="createuser.php">
         <div class="row signupform row align-items-star">
           <div class="col-md-3">
             <input type="text" class="form-control" placeholder="First name" name="forename">
          </div>
         <div class="col-md-3">
           <input type="text" class="form-control" placeholder="Last name" name="surname">
        </div>
      </div>
      <div class="row signupform row align-items-start">
           <div class="col-md-6">
             <input type="text" class="form-control" placeholder="Email Address" name="email">
          </div>
      </div>
      <div class="row signupform row align-items-start">
           <div class="col-md-6">
             <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
      </div>
      <div class="row signupform row align-items-start">
           <div class="col-md-6">
             <input type="password" class="form-control" placeholder="Re-enter password" name="passwordrepeat">
          </div>
      </div>
            <div class='row signupform row align-items-start'>
                   <div class='col-md-6'>
                      <select class='form-select' name='accounttype'>
                         <option disabled selected value>Account type</option>
                         <?php
                         foreach ($accounttypes as $data) {
                              $accounttypeid = $data['account_type_id'];
                              $accounttypename = $data['account_type'];
                              echo " <option value=$accounttypeid";  
                              echo   "id='$accounttypeid'>$accounttypename</option>";
                     }
                     
                     echo "</select>
                     </div>
                    </div>";
                   ?> 
      <div class="row signupform row align-items-start">
      <div class="col-sm-6">
               <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'submitbutton' value='Create account'/>
           </div>
         
      </div>



 </div>
    

   </form>
   <?php
  if (isset($_POST['submitbutton'])) {
    $email = $_POST['email'];
    $duplicateaccount = "SELECT * from account WHERE account_email = '$email'";
        $check = $mysqli->query($duplicateaccount); 
        if ($check->num_rows != 0) {
         echo "<h1> Account with entered email already exists! <h1>";
        } else if (empty($_POST['forename']) || empty($_POST['surname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['passwordrepeat'])|| empty($_POST['accounttype'])) {
           echo "<h1> Please complete all forms </h1>";
        } else if ($_POST['password'] != $_POST['passwordrepeat']){
           echo "<h1> Passwords do not match! <h1>";
   
   } else {
     $forename = $_POST['forename'];
     $surname = $_POST['surname'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $accounttype = $_POST['accounttype'];
     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
     $stmt = $mysqli->prepare("INSERT INTO account(account_id, account_type_id, account_forename, account_surname, account_email, account_password) VALUES (null, ?, ?, ?, ?, ?)");
     $stmt->bind_param("issss", $accounttype, $forename, $surname, $email, $hashed_password);
     $stmt->execute();
     echo "<h1> Account created.<h1>";
  
  
     
   }
  } else {
    
  }

?>
   </div>


<div class='row signupform row align-items-start'>
   <div class='col-sm-6'>
   
   
   <a href="manageusers.php" button type="buttoncustom" class="btn btn-lg btn-danger w-100">Back</a>   
      
      </div>
      </div>    

</div>

</div>


        
     



</body>
</html>