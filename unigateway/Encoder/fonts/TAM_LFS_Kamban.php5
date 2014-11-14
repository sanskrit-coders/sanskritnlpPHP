<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2008 Harshita Vani   <harshita@atc.tcs.com>
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

//TAM_LFS_Kamban Tamil - an implementation of TAM encoding standard
class TAM_LFS_Kamban extends TAM
{
function TAM_LFS_Kamban()
{
}

//The interface every dynamic font encoding should implement
//var $maxLookupLen = TAM::maxLookupLen;
var $fontFace     = "TAM-LFS-Kamban";
var $displayName  = "TAM-LFS-Kamban";
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

function TAM_LFS_Kamban_initialize()
{
    global $fontinfo;

    $fontinfo["tam-lfs-kamban"]["language"] = "Tamil";
    $fontinfo["tam-lfs-kamban"]["class"] = "TAM_LFS_Kamban";
    $fontinfo["tam-lfs-kambanwide"]["language"] = "Tamil";
    $fontinfo["tam-lfs-kambanwide"]["class"] = "TAM_LFS_Kamban";
    $fontinfo["tam-lfs-kambannarrow"]["language"] = "Tamil";
    $fontinfo["tam-lfs-kambannarrow"]["class"] = "TAM_LFS_Kamban";
}
?>
