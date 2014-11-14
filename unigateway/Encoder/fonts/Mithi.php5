<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (c) 2006 Poonam Kainthura<poonamkainthura@gmail.com> <indictrans@gmail.com>
 *  Copyright (C) 2006 Harshita Vani   <harshita@atc.tcs.com>
 *  The mapping for Mithi font herein has been added by Indictrans(www.indictrans.org)  
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
class Mithi
{
function Mithi()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "MARmith0";
var $displayName  = "Mithi";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup($str) 
{
    global $Mithi_toPadma;
    return $Mithi_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $Mithi_prefixList;
    return $Mithi_prefixList[$str] != null;
}

function isSuffixSymbol($str)
{
    global $Mithi_suffixList;
    return $Mithi_suffixList[$str] != null;
}

function isOverloaded($str)
{
    global $Mithi_overloadList;
    return $Mithi_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
   if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
       ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

//function isRedundant($str, $prev)
function isRedundant($str)
{
    global $Mithi_redundantList;
    return $Mithi_redundantList[$str] != null;
}

//Implementation details start here

//Specials

const Mithi_anusvara          = "\xC3\xA2";
const Mithi_candrabindu       = "\xC3\xAE"; 

//Vowels

const Mithi_vowel_A         = "\x41";
const Mithi_vowel_AA        = "\x41\x74";
const Mithi_vowel_I         = "\x42";
const Mithi_vowel_II        = "\x42\xC3\xA3";
const Mithi_vowel_U         = "\x43";
const Mithi_vowel_UU        = "\x44";
const Mithi_vowel_R         = "\xC5\xB8";
const Mithi_vowel_EE        = "\x45";
const Mithi_vowel_AI        = "\x45\xC3\xA7";
const Mithi_vowel_O         = "\x41\x74\xC3\xA7";
const Mithi_vowel_AU        = "\x41\x74\xC3\xA8";

//Consonants

const Mithi_consnt_KA       = "\x47";
const Mithi_consnt_KHA      = "\x48\x74";
const Mithi_consnt_KHHA     = "\xC3\x9C\x74";
const Mithi_consnt_GA       = "\x49\x74";
const Mithi_consnt_GHA      = "\x4A\x74";
const Mithi_consnt_NGA      = "\xE2\x80\x9A";

const Mithi_consnt_CA       = "\x4B\x74";
const Mithi_consnt_CHA      = "\x4C";
const Mithi_consnt_JA       = "\x4D\x74";
const Mithi_consnt_JHA      = "\x4E\x74";
const Mithi_consnt_NYA      = "\xC6\x92\xC3\xA6";

const Mithi_consnt_TTA      = "\x4F";
const Mithi_consnt_TTHA     = "\x50";
const Mithi_consnt_DDA      = "\x51";
const Mithi_consnt_DDHA     = "\x52";
const Mithi_consnt_NNA      = "\x53\x74";

const Mithi_consnt_TA       = "\x54\x74";
const Mithi_consnt_THA      = "\x55\x74";
const Mithi_consnt_DA       = "\x56";
const Mithi_consnt_DHA      = "\x57\x74";
const Mithi_consnt_NA       = "\x58\x74";

const Mithi_consnt_PA       = "\x59\x74";
const Mithi_consnt_PHA      = "\x61";
const Mithi_consnt_BA       = "\x62\x74";
const Mithi_consnt_BHA      = "\x63\x74";
const Mithi_consnt_MA       = "\x64\x74";

const Mithi_consnt_YA       = "\x65\x74";
const Mithi_consnt_RA       = "\x66";
const Mithi_consnt_LA_1     = "\xC3\x94";
const Mithi_consnt_LA_2     = "\x67\x74";
const Mithi_consnt_VA       = "\x69\x74";
const Mithi_consnt_SHA      = "\x6A\x74";
const Mithi_consnt_SSA      = "\x6B\x74";
const Mithi_consnt_SA       = "\x6C\x74";
const Mithi_consnt_HA       = "\x6D";
const Mithi_consnt_LLA      = "\x68";

//Gunintamulu
const Mithi_vowelsn_AA      = "\x74";
const Mithi_vowelsn_I_1     = "\x75";
const Mithi_vowelsn_I_2     = "\xC5\xA1";
const Mithi_vowelsn_II      = "\x76";
const Mithi_vowelsn_U_1     = "\xC2\xA9";
const Mithi_vowelsn_U_2     = "\xC3\xA4";
const Mithi_vowelsn_UU_1    = "\xC3\xA5";
const Mithi_vowelsn_UU_2    = "\xC2\xAA";
const Mithi_vowelsn_R       = "\xC3\xA6";
const Mithi_vowelsn_EE      = "\xC3\xA7";
const Mithi_vowelsn_AI      = "\xC3\xA8";
const Mithi_vowelsn_CDR_E   = "\xC3\xA9";
const Mithi_vowelsn_CDR_O   = "\x74\xC3\xA9";// To Do
const Mithi_vowelsn_OO      = "\x74\xC3\xA7";
const Mithi_vowelsn_AU      = "\x74\xC3\xA8";

//Matra + anusvara
const Mithi_vowelsn_IM      = "\x77";
const Mithi_vowelsn_IIM     = "\x79";
const Mithi_vowelsn_EEM     = "\x7C";

//Half Forms
const Mithi_halffm_KA       = "\x46";
const Mithi_halffm_KHA      = "\x48";
const Mithi_halffm_KHR      = "\xC2\xB2";
const Mithi_halffm_KHHA     = "\xC3\x9C";
const Mithi_halffm_GA       = "\x49";
const Mithi_halffm_GR       = "\xC3\x80";
const Mithi_halffm_GHA      = "\x4A";
const Mithi_halffm_GHR      = "\xC2\xB3";
const Mithi_halffm_CA       = "\x4B";
const Mithi_halffm_CR       = "\xC2\xB4";
const Mithi_halffm_JA       = "\x4D";
const Mithi_halffm_JR       = "\xC2\xB5";
const Mithi_halffm_JHA      = "\x4E";
const Mithi_halffm_JHR      = "\xC2\xB6";
const Mithi_halffm_NYA      = "\xC6\x92";
const Mithi_halffm_NNA      = "\x53";
const Mithi_halffm_TA       = "\x54";
const Mithi_halffm_TT       = "\xC3\x8A";
const Mithi_halffm_TR       = "\x6F";
const Mithi_halffm_THA      = "\x55";
const Mithi_halffm_THR      = "\xC2\xB7";
const Mithi_halffm_DHA      = "\x57";
const Mithi_halffm_DHR      = "\xC2\xB8";
const Mithi_halffm_NA       = "\x58";
const Mithi_halffm_NN       = "\xC3\x8F";
const Mithi_halffm_NR       = "\xC2\xB9";
const Mithi_halffm_PA       = "\x59";
const Mithi_halffm_PR       = "\x71";
const Mithi_halffm_PHA      = "\x5A";
const Mithi_halffm_FR       = "\xC3\x82";
const Mithi_halffm_BA       = "\x62";
const Mithi_halffm_BR       = "\xC5\xA0";
const Mithi_halffm_BHA      = "\x63";
const Mithi_halffm_BHR      = "\xC5\x92";
const Mithi_halffm_MA       = "\x64";
const Mithi_halffm_MR       = "\xC5\x93";
const Mithi_halffm_YA       = "\x65";
const Mithi_halffm_YR       = "\xC2\xBA";
const Mithi_halffm_RA       = "\xC3\xA3";
const Mithi_halffm_LA       = "\x67";
const Mithi_halffm_VA       = "\x69";
const Mithi_halffm_VR       = "\xC2\xBB";
const Mithi_halffm_SHA      = "\x6A";
const Mithi_halffm_SHR      = "\xC3\x83";
const Mithi_halffm_SSA      = "\x6B";
const Mithi_halffm_SA       = "\x6C";
const Mithi_halffm_HA       = "\xC2\xAE";
const Mithi_halffm_HR       = "\xC2\xBC";
const Mithi_halffm_LLA      = "\xC3\x95";
const Mithi_halffm_KSH      = "\xC3\x87";
const Mithi_halffm_JNY      = "\xC3\x92";
const Mithi_halffm_SHV      = "\xC3\x90";




//Conjuncts

const Mithi_conjct_KT       = "\xC3\x86";
const Mithi_conjct_KR       = "\x6E";
const Mithi_conjct_TTTT     = "\xC3\x88";
const Mithi_conjct_TT       = "\xC3\x8A\x74";
const Mithi_conjct_TT_TTH   = "\xC2\xBD";
const Mithi_conjct_TTHTTH   = "\xC2\xBE";
const Mithi_conjct_DDDD     = "\xC3\x89";
const Mithi_conjct_D_D      = "\xC3\x8B";
const Mithi_conjct_D_DH     = "\xC3\x8C";
const Mithi_conjct_DDHDDH   = "\xC2\xBF";
const Mithi_conjct_DR       = "\x70";
const Mithi_conjct_DV       = "\xC3\x8E";
const Mithi_conjct_DY       = "\xC3\x8D";
const Mithi_conjct_NN       = "\xC3\x8F\x74";
const Mithi_conjct_NR       = "\xC2\xB9\x74";
const Mithi_conjct_LL       = "\xC3\x93";
const Mithi_conjct_SHR      = "\xC3\x83\x74";
const Mithi_conjct_TR       = "\x6F\x74";
const Mithi_conjct_GR       = "\xC3\x80\x74";
const Mithi_conjct_HY       = "\xC3\x91";
const Mithi_conjct_HM       = "\xC2\xAF";
const Mithi_conjct_SHV      = "\xC3\x90\x74";
const Mithi_conjct_FR       = "\xC3\x82\x74";
const Mithi_conjct_PR       = "\x71\x74";
const Mithi_conjct_BR       = "\xC5\xA0\x74";
const Mithi_conjct_JNY      = "\xC3\x92\x74";
const Mithi_conjct_KSH      = "\xC3\x87\x74";
const Mithi_conjct_GHR      = "\xC2\xB3\x74";
const Mithi_conjct_CR       = "\xC2\xB4\x74";
const Mithi_conjct_JR       = "\xC2\xB5\x74";
const Mithi_conjct_JHR      = "\xC2\xB6\x74";
const Mithi_conjct_THR      = "\xC2\xB7\x74";
const Mithi_conjct_DHR      = "\xC2\xB8\x74";
const Mithi_conjct_YR       = "\xC2\xBA\x74";
const Mithi_conjct_VR       = "\xC2\xBB\x74";
const Mithi_conjct_HR       = "\xC2\xBC\x74";
const Mithi_conjct_MR       = "\xC5\x93\x74";
const Mithi_conjct_BHR      = "\xC5\x92\x74";
const Mithi_conjct_RY       = "\xC3\x98";


//rakar

const Mithi_vattu_RA      = "\xC3\xA0";


//Combos

//const Mithi_combo_DR       = "\xC3\x85 //To Do
const Mithi_combo_RU        = "\x72";
const Mithi_combo_RUU       = "\x73";
const Mithi_combo_HR        = "\xC3\x84";

//Half forms of RA

const Mithi_halffm_RI       = "\x78";
const Mithi_halffm_RII      = "\x7A";
const Mithi_halffm_RIIM     = "\x79";
const Mithi_halffm_REE      = "\xC3\xAB";
const Mithi_halffm_RA_ANU   = "\xC2\xAB";
const Mithi_halffm_REEM     = "\xC2\xA7";
const Mithi_halffm_RAI      = "\xC3\xAD";
const Mithi_halffm_RAIM     = "\xC2\xA8";


const Mithi_misc_OM         = "\xE2\x80\xB0";


//Devanagari Digits

const Mithi_digit_ZERO     = "\x30";
const Mithi_digit_ONE      = "\x31";
const Mithi_digit_TWO      = "\x32";
const Mithi_digit_THREE    = "\x33";
const Mithi_digit_FOUR     = "\x34";
const Mithi_digit_FIVE     = "\x35";
const Mithi_digit_SIX      = "\x36";
const Mithi_digit_SEVEN    = "\x37";
const Mithi_digit_EIGHT    = "\x38";
const Mithi_digit_NINE     = "\x39";

//Matches ASCII
const Mithi_EXCLAM         = "\x21";
const Mithi_QTDOUBLE       = "\x22";
const Mithi_POUND          = "\x23";
const Mithi_DOLLAR         = "\x24";
const Mithi_PERCENT        = "\x25";
const Mithi_AMPERSAND      = "\x26";
const Mithi_QTSINGLE       = "\x27";
const Mithi_PAREN_LEFT     = "\x28";
const Mithi_PAREN_RIGHT    = "\x29";
const Mithi_ASTERISK       = "\x2A";
const Mithi_PLUS           = "\x2B";
const Mithi_COMMA          = "\x2C";
const Mithi_PERIOD         = "\x2E";
const Mithi_SLASH          = "\x2F";
const Mithi_COLON          = "\x3A";
const Mithi_SEMICOLON      = "\x3B";
const Mithi_LESSTHAN       = "\x3C";
const Mithi_EQUALS         = "\x3D";
const Mithi_GREATERTHAN    = "\x3C";
const Mithi_QUESTION       = "\x3F";
const Mithi_ATSIGN         = "\x40";
const Mithi_SQBRKT_LEFT    = "\x5B";
const Mithi_BACKSLASH      = "\x5C";
const Mithi_SQBRKT_RIGHT   = "\x5D";
const Mithi_CARET          = "\x5E";
const Mithi_UNDERSCORE     = "\x5F";
const Mithi_BACKQUOTE      = "\x60";
const Mithi_BRACE_LEFT     = "\x7B";
const Mithi_PIPE           = "\x7C";
const Mithi_BRACE_RIGHT    = "\x7D";
const Mithi_TILDE          = "\x7E";


const Mithi_misc_UNKNOWN_1   = "\xC3\xB6";
const Mithi_misc_UNKNOWN_2   = "\xC3\xBA";
const Mithi_misc_UNKNOWN_3   = "\xC3\xB9";
const Mithi_misc_UNKNOWN_4   = "\xC3\xB2";
const Mithi_misc_UNKNOWN_5   = "\xC3\xB4";
const Mithi_misc_UNKNOWN_6   = "\xC3\xAA";
const Mithi_misc_UNKNOWN_7   = "\xC3\xBE";
const Mithi_misc_UNKNOWN_8   = "\xC3\xBD";
const Mithi_misc_UNKNOWN_9   = "\xC3\x97";
const Mithi_misc_UNKNOWN_10  = "\xC3\xB5";
const Mithi_misc_UNKNOWN_11  = "\xC3\xB7";
const Mithi_misc_UNKNOWN_12  = "\xC3\xB0";
const Mithi_misc_UNKNOWN_13  = "\xC3\xB8";
const Mithi_misc_UNKNOWN_14  = "\xC3\x98";
const Mithi_misc_UNKNOWN_15  = "\xC3\xBB";
const Mithi_misc_UNKNOWN_16  = "\xC3\xA1";
const Mithi_misc_UNKNOWN_17  = "\xC3\xBC";

}

$Mithi_toPadma = Array();

$Mithi_toPadma[Mithi::Mithi_anusvara]      = Padma::Padma_anusvara;
$Mithi_toPadma[Mithi::Mithi_candrabindu]   = Padma::Padma_candrabindu;

$Mithi_toPadma[Mithi::Mithi_vowel_A]       = Padma::Padma_vowel_A;
$Mithi_toPadma[Mithi::Mithi_vowel_AA]      = Padma::Padma_vowel_AA;
$Mithi_toPadma[Mithi::Mithi_vowel_I]       = Padma::Padma_vowel_I;
$Mithi_toPadma[Mithi::Mithi_vowel_II]      = Padma::Padma_vowel_II;
$Mithi_toPadma[Mithi::Mithi_vowel_U]       = Padma::Padma_vowel_U;
$Mithi_toPadma[Mithi::Mithi_vowel_UU]      = Padma::Padma_vowel_UU;
$Mithi_toPadma[Mithi::Mithi_vowel_R]       = Padma::Padma_vowel_R;
$Mithi_toPadma[Mithi::Mithi_vowel_EE]      = Padma::Padma_vowel_EE;
$Mithi_toPadma[Mithi::Mithi_vowel_AI]      = Padma::Padma_vowel_AI;
$Mithi_toPadma[Mithi::Mithi_vowel_O]       = Padma::Padma_vowel_O;
$Mithi_toPadma[Mithi::Mithi_vowel_AU]      = Padma::Padma_vowel_AU;


//consonants

$Mithi_toPadma[Mithi::Mithi_consnt_KA]     = Padma::Padma_consnt_KA;
$Mithi_toPadma[Mithi::Mithi_consnt_KHA]    = Padma::Padma_consnt_KHA;
$Mithi_toPadma[Mithi::Mithi_consnt_KHHA]   = Padma::Padma_consnt_KHHA;
$Mithi_toPadma[Mithi::Mithi_consnt_GA]     = Padma::Padma_consnt_GA;
$Mithi_toPadma[Mithi::Mithi_consnt_GHA]    = Padma::Padma_consnt_GHA;
$Mithi_toPadma[Mithi::Mithi_consnt_NGA]    = Padma::Padma_consnt_NGA;

$Mithi_toPadma[Mithi::Mithi_consnt_CA]     = Padma::Padma_consnt_CA;
$Mithi_toPadma[Mithi::Mithi_consnt_CHA]    = Padma::Padma_consnt_CHA;
$Mithi_toPadma[Mithi::Mithi_consnt_JA]     = Padma::Padma_consnt_JA;
$Mithi_toPadma[Mithi::Mithi_consnt_JHA]    = Padma::Padma_consnt_JHA;
$Mithi_toPadma[Mithi::Mithi_consnt_NYA]    = Padma::Padma_consnt_NYA;

$Mithi_toPadma[Mithi::Mithi_consnt_TTA]    = Padma::Padma_consnt_TTA;
$Mithi_toPadma[Mithi::Mithi_consnt_TTHA]   = Padma::Padma_consnt_TTHA;
$Mithi_toPadma[Mithi::Mithi_consnt_DDA]    = Padma::Padma_consnt_DDA;
$Mithi_toPadma[Mithi::Mithi_consnt_DDHA]   = Padma::Padma_consnt_DDHA;
$Mithi_toPadma[Mithi::Mithi_consnt_NNA]    = Padma::Padma_consnt_NNA;

$Mithi_toPadma[Mithi::Mithi_consnt_TA]     = Padma::Padma_consnt_TA;
$Mithi_toPadma[Mithi::Mithi_consnt_THA]    = Padma::Padma_consnt_THA;
$Mithi_toPadma[Mithi::Mithi_consnt_DA]     = Padma::Padma_consnt_DA;
$Mithi_toPadma[Mithi::Mithi_consnt_DHA]    = Padma::Padma_consnt_DHA;
$Mithi_toPadma[Mithi::Mithi_consnt_NA]     = Padma::Padma_consnt_NA;

$Mithi_toPadma[Mithi::Mithi_consnt_PA]     = Padma::Padma_consnt_PA;
$Mithi_toPadma[Mithi::Mithi_consnt_PHA]    = Padma::Padma_consnt_PHA;
$Mithi_toPadma[Mithi::Mithi_consnt_BA]     = Padma::Padma_consnt_BA;
$Mithi_toPadma[Mithi::Mithi_consnt_BHA]    = Padma::Padma_consnt_BHA;
$Mithi_toPadma[Mithi::Mithi_consnt_MA]     = Padma::Padma_consnt_MA;

$Mithi_toPadma[Mithi::Mithi_consnt_YA]     = Padma::Padma_consnt_YA;
$Mithi_toPadma[Mithi::Mithi_consnt_RA]     = Padma::Padma_consnt_RA;
$Mithi_toPadma[Mithi::Mithi_consnt_LA_1]   = Padma::Padma_consnt_LA;
$Mithi_toPadma[Mithi::Mithi_consnt_LA_2]   = Padma::Padma_consnt_LA;
$Mithi_toPadma[Mithi::Mithi_consnt_VA]     = Padma::Padma_consnt_VA;
$Mithi_toPadma[Mithi::Mithi_consnt_SHA]    = Padma::Padma_consnt_SHA;
$Mithi_toPadma[Mithi::Mithi_consnt_SSA]    = Padma::Padma_consnt_SSA;
$Mithi_toPadma[Mithi::Mithi_consnt_SA]     = Padma::Padma_consnt_SA;
$Mithi_toPadma[Mithi::Mithi_consnt_HA]     = Padma::Padma_consnt_HA;
$Mithi_toPadma[Mithi::Mithi_consnt_LLA]    = Padma::Padma_consnt_LLA;


//Gunintamulu

$Mithi_toPadma[Mithi::Mithi_vowelsn_AA]    = Padma::Padma_vowelsn_AA;
$Mithi_toPadma[Mithi::Mithi_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$Mithi_toPadma[Mithi::Mithi_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$Mithi_toPadma[Mithi::Mithi_vowelsn_II]    = Padma::Padma_vowelsn_II;
$Mithi_toPadma[Mithi::Mithi_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$Mithi_toPadma[Mithi::Mithi_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$Mithi_toPadma[Mithi::Mithi_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$Mithi_toPadma[Mithi::Mithi_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$Mithi_toPadma[Mithi::Mithi_vowelsn_R]     = Padma::Padma_vowelsn_R;
$Mithi_toPadma[Mithi::Mithi_vowelsn_EE]    = Padma::Padma_vowelsn_EE;
$Mithi_toPadma[Mithi::Mithi_vowelsn_AI]    = Padma::Padma_vowelsn_AI;
$Mithi_toPadma[Mithi::Mithi_vowelsn_CDR_E] = Padma::Padma_vowelsn_CDR_E;
$Mithi_toPadma[Mithi::Mithi_vowelsn_CDR_O] = Padma::Padma_vowelsn_CDR_O;
$Mithi_toPadma[Mithi::Mithi_vowelsn_OO]    = Padma::Padma_vowelsn_OO;
$Mithi_toPadma[Mithi::Mithi_vowelsn_AU]    = Padma::Padma_vowelsn_AU;

//Matra . anusvara

$Mithi_toPadma[Mithi::Mithi_vowelsn_IM]    = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$Mithi_toPadma[Mithi::Mithi_vowelsn_IIM]   = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$Mithi_toPadma[Mithi::Mithi_vowelsn_EEM]   = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;

//Halffm

$Mithi_toPadma[Mithi::Mithi_halffm_KA]     = Padma::Padma_halffm_KA;
$Mithi_toPadma[Mithi::Mithi_halffm_KHA]    = Padma::Padma_halffm_KHA;
$Mithi_toPadma[Mithi::Mithi_halffm_KHR]    = Padma::Padma_halffm_KHA .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_KHHA]   = Padma::Padma_halffm_KHHA;
$Mithi_toPadma[Mithi::Mithi_halffm_GA]     = Padma::Padma_halffm_GA;
$Mithi_toPadma[Mithi::Mithi_halffm_GR]     = Padma::Padma_halffm_GA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_GHA]    = Padma::Padma_halffm_GHA;
$Mithi_toPadma[Mithi::Mithi_halffm_GHR]    = Padma::Padma_halffm_GHA .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_CA]     = Padma::Padma_halffm_CA;
$Mithi_toPadma[Mithi::Mithi_halffm_JA]     = Padma::Padma_halffm_JA;
$Mithi_toPadma[Mithi::Mithi_halffm_JR]     = Padma::Padma_halffm_JA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_JHA]    = Padma::Padma_halffm_JHA;
$Mithi_toPadma[Mithi::Mithi_halffm_JHR]    = Padma::Padma_halffm_JHA .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_NYA]    = Padma::Padma_halffm_NYA;
$Mithi_toPadma[Mithi::Mithi_halffm_NNA]    = Padma::Padma_halffm_NNA;
$Mithi_toPadma[Mithi::Mithi_halffm_TA]     = Padma::Padma_halffm_TA;
$Mithi_toPadma[Mithi::Mithi_halffm_TT]     = Padma::Padma_halffm_TA  . Padma::Padma_halffm_TA;
//$Mithi_toPadma[Mithi::Mithi_halffm_TR]     = Padma::Padma_halffm_TR;
$Mithi_toPadma[Mithi::Mithi_halffm_THA]    = Padma::Padma_halffm_THA;
$Mithi_toPadma[Mithi::Mithi_halffm_THR]    = Padma::Padma_halffm_THA .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_DHA]    = Padma::Padma_halffm_DHA;
$Mithi_toPadma[Mithi::Mithi_halffm_DHR]    = Padma::Padma_halffm_DHA .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_NA]     = Padma::Padma_halffm_NA;
$Mithi_toPadma[Mithi::Mithi_halffm_NN]     = Padma::Padma_halffm_NA  .  Padma::Padma_halffm_NA;
$Mithi_toPadma[Mithi::Mithi_halffm_NR]     = Padma::Padma_halffm_NA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_PA]     = Padma::Padma_halffm_PA;
$Mithi_toPadma[Mithi::Mithi_halffm_PR]     = Padma::Padma_halffm_PA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_PHA]    = Padma::Padma_halffm_PHA;
$Mithi_toPadma[Mithi::Mithi_halffm_FR]     = Padma::Padma_halffm_FA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_BA]     = Padma::Padma_halffm_BA;
$Mithi_toPadma[Mithi::Mithi_halffm_BR]     = Padma::Padma_halffm_BA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_BHA]    = Padma::Padma_halffm_BHA;
$Mithi_toPadma[Mithi::Mithi_halffm_BHR]    = Padma::Padma_halffm_BHA .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_MA]     = Padma::Padma_halffm_MA;
$Mithi_toPadma[Mithi::Mithi_halffm_MR]     = Padma::Padma_halffm_MA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_YA]     = Padma::Padma_halffm_YA;
$Mithi_toPadma[Mithi::Mithi_halffm_YR]     = Padma::Padma_halffm_YA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_RA]     = Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_LA]     = Padma::Padma_halffm_LA;
$Mithi_toPadma[Mithi::Mithi_halffm_VA]     = Padma::Padma_halffm_VA;
$Mithi_toPadma[Mithi::Mithi_halffm_VR]     = Padma::Padma_halffm_VA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_SHA]    = Padma::Padma_halffm_SHA;
$Mithi_toPadma[Mithi::Mithi_halffm_SHR]    = Padma::Padma_halffm_SHA .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_SSA]    = Padma::Padma_halffm_SSA;
$Mithi_toPadma[Mithi::Mithi_halffm_SA]     = Padma::Padma_halffm_SA;
$Mithi_toPadma[Mithi::Mithi_halffm_HA]     = Padma::Padma_halffm_HA;
$Mithi_toPadma[Mithi::Mithi_halffm_HR]     = Padma::Padma_halffm_HA  .  Padma::Padma_halffm_RA;
$Mithi_toPadma[Mithi::Mithi_halffm_LLA]    = Padma::Padma_halffm_LLA;
$Mithi_toPadma[Mithi::Mithi_halffm_KSH]    = Padma::Padma_halffm_KA  . Padma::Padma_halffm_SSA;
//$Mithi_toPadma[Mithi::Mithi_halffm_JNY]    = Padma::Padma_halffm_JA  . Padma::Padma_halfm_NYA;
$Mithi_toPadma[Mithi::Mithi_halffm_SHV]    = Padma::Padma_halffm_SHA .  Padma::Padma_halffm_VA;


//Conjuncts

$Mithi_toPadma[Mithi::Mithi_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$Mithi_toPadma[Mithi::Mithi_conjct_KR]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Mithi_toPadma[Mithi::Mithi_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Mithi_toPadma[Mithi::Mithi_conjct_TT_TTH] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$Mithi_toPadma[Mithi::Mithi_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$Mithi_toPadma[Mithi::Mithi_conjct_DDDD]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$Mithi_toPadma[Mithi::Mithi_conjct_D_D]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Mithi_toPadma[Mithi::Mithi_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Mithi_toPadma[Mithi::Mithi_conjct_DDHDDH] = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_DDHA;
$Mithi_toPadma[Mithi::Mithi_conjct_DR]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$Mithi_toPadma[Mithi::Mithi_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$Mithi_toPadma[Mithi::Mithi_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$Mithi_toPadma[Mithi::Mithi_conjct_NR]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_LL]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_LA;
$Mithi_toPadma[Mithi::Mithi_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_TR]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_GR]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$Mithi_toPadma[Mithi::Mithi_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$Mithi_toPadma[Mithi::Mithi_conjct_SHV]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
//$Mithi_toPadma[Mithi::Mithi_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$Mithi_toPadma[Mithi::Mithi_conjct_FR]     = Padma::Padma_consnt_FA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_PR]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA ;
$Mithi_toPadma[Mithi::Mithi_conjct_BR]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA ;
$Mithi_toPadma[Mithi::Mithi_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Mithi_toPadma[Mithi::Mithi_conjct_GHR]    = Padma::Padma_consnt_GHA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_CR]     = Padma::Padma_consnt_CA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_JR]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_JHR]    = Padma::Padma_consnt_JHA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_THR]    = Padma::Padma_consnt_THA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_DHR]    = Padma::Padma_consnt_DHA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_YR]     = Padma::Padma_consnt_YA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_VR]     = Padma::Padma_consnt_VA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_HR]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_MR]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_BHR]    = Padma::Padma_consnt_BHA . Padma::Padma_vattu_RA;
$Mithi_toPadma[Mithi::Mithi_conjct_RY]     = Padma::Padma_consnt_RA . Padma::Padma_vattu_YA;





$Mithi_toPadma[Mithi::Mithi_vattu_RA]      = Padma::Padma_vattu_RA;

//Combo

$Mithi_toPadma[Mithi::Mithi_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Mithi_toPadma[Mithi::Mithi_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Mithi_toPadma[Mithi::Mithi_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;

//half form of RA

$Mithi_toPadma[Mithi::Mithi_halffm_RI]     = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I;
$Mithi_toPadma[Mithi::Mithi_halffm_RII]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$Mithi_toPadma[Mithi::Mithi_halffm_RIIM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$Mithi_toPadma[Mithi::Mithi_halffm_REE]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE; 
$Mithi_toPadma[Mithi::Mithi_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;
$Mithi_toPadma[Mithi::Mithi_halffm_REEM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$Mithi_toPadma[Mithi::Mithi_halffm_RAI]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI;
$Mithi_toPadma[Mithi::Mithi_halffm_RAIM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;


$Mithi_toPadma[Mithi::Mithi_misc_OM]       = Padma::Padma_om;

//Digits

$Mithi_toPadma[Mithi::Mithi_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Mithi_toPadma[Mithi::Mithi_digit_ONE]     = Padma::Padma_digit_ONE;
$Mithi_toPadma[Mithi::Mithi_digit_TWO]     = Padma::Padma_digit_TWO;
$Mithi_toPadma[Mithi::Mithi_digit_THREE]   = Padma::Padma_digit_THREE;
$Mithi_toPadma[Mithi::Mithi_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Mithi_toPadma[Mithi::Mithi_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Mithi_toPadma[Mithi::Mithi_digit_SIX]     = Padma::Padma_digit_SIX;
$Mithi_toPadma[Mithi::Mithi_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Mithi_toPadma[Mithi::Mithi_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Mithi_toPadma[Mithi::Mithi_digit_NINE]    = Padma::Padma_digit_NINE;


$Mithi_prefixList = Array();

$Mithi_prefixList[Mithi::Mithi_vowelsn_I_1]    = true;
$Mithi_prefixList[Mithi::Mithi_vowelsn_I_2]    = true;
$Mithi_prefixList[Mithi::Mithi_vowelsn_IM]     = true;



$Mithi_suffixList = Array();

$Mithi_suffixList[Mithi::Mithi_halffm_RA]      = true;
$Mithi_suffixList[Mithi::Mithi_vowelsn_II]     = true;
$Mithi_suffixList[Mithi::Mithi_halffm_RII]     = true;
$Mithi_suffixList[Mithi::Mithi_halffm_RIIM]    = true;
$Mithi_suffixList[Mithi::Mithi_halffm_REE]     = true;
$Mithi_suffixList[Mithi::Mithi_halffm_REEM]    = true;
$Mithi_suffixList[Mithi::Mithi_halffm_RAI]     = true;
$Mithi_suffixList[Mithi::Mithi_halffm_RAIM]    = true;
$Mithi_suffixList[Mithi::Mithi_halffm_RA_ANU]  = true;


$Mithi_redundantList = Array();

$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_1]  = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_2]  = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_3]  = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_4]  = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_5]  = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_6]  = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_7]  = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_8]  = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_9]  = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_10] = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_11] = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_12] = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_13] = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_14] = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_15] = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_16] = true;
$Mithi_redundantList[Mithi::Mithi_misc_UNKNOWN_17] = true;

$Mithi_overloadList = Array();

$Mithi_overloadList[Mithi::Mithi_vowel_A]      = true;
$Mithi_overloadList[Mithi::Mithi_vowel_AA]     = true;
$Mithi_overloadList[Mithi::Mithi_vowel_EE]     = true;
$Mithi_overloadList[Mithi::Mithi_vowel_I]      = true;
$Mithi_overloadList[Mithi::Mithi_halffm_KHA]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_GA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_GHA]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_CA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_JA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_JHA]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_NNA]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_TA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_THA]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_DHA]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_NA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_PA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_BA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_BHA]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_MA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_YA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_VA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_SHA]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_SSA]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_SA]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_NN]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_KSH]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_JNY]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_PR]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_TR]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_BR]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_GR]    = true;
$Mithi_overloadList[Mithi::Mithi_halffm_SHR]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_KHR]   = true;
$Mithi_overloadList[Mithi::Mithi_halffm_GHR]   = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_CR]    = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_JR]    = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_JHR]   = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_THR]   = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_DHR]   = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_NR]    = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_YR]    = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_VR]    = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_HR]    = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_TT]    = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_MR]    = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_BHR]   = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_SHV]   = true; 
$Mithi_overloadList[Mithi::Mithi_halffm_KHHA]  = true; 

function Mithi_initialize()
{
    global $fontinfo;

    $fontinfo["marmith0"]["language"] = "Devanagari";
    $fontinfo["marmith0"]["class"] = "Mithi";
}
?>
