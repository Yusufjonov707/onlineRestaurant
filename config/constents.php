<?php
    session_start();

    define('LOCALHOST' , 'localhost');
    define('SITEURL' , 'http://baxodir.uz/thapa/');
    define('ROOT' , 'root');
    define('DB_PASSWORD' , '');
    define('DB_TABLE_NAME' , 'food_order');
 
    $conn=mysqli_connect(LOCALHOST,ROOT,DB_PASSWORD,DB_TABLE_NAME)or die(mysqli_error());
