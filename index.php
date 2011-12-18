<html>
  <head>
    <title>Blog on php</title>
  </head>
  <body>
    <?php
    session_start();
    if(!session_is_registered(email)){ ?>
    <div id="top_nav"><a href="signup.php">Signup</a> or <a href="login.php">Login!</a></div>
    <? } else { ?>
      <div id="top_nav">You're logged in as <? echo $_SESSION[email]; ?> <a href="logout.php">Logout</a></div>
     <? } ?> 
    
    <div id="main">  
        <h1>Blog on PHP</h1>  
        <div id="posts">  
           <?php  
              $con = mysql_connect('localhost', 'wfuser', '123');
              if (!$con) {
                die('Could not connect: ' . mysql_error());
                  }

              mysql_select_db("courses", $con);
              $result = mysql_query("SELECT * FROM posts ORDER BY date_posted DESC");
              while($row = mysql_fetch_array($result))
                {
                echo "<div id='post'>" . "<h2>" . $row['title'] . "</h2>";
                echo "<p>" . $row['post'] . "</p>"; 
                echo "posted on " . $row['date_posted'];
                echo "<br />";
               // echo "by " . mysql_query("SELECT email FROM users WHERE id='$row["user_id"]'", $con) or die('Error: ' . mysql_error());
                echo "<br />" . "</div>";
                }

              mysql_close($con);

           /* include 'includes/includes.php';  
            $blogPosts = GetBlogPosts();
            foreach ($blogPosts as $post)  
            {  
                echo "<div class='post'>";  
                echo "<h1>" . $post->title . "</h1>";  
                echo "<p>" . $post->post . "</h1>";  
                echo "<span class='footer'>Posted By: " . $post->user . " Posted On: " . $post->datePosted . " Tags: " . $post->tags . "</span>";  
                echo "</div>";  } */
             ?>   

        </div> 
        <? if (session_is_registered(email)){ ?> 
        <div id="new post">
        <h2>Blog is waiting for new post!</h2>
          <form action="new_post.php" method="POST">
            Title <br /><input type="text" name="title" /><br />
            Post <br /><textarea name="body"></textarea> <br />
            <input type="submit" value="Publish" />
          </form>  
        </div>
        <? } ?>
    </div>  
  </body>
</html>