<?php
require_once "functions.php";
$user = "";
$recip = "";
if(isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $recip = sanitizeString($_POST['recip']);
    
}

echo <<<_data
<header> <img width ='60' heigh='60' src="img/$recip.jpg" alt="">
<div>$recip
    <br>
    <span id="last_seen">Last Seen Recently</span>    
</div></header>
<ul id="chat">
_data;
$result = queryMysql("select * from messages where auth = '$user' and recip = '$recip' or recip = '$user' and auth = '$recip' ");
for ($i = 0; $i <$result->num_rows; ++$i)
{
    
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if($user == $row['auth'])
    {
        $id = "me";
    }
    else 
    {
        $id = "you";
    }
    $message = $row['message'];
    echo <<<_MSG
    <li class='$id' ><div class="message">$message</div></div></li>

_MSG;
}

echo <<<_final
</ul>
            <footer>

                    <textarea placeholder="Type your message"></textarea>
                    <a onclick='send("$recip")' href="#"><span class="material-symbols-rounded">
                    send
                    </span></a>
                    
                </footer>
        </main>
    </div>
</body>
_final;
?>