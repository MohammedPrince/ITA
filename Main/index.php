<?php 
session_start();

 if(isset($_SESSION['user_id']))
    {
header("location:add_user.php");
    }
    if(!isset($_SESSION['user_id']))
    {
header("location:./pages/index.php");      
    }
?>