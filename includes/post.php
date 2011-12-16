<?php
class Post {
  public $id;
  public $title;  
  public $post;  
  public $user;  
  public $tags;  
  public $datePosted;
    
  function __construct($inId=null, $inTitle=null, $inPost=null, $inPostFull=null, $inUserId=null, $inDatePosted=null)  
  {  
    if (!empty($inId))  
    {  
        $this->id = $inId;  
    }  
    if (!empty($inTitle))  
    {  
        $this->title = $inTitle;  
    }  
    if (!empty($inPost))  
    {  
        $this->post = $inPost;  
    }  
  
    if (!empty($inDatePosted))  
    {  
        $splitDate = explode("-", $inDatePosted);  
        $this->datePosted = $splitDate[1] . "/" . $splitDate[2] . "/" . $splitDate[0];  
    }  
  
    if (!empty($inUserId))  
    {  
        $query = mysql_query("SELECT username FROM users WHERE id = " . $inUserId);  
        $row = mysql_fetch_assoc($query);  
        $this->author = $row["username"];  
    }  
  
    $postTags = "No Tags";  
    if (!empty($inId))  
    {  
        $query = mysql_query("SELECT tags.* FROM post_tags LEFT JOIN (tags) ON (post_tags.tag_id = tags.id) WHERE post_tags.post_id = " . $inId);  
        $tagArray = array();  
        $tagIDArray = array();  
        while($row = mysql_fetch_assoc($query))  
        {  
            array_push($tagArray, $row["tag"]);  
            array_push($tagIDArray, $row["id"]);  
        }  
        if (sizeof($tagArray) > 0)  
        {  
            foreach ($tagArray as $tag)  
            {  
                if ($postTags == "No Tags")  
                {  
                    $postTags = $tag;  
                }  
                else  
                {  
                    $postTags = $postTags . ", " . $tag;  
                }  
            }  
        }  
    }  
    $this->tags = $postTags;  
}  
  
}
?>