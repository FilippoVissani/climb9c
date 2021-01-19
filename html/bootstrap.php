<?php
session_start();
define("UPLOAD_DIR", "./upload/products_images_by_id/");
/*require_once("utils/functions.php");*/
require_once("db/database.php");
require_once("utils/functions.php");
$dbh = new DatabaseHelper("4.tcp.ngrok.io", "root", "", "climb_9c", 15989);
?>
