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
#    $result .= '<link type="text/css" href="css/styles.css" rel="stylesheet" /> ' . "\n";
    $result .= '<style type="text/css"><!-- ' . "\n" . getStyleSheet() . '--> </style>' . "\n";
    $result .= "<title>$title</title>\n";
    return $result;
}

function closeHeader(){
    $result = "</head>\n";
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

#This is our stylesheet!
function getStyleSheet(){
    $sheet = "::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }
body {
    background-color: #fff;
    margin: 40px;
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
}
a {
    color: #003399;
    background-color: transparent;
    font-weight: normal;
}
h1 {
    color: #444;
    background-color: transparent;
    border-bottom: 1px solid #D0D0D0;
    font-size: 19px;
    font-weight: normal;
    margin: 0 0 14px 0;
    padding: 14px 15px 10px 15px;
}
code {
    font-family: Consolas, Monaco, Courier New, Courier, monospace;
    font-size: 12px;
    background-color: #f9f9f9;
    border: 1px solid #D0D0D0;
    color: #002166;
    display: block;
    margin: 14px 0 14px 0;
    padding: 12px 10px 12px 10px;
}
#body{
    margin: 0 15px 0 15px;
}
p.footer{
    text-align: right;
    font-size: 11px;
    border-top: 1px solid #D0D0D0;
    line-height: 32px;
    padding: 0 10px 0 10px;
    margin: 20px 0 0 0;
}
#container{
    margin: 10px;
    border: 1px solid #D0D0D0;
    -webkit-box-shadow: 0 0 8px #D0D0D0;
}";
    return $sheet;
}

?>