<?php
$dbhost = "localhost";
$dbuser = "eual";
$dbpass = "eual1111";
$dbname="desolation_room";

$connection = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if($connection->connect_error) die("fatal error");

function createTable($tablename)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $tablename");
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
    global $connection;
    if(file_exists("$user.jpg"))
    {
        echo "<img src='$user.jpg' style 'float:left;'>";
    }
    $result = $connection->query("SELECT * FROM profiles WHERE user ='$user'");

    if($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
         echo stripslashes($row['text'])."<br>";
    }
    else 
    {
        echo "<p>Nothing to show here</p>";
    }
}

?>