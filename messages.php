<?php
require_once "functions.php";
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
}

echo <<<_HEADER
<!DOCTYPE html>
<head>
<title></title>
<link href="chat_style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<script type = "text/javascript" src="unknown.js" defer ></script>
</head>
<body>
    <div class="interface">
        <ul>
            <li> <button form="home"> <i class="fa fa-home" style="font-size: 100%; color:#EEEEEE" aria-hidden="true"></i> Home</i></button> </li>
            <li><button form = "members"> <i style="color: #EEEEEE; font-size:100%;" class="fa fa-sign-in" aria-hidden="true"></i> Members</button> </li>
            <li> <button form ='friends'><i style="color:#EEEEEE; font-size: 100%;" class="fa fa-user-circle" aria-hidden="true"></i>  Friends</button> </li>
            <br>
            <li><button form = "messages"><i style="color:#EEEEEE; font-size:100%"; class="fa fa-comment"></i> Messages</button></li>
            <li><button form ='edit'><i style="color:#EEEEEE; font-size: 100%;" class="fa-solid fa-user-pen"></i> Edit Profile</button></li>
            <li><button form ='logout' ><i style="color:#EEEEEE; font-size: 100%;" class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</button></li>            
        </ul>
        <form id = 'home' method='post' action='#'></form>
        <form id = 'logout' method='post' action='logout.php'></form>
        <form id = 'members' method='post' action='members.php'></form>
        <form id = 'friends' method='post' action='friends.php'></form>
        <form id = 'edit' method='post' action='profile.php'></form>
        <form id = "messages" action = "messages.php" method = "post"></form>
    
    </div>    
_HEADER;
$cur_user = $_SESSION['user']; #mock name i created to acess the db
$result = queryMysql("select recip from messages where auth = '$cur_user'");
$num_row = $result->num_rows;
$row1 = $result->fetch_array(MYSQLI_NUM);

$recip = "";
if(isset($_GET['recip']))
{
    $recip = sanitizeString($_GET['recip']);
}

echo <<<_ASIDE
<div id="container">
<aside>
    <header><input type="text" placeholder="search"></header>
    <ul>
    

_ASIDE;
$result = queryMysql("select DISTINCT recip from messages where auth = '$cur_user' group by recip order by time");
$num_row = $result->num_rows;
$users = array();
for($i =0; $i < $num_row; ++$i)
{
    $row = $result->fetch_array(MYSQLI_NUM);
    $users[] = $row[0];
}
$result = queryMysql("select auth from messages where recip = '$cur_user'group by auth order by time");
$num_row = $result->num_rows;
for($i =0; $i < $num_row; ++$i)
{
    $row = $result->fetch_array(MYSQLI_NUM);
    if (!in_array($row[0],$users))
    {$users[]=$row[0];}
}
$messengers = $users;
for($i =0; $i<count($messengers);++$i)
{
    echo <<<_ln
    <li id="$messengers[$i]" onclick= 'recieve("$messengers[$i]","$cur_user")'> <img width ='55' heigh='55' src="img/$messengers[$i].jpg" alt="">
    <div style="font-size:17px">$messengers[$i]<br> &nbsp;
    <span style="color:aqua; font-size:14px; ">online</span> </div>
</li>
_ln;
}

        
echo <<<_last
  </ul>
</aside>

_last;

echo <<<_MAIN

<main id="chat_beholder">
            <header> <img width ='55' heigh='55' src="img/$recip.jpg" alt="">
                <div>$recip
                    <br>
                    <span id="last_seen">Tap on users to see chat</span>   
                </div></header>
                <ul id="chat">
                
            </ul>



_MAIN;

echo <<<_FOOTER
<footer>

                    
                    
                </footer>
        </main>
    </div>
</body>

_FOOTER;



?>



        
                