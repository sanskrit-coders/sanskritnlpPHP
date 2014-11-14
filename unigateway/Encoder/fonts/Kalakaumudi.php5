<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
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

//Kalakaumudi Malayalam
class Kalakaumudi
{
function Kalakaumudi()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "Kalakaumudi";
var $displayName  = "Kalakaumudi";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup ($str) 
{
    global $Kalakaumudi_toPadma;
    return $Kalakaumudi_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $Kalakaumudi_prefixList;
    return array_key_exists($str, $Kalakaumudi_prefixList);
}

function isOverloaded ($str)
{
    global $Kalakaumudi_overloadList;
    return array_key_exists($str, $Kalakaumudi_overloadList);
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
    global $Kalakaumudi_redundantList;
    return array_key_exists($str, $Kalakaumudi_redundantList);
}

//Implementation details start here

//Specials
const Kalakaumudi_visarga        = "\xC2\xAF";
const Kalakaumudi_anusvara       = "\xC3\xAD";
const Kalakaumudi_virama         = "\xC2\xAE"; //Chandrakkala

//Vowels
const Kalakaumudi_vowel_A        = "\x41";
const Kalakaumudi_vowel_AA       = "\x42";
const Kalakaumudi_vowel_I        = "\x43";
const Kalakaumudi_vowel_II       = "\x43\xC3\xAC";
const Kalakaumudi_vowel_U        = "\x44";
const Kalakaumudi_vowel_UU       = "\x44\xC3\xAC";
const Kalakaumudi_vowel_R        = "\x45";
const Kalakaumudi_vowel_RR       = "\x45\xC3\xAC";
const Kalakaumudi_vowel_E        = "\x46";
const Kalakaumudi_vowel_EE       = "\x47";               
const Kalakaumudi_vowel_AI       = "\xC3\xAA\x46";
const Kalakaumudi_vowel_O        = "\x48";
const Kalakaumudi_vowel_OO       = "\x48\xC3\xA3";
const Kalakaumudi_vowel_AU       = "\x48\xC3\xAC";

//Consonants
const Kalakaumudi_consnt_KA      = "\xC2\xB4";
const Kalakaumudi_consnt_KHA     = "\xC2\xB5";
const Kalakaumudi_consnt_GA      = "\xC2\xB6";
const Kalakaumudi_consnt_GHA     = "\xC2\xB7";
const Kalakaumudi_consnt_GHA2    = "\xE2\x88\x99";

const Kalakaumudi_consnt_NGA     = "\xC2\xB8";

const Kalakaumudi_consnt_CA      = "\xC2\xB9";
const Kalakaumudi_consnt_CHA     = "\xC2\xBA";
const Kalakaumudi_consnt_JA      = "\xC2\xBB";
const Kalakaumudi_consnt_JHA     = "\xC2\xBC";
const Kalakaumudi_consnt_NYA     = "\xC2\xBD";

const Kalakaumudi_consnt_TTA     = "\xC2\xBE";
const Kalakaumudi_consnt_TTHA    = "\xC2\xBF";
const Kalakaumudi_consnt_DDA     = "\xC3\x80";
const Kalakaumudi_consnt_DDHA    = "\xC3\x81";
const Kalakaumudi_consnt_NNA     = "\xC3\x82";

const Kalakaumudi_consnt_TA      = "\xC3\x83";
const Kalakaumudi_consnt_THA     = "\xC3\x84";
const Kalakaumudi_consnt_DA      = "\x61";
const Kalakaumudi_consnt_DHA     = "\x62";
const Kalakaumudi_consnt_NA      = "\x63";

const Kalakaumudi_consnt_PA      = "\xC3\x8E";
const Kalakaumudi_consnt_PHA     = "\xC3\x8F";
const Kalakaumudi_consnt_BA      = "\xC3\x90";
const Kalakaumudi_consnt_BHA     = "\xC3\x91";
const Kalakaumudi_consnt_MA      = "\xC3\x92";

const Kalakaumudi_consnt_YA      = "\xC3\x93";
const Kalakaumudi_consnt_RA      = "\xC3\x94";
const Kalakaumudi_consnt_LA      = "\xC3\x95";
const Kalakaumudi_consnt_VA      = "\xC3\x96";
const Kalakaumudi_consnt_SHA     = "\xC3\x97";
const Kalakaumudi_consnt_SSA     = "\xC3\x98";
const Kalakaumudi_consnt_SA      = "\xC3\x99";

const Kalakaumudi_consnt_HA      = "\xC3\x9A";
const Kalakaumudi_consnt_LLA     = "\xC3\x9B";
const Kalakaumudi_consnt_ZHA     = "\xC3\x9C";
const Kalakaumudi_consnt_RRA     = "\xC3\x9D";

//Gunintamulu
const Kalakaumudi_vowelsn_AA     = "\xC3\xA3";
const Kalakaumudi_vowelsn_I      = "\xC3\xA4";
const Kalakaumudi_vowelsn_II     = "\xC3\xA5";
const Kalakaumudi_vowelsn_U      = "\xC3\xA6";
const Kalakaumudi_vowelsn_UU     = "\xC3\xA7";
const Kalakaumudi_vowelsn_R      = "\xC3\xA8";
const Kalakaumudi_vowelsn_RR     = "\xC3\xA3\xC3\xAC";
const Kalakaumudi_vowelsn_E      = "\xC3\xAA";
const Kalakaumudi_vowelsn_EE     = "\xC3\xAB";
const Kalakaumudi_vowelsn_AI     = "\xC3\xAA\xC3\xAA";
//vowel$signs o and O have two separate glyphs, one on left and one on right.
const Kalakaumudi_vowelsn_AU     = "\xC3\xAC";

//Chillu (5)
const Kalakaumudi_chillu_ENN     = "\xC3\xA2";
const Kalakaumudi_chillu_IN      = "\xC3\x9F";
const Kalakaumudi_chillu_IR      = "\xC3\x9E";
const Kalakaumudi_chillu_IL      = "\xC3\xA0";
const Kalakaumudi_chillu_ILL     = "\xC3\xA1";

//vattulu (consonant $signs)
const Kalakaumudi_vattu_YA       = "\xC3\xAE";
const Kalakaumudi_vattu_RA       = "\xC2\xB1";
const Kalakaumudi_vattu_VA       = "\xC3\xA9";
//half forms
const Kalakaumudi_vattu_SHA      = "\xC2\xA1";
const Kalakaumudi_vattu_MA       = "\xC2\xA2";
const Kalakaumudi_vattu_NNA      = "\xC2\xA3";
const Kalakaumudi_vattu_SA       = "\xC2\xA4";
const Kalakaumudi_vattu_PA       = "\xC2\xA5";
const Kalakaumudi_vattu_DHA      = "\xC2\xA6";
const Kalakaumudi_vattu_TTA      = "\xC2\xA7";
const Kalakaumudi_vattu_GA       = "\xC2\xA8";
const Kalakaumudi_vattu_LA       = "\xC2\xA9";
const Kalakaumudi_vattu_DDA      = "\xC2\xAA";
const Kalakaumudi_vattu_TA       = "\xC2\xAB";
const Kalakaumudi_vattu_NA       = "\xC2\xAC";
const Kalakaumudi_vattu_DA       = "\xC2\xAD";


//kooTTaksharangngaL doubles 

const Kalakaumudi_conj_KK        = "\x4A";
const Kalakaumudi_conj_CC        = "\x4B";
const Kalakaumudi_conj_TTTT      = "\x4C";
const Kalakaumudi_conj_T_T       = "\x4D";
const Kalakaumudi_conj_PP        = "\x4E";
const Kalakaumudi_conj_NGNG      = "\x4F";
const Kalakaumudi_conj_NYNY      = "\x50";
const Kalakaumudi_conj_NNNN      = "\x51";
const Kalakaumudi_conj_N_N       = "\x52";
const Kalakaumudi_conj_MM        = "\x53";
const Kalakaumudi_conj_LLLL      = "\x54";
const Kalakaumudi_conj_L_L       = "\x55";
const Kalakaumudi_conj_DD        = "\x56";
const Kalakaumudi_conj_RRRR      = "\x6D"; //ta as in steel
const Kalakaumudi_conj_YY        = "\x76";
const Kalakaumudi_conj_VV        = "\x77";
const Kalakaumudi_conj_BB        = "\x78";
const Kalakaumudi_conj_JJ        = "\x69";
const Kalakaumudi_conj_JJ1       = "\x68";

//kooTTaksharangngaL others

const Kalakaumudi_conj_NM        = "\x57";
const Kalakaumudi_conj_HM        = "\x58";
const Kalakaumudi_conj_NNM       = "\x59";
const Kalakaumudi_conj_GM        = "\x5A";
const Kalakaumudi_conj_TM        = "\x5B";

const Kalakaumudi_conj_NGK       = "\x5C";  
const Kalakaumudi_conj_KT        = "\x5D";
const Kalakaumudi_conj_KSS       = "\xC3\x88";
const Kalakaumudi_conj_TBH       = "\x64";
const Kalakaumudi_conj_T_TH      = "\x65";
const Kalakaumudi_conj_TN        = "\x66"; 
const Kalakaumudi_conj_JNY       = "\x67";
const Kalakaumudi_conj_CCH       = "\x6A";
const Kalakaumudi_conj_NYC       = "\x6B";
const Kalakaumudi_conj_SHC       = "\x6C";
const Kalakaumudi_conj_MP        = "\x6E";
const Kalakaumudi_conj_NNTT      = "\x6F";
const Kalakaumudi_conj_D_DH      = "\x70";
const Kalakaumudi_conj_HN        = "\x71";
const Kalakaumudi_conj_NDH       = "\x72";
const Kalakaumudi_conj_NTH       = "\x73";

const Kalakaumudi_conj_GN        = "\x74";
const Kalakaumudi_conj_NNDD      = "\x75";
const Kalakaumudi_conj_ND        = "\x7A";
const Kalakaumudi_conj_NT        = "\xC3\x89";
const Kalakaumudi_conj_NRR_1     = "\xC3\x8A"; 
const Kalakaumudi_conj_NRR_2     = "\xC3\x9F\xC3\x9D"; 
const Kalakaumudi_conj_TS        = "\xC3\x8B";
const Kalakaumudi_conj_STH       = "\xC3\x8C";
const Kalakaumudi_conj_SRRRR     = "\xC3\x8D";

const Kalakaumudi_conj_RU       = "\x79"; //addition


//Digits
const Kalakaumudi_digit_ZERO     = "\x30";
const Kalakaumudi_digit_ONE      = "\x31";
const Kalakaumudi_digit_TWO      = "\x32";
const Kalakaumudi_digit_THREE    = "\x33";
const Kalakaumudi_digit_FOUR     = "\x34";
const Kalakaumudi_digit_FIVE     = "\x35";
const Kalakaumudi_digit_SIX      = "\x36";
const Kalakaumudi_digit_SEVEN    = "\x37";
const Kalakaumudi_digit_EIGHT    = "\x38";
const Kalakaumudi_digit_NINE     = "\x39";

//Matches ASCII
const Kalakaumudi_EXCLAM         = "\x21";
const Kalakaumudi_NUMBER         = "\x23";
const Kalakaumudi_PERCENT        = "\x25";
const Kalakaumudi_AMBERSAND      = "\x26";
const Kalakaumudi_PARENLEFT      = "\x28";
const Kalakaumudi_PARENRIGT      = "\x29";
const Kalakaumudi_ASTERISK       = "\x2A";
const Kalakaumudi_PLUS           = "\x2B";
const Kalakaumudi_COMMA          = "\x2C";
const Kalakaumudi_PERIOD         = "\x2E";
const Kalakaumudi_SLASH          = "\x2F";
const Kalakaumudi_COLON          = "\x3A";
const Kalakaumudi_SEMICOLON      = "\x3B";
const Kalakaumudi_LESSTHAN       = "\x3C";
const Kalakaumudi_EQUALS         = "\x3D";
const Kalakaumudi_GREATERTHAN    = "\x3E";
const Kalakaumudi_QUESTION       = "\x3F";
const Kalakaumudi_ATRATE         = "\x40";
const Kalakaumudi_LEFTCURLY      = "\x7B";
const Kalakaumudi_VERTLINE       = "\x7C";
const Kalakaumudi_RIGHTCURLY     = "\x7D";

const Kalakaumudi_BULLET         = "\xE2\x80\xA2";
const Kalakaumudi_RTDOUBLE       = "\xE2\x80\x9D";
const Kalakaumudi_LTDOUBLE       = "\xE2\x80\x9C";
const Kalakaumudi_RTSINGLE       = "\xE2\x80\x99";
const Kalakaumudi_LTSINGLE       = "\xE2\x80\x98";
const Kalakaumudi_ENDASH         = "\xE2\x80\x93";

//Does not match ASCII
const Kalakaumudi_extra_RTSINGLE = "\x27";
const Kalakaumudi_extra_LTSINGLE = "\x22";
const Kalakaumudi_extra_ASTERISK = "\xC2\xB2";
const Kalakaumudi_extra_HYPHEN   = "\x7E";
const Kalakaumudi_extra_BULLET   = "\x24";
const Kalakaumudi_extra_LTPAR    = "\xC3\x85";
const Kalakaumudi_extra_SLASH    = "\xC3\x86";
const Kalakaumudi_extra_RTPAR    = "\xC3\x87";
const Kalakaumudi_extra_ENDASH   = "\x5F";

//Dont need
const Kalakaumudi_misc_UNKNOWN_1  = "\x2D";

}

$Kalakaumudi_toPadma = array();

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_anusvara] = Padma::Padma_anusvara;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_visarga]  = Padma::Padma_visarga;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_virama]   = Padma::Padma_chandrakkala;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_A]  = Padma::Padma_vowel_A;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_AA] = Padma::Padma_vowel_AA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_I]  = Padma::Padma_vowel_I;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_II] = Padma::Padma_vowel_II;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_U]  = Padma::Padma_vowel_U;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_UU] = Padma::Padma_vowel_UU;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_R]  = Padma::Padma_vowel_R;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_RR] = Padma::Padma_vowel_RR;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_E]  = Padma::Padma_vowel_E;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_EE] = Padma::Padma_vowel_EE;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_AI] = Padma::Padma_vowel_AI;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_O]  = Padma::Padma_vowel_O;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_OO] = Padma::Padma_vowel_OO;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowel_AU] = Padma::Padma_vowel_AU;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_KA]  = Padma::Padma_consnt_KA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_KHA] = Padma::Padma_consnt_KHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_GA]  = Padma::Padma_consnt_GA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_GHA] = Padma::Padma_consnt_GHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_GHA2] = Padma::Padma_consnt_GHA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_NGA] = Padma::Padma_consnt_NGA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_CA]  = Padma::Padma_consnt_CA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_CHA] = Padma::Padma_consnt_CHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_JA]  = Padma::Padma_consnt_JA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_JHA] = Padma::Padma_consnt_JHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_NYA] = Padma::Padma_consnt_NYA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_TTA]  = Padma::Padma_consnt_TTA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_DDA]  = Padma::Padma_consnt_DDA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_NNA]  = Padma::Padma_consnt_NNA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_TA]  = Padma::Padma_consnt_TA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_THA] = Padma::Padma_consnt_THA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_DA]  = Padma::Padma_consnt_DA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_DHA] = Padma::Padma_consnt_DHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_NA]  = Padma::Padma_consnt_NA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_PA]  = Padma::Padma_consnt_PA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_PHA] = Padma::Padma_consnt_PHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_BA]  = Padma::Padma_consnt_BA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_BHA] = Padma::Padma_consnt_BHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_MA]  = Padma::Padma_consnt_MA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_YA]  = Padma::Padma_consnt_YA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_RA]  = Padma::Padma_consnt_RA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_LA]  = Padma::Padma_consnt_LA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_VA]  = Padma::Padma_consnt_VA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_SHA] = Padma::Padma_consnt_SHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_SSA] = Padma::Padma_consnt_SSA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_SA]  = Padma::Padma_consnt_SA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_HA] = Padma::Padma_consnt_HA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_LLA] = Padma::Padma_consnt_LLA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_II] = Padma::Padma_vowelsn_II;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_U]  = Padma::Padma_vowelsn_U;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_E]  = Padma::Padma_vowelsn_E;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Chillu
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_chillu_IR]  = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_chillu_ILL] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//half forms
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_YA]  = Padma::Padma_vattu_YA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_RA]  = Padma::Padma_vattu_RA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_VA]  = Padma::Padma_vattu_VA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_SHA] = Padma::Padma_vattu_SHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_MA]  = Padma::Padma_vattu_MA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_NNA] = Padma::Padma_vattu_NNA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_SA]  = Padma::Padma_vattu_SA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_PA]  = Padma::Padma_vattu_PA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_DHA] = Padma::Padma_vattu_DHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_TTA] = Padma::Padma_vattu_TTA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_GA]  = Padma::Padma_vattu_GA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_LA]  = Padma::Padma_vattu_LA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_DDA] = Padma::Padma_vattu_DDA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_TA]  = Padma::Padma_vattu_TA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_NA]  = Padma::Padma_vattu_NA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_vattu_DA]  = Padma::Padma_vattu_DA;


//kooTTaksharangngaL


$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_KT]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_KSS]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_SSA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_GN]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_NA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_GM]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_MA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NGNG] = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_NGA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_CC]   = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_CCH]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_JJ]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_JJ1]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_JNY]  = Padma::Padma_consnt_JA .  Padma::Padma_vattu_NYA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NNNN] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_NNA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NNM]  = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_MA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_T_TH] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_THA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_TM]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_MA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_TS]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_SA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NTH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_THA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NDH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DHA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NRR_1]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_NRR_2]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;


$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_BB]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_YY]= Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_VV]  = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_L_L]  = Padma::Padma_consnt_LA .  Padma::Padma_vattu_LA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_PP]  = Padma::Padma_consnt_PA .  Padma::Padma_vattu_PA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_STH]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_THA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_SRRRR]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_RRA . Padma::Padma_vattu_RRA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_HN]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_NA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_HM]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_MA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_RRRR] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_RU]  = Padma::Padma_consnt_RA .  Padma::Padma_vowelsn_U;

$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_conj_TN] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_NA;


//Miscellaneous(where it doesn't match ASCII representation)
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_extra_RTSINGLE] = Kalakaumudi::Kalakaumudi_RTSINGLE;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_extra_LTSINGLE] = Kalakaumudi::Kalakaumudi_LTSINGLE;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_extra_ASTERISK] = '*';
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_extra_HYPHEN] = Kalakaumudi::Kalakaumudi_ENDASH;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_extra_ENDASH] = Kalakaumudi::Kalakaumudi_ENDASH;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_extra_BULLET] = Kalakaumudi::Kalakaumudi_BULLET;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_extra_LTPAR] = Kalakaumudi::Kalakaumudi_PARENLEFT;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_extra_RTPAR] = Kalakaumudi::Kalakaumudi_PARENRIGT;
$Kalakaumudi_toPadma[Kalakaumudi::Kalakaumudi_extra_SLASH]   = Kalakaumudi::Kalakaumudi_SLASH;


$Kalakaumudi_redundantList = array();
$Kalakaumudi_redundantList[Kalakaumudi::Kalakaumudi_misc_UNKNOWN_1] = true;

$Kalakaumudi_prefixList = array();
$Kalakaumudi_prefixList[Kalakaumudi::Kalakaumudi_vattu_RA]   = true;
$Kalakaumudi_prefixList[Kalakaumudi::Kalakaumudi_vowelsn_E]  = true;
$Kalakaumudi_prefixList[Kalakaumudi::Kalakaumudi_vowelsn_EE] = true;
$Kalakaumudi_prefixList[Kalakaumudi::Kalakaumudi_vowelsn_AI] = true;

$Kalakaumudi_overloadList = array();
$Kalakaumudi_overloadList[Kalakaumudi::Kalakaumudi_vowel_I]        = true;
$Kalakaumudi_overloadList[Kalakaumudi::Kalakaumudi_vowel_U]        = true;
$Kalakaumudi_overloadList[Kalakaumudi::Kalakaumudi_vowel_R]        = true;
$Kalakaumudi_overloadList[Kalakaumudi::Kalakaumudi_vowel_O]        = true;
$Kalakaumudi_overloadList[Kalakaumudi::Kalakaumudi_vowelsn_R]      = true;
$Kalakaumudi_overloadList[Kalakaumudi::Kalakaumudi_vowelsn_E]      = true;
$Kalakaumudi_overloadList[Kalakaumudi::Kalakaumudi_chillu_IN]      = true;

function Kalakaumudi_initialize()
{
    global $fontinfo;

    $fontinfo["kalakaumudi"]["language"] = "Malayalam";
    $fontinfo["kalakaumudi"]["class"] = "Kalakaumudi";
}
?>
