<?php
global $debug;

$debug = false;

function encodeFont($htmlText)
{
    global $website_name, $single_tags, $remove_attr_from_tags;
    global $debug;

    $siteEncoding = get_character_encoding($website_name);

    if ($debug) { echo ":CHAR_ENCODING: " . $siteEncoding . "\n"; }

    $fontstack = array();
    $tags = array();

    /* $identifyTagClosing - if set to 'true', verifies the html code to identify cross 
     * closing of tags. This will work properly if all the opened tags are closed, but not 
     * properly (ie., cross closing). If the opened tags are not at all closed, enabling 
     * this option will give unexpected results.
     */
    $identifyTagClosing = false;

    if ($website_name == "dailythanthi.com" || $website_name == "shirdisaiashirvadam.org") {
        $identifyTagClosing = true;
    }

    $result_str = "";
    $fontface = "";
    $tag_status = "";
    $parser = new HtmlParser ($htmlText);
    $t = new Transformer();

    while ($parser->parse())
    {
        $iNodeName = strtolower($parser->iNodeName);
        $outstr = "";

        if ($debug) { 
            echo ":TAG: " . $parser->iNodeName . "\n";
            echo ":ATTRIBS:\n"; print_r($parser->iNodeAttributes);
            echo ":TYPE: " . $parser->iNodeType . "\n";
        }

        if ($iNodeName == "text") {
            if ($debug) {
                echo ":TEXTPROCESSED:\n";
                echo ":FONTSTACK:\n"; print_r($fontstack);
            }
            if (!empty($fontstack) && ($fontface = end($fontstack)) != "unsupported") {
                if (trim($parser->iNodeValue) && $parser->iNodeValue != "<o:p") { //fix
                    
                    if ($debug) { echo ":INDIC:\n"; }

                    $outstr = mb_convert_encoding ($parser->iNodeValue, "UTF-8", $siteEncoding);
                    $outstr = html_entity_decode($outstr, ENT_QUOTES, 'UTF-8');

                    $outstr = mb_convert_encoding ($outstr, $siteEncoding, "UTF-8"); //fix
                    $outstr = mb_convert_encoding ($outstr, "UTF-8", $siteEncoding);

                    $outstr = $t->convert($outstr, $fontface);
                }
                else {
                    if ($debug) { echo ":EMPTYAFTERTRIM:\n"; }
                }
            }
            else {
                if ($debug) { echo ":ENGLISH:\n"; }
                $outstr = mb_convert_encoding($parser->iNodeValue, "UTF-8", $siteEncoding);
            }
        }
        else if ($parser->iNodeType == NODE_TYPE_ENDELEMENT) {

            if ($debug) { echo ":NODE_TYPE: ENDELEMENT\n"; }

            if ($identifyTagClosing && !empty($tags)) {     //this code finds any cross closing of tags
                $len = count($tags);  //and accordingly fonts will be applied
                for ($i = $len-1; $i >= 0; $i--)
                {
                    if ($tags[$i] == $iNodeName)
                    {
                        if ($debug) { echo ":CLOSING_NAME: $iNodeName\n"; }
                        array_splice($tags, $i, 1);
                        array_splice($fontstack, $i, 1);
                        break;
                    }
                }
            }
            else if (!empty($fontstack)) {
                array_pop($fontstack);
            }
        }
        else if (array_search($iNodeName, $single_tags) !== false) {

            if ($debug) { echo ":SINGLE_TAG:\n"; }

            if ($iNodeName == "input") {
                $fontface = translationStatus($iNodeName, $parser->iNodeAttributes, $website_name);
                if ($fontface == "neutral" && !empty($fontstack)) {
                    $fontface = end($fontstack);
                }
                if ($fontface != "unsupported") {
                    if (trim($parser->iNodeAttributes["value"]) && $parser->iNodeAttributes["value"] != "<o:p") { //fix
                        $outstr = mb_convert_encoding ($parser->iNodeAttributes["value"], "UTF-8", $siteEncoding);
                        $outstr = html_entity_decode($outstr, ENT_QUOTES, 'UTF-8');

                        $outstr = mb_convert_encoding ($outstr, $siteEncoding, "UTF-8"); //fix
                        $outstr = mb_convert_encoding ($outstr, "UTF-8", $siteEncoding);

                        $outstr = $t->convert($outstr, $fontface);

                        if ($debug) { 
                            echo ":ATTRIBS: \n"; print_r($parser->iNodeAttributes);
                            echo ":OUTSTR: $outstr\n";
                        }
                        $parser->iNodeAttributes["value"] = $outstr;
                        $outstr = "";
                    }
                }
            }
        }
        else if (($fontface = 
            translationStatus($iNodeName, $parser->iNodeAttributes, $website_name)) != "neutral")
        {

            if ($debug) { echo ":NON_NEUTRAL_FONTFACE: $fontface\n"; }

            if ($fontface != "unsupported" || !empty($fontstack)) {
                array_push($fontstack, $fontface);
                if ($identifyTagClosing) {
                    array_push($tags, $iNodeName);
                }
            }
        }
        else {

            if ($debug) { echo ":NEUTRAL_FONTFACE:\n"; }

            if (!empty($fontstack)) {
                array_push($fontstack, end($fontstack));
                if ($identifyTagClosing) {
                    array_push($tags, $iNodeName);
                }
            }
        }

        if ($parser->iNodeType == 1)  //start tag
        {
            //remove meta tag for content-type
            if ($iNodeName != "meta" ||
                strtolower($parser->iNodeAttributes["http-equiv"]) != "content-type")
            {
                if (array_search($iNodeName, $remove_attr_from_tags) !== false) {
                    removeAttribute($parser->iNodeAttributes, "align", "justify");
                }
                $outstr .= "<" . $parser->iNodeName .
                          makeStr($parser->iNodeAttributes) . ">";
            }
        }
        else if ($parser->iNodeType == 2) //end tag
        {
            //insert meta tag for content-type near </head> tag
            if ($iNodeName == "head") {
                $outstr .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\"/>";
            }
            $outstr .= "</" . $parser->iNodeName . ">";
        }
        else if ($outstr == "") {
            $outstr = $parser->iNodeValue;
        }

        if ($debug) {
            echo ":FONT: " . end($fontstack) . "\n";
            echo ":FONTSTACK:\n"; print_r($fontstack);
            echo ":TAGS:\n"; print_r($tags);
        }

        $result_str .= $outstr;
    }

    return $result_str;
}

function translationStatus($nodeName, &$attributes, $website_name)
{
    global $supported_tags, $unsupported_tags, $supported_classes, $unsupported_classes;
    global $supported_ids, $unsupported_ids, $supported_fonts, $font_name_aliases;
    global $debug;

    global $fontinfo; //this global array will be populated on the fly, by the plugins

    if ($debug) { echo ":ENT_FUNCTION: translationStatus\n"; }

    if ($nodeName == "font" && array_key_exists("face", $attributes)) {

        if ($debug) { echo ":FONT_TAG_W_FACE:\n"; }

        $fontface_arr = explode(",", strtolower($attributes["face"]));
        foreach ($fontface_arr as $fontface)
        {
            $fontface = trim($fontface);

            if ($debug) { echo ":FONTFACE: $fontface\n"; }

            if ($fontface)
            {
                if (($index = array_key_exists($fontface, $fontinfo)) !== false) {
                    unset($attributes["face"]);
                    return $fontface;
                }
                else if (!empty($font_name_aliases) && array_key_exists($fontface, $font_name_aliases)) {
                    unset($attributes["face"]);
                    return $font_name_aliases[$fontface];
                }
            }
        }
        return "unsupported";
    }

    if (array_key_exists("style", $attributes)) {

        $style = strtolower($attributes["style"]);
        $style_arr = preg_split('/[ ]*;[ ]*/', $style, -1, PREG_SPLIT_NO_EMPTY);

        if ($debug) { 
            echo ":STYLE: $style\n"; 
            echo ":STYLEARR:\n"; print_r($style_arr);
        }

        $text_align = "";
        $count = 0;
        foreach ($style_arr as $attrib) {
            $attrib = trim($attrib);
            $count++;
            if (substr($attrib, 0, 10) == "text-align") {
                $text_align = $attrib;
                break;
            }
        }

        if ($text_align) {

            if ($debug) { echo ":TEXT_ALIGN: $text_align\n"; }

            $text_align = trim(end(explode(":", $text_align)));
            if ($text_align == "justify") {
                array_splice($style_arr, $count - 1, 1);
                $attributes["style"] = implode (";", $style_arr);
            }
        }

        $font_family = "";
        $count = 0;
        foreach ($style_arr as $attrib) {
            $attrib = trim($attrib);
            $count++;
            if (substr($attrib, 0, 11) == "font-family") {
                $font_family = $attrib;
                break;
            }
        }

        if ($font_family != "") {

            if ($debug) { echo ":FONT_FAMILY: $font_family\n"; }

            $fontface_arr = explode(",", end(explode(":", $font_family)));
            foreach ($fontface_arr as $fontface)
            {
                //fix to remove (leading and trailing) single and double quotes from fontface
                $fontface = str_replace(array("'", "\""), "", $fontface);

                $fontface = trim($fontface);

                if ($debug) { echo ":FONTFACE: $fontface\n"; }

                if ($fontface)
                {
                    if (array_key_exists($fontface, $fontinfo)) {
                        array_splice($style_arr, $count - 1, 1);
                        $attributes["style"] = implode (";", $style_arr);
                        return $fontface;
                    }
                    else if (!empty($font_name_aliases) && array_key_exists($fontface, $font_name_aliases)) {
                        array_splice($style_arr, $count - 1, 1);
                        $attributes["style"] = implode (";", $style_arr);
                        return $font_name_aliases[$fontface];
                    }
                }
            }
            return "unsupported";
        }
    }

    if (array_key_exists("class", $attributes)) {
        $class = strtolower($attributes["class"]);

        if ($debug) { echo ":CLASS: $class\n"; }

        if (!empty($supported_classes) && array_key_exists($website_name, $supported_classes) && 
            array_search($class, $supported_classes[$website_name]) !== false)
        {
            return $supported_fonts[$website_name];
        }
        else if (!empty($unsupported_classes) && array_key_exists($website_name, $unsupported_classes) && 
            array_search($class, $unsupported_classes[$website_name]) !== false)
        {
            return "unsupported";
        }
    }

    if (array_key_exists("id", $attributes)) {
        $id = strtolower($attributes["id"]);

        if ($debug) { echo ":ID: $id\n"; }

        if (!empty($supported_ids) && array_key_exists($website_name, $supported_ids) && 
            array_search($id, $supported_ids[$website_name]) !== false)
        {
            return $supported_fonts[$website_name];
        }
        else if (!empty($unsupported_ids) && array_key_exists($website_name, $unsupported_ids) && 
            array_search($id, $unsupported_ids[$website_name]) !== false)
        {
            return "unsupported";
        }
    }

    if ($nodeName != "font") {  //for supported tags

        if ($debug) { echo ":NOT_FONT: $nodeName\n"; }

        if (!empty($supported_tags) && array_key_exists($website_name, $supported_tags) && 
            array_search($nodeName, $supported_tags[$website_name]) !== false)
        {
            if ($debug) { echo ":SUPPORTED_TAG:\n"; }

            return $supported_fonts[$website_name];
        }
        else if (!empty($unsupported_tags) && array_key_exists($website_name, $unsupported_tags) && 
            array_search($nodeName, $unsupported_tags[$website_name]) !== false)
        {
            return "unsupported";
        }
    }

    return "neutral";
}

function removeAttribute(&$attributes, $attribute, $value)
{
    if (strtolower($attributes[$attribute]) == $value) {
        unset($attributes[$attribute]);
    }
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

function get_character_encoding($website_name)
{
    global $content_encodings, $character_encoding, $default_character_encoding;

    if (!empty($character_encoding)) {
        return $character_encoding;  // contains identified encoding from the http headers
    }

    if ($website_name && !empty($content_encodings) && array_key_exists($website_name, $content_encodings)) {
        return $content_encodings[$website_name]; // contains hard coded array of encodings for known sites
    }

    return $default_character_encoding;  // contains hard coded default character encoding
}
?>
