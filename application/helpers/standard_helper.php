<?
#$-- includes.php Version 0.0.1 - Tuesday, October 11th 8:11am --$

#This is where we will include a bunch of code for our project.
#Let's make like good programmers and comment the balls out of this code.

#This code generates all the boring beginning stuff. Make sure to pass in a $data['title'] value
function generateHeader($title){
    if(!$title) $title = "Untitled Web page";
    $result = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"' . "\n";
    $result .= '"http://www.w3.org/TR/html4/strict.dtd">' . "\n";
    $result .= "<html>\n";
    $result .= "<head>\n";
    $result .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . "\n";
    $result .= '<link type="text/css" href="css/styles.css" rel="stylesheet" /> ' . "\n";
    $result .= "<title>$title</title>\n";
    $result .= "</head>\n";
    $result .= "<body>\n";
    $result .= '<div id="container">' . "\n";

    return $result;
}

#This generates the closing stuff matching the header
function generateFooter(){
    $result = "</div>\n";
    $result .= "</body>\n";
    $result .= "</html>\n";
    return $result;
}

?>