<?php

require_once "header.php";
echo <<< _script
<script>
let msg = document.getElementsByClassName("home");
function save(form)
{
    alert("Good Bye!")
    msg[0].style.display = "none";
}
</script>
_script;
if(!isset($_SESSION['home']))
{
echo <<<_HOME
<style> 
.home 
{
        display: grid;
        grid-template-columns: 1.5fr 2fr 1fr;
        height: 100%;
        
    
}
.msgg
{
    display:flex;
    justify-content: center;
    align-items:center;
    font-family: Raleway;
    font-size:16px;
    color:#eee;
    border-radius:4px;
    box-shadow: 1px 1px 4px #000;
    width:450px;
    padding:20px;
    line-height: 19px;
    
    

}
i:hover
{
    color:#00ADB5 ;
    cursor: pointer;
}
#down:hover
{
    color:#b50000;
}
</style>
<div class="home" ><span></span>
<diV class="msgg"><p>I am really delighted to announce that you are one of the chosen few perhaps the first of my subordinates to experience this hassle of unfinished project and bug field of a website, hopefully you take it as a statement of intimacy between us dear $user, enjoy your stay. One more thing before our departure, this home page is counter intuitively is meant for updates, bugs fixes and a platform to announce my wacky inventions. Good Bye!
<br><br><span><i onclick ="save(this)" class="fa fa-thumbs-up" aria-hidden="true"></i> &nbsp <i id="down" onclick ="save(this)" class="fa fa-thumbs-down" aria-hidden="true"></i></span>
</p>
</diV>
</div>
_HOME;
$_SESSION['home']=1;
}

?>