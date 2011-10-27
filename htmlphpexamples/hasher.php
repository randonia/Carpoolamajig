<?
$output = '<html><body>' ;
$output .= '<form name="formy" action="hasher.php" method="post">';
$output .= '<input type="text" name="seed"><br>';
$output .= '<input type="submit" value="Seed!"><br>';
$output .= '</form>';
echo $output . "<br>\n\n<br>";

if($_POST){
    echo 'sha1 hash of "' . $_POST['seed'] . '": ' . hash('sha1',$_POST['seed']);
} else {
}
?>