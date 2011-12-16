<?php
  include 'post.php';
  
  $connection = mysql_connect('localhost', 'wfuser', '123') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");  
  $database = "courses";  
  mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");  
    
  function GetBlogPosts($inId=null, $inTagId =null)  
  {  
      if (!empty($inId))  
      {  
          $query = mysql_query("SELECT * FROM posts WHERE id = " . $inId . " ORDER BY id DESC");  
      }  
      else if (!empty($inTagId))  
      {  
          $query = mysql_query("SELECT posts.* FROM post_tags LEFT JOIN (posts) ON (post_tags.postID = posts.id) WHERE post_tags.tagID =" . $tagID . " ORDER BY posts.id DESC");  
      }  
      else  
      {  
          $query = mysql_query("SELECT * FROM posts ORDER BY id DESC");  
      }  
    
      $postArray = array();  
      while ($row = mysql_fetch_assoc($query))  
      {  
          $myPost = new Post($row["id"], $row['title'], $row['post'], $row['postfull'], $row["user_id"], $row['dateposted']);  
          array_push($postArray, $myPost);  
      }  
      return $postArray;  
  }  
?>