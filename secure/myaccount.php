<?php
session_start();
$accountid = $_GET['accountid'];
if(($_SESSION['accountid']) != $accountid) {
   header("Location: ../landing.php");
}
    
    include("../php/db.php");
    include("../php/edituserdb.php");
    $accountid = $user[0]['account_id'];
    $forename = $user[0]['account_forename'];
    $surname = $user[0]['account_surname'];
    $email = $user[0]['account_email'];
    $currentaccounttypeid = $user[0]['account_type_id'];
    $accounttype = $user[0]['account_type'];


    if (isset($_POST['changepassbutton'])) {
      if (empty($_POST['password']) && empty($_POST['passwordrepeat'])) {
               echo "<h1> Passwords cannot be empty! <h1>";
      } else if ($_POST['password'] != $_POST['passwordrepeat']){
               echo "<h1> Passwords do not match! <h1>";
      } else {
         $password = $_POST['password'];
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
          
          
          $stmt = $mysqli->prepare("UPDATE account 
          SET account.account_password = ? 
          WHERE account.account_id = ?");

     
          

          $stmt->bind_param("ss", $hashed_password, $accountid);
          $stmt->execute();
            echo "<h1> Password changed. <h1>";
      }
   }




   if (isset($_POST['updatedetailsbutton'])) {
      $accountid = $_POST["accountid"];
   
      $update_forename = $_POST["forenamefield"];
      
      $update_surname= $_POST["surnamefield"];
  
      $update_email = $_POST["emailfield"];
  
    
  
    
  
      
      //update account forenamename
      $updateSQL = "UPDATE account 
      SET account.account_forename = '$update_forename' WHERE account.account_id = $accountid";
      
     
      
      $result = $mysqli->query($updateSQL);
  
  
        //update account surname
        $updateSQL = "UPDATE account 
        SET account.account_surname = '$update_surname' WHERE account.account_id = $accountid";
        
      
        
        $result = $mysqli->query($updateSQL);
  
  

  
  
  
         //update account account email
         $updateSQL = "UPDATE account 
         SET account.account_email = '$update_email' WHERE account.account_id = $accountid";
         
  
         
         $result = $mysqli->query($updateSQL);
  
  
      
      if(!$result){
          echo $mysqli->error;
      } else {
         header("Refresh:0");
      }
   }
      
               
    
      
   if (isset($_POST['deleteaccountbutton'])) {
      //delete user

    $deletestatement = "DELETE FROM account WHERE account_id = '$accountid'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM account_movie_favourite WHERE account_id = '$accountid'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM account_movie_rating WHERE account_id = '$accountid'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM account_movie_review WHERE account_id = '$accountid'";
    $delete = $mysqli->query($deletestatement); 
    
   
    
    if(!$deletestatement){
        echo $mysqli->error;
    }else{
      header("Location: logout.php");
    }

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




  


<div class="maincontainer">
<div class="container">
      <h1>My account</h1>
      <?php
        
      echo "<form action='myaccount.php?accountid=$accountid' method='POST'>


      <div class='row align-items-start'>
      <div class='col-sm-6'> Forename
              <input type='text' class='form-control' placeholder='Forename' name='forenamefield' value='$forename'>
              <input type='hidden' value='$accountid' name='accountid'> 
           </div>
        

          <div class='col-sm-6'> Surname
                  <input type='text' class='form-control' placeholder='Surname' name='surnamefield' value='$surname'>
                  <input type='hidden' value='$accountid' name='accountid'> 
               </div>
              </div>
              
              <div class='row align-items-start'>
              <div class='col-sm-12'> Email
                      <input type='text' class='form-control' placeholder='Email Address' name='emailfield' value='$email'>
                      <input type='hidden' value='$accountid' name='accountid'> 
                   </div>
                   </div>
              ";
                   ?> 


              

       


<div class="row align-items-start">
          <div class="col-sm-6">
          <button class='btn btn-lg btn-danger w-100' name = 'updatedetailsbutton' type='submit'>Update</button>
            </div>
         </div>
                  </form>



                  <form action='myaccount.php<?php echo "?accountid=$accountid" ?>' method='POST'>

                  <div class="row align-items-start">
           <div class="col-sm-6">
        
             <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
     
     
           <div class="col-sm-6">
             <input type="password" class="form-control" placeholder="Re-enter password" name="passwordrepeat">
            
          </div>
          </div>
          <div class="row align-items-start">
           <div class="col-sm-6">
           <?php echo "<input type='hidden' value='$accountid' name='accountid'>"; ?>
            <button class='btn btn-lg btn-danger w-100' name ='changepassbutton' type='submit'>Change Password</button>
            
          </div>
          </div>

          </form>
          




          
          <form action='myaccount.php<?php echo "?accountid=$accountid" ?>' method='POST'>
         <div class="row align-items-start">
          <div class="col-sm-6">
       
          
          <?php echo "<input type='hidden' value='$accountid' name='accountid'>"; ?>
          <button class='btn btn-lg btn-danger w-100' name = 'deleteaccountbutton' type='submit'>Delete account</button>
         
            </div>
                 
         </div>
     
         </form>


         <div class='row'>
   <div class='col-sm-6'>
   
   
   <a href="../landing.php" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Back</a>   
      
      </div>
      </div>  

</div>

</div>
         
         
         
            






</body>
</html>