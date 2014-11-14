<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright (C) 2007 Rajagiri Ravi <rajagiriwcmp@yahoo.com> 
 *  Copyright (C) 2007 Harshita Vani <harshita@atc.tcs.com>
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

//ManjushaBold and ManjushaMedium
class Manjusha
{
function Manjusha()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "ManjushaBold";
var $displayName  = "Manjusha";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup ($str)
{
    global $Manjusha_toPadma;
    return $Manjusha_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $Manjusha_prefixList;
    return array_key_exists($str, $Manjusha_prefixList);
}

function isSuffixSymbol ($str)
{
    global $Manjusha_suffixList;
    return array_key_exists($str, $Manjusha_suffixList);
}

function isOverloaded ($str)
{
    global $Manjusha_overloadList;
    return array_key_exists($str, $Manjusha_overloadList);
}

function handleTwoPartVowelSigns ($sign1, $sign2)
{
   if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
       ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function isRedundant ($str)
{
    global $Manjusha_redundantList;
    return array_key_exists($str, $Manjusha_redundantList);
}

//Implementation details start here
//Specials
const Manjusha_anusvara          = "\x2C";
const Manjusha_candrabindu       = "\xC2\xB2"; 
const Manjusha_visarga           = "\x41"; 

//Vowels
const Manjusha_vowel_A         = "\x61";
const Manjusha_vowel_AA        = "\x61\x72";
const Manjusha_vowel_I         = "\x50";
const Manjusha_vowel_II_1      = "\x50\xC2\xB4";
const Manjusha_vowel_II_2      = "\xC3\x92";
const Manjusha_vowel_U_1       = "\x7B";
const Manjusha_vowel_U_2       = "\xC3\xBC";
const Manjusha_vowel_UU        = "\x4C";
const Manjusha_vowel_R         = "\xC2\xB1";
const Manjusha_vowel_CDR_E     = "\x5A\x3C";
const Manjusha_vowel_EE        = "\x5A";
const Manjusha_vowel_AI        = "\x5A\x6B";
const Manjusha_vowel_CDR_O_1   = "\x61\xC2\xA8";
const Manjusha_vowel_CDR_O_2   = "\x61\x72\xC3\xBD";
const Manjusha_vowel_OO_1      = "\x61\x6D";
const Manjusha_vowel_OO_2      = "\x61\x72\x6B";
const Manjusha_vowel_AU        = "\x61\x2E"; 

//Consonants
const Manjusha_consnt_KA_1     = "\x65";
const Manjusha_consnt_KA_2     = "\xC3\xAD";
const Manjusha_consnt_KHA      = "\x32";
const Manjusha_consnt_GA       = "\x6A";
const Manjusha_consnt_GHA      = "\x37";
const Manjusha_consnt_NGA      = "\x7E";

const Manjusha_consnt_CA       = "\x76";
const Manjusha_consnt_CHA      = "\x34";
const Manjusha_consnt_JA_1     = "\x6F";
const Manjusha_consnt_JA_2     = "\x4F\x72";
const Manjusha_consnt_JHA      = "\x30";
const Manjusha_consnt_NYA      = "\xC3\x86\x72";

const Manjusha_consnt_TTA      = "\x31";
const Manjusha_consnt_TTHA     = "\x38";
const Manjusha_consnt_DDA      = "\x60";
const Manjusha_consnt_DDHA     = "\x39";
const Manjusha_consnt_NNA      = "\x67";

const Manjusha_consnt_TA       = "\x75";
const Manjusha_consnt_THA      = "\x36";
const Manjusha_consnt_DA       = "\x64";
const Manjusha_consnt_DHA      = "\x33";
const Manjusha_consnt_NA       = "\x66";

const Manjusha_consnt_PA       = "\x6E";
const Manjusha_consnt_PHA_1    = "\x3D";
const Manjusha_consnt_PHA_2    = "\xC3\xAE";
const Manjusha_consnt_BA       = "\x62";
const Manjusha_consnt_BHA      = "\x35";
const Manjusha_consnt_MA       = "\x68";

const Manjusha_consnt_YA       = "\x69";
const Manjusha_consnt_RA       = "\x79";
const Manjusha_consnt_LA       = "\xC3\x95";
const Manjusha_consnt_LLA      = "\xC3\x94";
const Manjusha_consnt_VA       = "\x74";
const Manjusha_consnt_SHA      = "\x71";
const Manjusha_consnt_SSA      = "\x77";
const Manjusha_consnt_SA       = "\x73";
const Manjusha_consnt_HA       = "\x7A";
const Manjusha_consnt_KSHA     = "\x5F";
const Manjusha_consnt_THRA     = "\x63";
const Manjusha_consnt_JHNA     = "\xC2\xBF";

//Additional consonants
const Manjusha_AddConsnt_QA	 = "\xC2\x82\xC2\x81";
const Manjusha_AddConsnt_KHHA	 = "\xC3\xB7\x72";
const Manjusha_AddConsnt_GHHA	 = "\xC3\xAF\x72";
const Manjusha_AddConsnt_ZA	 = "\xC2\xAF\x72";
const Manjusha_AddConsnt_DDDHA   = "\xC3\x99";
const Manjusha_AddConsnt_RHA	 = "\xC3\xB6"; 
const Manjusha_AddConsnt_FA	 = "\xC3\x97\xC2\x81";


//Gunintamulu
const Manjusha_vowelsn_AA      = "\x72";
const Manjusha_vowelsn_I       = "\x70";
const Manjusha_vowelsn_II      = "\x3B";
const Manjusha_vowelsn_U_1     = "\x5B";
const Manjusha_vowelsn_U_2     = "\xC3\x8D";
const Manjusha_vowelsn_UU      = "\x6C";
const Manjusha_vowelsn_R       = "\xC3\x96";
const Manjusha_vowelsn_RR      = "\xC3\x98";
const Manjusha_vowelsn_CDR_E_1 = "\x3C";
const Manjusha_vowelsn_CDR_E_2 = "\xC3\xBD";
const Manjusha_vowelsn_EE      = "\x6B";
const Manjusha_vowelsn_AI      = "\x78";
const Manjusha_vowelsn_CDR_O_1 = "\xC2\xA8";
const Manjusha_vowelsn_CDR_O_2 = "\x72\xC3\xBD";
const Manjusha_vowelsn_OO      = "\x6D";
const Manjusha_vowelsn_AU      = "\x2E";

//Matra + anusvara
const Manjusha_vowelsn_IM      = "\xC2\xB9";
const Manjusha_vowelsn_IIM     = "\xC3\x82";
const Manjusha_vowelsn_EM      = "\xC3\xB0";
const Manjusha_vowelsn_OM      = "\x4D";
const Manjusha_vowelsn_AAM     = "\x52";
const Manjusha_vowelsn_AIM     = "\xC2\xA7";
const Manjusha_vowelsn_UM      = "\xC3\x93";
const Manjusha_vowelsn_UUM     = "\xC3\xB1";

//Half Forms
const Manjusha_halffm_KA       = "\x45";
const Manjusha_halffm_KHA      = "\x40";
const Manjusha_halffm_GA       = "\x4A";
const Manjusha_halffm_GHA      = "\x26";
const Manjusha_halffm_CA       = "\x56";
const Manjusha_halffm_JA       = "\x4F";
const Manjusha_halffm_JHA      = "\x29";
const Manjusha_halffm_NYA      = "\xC3\x86";
const Manjusha_halffm_THR      = "\x43";
const Manjusha_halffm_NNA      = "\x47";
const Manjusha_halffm_TA       = "\x55";
const Manjusha_halffm_ATTA     = "\xC3\xA3";
const Manjusha_halffm_THA      = "\x5E";
const Manjusha_halffm_DHA      = "\x23";
const Manjusha_halffm_NA       = "\x46";
const Manjusha_halffm_PA       = "\x4E";
const Manjusha_halffm_PHA      = "\x2B";
const Manjusha_halffm_BA       = "\x42";
const Manjusha_halffm_BHA      = "\x25";
const Manjusha_halffm_MA       = "\x48";
const Manjusha_halffm_YA       = "\x49";
const Manjusha_halffm_RA       = "\xC2\xB4";
const Manjusha_halffm_LA_1     = "\x7D";
const Manjusha_halffm_LA_2     = "\xC3\x8C";
const Manjusha_halffm_VA       = "\x54";
const Manjusha_halffm_SHA      = "\x51";
const Manjusha_halffm_SSA      = "\x57";
const Manjusha_halffm_SA       = "\x53";
const Manjusha_halffm_KSHA     = "\xC3\x90";
const Manjusha_vattu_YA	       = "\x24";

//Conjuncts
const Manjusha_conjct_DDDHA  	   = "\x21";
const Manjusha_conjct_RU    	   = "\x2F";
const Manjusha_conjct_RR_MISC_II   = "\x3A";
const Manjusha_conjct_RUU   	   = "\x3F";
const Manjusha_conjct_DHYA 	   = "\x44";
const Manjusha_conjct_AA_RA	   = "\x4B";
const Manjusha_conjct_RR_MISC_AI   = "\x58";
const Manjusha_conjct_MISC_LA_1    = "\x5D";
const Manjusha_conjct_MISC_LA_2    = "\xC3\x8B";
const Manjusha_conjct_NNNA     	   = "\xC5\xBD";
const Manjusha_conjct_TTTA   	   = "\xE2\x80\x99";
const Manjusha_conjct_DDDA         = "\xE2\x80\x9C";
const Manjusha_conjct_SHCHA        = "\xC2\x94";
const Manjusha_conjct_TTTHA        = "\xE2\x80\xA2";
const Manjusha_conjct_DHMA         = "\xC2\x96";
const Manjusha_conjct_BHD          = "\xC2\x97";
const Manjusha_conjct_GHD          = "\xC2\x98";
const Manjusha_conjct_MISC_0       = "\xE2\x84\xA2";
const Manjusha_conjct_SHTTA        = "\xC5\xA1";
const Manjusha_conjct_KKKA         = "\xE2\x80\xBA";
const Manjusha_conjct_DHRU         = "\xC5\x93";
const Manjusha_conjct_MISC_1       = "\xC2\x9D";
const Manjusha_conjct_MISC_2       = "\xC2\x9E";
const Manjusha_conjct_NGGA         = "\xC5\xB8";
const Manjusha_conjct_RR_MISC_AA   = "\xC2\xA0";
const Manjusha_conjct_MISC_3       = "\xC2\xA9";
const Manjusha_conjct_PHRA         = "\xC2\xAD";
const Manjusha_conjct_BR           = "\x42\x4B";
const Manjusha_conjct_GR           = "\x4A\x4B";
const Manjusha_conjct_SHTA         = "\xC2\xB3";
const Manjusha_conjct_RR_MISC_E    = "\xC2\xB5";
const Manjusha_conjct_RR_MISC_AI_M = "\xC2\xB6";
const Manjusha_conjct_TTTTHA_1     = "\xC2\xB7";
const Manjusha_conjct_TTTTHA_2     = "\xC3\xA3\x72";
const Manjusha_conjct_RR_MISC_I    = "\xC2\xB8";
const Manjusha_conjct_RR_MISC_E_M  = "\xC3\x84";
const Manjusha_conjct_MISC_4       = "\xC3\x8E";
const Manjusha_conjct_SHRA         = "\xC3\x8F";
const Manjusha_conjct_KRA          = "\xC3\xA4";
const Manjusha_conjct_MISC_5       = "\xC3\xA5";
const Manjusha_conjct_RR_MISC_AA_M = "\xC3\xA6";
const Manjusha_conjct_RR_MISC_M    = "\xC3\xA7";
const Manjusha_conjct_PRA          = "\xC3\xA8";
const Manjusha_conjct_SHNNA        = "\xC3\xA9";
const Manjusha_conjct_MISC_7       = "\xC3\xAA";
const Manjusha_conjct_DHRA	   = "\xC3\xAB";
const Manjusha_conjct_DHVA	   = "\xC3\xAC";
const Manjusha_conjct_RR_MISC_II_M = "\xC3\xB2";
const Manjusha_conjct_HYA	   = "\xC3\xB3";
const Manjusha_conjct_HRU	   = "\xC3\xB4";
const Manjusha_conjct_SHVA         = "\xC3\xB8";
const Manjusha_conjct_PTA	   = "\xC3\xB9";
const Manjusha_conjct_HMA	   = "\xC3\xBA";

//GENERIC PUNCTUATION MARKS.
const Manjusha_conjct_MISC_DANDA    = "\xC3\x88";	 
const Manjusha_conjct_MISC_OM       = "\xC2\x8C";
const Manjusha_conjct_MISC_AVAGRAHA = "\xC3\x91";
const Manjusha_conjct_MISC_VIRAMA   = "\xC3\xBB";	 

//Devanagari Digits
const Manjusha_digit_ZERO   = "\xC2\xBC";
const Manjusha_digit_ONE    = "\xC3\x81";
const Manjusha_digit_TWO    = "\xC2\xAA";
const Manjusha_digit_THREE  = "\xC2\xA3";
const Manjusha_digit_FOUR   = "\xC2\xA2";
const Manjusha_digit_FIVE   = "\xC2\xB0";
const Manjusha_digit_SIX    = "\xC2\xA4";
const Manjusha_digit_SEVEN  = "\xC2\xA6";
const Manjusha_digit_EIGHT  = "\xC2\xA5";
const Manjusha_digit_NINE   = "\xC2\xBB";

//ENGLISH DIGITS
const Manjusha_ENG_0	= "\xC3\xA2";
const Manjusha_ENG_1	= "\xC3\x9A";
const Manjusha_ENG_2	= "\xC3\x9B";
const Manjusha_ENG_3	= "\xC3\x9C";
const Manjusha_ENG_4	= "\xC3\x9D";
const Manjusha_ENG_5	= "\xC3\x9E";
const Manjusha_ENG_6	= "\xC3\x9F";
const Manjusha_ENG_7	= "\xC3\xA0";
const Manjusha_ENG_8	= "\xC2\xA1";
const Manjusha_ENG_9	= "\xC3\xA1";


//Matches ASCII
const Manjusha_EXCLAM         	= "\x22";
const Manjusha_PERCENT        	= "\xC3\xB5";
const Manjusha_PLUS           	= "\xC2\xBD";
const Manjusha_MINUS		= "\xC2\x8D";
const Manjusha_COMMA          	= "\x5C";
const Manjusha_PERIOD         	= "\x7C";
const Manjusha_SOLIDUS        	= "\xC3\x87";
const Manjusha_EQUALS         	= "\xC2\xBA";
const Manjusha_DIVISION		= "\xC3\x83";
const Manjusha_MULTIPLY		= "\xC3\x85";
const Manjusha_QUESTIONMARK 	= "\x27";
const Manjusha_LEFTPARANTHESIS	= "\x2A";
const Manjusha_RIGHTPARANTHESIS	= "\x28";
const Manjusha_HYPHEN		= "\x2D";
const Manjusha_COLON          	= "\x41";
const Manjusha_SEMICOLON      	= "\xC2\xAE";
const Manjusha_STAR		= "\x3E";
const Manjusha_MISC_EQUAL	= "\x59";
const Manjusha_APOSTROPHE	= "\xC2\xBE";
const Manjusha_BLANK_1		= "\xC3\x80";
const Manjusha_BLANK_2		= "\xC3\x8A";
const Manjusha_MISC		= "\xC3\x89";

}

$Manjusha_toPadma = Array();

$Manjusha_toPadma[Manjusha::Manjusha_anusvara]      = Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_candrabindu]   = Padma::Padma_candrabindu;
$Manjusha_toPadma[Manjusha::Manjusha_visarga]       = Padma::Padma_visarga;

$Manjusha_toPadma[Manjusha::Manjusha_vowel_A]       = Padma::Padma_vowel_A;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_AA]      = Padma::Padma_vowel_AA;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_I]       = Padma::Padma_vowel_I;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_II_1]    = Padma::Padma_vowel_II;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_II_2]    = Padma::Padma_vowel_II;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_U_1]     = Padma::Padma_vowel_U;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_U_2]     = Padma::Padma_vowel_U;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_UU]      = Padma::Padma_vowel_UU;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_R]       = Padma::Padma_vowel_R;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_CDR_E]   = Padma::Padma_vowel_CDR_E;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_EE]      = Padma::Padma_vowel_EE;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_AI]      = Padma::Padma_vowel_AI;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_CDR_O_1] = Padma::Padma_vowel_CDR_O;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_CDR_O_2] = Padma::Padma_vowel_CDR_O;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_OO_1]    = Padma::Padma_vowel_OO;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_OO_2]    = Padma::Padma_vowel_OO;
$Manjusha_toPadma[Manjusha::Manjusha_vowel_AU]      = Padma::Padma_vowel_AU;


//consonants

$Manjusha_toPadma[Manjusha::Manjusha_consnt_KA_1]   = Padma::Padma_consnt_KA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_KA_2]   = Padma::Padma_consnt_KA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_KHA]    = Padma::Padma_consnt_KHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_GA]     = Padma::Padma_consnt_GA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_GHA]    = Padma::Padma_consnt_GHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_NGA]    = Padma::Padma_consnt_NGA;

$Manjusha_toPadma[Manjusha::Manjusha_consnt_CA]	    = Padma::Padma_consnt_CA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_CHA]    = Padma::Padma_consnt_CHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_JA_1]   = Padma::Padma_consnt_JA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_JA_2]   = Padma::Padma_consnt_JA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_JHA]    = Padma::Padma_consnt_JHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_NYA]    = Padma::Padma_consnt_NYA;

$Manjusha_toPadma[Manjusha::Manjusha_consnt_TTA]    = Padma::Padma_consnt_TTA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_TTHA]   = Padma::Padma_consnt_TTHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_DDA]    = Padma::Padma_consnt_DDA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_DDHA]   = Padma::Padma_consnt_DDHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_NNA]    = Padma::Padma_consnt_NNA;

$Manjusha_toPadma[Manjusha::Manjusha_consnt_TA]     = Padma::Padma_consnt_TA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_THA]    = Padma::Padma_consnt_THA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_DA]     = Padma::Padma_consnt_DA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_DHA]    = Padma::Padma_consnt_DHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_NA]     = Padma::Padma_consnt_NA;

$Manjusha_toPadma[Manjusha::Manjusha_consnt_PA]     = Padma::Padma_consnt_PA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_PHA_1]  = Padma::Padma_consnt_PHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_PHA_2]  = Padma::Padma_consnt_PHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_BA]     = Padma::Padma_consnt_BA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_BHA]    = Padma::Padma_consnt_BHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_MA]     = Padma::Padma_consnt_MA;

$Manjusha_toPadma[Manjusha::Manjusha_consnt_YA]     = Padma::Padma_consnt_YA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_RA]     = Padma::Padma_consnt_RA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_LA]     = Padma::Padma_consnt_LA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_LLA]    = Padma::Padma_consnt_LLA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_VA]     = Padma::Padma_consnt_VA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_SHA]    = Padma::Padma_consnt_SHA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_SSA]    = Padma::Padma_consnt_SSA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_SA]     = Padma::Padma_consnt_SA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_HA]     = Padma::Padma_consnt_HA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_KSHA]   = Padma::Padma_consnt_KA. Padma::Padma_vattu_SSA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_THRA]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Manjusha_toPadma[Manjusha::Manjusha_consnt_JHNA]   = Padma::Padma_consnt_JA. Padma::Padma_vattu_NYA;

//Additional consonants
$Manjusha_toPadma[Manjusha::Manjusha_AddConsnt_QA]   = Padma::Padma_consnt_QA;
$Manjusha_toPadma[Manjusha::Manjusha_AddConsnt_KHHA] = Padma::Padma_consnt_KHHA;
$Manjusha_toPadma[Manjusha::Manjusha_AddConsnt_GHHA] = Padma::Padma_consnt_GHHA;
$Manjusha_toPadma[Manjusha::Manjusha_AddConsnt_ZA]   = Padma::Padma_consnt_ZA;
$Manjusha_toPadma[Manjusha::Manjusha_AddConsnt_DDDHA]= Padma::Padma_consnt_DDDHA;
$Manjusha_toPadma[Manjusha::Manjusha_AddConsnt_RHA]  = Padma::Padma_consnt_RHA;
$Manjusha_toPadma[Manjusha::Manjusha_AddConsnt_FA]   = Padma::Padma_consnt_FA;


//Gunintamulu

$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_AA]    	= Padma::Padma_vowelsn_AA;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_I]   	= Padma::Padma_vowelsn_I;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_II]    	= Padma::Padma_vowelsn_II;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_U_1]   	= Padma::Padma_vowelsn_U;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_U_2]   	= Padma::Padma_vowelsn_U;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_UU]  	= Padma::Padma_vowelsn_UU;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_R]     	= Padma::Padma_vowelsn_R;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_RR]     	= Padma::Padma_vowelsn_RR;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_EE]	= Padma::Padma_vowelsn_EE;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_AI]    	= Padma::Padma_vowelsn_AI;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_CDR_E_1]	= Padma::Padma_vowelsn_CDR_E;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_CDR_E_2]	= Padma::Padma_vowelsn_CDR_E;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_CDR_O_1] 	= Padma::Padma_vowelsn_CDR_O;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_CDR_O_2] 	= Padma::Padma_vowelsn_CDR_O;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_OO]    	= Padma::Padma_vowelsn_OO;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_AU]    	= Padma::Padma_vowelsn_AU;

//Matra . anusvara

$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_IM]    = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_IIM]   = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_EM]    = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_OM]    = Padma::Padma_vowelsn_O . Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_AAM]   = Padma::Padma_vowelsn_AA. Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_AIM]   = Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_UM]    = Padma::Padma_vowelsn_U . Padma::Padma_nukta;
$Manjusha_toPadma[Manjusha::Manjusha_vowelsn_UUM]   = Padma::Padma_vowelsn_UU . Padma::Padma_nukta;


//Halffm

$Manjusha_toPadma[Manjusha::Manjusha_halffm_KA]     = Padma::Padma_halffm_KA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_KHA]    = Padma::Padma_halffm_KHA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_GA]     = Padma::Padma_halffm_GA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_GHA]    = Padma::Padma_halffm_GHA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_CA]     = Padma::Padma_halffm_CA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_JA]     = Padma::Padma_halffm_JA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_JHA]    = Padma::Padma_halffm_JHA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_NYA]    = Padma::Padma_halffm_NYA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_THR]    = Padma::Padma_halffm_TA. Padma::Padma_halffm_RA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_NNA]    = Padma::Padma_halffm_NNA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_TA]     = Padma::Padma_halffm_TA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_ATTA]   = Padma::Padma_halffm_TA. Padma::Padma_halffm_TA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_THA]    = Padma::Padma_halffm_THA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_DHA]    = Padma::Padma_halffm_DHA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_NA]     = Padma::Padma_halffm_NA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_PA]     = Padma::Padma_halffm_PA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_PHA]    = Padma::Padma_halffm_PHA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_BA]     = Padma::Padma_halffm_BA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_BHA]    = Padma::Padma_halffm_BHA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_MA]     = Padma::Padma_halffm_MA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_YA]     = Padma::Padma_halffm_YA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_RA]     = Padma::Padma_halffm_RA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_LA_1]   = Padma::Padma_halffm_LA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_LA_2]   = Padma::Padma_halffm_LA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_VA]     = Padma::Padma_halffm_VA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_SHA]    = Padma::Padma_halffm_SHA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_SSA]    = Padma::Padma_halffm_SSA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_SA]     = Padma::Padma_halffm_SA;
$Manjusha_toPadma[Manjusha::Manjusha_halffm_KSHA]   = Padma::Padma_halffm_KA. Padma::Padma_halffm_SSA;
$Manjusha_toPadma[Manjusha::Manjusha_vattu_YA]	    = Padma::Padma_vattu_YA;
$Manjusha_toPadma[Manjusha::Manjusha_MISC_EQUAL]    = Padma::Padma_halffm_RRA;

//Conjuncts

$Manjusha_toPadma[Manjusha::Manjusha_conjct_DDDHA]    	 = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RU]    	 = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_II]  = Padma::Padma_halffm_RA. Padma::Padma_vowelsn_II;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RUU]     	 = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_DHYA] 	 = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_AA_RA] 	 = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AA;// . Padma::Padma_consnt_RA;
//$Manjusha_toPadma[Manjusha::Manjusha_conjct_AA_RA] 	 = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_AI]  = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_LA_1]   = Padma::Padma_consnt_LA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_LA_2]   = Padma::Padma_consnt_LA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_NNNA] 	 = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_TTTA]	 = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_DDDA]     	 = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_SHCHA]       = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_TTTHA]     	 = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_DHMA]    	 = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_BHD]     	 = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_GHD]    	 = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_0]    	 = Padma::Padma_consnt_KA. Padma::Padma_vattu_TA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_SHTTA]     	 = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_KKKA]     	 = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_DHRU]    	 = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_R;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_1]    	 = Padma::Padma_vattu_RA. Padma::Padma_vowelsn_U;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_2]    	 = Padma::Padma_vattu_RA. Padma::Padma_vowelsn_UU;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_NGGA]     	 = Padma::Padma_consnt_GA . Padma::Padma_vattu_NA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_AA]  = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AA ;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_3]    	 = Padma::Padma_vattu_RA;

$Manjusha_toPadma[Manjusha::Manjusha_conjct_PHRA]    	 = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA ;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_BR]    	 = Padma::Padma_consnt_BA  . Padma::Padma_vattu_RA ;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_GR]    	 = Padma::Padma_consnt_GA  . Padma::Padma_vattu_RA ;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_SHTA] 	 = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_E]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_AI_M]= Padma::Padma_halffm_RA. Padma::Padma_vowelsn_AI. Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_TTTTHA_1]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_TTTTHA_2]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_I]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_E_M]  = Padma::Padma_halffm_RA. Padma::Padma_vowelsn_EE. Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_4]    	 = Padma::Padma_halffm_SHA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_SHRA]     	 = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_KRA]     	 = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_5]    	 = Padma::Padma_vowelsn_AA . Padma::Padma_candrabindu;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_AA_M]= Padma::Padma_halffm_RA. Padma::Padma_vowelsn_AA. Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_M]   = Padma::Padma_halffm_RA. Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_PRA]     	 = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_SHNNA]     	 = Padma::Padma_consnt_SHA. Padma::Padma_vattu_NA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_7]      = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_DHRA]    	 = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_DHVA]    	 = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_RR_MISC_II_M]= Padma::Padma_vowelsn_II . Padma::Padma_halffm_RA.Padma::Padma_anusvara;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_HYA]     	 = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_HRU]     	 = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_SHVA]   	 = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_PTA]     	 = Padma::Padma_consnt_TA . Padma::Padma_vattu_PA;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_HMA]     	 = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;

//GENERIC PUNCTUATION MARKS
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_OM]  	   = Padma::Padma_om;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_DANDA]    = Padma::Padma_danda;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_AVAGRAHA] = Padma::Padma_avagraha;
$Manjusha_toPadma[Manjusha::Manjusha_conjct_MISC_VIRAMA ]  = Padma::Padma_syllbreak;

//Digits

$Manjusha_toPadma[Manjusha::Manjusha_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Manjusha_toPadma[Manjusha::Manjusha_digit_ONE]     = Padma::Padma_digit_ONE;
$Manjusha_toPadma[Manjusha::Manjusha_digit_TWO]     = Padma::Padma_digit_TWO;
$Manjusha_toPadma[Manjusha::Manjusha_digit_THREE]   = Padma::Padma_digit_THREE;
$Manjusha_toPadma[Manjusha::Manjusha_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Manjusha_toPadma[Manjusha::Manjusha_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Manjusha_toPadma[Manjusha::Manjusha_digit_SIX]     = Padma::Padma_digit_SIX;
$Manjusha_toPadma[Manjusha::Manjusha_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Manjusha_toPadma[Manjusha::Manjusha_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Manjusha_toPadma[Manjusha::Manjusha_digit_NINE]    = Padma::Padma_digit_NINE;

// ASCII
$Manjusha_toPadma[Manjusha::Manjusha_QUESTIONMARK]    	= "?";
$Manjusha_toPadma[Manjusha::Manjusha_EXCLAM]    	= "!";
$Manjusha_toPadma[Manjusha::Manjusha_PERCENT]		= "%";
$Manjusha_toPadma[Manjusha::Manjusha_PLUS]		= ".";
$Manjusha_toPadma[Manjusha::Manjusha_MINUS]		= "-"; 
$Manjusha_toPadma[Manjusha::Manjusha_COMMA]		= ",";
$Manjusha_toPadma[Manjusha::Manjusha_PERIOD]		= ".";
$Manjusha_toPadma[Manjusha::Manjusha_SOLIDUS]		= "/";
$Manjusha_toPadma[Manjusha::Manjusha_EQUALS]		= "=";
$Manjusha_toPadma[Manjusha::Manjusha_DIVISION]		= "/";
$Manjusha_toPadma[Manjusha::Manjusha_MULTIPLY]		= "\xC3\x97";
$Manjusha_toPadma[Manjusha::Manjusha_LEFTPARANTHESIS]	= "(";
$Manjusha_toPadma[Manjusha::Manjusha_RIGHTPARANTHESIS]	= ")";
$Manjusha_toPadma[Manjusha::Manjusha_HYPHEN]		= "-";
$Manjusha_toPadma[Manjusha::Manjusha_STAR]		= "*";
$Manjusha_toPadma[Manjusha::Manjusha_COLON]		= ":";
$Manjusha_toPadma[Manjusha::Manjusha_SEMICOLON]		= ";";
$Manjusha_toPadma[Manjusha::Manjusha_APOSTROPHE]	= "\xE2\x80\x99";
$Manjusha_toPadma[Manjusha::Manjusha_MISC]		= "\xE2\x80\x98";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_1]		= "1";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_2]		= "2";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_3]		= "3";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_4]		= "4";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_5]		= "5";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_6]		= "6";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_7]		= "7";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_8]		= "8";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_9]		= "9";
$Manjusha_toPadma[Manjusha::Manjusha_ENG_0]		= "0";


$Manjusha_prefixList = Array();

$Manjusha_prefixList[Manjusha::Manjusha_vowelsn_I]      = true;
$Manjusha_prefixList[Manjusha::Manjusha_vowelsn_IM]     = true;
$Manjusha_prefixList[Manjusha::Manjusha_halffm_THR]     = true;

$Manjusha_suffixList = Array();

$Manjusha_suffixList[Manjusha::Manjusha_halffm_RA]          = true;
$Manjusha_suffixList[Manjusha::Manjusha_vowelsn_II]         = true;
$Manjusha_suffixList[Manjusha::Manjusha_vowelsn_OO]         = true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_RR_MISC_II]  = true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_RR_MISC_AI]  = true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_RR_MISC_AA]  = true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_RR_MISC_AI_M]= true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_RR_MISC_AA_M]= true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_RR_MISC_M]   = true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_RR_MISC_II_M]= true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_RR_MISC_E_M] = true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_RR_MISC_E]   = true;
$Manjusha_suffixList[Manjusha::Manjusha_conjct_AA_RA]  	    = true;

$Manjusha_redundantList = Array();
$Manjusha_redundantList[Manjusha::Manjusha_BLANK_1]  = true;
$Manjusha_redundantList[Manjusha::Manjusha_BLANK_2]  = true;

$Manjusha_overloadList = Array();
$Manjusha_overloadList[Manjusha::Manjusha_vowel_A]      = true;
$Manjusha_overloadList[Manjusha::Manjusha_vowel_AA]     = true;
$Manjusha_overloadList[Manjusha::Manjusha_vowelsn_AA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_vowel_EE]     = true;
$Manjusha_overloadList[Manjusha::Manjusha_vowel_I]      = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_KA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_KHA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_GA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_GHA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_CA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_JA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_JHA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_NYA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_NNA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_TA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_THA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_DHA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_NA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_PA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_BA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_BHA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_MA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_YA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_VA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_SHA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_SSA]   = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_SA]    = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_KSHA]  = true;
$Manjusha_overloadList[Manjusha::Manjusha_halffm_ATTA]  = true; 
$Manjusha_overloadList["\xC2\x82"]    	     = true; 
$Manjusha_overloadList["\xC3\xB7"]    	     = true; 
$Manjusha_overloadList["\xC3\xAF"]           = true; 
$Manjusha_overloadList["\xC2\xAF"]           = true; 
$Manjusha_overloadList["\xC3\x97"]           = true; 

function Manjusha_initialize()
{
    global $fontinfo;

    $fontinfo["manjusha"]["language"] = "Devanagari";
    $fontinfo["manjusha"]["class"] = "Manjusha";
    $fontinfo["manjushabold"]["language"] = "Devanagari";
    $fontinfo["manjushabold"]["class"] = "Manjusha";
    $fontinfo["manjushamedium"]["language"] = "Devanagari";
    $fontinfo["manjushamedium"]["class"] = "Manjusha";
}
?>
