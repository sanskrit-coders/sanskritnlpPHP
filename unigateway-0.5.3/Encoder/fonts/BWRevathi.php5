<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
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

//BWRevathi Malayalam
class BWRevathi
{
function BWRevathi()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "MLBW-TTRevathi";
var $displayName  = "MLBW-TTRevathi";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup ($str) 
{
    global $BWRevathi_toPadma;
    return $BWRevathi_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $BWRevathi_prefixList;
    return array_key_exists($str, $BWRevathi_prefixList);
}

function isOverloaded ($str)
{
    global $BWRevathi_overloadList;
    return array_key_exists($str, $BWRevathi_overloadList);
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

function isRedundant ($str)
{
    global $BWRevathi_redundantList;
    return array_key_exists($str, $BWRevathi_redundantList);
}

//Implementation details start here

//Specials
const BWRevathi_visarga        = "\xC2\xBA";
const BWRevathi_anusvara       = "\xC2\xB9";
const BWRevathi_virama         = "\xC2\xB8"; //Chandrakkala

//Vowels
const BWRevathi_vowel_A        = "\xC2\xBF"; 
const BWRevathi_vowel_AA       = "\xE2\x80\x9A"; 
const BWRevathi_vowel_I        = "\xC6\x92"; 
const BWRevathi_vowel_II       = "\xC6\x92\xC2\xB7";
const BWRevathi_vowel_U        = "\xE2\x80\x9E";
const BWRevathi_vowel_UU       = "\xE2\x80\x9E\xC2\xB7";
const BWRevathi_vowel_R        = "\xE2\x80\xA6";
const BWRevathi_vowel_RR       = "\xE2\x80\xA6\xC2\xB7";
const BWRevathi_vowel_E        = "\xE2\x80\xA0";
const BWRevathi_vowel_EE       = "\xE2\x80\xA1";               
const BWRevathi_vowel_AI       = "\xC2\xB5\xE2\x80\xA0";
const BWRevathi_vowel_O        = "\xCB\x86";
const BWRevathi_vowel_OO       = "\xCB\x86\xC2\xAF";
const BWRevathi_vowel_AU       = "\xCB\x86\xC2\xB7";

//Consonants
const BWRevathi_consnt_KA      = "\xE2\x80\xB0";
const BWRevathi_consnt_KHA     = "\xC5\xA0";
const BWRevathi_consnt_GA      = "\xE2\x80\xB9";
const BWRevathi_consnt_GHA     = "\xC5\x92";
const BWRevathi_consnt_NGA     = "\xC3\x82";

const BWRevathi_consnt_CA      = "\xC3\xBC";
const BWRevathi_consnt_CHA     = "\xC3\x95"; 
const BWRevathi_consnt_JA      = "\xC3\x97"; 
const BWRevathi_consnt_JHA     = "\xE2\x80\x98"; 
const BWRevathi_consnt_NYA     = "\xE2\x80\x99";

const BWRevathi_consnt_TTA     = "\xE2\x80\x9C";
const BWRevathi_consnt_TTHA    = "\xE2\x80\x9D";
const BWRevathi_consnt_DDA     = "\xE2\x80\xA2";
const BWRevathi_consnt_DDHA    = "\xE2\x80\x93";
const BWRevathi_consnt_NNA     = "\xE2\x80\x94";

const BWRevathi_consnt_TA      = "\xCB\x9C";
const BWRevathi_consnt_THA     = "\xE2\x84\xA2";
const BWRevathi_consnt_DA      = "\xC5\xA1";
const BWRevathi_consnt_DHA     = "\xE2\x80\xBA";
const BWRevathi_consnt_NA      = "\xC5\x93";

const BWRevathi_consnt_PA      = "\xC3\xA3";
const BWRevathi_consnt_PHA     = "\xC3\xBD";
const BWRevathi_consnt_BA      = "\xC2\xA1";
const BWRevathi_consnt_BHA     = "\xC2\xA2";
const BWRevathi_consnt_MA      = "\xC2\xA3";

const BWRevathi_consnt_YA      = "\xC2\xA4";
const BWRevathi_consnt_RA      = "\xC2\xA5";
const BWRevathi_consnt_LA      = "\xC2\xA7";
const BWRevathi_consnt_VA      = "\xC2\xAA";
const BWRevathi_consnt_SHA     = "\xC2\xAB";
const BWRevathi_consnt_SSA     = "\xC2\xAC";
const BWRevathi_consnt_SA      = "\xC5\xB8";

const BWRevathi_consnt_HA      = "\xC2\xAE";
const BWRevathi_consnt_LLA     = "\xC2\xA8";
const BWRevathi_consnt_ZHA     = "\xC2\xA9";
const BWRevathi_consnt_RRA     = "\xC2\xA6";

//Gunintamulu
const BWRevathi_vowelsn_AA     = "\xC2\xAF";
const BWRevathi_vowelsn_I      = "\xC2\xB0";
const BWRevathi_vowelsn_II     = "\xC2\xB1";
const BWRevathi_vowelsn_U      = "\xC2\xB2";
const BWRevathi_vowelsn_UU     = "\xC2\xB3";
const BWRevathi_vowelsn_R      = "\xC2\xB4";
const BWRevathi_vowelsn_RR     = "\xC2\xB4\xC2\xB7";
const BWRevathi_vowelsn_E      = "\xC2\xB5";
const BWRevathi_vowelsn_EE     = "\xC2\xB6";
const BWRevathi_vowelsn_AI     = "\xC2\xB5\xC2\xB5";
//vowel$signs o and O have two separate glyphs, one on left and one on right.
const BWRevathi_vowelsn_AU     = "\xC2\xB7";
const BWRevathi_vowelsn_AU2    = "\xE2\x88\x99";

//Chillu (5)
const BWRevathi_chillu_ENN     = "\xC3\x89";
const BWRevathi_chillu_IN      = "\xC3\x8F";
const BWRevathi_chillu_IR      = "\xC3\x9C";
const BWRevathi_chillu_IL      = "\xC3\x9E";
const BWRevathi_chillu_ILL     = "\xC3\xA0";

//vattulu (consonant $signs)
const BWRevathi_vattu_YA       = "\xC2\xBB";
const BWRevathi_vattu_RA       = "\xC2\xBD";
const BWRevathi_vattu_LA       = "\xC3\xBF";
const BWRevathi_vattu_VA       = "\xC2\xBC";

//kooTTaksharangngaL
const BWRevathi_conj_KK        = "\xC2\xBE";
const BWRevathi_conj_KSS       = "\xC3\x80";

const BWRevathi_conj_NGK       = "\xC3\x83";  
const BWRevathi_conj_NGNG      = "\xC3\x84";

const BWRevathi_conj_CC        = "\xC3\x85";
const BWRevathi_conj_CCH       = "\xC3\xAD";
const BWRevathi_conj_JJ        = "\xC3\xAE";
const BWRevathi_conj_NYC       = "\xC3\x86";
const BWRevathi_conj_NYNY      = "\xC3\x87";

const BWRevathi_conj_TTTT      = "\xC3\x88";
const BWRevathi_conj_NNTT      = "\xC3\x8A";
const BWRevathi_conj_NNDD      = "\xC3\xB6";

const BWRevathi_conj_T_T       = "\xC3\x8C";
const BWRevathi_conj_TBH       = "\xC3\xB3";
const BWRevathi_conj_DD        = "\xC3\x8D";
const BWRevathi_conj_D_DH      = "\xC3\x8E";
const BWRevathi_conj_NT        = "\xC3\x90";
const BWRevathi_conj_ND        = "\xC3\x91";
//cont BWRevathi_conj_NDH       = "\xC3\x9C";
const BWRevathi_conj_N_N       = "\xC3\x92";
const BWRevathi_conj_NM        = "\xC3\x93";
const BWRevathi_conj_NRR_1     = "\xC3\xBA"; 
const BWRevathi_conj_NRR_2     = "\xC3\x8F\xC2\xA6"; 

const BWRevathi_conj_PP        = "\xC3\x94";
const BWRevathi_conj_BB        = "\xC3\x96";
const BWRevathi_conj_MP        = "\xC3\x98";
const BWRevathi_conj_MM        = "\xC3\x99";

const BWRevathi_conj_YY        = "\xC3\x9B";
const BWRevathi_conj_L_L       = "\xC3\x9F";
const BWRevathi_conj_VV        = "\xC3\xA2";

const BWRevathi_conj_SHC       = "\xC3\xB5";
const BWRevathi_conj_SHSH      = "\xC3\xA4";
const BWRevathi_conj_SRRRR     = "\xC3\xA8";

const BWRevathi_conj_LLLL      = "\xC3\xA1";

const BWRevathi_conj_RRRR      = "\xC3\x9D"; //ta as in steel
//Not found in panchami
const BWRevathi_conj_GG        = "\xC3\x81";
const BWRevathi_conj_NN_NN     = "\xC3\x8B";
const BWRevathi_conj_ML        = "\xC3\x9A";
const BWRevathi_conj_SL        = "\xC3\xA5";
const BWRevathi_conj_S_S       = "\xC3\xA6";
const BWRevathi_conj_HL        = "\xC3\xA7";
const BWRevathi_conj_DD_DD     = "\xC3\xA9";
const BWRevathi_conj_KTT       = "\xC3\xAA";
const BWRevathi_conj_BDH       = "\xC3\xAB";
const BWRevathi_conj_BD        = "\xC3\xAC";
const BWRevathi_conj_NNM       = "\xC3\xAF";
const BWRevathi_conj_STH       = "\xC3\xB0";
const BWRevathi_conj_NTH       = "\xC3\xB1";
const BWRevathi_conj_JJH       = "\xC3\xB2";
const BWRevathi_conj_GM        = "\xC3\xB4";
const BWRevathi_conj_TM        = "\xC3\xB7";
const BWRevathi_conj_KT        = "\xC3\xB8";
const BWRevathi_conj_GN        = "\xC3\xB9";
const BWRevathi_conj_SSTT      = "\xC3\xBB";

//Digits
const BWRevathi_digit_ZERO     = "\x30";
const BWRevathi_digit_ONE      = "\x31";
const BWRevathi_digit_TWO      = "\x32";
const BWRevathi_digit_THREE    = "\x33";
const BWRevathi_digit_FOUR     = "\x34";
const BWRevathi_digit_FIVE     = "\x35";
const BWRevathi_digit_SIX      = "\x36";
const BWRevathi_digit_SEVEN    = "\x37";
const BWRevathi_digit_EIGHT    = "\x38";
const BWRevathi_digit_NINE     = "\x39";

//Matches ASCII from 00-0x7D
//Does not match ASCII
//cont BWRevathi_extra_QTSINGLE_1 = "\xE2\x80\x98";
//cont BWRevathi_extra_QTSINGLE_2 = "\xE2\x80\x99";
//cont BWRevathi_extra_QTDOUBLE_1 = "\xE2\x80\x9C";
//cont BWRevathi_extra_QTDOUBLE_2 = "\xE2\x80\x9D";
const BWRevathi_extra_HYPHEN     = "\xC3\xBE";

//Dont need
//cont BWRevathi_misc_UNKNOWN_1  = "\x2D";

}

$BWRevathi_toPadma = array();

$BWRevathi_toPadma[BWRevathi::BWRevathi_anusvara] = Padma::Padma_anusvara;
$BWRevathi_toPadma[BWRevathi::BWRevathi_visarga]  = Padma::Padma_visarga;
$BWRevathi_toPadma[BWRevathi::BWRevathi_virama]   = Padma::Padma_chandrakkala;

$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_A]  = Padma::Padma_vowel_A;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_AA] = Padma::Padma_vowel_AA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_I]  = Padma::Padma_vowel_I;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_II] = Padma::Padma_vowel_II;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_U]  = Padma::Padma_vowel_U;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_UU] = Padma::Padma_vowel_UU;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_R]  = Padma::Padma_vowel_R;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_RR] = Padma::Padma_vowel_RR;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_E]  = Padma::Padma_vowel_E;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_EE] = Padma::Padma_vowel_EE;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_AI] = Padma::Padma_vowel_AI;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_O]  = Padma::Padma_vowel_O;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_OO] = Padma::Padma_vowel_OO;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowel_AU] = Padma::Padma_vowel_AU;

$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_KA]  = Padma::Padma_consnt_KA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_KHA] = Padma::Padma_consnt_KHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_GA]  = Padma::Padma_consnt_GA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_GHA] = Padma::Padma_consnt_GHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_NGA] = Padma::Padma_consnt_NGA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_CA]  = Padma::Padma_consnt_CA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_CHA] = Padma::Padma_consnt_CHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_JA]  = Padma::Padma_consnt_JA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_JHA] = Padma::Padma_consnt_JHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_NYA] = Padma::Padma_consnt_NYA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_TTA]  = Padma::Padma_consnt_TTA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_DDA]  = Padma::Padma_consnt_DDA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_NNA]  = Padma::Padma_consnt_NNA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_TA]  = Padma::Padma_consnt_TA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_THA] = Padma::Padma_consnt_THA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_DA]  = Padma::Padma_consnt_DA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_DHA] = Padma::Padma_consnt_DHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_NA]  = Padma::Padma_consnt_NA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_PA]  = Padma::Padma_consnt_PA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_PHA] = Padma::Padma_consnt_PHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_BA]  = Padma::Padma_consnt_BA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_BHA] = Padma::Padma_consnt_BHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_MA]  = Padma::Padma_consnt_MA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_YA]  = Padma::Padma_consnt_YA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_RA]  = Padma::Padma_consnt_RA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_LA]  = Padma::Padma_consnt_LA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_VA]  = Padma::Padma_consnt_VA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_SHA] = Padma::Padma_consnt_SHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_SSA] = Padma::Padma_consnt_SSA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_SA]  = Padma::Padma_consnt_SA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_HA] = Padma::Padma_consnt_HA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_LLA] = Padma::Padma_consnt_LLA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_I]  = Padma::Padma_vowelsn_I;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_II] = Padma::Padma_vowelsn_II;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_U]  = Padma::Padma_vowelsn_U;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_R]  = Padma::Padma_vowelsn_R;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_E]  = Padma::Padma_vowelsn_E;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_AU] = Padma::Padma_vowelsn_AU;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vowelsn_AU2]= Padma::Padma_vowelsn_AU;

//Chillu
$BWRevathi_toPadma[BWRevathi::BWRevathi_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$BWRevathi_toPadma[BWRevathi::BWRevathi_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$BWRevathi_toPadma[BWRevathi::BWRevathi_chillu_IR]  = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$BWRevathi_toPadma[BWRevathi::BWRevathi_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$BWRevathi_toPadma[BWRevathi::BWRevathi_chillu_ILL] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//vattulu

$BWRevathi_toPadma[BWRevathi::BWRevathi_vattu_YA]  = Padma::Padma_vattu_YA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vattu_RA]  = Padma::Padma_vattu_RA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vattu_LA]  = Padma::Padma_vattu_LA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_vattu_VA]  = Padma::Padma_vattu_VA;

//kooTTaksharangngaL
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NGNG] = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_NGA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_CC]   = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_CCH]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_JJ]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NRR_1] = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NRR_2] = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_PP]  = Padma::Padma_consnt_PA .  Padma::Padma_vattu_PA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_BB]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_YY]  = Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_L_L] = Padma::Padma_consnt_LA .  Padma::Padma_vattu_LA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_VV]  = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_SHC]  = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_CA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_SHSH] = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_SHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_SRRRR]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_RRA . Padma::Padma_vattu_RRA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;

$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_RRRR] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;
//
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_GG]  = Padma::Padma_consnt_GA .  Padma::Padma_vattu_GA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NN_NN] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_NNA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_ML]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_LA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_SL]   = Padma::Padma_consnt_SA .  Padma::Padma_vattu_LA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_S_S]   = Padma::Padma_consnt_SA .  Padma::Padma_vattu_SA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_HL] = Padma::Padma_consnt_HA .  Padma::Padma_vattu_LA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_DD_DD]   = Padma::Padma_consnt_DDA .  Padma::Padma_vattu_DDA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_KTT]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TTA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_BDH]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_DHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_BD]   = Padma::Padma_consnt_BA .  Padma::Padma_vattu_DA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NNM] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_MA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_STH] = Padma::Padma_consnt_SA .  Padma::Padma_vattu_THA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_NTH]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_THA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_JJH]  = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JHA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_GM]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_MA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_TM] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_MA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_KT] = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_GN] = Padma::Padma_consnt_GA .  Padma::Padma_vattu_NA;
$BWRevathi_toPadma[BWRevathi::BWRevathi_conj_SSTT] = Padma::Padma_consnt_SSA .  Padma::Padma_vattu_TTA;

//Miscellaneous(where it doesn't match ASCII representation)
$BWRevathi_toPadma[BWRevathi::BWRevathi_extra_HYPHEN]   = '-';

$BWRevathi_redundantList = array();

$BWRevathi_prefixList = array();
$BWRevathi_prefixList[BWRevathi::BWRevathi_vattu_RA]   = true;
$BWRevathi_prefixList[BWRevathi::BWRevathi_vowelsn_E]  = true;
$BWRevathi_prefixList[BWRevathi::BWRevathi_vowelsn_EE] = true;
$BWRevathi_prefixList[BWRevathi::BWRevathi_vowelsn_AI] = true;

$BWRevathi_overloadList = array();
$BWRevathi_overloadList[BWRevathi::BWRevathi_vowel_I]        = true;
$BWRevathi_overloadList[BWRevathi::BWRevathi_vowel_U]        = true;
$BWRevathi_overloadList[BWRevathi::BWRevathi_vowel_R]        = true;
$BWRevathi_overloadList[BWRevathi::BWRevathi_vowel_O]        = true;
$BWRevathi_overloadList[BWRevathi::BWRevathi_chillu_IN]      = true;
$BWRevathi_overloadList[BWRevathi::BWRevathi_vowelsn_R]      = true;
$BWRevathi_overloadList[BWRevathi::BWRevathi_vowelsn_E]      = true;

function BWRevathi_initialize()
{
    global $fontinfo;

    $fontinfo["mlbw-ttrevathi"]["language"] = "Malayalam";
    $fontinfo["mlbw-ttrevathi"]["class"] = "BWRevathi";
}
?>
