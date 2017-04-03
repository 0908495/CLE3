<?php
session_start();
session_destroy();

// sends you back to the login page
header("Location: profile.php");
?>