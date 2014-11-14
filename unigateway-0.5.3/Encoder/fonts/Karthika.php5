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

//Karthika Malayalam
class Karthika
{

function Karthika()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "ML-TTKarthika";
var $displayName  = "Karthika";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup($str) 
{
   global $Karthika_toPadma; 
   return $Karthika_toPadma[$str];
}

function isPrefixSymbol($str)
{
   global $Karthika_prefixList; 
   return $Karthika_prefixList[$str] != null;
}

function isOverloaded($str)
{
    global $Karthika_overloadList;
    return $Karthika_overloadList[$str] != null;
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
   global $Karthika_redundantList; 
   return $Karthika_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const Karthika_visarga        = "\x78";
const Karthika_anusvara       = "\x77";
const Karthika_virama         = "\x76"; //Chandrakkala

//Vowels
const Karthika_vowel_A        = "\x41";
const Karthika_vowel_AA       = "\x42";
const Karthika_vowel_I        = "\x43";
const Karthika_vowel_II       = "\x43\x75";
const Karthika_vowel_U        = "\x44";
const Karthika_vowel_UU       = "\x44\x75";
const Karthika_vowel_R        = "\x45";
const Karthika_vowel_RR       = "\x45\x75";
const Karthika_vowel_E        = "\x46";
const Karthika_vowel_EE       = "\x47";               
const Karthika_vowel_AI       = "\x73\x46";
const Karthika_vowel_O        = "\x48";
const Karthika_vowel_OO       = "\x48\x6D";
const Karthika_vowel_AU       = "\x48\x75";

//Consonants
const Karthika_consnt_KA      = "\x49";
const Karthika_consnt_KHA     = "\x4A";
const Karthika_consnt_GA      = "\x4B";
const Karthika_consnt_GHA     = "\x4C";
const Karthika_consnt_NGA     = "\x4D";

const Karthika_consnt_CA      = "\x4E";
const Karthika_consnt_CHA     = "\x4F";
const Karthika_consnt_JA      = "\x50";
const Karthika_consnt_JHA     = "\x51";
const Karthika_consnt_NYA     = "\x52";

const Karthika_consnt_TTA     = "\x53";
const Karthika_consnt_TTHA    = "\x54";
const Karthika_consnt_DDA     = "\x55";
const Karthika_consnt_DDHA    = "\x56";
const Karthika_consnt_NNA     = "\x57";

const Karthika_consnt_TA      = "\x58";
const Karthika_consnt_THA     = "\x59";
const Karthika_consnt_DA      = "\x5A";
const Karthika_consnt_DHA     = "\x5B";
const Karthika_consnt_NA      = "\x5C";

const Karthika_consnt_PA      = "\x5D";
const Karthika_consnt_PHA     = "\x5E";
const Karthika_consnt_BA      = "\x5F";
const Karthika_consnt_BHA     = "\x60";
const Karthika_consnt_MA      = "\x61";

const Karthika_consnt_YA      = "\x62";
const Karthika_consnt_RA      = "\x63";
const Karthika_consnt_LA      = "\x65";
const Karthika_consnt_VA      = "\x68";
const Karthika_consnt_SHA     = "\x69";
const Karthika_consnt_SSA     = "\x6A";
const Karthika_consnt_SA      = "\x6B";

const Karthika_consnt_HA      = "\x6C";
const Karthika_consnt_LLA     = "\x66";
const Karthika_consnt_ZHA     = "\x67";
const Karthika_consnt_RRA     = "\x64";

//Gunintamulu
const Karthika_vowelsn_AA     = "\x6D";
const Karthika_vowelsn_I      = "\x6E";
const Karthika_vowelsn_II     = "\x6F";
const Karthika_vowelsn_U      = "\x70";
const Karthika_vowelsn_UU     = "\x71";
const Karthika_vowelsn_R      = "\x72";
const Karthika_vowelsn_RR     = "\x72\x75";
const Karthika_vowelsn_E      = "\x73";
const Karthika_vowelsn_EE     = "\x74";
const Karthika_vowelsn_AI     = "\x73\x73";
//vowelsigns o and O have two separate glyphs, one on left and one on right_
const Karthika_vowelsn_AU     = "\x75";

//Chillu (5)
const Karthika_chillu_ENN     = "\xC2\xAC";
const Karthika_chillu_IN      = "\xC2\xB3";
const Karthika_chillu_IR      = "\xC3\x80";
const Karthika_chillu_IL      = "\xC3\x82";
const Karthika_chillu_ILL     = "\xC3\x84";

//vattulu (consonant signs)
const Karthika_vattu_YA       = "\x79";
const Karthika_vattu_RA       = "\x7B";
const Karthika_vattu_VA       = "\x7A";

//kooTTaksharangngaL
const Karthika_conj_KK        = "\xC2\xA1";
const Karthika_conj_KTT       = "\xC3\x8E";
const Karthika_conj_KT        = "\xC3\xA0";
const Karthika_conj_KLL       = "\xC2\xA2";
const Karthika_conj_KSH       = "\xC2\xA3";
const Karthika_conj_GG        = "\xC2\xA4";
const Karthika_conj_GN        = "\xC3\xA1";
const Karthika_conj_GM        = "\xC3\x9C";
const Karthika_conj_GLL       = "\xC2\xA5";
const Karthika_conj_NGK       = "\xC2\xA6";  
const Karthika_conj_NGNG      = "\xC2\xA7";

const Karthika_conj_CC        = "\xC2\xA8";
const Karthika_conj_CCH       = "\xC3\x91";
const Karthika_conj_JJ        = "\xC3\x96";
const Karthika_conj_JNY       = "\xC3\x9A";
const Karthika_conj_NYC       = "\xC2\xA9";
const Karthika_conj_NYNY      = "\xC2\xAA";

const Karthika_conj_TTTT      = "\xC2\xAB";
const Karthika_conj_DDDD      = "\xC3\x8D";
const Karthika_conj_NNTT      = "\xC2\xAD";
const Karthika_conj_NNDD      = "\xC3\x9E";
const Karthika_conj_NNNN      = "\xC2\xAE";
const Karthika_conj_NNM       = "\xC3\x97";

const Karthika_conj_T_T       = "\xC2\xAF";
const Karthika_conj_T_TH      = "\xC2\xB0";
const Karthika_conj_TBH       = "\xC3\x9B";
const Karthika_conj_TM        = "\xC3\x9F";
const Karthika_conj_TS        = "\xC3\x95";
const Karthika_conj_DD        = "\xC2\xB1";
const Karthika_conj_D_DH      = "\xC2\xB2";
const Karthika_conj_NT        = "\xC2\xB4";
const Karthika_conj_NTH       = "\xC3\x99";
const Karthika_conj_ND        = "\xC2\xB5";
const Karthika_conj_NDH       = "\xC3\x94";
const Karthika_conj_N_N       = "\xC2\xB6";
const Karthika_conj_NM        = "\xC2\xB7";
const Karthika_conj_NRR_1     = "\xC3\xA2"; 
const Karthika_conj_NRR_2     = "\xC2\xB3\x64"; 
const Karthika_conj_NAU       = "\xC3\xAE"; //npollu for me, nau for paul

const Karthika_conj_PP        = "\xC2\xB8";
const Karthika_conj_PLL       = "\xC2\xB9";
const Karthika_conj_BDH       = "\xC3\x8F";
const Karthika_conj_BD        = "\xC3\x90";
const Karthika_conj_BB        = "\xC2\xBA";
const Karthika_conj_BLL       = "\xC2\xBB";
const Karthika_conj_MP        = "\xC2\xBC";
const Karthika_conj_MM        = "\xC2\xBD";
const Karthika_conj_MLL       = "\xC2\xBE";

const Karthika_conj_YY        = "\xC2\xBF";
const Karthika_conj_YKK       = "\xC3\xAD";
const Karthika_conj_L_L       = "\xC3\x83";
const Karthika_conj_LP        = "\xC3\xA5";
const Karthika_conj_VV        = "\xC3\x86";

const Karthika_conj_SHC       = "\xC3\x9D";
const Karthika_conj_SHLL      = "\xC3\x87";
const Karthika_conj_SHSH      = "\xC3\x88";
const Karthika_conj_SSTT      = "\xC3\xA3";
const Karthika_conj_SLL       = "\xC3\x89";
const Karthika_conj_S_S       = "\xC3\x8A";
const Karthika_conj_STH       = "\xC3\x98";
const Karthika_conj_SRR_RR    = "\xC3\x8C";

const Karthika_conj_HN        = "\xC3\x93";
const Karthika_conj_HM        = "\xC3\x92";
const Karthika_conj_HLL       = "\xC3\x8B";
const Karthika_conj_LLLL      = "\xC3\x85";

const Karthika_conj_RRRR_1    = "\xC3\x81"; //ta as in steel
const Karthika_conj_RRRR_2    = "\xC3\xA4"; //ta as in steel

//Consonat(s) + vowel combinations
const Karthika_combo_KU       = "\xC3\xA6";
const Karthika_combo_KKU      = "\xC3\xA7";
const Karthika_combo_NGKU     = "\xC3\xA8";
const Karthika_combo_NN_U     = "\xC3\xA9";
const Karthika_combo_NU       = "\xC3\xAB";
const Karthika_combo_N_N_U    = "\xC3\xAC"; //nnu
const Karthika_combo_RU       = "\xC3\xAA";

//Digits
const Karthika_digit_ZERO     = "\x30";
const Karthika_digit_ONE      = "\x31";
const Karthika_digit_TWO      = "\x32";
const Karthika_digit_THREE    = "\x33";
const Karthika_digit_FOUR     = "\x34";
const Karthika_digit_FIVE     = "\x35";
const Karthika_digit_SIX      = "\x36";
const Karthika_digit_SEVEN    = "\x37";
const Karthika_digit_EIGHT    = "\x38";
const Karthika_digit_NINE     = "\x39";

//Matches ASCII
const Karthika_EXCLAM         = "\x21";
const Karthika_PERCENT        = "\x25";
const Karthika_AMPERSAND      = "\x26";
const Karthika_QTSINGLE       = "\x27";
const Karthika_PARENLEFT      = "\x28";
const Karthika_PARENRIGT      = "\x29";
const Karthika_ASTERISK       = "\x2A";
const Karthika_PLUS           = "\x2B";
const Karthika_COMMA          = "\x2C";
const Karthika_PERIOD         = "\x2E";
const Karthika_SLASH          = "\x2F";
const Karthika_COLON          = "\x3A";
const Karthika_SEMICOLON      = "\x3B";
const Karthika_LESSTHAN       = "\x3C";
const Karthika_EQUALS         = "\x3D";
const Karthika_GREATERTHAN    = "\x3E";
const Karthika_QUESTION       = "\x3F";
const Karthika_ATSIGN         = "\x40";

//Does not match ASCII
const Karthika_extra_QTSINGLE = "\x22";
const Karthika_extra_DBLQT    = "\x22\x22";
const Karthika_extra_ASTERISK = "\x24";
const Karthika_extra_HYPHEN   = "\xC3\xBE";

//Dont need
const Karthika_misc_UNKNOWN_1  = "\x2D";

}
$Karthika_toPadma = array();

$Karthika_toPadma[Karthika::Karthika_anusvara] = Padma::Padma_anusvara;
$Karthika_toPadma[Karthika::Karthika_visarga]  = Padma::Padma_visarga;
$Karthika_toPadma[Karthika::Karthika_virama]   = Padma::Padma_chandrakkala;

$Karthika_toPadma[Karthika::Karthika_vowel_A]  = Padma::Padma_vowel_A;
$Karthika_toPadma[Karthika::Karthika_vowel_AA] = Padma::Padma_vowel_AA;
$Karthika_toPadma[Karthika::Karthika_vowel_I]  = Padma::Padma_vowel_I;
$Karthika_toPadma[Karthika::Karthika_vowel_II] = Padma::Padma_vowel_II;
$Karthika_toPadma[Karthika::Karthika_vowel_U]  = Padma::Padma_vowel_U;
$Karthika_toPadma[Karthika::Karthika_vowel_UU] = Padma::Padma_vowel_UU;
$Karthika_toPadma[Karthika::Karthika_vowel_R]  = Padma::Padma_vowel_R;
$Karthika_toPadma[Karthika::Karthika_vowel_RR] = Padma::Padma_vowel_RR;
$Karthika_toPadma[Karthika::Karthika_vowel_E]  = Padma::Padma_vowel_E;
$Karthika_toPadma[Karthika::Karthika_vowel_EE] = Padma::Padma_vowel_EE;
$Karthika_toPadma[Karthika::Karthika_vowel_AI] = Padma::Padma_vowel_AI;
$Karthika_toPadma[Karthika::Karthika_vowel_O]  = Padma::Padma_vowel_O;
$Karthika_toPadma[Karthika::Karthika_vowel_OO] = Padma::Padma_vowel_OO;
$Karthika_toPadma[Karthika::Karthika_vowel_AU] = Padma::Padma_vowel_AU;

$Karthika_toPadma[Karthika::Karthika_consnt_KA]  = Padma::Padma_consnt_KA;
$Karthika_toPadma[Karthika::Karthika_consnt_KHA] = Padma::Padma_consnt_KHA;
$Karthika_toPadma[Karthika::Karthika_consnt_GA]  = Padma::Padma_consnt_GA;
$Karthika_toPadma[Karthika::Karthika_consnt_GHA] = Padma::Padma_consnt_GHA;
$Karthika_toPadma[Karthika::Karthika_consnt_NGA] = Padma::Padma_consnt_NGA;

$Karthika_toPadma[Karthika::Karthika_consnt_CA]  = Padma::Padma_consnt_CA;
$Karthika_toPadma[Karthika::Karthika_consnt_CHA] = Padma::Padma_consnt_CHA;
$Karthika_toPadma[Karthika::Karthika_consnt_JA]  = Padma::Padma_consnt_JA;
$Karthika_toPadma[Karthika::Karthika_consnt_JHA] = Padma::Padma_consnt_JHA;
$Karthika_toPadma[Karthika::Karthika_consnt_NYA] = Padma::Padma_consnt_NYA;

$Karthika_toPadma[Karthika::Karthika_consnt_TTA]  = Padma::Padma_consnt_TTA;
$Karthika_toPadma[Karthika::Karthika_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Karthika_toPadma[Karthika::Karthika_consnt_DDA]  = Padma::Padma_consnt_DDA;
$Karthika_toPadma[Karthika::Karthika_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Karthika_toPadma[Karthika::Karthika_consnt_NNA]  = Padma::Padma_consnt_NNA;

$Karthika_toPadma[Karthika::Karthika_consnt_TA]  = Padma::Padma_consnt_TA;
$Karthika_toPadma[Karthika::Karthika_consnt_THA] = Padma::Padma_consnt_THA;
$Karthika_toPadma[Karthika::Karthika_consnt_DA]  = Padma::Padma_consnt_DA;
$Karthika_toPadma[Karthika::Karthika_consnt_DHA] = Padma::Padma_consnt_DHA;
$Karthika_toPadma[Karthika::Karthika_consnt_NA]  = Padma::Padma_consnt_NA;

$Karthika_toPadma[Karthika::Karthika_consnt_PA]  = Padma::Padma_consnt_PA;
$Karthika_toPadma[Karthika::Karthika_consnt_PHA] = Padma::Padma_consnt_PHA;
$Karthika_toPadma[Karthika::Karthika_consnt_BA]  = Padma::Padma_consnt_BA;
$Karthika_toPadma[Karthika::Karthika_consnt_BHA] = Padma::Padma_consnt_BHA;
$Karthika_toPadma[Karthika::Karthika_consnt_MA]  = Padma::Padma_consnt_MA;

$Karthika_toPadma[Karthika::Karthika_consnt_YA]  = Padma::Padma_consnt_YA;
$Karthika_toPadma[Karthika::Karthika_consnt_RA]  = Padma::Padma_consnt_RA;
$Karthika_toPadma[Karthika::Karthika_consnt_LA]  = Padma::Padma_consnt_LA;
$Karthika_toPadma[Karthika::Karthika_consnt_VA]  = Padma::Padma_consnt_VA;
$Karthika_toPadma[Karthika::Karthika_consnt_SHA] = Padma::Padma_consnt_SHA;
$Karthika_toPadma[Karthika::Karthika_consnt_SSA] = Padma::Padma_consnt_SSA;
$Karthika_toPadma[Karthika::Karthika_consnt_SA]  = Padma::Padma_consnt_SA;

$Karthika_toPadma[Karthika::Karthika_consnt_HA] = Padma::Padma_consnt_HA;
$Karthika_toPadma[Karthika::Karthika_consnt_LLA] = Padma::Padma_consnt_LLA;
$Karthika_toPadma[Karthika::Karthika_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Karthika_toPadma[Karthika::Karthika_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$Karthika_toPadma[Karthika::Karthika_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Karthika_toPadma[Karthika::Karthika_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Karthika_toPadma[Karthika::Karthika_vowelsn_II] = Padma::Padma_vowelsn_II;
$Karthika_toPadma[Karthika::Karthika_vowelsn_U]  = Padma::Padma_vowelsn_U;
$Karthika_toPadma[Karthika::Karthika_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Karthika_toPadma[Karthika::Karthika_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Karthika_toPadma[Karthika::Karthika_vowelsn_E]  = Padma::Padma_vowelsn_E;
$Karthika_toPadma[Karthika::Karthika_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Karthika_toPadma[Karthika::Karthika_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Karthika_toPadma[Karthika::Karthika_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Chillu
$Karthika_toPadma[Karthika::Karthika_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$Karthika_toPadma[Karthika::Karthika_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$Karthika_toPadma[Karthika::Karthika_chillu_IR]  = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Karthika_toPadma[Karthika::Karthika_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$Karthika_toPadma[Karthika::Karthika_chillu_ILL] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//vattulu
$Karthika_toPadma[Karthika::Karthika_vattu_YA]  = Padma::Padma_vattu_YA;
$Karthika_toPadma[Karthika::Karthika_vattu_RA]  = Padma::Padma_vattu_RA;
$Karthika_toPadma[Karthika::Karthika_vattu_VA]  = Padma::Padma_vattu_VA;

//kooTTaksharangngaL
$Karthika_toPadma[Karthika::Karthika_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$Karthika_toPadma[Karthika::Karthika_conj_KTT]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TTA;
$Karthika_toPadma[Karthika::Karthika_conj_KT]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TA;
$Karthika_toPadma[Karthika::Karthika_conj_KLL]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_LLA;
$Karthika_toPadma[Karthika::Karthika_conj_KSH]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_SSA;
$Karthika_toPadma[Karthika::Karthika_conj_GG]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_GA;
$Karthika_toPadma[Karthika::Karthika_conj_GN]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_NA;
$Karthika_toPadma[Karthika::Karthika_conj_GM]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_MA;
$Karthika_toPadma[Karthika::Karthika_conj_GLL]  = Padma::Padma_consnt_GA .  Padma::Padma_vattu_LLA;
$Karthika_toPadma[Karthika::Karthika_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;
$Karthika_toPadma[Karthika::Karthika_conj_NGNG] = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_NGA;

$Karthika_toPadma[Karthika::Karthika_conj_CC]   = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$Karthika_toPadma[Karthika::Karthika_conj_CCH]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CHA;
$Karthika_toPadma[Karthika::Karthika_conj_JJ]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;
$Karthika_toPadma[Karthika::Karthika_conj_JNY]  = Padma::Padma_consnt_JA .  Padma::Padma_vattu_NYA;
$Karthika_toPadma[Karthika::Karthika_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$Karthika_toPadma[Karthika::Karthika_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;

$Karthika_toPadma[Karthika::Karthika_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$Karthika_toPadma[Karthika::Karthika_conj_DDDD] = Padma::Padma_consnt_DDA .  Padma::Padma_vattu_DDA;
$Karthika_toPadma[Karthika::Karthika_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$Karthika_toPadma[Karthika::Karthika_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;
$Karthika_toPadma[Karthika::Karthika_conj_NNNN] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_NNA;
$Karthika_toPadma[Karthika::Karthika_conj_NNM]  = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_MA;

$Karthika_toPadma[Karthika::Karthika_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$Karthika_toPadma[Karthika::Karthika_conj_T_TH] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_THA;
$Karthika_toPadma[Karthika::Karthika_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$Karthika_toPadma[Karthika::Karthika_conj_TM]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_MA;
$Karthika_toPadma[Karthika::Karthika_conj_TS]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_SA;
$Karthika_toPadma[Karthika::Karthika_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$Karthika_toPadma[Karthika::Karthika_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$Karthika_toPadma[Karthika::Karthika_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$Karthika_toPadma[Karthika::Karthika_conj_NTH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_THA;
$Karthika_toPadma[Karthika::Karthika_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$Karthika_toPadma[Karthika::Karthika_conj_NDH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DHA;
$Karthika_toPadma[Karthika::Karthika_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$Karthika_toPadma[Karthika::Karthika_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$Karthika_toPadma[Karthika::Karthika_conj_NRR_1]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$Karthika_toPadma[Karthika::Karthika_conj_NRR_2]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$Karthika_toPadma[Karthika::Karthika_conj_NAU]  = Padma::Padma_consnt_NA .  Padma::Padma_chandrakkala;

$Karthika_toPadma[Karthika::Karthika_conj_PP]  = Padma::Padma_consnt_PA .  Padma::Padma_vattu_PA;
$Karthika_toPadma[Karthika::Karthika_conj_PLL] = Padma::Padma_consnt_PA .  Padma::Padma_vattu_LLA;
$Karthika_toPadma[Karthika::Karthika_conj_BDH] = Padma::Padma_consnt_BA .  Padma::Padma_vattu_DHA;
$Karthika_toPadma[Karthika::Karthika_conj_BD]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_DA;
$Karthika_toPadma[Karthika::Karthika_conj_BB]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$Karthika_toPadma[Karthika::Karthika_conj_BLL] = Padma::Padma_consnt_BA .  Padma::Padma_vattu_LLA;
$Karthika_toPadma[Karthika::Karthika_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$Karthika_toPadma[Karthika::Karthika_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;
$Karthika_toPadma[Karthika::Karthika_conj_MLL] = Padma::Padma_consnt_MA .  Padma::Padma_vattu_LLA;

$Karthika_toPadma[Karthika::Karthika_conj_YY]  = Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$Karthika_toPadma[Karthika::Karthika_conj_YKK] = Padma::Padma_consnt_YA .  Padma::Padma_vattu_KA . Padma::Padma_vattu_KA;
$Karthika_toPadma[Karthika::Karthika_conj_L_L] = Padma::Padma_consnt_LA .  Padma::Padma_vattu_LA;
$Karthika_toPadma[Karthika::Karthika_conj_LP]  = Padma::Padma_consnt_LA .  Padma::Padma_vattu_PA;
$Karthika_toPadma[Karthika::Karthika_conj_VV]  = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;

$Karthika_toPadma[Karthika::Karthika_conj_SHC]  = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_CA;
$Karthika_toPadma[Karthika::Karthika_conj_SHLL] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_LLA;
$Karthika_toPadma[Karthika::Karthika_conj_SHSH] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_SHA;
$Karthika_toPadma[Karthika::Karthika_conj_SSTT] = Padma::Padma_consnt_SSA .  Padma::Padma_vattu_TTA;
$Karthika_toPadma[Karthika::Karthika_conj_SLL]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_LLA;
$Karthika_toPadma[Karthika::Karthika_conj_S_S]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_SA;
$Karthika_toPadma[Karthika::Karthika_conj_STH]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_THA;
$Karthika_toPadma[Karthika::Karthika_conj_SRR_RR]= Padma::Padma_consnt_SA .  Padma::Padma_vattu_RRA . Padma::Padma_vattu_RRA;

$Karthika_toPadma[Karthika::Karthika_conj_HN]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_NA;
$Karthika_toPadma[Karthika::Karthika_conj_HM]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_MA;
$Karthika_toPadma[Karthika::Karthika_conj_HLL]  = Padma::Padma_consnt_HA .  Padma::Padma_vattu_LLA;
$Karthika_toPadma[Karthika::Karthika_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;

$Karthika_toPadma[Karthika::Karthika_conj_RRRR_1] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;
$Karthika_toPadma[Karthika::Karthika_conj_RRRR_2] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;

//Consonant(s) . Vowel Sign
$Karthika_toPadma[Karthika::Karthika_combo_KU]    = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;
$Karthika_toPadma[Karthika::Karthika_combo_KKU]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA . Padma::Padma_vowelsn_U;
$Karthika_toPadma[Karthika::Karthika_combo_NGKU]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA .Padma:: Padma_vowelsn_U;
$Karthika_toPadma[Karthika::Karthika_combo_NN_U]  = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_U;
$Karthika_toPadma[Karthika::Karthika_combo_NU]    = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_U;
$Karthika_toPadma[Karthika::Karthika_combo_N_N_U] = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA . Padma::Padma_vowelsn_U;
$Karthika_toPadma[Karthika::Karthika_combo_RU]    = Padma::Padma_consnt_RA . Padma:: Padma_vowelsn_U;

//Miscellaneous(where it doesn't match ASCII representation)
$Karthika_toPadma[Karthika::Karthika_extra_QTSINGLE] = Karthika::Karthika_QTSINGLE;
$Karthika_toPadma[Karthika::Karthika_extra_DBLQT]    = '"';
$Karthika_toPadma[Karthika::Karthika_extra_ASTERISK] = '*';
$Karthika_toPadma[Karthika::Karthika_extra_HYPHEN]   = '-';

$Karthika_redundantList = array();
$Karthika_redundantList[Karthika::Karthika_misc_UNKNOWN_1] = true;

$Karthika_prefixList = array();
$Karthika_prefixList[Karthika::Karthika_vattu_RA]   = true;
$Karthika_prefixList[Karthika::Karthika_vowelsn_E]  = true;
$Karthika_prefixList[Karthika::Karthika_vowelsn_EE] = true;
$Karthika_prefixList[Karthika::Karthika_vowelsn_AI] = true;

$Karthika_overloadList = array();
$Karthika_overloadList[Karthika::Karthika_vowel_I]        = true;
$Karthika_overloadList[Karthika::Karthika_vowel_U]        = true;
$Karthika_overloadList[Karthika::Karthika_vowel_R]        = true;
$Karthika_overloadList[Karthika::Karthika_vowel_O]        = true;
$Karthika_overloadList[Karthika::Karthika_vowelsn_R]      = true;
$Karthika_overloadList[Karthika::Karthika_vowelsn_E]      = true;
$Karthika_overloadList[Karthika::Karthika_chillu_IN]      = true;
$Karthika_overloadList[Karthika::Karthika_extra_QTSINGLE] = true;

function Karthika_initialize()
{
    global $fontinfo;

    $fontinfo["ml-ttkarthika"]["language"] = "Malayalam";
    $fontinfo["ml-ttkarthika"]["class"] = "Karthika";
}
?>
