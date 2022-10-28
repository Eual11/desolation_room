<?php 
require_once "header.php";
echo "<link rel='stylesheet' href='style.css'>";
if (!$loggedin)
{
    header("Location:login.php");
} 



if (isset($_GET['remove']))
{
    $new_stranger = sanitizeString($_GET['remove']);
    queryMysql("delete from friends where user = '$user' and friend = '$new_stranger'");
}


$result = queryMysql("select * from friends where user = '$user' group by friend");
$num_rows = $result->num_rows;
echo "<h3 style='color:#fff; text-align:center;font-size:14px;'>Your Friend's :</h3>";


for ($i =0; $i <$num_rows; ++$i )
{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $member = $row['friend'];
    $res = queryMysql("select * from friends where user ='$user' and friend = '$member'");
    if($res->num_rows)
    {
        $icon = <<<_I
        <a class='mem_request' style='text-align:right;'href='friends.php?remove=$member'><i class="fa fa-user-minus" aria-hidden="true"></i></a>"
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
        continue;
    }
    echo <<<_MEM
    <div class="members">
           <img width='50' height='50' class="mempfp" src="img/$member.jpg">
           <div class="mem_interface"><span>$member</span>$icon
           <a class='mem_request' style='text-align:right;'href='messages.php?recip=$member'><i class="fa-brands fa-facebook-messenger"></i></a>
         
           </div>
   
       </div>
   
    _MEM;

}



?>