<?
#$-- includes.php Version 0.0.1 - Tuesday, October 11th 8:11am --$
#This is where we will include a bunch of code for our project.
#Let's make like good programmers and comment the **** out of this code.

#This code generates all the boring beginning stuff. Make sure to pass in a $data['title'] value
function generateHeader($title, $baseURL){
    if(!$title) $title = "Untitled Web page";
    $result = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"' . "\n";
    $result .= '"http://www.w3.org/TR/html4/strict.dtd">' . "\n";
    $result .= "<html>\n";
    $result .= "<head>\n";
    $result .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">' . "\n";
    $result .= '<link type="text/css" href="' . site_url() . '/../css/styles.css" rel="stylesheet" > ' . "\n";
#   $result .= '<style type="text/css"><!-- ' . "\n" . getStyleSheet() . '--> </style>' . "\n";
	$result .= "<title>$title</title>\n";
    return $result;
}

function closeHeader(){
    $result = "</head>\n";
    $result .= "<body>\n";
    $result .= '<div id="container">' . "\n";
    return $result;
}

function generateNavBar(){
	$result = "<p class ='nav'>\n";
	$result .="<a class='inNav' href=".site_url().">Home</a><br>\n";
	$result .="<a class='inNav' href=".site_url()."/calendar>Calendar</a><br>\n";
	$result .="<a class='inNav' href=".site_url()."/events>My Events</a><br>\n";
	$result .="<a class='inNav' href=".site_url()."/users>Users</a><br>\n";
	$result .="<a class='inNav' href=".site_url()."/search>Search</a><br>\n";
	$result .="</p>\n";
	return $result;
}

#This generates the closing stuff matching the header
function generateFooter(){
    $result = "</div>\n";
    $result .= "</body>\n";
    $result .= "</html>\n";
    return $result;
}

#printLogin thing
function printLoginCorner(){
    #FIX THIS
}

#do some magic
function makeGoogleImage($start,$end){
    $result = '<a href="http://maps.google.com/maps?saddr='.googleifyText($start).'&daddr='.googleifyText($end).'&hl=en&t=h&z=14">' . getGoogleImageCode($start, $end) . "</a>";
    return $result;
}

#more magic
function getGoogleImageCode($start, $end){
    #$result = '<img src="http://maps.googleapis.com/maps/api/staticmap?center=' . googleifyText($addr) . '&zoom=12&size=400x400&sensor=false" height="400" width="400"/>';
	#to add more addresses just stick another %7C in between the last address and &sensor=false
	$result = '<img src="http://maps.googleapis.com/maps/api/staticmap?size=400x400&maptype=roadmap\&markers=size:mid%7Ccolor:red%7C' . googleifyText($start) . '%7C' . googleifyText($end) . '&sensor=false" height="400" width="400"/>';
    return $result;
}

#even more magic....
function googleifyText($text){
    return str_replace(" ","+",$text);
}

function randomTextGenerate(){
    $word = "";
    for($i=0; $i<10; $i++){
        #48 122
        switch(rand(1,3)){
        case 1:
            $word .= chr(rand(48,57));
            break;
        case 2:
            $word .= chr(rand(65,90));
            break;
        case 3:
            $word .= chr(rand(97,122));
            break;
        }
    }
    return $word;
}
function encodeText($text){
    $res = "";
    for($i=0; $i<strlen($text);$i++){
        $res .= dechex(ord($text[$i]));
    }
    return $res;
}
function decodeText($text){
    $res = "";
    for($j=0; $j<strlen($text);$j+=2){
        $res .= chr(hexdec($text[$j] . $text[$j+1]));
    }
    return $res;
}

function makeLinkToEvent($id,$title){
    return '<a class="inText" href="' . site_url() . '/events/showEvent/' . $id . '">' . $title . '</a>';
}
?>
