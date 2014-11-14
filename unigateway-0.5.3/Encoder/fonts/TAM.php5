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

//The TAM standard (http://www.tamilvu.org/Tamilnet99/encstd.htm)
class TAM
{
function TAM()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "TAM";
var $displayName  = "TAM";
var $script       = Padma::Padma_script_TAMIL;

function lookup ($str) 
{
    global $TAM_toPadma;
    if (array_key_exists($str, $TAM_toPadma)) {
        return $TAM_toPadma[$str];
    }
    return "";
}

function isPrefixSymbol ($str)
{ 
    global $TAM_prefixList;
    return array_key_exists($str, $TAM_prefixList);
}


function isOverloaded ($str)
{
    global $TAM_overloadList;
    return array_key_exists($str, $TAM_overloadList);
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
const TAM_visarga        = "\xC3\xA7";  //aytham
const TAM_virama         = "\xC2\xA2";

//Vowels
const TAM_vowel_A        = "\xC3\x9C";
const TAM_vowel_AA       = "\xC3\x9D";
const TAM_vowel_I        = "\xC3\x9E";
const TAM_vowel_II       = "\xC3\x9F";
const TAM_vowel_U        = "\xC3\xA0";
const TAM_vowel_UU       = "\xC3\xA1";
const TAM_vowel_E        = "\xC3\xA2";
const TAM_vowel_EE       = "\xC3\xA3";
const TAM_vowel_AI       = "\xC3\xA4";
const TAM_vowel_O        = "\xC3\xA5";
const TAM_vowel_OO       = "\xC3\xA6";
const TAM_vowel_AU       = "\xC3\xA5\xC3\xB7";

//Consonants
const TAM_consnt_KA      = "\xC3\xA8";
const TAM_consnt_NGA     = "\xC3\xA9";

const TAM_consnt_CA      = "\xC3\xAA";
const TAM_consnt_JA      = "\xC3\xBC";
const TAM_consnt_NYA     = "\xC3\xAB";

const TAM_consnt_TTA     = "\xC3\xAC";
const TAM_consnt_NNA     = "\xC3\xAD";

const TAM_consnt_TA      = "\xC3\xAE";
const TAM_consnt_NA      = "\xC3\xAF";
const TAM_consnt_NNNA    = "\xC3\xB9";

const TAM_consnt_PA      = "\xC3\xB0";
const TAM_consnt_MA      = "\xC3\xB1";

const TAM_consnt_YA      = "\xC3\xB2";
const TAM_consnt_RA      = "\xC3\xB3";
const TAM_consnt_LA      = "\xC3\xB4";
const TAM_consnt_VA      = "\xC3\xB5";
const TAM_consnt_SSA     = "\xC3\xBB";
const TAM_consnt_SA      = "\xC3\xBA";
const TAM_consnt_HA      = "\xC3\xBD";
const TAM_consnt_LLA     = "\xC3\xB7";
const TAM_consnt_ZHA     = "\xC3\xB6";
const TAM_consnt_RRA     = "\xC3\xB8";
const TAM_conjct_KSH     = "\xC3\xBE";
const TAM_conjct_SRII    = "\xC3\xBF";

//Gunintamulu
const TAM_vowelsn_AA     = "\xC2\xA3";
const TAM_vowelsn_I      = "\xC2\xA4";
const TAM_vowelsn_II     = "\xC2\xA6";
const TAM_vowelsn_U      = "\xC2\xA7";	
const TAM_vowelsn_UU     = "\xC2\xA8";
const TAM_vowelsn_E      = "\xC2\xAA";
const TAM_vowelsn_EE     = "\xC2\xAB";
const TAM_vowelsn_AI     = "\xC2\xAC";

//const TAM uses the same symbol for generating vowelsn_AU and consnt_LLA_ This is a work around
const TAM_combo_KAU      = "\xC2\xAA\xC3\xA8\xC3\xB7";
const TAM_combo_NGAU     = "\xC2\xAA\xC3\xA9\xC3\xB7";
const TAM_combo_CAU      = "\xC2\xAA\xC3\xAA\xC3\xB7";
const TAM_combo_JAU      = "\xC2\xAA\xC3\xBC\xC3\xB7";
const TAM_combo_NYAU     = "\xC2\xAA\xC3\xAB\xC3\xB7";
const TAM_combo_TTAU     = "\xC2\xAA\xC3\xAC\xC3\xB7";
const TAM_combo_NNAU     = "\xC2\xAA\xC3\xAD\xC3\xB7";
const TAM_combo_TAU      = "\xC2\xAA\xC3\xAE\xC3\xB7";
const TAM_combo_NAU      = "\xC2\xAA\xC3\xAF\xC3\xB7";
const TAM_combo_NNNAU    = "\xC2\xAA\xC3\xB9\xC3\xB7";
const TAM_combo_PAU      = "\xC2\xAA\xC3\xB0\xC3\xB7";
const TAM_combo_MAU      = "\xC2\xAA\xC3\xB1\xC3\xB7";
const TAM_combo_YAU      = "\xC2\xAA\xC3\xB2\xC3\xB7";
const TAM_combo_RAU      = "\xC2\xAA\xC3\xB3\xC3\xB7";
const TAM_combo_LAU      = "\xC2\xAA\xC3\xB4\xC3\xB7";
const TAM_combo_VAU      = "\xC2\xAA\xC3\xB5\xC3\xB7";
const TAM_combo_SSAU     = "\xC2\xAA\xC3\xBB\xC3\xB7";
const TAM_combo_SAU      = "\xC2\xAA\xC3\xBA\xC3\xB7";
const TAM_combo_HAU      = "\xC2\xAA\xC3\xBD\xC3\xB7";
const TAM_combo_LLAU     = "\xC2\xAA\xC3\xB7\xC3\xB7";
const TAM_combo_ZHAU     = "\xC2\xAA\xC3\xB6\xC3\xB7";
const TAM_combo_RRAU     = "\xC2\xAA\xC3\xB8\xC3\xB7";
const TAM_combo_KSHAU    = "\xC2\xAA\xC3\xBE\xC3\xB7";

//Special Combinations
const TAM_combo_KI      = "\x41";
const TAM_combo_KII     = "\x57";
const TAM_combo_KU      = "\xC2\xB0";
const TAM_combo_KUU     = "\xC3\x83";
const TAM_combo_KPULLI  = "\xE2\x80\x9A";
const TAM_combo_NGI     = "\x42";
const TAM_combo_NGII    = "\x58";
const TAM_combo_NGU     = "\xC2\xB1";
const TAM_combo_NGUU    = "\xC3\x84";
const TAM_combo_NGPULLI = "\xC6\x92";

const TAM_combo_CI      = "\x43";
const TAM_combo_CII     = "\x59";
const TAM_combo_CU      = "\xC2\xB2";
const TAM_combo_CUU     = "\xC3\x85";
const TAM_combo_CPULLI  = "\xE2\x80\x9E";
const TAM_combo_JI      = "\x54";
const TAM_combo_JII     = "\x70";
const TAM_combo_JPULLI  = "\x78";
const TAM_combo_NYI     = "\x44";
const TAM_combo_NYII    = "\x5A";
const TAM_combo_NYU     = "\xC2\xB3";
const TAM_combo_NYUU    = "\xC3\x86";
const TAM_combo_NYPULLI = "\xE2\x80\xA6";

const TAM_combo_TTI     = "\xC2\xAE";
const TAM_combo_TTII    = "\xC2\xAF";
const TAM_combo_TTU     = "\xC2\xB4";
const TAM_combo_TTUU    = "\xC3\x87";
const TAM_combo_TTPULLI = "\xE2\x80\xA0";
const TAM_combo_NNI     = "\x45";
const TAM_combo_NNII    = "\x61";
const TAM_combo_NNU     = "\xC2\xB5";
const TAM_combo_NNUU    = "\xC3\x88";
const TAM_combo_NNPULLI = "\xE2\x80\xA1";

const TAM_combo_TI      = "\x46";
const TAM_combo_TII     = "\x62";
const TAM_combo_TU      = "\xC2\xB6";
const TAM_combo_TUU     = "\xC3\x89";
const TAM_combo_TPULLI  = "\xCB\x86";
const TAM_combo_NI      = "\x47";
const TAM_combo_NII     = "\x63";
const TAM_combo_NU      = "\xC2\xB8";
const TAM_combo_NUU     = "\xC3\x8B";
const TAM_combo_NPULLI  = "\xE2\x80\xB0";
const TAM_combo_NNNI    = "\x51";
const TAM_combo_NNNII   = "\x6D";
const TAM_combo_NNNU    = "\xC3\x82";
const TAM_combo_NNNUU   = "\xC3\x9B";
const TAM_combo_NNNPULLI= "\xC2\xA1";

const TAM_combo_PI      = "\x48";
const TAM_combo_PII     = "\x64";
const TAM_combo_PU      = "\xC2\xB9";
const TAM_combo_PUU     = "\xC3\x8C";
const TAM_combo_PPULLI  = "\xC5\xA0";
const TAM_combo_MI      = "\x49";
const TAM_combo_MII     = "\x65";
const TAM_combo_MU      = "\xC2\xBA";
const TAM_combo_MUU     = "\xC3\x8D";
const TAM_combo_MPULLI  = "\xE2\x80\xB9";

const TAM_combo_YI      = "\x4A";
const TAM_combo_YII     = "\x66";
const TAM_combo_YU      = "\xC2\xBB";
const TAM_combo_YUU     = "\xC3\x8E";
const TAM_combo_YPULLI  = "\xC5\x92";
const TAM_combo_RI      = "\x4B";
const TAM_combo_RII     = "\x67";
const TAM_combo_RU      = "\xC2\xBC";
const TAM_combo_RUU     = "\xC3\x8F";
const TAM_combo_RPULLI  = "\xCB\x9C";
const TAM_combo_LI      = "\x4C";
const TAM_combo_LII     = "\x68";
const TAM_combo_LU      = "\xC2\xBD";
const TAM_combo_LUU     = "\xC3\x96";
const TAM_combo_LPULLI  = "\xE2\x84\xA2";
const TAM_combo_VI      = "\x4D";
const TAM_combo_VII     = "\x69";
const TAM_combo_VU      = "\xC2\xBE";
const TAM_combo_VUU     = "\xC3\x97";
const TAM_combo_VPULLI  = "\xC5\xA1";

const TAM_combo_SSI     = "\x53";
const TAM_combo_SSII    = "\x6F";
const TAM_combo_SSPULLI = "\x77";
const TAM_combo_SI      = "\x52";
const TAM_combo_SII     = "\x6E";
const TAM_combo_SPULLI  = "\x76";
const TAM_combo_HI      = "\x55";
const TAM_combo_HII     = "\x71";
const TAM_combo_HPULLI  = "\x79";

const TAM_combo_LLI     = "\x4F";
const TAM_combo_LLII    = "\x6B";
const TAM_combo_LLU     = "\xC3\x80";
const TAM_combo_LLUU    = "\xC3\x99";
const TAM_combo_LLPULLI = "\xC5\x93";
const TAM_combo_ZHI     = "\x4E";
const TAM_combo_ZHII    = "\x6A";
const TAM_combo_ZHU     = "\xC2\xBF";
const TAM_combo_ZHUU    = "\xC3\x98";
const TAM_combo_ZHPULLI = "\xE2\x80\xBA";
const TAM_combo_RRI     = "\x50";
const TAM_combo_RRII    = "\x6C";
const TAM_combo_RRU     = "\xC3\x81";
const TAM_combo_RRUU    = "\xC3\x9A";
const TAM_combo_RRPULLI = "\xC5\xB8";
const TAM_combo_KSHI    = "\x56";
const TAM_combo_KSHII   = "\x72";
const TAM_combo_KSHPULLI= "\x7A";

//Misc
const TAM_sign_DAY       = "\x73";
const TAM_sign_MONTH     = "\x74";
const TAM_sign_YEAR      = "\x75";
const TAM_sign_RUPEE     = "\xE2\x80\x93";
const TAM_sign_DITTO     = "\xE2\x80\x94";
const TAM_sign_NUMBER    = "\xC2\xAD";
const TAM_sign_DEBIT     = "\xC3\x90";
const TAM_sign_CREDIT    = "\xC3\x91";

//Matches ASCII
const TAM_EXCLAM         = "\x21";
const TAM_QTDOUBLE       = "\x22";
const TAM_HASH           = "\x23";
const TAM_DOLLAR         = "\x24";
const TAM_PERCENT        = "\x25";
const TAM_QTSINGLE       = "\x27";
const TAM_PARENLEFT      = "\x28";
const TAM_PARENRIGT      = "\x29";
const TAM_ASTERISK       = "\x2A";
const TAM_PLUS           = "\x2B";
const TAM_COMMA          = "\x2C";
const TAM_PERIOD         = "\x2E";
const TAM_SLASH          = "\x2F";
const TAM_COLON          = "\x3A";
const TAM_SEMICOLON      = "\x3B";
const TAM_LESSTHAN       = "\x3C";
const TAM_EQUALS         = "\x3D";
const TAM_GREATERTHAN    = "\x3E";
const TAM_QUESTION       = "\x3F";
const TAM_ATSIGN         = "\x40";

const TAM_digit_ZERO     = "\x30";
const TAM_digit_ONE      = "\x31";
const TAM_digit_TWO      = "\x32";
const TAM_digit_THREE    = "\x33";
const TAM_digit_FOUR     = "\x34";
const TAM_digit_FIVE     = "\x35";
const TAM_digit_SIX      = "\x36";
const TAM_digit_SEVEN    = "\x37";
const TAM_digit_EIGHT    = "\x38";
const TAM_digit_NINE     = "\x39";

//Does not match ASCII
const TAM_HYPHEN         = "\x26";
const TAM_LQTSINGLE_1    = "\xE2\x80\x98";
const TAM_LQTSINGLE_2    = "\xC3\x94";
const TAM_RQTSINGLE_1    = "\xE2\x80\x99";
const TAM_RQTSINGLE_2    = "\xC3\x95";
const TAM_LQTDOUBLE_1    = "\xE2\x80\x9C";
const TAM_LQTDOUBLE_2    = "\xC3\x92";
const TAM_RQTDOUBLE_1    = "\xE2\x80\x9D";
const TAM_RQTDOUBLE_2    = "\xC3\x93";


}//end of class

$TAM_toPadma = array();

$TAM_toPadma[TAM::TAM_visarga]  = Padma::Padma_visarga;
$TAM_toPadma[TAM::TAM_virama]   = Padma::Padma_virama;
$TAM_toPadma[TAM::TAM_vowel_A]  = Padma::Padma_vowel_A;
$TAM_toPadma[TAM::TAM_vowel_AA] = Padma::Padma_vowel_AA;
$TAM_toPadma[TAM::TAM_vowel_I]  = Padma::Padma_vowel_I;
$TAM_toPadma[TAM::TAM_vowel_II] = Padma::Padma_vowel_II;
$TAM_toPadma[TAM::TAM_vowel_U]  = Padma::Padma_vowel_U;
$TAM_toPadma[TAM::TAM_vowel_UU] = Padma::Padma_vowel_UU;
$TAM_toPadma[TAM::TAM_vowel_E]  = Padma::Padma_vowel_E;
$TAM_toPadma[TAM::TAM_vowel_EE] = Padma::Padma_vowel_EE;
$TAM_toPadma[TAM::TAM_vowel_AI] = Padma::Padma_vowel_AI;
$TAM_toPadma[TAM::TAM_vowel_O]  = Padma::Padma_vowel_O;
$TAM_toPadma[TAM::TAM_vowel_OO] = Padma::Padma_vowel_OO;
$TAM_toPadma[TAM::TAM_vowel_AU] = Padma::Padma_vowel_AU;

$TAM_toPadma[TAM::TAM_consnt_KA]  = Padma::Padma_consnt_KA;
$TAM_toPadma[TAM::TAM_consnt_NGA] = Padma::Padma_consnt_NGA;
$TAM_toPadma[TAM::TAM_consnt_CA]  = Padma::Padma_consnt_CA;
$TAM_toPadma[TAM::TAM_consnt_JA]  = Padma::Padma_consnt_JA;
$TAM_toPadma[TAM::TAM_consnt_NYA] = Padma::Padma_consnt_NYA;
$TAM_toPadma[TAM::TAM_consnt_TTA] = Padma::Padma_consnt_TTA;
$TAM_toPadma[TAM::TAM_consnt_NNA] = Padma::Padma_consnt_NNA;
$TAM_toPadma[TAM::TAM_consnt_TA]  = Padma::Padma_consnt_TA;
$TAM_toPadma[TAM::TAM_consnt_NA]  = Padma::Padma_consnt_NA;
$TAM_toPadma[TAM::TAM_consnt_NNNA] = Padma::Padma_consnt_NNNA;
$TAM_toPadma[TAM::TAM_consnt_PA]  = Padma::Padma_consnt_PA;
$TAM_toPadma[TAM::TAM_consnt_MA]  = Padma::Padma_consnt_MA;
$TAM_toPadma[TAM::TAM_consnt_YA]  = Padma::Padma_consnt_YA;
$TAM_toPadma[TAM::TAM_consnt_RA]  = Padma::Padma_consnt_RA;
$TAM_toPadma[TAM::TAM_consnt_LA]  = Padma::Padma_consnt_LA;
$TAM_toPadma[TAM::TAM_consnt_VA]  = Padma::Padma_consnt_VA;
$TAM_toPadma[TAM::TAM_consnt_SSA] = Padma::Padma_consnt_SSA;
$TAM_toPadma[TAM::TAM_consnt_SA]  = Padma::Padma_consnt_SA;
$TAM_toPadma[TAM::TAM_consnt_HA]  = Padma::Padma_consnt_HA;
$TAM_toPadma[TAM::TAM_consnt_LLA] = Padma::Padma_consnt_LLA;
$TAM_toPadma[TAM::TAM_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$TAM_toPadma[TAM::TAM_consnt_RRA] = Padma::Padma_consnt_RRA;
$TAM_toPadma[TAM::TAM_conjct_KSH] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$TAM_toPadma[TAM::TAM_conjct_SRII]= Padma::Padma_consnt_SA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;

//Gunintamulu
$TAM_toPadma[TAM::TAM_vowelsn_AA]  = Padma::Padma_vowelsn_AA;
$TAM_toPadma[TAM::TAM_vowelsn_I]   = Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_vowelsn_II]  = Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_vowelsn_U]   = Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_vowelsn_UU]  = Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_vowelsn_E]   = Padma::Padma_vowelsn_E;
$TAM_toPadma[TAM::TAM_vowelsn_EE]  = Padma::Padma_vowelsn_EE;
$TAM_toPadma[TAM::TAM_vowelsn_AI]  = Padma::Padma_vowelsn_AI;

$TAM_combo_KAU      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_AU;
$TAM_combo_NGAU     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_AU;
$TAM_combo_CAU      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_AU;
$TAM_combo_JAU      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_AU;
$TAM_combo_NYAU     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_AU;
$TAM_combo_TTAU     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_AU;
$TAM_combo_NNAU     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_AU;
$TAM_combo_TAU      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_AU;
$TAM_combo_NAU      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_AU;
$TAM_combo_NNNAU    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_AU;
$TAM_combo_PAU      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AU;
$TAM_combo_MAU      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$TAM_combo_YAU      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AU;
$TAM_combo_RAU      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AU;
$TAM_combo_LAU      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_AU;
$TAM_combo_VAU      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_AU;
$TAM_combo_SSAU     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_AU;
$TAM_combo_SAU      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_AU;
$TAM_combo_HAU      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AU;
$TAM_combo_LLAU     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_AU;
$TAM_combo_ZHAU     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_AU;
$TAM_combo_RRAU     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_AU;
$TAM_combo_KSHAU    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_AU;

//Special Combinations
$TAM_toPadma[TAM::TAM_combo_KI]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_KII]     = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_KU]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_KUU]     = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_KPULLI]  = Padma::Padma_consnt_KA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_NGI]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_NGII]    = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_NGU]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_NGUU]    = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_NGPULLI] = Padma::Padma_consnt_NGA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_CU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_CUU]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_CPULLI]  = Padma::Padma_consnt_CA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_JPULLI]  = Padma::Padma_consnt_JA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_NYI]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_NYII]    = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_NYU]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_NYUU]    = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_NYPULLI] = Padma::Padma_consnt_NYA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_TTI]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_TTII]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_TTU]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_TTUU]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_TTPULLI] = Padma::Padma_consnt_TTA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_NNI]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_NNII]    = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_NNU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_NNUU]    = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_NNPULLI] = Padma::Padma_consnt_NNA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_TU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_TUU]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_TPULLI]  = Padma::Padma_consnt_TA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_NU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_NUU]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_NPULLI]  = Padma::Padma_consnt_NA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_NNNI]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_NNNII]   = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_NNNU]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_NNNUU]   = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_NNNPULLI] = Padma::Padma_consnt_NNNA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_PI]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_PII]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_PU]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_PUU]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_PPULLI]  = Padma::Padma_consnt_PA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_MPULLI]  = Padma::Padma_consnt_MA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_YU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_YUU]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_YPULLI]  = Padma::Padma_consnt_YA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_RPULLI]  = Padma::Padma_consnt_RA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_LU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_LUU]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_LPULLI]  = Padma::Padma_consnt_LA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_VU]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_VUU]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_VPULLI]  = Padma::Padma_consnt_VA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_SSI]     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_SSII]    = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_SSPULLI] = Padma::Padma_consnt_SSA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_SI]      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_SII]     = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_SPULLI]  = Padma::Padma_consnt_SA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_HI]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_HII]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_HPULLI]  = Padma::Padma_consnt_HA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_LLU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_LLUU]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_LLPULLI] = Padma::Padma_consnt_LLA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_ZHI]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_ZHII]    = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_ZHU]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_ZHUU]    = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_ZHPULLI] = Padma::Padma_consnt_ZHA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_RRI]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_RRII]    = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_RRU]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_U;
$TAM_toPadma[TAM::TAM_combo_RRUU]    = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_UU;
$TAM_toPadma[TAM::TAM_combo_RRPULLI] = Padma::Padma_consnt_RRA . Padma::Padma_pulli;
$TAM_toPadma[TAM::TAM_combo_KSHI]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_I;
$TAM_toPadma[TAM::TAM_combo_KSHII]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_II;
$TAM_toPadma[TAM::TAM_combo_KSHPULLI]= Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_pulli;

$TAM_toPadma[TAM::TAM_HYPHEN]      = "-";
$TAM_toPadma[TAM::TAM_LQTSINGLE_1] = "\xE2\x80\x98";
$TAM_toPadma[TAM::TAM_LQTSINGLE_2] = "\xE2\x80\x98";
$TAM_toPadma[TAM::TAM_RQTSINGLE_1] = "\xE2\x80\x99";
$TAM_toPadma[TAM::TAM_RQTSINGLE_2] = "\xE2\x80\x99";
$TAM_toPadma[TAM::TAM_LQTDOUBLE_1] = "\xE2\x80\x9C";
$TAM_toPadma[TAM::TAM_LQTDOUBLE_2] = "\xE2\x80\x9C";
$TAM_toPadma[TAM::TAM_RQTDOUBLE_1] = "\xE2\x80\x9D";
$TAM_toPadma[TAM::TAM_RQTDOUBLE_2] = "\xE2\x80\x9D";

$TAM_toPadma[TAM::TAM_sign_DAY]    = Padma::Padma_sign_DAY;
$TAM_toPadma[TAM::TAM_sign_MONTH]  = Padma::Padma_sign_MONTH;
$TAM_toPadma[TAM::TAM_sign_YEAR]   = Padma::Padma_sign_YEAR;
$TAM_toPadma[TAM::TAM_sign_RUPEE]  = Padma::Padma_sign_RUPEE;
$TAM_toPadma[TAM::TAM_sign_DITTO]  = Padma::Padma_sign_ASABOVE;
$TAM_toPadma[TAM::TAM_sign_NUMBER] = Padma::Padma_sign_NUMBER;
$TAM_toPadma[TAM::TAM_sign_DEBIT]  = Padma::Padma_sign_DEBIT;
$TAM_toPadma[TAM::TAM_sign_CREDIT] = Padma::Padma_sign_CREDIT;

$TAM_prefixList = array();
$TAM_prefixList[TAM::TAM_vowelsn_E]   = true;
$TAM_prefixList[TAM::TAM_vowelsn_EE]  = true;
$TAM_prefixList[TAM::TAM_vowelsn_AI]  = true;

$TAM_overloadList = array();
$TAM_overloadList[TAM::TAM_vowel_O]   = true;
$TAM_overloadList[TAM::TAM_vowelsn_E] = true;
$TAM_overloadList["\xC2\xAA\xC3\xA8"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xA9"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xAA"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xBC"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xAB"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xAC"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xAD"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xAE"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xAF"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB9"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB0"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB1"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB2"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB3"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB4"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB5"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xBB"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xBA"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xBD"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB7"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB6"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xB8"]    = true;
$TAM_overloadList["\xC2\xAA\xC3\xBE"]    = true;

function TAM_initialize()
{
    global $fontinfo;

    $fontinfo["tam"]["language"] = "Tamil";
    $fontinfo["tam"]["class"] = "TAM";
}
?>
