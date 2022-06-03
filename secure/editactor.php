<?php
session_start();
if($_SESSION["accounttype"] != 1)  {
   header("Location: login.php");
}
    include("../php/db.php");

    
    
   
    if (isset($_POST['insertactorbutton'])) {
       $actor = $_POST['insertactor'];
       $actor = mysqli_real_escape_string($mysqli, $actor);
      
       $duplicate = "SELECT * from actor WHERE actor_name = '$actor'";
       $duplicatecheck = $mysqli->query($duplicate); 
         if ($duplicatecheck->num_rows == 0) {
               $insertline = "INSERT INTO actor (actor_id, actor_name) VALUES (NULL, '$actor')";
               $statement = $mysqli->query($insertline);

       } else {
          echo "<div> duplicate actor </div>";
       }
      
          if (!$statement) {
              echo "<div> SQL error - ".$mysqli->error."</div>";
              
          } else {
            echo "<div> inserted actor into database </div>";
          }
    }


    if (isset($_POST['removeactorbutton'])) {
      $actorid = $_POST['removeactor'];
      $actorid = mysqli_real_escape_string($mysqli, $actorid);
    
              $deleteline = "DELETE FROM actor WHERE actor_id = '$actorid'";
              $statement = $mysqli->query($deleteline);
              
   
     
         if (!$statement) {
             echo "<div> SQL error - ".$mysqli->error."</div>";
             
         } else {
            echo "<div> removed actor from database </div>";
         }
   }


 
  


//read in all directors
$readinactors = "SELECT * FROM actor order by actor_name";

$result = $mysqli->query($readinactors);
$actors = array();
while($rowdata = $result->fetch_assoc()){
array_push($actors, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
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
      <h2>Edit Actor</h2>

    
      <?php
        echo "<h3>Insert actor </h3>";
        
        echo "<form action='editactor.php' method='POST'>
        <div class='row align-items-start'>
           <div class='col-md-6'> 
               <input type='text' class='form-control' placeholder='Actor name' name='insertactor'>
                       ";
                 
                 
             
             
             echo "
             </div>
            </div>";
           ?>
       
  
          <div class="row align-items-start">
         <div class="col-md-6">
                  <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'insertactorbutton' value='Insert Actor'/>
                 
              </div>
          </div>
              
        </form>


      <?php
      echo "<h3>Remove actor</h3>";
        
      echo "<form action='editactor.php' method='POST'>
      <div class='row align-items-start'>
         <div class='col-md-6'> 
            <select class='form-select' aria-label='Minimum runtime' name='removeactor'>
               <option disabled selected value>Actor</option>";
               foreach ($actors as $data) {
                     $actorname = $data['actor_name'];
                     $actorid = $data['actor_id'];
                     echo "<option value=$actorid name=actor_id'>$actorname</option> 
                     
                     ";
               
               
           }
           
           echo "</select>
           </div>
          </div>";
         
           echo "<div class='row align-items-start'>
           <div class='col-md-6'>
               <input type='submit' class='btn btn-danger btn-lg w-100 signup' name = 'removeactorbutton' value='Remove Actor'/>
        
         
            </div>
            </div>
            
          
          
      
       

            
      </form>";
      
     

      

           
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

