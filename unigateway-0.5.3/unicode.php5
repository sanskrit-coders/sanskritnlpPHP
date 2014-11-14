<?php
/*
This program is free software; you can redistribute it and/or modify
under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/************************************************\
* URL proxy v1.3 Pre-Alpha                       *
* a co-authored script                           *
*  by Scott Atkins <atkinssc@engr.orst.edu>      *
*     Bob Matcuk <bmatcuk@users.sourceforge.net> *
* Copyright (C) 2002 All rights reserved         *
*  Released under the GPL, see the README        *
*                                                *
\************************************************/

// User should not have to edit this file
include_once (dirname(__FILE__) . "/config.php5");
include_once (dirname(__FILE__) . "/functions.php5");
include_once (dirname(__FILE__) . "/classwebpage.php5");
include_once (dirname(__FILE__) . "/htmlparser.inc");
include_once (dirname(__FILE__) . "/Encoder/transformer.php5");

//error_reporting(2047);
// Constants
$STATIC = 1;
$DYNAMIC = 2;

// Mode of the script
$proxyMode = ((isset($server) AND isset($redirectIP)) ? $STATIC : $DYNAMIC);

// Version Number
$phase = "pre-alpha";
$version = "1.3 " . $phase;

/*Flags******************************************\
* $isHTML;  true if mimetype is html             *
* $isImage; true if mimetype is an image         *
* $isAuth;  true if the page is protected by     *
*           .htaccess                            *
* $isForm;  true if the page contains a form     *
\************************************************/
$isHTML  = false;
$isImage = false;
$isCSS = false;
$isJavascript = false;
$isAuth  = false;
$isForm  = false;
$isError = false;

$content_type = "";
$character_encoding= "";
$file = "downloadfile";

/*get_content_type*******************************\
* Function for finding the mime type of the file *
* Sets the content type and character encoding   *
\************************************************/
function get_content_type($headers){
    global $content_type, $charater_encoding;

    foreach($headers as $header){
        if(eregi("^Content-Type: (.*)$",$header,$content_type_full))
        break;
    }

    if (isset($content_type_full))
    {
        $content_type_parts = explode(";", $content_type_full[1]);
        $content_type = $content_type_parts[0];
        $token = "[A-Za-z0-9#$%&'*+-.^_`{|}~]";
        foreach ($content_type_parts as $part)
        {
            eregi ("^ *($token*)=\"?($token*)\"?", $part, $attribute);
            if(strcasecmp ($attribute[1], "charset") == 0)
            $character_encoding = $attribute[2];
        }
    }
    else {
        $content_type = "text/html"; //crude method
    }
}

/*processHeaders*********************************\
* Function for handling the headers that apache  *
* sends out.                                     *
* Returns an array with the headers that should  *
* be sent out                                    *
\************************************************/
function processHeaders($headers, $fileName, $mime_dl)
{
    global $content_type, $isHTML, $isImage, $isCSS, $isJavascript;
    global $dont_download_mimes, $download_files_by_default;

    array_shift($headers);
    get_content_type($headers);

    if(eregi("image",$content_type))
        $isImage = true;
    elseif(eregi("text/html",$content_type))
        $isHTML  = true;
    elseif(eregi("text/css",$content_type))
        $isCSS  = true;
    elseif(eregi("application/x-javascript", $content_type))
        $isJavascript  = true;

    /* Send this file as a download, or serve it normally? */
    $download = $download_files_by_default;
    if(array_key_exists($content_type, $dont_download_mimes))
        $download = $dont_download_mimes [$content_type];
    if($download)
        $headers[] = "Content-Disposition: attachment;" . 
                " filename=$fileName";
    return $headers;
}

/************************************************\
* This block of code gets the directory we are   *
* currently in, for rel links.                   *
\************************************************/
//print_r($_GET);
//echo "URL " . $_GET[$fileVar];

$url = $_GET[$fileVar];
$iteration = 0;

do
{
    $iteration++;

    if ($iteration == 2) {
        $url = $page->getURL();
//echo "url changed " . $url;
    }
    
    if(eregi("^http://",$url)){
        $relDir = eregi_replace("^http://[^/]*", "", $url);
        eregi("^http://([^/]*)", $url, $out);
        $redirectIP = $out[0];
        $website_name =  $out[1];
        if (substr($redirectIP, -1) == "/") {
            $redirectIP = substr($redirectIP, 0, -1);
        }
    }else{
        $relDir = $url;
        if (!isset($redirectIP) || empty($redirectIP)) {
            exit("Please give full URL (or define a default IP to redirect to)");
        }
        eregi("^http://([^/]*)", $redirectIP, $out);
        $website_name =  $out[1];
    }

    //here after $website_name will contain the domain name of the
    //supported website or ''(empty, if the website is not supported)
    $website_name = getDomain($website_name);
     
/*    if (!$website_name) {
        exit("<body bgcolor='#f6f6ff'><br><br><br><center><b>Sorry, the url you have " .
	"mentioned is not supported by Unigateway</b>" .
        "<br>Click <a href='index.php5'>here</a> to check the supported websites.</center></body>");
    }*/
 
//echo "website_name " . $website_name;

//    if (substr($relDir, -1) == "/") {
//        $relDir = substr($relDir, 0, -1);
//    }

    $webpage = $relDir;

    if ($relDir != "" && $relDir != "/" && substr($relDir, 0, 1) == "/") {
        $webpage = substr($webpage, 1);
        $relDir = substr($relDir, 1);
        $relDir = reset(explode("?", $relDir));
        $relDir = eregi_replace("/[^/]*$","/",$relDir);
    }

    if ($relDir != "" && strpos($relDir, "/", 1) === false) {
        $relDir = "";
    }

//echo "reldir $relDir, webpage $webpage";

    if ($iteration == 2) {
        $page->setRelDir($relDir);
    }
    else 
    {
        /************************************************\
        * We create a new object of type WebPage and     *
        * pass it the url we are being a proxy for and   *
        * other information about the current state.     *
        \************************************************/
        $page = new WebPage($redirectIP . "/" . $webpage,true,$server,"unicode.php5",$fileVar,$relDir);

        /************************************************\
        * This tells the WebPage object to open up a     *
        * connection to the URL.                         *
        *                                                *
        * Note:                                          *
        * This does not actually get the web page, just  *
        * opens the connection for the headers.          *
        \************************************************/
         $page->openLink();
    }

//echo "error #" . $page->errorStatus() . "#";
    if ($page->errorStatus()) {
        echo "<br>Error accessing page.";
        exit;
    }

}while ($iteration < 2 && $page->isUrlChanged());

/************************************************\
* Process the headers so we know what kind of    *
* data we have (html/other)                      *
\************************************************/
$head = processHeaders($page->getHeaders(),$file,$mime_dl);

/************************************************\
* This code replicates the headers that were     *
* sent when the class connected to the url.      *
*                                                *
* FIXME: extra headers need to be sent if we are *
* downloading the file.                          *
*                                                *
* GOTCHA?: need to check if http 1.1 will work   *
* correctly                                      *
\************************************************/
//print_r($head);
foreach($head as $h) {
    if (!eregi("Content-Length", $h)
//        && !eregi("Connection", $h)
    ) {
        header($h);
//echo "$h\n";
    }
}

if ($isHTML) {
    header('Content-Type: text/html; charset=UTF-8');
}

//print_r($supported_fonts);
//$page->getRawPageData();exit;

/************************************************\
* This block of code displays the page to the    *
* user.                                          *
*                                                *
* Note: Both processPageData and getRawPageData  *
* close the connection to the URL when they      *
* return.  You must re-open a connection with    *
* openLink to use them again.                    *
\************************************************/
if($isHTML || $isCSS)
{
    $page->processPageData();

    if ($isCSS)
    {
        $str = $page->getPageData();
        $str = eregi_replace("text-align[ ]*:[ ]*justify[ ]*[;]*", "", $str);
        echo $str;
    }
    else {
//echo $page->getPageData();
        echo encodeFont($page->getPageData());
    }

}else {
    $page->getRawPageData();
}
?>
