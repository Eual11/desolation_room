<?php
session_start();

echo <<<_INIT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" src="script.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
_INIT;
require_once "functions.php";
$userstr = 'Logged In as: Eual_Uchiha';

if(isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = 'Welcome $user!';
}

else $loggedin = false;


echo <<<_BODY
<body>
<div class="header">
    <img src="img/header_bt_white.png">
</div>
<div class="message"><span #id="welcome">$userstr</span></div>
_BODY;

if (!$loggedin)
{
    echo <<<_MAIN
    <div class="interface">
    <ul>
        <li> <button>       <i class="fa fa-home" style="font-size: 100%; color:#EEEEEE" aria-hidden="true"></i> Home</i></button> </li>
        <li><button><i style="color: #EEEEEE; font-size:100%;" class="fa fa-sign-in" aria-hidden="true"></i> Sign Up</button> </li>
        <li> <button><i style="color:#EEEEEE; font-size: 100%;" class="fa fa-user-circle" aria-hidden="true"></i>  Login </button> </li>
    </ul>
</div>


_MAIN;
}


else 
{
    echo <<<_MAIN
    <div class="interface">
    <ul>
        <li> <button form="home"> <i class="fa fa-home" style="font-size: 100%; color:#EEEEEE" aria-hidden="true"></i> Home</i></button> </li>
        <li><button id = "sign_up"> <i style="color: #EEEEEE; font-size:100%;" class="fa fa-sign-in" aria-hidden="true"></i> Sign Up</button> </li>
        <li> <button><i style="color:#EEEEEE; font-size: 100%;" class="fa fa-user-circle" aria-hidden="true"></i>  Login </button> </li>
        <br>
        <li><button><i style="color:#EEEEEE; font-size:100%"; class="fa fa-comment"></i> Messages</button></li>
        <li><button><i style="color:#EEEEEE; font-size: 100%;" class="fa-solid fa-user-pen"></i> Edit Profile</button></li>
        <li><button><i style="color:#EEEEEE; font-size: 100%;" class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</button></li>            
    </ul>
</div>    
</div>

_MAIN;

}


?>