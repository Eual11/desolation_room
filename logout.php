<?php
require_once "functions.php";
destroy_session();
header("Location:login.php");
exit;
?>