<?php 
require_once "header.php";
echo "<link rel='stylesheet' href='style.css'>";
if (!$loggedin)
{
    header("Location:login.php");
} 

$img_location = "img/default.jpg";
$image = imagecreatefromjpeg("img/default.jpg");
list($w,$h) = getimagesize($img_location);
$new_image = imagecreatetruecolor($w,$h);
//imagecopyresampled($new_image,$image,0,0,0,0,100,100,$w,$h);
imagejpeg($new_image,"img/default2.jpg");
echo "<h3 style='color:#fff; text-align:center;font-size:14px;'>People YOU May Know :</h3>";
 echo <<<_MEM
 <div class="members">
        <img width='50' height='50' class="mempfp" src="img/default.jpg">
        <div class="mem_interface"><span> Eual Girma</span></div>

    </div>

 _MEM;
 echo <<<_MEM
 <div class="members">
        <img width='50' height='50' class="mempfp" src="img/default.jpg">
        <div class="mem_interface"><span> Eual Girma</span></div>

    </div>

 _MEM;
 echo <<<_MEM
 <div class="members">
        <img width='50' height='50' class="mempfp" src="img/default.jpg">
        <div class="mem_interface"><span> Eual Girma</span></div>

    </div>

 _MEM;


?>