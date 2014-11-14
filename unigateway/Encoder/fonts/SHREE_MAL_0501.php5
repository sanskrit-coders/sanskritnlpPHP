<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2006 HarshitaVani         <harshita@atc.tcs.com>
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

//SHREE_MAL_0501 Malayalam
class SHREE_MAL_0501
{
function SHREE_MAL_0501()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "Shree-Mal-0501";
var $displayName  = "SHREE_MAL_0501";
var $script       = Padma::Padma_script_MALAYALAM;

function lookup($str) 
{
    global $SHREE_MAL_0501_toPadma;
    return $SHREE_MAL_0501_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global  $SHREE_MAL_0501_prefixList;
    return $SHREE_MAL_0501_prefixList[$str] != null;
}

function isOverloaded($str)
{
   global $SHREE_MAL_0501_overloadList; 
   return $SHREE_MAL_0501_overloadList[$str] != null;
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
   global $SHREE_MAL_0501_redundantList; 
   return $SHREE_MAL_0501_redundantList[$str] != null;
}

//Implementation details start here

//Specials
const SHREE_MAL_0501_visarga        = "\x40";  
const SHREE_MAL_0501_anusvara       = "\x55";  
const SHREE_MAL_0501_virama         = "\x56"; 

//Vowels
const SHREE_MAL_0501_vowel_A        = "\x41";
const SHREE_MAL_0501_vowel_AA       = "\x42";
const SHREE_MAL_0501_vowel_I        = "\x43";
const SHREE_MAL_0501_vowel_II       = "\x43\x54"; 
const SHREE_MAL_0501_vowel_U        = "\x44"; 
const SHREE_MAL_0501_vowel_UU       = "\x44\x54";  
const SHREE_MAL_0501_vowel_R        = "\x45";  
const SHREE_MAL_0501_vowel_RR       = "\x45\x54";  
const SHREE_MAL_0501_vowel_E        = "\x49";  
const SHREE_MAL_0501_vowel_EE       = "\x4A";  
const SHREE_MAL_0501_vowel_AI       = "\x52\x49";  
const SHREE_MAL_0501_vowel_O        = "\x4B";  
const SHREE_MAL_0501_vowel_OO       = "\x4B\x4C";  
const SHREE_MAL_0501_vowel_AU       = "\x4B\x54";  

//Consonants
const SHREE_MAL_0501_consnt_KA      = "\x57"; 
const SHREE_MAL_0501_consnt_KHA     = "\x58"; 
const SHREE_MAL_0501_consnt_GA      = "\x59"; 
const SHREE_MAL_0501_consnt_GHA     = "\x5A"; 
const SHREE_MAL_0501_consnt_NGA     = "\xE2\x80\x9A"; 

const SHREE_MAL_0501_consnt_CA      = "\x5C"; 
const SHREE_MAL_0501_consnt_CHA     = "\x4D"; 
const SHREE_MAL_0501_consnt_JA      = "\x5E"; 
const SHREE_MAL_0501_consnt_JHA     = "\x5F"; 
const SHREE_MAL_0501_consnt_NYA     = "\x60"; 

const SHREE_MAL_0501_consnt_TTA     = "\x61"; 
const SHREE_MAL_0501_consnt_TTHA    = "\x62"; 
const SHREE_MAL_0501_consnt_DDA     = "\x63"; 
const SHREE_MAL_0501_consnt_DDHA    = "\x64"; 
const SHREE_MAL_0501_consnt_NNA     = "\x65"; 

const SHREE_MAL_0501_consnt_TA      = "\x66"; 
const SHREE_MAL_0501_consnt_THA     = "\x67"; 
const SHREE_MAL_0501_consnt_DA      = "\x68"; 
const SHREE_MAL_0501_consnt_DHA     = "\x69"; 
const SHREE_MAL_0501_consnt_NA      = "\x6A"; 

const SHREE_MAL_0501_consnt_PA      = "\x6B"; 
const SHREE_MAL_0501_consnt_PHA     = "\x6C"; 
const SHREE_MAL_0501_consnt_BA      = "\x6D"; 
const SHREE_MAL_0501_consnt_BHA     = "\x6E"; 
const SHREE_MAL_0501_consnt_MA      = "\x6F"; 

const SHREE_MAL_0501_consnt_YA      = "\x70"; 
const SHREE_MAL_0501_consnt_RA      = "\x71"; 
const SHREE_MAL_0501_consnt_LA      = "\x73"; 
const SHREE_MAL_0501_consnt_VA      = "\x76"; 
const SHREE_MAL_0501_consnt_SHA     = "\x77"; 
const SHREE_MAL_0501_consnt_SSA     = "\x78"; 
const SHREE_MAL_0501_consnt_SA      = "\x79"; 

const SHREE_MAL_0501_consnt_HA      = "\x7A"; 
const SHREE_MAL_0501_consnt_LLA     = "\x74"; 
const SHREE_MAL_0501_consnt_ZHA     = "\x75"; 
const SHREE_MAL_0501_consnt_RRA     = "\x72"; 

//Gunintamulu
const SHREE_MAL_0501_vowelsn_AA     = "\x4C"; 
const SHREE_MAL_0501_vowelsn_I      = "\x5D"; 
const SHREE_MAL_0501_vowelsn_II     = "\x7D"; 
const SHREE_MAL_0501_vowelsn_U      = "\x4F"; 
const SHREE_MAL_0501_vowelsn_UU     = "\x50"; 
const SHREE_MAL_0501_vowelsn_R      = "\x51"; 
const SHREE_MAL_0501_vowelsn_RR     = "\x51\x54";  
const SHREE_MAL_0501_vowelsn_E      = "\x52";  
const SHREE_MAL_0501_vowelsn_EE     = "\x53";  
const SHREE_MAL_0501_vowelsn_AI     = "\x52\x52";  
//vowelsigns o and O have two separate glyphs, one on left and one on right_
const SHREE_MAL_0501_vowelsn_AU     = "\x52\x54";  
const SHREE_MAL_0501_vowelsn_AULEN  = "\x54";  

//Chillu (5)
const SHREE_MAL_0501_chillu_ENN     = "\xC2\xA6";  
const SHREE_MAL_0501_chillu_IN      = "\xC2\xA2";  
const SHREE_MAL_0501_chillu_IR_1    = "\xC2\xA1";  
const SHREE_MAL_0501_chillu_IL      = "\xC2\xA4";  
const SHREE_MAL_0501_chillu_ILL     = "\xC2\xA5";  

//vattulu (consonant signs)
const SHREE_MAL_0501_vattu_TTA      = "\xE2\x80\xBA";  
const SHREE_MAL_0501_vattu_TA       = "\xC3\x85";  
const SHREE_MAL_0501_vattu_DA       = "\xC3\x89";  
const SHREE_MAL_0501_vattu_DHA      = "\xC5\x93";  
const SHREE_MAL_0501_vattu_NA       = "\xC3\x94";  
const SHREE_MAL_0501_vattu_PA       = "\xC3\x97";  
const SHREE_MAL_0501_vattu_MA       = "\xC3\x9C";  
const SHREE_MAL_0501_vattu_YA       = "\x7C";  
const SHREE_MAL_0501_vattu_RA       = "\x4E";  
const SHREE_MAL_0501_vattu_VA       = "\x7E";  
const SHREE_MAL_0501_vattu_SA       = "\xC3\xB5";  
const SHREE_MAL_0501_vattu_LLA      = "\xC3\xA6";  

//kooTTaksharangngaL
const SHREE_MAL_0501_conj_KK        = "\xC2\xA8";  
const SHREE_MAL_0501_conj_KT        = "\xC2\xA9";  
const SHREE_MAL_0501_conj_KSH       = "\xC6\x92";  

const SHREE_MAL_0501_conj_NGK       = "\xC3\x8B";  

const SHREE_MAL_0501_conj_CC        = "\xCB\x86";  
const SHREE_MAL_0501_conj_CCH       = "\xC2\xB1";  
const SHREE_MAL_0501_conj_JJ        = "\xC2\xB2";  
const SHREE_MAL_0501_conj_JNY       = "\xC2\xB3";  
const SHREE_MAL_0501_conj_NYC       = "\xC2\xB5";  
const SHREE_MAL_0501_conj_NYJ       = "\xC3\x86";  
const SHREE_MAL_0501_conj_NYNY      = "\xC2\xB4";  

const SHREE_MAL_0501_conj_TTTT      = "\xC5\xB8";  
const SHREE_MAL_0501_conj_NNTT      = "\xC2\xBA";  
const SHREE_MAL_0501_conj_NNDD      = "\xC2\xBC";  
const SHREE_MAL_0501_conj_NNNN      = "\xC2\xB9";  
const SHREE_MAL_0501_conj_NNM       = "\xC2\xBD";  

const SHREE_MAL_0501_conj_T_T       = "\xC2\xBE";  
const SHREE_MAL_0501_conj_T_TH      = "\xC3\x80";  
const SHREE_MAL_0501_conj_TN        = "\xC3\x81";  
const SHREE_MAL_0501_conj_TBH       = "\xC3\x82";  
const SHREE_MAL_0501_conj_TM        = "\xC3\x84";  
const SHREE_MAL_0501_conj_TS        = "\xC3\x83";  
const SHREE_MAL_0501_conj_DD        = "\xC3\x87";  
const SHREE_MAL_0501_conj_D_DH      = "\xC3\x88";  
const SHREE_MAL_0501_conj_NT        = "\xC3\x8D";  
const SHREE_MAL_0501_conj_NTH       = "\xC3\x8F";  
const SHREE_MAL_0501_conj_ND        = "\xC3\x8E";  
const SHREE_MAL_0501_conj_NDH       = "\xC3\x8C";  
const SHREE_MAL_0501_conj_N_N       = "\xC3\x90";  
const SHREE_MAL_0501_conj_NM        = "\xC3\x93";  
const SHREE_MAL_0501_conj_NRR       = "\xC2\xA3";  

const SHREE_MAL_0501_conj_PP        = "\xC3\x95";  
const SHREE_MAL_0501_conj_BB        = "\xE2\x80\xB0";  
const SHREE_MAL_0501_conj_MP        = "\xC3\x92";  
const SHREE_MAL_0501_conj_MM        = "\xC3\x9A";  

const SHREE_MAL_0501_conj_YY        = "\xC3\xA1";  
const SHREE_MAL_0501_conj_L_L       = "\xC5\xA0";  
const SHREE_MAL_0501_conj_VV        = "\xE2\x80\xB9";  

const SHREE_MAL_0501_conj_SHC       = "\xC3\xA9";  
const SHREE_MAL_0501_conj_STH       = "\xC3\xB2";  
const SHREE_MAL_0501_conj_SR        = "\xC3\xB0";  

const SHREE_MAL_0501_conj_HN        = "\xC3\xB8";  
const SHREE_MAL_0501_conj_HM        = "\xC3\xB9";  
const SHREE_MAL_0501_conj_LLLL      = "\xC3\xA7";  
const SHREE_MAL_0501_conj_ENGA     = "\xC2\xB0";  

//Consonat(s) + vowel combinations
const SHREE_MAL_0501_combo_RU       = "\xC3\xA2";  

const SHREE_MAL_0501_conj_GG        = "\xC2\xAB";  
const SHREE_MAL_0501_conj_GM        = "\xC2\xAF";  
const SHREE_MAL_0501_conj_DDA       = "\xC2\xB8";  
const SHREE_MAL_0501_conj_SK        = "\xC3\x98";  
const SHREE_MAL_0501_conj_MLL       = "\xC3\x9B";  
const SHREE_MAL_0501_conj_YK        = "\xC3\x9F";  
const SHREE_MAL_0501_conj_YKK       = "\xC3\xA0";  
const SHREE_MAL_0501_conj_RR        = "\xC3\xA3";  
const SHREE_MAL_0501_conj_LK        = "\xC3\xA4";  
const SHREE_MAL_0501_conj_LKK       = "\xC3\xA5";  
const SHREE_MAL_0501_conj_SHRR      = "\xC3\xA8";  
const SHREE_MAL_0501_conj_SHSH      = "\xC3\xAA";  
const SHREE_MAL_0501_conj_SSK       = "\xC3\xAB";  
const SHREE_MAL_0501_conj_SSTT      = "\xC3\xAC";  
const SHREE_MAL_0501_conj_SRR       = "\xC3\xAF";  
const SHREE_MAL_0501_conj_ST        = "\xC3\xB1";  
const SHREE_MAL_0501_conj_SPH       = "\xC3\xB3";  
const SHREE_MAL_0501_conj_SS        = "\xC3\xB4";  
const SHREE_MAL_0501_conj_HLL       = "\xC3\xBA";  
const SHREE_MAL_0501_conj_KTT       = "\xC3\xBB";  
const SHREE_MAL_0501_conj_BDH       = "\xC3\xBC";  
const SHREE_MAL_0501_conj_BD        = "\xC3\xBD";  
const SHREE_MAL_0501_conj_SLL       = "\xC3\xBE";  
const SHREE_MAL_0501_conj_SHLL      = "\xCB\x9C";  
const SHREE_MAL_0501_conj_KLL       = "\xE2\x80\x9E";  
const SHREE_MAL_0501_conj_PLL       = "\xE2\x80\xA0";  
const SHREE_MAL_0501_conj_BLL       = "\xE2\x80\xA1";  
const SHREE_MAL_0501_conj_GLL       = "\xE2\x80\xA6";  

const SHREE_MAL_0501_conj_CC_2      = "\x5C\xC3\xBF";  

//Digits
const SHREE_MAL_0501_digit_ZERO     = "\x30";  
const SHREE_MAL_0501_digit_ONE      = "\x31";  
const SHREE_MAL_0501_digit_TWO      = "\x32";  
const SHREE_MAL_0501_digit_THREE    = "\x33";  
const SHREE_MAL_0501_digit_FOUR     = "\x34";  
const SHREE_MAL_0501_digit_FIVE     = "\x35";  
const SHREE_MAL_0501_digit_SIX      = "\x36";  
const SHREE_MAL_0501_digit_SEVEN    = "\x37";  
const SHREE_MAL_0501_digit_EIGHT    = "\x38";  
const SHREE_MAL_0501_digit_NINE     = "\x39";  

//Matches ASCII
const SHREE_MAL_0501_EXCLAM         = "\x21";  
const SHREE_MAL_0501_PERCENT        = "\x25";  
const SHREE_MAL_0501_QTSINGLE       = "\x27";  
const SHREE_MAL_0501_PARENLEFT      = "\x28";  
const SHREE_MAL_0501_PARENRIGT      = "\x29";  
const SHREE_MAL_0501_ASTERISK       = "\x2A";  
const SHREE_MAL_0501_PLUS           = "\x2B";  
const SHREE_MAL_0501_COMMA          = "\x2C";  
const SHREE_MAL_0501_PERIOD         = "\x2E";  
const SHREE_MAL_0501_SLASH          = "\x2F";  
const SHREE_MAL_0501_COLON          = "\x3A";  
const SHREE_MAL_0501_SEMICOLON      = "\x3B";  
const SHREE_MAL_0501_EQUALS         = "\x3D";  
const SHREE_MAL_0501_QUESTION       = "\x3F";  
const SHREE_MAL_0501_MINUS          = "\xC2\xAD";  

//Does not match ASCII
const SHREE_MAL_0501_extra_QTSINGLE_1 = "\x22";  
const SHREE_MAL_0501_MULTIPLY         = "\x23";  
const SHREE_MAL_0501_DIVIDE           = "\x24";  
const SHREE_MAL_0501_HYPHEN_1         = "\x26";  
const SHREE_MAL_0501_HYPHEN_2         = "\xE2\x80\x93";  
const SHREE_MAL_0501_HYPHEN_3         = "\xE2\x80\x94";  

//00B7 what does this code represents???

}
$SHREE_MAL_0501_toPadma = array();

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_anusvara] = Padma::Padma_anusvara;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_visarga]  = Padma::Padma_visarga;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_virama]   = Padma::Padma_chandrakkala;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_A]  = Padma::Padma_vowel_A;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_AA] = Padma::Padma_vowel_AA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_I]  = Padma::Padma_vowel_I;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_II] = Padma::Padma_vowel_II;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_U]  = Padma::Padma_vowel_U;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_UU] = Padma::Padma_vowel_UU;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_R]  = Padma::Padma_vowel_R;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_RR] = Padma::Padma_vowel_RR;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_E]  = Padma::Padma_vowel_E;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_EE] = Padma::Padma_vowel_EE;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_AI] = Padma::Padma_vowel_AI;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_O]  = Padma::Padma_vowel_O;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_OO] = Padma::Padma_vowel_OO;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowel_AU] = Padma::Padma_vowel_AU;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_KA]  = Padma::Padma_consnt_KA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_KHA] = Padma::Padma_consnt_KHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_GA]  = Padma::Padma_consnt_GA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_GHA] = Padma::Padma_consnt_GHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_NGA] = Padma::Padma_consnt_NGA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_CA]  = Padma::Padma_consnt_CA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_CHA] = Padma::Padma_consnt_CHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_JA]  = Padma::Padma_consnt_JA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_JHA] = Padma::Padma_consnt_JHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_NYA] = Padma::Padma_consnt_NYA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_TTA]  = Padma::Padma_consnt_TTA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_DDA]  = Padma::Padma_consnt_DDA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_NNA]  = Padma::Padma_consnt_NNA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_TA]  = Padma::Padma_consnt_TA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_THA] = Padma::Padma_consnt_THA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_DA]  = Padma::Padma_consnt_DA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_DHA] = Padma::Padma_consnt_DHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_NA]  = Padma::Padma_consnt_NA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_PA]  = Padma::Padma_consnt_PA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_PHA] = Padma::Padma_consnt_PHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_BA]  = Padma::Padma_consnt_BA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_BHA] = Padma::Padma_consnt_BHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_MA]  = Padma::Padma_consnt_MA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_YA]  = Padma::Padma_consnt_YA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_RA]  = Padma::Padma_consnt_RA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_LA]  = Padma::Padma_consnt_LA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_VA]  = Padma::Padma_consnt_VA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_SHA] = Padma::Padma_consnt_SHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_SSA] = Padma::Padma_consnt_SSA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_SA]  = Padma::Padma_consnt_SA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_HA] = Padma::Padma_consnt_HA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_LLA] = Padma::Padma_consnt_LLA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_consnt_RRA] = Padma::Padma_consnt_RRA;

//Gunintamulu
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_I]  = Padma::Padma_vowelsn_I;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_II] = Padma::Padma_vowelsn_II;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_U]  = Padma::Padma_vowelsn_U;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_R]  = Padma::Padma_vowelsn_R;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_E]  = Padma::Padma_vowelsn_E;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_EE] = Padma::Padma_vowelsn_EE;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_AU] = Padma::Padma_vowelsn_AU;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_AULEN] = Padma::Padma_vowelsn_AULEN;

//Chillu
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_chillu_ENN] = Padma::Padma_consnt_NNA . Padma::Padma_chillu;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_chillu_IN]  = Padma::Padma_consnt_NA . Padma::Padma_chillu;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_chillu_IR_1] = Padma::Padma_consnt_RA . Padma::Padma_chillu;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_chillu_IL]  = Padma::Padma_consnt_LA . Padma::Padma_chillu;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_chillu_ILL] = Padma::Padma_consnt_LLA . Padma::Padma_chillu;

//vattulu
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_TTA] = Padma::Padma_vattu_TTA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_TA]  = Padma::Padma_vattu_TA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_DA]  = Padma::Padma_vattu_DA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_DHA] = Padma::Padma_vattu_DHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_NA]  = Padma::Padma_vattu_NA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_PA]  = Padma::Padma_vattu_PA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_MA]  = Padma::Padma_vattu_MA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_YA]  = Padma::Padma_vattu_YA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_RA]  = Padma::Padma_vattu_RA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_VA]  = Padma::Padma_vattu_VA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_SA]  = Padma::Padma_vattu_SA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_vattu_LLA] = Padma::Padma_vattu_LA;

//koo$TTaksharangngaL
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_KK]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_KA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_KT]   = Padma::Padma_consnt_KA .  Padma::Padma_vattu_TA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_KSH]  = Padma::Padma_consnt_KA .  Padma::Padma_vattu_SSA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NGK]  = Padma::Padma_consnt_NGA .  Padma::Padma_vattu_KA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_CC]   = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_CCH]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_JJ]   = Padma::Padma_consnt_JA .  Padma::Padma_vattu_JA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_JNY]  = Padma::Padma_consnt_JA .  Padma::Padma_vattu_NYA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NYC]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_CA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NYJ]  = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_JA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NYNY] = Padma::Padma_consnt_NYA .  Padma::Padma_vattu_NYA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_TTTT] = Padma::Padma_consnt_TTA .  Padma::Padma_vattu_TTA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NNTT] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_TTA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NNDD] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_DDA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NNNN] = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_NNA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NNM]  = Padma::Padma_consnt_NNA .  Padma::Padma_vattu_MA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_T_T]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_TA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_T_TH] = Padma::Padma_consnt_TA .  Padma::Padma_vattu_THA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_TN]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_NA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_TBH]  = Padma::Padma_consnt_TA .  Padma::Padma_vattu_BHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_TM]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_MA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_TS]   = Padma::Padma_consnt_TA .  Padma::Padma_vattu_SA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_DD]   = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_D_DH] = Padma::Padma_consnt_DA .  Padma::Padma_vattu_DHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NT]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_TA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NTH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_THA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_ND]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NDH]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_DHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_N_N]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_NA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NM]   = Padma::Padma_consnt_NA .  Padma::Padma_vattu_MA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_NRR]  = Padma::Padma_consnt_NA .  Padma::Padma_vattu_RRA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_PP]  = Padma::Padma_consnt_PA .  Padma::Padma_vattu_PA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_BB]  = Padma::Padma_consnt_BA .  Padma::Padma_vattu_BA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_MP]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_PA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_MM]  = Padma::Padma_consnt_MA .  Padma::Padma_vattu_MA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_YY]  = Padma::Padma_consnt_YA .  Padma::Padma_vattu_YA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_L_L] = Padma::Padma_consnt_LA .  Padma::Padma_vattu_LA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_VV]  = Padma::Padma_consnt_VA .  Padma::Padma_vattu_VA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SHC]  = Padma::Padma_consnt_SHA .  Padma::Padma_vattu_CA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_STH]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_THA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SR]  = Padma::Padma_consnt_SA .  Padma::Padma_vattu_RRA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_HN]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_NA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_HM]   = Padma::Padma_consnt_HA .  Padma::Padma_vattu_MA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_LLLL] = Padma::Padma_consnt_LLA .  Padma::Padma_vattu_LLA;

//Consonant(s) . Vowel Sign
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_combo_RU]    = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;


$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_GG]  = Padma::Padma_consnt_GA  .  Padma::Padma_vattu_GA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_GM]  = Padma::Padma_consnt_GA  .  Padma::Padma_vattu_MA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_DDA] = Padma::Padma_consnt_DDA .  Padma::Padma_vattu_DDA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SK]  = Padma::Padma_consnt_SA  .  Padma::Padma_vattu_KA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_MLL] = Padma::Padma_consnt_MA  .  Padma::Padma_vattu_LA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_YK]  = Padma::Padma_consnt_YA  .  Padma::Padma_vattu_KA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_YKK] = Padma::Padma_consnt_YA  .  Padma::Padma_vattu_KA .Padma::Padma_vattu_KA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_RR]  = Padma::Padma_consnt_RRA .  Padma::Padma_vattu_RRA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_LK]  = Padma::Padma_consnt_LA  .  Padma::Padma_vattu_KA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_LKK] = Padma::Padma_consnt_LA  .  Padma::Padma_vattu_KA .Padma::Padma_vattu_KA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SHRR]= Padma::Padma_consnt_SHA  .  Padma::Padma_vattu_RA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SHSH]= Padma::Padma_consnt_SHA .  Padma::Padma_vattu_SHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SSK] = Padma::Padma_consnt_SSA .  Padma::Padma_vattu_KA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SSTT]= Padma::Padma_consnt_SSA .  Padma::Padma_vattu_TTA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SRR] = Padma::Padma_consnt_SA  .  Padma::Padma_vattu_RA .  Padma::Padma_vattu_RA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_ST]  = Padma::Padma_consnt_SA  .  Padma::Padma_vattu_TA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SPH] = Padma::Padma_consnt_SA  .  Padma::Padma_vattu_PHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SS]  = Padma::Padma_consnt_SA  .  Padma::Padma_vattu_SA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_HLL] = Padma::Padma_consnt_HA  .  Padma::Padma_vattu_LA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_KTT] = Padma::Padma_consnt_KA   .  Padma::Padma_vattu_TTA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_BDH] = Padma::Padma_consnt_BA   .  Padma::Padma_vattu_DHA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_BD]  = Padma::Padma_consnt_BA   .  Padma::Padma_vattu_DA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SLL] = Padma::Padma_consnt_SA  .  Padma::Padma_vattu_LA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_SHLL]= Padma::Padma_consnt_SHA  .  Padma::Padma_vattu_LA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_KLL] = Padma::Padma_consnt_KA   .  Padma::Padma_vattu_LA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_PLL] = Padma::Padma_consnt_PA   .  Padma::Padma_vattu_LA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_BLL] = Padma::Padma_consnt_BA   .  Padma::Padma_vattu_LA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_GLL] = Padma::Padma_consnt_GA   .  Padma::Padma_vattu_LA;

$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_CC_2]  = Padma::Padma_consnt_CA .  Padma::Padma_vattu_CA;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_conj_ENGA] = Padma:: Padma_consnt_NGA . Padma::Padma_vattu_NGA;

//Miscellaneous(where it doesn't match ASCII representation)
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_extra_QTSINGLE_1] = SHREE_MAL_0501::SHREE_MAL_0501_QTSINGLE;
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_MULTIPLY]         = 'X';
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_DIVIDE]           = '/';
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_HYPHEN_1]         = '-';
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_HYPHEN_2]         = '-';
$SHREE_MAL_0501_toPadma[SHREE_MAL_0501::SHREE_MAL_0501_HYPHEN_3]         = '-';

$SHREE_MAL_0501_redundantList = array();
//$SHREE_MAL_0501_redundantList[SHREE_MAL_0501::SHREE_MAL_0501_misc_UNKNOWN_1] = true;

$SHREE_MAL_0501_prefixList = array();
$SHREE_MAL_0501_prefixList[SHREE_MAL_0501::SHREE_MAL_0501_vattu_RA]   = true;
$SHREE_MAL_0501_prefixList[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_E]  = true;
$SHREE_MAL_0501_prefixList[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_EE] = true;
$SHREE_MAL_0501_prefixList[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_AI] = true;

$SHREE_MAL_0501_overloadList = array();
$SHREE_MAL_0501_overloadList[SHREE_MAL_0501::SHREE_MAL_0501_vowel_I]        = true;
$SHREE_MAL_0501_overloadList[SHREE_MAL_0501::SHREE_MAL_0501_vowel_U]        = true;
$SHREE_MAL_0501_overloadList[SHREE_MAL_0501::SHREE_MAL_0501_vowel_R]        = true;
$SHREE_MAL_0501_overloadList[SHREE_MAL_0501::SHREE_MAL_0501_vowel_O]        = true;
$SHREE_MAL_0501_overloadList[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_R]      = true;
$SHREE_MAL_0501_overloadList[SHREE_MAL_0501::SHREE_MAL_0501_vowelsn_E]      = true;
$SHREE_MAL_0501_overloadList[SHREE_MAL_0501::SHREE_MAL_0501_consnt_CA]      = true;

function SHREE_MAL_0501_initialize()
{
    global $fontinfo;

    $fontinfo["shree-mal-0501"]["language"] = "Malayalam";
    $fontinfo["shree-mal-0501"]["class"] = "SHREE_MAL_0501";
}
?>
