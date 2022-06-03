<?php
include("db.php");



//populate account type table

$insertline = "INSERT INTO account_type (account_type_id, account_type) VALUES (NULL, 'admin')";
$duplicate = "SELECT * from account_type where account_type ='admin'";
    $check = $mysqli->query($duplicate); 
    if ($check->num_rows == 0) {
        $statement = $mysqli->query($insertline);
        if (!$statement) {
            echo "<div> SQL error - ".$mysqli->error."</div>";
            
        }
    }



$insertline = "INSERT INTO account_type (account_type_id, account_type) VALUES (NULL, 'member')";
$duplicate = "SELECT * from account_type where account_type ='member'";
    $check = $mysqli->query($duplicate); 
    if ($check->num_rows == 0) {
        $statement = $mysqli->query($insertline);
        if (!$statement) {
            echo "<div> SQL error - ".$mysqli->error."</div>";
            
        }
    }

   





$file = fopen("../movies.csv", 'r');

if ($file === false) {
    echo "cannot open the file".$filename;
    exit();
}





$count = 0; 
while (($line = fgetcsv($file)) !== false) {
  

    $count++;
    if ($count == 1) { continue; } //skips the first line of csv file
   
   
   
   
   
    //populate the title table
    $title = $line[0]; 
    $title = mysqli_real_escape_string($mysqli, $title); //escapes commas for use in SQL statement
   
    $insertline = "INSERT INTO title (title_id, title_name) VALUES (NULL, '$title')";
    $duplicate = "SELECT * from title where title_name ='$title'";
    $check = $mysqli->query($duplicate); //checks to see if title name has already been inserted - if it has it will not be entered.
    if ($check->num_rows == 0) {
        $statement = $mysqli->query($insertline);
        $titleinsertid = $mysqli->insert_id;
        echo "<div> $insertline </div>";
        echo "<div>title_name insert id is $titleinsertid </div>";
        if (!$statement) {
            echo "<div> SQL error - ".$mysqli->error."</div>";
            
        }
    } else {
    echo "<p> Duplicate title found at $title so don't insert </div>";
    while($row = mysqli_fetch_array($check)) {
        $titleinsertid = $row['title_id'];
    }

    }

    $title = $line[0]; 
    $title = urlencode($title);
   
 


  
    //populate the year table
    $year = $line[4]; 
    $year = mysqli_real_escape_string($mysqli, $year); //escapes commas for use in SQL statement
   
    $insertline = "INSERT INTO year (year_id, year) VALUES (NULL, '$year')";
    $duplicate = "SELECT * from year where year ='$year'";
    $check = $mysqli->query($duplicate); //checks to see if year name has already been inserted - if it has it will not be entered.
    if ($check->num_rows == 0) {
        $statement = $mysqli->query($insertline);
        $yearinsertid = $mysqli->insert_id;
        echo "<div> $insertline </div>";
        
        if (!$statement) {
            echo "<div> SQL error - ".$mysqli->error."</
            div>";
            //searches API for year if missing from CSV file
            $endp = "http://www.omdbapi.com/?t=$title&apikey=54683997";
            $respond = file_get_contents($endp);
            $jsonresult = json_decode($respond, true);
            print_r($jsonresult);
            $year = (int) $jsonresult["Year"];
            echo "<div>New year is $year </div>";

            $insertline = "INSERT INTO year (year_id, year) VALUES (NULL, '$year')";
            
            $duplicate = "SELECT * from year where year ='$year'";
            $check = $mysqli->query($duplicate); //checks to see if year name has already been inserted - if it has it will not be entered.
          
            //checks if new year obtained from API is a duplicate - if it is doesn't insert
            if ($check->num_rows == 0) {
                $statement = $mysqli->query($insertline);
                $yearinsertid = $mysqli->insert_id;
                echo "<div> $insertline </div>";
                if (!$statement) {
                    echo "<div> SQL error - ".$mysqli->error."</div>";
                }
            }  
            while($row = mysqli_fetch_array($check)) {
            $yearinsertid = $row['year_id'];
            }
        }
    } else {
        echo "<div> Duplicate year found at $year so don't insert </div>";

        //if duplicate found sets yearinsertid to duplicate yearid from database
        while($row = mysqli_fetch_array($check)) {
            $yearinsertid = $row['year_id'];
        }
    }
 

    


//populate runtime table
    $runtime = $line[5]; 
    $runtime = mysqli_real_escape_string($mysqli, $runtime); //escapes commas for use in SQL statement
   
    $insertline = "INSERT INTO runtime (runtime_minutes) VALUES ('$runtime')";
    $duplicate = "SELECT * from runtime where runtime_minutes ='$runtime'";
    $check = $mysqli->query($duplicate); //checks to see if runtime name has already been inserted - if it has it will not be entered.
    if ($check->num_rows == 0) {
        $statement = $mysqli->query($insertline);
        $runtimeinsertid = $mysqli->insert_id;
        echo "<div> $insertline </div>";
        if (!$statement) {
            echo "<div> SQL error - ".$mysqli->error."</div>";

            //searches API for runtime if missing from CSV file
            $endp = "http://www.omdbapi.com/?t=$title&apikey=54683997";
            $respond = file_get_contents($endp);
            $jsonresult = json_decode($respond, true);
            $runtime = $jsonresult["Runtime"];
            $runtime = str_replace( array('min', ' '), '', $runtime);
            $runtime = (int) $runtime;
            print_r($jsonresult);
            echo "<div> New runtime is $runtime </div>";

            $insertline = "INSERT INTO runtime (runtime_id, runtime_minutes) VALUES (NULL, '$runtime')";
            
            $duplicate = "SELECT * from runtime where runtime_minutes ='$runtime'";
            $check = $mysqli->query($duplicate); //checks to see if runtime has already been inserted - if it has it will not be entered.
          
            //checks if new runtime amount obtained from API is a duplicate - if it is doesn't insert
          
            if ($check->num_rows == 0) {
                $statement = $mysqli->query($insertline);
                $runtimeinsertid = $mysqli->insert_id;
                echo "<div> $insertline </div>";
                if (!$statement) {
                    echo "<div> SQL error - ".$mysqli->error."</div>";
                }
            }  
            while($row = mysqli_fetch_array($check)) {
            $runtimeinsertid = $row['runtime_id'];
            }
        }
    } else {
        echo "<div> Duplicate runtime found at $runtime so don't insert </div>";

        //if duplicate found sets yearinsertid to duplicate yearid from database
        while($row = mysqli_fetch_array($check)) {
            $runtimeinsertid = $row['runtime_id'];
        }
    }
    


    

    //populate revenue table
    $revenue = $line[6]; 
    $revenue = mysqli_real_escape_string($mysqli, $revenue); //escapes commas for use in SQL statement
   
    $insertline = "INSERT INTO revenue (revenue_millions) VALUES ('$revenue')";
    $duplicate = "SELECT * from revenue where revenue_millions ='$revenue'";
    $check = $mysqli->query($duplicate); //checks to see if revenue has already been inserted - if it has it will not be entered.
    if ($check->num_rows == 0 || $revenue == '') {
        $statement = $mysqli->query($insertline);
        $revenueinsertid = $mysqli->insert_id;
        echo "<div> $insertline </div>";
        if (!$statement || $revenue =='') {
            echo "<div> SQL error - ".$mysqli->error."</div>";

            //searches API for revenue if missing from CSV file
            $endp = "http://www.omdbapi.com/?t=$title&apikey=54683997";
            $respond = file_get_contents($endp);
            $jsonresult = json_decode($respond, true);
            $revenue = $jsonresult["BoxOffice"];
            $revenue = str_replace(array('$'), '', $revenue); 
            $revenue = explode(',', $revenue);
            $revenue = $revenue[0];
           
            print_r($jsonresult);
            echo "<div>New revenue is $revenue</div>";
            
            $insertline = "INSERT INTO revenue (revenue_id, revenue_millions) VALUES (NULL, '$revenue')";
          
            $duplicate = "SELECT * from revenue where revenue_millions ='$revenue'";
            $check = $mysqli->query($duplicate); //checks to see if revnue has already been inserted - if it has it will not be entered.
           
            //checks if new revenue amount obtained from API is a duplicate - if it is doesn't insert
            if ($check->num_rows == 0) {
                $statement = $mysqli->query($insertline);
                $revenueinsertid = $mysqli->insert_id;
                echo "<div> $insertline </div>";
                if (!$statement) {
                    echo "<div> SQL error - ".$mysqli->error."</div>";
                }
            }  
            while($row = mysqli_fetch_array($check)) {
            $revenueinsertid = $row['revenue_id'];
            }
        }
    } else {
        echo "<div> Duplicate revenue found at $revenue so don't insert </div>";

        //if duplicate found sets revenueinsertid to duplicate revenueid from database
        while($row = mysqli_fetch_array($check)) {
            $revenueinsertid = $row['revenue_id'];
        }
    }



     //populate poster table
     $endp = "http://www.omdbapi.com/?t=$title&apikey=54683997";
     $respond = file_get_contents($endp);
     $jsonresult = json_decode($respond, true);
     $poster = $jsonresult["Poster"];

     $insertline = "INSERT INTO poster (poster_id, poster_uri) VALUES (NULL, '$poster')";
     $duplicate = "SELECT * from poster WHERE poster_uri ='$poster'";
     
     
         $statement = $mysqli->query($insertline);
         $posterinsertid = $mysqli->insert_id;
         echo "<div> $insertline </div>";
         if (!$statement) {
             echo "<div> SQL error - ".$mysqli->error."</div>";
             while($row = mysqli_fetch_array($check)) {
             $posterinsertid = $row['poster_id'];
             }
         }
   
     



        //populate summary table
        $endp  = "http://www.omdbapi.com/?t=$title&plot=full&apikey=54683997";
               
        $respond = file_get_contents($endp);
        $jsonresult = json_decode($respond, true);
        $summary = $jsonresult["Plot"];
        $summary = mysqli_real_escape_string($mysqli, $summary);
   
        $insertline = "INSERT INTO summary (summary_id, summary) VALUES (NULL, '$summary')";
        $duplicate = "SELECT * from summary WHERE summary ='$summary'";
        
        $check = $mysqli->query($duplicate); //checks to see if summary name has already been inserted - if it has it will not be entered.
        if ($check->num_rows == 0) {
            $statement = $mysqli->query($insertline);
            $summaryinsertid = $mysqli->insert_id;
            echo "<div> $insertline </div>";
            if (!$statement) {
                echo "<div> SQL error - ".$mysqli->error."</div>";
                while($row = mysqli_fetch_array($check)) {
                $summaryinsertid = $row['summary_id'];
                }
            }
        } else {
            echo "<div> Duplicate summary found at $summary so don't insert </div>";
    
            //if duplicate found sets summary_id to duplicate summary_id from database
            while($row = mysqli_fetch_array($check)) {
                $summaryinsertid = $row['summary_id'];
            }
        }



    //populate genre table
    $genre= $line[1]; 
    $genre = explode(',', $genre);
    $genreinsertarray = array();

    foreach ($genre as $value) {
       
        $value = mysqli_real_escape_string($mysqli, $value);

        //removes unecessary chars from column name
        $value = str_replace( array('\'', '\\' ,'/'), '', $value);

        //removes space at beggining of column name
        if ($value[0] == ' ') {
            $value = substr($value, 1);
        }

        if ($value == 'Romance Movies' || $value == 'Romantic') {
            $value = 'Romance';
        }

        if ($value == 'Classic Movies') {
            $value = 'Classic';
        }

        if ($value == 'Dramas') {
            $value = 'Drama';
        }

        if ($value == 'Thrillers') {
            $value = 'Thriller';
        }

        if ($value == 'Documentaries') {
            $value = 'Documentary';
        }

        if ($value == 'Music') {
            $value = 'Musical';
        }

      

        
        
        $insertline = "INSERT INTO genre (genre_name) VALUES ('$value')";
        $duplicate = "SELECT * from genre where genre_name ='$value'";
        $check = $mysqli->query($duplicate); //checks to see if title name has already been inserted - if it has it will not be entered.
        
        if ($check->num_rows == 0) {
            $statement = $mysqli->query($insertline);
            $genreinsertid = $mysqli->insert_id;
            array_push($genreinsertarray, $genreinsertid); //populates array of genres to populate movie_genre table
            echo "<div> $insertline </div>";
            if (!$statement) {
                echo "<div> SQL error - ".$mysqli->error."</div>";
                while($row = mysqli_fetch_array($check)) {
                $genreinsertid = $row['genre_id'];
                array_push($genreinsertarray, $genreinsertid); //populates array of genres to populate movie_genre table
                }
            }
        } else {
            echo "<div> Duplicate genre found at $value so don't insert </div>";
            //if duplicate found sets insertgenre to duplicate genreid from database
            while($row = mysqli_fetch_array($check)) {
                $genreinsertid = $row['genre_id'];
                array_push($genreinsertarray, $genreinsertid); //populates array of genres to populate movie_genre table
            }
        }
    }
    print_r($genreinsertarray);


    //populate director table
    $director = $line[2]; 
    $director = explode(',', $director);
    $directorinsertarray = array();

    foreach ($director as $value) {

        $value = str_replace( array('\'',), '', $value);
        $value = mysqli_real_escape_string($mysqli, $value);

        if ($value[0] == ' ') {
            $value = substr($value, 1);
        }
        

    
            
        $insertline = "INSERT INTO director (director_name) VALUES ('$value')";
        $duplicate = "SELECT * from director where director_name ='$value'";
        $check = $mysqli->query($duplicate); //checks to see if director name has already been inserted - if it has it will not be entered.
        if ($check->num_rows == 0) {
            $statement = $mysqli->query($insertline);
            $directorinsertid = $mysqli->insert_id;
            array_push($directorinsertarray, $directorinsertid);
            echo "<div> $insertline </div>";
            if (!$statement) {
                echo "<div> SQL error - ".$mysqli->error."</div>";
                while($row = mysqli_fetch_array($check)) {
                $directorinsertid = $row['director_id'];
                array_push($directorinsertarray, $directorinsertid);
                }
            }
        } else {
            echo "<div> Duplicate director found at $value so don't insert </div>";
    
            //if duplicate found sets insertgenre to duplicate director from database
            while($row = mysqli_fetch_array($check)) {
                $directorinsertid = $row['director_id'];
                array_push($directorinsertarray, $directorinsertid);
            }
        }

    }
    print_r($directorinsertarray);



       //populate actor table
       $actor = $line[3]; 
       $actor = explode(',', $actor);
       $actorinsertarray = array();
   
       foreach ($actor as $value) {

            $value = str_replace( array('\'',), '', $value);
            $value = mysqli_real_escape_string($mysqli, $value);
            if ($value[0] == ' ') {
                $value = substr($value, 1);
            }
           
   
       
               
           $insertline = "INSERT INTO actor (actor_name) VALUES ('$value')";
           $duplicate = "SELECT * from actor where actor_name ='$value'";
           $check = $mysqli->query($duplicate); //checks to see if title name has already been inserted - if it has it will not be entered.
           if ($check->num_rows == 0) {
               $statement = $mysqli->query($insertline);
               $actorinsertid = $mysqli->insert_id;
               array_push($actorinsertarray, $actorinsertid);
               echo "<div> $insertline </div>";
               if (!$statement) {
                   echo "<div> SQL error - ".$mysqli->error."</div>";
                   while($row = mysqli_fetch_array($check)) {
                   $actorinsertid = $row['actor_id'];
                   array_push($actorinsertarray, $actorinsertid);
                   }
               }
           } else {
               echo "<div> Duplicate actor found at $value so don't insert </div>";
       
               //if duplicate found sets insert_actor_id to duplicate actor_id from database
               while($row = mysqli_fetch_array($check)) {
                   $actorinsertid = $row['actor_id'];
                   array_push($actorinsertarray, $actorinsertid);
               }
           }
   
       }

       print_r($actorinsertarray);
   
   
   



        //populate the movie table
        $insertline = "INSERT INTO movie (movie_id, title_id, year_id, runtime_id, revenue_id, poster_id, summary_id) VALUES (NULL, $titleinsertid, $yearinsertid, $runtimeinsertid, $revenueinsertid, $posterinsertid, $summaryinsertid)";
        $duplicate = "SELECT * FROM movie WHERE (title_id = '$titleinsertid' AND year_id = '$yearinsertid')";
        $check = $mysqli->query($duplicate); //checks to see if title name has already been inserted - if it has it will not be entered.
       if ($check->num_rows == 0) {
           $statement = $mysqli->query($insertline);
           $movieinsertid = $mysqli->insert_id;
           

       } else {
        echo "<div> Duplicate movie found at $insertline so don't insert </div>";
        while($row = mysqli_fetch_array($check)) {
            $movieinsertid = $row['movie_id'];
            
       }
    }
        if (!$statement) {
            echo "<div> $mysqli->error </div>";
           } else {
            echo "<div> $insertline </div>";
           }

        

        //populate the movie genre table
         foreach($genreinsertarray as $value) {
            $insertline = "INSERT INTO movie_genre (movie_genre_id, movie_id, genre_id) VALUES (NULL, $movieinsertid, $value)";
            $duplicate = "SELECT * FROM movie_genre WHERE (movie_id = '$movieinsertid' AND genre_id = '$genreinsertid')";
            $check = $mysqli->query($duplicate); //checks to see if title name has already been inserted - if it has it will not be entered.

            if ($check->num_rows == 0) {
                $statement = $mysqli->query($insertline);
                $moviegenreinsertid = $mysqli->insert_id;
     
            } else {
             while($row = mysqli_fetch_array($check)) {
                 $moviegenreinsertid = $row['movie_genre_id'];
               
                 $genreinsertid = $row['genre_id'];

         
                 
            }
        }

        if (!$statement) {
            echo "<div> $mysqli->error </div>";
            
           } else {
            echo "<div> $insertline </div>";
           
        }    
    }

     //populate the movie director table
     foreach($directorinsertarray as $value) {
        $insertline = "INSERT INTO movie_director (movie_director_id, movie_id, director_id) VALUES (NULL, $movieinsertid, $value)";
        $duplicate = "SELECT * FROM movie_director WHERE (movie_id = '$movieinsertid' AND director_id = '$value')";
        $check = $mysqli->query($duplicate); //checks to see if title name has already been inserted - if it has it will not be entered.

        if ($check->num_rows == 0) {
            $statement = $mysqli->query($insertline);
            $moviedirectorinsertid = $mysqli->insert_id;
 
        } else {
         while($row = mysqli_fetch_array($check)) {
             $moviedirectorinsertid = $row['movie_director_id'];
             $moviedinsertid = $row['movie_id'];
             $directorinsertid = $row['director_id'];
         }
             
        }
        if (!$statement) {
            echo "<div> $mysqli->error </div>";
            
           } else {
            echo "<div> $insertline </div>";
           
        }    
    
    }


     //populate the movie actor table
     foreach($actorinsertarray as $value) {
        $insertline = "INSERT INTO movie_actor(movie_actor_id, movie_id, actor_id) VALUES (NULL, $movieinsertid, $value)";
        $duplicate = "SELECT * FROM movie_actor WHERE (movie_id = '$movieinsertid' AND actor_id = '$value')";
        $check = $mysqli->query($duplicate); //checks to see if title name has already been inserted - if it has it will not be entered.

        if ($check->num_rows == 0) {
            $statement = $mysqli->query($insertline);
            $movieactorinsertid = $mysqli->insert_id;
 
        } else {
         while($row = mysqli_fetch_array($check)) {
             $movieactorinsertid = $row['movie_actor_id'];
             $actorinsertid = $row['actor_id'];
             $movieinsertid = $row['movie_id'];
         }
             
        }
        if (!$statement) {
            echo "<div> $mysqli->error </div>";
            
           } else {
            echo "<div> $insertline </div>";
           
        }    
    
    }

 

     
           

        
    
    echo "<br>";
    echo "<br>";





}

fclose($file);





?>