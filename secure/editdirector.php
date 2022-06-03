<?php
session_start();
if($_SESSION["accounttype"] != 1)  {
   header("Location: login.php");
}
    include("../php/db.php");

    
    
   
    if (isset($_POST['insertdirectorbutton'])) {
       $director = $_POST['insertdirector'];
       $director = mysqli_real_escape_string($mysqli, $director);
      
       $duplicate = "SELECT * from director WHERE director_name = '$director'";
       $duplicatecheck = $mysqli->query($duplicate); 
         if ($duplicatecheck->num_rows == 0) {
               $insertline = "INSERT INTO director (director_id, director_name) VALUES (NULL, '$director')";
               $statement = $mysqli->query($insertline);

       } else {
          echo "<div> duplicate director </div>";
       }
      
          if (!$statement) {
              echo "<div> SQL error - ".$mysqli->error."</div>";
              
          } else {
     
            echo "<div> inserted director into database </div>";
          }
    }


    if (isset($_POST['removedirectorbutton'])) {
      $directorid = $_POST['removedirector'];
      $directorid = mysqli_real_escape_string($mysqli, $directorid);
    
              $deleteline = "DELETE FROM director WHERE director_id = '$directorid'";
              $statement = $mysqli->query($deleteline);
              
   
     
         if (!$statement) {
             echo "<div> SQL error - ".$mysqli->error."</div>";
             
         } else {
          
            echo "<div> removed director into database </div>";
         }
   }


 
  


//read in all directors
$readindirectors = "SELECT * FROM director order by director_name";

$result = $mysqli->query($readindirectors);
$directors = array();
while($rowdata = $result->fetch_assoc()){
array_push($directors, $rowdata);


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
      <h2>Edit Director</h2>

    
      <?php
        echo "<h3>Insert director </h3>";
        
        echo "<form action='editdirector.php' method='POST'>
        <div class='row align-items-start'>
           <div class='col-md-6'> 
               <input type='text' class='form-control' placeholder='Director name' name='insertdirector'>
                       ";
                 
                 
             
             
             echo "
             </div>
            </div>";
           ?>
       
  
          <div class="row align-items-start">
         <div class="col-md-6">
                  <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'insertdirectorbutton' value='Insert Director'/>
                 
              </div>
          </div>
              
        </form>


      <?php
      echo "<h3>Remove director</h3>";
        
      echo "<form action='editdirector.php' method='POST'>
      <div class='row align-items-start'>
         <div class='col-md-6'> 
            <select class='form-select' aria-label='Minimum runtime' name='removedirector'>
            <option disabled selected value>Director</option>";
               foreach ($directors as $data) {
                     $directorname = $data['director_name'];
                     $directorid = $data['director_id'];
                     echo "<option value=$directorid name=director_id'>$directorname</option> 
                     
                     ";
               
               
           }
           
           echo "</select>
           </div>
          </div>";
         
           echo "<div class='row align-items-start'>
           <div class='col-md-6'>
               <input type='submit' class='btn btn-danger btn-lg w-100 signup' name = 'removedirectorbutton' value='Remove Director'/>
        
         
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

