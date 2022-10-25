<?php
$dbhost = "localhost";
$dbuser = "eual";
$dbpass = "eual1111";
$dbname="desolation_room";

$connection = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if($connection->connect_error) die("fatal error");

function createTable($tablename,$query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $tablename($query)");
    echo "Created Table $tablename or it already exists <br>";
}

function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if(!$result) die("Fatal Error");

    return $result;
}

function destroy_session()
{
    $_SESSION = array();
    if(session_id() != "" || isset($_COOKIE[session_name()]))
    {
        setcookie(session_name(),"",time()-2592000,'/');
    }
    session_destroy();
}

function sanitizeString($string)
{
    global $connection;

    $string = strip_tags($string);
    $string = htmlentities($string);
    return $connection->real_escape_string($string);
}
function showUser($user)
{
    echo "<div class= 'profile'>";
    echo"<span> </span>";
    global $connection;
    if(file_exists("img/$user.jpg"))
    { 
        echo "<img id = 'pfp' src='img/$user.jpg' style= 'float:left;'>";
    }
    else 
    {
        echo "<img id = 'pfp' src='img/default.jpg' style= 'float:left;'>";   
    }
    $result = $connection->query("SELECT * FROM profiles WHERE user ='$user'");

    if($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $text = $row['text'];
        $text = substr($text,0,110);
        echo "<p style= 'color: #eee;'>$text</p>";
   
    }
    else 
    {
        echo "<p style= 'color: #eee;'>A chasm appears upon the face of my watch. My past decapitated. I search blindly for what I will not find.</p>";
    }
    echo "</div>";
}

?>