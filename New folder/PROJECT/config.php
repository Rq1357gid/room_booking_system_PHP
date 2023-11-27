<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Gid@2001');
define('DB_NAME', 'erphp');

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($mysqli === false){

    die("UNABLE TO CONNECT DATABASE!".$mysqli->connect_error);

}
/*else{
    echo "<h1> DATABASE CONNECTED</h1>";
}*/ 

?>
