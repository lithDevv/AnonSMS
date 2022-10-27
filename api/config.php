<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'anonsms');
   
   define('free_smtp', '');
   define('basic_plan_smtp', '');
   define('pro_plan_smtp', '');
   define('enterprise_smtp', '');
   define('unlimited_smtp', '');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>