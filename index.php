<?php 
    //Including the config. This contains some global variables and shit like that.
    include("cfg.php");
?>
<html>
    <head>
    <title><?php echo $website_name; ?></title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>
    <body>
        <h1><a href="index.php"><?php echo $website_name; ?></a></h1>
        <p><?php echo $website_name; ?> is used to privately send messages online. Each message is encrypted client side using AES and only the encrypted message is saved on our server. The message self destructs once veiwed and can not be recovered so be sure to read your messages carefully.</p>
         <?php
            if(isset($_POST['message']))
            {
                //Get the message to encrypt from the text area
                $msg = $_POST['message'];

                //Generate a random string to use as an identifyer
                $id = substr(str_shuffle(MD5(microtime())), 0, 10);
                
                //Insert the id and messange into the database 
                $sql = "INSERT INTO msgs (id, msg)
                    VALUES ('$id', '$msg')";
                if ($con->query($sql) === TRUE)
                {
                    // Make a cute little notification thing on success
                    echo "<div id='notify'>Success! Your message is live at: <a href='$website_hostname/msg.php?id=$id'>$website_hostname/msg.php?id=$id</a></div><br>";
                }else{
                    // Or make a scary error notification if it fails
                    echo "<div id='notifyBad'>Error! $sql<br>$con->error</div><br>";
                }       
                //Close the connection.
                $con->close();
            }
        ?>
       
        <form id="info" method="post"> 
        <input id="passwd" type="text" class="textbox" placeholder="Password">
        <span class="help">This will not be stored on our servers.</span>
        <br>
        <p><textarea id="message" name="message" class="textbox textarea" placeholder="Message to encrypt."></textarea></p>
        </form>
        <button id="btn" class="button">Encrypt</button>
        <div id="footer"><a href="index.php">Home</a> | <a href="disclaimer.php">Disclaimer</a> | <a href="privacy.php">Privacy</a> | <a href="http://github.com">Github</a></div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
    <script src="js/core.js"></script>
</html>
