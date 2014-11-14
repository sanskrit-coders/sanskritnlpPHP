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

//Kairali Malayalam
class Kairali
{
function Kairali()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "PMLTKairali";
var $displayName  = "Kairali";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup($str) 
{
   global $Kairali_toPadma; 
   return $Kairali_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Kairali_prefixList;
    return $Kairali_prefixList[$str] != null;
}

function isOverloaded($str)
{
    global $Kairali_overloadList;
    return $Kairali_overloadList[$str] != null;
}

//global handleTwoPartVowelSigns($sign1, $sign2)
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
    global $Kairali_redundantList;
    return $Kairali_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const Kairali_visarga        = "\xC2\xAF";
const Kairali_anusvara       = "\xC2\xAC";
const Kairali_virama         = "\xC2\xAE"; //Chandrakkala

//Vowels
const Kairali_vowel_A        = "\xE2\x82\xAC";
const Kairali_vowel_AA       = "\xC2\x81";
const Kairali_vowel_I        = "\xE2\x80\x9A";
const Kairali_vowel_II       = "\xE2\x80\x9A\xC2\xAA";
const Kairali_vowel_U        = "\xC6\x92";
const Kairali_vowel_UU       = "\xC6\x92\xC2\xAA";
const Kairali_vowel_R        = "\xE2\x80\x9E";
const Kairali_vowel_RR       = "\xE2\x80\x9E\xC2\xAA";
const Kairali_vowel_E        = "\xE2\x80\xA6";
const Kairali_vowel_EE       = "\xE2\x80\xA0";               
const Kairali_vowel_AI       = "\xC2\xA5\xE2\x80\xA6";
const Kairali_vowel_O        = "\xE2\x80\xA1";
const Kairali_vowel_OO       = "\xE2\x80\xA1\xC2\xA1";
const Kairali_vowel_AU       = "\xE2\x80\xA1\xC2\xAA";

//Consonants
const Kairali_consnt_KA      = "\xCB\x86";
const Kairali_consnt_KHA     = "\xE2\x80\xB0";
const Kairali_consnt_GA      = "\xC5\xA0";
const Kairali_consnt_GHA     = "\xE2\x80\xB9";
const Kairali_consnt_NGA     = "\xC5\x92";

const Kairali_consnt_CA      = "\xC2\x8D";
const Kairali_consnt_CHA     = "\xC5\xBD";
const Kairali_consnt_JA      = "\xC2\x8F";
const Kairali_consnt_JHA     = "\xC3\x8B";
const Kairali_consnt_NYA     = "\xC3\x87";

const Kairali_consnt_TTA     = "\xC3\x90";
const Kairali_consnt_TTHA    = "\x7E";
const Kairali_consnt_DDA     = "\xC2\xB0";
const Kairali_consnt_DDHA    = "\xC5\x93";
const Kairali_consnt_NNA     = "\xC3\x83";

const Kairali_consnt_TA      = "\xC2\xBB";
const Kairali_consnt_THA     = "\xCB\x9C";
const Kairali_consnt_DA      = "\xE2\x84\xA2";
const Kairali_consnt_DHA     = "\xC5\xA1";
const Kairali_consnt_NA      = "\xE2\x80\xBA";

const Kairali_consnt_PA      = "\xC2\xB2";
const Kairali_consnt_PHA     = "\xC2\x9D";
const Kairali_consnt_BA      = "\xC5\xBE";
const Kairali_consnt_BHA     = "\xC5\xB8";
const Kairali_consnt_MA      = "\xC3\x84";

const Kairali_consnt_YA      = "\xC3\xB0";
const Kairali_consnt_RA      = "\xC3\xB1";
const Kairali_consnt_LA      = "\xC3\xB2";
const Kairali_consnt_VA      = "\xC3\xB3";
const Kairali_consnt_SHA     = "\xC3\xB4";
const Kairali_consnt_SSA     = "\xC3\xB5";
const Kairali_consnt_SA      = "\xC3\xB6";

const Kairali_consnt_HA      = "\xC3\xB7";
const Kairali_consnt_LLA     = "\xC3\xB8";
const Kairali_consnt_ZHA     = "\xC3\xB9";
const Kairali_consnt_RRA     = "\xC3\xBA";

//Gunintamulu
const Kairali_vowelsn_AA     = "\xC2\xA1";
const Kairali_vowelsn_I      = "\xC2\xA2";
const Kairali_vowelsn_II     = "\xC2\xA3";
const Kairali_vowelsn_U      = "\xC2\xA9";
const Kairali_vowelsn_UU     = "\xC2\xA8";
const Kairali_vowelsn_R      = "\xC2\xA6";
const Kairali_vowelsn_RR     = "\xC2\xA6\xC2\xAA";
const Kairali_vowelsn_E      = "\xC2\xA5";
const Kairali_vowelsn_EE     = "\xC2\xA4";
const Kairali_vowelsn_AI     = "\xC2\xA5\xC2\xA5";
//vowelsigns o and O have two separate glyphs, one on left and one on right_
const Kairali_vowelsn_AU     = "\xC2\xAA";

//Chillu (5)
const Kairali_chillu_ENN     = "\xC3\xBF";
const Kairali_chillu_IN      = "\xC3\xBC";
const Kairali_chillu_IR      = "\xC3\xBB";
const Kairali_chillu_IL      = "\xC3\xBD";
const Kairali_chillu_ILL     = "\xC3\xBE";

//vattulu (consonant signs)
const Kairali_vattu_GA       = "\xC3\xAA";
const Kairali_vattu_TTA      = "\xC3\xA9";
const Kairali_vattu_DDA      = "\xC3\xAC";
const Kairali_vattu_NNA      = "\xC3\xA5";
const Kairali_vattu_TA       = "\xC3\xAD";
const Kairali_vattu_DA       = "\xC3\xAF";
const Kairali_vattu_DHA      = "\xC3\xA8";
const Kairali_vattu_NA       = "\xC3\xAE";
const Kairali_vattu_PA       = "\xC3\xA7";
const Kairali_vattu_MA       = "\xC3\xA4";
const Kairali_vattu_YA       = "\xC2\xAB";
const Kairali_vattu_RA       = "\xC2\xB1";
const Kairali_vattu_LA       = "\xC3\xAB";
const Kairali_vattu_VA       = "\xC2\xA7";
const Kairali_vattu_SA       = "\xC3\xA6";

//kooTTaksharangngaL
const Kairali_conj_KK        = "\xC2\xB4";
const Kairali_conj_KT        = "\xC2\xBF";
const Kairali_conj_KSH       = "\xC2\xBC";
const Kairali_conj_GN        = "\xC3\x9E";
const Kairali_conj_NGK       = "\xC3\x86";  
const Kairali_conj_NGNG      = "\xC2\xB9";

const Kairali_conj_CC        = "\xC3\x81";
const Kairali_conj_CCH       = "\xC3\x94";
const Kairali_conj_JJ        = "\xC3\x92";
const Kairali_conj_JNY       = "\xC3\x91";
const Kairali_conj_NYC       = "\xC3\x95";
const Kairali_conj_NYJ       = "\xC3\x93";
const Kairali_conj_NYNY      = "\xC3\x88";

const Kairali_conj_TTTT      = "\xC2\xB8";
const Kairali_conj_NNTT      = "\xC3\x99";
const Kairali_conj_NNDD      = "\xC3\x9F";

const Kairali_conj_T_T       = "\xC2\xB7";
const Kairali_conj_T_TH      = "\xC3\x8E";
const Kairali_conj_TBH       = "\xC3\x8F";
const Kairali_conj_TM        = "\xC3\x85";
const Kairali_conj_TS        = "\xC2\x90";
const Kairali_conj_DD        = "\xC3\x80";
const Kairali_conj_D_DH      = "\xC3\x9A";
const Kairali_conj_NT        = "\xC3\x82";
const Kairali_conj_NTH       = "\xC3\x9D";
const Kairali_conj_ND        = "\xC2\xB3";
const Kairali_conj_NDH       = "\xC3\x9C";
const Kairali_conj_N_N       = "\xC3\x89";
const Kairali_conj_NM        = "\xC2\xB5";
const Kairali_conj_NRR_1     = "\xC3\x8A"; 
const Kairali_conj_NRR_2     = "\xC3\xBC\xC3\xBA"; 

const Kairali_conj_PP        = "\xC2\xB6";
const Kairali_conj_BB        = "\xC3\xA2";
const Kairali_conj_MP        = "\xC3\x98";
const Kairali_conj_MM        = "\xC2\xBD";

const Kairali_conj_YY        = "\xC3\xA0";
const Kairali_conj_L_L       = "\xC3\xB2\xC3\xAB";
const Kairali_conj_VV        = "\xC3\xA1";

const Kairali_conj_SHC       = "\xC3\x96";
const Kairali_conj_SHSH      = "\xC3\x9B";
const Kairali_conj_STH       = "\xC3\x8C";
const Kairali_conj_SRR       = "\xC3\x8D";

const Kairali_conj_HN        = "\xC3\x9B";
const Kairali_conj_HM        = "\xC2\xBA";
const Kairali_conj_LLLL      = "\xC2\xBE";

const Kairali_conj_RRRR      = "\xC3\x97"; //ta as in steel

//Digits
const Kairali_digit_ZERO     = "\x30";
const Kairali_digit_ONE      = "\x31";
const Kairali_digit_TWO      = "\x32";
const Kairali_digit_THREE    = "\x33";
const Kairali_digit_FOUR     = "\x34";
const Kairali_digit_FIVE     = "\x35";
const Kairali_digit_SIX      = "\x36";
const Kairali_digit_SEVEN    = "\x37";
const Kairali_digit_EIGHT    = "\x38";
const Kairali_digit_NINE     = "\x39";

//Matches ASCII from 00-0x7D
//Does not match ASCII
const Kairali_extra_QTSINGLE_1 = "\xE2\x80\x98";
const Kairali_extra_QTSINGLE_2 = "\xE2\x80\x99";
const Kairali_extra_QTDOUBLE_1 = "\xE2\x80\x9C";
const Kairali_extra_QTDOUBLE_2 = "\xE2\x80\x9D";
const Kairali_extra_HYPHEN     = "\xC2\xAD";

//Dont need
const Kairali_misc_UNKNOWN_1  = "\x2D";

}
$Kairali_toPadma = array();

$Kairali_toPadma[Kairali::Kairali_anusvara] = Padma::Padma_anusvara;
$Kairali_toPadma[Kairali::Kairali_visarga]  = Padma::Padma_visarga;
$Kairali_toPadma[Kairali::Kairali_virama]   = Padma::Padma_chandrakkala;

$Kairali_toPadma[Kairali::Kairali_vowel_A]  = Padma::Padma_vowel_A;
$Kairali_toPadma[Kairali::Kairali_vowel_AA] = Padma::Padma_vowel_AA;
$Kairali_toPadma[Kairali::Kairali_vowel_I]  = Padma::Padma_vowel_I;
$Kairali_toPadma[Kairali::Kairali_vowel_II] = Padma::Padma_vowel_II;
$Kairali_toPadma[Kairali::Kairali_vowel_U]  = Padma::Padma_vowel_U;
$Kairali_toPadma[Kairali::Kairali_vowel_UU] = Padma::Padma_vowel_UU;
$Kairali_toPadma[Kairali::Kairali_vowel_R]  = Padma::Padma_vowel_R;
$Kairali_toPadma[Kairali::Kairali_vowel_RR] = Padma::Padma_vowel_RR;
$Kairali_toPadma[Kairali::Kairali_vowel_E]  = Padma::Padma_vowel_E;
$Kairali_toPadma[Kairali::Kairali_vowel_EE] = Padma::Padma_vowel_EE;
$Kairali_toPadma[Kairali::Kairali_vowel_AI] = Padma::Padma_vowel_AI;
$Kairali_toPadma[Kairali::Kairali_vowel_O]  = Padma::Padma_vowel_O;
$Kairali_toPadma[Kairali::Kairali_vowel_OO] = Padma::Padma_vowel_OO;
$Kairali_toPadma[Kairali::Kairali_vowel_AU] = Padma::Padma_vowel_AU;

$Kairali_toPadma[Kairali::Kairali_consnt_KA]  = Padma::Padma_consnt_KA;
$Kairali_toPadma[Kairali::Kairali_consnt_KHA] = Padma::Padma_consnt_KHA;
$Kairali_toPadma[Kairali::Kairali_consnt_GA]  = Padma::Padma_consnt_GA;
$Kairali_toPadma[Kairali::Kairali_consnt_GHA] = Padma::Padma_consnt_GHA;
$Kairali_toPadma[Kairali::Kairali_consnt_NGA] = Padma::Padma_consnt_NGA;

$Kairali_toPadma[Kairali::Kairali_consnt_CA]  = Padma::Padma_consnt_CA;
$Kairali_toPadma[Kairali::Kairali_consnt_CHA] = Padma::Padma_consnt_CHA;
$Kairali_toPadma[Kairali::Kairali_consnt_JA]  = Padma::Padma_consnt_JA;
$Kairali_toPadma[Kairali::Kairali_consnt_JHA] = Padma::Padma_consnt_JHA;
$Kairali_toPadma[Kairali::Kairali_consnt_NYA] = Padma::Padma_consnt_NYA;

$Kairali_toPadma[Kairali::Kairali_consnt_TTA]  = Padma::Padma_consnt_TTA;
$Kairali_toPadma[Kairali::Kairali_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Kairali_toPadma[Kairali::Kairali_consnt_DDA]  = Padma::Padma_consnt_DDA;
$Kairali_toPadma[Kairali::Kairali_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Kairali_toPadma[Kairali::Kairali_consnt_NNA]  = Padma::Padma_consnt_NNA;

$Kairali_toPadma[Kairali::Kairali_consnt_TA]  = Padma::Padma_consnt_TA;
$Kairali_toPadma[Kairali::Kairali_consnt_THA] = Padma::Padma_consnt_THA;
$Kairali_toPadma[Kairali::Kairali_consnt_DA]  = Padma::Padma_consnt_DA;
$Kairali_toPadma[Kairali::Kairali_consnt_DHA] = Padma::Padma_consnt_DHA;
$Kairali_toPadma[Kairali::Kairali_consnt_NA]  = Padma::Padma_consnt_NA;

$Kairali_toPadma[Kairali::Kairali_consnt_PA]  = Padma::Padma_consnt_PA;
$Kairali_toPadma[Kairali::Kairali_consnt_PHA] = Padma::Padma_consnt_PHA;
$Kairali_toPadma[Kairali::Kairali_consnt_BA]  = Padma::Padma_consnt_BA;
$Kairali_toPadma[Kairali::Kairali_consnt_BHA] = Padma::Padma_consnt_BHA;
$Kairali_toPadma[Kairali::Kairali_consnt_MA]  = Padma::Padma_consnt_MA;

$Kairali_toPadma[Kairali::Kairali_consnt_YA]  = Padma::Padma_consnt_YA;
$Kairali_toPadma[Kairali::Kairali_consnt_RA]  = Padma::Padma_consnt_RA;
$Kairali_toPadma[Kairali::Kairali_consnt_LA]  = Padma::Padma_consnt_LA;
$Kairali_toPadma[Kairali::Kairali_consnt_VA]  = Padma::Padma_consnt_VA;
$Kairali_toPadma[Kairali::Kairali_consnt_SHA] = Padma::Padma_consnt_SHA;
$Kairali_toPadma[Kairali::Kairali_consnt_SSA] = Padma::Padma_consnt_SSA;
$Kairali_toPadma[Kairali::Kairali_consnt_SA]  = Padma::Padma_consnt_SA;

$Kairali_toPadma[Kairali::Kairali_consnt_HA] = Padma::Padma_consnt_HA;
$Kairali_toPadma[Kairali::Kairali_consnt_LLA] = Padma::Padma_consnt_LLA;
$Kairali_toPadma[Kairali::Kairali_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Kairali_toPadma[Kairali::Kairali_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$Kairali_toPadma[Kairali::Kairali_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Kairali_toPadma[Kairali::Kairali_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Kairali_toPadma[Kairali::Kairali_vowelsn_II] = Padma::Padma_vowelsn_II;
$Kairali_toPadma[Kairali::Kairali_vowelsn_U]  = Padma::Padma_vowelsn_U;
$Kairali_toPadma[Kairali::Kairali_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Kairali_toPadma[Kairali::Kairali_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Kairali_toPadma[Kairali::Kairali_vowelsn_E]  = Padma::Padma_vowelsn_E;
$Kairali_toPadma[Kairali::Kairali_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Kairali_toPadma[Kairali::Kairali_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Kairali_toPadma[Kairali::Kairali_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Chillu
$Kairali_toPadma[Kairali::Kairali_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$Kairali_toPadma[Kairali::Kairali_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$Kairali_toPadma[Kairali::Kairali_chillu_IR]  = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Kairali_toPadma[Kairali::Kairali_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$Kairali_toPadma[Kairali::Kairali_chillu_ILL] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//vattulu
$Kairali_toPadma[Kairali::Kairali_vattu_GA]  = Padma::Padma_vattu_GA;
$Kairali_toPadma[Kairali::Kairali_vattu_TTA] = Padma::Padma_vattu_TTA;
$Kairali_toPadma[Kairali::Kairali_vattu_DDA] = Padma::Padma_vattu_DDA;
$Kairali_toPadma[Kairali::Kairali_vattu_NNA] = Padma::Padma_vattu_NNA;
$Kairali_toPadma[Kairali::Kairali_vattu_TA]  = Padma::Padma_vattu_TA;
$Kairali_toPadma[Kairali::Kairali_vattu_DA]  = Padma::Padma_vattu_DA;
$Kairali_toPadma[Kairali::Kairali_vattu_DHA] = Padma::Padma_vattu_DHA;
$Kairali_toPadma[Kairali::Kairali_vattu_NA]  = Padma::Padma_vattu_NA;
$Kairali_toPadma[Kairali::Kairali_vattu_PA]  = Padma::Padma_vattu_PA;
$Kairali_toPadma[Kairali::Kairali_vattu_MA]  = Padma::Padma_vattu_MA;
$Kairali_toPadma[Kairali::Kairali_vattu_YA]  = Padma::Padma_vattu_YA;
$Kairali_toPadma[Kairali::Kairali_vattu_RA]  = Padma::Padma_vattu_RA;
$Kairali_toPadma[Kairali::Kairali_vattu_LA]  = Padma::Padma_vattu_LA;
$Kairali_toPadma[Kairali::Kairali_vattu_VA]  = Padma::Padma_vattu_VA;
$Kairali_toPadma[Kairali::Kairali_vattu_SA]  = Padma::Padma_vattu_SA;

//kooTTaksharangngaL
$Kairali_toPadma[Kairali::Kairali_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$Kairali_toPadma[Kairali::Kairali_conj_KT]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TA;
$Kairali_toPadma[Kairali::Kairali_conj_KSH]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_SSA;
$Kairali_toPadma[Kairali::Kairali_conj_GN]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_NA;
$Kairali_toPadma[Kairali::Kairali_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;
$Kairali_toPadma[Kairali::Kairali_conj_NGNG] = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_NGA;

$Kairali_toPadma[Kairali::Kairali_conj_CC]   = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$Kairali_toPadma[Kairali::Kairali_conj_CCH]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CHA;
$Kairali_toPadma[Kairali::Kairali_conj_JJ]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;
$Kairali_toPadma[Kairali::Kairali_conj_JNY]  = Padma::Padma_consnt_JA .  Padma::Padma_vattu_NYA;
$Kairali_toPadma[Kairali::Kairali_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$Kairali_toPadma[Kairali::Kairali_conj_NYJ]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_JA;
$Kairali_toPadma[Kairali::Kairali_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;

$Kairali_toPadma[Kairali::Kairali_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$Kairali_toPadma[Kairali::Kairali_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$Kairali_toPadma[Kairali::Kairali_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;

$Kairali_toPadma[Kairali::Kairali_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$Kairali_toPadma[Kairali::Kairali_conj_T_TH] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_THA;
$Kairali_toPadma[Kairali::Kairali_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$Kairali_toPadma[Kairali::Kairali_conj_TM]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_MA;
$Kairali_toPadma[Kairali::Kairali_conj_TS]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_SA;
$Kairali_toPadma[Kairali::Kairali_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$Kairali_toPadma[Kairali::Kairali_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$Kairali_toPadma[Kairali::Kairali_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$Kairali_toPadma[Kairali::Kairali_conj_NTH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_THA;
$Kairali_toPadma[Kairali::Kairali_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$Kairali_toPadma[Kairali::Kairali_conj_NDH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DHA;
$Kairali_toPadma[Kairali::Kairali_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$Kairali_toPadma[Kairali::Kairali_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$Kairali_toPadma[Kairali::Kairali_conj_NRR_1] = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$Kairali_toPadma[Kairali::Kairali_conj_NRR_2] = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;

$Kairali_toPadma[Kairali::Kairali_conj_PP]  = Padma::Padma_consnt_PA .  Padma::Padma_vattu_PA;
$Kairali_toPadma[Kairali::Kairali_conj_BB]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$Kairali_toPadma[Kairali::Kairali_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$Kairali_toPadma[Kairali::Kairali_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;

$Kairali_toPadma[Kairali::Kairali_conj_YY]  = Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$Kairali_toPadma[Kairali::Kairali_conj_L_L] = Padma::Padma_consnt_LA .  Padma::Padma_vattu_LA;
$Kairali_toPadma[Kairali::Kairali_conj_VV]  = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;

$Kairali_toPadma[Kairali::Kairali_conj_SHC]  = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_CA;
$Kairali_toPadma[Kairali::Kairali_conj_SHSH] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_SHA;
$Kairali_toPadma[Kairali::Kairali_conj_STH]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_THA;
$Kairali_toPadma[Kairali::Kairali_conj_SRR]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_RRA;

$Kairali_toPadma[Kairali::Kairali_conj_HN]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_NA;
$Kairali_toPadma[Kairali::Kairali_conj_HM]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_MA;
$Kairali_toPadma[Kairali::Kairali_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;

$Kairali_toPadma[Kairali::Kairali_conj_RRRR] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;

//Miscellaneous(where it doesn't match ASCII representation)
$Kairali_toPadma[Kairali::Kairali_extra_QTSINGLE_1] = "'";
$Kairali_toPadma[Kairali::Kairali_extra_QTSINGLE_2] = "'";
$Kairali_toPadma[Kairali::Kairali_extra_QTDOUBLE_1] = '"';
$Kairali_toPadma[Kairali::Kairali_extra_QTDOUBLE_2] = '"';
$Kairali_toPadma[Kairali::Kairali_extra_HYPHEN]   = '-';

$Kairali_redundantList = array();
$Kairali_redundantList[Kairali::Kairali_misc_UNKNOWN_1] = true;

$Kairali_prefixList = array();
$Kairali_prefixList[Kairali::Kairali_vattu_RA]   = true;
$Kairali_prefixList[Kairali::Kairali_vowelsn_E]  = true;
$Kairali_prefixList[Kairali::Kairali_vowelsn_EE] = true;
$Kairali_prefixList[Kairali::Kairali_vowelsn_AI] = true;

$Kairali_overloadList = array();
$Kairali_overloadList[Kairali::Kairali_vowel_I]        = true;
$Kairali_overloadList[Kairali::Kairali_vowel_U]        = true;
$Kairali_overloadList[Kairali::Kairali_vowel_R]        = true;
$Kairali_overloadList[Kairali::Kairali_vowel_O]        = true;
$Kairali_overloadList[Kairali::Kairali_consnt_LA]      = true;
$Kairali_overloadList[Kairali::Kairali_chillu_IN]      = true;
$Kairali_overloadList[Kairali::Kairali_vowelsn_R]      = true;
$Kairali_overloadList[Kairali::Kairali_vowelsn_E]      = true;

function Kairali_initialize()
{
    global $fontinfo;

    $fontinfo["pmltkairali"]["language"] = "MALAYALAM";
    $fontinfo["pmltkairali"]["class"] = "Kairali";
}
?>
