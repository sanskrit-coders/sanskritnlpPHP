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

class Subak
{
function Subak()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "Subak-1";
var $displayName  = "Subak";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup($str) 
{
    global $Subak_toPadma;
    return $Subak_toPadma[$str];
}

function isPrefixSymbol($str)
{
   global $Subak_prefixList; 
   return $Subak_prefixList[$str] != null;
}

function isSuffixSymbol($str)
{
    global $Subak_suffixList;
    return $Subak_suffixList[$str] != null;
}

function isOverloaded($str)
{
    global $Subak_overloadList;
    return $Subak_overloadList[$str] != null;
}

function handleTwoPartVowelSign($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_EE && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_EE))
        return Padma::Padma_vowelsn_OO;
    if (($sign1 == Padma::Padma_vowelsn_AI && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_AI))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function isRedundant($str)
{
    global $Subak_redundantList;
    return $Subak_redundantList[$str] != null;
}

//Implementation details start here

//TODO: 0x23, 0x26,  0x89 (2030), 0x8B (2039), 0x8D, 0x98 (02DC), 
//0x99 (2122), 0x9A (0161), 0x9F (0178), 0xad, 0xb5, 0xb7,
//0xf2, 0xf5, 
//??: 0x7F, 0x80, 0x8E, 0x90, 0x9D, 0x9E, 0xa4

//Specials
 const Subak_avagraha       = "\x40";
 const Subak_anusvara_1     = "\xC2\xA7";
 const Subak_anusvara_2     = "\xC2\xA8";
 const Subak_candrabindu_1  = "\xC2\xB0"; //what is this?
 const Subak_candrabindu_2  = "\xC2\xB1"; 
 const Subak_virama_1       = "\x3C";
 const Subak_virama_2       = "\xC5\x92";
 const Subak_virama_3       = "\xC2\xAB";
 const Subak_virama_4       = "\xC2\xB2";
 const Subak_virama_5       = "\xC2\xB3";

//Vowels
 const Subak_vowel_A        = "\x41";
 const Subak_vowel_AA       = "\x41\x6D";
 const Subak_vowel_I        = "\x42";
 const Subak_vowel_II       = "\x42\xC2\xA9";
 const Subak_vowel_U        = "\x43";
 const Subak_vowel_UU       = "\x44";
 const Subak_vowel_R        = "\x46";
 const Subak_vowel_RR       = "\x47";
 const Subak_vowel_EE       = "\x45";
 const Subak_vowel_AI       = "\x45\x6F";
 const Subak_vowel_O        = "\x41\x6D\x6F";
 const Subak_vowel_OO       = "\x41\x6D\xC2\xA1";
 const Subak_vowel_AU       = "\x41\x6D\xC2\xA1";

//Consonants
 const Subak_consnt_KA      = "\x48";
 const Subak_consnt_KHA     = "\x49";
 const Subak_consnt_GA      = "\x4A";
 const Subak_consnt_GHA     = "\x4B";
 const Subak_consnt_NGA     = "\x4C";

 const Subak_consnt_CA      = "\x4D";
 const Subak_consnt_CHA     = "\x4E";
 const Subak_consnt_JA      = "\x4F";
 const Subak_consnt_JHA     = "\x50";
//// const Subak_consnt_NYA     = "\xE2\x80\x93";

 const Subak_consnt_TTA     = "\x51";
 const Subak_consnt_TTHA    = "\x52";
 const Subak_consnt_DDA     = "\x53";
 const Subak_consnt_DDHA    = "\x54";
 const Subak_consnt_NNA     = "\x55";

 const Subak_consnt_TA      = "\x56";
 const Subak_consnt_THA     = "\x57";
 const Subak_consnt_DA      = "\x58";
 const Subak_consnt_DHA     = "\x59";
 const Subak_consnt_NA      = "\x5A";

 const Subak_consnt_PA      = "\x6E";
 const Subak_consnt_PHA_1   = "\x5C";
 const Subak_consnt_PHA_2   = "\xE2\x80\x99";
 const Subak_consnt_BA      = "\x7E";
 const Subak_consnt_BHA     = "\x5E";
 const Subak_consnt_MA_1    = "\x5F";
 const Subak_consnt_MA_2    = "\xE2\x80\x98";

 const Subak_consnt_YA      = "\x60";
 const Subak_consnt_RA      = "\x61";
 const Subak_consnt_LA_1    = "\x62";
 const Subak_consnt_LA_2    = "\x63";
 const Subak_consnt_VA      = "\x64";
 const Subak_consnt_SHA     = "\x65";
 const Subak_consnt_SSA     = "\x66";
 const Subak_consnt_SA      = "\x67";
 const Subak_consnt_HA      = "\x68";
 const Subak_consnt_LLA     = "\x69";
 const Subak_conjct_KSH     = "\x6A";
 const Subak_conjct_JNY     = "\x6B";

//Gunintamulu
 const Subak_vowelsn_AA     = "\x6D";
 const Subak_vowelsn_I_1    = "\x5B";
 const Subak_vowelsn_I_2    = "\x70";
 const Subak_vowelsn_I_3    = "\x7B";
 const Subak_vowelsn_II_1   = "\x72";
 const Subak_vowelsn_II_2   = "\x73";
 const Subak_vowelsn_U_1    = "\x77";
 const Subak_vowelsn_U_2    = "\x78";
 const Subak_vowelsn_U_3    = "\xC3\xBE";
 const Subak_vowelsn_UU_1   = "\x79";
 const Subak_vowelsn_UU_2   = "\x7A";
 const Subak_vowelsn_UU_3   = "\xC3\xBF";
 const Subak_vowelsn_R      = "\xC2\xA5";
 const Subak_vowelsn_RR     = "\xC2\xA6";
 const Subak_vowelsn_EE     = "\x6F";
 const Subak_vowelsn_AI     = "\xC2\xA1";

//Matra + anusvara
 const Subak_vowelsn_IM     = "\x71";
 const Subak_vowelsn_IIM    = "\x74";
 const Subak_vowelsn_EEM    = "\x7C";
 const Subak_vowelsn_AIM    = "\xC2\xA2";

//Half Forms
 const Subak_halffm_KA      = "\xC5\xA0";
 const Subak_halffm_KHA     = "\xC2\xBB";
 const Subak_halffm_GA      = "\xC2\xBD";
 const Subak_halffm_GHA     = "\xC2\xBF";
 const Subak_halffm_CA      = "\xC3\x80";
 const Subak_halffm_JA      = "\xC3\x81";
 const Subak_halffm_JHA     = "\xC3\x82";
 const Subak_halffm_NYA     = "\xC3\x84";
 const Subak_halffm_NNA     = "\xC3\x8A";
 const Subak_halffm_TA      = "\xC3\x8B";
 const Subak_halffm_TT      = "\xC3\x8E";
 const Subak_halffm_TR      = "\xC3\x8D";
 const Subak_halffm_THA     = "\xC3\x8F";
 const Subak_halffm_DHA     = "\xC3\x9C";
 const Subak_halffm_NA      = "\xC3\x9D";
 const Subak_halffm_PA      = "\xC3\x9F";
 const Subak_halffm_PHA     = "\xC3\xA2";
 const Subak_halffm_BA      = "\xC3\xA3";
 const Subak_halffm_BHA     = "\xC3\xA4";
 const Subak_halffm_MA      = "\xC3\xA5";
 const Subak_halffm_YA      = "\xC3\xA6";
 const Subak_halffm_RA      = "\xC2\xA9";
 const Subak_halffm_LA      = "\xC3\xAB";
 const Subak_halffm_VA      = "\xC3\xAC";
 const Subak_halffm_SHA_1   = "\xC3\xAD";
 const Subak_halffm_SHA_2   = "\xC3\xBB";
 const Subak_halffm_SSA     = "\xC3\xAE";
 const Subak_halffm_SA      = "\xC3\xB1";
 const Subak_halffm_HA      = "\xC3\xB4";
 const Subak_halffm_LLA     = "\xC3\xB9";
 const Subak_halffm_RRA     = "\xC3\xA8";
 const Subak_halffm_KSH     = "\xC3\xBA";

//Conjuncts
 const Subak_conjct_KK      = "\xC2\xB8";
 const Subak_conjct_KV      = "\xC2\xB9";
 const Subak_conjct_KT      = "\xC2\xBA";
 const Subak_conjct_GN      = "\xC2\xBE";
 const Subak_conjct_NGG     = "\xE2\x80\x9C";
 const Subak_conjct_NGGH    = "\xE2\x80\x9D";
 const Subak_conjct_NGKSH   = "\xC2\xAC";
 const Subak_conjct_NGM     = "\xC2\xB6";
 const Subak_conjct_CC      = "\xC6\x92";
 const Subak_conjct_JJ      = "\xE2\x80\x9A";
 const Subak_conjct_TTTT    = "\xC3\x85";
 const Subak_conjct_TT_TTH  = "\xC3\x86";
 const Subak_conjct_TTHTTH  = "\xC3\x87";
 const Subak_conjct_DDDD    = "\xC3\x88";
 const Subak_conjct_DD_DDH  = "\xE2\x80\x93";
 const Subak_conjct_DDHDDH  = "\xC3\x89";
 const Subak_conjct_TT      = "\xC3\x8E\x6D";
 const Subak_conjct_TR      = "\xC3\x8C";
 const Subak_conjct_DG      = "\xC3\x92";
 const Subak_conjct_DGH     = "\xC3\x93";
 const Subak_conjct_DD      = "\xC3\x94";
 const Subak_conjct_D_DH    = "\xC3\x95";
 const Subak_conjct_DN      = "\xC3\x96";
 const Subak_conjct_DB      = "\xC3\x97";
 const Subak_conjct_DBH     = "\xC3\x98";
 const Subak_conjct_DM      = "\xC3\x99";
 const Subak_conjct_DY      = "\xC3\x9A";
 const Subak_conjct_DR      = "\xC3\x90";
 const Subak_conjct_DV      = "\xC3\x9B";
 const Subak_conjct_NN      = "\xC3\x9E";
 const Subak_conjct_PR      = "\xC3\xA0";
 const Subak_conjct_PT      = "\xC3\xA1";
 const Subak_conjct_LL      = "\xE2\x80\x9E";
 const Subak_conjct_SHC     = "\xC3\xBC";
 const Subak_conjct_SHN     = "\xC3\xBD";
 const Subak_conjct_SHR     = "\x6C";
 const Subak_conjct_SHV     = "\xC5\x93";
 const Subak_conjct_SSTT    = "\xC3\xAF";
 const Subak_conjct_SSTTH   = "\xC3\xB0";
 const Subak_conjct_STR     = "\xC3\xB3";
 const Subak_conjct_HNN     = "\xE2\x80\xA0";
 const Subak_conjct_HN      = "\xE2\x80\xA2";
 const Subak_conjct_HM      = "\xC3\xB7";
 const Subak_conjct_HY      = "\xC3\xB8";
 const Subak_conjct_HL      = "\xE2\x80\xA1";
 const Subak_conjct_HV      = "\xCB\x86";

//Combos
 const Subak_combo_DR       = "\xC3\x91";
 const Subak_combo_RU       = "\xC3\xA9";
 const Subak_combo_RUU      = "\xC3\xAA";
 const Subak_combo_HR       = "\xC3\xB6";

//Half forms of RA
 const Subak_halffm_RII     = "\x75";
 const Subak_halffm_RIIM    = "\x76";
 const Subak_halffm_REE     = "\x7D";
 const Subak_halffm_REEM    = "\x5D";
 const Subak_halffm_RAI     = "\xC2\xA3";
 const Subak_halffm_RAIM    = "\xC2\xA4";
 const Subak_halffm_RA_ANU  = "\xC2\xAA";

 const Subak_vattu_YA       = "\xC3\xA7";
 const Subak_vattu_RA_1     = "\xE2\x80\x94";
 const Subak_vattu_RA_2     = "\xC2\xAB";
 const Subak_vattu_RA_3     = "\xC2\xB4";
 const Subak_vattu_RA_U     = "\xC2\xAE";
 const Subak_vattu_RA_UU    = "\xC2\xAF";

//syllable breaks
 const Subak_syllbr_KHA     = "\xC2\xBC";
 const Subak_syllbr_JHA     = "\xC3\x83";

 const Subak_misc_OM        = "\xE2\x80\xBA";

//Devanagari Digits
 const Subak_digit_ZERO     = "\x30";
 const Subak_digit_ONE      = "\x31";
 const Subak_digit_TWO      = "\x32";
 const Subak_digit_THREE    = "\x33";
 const Subak_digit_FOUR     = "\x34";
 const Subak_digit_FIVE     = "\x35";
 const Subak_digit_SIX      = "\x36";
 const Subak_digit_SEVEN    = "\x37";
 const Subak_digit_EIGHT    = "\x38";
 const Subak_digit_NINE     = "\x39";

//Matches A const SCII
 const Subak_EXCLAM         = "\x21";
 const Subak_PERCENT        = "\x25";
 const Subak_QTSINGLE       = "\x27";
 const Subak_PAREN_LEFT     = "\x28";
 const Subak_PAREN_RIGHT    = "\x29";
 const Subak_ASTERISK       = "\x2A";
 const Subak_PLUS           = "\x2B";
 const Subak_COMMA          = "\x2C";
 const Subak_HYPHEN         = "\x2D";
 const Subak_PERIOD         = "\x2E";
 const Subak_SLASH          = "\x2F";
 const Subak_COLON          = "\x3A";
 const Subak_SEMICOLON      = "\x3B";
 const Subak_EQUALS         = "\x3D";
 const Subak_QUESTION       = "\x3F";

//Does not match A const SCII
 const Subak_extra_QTSINGLE = "\x22";
 const Subak_MULTIPLY       = "\xC2\x81";
 const Subak_DIVIDE         = "\xC2\x8F";
 const Subak_extra_COLON    = "\xE2\x80\xA6";

 const Subak_misc_UNKNOWN_1 = "\x24";
 const Subak_misc_UNKNOWN_2 = "\x3E";

}
$Subak_toPadma = array();

$Subak_toPadma[Subak::Subak_avagraha]      = Padma::Padma_avagraha;
$Subak_toPadma[Subak::Subak_anusvara_1]    = Padma::Padma_anusvara;
$Subak_toPadma[Subak::Subak_anusvara_2]    = Padma::Padma_anusvara;
$Subak_toPadma[Subak::Subak_candrabindu_1] = Padma::Padma_candrabindu;
$Subak_toPadma[Subak::Subak_candrabindu_2] = Padma::Padma_candrabindu;
$Subak_toPadma[Subak::Subak_virama_1]      = Padma::Padma_syllbreak;
$Subak_toPadma[Subak::Subak_virama_2]      = Padma::Padma_syllbreak;
$Subak_toPadma[Subak::Subak_virama_3]      = Padma::Padma_syllbreak;
$Subak_toPadma[Subak::Subak_virama_4]      = Padma::Padma_syllbreak;
$Subak_toPadma[Subak::Subak_virama_5]      = Padma::Padma_syllbreak;
//$Subak_toPadma[Subak::Subak_visarga]       = Subak_visarga;

$Subak_toPadma[Subak::Subak_vowel_A]  = Padma::Padma_vowel_A;
$Subak_toPadma[Subak::Subak_vowel_AA] = Padma::Padma_vowel_AA;
$Subak_toPadma[Subak::Subak_vowel_I]  = Padma::Padma_vowel_I;
$Subak_toPadma[Subak::Subak_vowel_II] = Padma::Padma_vowel_II;
$Subak_toPadma[Subak::Subak_vowel_U]  = Padma::Padma_vowel_U;
$Subak_toPadma[Subak::Subak_vowel_UU] = Padma::Padma_vowel_UU;
$Subak_toPadma[Subak::Subak_vowel_R]  = Padma::Padma_vowel_R;
$Subak_toPadma[Subak::Subak_vowel_RR] = Padma::Padma_vowel_RR;
$Subak_toPadma[Subak::Subak_vowel_EE] = Padma::Padma_vowel_EE;
$Subak_toPadma[Subak::Subak_vowel_AI] = Padma::Padma_vowel_AI;
$Subak_toPadma[Subak::Subak_vowel_O]  = Padma::Padma_vowel_O;
$Subak_toPadma[Subak::Subak_vowel_OO] = Padma::Padma_vowel_OO;
$Subak_toPadma[Subak::Subak_vowel_AU] = Padma::Padma_vowel_AU;

$Subak_toPadma[Subak::Subak_consnt_KA]  = Padma::Padma_consnt_KA;
$Subak_toPadma[Subak::Subak_consnt_KHA] = Padma::Padma_consnt_KHA;
$Subak_toPadma[Subak::Subak_consnt_GA]  = Padma::Padma_consnt_GA;
$Subak_toPadma[Subak::Subak_consnt_GHA] = Padma::Padma_consnt_GHA;
$Subak_toPadma[Subak::Subak_consnt_NGA] = Padma::Padma_consnt_NGA;

$Subak_toPadma[Subak::Subak_consnt_CA]  = Padma::Padma_consnt_CA;
$Subak_toPadma[Subak::Subak_consnt_CHA] = Padma::Padma_consnt_CHA;
$Subak_toPadma[Subak::Subak_consnt_JA]  = Padma::Padma_consnt_JA;
$Subak_toPadma[Subak::Subak_consnt_JHA] = Padma::Padma_consnt_JHA;
//$Subak_toPadma[Subak::Subak_consnt_NYA] = Padma::Padma_consnt_NYA;

$Subak_toPadma[Subak::Subak_consnt_TTA] = Padma::Padma_consnt_TTA;
$Subak_toPadma[Subak::Subak_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$Subak_toPadma[Subak::Subak_consnt_DDA] = Padma::Padma_consnt_DDA;
$Subak_toPadma[Subak::Subak_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$Subak_toPadma[Subak::Subak_consnt_NNA] = Padma::Padma_consnt_NNA;

$Subak_toPadma[Subak::Subak_consnt_TA]  = Padma::Padma_consnt_TA;
$Subak_toPadma[Subak::Subak_consnt_THA] = Padma::Padma_consnt_THA;
$Subak_toPadma[Subak::Subak_consnt_DA]  = Padma::Padma_consnt_DA;
$Subak_toPadma[Subak::Subak_consnt_DHA] = Padma::Padma_consnt_DHA;
$Subak_toPadma[Subak::Subak_consnt_NA]  = Padma::Padma_consnt_NA;

$Subak_toPadma[Subak::Subak_consnt_PA]   = Padma::Padma_consnt_PA;
$Subak_toPadma[Subak::Subak_consnt_PHA_1]= Padma::Padma_consnt_PHA;
$Subak_toPadma[Subak::Subak_consnt_PHA_2]= Padma::Padma_consnt_PHA;
$Subak_toPadma[Subak::Subak_consnt_BA]   = Padma::Padma_consnt_BA;
$Subak_toPadma[Subak::Subak_consnt_BHA]  = Padma::Padma_consnt_BHA;
$Subak_toPadma[Subak::Subak_consnt_MA_1] = Padma::Padma_consnt_MA;
$Subak_toPadma[Subak::Subak_consnt_MA_2] = Padma::Padma_consnt_MA;

$Subak_toPadma[Subak::Subak_consnt_YA]   = Padma::Padma_consnt_YA;
$Subak_toPadma[Subak::Subak_consnt_RA]   = Padma::Padma_consnt_RA;
$Subak_toPadma[Subak::Subak_consnt_LA_1] = Padma::Padma_consnt_LA;
$Subak_toPadma[Subak::Subak_consnt_LA_2] = Padma::Padma_consnt_LA;
$Subak_toPadma[Subak::Subak_consnt_VA]   = Padma::Padma_consnt_VA;
$Subak_toPadma[Subak::Subak_consnt_SHA]  = Padma::Padma_consnt_SHA;
$Subak_toPadma[Subak::Subak_consnt_SSA]  = Padma::Padma_consnt_SSA;
$Subak_toPadma[Subak::Subak_consnt_SA]   = Padma::Padma_consnt_SA;
$Subak_toPadma[Subak::Subak_consnt_HA] = Padma::Padma_consnt_HA;
$Subak_toPadma[Subak::Subak_consnt_LLA]  = Padma::Padma_consnt_LLA;
$Subak_toPadma[Subak::Subak_conjct_KSH]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Subak_toPadma[Subak::Subak_conjct_JNY]  = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;

//Gunintamulu
$Subak_toPadma[Subak::Subak_vowelsn_AA]   = Padma::Padma_vowelsn_AA;
$Subak_toPadma[Subak::Subak_vowelsn_I_1]  = Padma::Padma_vowelsn_I;
$Subak_toPadma[Subak::Subak_vowelsn_I_2]  = Padma::Padma_vowelsn_I;
$Subak_toPadma[Subak::Subak_vowelsn_I_3]  = Padma::Padma_vowelsn_I;
$Subak_toPadma[Subak::Subak_vowelsn_II_1] = Padma::Padma_vowelsn_II;
$Subak_toPadma[Subak::Subak_vowelsn_II_2] = Padma::Padma_vowelsn_II;
$Subak_toPadma[Subak::Subak_vowelsn_U_1]  = Padma::Padma_vowelsn_U;
$Subak_toPadma[Subak::Subak_vowelsn_U_2]  = Padma::Padma_vowelsn_U;
$Subak_toPadma[Subak::Subak_vowelsn_U_3]  = Padma::Padma_vowelsn_U;
$Subak_toPadma[Subak::Subak_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$Subak_toPadma[Subak::Subak_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$Subak_toPadma[Subak::Subak_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$Subak_toPadma[Subak::Subak_vowelsn_R]   = Padma::Padma_vowelsn_R;
$Subak_toPadma[Subak::Subak_vowelsn_RR]  = Padma::Padma_vowelsn_RR;
$Subak_toPadma[Subak::Subak_vowelsn_EE]   = Padma::Padma_vowelsn_EE;
$Subak_toPadma[Subak::Subak_vowelsn_AI]  = Padma::Padma_vowelsn_AI;

//Matra + anusvara
$Subak_toPadma[Subak::Subak_vowelsn_IM]   = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$Subak_toPadma[Subak::Subak_vowelsn_IIM]  = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$Subak_toPadma[Subak::Subak_vowelsn_EEM]  = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$Subak_toPadma[Subak::Subak_vowelsn_AIM]  = Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;

//Halffm
$Subak_toPadma[Subak::Subak_halffm_KA]     = Padma::Padma_halffm_KA;
$Subak_toPadma[Subak::Subak_halffm_KHA]    = Padma::Padma_halffm_KHA;
$Subak_toPadma[Subak::Subak_halffm_GA]     = Padma::Padma_halffm_GA;
$Subak_toPadma[Subak::Subak_halffm_GHA]    = Padma::Padma_halffm_GHA;
$Subak_toPadma[Subak::Subak_halffm_CA]     = Padma::Padma_halffm_CA;
$Subak_toPadma[Subak::Subak_halffm_JA]     = Padma::Padma_halffm_JA;
$Subak_toPadma[Subak::Subak_halffm_JHA]    = Padma::Padma_halffm_JHA;
$Subak_toPadma[Subak::Subak_halffm_NYA]    = Padma::Padma_halffm_NYA;
$Subak_toPadma[Subak::Subak_halffm_NNA]    = Padma::Padma_halffm_NNA;
$Subak_toPadma[Subak::Subak_halffm_TA]     = Padma::Padma_halffm_TA;
$Subak_toPadma[Subak::Subak_halffm_TT]     = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$Subak_toPadma[Subak::Subak_halffm_TR]     = Padma::Padma_halffm_TA . Padma::Padma_halffm_RA;
$Subak_toPadma[Subak::Subak_halffm_THA]    = Padma::Padma_halffm_THA;
$Subak_toPadma[Subak::Subak_halffm_DHA]    = Padma::Padma_halffm_DHA;
$Subak_toPadma[Subak::Subak_halffm_NA]     = Padma::Padma_halffm_NA;
$Subak_toPadma[Subak::Subak_halffm_PA]     = Padma::Padma_halffm_PA;
$Subak_toPadma[Subak::Subak_halffm_PHA]    = Padma::Padma_halffm_PHA;
$Subak_toPadma[Subak::Subak_halffm_BA]     = Padma::Padma_halffm_BA;
$Subak_toPadma[Subak::Subak_halffm_BHA]    = Padma::Padma_halffm_BHA;
$Subak_toPadma[Subak::Subak_halffm_MA]     = Padma::Padma_halffm_MA;
$Subak_toPadma[Subak::Subak_halffm_YA]     = Padma::Padma_halffm_YA;
$Subak_toPadma[Subak::Subak_halffm_RA]     = Padma::Padma_halffm_RA;
$Subak_toPadma[Subak::Subak_halffm_LA]     = Padma::Padma_halffm_LA;
$Subak_toPadma[Subak::Subak_halffm_VA]     = Padma::Padma_halffm_VA;
$Subak_toPadma[Subak::Subak_halffm_SHA_1]  = Padma::Padma_halffm_SHA;
$Subak_toPadma[Subak::Subak_halffm_SHA_2]  = Padma::Padma_halffm_SHA;
$Subak_toPadma[Subak::Subak_halffm_SSA]    = Padma::Padma_halffm_SSA;
$Subak_toPadma[Subak::Subak_halffm_SA]     = Padma::Padma_halffm_SA;
$Subak_toPadma[Subak::Subak_halffm_HA]     = Padma::Padma_halffm_HA;
$Subak_toPadma[Subak::Subak_halffm_LLA]    = Padma::Padma_halffm_LLA;
$Subak_toPadma[Subak::Subak_halffm_RRA]    = Padma::Padma_halffm_RRA;
$Subak_toPadma[Subak::Subak_halffm_KSH]    = Padma::Padma_halffm_KA . Padma::Padma_halffm_SSA;

//Conjuncts
$Subak_toPadma[Subak::Subak_conjct_KK]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_KA;
$Subak_toPadma[Subak::Subak_conjct_KV]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_VA;
$Subak_toPadma[Subak::Subak_conjct_KT]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$Subak_toPadma[Subak::Subak_conjct_GN]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_NA;
$Subak_toPadma[Subak::Subak_conjct_NGG]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GA;
$Subak_toPadma[Subak::Subak_conjct_NGGH]   = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GHA;
$Subak_toPadma[Subak::Subak_conjct_NGKSH]  = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA . Padma::Padma_vattu_SSA;
$Subak_toPadma[Subak::Subak_conjct_NGM]    = Padma::Padma_consnt_NGA . Padma::Padma_vattu_MA;
$Subak_toPadma[Subak::Subak_conjct_CC]     = Padma::Padma_consnt_CA . Padma::Padma_vattu_CA;
$Subak_toPadma[Subak::Subak_conjct_JJ]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA;
$Subak_toPadma[Subak::Subak_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$Subak_toPadma[Subak::Subak_conjct_TT_TTH] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$Subak_toPadma[Subak::Subak_conjct_TTHTTH] = Padma::Padma_consnt_TTHA . Padma::Padma_vattu_TTHA;
$Subak_toPadma[Subak::Subak_conjct_DDDD]   = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$Subak_toPadma[Subak::Subak_conjct_DD_DDH] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$Subak_toPadma[Subak::Subak_conjct_DDHDDH] = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_DDHA;
$Subak_toPadma[Subak::Subak_conjct_TT]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$Subak_toPadma[Subak::Subak_conjct_TR]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$Subak_toPadma[Subak::Subak_conjct_DG]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$Subak_toPadma[Subak::Subak_conjct_DGH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_GHA;
$Subak_toPadma[Subak::Subak_conjct_DD]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Subak_toPadma[Subak::Subak_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Subak_toPadma[Subak::Subak_conjct_DN]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_NA;
$Subak_toPadma[Subak::Subak_conjct_DB]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$Subak_toPadma[Subak::Subak_conjct_DBH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$Subak_toPadma[Subak::Subak_conjct_DM]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$Subak_toPadma[Subak::Subak_conjct_DY]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$Subak_toPadma[Subak::Subak_conjct_DR]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$Subak_toPadma[Subak::Subak_conjct_DV]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$Subak_toPadma[Subak::Subak_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$Subak_toPadma[Subak::Subak_conjct_PR]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$Subak_toPadma[Subak::Subak_conjct_PT]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_TA;
$Subak_toPadma[Subak::Subak_conjct_LL]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_LA;
$Subak_toPadma[Subak::Subak_conjct_SHC]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$Subak_toPadma[Subak::Subak_conjct_SHN]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_NA;
$Subak_toPadma[Subak::Subak_conjct_SHR]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$Subak_toPadma[Subak::Subak_conjct_SHV]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$Subak_toPadma[Subak::Subak_conjct_SSTT]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$Subak_toPadma[Subak::Subak_conjct_SSTTH]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$Subak_toPadma[Subak::Subak_conjct_STR]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Subak_toPadma[Subak::Subak_conjct_HNN]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
$Subak_toPadma[Subak::Subak_conjct_HN]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NA;
$Subak_toPadma[Subak::Subak_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$Subak_toPadma[Subak::Subak_conjct_HY]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$Subak_toPadma[Subak::Subak_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$Subak_toPadma[Subak::Subak_conjct_HV]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_VA;

$Subak_toPadma[Subak::Subak_combo_DR]      = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_R;
$Subak_toPadma[Subak::Subak_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$Subak_toPadma[Subak::Subak_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$Subak_toPadma[Subak::Subak_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;

$Subak_toPadma[Subak::Subak_halffm_RII]     = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$Subak_toPadma[Subak::Subak_halffm_RIIM]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$Subak_toPadma[Subak::Subak_halffm_REE]     = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE;
$Subak_toPadma[Subak::Subak_halffm_REEM]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$Subak_toPadma[Subak::Subak_halffm_RAI]     = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI;
$Subak_toPadma[Subak::Subak_halffm_RAIM]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;
$Subak_toPadma[Subak::Subak_halffm_RA_ANU]  = Padma::Padma_halffm_RA . Padma::Padma_anusvara;

$Subak_toPadma[Subak::Subak_vattu_YA]      = Padma::Padma_vattu_YA;
$Subak_toPadma[Subak::Subak_vattu_RA_1]    = Padma::Padma_vattu_RA;
$Subak_toPadma[Subak::Subak_vattu_RA_2]    = Padma::Padma_vattu_RA;
$Subak_toPadma[Subak::Subak_vattu_RA_3]    = Padma::Padma_vattu_RA;
$Subak_toPadma[Subak::Subak_vattu_RA_U]    = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$Subak_toPadma[Subak::Subak_vattu_RA_UU]   = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_UU;

$Subak_toPadma[Subak::Subak_syllbr_KHA]    = Padma::Padma_consnt_KHA . Padma::Padma_syllbreak;
$Subak_toPadma[Subak::Subak_syllbr_JHA]    = Padma::Padma_consnt_JHA . Padma::Padma_syllbreak;

$Subak_toPadma[Subak::Subak_misc_OM]       = Padma::Padma_om;

//Digits
$Subak_toPadma[Subak::Subak_digit_ZERO]    = Padma::Padma_digit_ZERO;
$Subak_toPadma[Subak::Subak_digit_ONE]     = Padma::Padma_digit_ONE;
$Subak_toPadma[Subak::Subak_digit_TWO]     = Padma::Padma_digit_TWO;
$Subak_toPadma[Subak::Subak_digit_THREE]   = Padma::Padma_digit_THREE;
$Subak_toPadma[Subak::Subak_digit_FOUR]    = Padma::Padma_digit_FOUR;
$Subak_toPadma[Subak::Subak_digit_FIVE]    = Padma::Padma_digit_FIVE;
$Subak_toPadma[Subak::Subak_digit_SIX]     = Padma::Padma_digit_SIX;
$Subak_toPadma[Subak::Subak_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$Subak_toPadma[Subak::Subak_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$Subak_toPadma[Subak::Subak_digit_NINE]    = Padma::Padma_digit_NINE;

//Does not match A$SCII
$Subak_toPadma[Subak::Subak_extra_QTSINGLE] = "'";
$Subak_toPadma[Subak::Subak_MULTIPLY]       = "\xC3\x97"; //Unicode for multiplication symbol
$Subak_toPadma[Subak::Subak_DIVIDE]         = "\xC3\xB7"; //Unicode for division symbol
$Subak_toPadma[Subak::Subak_extra_COLON]    = ":";

$Subak_prefixList = array();
$Subak_prefixList[Subak::Subak_vowelsn_I_1]  = true;
$Subak_prefixList[Subak::Subak_vowelsn_I_2]  = true;
$Subak_prefixList[Subak::Subak_vowelsn_I_3]  = true;
$Subak_prefixList[Subak::Subak_vowelsn_IM]   = true;

$Subak_suffixList = array();
$Subak_suffixList[Subak::Subak_halffm_RA]     = true;
$Subak_suffixList[Subak::Subak_halffm_RII]    = true;
$Subak_suffixList[Subak::Subak_halffm_RIIM]   = true;
$Subak_suffixList[Subak::Subak_halffm_REE]    = true;
$Subak_suffixList[Subak::Subak_halffm_REEM]   = true;
$Subak_suffixList[Subak::Subak_halffm_RAI]    = true;
$Subak_suffixList[Subak::Subak_halffm_RAIM]   = true;
$Subak_suffixList[Subak::Subak_halffm_RA_ANU] = true;

$Subak_redundantList = array();
$Subak_redundantList[Subak::Subak_misc_UNKNOWN_1] = true;
$Subak_redundantList[Subak::Subak_misc_UNKNOWN_2] = true;

$Subak_overloadList = array();
$Subak_overloadList[Subak::Subak_vowel_A]    = true;
$Subak_overloadList[Subak::Subak_vowel_AA]   = true;
$Subak_overloadList[Subak::Subak_vowel_EE]   = true;
$Subak_overloadList[Subak::Subak_vowel_I]    = true;
$Subak_overloadList[Subak::Subak_vowelsn_AA] = true;
$Subak_overloadList[Subak::Subak_halffm_TT]  = true;

function Subak_initialize()
{
    global $fontinfo;

    $fontinfo["subak"]["language"] = "Devanagari";
    $fontinfo["subak"]["class"] = "Subak";
}
?>
