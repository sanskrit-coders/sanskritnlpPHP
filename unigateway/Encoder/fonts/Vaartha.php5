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


class Vaartha
{
function Vaartha()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "Vaartha";
var $displayName  = "Vaartha";
var $script       = Padma::Padma_script_TELUGU;

function lookup($str) 
{
    global $Vaartha_toPadma;
    return $Vaartha_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Vaartha_prefixList;
    return $Vaartha_prefixList[$str] != null;
}

function isOverloaded($str)
{
    global $Vaartha_overloadList;
    return $Vaartha_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if ($sign1 == Padma::Padma_vowelsn_E) {
        if ($sign2 == Padma::Padma_vowelsn_AILEN)
            return Padma::Padma_vowelsn_AI;
    }
    return $sign1 . $sign2;
}

//1. Remove redundant symbols (ra and sunna are overloaded... argh!!!)
function preprocessMessage($input)
{
     $output = ""; $last = null;
    //1.
    $input_len=utf8_strlen($input);
    for( $i = 0; $i < $input_len; ++$i) {
         $cur = utf8_substr($input,$i,1); 
        if (!Vaartha::isRedundant($cur, $last))
            $output .= $last = $cur;
    }
    return $output;

}

function isRedundant($str, $prev)
{
     global $Vaartha_redundantList;
      if ($str == Vaartha::Vaartha_misc_TICK_4 && $prev == Vaartha::Vaartha_anusvara)
        return false;
    return $Vaartha_redundantList[$str] != null;
 }
		     



//Implementation details start here

//left - 0x5D,
//0x6E, 0x78, 0x7C-0x81, 0x89-0x8A, 0x8D-0x90, 0x96, 0x98, 0x9A, 0x9D, 0x9E, 0xA6, 0xAD, 0xB2, 0xB3,
//0xB5, 0xB9, 0xBC-0XBE, 0xD0, 0xD7, 0xDD, 0xDE, 0xF0, 0xFD, 0xFE

//Specials
const Vaartha_visarga        = "\x38";
const Vaartha_virama_1       = "\x32";
const Vaartha_virama_2       = "\x52";
const Vaartha_virama_3       = "\x60";
const Vaartha_virama_4       = "\xC3\xB7";
const Vaartha_anusvara       = "\xC2\xA7";

//const Vowels
const Vaartha_vowel_A        = "\x36";
const Vaartha_vowel_AA       = "\xC2\xBB";
const Vaartha_vowel_I        = "\xE2\x80\x9A";
const Vaartha_vowel_II       = "\xC6\x92";
const Vaartha_vowel_U        = "\xE2\x80\x9E";
const Vaartha_vowel_UU       = "\xE2\x80\xA6";
const Vaartha_vowel_R        = "\xE2\x80\xA0";
const Vaartha_vowel_E        = "\xE2\x80\xA1";
const Vaartha_vowel_EE       = "\xCB\x86";
const Vaartha_vowel_AI       = "\x22";
const Vaartha_vowel_O        = "\x27";
const Vaartha_vowel_OO       = "\xE2\x80\xB9";
const Vaartha_vowel_AU       = "\xC5\x92";

//Consonants
const Vaartha_consnt_KA      = "\xC2\xB6";
const Vaartha_consnt_KHA     = "\xC5\xB8";
const Vaartha_consnt_GA      = "\xC2\xB8";
const Vaartha_consnt_GHA     = "\xC2\xA1\x6C\xC3\x85";
const Vaartha_consnt_NGA     = "\xE2\x80\x9C";

const Vaartha_consnt_CA      = "\xC3\xBA";
const Vaartha_consnt_CHA     = "\xC3\xBA\x6C";
const Vaartha_consnt_JA      = "\x5E";
//const Vaartha_consnt_JHA     = "\xE2\x80\x94";
const Vaartha_consnt_NYA     = "\xC3\xB9";

const Vaartha_consnt_TTA     = "\x64";
const Vaartha_consnt_TTHA    = "\xC2\xA7\x73";
const Vaartha_consnt_DDA     = "\xE2\x80\x9D";
const Vaartha_consnt_DDHA    = "\xE2\x80\x9D\x6C";
const Vaartha_consnt_NNA     = "\xE2\x80\xBA";

const Vaartha_consnt_TA      = "\xC5\x93";
const Vaartha_consnt_THA     = "\x34\xC2\xBA";
const Vaartha_consnt_DA      = "\x34";
const Vaartha_consnt_DHA_1   = "\x34\x6C";
const Vaartha_consnt_DHA_2   = "\x34\xC2\xBA";
const Vaartha_consnt_NA      = "\x5B";

const Vaartha_consnt_PA_1    = "\xC2\xA1";
const Vaartha_consnt_PA_2    = "\xC2\xB1";
const Vaartha_consnt_PHA_1   = "\xC2\xA1\x6C";
const Vaartha_consnt_PHA_2   = "\xC2\xB1\x6C";
const Vaartha_consnt_BA      = "\xC2\xA3";
const Vaartha_consnt_BHA     = "\xC2\xA3\x6C";
const Vaartha_consnt_MA      = "\xC2\xA5\xC3\x85";

const Vaartha_consnt_YA      = "\x31\xC3\x85";
const Vaartha_consnt_RA      = "\xC2\xA7\x75";
const Vaartha_consnt_LA      = "\x51";
const Vaartha_consnt_VA      = "\xC2\xA5";
const Vaartha_consnt_SHA     = "\xC2\xAA";
const Vaartha_consnt_SSA_1   = "\xC2\xAB";
const Vaartha_consnt_SSA_2   = "\xC2\xB4";
const Vaartha_consnt_SA_1    = "\x33";
const Vaartha_consnt_SA_2    = "\xC2\xAC";
const Vaartha_consnt_HA      = "\x61";
const Vaartha_consnt_LLA     = "\xC2\xAE";
const Vaartha_consnt_RRA     = "\xC2\xB0";

//Gunintamulu
const Vaartha_vowelsn_AA_1   = "\x53";
const Vaartha_vowelsn_AA_2   = "\x56";
const Vaartha_vowelsn_AA_3   = "\xC3\x82";
const Vaartha_vowelsn_I_1    = "\x57";
const Vaartha_vowelsn_I_2    = "\x65";
const Vaartha_vowelsn_I_3    = "\xC3\x83";
const Vaartha_vowelsn_II_1   = "\x58";
const Vaartha_vowelsn_II_2   = "\x66";
const Vaartha_vowelsn_II_3   = "\xC3\x84";
const Vaartha_vowelsn_U_1    = "\x37";
const Vaartha_vowelsn_U_2    = "\xC3\x85";
const Vaartha_vowelsn_U_3    = "\x76";
const Vaartha_vowelsn_U_4    = "\xC3\xB4";
const Vaartha_vowelsn_UU_1   = "\x77";
const Vaartha_vowelsn_UU_2   = "\xC3\x86";
const Vaartha_vowelsn_UU_3   = "\xC3\x8B";
const Vaartha_vowelsn_UU_4   = "\xC3\xB5";
const Vaartha_vowelsn_R      = "\xC3\x87";
const Vaartha_vowelsn_RR     = "\xC3\x88";
const Vaartha_vowelsn_E_1    = "\x59";
const Vaartha_vowelsn_E_2    = "\x67";
const Vaartha_vowelsn_E_3    = "\x78";
const Vaartha_vowelsn_E_4    = "\xC3\x89";
const Vaartha_vowelsn_EE_1   = "\x5A";
const Vaartha_vowelsn_EE_2   = "\x68";
const Vaartha_vowelsn_EE_3   = "\x79";
const Vaartha_vowelsn_EE_4   = "\xC3\x8A";
const Vaartha_vowelsn_O_1    = "\x54";
const Vaartha_vowelsn_O_2    = "\xC3\x8C";
const Vaartha_vowelsn_OO_1   = "\x55";
const Vaartha_vowelsn_OO_2   = "\xC3\x8D";
const Vaartha_vowelsn_AU_1   = "\x63";
const Vaartha_vowelsn_AU_2   = "\x74";
const Vaartha_vowelsn_AU_3   = "\xC3\x8E";
const Vaartha_vowelsn_AILEN_1 = "\x69";
const Vaartha_vowelsn_AILEN_2 = "\x72";

//Special Combinations
const Vaartha_combo_KHI      = "\x23";
const Vaartha_combo_KHII     = "\x42";
const Vaartha_combo_GI       = "\xC3\xBF";
const Vaartha_combo_GII      = "\x35";
const Vaartha_combo_GHAA     = "\xC2\xA1\x6C\xC3\x86";
const Vaartha_combo_GHI      = "\xC2\xA1\x6C\x57\xC3\x85";
const Vaartha_combo_GHU      = "\xC2\xA1\x6C\x4D";

const Vaartha_combo_CI       = "\x24";
const Vaartha_combo_CII      = "\x43";
const Vaartha_combo_CHI      = "\x24\x6C";
const Vaartha_combo_CHII     = "\x43\x6C";
const Vaartha_combo_JI       = "\x25";
const Vaartha_combo_JII      = "\x44";
const Vaartha_combo_JU       = "\x4F";
const Vaartha_combo_JUU      = "\x50";

const Vaartha_combo_TTHI     = "\x62\x73";

const Vaartha_combo_TI       = "\x26";
const Vaartha_combo_TII      = "\x45";
const Vaartha_combo_DI       = "\xE2\x84\xA2";
const Vaartha_combo_DII      = "\x30";
const Vaartha_combo_DHI_1    = "\xE2\x84\xA2\x6C";
const Vaartha_combo_DHI_2    = "\xE2\x84\xA2\xC2\xBA";
const Vaartha_combo_DHII_1   = "\x30\x6C";
const Vaartha_combo_DHII_2   = "\x30\xC2\xBA";
const Vaartha_combo_NI       = "\x6D";
const Vaartha_combo_NII      = "\x46";

const Vaartha_combo_PHE      = "\xC2\xA1\x59\x6C";
const Vaartha_combo_PHEE     = "\xC2\xA1\x5A\x6C";
const Vaartha_combo_BI       = "\x2A";
const Vaartha_combo_BII      = "\x47";
const Vaartha_combo_BHI      = "\x2A\x6C";
const Vaartha_combo_BHII     = "\x47\x6C";
const Vaartha_combo_MAA      = "\xC2\xA5\xC3\x86";
const Vaartha_combo_MI       = "\x2B\xC3\x85";
const Vaartha_combo_MII      = "\x48\xC3\x85";
const Vaartha_combo_MU       = "\xC2\xA5\x4D";
const Vaartha_combo_MUU      = "\xC2\xA5\x4E";
const Vaartha_combo_ME       = "\xC2\xA5\xC3\x89\xC3\x85";
const Vaartha_combo_MEE      = "\xC2\xA5\xC3\x8A\xC3\x85";
const Vaartha_combo_MO       = "\xC2\xA5\xC3\x89\x4D";
const Vaartha_combo_MOO      = "\xC2\xA5\xC3\x89\xC3\x86";
const Vaartha_combo_MPOLLU   = "\xC2\xA5\x52\xC3\x85";

const Vaartha_combo_YAA      = "\x31\xC3\x86";
const Vaartha_combo_YI       = "\xC2\xA7\x4D";
const Vaartha_combo_YII      = "\xC2\xA7\x4E";
const Vaartha_combo_YU       = "\x31\x4D";
const Vaartha_combo_YUU      = "\x31\x4E";
const Vaartha_combo_YE       = "\x31\xC3\x89\xC3\x85";
const Vaartha_combo_YEE      = "\x31\xC3\x8A\xC3\x85";
const Vaartha_combo_YAI      = "\x31\xC3\x89\x72\xC3\x85";
const Vaartha_combo_YOO      = "\x31\xC3\x89\xC3\x86";
const Vaartha_combo_YPOLLU   = "\x31\x52\xC3\x85";
const Vaartha_combo_RAA      = "\xC2\xA7\x56";
const Vaartha_combo_RI       = "\x62";
const Vaartha_combo_RII      = "\xC2\xA4";
const Vaartha_combo_RU       = "\xC2\xA7\xC3\x85";
const Vaartha_combo_RE       = "\xC2\xA7\xC3\x89";
const Vaartha_combo_REE      = "\xC2\xA7\xC3\x8A";
const Vaartha_combo_RO       = "\xC2\xA7\xC3\x8C";
const Vaartha_combo_ROO      = "\xC2\xA7\xC3\x8D";
const Vaartha_combo_RAU      = "\xC2\xA7\x74";
const Vaartha_combo_RPOLLU   = "\xC2\xA7\x52";
const Vaartha_combo_LI       = "\x3C";
const Vaartha_combo_LII      = "\x49";
const Vaartha_combo_VI       = "\x2B";
const Vaartha_combo_VII      = "\x48";
const Vaartha_combo_SHI      = "\x3E";
const Vaartha_combo_SHII     = "\x4A";
const Vaartha_combo_LLI      = "\x40";
const Vaartha_combo_LLII     = "\x4B";
const Vaartha_combo_HAA      = "\xC3\xB6";

//const Vattulu
const Vaartha_vattu_KA       = "\xC3\x91";
const Vaartha_vattu_KHA      = "\xC3\x92";
const Vaartha_vattu_GA       = "\xC3\x93";
const Vaartha_vattu_GHA      = "\xC3\x94";
const Vaartha_vattu_NGA      = "\xC3\x95";

const Vaartha_vattu_CA       = "\xC3\x96";
const Vaartha_vattu_CHA      = "\x39";
const Vaartha_vattu_JA       = "\xC3\x98";
const Vaartha_vattu_JHA      = "\xC3\x99";
const Vaartha_vattu_NYA      = "\xC3\x9A";

const Vaartha_vattu_TTA      = "\xC3\x9B";
const Vaartha_vattu_TTHA     = "\xC3\x9C";
const Vaartha_vattu_DDA      = "\x3A";
const Vaartha_vattu_NNA      = "\xC3\x9F";

const Vaartha_vattu_TA       = "\xC3\xA0";
const Vaartha_vattu_THA      = "\xC3\xA1";
const Vaartha_vattu_DA       = "\xC3\xA2";
const Vaartha_vattu_DHA      = "\xC3\xA3";
const Vaartha_vattu_NA       = "\xC3\xA4";

const Vaartha_vattu_PA       = "\xC3\xA5";
const Vaartha_vattu_PHA      = "\xC3\xA6";
const Vaartha_vattu_BA       = "\xC3\xA7";
const Vaartha_vattu_BHA      = "\xC3\xA8";
const Vaartha_vattu_MA       = "\xC3\xA9";

const Vaartha_vattu_YA       = "\xC3\xAA";
const Vaartha_vattu_RA       = "\xC3\xAB";
const Vaartha_vattu_LA       = "\xC3\xAC";
const Vaartha_vattu_VA       = "\xC3\xAD";
const Vaartha_vattu_SHA      = "\xC3\xAE";
const Vaartha_vattu_SSA_1    = "\xC2\xAF";
const Vaartha_vattu_SSA_2    = "\xC3\xAF";
const Vaartha_vattu_SA       = "\x5C";
const Vaartha_vattu_HA       = "\xC3\xB1";
const Vaartha_vattu_LLA      = "\xC3\xB2";
const Vaartha_vattu_RRA      = "\xC3\xB3";

//Conjuncts
const Vaartha_vattu_PU       = "\x5F";
const Vaartha_vattu_TTRA     = "\x6F";
const Vaartha_vattu_TRA      = "\x70";

//Matches ASCII
const Vaartha_EXCLAM         = "\x21";
const Vaartha_PARENLEFT      = "\x28";
const Vaartha_PARENRIGT      = "\x29";
const Vaartha_COMMA          = "\x2C";
const Vaartha_HYPHEN         = "\x2D";
const Vaartha_PERIOD         = "\x2E";
const Vaartha_SLASH          = "\x2F";
const Vaartha_SEMICOLON      = "\x3B";
const Vaartha_EQUALS         = "\x3D";
const Vaartha_QUESTION       = "\x3F";

const Vaartha_digit_ZERO     = "\xC2\xA8";
const Vaartha_digit_ONE      = "\x7A";
const Vaartha_digit_TWO      = "\xE2\x80\x94";
const Vaartha_digit_THREE    = "\xC2\xA2";
const Vaartha_digit_FOUR     = "\xC2\xA9";
const Vaartha_digit_FIVE     = "\xC2\xB7";
const Vaartha_digit_SIX      = "\xC2\xBF";
const Vaartha_digit_SEVEN    = "\xC3\xB8";
const Vaartha_digit_EIGHT    = "\xC3\xBB";
const Vaartha_digit_NINE     = "\xC3\xBC";

//Does not match ASCII
const Vaartha_COLON          = "\xC3\x80";
const Vaartha_QTSINGLE       = "\xE2\x80\x98";
const Vaartha_extra_QTSINGLE = "\xE2\x80\x99";
const Vaartha_extra_HYPHEN   = "\xC2\xAD";

//Kommu
const Vaartha_misc_TICK_1    = "\x41";
const Vaartha_misc_TICK_2    = "\x4C";
const Vaartha_misc_TICK_3    = "\x6A";
const Vaartha_misc_TICK_4    = "\x75";
const Vaartha_misc_TICK_5    = "\xC3\x81";

const Vaartha_misc_UNKNOWN_1 = "\xC3\x8F";

//not sure where they are used
const Vaartha_misc_VATTU_1   = "\x6B";
const Vaartha_misc_VATTU_2   = "\x71";
const Vaartha_arasunna       = "\xE2\x80\xA2";

}


$Vaartha_toPadma = array();

$Vaartha_toPadma[Vaartha::Vaartha_visarga]  = Padma::Padma_visarga;
$Vaartha_toPadma[Vaartha::Vaartha_virama_1] = Padma::Padma_syllbreak;
$Vaartha_toPadma[Vaartha::Vaartha_virama_2] = Padma::Padma_syllbreak;
$Vaartha_toPadma[Vaartha::Vaartha_virama_3] = Padma::Padma_syllbreak;
$Vaartha_toPadma[Vaartha::Vaartha_virama_4] = Padma::Padma_syllbreak;
$Vaartha_toPadma[Vaartha::Vaartha_anusvara] = Padma::Padma_anusvara;

$Vaartha_toPadma[Vaartha::Vaartha_vowel_A]  = Padma::Padma_vowel_A;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_AA] = Padma::Padma_vowel_AA;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_I]  = Padma::Padma_vowel_I;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_II] = Padma::Padma_vowel_II;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_U]  = Padma::Padma_vowel_U;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_UU] = Padma::Padma_vowel_UU;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_R]  = Padma::Padma_vowel_R;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_E]  = Padma::Padma_vowel_E;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_EE] = Padma::Padma_vowel_EE;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_AI] = Padma::Padma_vowel_AI;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_O]  = Padma::Padma_vowel_O;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_OO] = Padma::Padma_vowel_OO;
$Vaartha_toPadma[Vaartha::Vaartha_vowel_AU] = Padma::Padma_vowel_AU;

$Vaartha_toPadma[Vaartha::Vaartha_consnt_KA]  = Padma::Padma_consnt_KA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_KHA] = Padma::Padma_consnt_KHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_GA]  = Padma::Padma_consnt_GA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_GHA] = Padma::Padma_consnt_GHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_NGA] = Padma::Padma_consnt_NGA;

$Vaartha_toPadma[Vaartha::Vaartha_consnt_CA]  = Padma::Padma_consnt_CA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_CHA] = Padma::Padma_consnt_CHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_JA]  = Padma::Padma_consnt_JA;
//$Vaartha_toPadma[Vaartha::Vaartha_consnt_JHA] = Padma::Padma_consnt_JHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_NYA] = Padma::Padma_consnt_NYA;

$Vaartha_toPadma[Vaartha::Vaartha_consnt_TTA]  = Padma::Padma_consnt_TTA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_DDA]  = Padma::Padma_consnt_DDA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_NNA]  = Padma::Padma_consnt_NNA;

$Vaartha_toPadma[Vaartha::Vaartha_consnt_TA]  = Padma::Padma_consnt_TA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_THA] = Padma::Padma_consnt_THA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_DA]  = Padma::Padma_consnt_DA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_DHA_1] = Padma::Padma_consnt_DHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_DHA_2] = Padma::Padma_consnt_DHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_NA]  = Padma::Padma_consnt_NA;

$Vaartha_toPadma[Vaartha::Vaartha_consnt_PA_1]  = Padma::Padma_consnt_PA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_PA_2]  = Padma::Padma_consnt_PA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_PHA_1] = Padma::Padma_consnt_PHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_PHA_2] = Padma::Padma_consnt_PHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_BA]    = Padma::Padma_consnt_BA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_BHA]   = Padma::Padma_consnt_BHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_MA]    = Padma::Padma_consnt_MA;

$Vaartha_toPadma[Vaartha::Vaartha_consnt_YA]    = Padma::Padma_consnt_YA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_RA]    = Padma::Padma_consnt_RA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_LA]    = Padma::Padma_consnt_LA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_VA]    = Padma::Padma_consnt_VA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_SHA]   = Padma::Padma_consnt_SHA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_SA_1]  = Padma::Padma_consnt_SA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_SA_2]  = Padma::Padma_consnt_SA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_HA] = Padma::Padma_consnt_HA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_LLA] = Padma::Padma_consnt_LLA;
$Vaartha_toPadma[Vaartha::Vaartha_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_I_3]   = Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_U_4]   = Padma::Padma_vowelsn_U;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_UU_4]  = Padma::Padma_vowelsn_UU;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_R]     = Padma::Padma_vowelsn_R;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_E_4]   = Padma::Padma_vowelsn_E;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_EE_1]  = Padma::Padma_vowelsn_EE;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_EE_2]  = Padma::Padma_vowelsn_EE;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_EE_3]  = Padma::Padma_vowelsn_EE;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_EE_4]  = Padma::Padma_vowelsn_EE;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$Vaartha_toPadma[Vaartha::Vaartha_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$Vaartha_toPadma[Vaartha::Vaartha_combo_KHI]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_KHII]    = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_GI]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_GII]     = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_GHAA]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_AA;
$Vaartha_toPadma[Vaartha::Vaartha_combo_GHI]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_GHU]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_U;

$Vaartha_toPadma[Vaartha::Vaartha_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_CHII]    = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_JU]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_U;
$Vaartha_toPadma[Vaartha::Vaartha_combo_JUU]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_UU;

$Vaartha_toPadma[Vaartha::Vaartha_combo_TTHI]    = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_I;

$Vaartha_toPadma[Vaartha::Vaartha_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_DI]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_DII]     = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_DHI_1]   = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_DHI_2]   = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_DHII_1]  = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_DHII_2]  = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;

$Vaartha_toPadma[Vaartha::Vaartha_combo_PHE]     = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_E;
$Vaartha_toPadma[Vaartha::Vaartha_combo_PHEE]    = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_EE;
$Vaartha_toPadma[Vaartha::Vaartha_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_BII]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_BHII]    = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_MAA]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$Vaartha_toPadma[Vaartha::Vaartha_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$Vaartha_toPadma[Vaartha::Vaartha_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$Vaartha_toPadma[Vaartha::Vaartha_combo_ME]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
$Vaartha_toPadma[Vaartha::Vaartha_combo_MEE]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_EE;
$Vaartha_toPadma[Vaartha::Vaartha_combo_MO]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_O;
$Vaartha_toPadma[Vaartha::Vaartha_combo_MOO]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_OO;
$Vaartha_toPadma[Vaartha::Vaartha_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;

$Vaartha_toPadma[Vaartha::Vaartha_combo_YAA]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$Vaartha_toPadma[Vaartha::Vaartha_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_YU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$Vaartha_toPadma[Vaartha::Vaartha_combo_YUU]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$Vaartha_toPadma[Vaartha::Vaartha_combo_YE]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$Vaartha_toPadma[Vaartha::Vaartha_combo_YEE]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$Vaartha_toPadma[Vaartha::Vaartha_combo_YAI]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AI;
$Vaartha_toPadma[Vaartha::Vaartha_combo_YOO]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_OO;
$Vaartha_toPadma[Vaartha::Vaartha_combo_YPOLLU]  = Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$Vaartha_toPadma[Vaartha::Vaartha_combo_RAA]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AA;
$Vaartha_toPadma[Vaartha::Vaartha_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Vaartha_toPadma[Vaartha::Vaartha_combo_RE]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_E;
$Vaartha_toPadma[Vaartha::Vaartha_combo_REE]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_EE;
$Vaartha_toPadma[Vaartha::Vaartha_combo_RO]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_O;
$Vaartha_toPadma[Vaartha::Vaartha_combo_ROO]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_OO;
$Vaartha_toPadma[Vaartha::Vaartha_combo_RAU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AU;
$Vaartha_toPadma[Vaartha::Vaartha_combo_RPOLLU]  = Padma::Padma_consnt_RA . Padma::Padma_syllbreak;
$Vaartha_toPadma[Vaartha::Vaartha_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_SHII]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$Vaartha_toPadma[Vaartha::Vaartha_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;
$Vaartha_toPadma[Vaartha::Vaartha_combo_HAA]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AA;

//$Vattulu
$Vaartha_toPadma[Vaartha::Vaartha_vattu_KA]      = Padma::Padma_vattu_KA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_KHA]     = Padma::Padma_vattu_KHA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_GA]      = Padma::Padma_vattu_GA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_GHA]     = Padma::Padma_vattu_GHA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_NGA]     = Padma::Padma_vattu_NGA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_CA]      = Padma::Padma_vattu_CA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_CHA]     = Padma::Padma_vattu_CHA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_JA]      = Padma::Padma_vattu_JA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_JHA]     = Padma::Padma_vattu_JHA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_NYA]     = Padma::Padma_vattu_NYA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_TTA]     = Padma::Padma_vattu_TTA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_DDA]     = Padma::Padma_vattu_DDA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_NNA]     = Padma::Padma_vattu_NNA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_TA]      = Padma::Padma_vattu_TA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_THA]     = Padma::Padma_vattu_THA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_DA]      = Padma::Padma_vattu_DA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_DHA]     = Padma::Padma_vattu_DHA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_NA]      = Padma::Padma_vattu_NA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_PA]      = Padma::Padma_vattu_PA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_PHA]     = Padma::Padma_vattu_PHA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_BA]      = Padma::Padma_vattu_BA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_BHA]     = Padma::Padma_vattu_BHA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_MA]      = Padma::Padma_vattu_MA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_YA]      = Padma::Padma_vattu_YA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_RA]      = Padma::Padma_vattu_RA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_LA]      = Padma::Padma_vattu_LA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_VA]      = Padma::Padma_vattu_VA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_SHA]     = Padma::Padma_vattu_SHA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_SSA_1]   = Padma::Padma_vattu_SSA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_SSA_2]   = Padma::Padma_vattu_SSA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_SA]      = Padma::Padma_vattu_SA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_HA]      = Padma::Padma_vattu_HA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_LLA]     = Padma::Padma_vattu_LLA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_RRA]     = Padma::Padma_vattu_RRA;

//Conjuncts
$Vaartha_toPadma[Vaartha::Vaartha_vattu_PU]      = Padma::Padma_vattu_PA . Padma::Padma_vowelsn_U;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_TTRA]    = Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$Vaartha_toPadma[Vaartha::Vaartha_vattu_TRA]     = Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;

//Miscellaneous(where it doesn't match ASCII representation)
$Vaartha_toPadma[Vaartha::Vaartha_extra_QTSINGLE] = "'";
$Vaartha_toPadma[Vaartha::Vaartha_QTSINGLE]       = "'";
$Vaartha_toPadma[Vaartha::Vaartha_COLON]          = ":";
$Vaartha_toPadma[Vaartha::Vaartha_extra_HYPHEN]   = "-";
$Vaartha_toPadma[Vaartha::Vaartha_digit_ZERO]     = "0";
$Vaartha_toPadma[Vaartha::Vaartha_digit_ONE]      = "1";
$Vaartha_toPadma[Vaartha::Vaartha_digit_TWO]      = "2";
$Vaartha_toPadma[Vaartha::Vaartha_digit_THREE]    = "3";
$Vaartha_toPadma[Vaartha::Vaartha_digit_FOUR]     = "4";
$Vaartha_toPadma[Vaartha::Vaartha_digit_FIVE]     = "5";
$Vaartha_toPadma[Vaartha::Vaartha_digit_SIX]      = "6";
$Vaartha_toPadma[Vaartha::Vaartha_digit_SEVEN]    = "7";
$Vaartha_toPadma[Vaartha::Vaartha_digit_EIGHT]    = "8";
$Vaartha_toPadma[Vaartha::Vaartha_digit_NINE]     = "9";

$Vaartha_redundantList = array();
$Vaartha_redundantList[Vaartha::Vaartha_misc_TICK_1]    = true;
$Vaartha_redundantList[Vaartha::Vaartha_misc_TICK_2]    = true;
$Vaartha_redundantList[Vaartha::Vaartha_misc_TICK_3]    = true;
$Vaartha_redundantList[Vaartha::Vaartha_misc_TICK_4]    = true;
$Vaartha_redundantList[Vaartha::Vaartha_misc_TICK_5]    = true;
$Vaartha_redundantList[Vaartha::Vaartha_misc_UNKNOWN_1] = true;

$Vaartha_prefixList = array();
$Vaartha_prefixList[Vaartha::Vaartha_virama_1]     = true;
$Vaartha_prefixList[Vaartha::Vaartha_vattu_RA]     = true;
$Vaartha_prefixList[Vaartha::Vaartha_vattu_TTRA]   = true;
$Vaartha_prefixList[Vaartha::Vaartha_vattu_TRA]    = true;

$Vaartha_overloadList = array();
$Vaartha_overloadList[Vaartha::Vaartha_anusvara]    = true;
$Vaartha_overloadList[Vaartha::Vaartha_consnt_CA]   = true;
$Vaartha_overloadList[Vaartha::Vaartha_consnt_DA]   = true;
$Vaartha_overloadList[Vaartha::Vaartha_consnt_DDA]  = true;
$Vaartha_overloadList[Vaartha::Vaartha_consnt_PA_1] = true;
$Vaartha_overloadList[Vaartha::Vaartha_consnt_PA_2] = true;
$Vaartha_overloadList[Vaartha::Vaartha_consnt_BA]   = true;
$Vaartha_overloadList[Vaartha::Vaartha_consnt_VA]   = true;
$Vaartha_overloadList[Vaartha::Vaartha_combo_CI]    = true;
$Vaartha_overloadList[Vaartha::Vaartha_combo_CII]   = true;
$Vaartha_overloadList[Vaartha::Vaartha_combo_DI]    = true;
$Vaartha_overloadList[Vaartha::Vaartha_combo_DII]   = true;
$Vaartha_overloadList[Vaartha::Vaartha_combo_BI]    = true;
$Vaartha_overloadList[Vaartha::Vaartha_combo_BII]   = true;
$Vaartha_overloadList[Vaartha::Vaartha_combo_RI]    = true;
$Vaartha_overloadList[Vaartha::Vaartha_combo_VI]    = true;
$Vaartha_overloadList[Vaartha::Vaartha_combo_VII]   = true;
$Vaartha_overloadList["\x31"]            = true;
$Vaartha_overloadList["\x31\x52"]      = true;
$Vaartha_overloadList["\x31\xC3\x89"]      = true;
$Vaartha_overloadList["\x31\xC3\x89\x72"] = true;
$Vaartha_overloadList["\x31\xC3\x8A"]      = true;
$Vaartha_overloadList["\xC2\xA1\x59"]      = true;
$Vaartha_overloadList["\xC2\xA1\x5A"]      = true;
$Vaartha_overloadList["\xC2\xA1\x6C"]      = true;
$Vaartha_overloadList["\xC2\xA1\x6C\x57"] = true;
$Vaartha_overloadList["\xC2\xA5\x52"]      = true;
$Vaartha_overloadList["\xC2\xA5\xC3\x89"]      = true;
$Vaartha_overloadList["\xC2\xA5\xC3\x8A"]      = true;

function Vaartha_initialize()
{
    global $fontinfo;

    $fontinfo["vaartha"]["language"] = "Telugu";
    $fontinfo["vaartha"]["class"] = "Vaartha";
}
?>
