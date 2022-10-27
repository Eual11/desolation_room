<?php
require_once "functions.php";

echo <<<_HEADER
<!DOCTYPE html>
<head>
<title>chat layout</title>
<link href="chat_style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

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


echo <<<_ASIDE
<div id="container">
<aside>
    <header><input type="text" placeholder="search"></header>
    <ul>
        <li> <img src="img/default3.jpg" alt="">
            <div>Unknown Man </div>
        </li>
        <li> <img src="img/default3.jpg" alt="">
            <div>Unknown Man </div>
        </li>
        <li> <img src="img/default3.jpg" alt="">
            <div>Unknown Man </div>
        </li>
        <li> <img src="img/default3.jpg" alt="">
            <div>Unknown Man </div>
        </li>
        <li> <img src="img/default3.jpg" alt="">
            <div>Unknown Man </div>
        </li>
        <li> <img src="img/default3.jpg" alt="">
            <div>Unknown Man </div>
        </li>
        
    </ul>
</aside>
_ASIDE;


echo <<<_MAIN

<main>
            <header> <img src="img/default3.jpg" alt="">
                <div>Unkown Man
                    <br>
                    <span id="last_seen">Last Seen Recently</span>   
                </div></header>
                <ul id="chat">
                    <li class="you" ><div class="message">Hello there, this shit isn't bad at all lmao </div></li>
                    <li class="you" ><div class="message">lacks some features of basic chat interface but it's enough</div></li>
                    <li class="you" ><div class="message">now you have to implement image and multimedia sharing</div></li>
                    <li class="you" ><div class="message">alongside, last seen,delivery date, delete,edit message features</div></li>
                    <li class="me"><div class="message">I know i have to do this all but i am too tired</div></li>
                    <li class="you" ><div class="message">You need to sleep</div></li>
                    
                </ul>



_MAIN;

echo <<<_FOOTER
<footer>

                    <textarea placeholder="Type your message"></textarea>
                    <a href="#"><span class="material-symbols-rounded">
                        send
                        </span></a>
                    
                </footer>
        </main>
    </div>
</body>

_FOOTER;



?>



        
                