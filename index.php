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
      <div id="top_nav">You're logged in as <? echo $_SESSION["email"]; ?> <a href="logout.php">Logout</a></div>
     <? } ?> 
    
    <div id="main">  
        <h1>Blog on PHP</h1>  
        <div id="Posts">  
          <?php  
            include 'includes/includes.php';  
            $blogPosts = GetBlogPosts();
            foreach ($blogPosts as $post)  
            {  
                echo "<div class='post'>";  
                echo "<h1>" . $post->title . "</h1>";  
                echo "<p>" . $post->post . "</h1>";  
                echo "<span class='footer'>Posted By: " . $post->user . " Posted On: " . $post->datePosted . " Tags: " . $post->tags . "</span>";  
                echo "</div>";  
            }    
          ?>  
        </div> 
        <? if (session_is_registered(email)){ ?> 
        <div id="new post">
        <h2>Blog is waiting for new post!</h2>
          <form action="new_post.php" method="POST">
            Title <input type="text" name="title" /><br />
            Post <input type="text" name="post" /><br />
            <input type="submit" value="Publish" />
          </form>  
        </div>
        <? } ?>
    </div>  
  </body>
</html>