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


include_once(dirname(__FILE__) . "/Shree_Tel_0900.php5");

//SHREE-TEL-0902 Telugu
class Shree_Tel_0902 extends Shree_Tel_0900 
{
function Shree_Tel_0902()
{
}

//The interface every dynamic font encoding should implement
var $fontFace     = "Shree-Tel-0902";
var $displayName  = "Shree Tel 0902";
var $script       = Padma::Padma_script_TELUGU;

function lookup ($str) 
{
    return Shree_Tel_0900::lookup($str);
}

function isPrefixSymbol ($str)
{
    return Shree_Tel_0900::isPrefixSymbol($str);
}

function isOverloaded ($str)
{
    return Shree_Tel_0900::isOverloaded($str);
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    return Shree_Tel_0900::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant ($str)
{
    return Shree_Tel_0900::isRedundant($str);
}
}

function Shree_Tel_0902_initialize()
{
    global $fontinfo;

    $fontinfo["shree-tel-0902"]["language"] = "Telugu";
    $fontinfo["shree-tel-0902"]["class"] = "Shree_Tel_0902";
}
?>
