<?php

session_start();
require_once "db.php";
require_once "functions.php";
ensuresignin();

// check admin rights

$id = $_SESSION['sac_id'];

include "header.php";

navigationbar();
echo "<div class='container-fluid'>";

echo "<p>The page you are trying to access requires additional access rights. Please contact the Head, MSWDO for the appropriate access for your account.</p>";
echo "<p>But if you are the Head, MSWDO, contact the system administrator for the appropriate access rights.</p>";
echo "<p><a href='index.php'>Click here to go back to the home page</a>";
echo "</p></div>";