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

class Shree_Tel_0900
{

function Shree_Tel_0900()
{
}
//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "Shree-Tel-0900";
var $displayName  = "Shree Tel 0900";
var $script       = Padma::Padma_script_TELUGU;

function lookup ($str)
{
//    echo "in look up";
    global $Shree_Tel_0900_toPadma;
    return $Shree_Tel_0900_toPadma[$str];
}

function isPrefixSymbol($str)
{
  global $Shree_Tel_0900_prefixList;
  return $Shree_Tel_0900_prefixList[$str] != null;
}


function isOverloaded ($str)
{
  global $Shree_Tel_0900_overloadList;
  return $Shree_Tel_0900_overloadList[$str] != null;
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN)
        return Padma::Padma_vowelsn_AI;
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;
}

function isRedundant ($str)
{
  global $Shree_Tel_0900_redundantList;
  return $Shree_Tel_0900_redundantList[$str] != null;
}







//Implementation details start here

//const Specials
const Shree_Tel_0900_candrabindu    = "\xC2\xB6";
const Shree_Tel_0900_visarga        = "\x40";
const Shree_Tel_0900_anusvara_1     = "\xE2\x80\xA6";
const Shree_Tel_0900_anusvara_2     = "\xC2\xB7";  //doesn't look like sunnaa because it is filled in, call it sunnaa for now
const Shree_Tel_0900_virama_1       = "\xC5\xA0";
const Shree_Tel_0900_virama_2       = "\xE2\x80\xB9";
const Shree_Tel_0900_virama_3       = "\xC5\x92";
const Shree_Tel_0900_virama_4       = "\xE2\x80\x9C";
const Shree_Tel_0900_virama_5       = "\xE2\x80\x9D";

//Vowels
const Shree_Tel_0900_vowel_A        = "\x41";
const Shree_Tel_0900_vowel_AA       = "\x42";
const Shree_Tel_0900_vowel_I        = "\x43";
const Shree_Tel_0900_vowel_II       = "\x44";               
const Shree_Tel_0900_vowel_U        = "\x45";
const Shree_Tel_0900_vowel_UU       = "\x46";
const Shree_Tel_0900_vowel_E        = "\x47";
const Shree_Tel_0900_vowel_EE       = "\x48";               
const Shree_Tel_0900_vowel_R        = "\xC2\xBA\x24\x24";
const Shree_Tel_0900_vowel_AI_1     = "\x49";
const Shree_Tel_0900_vowel_AI_2     = "\xC3\xAD\x49";         //This is probably a bug
const Shree_Tel_0900_vowel_O        = "\x4A";
const Shree_Tel_0900_vowel_OO       = "\x4B";
const Shree_Tel_0900_vowel_AU       = "\x4C";

//Consonants
const Shree_Tel_0900_consnt_KA      = "\x4D";
const Shree_Tel_0900_consnt_KHA_1   = "\x51";
const Shree_Tel_0900_consnt_KHA_2   = "\x52";
const Shree_Tel_0900_consnt_GA      = "\x56";
const Shree_Tel_0900_consnt_GHA     = "\xC5\x93\x24";
const Shree_Tel_0900_consnt_NGA     = "\x5C";

const Shree_Tel_0900_consnt_CA      = "\x5E";
const Shree_Tel_0900_consnt_CHA     = "\x62";
const Shree_Tel_0900_consnt_JA_1    = "\x66";
const Shree_Tel_0900_consnt_JA_2    = "\x67";               
const Shree_Tel_0900_consnt_JHA     = "\x6D"; 
const Shree_Tel_0900_consnt_NYA     = "\x70";

const Shree_Tel_0900_consnt_TTA_1   = "\x72";
const Shree_Tel_0900_consnt_TTA_2   = "\x73";
const Shree_Tel_0900_consnt_TTHA    = "\x75";
const Shree_Tel_0900_consnt_DDA     = "\x79";
const Shree_Tel_0900_consnt_DDHA    = "\xC3\x89";         
const Shree_Tel_0900_consnt_NNA     = "\xC3\x97";               

const Shree_Tel_0900_consnt_TA      = "\xE2\x84\xA2";
const Shree_Tel_0900_consnt_THA     = "\xC2\xA3";
const Shree_Tel_0900_consnt_DA      = "\xC2\xA7";
const Shree_Tel_0900_consnt_DHA     = "\xC2\xAB\xC2\xA7";
const Shree_Tel_0900_consnt_NA      = "\xC2\xAF";

const Shree_Tel_0900_consnt_PA_1    = "\xC2\xB3";               
const Shree_Tel_0900_consnt_PA_2    = "\xC2\xB4";               
const Shree_Tel_0900_consnt_PHA_1   = "\xC5\x93";
const Shree_Tel_0900_consnt_PHA_2   = "\xC2\xB8";         
const Shree_Tel_0900_consnt_BA_1    = "\xC2\xBA";               
const Shree_Tel_0900_consnt_BA_2    = "\xC2\xBB";
const Shree_Tel_0900_consnt_BHA     = "\xC2\xBF";         
const Shree_Tel_0900_consnt_MA      = "\xC3\x90\x24";

const Shree_Tel_0900_consnt_YA      = "\xC3\x84\x24";                
const Shree_Tel_0900_consnt_RA      = "\xC3\x86";               
const Shree_Tel_0900_consnt_LA_1    = "\xC3\x8B";
const Shree_Tel_0900_consnt_LA_2    = "\xC3\x8C";               
const Shree_Tel_0900_consnt_VA      = "\xC3\x90";
const Shree_Tel_0900_consnt_SHA     = "\xC3\x94";               
const Shree_Tel_0900_consnt_SSA_1   = "\xC3\x99";
const Shree_Tel_0900_consnt_SSA_2   = "\xC3\x9A";               
const Shree_Tel_0900_consnt_SA_1    = "\xC3\x9C";               
const Shree_Tel_0900_consnt_SA_2    = "\xC3\x9D";               

const Shree_Tel_0900_consnt_HA      = "\xC3\x9F";                
const Shree_Tel_0900_consnt_LLA     = "\xC3\xA2";               
const Shree_Tel_0900_conjct_KSHA_1  = "\x3C";
const Shree_Tel_0900_conjct_KSHA_2  = "\xE2\x80\x9E";
const Shree_Tel_0900_consnt_RRA     = "\xE2\x80\x9A";

//Gunintamulu
const Shree_Tel_0900_vowelsn_AA_1   = "\x3E";
const Shree_Tel_0900_vowelsn_AA_2   = "\xC3\xA9";                
const Shree_Tel_0900_vowelsn_AA_3   = "\xC3\xAA";               
const Shree_Tel_0900_vowelsn_AA_4   = "\xC3\xAB";
const Shree_Tel_0900_vowelsn_I_1    = "\xC3\xAC";               
const Shree_Tel_0900_vowelsn_I_2    = "\xC3\xAD";               
const Shree_Tel_0900_vowelsn_II_1   = "\xC3\xAE";               
const Shree_Tel_0900_vowelsn_II_2   = "\xC3\xAF";
const Shree_Tel_0900_vowelsn_U_1    = "\x23";
const Shree_Tel_0900_vowelsn_U_2    = "\x24";
const Shree_Tel_0900_vowelsn_UU_1   = "\x2A";
const Shree_Tel_0900_vowelsn_UU_2   = "\x4E";
const Shree_Tel_0900_vowelsn_R      = "\xE2\x80\x93";
const Shree_Tel_0900_vowelsn_RR     = "\xE2\x80\x94";
const Shree_Tel_0900_vowelsn_E_1    = "\xC3\xB0";               
const Shree_Tel_0900_vowelsn_E_2    = "\xC3\xB1";               
const Shree_Tel_0900_vowelsn_E_3    = "\xC3\xB2";               
const Shree_Tel_0900_vowelsn_EE_1   = "\xC3\xB3";               
const Shree_Tel_0900_vowelsn_EE_2   = "\xC3\xB4";               
const Shree_Tel_0900_vowelsn_EE_3   = "\xC3\xB5";               
const Shree_Tel_0900_vowelsn_O_1    = "\xC5\xB8";
const Shree_Tel_0900_vowelsn_O_2    = "\xC3\xB6";               
const Shree_Tel_0900_vowelsn_O_3    = "\xC3\xB7";               
const Shree_Tel_0900_vowelsn_OO_1   = "\x5A";
const Shree_Tel_0900_vowelsn_OO_2   = "\xC3\xB8";               
const Shree_Tel_0900_vowelsn_OO_3   = "\xC3\xB9";               
const Shree_Tel_0900_vowelsn_AU_1   = "\x6F";
const Shree_Tel_0900_vowelsn_AU_2   = "\xCB\x9C";
const Shree_Tel_0900_vowelsn_AU_3   = "\xC3\xBA";
const Shree_Tel_0900_vowelsn_AU_4   = "\xC3\xBB";

const Shree_Tel_0900_vowelsn_AILEN_1 = "\x4F";
const Shree_Tel_0900_vowelsn_AILEN_2 = "\xE2\x80\xA2";


//const Special Combinations
const Shree_Tel_0900_combo_KHI      = "\x53";
const Shree_Tel_0900_combo_KHII     = "\x54";
const Shree_Tel_0900_combo_GI       = "\x57";
const Shree_Tel_0900_combo_GII      = "\x58";
const Shree_Tel_0900_combo_GHAA     = "\xC5\x93\x2A";

const Shree_Tel_0900_combo_CI       = "\x5F";
const Shree_Tel_0900_combo_CII      = "\x60";
const Shree_Tel_0900_combo_CHI      = "\x63";
const Shree_Tel_0900_combo_CHII     = "\x64";
const Shree_Tel_0900_combo_JI       = "\x68";
const Shree_Tel_0900_combo_JII      = "\x69";               
const Shree_Tel_0900_combo_JU       = "\x6B";
const Shree_Tel_0900_combo_JUU      = "\x6C";               
const Shree_Tel_0900_combo_JHAA     = "\xC3\x86\x6E\x2A";
const Shree_Tel_0900_combo_JHI      = "\xC3\x87\x6E\x24";
const Shree_Tel_0900_combo_JHII     = "\xC3\x88\x6E\x24";
const Shree_Tel_0900_combo_JHEE     = "\xC3\x86\xC3\xB3\x6E\x24";

const Shree_Tel_0900_combo_TTHI     = "\x76";
const Shree_Tel_0900_combo_TTHII    = "\x77";

const Shree_Tel_0900_combo_TI       = "\xE2\x80\xA0";
const Shree_Tel_0900_combo_TII      = "\xC2\xA1";
const Shree_Tel_0900_combo_THI      = "\xC2\xA4";
const Shree_Tel_0900_combo_THII     = "\xC2\xA5";
const Shree_Tel_0900_combo_DI       = "\xC2\xA8";
const Shree_Tel_0900_combo_DII      = "\xC2\xA9";               
const Shree_Tel_0900_combo_DHI      = "\xC2\xAB\xC2\xA8";
const Shree_Tel_0900_combo_DHII     = "\xC2\xAB\xC2\xA9";
const Shree_Tel_0900_combo_NI       = "\xC2\xB0";
const Shree_Tel_0900_combo_NII      = "\xC2\xB1";

const Shree_Tel_0900_combo_BI       = "\xC2\xBC";               
const Shree_Tel_0900_combo_BII      = "\xC2\xBD";
const Shree_Tel_0900_combo_BHI      = "\xC3\x80";         
const Shree_Tel_0900_combo_BHII     = "\xC3\x81";         
const Shree_Tel_0900_combo_MAA      = "\xC3\x90\x2A";                
const Shree_Tel_0900_combo_MI       = "\xC3\x91\x24";                
const Shree_Tel_0900_combo_MII      = "\xC3\x92\x24";                
const Shree_Tel_0900_combo_ME       = "\xC3\x90\xC3\xB0\x24";                
const Shree_Tel_0900_combo_MEE      = "\xC3\x90\xC3\xB3\x24";                
const Shree_Tel_0900_combo_MO       = "\xC3\x90\xC3\xB0\x24\x24";
const Shree_Tel_0900_combo_MOO      = "\xC3\x90\xC3\xB0\x2A";
const Shree_Tel_0900_combo_MAU      = "\xC3\x90\xCB\x9C";
const Shree_Tel_0900_combo_MPOLLU   = "\xC3\x90\xC5\x92\x24";

const Shree_Tel_0900_combo_YAA      = "\xC3\x84\x2A";
const Shree_Tel_0900_combo_YI       = "\xC3\x86\x24\x24";
const Shree_Tel_0900_combo_YII      = "\xC3\x86\x24\x2A";
const Shree_Tel_0900_combo_YE       = "\xC3\x84\xC3\xB1\x24";
const Shree_Tel_0900_combo_YEE      = "\xC3\x84\xC3\xB4\x24";
const Shree_Tel_0900_combo_YO       = "\xC3\x84\xC3\xB1\x24\x24";
const Shree_Tel_0900_combo_YOO      = "\xC3\x84\xC3\xB1\x2A";
const Shree_Tel_0900_combo_YPOLLU   = "\xC3\x84\xC5\x92\x24";
const Shree_Tel_0900_combo_RI       = "\xC3\x87";               
const Shree_Tel_0900_combo_RII      = "\xC3\x88";               
const Shree_Tel_0900_combo_LI       = "\xC3\x8D";               
const Shree_Tel_0900_combo_LII      = "\xC3\x8E";               
const Shree_Tel_0900_combo_VI       = "\xC3\x91";                
const Shree_Tel_0900_combo_VII      = "\xC3\x92";               
const Shree_Tel_0900_combo_SHI      = "\xC3\x95";
const Shree_Tel_0900_combo_SHII     = "\xC3\x96";               

const Shree_Tel_0900_combo_HAA      = "\xC3\xA0";   
const Shree_Tel_0900_combo_LLI      = "\xC3\xA3";
const Shree_Tel_0900_combo_LLII     = "\xC3\xA4";               

const Shree_Tel_0900_combo_SHRII    = "\x7D";

//Vattulu
const Shree_Tel_0900_vattu_KA       = "\x50";
const Shree_Tel_0900_vattu_KHA      = "\x55";
const Shree_Tel_0900_vattu_GA       = "\x59";
const Shree_Tel_0900_vattu_GHA      = "\xC6\x92";
const Shree_Tel_0900_vattu_NGA      = "\x5D";

const Shree_Tel_0900_vattu_CA       = "\x61";               
const Shree_Tel_0900_vattu_CHA      = "\x65";
const Shree_Tel_0900_vattu_JA       = "\x6A";
const Shree_Tel_0900_vattu_NYA      = "\x71";

const Shree_Tel_0900_vattu_TTA      = "\x74";
const Shree_Tel_0900_vattu_TTHA     = "\x78";
const Shree_Tel_0900_vattu_DDA      = "\x7A";
const Shree_Tel_0900_vattu_DDHA     = "\x7C";
const Shree_Tel_0900_vattu_NNA      = "\x7E";

const Shree_Tel_0900_vattu_TA       = "\xC2\xA2";
const Shree_Tel_0900_vattu_THA      = "\xC2\xA6";
const Shree_Tel_0900_vattu_DA       = "\xC2\xAA";
const Shree_Tel_0900_vattu_DHA      = "\xC2\xAE";
const Shree_Tel_0900_vattu_NA       = "\xC2\xB2";

const Shree_Tel_0900_vattu_PA       = "\xC2\xB5";               
const Shree_Tel_0900_vattu_PHA      = "\xC2\xB9";         
const Shree_Tel_0900_vattu_BA       = "\xC2\xBE";               
const Shree_Tel_0900_vattu_BHA      = "\xC3\x82";          
const Shree_Tel_0900_vattu_MA       = "\xC3\x83";               

const Shree_Tel_0900_vattu_YA       = "\xC3\x85";               
const Shree_Tel_0900_vattu_RA_1     = "\x5B";
const Shree_Tel_0900_vattu_RA_2     = "\x7B";
const Shree_Tel_0900_vattu_LA       = "\xC3\x8F";               
const Shree_Tel_0900_vattu_VA       = "\xC3\x93";               
const Shree_Tel_0900_vattu_SHA      = "\xC3\x98";               
const Shree_Tel_0900_vattu_SSA      = "\xC3\x9B";
const Shree_Tel_0900_vattu_SA       = "\xC3\x9E";               
const Shree_Tel_0900_vattu_HA       = "\xC3\xA1";
const Shree_Tel_0900_vattu_LLA      = "\xC3\xA5";
const Shree_Tel_0900_vattu_RRA      = "\xC3\x8A";

const Shree_Tel_0900_vattu_SSMA     = "\xE2\x80\xA1";
const Shree_Tel_0900_vattu_TRA      = "\xCB\x86";
const Shree_Tel_0900_vattu_TTRA     = "\xE2\x80\xB0";
const Shree_Tel_0900_vattu_PU       = "\xC5\xA1";

//Digits
const Shree_Tel_0900_digit_ZERO     = "\x30";
const Shree_Tel_0900_digit_ONE      = "\x31";
const Shree_Tel_0900_digit_TWO      = "\x32";
const Shree_Tel_0900_digit_THREE    = "\x33";
const Shree_Tel_0900_digit_FOUR     = "\x34";
const Shree_Tel_0900_digit_FIVE     = "\x35";
const Shree_Tel_0900_digit_SIX      = "\x36";
const Shree_Tel_0900_digit_SEVEN    = "\x37";
const Shree_Tel_0900_digit_EIGHT    = "\x38";
const Shree_Tel_0900_digit_NINE     = "\x39";

//Matches Aconst SCII
const Shree_Tel_0900_EXCLAM         = "\x21";
const Shree_Tel_0900_PERCENT        = "\x25";
const Shree_Tel_0900_QTSINGLE       = "\x27";
const Shree_Tel_0900_PARENLEFT      = "\x28";
const Shree_Tel_0900_PARENRIGT      = "\x29";
const Shree_Tel_0900_PLUS           = "\x2B";
const Shree_Tel_0900_COMMA          = "\x2C";
const Shree_Tel_0900_PERIOD         = "\x2E";
const Shree_Tel_0900_SLASH          = "\x2F";
const Shree_Tel_0900_COLON          = "\x3A";
const Shree_Tel_0900_SEMICOLON      = "\x3B";
const Shree_Tel_0900_EQUALS         = "\x3D";
const Shree_Tel_0900_QUESTION       = "\x3F";

//Does not match Aconst SCII
const Shree_Tel_0900_extra_QTSINGLE = "\x22";
const Shree_Tel_0900_extra_DBLQT    = "\x22\x22";
const Shree_Tel_0900_HYPHEN         = "\x26";
const Shree_Tel_0900_ASTERISK       = "\xE2\x80\x99";

//Danda and double danda
const Shree_Tel_0900_misc_danda     = "\xE2\x80\x98";
const Shree_Tel_0900_misc_ddanda    = "\xE2\x80\x98\xE2\x80\x98";

//Kommu
const Shree_Tel_0900_misc_TICK_1    = "\xC3\xA6";
const Shree_Tel_0900_misc_TICK_2    = "\xC3\xA7";               
const Shree_Tel_0900_misc_TICK_3    = "\xC3\xA8";

//
const Shree_Tel_0900_misc_vattu     = "\xC2\xAB";
           

//What are these for?
const Shree_Tel_0900_misc_UNKNOWN_1 = "\x2D";
const Shree_Tel_0900_misc_UNKNOWN_2 = "\xC3\xBC";
const Shree_Tel_0900_misc_UNKNOWN_3 = "\xC3\xBD";
const Shree_Tel_0900_misc_UNKNOWN_4 = "\xC3\xBE";
const Shree_Tel_0900_misc_UNKNOWN_5 = "\xC3\xBF";
const Shree_Tel_0900_misc_UNKNOWN_6 = "\xE2\x80\xBA";

}//end of class

$Shree_Tel_0900_toPadma = array();

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_candrabindu] = Padma::Padma_candrabindu;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_visarga]  = Padma::Padma_visarga;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_virama_1] = Padma::Padma_syllbreak;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_virama_2] = Padma::Padma_syllbreak;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_virama_3] = Padma::Padma_syllbreak;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_virama_4] = Padma::Padma_syllbreak;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_virama_5] = Padma::Padma_syllbreak;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_anusvara_1] = Padma::Padma_anusvara;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_anusvara_2] = Padma::Padma_anusvara;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_A] = Padma::Padma_vowel_A;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_AA] = Padma::Padma_vowel_AA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_I] = Padma::Padma_vowel_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_II] = Padma::Padma_vowel_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_U] = Padma::Padma_vowel_U;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_UU] = Padma::Padma_vowel_UU;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_E] = Padma::Padma_vowel_E;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_EE] = Padma::Padma_vowel_EE;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_R] = Padma::Padma_vowel_R;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_AI_1] = Padma::Padma_vowel_AI;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_AI_2] = Padma::Padma_vowel_AI;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_O] = Padma::Padma_vowel_O;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_OO] = Padma::Padma_vowel_OO;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowel_AU] = Padma::Padma_vowel_AU;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_KA] = Padma::Padma_consnt_KA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_GA] = Padma::Padma_consnt_GA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_GHA] = Padma::Padma_consnt_GHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_NGA] = Padma::Padma_consnt_NGA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_CA] = Padma::Padma_consnt_CA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_CHA] = Padma::Padma_consnt_CHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_JA_1] = Padma::Padma_consnt_JA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_JA_2] = Padma::Padma_consnt_JA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_JHA] = Padma::Padma_consnt_JHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_NYA] = Padma::Padma_consnt_NYA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_TTA_1] = Padma::Padma_consnt_TTA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_TTA_2] = Padma::Padma_consnt_TTA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_DDA] = Padma::Padma_consnt_DDA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_NNA] = Padma::Padma_consnt_NNA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_TA] = Padma::Padma_consnt_TA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_THA] = Padma::Padma_consnt_THA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_DA] = Padma::Padma_consnt_DA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_DHA] = Padma::Padma_consnt_DHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_NA] = Padma::Padma_consnt_NA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_PA_1] = Padma::Padma_consnt_PA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_PA_2] = Padma::Padma_consnt_PA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_PHA_1]  = Padma::Padma_consnt_PHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_PHA_2]  = Padma::Padma_consnt_PHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_BA_1] = Padma::Padma_consnt_BA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_BA_2] = Padma::Padma_consnt_BA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_BHA]  = Padma::Padma_consnt_BHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_MA]  = Padma::Padma_consnt_MA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_YA] = Padma::Padma_consnt_YA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_RA] = Padma::Padma_consnt_RA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_LA_1] = Padma::Padma_consnt_LA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_LA_2] = Padma::Padma_consnt_LA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_VA] = Padma::Padma_consnt_VA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_SHA] = Padma::Padma_consnt_SHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_SA_1] = Padma::Padma_consnt_SA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_SA_2] = Padma::Padma_consnt_SA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_HA] = Padma::Padma_consnt_HA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_LLA] = Padma::Padma_consnt_LLA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_consnt_RRA] = Padma::Padma_consnt_RRA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_conjct_KSHA_1] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_conjct_KSHA_2] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;

//Gunintamulu
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AA_4]  = Padma::Padma_vowelsn_AA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_R]     = Padma::Padma_vowelsn_R;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_EE_1]  = Padma::Padma_vowelsn_EE;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_EE_2]  = Padma::Padma_vowelsn_EE;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_EE_3]  = Padma::Padma_vowelsn_EE;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_OO_3]  = Padma::Padma_vowelsn_OO;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AU_4]  = Padma::Padma_vowelsn_AU;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;

//$Special Combinations
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_KHI]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_KHII]    = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_GI]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_GII]     = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_GHAA]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_CHII]    = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_JU]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_U;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_JUU]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_UU;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_JHAA]    = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_AA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_JHI]     = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_JHII]    = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_JHEE]    = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_EE;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_TTHI]     = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_TTHII]    = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_II;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_THI]     = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_THII]    = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_DI]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_DII]     = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_DHI]     = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_DHII]    = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_BII]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_BHII]    = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_MAA]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_ME]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_MEE]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EE;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_MO]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_O;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_MOO]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_OO;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_MAU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_YAA]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_YE]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_YEE]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_YO]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_O;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_YOO]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_OO;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_YPOLLU]  = Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_SHII]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_II;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_HAA]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_combo_SHRII]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA 
                                                          . Padma::Padma_vowelsn_II;

//Vattulu
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_KA]      = Padma::Padma_vattu_KA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_KHA]     = Padma::Padma_vattu_KHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_GA]      = Padma::Padma_vattu_GA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_GHA]     = Padma::Padma_vattu_GHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_NGA]     = Padma::Padma_vattu_NGA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_CA]      = Padma::Padma_vattu_CA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_CHA]     = Padma::Padma_vattu_CHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_JA]      = Padma::Padma_vattu_JA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_NYA]     = Padma::Padma_vattu_NYA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_TTA]     = Padma::Padma_vattu_TTA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_DDA]     = Padma::Padma_vattu_DDA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_DDHA]    = Padma::Padma_vattu_DDHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_NNA]     = Padma::Padma_vattu_NNA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_TA]      = Padma::Padma_vattu_TA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_THA]     = Padma::Padma_vattu_THA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_DA]      = Padma::Padma_vattu_DA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_DHA]     = Padma::Padma_vattu_DHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_NA]      = Padma::Padma_vattu_NA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_PA]      = Padma::Padma_vattu_PA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_PHA]     = Padma::Padma_vattu_PHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_BA]      = Padma::Padma_vattu_BA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_BHA]     = Padma::Padma_vattu_BHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_MA]      = Padma::Padma_vattu_MA;

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_YA]      = Padma::Padma_vattu_YA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_RA_2]    = Padma::Padma_vattu_RA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_LA]      = Padma::Padma_vattu_LA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_VA]      = Padma::Padma_vattu_VA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_SHA]     = Padma::Padma_vattu_SHA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_SSA]     = Padma::Padma_vattu_SSA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_SA]      = Padma::Padma_vattu_SA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_HA]      = Padma::Padma_vattu_HA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_LLA]     = Padma::Padma_vattu_LLA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_RRA]     = Padma::Padma_vattu_RRA;

//Conjuncts
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_SSMA]    = Padma::Padma_vattu_SSA . Padma::Padma_vattu_MA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_TRA]     = Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_TTRA]    = Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_vattu_PU]      = Padma::Padma_vattu_PA . Padma::Padma_vowelsn_U;

//Miscellaneous(where it doesn't match A$SCII representation)
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_extra_QTSINGLE] = Shree_Tel_0900::Shree_Tel_0900_QTSINGLE;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_extra_DBLQT]    = '"';
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_HYPHEN]         = "-";
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_ASTERISK]       = "*";

$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_misc_danda]     = Padma::Padma_danda;
$Shree_Tel_0900_toPadma[Shree_Tel_0900::Shree_Tel_0900_misc_ddanda]    = Padma::Padma_ddanda;

$Shree_Tel_0900_redundantList = array();
$Shree_Tel_0900_redundantList[Shree_Tel_0900::Shree_Tel_0900_misc_TICK_1] = true;
$Shree_Tel_0900_redundantList[Shree_Tel_0900::Shree_Tel_0900_misc_TICK_2] = true;
$Shree_Tel_0900_redundantList[Shree_Tel_0900::Shree_Tel_0900_misc_TICK_3] = true;
$Shree_Tel_0900_redundantList[Shree_Tel_0900::Shree_Tel_0900_misc_UNKNOWN_1] = true;
$Shree_Tel_0900_redundantList[Shree_Tel_0900::Shree_Tel_0900_misc_UNKNOWN_2] = true;
$Shree_Tel_0900_redundantList[Shree_Tel_0900::Shree_Tel_0900_misc_UNKNOWN_3] = true;
$Shree_Tel_0900_redundantList[Shree_Tel_0900::Shree_Tel_0900_misc_UNKNOWN_4] = true;
$Shree_Tel_0900_redundantList[Shree_Tel_0900::Shree_Tel_0900_misc_UNKNOWN_5] = true;
$Shree_Tel_0900_redundantList[Shree_Tel_0900::Shree_Tel_0900_misc_UNKNOWN_6] = true;

$Shree_Tel_0900_prefixList = array();
$Shree_Tel_0900_prefixList[Shree_Tel_0900::Shree_Tel_0900_virama_2]     = true;
$Shree_Tel_0900_prefixList[Shree_Tel_0900::Shree_Tel_0900_vowelsn_I_2]  = true;
$Shree_Tel_0900_prefixList[Shree_Tel_0900::Shree_Tel_0900_vowelsn_II_2] = true;
$Shree_Tel_0900_prefixList[Shree_Tel_0900::Shree_Tel_0900_vowelsn_E_3]  = true;
$Shree_Tel_0900_prefixList[Shree_Tel_0900::Shree_Tel_0900_vowelsn_EE_3] = true;
$Shree_Tel_0900_prefixList[Shree_Tel_0900::Shree_Tel_0900_vattu_RA_2]   = true;

$Shree_Tel_0900_overloadList = array();
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_vowelsn_I_2]  = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_consnt_PHA_1] = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_consnt_BA_1]  = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_consnt_VA]    = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_consnt_RA]    = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_combo_RI]     = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_combo_RII]    = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_combo_VI]     = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_combo_VII]    = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_misc_vattu]   = true;
$Shree_Tel_0900_overloadList["\xC2\xBA\x24"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x90\xC3\xB0"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x90\xC3\xB0\x24"]        = true;
$Shree_Tel_0900_overloadList["\xC3\x90\xC3\xB3"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x90\xC5\x92"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x84"]                    = true;
$Shree_Tel_0900_overloadList["\xC3\x84\xC3\xB1"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x84\xC3\xB1\x24"]        = true;
$Shree_Tel_0900_overloadList["\xC3\x84\xC3\xB4"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x84\xC5\x92"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x86\x24"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x86\x6E"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x86\xC3\xB3"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x86\xC3\xB3\x6E"]        = true;
$Shree_Tel_0900_overloadList["\xC3\x87\x6E"]              = true;
$Shree_Tel_0900_overloadList["\xC3\x88\x6E"]              = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_extra_QTSINGLE]  = true;
$Shree_Tel_0900_overloadList[Shree_Tel_0900::Shree_Tel_0900_misc_danda]   = true;

function Shree_Tel_0900_initialize()
{
    global $fontinfo;

    $fontinfo["shree-tel-0900"]["language"] = "Telugu";
    $fontinfo["shree-tel-0900"]["class"] = "Shree_Tel_0900";
}
?>
