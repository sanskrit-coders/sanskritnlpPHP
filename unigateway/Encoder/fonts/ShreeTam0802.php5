<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Contributed by Saravana Kumar <saravanannkl@gmail.com>
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

class Shree_Tam_0802
{
function Shree_Tam_0802()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "Shree-Tam-0802";
var $displayName  = "Shree Tam 0802";
var $script       =  Padma::Padma_script_TAMIL;

function lookup ($str) 
{
  global $Shree_Tam_0802_toPadma;
  return $Shree_Tam_0802_toPadma[$str];
}

function isPrefixSymbol ($str)
{
 global  $Shree_Tam_0802_prefixList;
 return $Shree_Tam_0802_prefixList[$str] != null;
}

 function isOverloaded ($str)
{
    global $Shree_Tam_0802_overloadList;
    return $Shree_Tam_0802_overloadList[$str] != null;
}

 function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_O;
    if ($sign2 == Padma::Padma_vowelsn_EE && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;    
}

 function isRedundant ($str)
{
    global $Shree_Tam_0802_redundantList;
    return $Shree_Tam_0802_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const Shree_Tam_0802_visarga        = "\x4C";  //aytham

//Vowels
const Shree_Tam_0802_vowel_A        = "\x41";
const Shree_Tam_0802_vowel_AA       = "\x42";
const Shree_Tam_0802_vowel_I        = "\x43";
const Shree_Tam_0802_vowel_II       = "\x44";
const Shree_Tam_0802_vowel_U        = "\x45";
const Shree_Tam_0802_vowel_UU       = "\x46";
const Shree_Tam_0802_vowel_E        = "\x47";
const Shree_Tam_0802_vowel_EE       = "\x48";
const Shree_Tam_0802_vowel_AI       = "\x49";
const Shree_Tam_0802_vowel_O        = "\x4A";
const Shree_Tam_0802_vowel_OO       = "\x4B";
const Shree_Tam_0802_vowel_AU       = "\x4B\xC3\x8D";

//Consonants
const Shree_Tam_0802_consnt_KA      = "\x50";
const Shree_Tam_0802_consnt_NGA     = "\x56";

const Shree_Tam_0802_consnt_CA      = "\x5C";
const Shree_Tam_0802_consnt_JA      = "\xC3\xA1";
const Shree_Tam_0802_consnt_NYA     = "\x62";

const Shree_Tam_0802_consnt_TTA     = "\x68";
const Shree_Tam_0802_consnt_NNA     = "\x6E";

const Shree_Tam_0802_consnt_TA      = "\x75";
const Shree_Tam_0802_consnt_NA      = "\x7C";
const Shree_Tam_0802_consnt_NNNA    = "\xC3\x9A";

const Shree_Tam_0802_consnt_PA      = "\xC2\xA3";
const Shree_Tam_0802_consnt_MA      = "\xC2\xA9";

const Shree_Tam_0802_consnt_YA      = "\xC2\xAF";
const Shree_Tam_0802_consnt_RA      = "\xC2\xB5";
const Shree_Tam_0802_consnt_LA      = "\xC2\xBB";
const Shree_Tam_0802_consnt_VA      = "\xC3\x81";
const Shree_Tam_0802_consnt_SSA     = "\xC3\xA5";
const Shree_Tam_0802_consnt_SA      = "\xC3\xA9";
const Shree_Tam_0802_consnt_HA      = "\xC3\xAD";
const Shree_Tam_0802_consnt_LLA     = "\xC3\x8D";
const Shree_Tam_0802_consnt_ZHA     = "\xC3\x87";
const Shree_Tam_0802_consnt_RRA     = "\xC3\x93";
const Shree_Tam_0802_conjct_KSH     = "\xC3\xB1";
const Shree_Tam_0802_conjct_SRII    = "\xC3\xBF";

//Gunintamulu
const Shree_Tam_0802_vowelsn_AA     = "\xC3\xB5";
const Shree_Tam_0802_vowelsn_I      = "\xC2\x91";
const Shree_Tam_0802_vowelsn_U_1    = "\xC3\xBA";	
const Shree_Tam_0802_vowelsn_U_2    = "\xC3\xBB";	
const Shree_Tam_0802_vowelsn_UU_1   = "\xC3\xBC";
const Shree_Tam_0802_vowelsn_UU_2   = "\xC3\xBD";
const Shree_Tam_0802_vowelsn_E_1    = "\xC3\xB6";
const Shree_Tam_0802_vowelsn_E_2    = "\xC3\xB9";
const Shree_Tam_0802_vowelsn_EE     = "\xC3\xB7";
const Shree_Tam_0802_vowelsn_AI     = "\xC3\xB8";

// Old format_ No lomger used_
const Shree_Tam_0802_combo_NNAA     = "\x74";
const Shree_Tam_0802_combo_NNNAA    = "\xC3\xA0";
const Shree_Tam_0802_combo_RRAA     = "\xC3\x99";

//const Shree_Tam_0802 uses the same symbol for generating vowelsn_AU and consnt_LLA_ This is a work around
const Shree_Tam_0802_combo_KAU      = "\xC3\xB6\x50\xC3\x8D";
const Shree_Tam_0802_combo_NGAU     = "\xC3\xB6\x56\xC3\x8D";
const Shree_Tam_0802_combo_CAU      = "\xC3\xB6\x5C\xC3\x8D";
const Shree_Tam_0802_combo_JAU      = "\xC3\xB6\xC3\xA1\xC3\x8D";
const Shree_Tam_0802_combo_NYAU     = "\xC3\xB6\x62\xC3\x8D";
const Shree_Tam_0802_combo_TTAU     = "\xC3\xB6\x68\xC3\x8D";
const Shree_Tam_0802_combo_NNAU     = "\xC3\xB6\x6E\xC3\x8D";
const Shree_Tam_0802_combo_TAU      = "\xC3\xB6\x75\xC3\x8D";
const Shree_Tam_0802_combo_NAU      = "\xC3\xB6\x7C\xC3\x8D";
const Shree_Tam_0802_combo_NNNAU    = "\xC3\xB6\xC3\x9A\xC3\x8D";
const Shree_Tam_0802_combo_PAU      = "\xC3\xB6\xC2\xA3\xC3\x8D";
const Shree_Tam_0802_combo_MAU      = "\xC3\xB6\xC2\xA9\xC3\x8D";
const Shree_Tam_0802_combo_YAU      = "\xC3\xB6\xC2\xAF\xC3\x8D";
const Shree_Tam_0802_combo_RAU      = "\xC3\xB6\xC2\xB5\xC3\x8D";
const Shree_Tam_0802_combo_LAU      = "\xC3\xB6\xC2\xBB\xC3\x8D";
const Shree_Tam_0802_combo_VAU      = "\xC3\xB6\xC3\x81\xC3\x8D";
const Shree_Tam_0802_combo_SSAU     = "\xC3\xB6\xC3\xA5\xC3\x8D";
const Shree_Tam_0802_combo_SAU      = "\xC3\xB6\xC3\xA9\xC3\x8D";
const Shree_Tam_0802_combo_HAU      = "\xC3\xB6\xC3\xAD\xC3\x8D";
const Shree_Tam_0802_combo_LLAU     = "\xC3\xB6\xC3\x8D\xC3\x8D";
const Shree_Tam_0802_combo_ZHAU     = "\xC3\xB6\xC3\x87\xC3\x8D";
const Shree_Tam_0802_combo_RRAU     = "\xC3\xB6\xC3\x93\xC3\x8D";
const Shree_Tam_0802_combo_KSHAU    = "\xC3\xB6\xC3\xB1\xC3\x8D";

//const Special Combinations
const Shree_Tam_0802_combo_KI      = "\x51";
const Shree_Tam_0802_combo_KII     = "\x52";
const Shree_Tam_0802_combo_KU      = "\x53";
const Shree_Tam_0802_combo_KUU     = "\x54";
const Shree_Tam_0802_combo_KPULLI  = "\x55";
const Shree_Tam_0802_combo_NGI     = "\x57";
const Shree_Tam_0802_combo_NGII    = "\x58";
const Shree_Tam_0802_combo_NGU     = "\x59";
const Shree_Tam_0802_combo_NGUU    = "\x5A";
const Shree_Tam_0802_combo_NGPULLI = "\x5B";

const Shree_Tam_0802_combo_CI      = "\x5D";
const Shree_Tam_0802_combo_CII     = "\x5E";
const Shree_Tam_0802_combo_CU      = "\x5F";
const Shree_Tam_0802_combo_CUU     = "\x60";
const Shree_Tam_0802_combo_CPULLI  = "\x61";
const Shree_Tam_0802_combo_JI      = "\xC3\xA2";
const Shree_Tam_0802_combo_JII     = "\xC3\xA3";
const Shree_Tam_0802_combo_JPULLI  = "\xC3\xA4";
const Shree_Tam_0802_combo_NYI     = "\x63";
const Shree_Tam_0802_combo_NYII    = "\x64";
const Shree_Tam_0802_combo_NYU     = "\x65";
const Shree_Tam_0802_combo_NYUU_1  = "\x66";
const Shree_Tam_0802_combo_NYUU_2  = "\x65\xC3\xB5";
const Shree_Tam_0802_combo_NYPULLI = "\x67";

const Shree_Tam_0802_combo_TTI     = "\x69";
const Shree_Tam_0802_combo_TTII    = "\x6A";
const Shree_Tam_0802_combo_TTU     = "\x6B";
const Shree_Tam_0802_combo_TTUU    = "\x6C";
const Shree_Tam_0802_combo_TTPULLI = "\x6D";
const Shree_Tam_0802_combo_NNI     = "\x6F";
const Shree_Tam_0802_combo_NNII    = "\x70";
const Shree_Tam_0802_combo_NNU     = "\x71";
const Shree_Tam_0802_combo_NNUU_1  = "\x72";
const Shree_Tam_0802_combo_NNUU_2  = "\x71\xC3\xB5";
const Shree_Tam_0802_combo_NNPULLI = "\x73";

const Shree_Tam_0802_combo_TI      = "\x76";
const Shree_Tam_0802_combo_TII     = "\x77";
const Shree_Tam_0802_combo_TU      = "\x78";
const Shree_Tam_0802_combo_TUU_1   = "\x79";
const Shree_Tam_0802_combo_TUU_2   = "\x78\xC3\xB5";
const Shree_Tam_0802_combo_TPULLI  = "\x7A";
const Shree_Tam_0802_combo_NI      = "\x7B";
const Shree_Tam_0802_combo_NII     = "\x7D";
const Shree_Tam_0802_combo_NU      = "\x7E";
const Shree_Tam_0802_combo_NUU_1   = "\xC2\xA1";
const Shree_Tam_0802_combo_NUU_2   = "\x7E\xC3\xB5";
const Shree_Tam_0802_combo_NPULLI  = "\xC2\xA2";
const Shree_Tam_0802_combo_NNNI    = "\xC3\x9B";
const Shree_Tam_0802_combo_NNNII   = "\xC3\x9C";
const Shree_Tam_0802_combo_NNNU    = "\xC3\x9D";
const Shree_Tam_0802_combo_NNNUU_1 = "\xC3\x9E";
const Shree_Tam_0802_combo_NNNUU_2 = "\xC3\x9D\xC3\xB5";
const Shree_Tam_0802_combo_NNNPULLI= "\xC3\x9F";

const Shree_Tam_0802_combo_PI      = "\xC2\xA4";
const Shree_Tam_0802_combo_PII     = "\xC2\xA5";
const Shree_Tam_0802_combo_PU      = "\xC2\xA6";
const Shree_Tam_0802_combo_PUU     = "\xC2\xA7";
const Shree_Tam_0802_combo_PPULLI  = "\xC2\xA8";
const Shree_Tam_0802_combo_MI      = "\xC2\xAA";
const Shree_Tam_0802_combo_MII     = "\xC2\xAB";
const Shree_Tam_0802_combo_MU      = "\xE2\x80\xA2";
const Shree_Tam_0802_combo_MUU     = "\xE2\x80\xB0";
const Shree_Tam_0802_combo_MPULLI  = "\xC2\xAE";

const Shree_Tam_0802_combo_YI      = "\xC2\xB0";
const Shree_Tam_0802_combo_YII     = "\xC2\xB1";
const Shree_Tam_0802_combo_YU      = "\xC2\xB2";
const Shree_Tam_0802_combo_YUU     = "\xC2\xB3";
const Shree_Tam_0802_combo_YPULLI  = "\xC2\xB4";
const Shree_Tam_0802_combo_RI      = "\xE2\x80\xBA";
const Shree_Tam_0802_combo_RII     = "\xC5\xB8";
const Shree_Tam_0802_combo_RU      = "\xC2\xB8";
const Shree_Tam_0802_combo_RUU     = "\xC2\xB9";
const Shree_Tam_0802_combo_RPULLI  = "\xC2\xBA";
const Shree_Tam_0802_combo_LI      = "\xC2\xBC";
const Shree_Tam_0802_combo_LII     = "\xC2\xBD";
const Shree_Tam_0802_combo_LU      = "\xC2\xBE";
const Shree_Tam_0802_combo_LUU_1   = "\xC2\xBF";
const Shree_Tam_0802_combo_LUU_2   = "\xC2\xBE\xC3\xB5";
const Shree_Tam_0802_combo_LPULLI  = "\xC3\x80";
const Shree_Tam_0802_combo_VI      = "\xC3\x82";
const Shree_Tam_0802_combo_VII     = "\xC3\x83";
const Shree_Tam_0802_combo_VU      = "\xC3\x84";
const Shree_Tam_0802_combo_VUU     = "\xC3\x85";
const Shree_Tam_0802_combo_VPULLI  = "\xC3\x86";

const Shree_Tam_0802_combo_SSI     = "\xC3\xA6";
const Shree_Tam_0802_combo_SSII    = "\xC3\xA7";
const Shree_Tam_0802_combo_SSPULLI = "\xC3\xA8";
const Shree_Tam_0802_combo_SI      = "\xC3\xAA";
const Shree_Tam_0802_combo_SII     = "\xC3\xAB";
const Shree_Tam_0802_combo_SPULLI  = "\xC3\xAC";
const Shree_Tam_0802_combo_HI      = "\xC3\xAE";
const Shree_Tam_0802_combo_HII     = "\xC3\xAF";
const Shree_Tam_0802_combo_HPULLI  = "\xC3\xB0";

const Shree_Tam_0802_combo_LLI     = "\xC3\x8E";
const Shree_Tam_0802_combo_LLII    = "\xC3\x8F";
const Shree_Tam_0802_combo_LLU     = "\xC3\x90";
const Shree_Tam_0802_combo_LLUU    = "\xC3\x91";
const Shree_Tam_0802_combo_LLPULLI = "\xC3\x92";
const Shree_Tam_0802_combo_ZHI     = "\xC3\x88";
const Shree_Tam_0802_combo_ZHII    = "\xC3\x89";
const Shree_Tam_0802_combo_ZHU     = "\xC3\x8A";
const Shree_Tam_0802_combo_ZHUU    = "\xC3\x8B";
const Shree_Tam_0802_combo_ZHPULLI = "\xC3\x8C";
const Shree_Tam_0802_combo_RRI     = "\xC3\x94";
const Shree_Tam_0802_combo_RRII    = "\xC3\x95";
const Shree_Tam_0802_combo_RRU     = "\xC3\x96";
const Shree_Tam_0802_combo_RRUU_1  = "\xC3\x97";
const Shree_Tam_0802_combo_RRUU_2  = "\xC3\x96\xC3\xB5";
const Shree_Tam_0802_combo_RRPULLI = "\xC3\x98";
const Shree_Tam_0802_combo_KSHI    = "\xC3\xB2";
const Shree_Tam_0802_combo_KSHII   = "\xC3\xB3";
const Shree_Tam_0802_combo_KSHPULLI= "\xC3\xB4";

//Matches Aconst SCII
const Shree_Tam_0802_EXCLAM         = "\x21";
const Shree_Tam_0802_QTSINGLE       = "\x22";
const Shree_Tam_0802_PERCENT        = "\x25";
const Shree_Tam_0802_PARENLEFT      = "\x28";
const Shree_Tam_0802_PARENRIGT      = "\x29";
const Shree_Tam_0802_ASTERISK       = "\x2A";
const Shree_Tam_0802_PLUS           = "\x2B";
const Shree_Tam_0802_COMMA          = "\x2C";
const Shree_Tam_0802_PERIOD         = "\x2E";
const Shree_Tam_0802_SLASH          = "\x2F";
const Shree_Tam_0802_COLON          = "\x3A";
const Shree_Tam_0802_SEMICOLON      = "\x3B";
const Shree_Tam_0802_EQUALS         = "\x3D";
const Shree_Tam_0802_QUESTION       = "\x3F";

const Shree_Tam_0802_digit_ZERO     = "\x30";
const Shree_Tam_0802_digit_ONE      = "\x31";
const Shree_Tam_0802_digit_TWO      = "\x32";
const Shree_Tam_0802_digit_THREE    = "\x33";
const Shree_Tam_0802_digit_FOUR     = "\x34";
const Shree_Tam_0802_digit_FIVE     = "\x35";
const Shree_Tam_0802_digit_SIX      = "\x36";
const Shree_Tam_0802_digit_SEVEN    = "\x37";
const Shree_Tam_0802_digit_EIGHT    = "\x38";
const Shree_Tam_0802_digit_NINE     = "\x39";

// Unknown_ some have no unicode representation_
const Shree_Tam_0802_misc_UNKNOWN_1  = "\x40";
const Shree_Tam_0802_misc_UNKNOWN_2  = "\x4D";
const Shree_Tam_0802_misc_UNKNOWN_3  = "\x4E";
const Shree_Tam_0802_misc_UNKNOWN_4  = "\x4F";
const Shree_Tam_0802_misc_UNKNOWN_5  = "\xE2\x80\x9A";
const Shree_Tam_0802_misc_UNKNOWN_6  = "\xC6\x92";
const Shree_Tam_0802_misc_UNKNOWN_7  = "\xE2\x80\x9E";
const Shree_Tam_0802_misc_UNKNOWN_8  = "\xE2\x80\xA6";
const Shree_Tam_0802_misc_UNKNOWN_9  = "\xE2\x80\xA0";
const Shree_Tam_0802_misc_UNKNOWN_10 = "\xE2\x80\xA1";
const Shree_Tam_0802_misc_UNKNOWN_11 = "\xCB\x86";
const Shree_Tam_0802_misc_UNKNOWN_12 = "\xCB\x9C";
const Shree_Tam_0802_misc_UNKNOWN_13 = "\xE2\x84\xA2";
const Shree_Tam_0802_misc_UNKNOWN_14 = "\xC5\xA1";
const Shree_Tam_0802_misc_UNKNOWN_15 = "\xC5\x93";
const Shree_Tam_0802_misc_UNKNOWN_16 = "\xC6\x82";
const Shree_Tam_0802_misc_UNKNOWN_17 = "\xC3\xBE";

//Does not match Aconst SCII
const Shree_Tam_0802_HYPHEN         = "\x26";

}//closing of class

$Shree_Tam_0802_toPadma = array();

$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_visarga]  = Padma::Padma_visarga;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_A]  = Padma::Padma_vowel_A;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_AA] = Padma::Padma_vowel_AA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_I]  = Padma::Padma_vowel_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_II] = Padma::Padma_vowel_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_U]  = Padma::Padma_vowel_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_UU] = Padma::Padma_vowel_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_E]  = Padma::Padma_vowel_E;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_EE] = Padma::Padma_vowel_EE;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_AI] = Padma::Padma_vowel_AI;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_O]  = Padma::Padma_vowel_O;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_OO] = Padma::Padma_vowel_OO;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowel_AU] = Padma::Padma_vowel_AU;

$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_KA]  = Padma::Padma_consnt_KA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_NGA] = Padma::Padma_consnt_NGA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_CA]  = Padma::Padma_consnt_CA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_JA]  = Padma::Padma_consnt_JA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_NYA] = Padma::Padma_consnt_NYA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_TTA] = Padma::Padma_consnt_TTA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_NNA] = Padma::Padma_consnt_NNA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_TA]  = Padma::Padma_consnt_TA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_NA]  = Padma::Padma_consnt_NA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_NNNA] = Padma::Padma_consnt_NNNA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_PA]  = Padma::Padma_consnt_PA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_MA]  = Padma::Padma_consnt_MA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_YA]  = Padma::Padma_consnt_YA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_RA]  = Padma::Padma_consnt_RA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_LA]  = Padma::Padma_consnt_LA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_VA]  = Padma::Padma_consnt_VA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_SSA] = Padma::Padma_consnt_SSA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_SA]  = Padma::Padma_consnt_SA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_HA]  = Padma::Padma_consnt_HA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_LLA] = Padma::Padma_consnt_LLA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_consnt_RRA] = Padma::Padma_consnt_RRA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_conjct_KSH] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_conjct_SRII] = Padma::Padma_consnt_SA . 
                                                                      Padma::Padma_vattu_RA . 
                                                                      Padma::Padma_vowelsn_II;

//Gunintamulu
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_I]    = Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_E_1]  = Padma::Padma_vowelsn_E;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_E_2]  = Padma::Padma_vowelsn_E;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_EE]   = Padma::Padma_vowelsn_EE;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_vowelsn_AI]   = Padma::Padma_vowelsn_AI;

// Old format_ No lomger used_
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNAA]  = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_AA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNNAA] = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_AA;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RRAA]  = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_AA;

$Shree_Tam_0802_combo_KAU      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_NGAU     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_CAU      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_JAU      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_NYAU     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_TTAU     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_NNAU     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_TAU      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_NAU      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_NNNAU    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_PAU      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_MAU      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_YAU      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_RAU      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_LAU      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_VAU      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_SSAU     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_SAU      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_HAU      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_LLAU     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_ZHAU     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_RRAU     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_AU;
$Shree_Tam_0802_combo_KSHAU    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_AU;

//$Special Combinations
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_KI]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_KII]     = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_KU]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_KUU]     = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_KPULLI]  = Padma::Padma_consnt_KA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NGI]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NGII]    = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NGU]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NGUU]    = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NGPULLI] = Padma::Padma_consnt_NGA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_CII]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_CU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_CUU]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_CPULLI]  = Padma::Padma_consnt_CA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_JPULLI]  = Padma::Padma_consnt_JA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NYI]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NYII]    = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NYU]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NYUU_1]  = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NYUU_2]  = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NYPULLI] = Padma::Padma_consnt_NYA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TTI]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TTII]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TTU]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TTUU]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TTPULLI] = Padma::Padma_consnt_TTA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNI]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNII]    = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNUU_1]  = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNUU_2]  = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNPULLI] = Padma::Padma_consnt_NNA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TII]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TUU_1]   = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TUU_2]   = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_TPULLI]  = Padma::Padma_consnt_TA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NII]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NUU_1]   = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NUU_2]   = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NPULLI]  = Padma::Padma_consnt_NA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNNI]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNNII]   = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNNU]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNNUU_1] = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNNUU_2] = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_NNNPULLI] = Padma::Padma_consnt_NNNA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_PI]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_PII]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_PU]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_PUU]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_PPULLI]  = Padma::Padma_consnt_PA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_MPULLI]  = Padma::Padma_consnt_MA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_YU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_YUU]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_YPULLI]  = Padma::Padma_consnt_YA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RI]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RII]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RPULLI]  = Padma::Padma_consnt_RA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LUU_1]   = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LUU_2]   = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LII]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LPULLI]  = Padma::Padma_consnt_LA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_VII]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_VU]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_VUU]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_VPULLI]  = Padma::Padma_consnt_VA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_SSI]     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_SSII]    = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_SSPULLI] = Padma::Padma_consnt_SSA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_SI]      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_SII]     = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_SPULLI]  = Padma::Padma_consnt_SA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_HI]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_HII]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_HPULLI]  = Padma::Padma_consnt_HA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LLII]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LLU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LLUU]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_LLPULLI] = Padma::Padma_consnt_LLA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_ZHI]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_ZHII]    = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_ZHU]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_ZHUU]    = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_ZHPULLI] = Padma::Padma_consnt_ZHA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RRI]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RRII]    = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RRU]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_U;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RRUU_1]  = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RRUU_2]  = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_UU;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_RRPULLI] = Padma::Padma_consnt_RRA . Padma::Padma_pulli;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_KSHI]    = Padma::Padma_consnt_KA . 
                                                                        Padma::Padma_vattu_SSA . 
									                                    Padma::Padma_vowelsn_I;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_KSHII]   = Padma::Padma_consnt_KA . 
                                                                        Padma::Padma_vattu_SSA . 
                                                                        Padma::Padma_vowelsn_II;
$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_combo_KSHPULLI]= Padma::Padma_consnt_KA . 
                                                                        Padma::Padma_vattu_SSA . 
                                     									Padma::Padma_pulli;

$Shree_Tam_0802_toPadma[Shree_Tam_0802::Shree_Tam_0802_HYPHEN]   = "-";

$Shree_Tam_0802_redundantList = array();
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_1]  = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_2]  = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_3]  = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_4]  = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_5]  = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_6]  = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_7]  = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_8]  = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_9]  = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_10] = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_11] = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_12] = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_13] = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_14] = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_15] = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_16] = true;
$Shree_Tam_0802_redundantList[Shree_Tam_0802::Shree_Tam_0802_misc_UNKNOWN_17] = true;

$Shree_Tam_0802_prefixList = array();
$Shree_Tam_0802_prefixList[Shree_Tam_0802::Shree_Tam_0802_vowelsn_E_1] = true;
$Shree_Tam_0802_prefixList[Shree_Tam_0802::Shree_Tam_0802_vowelsn_E_2] = true;
$Shree_Tam_0802_prefixList[Shree_Tam_0802::Shree_Tam_0802_vowelsn_EE]  = true;
$Shree_Tam_0802_prefixList[Shree_Tam_0802::Shree_Tam_0802_vowelsn_AI]  = true;

$Shree_Tam_0802_overloadList = array ();
$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_vowel_O]   = true;
$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_vowelsn_E_1] = true;
$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_vowelsn_E_2] = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\x50"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\x56"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\x5C"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\xA1"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\x62"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\x68"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\x6E"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\x75"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\x7C"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\x9A"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC2\xA3"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC2\xA9"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC2\xAF"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC2\xB5"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC2\xBB"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\x81"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\xA5"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\xA9"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\xAD"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\x8D"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\x87"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\x93"]    = true;
$Shree_Tam_0802_overloadList["\xC3\xB6\xC3\xB1"]    = true;

$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_combo_NYU]  = true;
$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_combo_NNU]  = true;
$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_combo_TU]   = true;
$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_combo_NU]   = true;
$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_combo_NNNU] = true;
$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_combo_LU]   = true;
$Shree_Tam_0802_overloadList[Shree_Tam_0802::Shree_Tam_0802_combo_RRU]  = true;


function ShreeTam0802_initialize()
{
    global $fontinfo;

    $fontinfo["shree-tam-0802"]["language"] = "Tamil";
    $fontinfo["shree-tam-0802"]["class"] = "Shree_Tam_0802";
}
?>
