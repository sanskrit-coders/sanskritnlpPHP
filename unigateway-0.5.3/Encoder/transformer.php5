<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Harshita Vani   <harshita@atc.tcs.com>
 *  Copyright (C) 2006 Vigneswaran R   <vignesh@atc.tcs.com>
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.

 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * ***** END LICENSE BLOCK ***** */

include_once (dirname(__FILE__) . "/padma.php5");
include_once (dirname(__FILE__) . "/shared.php5");
include_once (dirname(__FILE__) . "/parser.php5");
include_once (dirname(__FILE__) . "/dynamicfontparser.php5");
include_once (dirname(__FILE__) . "/unicode.php5");
include_once (dirname(__FILE__) . "/utf-functions.php5");
include_once (dirname(__FILE__) . "/syllable.php5");

$dir = dirname(__FILE__) . "/langs";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != "..") {
                if (preg_match("/.php5$/i", $file)) {
                    eval("include_once ('$dir/$file');");
                }
            }
        }
    }
}

$fontinfo = array();
$dir = dirname(__FILE__) . "/fonts";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != "." && $file != "..") {
                if (preg_match("/.php5$/i", $file)) {
                    eval("include_once ('$dir/$file');");
                    $filename = substr($file, 0, -5);
                    eval("{$filename}_initialize();");
                }
            }
        }
    }
}
//print_r($fontinfo);echo "\n";exit;

class Transformer
{
    function convert($text, $fontface)
    {
        global $fontinfo;

        $fontface = strtolower($fontface);
        if (!is_array($fontinfo[$fontface])) {
            return "";
        }
        Unicode::setScript($fontinfo[$fontface]["language"]); 
        eval("\$encoding = new {$fontinfo[$fontface]['class']}();");

        $dyn_parser= new DynamicFontParser($text, $encoding);

//echo "\n:CONVERT:$text:";
//echo "\n fontface " .$fontface;
        $output = "";
        while ($dyn_parser->more())
        {
            $conv= $dyn_parser->next();
            $output .= $this->toOutputFormat($conv);
        }
        return $output;
    }
    
    function toOutputFormat($syllable)
    {
        return Unicode::transformFromPadma($syllable);
    }
}

Unicode::initialize();
BEJA::initialize();
Vakil::initialize();
Shivaji::initialize();
SHREE_0908W::initialize();
?>
