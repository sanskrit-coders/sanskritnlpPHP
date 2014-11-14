<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2009 Harshita Vani   <harshita@atc.tcs.com>
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

//Generate the slightly different lookup tables from Shree_Tel_0900
//Differs -- 003C,0053,005D,006C,00FC,00FD,00FE,201C,201D,2021,00FF,00AD,00E6
//todo -- 00AC,00CA,

include_once(dirname(__FILE__) . "/Shree_Tel_0900.php5");

class SHREE_0908W extends Shree_Tel_0900
{
function SHREE_0908W()
{
}

function initialize()
{
    global $Shree_Tel_0900_toPadma;
    global $Shree_Tel_0900_prefixList;
    global $Shree_Tel_0900_overloadList;
    global $Shree_Tel_0900_redundantList;

    global $SHREE_0908W_toPadma;
    global $SHREE_0908W_redundantList;
    global $SHREE_0908W_overloadList;
    global $SHREE_0908W_prefixList;
    
    foreach ($Shree_Tel_0900_toPadma as $name => $value )
      $SHREE_0908W_toPadma[$name] = $value;

    foreach ($Shree_Tel_0900_overloadList as $name => $value )
      $SHREE_0908W_overloadList[$name] = $value;

    foreach ($Shree_Tel_0900_prefixList as $name => $value )
      $SHREE_0908W_prefixList[$name] = $value;


    foreach ($Shree_Tel_0900_redundantList as $name => $value ){
         if($name == Shree_Tel_0900::Shree_Tel_0900_misc_UNKNOWN_4){//as it is JUU here
         continue; 
         }
      $SHREE_0908W_redundantList[$name] = $value;
    }

//overwrite 
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_vattu_RRA_2] = Padma::Padma_vattu_RRA;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_vattu_NGA]   = Padma::Padma_vattu_NGA;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_KHI]   = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_JUU]   = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_UU;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_vattu_SSMA]  = Padma::Padma_vattu_SSA . Padma::Padma_vattu_MA;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_candrabindu] = Padma::Padma_candrabindu;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_YU]    = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_YUU]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_YI_2]  = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_YII_2] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_YO_2]  = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_O;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_MO_2]  = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_O;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_MU]    = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_MUU]   = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_JHPOLLU] = Padma::Padma_consnt_JHA . Padma::Padma_syllbreak;
$SHREE_0908W_toPadma[SHREE_0908W::SHREE_0908W_combo_GHU]   = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_U;

$SHREE_0908W_redundantList[SHREE_0908W::SHREE_0908W_misc_UNKNOWN_7] = true;
$SHREE_0908W_redundantList[SHREE_0908W::SHREE_0908W_misc_UNKNOWN_8] = true;
$SHREE_0908W_redundantList[SHREE_0908W::SHREE_0908W_misc_UNKNOWN_9] = true;
$SHREE_0908W_redundantList[SHREE_0908W::SHREE_0908W_misc_UNKNOWN_10]= true;
$SHREE_0908W_redundantList[SHREE_0908W::SHREE_0908W_misc_UNKNOWN_11]= true;
$SHREE_0908W_redundantList[SHREE_0908W::SHREE_0908W_misc_UNKNOWN_12]= true;
$SHREE_0908W_redundantList[SHREE_0908W::SHREE_0908W_misc_TICK_4]    = true;
$SHREE_0908W_redundantList[SHREE_0908W::SHREE_0908W_misc_TICK_5]    = true;
$SHREE_0908W_redundantList[SHREE_0908W::SHREE_0908W_misc_TICK_6]    = true;

$SHREE_0908W_overloadList["\xC3\x86"] = true;
$SHREE_0908W_overloadList["\xC3\x84\xC3\xB1"] = true;
$SHREE_0908W_overloadList["\xC3\x86\xC5\xA0"] = true;
$SHREE_0908W_overloadList["\xC3\x86\xC5\xA0\x6E"] = true;

$SHREE_0908W_prefixList[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AILEN_1]    = true;
$SHREE_0908W_prefixList[Shree_Tel_0900::Shree_Tel_0900_vattu_RA_1] = true;
}


const SHREE_0908W_vattu_RRA_2    = "\x3C";
const SHREE_0908W_misc_UNKNOWN_7 = "\x53";
const SHREE_0908W_misc_UNKNOWN_8 = "\x6C";
const SHREE_0908W_misc_UNKNOWN_9 = "\xE2\x80\xA1";
const SHREE_0908W_misc_UNKNOWN_10= "\xC2\xAD";
const SHREE_0908W_misc_UNKNOWN_11= "\xC3\xA6";
const SHREE_0908W_misc_UNKNOWN_12= "\xC2\xA0";
const SHREE_0908W_misc_TICK_4    = "\x5D";
const SHREE_0908W_misc_TICK_5    = "\xC2\xB6";
const SHREE_0908W_misc_TICK_6    = "\xC3\xBD";
const SHREE_0908W_combo_KHI      = "\xC3\xBC";
const SHREE_0908W_combo_JUU      = "\xC3\xBE";
const SHREE_0908W_vattu_SSMA     = "\xC3\xBF";
const SHREE_0908W_candrabindu    = "\xE2\x80\x9C";
const SHREE_0908W_vattu_NGA      = "\xE2\x80\x9D";
const SHREE_0908W_combo_YU       = "\xC3\x84\xC2\xAC";
const SHREE_0908W_combo_YUU      = "\xC3\x84\xC3\x8A";
const SHREE_0908W_combo_YI_2     = "\xC3\x86\xC2\xAC";
const SHREE_0908W_combo_YII_2    = "\xC3\x86\xC3\x8A";
const SHREE_0908W_combo_YO_2     = "\xC3\x84\xC3\xB1\xC2\xAC";
const SHREE_0908W_combo_MO_2     = "\xC3\x90\xC3\xB0\xC2\xAC";
const SHREE_0908W_combo_MU       = "\xC3\x90\xC2\xAC";
const SHREE_0908W_combo_MUU      = "\xC3\x90\xC3\x8A";
const SHREE_0908W_combo_JHPOLLU  = "\xC3\x86\xC5\xA0\x6E\x24";
const SHREE_0908W_combo_GHU      = "\xC5\x93\xC2\xAC";


//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "SHREE-0908W";
var $displayName  = "SHREE-0908W";
var $script       = Padma::Padma_script_TELUGU;

function lookup ($str) 
{
    global $SHREE_0908W_toPadma;
    if(array_key_exists($str,$SHREE_0908W_toPadma))
    return $SHREE_0908W_toPadma[$str];
    return false;
}

function isPrefixSymbol ($str)
{
    global $SHREE_0908W_prefixList;
    return array_key_exists($str,$SHREE_0908W_prefixList);
}

function isOverloaded ($str)
{
    global $SHREE_0908W_overloadList;
    return array_key_exists($str,$SHREE_0908W_overloadList); 
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    return Shree_Tel_0900::handleTwoPartVowelSigns($sign1, $sign2);
}

function isRedundant ($str)
{
    global $SHREE_0908W_redundantList;
    return array_key_exists($str,$SHREE_0908W_redundantList);
}
}

$SHREE_0908W_redundantList = array();
$SHREE_0908W_toPadma = array();
$SHREE_0908W_overloadList = array();
$SHREE_0908W_prefixList = array();

function SHREE_0908W_initialize()
{
    global $fontinfo;

    $fontinfo["shree-0908w"]["language"] = "Telugu";
    $fontinfo["shree-0908w"]["class"] = "SHREE_0908W";
}

?>
