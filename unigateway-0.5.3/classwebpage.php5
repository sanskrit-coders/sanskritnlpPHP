<?
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

/* global variables that will be used in a utility function called encode*/
$start2 = "";
$start = "";
$delim = "";
$name = "";
$script = "";
$var = "";
$baseDir = "";
$relDir = "";
$server_name = "";

$isChunkedTE = false;
//$isChunkedTE will be set true when the header contains 'Transfer-Encoding: chunked'

/*Class WebPage**********************************\
* Come along with me into the world of ooPHP.    *
*                                                *
*  WebPage is the main class in this script.  It *
* controls getting pages as well as headers and  *
* processing those pages.                        *
\************************************************/

class WebPage {

/*Var Descriptions*******************************\
* $URL The url we are proxying for               *
* $pageData The raw data from the file           *
* $headers Array containing the headers sent     *
* $static Boolean if we are working on only rel  *
*         links                                  *
* $currentServer String with the script's server *
* $scriptName Name of the main script            *
* $varName Name of the var for passed in file    *
* $updatedPageData The processed page data       *
* $relDir The directory we're in for rel links   *
* $fp The file pointer for reading the file      *
\************************************************/
    var $URL;
    var $pageData;
    var $headers;
    var $static;
    var $currentServer;
    var $scriptName;
    var $varName;
    var $updatedPageData;
    var $relDir;
    var $fp;
    var $error;
    var $redirect;
    var $urlchanged;
    
/*Class Constructor******************************\
* The main constructor, pass in varible are      *
* listed below.                                  *
*                                                *
* $URL The url we are proxying for               *
* $static Boolean if we are working on only rel  *
*         links                                  *
* $currentServer String with the script's server *
* $scriptName Name of the main script            *
* $varName Name of the var for passed in file    *
* $relDir The directory we're in for rel links   *
\************************************************/
    
    function WebPage($URL, $static, $currentServer, $scriptName, $varName, $relDir)
    {
//echo $URL . "::";
//        $this->URL = html_entity_decode($URL);  //convert & to & then only fopen works fine
        $this->URL = $URL;
//echo $this->URL;
        $this->currentServer = $currentServer;
        $this->static = $static;
        $this->relDir = $relDir;
        $this->pageData = "";
        $this->varName = $varName;
        $this->scriptName = $scriptName;
        $this->urlchanged = false;
    }

/*openLink***************************************\
* Function for connecting to the URL and getting *
* the headers.                                   *
*                                                *
* Note: The connection is closed by              *
* getRawPageData or processPage, whichever comes *
* first.                                         *
\************************************************/
    function openLink(){
        do {
            $this->redirect = false;
            if (!empty($_POST)) {
                $this->HttpPOSTRequest($this->URL, $_POST);
            }
            else {
                $this->HttpGETRequest($this->URL);
            }
        }while ($this->redirect);
    }

    function getURL() {
        return $this->URL;
    }

    function setRelDir($relDir) {
        $this->relDir = $relDir;
    }

    function HttpPOSTRequest($url, $datastream)
    {
        global $isChunkedTE;
        
//echo "POSTREQUEST";
        $url = preg_replace("@^http://@i", "", $url);
        $host = substr($url, 0, strpos($url, "/"));
        $uri = strstr($url, "/");

/******* code to encode special characters if any in the url after ? character *****/

        $uri_arr = explode("?", $uri, 2);
        $uri = $uri_arr[0];

        if ($uri_arr[1])
        {
            $arg_arr = explode("&", $uri_arr[1]);
            foreach ($arg_arr as $key => $arg) {
                $arg_det_arr = explode("=", $arg, 2);
                $arg_det_arr[1] = rawurldecode($arg_det_arr[1]);
                $arg_arr[$key] = $arg_det_arr[0] . "=" . rawurlencode($arg_det_arr[1]);
            }
            $uri .= "?" . implode("&", $arg_arr);
        }

/*************************************** end ******************************************/

        $reqbody = $this->create_reqbody($datastream);
//print_r($_POST);
//echo $reqbody;
        $contentlength = strlen($reqbody);
        $reqheader =  "POST $uri HTTP/1.1\r\n".
                      "Host: $host\n". "User-Agent: PostIt\r\n".
                      "Content-Type: application/x-www-form-urlencoded\r\n".
                      "Content-Length: $contentlength\r\n\r\n".
                      "$reqbody\r\n";

        $socket = @fsockopen($host, 80, $errno, $errstr);

        if (!$socket) {
            $result["errno"] = $errno;
            $result["errstr"] = $errstr;
            print_r($result);
            $this->error = true;
            return;
        }

        fputs($socket, $reqheader);

//echo $reqheader;

        $isChunkLine = false;
        
        while (!feof($socket)) {
            $line = trim(fgets($socket, 4096));
            
            $isChunkedTE = 
                (eregi("^Transfer-Encoding(.*)", $line, $te) && eregi("chunked", $te[1])) ? true : $isChunkedTE;

            if ($line == "" || $isChunkLine) {
                if ($isChunkedTE && !$isChunkLine) { //For chunked transfer encoding, remove one line
                    $isChunkLine = true;             //from body (the size)
                }
                else {
                    break;
                }
            }
            else {
                if (eregi("^location:", $line)) {
                    $this->redirect = true;
                    $this->URL = trim(preg_replace("/location:/i","",$line));
                    if (eregi("^/", $this->URL)) {
                        $this->URL = "http://" . $host . $this->URL;
                    }
                    $this->urlchanged = true;
                    $_POST = Array();
                    return;
                }
                $result[] = $line;
            }
        }
//print_r($result);
        array_shift($result);
//print_r($result);

        $this->headers = $result;
        $this->fp = $socket;
    }
    
    function HttpGETRequest($url)
    {
//echo "\nurl $url";
        $url = preg_replace("@^http://@i", "", $url);
        $host = substr($url, 0, strpos($url, "/"));
        $uri = strstr($url, "/");

/******* code to encode special characters if any in the url after ? character *****/

        $uri_arr = explode("?", $uri, 2);
        $uri = $uri_arr[0];

        if ($uri_arr[1])
        {
            $arg_arr = explode("&", $uri_arr[1]);
            foreach ($arg_arr as $key => $arg) {
                $arg_det_arr = explode("=", $arg, 2);
                $arg_det_arr[1] = rawurldecode($arg_det_arr[1]);
                $arg_arr[$key] = $arg_det_arr[0] . "=" . rawurlencode($arg_det_arr[1]);
            }
            $uri .= "?" . implode("&", $arg_arr);
        }

/*************************************** end ******************************************/

        $crlf = "\r\n";

       // generate request
       $reqheader = 'GET ' . $uri . ' HTTP/1.0' . $crlf
           .    'Host: ' . $host . $crlf
           .    'User-Agent: mozilla' .$crlf
           .    $crlf;

//echo "\nheader $reqheader";
       // fetch
       $socket = @fsockopen($host, 80, $errno, $errstr);

        if (!$socket) {
            $result["errno"] = $errno;
            $result["errstr"] = $errstr;
            print_r($result);
            $this->error = true;
            return;
        }

        fputs($socket, $reqheader);

        while (!feof($socket)) {
            $line = trim(fgets($socket, 4096));
            if ($line == "") {
                break;
            }
            if (eregi("^location:", $line)) {
                $this->redirect = true;
                $this->URL = trim(preg_replace("/location:/i","",$line));
                if (!eregi("^http://", $this->URL)) {
                    $this->URL = "http://" . $host . "/" . $this->URL;
                }
                $this->urlchanged = true;
                return;
            }
            $result[] = $line;
        }
//print_r($result);
        array_shift($result);
//print_r($result);
//fpassthru($socket);
//exit;

        $this->headers = $result;
        $this->fp = $socket;
    }
   
    function isUrlChanged()
    {
        return $this->urlchanged;
    }
 
    function create_reqbody($datastream, $is_sub = false, $keys = "")
    {
        $reqbody = "";

        foreach ($datastream as $key => $val)
        {
            if (!empty($reqbody))
                $reqbody .= "&";

            if ($is_sub) {
                $key = $keys . "[" . $key . "]";
            }

            if (is_array($val)) {
                $reqbody .= $this->create_reqbody($val, true, $key);
            }
            else {
                $reqbody .= $key . "=" . urlencode($val);
            }
        }
        return $reqbody;
    }

    function errorStatus()
    {
        return $this->error;
    }

/*getHeaders*************************************\
* Function returns an array containing the       *
* headers that resulted from the page.           *
\************************************************/
    function getHeaders(){
        return $this->headers;
    }

/*getRawPageData*********************************\
* Prints out the $fp as a stream without         *
* processing (for images/such)                   *
\************************************************/
    function getRawPageData(){
        fpassthru($this->fp);
        fclose($this->fp);
        return;
    }

/*getPageData************************************\
* Function returns a string containing the       *
* page data.  processPageData must be used       *
* before this function is called.                *
\************************************************/
    function getPageData(){
        return $this->updatedPageData;
    }

/*processPageData********************************\
* Function process the page, fixing links and    *
* images to use the proxy as specified by the    *
* class.                                         *
*                                                *
* Note: Add items here if you want to add extra  *
* prefixes or delims.                            *
\************************************************/
    function processPageData(){
        global $isChunkedTE;
        
        $this->pageData = "";
        if (!$this->fp) {
            return;
        }
        while(!feof( $this->fp)){
            $line = fgets($this->fp, 4096);
            if ($isChunkedTE && trim($line) == "0") {
                break;
            }
            $this->pageData .= $line;
        }
        fclose($this->fp); 

//$this->updatedPageData = $this->pageData; return;
//echo $this->pageData;exit;
        $delim[]='"';
        $delim[]="'";
        $delim[]="";
        $pre[]="src";
        $pre[]="background";
        $pre[]="href";
        $pre[]="action"; //<form action
        $pre[]="url\(";
        $pre[]="codebase";
        $pre[]="url";
        $pre[]="archive";
        $pre[]="import ";
        $this->redirect($pre,$delim);
    }

/*fileName***************************************\
* Function returns the name of the file that the *
* URL specifies.                                 *
\************************************************/
    function fileName(){
        return eregi_replace("[#?].*$", "", 
        eregi_replace("^.*/", "", $this->URL));
    }

/*encodeHTML*************************************\
* Fix Me:                                        *
* This is not done yet but the idea is to change *
* all the html charcters to their special char   *
* information (to keep people from stealing your *
* source and using it)                           *
\************************************************/
    function encodeHTML(){
        // Not Done Yet
    }

/*encryptPage************************************\
* Function changes updatedPageData so that the   *
* file is encrypted while sending.               *
\************************************************/
    function encryptPage(){
        $data2 = "";
        foreach (split("\n",eregi_replace("\r","",$this->updatedPageData)) as $a){
            $data = $this->encrypt(chop($a));
            $data = str_replace( "\\", "\\\\", $data);
            $data = str_replace( "\"", "\\\"", $data);
            $data2 .= "document.write( c(\"".$data."\") );\n";
        }
        $this->updatedPageData = ""
            . "<!-- URL Proxy Server\n"
            . "Javascript by Bob Matcuk\n"
            . "BMatcuk@Users.SourceForge.Net -->\n"
            . "<script language=\"Javascript\">\n"
            . " function c(s){\n"
            . "    var fi = \"\";\n"
            . "    for( var i = 0; i < s.length-1; i += 2 ){\n"
            . "       fi = fi + s.charAt(i+1) + s.charAt(i);\n"
            . "    }\n"
            . "    if( i < s.length ){\n"
            . "       fi = fi + s.charAt(i);\n"
            . "    }\n"
            . "    fi = fi + \"\\n\";\n"
            . "    return fi;\n"
            . " }\n" . " document.open();\n"
            . $data2
            . " document.close();\n"
            . "</script>\n";
    }
    
/*redirect***************************************\
* Private Function, DO NOT USE FROM PUBLIC SCOPE *
* Basically converts the prefixes in             *
* $prefixArray and the delim in $delimArray to a *
* string and uses it to fix links within the     *
* page.                                          *
\************************************************/
    function redirect($prefixArray,$delimArray)
    {
        global $name, $script, $var, $start2, $start, $delim, $isChunkedTE, $redirectIP;
        global $baseDir, $relDir, $server_name;

        $basehref = "";
        $a = $this->pageData;
        $name = $this->currentServer;
        $script = $this->scriptName;
        $var = $this->varName;
        $fileDir = $this->relDir;

        preg_match("@^http://([^/]*)@i", $name, $match);
        $server_name = $match[1];

//echo "server name #$server_name#";

        foreach ($delimArray as $delim)
        {
            $start = "<base[ ]*href=[ ]*";
            if (eregi($start . $delim, $a) && 
               ($delim == "" ? eregi($start . "[a-z,A-Z,/,0-9]", $a) : 1))
            {
                $t_delim = $delim;
                if ($delim == "") {
                    $t_delim = " \/>";
                }
                if (preg_match("/$start$delim([^$t_delim]*)/i", $a, $matches)) {
                    $basehref = $matches[1];
                }
            }
        }
        
        if ($basehref) {
            $baseDir = $basehref;
            $relDir = "";
        }
        else {
            $baseDir = $redirectIP; //$redirectIP is defined in config.php
            $relDir = $fileDir;
        }
        if (substr($baseDir, -1) != "/") {
            $baseDir .= "/";
        }
        if (!empty($relDir) && substr($relDir, -1) != "/") {
            $relDir .= "/";
        }
//echo "baseDir#relDir = $baseDir#$relDir";

        foreach($prefixArray as $prefix)
        {
            if ($prefix != "import " && $prefix != "url\(") {
                $start = $prefix . "[ ]*=[ ]*";
                $start2 = $prefix . "=";
            }
            else {
                $start = $prefix . "[ ]*";
                $start2 = stripslashes($prefix);
            }
//echo "$start\n";
            foreach($delimArray as $delim)
            {
//echo "$delim\n";
                $ws = "[ ]*";
                if ($delim == "") {
                    $ws = "";
                }
                if(eregi($start . $delim, $a) && 
                   ($delim == "" ? eregi($start . "[a-z,A-Z,/,0-9]", $a) : 1))
                {
                    $t_delim = $delim;
                    if ($delim == "") {
                        if ($prefix == "url\(") {
                            $t_delim = "\)\'\"";
                        }
                        else if ($prefix == "import " || $prefix == "open\(") {
                            continue;
                        }
                        else {
                            $t_delim = " ;>'\"\\n";
                        }
                    }

                    $site_file_name = basename(reset(explode("?", $this->URL)));
//echo "\nsite_name $site_file_name";
                    $a = eregi_replace($start . $delim . "$ws" . '\?',
                        $start2 . $delim . $site_file_name . "?",
                        $a);

                    $a = eregi_replace($start . $delim . "$ws//",
                        $start2 . '\a' . "//",
                        $a);
                    $a = @preg_replace_callback("@$start$delim$ws\.{0,2}/([^$t_delim]*)@i",
                        "filter",
                        $a);
//                    $a = eregi_replace($start . $delim . "{$ws}http://",
//                        $start2 . '\a' . "http://",
//                        $a);
                    $a = preg_replace_callback("@$start$delim$ws(http://[^$t_delim]*)@i",
                        "add_redirectIP",
                        $a);
                    $a = eregi_replace($start . $delim . "{$ws}mailto:",
                        $start2 . '\a' . "mailto:",
                        $a);
                    $a = eregi_replace($start . $delim . "$ws#",
                        $start2 . '\a' . "#",
                        $a);
                    $a = eregi_replace($start . $delim . "{$ws}javascript:",
                        $start2 . '\a' . "javascript:",
                        $a);

//decides whether the file needs to be proxied or not and creates the url accordingly
                    $a = preg_replace_callback("@$start$delim$ws([a-z0-9][^$t_delim]*)@i",
                        "filter",
                        $a);

                    $a = eregi_replace($start . '[\]a',
                        $start2 . $delim,
                        $a);

//echo "@$start$delim$name/$script\?$var=([^$t_delim]*)@i\n";
/* decode the # character in a URL if the URL is assigned to a GET variable
 * because #<name> will not be considered as part of the url
 * #<name> will be used by the browser only and this must be there at the end
 * of the URL
 * if # is encoded, then it will become part of URL and 'page not found'
 * error will come.
 */
                    $a = preg_replace_callback(
                        "@$start$delim$name/$script\?([^$t_delim]*)@i",
                        "encode",
                        $a
                        );
                }
            }
        }

        $extra = ($isChunkedTE) ? strlen($a) . "\n\r" : ""; //For chunked transfer encoding, add content size
                                                            //as a individual line
        $this->updatedPageData = $extra . $a;
//echo $this->updatedPageData; exit;
    }

/*encrypt****************************************\
* This function encrypts the page before it is   *
* sent out.                                      *
* Returns the file as a string, encrypted        *
\************************************************/
    function encrypt( $string ){
      for( $i = 0; $i < strlen( $string ) - 1; $i += 2 ){
        $temp = $string[$i];
        $string[$i] = $string[$i+1];
        $string[$i+1] = $temp;
      }
      return $string;
    }
}

function encode($matches)
{
    global $start2, $start, $delim, $name, $script, $var;

    $flag = $delim == "" ? eregi($start . "[a-z,A-Z,/,0-9]", $matches[0]) : 1;

    if ($matches[1] == "" || !$flag) {
        return $matches[0];
    }

//print_r($matches);exit;
    $str_urldecoded = urldecode($matches[1]);

    $arr_hash_exploded = explode("#", $str_urldecoded);
    foreach($arr_hash_exploded as $key_hash => $str_hash_exploded) {
        if ($script == "transliterate.php5") {
            $arr_amp_exploded = explode("&", $str_hash_exploded);
            foreach($arr_amp_exploded as $key_amp => $str_amp_exploded) {
                $arr_equal_exploded = explode("=", $str_amp_exploded);
                foreach($arr_equal_exploded as $key_equal => $str_equal_exploded) {
                    $arr_equal_exploded[$key_equal] = urlencode($str_equal_exploded);
                }
                $arr_amp_exploded[$key_amp] = implode("=", $arr_equal_exploded);
            }
            $arr_hash_exploded[$key_hash] = implode("&", $arr_amp_exploded);
        }
        else {
            $arr_equal_exploded = explode("=", $str_hash_exploded);
            foreach($arr_equal_exploded as $key_equal => $str_equal_exploded) {
                  $arr_equal_exploded[$key_equal] = urlencode($str_equal_exploded);
            }
            $arr_hash_exploded[$key_hash] = implode("=", $arr_equal_exploded);
        }
    }
    $url = "$start2$delim$name/$script?" . implode("#", $arr_hash_exploded);

    return $url;
}

function add_redirectIP($matches)
{
    global $redirectIP, $server_name, $lang;
    global $start2, $name, $script, $var, $transliteration_flag;

    if ($matches[1] == "") {
        return $matches[0];
    }

    $imageFile = isImageFile($matches[1]);
//echo "\n:MATCH:$matches[1]:$imageFile:";

    preg_match("@^http://([^/]*)@i", $matches[1], $website);

//echo "website #$website[1]#";
    if (!$imageFile && (getDomain($website[1]) ||
        ($transliteration_flag && !isSplFile($matches[1] && 
         strcasecmp($website[1],$server_name) != 0 ))))
    {
        $url = "$start2\a$name/$script?";
        if ($transliteration_flag) {
            $url .= "transliterate_to_button=" . urlencode($lang) . "&";
        }
        $url .= "$var=" . urlencode($matches[1]);
    }
    else {
        $url = "$start2\a" . $matches[1];
    }
    return $url;
}

function filter($matches)
{
    global $start, $start2, $delim, $name, $script, $var, $baseDir, $relDir;
    global $lang, $transliteration_flag;

    $encode_flag = false;

    if ($matches[1] == "") {  // in the cases of href='/' etc.,
        if (substr($matches[0], -1) == "/") {
            return substr($matches[0], 0, -1) . "$baseDir";
        }
        return $matches[0];
    }
    else if (isImageFile($matches[1]) || ($transliteration_flag && isSplFile($matches[0]))) {
//print_r($matches);
        $url = "$start2$delim$baseDir";
    }
    else {
        $encode_flag = true;
        $url = "$start2$delim$name/$script?";
         if ($transliteration_flag) {
             $url .= "transliterate_to_button=" . urlencode($lang) . "&";
        }
        $url .= "$var=" . urlencode($baseDir);
    }

    if ($delim == "") {
        $ws = "";
    }
    else {
        $ws = "[ ]*";
    }

    if (eregi("^$start$delim$ws/", $matches[0])) {
        $extrachar = "";
    }
    else if (eregi("^$start$delim$ws\./", $matches[0])) {
        $extrachar = "$relDir";
    }
    else if (eregi("^$start$delim$ws\.\./", $matches[0])) {
       $extrachar = "";
        if ($relDir != "" && $relDir != "/") {
            $extrachar = "$relDir../";
        }
    }
    else {
        $extrachar = "$relDir";
    }

    $url .= $extrachar;

    $url .= ($encode_flag) ? urlencode($matches[1]) : $matches[1];

//echo "url $extrachar#$url\n";
    return $url;
}

function isImageFile($str)
{
    $str = reset(explode("?", $str, 2));
    if (
        eregi("\.gif$", $str) ||
        eregi("\.ico$", $str) ||
        eregi("\.png$", $str) ||
        eregi("\.jpg$", $str) ||
        eregi("\.jpeg$", $str) ||
        eregi("\.eot$", $str) ||
        eregi("\.pfr$", $str) ||
        eregi("\.js$", $str) ||
        eregi("\.swf$", $str)
    ) {
        return true;
    }
    return false;
}

function isSplFile($str)
{
    $str = reset(explode("?", $str, 2));
    if (
        eregi("\.css$", $str) ||
        eregi("\.js$", $str)
    ) {
        return true;
    }
    if (isImageFile($str)) {
        return true;
    }
    return false;
}

function getDomain($website_name)
{
    global $supported_fonts;

    $domains = array_keys($supported_fonts);

    /* the website name should contain the ".domain_name" as its end part,
     * or it should be equal to the "domain_name" itself
     *
     * Assumptions: 1.Domain name is in lower case. 2.The only special
     * character in domain name, which has special meaning in regular
     * expression is .(dot).
     */
    $domain_name = '';
    foreach($domains as $domain) {
        $domain_esc = addcslashes($domain, ".");
        if (eregi("\.$domain_esc$", $website_name) || $domain == strtolower($website_name)) {
            $domain_name = $domain;
            break;
        }
    }
    return $domain_name;
}
?>
