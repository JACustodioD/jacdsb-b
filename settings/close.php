<?php 
session_start();

session_destroy();
echo "<script> localStorage.removeItem('car'); localStorage.removeItem('total'); </script>";
echo "<script> window.location.href='../../jacdsb-b'; </script>";

?>