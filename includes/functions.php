<?php
include 'connect.php';

function get_all_videos($pdo) {
   
    $query = "SELECT * FROM video";

    $get_video = $pdo->query($query);
    $results = array();
    while($row = $get_video->fetch(PDO::FETCH_ASSOC)) {
       
        $subquery = "SELECT * FROM genre WHERE genre_id =".$row['id'];
       
        $get_genre = $pdo->query($subquery);
   
        while($row1 = $get_genre->fetch(PDO::FETCH_ASSOC)) {
        
                $results[] = array_merge($row, $row1);
         
        }
      
    }

    return $results;
}

function get_single_video($pdo, $vid) {
  
    $query = "SELECT * FROM video WHERE id = '$vid'";

    $get_video = $pdo->query($query);
    $results = array();

    while($row = $get_video->fetch(PDO::FETCH_ASSOC)) {
        $subquery = "SELECT * FROM genre WHERE genre_id =".$row['id'];
     
        $get_genre = $pdo->query($subquery);
        while($row1 = $get_genre->fetch(PDO::FETCH_ASSOC)) {
                $results[] = array_merge($row, $row1);
      
        }
    }
    return $results;

}





?>