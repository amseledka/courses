<html>  
<body>
    <p>You entered:</p>
<?php 

function validate($allSubmitted){

    $message = "";

    $passwords = $allSubmitted["pword"];
    $firstPass = $passwords[0];
    $secondPass = $passwords[1];
    $username = $allSubmitted["name"];

    if ($firstPass != $secondPass) {
        $message = $message."Passwords don't match<br />";
    }
    if (strlen($username) < 5 || strlen($username) > 50){
        $message = $message."Username must be \
        between 5 and 50 characters<br />";
    }

    if ($message == ""){
        $message = "OK";
    }

    return $message;
}
    function db_connect($user='wfuser', $password='123', $db='courses') {
      mysql_connect('localhost', $user, $password)
        or die('I cannot connect to db: ' . mysql_error());
    }
    
    foreach ($_POST as $key=>$value) {
       echo "<p>".$key." = " . $value . "</p>"; 
}
    $passwords = $_POST["pword"];
    echo "First password = ".$passwords[0];
    echo "<br />";
    echo "Second password = ".$passwords[1];

    if (validate($_POST) == "OK") {
        echo "<p>Thank you for registering!</p>";
        db_connect();
        
       $sql = "select * from users where username='".$_POST["name"]."'";
       $result = mysql_query($sql);
       if (!$result) {
        
        $sql = "insert into users (username, email, password) values 
        ('".$_POST["name"]."', '".$_POST["email"]."',  \
        '".$passwords[0]."')";
            $result = mysql_query($sql);

        if ($result){
            echo "It's entered!";
        } else {
            echo "There's been a problem: ".mysql_error();
        }

         } else {
         echo "There is already a user with that name: <br />";
         $sqlAll = "select * from users";
         $resultsAll = mysql_query($sqlAll);
         $row = mysql_fetch_array($resultsAll);

         while ($row) {
           echo $row["username"]." -- ".$row["email"]."<br />";
           $row = mysql_fetch_array($result);
           }
         }

    mysql_close();

    } else {
        echo "<p>There was a problem with your registration:</p>";
        echo validate($_POST);
        echo "<p>Please try again.</p>";
    }
    
?>

</body>
</html>