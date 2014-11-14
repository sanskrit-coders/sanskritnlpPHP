<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
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

include_once(dirname(__FILE__) . "/Vakil.php5");

//Vakil
class Vakil01 extends Vakil 
{
function Vakil01()
{
}

//var $maxLookupLen = Shusha.maxLookupLen;
var $fontFace     = "Vakil_01";
var $displayName  = "Vakil";
var $script       = Padma::Padma_script_GUJARATI;
//var $hasSuffixes  = Shusha.hasSuffixes;

function lookup($str) 
{
    global $Vakil_toPadma;
    return $Vakil_toPadma[$str];
}

function isPrefixSymbol($str)
{
    return Shusha::isPrefixSymbol($str);
}

function isSuffixSymbol($str)
{
    return Shusha::isSuffixSymbol($str);
}

function isOverloaded($str)
{
    return Shusha::isOverloaded($str);
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    return Shusha::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant($str)
{
    return Shusha::isRedundant($str);
}

}
function Vakil01_initialize()
{
    global $fontinfo;

    $fontinfo["vakil_01"]["language"] = "Gujarati";
    $fontinfo["vakil_01"]["class"] = "Vakil01";
}

?>
