<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Harshita Vani   <harshita@atc.tcs.com>
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

class HTChanakya
{
function HTChanakya()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "HTChanakya";
var $displayName  = "HTChanakya";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup($str) 
{
    global $HTChanakya_toPadma;
    return $HTChanakya_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $HTChanakya_prefixList;
    return $HTChanakya_prefixList[$str] != null;
}

function isSuffixSymbol($str)
{
    global $HTChanakya_suffixList;
    return $HTChanakya_suffixList[$str] != null;
}

function isOverloaded($str)
{
    global $HTChanakya_overloadList;
    return $HTChanakya_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
    return Padma::Padma_vowelsn_OO; 
    if (($sign1 == Padma::Padma_vowelsn_CDR_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_CDR_E))
    return Padma::Padma_vowelsn_CDR_O; 
    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function isRedundant($str)
{
    global $HTChanakya_redundantList;
    return $HTChanakya_redundantList[$str] != null;
}

//TODO: 4B, 93 (201C), 9b (203a), 9c (0153), a4, ad, b7, ee (look at 64), ef,

//Common stuff
//Specials
const HTChanakya_avagraha       = "\xC3\xB9";
const HTChanakya_anusvara_1     = "\xC2\xA2";
const HTChanakya_anusvara_2     = "\xC2\xB4";
const HTChanakya_candrabindu    = "\xC2\xA1";
const HTChanakya_virama         = "\xC3\xB7";
//const HTChanakya_visarga        = "\xC3\x91";

//Vowels
const HTChanakya_vowel_A        = "\xC2\xA5";
const HTChanakya_vowel_AA       = "\xC2\xA5\xC3\xA6";
const HTChanakya_vowel_I        = "\xC2\xA7";
const HTChanakya_vowel_II       = "\xC2\xA7\xC3\xBC";
const HTChanakya_vowel_U        = "\xC2\xA9";
const HTChanakya_vowel_UU       = "\xC2\xAA";
const HTChanakya_vowel_R        = "\xC2\xAB";
//const HTChanakya_vowel_RR       = "\xC2\xAC";
const HTChanakya_vowel_CDR_E    = "\xC2\xB0\xC3\xB2";
const HTChanakya_vowel_EE       = "\xC2\xB0";
const HTChanakya_vowel_AI       = "\xC2\xB0\xC3\xB0";
const HTChanakya_vowel_CDR_O    = "\xC2\xA5\xC3\xA6\xC3\xB2";
const HTChanakya_vowel_OO_1     = "\xC2\xA5\xC3\xA6\xC3\xB0";
const HTChanakya_vowel_OO_2     = "\xC2\xA5\xC3\xB4";
const HTChanakya_vowel_AU_1     = "\xC2\xA5\xC3\xA6\xC3\xB1";
const HTChanakya_vowel_AU_2     = "\xC2\xA5\xC3\xB5";

//Consonants
const HTChanakya_consnt_KA      = "\x58";
const HTChanakya_consnt_KHA_1   = "\x47\xC3\xA6";
const HTChanakya_consnt_KHA_2   = "\xC2\xB9"; 
const HTChanakya_consnt_GA_1    = "\x52\xC3\xA6";
const HTChanakya_consnt_GA_2    = "\xC2\xBB";
const HTChanakya_consnt_GHA     = "\xC2\xB2\xC3\xA6";
const HTChanakya_consnt_NGA     = "\xC2\xBE";

const HTChanakya_consnt_CA_1    = "\xC2\xAF\xC3\xA6";
const HTChanakya_consnt_CA_2    = "\xC2\xBF";
const HTChanakya_consnt_CHA     = "\xC3\x80";
const HTChanakya_consnt_JA      = "\xC3\x81";
const HTChanakya_consnt_ZA_1    = "\xE2\x80\xA2\xC3\xA6";
const HTChanakya_consnt_ZA_2    = "\xC3\x88\xC3\xA6";
const HTChanakya_consnt_ZA_3    = "\xC3\x8A\xC3\xA6";
const HTChanakya_consnt_JHA     = "\xC3\x9B\xC3\xA6";
const HTChanakya_consnt_NYA     = "\x49\xC3\xA6";

const HTChanakya_consnt_TTA     = "\xC3\x85";
const HTChanakya_consnt_TTHA    = "\xC3\x86";
const HTChanakya_consnt_DDA     = "\xC3\x87";
const HTChanakya_consnt_DDDHA   = "\xC3\x87\xC2\xB8";
const HTChanakya_consnt_DDHA    = "\xC3\x89";
const HTChanakya_consnt_RHA     = "\xC3\x89\xC2\xB8";
const HTChanakya_consnt_NNA     = "\x4A\xC3\xA6";

const HTChanakya_consnt_TA_1    = "\x50\xC3\xA6";
const HTChanakya_consnt_TA_2    = "\xC3\x8C";
const HTChanakya_consnt_THA_1   = "\x66\xC3\xA6";
const HTChanakya_consnt_THA_2   = "\xC3\x8D";
const HTChanakya_consnt_DA_1    = "\xC2\xBC";
const HTChanakya_consnt_DA_2    = "\xC3\x8E";
const HTChanakya_consnt_DHA_1   = "\x56\xC3\xA6";
const HTChanakya_consnt_DHA_2   = "\xC3\x8F";
const HTChanakya_consnt_NA      = "\xC3\x99";

const HTChanakya_consnt_PA_1    = "\xC3\x82";
const HTChanakya_consnt_PA_2    = "\xC5\x92\xC3\xA6";
const HTChanakya_consnt_PHA_1   = "\x59";
const HTChanakya_consnt_PHA_2   = "\xC2\xA3\xC3\xA6";
const HTChanakya_consnt_BA      = "\xC3\x95";
const HTChanakya_consnt_BHA_1   = "\xC2\xAC\xC3\xA6";
const HTChanakya_consnt_BHA_2   = "\xC3\x96";
const HTChanakya_consnt_MA_1    = "\xC2\xB3\xC3\xA6";
const HTChanakya_consnt_MA_2    = "\xC3\x97";

const HTChanakya_consnt_YA_1    = "\xC3\x84\xC3\xA6";
const HTChanakya_consnt_YA_2    = "\xC3\x98";
const HTChanakya_consnt_RA      = "\xC3\x9A";
const HTChanakya_consnt_LA_1    = "\xC2\xB6";
const HTChanakya_consnt_LA_2    = "\xC3\x8B\xC3\xA6";
const HTChanakya_consnt_LA_3    = "\xC3\x9C";
const HTChanakya_consnt_VA      = "\xC3\x9F";
const HTChanakya_consnt_SHA_1   = "\xC3\x9E\xC3\xA6";
const HTChanakya_consnt_SHA_2   = "\xC3\xA0\xC3\xA6";
const HTChanakya_consnt_SHA_3   = "\x6F";
const HTChanakya_consnt_SSA_1   = "\x63\xC3\xA6";
const HTChanakya_consnt_SSA_2   = "\xC3\xA1";
const HTChanakya_consnt_SA      = "\xC3\xA2";
const HTChanakya_consnt_HA      = "\xC3\xA3";
const HTChanakya_consnt_LLA     = "\xE2\x80\x9D";

//Gunintamulu
const HTChanakya_vowelsn_AA     = "\xC3\xA6";
const HTChanakya_vowelsn_I      = "\xC3\xA7";
const HTChanakya_vowelsn_II     = "\xC3\xA8";
const HTChanakya_vowelsn_U_1    = "\xC3\xA4";
const HTChanakya_vowelsn_U_2    = "\xC3\xA9";
const HTChanakya_vowelsn_UU_1   = "\xC3\xA5";
const HTChanakya_vowelsn_UU_2   = "\xC3\xAA";
const HTChanakya_vowelsn_R      = "\xC3\xAB";
const HTChanakya_vowelsn_CDR_E  = "\xC3\xB2";
const HTChanakya_vowelsn_EE_1   = "\xC3\xB0";
const HTChanakya_vowelsn_EE_2   = "\xC3\x94";
const HTChanakya_vowelsn_AI     = "\xC3\xB1";
const HTChanakya_vowelsn_OO     = "\xC3\xB4";
const HTChanakya_vowelsn_AU     = "\xC3\xB5";

//Matra + modifier
const HTChanakya_vowelsn_IM     = "\xC2\xA8";
const HTChanakya_vowelsn_U_BINDU = "\xC5\xA1";

//Half Forms
const HTChanakya_halffm_KA_1    = "\x42";
const HTChanakya_halffm_KA_2    = "\xE2\x82\xAC";
const HTChanakya_halffm_KSH     = "\xC3\xBF";
const HTChanakya_halffm_KHA     = "\x47";
const HTChanakya_halffm_GA      = "\x52";
const HTChanakya_halffm_GHA     = "\xC2\xB2";
const HTChanakya_halffm_CA      = "\xC2\xAF";
const HTChanakya_halffm_CC      = "\xC3\xB8";
const HTChanakya_halffm_JA_1    = "\x3A";
const HTChanakya_halffm_JA_2    = "\xE2\x80\x99";
const HTChanakya_halffm_JJ      = "\xC3\x9D";
const HTChanakya_halffm_JNY     = "\xC2\xBD";
const HTChanakya_halffm_ZA_1    = "\xE2\x80\xA2";
const HTChanakya_halffm_ZA_2    = "\xC3\x88"; 
const HTChanakya_halffm_ZA_3    = "\xC3\x8A";
const HTChanakya_halffm_JHA     = "\xC3\x9B";
const HTChanakya_halffm_NYA     = "\x49";
const HTChanakya_halffm_NNA     = "\x4A";
const HTChanakya_halffm_TA      = "\x50";
const HTChanakya_halffm_TT      = "\xC3\xB6";
const HTChanakya_halffm_TR      = "\xC2\xB5";
const HTChanakya_halffm_THA     = "\x66";
const HTChanakya_halffm_DHA     = "\x56";
const HTChanakya_halffm_NA      = "\x69";
const HTChanakya_halffm_NN      = "\xC3\xB3";
const HTChanakya_halffm_PA      = "\x60";
const HTChanakya_halffm_PHA     = "\xC2\xA3";
const HTChanakya_halffm_BA      = "\xC2\xA6";
const HTChanakya_halffm_BHA     = "\xC2\xAC";
const HTChanakya_halffm_MA      = "\xC2\xB3";
const HTChanakya_halffm_YA      = "\xC3\x84";
const HTChanakya_halffm_RA      = "\xC3\xBC";
const HTChanakya_halffm_LA      = "\xC3\x8B";
const HTChanakya_halffm_VA      = "\xC3\x83";
const HTChanakya_halffm_SHA_1   = "\xC3\x9E";
const HTChanakya_halffm_SHA_2   = "\xC3\xA0";
const HTChanakya_halffm_SSA     = "\x63";
const HTChanakya_halffm_SA      = "\x53";
const HTChanakya_halffm_HA      = "\xC2\xB1";
const HTChanakya_halffm_LLA     = "\xE2\x80\x93";
const HTChanakya_halffm_RRA     = "\xE2\x80\xA6";

//Conjuncts
const HTChanakya_conjct_KK      = "\xCB\x86";
const HTChanakya_conjct_KT      = "\x51";
const HTChanakya_conjct_KSH     = "\xC3\xBF\xC3\xA6";
const HTChanakya_conjct_KSHEE   = "\xC3\xBF\xC3\xB4";
const HTChanakya_conjct_KHN     = "\xE2\x80\x98";
const HTChanakya_conjct_KHR     = "\xC2\xBA";
const HTChanakya_conjct_NGKT    = "\xC3\xBB";
const HTChanakya_conjct_CC      = "\xC3\xB8\xC3\xA6";
const HTChanakya_conjct_CHV     = "\xE2\x80\xA1";
const HTChanakya_conjct_JNY     = "\xC2\xBD\xC3\xA6";
const HTChanakya_conjct_JHR     = "\x5C";
const HTChanakya_conjct_NYC     = "\x40";
const HTChanakya_conjct_NYJ     = "\x54";
const HTChanakya_conjct_JJ      = "\xC3\x9D\xC3\xA6";
const HTChanakya_conjct_TTTT    = "\x5E";
const HTChanakya_conjct_TT_TTH  = "\x5F";
const HTChanakya_conjct_TTHTTH  = "\x6E";
const HTChanakya_conjct_DDDD    = "\x61";
const HTChanakya_conjct_DD_DDH  = "\x62";
const HTChanakya_conjct_DDHDDH  = "\xE2\x80\xA0";
const HTChanakya_conjct_TT      = "\xC3\xB6\xC3\xA6";
const HTChanakya_conjct_TR      = "\xC2\xB5\xC3\xA6";
const HTChanakya_conjct_TN      = "\x25";
const HTChanakya_conjct_DG      = "\x65";
const HTChanakya_conjct_DGH     = "\xE2\x80\xB0";
const HTChanakya_conjct_DD      = "\x67";
const HTChanakya_conjct_D_DH    = "\x68";
const HTChanakya_conjct_DB      = "\xE2\x80\xB9";
const HTChanakya_conjct_DBH     = "\x6A";
const HTChanakya_conjct_DM      = "\x6B";
const HTChanakya_conjct_DY      = "\x6C";
const HTChanakya_conjct_DV      = "\x6D";
const HTChanakya_conjct_NN      = "\xC3\xB3\xC3\xA6";
const HTChanakya_conjct_PT      = "\x23";
const HTChanakya_conjct_LL      = "\xE2\x80\x9E";
const HTChanakya_conjct_SHC     = "\x70";
const HTChanakya_conjct_SHV     = "\x45";
const HTChanakya_conjct_SSTT    = "\x43";
const HTChanakya_conjct_SSTTH   = "\x44";
const HTChanakya_conjct_STR     = "\x64";
const HTChanakya_conjct_SN      = "\x46";
const HTChanakya_conjct_HN      = "\x71";
const HTChanakya_conjct_HM      = "\x72";
const HTChanakya_conjct_HY      = "\x73";
const HTChanakya_conjct_HR      = "\x4F";
const HTChanakya_conjct_HL      = "\x74";
const HTChanakya_conjct_HV      = "\x75";

//Combos
const HTChanakya_combo_RU       = "\x4C";
const HTChanakya_combo_RUU      = "\x4D";
const HTChanakya_combo_HR       = "\x4E";

//Half forms of RA
const HTChanakya_halffm_RI      = "\xC3\xAD";
const HTChanakya_halffm_RIM     = "\xC3\xAC";
const HTChanakya_halffm_RA_ANU  = "\x5A";

const HTChanakya_vattu_RA_1     = "\x41";
const HTChanakya_vattu_RA_2     = "\xC3\xBD";
const HTChanakya_vattu_RA_3     = "\xC3\xBE";

const HTChanakya_misc_DANDA     = "\xC3\x90";
const HTChanakya_misc_DDANDA    = "\x48";
const HTChanakya_misc_OM        = "\xC3\xBA";
//const HTChanakya_misc_ABBREV    = "\xC3\xB8";
const HTChanakya_nukta_1        = "\x24";
const HTChanakya_nukta_2        = "\xC2\xB8";

//Digits (TODO..write table)
const HTChanakya_digit_ZERO     = "\x30";
const HTChanakya_digit_ONE      = "\x31";
const HTChanakya_digit_TWO      = "\x32";
const HTChanakya_digit_THREE    = "\x33";
const HTChanakya_digit_FOUR     = "\x34";
const HTChanakya_digit_FIVE     = "\x35";
const HTChanakya_digit_SIX      = "\x36";
const HTChanakya_digit_SEVEN    = "\x37";
const HTChanakya_digit_EIGHT    = "\x38";
const HTChanakya_digit_NINE     = "\x39";

//Arabic numerals (TODO)
const HTChanakya_digit_ZERO_AR  = "\xC2\xAE";
const HTChanakya_digit_ONE_AR   = "\x76"; 
const HTChanakya_digit_TWO_AR   = "\x77";
const HTChanakya_digit_THREE_AR = "\x78";
const HTChanakya_digit_FOUR_AR  = "\x79";
const HTChanakya_digit_FIVE_AR  = "\x7A";
const HTChanakya_digit_SIX_AR   = "\x7B";
const HTChanakya_digit_SEVEN_AR = "\x7C";
const HTChanakya_digit_EIGHT_AR = "\x7D";
const HTChanakya_digit_NINE_AR  = "\x7E";


//Matches ASCII
const HTChanakya_EXCLAM         = "\x21";
const HTChanakya_QTDOUBLE       = "\x22";
const HTChanakya_PAREN_LEFT     = "\x28";
const HTChanakya_PAREN_RIGHT    = "\x29";
const HTChanakya_ASTERISK       = "\x2A";
const HTChanakya_PLUS           = "\x2B";
const HTChanakya_COMMA          = "\x2C";
const HTChanakya_PERIOD         = "\x2E";
const HTChanakya_SLASH          = "\x2F";
const HTChanakya_SEMICOLON      = "\x3B";
const HTChanakya_LESSTHAN       = "\x3C";
const HTChanakya_EQUALS         = "\x3D";
const HTChanakya_GREATERTHAN    = "\x3E";
const HTChanakya_QUESTION       = "\x3F";
const HTChanakya_LEFTSQBKT      = "\x5B";
const HTChanakya_RIGHTSQBKT     = "\x5D";

//Does not match ASCII
const HTChanakya_extra_QTSINGLE_1 = "\xC3\x92";
const HTChanakya_extra_QTSINGLE_2 = "\xC3\x93";
const HTChanakya_MULTIPLY       = "\x26";
const HTChanakya_PERCENT        = "\x27";
const HTChanakya_extra_COLON    = "\xC3\x91";

const HTChanakya_misc_UNKNOWN_1 = "\x55";
const HTChanakya_misc_UNKNOWN_2 = "\x57";
const HTChanakya_misc_UNKNOWN_3 = "\xC2\xA4";
const HTChanakya_misc_UNKNOWN_4 = "\xC3\xAF";

}
$HTChanakya_toPadma = Array();

$HTChanakya_toPadma[HTChanakya::HTChanakya_avagraha]    = Padma::Padma_avagraha;
$HTChanakya_toPadma[HTChanakya::HTChanakya_anusvara_1]  = Padma::Padma_anusvara;
$HTChanakya_toPadma[HTChanakya::HTChanakya_anusvara_2]  = Padma::Padma_anusvara;
$HTChanakya_toPadma[HTChanakya::HTChanakya_candrabindu] = Padma::Padma_candrabindu;
$HTChanakya_toPadma[HTChanakya::HTChanakya_virama]      = Padma::Padma_syllbreak;
//$HTChanakya_toPadma[HTChanakya::HTChanakya_visarga]     = Padma::Padma_visarga;

$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_A]    = Padma::Padma_vowel_A;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_AA]   = Padma::Padma_vowel_AA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_I]    = Padma::Padma_vowel_I;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_II]   = Padma::Padma_vowel_II;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_U]    = Padma::Padma_vowel_U;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_UU]   = Padma::Padma_vowel_UU;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_R]    = Padma::Padma_vowel_R;
//$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_RR]   = Padma::Padma_vowel_RR;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_CDR_E] = Padma::Padma_vowel_CDR_E;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_EE]   = Padma::Padma_vowel_EE;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_AI]   = Padma::Padma_vowel_AI;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_CDR_O] = Padma::Padma_vowel_CDR_O;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_OO_1] = Padma::Padma_vowel_OO;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_OO_2] = Padma::Padma_vowel_OO;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_AU_1] = Padma::Padma_vowel_AU;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowel_AU_2] = Padma::Padma_vowel_AU;

$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_KA]    = Padma::Padma_consnt_KA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_GA_1]  = Padma::Padma_consnt_GA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_GA_2]  = Padma::Padma_consnt_GA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_GHA]   = Padma::Padma_consnt_GHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_NGA]   = Padma::Padma_consnt_NGA;

$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_CA_1]  = Padma::Padma_consnt_CA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_CA_2]  = Padma::Padma_consnt_CA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_CHA]   = Padma::Padma_consnt_CHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_JA]    = Padma::Padma_consnt_JA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_ZA_1]  = Padma::Padma_consnt_ZA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_ZA_2]  = Padma::Padma_consnt_ZA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_ZA_3]  = Padma::Padma_consnt_ZA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_JHA]   = Padma::Padma_consnt_JHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_NYA]   = Padma::Padma_consnt_NYA;

$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_TTA]   = Padma::Padma_consnt_TTA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_TTHA]  = Padma::Padma_consnt_TTHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_DDA]   = Padma::Padma_consnt_DDA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_DDDHA] = Padma::Padma_consnt_DDDHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_DDHA]  = Padma::Padma_consnt_DDHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_RHA]   = Padma::Padma_consnt_RHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_NNA]   = Padma::Padma_consnt_NNA;

$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_TA_1]  = Padma::Padma_consnt_TA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_TA_2]  = Padma::Padma_consnt_TA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_THA_1] = Padma::Padma_consnt_THA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_THA_2] = Padma::Padma_consnt_THA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_DA_1]  = Padma::Padma_consnt_DA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_DA_2]  = Padma::Padma_consnt_DA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_DHA_1] = Padma::Padma_consnt_DHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_DHA_2] = Padma::Padma_consnt_DHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_NA]    = Padma::Padma_consnt_NA;

$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_PA_1]  = Padma::Padma_consnt_PA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_PA_2]  = Padma::Padma_consnt_PA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_PHA_1] = Padma::Padma_consnt_PHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_PHA_2] = Padma::Padma_consnt_PHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_BA]    = Padma::Padma_consnt_BA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_BHA_1] = Padma::Padma_consnt_BHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_BHA_2] = Padma::Padma_consnt_BHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_MA_1]  = Padma::Padma_consnt_MA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_MA_2]  = Padma::Padma_consnt_MA;

$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_YA_1]  = Padma::Padma_consnt_YA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_YA_2]  = Padma::Padma_consnt_YA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_RA]    = Padma::Padma_consnt_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_LA_1]  = Padma::Padma_consnt_LA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_LA_2]  = Padma::Padma_consnt_LA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_LA_3]  = Padma::Padma_consnt_LA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_VA]    = Padma::Padma_consnt_VA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_SHA_1] = Padma::Padma_consnt_SHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_SHA_2] = Padma::Padma_consnt_SHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_SHA_3] = Padma::Padma_consnt_SHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_SA]    = Padma::Padma_consnt_SA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_HA]    = Padma::Padma_consnt_HA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_consnt_LLA]   = Padma::Padma_consnt_LLA;

//Gunintamulu
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_I]    = Padma::Padma_vowelsn_I;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_II]   = Padma::Padma_vowelsn_II;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_R]    = Padma::Padma_vowelsn_R;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_CDR_E]= Padma::Padma_vowelsn_CDR_E;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_EE_1] = Padma::Padma_vowelsn_EE;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_EE_2] = Padma::Padma_vowelsn_EE;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_AI]   = Padma::Padma_vowelsn_AI;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_OO]   = Padma::Padma_vowelsn_OO;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_AU]   = Padma::Padma_vowelsn_AU;

//matra . modifier
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_IM]   = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vowelsn_U_BINDU] = Padma::Padma_vowelsn_U . Padma::Padma_candrabindu;

//Halffm
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_KA_1] = Padma::Padma_halffm_KA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_KA_2] = Padma::Padma_halffm_KA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_KSH]  = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_KHA]  = Padma::Padma_halffm_KHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_GA]   = Padma::Padma_halffm_GA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_GHA]  = Padma::Padma_halffm_GHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_CA]   = Padma::Padma_halffm_CA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_CC]   = Padma::Padma_halffm_CA . Padma::Padma_halffm_CA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_JA_1] = Padma::Padma_halffm_JA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_JA_2] = Padma::Padma_halffm_JA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_JJ]   = Padma::Padma_halffm_JA . Padma::Padma_halffm_JA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_JNY]  = Padma::Padma_halffm_JA . Padma::Padma_halffm_NYA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_ZA_1] = Padma::Padma_halffm_ZA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_ZA_2] = Padma::Padma_halffm_ZA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_ZA_3] = Padma::Padma_halffm_ZA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_JHA]  = Padma::Padma_halffm_JHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_NYA]  = Padma::Padma_halffm_NYA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_NNA]  = Padma::Padma_halffm_NNA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_TA]   = Padma::Padma_halffm_TA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_TT]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_TR]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_THA]  = Padma::Padma_halffm_THA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_DHA]  = Padma::Padma_halffm_DHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_NA]   = Padma::Padma_halffm_NA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_NN]   = Padma::Padma_halffm_NA . Padma::Padma_halffm_NA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_PA]   = Padma::Padma_halffm_PA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_PHA]  = Padma::Padma_halffm_PHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_BA]   = Padma::Padma_halffm_BA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_BHA]  = Padma::Padma_halffm_BHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_MA]   = Padma::Padma_halffm_MA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_YA]   = Padma::Padma_halffm_YA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_RA]   = Padma::Padma_halffm_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_LA]   = Padma::Padma_halffm_LA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_VA]   = Padma::Padma_halffm_VA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_SHA_1]= Padma::Padma_halffm_SHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_SHA_2]= Padma::Padma_halffm_SHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_SSA]  = Padma::Padma_halffm_SSA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_SA]   = Padma::Padma_halffm_SA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_HA]   = Padma::Padma_halffm_HA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_LLA]  = Padma::Padma_halffm_LLA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_RRA]  = Padma::Padma_halffm_RRA;

//Conjuncts
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_KK]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_KSH]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_KSHEE]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_EE;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_KHN]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_NA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_KHR]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_NGKT]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA . Padma::Padma_vattu_TA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_CC]     = Padma::Padma_consnt_CA . Padma::Padma_vattu_CA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_CHV]    = Padma::Padma_consnt_CHA . Padma::Padma_vattu_VA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_JNY]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_JHR]    = Padma::Padma_consnt_JHA . Padma::Padma_vattu_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_NYC]    = Padma::Padma_consnt_NYA . Padma::Padma_vattu_CA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_NYJ]    = Padma::Padma_consnt_NYA . Padma::Padma_vattu_JA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_JJ]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_TT_TTH] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DDDD]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DD_DDH] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DDHDDH] = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_DDHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_TR]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_TN]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_NA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DG]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DGH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_GHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DD]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DB]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DBH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_PT]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_TA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_LL]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_LA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_SHC]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_SHV]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_SSTT]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_SSTTH]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_STR]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_SN]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_NA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_HN]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_HR]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_conjct_HV]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_VA;

//Combos
$HTChanakya_toPadma[HTChanakya::HTChanakya_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$HTChanakya_toPadma[HTChanakya::HTChanakya_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$HTChanakya_toPadma[HTChanakya::HTChanakya_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;

$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_RI]     = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_RIM]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$HTChanakya_toPadma[HTChanakya::HTChanakya_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;

$HTChanakya_toPadma[HTChanakya::HTChanakya_vattu_RA_1]    = Padma::Padma_vattu_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vattu_RA_2]    = Padma::Padma_vattu_RA;
$HTChanakya_toPadma[HTChanakya::HTChanakya_vattu_RA_3]    = Padma::Padma_vattu_RA;

$HTChanakya_toPadma[HTChanakya::HTChanakya_misc_DANDA]    = Padma::Padma_danda;
$HTChanakya_toPadma[HTChanakya::HTChanakya_misc_DDANDA]   = Padma::Padma_ddanda;
$HTChanakya_toPadma[HTChanakya::HTChanakya_misc_OM]       = Padma::Padma_om;
//$HTChanakya_toPadma[HTChanakya::HTChanakya_misc_ABBREV]   = Padma::Padma_abbrev;
$HTChanakya_toPadma[HTChanakya::HTChanakya_nukta_1]       = Padma::Padma_nukta;
$HTChanakya_toPadma[HTChanakya::HTChanakya_nukta_2]       = Padma::Padma_nukta;

//Does not match ASCII
$HTChanakya_toPadma[HTChanakya::HTChanakya_extra_QTSINGLE_1] = "\xE2\x80\x98"; //Left single quotation mark
$HTChanakya_toPadma[HTChanakya::HTChanakya_extra_QTSINGLE_2] = "\xE2\x80\x99"; //Right single quotation mark
$HTChanakya_toPadma[HTChanakya::HTChanakya_MULTIPLY]         = "\xC3\x97"; //Unicode for multiplication symbol
$HTChanakya_toPadma[HTChanakya::HTChanakya_PERCENT]          = "%";
$HTChanakya_toPadma[HTChanakya::HTChanakya_extra_COLON]      = ":";

$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_ZERO_AR]    = '0';
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_ONE_AR]     = '1';
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_TWO_AR]     = '2';
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_THREE_AR]   = '3';
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_FOUR_AR]    = '4';
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_FIVE_AR]    = '5';
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_SIX_AR]     = '6';
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_SEVEN_AR]   = '7';
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_EIGHT_AR]   = '8';
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_NINE_AR]    = '9';

$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_ZERO]       = Padma::Padma_digit_ZERO;
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_ONE]        = Padma::Padma_digit_ONE;
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_TWO]        = Padma::Padma_digit_TWO;
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_THREE]      = Padma::Padma_digit_THREE;
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_FOUR]       = Padma::Padma_digit_FOUR;
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_FIVE]       = Padma::Padma_digit_FIVE;
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_SIX]        = Padma::Padma_digit_SIX;
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_SEVEN]      = Padma::Padma_digit_SEVEN;
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_EIGHT]      = Padma::Padma_digit_EIGHT;
$HTChanakya_toPadma[HTChanakya::HTChanakya_digit_NINE]       = Padma::Padma_digit_NINE;

$HTChanakya_prefixList = Array();
$HTChanakya_prefixList[HTChanakya::HTChanakya_vowelsn_I]  = true;
$HTChanakya_prefixList[HTChanakya::HTChanakya_vowelsn_IM] = true;
$HTChanakya_prefixList[HTChanakya::HTChanakya_nukta_1]    = true;
$HTChanakya_prefixList[HTChanakya::HTChanakya_halffm_RI]  = true;
$HTChanakya_prefixList[HTChanakya::HTChanakya_halffm_RIM] = true;

$HTChanakya_suffixList = Array();
$HTChanakya_suffixList[HTChanakya::HTChanakya_halffm_RA]     = true;
$HTChanakya_suffixList[HTChanakya::HTChanakya_halffm_RA_ANU] = true;

$HTChanakya_redundantList = Array();
$HTChanakya_redundantList[HTChanakya::HTChanakya_misc_UNKNOWN_1] = true;
$HTChanakya_redundantList[HTChanakya::HTChanakya_misc_UNKNOWN_2] = true;
$HTChanakya_redundantList[HTChanakya::HTChanakya_misc_UNKNOWN_3] = true;
$HTChanakya_redundantList[HTChanakya::HTChanakya_misc_UNKNOWN_4] = true;

$HTChanakya_overloadList = Array();
$HTChanakya_overloadList[HTChanakya::HTChanakya_vowel_A]     = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_vowel_AA]    = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_vowel_EE]    = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_vowel_I]     = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_consnt_DDA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_consnt_DDHA] = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_vowelsn_AA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_KSH]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_KHA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_GA]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_GHA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_CA]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_CC]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_JJ]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_JNY]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_ZA_1] = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_ZA_2] = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_ZA_3] = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_JHA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_NYA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_NNA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_TA]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_TT]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_TR]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_THA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_DHA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_NN]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_PHA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_BHA]  = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_PA]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_MA]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_YA]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_LA]   = true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_SHA_1]= true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_SHA_2]= true;
$HTChanakya_overloadList[HTChanakya::HTChanakya_halffm_SSA]  = true;

function HTChanakya_initialize()
{
    global $fontinfo;

    $fontinfo["htchanakya"]["language"] = "Devanagari";
    $fontinfo["htchanakya"]["class"] = "HTChanakya";
}


?>
