<?php
require_once "functions.php";
$error = "";
if(isset($_POST['user']) && isset($_POST['password']))
{
    if(isset($_SESSION['user']))
        destroy_session();
    
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['password']);
    $pass = password_hash($pass,PASSWORD_DEFAULT);
    $result = queryMysql("SELECT * FROM members Where user = '$user'");
    if($result->num_rows)
    {
        $error = "Username Already Exists";
        die($error);
    }
    else
    {
        $error = "";

        $result = queryMysql("Insert into members values('$user','$pass')");
        die("done");
    }

}

echo <<<_Page

<!DOCTYPE html>
<html>
    <head>
        <title>
            Multi Part Form
        </title>
        <link rel="stylesheet" href="sign_up_style.css">
        <script src="sign_up_script.js" defer></script>

        <script type="text/javascript">
        let request = new XMLHttpRequest();
        var data = new FormData();

        request.onreadystatechange = function()
        {
            if(this.readyState == 4)
            {
                if(this.status == 200)
                {
                    document.getElementById("errors").innerHTML = this.responseText;
                }
            }
        }

        function send_async(form)
        {
            request.open("POST","check_username.php",true);
            
            data.append(form.name,form.value);
            request.send(data);
            
        }
        
        </script>
    </head>
    <body>
        <form id="regForm" action="sign_up.php" method="POST" enctype="multipart/form-data" >
        <!-- one tab is for each pages of the multi-page form -->
        <h2 style="text-align: center;">Sign Up</h2>
        <div style="padding:10px"><span id="errors" style="color: red; font-size:medium;"></span></div>
        <div class="tab">
            <p><input type="text" placeholder="Firsr name...." oninput="this.className = ''"> </p>
            
            <p> <input placeholder="Last Name..." oninput="this.className=''"> </p>
        </div>
        <div class="tab">Contact Info
        <p><input name type="text" placeholder="Email"  oninput="this.className=''"></p>
        <p><input type="text" placeholder="Phone..." oninput="this.className=''"></p>
    </div>
    <div class="tab">Birthday: 
    <p><input type="text" placeholder="dd" oninput="this.className=''"> </p>
    <p><input type="text" placeholder="mm" oninput="this.className=''"></p>
    <p><input type="text" placeholder="yyyy" oninput="this.className=''"></p>
    </div>

    <div class="tab"> Login Info:
        <p> <input name="user" placeholder="Username..." onblur="send_async(this)" oninput="this.className=''"></p>
        <div style="padding:10px"><span id="errors" style="color: red; font-size:medium;">$error</span></div>
        <p><input type="password" name="password" placeholder="Password..." onblur="send_async(this)" oninput="this.className=''"></p>
    </div>

    <div style="overflow: auto;">
    <div style="float: right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
    </div>

    <!--The damn circles -->

    <div style="text-align: center; margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    </div>
</form>
    </body>
</html>
_Page;



?>
