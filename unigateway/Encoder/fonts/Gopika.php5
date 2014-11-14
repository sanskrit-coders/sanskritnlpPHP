<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Radhika Thammishetty <radhika@atc.tcs.com>
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

class Gopika
{
function Gopika()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "Gopika";
var $displayName  = "Gopika";
var $script       = Padma::Padma_script_GUJARATI;
var $hasSuffixes  = true;

function lookup($str) 
{
    global $Gopika_toPadma;
    return $Gopika_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Gopika_prefixList;
    return $Gopika_prefixList[$str] != null;
}

function isSuffixSymbol($str)
{
    global $Gopika_suffixList;
    return $Gopika_suffixList[$str] != null;
}

function isOverloaded($str)
{
    global $Gopika_overloadList;
    return $Gopika_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;    
}

//no preprocessing necessary
function preprocessMessage($input)
{
    return $input;
}

//Implementation details start here
//48, B1, B9, C0, C4, DD

//Specials
const Gopika_anusvara       = "\x6B";
const Gopika_candrabindu_1  = "\x50";
const Gopika_candrabindu_2  = "\x70";

//Vowels
const Gopika_vowel_A        = "\x79";
const Gopika_vowel_AA       = "\x79\x74";
const Gopika_vowel_I        = "\x52";
const Gopika_vowel_II       = "\x45";
const Gopika_vowel_U        = "\x57";
const Gopika_vowel_UU       = "\x51";
const Gopika_vowel_RR       = "\x7D";
const Gopika_vowel_EE       = "\x79\x75";
const Gopika_vowel_AI       = "\x79\x69";
const Gopika_vowel_OO       = "\x79\x74\x75";
const Gopika_vowel_AU       = "\x79\x74\x69";

//Consonants
const Gopika_consnt_KA_1    = "\x66";
const Gopika_consnt_KA_2    = "\xC2\xBE";
const Gopika_consnt_KHA     = "\x46";
const Gopika_consnt_GA      = "\x64";
const Gopika_consnt_GHA_1   = "\x44";
const Gopika_consnt_GHA_2   = "\xC2\xBC";
const Gopika_consnt_NGA     = "\xC3\x8A";

const Gopika_consnt_CA      = "\x61";
const Gopika_consnt_CHA     = "\x41";
const Gopika_consnt_JA      = "\x73";
const Gopika_consnt_JHA_1   = "\xC3\x8D";
const Gopika_consnt_JHA_2   = "\xC3\xA3";
const Gopika_consnt_NYA     = "\xC3\x85\x74";

const Gopika_consnt_TTA     = "\x78";
const Gopika_consnt_TTHA    = "\x58";
const Gopika_consnt_DDA_1   = "\x7A";
const Gopika_consnt_DDA_2   = "\xC3\xBD";
const Gopika_consnt_DDHA    = "\x5A";
const Gopika_consnt_NNA     = "\x4B";

const Gopika_consnt_TA      = "\x3B";
const Gopika_consnt_THA     = "\x3A"; 
const Gopika_consnt_DA_1    = "\xE2\x80\x99";
const Gopika_consnt_DA_2    = "\xC3\xA6";
const Gopika_consnt_DHA     = "\x22";
const Gopika_consnt_NA      = "\x6C";

const Gopika_consnt_PA      = "\x76";
const Gopika_consnt_PHA     = "\x56";
const Gopika_consnt_BA      = "\x63";
const Gopika_consnt_BHA     = "\x43";
const Gopika_consnt_MA      = "\x62";

const Gopika_consnt_YA_1    = "\x67";
const Gopika_consnt_YA_2    = "\xC3\xA2";
const Gopika_consnt_RA      = "\x68";
const Gopika_consnt_LA      = "\x6A";
const Gopika_consnt_VA      = "\x4A";
const Gopika_consnt_SHA     = "\x4E";
const Gopika_consnt_SSA     = "\xC2\xBB\x74";
const Gopika_consnt_SA      = "\x6D";
const Gopika_consnt_HA      = "\x6E";
const Gopika_consnt_LLA     = "\xC2\xA4";

//const Gunintamulu
const Gopika_vowelsn_AA     = "\x74";
const Gopika_vowelsn_I_1    = "\x72";
const Gopika_vowelsn_I_2    = "\xC3\x82";
const Gopika_vowelsn_II     = "\x65";
const Gopika_vowelsn_U_1    = "\x77";
const Gopika_vowelsn_U_2    = "\xC2\xB8";
const Gopika_vowelsn_UU_1   = "\x54";
const Gopika_vowelsn_UU_2   = "\x71";
const Gopika_vowelsn_UU_3   = "\xC2\xB2";
const Gopika_vowelsn_R      = "\x5D";
const Gopika_vowelsn_EE     = "\x75";
const Gopika_vowelsn_AI     = "\x69";
const Gopika_vowelsn_OO     = "\x74\x75";
const Gopika_vowelsn_AU     = "\x74\x69";

//Vowel + anusvara
const Gopika_vowel_IM       = "\x24";
const Gopika_vowel_IIM      = "\x23";
const Gopika_vowel_UM       = "\xC3\xB4";
const Gopika_vowel_UUM      = "\xC2\xB3";

//Matra + modifier
const Gopika_vowelsn_IM     = "\xC2\xAE";
const Gopika_vowelsn_IIM    = "\xC2\xB4";
const Gopika_vowelsn_EEM    = "\x55";
const Gopika_vowelsn_AIM    = "\x49";

//Half Forms
const Gopika_halffm_KSH     = "\xC3\xBB";
const Gopika_halffm_KHA     = "\xC3\x8F";
const Gopika_halffm_GA      = "\xC3\xB8";
const Gopika_halffm_GHA     = "\xC3\x8E";
const Gopika_halffm_CA      = "\xC3\xA5";
const Gopika_halffm_JA      = "\xC3\x9F";
const Gopika_halffm_JNY     = "\xC2\xBF";
const Gopika_halffm_NYA     = "\xC3\x85";
const Gopika_halffm_NNA     = "\xC2\xBD";
const Gopika_halffm_TA      = "\xC3\xB0";
const Gopika_halffm_TT      = "\xE2\x80\xA2";
const Gopika_halffm_TR      = "\xC2\xBA";
const Gopika_halffm_THA     = "\xC3\x9A";
const Gopika_halffm_DHA     = "\xC3\xA6";
const Gopika_halffm_NA      = "\x4C";
const Gopika_halffm_NN      = "\xC3\x92";
const Gopika_halffm_PA      = "\xC3\x83";
const Gopika_halffm_BA      = "\xC3\xA7";
const Gopika_halffm_BHA     = "\xC3\x87";
const Gopika_halffm_MA      = "\x42";
const Gopika_halffm_YA      = "\x47";
const Gopika_halffm_RA      = "\x6F";
const Gopika_halffm_LA      = "\xC3\x95";
const Gopika_halffm_VA      = "\xC3\x94";
const Gopika_halffm_SHA     = "\x7E";
const Gopika_halffm_SSA     = "\xC2\xBB";
const Gopika_halffm_SA      = "\x4D";
const Gopika_halffm_HY      = "\xC3\x8C";
const Gopika_halffm_LLA     = "\xC3\xA9";

//Conjuncts
const Gopika_conjct_KK      = "\xC2\xAC";
const Gopika_conjct_KR      = "\xC2\xA2";
const Gopika_conjct_KSH     = "\xC3\xBB\x74";
const Gopika_conjct_KHT     = "\xC3\x89";
const Gopika_conjct_NGK     = "\xC3\x91";
const Gopika_conjct_NGKH    = "\xC3\x96";
const Gopika_conjct_NGG     = "\xC3\x9C";
const Gopika_conjct_NGGH    = "\xC3\xA1";
const Gopika_conjct_NGM     = "\xC3\xA0";
const Gopika_conjct_JNY     = "\xC2\xBF\x74";
const Gopika_conjct_JJ      = "\xC3\xA4";
const Gopika_conjct_JR      = "\x40";
const Gopika_conjct_TTTT    = "\xC3\xA8";
const Gopika_conjct_TT_TTH  = "\xC3\x99";
const Gopika_conjct_TTHTTH  = "\xC3\xAA";
const Gopika_conjct_DDDD    = "\xC2\xA8";
const Gopika_conjct_DD_DDH  = "\xC3\x9B";
const Gopika_conjct_DDHDDH  = "\xC3\xAB";
const Gopika_conjct_TT      = "\xE2\x80\xA2\x74";
const Gopika_conjct_TR      = "\xC2\xBA\x74";
const Gopika_conjct_TN      = "\xC3\xAD";
const Gopika_conjct_DGH     = "\xC3\xAC";
const Gopika_conjct_DD      = "\xC3\x86";
const Gopika_conjct_D_DH    = "\xC3\x98";
const Gopika_conjct_DB      = "\xC3\xAF";
const Gopika_conjct_DM      = "\xC3\x88";
const Gopika_conjct_DR      = "\xC3\xB7";
const Gopika_conjct_DV      = "\xC3\xAE";
const Gopika_conjct_PT      = "\xC3\xB3";
const Gopika_conjct_PN      = "\xC2\xA1";
const Gopika_conjct_PR      = "\xC2\xAB";
const Gopika_conjct_PHR     = "\xC2\xA3";
const Gopika_conjct_SHC     = "\xC3\xB9";
const Gopika_conjct_SHN     = "\xC2\xA7";
const Gopika_conjct_SHR     = "\xC2\xA9";
const Gopika_conjct_SHV     = "\xC2\xB5";
const Gopika_conjct_SSTT    = "\xC3\x90";
const Gopika_conjct_HN      = "\xC3\xB6";
const Gopika_conjct_HM      = "\xC3\xB1";
const Gopika_conjct_HY      = "\xC3\x8C\x74";
const Gopika_conjct_HL      = "\xC3\xB5";
const Gopika_conjct_HV      = "\xC3\xBA";

//Combos (aaaaaarghhhhhhhhhhhhhhhhhh!!!!)
const Gopika_combo_KSHU     = "\xC3\xBB\xC3\xBE";
const Gopika_combo_KSHUU    = "\xC3\xBB\xC3\x8B";
const Gopika_combo_KSHR     = "\xC3\xBB\x5C";
const Gopika_combo_KHU      = "\xC3\x8F\xC3\xBE";
const Gopika_combo_KHUU     = "\xC3\x8F\xC3\x8B";
const Gopika_combo_KHR      = "\xC3\x8F\x5C";
const Gopika_combo_GU       = "\xC3\xB8\xC3\xBE";
const Gopika_combo_GUU      = "\xC3\xB8\xC3\x8B";
const Gopika_combo_GR       = "\xC3\xB8\x5C";
const Gopika_combo_GHU      = "\xC3\x8E\xC3\xBE";
const Gopika_combo_GHUU     = "\xC3\x8E\xC3\x8B";
const Gopika_combo_GHR      = "\xC3\x8E\x5C";
const Gopika_combo_CU       = "\xC3\xA5\xC3\xBE";
const Gopika_combo_CUU      = "\xC3\xA5\xC3\x8B";
const Gopika_combo_CR       = "\xC3\xA5\x5C";
const Gopika_combo_JAA      = "\xC3\xB2";
const Gopika_combo_JII      = "\x53";
const Gopika_combo_NNU      = "\xC2\xBD\xC3\xBE";
const Gopika_combo_NNUU     = "\xC2\xBD\xC3\x8B";
const Gopika_combo_NNR      = "\xC2\xBD\x5C";
const Gopika_combo_TU       = "\xC3\xB0\xC3\xBE";
const Gopika_combo_TUU      = "\xC3\xB0\xC3\x8B";
const Gopika_combo_TR       = "\xC3\xB0\x5C";
const Gopika_combo_THU      = "\xC3\x9A\xC3\xBE";
const Gopika_combo_THUU     = "\xC3\x9A\xC3\x8B";
const Gopika_combo_THR      = "\xC3\x9A\x5C";
const Gopika_combo_DR       = "\x5E";
const Gopika_combo_DHU      = "\xC3\xA6\xC3\xBE";
const Gopika_combo_DHUU     = "\xC3\xA6\xC3\x8B";
const Gopika_combo_DHR      = "\xC3\xA6\x5C";
const Gopika_combo_NU       = "\x4C\xC3\xBE";
const Gopika_combo_NUU      = "\x4C\xC3\x8B";
const Gopika_combo_NR       = "\x4C\x5C";
const Gopika_combo_PU       = "\xC3\x83\xC3\xBE";
const Gopika_combo_PUU      = "\xC3\x83\xC3\x8B";
const Gopika_combo_PR       = "\xC3\x83\x5C";
const Gopika_combo_BU       = "\xC3\xA7\xC3\xBE";
const Gopika_combo_BUU      = "\xC3\xA7\xC3\x8B";
const Gopika_combo_BR       = "\xC3\xA7\x5C";
const Gopika_combo_BHU      = "\xC3\x87\xC3\xBE";
const Gopika_combo_BHUU     = "\xC3\x87\xC3\x8B";
const Gopika_combo_BHR      = "\xC3\x87\x5C";
const Gopika_combo_MU       = "\x42\xC3\xBE";
const Gopika_combo_MUU      = "\x42\xC3\x8B";
const Gopika_combo_MR       = "\x42\x5C";
const Gopika_combo_YU       = "\x47\xC3\xBE";
const Gopika_combo_YUU      = "\x47\xC3\x8B";
const Gopika_combo_YR       = "\x47\x5C";
const Gopika_combo_RUU_1    = "\x59";
const Gopika_combo_RUU_2    = "\xC3\x81";
const Gopika_combo_LU       = "\xC3\x95\xC3\xBE";
const Gopika_combo_LUU      = "\xC3\x95\xC3\x8B";
const Gopika_combo_LR       = "\xC3\x95\x5C";
const Gopika_combo_VU       = "\xC3\x94\xC3\xBE";
const Gopika_combo_VUU      = "\xC3\x94\xC3\x8B";
const Gopika_combo_VR       = "\xC3\x94\x5C";
const Gopika_combo_LLU      = "\xC3\xA9\xC3\xBE";
const Gopika_combo_LLUU     = "\xC3\xA9\xC3\x8B";
const Gopika_combo_LLR      = "\xC3\xA9\x5C";
const Gopika_combo_SHU      = "\x7E\xC3\xBE";
const Gopika_combo_SHUU     = "\x7E\xC3\x8B";
const Gopika_combo_SHR      = "\x7E\x5C";
const Gopika_combo_SSU      = "\xC2\xBB\xC3\xBE";
const Gopika_combo_SSUU     = "\xC2\xBB\xC3\x8B";
const Gopika_combo_SSR      = "\xC2\xBB\x5C";
const Gopika_combo_SU       = "\x4D\xC3\xBE";
const Gopika_combo_SUU      = "\x4D\xC3\x8B";
const Gopika_combo_SR       = "\x4D\x5C";
const Gopika_combo_HR       = "\xC3\x93";
const Gopika_combo_HYU      = "\xC3\x8C\xC3\x8B";
const Gopika_combo_HYUU     = "\xC3\x8C\xC3\xBE";
const Gopika_combo_HYR      = "\xC3\x8C\x5C";

//Half forms of RA
const Gopika_halffm_RA_ANU  = "\x4F";

const Gopika_vattu_RA_1     = "\x5B";
const Gopika_vattu_RA_2     = "\x7B";

const Gopika_misc_DANDA     = "\x3E";
const Gopika_misc_DDANDA    = "\x3E\x3E";
const Gopika_misc_OM        = "\x60";
const Gopika_nukta          = "\x7C";

//const Gujarati Digits
const Gopika_digit_ZERO     = "\x30";
const Gopika_digit_ONE      = "\x31";
const Gopika_digit_TWO      = "\x32";
const Gopika_digit_THREE    = "\x33";
const Gopika_digit_FOUR     = "\x34";
const Gopika_digit_FIVE     = "\x35";
const Gopika_digit_SIX      = "\x36";
const Gopika_digit_SEVEN    = "\x37";
const Gopika_digit_EIGHT    = "\x38";
const Gopika_digit_NINE     = "\x39";

//Matches ASCII
const Gopika_EXCLAM         = "\x21";
const Gopika_PERCENT        = "\x25";
const Gopika_PAREN_LEFT     = "\x28";
const Gopika_PAREN_RIGHT    = "\x29";
const Gopika_ASTERISK       = "\x2A";
const Gopika_PLUS           = "\x2B";
const Gopika_COMMA          = "\x2C";
const Gopika_PERIOD         = "\x2E";
const Gopika_SLASH          = "\x2F";
const Gopika_EQUALS         = "\x3D";
const Gopika_QUESTION       = "\x3F";

//Does not match ASCII
const Gopika_extra_COLON      = "\x26";
const Gopika_extra_SEMICOLON  = "\x3C";
const Gopika_extra_HYPHEN     = "\x5F";
const Gopika_extra_QTSINGLE_1 = "\xE2\x80\x98";
const Gopika_extra_QTSINGLE_2 = "\xC2\xA5";
const Gopika_extra_QTSINGLE_3 = "\xC3\xBC";
const Gopika_extra_QTDOUBLE_1 = "\xC2\xAA";

}
$Gopika_toPadma = array();

$Gopika_toPadma[Gopika::Gopika_anusvara]      = Padma::Padma_anusvara;
$Gopika_toPadma[Gopika::Gopika_candrabindu_1] = Padma::Padma_candrabindu;
$Gopika_toPadma[Gopika::Gopika_candrabindu_2] = Padma::Padma_candrabindu;

$Gopika_toPadma[Gopika::Gopika_vowel_A]    = Padma::Padma_vowel_A;
$Gopika_toPadma[Gopika::Gopika_vowel_AA]   = Padma::Padma_vowel_AA;
$Gopika_toPadma[Gopika::Gopika_vowel_I]    = Padma::Padma_vowel_I;
$Gopika_toPadma[Gopika::Gopika_vowel_II]   = Padma::Padma_vowel_II;
$Gopika_toPadma[Gopika::Gopika_vowel_U]    = Padma::Padma_vowel_U;
$Gopika_toPadma[Gopika::Gopika_vowel_UU]   = Padma::Padma_vowel_UU;
$Gopika_toPadma[Gopika::Gopika_vowel_RR]   = Padma::Padma_vowel_RR;
$Gopika_toPadma[Gopika::Gopika_vowel_EE]   = Padma::Padma_vowel_EE;
$Gopika_toPadma[Gopika::Gopika_vowel_AI]   = Padma::Padma_vowel_AI;
$Gopika_toPadma[Gopika::Gopika_vowel_OO]   = Padma::Padma_vowel_OO;
$Gopika_toPadma[Gopika::Gopika_vowel_AU]   = Padma::Padma_vowel_AU;

$Gopika_toPadma[Gopika::Gopika_consnt_KA_1]  = Padma::Padma_consnt_KA;
$Gopika_toPadma[Gopika::Gopika_consnt_KA_2]  = Padma::Padma_consnt_KA;
$Gopika_toPadma[Gopika::Gopika_consnt_KHA]   = Padma::Padma_consnt_KHA;
$Gopika_toPadma[Gopika::Gopika_consnt_GA]    = Padma::Padma_consnt_GA;
$Gopika_toPadma[Gopika::Gopika_consnt_GHA_1] = Padma::Padma_consnt_GHA;
$Gopika_toPadma[Gopika::Gopika_consnt_GHA_2] = Padma::Padma_consnt_GHA;
$Gopika_toPadma[Gopika::Gopika_consnt_NGA]   = Padma::Padma_consnt_NGA;

$Gopika_toPadma[Gopika::Gopika_consnt_CA]    = Padma::Padma_consnt_CA;
$Gopika_toPadma[Gopika::Gopika_consnt_CHA]   = Padma::Padma_consnt_CHA;
$Gopika_toPadma[Gopika::Gopika_consnt_JA]    = Padma::Padma_consnt_JA;
$Gopika_toPadma[Gopika::Gopika_consnt_JHA_1] = Padma::Padma_consnt_JHA;
$Gopika_toPadma[Gopika::Gopika_consnt_JHA_2] = Padma::Padma_consnt_JHA;
$Gopika_toPadma[Gopika::Gopika_consnt_NYA]   = Padma::Padma_consnt_NYA;

$Gopika_toPadma[Gopika::Gopika_consnt_TTA]   = Padma::Padma_consnt_TTA;
$Gopika_toPadma[Gopika::Gopika_consnt_TTHA]  = Padma::Padma_consnt_TTHA;
$Gopika_toPadma[Gopika::Gopika_consnt_DDA_1] = Padma::Padma_consnt_DDA;
$Gopika_toPadma[Gopika::Gopika_consnt_DDA_2] = Padma::Padma_consnt_DDA;
$Gopika_toPadma[Gopika::Gopika_consnt_DDHA]  = Padma::Padma_consnt_DDHA;
$Gopika_toPadma[Gopika::Gopika_consnt_NNA]   = Padma::Padma_consnt_NNA;

$Gopika_toPadma[Gopika::Gopika_consnt_TA]    = Padma::Padma_consnt_TA;
$Gopika_toPadma[Gopika::Gopika_consnt_THA]   = Padma::Padma_consnt_THA;
$Gopika_toPadma[Gopika::Gopika_consnt_DA_1]  = Padma::Padma_consnt_DA;
$Gopika_toPadma[Gopika::Gopika_consnt_DA_2]  = Padma::Padma_consnt_DA;
$Gopika_toPadma[Gopika::Gopika_consnt_DHA]   = Padma::Padma_consnt_DHA;
$Gopika_toPadma[Gopika::Gopika_consnt_NA]    = Padma::Padma_consnt_NA;

$Gopika_toPadma[Gopika::Gopika_consnt_PA]    = Padma::Padma_consnt_PA;
$Gopika_toPadma[Gopika::Gopika_consnt_PHA]   = Padma::Padma_consnt_PHA;
$Gopika_toPadma[Gopika::Gopika_consnt_BA]    = Padma::Padma_consnt_BA;
$Gopika_toPadma[Gopika::Gopika_consnt_BHA]   = Padma::Padma_consnt_BHA;
$Gopika_toPadma[Gopika::Gopika_consnt_MA]    = Padma::Padma_consnt_MA;

$Gopika_toPadma[Gopika::Gopika_consnt_YA_1]  = Padma::Padma_consnt_YA;
$Gopika_toPadma[Gopika::Gopika_consnt_YA_2]  = Padma::Padma_consnt_YA;
$Gopika_toPadma[Gopika::Gopika_consnt_RA]    = Padma::Padma_consnt_RA;
$Gopika_toPadma[Gopika::Gopika_consnt_LA]    = Padma::Padma_consnt_LA;
$Gopika_toPadma[Gopika::Gopika_consnt_VA]    = Padma::Padma_consnt_VA;
$Gopika_toPadma[Gopika::Gopika_consnt_SHA]   = Padma::Padma_consnt_SHA;
$Gopika_toPadma[Gopika::Gopika_consnt_SSA]   = Padma::Padma_consnt_SSA;
$Gopika_toPadma[Gopika::Gopika_consnt_SA]    = Padma::Padma_consnt_SA;
$Gopika_toPadma[Gopika::Gopika_consnt_HA]    = Padma::Padma_consnt_HA;
$Gopika_toPadma[Gopika::Gopika_consnt_LLA]   = Padma::Padma_consnt_LLA;

//$Gunintamulu
$Gopika_toPadma[Gopika::Gopika_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$Gopika_toPadma[Gopika::Gopika_vowelsn_I_1]  = Padma::Padma_vowelsn_I;
$Gopika_toPadma[Gopika::Gopika_vowelsn_I_2]  = Padma::Padma_vowelsn_I;
$Gopika_toPadma[Gopika::Gopika_vowelsn_II]   = Padma::Padma_vowelsn_II;
$Gopika_toPadma[Gopika::Gopika_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_vowelsn_R]    = Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_vowelsn_EE]   = Padma::Padma_vowelsn_EE;
$Gopika_toPadma[Gopika::Gopika_vowelsn_AI]   = Padma::Padma_vowelsn_AI;
$Gopika_toPadma[Gopika::Gopika_vowelsn_OO]   = Padma::Padma_vowelsn_OO;
$Gopika_toPadma[Gopika::Gopika_vowelsn_AU]   = Padma::Padma_vowelsn_AU;

//Vowel + anusvara
$Gopika_toPadma[Gopika::Gopika_vowel_IM]     = Padma::Padma_vowel_I . Padma::Padma_anusvara;
$Gopika_toPadma[Gopika::Gopika_vowel_IIM]    = Padma::Padma_vowel_II . Padma::Padma_anusvara;
$Gopika_toPadma[Gopika::Gopika_vowel_UM]     = Padma::Padma_vowel_U . Padma::Padma_anusvara;
$Gopika_toPadma[Gopika::Gopika_vowel_UUM]    = Padma::Padma_vowel_UU . Padma::Padma_anusvara;

//matra + modifier
$Gopika_toPadma[Gopika::Gopika_vowelsn_IM]   = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$Gopika_toPadma[Gopika::Gopika_vowelsn_IIM]  = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$Gopika_toPadma[Gopika::Gopika_vowelsn_EEM]  = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$Gopika_toPadma[Gopika::Gopika_vowelsn_AIM]  = Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;

//Halffm
$Gopika_toPadma[Gopika::Gopika_halffm_KSH]  = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;
$Gopika_toPadma[Gopika::Gopika_halffm_KHA]  = Padma::Padma_halffm_KHA;
$Gopika_toPadma[Gopika::Gopika_halffm_GA]   = Padma::Padma_halffm_GA;
$Gopika_toPadma[Gopika::Gopika_halffm_GHA]  = Padma::Padma_halffm_GHA;
$Gopika_toPadma[Gopika::Gopika_halffm_CA]   = Padma::Padma_halffm_CA;
$Gopika_toPadma[Gopika::Gopika_halffm_JA]   = Padma::Padma_halffm_JA;
$Gopika_toPadma[Gopika::Gopika_halffm_JNY]  = Padma::Padma_halffm_JA . Padma::Padma_halffm_NYA;
$Gopika_toPadma[Gopika::Gopika_halffm_NYA]  = Padma::Padma_halffm_NYA;
$Gopika_toPadma[Gopika::Gopika_halffm_NNA]  = Padma::Padma_halffm_NNA;
$Gopika_toPadma[Gopika::Gopika_halffm_TA]   = Padma::Padma_halffm_TA;
$Gopika_toPadma[Gopika::Gopika_halffm_TT]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$Gopika_toPadma[Gopika::Gopika_halffm_TR]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA;
$Gopika_toPadma[Gopika::Gopika_halffm_THA]  = Padma::Padma_halffm_THA;
$Gopika_toPadma[Gopika::Gopika_halffm_DHA]  = Padma::Padma_halffm_DHA;
$Gopika_toPadma[Gopika::Gopika_halffm_NA]   = Padma::Padma_halffm_NA;
$Gopika_toPadma[Gopika::Gopika_halffm_NN]   = Padma::Padma_halffm_NA . Padma::Padma_halffm_NA;
$Gopika_toPadma[Gopika::Gopika_halffm_PA]   = Padma::Padma_halffm_PA;
$Gopika_toPadma[Gopika::Gopika_halffm_BA]   = Padma::Padma_halffm_BA;
$Gopika_toPadma[Gopika::Gopika_halffm_BHA]  = Padma::Padma_halffm_BHA;
$Gopika_toPadma[Gopika::Gopika_halffm_MA]   = Padma::Padma_halffm_MA;
$Gopika_toPadma[Gopika::Gopika_halffm_YA]   = Padma::Padma_halffm_YA;
$Gopika_toPadma[Gopika::Gopika_halffm_RA]   = Padma::Padma_halffm_RA;
$Gopika_toPadma[Gopika::Gopika_halffm_LA]   = Padma::Padma_halffm_LA;
$Gopika_toPadma[Gopika::Gopika_halffm_VA]   = Padma::Padma_halffm_VA;
$Gopika_toPadma[Gopika::Gopika_halffm_SHA]  = Padma::Padma_halffm_SHA;
$Gopika_toPadma[Gopika::Gopika_halffm_SSA]  = Padma::Padma_halffm_SSA;
$Gopika_toPadma[Gopika::Gopika_halffm_SA]   = Padma::Padma_halffm_SA;
$Gopika_toPadma[Gopika::Gopika_halffm_LLA]  = Padma::Padma_halffm_LLA;

//Conjuncts
$Gopika_toPadma[Gopika::Gopika_conjct_KK]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$Gopika_toPadma[Gopika::Gopika_conjct_KR]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$Gopika_toPadma[Gopika::Gopika_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Gopika_toPadma[Gopika::Gopika_conjct_KHT]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_TA;
$Gopika_toPadma[Gopika::Gopika_conjct_NGK]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA;
$Gopika_toPadma[Gopika::Gopika_conjct_NGKH]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KHA;
$Gopika_toPadma[Gopika::Gopika_conjct_NGG]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GA;
$Gopika_toPadma[Gopika::Gopika_conjct_NGGH]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GHA;
$Gopika_toPadma[Gopika::Gopika_conjct_NGM]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_MA;
$Gopika_toPadma[Gopika::Gopika_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$Gopika_toPadma[Gopika::Gopika_conjct_JJ]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$Gopika_toPadma[Gopika::Gopika_conjct_JR]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_RA;
$Gopika_toPadma[Gopika::Gopika_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Gopika_toPadma[Gopika::Gopika_conjct_TT_TTH] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$Gopika_toPadma[Gopika::Gopika_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$Gopika_toPadma[Gopika::Gopika_conjct_DDDD]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$Gopika_toPadma[Gopika::Gopika_conjct_DD_DDH] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$Gopika_toPadma[Gopika::Gopika_conjct_DDHDDH] = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_DDHA;
$Gopika_toPadma[Gopika::Gopika_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Gopika_toPadma[Gopika::Gopika_conjct_TR]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Gopika_toPadma[Gopika::Gopika_conjct_TN]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_NA;
$Gopika_toPadma[Gopika::Gopika_conjct_DGH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_GHA;
$Gopika_toPadma[Gopika::Gopika_conjct_DD]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Gopika_toPadma[Gopika::Gopika_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Gopika_toPadma[Gopika::Gopika_conjct_DB]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$Gopika_toPadma[Gopika::Gopika_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$Gopika_toPadma[Gopika::Gopika_conjct_DR]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$Gopika_toPadma[Gopika::Gopika_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$Gopika_toPadma[Gopika::Gopika_conjct_PT]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_TA;
$Gopika_toPadma[Gopika::Gopika_conjct_PN]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_NA;
$Gopika_toPadma[Gopika::Gopika_conjct_PR]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$Gopika_toPadma[Gopika::Gopika_conjct_PHR]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA;
$Gopika_toPadma[Gopika::Gopika_conjct_SHC]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$Gopika_toPadma[Gopika::Gopika_conjct_SHN]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_NA;
$Gopika_toPadma[Gopika::Gopika_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$Gopika_toPadma[Gopika::Gopika_conjct_SHV]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$Gopika_toPadma[Gopika::Gopika_conjct_SSTT]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$Gopika_toPadma[Gopika::Gopika_conjct_HN]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NA;
$Gopika_toPadma[Gopika::Gopika_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$Gopika_toPadma[Gopika::Gopika_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$Gopika_toPadma[Gopika::Gopika_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$Gopika_toPadma[Gopika::Gopika_conjct_HV]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_VA;

//Combos
$Gopika_toPadma[Gopika::Gopika_combo_KSHU]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_KSHUU]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_KSHR]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_KHU]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_KHUU]    = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_KHR]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_GU]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_GUU]     = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_GR]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_GHU]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_GHUU]    = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_GHR]     = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_CU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_CUU]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_CR]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_JAA]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_AA;
$Gopika_toPadma[Gopika::Gopika_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;
$Gopika_toPadma[Gopika::Gopika_combo_NNU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_NNUU]    = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_NNR]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_TU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_TUU]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_TR]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_THU]     = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_THUU]    = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_THR]     = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_DHR]     = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_DHU]     = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_DHUU]    = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_DHR]     = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_NU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_NUU]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_NR]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_PU]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_PUU]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_PR]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_BU]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_BUU]     = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_BR]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_BHU]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_BHUU]    = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_BHR]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_MR]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_YU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_YUU]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_YR]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_RUU_1]   = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_RUU_2]   = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_LU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_LUU]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_LR]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_VU]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_VUU]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_VR]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_LLU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_LLUU]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_LLR]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_SHU]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_SHUU]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_SHR]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_SSU]     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_SSUU]    = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_SSR]     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_SU]      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_SUU]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_SR]      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$Gopika_toPadma[Gopika::Gopika_combo_HYU]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA . Padma::Padma_vowelsn_U;
$Gopika_toPadma[Gopika::Gopika_combo_HYUU]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA . Padma::Padma_vowelsn_UU;
$Gopika_toPadma[Gopika::Gopika_combo_HYR]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA . Padma::Padma_vowelsn_R;

$Gopika_toPadma[Gopika::Gopika_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;

$Gopika_toPadma[Gopika::Gopika_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Gopika_toPadma[Gopika::Gopika_vattu_RA_2]    = Padma::Padma_vattu_RA;

$Gopika_toPadma[Gopika::Gopika_misc_DANDA]    = Padma::Padma_danda;
$Gopika_toPadma[Gopika::Gopika_misc_DDANDA]   = Padma::Padma_ddanda;
$Gopika_toPadma[Gopika::Gopika_misc_OM]       = Padma::Padma_om;
$Gopika_toPadma[Gopika::Gopika_nukta]         = Padma::Padma_nukta;

//Digits
$Gopika_toPadma[Gopika::Gopika_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Gopika_toPadma[Gopika::Gopika_digit_ONE]     = Padma::Padma_digit_ONE;
$Gopika_toPadma[Gopika::Gopika_digit_TWO]     = Padma::Padma_digit_TWO;
$Gopika_toPadma[Gopika::Gopika_digit_THREE]   = Padma::Padma_digit_THREE;
$Gopika_toPadma[Gopika::Gopika_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Gopika_toPadma[Gopika::Gopika_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Gopika_toPadma[Gopika::Gopika_digit_SIX]     = Padma::Padma_digit_SIX;
$Gopika_toPadma[Gopika::Gopika_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Gopika_toPadma[Gopika::Gopika_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Gopika_toPadma[Gopika::Gopika_digit_NINE]    = Padma::Padma_digit_NINE;

//Does not match ASCII
$Gopika_toPadma[Gopika::Gopika_extra_COLON]      = ":";
$Gopika_toPadma[Gopika::Gopika_extra_SEMICOLON]  = ";";
$Gopika_toPadma[Gopika::Gopika_extra_HYPHEN]     = "-";
$Gopika_toPadma[Gopika::Gopika_extra_QTSINGLE_1] = "'";
$Gopika_toPadma[Gopika::Gopika_extra_QTSINGLE_2] = "'";
$Gopika_toPadma[Gopika::Gopika_extra_QTSINGLE_3] = "'";
$Gopika_toPadma[Gopika::Gopika_extra_QTDOUBLE_1] = '"';

$Gopika_prefixList = array();
$Gopika_prefixList[Gopika::Gopika_vowelsn_I_1] = true;
$Gopika_prefixList[Gopika::Gopika_vowelsn_I_2] = true;
$Gopika_prefixList[Gopika::Gopika_vowelsn_IM]  = true;
$Gopika_prefixList[Gopika::Gopika_nukta]       = true;

$Gopika_suffixList = array();
$Gopika_suffixList[Gopika::Gopika_halffm_RA]     = true;
$Gopika_suffixList[Gopika::Gopika_halffm_RA_ANU] = true;

$Gopika_overloadList = array();
$Gopika_overloadList[Gopika::Gopika_vowel_A]     = true;
$Gopika_overloadList[Gopika::Gopika_vowel_AA]    = true;
$Gopika_overloadList[Gopika::Gopika_vowelsn_AA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_KSH]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_KHA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_GA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_GHA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_CA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_JNY]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_NYA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_NNA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_TA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_TT]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_TR]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_THA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_DHA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_NA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_PA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_BA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_BHA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_MA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_YA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_LA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_VA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_LLA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_SHA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_SSA]  = true;
$Gopika_overloadList[Gopika::Gopika_halffm_SA]   = true;
$Gopika_overloadList[Gopika::Gopika_halffm_HY]   = true;
$Gopika_overloadList[Gopika::Gopika_misc_DANDA]  = true;

function Gopika_initialize()
{
    global $fontinfo;

    $fontinfo["gopika"]["language"] = "Gujarati";
    $fontinfo["gopika"]["class"] = "Gopika";
}
?>
