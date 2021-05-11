
<?php

//The database connection for the website.

define("DATABASE", "agricrop");
define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWD", getenv("MYSQL_ROOT") ?? "");
?>
