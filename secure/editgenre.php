<?php
session_start();
if($_SESSION["accounttype"] != 1)  {
   header("Location: login.php");
}
    include("../php/db.php");

    
    
   
    if (isset($_POST['insertgenrebutton'])) {
       $genre = $_POST['insertgenre'];
       $genre = mysqli_real_escape_string($mysqli, $genre);
       
      
       $duplicate = "SELECT * from genre WHERE genre_name = '$genre'";
       $duplicatecheck = $mysqli->query($duplicate); 
         if ($duplicatecheck->num_rows == 0) {
               $insertline = "INSERT INTO genre (genre_id, genre_name) VALUES (NULL, '$genre')";
               $statement = $mysqli->query($insertline);

       } else {
          echo "<div> duplicate genre </div>";
       }
      
          if (!$statement) {
              echo "<div> SQL error - ".$mysqli->error."</div>";
              
          } else {
            echo "<div> inserted genre into database </div>";
          }
    }


    if (isset($_POST['removegenrebutton'])) {
      $genreid = $_POST['genre_id'];
      $genreid = mysqli_real_escape_string($mysqli, $genreid);
    
              $insertline = "DELETE FROM genre WHERE genre_id = '$genreid'";
              $statement = $mysqli->query($insertline);
              
   
     
         if (!$statement) {
             echo "<div> SQL error - ".$mysqli->error."</div>";
             
         } else {
            echo "<div> removed from database </div>";
         }
   }


 
  


//read in all genres 
$readingenres = "SELECT * FROM genre";

$result = $mysqli->query($readingenres);
$genres = array();
while($rowdata = $result->fetch_assoc()){
array_push($genres, $rowdata);


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
      <h2>Edit Genre</h2>

    
      <?php
        echo "<h3>Insert genre </h3>";
        
        echo "<form action='editgenre.php' method='POST'>
        <div class='row align-items-start'>
           <div class='col-md-6'> 
               <input type='text' class='form-control' placeholder='Genre' name='insertgenre'>
                       ";
                 
                 
             
             
             echo "</select>
             </div>
            </div>";
           ?>
       
  
          <div class="row align-items-start">
         <div class="col-md-6">
                  <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'insertgenrebutton' value='Insert Genre'/>
                 
              </div>
          </div>
              
        </form>



<?php
 
      echo "<h3>Remove genre</h3>";
      foreach($genres as $data) {
         $genrename = $data['genre_name'];
         $genreid = $data['genre_id'];
         echo "<form action='editgenre.php' method='POST'>
         <div class='row align-items-start'>
            <div class='col-md-3'> 
               <p>$genrename</p>
            </div>
            <div class='col-md-3'>
               <input type='submit' class='btn btn-danger btn-lg w-100 signup' name = 'removegenrebutton' value='Remove Genre'/>
        
               <input type='hidden' value='$genreid' name='genre_id'> 
            </div>
            
          
          
      
       

            
      </form>";
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

