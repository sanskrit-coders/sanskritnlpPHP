<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 AnvarLal Hasbulla     <padma@anvarlal.in>
 *  Copyright (C) 2006 Harshita Vani        <harshita@atc.tcs.com>
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

//Panchami Malayalam

class Panchami
{
function Panchami()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "Panchami";
var $displayName  = "Panchami";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup($str) 
{
    global $Panchami_toPadma;
    return $Panchami_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Panchami_prefixList;
    return $Panchami_prefixList[$str] != null;
}

function isOverloaded($str)
{
    global $Panchami_overloadList;
    return $Panchami_overloadList[$str] != null;
}

function handleTwoPartVowelSigns ($sign1, $sign2)
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
    global $Panchami_redundantList;
    return $Panchami_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const Panchami_visarga        = "\xC2\xAF";
const Panchami_anusvara       = "\xC2\xAC";
const Panchami_virama         = "\xC2\xAE"; //Chandrakkala

//Vowels
const Panchami_vowel_A        = "\xC3\x85"; 
const Panchami_vowel_AA       = "\xC2\xBF"; 
const Panchami_vowel_I        = "\xE2\x80\x9A"; 
const Panchami_vowel_II       = "\xE2\x80\x9A\xC2\xAA";
const Panchami_vowel_U        = "\xC6\x92";
const Panchami_vowel_UU       = "\xC6\x92\xC2\xAA";
const Panchami_vowel_R        = "\xE2\x80\x9E";
const Panchami_vowel_RR       = "\xE2\x80\x9E\xC2\xAA";
const Panchami_vowel_E        = "\xE2\x80\xA6";
const Panchami_vowel_EE       = "\xE2\x80\xA0";               
const Panchami_vowel_AI       = "\xC2\xA5\xE2\x80\xA6";
const Panchami_vowel_O        = "\xE2\x80\xA1";
const Panchami_vowel_OO       = "\xE2\x80\xA1\xC2\xA1";
const Panchami_vowel_AU       = "\xE2\x80\xA1\xC2\xAA";

//Consonants
const Panchami_consnt_KA      = "\xCB\x86";
const Panchami_consnt_KHA     = "\xE2\x80\xB0";
const Panchami_consnt_GA      = "\xC5\xA0";
const Panchami_consnt_GHA     = "\xE2\x80\xB9";
const Panchami_consnt_NGA     = "\xC5\x92";

const Panchami_consnt_CA      = "\xC3\x9E";
const Panchami_consnt_CHA     = "\xC3\x93"; 
const Panchami_consnt_JA      = "\xC3\x91"; 
const Panchami_consnt_JHA     = "\xC3\x8B"; 
const Panchami_consnt_NYA     = "\xC3\x87";

const Panchami_consnt_TTA     = "\xC3\x90";
const Panchami_consnt_TTHA    = "\x7E";
const Panchami_consnt_DDA     = "\xC2\xB0";
const Panchami_consnt_DDHA    = "\xC5\x93";
const Panchami_consnt_NNA     = "\xC3\x83";

const Panchami_consnt_TA      = "\xC2\xBB";
const Panchami_consnt_THA     = "\xCB\x9C";
const Panchami_consnt_DA      = "\xE2\x84\xA2";
const Panchami_consnt_DHA     = "\xC5\xA1";
const Panchami_consnt_NA      = "\xE2\x80\xBA";

const Panchami_consnt_PA      = "\xC2\xB2";
const Panchami_consnt_PHA     = "\xC2\xBA";
const Panchami_consnt_BA      = "\xC3\x9D";
const Panchami_consnt_BHA     = "\xC5\xB8";
const Panchami_consnt_MA      = "\xC3\x84";

const Panchami_consnt_YA      = "\xC3\xB0";
const Panchami_consnt_RA      = "\xC3\xB1";
const Panchami_consnt_LA      = "\xC3\xB2";
const Panchami_consnt_VA      = "\xC3\xB3";
const Panchami_consnt_SHA     = "\xC3\xB4";
const Panchami_consnt_SSA     = "\xC3\xB5";
const Panchami_consnt_SA      = "\xC3\xB6";

const Panchami_consnt_HA      = "\xC3\xB7";
const Panchami_consnt_LLA     = "\xC3\xB8";
const Panchami_consnt_ZHA     = "\xC3\xB9";
const Panchami_consnt_RRA     = "\xC3\xBA";

//Gunintamulu
const Panchami_vowelsn_AA     = "\xC2\xA1";
const Panchami_vowelsn_I      = "\xC2\xA2";
const Panchami_vowelsn_II     = "\xC2\xA3";
const Panchami_vowelsn_U      = "\xC2\xA9";
const Panchami_vowelsn_UU     = "\xC2\xA8";
const Panchami_vowelsn_R      = "\xC2\xA6";
const Panchami_vowelsn_RR     = "\xC2\xA6\xC2\xAA";
const Panchami_vowelsn_E      = "\xC2\xA5";
const Panchami_vowelsn_EE     = "\xC2\xA4";
const Panchami_vowelsn_AI     = "\xC2\xA5\xC2\xA5";
//vowelsigns o and O have two separate glyphs, one on left and one on right.
const Panchami_vowelsn_AU     = "\xC2\xAA";

//Chillu (5)
const Panchami_chillu_ENN     = "\xC3\xBF";
const Panchami_chillu_IN      = "\xC3\xBC";
const Panchami_chillu_IR      = "\xC3\xBB";
const Panchami_chillu_IL      = "\xC3\xBD";
const Panchami_chillu_ILL     = "\xC3\xBE";

//vattulu (consonant signs)
const Panchami_vattu_GA       = "\xC3\xAA";
const Panchami_vattu_TTA      = "\xC3\xA9";
const Panchami_vattu_DDA      = "\xC3\xAC";
const Panchami_vattu_NNA      = "\xC3\xA5";
const Panchami_vattu_TA       = "\xC3\xAD";
const Panchami_vattu_DA       = "\xC3\xAF";
const Panchami_vattu_DHA      = "\xC3\xA8";
const Panchami_vattu_NA       = "\xC3\xAE";
const Panchami_vattu_PA       = "\xC3\xA7";
const Panchami_vattu_MA       = "\xC3\xA4";
const Panchami_vattu_YA       = "\xC2\xAB";
const Panchami_vattu_RA       = "\xC2\xB1";
const Panchami_vattu_LA       = "\xC3\xAB";
const Panchami_vattu_VA       = "\xC2\xA7";
const Panchami_vattu_SA       = "\xC3\xA6";

//kooTTaksharangngaL
const Panchami_conj_KK        = "\xC2\xB4";
const Panchami_conj_KSH       = "\xC2\xBC";
const Panchami_conj_NGK       = "\xC3\x86";  
const Panchami_conj_NGNG      = "\xC2\xB9";

const Panchami_conj_CC        = "\xC3\x81";
const Panchami_conj_CCH       = "\xC3\x94";
const Panchami_conj_JJ        = "\xC3\x92";
const Panchami_conj_NYC       = "\xC3\x95";
const Panchami_conj_NYNY      = "\xC3\x88";

const Panchami_conj_TTTT      = "\xC2\xB8";
const Panchami_conj_NNTT      = "\xC3\x99";
const Panchami_conj_NNDD      = "\xC3\x9F";

const Panchami_conj_T_T       = "\xC2\xB7";
const Panchami_conj_T_TH      = "\xC3\x8E";
const Panchami_conj_TBH       = "\xC3\x8F";
const Panchami_conj_TS        = "\xC3\x8C";
const Panchami_conj_DD        = "\xC3\x80";
const Panchami_conj_D_DH      = "\xC3\x9A";
const Panchami_conj_NT        = "\xC3\x82";
const Panchami_conj_ND        = "\xC2\xB3";
const Panchami_conj_NDH       = "\xC3\x9C";
const Panchami_conj_N_N       = "\xC3\x89";
const Panchami_conj_NM        = "\xC2\xB5";
const Panchami_conj_NRR_1     = "\xC3\x8A"; 
const Panchami_conj_NRR_2     = "\xC3\xBC\xC3\xBA"; 

const Panchami_conj_PP        = "\xC2\xB6";
const Panchami_conj_BB        = "\xC3\xA2";
const Panchami_conj_MP        = "\xC3\x98";
const Panchami_conj_MM        = "\xC2\xBD";

const Panchami_conj_YY        = "\xC3\xA0";
const Panchami_conj_L_L       = "\xC3\xB2\xC3\xAB";
const Panchami_conj_VV        = "\xC3\xA1";

const Panchami_conj_SHC       = "\xC3\x96";
const Panchami_conj_SHSH      = "\xC3\x9B";
const Panchami_conj_SRR       = "\xC3\x8D";

const Panchami_conj_HN        = "\xC3\x9B";
const Panchami_conj_LLLL      = "\xC2\xBE";

const Panchami_conj_RRRR      = "\xC3\x97"; //ta as in steel

//Digits
const Panchami_digit_ZERO     = "\x30";
const Panchami_digit_ONE      = "\x31";
const Panchami_digit_TWO      = "\x32";
const Panchami_digit_THREE    = "\x33";
const Panchami_digit_FOUR     = "\x34";
const Panchami_digit_FIVE     = "\x35";
const Panchami_digit_SIX      = "\x36";
const Panchami_digit_SEVEN    = "\x37";
const Panchami_digit_EIGHT    = "\x38";
const Panchami_digit_NINE     = "\x39";

//Matches ASCII from 00-0x7D
//Does not match ASCII
const Panchami_extra_QTSINGLE_1 = "\xE2\x80\x98";
const Panchami_extra_QTSINGLE_2 = "\xE2\x80\x99";
const Panchami_extra_QTDOUBLE_1 = "\xE2\x80\x9C";
const Panchami_extra_QTDOUBLE_2 = "\xE2\x80\x9D";
const Panchami_extra_HYPHEN     = "\xC2\xAD";

//Dont need
const Panchami_misc_UNKNOWN_1  = "\x2D";
}

$Panchami_toPadma = array();

$Panchami_toPadma[Panchami::Panchami_anusvara] = Padma::Padma_anusvara;
$Panchami_toPadma[Panchami::Panchami_visarga]  = Padma::Padma_visarga;
$Panchami_toPadma[Panchami::Panchami_virama]   = Padma::Padma_chandrakkala;

$Panchami_toPadma[Panchami::Panchami_vowel_A]  = Padma::Padma_vowel_A;
$Panchami_toPadma[Panchami::Panchami_vowel_AA] = Padma::Padma_vowel_AA;
$Panchami_toPadma[Panchami::Panchami_vowel_I]  = Padma::Padma_vowel_I;
$Panchami_toPadma[Panchami::Panchami_vowel_II] = Padma::Padma_vowel_II;
$Panchami_toPadma[Panchami::Panchami_vowel_U]  = Padma::Padma_vowel_U;
$Panchami_toPadma[Panchami::Panchami_vowel_UU] = Padma::Padma_vowel_UU;
$Panchami_toPadma[Panchami::Panchami_vowel_R]  = Padma::Padma_vowel_R;
$Panchami_toPadma[Panchami::Panchami_vowel_RR] = Padma::Padma_vowel_RR;
$Panchami_toPadma[Panchami::Panchami_vowel_E]  = Padma::Padma_vowel_E;
$Panchami_toPadma[Panchami::Panchami_vowel_EE] = Padma::Padma_vowel_EE;
$Panchami_toPadma[Panchami::Panchami_vowel_AI] = Padma::Padma_vowel_AI;
$Panchami_toPadma[Panchami::Panchami_vowel_O]  = Padma::Padma_vowel_O;
$Panchami_toPadma[Panchami::Panchami_vowel_OO] = Padma::Padma_vowel_OO;
$Panchami_toPadma[Panchami::Panchami_vowel_AU] = Padma::Padma_vowel_AU;

$Panchami_toPadma[Panchami::Panchami_consnt_KA]  = Padma::Padma_consnt_KA;
$Panchami_toPadma[Panchami::Panchami_consnt_KHA] = Padma::Padma_consnt_KHA;
$Panchami_toPadma[Panchami::Panchami_consnt_GA]  = Padma::Padma_consnt_GA;
$Panchami_toPadma[Panchami::Panchami_consnt_GHA] = Padma::Padma_consnt_GHA;
$Panchami_toPadma[Panchami::Panchami_consnt_NGA] = Padma::Padma_consnt_NGA;

$Panchami_toPadma[Panchami::Panchami_consnt_CA]  = Padma::Padma_consnt_CA;
$Panchami_toPadma[Panchami::Panchami_consnt_CHA] = Padma::Padma_consnt_CHA;
$Panchami_toPadma[Panchami::Panchami_consnt_JA]  = Padma::Padma_consnt_JA;
$Panchami_toPadma[Panchami::Panchami_consnt_JHA] = Padma::Padma_consnt_JHA;
$Panchami_toPadma[Panchami::Panchami_consnt_NYA] = Padma::Padma_consnt_NYA;

$Panchami_toPadma[Panchami::Panchami_consnt_TTA]  = Padma::Padma_consnt_TTA;
$Panchami_toPadma[Panchami::Panchami_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Panchami_toPadma[Panchami::Panchami_consnt_DDA]  = Padma::Padma_consnt_DDA;
$Panchami_toPadma[Panchami::Panchami_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Panchami_toPadma[Panchami::Panchami_consnt_NNA]  = Padma::Padma_consnt_NNA;

$Panchami_toPadma[Panchami::Panchami_consnt_TA]  = Padma::Padma_consnt_TA;
$Panchami_toPadma[Panchami::Panchami_consnt_THA] = Padma::Padma_consnt_THA;
$Panchami_toPadma[Panchami::Panchami_consnt_DA]  = Padma::Padma_consnt_DA;
$Panchami_toPadma[Panchami::Panchami_consnt_DHA] = Padma::Padma_consnt_DHA;
$Panchami_toPadma[Panchami::Panchami_consnt_NA]  = Padma::Padma_consnt_NA;

$Panchami_toPadma[Panchami::Panchami_consnt_PA]  = Padma::Padma_consnt_PA;
$Panchami_toPadma[Panchami::Panchami_consnt_PHA] = Padma::Padma_consnt_PHA;
$Panchami_toPadma[Panchami::Panchami_consnt_BA]  = Padma::Padma_consnt_BA;
$Panchami_toPadma[Panchami::Panchami_consnt_BHA] = Padma::Padma_consnt_BHA;
$Panchami_toPadma[Panchami::Panchami_consnt_MA]  = Padma::Padma_consnt_MA;

$Panchami_toPadma[Panchami::Panchami_consnt_YA]  = Padma::Padma_consnt_YA;
$Panchami_toPadma[Panchami::Panchami_consnt_RA]  = Padma::Padma_consnt_RA;
$Panchami_toPadma[Panchami::Panchami_consnt_LA]  = Padma::Padma_consnt_LA;
$Panchami_toPadma[Panchami::Panchami_consnt_VA]  = Padma::Padma_consnt_VA;
$Panchami_toPadma[Panchami::Panchami_consnt_SHA] = Padma::Padma_consnt_SHA;
$Panchami_toPadma[Panchami::Panchami_consnt_SSA] = Padma::Padma_consnt_SSA;
$Panchami_toPadma[Panchami::Panchami_consnt_SA]  = Padma::Padma_consnt_SA;

$Panchami_toPadma[Panchami::Panchami_consnt_HA] = Padma::Padma_consnt_HA;
$Panchami_toPadma[Panchami::Panchami_consnt_LLA] = Padma::Padma_consnt_LLA;
$Panchami_toPadma[Panchami::Panchami_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Panchami_toPadma[Panchami::Panchami_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$Panchami_toPadma[Panchami::Panchami_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Panchami_toPadma[Panchami::Panchami_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Panchami_toPadma[Panchami::Panchami_vowelsn_II] = Padma::Padma_vowelsn_II;
$Panchami_toPadma[Panchami::Panchami_vowelsn_U]  = Padma::Padma_vowelsn_U;
$Panchami_toPadma[Panchami::Panchami_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Panchami_toPadma[Panchami::Panchami_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Panchami_toPadma[Panchami::Panchami_vowelsn_E]  = Padma::Padma_vowelsn_E;
$Panchami_toPadma[Panchami::Panchami_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Panchami_toPadma[Panchami::Panchami_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Panchami_toPadma[Panchami::Panchami_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Chillu
$Panchami_toPadma[Panchami::Panchami_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$Panchami_toPadma[Panchami::Panchami_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$Panchami_toPadma[Panchami::Panchami_chillu_IR]  = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Panchami_toPadma[Panchami::Panchami_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$Panchami_toPadma[Panchami::Panchami_chillu_ILL] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//vattulu
$Panchami_toPadma[Panchami::Panchami_vattu_GA]  = Padma::Padma_vattu_GA;
$Panchami_toPadma[Panchami::Panchami_vattu_TTA] = Padma::Padma_vattu_TTA;
$Panchami_toPadma[Panchami::Panchami_vattu_DDA] = Padma::Padma_vattu_DDA;
$Panchami_toPadma[Panchami::Panchami_vattu_NNA] = Padma::Padma_vattu_NNA;
$Panchami_toPadma[Panchami::Panchami_vattu_TA]  = Padma::Padma_vattu_TA;
$Panchami_toPadma[Panchami::Panchami_vattu_DA]  = Padma::Padma_vattu_DA;
$Panchami_toPadma[Panchami::Panchami_vattu_DHA] = Padma::Padma_vattu_DHA;
$Panchami_toPadma[Panchami::Panchami_vattu_NA]  = Padma::Padma_vattu_NA;
$Panchami_toPadma[Panchami::Panchami_vattu_PA]  = Padma::Padma_vattu_PA;
$Panchami_toPadma[Panchami::Panchami_vattu_MA]  = Padma::Padma_vattu_MA;
$Panchami_toPadma[Panchami::Panchami_vattu_YA]  = Padma::Padma_vattu_YA;
$Panchami_toPadma[Panchami::Panchami_vattu_RA]  = Padma::Padma_vattu_RA;
$Panchami_toPadma[Panchami::Panchami_vattu_LA]  = Padma::Padma_vattu_LA;
$Panchami_toPadma[Panchami::Panchami_vattu_VA]  = Padma::Padma_vattu_VA;
$Panchami_toPadma[Panchami::Panchami_vattu_SA]  = Padma::Padma_vattu_SA;

//kooTTaksharangngaL
$Panchami_toPadma[Panchami::Panchami_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$Panchami_toPadma[Panchami::Panchami_conj_KSH]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_SSA;
$Panchami_toPadma[Panchami::Panchami_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;
$Panchami_toPadma[Panchami::Panchami_conj_NGNG] = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_NGA;

$Panchami_toPadma[Panchami::Panchami_conj_CC]   = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$Panchami_toPadma[Panchami::Panchami_conj_CCH]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CHA;
$Panchami_toPadma[Panchami::Panchami_conj_JJ]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;
$Panchami_toPadma[Panchami::Panchami_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$Panchami_toPadma[Panchami::Panchami_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;

$Panchami_toPadma[Panchami::Panchami_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$Panchami_toPadma[Panchami::Panchami_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$Panchami_toPadma[Panchami::Panchami_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;

$Panchami_toPadma[Panchami::Panchami_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$Panchami_toPadma[Panchami::Panchami_conj_T_TH] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_THA;
$Panchami_toPadma[Panchami::Panchami_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$Panchami_toPadma[Panchami::Panchami_conj_TS]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_SA;
$Panchami_toPadma[Panchami::Panchami_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$Panchami_toPadma[Panchami::Panchami_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$Panchami_toPadma[Panchami::Panchami_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$Panchami_toPadma[Panchami::Panchami_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$Panchami_toPadma[Panchami::Panchami_conj_NDH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DHA;
$Panchami_toPadma[Panchami::Panchami_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$Panchami_toPadma[Panchami::Panchami_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$Panchami_toPadma[Panchami::Panchami_conj_NRR_1] = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$Panchami_toPadma[Panchami::Panchami_conj_NRR_2] = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;

$Panchami_toPadma[Panchami::Panchami_conj_PP]  = Padma::Padma_consnt_PA .  Padma::Padma_vattu_PA;
$Panchami_toPadma[Panchami::Panchami_conj_BB]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$Panchami_toPadma[Panchami::Panchami_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$Panchami_toPadma[Panchami::Panchami_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;

$Panchami_toPadma[Panchami::Panchami_conj_YY]  = Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$Panchami_toPadma[Panchami::Panchami_conj_L_L] = Padma::Padma_consnt_LA .  Padma::Padma_vattu_LA;
$Panchami_toPadma[Panchami::Panchami_conj_VV]  = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;

$Panchami_toPadma[Panchami::Panchami_conj_SHC]  = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_CA;
$Panchami_toPadma[Panchami::Panchami_conj_SHSH] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_SHA;
$Panchami_toPadma[Panchami::Panchami_conj_SRR]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_RRA;

$Panchami_toPadma[Panchami::Panchami_conj_HN]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_NA;
$Panchami_toPadma[Panchami::Panchami_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;

$Panchami_toPadma[Panchami::Panchami_conj_RRRR] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;

//Miscellaneous(where it doesn't match ASCII representation)
$Panchami_toPadma[Panchami::Panchami_extra_QTSINGLE_1] = "'";
$Panchami_toPadma[Panchami::Panchami_extra_QTSINGLE_2] = "'";
$Panchami_toPadma[Panchami::Panchami_extra_QTDOUBLE_1] = '"';
$Panchami_toPadma[Panchami::Panchami_extra_QTDOUBLE_2] = '"';
$Panchami_toPadma[Panchami::Panchami_extra_HYPHEN]   = '-';

$Panchami_redundantList = array();
$Panchami_redundantList[Panchami::Panchami_misc_UNKNOWN_1] = true;

$Panchami_prefixList = array();
$Panchami_prefixList[Panchami::Panchami_vattu_RA]   = true;
$Panchami_prefixList[Panchami::Panchami_vowelsn_E]  = true;
$Panchami_prefixList[Panchami::Panchami_vowelsn_EE] = true;
$Panchami_prefixList[Panchami::Panchami_vowelsn_AI] = true;

$Panchami_overloadList = array();
$Panchami_overloadList[Panchami::Panchami_vowel_I]        = true;
$Panchami_overloadList[Panchami::Panchami_vowel_U]        = true;
$Panchami_overloadList[Panchami::Panchami_vowel_R]        = true;
$Panchami_overloadList[Panchami::Panchami_vowel_O]        = true;
$Panchami_overloadList[Panchami::Panchami_consnt_LA]      = true;
$Panchami_overloadList[Panchami::Panchami_chillu_IN]      = true;
$Panchami_overloadList[Panchami::Panchami_vowelsn_R]      = true;
$Panchami_overloadList[Panchami::Panchami_vowelsn_E]      = true;

function Panchami_initialize()
{
    global $fontinfo;

    $fontinfo["panchami"]["language"] = "Malayalam";
    $fontinfo["panchami"]["class"] = "Panchami";
}
?>
