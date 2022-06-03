<?php
    //SQL Query to select all title_name from title table
    $read = "SELECT title_name from title";
    $result = $mysqli->query($read);
    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }
   
    //build 2D of film titles from mysqli query using PHP
    $titles=array();
    while($rowdata = $result->fetch_assoc()){
    array_push($titles, $rowdata);
    }

    //build array of action films
    $read = "SELECT *
    FROM movie
    INNER JOIN title
    ON movie.title_id = title.title_id
    INNER JOIN poster 
    on movie.poster_id = poster.poster_id
    INNER JOIN movie_genre
    ON movie.movie_id = movie_genre.movie_id
    INNER JOIN genre
    on movie_genre.genre_id = genre.genre_id
    WHERE genre_name = 'Action'
    ORDER BY rand()
    LIMIT 4";

     $result = $mysqli->query($read);
     $actionmovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($actionmovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


     //build array of adventure films
     $read = "SELECT *
     FROM movie
     INNER JOIN title
     ON movie.title_id = title.title_id
     INNER JOIN poster 
     on movie.poster_id = poster.poster_id
     INNER JOIN movie_genre
     ON movie.movie_id = movie_genre.movie_id
     INNER JOIN genre
     on movie_genre.genre_id = genre.genre_id
     WHERE genre_name = 'Adventure'
     ORDER BY rand()
     LIMIT 4";
 
      $result = $mysqli->query($read);
      $adventuremovies = array();
      while($rowdata = $result->fetch_assoc()){
      array_push($adventuremovies, $rowdata);
 
 
     if(!$result){
         echo $mysqli->error;
         echo "<p>$read</p>";
          exit();
     }
 
  }


       //build array of animation films
       $read = "SELECT *
       FROM movie
       INNER JOIN title
       ON movie.title_id = title.title_id
       INNER JOIN poster 
       on movie.poster_id = poster.poster_id
       INNER JOIN movie_genre
       ON movie.movie_id = movie_genre.movie_id
       INNER JOIN genre
       on movie_genre.genre_id = genre.genre_id
       WHERE genre_name = 'Animation'
       ORDER BY rand()
       LIMIT 4";
   
        $result = $mysqli->query($read);
        $animationmovies = array();
        while($rowdata = $result->fetch_assoc()){
        array_push($animationmovies, $rowdata);
   
   
       if(!$result){
           echo $mysqli->error;
           echo "<p>$read</p>";
            exit();
       }
   
    }




       //build array of biography films
       $read = "SELECT *
       FROM movie
       INNER JOIN title
       ON movie.title_id = title.title_id
       INNER JOIN poster 
       on movie.poster_id = poster.poster_id
       INNER JOIN movie_genre
       ON movie.movie_id = movie_genre.movie_id
       INNER JOIN genre
       on movie_genre.genre_id = genre.genre_id
       WHERE genre_name = 'Biography'
       ORDER BY rand()
       LIMIT 4";
   
        $result = $mysqli->query($read);
        $biographymovies = array();
        while($rowdata = $result->fetch_assoc()){
        array_push($biographymovies, $rowdata);
   
   
       if(!$result){
           echo $mysqli->error;
           echo "<p>$read</p>";
            exit();
       }
   
    }


           //build array of children films
           $read = "SELECT *
           FROM movie
           INNER JOIN title
           ON movie.title_id = title.title_id
           INNER JOIN poster 
           on movie.poster_id = poster.poster_id
           INNER JOIN movie_genre
           ON movie.movie_id = movie_genre.movie_id
           INNER JOIN genre
           on movie_genre.genre_id = genre.genre_id
           WHERE genre_name = 'Children'
           ORDER BY rand()
           LIMIT 4";
       
            $result = $mysqli->query($read);
            $childrenmovies = array();
            while($rowdata = $result->fetch_assoc()){
            array_push($childrenmovies, $rowdata);
       
       
           if(!$result){
               echo $mysqli->error;
               echo "<p>$read</p>";
                exit();
           }
       
        }


                //build array of classic films
                $read = "SELECT *
                FROM movie
                INNER JOIN title
                ON movie.title_id = title.title_id
                INNER JOIN poster 
                on movie.poster_id = poster.poster_id
                INNER JOIN movie_genre
                ON movie.movie_id = movie_genre.movie_id
                INNER JOIN genre
                on movie_genre.genre_id = genre.genre_id
                WHERE genre_name = 'Classic'
                ORDER BY rand()
                LIMIT 4";
            
                 $result = $mysqli->query($read);
                 $classicmovies = array();
                 while($rowdata = $result->fetch_assoc()){
                 array_push($classicmovies, $rowdata);
            
            
                if(!$result){
                    echo $mysqli->error;
                    echo "<p>$read</p>";
                     exit();
                }
            
             }


                   //build array of comedy films
                   $read = "SELECT *
                   FROM movie
                   INNER JOIN title
                   ON movie.title_id = title.title_id
                   INNER JOIN poster 
                   on movie.poster_id = poster.poster_id
                   INNER JOIN movie_genre
                   ON movie.movie_id = movie_genre.movie_id
                   INNER JOIN genre
                   on movie_genre.genre_id = genre.genre_id
                   WHERE genre_name = 'Comedy'
                   ORDER BY rand()
                   LIMIT 4";
               
                    $result = $mysqli->query($read);
                    $comedymovies = array();
                    while($rowdata = $result->fetch_assoc()){
                    array_push($comedymovies, $rowdata);
               
               
                   if(!$result){
                       echo $mysqli->error;
                       echo "<p>$read</p>";
                        exit();
                   }
               
                }

                   //build array of crime films
                   $read = "SELECT *
                   FROM movie
                   INNER JOIN title
                   ON movie.title_id = title.title_id
                   INNER JOIN poster 
                   on movie.poster_id = poster.poster_id
                   INNER JOIN movie_genre
                   ON movie.movie_id = movie_genre.movie_id
                   INNER JOIN genre
                   on movie_genre.genre_id = genre.genre_id
                   WHERE genre_name = 'Crime'
                   ORDER BY rand()
                   LIMIT 4";
               
                    $result = $mysqli->query($read);
                    $crimemovies = array();
                    while($rowdata = $result->fetch_assoc()){
                    array_push($crimemovies, $rowdata);
               
               
                   if(!$result){
                       echo $mysqli->error;
                       echo "<p>$read</p>";
                        exit();
                   }
               
                }


                  //build array of cult films
                  $read = "SELECT *
                  FROM movie
                  INNER JOIN title
                  ON movie.title_id = title.title_id
                  INNER JOIN poster 
                  on movie.poster_id = poster.poster_id
                  INNER JOIN movie_genre
                  ON movie.movie_id = movie_genre.movie_id
                  INNER JOIN genre
                  on movie_genre.genre_id = genre.genre_id
                  WHERE genre_name = 'Cult'
                  ORDER BY rand()
                  LIMIT 4";
              
                   $result = $mysqli->query($read);
                   $cultmovies = array();
                   while($rowdata = $result->fetch_assoc()){
                   array_push($cultmovies, $rowdata);
              
              
                  if(!$result){
                      echo $mysqli->error;
                      echo "<p>$read</p>";
                       exit();
                  }
              
               }



                  //build array of cult films
                  $read = "SELECT *
                  FROM movie
                  INNER JOIN title
                  ON movie.title_id = title.title_id
                  INNER JOIN poster 
                  on movie.poster_id = poster.poster_id
                  INNER JOIN movie_genre
                  ON movie.movie_id = movie_genre.movie_id
                  INNER JOIN genre
                  on movie_genre.genre_id = genre.genre_id
                  WHERE genre_name = 'Documentary'
                  ORDER BY rand()
                  LIMIT 4";
              
                   $result = $mysqli->query($read);
                   $documentarymovies = array();
                   while($rowdata = $result->fetch_assoc()){
                   array_push($documentarymovies, $rowdata);
              
              
                  if(!$result){
                      echo $mysqli->error;
                      echo "<p>$read</p>";
                       exit();
                  }
              
               }



                   //build array of drama films
                   $read = "SELECT *
                   FROM movie
                   INNER JOIN title
                   ON movie.title_id = title.title_id
                   INNER JOIN poster 
                   on movie.poster_id = poster.poster_id
                   INNER JOIN movie_genre
                   ON movie.movie_id = movie_genre.movie_id
                   INNER JOIN genre
                   on movie_genre.genre_id = genre.genre_id
                   WHERE genre_name = 'Drama'
                   ORDER BY rand()
                   LIMIT 4";
               
                    $result = $mysqli->query($read);
                    $dramamovies = array();
                    while($rowdata = $result->fetch_assoc()){
                    array_push($dramamovies, $rowdata);
               
               
                   if(!$result){
                       echo $mysqli->error;
                       echo "<p>$read</p>";
                        exit();
                   }
               
                }

                //build array of faith & spirituality films
                $read = "SELECT *
                FROM movie
                INNER JOIN title
                ON movie.title_id = title.title_id
                INNER JOIN poster 
                on movie.poster_id = poster.poster_id
                INNER JOIN movie_genre
                ON movie.movie_id = movie_genre.movie_id
                INNER JOIN genre
                on movie_genre.genre_id = genre.genre_id
                WHERE genre_name = 'Faith & Spirituality'
                ORDER BY rand()
                LIMIT 4";
            
                 $result = $mysqli->query($read);
                 $faithspiritualitymovies = array();
                 while($rowdata = $result->fetch_assoc()){
                 array_push($faithspiritualitymovies, $rowdata);
            
            
                if(!$result){
                    echo $mysqli->error;
                    echo "<p>$read</p>";
                     exit();
                }
            
             }


                //build array of family films
                $read = "SELECT *
                FROM movie
                INNER JOIN title
                ON movie.title_id = title.title_id
                INNER JOIN poster 
                on movie.poster_id = poster.poster_id
                INNER JOIN movie_genre
                ON movie.movie_id = movie_genre.movie_id
                INNER JOIN genre
                on movie_genre.genre_id = genre.genre_id
                WHERE genre_name = 'Family'
                ORDER BY rand()
                LIMIT 4";
            
                 $result = $mysqli->query($read);
                 $familymovies = array();
                 while($rowdata = $result->fetch_assoc()){
                 array_push($familymovies, $rowdata);
            
            
                if(!$result){
                    echo $mysqli->error;
                    echo "<p>$read</p>";
                     exit();
                }
            
             }



                //build array of fantasy films
                $read = "SELECT *
                FROM movie
                INNER JOIN title
                ON movie.title_id = title.title_id
                INNER JOIN poster 
                on movie.poster_id = poster.poster_id
                INNER JOIN movie_genre
                ON movie.movie_id = movie_genre.movie_id
                INNER JOIN genre
                on movie_genre.genre_id = genre.genre_id
                WHERE genre_name = 'Fantasy'
                ORDER BY rand()
                LIMIT 4";
            
                 $result = $mysqli->query($read);
                 $fantasymovies = array();
                 while($rowdata = $result->fetch_assoc()){
                 array_push($fantasymovies, $rowdata);
            
            
                if(!$result){
                    echo $mysqli->error;
                    echo "<p>$read</p>";
                     exit();
                }
            
             }


               //build array of history films
               $read = "SELECT *
               FROM movie
               INNER JOIN title
               ON movie.title_id = title.title_id
               INNER JOIN poster 
               on movie.poster_id = poster.poster_id
               INNER JOIN movie_genre
               ON movie.movie_id = movie_genre.movie_id
               INNER JOIN genre
               on movie_genre.genre_id = genre.genre_id
               WHERE genre_name = 'History'
               ORDER BY rand()
               LIMIT 4";
           
                $result = $mysqli->query($read);
                $historymovies = array();
                while($rowdata = $result->fetch_assoc()){
                array_push($historymovies, $rowdata);
           
           
               if(!$result){
                   echo $mysqli->error;
                   echo "<p>$read</p>";
                    exit();
               }
           
            }


                 //build array of horror films
                 $read = "SELECT *
                 FROM movie
                 INNER JOIN title
                 ON movie.title_id = title.title_id
                 INNER JOIN poster 
                 on movie.poster_id = poster.poster_id
                 INNER JOIN movie_genre
                 ON movie.movie_id = movie_genre.movie_id
                 INNER JOIN genre
                 on movie_genre.genre_id = genre.genre_id
                 WHERE genre_name = 'Horror'
                 ORDER BY rand()
                 LIMIT 4";
             
                  $result = $mysqli->query($read);
                  $horrormovies = array();
                  while($rowdata = $result->fetch_assoc()){
                  array_push($horrormovies, $rowdata);
             
             
                 if(!$result){
                     echo $mysqli->error;
                     echo "<p>$read</p>";
                      exit();
                 }
             
              }

                 //build array of independent films
                 $read = "SELECT *
                 FROM movie
                 INNER JOIN title
                 ON movie.title_id = title.title_id
                 INNER JOIN poster 
                 on movie.poster_id = poster.poster_id
                 INNER JOIN movie_genre
                 ON movie.movie_id = movie_genre.movie_id
                 INNER JOIN genre
                 on movie_genre.genre_id = genre.genre_id
                 WHERE genre_name = 'Independent'
                 ORDER BY rand()
                 LIMIT 4";
             
                  $result = $mysqli->query($read);
                  $independentmovies = array();
                  while($rowdata = $result->fetch_assoc()){
                  array_push($independentmovies, $rowdata);
             
             
                 if(!$result){
                     echo $mysqli->error;
                     echo "<p>$read</p>";
                      exit();
                 }
             
              }

               //build array of international films
               $read = "SELECT *
               FROM movie
               INNER JOIN title
               ON movie.title_id = title.title_id
               INNER JOIN poster 
               on movie.poster_id = poster.poster_id
               INNER JOIN movie_genre
               ON movie.movie_id = movie_genre.movie_id
               INNER JOIN genre
               on movie_genre.genre_id = genre.genre_id
               WHERE genre_name = 'International'
               ORDER BY rand()
               LIMIT 4";
           
                $result = $mysqli->query($read);
                $internationalmovies = array();
                while($rowdata = $result->fetch_assoc()){
                array_push($internationalmovies, $rowdata);
           
           
               if(!$result){
                   echo $mysqli->error;
                   echo "<p>$read</p>";
                    exit();
               }
           
            }


            //build array of musical films
            $read = "SELECT *
            FROM movie
            INNER JOIN title
            ON movie.title_id = title.title_id
            INNER JOIN poster 
            on movie.poster_id = poster.poster_id
            INNER JOIN movie_genre
            ON movie.movie_id = movie_genre.movie_id
            INNER JOIN genre
            on movie_genre.genre_id = genre.genre_id
            WHERE genre_name = 'Musical'
            ORDER BY rand()
            LIMIT 4";
        
             $result = $mysqli->query($read);
             $musicalmovies = array();
             while($rowdata = $result->fetch_assoc()){
             array_push($musicalmovies, $rowdata);
        
        
            if(!$result){
                echo $mysqli->error;
                echo "<p>$read</p>";
                 exit();
            }
        
         }



            //build array of musical films
            $read = "SELECT *
            FROM movie
            INNER JOIN title
            ON movie.title_id = title.title_id
            INNER JOIN poster 
            on movie.poster_id = poster.poster_id
            INNER JOIN movie_genre
            ON movie.movie_id = movie_genre.movie_id
            INNER JOIN genre
            on movie_genre.genre_id = genre.genre_id
            WHERE genre_name = 'Mystery'
            ORDER BY rand()
            LIMIT 4";
        
             $result = $mysqli->query($read);
             $mysterymovies = array();
             while($rowdata = $result->fetch_assoc()){
             array_push($mysterymovies, $rowdata);
        
        
            if(!$result){
                echo $mysqli->error;
                echo "<p>$read</p>";
                 exit();
            }
        
         }



            //build array of romance films
            $read = "SELECT *
            FROM movie
            INNER JOIN title
            ON movie.title_id = title.title_id
            INNER JOIN poster 
            on movie.poster_id = poster.poster_id
            INNER JOIN movie_genre
            ON movie.movie_id = movie_genre.movie_id
            INNER JOIN genre
            on movie_genre.genre_id = genre.genre_id
            WHERE genre_name = 'Romance'
            ORDER BY rand()
            LIMIT 4";
        
             $result = $mysqli->query($read);
             $romancemovies = array();
             while($rowdata = $result->fetch_assoc()){
             array_push($romancemovies, $rowdata);
        
        
            if(!$result){
                echo $mysqli->error;
                echo "<p>$read</p>";
                 exit();
            }
        
         }



            //build array of scifi- films
            $read = "SELECT *
            FROM movie
            INNER JOIN title
            ON movie.title_id = title.title_id
            INNER JOIN poster 
            on movie.poster_id = poster.poster_id
            INNER JOIN movie_genre
            ON movie.movie_id = movie_genre.movie_id
            INNER JOIN genre
            on movie_genre.genre_id = genre.genre_id
            WHERE genre_name = 'Sci-Fi'
            ORDER BY rand()
            LIMIT 4";
        
             $result = $mysqli->query($read);
             $scifimovies = array();
             while($rowdata = $result->fetch_assoc()){
             array_push($scifimovies, $rowdata);
        
        
            if(!$result){
                echo $mysqli->error;
                echo "<p>$read</p>";
                 exit();
            }
        
         }

                //build array of sport films
                $read = "SELECT *
                FROM movie
                INNER JOIN title
                ON movie.title_id = title.title_id
                INNER JOIN poster 
                on movie.poster_id = poster.poster_id
                INNER JOIN movie_genre
                ON movie.movie_id = movie_genre.movie_id
                INNER JOIN genre
                on movie_genre.genre_id = genre.genre_id
                WHERE genre_name = 'Sport'
                ORDER BY rand()
                LIMIT 4";
            
                 $result = $mysqli->query($read);
                 $sportmovies = array();
                 while($rowdata = $result->fetch_assoc()){
                 array_push($sportmovies, $rowdata);
            
            
                if(!$result){
                    echo $mysqli->error;
                    echo "<p>$read</p>";
                     exit();
                }
            
             }



                //build array of thriller films
                $read = "SELECT *
                FROM movie
                INNER JOIN title
                ON movie.title_id = title.title_id
                INNER JOIN poster 
                on movie.poster_id = poster.poster_id
                INNER JOIN movie_genre
                ON movie.movie_id = movie_genre.movie_id
                INNER JOIN genre
                on movie_genre.genre_id = genre.genre_id
                WHERE genre_name = 'Thriller'
                ORDER BY rand()
                LIMIT 4";
            
                 $result = $mysqli->query($read);
                 $thrillermovies = array();
                 while($rowdata = $result->fetch_assoc()){
                 array_push($thrillermovies, $rowdata);
            
            
                if(!$result){
                    echo $mysqli->error;
                    echo "<p>$read</p>";
                     exit();
                }
            
             }


             //build array of war films
             $read = "SELECT *
             FROM movie
             INNER JOIN title
             ON movie.title_id = title.title_id
             INNER JOIN poster 
             on movie.poster_id = poster.poster_id
             INNER JOIN movie_genre
             ON movie.movie_id = movie_genre.movie_id
             INNER JOIN genre
             on movie_genre.genre_id = genre.genre_id
             WHERE genre_name = 'War'
             ORDER BY rand()
             LIMIT 4";
         
              $result = $mysqli->query($read);
              $warmovies = array();
              while($rowdata = $result->fetch_assoc()){
              array_push($warmovies, $rowdata);
         
         
             if(!$result){
                 echo $mysqli->error;
                 echo "<p>$read</p>";
                  exit();
             }
         
          }



            //build array of western films
            $read = "SELECT *
            FROM movie
            INNER JOIN title
            ON movie.title_id = title.title_id
            INNER JOIN poster 
            on movie.poster_id = poster.poster_id
            INNER JOIN movie_genre
            ON movie.movie_id = movie_genre.movie_id
            INNER JOIN genre
            on movie_genre.genre_id = genre.genre_id
            WHERE genre_name = 'Western'
            ORDER BY rand()
            LIMIT 4";
        
             $result = $mysqli->query($read);
             $westernmovies = array();
             while($rowdata = $result->fetch_assoc()){
             array_push($westernmovies, $rowdata);
        
        
            if(!$result){
                echo $mysqli->error;
                echo "<p>$read</p>";
                 exit();
            }
        
         }

     



    