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

//Shivaji

include_once(dirname(__FILE__) . "/Shivaji.php5");

class Shivaji01 extends Shivaji
{
function Shivaji01()
{
}

//var $maxLookupLen = Shusha.maxLookupLen;
var $fontFace     = "Shivaji01";
var $displayName  = "Shivaji01";
//var $script       = Shusha.script;
//var $hasSuffixes  = Shusha.hasSuffixes;

function lookup($str) 
{
    global $Shivaji_toPadma;
    return $Shivaji_toPadma[$str];
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
function Shivaji01_initialize()
{
    global $fontinfo;

    $fontinfo["shivaji01"]["language"] = "Devanagari";
    $fontinfo["shivaji01"]["class"] = "Shivaji01";
}

?>
