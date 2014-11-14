<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Radhika Thammishetty  <radhika@atc.tcs.com>
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

//Manorama Malayalam
class Manorama
{
function Manorama()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "Manorama";
var $displayName  = "Manorama";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup($str) 
{
       global $Manorama_toPadma;
       return $Manorama_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Manorama_prefixList;
    return $Manorama_prefixList[$str] != null;
}

function isOverloaded($str)
{
   global $Manorama_overloadList;
   return $Manorama_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_E))
        return Padma::Padma_vowelsn_O;
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;
}

function isRedundant($str)
{
    global $Manorama_redundantList;
    return $Manorama_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const Manorama_visarga        = "\xC2\xA3";
const Manorama_anusvara       = "\xC2\xA2";
const Manorama_virama_1       = "\xC2\xA1"; //Chandrakkala
const Manorama_virama_2       = "\xC3\xAD"; //Chandrakkala

//Vowels
const Manorama_vowel_A        = "\xC2\xA5";
const Manorama_vowel_AA       = "\xC2\xA6";
const Manorama_vowel_I        = "\xC2\xA7";
const Manorama_vowel_II       = "\xC2\xA8";
const Manorama_vowel_U        = "\xC2\xA9";
const Manorama_vowel_UU       = "\xC2\xAA";
const Manorama_vowel_R_1      = "\x60";
const Manorama_vowel_R_2      = "\xC2\xAB";
const Manorama_vowel_RR       = "\xC2\xAC";
const Manorama_vowel_E        = "\xC2\xAE";
const Manorama_vowel_EE       = "\xC2\xAF";               
const Manorama_vowel_AI_1     = "\xC2\xB0";
const Manorama_vowel_AI_2     = "\xC3\xA6\xC2\xAE";
const Manorama_vowel_O        = "\xC2\xB2";
const Manorama_vowel_OO       = "\xC2\xB3";
const Manorama_vowel_AU       = "\xC2\xB4";

//Consonants
const Manorama_consnt_KA      = "\xC2\xB5";
const Manorama_consnt_KHA_1   = "\x7E";
const Manorama_consnt_KHA_2   = "\xC2\xB6";
const Manorama_consnt_GA_1    = "\xC2\xB1";
const Manorama_consnt_GA_2    = "\xC2\xB7";
const Manorama_consnt_GHA     = "\xC2\xB8";
const Manorama_consnt_NGA     = "\xC2\xB9";

const Manorama_consnt_CA      = "\xC2\xBA";
const Manorama_consnt_CHA     = "\xC2\xBB";
const Manorama_consnt_JA      = "\xC2\xBC";
const Manorama_consnt_JHA     = "\xC2\xBD";
const Manorama_consnt_NYA     = "\xC2\xBE";

const Manorama_consnt_TTA     = "\xC2\xBF";
const Manorama_consnt_TTHA    = "\xC3\x80";
const Manorama_consnt_DDA     = "\xC3\x81";
const Manorama_consnt_DDHA    = "\xC3\x82";
const Manorama_consnt_NNA     = "\xC3\x83";

const Manorama_consnt_TA      = "\xC3\x84";
const Manorama_consnt_THA_1   = "\x40";
const Manorama_consnt_THA_2   = "\xC3\x85";
const Manorama_consnt_DA      = "\xC3\x86";
const Manorama_consnt_DHA     = "\xC3\x87";
const Manorama_consnt_NA      = "\xC3\x88";

const Manorama_consnt_PA      = "\xC3\x89";
const Manorama_consnt_PHA     = "\xC3\x8B";
const Manorama_consnt_BA      = "\xC3\x8C";
const Manorama_consnt_BHA     = "\xC3\x8D";
const Manorama_consnt_MA      = "\xC3\x8E";

const Manorama_consnt_YA      = "\xC3\x8F";
const Manorama_consnt_RA      = "\xC3\xB8";
const Manorama_consnt_LA      = "\xC3\x9C";
const Manorama_consnt_VA      = "\xC3\x95";
const Manorama_consnt_SHA     = "\xC3\x96";
const Manorama_consnt_SSA     = "\xC3\x97";
const Manorama_consnt_SA      = "\xC3\x98";

const Manorama_consnt_HA      = "\xC3\x99";
const Manorama_consnt_LLA     = "\x7B";
const Manorama_consnt_ZHA     = "\xC3\x9D";
const Manorama_consnt_RRA     = "\xC3\xB9";

//Gunintamulu
const Manorama_vowelsn_AA     = "\xC3\x9E";
const Manorama_vowelsn_I_1    = "\xC3\x9F";
const Manorama_vowelsn_I_2    = "\xC3\xB2";
const Manorama_vowelsn_II     = "\xC3\xA0";
const Manorama_vowelsn_U_1    = "\xC3\xA1";
const Manorama_vowelsn_U_2    = "\xC3\xB3";
const Manorama_vowelsn_U_3    = "\xC3\xB6";
const Manorama_vowelsn_UU_1   = "\xC3\xA2";
const Manorama_vowelsn_UU_2   = "\xC3\xB4";
const Manorama_vowelsn_UU_3   = "\xC3\xB5";
const Manorama_vowelsn_R_1    = "\xC3\xA3";
const Manorama_vowelsn_R_2    = "\xC3\xA4";
const Manorama_vowelsn_RR     = "\xC3\xA3\xC3\xAC";
const Manorama_vowelsn_E      = "\xC3\xA6";
const Manorama_vowelsn_EE     = "\xC3\xA7";
const Manorama_vowelsn_AI_1   = "\xC3\xA6\xC3\xA6";
const Manorama_vowelsn_AI_2   = "\xC3\xA8";
//vowelsigns o and O have two separate glyphs, one on left and one on right_
const Manorama_vowelsn_AU     = "\xC3\xAC";

//Chillu (5)
const Manorama_chillu_ENN     = "\x59";
const Manorama_chillu_IN      = "\x58";
const Manorama_chillu_IR_1    = "\x56";
const Manorama_chillu_IR_2    = "\x5E";
const Manorama_chillu_IL      = "\x57";
const Manorama_chillu_ILL_1   = "\x5A";
const Manorama_chillu_ILL_2   = "\x5C";

//vattulu (consonant signs)
const Manorama_vattu_TA       = "\xC3\xB1";
const Manorama_vattu_YA       = "\x63";
const Manorama_vattu_RA       = "\x64";
const Manorama_vattu_LA_1     = "\xC3\xAF";
const Manorama_vattu_LA_2     = "\xC3\xB0";
const Manorama_vattu_VA       = "\x62";

//kooTTaksharangngaL
const Manorama_conj_KK        = "\x41";
const Manorama_conj_KLL       = "\xC3\x90";
const Manorama_conj_KSH       = "\x66";
const Manorama_conj_GG        = "\x50";
const Manorama_conj_GN        = "\x6F";
const Manorama_conj_GM        = "\x75";
const Manorama_conj_NGK       = "\x43";  
const Manorama_conj_NGNG      = "\x42";

const Manorama_conj_CC_1      = "\xE2\x80\x9A";
const Manorama_conj_CC_2      = "\xC2\xBA\xC3\xAE";
const Manorama_conj_NYC       = "\x46";
const Manorama_conj_NYNY      = "\x45";

const Manorama_conj_TTTT      = "\x47";
const Manorama_conj_NNTT      = "\x49";
const Manorama_conj_NNDD      = "\x6D";
const Manorama_conj_NNNN      = "\x48";
const Manorama_conj_NNM       = "\x70";

const Manorama_conj_T_T       = "\x4A";
const Manorama_conj_T_TH      = "\x6A";
const Manorama_conj_TBH       = "\x71";
const Manorama_conj_TM        = "\x76";
const Manorama_conj_TN        = "\x79";
const Manorama_conj_TS        = "\x72";
const Manorama_conj_DD        = "\x67";
const Manorama_conj_D_DH      = "\x69";
const Manorama_conj_NT        = "\x4C";
const Manorama_conj_NTH       = "\x73";
const Manorama_conj_ND        = "\x77";
const Manorama_conj_NDH       = "\x74";
const Manorama_conj_N_N       = "\x4B";
const Manorama_conj_NM        = "\x7A";
const Manorama_conj_NRR       = "\x61"; 
const Manorama_conj_NAU       = "\x65"; //npollu for me, nau for paul

const Manorama_conj_PP        = "\x4D";
const Manorama_conj_PLL       = "\xC6\x92";
const Manorama_conj_BB_1      = "\xE2\x80\x9E";
const Manorama_conj_BB_2      = "\xC3\x8C\xC3\xAE";
const Manorama_conj_BLL       = "\xE2\x80\xA0";
const Manorama_conj_MP        = "\x4F";
const Manorama_conj_MM        = "\x4E";
const Manorama_conj_MLL       = "\x7C";

const Manorama_conj_YY        = "\xE2\x80\xA1";
const Manorama_conj_L_L       = "\xCB\x86";
const Manorama_conj_VV_1      = "\xC5\x92";
const Manorama_conj_VV_2      = "\xC3\x95\xC3\xAE";

const Manorama_conj_SHLL      = "\xE2\x80\xB0";
const Manorama_conj_SHSH      = "\xC3\x9B";
const Manorama_conj_SLL       = "\xC5\xA0";
const Manorama_conj_S_S       = "\x54";

const Manorama_conj_HN        = "\xC2\xAD";
const Manorama_conj_HLL       = "\xE2\x80\xA6";
const Manorama_conj_LLLL      = "\x55";

const Manorama_conj_RRRR_1    = "\x78"; //ta as in steel
const Manorama_conj_RRRR_2    = "\xC3\x9A"; //ta as in steel

//Consonat(s) + vowel combinations
const Manorama_combo_KR       = "\xE2\x80\xB9";

//Digits
const Manorama_digit_ZERO     = "\x30";
const Manorama_digit_ONE      = "\x31";
const Manorama_digit_TWO      = "\x32";
const Manorama_digit_THREE    = "\x33";
const Manorama_digit_FOUR     = "\x34";
const Manorama_digit_FIVE     = "\x35";
const Manorama_digit_SIX      = "\x36";
const Manorama_digit_SEVEN    = "\x37";
const Manorama_digit_EIGHT    = "\x38";
const Manorama_digit_NINE     = "\x39";

//const Matches ASCII
const Manorama_EXCLAM         = "\x21";
const Manorama_PERCENT        = "\x25";
const Manorama_QTSINGLE       = "\x27";
const Manorama_PARENLEFT      = "\x28";
const Manorama_PARENRIGT      = "\x29";
const Manorama_ASTERISK       = "\x2A";
const Manorama_PLUS           = "\x2B";
const Manorama_COMMA          = "\x2C";
const Manorama_PERIOD         = "\x2E";
const Manorama_SLASH          = "\x2F";
const Manorama_COLON          = "\x3A";
const Manorama_SEMICOLON      = "\x3B";
const Manorama_LESSTHAN       = "\x3C";
const Manorama_EQUALS         = "\x3D";
const Manorama_GREATERTHAN    = "\x3E";
const Manorama_QUESTION       = "\x3F";

//Does not match ASCII
const Manorama_extra_DBLQT_1  = "\x51";
const Manorama_extra_DBLQT_2  = "\x52";
const Manorama_extra_PERCENT  = "\x23";
const Manorama_extra_ASTERISK = "\x24";
const Manorama_extra_PLUS     = "\x26";
const Manorama_extra_QTSINGLE = "\x22";
const Manorama_extra_PERIOD   = "\x44";
const Manorama_extra_HYPHEN_1 = "\x5F";
const Manorama_extra_HYPHEN_2 = "\xE2\x80\x93";
const Manorama_extra_HYPHEN_3 = "\xE2\x80\x94";
const Manorama_extra_HYPHEN_4 = "\xC3\xAA";
const Manorama_extra_HYPHEN_5 = "\xC3\xAB";

//Dont need
const Manorama_misc_UNKNOWN_1  = "\x2D";
const Manorama_misc_UNKNOWN_2  = "\xCB\x9C";
const Manorama_misc_UNKNOWN_3  = "\xE2\x84\xA2";
const Manorama_misc_UNKNOWN_4  = "\xC5\xA1";
const Manorama_misc_UNKNOWN_5  = "\xE2\x80\xBA";
const Manorama_misc_UNKNOWN_6  = "\xC5\x93";
const Manorama_misc_UNKNOWN_7  = "\xC5\xB8";
const Manorama_misc_UNKNOWN_8  = "\xC2\xA4";
const Manorama_misc_UNKNOWN_9  = "\xC3\xBF";
}
$Manorama_toPadma = array();

$Manorama_toPadma[Manorama::Manorama_anusvara] = Padma::Padma_anusvara;
$Manorama_toPadma[Manorama::Manorama_visarga]  = Padma::Padma_visarga;
$Manorama_toPadma[Manorama::Manorama_virama_1] = Padma::Padma_chandrakkala;
$Manorama_toPadma[Manorama::Manorama_virama_2] = Padma::Padma_chandrakkala;

$Manorama_toPadma[Manorama::Manorama_vowel_A]  = Padma::Padma_vowel_A;
$Manorama_toPadma[Manorama::Manorama_vowel_AA] = Padma::Padma_vowel_AA;
$Manorama_toPadma[Manorama::Manorama_vowel_I]  = Padma::Padma_vowel_I;
$Manorama_toPadma[Manorama::Manorama_vowel_II] = Padma::Padma_vowel_II;
$Manorama_toPadma[Manorama::Manorama_vowel_U]  = Padma::Padma_vowel_U;
$Manorama_toPadma[Manorama::Manorama_vowel_UU] = Padma::Padma_vowel_UU;
$Manorama_toPadma[Manorama::Manorama_vowel_R_1] = Padma::Padma_vowel_R;
$Manorama_toPadma[Manorama::Manorama_vowel_R_2] = Padma::Padma_vowel_R;
$Manorama_toPadma[Manorama::Manorama_vowel_RR] = Padma::Padma_vowel_RR;
$Manorama_toPadma[Manorama::Manorama_vowel_E]  = Padma::Padma_vowel_E;
$Manorama_toPadma[Manorama::Manorama_vowel_EE] = Padma::Padma_vowel_EE;
$Manorama_toPadma[Manorama::Manorama_vowel_AI_1] = Padma::Padma_vowel_AI;
$Manorama_toPadma[Manorama::Manorama_vowel_AI_2] = Padma::Padma_vowel_AI;
$Manorama_toPadma[Manorama::Manorama_vowel_O]  = Padma::Padma_vowel_O;
$Manorama_toPadma[Manorama::Manorama_vowel_OO] = Padma::Padma_vowel_OO;
$Manorama_toPadma[Manorama::Manorama_vowel_AU] = Padma::Padma_vowel_AU;

$Manorama_toPadma[Manorama::Manorama_consnt_KA]  = Padma::Padma_consnt_KA;
$Manorama_toPadma[Manorama::Manorama_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Manorama_toPadma[Manorama::Manorama_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Manorama_toPadma[Manorama::Manorama_consnt_GA_1]  = Padma::Padma_consnt_GA;
$Manorama_toPadma[Manorama::Manorama_consnt_GA_2]  = Padma::Padma_consnt_GA;
$Manorama_toPadma[Manorama::Manorama_consnt_GHA] = Padma::Padma_consnt_GHA;
$Manorama_toPadma[Manorama::Manorama_consnt_NGA] = Padma::Padma_consnt_NGA;

$Manorama_toPadma[Manorama::Manorama_consnt_CA]  = Padma::Padma_consnt_CA;
$Manorama_toPadma[Manorama::Manorama_consnt_CHA] = Padma::Padma_consnt_CHA;
$Manorama_toPadma[Manorama::Manorama_consnt_JA]  = Padma::Padma_consnt_JA;
$Manorama_toPadma[Manorama::Manorama_consnt_JHA] = Padma::Padma_consnt_JHA;
$Manorama_toPadma[Manorama::Manorama_consnt_NYA] = Padma::Padma_consnt_NYA;

$Manorama_toPadma[Manorama::Manorama_consnt_TTA]  = Padma::Padma_consnt_TTA;
$Manorama_toPadma[Manorama::Manorama_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Manorama_toPadma[Manorama::Manorama_consnt_DDA]  = Padma::Padma_consnt_DDA;
$Manorama_toPadma[Manorama::Manorama_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Manorama_toPadma[Manorama::Manorama_consnt_NNA]  = Padma::Padma_consnt_NNA;

$Manorama_toPadma[Manorama::Manorama_consnt_TA]  = Padma::Padma_consnt_TA;
$Manorama_toPadma[Manorama::Manorama_consnt_THA_1] = Padma::Padma_consnt_THA;
$Manorama_toPadma[Manorama::Manorama_consnt_THA_2] = Padma::Padma_consnt_THA;
$Manorama_toPadma[Manorama::Manorama_consnt_DA]  = Padma::Padma_consnt_DA;
$Manorama_toPadma[Manorama::Manorama_consnt_DHA] = Padma::Padma_consnt_DHA;
$Manorama_toPadma[Manorama::Manorama_consnt_NA]  = Padma::Padma_consnt_NA;

$Manorama_toPadma[Manorama::Manorama_consnt_PA]  = Padma::Padma_consnt_PA;
$Manorama_toPadma[Manorama::Manorama_consnt_PHA] = Padma::Padma_consnt_PHA;
$Manorama_toPadma[Manorama::Manorama_consnt_BA]  = Padma::Padma_consnt_BA;
$Manorama_toPadma[Manorama::Manorama_consnt_BHA] = Padma::Padma_consnt_BHA;
$Manorama_toPadma[Manorama::Manorama_consnt_MA]  = Padma::Padma_consnt_MA;

$Manorama_toPadma[Manorama::Manorama_consnt_YA]  = Padma::Padma_consnt_YA;
$Manorama_toPadma[Manorama::Manorama_consnt_RA]  = Padma::Padma_consnt_RA;
$Manorama_toPadma[Manorama::Manorama_consnt_LA]  = Padma::Padma_consnt_LA;
$Manorama_toPadma[Manorama::Manorama_consnt_VA]  = Padma::Padma_consnt_VA;
$Manorama_toPadma[Manorama::Manorama_consnt_SHA] = Padma::Padma_consnt_SHA;
$Manorama_toPadma[Manorama::Manorama_consnt_SSA] = Padma::Padma_consnt_SSA;
$Manorama_toPadma[Manorama::Manorama_consnt_SA]  = Padma::Padma_consnt_SA;

$Manorama_toPadma[Manorama::Manorama_consnt_HA] = Padma::Padma_consnt_HA;
$Manorama_toPadma[Manorama::Manorama_consnt_LLA] = Padma::Padma_consnt_LLA;
$Manorama_toPadma[Manorama::Manorama_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Manorama_toPadma[Manorama::Manorama_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$Manorama_toPadma[Manorama::Manorama_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Manorama_toPadma[Manorama::Manorama_vowelsn_I_1]  = Padma::Padma_vowelsn_I;
$Manorama_toPadma[Manorama::Manorama_vowelsn_I_2]  = Padma::Padma_vowelsn_I;
$Manorama_toPadma[Manorama::Manorama_vowelsn_II] = Padma::Padma_vowelsn_II;
$Manorama_toPadma[Manorama::Manorama_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$Manorama_toPadma[Manorama::Manorama_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$Manorama_toPadma[Manorama::Manorama_vowelsn_U_3]  = Padma::Padma_vowelsn_U;
$Manorama_toPadma[Manorama::Manorama_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$Manorama_toPadma[Manorama::Manorama_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$Manorama_toPadma[Manorama::Manorama_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$Manorama_toPadma[Manorama::Manorama_vowelsn_R_1]  = Padma::Padma_vowelsn_R;
$Manorama_toPadma[Manorama::Manorama_vowelsn_R_2]  = Padma::Padma_vowelsn_R;
$Manorama_toPadma[Manorama::Manorama_vowelsn_E]  = Padma::Padma_vowelsn_E;
$Manorama_toPadma[Manorama::Manorama_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Manorama_toPadma[Manorama::Manorama_vowelsn_AI_1] = Padma::Padma_vowelsn_AI;
$Manorama_toPadma[Manorama::Manorama_vowelsn_AI_2] = Padma::Padma_vowelsn_AI;
$Manorama_toPadma[Manorama::Manorama_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Chillu
$Manorama_toPadma[Manorama::Manorama_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$Manorama_toPadma[Manorama::Manorama_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$Manorama_toPadma[Manorama::Manorama_chillu_IR_1] = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Manorama_toPadma[Manorama::Manorama_chillu_IR_2] = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Manorama_toPadma[Manorama::Manorama_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$Manorama_toPadma[Manorama::Manorama_chillu_ILL_1] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;
$Manorama_toPadma[Manorama::Manorama_chillu_ILL_2] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//vattulu
$Manorama_toPadma[Manorama::Manorama_vattu_TA]  = Padma::Padma_vattu_TA;
$Manorama_toPadma[Manorama::Manorama_vattu_YA]  = Padma::Padma_vattu_YA;
$Manorama_toPadma[Manorama::Manorama_vattu_RA]  = Padma::Padma_vattu_RA;
$Manorama_toPadma[Manorama::Manorama_vattu_LA_1] = Padma::Padma_vattu_LA;
$Manorama_toPadma[Manorama::Manorama_vattu_LA_2] = Padma::Padma_vattu_LA;
$Manorama_toPadma[Manorama::Manorama_vattu_VA]  = Padma::Padma_vattu_VA;

//kooTTaksharangngaL
$Manorama_toPadma[Manorama::Manorama_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$Manorama_toPadma[Manorama::Manorama_conj_KLL]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_LLA;
$Manorama_toPadma[Manorama::Manorama_conj_KSH]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_SSA;
$Manorama_toPadma[Manorama::Manorama_conj_GG]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_GA;
$Manorama_toPadma[Manorama::Manorama_conj_GN]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_NA;
$Manorama_toPadma[Manorama::Manorama_conj_GM]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_MA;
$Manorama_toPadma[Manorama::Manorama_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;
$Manorama_toPadma[Manorama::Manorama_conj_NGNG] = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_NGA;

$Manorama_toPadma[Manorama::Manorama_conj_CC_1] = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$Manorama_toPadma[Manorama::Manorama_conj_CC_2] = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$Manorama_toPadma[Manorama::Manorama_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$Manorama_toPadma[Manorama::Manorama_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;

$Manorama_toPadma[Manorama::Manorama_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$Manorama_toPadma[Manorama::Manorama_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$Manorama_toPadma[Manorama::Manorama_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;
$Manorama_toPadma[Manorama::Manorama_conj_NNNN] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_NNA;
$Manorama_toPadma[Manorama::Manorama_conj_NNM]  = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_MA;

$Manorama_toPadma[Manorama::Manorama_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$Manorama_toPadma[Manorama::Manorama_conj_T_TH] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_THA;
$Manorama_toPadma[Manorama::Manorama_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$Manorama_toPadma[Manorama::Manorama_conj_TM]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_MA;
$Manorama_toPadma[Manorama::Manorama_conj_TN]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_NA;
$Manorama_toPadma[Manorama::Manorama_conj_TS]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_SA;
$Manorama_toPadma[Manorama::Manorama_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$Manorama_toPadma[Manorama::Manorama_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$Manorama_toPadma[Manorama::Manorama_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$Manorama_toPadma[Manorama::Manorama_conj_NTH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_THA;
$Manorama_toPadma[Manorama::Manorama_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$Manorama_toPadma[Manorama::Manorama_conj_NDH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DHA;
$Manorama_toPadma[Manorama::Manorama_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$Manorama_toPadma[Manorama::Manorama_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$Manorama_toPadma[Manorama::Manorama_conj_NRR]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$Manorama_toPadma[Manorama::Manorama_conj_NAU]  = Padma::Padma_consnt_NA .  Padma::Padma_chandrakkala;

$Manorama_toPadma[Manorama::Manorama_conj_PP]  = Padma::Padma_consnt_PA .  Padma::Padma_vattu_PA;
$Manorama_toPadma[Manorama::Manorama_conj_PLL] = Padma::Padma_consnt_PA .  Padma::Padma_vattu_LLA;
$Manorama_toPadma[Manorama::Manorama_conj_BB_1] = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$Manorama_toPadma[Manorama::Manorama_conj_BB_2] = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$Manorama_toPadma[Manorama::Manorama_conj_BLL] = Padma::Padma_consnt_BA .  Padma::Padma_vattu_LLA;
$Manorama_toPadma[Manorama::Manorama_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$Manorama_toPadma[Manorama::Manorama_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;
$Manorama_toPadma[Manorama::Manorama_conj_MLL] = Padma::Padma_consnt_MA .  Padma::Padma_vattu_LLA;

$Manorama_toPadma[Manorama::Manorama_conj_YY]   = Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$Manorama_toPadma[Manorama::Manorama_conj_L_L]  = Padma::Padma_consnt_LA .  Padma::Padma_vattu_LA;
$Manorama_toPadma[Manorama::Manorama_conj_VV_1] = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;
$Manorama_toPadma[Manorama::Manorama_conj_VV_2] = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;

$Manorama_toPadma[Manorama::Manorama_conj_SHLL] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_LLA;
$Manorama_toPadma[Manorama::Manorama_conj_SHSH] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_SHA;
$Manorama_toPadma[Manorama::Manorama_conj_SLL]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_LLA;
$Manorama_toPadma[Manorama::Manorama_conj_S_S]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_SA;

$Manorama_toPadma[Manorama::Manorama_conj_HN]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_NA;
$Manorama_toPadma[Manorama::Manorama_conj_HLL]  = Padma::Padma_consnt_HA .  Padma::Padma_vattu_LLA;
$Manorama_toPadma[Manorama::Manorama_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;

$Manorama_toPadma[Manorama::Manorama_conj_RRRR_1] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;
$Manorama_toPadma[Manorama::Manorama_conj_RRRR_2] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;

//Consonant(s) . Vowel Sign
$Manorama_toPadma[Manorama::Manorama_combo_KR]    = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_R;

//$Miscellaneous(where it doesn't match ASCII representation)
$Manorama_toPadma[Manorama::Manorama_extra_DBLQT_1]  = '"';
$Manorama_toPadma[Manorama::Manorama_extra_DBLQT_2]  = '"';
$Manorama_toPadma[Manorama::Manorama_extra_PERCENT]  = '%';
$Manorama_toPadma[Manorama::Manorama_extra_ASTERISK] = '*';
$Manorama_toPadma[Manorama::Manorama_extra_PLUS]     = '+';
$Manorama_toPadma[Manorama::Manorama_extra_QTSINGLE] = "'";
$Manorama_toPadma[Manorama::Manorama_extra_PERIOD]   = '.';
$Manorama_toPadma[Manorama::Manorama_extra_HYPHEN_1] = '-';
$Manorama_toPadma[Manorama::Manorama_extra_HYPHEN_2] = '-';
$Manorama_toPadma[Manorama::Manorama_extra_HYPHEN_3] = '-';
$Manorama_toPadma[Manorama::Manorama_extra_HYPHEN_4] = '-';
$Manorama_toPadma[Manorama::Manorama_extra_HYPHEN_5] = '-';

$Manorama_redundantList = array();
$Manorama_redundantList[Manorama::Manorama_misc_UNKNOWN_1] = true;
$Manorama_redundantList[Manorama::Manorama_misc_UNKNOWN_2] = true;
$Manorama_redundantList[Manorama::Manorama_misc_UNKNOWN_3] = true;
$Manorama_redundantList[Manorama::Manorama_misc_UNKNOWN_4] = true;
$Manorama_redundantList[Manorama::Manorama_misc_UNKNOWN_5] = true;
$Manorama_redundantList[Manorama::Manorama_misc_UNKNOWN_6] = true;
$Manorama_redundantList[Manorama::Manorama_misc_UNKNOWN_7] = true;
$Manorama_redundantList[Manorama::Manorama_misc_UNKNOWN_8] = true;
$Manorama_redundantList[Manorama::Manorama_misc_UNKNOWN_9] = true;

$Manorama_prefixList = array();
$Manorama_prefixList[Manorama::Manorama_vattu_RA]   = true;
$Manorama_prefixList[Manorama::Manorama_vowelsn_E]  = true;
$Manorama_prefixList[Manorama::Manorama_vowelsn_EE] = true;
$Manorama_prefixList[Manorama::Manorama_vowelsn_AI_1] = true;
$Manorama_prefixList[Manorama::Manorama_vowelsn_AI_2] = true;

$Manorama_overloadList = array();
$Manorama_overloadList[Manorama::Manorama_consnt_CA]      = true;
$Manorama_overloadList[Manorama::Manorama_consnt_BA]      = true;
$Manorama_overloadList[Manorama::Manorama_consnt_VA]      = true;
$Manorama_overloadList[Manorama::Manorama_vowelsn_R_1]    = true;
$Manorama_overloadList[Manorama::Manorama_vowelsn_E]      = true;
$Manorama_overloadList[Manorama::Manorama_extra_QTSINGLE] = true;

function Manorama_initialize()
{
    global $fontinfo;

    $fontinfo["manorama"]["language"] = "Malayalam";
    $fontinfo["manorama"]["class"] = "Manorama";
}
?>
