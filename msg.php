<?php
    // This is a big file full of shit code and lazy stuff like that
    // PHP is so god damn ugly.

    //include the config    
    include("cfg.php");

    // Check if the user is passing an id when accessing this page.
    if(!isset($_GET['id']))
    {
        // If not redirect them to the index.
        header('Location: index.php');
    }

    // Set the id to be the id the user passed through in the url    
    $id = $_GET['id'];  // This will be used to find the message in the database
    $sql = "SELECT * FROM msgs"; // The SQL to run. Selects everything from msgs
    $result = $con->query($sql); // Set $result to be what the SQL spits back
    $foundMatch = false; // You will see what this is used for soon

    // For all the rows in the database
    while($row = $result->fetch_assoc())
    {
        $entry = $row['id']; // For ease of access.

        // if the entry is the same as the id we know we got
        // right entry
        if($entry == $id)
        {
            $msg = $row['msg']; // $msg is now the encrypted message from the database
            $foundMatch = true; // set this to true so we know we found something

            // Delete the entry from database.
            $sql = "DELETE FROM msgs WHERE id='$id'";
            if ($con->query($sql) === TRUE)
            {
                // Make a little notification pop up saying the database entry was removed.
                echo "<div id='notifyBad'>Record has been deleted from our database. Be sure to read carefully because this is the only time you will get to see it.</div>";
            }
        }
    }

    // If there was not a match
    if(!$foundMatch)
    {
        header('Location: index.php'); // Relocate to index.php
    }
?>

<html>
    <head>
    <title><?php $website_name; ?></title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>
    <body>
    <h1><a href="index.php"><?php echo $website_name; ?></a></h1>
        
        <input type='text' placeholder='Password' class='textbox' id="passwd">
        <button id="decryptBtn" class="button2">Decrypt</button>
        <p><textarea id="msgBox" class='textbox textarea'><? echo $msg; ?></textarea></p>
         <div id="footer"><a href="index.php">Home</a> | <a href="disclaimer.php">Disclaimer</a> | <a href="privacy.php">Privacy</a> | <a href="http://github.com">Github</a></div> 
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
    <script src="js/core.js"></script>
</html>
