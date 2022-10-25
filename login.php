<?php
require_once "functions.php";
$error = "";
if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $result = queryMysql("select * from members where user ='$user'");
    
    if($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $tmp_pass = $row['pass'];
        if(password_verify($pass,$tmp_pass))
        {
            session_start();
            $_SESSION['user']= $user;
            $_SESSION['pass'] = $pass;
            header("Location:profile.php");
            exit;
        }
        else
        {
            $error = "Password Incorrect";
        }
        
    }

    else 
    {
        $error ="Username doesn't exist, try  <a style='color:#00ADB5;font-decoration:underline;' href='sign_up.php'>signing in</a>";
    }
}


echo <<<_FORM
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="login_style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="user_logo"><i style="color:#00ADB5; font-size: 90px;" class="fa fa-user" aria-hidden="true"></i> </div>
                <div class="form_content">
                    <form action="login.php" method="post" class="login">
                        <div class="user_form"><i class="fa fa-user icon"></i>
                            <span class="username_error">&nbsp;</span>
                            <input class="username" type="text" name="user" placeholder="Username/Email">
                        
                        </div>

              <div class="pass_form">

                <input class="password" type="password" name="pass" placeholder="Password"> </div>
                <i style="color: #bebebe; position: relative; top: -50px; left: 2px;" class="fa fa-lock" aria-hidden="true"></i>
                         
              </div> 
              <div class="login_btn">
                <input class="login_shit" type="submit" name="submit" value="Login In">
              </div>
              
                    </form>
                    <div style="margin-top:10px;display:flex; justify-content:center;flex-wrap:flex;" class = "error">
                    <span style = "text-align:center;font-size:80%;font-style:italic; color:red;">$error</span>
                    </div>

                   <div class="con_spon" ><i class="sponsors">Powered By Eual Uchiha &nbsp; &nbsp;</i> </div>
                </div>
                
            </div>
          
        </div>
      
    </body>

</html>

_FORM;


?>