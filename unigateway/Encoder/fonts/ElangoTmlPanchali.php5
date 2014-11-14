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

class Elango_Tml_Panchali
{
function Elango_Tml_Panchali()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "ELANGO-TML-Panchali-Normal";
var $displayName  = "Elango Panchali";
var $script       = Padma::Padma_script_TAMIL;

function lookup ($str) 
{
    global $Elango_Tml_Panchali_toPadma;
    return $Elango_Tml_Panchali_toPadma[$str];
}

function isPrefixSymbol ($str)
{ 
    global $Elango_Tml_Panchali_prefixList;
    return $Elango_Tml_Panchali_prefixList[$str] != null;
}

function isOverloaded ($str)
{
    global $Elango_Tml_Panchali_overloadList;
    return $Elango_Tml_Panchali_overloadList[$str] != null;
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_O;
    if ($sign2 == Padma::Padma_vowelsn_EE && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;    
}

function preprocessMessage ($input)
{
    return $input;
}

//Implementation details start here

//Specials
const Elango_Tml_Panchali_visarga        = "\x40";  //aytham

//Vowels
const Elango_Tml_Panchali_vowel_A        = "\x41";
const Elango_Tml_Panchali_vowel_AA       = "\x42";
const Elango_Tml_Panchali_vowel_I        = "\x43";
const Elango_Tml_Panchali_vowel_II       = "\x44";
const Elango_Tml_Panchali_vowel_U        = "\x45";
const Elango_Tml_Panchali_vowel_UU       = "\x46";
const Elango_Tml_Panchali_vowel_E        = "\x47";
const Elango_Tml_Panchali_vowel_EE       = "\x48";
const Elango_Tml_Panchali_vowel_AI       = "\x49";
const Elango_Tml_Panchali_vowel_O        = "\x4A";
const Elango_Tml_Panchali_vowel_OO       = "\x4B";
const Elango_Tml_Panchali_vowel_AU       = "\x4A\x5B";

//Consonants
const Elango_Tml_Panchali_consnt_KA      = "\x4C";
const Elango_Tml_Panchali_consnt_NGA     = "\x4D";

const Elango_Tml_Panchali_consnt_CA      = "\x4E";
const Elango_Tml_Panchali_consnt_JA      = "\x5E";
const Elango_Tml_Panchali_consnt_NYA     = "\x4F";

const Elango_Tml_Panchali_consnt_TTA     = "\x50";
const Elango_Tml_Panchali_consnt_NNA     = "\x51";

const Elango_Tml_Panchali_consnt_TA      = "\x52";
const Elango_Tml_Panchali_consnt_NA      = "\x53";
const Elango_Tml_Panchali_consnt_NNNA    = "\x5D";

const Elango_Tml_Panchali_consnt_PA      = "\x54";
const Elango_Tml_Panchali_consnt_MA      = "\x55";

const Elango_Tml_Panchali_consnt_YA      = "\x56";
const Elango_Tml_Panchali_consnt_RA      = "\x57";
const Elango_Tml_Panchali_consnt_LA      = "\x58";
const Elango_Tml_Panchali_consnt_VA      = "\x59";
const Elango_Tml_Panchali_consnt_SSA     = "\x63";
const Elango_Tml_Panchali_consnt_SA      = "\x62";
const Elango_Tml_Panchali_consnt_HA      = "\x61";
const Elango_Tml_Panchali_consnt_LLA     = "\x5B";
const Elango_Tml_Panchali_consnt_ZHA     = "\x5A";
const Elango_Tml_Panchali_consnt_RRA     = "\x5C";
const Elango_Tml_Panchali_conjct_KSH     = "\x64";
const Elango_Tml_Panchali_conjct_SRII    = "\x7E";

//Gunintamulu
const Elango_Tml_Panchali_vowelsn_AA     = "\xC3\x96";
const Elango_Tml_Panchali_vowelsn_I      = "\xC3\xAC";
const Elango_Tml_Panchali_vowelsn_U      = "\xC3\x97";	
const Elango_Tml_Panchali_vowelsn_UU     = "\xC3\x98";
const Elango_Tml_Panchali_vowelsn_E_1    = "\xC3\x99";
const Elango_Tml_Panchali_vowelsn_E_2    = "\xC3\xA2";	
const Elango_Tml_Panchali_vowelsn_E_3    = "\xC3\xA3";	
const Elango_Tml_Panchali_vowelsn_EE     = "\xC3\x9A";
const Elango_Tml_Panchali_vowelsn_AI     = "\xC3\x9B";

// Old format_ No lomger used_
const Elango_Tml_Panchali_combo_NNAA     = "\xC3\x9E";
const Elango_Tml_Panchali_combo_NNNAA    = "\xC3\xA0";
const Elango_Tml_Panchali_combo_RRAA     = "\xC3\x9F";

//const Elango_Tml_Panchali uses the same symbol for generating vowelsn_AU and consnt_LLA_ This is a work around
const Elango_Tml_Panchali_combo_KAU      = "\xC3\x99\x4C\x5B";
const Elango_Tml_Panchali_combo_NGAU     = "\xC3\x99\x4D\x5B";
const Elango_Tml_Panchali_combo_CAU      = "\xC3\x99\x4E\x5B";
const Elango_Tml_Panchali_combo_JAU      = "\xC3\x99\x5E\x5B";
const Elango_Tml_Panchali_combo_NYAU     = "\xC3\x99\x4F\x5B";
const Elango_Tml_Panchali_combo_TTAU     = "\xC3\x99\x50\x5B";
const Elango_Tml_Panchali_combo_NNAU     = "\xC3\x99\x51\x5B";
const Elango_Tml_Panchali_combo_TAU      = "\xC3\x99\x52\x5B";
const Elango_Tml_Panchali_combo_NAU      = "\xC3\x99\x53\x5B";
const Elango_Tml_Panchali_combo_NNNAU    = "\xC3\x99\x5D\x5B";
const Elango_Tml_Panchali_combo_PAU      = "\xC3\x99\x54\x5B";
const Elango_Tml_Panchali_combo_MAU      = "\xC3\x99\x55\x5B";
const Elango_Tml_Panchali_combo_YAU      = "\xC3\x99\x56\x5B";
const Elango_Tml_Panchali_combo_RAU      = "\xC3\x99\x57\x5B";
const Elango_Tml_Panchali_combo_LAU      = "\xC3\x99\x58\x5B";
const Elango_Tml_Panchali_combo_VAU      = "\xC3\x99\x59\x5B";
const Elango_Tml_Panchali_combo_SSAU     = "\xC3\x99\x63\x5B";
const Elango_Tml_Panchali_combo_SAU      = "\xC3\x99\x62\x5B";
const Elango_Tml_Panchali_combo_HAU      = "\xC3\x99\x61\x5B";
const Elango_Tml_Panchali_combo_LLAU     = "\xC3\x99\x5B\x5B";
const Elango_Tml_Panchali_combo_ZHAU     = "\xC3\x99\x5A\x5B";
const Elango_Tml_Panchali_combo_RRAU     = "\xC3\x99\x5C\x5B";
const Elango_Tml_Panchali_combo_KSHAU    = "\xC3\x99\x64\x5B";

//Special Combinations
const Elango_Tml_Panchali_combo_KI      = "\x66";
const Elango_Tml_Panchali_combo_KII     = "\x67";
const Elango_Tml_Panchali_combo_KU      = "\x68";
const Elango_Tml_Panchali_combo_KUU     = "\x69";
const Elango_Tml_Panchali_combo_KPULLI  = "\x65";
const Elango_Tml_Panchali_combo_NGI     = "\x6B";
const Elango_Tml_Panchali_combo_NGII    = "\x6C";
const Elango_Tml_Panchali_combo_NGU     = "\x6D";
const Elango_Tml_Panchali_combo_NGUU    = "\x6E";
const Elango_Tml_Panchali_combo_NGPULLI = "\x6A";

const Elango_Tml_Panchali_combo_CI      = "\x70";
const Elango_Tml_Panchali_combo_CII     = "\x71";
const Elango_Tml_Panchali_combo_CU      = "\x72";
const Elango_Tml_Panchali_combo_CUU     = "\x73";
const Elango_Tml_Panchali_combo_CPULLI  = "\x6F";
const Elango_Tml_Panchali_combo_JI      = "\xC3\x88";
const Elango_Tml_Panchali_combo_JII     = "\xC3\x89";
const Elango_Tml_Panchali_combo_JPULLI  = "\xC3\x87";
const Elango_Tml_Panchali_combo_NYI     = "\x75";
const Elango_Tml_Panchali_combo_NYII    = "\x76";
const Elango_Tml_Panchali_combo_NYU     = "\x77";
const Elango_Tml_Panchali_combo_NYUU    = "\x78";
const Elango_Tml_Panchali_combo_NYPULLI = "\x74";

const Elango_Tml_Panchali_combo_TTI     = "\x7A";
const Elango_Tml_Panchali_combo_TTII    = "\x7B";
const Elango_Tml_Panchali_combo_TTU     = "\x7C";
const Elango_Tml_Panchali_combo_TTUU    = "\x7D";
const Elango_Tml_Panchali_combo_TTPULLI = "\x79";
const Elango_Tml_Panchali_combo_NNI     = "\xE2\x80\x9A";
const Elango_Tml_Panchali_combo_NNII    = "\xC6\x92";
const Elango_Tml_Panchali_combo_NNU     = "\xE2\x80\x9E";
const Elango_Tml_Panchali_combo_NNUU    = "\xE2\x80\xA6";
const Elango_Tml_Panchali_combo_NNPULLI = "\xC2\x81";

const Elango_Tml_Panchali_combo_TI      = "\xE2\x80\xA1";
const Elango_Tml_Panchali_combo_TII     = "\xCB\x86";
const Elango_Tml_Panchali_combo_TU      = "\xE2\x80\xB0";
const Elango_Tml_Panchali_combo_TUU     = "\xC5\xA0";
const Elango_Tml_Panchali_combo_TPULLI  = "\xE2\x80\xA0";
const Elango_Tml_Panchali_combo_NI      = "\xC5\x92";
const Elango_Tml_Panchali_combo_NII     = "\xC2\x8D";
const Elango_Tml_Panchali_combo_NU      = "\xC3\xAE";
const Elango_Tml_Panchali_combo_NUU     = "\xC2\x8F";
const Elango_Tml_Panchali_combo_NPULLI  = "\xE2\x80\xB9";
const Elango_Tml_Panchali_combo_NNNI    = "\xC3\x82";
const Elango_Tml_Panchali_combo_NNNII   = "\xC3\x83";
const Elango_Tml_Panchali_combo_NNNU    = "\xC3\x84";
const Elango_Tml_Panchali_combo_NNNUU   = "\xC3\x85";
const Elango_Tml_Panchali_combo_NNNPULLI= "\xC3\x81";

const Elango_Tml_Panchali_combo_PI      = "\xE2\x80\x98";
const Elango_Tml_Panchali_combo_PII     = "\xE2\x80\x99";
const Elango_Tml_Panchali_combo_PU      = "\xE2\x80\x9C";
const Elango_Tml_Panchali_combo_PUU     = "\xE2\x80\x9D";
const Elango_Tml_Panchali_combo_PPULLI  = "\xC2\x90";
const Elango_Tml_Panchali_combo_MI      = "\xE2\x80\x93";
const Elango_Tml_Panchali_combo_MII     = "\xE2\x80\x94";
const Elango_Tml_Panchali_combo_MU      = "\xCB\x9C";
const Elango_Tml_Panchali_combo_MUU     = "\xE2\x84\xA2";
const Elango_Tml_Panchali_combo_MPULLI  = "\xE2\x80\xA2";

const Elango_Tml_Panchali_combo_YI      = "\xE2\x80\xBA";
const Elango_Tml_Panchali_combo_YII     = "\xC5\x93";
const Elango_Tml_Panchali_combo_YU      = "\xC2\x9D";
const Elango_Tml_Panchali_combo_YUU     = "\xC3\xAF";
const Elango_Tml_Panchali_combo_YPULLI  = "\xC5\xA1";
const Elango_Tml_Panchali_combo_RI      = "\xC2\xA1";
const Elango_Tml_Panchali_combo_RII     = "\xC2\xA2";
const Elango_Tml_Panchali_combo_RU      = "\xC2\xA3";
const Elango_Tml_Panchali_combo_RUU     = "\xC2\xA4";
const Elango_Tml_Panchali_combo_RPULLI  = "\xC5\xB8";
const Elango_Tml_Panchali_combo_LI      = "\xC2\xA6";
const Elango_Tml_Panchali_combo_LII     = "\xC2\xA7";
const Elango_Tml_Panchali_combo_LU      = "\xC2\xA8";
const Elango_Tml_Panchali_combo_LUU     = "\xC2\xA9";
const Elango_Tml_Panchali_combo_LPULLI  = "\xC2\xA5";
const Elango_Tml_Panchali_combo_VI      = "\xC2\xAB";
const Elango_Tml_Panchali_combo_VII     = "\xC2\xAE";
const Elango_Tml_Panchali_combo_VU      = "\xC2\xB0";
const Elango_Tml_Panchali_combo_VUU     = "\xC2\xB1";
const Elango_Tml_Panchali_combo_VPULLI  = "\xC2\xAA";

const Elango_Tml_Panchali_combo_SSI     = "\xC3\x91";
const Elango_Tml_Panchali_combo_SSII    = "\xC3\x92";
const Elango_Tml_Panchali_combo_SSPULLI = "\xC3\x90";
const Elango_Tml_Panchali_combo_SI      = "\xC3\x8E";
const Elango_Tml_Panchali_combo_SII     = "\xC3\x8F";
const Elango_Tml_Panchali_combo_SPULLI  = "\xC3\x8D";
const Elango_Tml_Panchali_combo_HI      = "\xC3\x8B";
const Elango_Tml_Panchali_combo_HII     = "\xC3\x8C";
const Elango_Tml_Panchali_combo_HPULLI  = "\xC3\x8A";

const Elango_Tml_Panchali_combo_LLI     = "\xC2\xB8";
const Elango_Tml_Panchali_combo_LLII    = "\xC2\xB9";
const Elango_Tml_Panchali_combo_LLU     = "\xC2\xBA";
const Elango_Tml_Panchali_combo_LLUU    = "\xC2\xBB";
const Elango_Tml_Panchali_combo_LLPULLI = "\xC2\xB7";
const Elango_Tml_Panchali_combo_ZHI     = "\xC2\xB3";
const Elango_Tml_Panchali_combo_ZHII    = "\xC2\xB4";
const Elango_Tml_Panchali_combo_ZHU     = "\xC2\xB5";
const Elango_Tml_Panchali_combo_ZHUU    = "\xC2\xB6";
const Elango_Tml_Panchali_combo_ZHPULLI = "\xC2\xB2";
const Elango_Tml_Panchali_combo_RRI     = "\xC2\xBD";
const Elango_Tml_Panchali_combo_RRII    = "\xC2\xBE";
const Elango_Tml_Panchali_combo_RRU     = "\xC2\xBF";
const Elango_Tml_Panchali_combo_RRUU    = "\xC3\x80";
const Elango_Tml_Panchali_combo_RRPULLI = "\xC2\xBC";
const Elango_Tml_Panchali_combo_KSHI    = "\xC3\x94";
const Elango_Tml_Panchali_combo_KSHII   = "\xC3\x95";
const Elango_Tml_Panchali_combo_KSHPULLI= "\xC3\x93";

//Matches ASCII
const Elango_Tml_Panchali_EXCLAM         = "\x21";
const Elango_Tml_Panchali_QTDOUBLE       = "\x22";
const Elango_Tml_Panchali_HASH           = "\x23";
const Elango_Tml_Panchali_DOLLAR         = "\x24";
const Elango_Tml_Panchali_PERCENT        = "\x25";
const Elango_Tml_Panchali_QTSINGLE       = "\x27";
const Elango_Tml_Panchali_PARENLEFT      = "\x28";
const Elango_Tml_Panchali_PARENRIGT      = "\x29";
const Elango_Tml_Panchali_ASTERISK       = "\x2A";
const Elango_Tml_Panchali_PLUS           = "\x2B";
const Elango_Tml_Panchali_COMMA          = "\x2C";
const Elango_Tml_Panchali_PERIOD         = "\x2E";
const Elango_Tml_Panchali_SLASH          = "\x2F";
const Elango_Tml_Panchali_COLON          = "\x3A";
const Elango_Tml_Panchali_SEMICOLON      = "\x3B";
const Elango_Tml_Panchali_LESSTHAN       = "\x3C";
const Elango_Tml_Panchali_EQUALS         = "\x3D";
const Elango_Tml_Panchali_GREATERTHAN    = "\x3E";
const Elango_Tml_Panchali_QUESTION       = "\x3F";
//const Elango_Tml_Panchali_ATSIGN         = "\x40";

const Elango_Tml_Panchali_digit_ZERO     = "\x30";
const Elango_Tml_Panchali_digit_ONE      = "\x31";
const Elango_Tml_Panchali_digit_TWO      = "\x32";
const Elango_Tml_Panchali_digit_THREE    = "\x33";
const Elango_Tml_Panchali_digit_FOUR     = "\x34";
const Elango_Tml_Panchali_digit_FIVE     = "\x35";
const Elango_Tml_Panchali_digit_SIX      = "\x36";
const Elango_Tml_Panchali_digit_SEVEN    = "\x37";
const Elango_Tml_Panchali_digit_EIGHT    = "\x38";
const Elango_Tml_Panchali_digit_NINE     = "\x39";

//Does not match ASCII
const Elango_Tml_Panchali_HYPHEN         = "\x5F";

}//end of class


$Elango_Tml_Panchali_toPadma = array();

$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_visarga]  = Padma::Padma_visarga;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_A]  = Padma::Padma_vowel_A;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_AA] = Padma::Padma_vowel_AA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_I]  = Padma::Padma_vowel_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_II] = Padma::Padma_vowel_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_U]  = Padma::Padma_vowel_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_UU] = Padma::Padma_vowel_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_E]  = Padma::Padma_vowel_E;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_EE] = Padma::Padma_vowel_EE;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_AI] = Padma::Padma_vowel_AI;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_O]  = Padma::Padma_vowel_O;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_OO] = Padma::Padma_vowel_OO;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_AU] = Padma::Padma_vowel_AU;

$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_KA]  = Padma::Padma_consnt_KA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_NGA] = Padma::Padma_consnt_NGA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_CA]  = Padma::Padma_consnt_CA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_JA]  = Padma::Padma_consnt_JA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_NYA] = Padma::Padma_consnt_NYA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_TTA] = Padma::Padma_consnt_TTA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_NNA] = Padma::Padma_consnt_NNA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_TA]  = Padma::Padma_consnt_TA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_NA]  = Padma::Padma_consnt_NA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_NNNA] = Padma::Padma_consnt_NNNA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_PA]  = Padma::Padma_consnt_PA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_MA]  = Padma::Padma_consnt_MA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_YA]  = Padma::Padma_consnt_YA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_RA]  = Padma::Padma_consnt_RA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_LA]  = Padma::Padma_consnt_LA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_VA]  = Padma::Padma_consnt_VA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_SSA] = Padma::Padma_consnt_SSA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_SA]  = Padma::Padma_consnt_SA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_HA]  = Padma::Padma_consnt_HA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_LLA] = Padma::Padma_consnt_LLA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_consnt_RRA] = Padma::Padma_consnt_RRA;

$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_conjct_KSH] = Padma::Padma_consnt_KA .
                                                                                    Padma::Padma_vattu_SSA;

$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_conjct_SRII] = Padma::Padma_consnt_SA . 
                                                                                     Padma::Padma_vattu_RA . 
										     Padma::Padma_vowelsn_II;

//Gunintamulu
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_AA]  = Padma::Padma_vowelsn_AA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_I]   = Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_U] = Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_UU]  = Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_E_1] = Padma::Padma_vowelsn_E;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_E_2] = Padma::Padma_vowelsn_E;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_E_3] = Padma::Padma_vowelsn_E;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_EE]  = Padma::Padma_vowelsn_EE;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_AI]  = Padma::Padma_vowelsn_AI;

// Old format_ No lomger used_
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNAA] = Padma::Padma_consnt_NNA . 
                                                                                    Padma::Padma_vowelsn_AA;
										    
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNNAA] = Padma::Padma_consnt_NNNA .
                                                                                     Padma::Padma_vowelsn_AA;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RRAA] = Padma::Padma_consnt_RRA . 
                                                                                    Padma::Padma_vowelsn_AA;


$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KAU]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NGAU]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_CAU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_JAU]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NYAU]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TTAU]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNAU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TAU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NAU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNNAU]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_PAU]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_MAU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_YAU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RAU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LAU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_VAU]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_SSAU]     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_SAU]      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_HAU]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LLAU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_ZHAU]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RRAU]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_AU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KSHAU]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_AU;

//Special Combinations
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KI]      = Padma::Padma_consnt_KA . 
                                                                                       Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KII]     = Padma::Padma_consnt_KA . 
                                                                                       Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KU]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KUU]     = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KPULLI]  = Padma::Padma_consnt_KA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NGI]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NGII]    = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NGU]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NGUU]    = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NGPULLI] = Padma::Padma_consnt_NGA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_CU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_CUU]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_CPULLI]  = Padma::Padma_consnt_CA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_JPULLI]  = Padma::Padma_consnt_JA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NYI]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NYII]    = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NYU]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NYUU]    = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NYPULLI] = Padma::Padma_consnt_NYA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TTI]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TTII]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TTU]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TTUU]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TTPULLI] = Padma::Padma_consnt_TTA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNI]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNII]    = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNUU]    = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNPULLI] = Padma::Padma_consnt_NNA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TUU]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_TPULLI]  = Padma::Padma_consnt_TA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NUU]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NPULLI]  = Padma::Padma_consnt_NA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNNI]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNNII]   = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNNU]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNNUU]   = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_NNNPULLI] = Padma::Padma_consnt_NNNA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_PI]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_PII]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_PU]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_PUU]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_PPULLI]  = Padma::Padma_consnt_PA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_MPULLI]  = Padma::Padma_consnt_MA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_YU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_YUU]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_YPULLI]  = Padma::Padma_consnt_YA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RPULLI]  = Padma::Padma_consnt_RA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LUU]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LPULLI]  = Padma::Padma_consnt_LA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_VU]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_VUU]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_VPULLI]  = Padma::Padma_consnt_VA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_SSI]     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_SSII]    = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_SSPULLI] = Padma::Padma_consnt_SSA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_SI]      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_SII]     = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_SPULLI]  = Padma::Padma_consnt_SA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_HI]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_HII]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_HPULLI]  = Padma::Padma_consnt_HA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LLU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LLUU]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_LLPULLI] = Padma::Padma_consnt_LLA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_ZHI]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_ZHII]    = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_ZHU]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_ZHUU]    = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_ZHPULLI] = Padma::Padma_consnt_ZHA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RRI]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RRII]    = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RRU]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_U;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RRUU]    = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_UU;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_RRPULLI] = Padma::Padma_consnt_RRA . Padma::Padma_pulli;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KSHI]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_I;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KSHII]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_II;
$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_combo_KSHPULLI]= Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_pulli;

$Elango_Tml_Panchali_toPadma[Elango_Tml_Panchali::Elango_Tml_Panchali_HYPHEN]   = "-";

$Elango_Tml_Panchali_prefixList = array();
$Elango_Tml_Panchali_prefixList[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_E_1]   = true;
$Elango_Tml_Panchali_prefixList[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_E_2]   = true;
$Elango_Tml_Panchali_prefixList[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_E_3]   = true;
$Elango_Tml_Panchali_prefixList[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_EE]    = true;
$Elango_Tml_Panchali_prefixList[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_AI]    = true;

$Elango_Tml_Panchali_overloadList = array();
$Elango_Tml_Panchali_overloadList[Elango_Tml_Panchali::Elango_Tml_Panchali_vowel_O]     = true;
$Elango_Tml_Panchali_overloadList[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_E_1] = true;
$Elango_Tml_Panchali_overloadList[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_E_2] = true;
$Elango_Tml_Panchali_overloadList[Elango_Tml_Panchali::Elango_Tml_Panchali_vowelsn_E_3] = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x4C"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x4D"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x4E"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x4F"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x50"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x51"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x52"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x53"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x54"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x5D"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x55"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x56"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x57"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x58"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x59"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x5A"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x5B"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x5C"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x61"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x62"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x63"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x64"]    = true;
$Elango_Tml_Panchali_overloadList["\xC3\x99\x5E"]    = true;

function ElangoTmlPanchali_initialize()
{
    global $fontinfo;

    $fontinfo["elango-tml-panchali-normal"]["language"] = "Tamil";
    $fontinfo["elango-tml-panchali-normal"]["class"] = "Elango_Tml_Panchali";
}
?>
