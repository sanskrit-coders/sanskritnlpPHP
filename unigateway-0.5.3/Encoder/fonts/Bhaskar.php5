<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006  Radhika Thammishetty <radhika@atc.tcs.com>
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

include_once(dirname(__FILE__) . "/BEJA.php5");

class Bhaskar extends BEJA
{
function Bhaskar()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen =  3; 
var $fontFace     = "Bhaskar";
var $displayName  = "Bhaskar";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup($str) 
{
  global $BEJA_toPadma_BE;
  return $BEJA_toPadma_BE[$str];
    
}

function isPrefixSymbol($str)
{
     return BEJA::isPrefixSymbol($str);
}

function isSuffixSymbol($str)
{
    return BEJA::isSuffixSymbol($str);
}

function isOverloaded($str)
{
    return BEJA::isOverloaded($str);
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    return BEJA::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant($str)
{
    return BEJA::isRedundant($str);
}
}

function Bhaskar_initialize()
{
    global $fontinfo;

    $fontinfo["bhaskar"]["language"] = "Devanagari";
    $fontinfo["bhaskar"]["class"] = "Bhaskar";
}
?>
