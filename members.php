<?php 
require_once "header.php";
echo "<link rel='stylesheet' href='style.css'>";
if (!$loggedin)
{
    header("Location:login.php");
} 

/*$img_location = "img/default.jpg";
$image = imagecreatefromjpeg("img/default.jpg");
list($w,$h) = getimagesize($img_location);
$new_image = imagecreatetruecolor($w,$h);
//imagecopyresampled($new_image,$image,0,0,0,0,100,100,$w,$h);
imagejpeg($new_image,"img/default2.jpg");*/
$result = queryMysql("select * from members order by user");
$num_rows = $result->num_rows;
if(isset($_GET['add']))
{
    $new_friend = sanitizestring($_GET['add']);
    queryMysql("insert into friends (user,friend) values('$user','$new_friend')");
}
else if (isset($_GET['remove']))
{
    $new_stranger = sanitizeString($_GET['remove']);
    queryMysql("delete from friends where user = '$user' and friend = '$new_stranger'");
}




echo "<h3 style='color:#fff; text-align:center;font-size:14px;'>Your Friend's :</h3>";


for ($i =0; $i <$num_rows; ++$i )
{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $member = $row['user'];
    $res = queryMysql("select * from friends where user ='$user' and friend = '$member'");
    if($res->num_rows)
    {
        $icon = <<<_I
        <a class='mem_request' style='text-align:right;'href='members.php?remove=$member'><i class="fa fa-user-minus" aria-hidden="true"></i></a>"
_I;         
    }
    else 
    {
        $icon = <<<_I
        <a class='mem_request' style='text-align:right;'href='members.php?add=$member'><i class="fa fa-user-plus" aria-hidden="true"></i></a>"
_I;   
    }
    if($member == $user)
    {
        $icon = <<<_I
        <a class='mem_request' style='text-align:right;'href='profile.php'><i class="fa-solid fa-user-pen"></i></a>"
_I;   
    }
    echo <<<_MEM
    <div class="members">
           <img width='50' height='50' class="mempfp" src="img/$member.jpg">
           <div class="mem_interface"><span>$member</span>$icon
           <a class='mem_request' style='text-align:right;'href='#'><i class="fa-brands fa-facebook-messenger"></i></a>
         
           </div>
   
       </div>
   
    _MEM;

}



?>