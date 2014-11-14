<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Golam Mortuza Hossain <gmhossain@gmail.com> 
 *  Copyright (C) 2007 Harshita Vani   <harshita@atc.tcs.com>
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

//Aabpbengali Bengali
class Aabpbengali
{
function Aabpbengali()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 1;
var $fontFace     = "Aabpbengali";
var $displayName  = "Aabpbengali";
var $script       = Padma::Padma_script_BENGALI;
var $hasSuffixes  = true;

function lookup ($str) 
{
    global $Aabpbengali_toPadma;
    return $Aabpbengali_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $Aabpbengali_prefixList; 	
    return array_key_exists($str, $Aabpbengali_prefixList);
}

function isSuffixSymbol ($str)
{
    global $Aabpbengali_suffixList;
    return array_key_exists($str, $Aabpbengali_suffixList);
}

function isOverloaded ($str)
{
    global $Aabpbengali_overloadList;
    return array_key_exists($str, $Aabpbengali_overloadList);
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_E))
        return Padma::Padma_vowelsn_OO;
    if (($sign1 == Padma::Padma_vowelsn_AULEN && $sign2 == Padma::Padma_vowelsn_E) ||
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AULEN))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;
}

function isRedundant ($str)
{
    global $Aabpbengali_redundantList;
    return array_key_exists($str, $Aabpbengali_redundantList);
}


/* Map from Aabpbengali   starts here */

const Aabpbengali_halffm_RA_1    = "\x27";
const Aabpbengali_halffm_RA_2    = "\xC3\x95";
const Aabpbengali_halffm_RA_3    = "\xC3\xB1";
const Aabpbengali_candrabindu_1  = "\x3C"; 
const Aabpbengali_candrabindu_2  = "\x3E"; 
const Aabpbengali_candrabindu_3  = "\x40"; 
const Aabpbengali_virama_1       = "\x51";
const Aabpbengali_virama_2       = "\xC2\xA1";
const Aabpbengali_virama_3       = "\xC2\xAB";
const Aabpbengali_virama_4       = "\xC2\xBF";
const Aabpbengali_virama_5       = "\xC3\x80";
const Aabpbengali_virama_6       = "\xC3\x83";

//Vowels
const Aabpbengali_vowel_A        = "\x58";
const Aabpbengali_vowel_AA       = "\x59";
const Aabpbengali_vowel_I        = "\x5A";
const Aabpbengali_vowel_II       = "\x5B";
const Aabpbengali_vowel_U        = "\x5C";
const Aabpbengali_vowel_UU       = "\x5D";
const Aabpbengali_vowel_R        = "\x5E";
//const Aabpbengali_vowel_RR       = "\x5E";
const Aabpbengali_vowel_E        = "\x5F";
const Aabpbengali_vowel_AI       = "\x60";
const Aabpbengali_vowel_O        = "\x61";
const Aabpbengali_vowel_AU       = "\x62";

//Consonants
const Aabpbengali_consnt_KA      = "\x63";
const Aabpbengali_consnt_KHA     = "\x64";
const Aabpbengali_consnt_GA      = "\x65";
const Aabpbengali_consnt_GHA     = "\x66";
const Aabpbengali_consnt_NGA     = "\x67";

const Aabpbengali_consnt_CA      = "\x68";
const Aabpbengali_consnt_CHA     = "\x69";
const Aabpbengali_consnt_JA      = "\x6A";
const Aabpbengali_consnt_JHA     = "\x6B";
const Aabpbengali_consnt_NYA     = "\x6C";

const Aabpbengali_consnt_TTA     = "\x6D";
const Aabpbengali_consnt_TTHA    = "\x6E";
const Aabpbengali_consnt_DDA     = "\x6F";
const Aabpbengali_consnt_DDHA    = "\x70";
const Aabpbengali_consnt_NNA     = "\x71";

const Aabpbengali_consnt_TA      = "\x72";
const Aabpbengali_consnt_THA     = "\x73";
const Aabpbengali_consnt_DA      = "\x74";
const Aabpbengali_consnt_DHA     = "\x75";
const Aabpbengali_consnt_NA      = "\x76";

const Aabpbengali_consnt_PA      = "\x77";
const Aabpbengali_consnt_PHA_1   = "\x78";
const Aabpbengali_consnt_PHA_2   = "\xE2\x81\xB8";
const Aabpbengali_consnt_BA      = "\x79";
const Aabpbengali_consnt_BHA     = "\x7A";
const Aabpbengali_consnt_MA_1    = "\x7B";
const Aabpbengali_consnt_MA_2    = "\xE2\x81\xBB";

const Aabpbengali_consnt_YA      = "\x7C";
const Aabpbengali_consnt_RA      = "\x7D";
const Aabpbengali_consnt_LA_1    = "\x7E";
const Aabpbengali_consnt_LA_2    = "\x7E";
const Aabpbengali_consnt_VA      = "\x7F";
const Aabpbengali_consnt_SHA     = "\xC3\x85";
const Aabpbengali_consnt_SSA     = "\xC3\x87";
const Aabpbengali_consnt_SA      = "\xC3\x89";
const Aabpbengali_consnt_HA      = "\xC3\x91";

const Aabpbengali_consnt_KHANDA_TA     = "\xC3\xA0";

const Aabpbengali_consnt_RRA     = "\xC3\x96";
const Aabpbengali_consnt_RHA     = "\xC3\xA1";
const Aabpbengali_consnt_YYA     = "\xC3\x9C";

//Gunintamulu
const Aabpbengali_vowelsn_AA     = "\x53";
const Aabpbengali_vowelsn_I_1    = "\x41";
const Aabpbengali_vowelsn_I_2    = "\x42";
const Aabpbengali_vowelsn_I_3    = "\x43";
const Aabpbengali_vowelsn_I_4    = "\x44";
const Aabpbengali_vowelsn_I_candrabindu_1   = "\x45";
const Aabpbengali_vowelsn_R_II_1 = "\x46";
const Aabpbengali_vowelsn_R_II_2 = "\x47";

const Aabpbengali_vowelsn_II_1   = "\x48";
const Aabpbengali_vowelsn_II_2   = "\x49";
const Aabpbengali_vowelsn_U_1    = "\x4A";
const Aabpbengali_vowelsn_I_candrabindu_2   = "\xC2\xB1";
const Aabpbengali_vowelsn_I_candrabindu_3   = "\xC3\x86";
const Aabpbengali_vowelsn_U_2    = "\xC3\x81";
const Aabpbengali_vowelsn_U_3    = "\xC3\x82";
const Aabpbengali_vowelsn_U_4    = "\xC3\x8C";
const Aabpbengali_vowelsn_U_5    = "\xC3\x8D";
const Aabpbengali_vowelsn_I_candrabindu_4   = "\xC3\x98";
const Aabpbengali_vowelsn_U_6    = "\xC3\x9A";
const Aabpbengali_vowelsn_UU_1   = "\x4C";
const Aabpbengali_vowelsn_UU_2   = "\xC3\x8A";
const Aabpbengali_vowelsn_UU_3   = "\xC3\x8B";
const Aabpbengali_vowelsn_UU_4   = "\xC3\x8E";
const Aabpbengali_vowelsn_UU_5   = "\xC3\x93";
const Aabpbengali_vowelsn_UU_6   = "\xC3\x9B";
const Aabpbengali_vowelsn_UU_7   = "\x4C";
const Aabpbengali_vowelsn_R_1    = "\u00RF";
const Aabpbengali_vowelsn_R_2    = "\xC3\x88";
const Aabpbengali_vowelsn_R_3    = "\xC3\x8F";
const Aabpbengali_vowelsn_R_4    = "\xC3\x92";
const Aabpbengali_vowelsn_R_5    = "\xC3\x94";
const Aabpbengali_vowelsn_R_6    = "\xC3\x99";
//const Aabpbengali_vowelsn_RR     = "\xC2\xA6";
const Aabpbengali_vowelsn_E_1    = "\x4D";
const Aabpbengali_vowelsn_E_2    = "\x50";
const Aabpbengali_vowelsn_AI_1   = "\x4B";
const Aabpbengali_vowelsn_AI_2   = "\x4E";

const Aabpbengali_vowelsn_AULEN_1   = "\x52";
const Aabpbengali_vowelsn_AULEN_2   = "\x54";
const Aabpbengali_vowelsn_AULEN_candrabindu_1   = "\x55";
const Aabpbengali_vowelsn_AULEN_candrabindu_2   = "\x56";
const Aabpbengali_vowelsn_AULEN_candrabindu_3   = "\xC3\xAF";

//Conjuncts
const Aabpbengali_conjct_NN_NN   = "\xC2\xA3";
const Aabpbengali_conjct_TT      = "\xC2\xA7";
const Aabpbengali_conjct_KK      = "\xC3\xA3";
//const Aabpbengali_conjct_KV      = "\xC2\xB9";
const Aabpbengali_conjct_KT      = "\xC3\xA5";
const Aabpbengali_conjct_KR      = "\xC3\xA7";
const Aabpbengali_conjct_KL      = "\xC3\xA8";
const Aabpbengali_conjct_GR      = "\xC3\xA9";
const Aabpbengali_conjct_KSH     = "\xC3\xAA";

const Aabpbengali_conjct_GM      = "\xC3\xAC";
const Aabpbengali_conjct_GDH     = "\xC3\xAD";
const Aabpbengali_conjct_GN      = "\xC3\xAE";
const Aabpbengali_conjct_GL      = "\xC3\xBA";

//const Aabpbengali_conjct_JNY     = "\x6B";

const Aabpbengali_conjct_NGG     = "\xC3\xB2";
const Aabpbengali_conjct_NGK     = "\xC3\xB3";
//const Aabpbengali_conjct_NGGH    = "\xE2\x80\x9D";
//const Aabpbengali_conjct_NGKSH   = "\xC2\xAC";
//const Aabpbengali_conjct_NGM     = "\xC2\xB6";
const Aabpbengali_conjct_CC      = "\xC3\xB4";
const Aabpbengali_conjct_JJ      = "\xC3\xB5";
const Aabpbengali_conjct_CCH     = "\xC3\xB6";
const Aabpbengali_conjct_NNTT    = "\xC3\xBC";
//const Aabpbengali_conjct_TTTT    = "\xC3\x85";
//const Aabpbengali_conjct_TT_TTH  = "\xC3\x86";
//const Aabpbengali_conjct_TTHTTH  = "\xC3\x87";
const Aabpbengali_conjct_DDDD    = "\xC3\xBB";
//const Aabpbengali_conjct_DD_DDH  = "\xE2\x80\x93";
//const Aabpbengali_conjct_DDHDDH  = "\xC3\x89";
const Aabpbengali_conjct_NNDD    = "\xC2\xA2";
//const Aabpbengali_conjct_TT      = "\xC3\x8E\x6D";
const Aabpbengali_conjct_TM      = "\xC3\x9F";
const Aabpbengali_conjct_TR      = "\xC2\xAE";

const Aabpbengali_conjct_DM      = "\xC3\xB9";

const Aabpbengali_conjct_SHR     = "\xC2\xB5";

const Aabpbengali_vattu_YA       = "\xC2\xA9";

//Devanagari Digits
const Aabpbengali_digit_ZERO     = "\x30";
const Aabpbengali_digit_ONE      = "\x31";
const Aabpbengali_digit_TWO      = "\x32";
const Aabpbengali_digit_THREE    = "\x33";
const Aabpbengali_digit_FOUR     = "\x34";
const Aabpbengali_digit_FIVE     = "\x35";
const Aabpbengali_digit_SIX      = "\x36";
const Aabpbengali_digit_SEVEN    = "\x37";
const Aabpbengali_digit_EIGHT    = "\x38";
const Aabpbengali_digit_NINE     = "\x39";

////Does not match ASCII
const Aabpbengali_misc_DANDA       = "\xC2\xA5";

const Aabpbengali_misc_UNKNOWN_1 = "\x24";
const Aabpbengali_misc_UNKNOWN_2 = "\x3E";
const Aabpbengali_misc_UNKNOWN_3 = "\xC3\xAB";
const Aabpbengali_misc_UNKNOWN_4 = "\xC3\xBE";
//end

}

$Aabpbengali_toPadma = array();

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_candrabindu_1] = Padma::Padma_candrabindu;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_candrabindu_2] = Padma::Padma_candrabindu;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_candrabindu_3] = Padma::Padma_candrabindu;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_virama_1]      = Padma::Padma_syllbreak;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_virama_2]      = Padma::Padma_syllbreak;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_virama_3]      = Padma::Padma_syllbreak;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_virama_4]      = Padma::Padma_syllbreak;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_virama_5]      = Padma::Padma_syllbreak;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_virama_6]      = Padma::Padma_syllbreak;


$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_A]  = Padma::Padma_vowel_A;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_AA] = Padma::Padma_vowel_AA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_I]  = Padma::Padma_vowel_I;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_II] = Padma::Padma_vowel_II;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_U]  = Padma::Padma_vowel_U;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_UU] = Padma::Padma_vowel_UU;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_R]  = Padma::Padma_vowel_R;
//$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_RR] = Padma::Padma_vowel_RR;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_E] = Padma::Padma_vowel_E;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_AI] = Padma::Padma_vowel_AI;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_O]  = Padma::Padma_vowel_O;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowel_AU] = Padma::Padma_vowel_AU;

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_KA]  = Padma::Padma_consnt_KA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_KHA] = Padma::Padma_consnt_KHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_GA]  = Padma::Padma_consnt_GA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_GHA] = Padma::Padma_consnt_GHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_NGA] = Padma::Padma_consnt_NGA;

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_CA]  = Padma::Padma_consnt_CA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_CHA] = Padma::Padma_consnt_CHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_JA]  = Padma::Padma_consnt_JA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_JHA] = Padma::Padma_consnt_JHA;
//$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_NYA] = Padma::Padma_consnt_NYA;

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_TTA] = Padma::Padma_consnt_TTA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_DDA] = Padma::Padma_consnt_DDA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_NNA] = Padma::Padma_consnt_NNA;

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_TA]  = Padma::Padma_consnt_TA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_THA] = Padma::Padma_consnt_THA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_DA]  = Padma::Padma_consnt_DA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_DHA] = Padma::Padma_consnt_DHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_NA]  = Padma::Padma_consnt_NA;

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_PA]   = Padma::Padma_consnt_PA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_PHA_1]= Padma::Padma_consnt_PHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_PHA_2]= Padma::Padma_consnt_PHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_BA]   = Padma::Padma_consnt_BA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_BHA]  = Padma::Padma_consnt_BHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_MA_1] = Padma::Padma_consnt_MA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_MA_2] = Padma::Padma_consnt_MA;

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_YA]   = Padma::Padma_consnt_YA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_RA]   = Padma::Padma_consnt_RA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_LA_1] = Padma::Padma_consnt_LA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_LA_2] = Padma::Padma_consnt_LA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_VA]   = Padma::Padma_consnt_VA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_SHA]  = Padma::Padma_consnt_SHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_SSA]  = Padma::Padma_consnt_SSA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_SA]   = Padma::Padma_consnt_SA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_HA] = Padma::Padma_consnt_HA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_RRA]  = Padma::Padma_consnt_RRA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_RHA]  = Padma::Padma_consnt_RHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_YYA]  = Padma::Padma_consnt_YYA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_consnt_KHANDA_TA]  = Padma::Padma_consnt_KHANDA_TA;


//Gunintamulu
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_I_1]  = Padma::Padma_vowelsn_I;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_I_2]  = Padma::Padma_vowelsn_I;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_I_3]  = Padma::Padma_vowelsn_I;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_I_4]  = Padma::Padma_vowelsn_I;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_I_candrabindu_1]   = Padma::Padma_vowelsn_I . Padma::Padma_candrabindu;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_I_candrabindu_2]   = Padma::Padma_vowelsn_I . Padma::Padma_candrabindu;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_I_candrabindu_3]   = Padma::Padma_vowelsn_I . Padma::Padma_candrabindu;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_I_candrabindu_4]   = Padma::Padma_vowelsn_I . Padma::Padma_candrabindu;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_R_II_1] = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_R_II_2] = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_II_1] = Padma::Padma_vowelsn_II;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_II_2] = Padma::Padma_vowelsn_II;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_U_3]  = Padma::Padma_vowelsn_U;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_U_4]  = Padma::Padma_vowelsn_U;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_U_5]  = Padma::Padma_vowelsn_U;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_U_6]  = Padma::Padma_vowelsn_U;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_UU_4] = Padma::Padma_vowelsn_UU;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_UU_5] = Padma::Padma_vowelsn_UU;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_UU_6] = Padma::Padma_vowelsn_UU;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_UU_7] = Padma::Padma_vowelsn_UU;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_R_1]  = Padma::Padma_vowelsn_R;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_R_2]  = Padma::Padma_vowelsn_R;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_R_3]  = Padma::Padma_vowelsn_R;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_R_4]  = Padma::Padma_vowelsn_R;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_R_5]  = Padma::Padma_vowelsn_R;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_R_6]  = Padma::Padma_vowelsn_R;
//$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_RR]   = Padma::Padma_vowelsn_RR;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_E_1] = Padma::Padma_vowelsn_E;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_E_2] = Padma::Padma_vowelsn_E;
//$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AI]   = Padma::Padma_vowelsn_AI;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AI_1]   = Padma::Padma_vowelsn_AI;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AI_2]   = Padma::Padma_vowelsn_AI;
//$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AU]   = Padma::Padma_vowelsn_AU;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AULEN_1]   = Padma::Padma_vowelsn_AULEN;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AULEN_2]   = Padma::Padma_vowelsn_AULEN;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AULEN_candrabindu_1]   = Padma::Padma_vowelsn_AULEN . Padma::Padma_candrabindu;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AULEN_candrabindu_2]   = Padma::Padma_vowelsn_AULEN . Padma::Padma_candrabindu;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vowelsn_AULEN_candrabindu_3]   = Padma::Padma_vowelsn_AULEN . Padma::Padma_candrabindu;

// Halffm
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_halffm_RA_1]   = Padma::Padma_halffm_RA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_halffm_RA_2]   = Padma::Padma_halffm_RA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_halffm_RA_3]   = Padma::Padma_halffm_RA;

//Conjuncts
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_NN_NN]  = Padma::Padma_consnt_NNA . Padma::Padma_vattu_NNA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_KK]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_KR]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_KL]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_LA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_GR]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
//$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_JNY]  = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_GM]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_MA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_GDH]    = Padma::Padma_consnt_GA . Padma::Padma_vattu_DHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_GN]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_NA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_GL]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_LA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_NGK]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_NGG]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_CC]     = Padma::Padma_consnt_CA . Padma::Padma_vattu_CA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_CCH]    = Padma::Padma_consnt_CA . Padma::Padma_vattu_CHA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_JJ]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_NNTT]   = Padma::Padma_consnt_NNA . Padma::Padma_vattu_TTA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_DDDD]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_NNDD]   = Padma::Padma_consnt_NNA . Padma::Padma_vattu_DDA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_TM]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_MA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_TR]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_vattu_YA]      = Padma::Padma_vattu_YA;

//Digits
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_ONE]     = Padma::Padma_digit_ONE;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_TWO]     = Padma::Padma_digit_TWO;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_THREE]   = Padma::Padma_digit_THREE;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_SIX]     = Padma::Padma_digit_SIX;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_digit_NINE]    = Padma::Padma_digit_NINE;

$Aabpbengali_toPadma[Aabpbengali::Aabpbengali_misc_DANDA]     = Padma::Padma_danda;

$Aabpbengali_prefixList = array();
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_I_1]  = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_I_2]  = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_I_3]  = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_I_4]  = true;
//$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_R_II_1] = true;
//$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_R_II_2] = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_E_1] = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_E_2] = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_AI_1] = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_AI_2] = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_I_candrabindu_1] = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_I_candrabindu_2] = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_I_candrabindu_3] = true;
$Aabpbengali_prefixList[Aabpbengali::Aabpbengali_vowelsn_I_candrabindu_4] = true;

$Aabpbengali_suffixList = array();
$Aabpbengali_suffixList[Aabpbengali::Aabpbengali_halffm_RA_1]  = true;
$Aabpbengali_suffixList[Aabpbengali::Aabpbengali_halffm_RA_2]  = true;
$Aabpbengali_suffixList[Aabpbengali::Aabpbengali_halffm_RA_3]  = true;

$Aabpbengali_redundantList = array();
$Aabpbengali_redundantList[Aabpbengali::Aabpbengali_misc_UNKNOWN_1] = true;
$Aabpbengali_redundantList[Aabpbengali::Aabpbengali_misc_UNKNOWN_2] = true;
$Aabpbengali_redundantList[Aabpbengali::Aabpbengali_misc_UNKNOWN_3] = true;
$Aabpbengali_redundantList[Aabpbengali::Aabpbengali_misc_UNKNOWN_4] = true;

$Aabpbengali_overloadList = array();

function Aabpbengali_initialize()
{
    global $fontinfo;

    $fontinfo["aabpbengali"]["language"] = "Bengali";
    $fontinfo["aabpbengali"]["class"] = "Aabpbengali";
}
?>
