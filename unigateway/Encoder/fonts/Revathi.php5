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

//Revathi Malayalam
class Revathi
{
function Revathi()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "MLW-TTRevathi";
var $displayName  = "Revathi";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup($str) 
{
   global $Revathi_toPadma; 
   return $Revathi_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Revathi_prefixList;
    return $Revathi_prefixList[$str] != null;
}

function isOverloaded($str)
{
     global $Revathi_overloadList;
     return $Revathi_overloadList[$str] != null;
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
    global $Revathi_redundantList;
    return $Revathi_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const Revathi_visarga        = "\x78";
const Revathi_anusvara       = "\x77";
const Revathi_virama         = "\x76"; //Chandrakkala

//Vowels
const Revathi_vowel_A        = "\x41";
const Revathi_vowel_AA       = "\x42";
const Revathi_vowel_I        = "\x43";
const Revathi_vowel_II       = "\x43\x75";
const Revathi_vowel_U        = "\x44";
const Revathi_vowel_UU       = "\x44\x75";
const Revathi_vowel_R        = "\x45";
const Revathi_vowel_RR       = "\x45\x75";
const Revathi_vowel_E        = "\x46";
const Revathi_vowel_EE       = "\x47";               
const Revathi_vowel_AI       = "\x73\x46";
const Revathi_vowel_O        = "\x48";
const Revathi_vowel_OO       = "\x48\x6D";
const Revathi_vowel_AU       = "\x48\x75";

//Consonants
const Revathi_consnt_KA      = "\x49";
const Revathi_consnt_KHA     = "\x4A";
const Revathi_consnt_GA      = "\x4B";
const Revathi_consnt_GHA     = "\x4C";
const Revathi_consnt_NGA     = "\x4D";

const Revathi_consnt_CA      = "\x4E";
const Revathi_consnt_CHA     = "\x4F";
const Revathi_consnt_JA      = "\x50";
const Revathi_consnt_JHA     = "\x51";
const Revathi_consnt_NYA     = "\x52";

const Revathi_consnt_TTA     = "\x53";
const Revathi_consnt_TTHA    = "\x54";
const Revathi_consnt_DDA     = "\x55";
const Revathi_consnt_DDHA    = "\x56";
const Revathi_consnt_NNA     = "\x57";

const Revathi_consnt_TA      = "\x58";
const Revathi_consnt_THA     = "\x59";
const Revathi_consnt_DA      = "\x5A";
const Revathi_consnt_DHA     = "\x5B";
const Revathi_consnt_NA      = "\x5C";

const Revathi_consnt_PA      = "\x5D";
const Revathi_consnt_PHA     = "\x5E";
const Revathi_consnt_BA      = "\x5F";
const Revathi_consnt_BHA     = "\x60";
const Revathi_consnt_MA      = "\x61";

const Revathi_consnt_YA      = "\x62";
const Revathi_consnt_RA      = "\x63";
const Revathi_consnt_LA      = "\x65";
const Revathi_consnt_VA      = "\x68";
const Revathi_consnt_SHA     = "\x69";
const Revathi_consnt_SSA     = "\x6A";
const Revathi_consnt_SA      = "\x6B";

const Revathi_consnt_HA      = "\x6C";
const Revathi_consnt_LLA     = "\x66";
const Revathi_consnt_ZHA     = "\x67";
const Revathi_consnt_RRA     = "\x64";

//Gunintamulu
const Revathi_vowelsn_AA     = "\x6D";
const Revathi_vowelsn_I      = "\x6E";
const Revathi_vowelsn_II     = "\x6F";
const Revathi_vowelsn_U      = "\x70";
const Revathi_vowelsn_UU     = "\x71";
const Revathi_vowelsn_R      = "\x72";
const Revathi_vowelsn_RR     = "\x72\x75";
const Revathi_vowelsn_E      = "\x73";
const Revathi_vowelsn_EE     = "\x74";
const Revathi_vowelsn_AI     = "\x73\x73";
//vowelsigns o and O have two separate glyphs, one on left and one on right_
const Revathi_vowelsn_AU     = "\x75";

//Chillu (5)
const Revathi_chillu_ENN     = "\xC2\xAC";
const Revathi_chillu_IN      = "\xC2\xB3";
const Revathi_chillu_IR      = "\xC3\x80";
const Revathi_chillu_IL      = "\xC3\xB0";
const Revathi_chillu_ILL     = "\xC3\x84";

//vattulu (consonant signs)
const Revathi_vattu_YA       = "\x79";
const Revathi_vattu_RA       = "\x7B";
const Revathi_vattu_VA       = "\x7A";

//kooTTaksharangngaL
const Revathi_conj_KK        = "\xC2\xA1";
const Revathi_conj_KTT       = "\xC3\x8E";
const Revathi_conj_KT        = "\xC3\xA0";
const Revathi_conj_KLL       = "\xC2\xA2";
const Revathi_conj_KSH       = "\xC2\xA3";
const Revathi_conj_GG        = "\xC2\xA4";
const Revathi_conj_GN        = "\xC3\xA1";
const Revathi_conj_GM        = "\xC3\x9C";
const Revathi_conj_GLL       = "\xC2\xA5";
const Revathi_conj_NGK       = "\xC2\xA6";  
const Revathi_conj_NGNG      = "\xC2\xA7";

const Revathi_conj_CC        = "\xC2\xA8";
const Revathi_conj_CCH       = "\xC3\x91";
const Revathi_conj_JJ        = "\xC3\x96";
const Revathi_conj_JNY       = "\xC3\x9A";
const Revathi_conj_NYC       = "\xC3\xB4";
const Revathi_conj_NYNY      = "\xC2\xAA";

const Revathi_conj_TTTT      = "\xC2\xAB";
const Revathi_conj_DDDD      = "\xC3\x8D";
const Revathi_conj_NNTT      = "\xC3\xAF";
const Revathi_conj_NNDD      = "\xC3\x9E";
const Revathi_conj_NNNN      = "\xC2\xAE";
const Revathi_conj_NNM       = "\xC3\x97";

const Revathi_conj_T_T       = "\xC2\xAF";
const Revathi_conj_T_TH      = "\xC2\xB0";
const Revathi_conj_TBH       = "\xC3\x9B";
const Revathi_conj_TM        = "\xC3\x9F";
const Revathi_conj_TS        = "\xC3\x95";
const Revathi_conj_DD        = "\xC2\xB1";
const Revathi_conj_D_DH      = "\xC2\xB2";
const Revathi_conj_NT        = "\xC2\xB4";
const Revathi_conj_NTH       = "\xC3\x99";
const Revathi_conj_ND        = "\xC2\xB5";
const Revathi_conj_NDH       = "\xC3\x94";
const Revathi_conj_N_N       = "\xC3\xB3";
const Revathi_conj_NM        = "\xC3\xB2";
const Revathi_conj_NRR_1     = "\xC3\xA2"; 
const Revathi_conj_NRR_2     = "\xC2\xB3\x64"; 
const Revathi_conj_NAU       = "\xC3\xA5"; //npollu for me, nau for paul

const Revathi_conj_PP        = "\xC2\xB8";
const Revathi_conj_PLL       = "\xC2\xB9";
const Revathi_conj_BDH       = "\xC3\x8F";
const Revathi_conj_BD        = "\xC3\x90";
const Revathi_conj_BB        = "\xC2\xBA";
const Revathi_conj_BLL       = "\xC2\xBB";
const Revathi_conj_MP        = "\xC2\xBC";
const Revathi_conj_MM        = "\xC2\xBD";
const Revathi_conj_MLL       = "\xC2\xBE";

const Revathi_conj_YY        = "\xC2\xBF";
const Revathi_conj_L_L       = "\xC3\xB1";
const Revathi_conj_VV        = "\xC3\x86";

const Revathi_conj_SHC       = "\xC3\x9D";
const Revathi_conj_SHLL      = "\xC3\x87";
const Revathi_conj_SHSH      = "\xC3\x88";
const Revathi_conj_SSTT      = "\xC3\xA3";
const Revathi_conj_SLL       = "\xC3\x89";
const Revathi_conj_S_S       = "\xC3\x8A";
const Revathi_conj_STH       = "\xC3\x98";
const Revathi_conj_SRR       = "\xC3\x8C";

const Revathi_conj_HN        = "\xC3\x93";
const Revathi_conj_HM        = "\xC3\x92";
const Revathi_conj_HLL       = "\xC3\x8B";
const Revathi_conj_LLLL      = "\xC3\x85";

const Revathi_conj_RRRR_1    = "\xC3\x81"; //ta as in steel
const Revathi_conj_RRRR_2    = "\xC3\xA4"; //ta as in steel

//Digits
const Revathi_digit_ZERO     = "\x30";
const Revathi_digit_ONE      = "\x31";
const Revathi_digit_TWO      = "\x32";
const Revathi_digit_THREE    = "\x33";
const Revathi_digit_FOUR     = "\x34";
const Revathi_digit_FIVE     = "\x35";
const Revathi_digit_SIX      = "\x36";
const Revathi_digit_SEVEN    = "\x37";
const Revathi_digit_EIGHT    = "\x38";
const Revathi_digit_NINE     = "\x39";

//Matches ASCII
const Revathi_EXCLAM         = "\x21";
const Revathi_PERCENT        = "\x25";
const Revathi_AMPERSAND      = "\x26";
const Revathi_QTSINGLE       = "\x27";
const Revathi_PARENLEFT      = "\x28";
const Revathi_PARENRIGT      = "\x29";
const Revathi_ASTERISK       = "\x2A";
const Revathi_PLUS           = "\x2B";
const Revathi_COMMA          = "\x2C";
const Revathi_PERIOD         = "\x2E";
const Revathi_SLASH          = "\x2F";
const Revathi_COLON          = "\x3A";
const Revathi_SEMICOLON      = "\x3B";
const Revathi_LESSTHAN       = "\x3C";
const Revathi_EQUALS         = "\x3D";
const Revathi_GREATERTHAN    = "\x3E";
const Revathi_QUESTION       = "\x3F";
const Revathi_ATSIGN         = "\x40";

//Does not match ASCII
const Revathi_extra_QTSINGLE = "\x22";
const Revathi_extra_DBLQT    = "\x22\x22";
const Revathi_extra_PERIOD_1 = "\x24";
const Revathi_extra_PERIOD_2 = "\xC2\xB7";
const Revathi_extra_HYPHEN_1 = "\xC2\xAD";
const Revathi_extra_HYPHEN_2 = "\xC3\xBE";

//Dont need
const Revathi_misc_UNKNOWN_1  = "\x2D";

}

$Revathi_toPadma = array();
$Revathi_toPadma[Revathi::Revathi_anusvara] = Padma::Padma_anusvara;
$Revathi_toPadma[Revathi::Revathi_visarga]  = Padma::Padma_visarga;
$Revathi_toPadma[Revathi::Revathi_virama]   = Padma::Padma_chandrakkala;

$Revathi_toPadma[Revathi::Revathi_vowel_A]  = Padma::Padma_vowel_A;
$Revathi_toPadma[Revathi::Revathi_vowel_AA] = Padma::Padma_vowel_AA;
$Revathi_toPadma[Revathi::Revathi_vowel_I]  = Padma::Padma_vowel_I;
$Revathi_toPadma[Revathi::Revathi_vowel_II] = Padma::Padma_vowel_II;
$Revathi_toPadma[Revathi::Revathi_vowel_U]  = Padma::Padma_vowel_U;
$Revathi_toPadma[Revathi::Revathi_vowel_UU] = Padma::Padma_vowel_UU;
$Revathi_toPadma[Revathi::Revathi_vowel_R]  = Padma::Padma_vowel_R;
$Revathi_toPadma[Revathi::Revathi_vowel_RR] = Padma::Padma_vowel_RR;
$Revathi_toPadma[Revathi::Revathi_vowel_E]  = Padma::Padma_vowel_E;
$Revathi_toPadma[Revathi::Revathi_vowel_EE] = Padma::Padma_vowel_EE;
$Revathi_toPadma[Revathi::Revathi_vowel_AI] = Padma::Padma_vowel_AI;
$Revathi_toPadma[Revathi::Revathi_vowel_O]  = Padma::Padma_vowel_O;
$Revathi_toPadma[Revathi::Revathi_vowel_OO] = Padma::Padma_vowel_OO;
$Revathi_toPadma[Revathi::Revathi_vowel_AU] = Padma::Padma_vowel_AU;

$Revathi_toPadma[Revathi::Revathi_consnt_KA]  = Padma::Padma_consnt_KA;
$Revathi_toPadma[Revathi::Revathi_consnt_KHA] = Padma::Padma_consnt_KHA;
$Revathi_toPadma[Revathi::Revathi_consnt_GA]  = Padma::Padma_consnt_GA;
$Revathi_toPadma[Revathi::Revathi_consnt_GHA] = Padma::Padma_consnt_GHA;
$Revathi_toPadma[Revathi::Revathi_consnt_NGA] = Padma::Padma_consnt_NGA;

$Revathi_toPadma[Revathi::Revathi_consnt_CA]  = Padma::Padma_consnt_CA;
$Revathi_toPadma[Revathi::Revathi_consnt_CHA] = Padma::Padma_consnt_CHA;
$Revathi_toPadma[Revathi::Revathi_consnt_JA]  = Padma::Padma_consnt_JA;
$Revathi_toPadma[Revathi::Revathi_consnt_JHA] = Padma::Padma_consnt_JHA;
$Revathi_toPadma[Revathi::Revathi_consnt_NYA] = Padma::Padma_consnt_NYA;

$Revathi_toPadma[Revathi::Revathi_consnt_TTA]  = Padma::Padma_consnt_TTA;
$Revathi_toPadma[Revathi::Revathi_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Revathi_toPadma[Revathi::Revathi_consnt_DDA]  = Padma::Padma_consnt_DDA;
$Revathi_toPadma[Revathi::Revathi_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Revathi_toPadma[Revathi::Revathi_consnt_NNA]  = Padma::Padma_consnt_NNA;

$Revathi_toPadma[Revathi::Revathi_consnt_TA]  = Padma::Padma_consnt_TA;
$Revathi_toPadma[Revathi::Revathi_consnt_THA] = Padma::Padma_consnt_THA;
$Revathi_toPadma[Revathi::Revathi_consnt_DA]  = Padma::Padma_consnt_DA;
$Revathi_toPadma[Revathi::Revathi_consnt_DHA] = Padma::Padma_consnt_DHA;
$Revathi_toPadma[Revathi::Revathi_consnt_NA]  = Padma::Padma_consnt_NA;

$Revathi_toPadma[Revathi::Revathi_consnt_PA]  = Padma::Padma_consnt_PA;
$Revathi_toPadma[Revathi::Revathi_consnt_PHA] = Padma::Padma_consnt_PHA;
$Revathi_toPadma[Revathi::Revathi_consnt_BA]  = Padma::Padma_consnt_BA;
$Revathi_toPadma[Revathi::Revathi_consnt_BHA] = Padma::Padma_consnt_BHA;
$Revathi_toPadma[Revathi::Revathi_consnt_MA]  = Padma::Padma_consnt_MA;

$Revathi_toPadma[Revathi::Revathi_consnt_YA]  = Padma::Padma_consnt_YA;
$Revathi_toPadma[Revathi::Revathi_consnt_RA]  = Padma::Padma_consnt_RA;
$Revathi_toPadma[Revathi::Revathi_consnt_LA]  = Padma::Padma_consnt_LA;
$Revathi_toPadma[Revathi::Revathi_consnt_VA]  = Padma::Padma_consnt_VA;
$Revathi_toPadma[Revathi::Revathi_consnt_SHA] = Padma::Padma_consnt_SHA;
$Revathi_toPadma[Revathi::Revathi_consnt_SSA] = Padma::Padma_consnt_SSA;
$Revathi_toPadma[Revathi::Revathi_consnt_SA]  = Padma::Padma_consnt_SA;

$Revathi_toPadma[Revathi::Revathi_consnt_HA] = Padma::Padma_consnt_HA;
$Revathi_toPadma[Revathi::Revathi_consnt_LLA] = Padma::Padma_consnt_LLA;
$Revathi_toPadma[Revathi::Revathi_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Revathi_toPadma[Revathi::Revathi_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$Revathi_toPadma[Revathi::Revathi_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Revathi_toPadma[Revathi::Revathi_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Revathi_toPadma[Revathi::Revathi_vowelsn_II] = Padma::Padma_vowelsn_II;
$Revathi_toPadma[Revathi::Revathi_vowelsn_U]  = Padma::Padma_vowelsn_U;
$Revathi_toPadma[Revathi::Revathi_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Revathi_toPadma[Revathi::Revathi_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Revathi_toPadma[Revathi::Revathi_vowelsn_E]  = Padma::Padma_vowelsn_E;
$Revathi_toPadma[Revathi::Revathi_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Revathi_toPadma[Revathi::Revathi_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Revathi_toPadma[Revathi::Revathi_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Chillu
$Revathi_toPadma[Revathi::Revathi_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$Revathi_toPadma[Revathi::Revathi_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$Revathi_toPadma[Revathi::Revathi_chillu_IR]  = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Revathi_toPadma[Revathi::Revathi_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$Revathi_toPadma[Revathi::Revathi_chillu_ILL] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//vattulu
$Revathi_toPadma[Revathi::Revathi_vattu_YA]  = Padma::Padma_vattu_YA;
$Revathi_toPadma[Revathi::Revathi_vattu_RA]  = Padma::Padma_vattu_RA;
$Revathi_toPadma[Revathi::Revathi_vattu_VA]  = Padma::Padma_vattu_VA;

//kooTTaksharangngaL
$Revathi_toPadma[Revathi::Revathi_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$Revathi_toPadma[Revathi::Revathi_conj_KTT]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TTA;
$Revathi_toPadma[Revathi::Revathi_conj_KT]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TA;
$Revathi_toPadma[Revathi::Revathi_conj_KLL]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_LLA;
$Revathi_toPadma[Revathi::Revathi_conj_KSH]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_SSA;
$Revathi_toPadma[Revathi::Revathi_conj_GG]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_GA;
$Revathi_toPadma[Revathi::Revathi_conj_GN]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_NA;
$Revathi_toPadma[Revathi::Revathi_conj_GM]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_MA;
$Revathi_toPadma[Revathi::Revathi_conj_GLL]  = Padma::Padma_consnt_GA .  Padma::Padma_vattu_LLA;
$Revathi_toPadma[Revathi::Revathi_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;
$Revathi_toPadma[Revathi::Revathi_conj_NGNG] = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_NGA;

$Revathi_toPadma[Revathi::Revathi_conj_CC]   = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$Revathi_toPadma[Revathi::Revathi_conj_CCH]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CHA;
$Revathi_toPadma[Revathi::Revathi_conj_JJ]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;
$Revathi_toPadma[Revathi::Revathi_conj_JNY]  = Padma::Padma_consnt_JA .  Padma::Padma_vattu_NYA;
$Revathi_toPadma[Revathi::Revathi_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$Revathi_toPadma[Revathi::Revathi_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;

$Revathi_toPadma[Revathi::Revathi_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$Revathi_toPadma[Revathi::Revathi_conj_DDDD] = Padma::Padma_consnt_DDA .  Padma::Padma_vattu_DDA;
$Revathi_toPadma[Revathi::Revathi_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$Revathi_toPadma[Revathi::Revathi_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;
$Revathi_toPadma[Revathi::Revathi_conj_NNNN] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_NNA;
$Revathi_toPadma[Revathi::Revathi_conj_NNM]  = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_MA;

$Revathi_toPadma[Revathi::Revathi_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$Revathi_toPadma[Revathi::Revathi_conj_T_TH] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_THA;
$Revathi_toPadma[Revathi::Revathi_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$Revathi_toPadma[Revathi::Revathi_conj_TM]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_MA;
$Revathi_toPadma[Revathi::Revathi_conj_TS]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_SA;
$Revathi_toPadma[Revathi::Revathi_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$Revathi_toPadma[Revathi::Revathi_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$Revathi_toPadma[Revathi::Revathi_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$Revathi_toPadma[Revathi::Revathi_conj_NTH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_THA;
$Revathi_toPadma[Revathi::Revathi_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$Revathi_toPadma[Revathi::Revathi_conj_NDH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DHA;
$Revathi_toPadma[Revathi::Revathi_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$Revathi_toPadma[Revathi::Revathi_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$Revathi_toPadma[Revathi::Revathi_conj_NRR_1] = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$Revathi_toPadma[Revathi::Revathi_conj_NRR_2] = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$Revathi_toPadma[Revathi::Revathi_conj_NAU]  = Padma::Padma_consnt_NA .  Padma::Padma_chandrakkala;

$Revathi_toPadma[Revathi::Revathi_conj_PP]  = Padma::Padma_consnt_PA .  Padma::Padma_vattu_PA;
$Revathi_toPadma[Revathi::Revathi_conj_PLL] = Padma::Padma_consnt_PA .  Padma::Padma_vattu_LLA;
$Revathi_toPadma[Revathi::Revathi_conj_BDH] = Padma::Padma_consnt_BA .  Padma::Padma_vattu_DHA;
$Revathi_toPadma[Revathi::Revathi_conj_BD]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_DA;
$Revathi_toPadma[Revathi::Revathi_conj_BB]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$Revathi_toPadma[Revathi::Revathi_conj_BLL] = Padma::Padma_consnt_BA .  Padma::Padma_vattu_LLA;
$Revathi_toPadma[Revathi::Revathi_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$Revathi_toPadma[Revathi::Revathi_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;
$Revathi_toPadma[Revathi::Revathi_conj_MLL] = Padma::Padma_consnt_MA .  Padma::Padma_vattu_LLA;

$Revathi_toPadma[Revathi::Revathi_conj_YY]  = Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$Revathi_toPadma[Revathi::Revathi_conj_L_L] = Padma::Padma_consnt_LA .  Padma::Padma_vattu_LA;
$Revathi_toPadma[Revathi::Revathi_conj_VV]  = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;

$Revathi_toPadma[Revathi::Revathi_conj_SHC]  = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_CA;
$Revathi_toPadma[Revathi::Revathi_conj_SHLL] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_LLA;
$Revathi_toPadma[Revathi::Revathi_conj_SHSH] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_SHA;
$Revathi_toPadma[Revathi::Revathi_conj_SSTT] = Padma::Padma_consnt_SSA .  Padma::Padma_vattu_TTA;
$Revathi_toPadma[Revathi::Revathi_conj_SLL]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_LLA;
$Revathi_toPadma[Revathi::Revathi_conj_S_S]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_SA;
$Revathi_toPadma[Revathi::Revathi_conj_STH]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_THA;
$Revathi_toPadma[Revathi::Revathi_conj_SRR]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_RRA;

$Revathi_toPadma[Revathi::Revathi_conj_HN]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_NA;
$Revathi_toPadma[Revathi::Revathi_conj_HM]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_MA;
$Revathi_toPadma[Revathi::Revathi_conj_HLL]  = Padma::Padma_consnt_HA .  Padma::Padma_vattu_LLA;
$Revathi_toPadma[Revathi::Revathi_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;

$Revathi_toPadma[Revathi::Revathi_conj_RRRR_1] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;
$Revathi_toPadma[Revathi::Revathi_conj_RRRR_2] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;

//Miscellaneous(where it doesn't match ASCII representation)
$Revathi_toPadma[Revathi::Revathi_extra_QTSINGLE] = "'";
$Revathi_toPadma[Revathi::Revathi_extra_DBLQT]    = '"';
$Revathi_toPadma[Revathi::Revathi_extra_PERIOD_1] = '.';
$Revathi_toPadma[Revathi::Revathi_extra_PERIOD_2] = '.';
$Revathi_toPadma[Revathi::Revathi_extra_HYPHEN_1] = '-';
$Revathi_toPadma[Revathi::Revathi_extra_HYPHEN_2] = '-';

$Revathi_redundantList = array();
$Revathi_redundantList[Revathi::Revathi_misc_UNKNOWN_1] = true;

$Revathi_prefixList = array();
$Revathi_prefixList[Revathi::Revathi_vattu_RA]   = true;
$Revathi_prefixList[Revathi::Revathi_vowelsn_E]  = true;
$Revathi_prefixList[Revathi::Revathi_vowelsn_EE] = true;
$Revathi_prefixList[Revathi::Revathi_vowelsn_AI] = true;

$Revathi_overloadList = array();
$Revathi_overloadList[Revathi::Revathi_vowel_I]        = true;
$Revathi_overloadList[Revathi::Revathi_vowel_U]        = true;
$Revathi_overloadList[Revathi::Revathi_vowel_R]        = true;
$Revathi_overloadList[Revathi::Revathi_vowel_O]        = true;
$Revathi_overloadList[Revathi::Revathi_vowelsn_R]      = true;
$Revathi_overloadList[Revathi::Revathi_vowelsn_E]      = true;
$Revathi_overloadList[Revathi::Revathi_chillu_IN]      = true;
$Revathi_overloadList[Revathi::Revathi_extra_QTSINGLE] = true;


function Revathi_initialize()
{
    global $fontinfo;

    $fontinfo["mlw-ttrevathi"]["language"] = "Malayalam";
    $fontinfo["mlw-ttrevathi"]["class"] = "Revathi";
}
?>
