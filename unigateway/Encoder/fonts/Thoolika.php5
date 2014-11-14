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

//Thoolika Malayalam
class Thoolika
{
function Thoolika()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "Thoolika";
var $displayName  = "Thoolika";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup($str) 
{
    global $Thoolika_toPadma;
    return $Thoolika_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global  $Thoolika_prefixList;
    return $Thoolika_prefixList[$str] != null;
}

function isOverloaded($str)
{
   global $Thoolika_overloadList; 
   return $Thoolika_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_E))
        return Padma::Padma_vowelsn_O;
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 ==Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;
}

function isRedundant($str)
{
   global $Thoolika_redundantList; 
   return $Thoolika_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const Thoolika_visarga        = "\xC2\xAF";  //Y
const Thoolika_anusvara       = "\xC2\xAB";  //Y
const Thoolika_virama         = "\xC2\xAE"; //Chandrakkala  //Y

//Vowels
const Thoolika_vowel_A        = "\x41";  //Y
const Thoolika_vowel_AA       = "\x42";  //Y
const Thoolika_vowel_I        = "\x43";  //Y
const Thoolika_vowel_II       = "\x43\xC2\xAA";  //Y
const Thoolika_vowel_U        = "\x44"; //Y
const Thoolika_vowel_UU       = "\x44\xC2\xAA";  //Y
const Thoolika_vowel_R        = "\x45";  //Y
const Thoolika_vowel_RR       = "\x45\xC2\xAA";  //Y
const Thoolika_vowel_E        = "\x46";  //Y
const Thoolika_vowel_EE       = "\x47";  //Y
const Thoolika_vowel_AI       = "\xC2\xA8\x46";  //Y
const Thoolika_vowel_O        = "\x48";  //Y
const Thoolika_vowel_OO       = "\x48\xC2\xA1";  //Y
const Thoolika_vowel_AU       = "\x48\xC2\xAA";  //Y

//Consonants
const Thoolika_consnt_KA      = "\x4A";  //Y
const Thoolika_consnt_KHA     = "\x4B";  //Y
const Thoolika_consnt_GA      = "\x4C";  //Y
const Thoolika_consnt_GHA     = "\x4D";  //Y
const Thoolika_consnt_NGA     = "\x4E";  //Y

const Thoolika_consnt_CA      = "\x4F";  //Y
const Thoolika_consnt_CHA     = "\x50";  //Y
const Thoolika_consnt_JA      = "\x51";  //Y
const Thoolika_consnt_JHA     = "\x52";  //Y
const Thoolika_consnt_NYA     = "\x53";  //Y

const Thoolika_consnt_TTA     = "\x54";  //Y
const Thoolika_consnt_TTHA    = "\x55";  //Y
const Thoolika_consnt_DDA     = "\x56";  //Y
const Thoolika_consnt_DDHA    = "\x57";  //Y
const Thoolika_consnt_NNA     = "\x58";  //Y

const Thoolika_consnt_TA      = "\x59";  //Y
const Thoolika_consnt_THA     = "\x5A";  //Y
const Thoolika_consnt_DA      = "\x61";  //Y
const Thoolika_consnt_DHA     = "\x62";  //Y
const Thoolika_consnt_NA      = "\x63";  //Y

const Thoolika_consnt_PA      = "\x64";  //Y
const Thoolika_consnt_PHA     = "\x65";  //Y
const Thoolika_consnt_BA      = "\x66";  //Y
const Thoolika_consnt_BHA     = "\x67";  //Y
const Thoolika_consnt_MA      = "\x68";  //Y

const Thoolika_consnt_YA      = "\x69";  //Y
const Thoolika_consnt_RA      = "\x6A";  //Y
const Thoolika_consnt_LA      = "\x6B";  //Y
const Thoolika_consnt_VA      = "\x6C";  //Y
const Thoolika_consnt_SHA     = "\x6D";  //Y
const Thoolika_consnt_SSA     = "\x6E";  //Y
const Thoolika_consnt_SA      = "\x6F";  //Y

const Thoolika_consnt_HA      = "\x70";  //Y
const Thoolika_consnt_LLA     = "\x71";  //Y
const Thoolika_consnt_ZHA     = "\x72";  //Y
const Thoolika_consnt_RRA     = "\x73";  //Y

//Gunintamulu
const Thoolika_vowelsn_AA     = "\xC2\xA1";  //Y
const Thoolika_vowelsn_I      = "\xC2\xA2";  //Y
const Thoolika_vowelsn_II     = "\xC2\xA3";  //Y
const Thoolika_vowelsn_U      = "\xC2\xA4";  //Y
const Thoolika_vowelsn_UU     = "\xC2\xA5";  //Y
const Thoolika_vowelsn_R      = "\xC2\xA6";  //Y
const Thoolika_vowelsn_RR     = "\xC2\xA6\xC2\xAA";  //Y
const Thoolika_vowelsn_E      = "\xC2\xA8";  //Y
const Thoolika_vowelsn_EE     = "\xC2\xA9";  //Y
const Thoolika_vowelsn_AI     = "\xC2\xA8\xC2\xA8";  //Y
//vowelsigns o and O have two separate glyphs, one on left and one on right_
const Thoolika_vowelsn_AU     = "\xC2\xAA";  //Y

//Chillu (5)
const Thoolika_chillu_ENN     = "\x78";  //Y
const Thoolika_chillu_IN      = "\x75";  //Y
const Thoolika_chillu_IR_1    = "\x74";  //Y
const Thoolika_chillu_IR_2    = "\xE2\x80\x94";  //Y
const Thoolika_chillu_IL      = "\x76";  //Y
const Thoolika_chillu_ILL     = "\x77";  //Y

//vattulu (consonant signs)
const Thoolika_vattu_GA       = "\xC3\xAA";  //Y
const Thoolika_vattu_TTA      = "\xC3\xA9";  //Y
const Thoolika_vattu_DDA      = "\xC3\xAC";  //Y
const Thoolika_vattu_NNA      = "\xC3\xA5";  //Y
const Thoolika_vattu_TA       = "\xC3\xAD";  //Y
const Thoolika_vattu_DA       = "\xC3\xAF";  //Y
const Thoolika_vattu_DHA      = "\xC3\xA8";  //Y
const Thoolika_vattu_NA       = "\xC3\xAE";  //Y
const Thoolika_vattu_PA       = "\xC3\xA7";  //Y
const Thoolika_vattu_MA       = "\xC3\xA4";  //Y
const Thoolika_vattu_YA       = "\xC2\xAC";  //Y
const Thoolika_vattu_RA       = "\xC2\xB1";  //Y
const Thoolika_vattu_VA       = "\xC2\xA7";  //Y
const Thoolika_vattu_SHA      = "\xC3\xA3";  //Y
const Thoolika_vattu_SA       = "\xC3\xA6";  //Y
const Thoolika_vattu_LLA      = "\xC3\xAB";  //Y

//kooconst TTaksharangngaL
const Thoolika_conj_KK        = "\xC2\xB4";  //Y
const Thoolika_conj_KT        = "\xC3\x87";  //Y
const Thoolika_conj_KSH       = "\xC3\x88";  //Y
const Thoolika_conj_GN        = "\xC3\x9E";  //Y
const Thoolika_conj_GM        = "\xC3\x84";  //Y
const Thoolika_conj_NGK       = "\xC3\x86";  //Y
const Thoolika_conj_NGNG      = "\xC2\xB9";  //Y

const Thoolika_conj_CC        = "\xC2\xB5";  //Y
const Thoolika_conj_CCH       = "\xC3\x94";  //Y
const Thoolika_conj_JJ        = "\xC3\x92";  //Y
const Thoolika_conj_JNY       = "\xC3\x91";  //Y
const Thoolika_conj_NYC       = "\xC3\x95";  //Y
const Thoolika_conj_NYJ       = "\xC3\x93";  //Y
const Thoolika_conj_NYNY      = "\xC2\xBA";  //Y

const Thoolika_conj_TTTT      = "\xC2\xB6";  //Y
const Thoolika_conj_NNTT      = "\xC3\x99";  //Y
const Thoolika_conj_NNDD      = "\xC3\x9F";  //Y
const Thoolika_conj_NNNN      = "\xC2\xBB";  //Y
const Thoolika_conj_NNM       = "\xC3\x83";  //Y

const Thoolika_conj_T_T       = "\xC2\xB7";  //Y
const Thoolika_conj_T_TH      = "\xC3\x8F";  //Y
const Thoolika_conj_TN        = "\xC3\x90";  //Y
const Thoolika_conj_TBH       = "\xC3\x8E";  //Y
const Thoolika_conj_TM        = "\xC3\x85";  //Y
const Thoolika_conj_TS        = "\xC3\x8B";  //Y
const Thoolika_conj_DD        = "\xC3\x80";  //Y
const Thoolika_conj_D_DH      = "\xC3\x9A";  //Y
const Thoolika_conj_NT        = "\xC3\x89";  //Y
const Thoolika_conj_NTH       = "\xC3\x9D";  //Y
const Thoolika_conj_ND        = "\x7A";  //Y
const Thoolika_conj_NDH       = "\xC3\x9C";  //Y
const Thoolika_conj_N_N       = "\xC2\xBC";  //Y
const Thoolika_conj_NM        = "\xC3\x81";  //Y
const Thoolika_conj_NRR       = "\xC3\x8A";  //Y
//const Thoolika_conj_NAU       = "\x63"; //npollu for me, nau for paul

const Thoolika_conj_PP        = "\xC2\xB8";  //Y
const Thoolika_conj_BB        = "\xC3\xA2";  //Y
const Thoolika_conj_MP        = "\xC3\x98";  //Y
const Thoolika_conj_MM        = "\xC2\xBD";  //Y

const Thoolika_conj_YY        = "\xC3\xA0";  //Y
const Thoolika_conj_L_L       = "\xC2\xBF";  //Y
const Thoolika_conj_VV        = "\xC3\xA1";  //Y

const Thoolika_conj_SHC       = "\xC3\x96";  //Y
const Thoolika_conj_STH       = "\xC3\x8C";  //Y
const Thoolika_conj_SRR       = "\xC3\x8D";  //Y

const Thoolika_conj_HN        = "\xC3\x9B";  //Y
const Thoolika_conj_HM        = "\xC3\x82";  //Y
const Thoolika_conj_LLLL      = "\xC2\xBE";  //Y
const Thoolika_conj_RRRR      = "\xC3\x97"; //ta as in steel

//Consonat(s) + vowel combinations
const Thoolika_combo_RU       = "\x79";  //Y

//Digits
const Thoolika_digit_ZERO     = "\x30";  //Y
const Thoolika_digit_ONE      = "\x31";  //Y
const Thoolika_digit_TWO      = "\x32";  //Y
const Thoolika_digit_THREE    = "\x33";  //Y
const Thoolika_digit_FOUR     = "\x34";  //Y
const Thoolika_digit_FIVE     = "\x35";  //Y
const Thoolika_digit_SIX      = "\x36";  //Y
const Thoolika_digit_SEVEN    = "\x37";  //Y
const Thoolika_digit_EIGHT    = "\x38";  //Y
const Thoolika_digit_NINE     = "\x39";  //Y

//Matches ASCII
const Thoolika_EXCLAM         = "\x21";  //Y
const Thoolika_QTDOUBLE       = "\x22";  //Y
const Thoolika_POUND          = "\x23";  //Y
const Thoolika_DOLLAR         = "\x24";  //Y
const Thoolika_PERCENT        = "\x25";  //Y
const Thoolika_AMPERSAND      = "\x26";  //Y
const Thoolika_QTSINGLE       = "\x27";  //Y
const Thoolika_PARENLEFT      = "\x28";  //Y
const Thoolika_PARENRIGT      = "\x29";  //Y
const Thoolika_ASTERISK       = "\x2A";  //Y
const Thoolika_PLUS           = "\x2B";  //Y
const Thoolika_COMMA          = "\x2C";  //Y
const Thoolika_PERIOD         = "\x2E";  //Y
const Thoolika_SLASH          = "\x2F";  //Y
const Thoolika_COLON          = "\x3A";  //Y
const Thoolika_SEMICOLON      = "\x3B";  //Y
const Thoolika_LESSTHAN       = "\x3C";  //Y
const Thoolika_EQUALS         = "\x3D";  //Y
const Thoolika_GREATERTHAN    = "\x3E";  //Y
const Thoolika_QUESTION       = "\x3F";  //Y
const Thoolika_ATSIGN         = "\x40";
const Thoolika_SQBKTLEFT      = "\x5B";  //Y
const Thoolika_BACKSLASH      = "\x5C";  //Y
const Thoolika_SQBKTRIGHT     = "\x5D";  //Y
const Thoolika_CARET          = "\x5E";  //Y
const Thoolika_PARENCLEFT      = "\x7B";  //Y
const Thoolika_PIPE           = "\x7C";  //Y
const Thoolika_PARENRIGHT     = "\x7D";  //Y

//Does not match ASCII
const Thoolika_extra_QTSINGLE_1 = "\x60";  //Y
const Thoolika_extra_QTSINGLE_2 = "\xE2\x80\x98";  //Y
const Thoolika_extra_QTSINGLE_3 = "\xE2\x80\x99";  //Y
const Thoolika_extra_DBLQT_1    = "\xE2\x80\x9C";  //Y
const Thoolika_extra_DBLQT_2    = "\xE2\x80\x9D";  //Y
const Thoolika_extra_PERIOD     = "\xE2\x80\xA2";  //Y
const Thoolika_extra_ASTERISK   = "\xC2\xB2";  //Y
const Thoolika_extra_HYPHEN_1   = "\x5F";  //Y
const Thoolika_extra_HYPHEN_2   = "\x7E";  //Y
const Thoolika_extra_HYPHEN_3   = "\xE2\x80\x93";  //Y

//Dont need
const Thoolika_misc_UNKNOWN_1  = "\x2D";

}
$Thoolika_toPadma = array();

$Thoolika_toPadma[Thoolika::Thoolika_anusvara] = Padma::Padma_anusvara;
$Thoolika_toPadma[Thoolika::Thoolika_visarga]  = Padma::Padma_visarga;
$Thoolika_toPadma[Thoolika::Thoolika_virama]   = Padma::Padma_chandrakkala;

$Thoolika_toPadma[Thoolika::Thoolika_vowel_A]  = Padma::Padma_vowel_A;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_AA] = Padma::Padma_vowel_AA;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_I]  = Padma::Padma_vowel_I;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_II] = Padma::Padma_vowel_II;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_U]  = Padma::Padma_vowel_U;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_UU] = Padma::Padma_vowel_UU;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_R]  = Padma::Padma_vowel_R;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_RR] = Padma::Padma_vowel_RR;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_E]  = Padma::Padma_vowel_E;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_EE] = Padma::Padma_vowel_EE;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_AI] = Padma::Padma_vowel_AI;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_O]  = Padma::Padma_vowel_O;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_OO] = Padma::Padma_vowel_OO;
$Thoolika_toPadma[Thoolika::Thoolika_vowel_AU] = Padma::Padma_vowel_AU;

$Thoolika_toPadma[Thoolika::Thoolika_consnt_KA]  = Padma::Padma_consnt_KA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_KHA] = Padma::Padma_consnt_KHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_GA]  = Padma::Padma_consnt_GA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_GHA] = Padma::Padma_consnt_GHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_NGA] = Padma::Padma_consnt_NGA;

$Thoolika_toPadma[Thoolika::Thoolika_consnt_CA]  = Padma::Padma_consnt_CA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_CHA] = Padma::Padma_consnt_CHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_JA]  = Padma::Padma_consnt_JA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_JHA] = Padma::Padma_consnt_JHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_NYA] = Padma::Padma_consnt_NYA;

$Thoolika_toPadma[Thoolika::Thoolika_consnt_TTA]  = Padma::Padma_consnt_TTA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_DDA]  = Padma::Padma_consnt_DDA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_NNA]  = Padma::Padma_consnt_NNA;

$Thoolika_toPadma[Thoolika::Thoolika_consnt_TA]  = Padma::Padma_consnt_TA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_THA] = Padma::Padma_consnt_THA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_DA]  = Padma::Padma_consnt_DA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_DHA] = Padma::Padma_consnt_DHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_NA]  = Padma::Padma_consnt_NA;

$Thoolika_toPadma[Thoolika::Thoolika_consnt_PA]  = Padma::Padma_consnt_PA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_PHA] = Padma::Padma_consnt_PHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_BA]  = Padma::Padma_consnt_BA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_BHA] = Padma::Padma_consnt_BHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_MA]  = Padma::Padma_consnt_MA;

$Thoolika_toPadma[Thoolika::Thoolika_consnt_YA]  = Padma::Padma_consnt_YA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_RA]  = Padma::Padma_consnt_RA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_LA]  = Padma::Padma_consnt_LA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_VA]  = Padma::Padma_consnt_VA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_SHA] = Padma::Padma_consnt_SHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_SSA] = Padma::Padma_consnt_SSA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_SA]  = Padma::Padma_consnt_SA;

$Thoolika_toPadma[Thoolika::Thoolika_consnt_HA] = Padma::Padma_consnt_HA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_LLA] = Padma::Padma_consnt_LLA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$Thoolika_toPadma[Thoolika::Thoolika_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_II] = Padma::Padma_vowelsn_II;
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_U]  = Padma::Padma_vowelsn_U;
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_E]  = Padma::Padma_vowelsn_E;
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Thoolika_toPadma[Thoolika::Thoolika_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Chillu
$Thoolika_toPadma[Thoolika::Thoolika_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$Thoolika_toPadma[Thoolika::Thoolika_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$Thoolika_toPadma[Thoolika::Thoolika_chillu_IR_1] = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Thoolika_toPadma[Thoolika::Thoolika_chillu_IR_2] = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$Thoolika_toPadma[Thoolika::Thoolika_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$Thoolika_toPadma[Thoolika::Thoolika_chillu_ILL] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//vattulu
$Thoolika_toPadma[Thoolika::Thoolika_vattu_GA]  = Padma::Padma_vattu_GA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_TTA] = Padma::Padma_vattu_TTA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_DDA] = Padma::Padma_vattu_DDA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_NNA] = Padma::Padma_vattu_NNA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_TA]  = Padma::Padma_vattu_TA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_DA]  = Padma::Padma_vattu_DA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_DHA] = Padma::Padma_vattu_DHA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_NA]  = Padma::Padma_vattu_NA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_PA]  = Padma::Padma_vattu_PA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_MA]  = Padma::Padma_vattu_MA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_YA]  = Padma::Padma_vattu_YA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_RA]  = Padma::Padma_vattu_RA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_VA]  = Padma::Padma_vattu_VA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_SHA] = Padma::Padma_vattu_SHA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_SA]  = Padma::Padma_vattu_SA;
$Thoolika_toPadma[Thoolika::Thoolika_vattu_LLA] = Padma::Padma_vattu_LLA;

//koo$TTaksharangngaL
$Thoolika_toPadma[Thoolika::Thoolika_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_KT]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_KSH]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_SSA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_GN]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_NA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_GM]   = Padma::Padma_consnt_GA .  Padma::Padma_vattu_MA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NGNG] = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_NGA;

$Thoolika_toPadma[Thoolika::Thoolika_conj_CC]   = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_CCH]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CHA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_JJ]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_JNY]  = Padma::Padma_consnt_JA .  Padma::Padma_vattu_NYA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NYJ]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_JA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;

$Thoolika_toPadma[Thoolika::Thoolika_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NNNN] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_NNA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NNM]  = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_MA;

$Thoolika_toPadma[Thoolika::Thoolika_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_T_TH] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_THA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_TN]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_NA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_TM]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_MA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_TS]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_SA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NTH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_THA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NDH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DHA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_NRR]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;
//$Thoolika_toPadma[Thoolika::Thoolika_conj_NAU]  = Padma::Padma_consnt_NA . $Padma::Padma_chandrakkala;

$Thoolika_toPadma[Thoolika::Thoolika_conj_PP]  = Padma::Padma_consnt_PA .  Padma::Padma_vattu_PA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_BB]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;

$Thoolika_toPadma[Thoolika::Thoolika_conj_YY]  = Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_L_L] = Padma::Padma_consnt_LA .  Padma::Padma_vattu_LA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_VV]  = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;

$Thoolika_toPadma[Thoolika::Thoolika_conj_SHC]  = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_CA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_STH]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_THA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_SRR]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_RRA;

$Thoolika_toPadma[Thoolika::Thoolika_conj_HN]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_NA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_HM]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_MA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;
$Thoolika_toPadma[Thoolika::Thoolika_conj_RRRR] = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;

//Consonant(s) . Vowel Sign
$Thoolika_toPadma[Thoolika::Thoolika_combo_RU]    = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;

//Miscellaneous(where it doesn't match ASCII representation)
$Thoolika_toPadma[Thoolika::Thoolika_extra_QTSINGLE_1] = Thoolika::Thoolika_QTSINGLE;
$Thoolika_toPadma[Thoolika::Thoolika_extra_QTSINGLE_2] = Thoolika::Thoolika_QTSINGLE;
$Thoolika_toPadma[Thoolika::Thoolika_extra_QTSINGLE_3] = Thoolika::Thoolika_QTSINGLE;
$Thoolika_toPadma[Thoolika::Thoolika_extra_DBLQT_1]    = '"';
$Thoolika_toPadma[Thoolika::Thoolika_extra_DBLQT_2]    = '"';
$Thoolika_toPadma[Thoolika::Thoolika_extra_PERIOD]     = '.';
$Thoolika_toPadma[Thoolika::Thoolika_extra_ASTERISK]   = '*';
$Thoolika_toPadma[Thoolika::Thoolika_extra_HYPHEN_1]   = '-';
$Thoolika_toPadma[Thoolika::Thoolika_extra_HYPHEN_2]   = '-';
$Thoolika_toPadma[Thoolika::Thoolika_extra_HYPHEN_3]   = '-';

$Thoolika_redundantList = array();
$Thoolika_redundantList[Thoolika::Thoolika_misc_UNKNOWN_1] = true;

$Thoolika_prefixList = array();
$Thoolika_prefixList[Thoolika::Thoolika_vattu_RA]   = true;
$Thoolika_prefixList[Thoolika::Thoolika_vowelsn_E]  = true;
$Thoolika_prefixList[Thoolika::Thoolika_vowelsn_EE] = true;
$Thoolika_prefixList[Thoolika::Thoolika_vowelsn_AI] = true;

$Thoolika_overloadList = array();
$Thoolika_overloadList[Thoolika::Thoolika_vowel_I]        = true;
$Thoolika_overloadList[Thoolika::Thoolika_vowel_U]        = true;
$Thoolika_overloadList[Thoolika::Thoolika_vowel_R]        = true;
$Thoolika_overloadList[Thoolika::Thoolika_vowel_O]        = true;
$Thoolika_overloadList[Thoolika::Thoolika_vowelsn_R]      = true;
$Thoolika_overloadList[Thoolika::Thoolika_vowelsn_E]      = true;

function Thoolika_initialize()
{
    global $fontinfo;

    $fontinfo["thoolika"]["language"] = "Malayalam";
    $fontinfo["thoolika"]["class"] = "Thoolika";
}
?>
