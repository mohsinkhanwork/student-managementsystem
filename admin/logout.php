<?php

session_start();                        //important 
session_destroy();

header('location:../login.php');

?>