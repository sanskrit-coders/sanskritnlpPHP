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

// User should not have to edit this file
include_once(dirname(__FILE__) . "/config.php5");
include_once(dirname(__FILE__) . "/classwebpage.php5");
include_once (dirname(__FILE__) . "/htmlparser.inc");
include_once(dirname(__FILE__) . "/Encoder/utf-functions.php5");

//error_reporting(2047);
// Constants
$STATIC = 1;
$DYNAMIC = 2;

$transliteration_flag = true;

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

$lang = $_GET['transliterate_to_button'];
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
//echo "URL is" . $_GET[$fileVar];

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

//    if (substr($relDir, -1) == "/") {
//        $relDir = substr($relDir, 0, -1);
//    }

//echo "website_name " . $website_name;
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
        $page = new WebPage($redirectIP . "/" . $webpage,true,$server,"transliterate.php5",$fileVar,$relDir);

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

//if ($isHTML) {
//    header('Content-Type: text/html; charset=UTF-8');
//}

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
if($isHTML)
{
    $page->processPageData();
    transliterate($page->getPageData(), $lang);

}else {
    $page->getRawPageData();
}
?>
<?php
function transliterate($htmlText, $lang)
{
    $parser = new HtmlParser ($htmlText);

    while ($parser->parse())
    {
        $iNodeName = strtolower($parser->iNodeName);
        $outstr = "";

        if ($iNodeName == "text") {
            $outstr = writeMessage($parser->iNodeValue, $lang);
        //echo $outstr;
        }
        if ($parser->iNodeType == 1)  //start tag
        {
            $outstr .= "<" . $parser->iNodeName .
                      makeStr($parser->iNodeAttributes) . ">";
        }
        else if ($parser->iNodeType == 2) //end tag
        {
            $outstr = "</" . $parser->iNodeName . ">";
        }
        else if ($outstr == "") {
            $outstr = $parser->iNodeValue;
        }
        echo $outstr;
    }
}

function writeMessage($input,$button)
{
if (!empty($button))
{

if (get_magic_quotes_gpc()) {
    $input = stripslashes($input);
} 

$input = stringToUtf8($input);

define("DEVANAGARI_SIGN_CANDRABINDU", "0x0901");
define("DEVANAGARI_DIGIT_NINE","0x096F");
define("DEVANAGARI_ABBREVIATION_SIGN","0x0970");
define("DEVANAGARI_LETTER_GLOTTAL_STOP","0x097D");
$DEVANAGARI_START   = DEVANAGARI_SIGN_CANDRABINDU;
$DEVANAGARI_END     = DEVANAGARI_DIGIT_NINE;

define("GUJARATI_SIGN_CANDRABINDU", "0x0A81");
define("GUJARATI_RUPEE_SIGN", "0x0AF1");
$GUJARATI_START     = GUJARATI_SIGN_CANDRABINDU;
$GUJARATI_END       = GUJARATI_RUPEE_SIGN;
$SHIFT_FOR_GUJARATI = $GUJARATI_START - $DEVANAGARI_START;

define("TELUGU_SIGN_CANDRABINDU","0x0C01");
define("TELUGU_DIGIT_NINE", "0x0C6F");
$TELUGU_START     = TELUGU_SIGN_CANDRABINDU;
$TELUGU_END       = TELUGU_DIGIT_NINE;
$SHIFT_FOR_TELUGU = $TELUGU_START - $DEVANAGARI_START;

define("KANNADA_SIGN_ANUSVARA","0x0C82");
define("KANNADA_DIGIT_NINE", "0x0CEF");
$KANNADA_START    = KANNADA_SIGN_ANUSVARA - 1;
$KANNADA_END      = KANNADA_DIGIT_NINE;
$SHIFT_FOR_KANNADA= $KANNADA_START - $DEVANAGARI_START;

define("BENGALI_SIGN_CANDRABINDU", "0x0981");
define("BENGALI_ISSHAR", "0x09FA");
$BENGALI_START          = BENGALI_SIGN_CANDRABINDU;
$BENGALI_END            = BENGALI_ISSHAR;
$SHIFT_FOR_BENGALI      = $BENGALI_START - $DEVANAGARI_START;

define("TAMIL_SIGN_ANUSVARA", "0x0B82");
define("TAMIL_NUMBER_SIGN", "0x0BFA");
$TAMIL_START    = TAMIL_SIGN_ANUSVARA - 1;
$TAMIL_END      = TAMIL_NUMBER_SIGN;
$SHIFT_FOR_TAMIL= $TAMIL_START - $DEVANAGARI_START;

define("GURMUKHI_SIGN_ADAK_BINDI","0x0A01");
define("GURMUKHI_EK_ONKAR","0x0A74");
$GURMUKHI_START     = GURMUKHI_SIGN_ADAK_BINDI;
$GURMUKHI_END       = GURMUKHI_EK_ONKAR;
$SHIFT_FOR_GURMUKHI = $GURMUKHI_START - $DEVANAGARI_START;


define("MALAYALAM_SIGN_ANUSVARA","0x0D02");
define("MALAYALAM_DIGIT_NINE", "0x0D6F");
$MALAYALAM_START        = MALAYALAM_SIGN_ANUSVARA - 1;
$MALAYALAM_END          = MALAYALAM_DIGIT_NINE;
$SHIFT_FOR_MALAYALAM    = $MALAYALAM_START - $DEVANAGARI_START;

define("ORIYA_SIGN_CANDRABINDU","0x0B01");
define("ORIYA_LETTER_WA", "0x0B71");
$ORIYA_START    = ORIYA_SIGN_CANDRABINDU;
$ORIYA_END      = ORIYA_LETTER_WA;
$SHIFT_FOR_ORIYA= $ORIYA_START - $DEVANAGARI_START;

switch($button)
{
case "अ": $TGTLANGSTART = $DEVANAGARI_START;break;
case "অ":$TGTLANGSTART =$BENGALI_START;break;
case "அ":$TGTLANGSTART =$TAMIL_START;break;
case "అ":$TGTLANGSTART =$TELUGU_START;break;
case "ਅ":$TGTLANGSTART =$GURMUKHI_START;break;
case "ಅ":   $TGTLANGSTART = $KANNADA_START;break;
case "અ":$TGTLANGSTART =$GUJARATI_START;break;
case "അ":$TGTLANGSTART =$MALAYALAM_START;break;
default:break;
}

$len=strlen(utf8_decode($input));
for($i = 0; $i < $len; ++$i)
{
$sub=utf8_substr($input,$i,1);
if(uniord($sub) >= $GUJARATI_START && uniord($sub) <= $GUJARATI_END)
{
$output .= utf8_from_unicode(uniord($sub) -  $GUJARATI_START + $TGTLANGSTART);
}
else
{
if(uniord($sub) >= $BENGALI_START && uniord($sub) <= $BENGALI_END)
{
$output .= utf8_from_unicode(uniord($sub) - $BENGALI_START +  $TGTLANGSTART);
}
else
{
if(uniord($sub) >= $TAMIL_START && uniord($sub) <= $TAMIL_END)
{
$output .= utf8_from_unicode(uniord($sub) - $TAMIL_START +  $TGTLANGSTART);
}
else
{
if(uniord($sub) >= $GURMUKHI_START && uniord($sub) <= $GURMUKHI_END)
{
$output .= utf8_from_unicode(uniord($sub) - $GURMUKHI_START +  $TGTLANGSTART);
}
else
{
if(uniord($sub) >= $TELUGU_START && uniord($sub) <= $TELUGU_END)
{
$output .= utf8_from_unicode(uniord($sub) - $TELUGU_START +  $TGTLANGSTART);
}
else
{
if(uniord($sub) >= $KANNADA_START && uniord($sub) <= $KANNADA_END)
{
$output .= utf8_from_unicode(uniord($sub) - $KANNADA_START +  $TGTLANGSTART);
}
else
{
if(uniord($sub) >= $MALAYALAM_START && uniord($sub) <= $MALAYALAM_END)
{
$output .= utf8_from_unicode(uniord($sub) - $MALAYALAM_START+  $TGTLANGSTART);
}
else
{
if(uniord($sub) >= $ORIYA_START && uniord($sub) <= $ORIYA_END)
{
$output .= utf8_from_unicode(uniord($sub) - $ORIYA_START + $TGTLANGSTART);
}
else
{		
if(uniord($sub) >= $DEVANAGARI_START && uniord($sub) <= $DEVANAGARI_END)
{
$output .= utf8_from_unicode(uniord($sub) - $DEVANAGARI_START+  $TGTLANGSTART);
}
else
{
$output .= $sub;
}
}
}
}
}
}
}
}
}
}
}
return $output;
}


function makeStr($attributes)
{
    if (empty($attributes)) {
        return "";
    }

    $str = "";
    foreach ($attributes as $key => $val) {
        $str .= " " . $key . "=\"" . $val . "\"";
    }
    return $str;
}
?>
