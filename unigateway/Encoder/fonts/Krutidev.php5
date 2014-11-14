<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
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

//Kruti Dev 010 Devanagari
class Krutidev
{
function Krutidev()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "Kruti Dev 010";
var $displayName  = "Krutidev";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup ($str)
{
  global $Krutidev_toPadma;
   if(array_key_exists($str,$Krutidev_toPadma))
    return $Krutidev_toPadma[$str];
   return false;
}

function isPrefixSymbol ($str)
{
    global $Krutidev_prefixList;
    return array_key_exists($str,$Krutidev_prefixList);
}

function isSuffixSymbol ($str)
{
    global $Krutidev_suffixList;
    return array_key_exists($str,$Krutidev_suffixList);
}

function isOverloaded ($str)
{
    global $Krutidev_overloadList;
    return array_key_exists($str,$Krutidev_overloadList);
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
    global $Krutidev_redundantList;
    return array_key_exists($str,$Krutidev_redundantList);
}


//TODO U+ 002D,00A4,00A7,00CA,
//00D3,00DB,00DC,00E5,00EE,00F1,00F3,00F5,0152
//0160,2010,2039,203A

//Vowel modifiers
const Krutidev_avagraha	      = "\xC2\xB7";
const Krutidev_anusvara       = "\x61";
const Krutidev_candrabindu    = "\xC2\xA1";
//const Krutidev_visarga      = "\u";
const Krutidev_virama         = "\x7E";

//Vowels
const Krutidev_vowel_A        = "\x76";
const Krutidev_vowel_AA       = "\x76\x6B";
const Krutidev_vowel_I        = "\x62";
const Krutidev_vowel_II_1     = "\xC3\x83";
const Krutidev_vowel_II_2     = "\x62\x5A";
const Krutidev_vowel_U        = "\x6D";
const Krutidev_vowel_UU       = "\xC3\x85";
const Krutidev_vowel_R        = "\x5F";
//const Krutidev_vowel_CDR_E  = "\u";
const Krutidev_vowel_EE       = "\x2C";
const Krutidev_vowel_AI       = "\x2C\x73";
const Krutidev_vowel_CDR_O    = "\x76\x6B\x57";
const Krutidev_vowel_OO_1     = "\x76\x6B\x73";
const Krutidev_vowel_OO_2     = "\x76\xC2\xA8"; 
const Krutidev_vowel_AU_1     = "\x76\x6B\x53";
const Krutidev_vowel_AU_2     = "\x76\xC2\xA9";

//Consonants
const Krutidev_consnt_KA_1    = "\x44\x6B";
const Krutidev_consnt_KA_2    = "\x64";
const Krutidev_consnt_KHA_1   = "\x5B\x6B";
//const Krutidev_consnt_KHA_2   = "\u";
//const Krutidev_consnt_KHHA_1  = "\u";
//const Krutidev_consnt_KHHA_2  = "\u";
const Krutidev_consnt_GA_1    = "\x58\x6B";
const Krutidev_consnt_GA_2    = "\x78";
//const Krutidev_consnt_GHHA    = "\u";
const Krutidev_consnt_GHA_1   = "\x3F\x6B";
const Krutidev_consnt_GHA_2   = "\xC3\x84";
const Krutidev_consnt_NGA     = "\xC2\xB3";

const Krutidev_consnt_CA_1    = "\x50\x6B";
const Krutidev_consnt_CA_2    = "\x70";
const Krutidev_consnt_CHA     = "\x4E";
const Krutidev_consnt_JA_1    = "\x54\x6B";
const Krutidev_consnt_JA_2    = "\x74";
const Krutidev_consnt_ZA_1    = "\x74\x2B";
//const Krutidev_consnt_ZA_2    = "\u"; 
const Krutidev_consnt_JHA_1   = "\x3E";
const Krutidev_consnt_JHA_2   = "\xC3\x96\x6B";
const Krutidev_consnt_JHA_3   = "\xC3\xB7\x6B";
const Krutidev_consnt_NYA_1   = "\xC2\xA5";
const Krutidev_consnt_NYA_2   = "\xC2\xB4";

const Krutidev_consnt_TTA     = "\x56";
const Krutidev_consnt_TTHA    = "\x42";
const Krutidev_consnt_DDA     = "\x4D";
const Krutidev_consnt_DDDHA   = "\x4D\x2B";
const Krutidev_consnt_DDHA    = "\x3C";
const Krutidev_consnt_RHA     = "\x3C\x2B"; 
const Krutidev_consnt_NNA     = "\x2E\x6B";

const Krutidev_consnt_TA_1    = "\x52\x6B";
const Krutidev_consnt_TA_2    = "\x72";
const Krutidev_consnt_THA     = "\x46\x6B";
const Krutidev_consnt_DA      = "\x6E";
const Krutidev_consnt_DHA_1   = "\x2F\x6B";
const Krutidev_consnt_DHA_2   = "\xC3\x8B\x6B";
const Krutidev_consnt_DHA_3   = "\xC3\xA8\x6B";
const Krutidev_consnt_NA_1    = "\x55\x6B";
const Krutidev_consnt_NA_2    = "\x75";

const Krutidev_consnt_PA_1    = "\x49\x6B";
const Krutidev_consnt_PA_2    = "\x69";
const Krutidev_consnt_PHA_1   = "\x51";
const Krutidev_consnt_PHA_2   = "\xC2\xB6\x6B";
//const Krutidev_consnt_FA_1    = "\u";
//const Krutidev_consnt_FA_2    = "\u"; 
const Krutidev_consnt_BA_1    = "\x43\x6B";
const Krutidev_consnt_BA_2    = "\x63";
const Krutidev_consnt_BHA_1   = "\x48\x6B";
const Krutidev_consnt_BHA_2   = "\xC2\x90";
const Krutidev_consnt_BHA_3   = "\xC3\x92";
const Krutidev_consnt_MA_1    = "\x45\x6B";
const Krutidev_consnt_MA_2    = "\x65";

const Krutidev_consnt_YA_1    = "\x3B";
const Krutidev_consnt_YA_2    = "\xC2\xB8\x6B";
const Krutidev_consnt_RA      = "\x6A";
const Krutidev_consnt_LA_1    = "\x59\x6B";
const Krutidev_consnt_LA_2    = "\x79";
const Krutidev_consnt_VA_1    = "\x4F\x6B";
const Krutidev_consnt_VA_2    = "\x6F";
const Krutidev_consnt_SHA_1   = "\x27\x6B";
const Krutidev_consnt_SHA_2   = "\xE2\x80\x9C\x6B"; 
const Krutidev_consnt_SHA_3   = "\xE2\x80\x9D\x6B"; 
const Krutidev_consnt_SSA_1   = "\x22\x6B";
const Krutidev_consnt_SSA_2   = "\xE2\x80\x98\x6B";
const Krutidev_consnt_SSA_3   = "\xE2\x80\x99\x6B";
const Krutidev_consnt_SA_1    = "\x4C\x6B";
const Krutidev_consnt_SA_2    = "\x6C";
const Krutidev_consnt_HA      = "\x67";
const Krutidev_consnt_LLA     = "\x47";

//Vowel signs
const Krutidev_vowelsn_AA     = "\x6B";
const Krutidev_vowelsn_I      = "\x66";
const Krutidev_vowelsn_II     = "\x68";
const Krutidev_vowelsn_U      = "\x71";
const Krutidev_vowelsn_UU     = "\x77";
const Krutidev_vowelsn_R      = "\x60";
const Krutidev_vowelsn_CDR_E  = "\x57"; 
const Krutidev_vowelsn_EE_1   = "\x73";
const Krutidev_vowelsn_EE_2   = "\xC2\xA2";
const Krutidev_vowelsn_AI     = "\x53";
const Krutidev_vowelsn_CDR_O_1= "\xE2\x80\x9A";
const Krutidev_vowelsn_CDR_O_2= "\x6B\x57";
const Krutidev_vowelsn_OO_1   = "\xC2\xA8";
const Krutidev_vowelsn_OO_2   = "\xC2\xAE";
const Krutidev_vowelsn_AU     = "\xC2\xA9";

//Matra + modifier
const Krutidev_vowelsn_IM     = "\xC3\x87";
const Krutidev_vowelsn_IIM    = "\xC3\x88";

// Half forms
const Krutidev_halffm_KA      = "\x44";
const Krutidev_halffm_KSH     = "\x7B";
const Krutidev_halffm_KHA     = "\x5B";
const Krutidev_halffm_GA      = "\x58";
const Krutidev_halffm_GHA     = "\x3F";
const Krutidev_halffm_CA      = "\x50";
const Krutidev_halffm_JA      = "\x54";
//const Krutidev_halffm_ZA      = "\u";
const Krutidev_halffm_JHA_1   = "\xC3\x96";
const Krutidev_halffm_JHA_2   = "\xC3\xB7";
//const Krutidev_halffm_NYA     = "\u";
const Krutidev_halffm_NN      = "\xE2\x84\xA2"; 
const Krutidev_halffm_NNA     = "\x2E"; 
const Krutidev_halffm_TA      = "\x52";
const Krutidev_halffm_TT_1    = "\xC3\x99";
const Krutidev_halffm_TT_2    = "\xC5\xB8";
const Krutidev_halffm_THA     = "\x46";
const Krutidev_halffm_DA      = "\x6E\x7E";
const Krutidev_halffm_DHA_1   = "\x2F";
const Krutidev_halffm_DHA_2   = "\xC3\x8B";
const Krutidev_halffm_DHA_3   = "\xC3\xA8";
const Krutidev_halffm_NA      = "\x55";
const Krutidev_halffm_PA      = "\x49";
const Krutidev_halffm_PHA     = "\xC2\xB6";
const Krutidev_halffm_BA      = "\x43";
const Krutidev_halffm_BHA     = "\x48";
const Krutidev_halffm_MA      = "\x45";
const Krutidev_halffm_YA      = "\xC2\xB8";
const Krutidev_halffm_RA      = "\x5A"; 
const Krutidev_halffm_LA      = "\x59";
const Krutidev_halffm_VA      = "\x4F";
const Krutidev_halffm_SHA_1   = "\x27";
const Krutidev_halffm_SHA_2   = "\xE2\x80\x9C";
const Krutidev_halffm_SHA_3   = "\xE2\x80\x9D";
//const Krutidev_halffm_SHR     = "\u";
const Krutidev_halffm_SSA_1   = "\x22";
const Krutidev_halffm_SSA_2   = "\xE2\x80\x98";
const Krutidev_halffm_SSA_3   = "\xE2\x80\x99";
const Krutidev_halffm_SA      = "\x4C";
const Krutidev_halffm_HA      = "\xC2\xBA";
const Krutidev_halffm_RRA     = "\xC3\x9A";//Check

//Half forms of RA
const Krutidev_halffm_RA_ANU  = "\xC2\xB1";
const Krutidev_halffm_RI      = "\xC3\x86";
const Krutidev_halffm_RIM     = "\xC3\x89";

//Conjuncts
const Krutidev_conjct_KK      = "\xC3\xB4"; 
const Krutidev_conjct_KT      = "\xC3\xA4"; 
const Krutidev_conjct_KSH     = "\x7B\x6B";
const Krutidev_conjct_KSHEE   = "\x7B\xC2\xA8";
const Krutidev_conjct_KR      = "\xC3\x98";
const Krutidev_conjct_KHR     = "\xC2\xA3";
const Krutidev_conjct_JNY     = "\x4B";
const Krutidev_conjct_TTTT_1  = "\xC3\x8D";
const Krutidev_conjct_TTTT_2  = "\xC3\xAA";
const Krutidev_conjct_TTTTH_1 = "\xC3\x8E";
const Krutidev_conjct_TTTTH_2 = "\xC3\xAB";
const Krutidev_conjct_TTHTTH  = "\xC3\xB0";
const Krutidev_conjct_TT_1    = "\xC3\x99\x6B";
const Krutidev_conjct_TT_2    = "\xC5\xB8\x6B";
const Krutidev_conjct_TR_1    = "\x3D";
const Krutidev_conjct_TR_2    = "\xC2\xAB";
const Krutidev_conjct_DD_1    = "\xC3\x8C";
const Krutidev_conjct_DD_2    = "\xC3\xAD";
const Krutidev_conjct_DR      = "\xC3\xA6";
const Krutidev_conjct_DBH_1   = "\xC3\xB6";
const Krutidev_conjct_DBH_2   = "\xCB\x9C";
const Krutidev_conjct_DDDD_1  = "\xC3\x8F";
const Krutidev_conjct_DDDD_2  = "\xC3\xAC";
const Krutidev_conjct_DD_DDH_1= "\xC3\x94";
const Krutidev_conjct_DD_DDH_2= "\xC3\xAF";
const Krutidev_conjct_D_DH    = "\x29";
const Krutidev_conjct_DM      = "\xC3\xB9";
const Krutidev_conjct_DY      = "\x7C";
const Krutidev_conjct_DV      = "\x7D";
const Krutidev_conjct_NN_1    = "\xC3\xA9";
const Krutidev_conjct_NN_2    = "\xE2\x84\xA2\x6B";
const Krutidev_conjct_PR_1    = "\xC3\x81";
const Krutidev_conjct_PR_2    = "\xC3\xA7";
const Krutidev_conjct_PHR     = "\xC3\x9D";
const Krutidev_conjct_SHR     = "\x4A";
//const Krutidev_conjct_SHV     = "\x27\x6F";
const Krutidev_conjct_HN      = "\xC3\xA0";
const Krutidev_conjct_HM      = "\xC3\xA3";
//const Krutidev_conjct_HR      = "\u";
const Krutidev_conjct_HY      = "\xC3\xA1";

//rakar
const Krutidev_vattu_RA_1     = "\x7A";
const Krutidev_vattu_RA_2     = "\xC2\xAA";

// Combos
const Krutidev_combo_KR_1     = "\xC3\x91";
const Krutidev_combo_KR_2     = "\xE2\x80\x94";
//const Krutidev_combo_JI       = "\u"; 
//const Krutidev_combo_PHR      = "\u";
const Krutidev_combo_DR       = "\xE2\x80\x93";
const Krutidev_combo_RU       = "\x23";
const Krutidev_combo_RUU      = "\x3A";
//const Krutidev_combo_LR       = "\u"; 
const Krutidev_combo_NNEE      = "\x2E\x73\x6B"; 
//const Krutidev_combo_SEE      = "\u"; 
const Krutidev_combo_HR       = "\xC3\xA2";
const Krutidev_combo_THEE     = "\x46\xC2\xA8";
const Krutidev_combo_DHEE     = "\x2F\xC2\xA8";
const Krutidev_combo_SHAI     = "\x27\xC2\xA9";

const Krutidev_misc_DANDA     = "\x41";
const Krutidev_misc_nukta     = "\x2B";

//Matches ASCII
const Krutidev_EXCLAMATION    = "\x21";
//Digits Arabic
const Krutidev_digit_ZERO     = "\x30";
const Krutidev_digit_ONE      = "\x31";
const Krutidev_digit_TWO      = "\x32";
const Krutidev_digit_THREE    = "\x33";
const Krutidev_digit_FOUR     = "\x34";
const Krutidev_digit_FIVE     = "\x35";
const Krutidev_digit_SIX      = "\x36";
const Krutidev_digit_SEVEN    = "\x37";
const Krutidev_digit_EIGHT    = "\x38";
const Krutidev_digit_NINE     = "\x39";

//Devanagari Digits
//const Krutidev_digit_ZERO_DEV     = "\u";
const Krutidev_digit_ONE_DEV      = "\xC6\x92";
const Krutidev_digit_TWO_DEV      = "\xE2\x80\x9E";
const Krutidev_digit_THREE_DEV    = "\xE2\x80\xA6";
const Krutidev_digit_FOUR_DEV     = "\xE2\x80\xA0";
const Krutidev_digit_FIVE_DEV     = "\xE2\x80\xA1";
const Krutidev_digit_SIX_DEV      = "\xCB\x86";
const Krutidev_digit_SEVEN_DEV    = "\xE2\x80\xB0";
//const Krutidev_digit_EIGHT_DEV    = "\u";
//const Krutidev_digit_NINE_DEV     = "\u";

//Does not match ASCII
const Krutidev_PLUS           = "\x24";
const Krutidev_COLON          = "\x25";
const Krutidev_HYPHEN         = "\x26";
const Krutidev_SEMICOLON      = "\x28";
const Krutidev_SLASH          = "\x40";
const Krutidev_QUESTION       = "\x5C";
const Krutidev_COMMA          = "\x5D";
const Krutidev_DIVIDE	      = "\xC2\xBB";
const Krutidev_PARENLEFT      = "\xC2\xBC";
const Krutidev_PARENRIGHT     = "\xC2\xBD";
const Krutidev_EQUALS         = "\xC2\xBE";
const Krutidev_CURLYLEFT_1    = "\xC2\xBF";
const Krutidev_CURLYLEFT_2    = "\xC3\xB8";
const Krutidev_CURLYRIGHT     = "\xC3\x80";
const Krutidev_LQTSINGLE      = "\x5E"; 
const Krutidev_RQTSINGLE      = "\x2A";
const Krutidev_LQTDOUBLE      = "\xC3\x9F";
const Krutidev_RQTDOUBLE      = "\xC3\x9E";

/*
const Krutidev_misc_QTDOUBLE  = "\u"; 
const Krutidev_misc_QTSINGLE  = "\u";  
const Krutidev_PERIOD_1       = "\u";
const Krutidev_PERCENT        = "\u"; 
const Krutidev_LESSTHAN_1     = "\u"; 
const Krutidev_TILDE          = "\u";  
const Krutidev_GREATERTHAN_1  = "\u"; 
const Krutidev_SQBKTLEFT      = "\u"; 
const Krutidev_SQBKTRIGHT     = "\u"; 
const Krutidev_BACKQUOTE      = "\u";
const Krutidev_PERIOD_2       = "\u";
const Krutidev_LESSTHAN_2     = "\u";
const Krutidev_GREATERTHAN_2  = "\u";
const Krutidev_ATSIGN         = "\u";
const Krutidev_PIPE           = "\u";
const Krutidev_BACKSLASH      = "\u";
const Krutidev_SQUAREROOT     = "\u";
const Krutidev_CIRCUMFLEX     = "\u";
*/

//const Krutidev_misc_UNKNOWN_1 = "\xC3\x82";
}
$Krutidev_toPadma = array();

$Krutidev_toPadma[Krutidev::Krutidev_avagraha]   = Padma::Padma_avagraha;
$Krutidev_toPadma[Krutidev::Krutidev_anusvara]   = Padma::Padma_anusvara;
$Krutidev_toPadma[Krutidev::Krutidev_candrabindu]= Padma::Padma_candrabindu;
//$Krutidev_toPadma[Krutidev::Krutidev_visarga]    = Padma::Padma_visarga;
$Krutidev_toPadma[Krutidev::Krutidev_virama]     = Padma::Padma_syllbreak;

$Krutidev_toPadma[Krutidev::Krutidev_vowel_A]    = Padma::Padma_vowel_A;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_AA]   = Padma::Padma_vowel_AA;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_I]    = Padma::Padma_vowel_I;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_II_1] = Padma::Padma_vowel_II;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_II_2] = Padma::Padma_vowel_II;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_U]    = Padma::Padma_vowel_U;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_UU]   = Padma::Padma_vowel_UU;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_R]    = Padma::Padma_vowel_R;
//$Krutidev_toPadma[Krutidev::Krutidev_vowel_CDR_E] = Padma::Padma_vowel_CDR_E;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_EE]   = Padma::Padma_vowel_EE;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_AI]   = Padma::Padma_vowel_AI;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_CDR_O] = Padma::Padma_vowel_CDR_O;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_OO_1] = Padma::Padma_vowel_OO;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_OO_2] = Padma::Padma_vowel_OO;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_AU_1] = Padma::Padma_vowel_AU;
$Krutidev_toPadma[Krutidev::Krutidev_vowel_AU_2] = Padma::Padma_vowel_AU;

$Krutidev_toPadma[Krutidev::Krutidev_consnt_KA_1]  = Padma::Padma_consnt_KA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_KA_2]  = Padma::Padma_consnt_KA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_KHA_1] = Padma::Padma_consnt_KHA;
//$Krutidev_toPadma[Krutidev::Krutidev_consnt_KHA_2] = Padma::Padma_consnt_KHA;
//$Krutidev_toPadma[Krutidev::Krutidev_consnt_KHHA_1] = Padma::Padma_consnt_KHHA;
//$Krutidev_toPadma[Krutidev::Krutidev_consnt_KHHA_2] = Padma::Padma_consnt_KHHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_GA_1]  = Padma::Padma_consnt_GA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_GA_2]  = Padma::Padma_consnt_GA;
//$Krutidev_toPadma[Krutidev::Krutidev_consnt_GHHA] = Padma::Padma_consnt_GHHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_GHA_1]= Padma::Padma_consnt_GHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_GHA_2]= Padma::Padma_consnt_GHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_NGA] = Padma::Padma_consnt_NGA;

$Krutidev_toPadma[Krutidev::Krutidev_consnt_CA_1]= Padma::Padma_consnt_CA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_CA_2]= Padma::Padma_consnt_CA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_CHA] = Padma::Padma_consnt_CHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_JA_1]  = Padma::Padma_consnt_JA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_JA_2]  = Padma::Padma_consnt_JA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_ZA_1]  = Padma::Padma_consnt_ZA;
//$Krutidev_toPadma[Krutidev::Krutidev_consnt_ZA_2]  = Padma::Padma_consnt_ZA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_JHA_1] = Padma::Padma_consnt_JHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_JHA_2] = Padma::Padma_consnt_JHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_JHA_3] = Padma::Padma_consnt_JHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_NYA_1] = Padma::Padma_consnt_NYA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_NYA_2] = Padma::Padma_consnt_NYA;

$Krutidev_toPadma[Krutidev::Krutidev_consnt_TTA] = Padma::Padma_consnt_TTA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_DDA] = Padma::Padma_consnt_DDA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_DDDHA] = Padma::Padma_consnt_DDDHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_RHA] = Padma::Padma_consnt_RHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_NNA] = Padma::Padma_consnt_NNA;

$Krutidev_toPadma[Krutidev::Krutidev_consnt_TA_1]= Padma::Padma_consnt_TA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_TA_2]= Padma::Padma_consnt_TA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_THA] = Padma::Padma_consnt_THA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_DA]  = Padma::Padma_consnt_DA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_DHA_1] = Padma::Padma_consnt_DHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_DHA_2] = Padma::Padma_consnt_DHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_NA_1]= Padma::Padma_consnt_NA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_NA_2]= Padma::Padma_consnt_NA;

$Krutidev_toPadma[Krutidev::Krutidev_consnt_PA_1]= Padma::Padma_consnt_PA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_PA_2]= Padma::Padma_consnt_PA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_PHA_1] = Padma::Padma_consnt_PHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_PHA_2] = Padma::Padma_consnt_PHA;
//$Krutidev_toPadma[Krutidev::Krutidev_consnt_FA_1] = Padma::Padma_consnt_FA;
//$Krutidev_toPadma[Krutidev::Krutidev_consnt_FA_2] = Padma::Padma_consnt_FA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_BA_1]= Padma::Padma_consnt_BA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_BA_2]= Padma::Padma_consnt_BA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_BHA_1] = Padma::Padma_consnt_BHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_BHA_2] = Padma::Padma_consnt_BHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_BHA_3] = Padma::Padma_consnt_BHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_MA_1]  = Padma::Padma_consnt_MA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_MA_2]  = Padma::Padma_consnt_MA;

$Krutidev_toPadma[Krutidev::Krutidev_consnt_YA_1]  = Padma::Padma_consnt_YA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_YA_2]  = Padma::Padma_consnt_YA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_RA]    = Padma::Padma_consnt_RA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_LA_1]  = Padma::Padma_consnt_LA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_LA_2]  = Padma::Padma_consnt_LA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_VA_1]  = Padma::Padma_consnt_VA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_VA_2]  = Padma::Padma_consnt_VA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_SHA_1] = Padma::Padma_consnt_SHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_SHA_2] = Padma::Padma_consnt_SHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_SHA_3] = Padma::Padma_consnt_SHA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_SSA_3] = Padma::Padma_consnt_SSA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_SA_1]= Padma::Padma_consnt_SA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_SA_2]= Padma::Padma_consnt_SA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_HA]  = Padma::Padma_consnt_HA;
$Krutidev_toPadma[Krutidev::Krutidev_consnt_LLA] = Padma::Padma_consnt_LLA;

//Gunintamulu
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_AA] = Padma::Padma_vowelsn_AA;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_I]  = Padma::Padma_vowelsn_I;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_II] = Padma::Padma_vowelsn_II;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_U]  = Padma::Padma_vowelsn_U;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_UU] = Padma::Padma_vowelsn_UU;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_R]  = Padma::Padma_vowelsn_R;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_CDR_E] = Padma::Padma_vowelsn_CDR_E;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_EE_1] = Padma::Padma_vowelsn_EE;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_EE_2] = Padma::Padma_vowelsn_EE;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_AI] = Padma::Padma_vowelsn_AI;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_CDR_O_1] = Padma::Padma_vowelsn_CDR_O;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_CDR_O_2] = Padma::Padma_vowelsn_CDR_O;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_OO_1] = Padma::Padma_vowelsn_OO;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_OO_2] = Padma::Padma_vowelsn_OO;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_AU] = Padma::Padma_vowelsn_AU;

//Matra + modifier
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_IM]     = Padma::Padma_vowelsn_I  . Padma::Padma_anusvara;
$Krutidev_toPadma[Krutidev::Krutidev_vowelsn_IIM]    = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;

//Halffm
$Krutidev_toPadma[Krutidev::Krutidev_halffm_KA]    = Padma::Padma_halffm_KA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_KSH]   = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_KHA]   = Padma::Padma_halffm_KHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_GA]    = Padma::Padma_halffm_GA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_GHA]   = Padma::Padma_halffm_GHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_CA]    = Padma::Padma_halffm_CA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_JA]    = Padma::Padma_halffm_JA;
//$Krutidev_toPadma[Krutidev::Krutidev_halffm_ZA]    = Padma::Padma_halffm_ZA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_JHA_1] = Padma::Padma_halffm_JHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_JHA_2] = Padma::Padma_halffm_JHA;
//$Krutidev_toPadma[Krutidev::Krutidev_halffm_NYA]   = Padma::Padma_halffm_NYA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_NNA]   = Padma::Padma_halffm_NNA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_TA]    = Padma::Padma_halffm_TA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_TT_1]  = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_TT_2]  = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_THA]   = Padma::Padma_halffm_THA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_DA]    = Padma::Padma_halffm_DA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_DHA_1] = Padma::Padma_halffm_DHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_DHA_2] = Padma::Padma_halffm_DHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_DHA_3] = Padma::Padma_halffm_DHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_NA]    = Padma::Padma_halffm_NA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_PA]    = Padma::Padma_halffm_PA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_PHA]   = Padma::Padma_halffm_PHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_BA]    = Padma::Padma_halffm_BA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_BHA]   = Padma::Padma_halffm_BHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_MA]    = Padma::Padma_halffm_MA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_YA]    = Padma::Padma_halffm_YA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_RA]    = Padma::Padma_halffm_RA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_LA]    = Padma::Padma_halffm_LA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_VA]    = Padma::Padma_halffm_VA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_SHA_1] = Padma::Padma_halffm_SHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_SHA_2] = Padma::Padma_halffm_SHA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_SHA_3] = Padma::Padma_halffm_SHA;
//$Krutidev_toPadma[Krutidev::Krutidev_halffm_SHR]   = Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_SSA_1] = Padma::Padma_halffm_SSA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_SSA_2] = Padma::Padma_halffm_SSA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_SSA_3] = Padma::Padma_halffm_SSA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_SA]    = Padma::Padma_halffm_SA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_HA]    = Padma::Padma_halffm_HA;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_RRA]   = Padma::Padma_halffm_RRA;

//Half forms of RA
$Krutidev_toPadma[Krutidev::Krutidev_halffm_RA_ANU]= Padma::Padma_halffm_RA . Padma::Padma_anusvara;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_RI]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I;
$Krutidev_toPadma[Krutidev::Krutidev_halffm_RIM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I . Padma::Padma_anusvara;

//Conjuncts
$Krutidev_toPadma[Krutidev::Krutidev_conjct_KK]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_KSHEE]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_EE;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_KR]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_KHR]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_TTTT_1] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_TTTT_2] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_TTTTH_1]= Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_TTTTH_2]= Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_TT_1]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_TT_2]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_TR_1]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_TR_2]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DD_1]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DD_2]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DR]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DBH_1]  = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DBH_2]  = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DDDD_1] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DDDD_2] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DD_DDH_1] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DD_DDH_2] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_NN_1]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_NN_2]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_PR_1]   = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_PR_2]   = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_PHR]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
//$Krutidev_toPadma[Krutidev::Krutidev_conjct_SHV]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_HN]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
//$Krutidev_toPadma[Krutidev::Krutidev_conjct_HR]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;

$Krutidev_toPadma[Krutidev::Krutidev_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Krutidev_toPadma[Krutidev::Krutidev_vattu_RA_2]    = Padma::Padma_vattu_RA;

$Krutidev_toPadma[Krutidev::Krutidev_combo_KR_1]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_R;
$Krutidev_toPadma[Krutidev::Krutidev_combo_KR_2]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_R;
//$Krutidev_toPadma[Krutidev::Krutidev_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
//$Krutidev_toPadma[Krutidev::Krutidev_combo_PHR]     = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_R;
$Krutidev_toPadma[Krutidev::Krutidev_combo_DR]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_R;
$Krutidev_toPadma[Krutidev::Krutidev_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Krutidev_toPadma[Krutidev::Krutidev_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
//$Krutidev_toPadma[Krutidev::Krutidev_combo_LR]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_R;
$Krutidev_toPadma[Krutidev::Krutidev_combo_NNEE]    = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_EE;
//$Krutidev_toPadma[Krutidev::Krutidev_combo_SEE]     = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_EE;
$Krutidev_toPadma[Krutidev::Krutidev_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$Krutidev_toPadma[Krutidev::Krutidev_combo_THEE]    = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_EE;
$Krutidev_toPadma[Krutidev::Krutidev_combo_DHEE]    = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_EE;
$Krutidev_toPadma[Krutidev::Krutidev_combo_SHAI]    = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_AI;

$Krutidev_toPadma[Krutidev::Krutidev_misc_DANDA]    = Padma::Padma_danda;
$Krutidev_toPadma[Krutidev::Krutidev_misc_nukta]    = Padma::Padma_nukta;

//Devanagari Digits
//$Krutidev_toPadma[Krutidev::Krutidev_digit_ZERO_DEV]       = Padma::Padma_digit_ZERO;
$Krutidev_toPadma[Krutidev::Krutidev_digit_ONE_DEV]        = Padma::Padma_digit_ONE;
$Krutidev_toPadma[Krutidev::Krutidev_digit_TWO_DEV]        = Padma::Padma_digit_TWO;
$Krutidev_toPadma[Krutidev::Krutidev_digit_THREE_DEV]      = Padma::Padma_digit_THREE;
$Krutidev_toPadma[Krutidev::Krutidev_digit_FOUR_DEV]       = Padma::Padma_digit_FOUR;
$Krutidev_toPadma[Krutidev::Krutidev_digit_FIVE_DEV]       = Padma::Padma_digit_FIVE;
$Krutidev_toPadma[Krutidev::Krutidev_digit_SIX_DEV]        = Padma::Padma_digit_SIX;
$Krutidev_toPadma[Krutidev::Krutidev_digit_SEVEN_DEV]      = Padma::Padma_digit_SEVEN;
//$Krutidev_toPadma[Krutidev::Krutidev_digit_EIGHT_DEV]      = Padma::Padma_digit_EIGHT;
//$Krutidev_toPadma[Krutidev::Krutidev_digit_NINE_DEV]       = Padma::Padma_digit_NINE;


//Does not match ASCII
$Krutidev_toPadma[Krutidev::Krutidev_PLUS]          = ".";
$Krutidev_toPadma[Krutidev::Krutidev_COLON]         = ":";
$Krutidev_toPadma[Krutidev::Krutidev_HYPHEN]        = "-";
$Krutidev_toPadma[Krutidev::Krutidev_SEMICOLON]     = ";";
$Krutidev_toPadma[Krutidev::Krutidev_SLASH]         = "/";
$Krutidev_toPadma[Krutidev::Krutidev_QUESTION]      = "?";
$Krutidev_toPadma[Krutidev::Krutidev_COMMA]         = ",";
$Krutidev_toPadma[Krutidev::Krutidev_DIVIDE]        = "\xC3\xB7";
$Krutidev_toPadma[Krutidev::Krutidev_PARENLEFT]     = "(";
$Krutidev_toPadma[Krutidev::Krutidev_PARENRIGHT]    = ")";
$Krutidev_toPadma[Krutidev::Krutidev_EQUALS]        = "=";
$Krutidev_toPadma[Krutidev::Krutidev_CURLYLEFT_1]   = "{";
$Krutidev_toPadma[Krutidev::Krutidev_CURLYLEFT_2]   = "{";
$Krutidev_toPadma[Krutidev::Krutidev_CURLYRIGHT]    = "}";
$Krutidev_toPadma[Krutidev::Krutidev_LQTSINGLE]     = "\xE2\x80\x98";
$Krutidev_toPadma[Krutidev::Krutidev_RQTSINGLE]     = "\xE2\x80\x99";
$Krutidev_toPadma[Krutidev::Krutidev_LQTDOUBLE]     = "\xE2\x80\x9C";
$Krutidev_toPadma[Krutidev::Krutidev_RQTDOUBLE]     = "\xE2\x80\x9D";

/*
$Krutidev_toPadma[Krutidev::Krutidev_PERIOD_1]      = ".";
$Krutidev_toPadma[Krutidev::Krutidev_PERCENT]       = "%";
$Krutidev_toPadma[Krutidev::Krutidev_LESSTHAN_1]    = "<";
$Krutidev_toPadma[Krutidev::Krutidev_TILDE]         = "~";
$Krutidev_toPadma[Krutidev::Krutidev_GREATERTHAN_1] = ">";
$Krutidev_toPadma[Krutidev::Krutidev_SQBKTLEFT]     = "[";
$Krutidev_toPadma[Krutidev::Krutidev_SQBKTRIGHT]    = "]";
$Krutidev_toPadma[Krutidev::Krutidev_BACKQUOTE]     = "`";
$Krutidev_toPadma[Krutidev::Krutidev_PERIOD_2]      = ".";
$Krutidev_toPadma[Krutidev::Krutidev_LESSTHAN_2]    = "<";
$Krutidev_toPadma[Krutidev::Krutidev_GREATERTHAN_2] = ">";
$Krutidev_toPadma[Krutidev::Krutidev_ATSIGN]        = "@";
$Krutidev_toPadma[Krutidev::Krutidev_PIPE]          = "|";
$Krutidev_toPadma[Krutidev::Krutidev_BACKSLASH]     = "\\";
$Krutidev_toPadma[Krutidev::Krutidev_SQUAREROOT]    = "\xE2\x88\x9A";
$Krutidev_toPadma[Krutidev::Krutidev_CIRCUMFLEX]    = "^";
*/
$Krutidev_prefixList = array();
$Krutidev_prefixList[Krutidev::Krutidev_vowelsn_I]  = true;
$Krutidev_prefixList[Krutidev::Krutidev_vowelsn_IM] = true;
$Krutidev_prefixList[Krutidev::Krutidev_halffm_RI]  = true;
$Krutidev_prefixList[Krutidev::Krutidev_halffm_RIM] = true;

$Krutidev_suffixList = array();
$Krutidev_suffixList[Krutidev::Krutidev_halffm_RA]      = true;
$Krutidev_suffixList[Krutidev::Krutidev_halffm_RA_ANU]  = true;

$Krutidev_redundantList = array();
//$Krutidev_redundantList[Krutidev::Krutidev_misc_UNKNOWN_1] = true;


$Krutidev_overloadList = array();
$Krutidev_overloadList[Krutidev::Krutidev_vowel_A]     = true;
$Krutidev_overloadList[Krutidev::Krutidev_vowel_AA]    = true;
$Krutidev_overloadList[Krutidev::Krutidev_vowel_I]     = true;
$Krutidev_overloadList[Krutidev::Krutidev_vowel_EE]    = true;
//$Krutidev_overloadList[Krutidev::Krutidev_consnt_KHA_2]= true;
$Krutidev_overloadList[Krutidev::Krutidev_consnt_GA_1] = true;
$Krutidev_overloadList[Krutidev::Krutidev_consnt_GA_2] = true;
$Krutidev_overloadList[Krutidev::Krutidev_consnt_JA_1] = true;
$Krutidev_overloadList[Krutidev::Krutidev_consnt_JA_2] = true;
$Krutidev_overloadList[Krutidev::Krutidev_consnt_DA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_consnt_DDA]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_consnt_DDHA] = true;
$Krutidev_overloadList[Krutidev::Krutidev_consnt_PHA_1]= true;
$Krutidev_overloadList[Krutidev::Krutidev_consnt_PHA_2]= true;
$Krutidev_overloadList[Krutidev::Krutidev_vowelsn_AA]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_KA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_KSH]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_KHA]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_GA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_GHA]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_CA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_JA]   = true;
//$Krutidev_overloadList[Krutidev::Krutidev_halffm_ZA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_JHA_1]= true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_JHA_2]= true;
//$Krutidev_overloadList[Krutidev::Krutidev_halffm_NYA]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_NN]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_NNA]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_TA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_TT_1] = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_TT_2] = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_THA]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_DHA_1]= true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_DHA_2]= true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_DHA_3]= true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_NA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_PA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_PHA]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_BA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_BHA]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_MA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_YA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_LA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_VA]   = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_SHA_1]= true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_SHA_2]= true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_SHA_3]= true;
//$Krutidev_overloadList[Krutidev::Krutidev_halffm_SHR]  = true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_SSA_1]= true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_SSA_2]= true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_SSA_3]= true;
$Krutidev_overloadList[Krutidev::Krutidev_halffm_SA]   = true;
$Krutidev_overloadList["\x2E\x73"]   = true;

function Krutidev_initialize()
{
    global $fontinfo;

    $fontinfo["kruti dev 010"]["language"] = "Devanagari";
    $fontinfo["kruti dev 010"]["class"] = "Krutidev";
}

?>
