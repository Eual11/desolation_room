<?php
error_reporting(E_ALL ^ E_WARNING);
$username = $_POST['user'];
$password = $_POST['password'];

$error = "";
if($username == ""){
    
}

else if (preg_match("/[^\w]/",$username))
{
    $error .= "Username must contain only A-Z 0-9 and underscore";
}

if ($password=="")
{
    $error.="<br> Password must contain 6 or more characters";
}
else if (strlen($password) <6)
{
    $error.="<br> Password must contain 6 or more characters";
}
echo $error;

?>