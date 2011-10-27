<?
$expire=time()+60;
if(!$_COOKIE){
    setcookie("user","Bob",$expire);
    setcookie("time",$expire,$expire);
    echo "Cookie has been set";
} else {
    echo "Cookie already exists chump! ";
    echo $_COOKIE["user"] . " expires in ";
    echo time() - $_COOKIE["time"];
}
?>