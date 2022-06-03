<?php
session_start();
include("../php/db.php");
if($_SESSION["accounttype"] != 1)  {
   header("Location: login.php");
}
    $movie_id = $_GET['movie_id'];
    $movie_id = mysqli_real_escape_string($mysqli, $movie_id);
    
   
    include("../php/editmovieactordb.php");
    

   if(isset($_POST['editmovieactorbutton'])) {
      $movie_id = $_POST["movie_id"];
      

      $actor_id = $_POST["insertactor"];
      $actor_id = mysqli_real_escape_string($mysqli, $actor_id);
      
  
  
      //Insert actor into movie
      $duplicate = "SELECT * FROM movie_actor WHERE movie_id = '$movie_id' AND actor_id = '$actor_id'";
      $check = $mysqli->query($duplicate); 
      if ($check->num_rows == 0) {
          $updateSQL = "INSERT INTO
          movie_actor (movie_id, actor_id)
          VALUES ($movie_id, $actor_id)";
       
          $result = $mysqli->query($updateSQL);
      } else {

          
      }
     
      
      if(!$result){
          echo $mysqli->error;
      }else{
         header("Refresh:0");
          
      }

   }


   if(isset($_POST['removemovieactorbutton'])) {

      $movie_id = $_POST["movie_id"];
      $movie_id = mysqli_real_escape_string($mysqli, $movie_id);

      $actor_id = $_POST["actor_id"];
      $actor_id = mysqli_real_escape_string($mysqli, $actor_id);
  
  
      //removes selected genre from movie
          $updateSQL = "DELETE FROM movie_actor WHERE movie_id = '$movie_id' AND actor_id = '$actor_id'";
          
          $result = $mysqli->query($updateSQL);
  
          
  
     
      
      if(!$result){
          echo $mysqli->error;
      }else{
         header("Refresh:0");
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
      <h2>Edit Movie Genre</h2>

    
      <?php
      echo "<h3>Insert actor into $title</h3>";
        
      echo "<form action='editmovieactor.php?movie_id=$movie_id' method='POST'>
      <div class='row align-items-start'>
         <div class='col-md-6'> 
            <select class='form-select' aria-label='Minimum runtime' name='insertactor'>
               <option selected>Actor</option>";
               foreach ($actors as $data) {
                     $actorname = $data['actor_name'];
                     $actorid = $data['actor_id'];
                     echo "<option value=$actorid id='actorname'>$actorname</option> 
                     
                     ";
               
               
           }
           
           echo "</select>
           </div>
          </div>
          <input type='hidden' value='$movie_id' name='movie_id'> ";
         ?>
     

        <div class="row align-items-start">
       <div class="col-md-6">
                <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'editmovieactorbutton' value='Insert actor'/>
               
            </div>
        </div>
            
      </form>







      <?php
      echo "<h3>Remove actor from $title</h3>";
      $count = 0;
      foreach($movieactor as $data) {
         $actorname = $data['actor_name'];
         $actorid = $data['actor_id'];
         echo "<form action='editmovieactor.php?movie_id=$movie_id' method='POST'>
         <div class='row align-items-start'>
            <div class='col-md-3'> 
               <p>$actorname</p>
            </div>
            <div class='col-md-3'>
               <input type='submit' class='btn btn-danger btn-lg w-100 signup' name = 'removemovieactorbutton' value='Remove actor'/>
               <input type='hidden' value='$movie_id' name='movie_id'> 
               <input type='hidden' value='$actorid' name='actor_id'> 
            </div>
          
          
      
       

            
      </form>
      ";
      }
     

      

           
         ?>
         
         <div class='row'>
   <div class='col-sm-6'>
   
   
   <a href="../movie.php?movie_id=<?php echo"$movie_id"; ?>" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Back</a>   
      
      </div>
      </div>  
     

        

         </div>

         </div>


        
         
            






</body>
</html>