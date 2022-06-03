<?php
session_start();
if($_SESSION["accounttype"] != 1)  {
   header("Location: login.php");
}
    include("../php/db.php");
    include("../php/manageusersdb.php");
   
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


    


      <h2>Manage users</h2>
      
      <div class='row'>
      
      <form class'form-group' action='manageusers.php' method='GET'>
          <div class='col-lg-12'>
          
          
          
                <input class='form-control me-2' input name='searchstring' type='search' placeholder='Search by account id, name or email address' aria-label='Search'>
</div>
                <div class='col-lg-12'>
           
                <button class='btn btn-danger w-100' name = 'searchbutton' type='submit'>Search</button>
                </form> 
                           
</div>
</div>

<div class='row'>
<div class='col-lg-12'>
      <a href="createuser.php" button type="buttoncustom" class="btn btn-danger w-100">Create User</a>   

</div>

</div>






<div class='row'>
      
      

<div class='col-3'>
   <h1> Account ID </h1>
</div>
<div class='col-3'>
   <h1> Name </h1>
</div>
<div class='col-3'>
   <h1> Email </h1>
</div>
<div class='col-3'>

</div>
</div>

<?php

if (!isset($_GET['searchbutton'])) {
   foreach ($users as $rowdata) {
      $accountid = $rowdata['account_id'];
      $forename = $rowdata['account_forename'];
      $surname = $rowdata['account_surname'];
      $email = $rowdata['account_email'];
      echo "<div class='row'>
      
      

   <div class='col-3'>
      <h2> $accountid </h2>
   </div>
   <div class='col-3'>
      <h2> $forename $surname </h2>
   </div>
   <div class='col-3'>
      <h2> $email </h2>
   </div>
   <div class='col-3'>
   <form class='form-group' action='edituser.php' method='GET'>
   <button class='btn btn-danger w-100' type='submit'>Edit</button>
   <input type='hidden' value='$accountid' name='accountid'> 
                </form> 
   
   </div>
   </div>";


}
    } else if (isset($_GET['searchbutton'])) {
      $searchstring = $_GET['searchstring'];
      $read = "SELECT * from account
      INNER JOIN account_type 
      ON account.account_type_id = account_type.account_type_id WHERE
      account.account_forename = '$searchstring' 
      OR account.account_surname = '$searchstring' 
      OR account.account_email = '$searchstring'
      OR account.account_id = '$searchstring'";
      $result = $mysqli->query($read);
      if(!$result){
          echo $mysqli->error;
          echo "<p>$read</p>";
           exit();
      }

      foreach ($result as $rowdata) {
         $accountid = $rowdata['account_id'];
         $forename = $rowdata['account_forename'];
         $surname = $rowdata['account_surname'];
         $email = $rowdata['account_email'];
         echo "<div class='row'>
         
         
   
      <div class='col-3'>
         <h2> $accountid </h2>
      </div>
      <div class='col-3'>
         <h2> $forename $surname </h2>
      </div>
      <div class='col-3'>
         <h2> $email </h2>
      </div>
      <div class='col-3'>
      <form class='form-group' action='edituser.php' method='GET'>
      <button class='btn btn-danger w-100' type='submit'>Edit</button>
      <input type='hidden' value='$accountid' name='accountid'> 
                   </form> 
      
      </div>
      </div>";
   
   
   }
      

    }

?>


<div class='row'>
   <div class='col-sm-6'>
   
   
   <a href="../landing.php" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Back</a>   
      
      </div>
      </div>   


            

</div>

</div>


        
     



</body>
</html>