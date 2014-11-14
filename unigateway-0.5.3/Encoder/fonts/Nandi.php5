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

//NANDI Kannada
class Nandi
{

function Nandi()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "KNW-TTNandi";
var $displayName  = "Nandi";
var $script       = Padma::Padma_script_KANNADA;
var $hasSuffixes  = true;

function lookup ($str) 
{
    global $Nandi_toPadma;
    return $Nandi_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    return false; //Nandi_prefixList[$str] != null;
}

 function isOverloaded ($str)
{
    global $Nandi_overloadList;
    return $Nandi_overloadList[$str] != null;
}

 function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if (($sign2 == Padma::Padma_vowelsn_I && $sign1 == Padma::Padma_vowelsn_IILEN) || 
        ($sign1 == Padma::Padma_vowelsn_I && $sign2 == Padma::Padma_vowelsn_IILEN))
        return Padma::Padma_vowelsn_II;
    if (($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_IILEN) || 
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_IILEN))
        return Padma::Padma_vowelsn_EE;
    if (($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN) || 
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AILEN))
        return Padma::Padma_vowelsn_AI;
    if (($sign2 == Padma::Padma_vowelsn_O && $sign1 == Padma::Padma_vowelsn_IILEN) || 
        ($sign1 == Padma::Padma_vowelsn_O && $sign2 == Padma::Padma_vowelsn_IILEN))
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;
}

 function isRedundant ($str)
{
    global  $Nandi_redundantList;
    return $Nandi_redundantList[$str] != null;
}

 function isSuffixSymbol ($str)
{
    global $Nandi_suffixList;
    return $Nandi_suffixList[$str] != null;
}

//Implementation details start here

//0x26, AD,  DC, EC

//Specials
const Nandi_visarga        = "\x4E";
const Nandi_anusvara       = "\x4D";
const Nandi_virama         = "\xC3\xA9";

//Vowels
const Nandi_vowel_A        = "\x40";
const Nandi_vowel_AA       = "\x41";
const Nandi_vowel_I        = "\x42";
const Nandi_vowel_II       = "\x43";
const Nandi_vowel_U        = "\x44";
const Nandi_vowel_UU       = "\x45";
const Nandi_vowel_R_1      = "\x46\xC3\x9F";
const Nandi_vowel_R_2      = "\x46\xC3\xA1";
const Nandi_vowel_R_3      = "\x46\xC3\xA2";
const Nandi_vowel_RR_1     = "\x46\xC3\xA0";
const Nandi_vowel_RR_2     = "\x46\xC3\xA3";
const Nandi_vowel_E        = "\x47";
const Nandi_vowel_EE       = "\x48";
const Nandi_vowel_AI       = "\x49";
const Nandi_vowel_O        = "\x4A";
const Nandi_vowel_OO       = "\x4B";
const Nandi_vowel_AU       = "\x4C";

//Consonants
const Nandi_consnt_KA      = "\x4F";
const Nandi_consnt_KHA_1   = "\x52";
const Nandi_consnt_KHA_2   = "\x53";
const Nandi_consnt_GA      = "\x56";
const Nandi_consnt_GHA     = "\x59";
const Nandi_consnt_NGA     = "\x5C";

const Nandi_consnt_CA      = "\x5E";
const Nandi_consnt_CHA     = "\x61";
const Nandi_consnt_JA_1    = "\x64";
const Nandi_consnt_JA_2    = "\x65";
const Nandi_consnt_JHA_1   = "\xC3\x81\x68\xC3\x9F";
const Nandi_consnt_JHA_2   = "\xC3\x81\x68\xC3\xA1";
const Nandi_consnt_JHA_3   = "\xC3\x81\x68\xC3\xA2";
const Nandi_consnt_NYA     = "\x6A";

const Nandi_consnt_TTA_1   = "\x6C";
const Nandi_consnt_TTA_2   = "\x6D";
const Nandi_consnt_TTHA    = "\x70";
const Nandi_consnt_DDA     = "\x73";
const Nandi_consnt_DDHA    = "\x76";
const Nandi_consnt_NNA_1   = "\x79";
const Nandi_consnt_NNA_2   = "\x7A";

const Nandi_consnt_TA      = "\x7D";
const Nandi_consnt_THA     = "\xC2\xA2";
const Nandi_consnt_DA      = "\xC2\xA5";
const Nandi_consnt_DHA     = "\xC2\xA8";
const Nandi_consnt_NA      = "\xC2\xAB";

const Nandi_consnt_PA      = "\xC2\xAE";
const Nandi_consnt_PHA     = "\xC2\xB1";
const Nandi_consnt_BA_1    = "\xE2\x80\xA6";
const Nandi_consnt_BA_2    = "\xE2\x80\xA0";
const Nandi_consnt_BHA     = "\xC2\xBA";
const Nandi_consnt_MA_1    = "\xC3\x88\xC3\x9F"; //Y
const Nandi_consnt_MA_2    = "\xC3\x88\xC3\xA1"; //Y
const Nandi_consnt_MA_3    = "\xC3\x88\xC3\xA2"; //Y

const Nandi_consnt_YA_1    = "\xC2\xBE\xC3\x9F"; //Y
const Nandi_consnt_YA_2    = "\xC2\xBE\xC3\xA1"; //Y
const Nandi_consnt_YA_3    = "\xC2\xBE\xC3\xA2"; //Y
const Nandi_consnt_RA      = "\xC3\x81";
const Nandi_consnt_LA_1    = "\xC3\x84";
const Nandi_consnt_LA_2    = "\xC3\x85";    
const Nandi_consnt_VA      = "\xC3\x88";
const Nandi_consnt_SHA     = "\xC3\x8B";
const Nandi_consnt_SSA     = "\xC3\x8E";
const Nandi_consnt_SA      = "\xC3\x91";
const Nandi_consnt_HA      = "\xC3\x94";
const Nandi_consnt_LLA     = "\xC3\x97";

//Gunintamulu
const Nandi_vowelsn_AA     = "\xC3\x9B";
const Nandi_vowelsn_I      = "\xC3\x9D";
const Nandi_vowelsn_U_1    = "\xC3\x9F";
const Nandi_vowelsn_U_2    = "\xC3\xA1";
const Nandi_vowelsn_U_3    = "\xC3\xA2";
const Nandi_vowelsn_UU_1   = "\xC3\xA0";
const Nandi_vowelsn_UU_2   = "\xC3\xA3";
const Nandi_vowelsn_R      = "\xC3\xA4";
const Nandi_vowelsn_RR     = "\xC3\xA5";
const Nandi_vowelsn_E      = "\xC3\xA6";
const Nandi_vowelsn_O_1    = "\xC3\xA6\xC3\xA0";
const Nandi_vowelsn_O_2    = "\xC3\xA6\xC3\xA3";
const Nandi_vowelsn_AU     = "\xC3\xA8";

const Nandi_vowelsn_IILEN    = "\xC3\x9E";
const Nandi_vowelsn_AILEN    = "\xC3\xA7";

//Special Combinations
const Nandi_combo_KI       = "\x50";
const Nandi_combo_KHI      = "\x54";
const Nandi_combo_GI       = "\x57";
const Nandi_combo_GHI      = "\x5A";

const Nandi_combo_CI       = "\x5F";
const Nandi_combo_CHI      = "\x62";
const Nandi_combo_JI       = "\x66";

const Nandi_combo_TTI      = "\x6E";
const Nandi_combo_TTHI     = "\x71";
const Nandi_combo_DDI      = "\x74";
const Nandi_combo_DDHI     = "\x77";
const Nandi_combo_NNI      = "\x7B";

const Nandi_combo_TI       = "\x7E";
const Nandi_combo_THI      = "\xC2\xA3";
const Nandi_combo_DI       = "\xC2\xA6";
const Nandi_combo_DHI      = "\xC6\x92";
const Nandi_combo_NI       = "\xC2\xAC";

const Nandi_combo_PI       = "\xC2\xAF";
const Nandi_combo_PHI      = "\xC2\xB2";
const Nandi_combo_BI       = "\xC2\xB8";
const Nandi_combo_BHI      = "\xC2\xBB";
const Nandi_combo_MI_1     = "\xC3\x89\xC3\x9F";
const Nandi_combo_MI_2     = "\xC3\x89\xC3\xA1";
const Nandi_combo_MI_3     = "\xC3\x89\xC3\xA2";
const Nandi_combo_ME       = "\xC3\x88\xC3\xA6\xC3\x9F";
const Nandi_combo_MO       = "\xC3\x88\xC3\xA6\xC3\xA0";

const Nandi_combo_YI       = "\xC2\xBF\xC3\x9F";
const Nandi_combo_YE       = "\xC2\xBE\xC3\xA6\xC3\x9F";
const Nandi_combo_YO       = "\xC2\xBE\xC3\xA6\xC3\xA0";
const Nandi_combo_RI       = "\xC3\x82";
const Nandi_combo_LI       = "\xC3\x86";
const Nandi_combo_VI       = "\xC3\x89";
const Nandi_combo_SHI      = "\xC3\x8C";
const Nandi_combo_SSI      = "\xC3\x8F";
const Nandi_combo_SI       = "\xC3\x92";
const Nandi_combo_HI       = "\xC3\x95";
const Nandi_combo_LLI      = "\xC3\x98";
const Nandi_combo_SHRII    = "\x2A";

//Vattulu
const Nandi_vattu_KA       = "\x51";
const Nandi_vattu_KR       = "\xC3\xAD";
const Nandi_vattu_KHA      = "\x55";
const Nandi_vattu_GA       = "\x58";
const Nandi_vattu_GHA      = "\x5B";
const Nandi_vattu_NGA      = "\x5D";

const Nandi_vattu_CA       = "\x60";
const Nandi_vattu_CHA      = "\x63";
const Nandi_vattu_JA       = "\x67";
const Nandi_vattu_JHA_1    = "\x24";
const Nandi_vattu_JHA_2    = "\x69";
const Nandi_vattu_NYA      = "\x6B";

const Nandi_vattu_TTA      = "\x6F";
const Nandi_vattu_TTHA     = "\x72";
const Nandi_vattu_DDA      = "\x75";
const Nandi_vattu_DDHA     = "\x78";
const Nandi_vattu_NNA      = "\x7C";

const Nandi_vattu_TA       = "\xC2\xA1";
const Nandi_vattu_TU       = "\xC3\xAA";
const Nandi_vattu_TAI      = "\xC3\xAB";
const Nandi_vattu_THA      = "\xC2\xA4";
const Nandi_vattu_DA       = "\xC2\xA7";
const Nandi_vattu_DHA      = "\xC2\xAA";
const Nandi_vattu_NA       = "\xE2\x80\x9E";

const Nandi_vattu_PA       = "\xC2\xB0";
const Nandi_vattu_PHA      = "\xC2\xB5";
const Nandi_vattu_BA       = "\xC2\xB9";
const Nandi_vattu_BHA      = "\xC2\xBC";
const Nandi_vattu_MA       = "\xC2\xBD";

const Nandi_vattu_YA       = "\xC3\x80";
const Nandi_vattu_RA_1     = "\xC3\x83";
const Nandi_vattu_RA_2     = "\xC3\xAF";
const Nandi_vattu_RA_3     = "\xC3\xB0";
const Nandi_vattu_RA_4     = "\xC3\xB1";
const Nandi_vattu_RA_R     = "\xC3\xAE";
const Nandi_vattu_LA       = "\xC3\x87";
const Nandi_vattu_VA       = "\xE2\x80\xA1";
const Nandi_vattu_SHA      = "\xC3\x8D";
const Nandi_vattu_SSA      = "\xC3\x90";
const Nandi_vattu_SA       = "\xC3\x93";
const Nandi_vattu_HA       = "\xC3\x96";
const Nandi_vattu_LLA      = "\xC3\x99";

//half forms of RA
const Nandi_halffm_RA      = "\x25";

//Digits
const Nandi_digit_ZERO     = "\x30";
const Nandi_digit_ONE      = "\x31";
const Nandi_digit_TWO      = "\x32";
const Nandi_digit_THREE    = "\x33";
const Nandi_digit_FOUR     = "\x34";
const Nandi_digit_FIVE     = "\x35";
const Nandi_digit_SIX      = "\x36";
const Nandi_digit_SEVEN    = "\x37";
const Nandi_digit_EIGHT    = "\x38";
const Nandi_digit_NINE     = "\x39";

//Matches ASCII
const Nandi_EXCLAM         = "\x21";
const Nandi_PARENLEFT      = "\x28";
const Nandi_PARENRIGT      = "\x29";
const Nandi_COMMA          = "\x2C";
const Nandi_PERIOD         = "\x2E";
const Nandi_SLASH          = "\x2F";
const Nandi_COLON          = "\x3A";
const Nandi_SEMICOLON      = "\x3B";
const Nandi_QUESTION       = "\x3F";

const Nandi_LQTSINGLE      = "\x22";
const Nandi_RQTSINGLE      = "\x27";
const Nandi_misc_DANDA     = "\x2B";

//Kommu
const Nandi_misc_TICK_1    = "\xC3\x9A";

const Nandi_misc_UNKNOWN_1 = "\x3C";
const Nandi_misc_UNKNOWN_2 = "\x3D";
const Nandi_misc_UNKNOWN_3 = "\x3E";
const Nandi_misc_UNKNOWN_4 = "\xC2\xB3";
const Nandi_misc_UNKNOWN_5 = "\xC2\xB4";
}//end of class

$Nandi_toPadma = array ();

$Nandi_toPadma[Nandi::Nandi_visarga]  = Padma::Padma_visarga;
$Nandi_toPadma[Nandi::Nandi_anusvara] = Padma::Padma_anusvara;
$Nandi_toPadma[Nandi::Nandi_virama]   = Padma::Padma_syllbreak;

$Nandi_toPadma[Nandi::Nandi_vowel_A]    = Padma::Padma_vowel_A;
$Nandi_toPadma[Nandi::Nandi_vowel_AA]   = Padma::Padma_vowel_AA;
$Nandi_toPadma[Nandi::Nandi_vowel_I]    = Padma::Padma_vowel_I;
$Nandi_toPadma[Nandi::Nandi_vowel_II]   = Padma::Padma_vowel_II;
$Nandi_toPadma[Nandi::Nandi_vowel_U]    = Padma::Padma_vowel_U;
$Nandi_toPadma[Nandi::Nandi_vowel_UU]   = Padma::Padma_vowel_UU;
$Nandi_toPadma[Nandi::Nandi_vowel_R_1]  = Padma::Padma_vowel_R;
$Nandi_toPadma[Nandi::Nandi_vowel_R_2]  = Padma::Padma_vowel_R;
$Nandi_toPadma[Nandi::Nandi_vowel_R_3]  = Padma::Padma_vowel_R;
$Nandi_toPadma[Nandi::Nandi_vowel_RR_1] = Padma::Padma_vowel_RR;
$Nandi_toPadma[Nandi::Nandi_vowel_RR_2] = Padma::Padma_vowel_RR;
$Nandi_toPadma[Nandi::Nandi_vowel_E]    = Padma::Padma_vowel_E;
$Nandi_toPadma[Nandi::Nandi_vowel_EE]   = Padma::Padma_vowel_EE;
$Nandi_toPadma[Nandi::Nandi_vowel_AI]   = Padma::Padma_vowel_AI;
$Nandi_toPadma[Nandi::Nandi_vowel_O]    = Padma::Padma_vowel_O;
$Nandi_toPadma[Nandi::Nandi_vowel_OO]   = Padma::Padma_vowel_OO;
$Nandi_toPadma[Nandi::Nandi_vowel_AU]   = Padma::Padma_vowel_AU;

$Nandi_toPadma[Nandi::Nandi_consnt_KA]    = Padma::Padma_consnt_KA;
$Nandi_toPadma[Nandi::Nandi_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Nandi_toPadma[Nandi::Nandi_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Nandi_toPadma[Nandi::Nandi_consnt_GA]    = Padma::Padma_consnt_GA;
$Nandi_toPadma[Nandi::Nandi_consnt_GHA]   = Padma::Padma_consnt_GHA;
$Nandi_toPadma[Nandi::Nandi_consnt_NGA]   = Padma::Padma_consnt_NGA;

$Nandi_toPadma[Nandi::Nandi_consnt_CA]    = Padma::Padma_consnt_CA;
$Nandi_toPadma[Nandi::Nandi_consnt_CHA]   = Padma::Padma_consnt_CHA;
$Nandi_toPadma[Nandi::Nandi_consnt_JA_1]  = Padma::Padma_consnt_JA;
$Nandi_toPadma[Nandi::Nandi_consnt_JA_2]  = Padma::Padma_consnt_JA;
$Nandi_toPadma[Nandi::Nandi_consnt_JHA_1] = Padma::Padma_consnt_JHA;
$Nandi_toPadma[Nandi::Nandi_consnt_JHA_2] = Padma::Padma_consnt_JHA;
$Nandi_toPadma[Nandi::Nandi_consnt_JHA_3] = Padma::Padma_consnt_JHA;
$Nandi_toPadma[Nandi::Nandi_consnt_NYA]   = Padma::Padma_consnt_NYA;

$Nandi_toPadma[Nandi::Nandi_consnt_TTA_1] = Padma::Padma_consnt_TTA;
$Nandi_toPadma[Nandi::Nandi_consnt_TTA_2] = Padma::Padma_consnt_TTA;
$Nandi_toPadma[Nandi::Nandi_consnt_TTHA]  = Padma::Padma_consnt_TTHA;
$Nandi_toPadma[Nandi::Nandi_consnt_DDA]   = Padma::Padma_consnt_DDA;
$Nandi_toPadma[Nandi::Nandi_consnt_DDHA]  = Padma::Padma_consnt_DDHA;
$Nandi_toPadma[Nandi::Nandi_consnt_NNA_1] = Padma::Padma_consnt_NNA;
$Nandi_toPadma[Nandi::Nandi_consnt_NNA_2] = Padma::Padma_consnt_NNA;

$Nandi_toPadma[Nandi::Nandi_consnt_TA]  = Padma::Padma_consnt_TA;
$Nandi_toPadma[Nandi::Nandi_consnt_THA] = Padma::Padma_consnt_THA;
$Nandi_toPadma[Nandi::Nandi_consnt_DA]  = Padma::Padma_consnt_DA;
$Nandi_toPadma[Nandi::Nandi_consnt_DHA] = Padma::Padma_consnt_DHA;
$Nandi_toPadma[Nandi::Nandi_consnt_NA]  = Padma::Padma_consnt_NA;

$Nandi_toPadma[Nandi::Nandi_consnt_PA]   = Padma::Padma_consnt_PA;
$Nandi_toPadma[Nandi::Nandi_consnt_PHA]  = Padma::Padma_consnt_PHA;
$Nandi_toPadma[Nandi::Nandi_consnt_BA_1] = Padma::Padma_consnt_BA;
$Nandi_toPadma[Nandi::Nandi_consnt_BA_2] = Padma::Padma_consnt_BA;
$Nandi_toPadma[Nandi::Nandi_consnt_BHA]  = Padma::Padma_consnt_BHA;
$Nandi_toPadma[Nandi::Nandi_consnt_MA_1] = Padma::Padma_consnt_MA;
$Nandi_toPadma[Nandi::Nandi_consnt_MA_2] = Padma::Padma_consnt_MA;
$Nandi_toPadma[Nandi::Nandi_consnt_MA_3] = Padma::Padma_consnt_MA;

$Nandi_toPadma[Nandi::Nandi_consnt_YA_1] = Padma::Padma_consnt_YA;
$Nandi_toPadma[Nandi::Nandi_consnt_YA_2] = Padma::Padma_consnt_YA;
$Nandi_toPadma[Nandi::Nandi_consnt_YA_3] = Padma::Padma_consnt_YA;
$Nandi_toPadma[Nandi::Nandi_consnt_RA]   = Padma::Padma_consnt_RA;
$Nandi_toPadma[Nandi::Nandi_consnt_LA_1] = Padma::Padma_consnt_LA;
$Nandi_toPadma[Nandi::Nandi_consnt_LA_2] = Padma::Padma_consnt_LA;
$Nandi_toPadma[Nandi::Nandi_consnt_VA]   = Padma::Padma_consnt_VA;
$Nandi_toPadma[Nandi::Nandi_consnt_SHA]  = Padma::Padma_consnt_SHA;
$Nandi_toPadma[Nandi::Nandi_consnt_SSA]  = Padma::Padma_consnt_SSA;
$Nandi_toPadma[Nandi::Nandi_consnt_SA]   = Padma::Padma_consnt_SA;
$Nandi_toPadma[Nandi::Nandi_consnt_HA]   = Padma::Padma_consnt_HA;
$Nandi_toPadma[Nandi::Nandi_consnt_LLA]  = Padma::Padma_consnt_LLA;

//Gunintamulu
$Nandi_toPadma[Nandi::Nandi_vowelsn_AA]    = Padma::Padma_vowelsn_AA;
$Nandi_toPadma[Nandi::Nandi_vowelsn_I]     = Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$Nandi_toPadma[Nandi::Nandi_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$Nandi_toPadma[Nandi::Nandi_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$Nandi_toPadma[Nandi::Nandi_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$Nandi_toPadma[Nandi::Nandi_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$Nandi_toPadma[Nandi::Nandi_vowelsn_R]     = Padma::Padma_vowelsn_R;
$Nandi_toPadma[Nandi::Nandi_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$Nandi_toPadma[Nandi::Nandi_vowelsn_E]     = Padma::Padma_vowelsn_E;
$Nandi_toPadma[Nandi::Nandi_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$Nandi_toPadma[Nandi::Nandi_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$Nandi_toPadma[Nandi::Nandi_vowelsn_AU]    = Padma::Padma_vowelsn_AU;
$Nandi_toPadma[Nandi::Nandi_vowelsn_IILEN] = Padma::Padma_vowelsn_IILEN;
$Nandi_toPadma[Nandi::Nandi_vowelsn_AILEN] = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$Nandi_toPadma[Nandi::Nandi_combo_KI]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_KHI]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_GI]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_GHI]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_I;

$Nandi_toPadma[Nandi::Nandi_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;

$Nandi_toPadma[Nandi::Nandi_combo_TTI]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_TTHI]    = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_DDI]     = Padma::Padma_consnt_DDA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_DDHI]    = Padma::Padma_consnt_DDHA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_NNI]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_I;

$Nandi_toPadma[Nandi::Nandi_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_THI]     = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_DI]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_DHI]     = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;

$Nandi_toPadma[Nandi::Nandi_combo_PI]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_PHI]     = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_MI_1]    = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_MI_2]    = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_MI_3]    = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_ME]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
$Nandi_toPadma[Nandi::Nandi_combo_MO]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_O;

$Nandi_toPadma[Nandi::Nandi_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_YE]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$Nandi_toPadma[Nandi::Nandi_combo_YO]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_O;
$Nandi_toPadma[Nandi::Nandi_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_SSI]     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_SI]      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_HI]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$Nandi_toPadma[Nandi::Nandi_combo_SHRII]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;

//Vattulu
$Nandi_toPadma[Nandi::Nandi_vattu_KA]      = Padma::Padma_vattu_KA;
$Nandi_toPadma[Nandi::Nandi_vattu_KR]      = Padma::Padma_vattu_KA . Padma::Padma_vowelsn_R;
$Nandi_toPadma[Nandi::Nandi_vattu_KHA]     = Padma::Padma_vattu_KHA;
$Nandi_toPadma[Nandi::Nandi_vattu_GA]      = Padma::Padma_vattu_GA;
$Nandi_toPadma[Nandi::Nandi_vattu_GHA]     = Padma::Padma_vattu_GHA;
$Nandi_toPadma[Nandi::Nandi_vattu_NGA]     = Padma::Padma_vattu_NGA;

$Nandi_toPadma[Nandi::Nandi_vattu_CA]      = Padma::Padma_vattu_CA;
$Nandi_toPadma[Nandi::Nandi_vattu_CHA]     = Padma::Padma_vattu_CHA;
$Nandi_toPadma[Nandi::Nandi_vattu_JA]      = Padma::Padma_vattu_JA;
$Nandi_toPadma[Nandi::Nandi_vattu_JHA_1]   = Padma::Padma_vattu_JHA;
$Nandi_toPadma[Nandi::Nandi_vattu_JHA_2]   = Padma::Padma_vattu_JHA;
$Nandi_toPadma[Nandi::Nandi_vattu_NYA]     = Padma::Padma_vattu_NYA;

$Nandi_toPadma[Nandi::Nandi_vattu_TTA]     = Padma::Padma_vattu_TTA;
$Nandi_toPadma[Nandi::Nandi_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$Nandi_toPadma[Nandi::Nandi_vattu_DDA]     = Padma::Padma_vattu_DDA;
$Nandi_toPadma[Nandi::Nandi_vattu_DDHA]    = Padma::Padma_vattu_DDHA;
$Nandi_toPadma[Nandi::Nandi_vattu_NNA]     = Padma::Padma_vattu_NNA;

$Nandi_toPadma[Nandi::Nandi_vattu_TA]      = Padma::Padma_vattu_TA;
$Nandi_toPadma[Nandi::Nandi_vattu_TU]      = Padma::Padma_vattu_TA . Padma::Padma_vowelsn_U;
$Nandi_toPadma[Nandi::Nandi_vattu_TAI]     = Padma::Padma_vattu_TA . Padma::Padma_vowelsn_AI;
$Nandi_toPadma[Nandi::Nandi_vattu_THA]     = Padma::Padma_vattu_THA;
$Nandi_toPadma[Nandi::Nandi_vattu_DA]      = Padma::Padma_vattu_DA;
$Nandi_toPadma[Nandi::Nandi_vattu_DHA]     = Padma::Padma_vattu_DHA;
$Nandi_toPadma[Nandi::Nandi_vattu_NA]      = Padma::Padma_vattu_NA;

$Nandi_toPadma[Nandi::Nandi_vattu_PA]      = Padma::Padma_vattu_PA;
$Nandi_toPadma[Nandi::Nandi_vattu_PHA]     = Padma::Padma_vattu_PHA;
$Nandi_toPadma[Nandi::Nandi_vattu_BA]      = Padma::Padma_vattu_BA;
$Nandi_toPadma[Nandi::Nandi_vattu_BHA]     = Padma::Padma_vattu_BHA;
$Nandi_toPadma[Nandi::Nandi_vattu_MA]      = Padma::Padma_vattu_MA;

$Nandi_toPadma[Nandi::Nandi_vattu_YA]      = Padma::Padma_vattu_YA;
$Nandi_toPadma[Nandi::Nandi_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Nandi_toPadma[Nandi::Nandi_vattu_RA_2]    = Padma::Padma_vattu_RA;
$Nandi_toPadma[Nandi::Nandi_vattu_RA_3]    = Padma::Padma_vattu_RA;
$Nandi_toPadma[Nandi::Nandi_vattu_RA_4]    = Padma::Padma_vattu_RA;
$Nandi_toPadma[Nandi::Nandi_vattu_RA_R]    = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_R;
$Nandi_toPadma[Nandi::Nandi_vattu_LA]      = Padma::Padma_vattu_LA;
$Nandi_toPadma[Nandi::Nandi_vattu_VA]      = Padma::Padma_vattu_VA;
$Nandi_toPadma[Nandi::Nandi_vattu_SHA]     = Padma::Padma_vattu_SHA;
$Nandi_toPadma[Nandi::Nandi_vattu_SSA]     = Padma::Padma_vattu_SSA;
$Nandi_toPadma[Nandi::Nandi_vattu_SA]      = Padma::Padma_vattu_SA;
$Nandi_toPadma[Nandi::Nandi_vattu_HA]      = Padma::Padma_vattu_HA;
$Nandi_toPadma[Nandi::Nandi_vattu_LLA]     = Padma::Padma_vattu_LLA;

//Half forms
$Nandi_toPadma[Nandi::Nandi_halffm_RA]     = Padma::Padma_halffm_RA;

//Digits
$Nandi_toPadma[Nandi::Nandi_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Nandi_toPadma[Nandi::Nandi_digit_ONE]     = Padma::Padma_digit_ONE;
$Nandi_toPadma[Nandi::Nandi_digit_TWO]     = Padma::Padma_digit_TWO;
$Nandi_toPadma[Nandi::Nandi_digit_THREE]   = Padma::Padma_digit_THREE;
$Nandi_toPadma[Nandi::Nandi_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Nandi_toPadma[Nandi::Nandi_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Nandi_toPadma[Nandi::Nandi_digit_SIX]     = Padma::Padma_digit_SIX;
$Nandi_toPadma[Nandi::Nandi_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Nandi_toPadma[Nandi::Nandi_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Nandi_toPadma[Nandi::Nandi_digit_NINE]    = Padma::Padma_digit_NINE;

$Nandi_toPadma[Nandi::Nandi_LQTSINGLE]  = "\xE2\x80\x98";
$Nandi_toPadma[Nandi::Nandi_RQTSINGLE]  = "\xE2\x80\x99";
$Nandi_toPadma[Nandi::Nandi_misc_DANDA] = Padma::Padma_danda;

$Nandi_redundantList = array();
$Nandi_redundantList[Nandi::Nandi_misc_TICK_1]    = true;
$Nandi_redundantList[Nandi::Nandi_misc_UNKNOWN_1] = true;
$Nandi_redundantList[Nandi::Nandi_misc_UNKNOWN_2] = true;
$Nandi_redundantList[Nandi::Nandi_misc_UNKNOWN_3] = true;
$Nandi_redundantList[Nandi::Nandi_misc_UNKNOWN_4] = true;
$Nandi_redundantList[Nandi::Nandi_misc_UNKNOWN_5] = true;

$Nandi_overloadList =array ();
$Nandi_overloadList[Nandi::Nandi_consnt_RA] = true;
$Nandi_overloadList[Nandi::Nandi_consnt_VA] = true;
$Nandi_overloadList[Nandi::Nandi_vowelsn_E] = true;
$Nandi_overloadList[Nandi::Nandi_combo_VI]  = true;
$Nandi_overloadList["\x46"]        = true;
$Nandi_overloadList["\xC2\xBE"]        = true;
$Nandi_overloadList["\xC2\xBE\xC3\xA6"]  = true;
$Nandi_overloadList["\xC2\xBF"]        = true;
$Nandi_overloadList["\xC3\x81\x68"]  = true;
$Nandi_overloadList["\xC3\x88\xC3\xA6"]  = true;

$Nandi_suffixList = array ();
$Nandi_suffixList[Nandi::Nandi_halffm_RA]     = true;

function Nandi_initialize()
{
    global $fontinfo;

    $fontinfo["knw-ttnandi"]["language"] = "Kannada";
    $fontinfo["knw-ttnandi"]["class"] = "Nandi";
}
?>
