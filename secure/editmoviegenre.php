<?php
session_start();


if($_SESSION["accounttype"] != 1)  {
   header("Location: login.php");
}
    $movie_id = $_GET['movie_id'];
    include("../php/db.php");
    include("../php/editmoviegenredb.php");
    
    
    if (isset($_POST['insertgenrebutton'])) {
    
      $movie_id = $_POST["movie_id"];
      $movie_id = mysqli_real_escape_string($mysqli, $movie_id);
   
      $genre_id = $_POST["insertgenre"];
      $genre_id = mysqli_real_escape_string($mysqli, $genre_id);
   
   
      //Insert genre into movie
      $duplicate = "SELECT * FROM movie_genre WHERE movie_id = '$movie_id' AND genre_id = '$genre_id'";
      $check = $mysqli->query($duplicate); 
      if ($check->num_rows == 0) {
          $updateSQL = "INSERT INTO
          movie_genre (movie_id, genre_id)
          VALUES ($movie_id, $genre_id)";
        
          $result = $mysqli->query($updateSQL);
          
      } else {
          echo "Duplicate genre found. Not inserted. <br>";
          
      }
     
      
      if(!$result){
          echo $mysqli->error;
      }else{
    
          header("Refresh:0");
      }
   
   
   }


   if (isset($_POST['removegenrebutton'])) {

      $movie_id = $_POST["movie_id"];
      $movie_id = mysqli_real_escape_string($mysqli, $movie_id);

      $genre_id = $_POST["genre_id"];
      $genre_id = mysqli_real_escape_string($mysqli, $genre_id);
  
  
      //removes selected genre from movie
          $updateSQL = "DELETE FROM movie_genre WHERE movie_id = '$movie_id' AND genre_id = '$genre_id'";
         
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
      echo "<h3>Insert genre into $title</h3>";
        
      echo "<form action='editmoviegenre.php?movie_id=$movie_id' method='POST'>
      <div class='row align-items-start'>
         <div class='col-md-6'> 
            <select class='form-select' aria-label='Minimum runtime' name='insertgenre'>
               <option selected>Genre</option>";
               foreach ($genres as $data) {
                     $genrename = $data['genre_name'];
                     $genreid = $data['genre_id'];
                     echo "<option value=$genreid id='minruntime'>$genrename</option> 
                     
                     ";
               
               
           }
           
           echo "</select>
           </div>
          </div>
          <input type='hidden' value='$movie_id' name='movie_id'> ";
         ?>
     

        <div class="row align-items-start">
       <div class="col-md-6">
                <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'insertgenrebutton' value='Insert Genre'/>
               
            </div>
        </div>
            
      </form>







      <?php
      echo "<h3>Remove genre from $title</h3>";
      $count = 0;
      foreach($moviegenre as $data) {
         $genrename = $data['genre_name'];
         $genreid = $data['genre_id'];
         echo "<form action='editmoviegenre.php?movie_id=$movie_id' method='POST'>
         <div class='row align-items-start'>
            <div class='col-md-3'> 
               <p>$genrename</p>
            </div>
            <div class='col-md-3'>
               <input type='submit' class='btn btn-danger btn-lg w-100 signup' name = 'removegenrebutton' value='Remove Genre'/>
               <input type='hidden' value='$movie_id' name='movie_id'> 
               <input type='hidden' value='$genreid' name='genre_id'> 
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


        
         
            


<?php 
    
  
?>



</body>
</html>