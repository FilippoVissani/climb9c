<?php
session_start();
define("UPLOAD_DIR", "./upload/products_images_by_id/");
/*require_once("utils/functions.php");*/
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "climb_9c", 3306);
?>