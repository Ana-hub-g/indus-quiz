<?php
require_once 'config/config.php';
session_name('quiz_'.$config['quiz_number']);
session_start();
session_destroy(); //destroy the session
header("location: index.php"); //to redirect back to "index.php" after logging out
exit();