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

include_once(dirname(__FILE__) . "/TAM.php5");

//Kumudam Tamil - an implementation of TAM encoding standard
class Kumudam extends TAM
{
function Kumudam()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TAM::maxLookupLen;
var $fontFace     = "Kumudam";
var $displayName  = "Kumudam";
var $script       = Padma::Padma_script_TAMIL;

function lookup($str) 
{
    return TAM::lookup($str);
}

function isPrefixSymbol($str)
{
    return TAM::isPrefixSymbol($str);
}

function  isOverloaded($str)
{
    return TAM::isOverloaded($str);
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    return TAM::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant($str)
{
    return TAM::isRedundant($str);
}

function preprocessMessage($input)
{
    return TAM::preprocessMessage($input);
}
}

function Kumudam_initialize()
{
    global $fontinfo;

    $fontinfo["kumudam"]["language"] = "Tamil";
    $fontinfo["kumudam"]["class"] = "Kumudam";
}
?>
