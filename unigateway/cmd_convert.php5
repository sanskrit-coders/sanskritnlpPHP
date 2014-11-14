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

include_once (dirname(__FILE__) . "/config.php5");
include_once (dirname(__FILE__) . "/functions.php5");
include_once (dirname(__FILE__) . "/htmlparser.inc");
include_once (dirname(__FILE__) . "/Encoder/transformer.php5");

/* $website_name which will be used to decide the default font to be 
 * used for this website. this variable will be used as the 
 * index for the arrays $supported_fonts and like wise arrays defined 
 * in the file config.php5
 *
 * optionally this value can be given as parameter #1 while executing
 * this script
 *
 * if you leave this blank, the font name will be identified from the
 * face attribute of font tag and font-family property of style 
 * attribute. in this case, the conversion will be done only on the
 * text for which font name has been identified.
 */
$website_name = "";
if ($argc > 1 && !empty($argv[1])) {
    $website_name = $argv[1];
}

$htmlText = "";
$fp = fopen("php://stdin", "r");
while (!feof($fp)) {
    $htmlText .= fgets($fp);
}
fclose($fp);

if ($htmlText) {
    echo encodeFont($htmlText);
}
?>
