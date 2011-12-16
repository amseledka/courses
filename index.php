<html>
  <head>
    <title>Blog on php</title>
  </head>
  <body>
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
                echo "<span class='footer'>Posted By: " . $post->author . " Posted On: " . $post->datePosted . " Tags: " . $post->tags . "</span>";  
                echo "</div>";  
            }    
          ?>  
        </div>  
    </div>  
  </body>
</html>