<?php
session_start();
include("../php/db.php");
if($_SESSION["accounttype"] != 1)  {
   header("Location: login.php");
}
    $movie_id = $_GET['movie_id'];
    $movie_id = mysqli_real_escape_string($mysqli, $movie_id);

    
    include("../php/editmoviedirectordb.php");
    
   if(isset($_POST['insertmoviedirectorbutton'])) {
          
    $movie_id = $_POST["movie_id"];
    $movie_id = mysqli_real_escape_string($mysqli, $movie_id);

    $director_id = $_POST["insertdirector"];
    $director_id = mysqli_real_escape_string($mysqli, $director_id);


    //Insert director into selected movie
    $duplicate = "SELECT * FROM movie_director WHERE movie_id = '$movie_id' AND director_id = '$director_id'";
    $check = $mysqli->query($duplicate); 
    if ($check->num_rows == 0) {
        $updateSQL = "INSERT INTO
        movie_director (movie_id, director_id)
        VALUES ($movie_id, $director_id)";
        
        $result = $mysqli->query($updateSQL);
    } 
   
    
    if(!$result){
        echo $mysqli->error;
    }else{
      header("Refresh:0");
    }
   }


   if(isset($_POST['removemoviedirectorbutton'])) {

         
    $movie_id = $_POST["movie_id"];
    $director_id = mysqli_real_escape_string($mysqli, $director_id);

    $director_id = $_POST["director_id"];
    $director_id = mysqli_real_escape_string($mysqli, $director_id);


    //removes selected genre from movie
        $updateSQL = "DELETE FROM movie_director WHERE movie_id = '$movie_id' AND director_id = '$director_id'";
   
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
      echo "<h3>Insert director into $title</h3>";
        
      echo "<form action='editmoviedirector.php?movie_id=$movie_id' method='POST'>
      <div class='row align-items-start'>
         <div class='col-md-6'> 
            <select class='form-select' aria-label='Minimum runtime' name='insertdirector'>
               <option selected>Director</option>";
               foreach ($directors as $data) {
                     $directorname = $data['director_name'];
                     $directorid = $data['director_id'];
                     echo "<option value=$directorid id='director'>$directorname</option> 
                     
                     ";

                     
               
               
           }
          
           
           echo "</select>
           </div>
          </div>
          <input type='hidden' value='$movie_id' name='movie_id'> ";
         ?>
     

        <div class="row align-items-start">
       <div class="col-md-6">
                <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'insertmoviedirectorbutton' value='Insert director'/>
               
            </div>
        </div>
            
      </form>







      <?php
      echo "<h3>Remove director from $title</h3>";
      $count = 0;
      foreach($moviedirectors as $data) {
         $directorname = $data['director_name'];
         $directorid = $data['director_id'];
         echo "<form action='editmoviedirector.php?movie_id=$movie_id' method='POST'>
         <div class='row align-items-start'>
            <div class='col-md-3'> 
               <p>$directorname</p>
            </div>
            <div class='col-md-3'>
               <input type='submit' class='btn btn-danger btn-lg w-100 signup' name = 'removemoviedirectorbutton' value='Remove director'/>
               <input type='hidden' value='$movie_id' name='movie_id'> 
               <input type='hidden' value='$directorid' name='director_id'> 
            </div>
          
          
      
       

            
      </form>";
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