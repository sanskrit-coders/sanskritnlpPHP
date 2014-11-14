<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Harshita Vani   <harshita@atc.tcs.com>
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

//Classes that implement the supported scripts
$Unicode_script_Class = Array();
$Unicode_script_Class[Padma::Padma_script_TELUGU]     = "Telugu";
$Unicode_script_Class[Padma::Padma_script_TAMIL]      = "Tamil";
$Unicode_script_Class[Padma::Padma_script_MALAYALAM]  = "Malayalam";
$Unicode_script_Class[Padma::Padma_script_DEVANAGARI] = "Devanagari";
$Unicode_script_Class[Padma::Padma_script_GUJARATI]   = "Gujarati";
$Unicode_script_Class[Padma::Padma_script_KANNADA]    = "Kannada";
$Unicode_script_Class[Padma::Padma_script_BENGALI]    = "Bengali";
$Unicode_script_Class[Padma::Padma_script_GURMUKHI]   = "Gurmukhi";

$Unicode_fromPadma = Array();

class Unicode
{

var $Unicode_maxLookupLen = 2;

function Unicode() 
{
   // $this->script = Padma::Padma_script_TELUGU;
}

function initialize()  
{
    global $Unicode_fromPadma;
    global $Unicode_script_Class;
    global $Telugu_fromPadma;
    global $Tamil_fromPadma;
    global $Kannada_fromPadma;
    global $Gujarati_fromPadma;
    global $Malayalam_fromPadma;
    global $Devanagari_fromPadma;
    global $Bengali_fromPadma;
    global $Gurmukhi_fromPadma;
    //for($i = 0; $i < Padma.script_MAXSCRIPTS; ++$i) 

    $n_langs = count($Unicode_script_Class);

    for($i = 0; $i < $n_langs; ++$i)
    {
        $Unicode_script_Class_str= "$Unicode_script_Class[$i]";
        $lang = new $Unicode_script_Class_str;
        $lang->initialize();
        $varname = '$' . $Unicode_script_Class_str . "_fromPadma";
        eval("\$Unicode_fromPadma[\$Unicode_script_Class_str] = $varname;");
    }
}

function setScript($script)
 {
   if ($script > Padma::Padma_script_MAXSCRIPTS)
        return false;
    $this->script = $script;
    return true;
 }

function transformFromPadma($str)
{
    global $Unicode_fromPadma;

    $output = "";
    $str_len=utf8_strlen($str);
    $str_exploded = Array();
    for($count=0;$count<$str_len;$count++)
    {
        $str_exploded[$count]=utf8_substr($str,$count,1);
    }
    for($i=0;$i<count($str_exploded);++$i)
    {
      $cur= $str_exploded[$i];
      $out = null;
      if (array_key_exists($cur, $Unicode_fromPadma[$this->script])) {
          $out = $Unicode_fromPadma[$this->script][$cur];
      }
      $output .= ($out == null ? $cur : $out);
    }
    return $output;
}

}

?>
