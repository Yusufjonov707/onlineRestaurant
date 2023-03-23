<?php 
include "../config/constents.php";
session_destroy();
header("location:".SITEURL."admin/login.php");
?>