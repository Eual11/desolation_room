<?php 

require_once "header.php";
echo "<link rel='stylesheet' href='style.css'>";

/* if($loggedin) die("not logged in) */


if(isset($_FILES['image']['name']))
{
    $saveto = "img/image.jpg";
    move_uploaded_file($_FILES['image']['tmp_name'],$saveto);
    $typeok = TRUE;

    switch($_FILES['image']['type'])
    {
        case "image/gif": $src = imagecreatefromgif($saveto); break;
        case "image/jpeg":
        case "image/pjeg": $src = imagecreatefromjpeg($saveto); break;
        case "image/png": $src = imagecreatefrompng($saveto); break;

        default:
            $typeok = false;
    }


    if($typeok)
    {
        list($w,$h) = getimagesize($saveto);

        $max = 100;

        $tw = $w;
        $th = $h;

        if ($max < $w && $w > $h)
        {
            $th = $max/$tw * $tw;
            $tw = $max;
        }

        else if ($h > $w && $max < $h)
        {
            $tw = $max/$th * $tw;
            $th = $max;
        }
        else if ($max < $w)
        {
            $tw = $th = $max;
        }

        $tmp = imagecreatetruecolor($tw,$th);
        imagecopyresampled($tmp,$src,0,0,0,0,$tw,$th,$w,$h);
        imageconvolution($tmp,array(array(-1,-1,-1),array(-1,16,-1),array(-1,-1,-1)),8,0);
        imagejpeg($tmp,$saveto);
        imagedestroy($tmp);
        imagedestroy($src);


    }


}
echo " <h3 style='color: #eeeee; text-align: center;'>Your Profile: </h3>"; 
showUser("Eual_Uchiha");

echo <<<_INFO
<div class = "info">
<form style="text-align: center;" id="info" method="post" action = "profile.php" enctype="multipart/form-data"> 
            <h3>Say somthing about yourself and/or upload a profile picture</h3>

            <textarea name="text" placeholder="BIO"></textarea>
            <input id="image_input" name="image" size="14" type="file">
            <input id='submit_profile' type = 'submit' value = 'Save'>
            </form>
            </div>  
        </body>
</html>
_INFO;

?>