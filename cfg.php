<?php
// This is where we can set some global variables and the such.

//////////////////// MySQL CONNECTION INFORMATION //////////////////////|
    $server = 'localhost'; // Server name                             //|
    $user = 'root'; // Username for database                          //|
    $passwd = 'root'; // Password for database                        //|
    $db = 'enc'; // Database name                                     //|
                                                                      //|
    $con = new mysqli($server, $user, $passwd, $db);                  //|
    if($con->connect_error)                                           //|
    {                                                                 //|
        die("<div id='notifyBad'>Error! $con->connect_error</div>");  //|
    }                                                                 //|
////////////////////////////////////////////////////////////////////////|
  
    // Name of website
    $website_name = "Slaughter Message";

    // Host name
    $website_hostname = "http://127.0.0.1/enc";
?>
