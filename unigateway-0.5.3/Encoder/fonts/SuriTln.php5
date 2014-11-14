<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2005-2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
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

class SuriTln
{
function SuriTln()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "SuriTln";
var $displayName  = "SuriTln";
var $script       = Padma::Padma_script_TELUGU;

function lookup($str) 
{
    global $SuriTln_toPadma;
    return $SuriTln_toPadma[$str];
}

function isPrefixSymbol($str)
{
   global $SuriTln_prefixList;
   return $SuriTln_prefixList[$str] != null;
}

function isOverloaded($str)
{
    global  $SuriTln_overloadList;
    return $SuriTln_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_U)
        return Padma::Padma_vowelsn_O;
    if ($sign1 == Padma::Padma_vowelsn_I && $sign2 == Padma::Padma_vowelsn_IILEN)
        return Padma::Padma_vowelsn_II;
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN)
        return Padma::Padma_vowelsn_AI;
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;    
}

function isRedundant($str)
{
    global $SuriTln_redundantList;
    return $SuriTln_redundantList[$str] != null;
}

//Implementation details start here

//0x 7C, A6

//Specials
const SuriTln_candrabindu    = "\x4A";
const SuriTln_visarga        = "\x4C";
const SuriTln_virama_1       = "\xC3\xBE";
const SuriTln_virama_2       = "\xC3\xBF";
const SuriTln_anusvara       = "\x4B";
const SuriTln_avagraha       = "\x4D";

//Vowels
const SuriTln_vowel_A        = "\xC3\x83";
const SuriTln_vowel_AA       = "\xC3\x84";
const SuriTln_vowel_I        = "\xC3\x85";
const SuriTln_vowel_II       = "\xC3\x86";
const SuriTln_vowel_U        = "\xC3\x87";
const SuriTln_vowel_UU       = "\xC3\x88";
const SuriTln_vowel_R        = "\x65\xC3\x9D\xC3\xA2";
const SuriTln_vowel_RR       = "\x65\xC3\x9D\xC3\xA4";
const SuriTln_vowel_L        = "\xC3\x89";
const SuriTln_vowel_LL       = "\xC3\x89\xC3\x90";
const SuriTln_vowel_E        = "\xC3\x8A";
const SuriTln_vowel_EE       = "\xC3\x8B\xC3\x8A";
const SuriTln_vowel_AI       = "\xC3\x8C";
const SuriTln_vowel_O        = "\xC3\x8D";
const SuriTln_vowel_OO       = "\xC3\x8B\xC3\x8D";
const SuriTln_vowel_AU       = "\xC3\x8D\xC3\xBC";

//Consonants
const SuriTln_consnt_KA      = "\x4E";
const SuriTln_consnt_KHA_1   = "\x4F";
const SuriTln_consnt_KHA_2   = "\x50";
const SuriTln_consnt_GA      = "\x52";
const SuriTln_consnt_GHA_1   = "\xE2\x80\xA2\xC3\x9D";
const SuriTln_consnt_GHA_2   = "\xE2\x80\xA2\xC3\xA1";
const SuriTln_consnt_GHA_3   = "\xE2\x80\xA2\xC3\xA2";
const SuriTln_consnt_NGA     = "\xC3\x8D\x53";

const SuriTln_consnt_CA      = "\x54";
const SuriTln_consnt_CHA     = "\x27";
const SuriTln_consnt_JA      = "\xC3\x8D\xC3\x9E";
const SuriTln_consnt_JHA_1   = "\x68\x58\xC3\xA2";
const SuriTln_consnt_JHA_2   = "\x68\x58\xC3\xA1";
const SuriTln_consnt_NYA     = "\xC3\x85\x53";

const SuriTln_consnt_TTA_1   = "\x59";
const SuriTln_consnt_TTA_2   = "\x5A";
const SuriTln_consnt_TTHA    = "\x5B";
const SuriTln_consnt_DDA     = "\x5C";
const SuriTln_consnt_DDHA    = "\xE2\x80\x99";
const SuriTln_consnt_NNA     = "\x5D";

const SuriTln_consnt_TA      = "\x5E";
const SuriTln_consnt_THA     = "\xC2\xAF";
const SuriTln_consnt_DA      = "\x60";
const SuriTln_consnt_DHA     = "\xE2\x80\x9C";
const SuriTln_consnt_NA      = "\x61";

const SuriTln_consnt_PA_1    = "\x63";
const SuriTln_consnt_PA_2    = "\x64";
const SuriTln_consnt_PHA_1   = "\xE2\x80\xA2";
const SuriTln_consnt_PHA_2   = "\xE2\x80\x94";
const SuriTln_consnt_BA_1    = "\x65";
const SuriTln_consnt_BA_2    = "\x66";
const SuriTln_consnt_BHA     = "\x7E";
const SuriTln_consnt_MA_1    = "\x6F\xC3\xA1";
const SuriTln_consnt_MA_2    = "\x6F\xC3\xA2";

const SuriTln_consnt_YA_1    = "\x68\xC5\xB8\xC3\xA1";
const SuriTln_consnt_YA_2    = "\x68\xC5\xB8\xC3\xA2";
const SuriTln_consnt_RA      = "\x68";
const SuriTln_consnt_LA_1    = "\x6A";
const SuriTln_consnt_LA_2    = "\x6B";
const SuriTln_consnt_VA      = "\x6F";
const SuriTln_consnt_SHA     = "\x71";
const SuriTln_consnt_SSA_1   = "\x73";
const SuriTln_consnt_SSA_2   = "\x74";
const SuriTln_consnt_SA_1    = "\x75";
const SuriTln_consnt_SA_2    = "\x76";
const SuriTln_consnt_HA      = "\x77";
const SuriTln_consnt_LLA     = "\x6D";
const SuriTln_consnt_RRA     = "\x69";

const SuriTln_consnt_TSA     = "\x56\x54";
const SuriTln_consnt_DJA      = "\x56\xC3\x8D\xC3\x9E";

//Gunintamulu
const SuriTln_vowelsn_AA_1   = "\xC3\x90";
const SuriTln_vowelsn_AA_2   = "\xC3\x91";
const SuriTln_vowelsn_AA_3   = "\xC3\x92";
const SuriTln_vowelsn_I_1    = "\xC3\x93";
const SuriTln_vowelsn_I_2    = "\xC3\x94";
const SuriTln_vowelsn_I_3    = "\xC3\x95";
const SuriTln_vowelsn_I_4    = "\xC3\x96";
const SuriTln_vowelsn_II_1   = "\xC3\x97";
const SuriTln_vowelsn_II_2   = "\xC3\x98";
const SuriTln_vowelsn_II_3   = "\xC3\x99";
const SuriTln_vowelsn_II_4   = "\xC3\x9A";
const SuriTln_vowelsn_U_1    = "\xC3\x9C";
const SuriTln_vowelsn_U_2    = "\xC3\x9D";
const SuriTln_vowelsn_U_3    = "\xC3\x9E";
const SuriTln_vowelsn_U_4    = "\xC3\x9F";
const SuriTln_vowelsn_U_5    = "\xC3\xA0";
const SuriTln_vowelsn_U_6    = "\xC3\xA1";
const SuriTln_vowelsn_U_7    = "\xC3\xA2";
const SuriTln_vowelsn_UU_1   = "\xC3\xA3";
const SuriTln_vowelsn_UU_2   = "\xC3\xA4";
const SuriTln_vowelsn_UU_3   = "\xC3\xA5";
const SuriTln_vowelsn_UU_4   = "\xC3\xA6";
const SuriTln_vowelsn_UU_5   = "\xC3\xA7";
const SuriTln_vowelsn_R      = "\xC3\xA8";
const SuriTln_vowelsn_RR     = "\xC3\xA9";
const SuriTln_vowelsn_L      = "\xC3\xAA";
const SuriTln_vowelsn_E_1    = "\xC3\xAB";
const SuriTln_vowelsn_E_2    = "\xC3\xAC";
const SuriTln_vowelsn_E_3    = "\xC3\xAD";
const SuriTln_vowelsn_EE_1   = "\xC3\x8E";
const SuriTln_vowelsn_EE_2   = "\xC3\xAE";
const SuriTln_vowelsn_EE_3   = "\xC3\xAF";
const SuriTln_vowelsn_O_1    = "\xC3\xB5";
const SuriTln_vowelsn_O_2    = "\xC3\xB6";
const SuriTln_vowelsn_O_3    = "\xC3\xB7";
const SuriTln_vowelsn_OO_1   = "\xC3\xB8";
const SuriTln_vowelsn_OO_2   = "\xC3\xB9";
const SuriTln_vowelsn_OO_3   = "\xC3\xBA";
const SuriTln_vowelsn_AU_1   = "\xC3\xBB";
const SuriTln_vowelsn_AU_2   = "\xC3\xBC";
const SuriTln_vowelsn_AU_3   = "\xC3\xBD";

const SuriTln_vowelsn_IILEN  = "\xC3\x9B";
const SuriTln_vowelsn_AILEN_1 = "\xC3\xB0";
const SuriTln_vowelsn_AILEN_2 = "\xC3\xB1";
const SuriTln_vowelsn_AILEN_3 = "\xC3\xB2";
const SuriTln_vowelsn_AILEN_4 = "\xC3\xB3";
const SuriTln_vowelsn_AILEN_5 = "\xC3\xB4";

//Special Combinations
const SuriTln_combo_KSHA     = "\x79";
const SuriTln_combo_KHI      = "\x51";

const SuriTln_combo_CI       = "\x55";
const SuriTln_combo_CHI      = "\x2A";
const SuriTln_combo_JI       = "\xC3\x8D\xC3\x96";
const SuriTln_combo_JII      = "\xC3\x8D\xC3\x9A";

const SuriTln_combo_TI       = "\x5F";
const SuriTln_combo_NI       = "\x62";

const SuriTln_combo_BI       = "\x67";
const SuriTln_combo_BHI      = "\xC2\xB7";
const SuriTln_combo_MAA      = "\x6F\xC3\xA4";
const SuriTln_combo_MI       = "\x70\xC3\xA2";
const SuriTln_combo_MII      = "\x70\xC3\x9B\xC3\xA2";
const SuriTln_combo_MU       = "\x6F\xC3\x9D\xC3\xA2";
const SuriTln_combo_MUU      = "\x6F\xC3\x9D\xC3\xA4";
const SuriTln_combo_MAILEN_1 = "\x6F\xC3\xB0\xC3\xA2";
const SuriTln_combo_MAILEN_2 = "\x6F\xC3\xB3\xC3\xA2";
const SuriTln_combo_MPOLLU   = "\x6F\xC3\xBE\xC3\xA2";

const SuriTln_combo_YAA      = "\x68\xC5\xB8\xC3\xA4";
const SuriTln_combo_YI       = "\x68\xC3\x9D\xC3\xA2";
const SuriTln_combo_YII      = "\x68\xC3\x9D\xC3\xA4";
const SuriTln_combo_YU       = "\x68\xC5\xB8\xC3\x9D\xC3\xA2";
const SuriTln_combo_YUU      = "\x68\xC5\xB8\xC3\x9D\xC3\xA4";
const SuriTln_combo_YE       = "\x68\x7A\xC3\xA2";
const SuriTln_combo_YEE      = "\x68\xC3\xAF\xC3\xA1\xC3\xA2";
const SuriTln_combo_YAI      = "\x68\x7A\xC3\xB2\xC3\xA2";
const SuriTln_combo_YO       = "\x68\x7A\xC3\x9D\xC3\xA2";
const SuriTln_combo_YOO      = "\x68\x7A\xC3\xA4";
const SuriTln_combo_YPOLLU   = "\x68\xC3\xA1\xC3\xBE\xC3\xA2";
const SuriTln_combo_LI       = "\x6C";
const SuriTln_combo_VI       = "\x70";
const SuriTln_combo_SHI      = "\x72";
const SuriTln_combo_LLI      = "\x6E";
const SuriTln_combo_HAA      = "\x78";

//Vattulu
const SuriTln_vattu_KA       = "\xC6\x92";
const SuriTln_vattu_KSHA     = "\x7D";
const SuriTln_vattu_KHA      = "\xE2\x80\x9E";
const SuriTln_vattu_GA_1     = "\xE2\x80\xA6";
const SuriTln_vattu_GA_2     = "\xC2\xBB";
const SuriTln_vattu_GHA      = "\xE2\x80\xA0";
const SuriTln_vattu_NGA      = "\xE2\x80\xA1";

const SuriTln_vattu_CA       = "\xCB\x86";
const SuriTln_vattu_CHA      = "\xCB\x86\xE2\x80\xB0";
const SuriTln_vattu_JA_1     = "\xC5\xA0";
const SuriTln_vattu_JA_2     = "\xC2\xBC";
const SuriTln_vattu_JHA      = "\xE2\x80\xB9";
const SuriTln_vattu_NYA      = "\xC5\x92";

const SuriTln_vattu_TTA_1    = "\xCB\x9C";
const SuriTln_vattu_TTA_2    = "\xC2\xBD";
const SuriTln_vattu_TTHA     = "\xE2\x84\xA2";
const SuriTln_vattu_DDA      = "\xC5\xA1";
const SuriTln_vattu_DDHA     = "\xE2\x80\xBA";
const SuriTln_vattu_NNA_1    = "\xC5\x93";
const SuriTln_vattu_NNA_2    = "\xC2\xBE";

const SuriTln_vattu_TA_1     = "\xC2\xA1";
const SuriTln_vattu_TA_2     = "\xC2\xBF";
const SuriTln_vattu_THA_1    = "\xC2\xA2";
const SuriTln_vattu_THA_2    = "\xC3\x80";
const SuriTln_vattu_DA       = "\xC2\xA3";
const SuriTln_vattu_DHA      = "\xC2\xA4";
const SuriTln_vattu_NA       = "\xC2\xA5";

const SuriTln_vattu_PA       = "\xC2\xA7";
const SuriTln_vattu_PHA      = "\xC2\xA7\xE2\x80\xB0";
const SuriTln_vattu_BA       = "\xC2\xA8";
const SuriTln_vattu_BHA      = "\xC2\xA8\xE2\x80\xB0";
const SuriTln_vattu_MA       = "\xC2\xA9";

const SuriTln_vattu_YA       = "\xC2\xAA";
const SuriTln_vattu_RA_1     = "\xC2\xAB";
const SuriTln_vattu_RA_2     = "\xC2\xAC";
const SuriTln_vattu_RA_3     = "\xC2\xAE";
const SuriTln_vattu_RA_4     = "\xC2\xB0";
const SuriTln_vattu_RA_5     = "\xC3\x81";
const SuriTln_vattu_LA_1     = "\xC2\xB2";
const SuriTln_vattu_LA_2     = "\xC3\x82";
const SuriTln_vattu_VA       = "\xC2\xB5";
const SuriTln_vattu_SHA      = "\xC2\xB6";
const SuriTln_vattu_SSA      = "\xC2\xB8";
const SuriTln_vattu_SA       = "\xC2\xB9";
const SuriTln_vattu_HA       = "\xC2\xBA";
const SuriTln_vattu_LLA      = "\xC2\xB3";
const SuriTln_vattu_RRA      = "\xC2\xB1";

const SuriTln_vattu_TSA      = "\x56\xCB\x86";

const SuriTln_LQTSINGLE      = "\x25";
const SuriTln_RQTSINGLE      = "\x26";
const SuriTln_LQTDOUBLE      = "\x22";
const SuriTln_RQTDOUBLE      = "\x23";
const SuriTln_misc_DANDA     = "\x3C";
const SuriTln_misc_DDANDA    = "\x3E";
const SuriTln_ASTERISK       = "\x57";

//Matches ASCII
const SuriTln_EXCLAM         = "\x21";
const SuriTln_PARENLEFT      = "\x28";
const SuriTln_PARENRIGT      = "\x29";
const SuriTln_PLUS           = "\x2B";
const SuriTln_COMMA          = "\x2C";
const SuriTln_HYPHEN         = "\x2D";
const SuriTln_PERIOD         = "\x2E";
const SuriTln_SLASH          = "\x2F";
const SuriTln_ZERO           = "\x30";
const SuriTln_ONE            = "\x31";
const SuriTln_TWO            = "\x32";
const SuriTln_THREE          = "\x33";
const SuriTln_FOUR           = "\x34";
const SuriTln_FIVE           = "\x35";
const SuriTln_SIX            = "\x36";
const SuriTln_SEVEN          = "\x37";
const SuriTln_EIGHT          = "\x38";
const SuriTln_NINE           = "\x39";
const SuriTln_COLON          = "\x3A";
const SuriTln_SEMICOLON      = "\x3B";
const SuriTln_EQUALS         = "\x3D";
const SuriTln_QUESTION       = "\x3F";

//Telugu Digits
const SuriTln_digit_ZERO     = "\x40";
const SuriTln_digit_ONE      = "\x41";
const SuriTln_digit_TWO      = "\x42";
const SuriTln_digit_THREE    = "\x43";
const SuriTln_digit_FOUR     = "\x44";
const SuriTln_digit_FIVE     = "\x45";
const SuriTln_digit_SIX      = "\x46";
const SuriTln_digit_SEVEN    = "\x47";
const SuriTln_digit_EIGHT    = "\x48";
const SuriTln_digit_NINE     = "\x49";

//Kommu
const SuriTln_misc_TICK_1    = "\xE2\x80\x98";
const SuriTln_misc_TICK_2    = "\xC3\x8F";
const SuriTln_misc_UNKNOWN_1 = "\xE2\x80\x9A";

}
$SuriTln_toPadma = array();

$SuriTln_toPadma[SuriTln::SuriTln_candrabindu] = Padma::Padma_candrabindu;
$SuriTln_toPadma[SuriTln::SuriTln_visarga]  = Padma::Padma_visarga;
$SuriTln_toPadma[SuriTln::SuriTln_virama_1] = Padma::Padma_syllbreak;
$SuriTln_toPadma[SuriTln::SuriTln_virama_2] = Padma::Padma_syllbreak;
$SuriTln_toPadma[SuriTln::SuriTln_anusvara] = Padma::Padma_anusvara;
$SuriTln_toPadma[SuriTln::SuriTln_avagraha] = Padma::Padma_avagraha;

$SuriTln_toPadma[SuriTln::SuriTln_vowel_A]  = Padma::Padma_vowel_A;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_AA] = Padma::Padma_vowel_AA;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_I]  = Padma::Padma_vowel_I;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_II] = Padma::Padma_vowel_II;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_U]  = Padma::Padma_vowel_U;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_UU] = Padma::Padma_vowel_UU;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_R]  = Padma::Padma_vowel_R;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_RR] = Padma::Padma_vowel_RR;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_L]  = Padma::Padma_vowel_L;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_LL] = Padma::Padma_vowel_LL;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_E]  = Padma::Padma_vowel_E;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_EE] = Padma::Padma_vowel_EE;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_AI] = Padma::Padma_vowel_AI;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_O]  = Padma::Padma_vowel_O;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_OO] = Padma::Padma_vowel_OO;
$SuriTln_toPadma[SuriTln::SuriTln_vowel_AU] = Padma::Padma_vowel_AU;

$SuriTln_toPadma[SuriTln::SuriTln_consnt_KA]    = Padma::Padma_consnt_KA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_GA]    = Padma::Padma_consnt_GA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_GHA_1] = Padma::Padma_consnt_GHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_GHA_2] = Padma::Padma_consnt_GHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_GHA_3] = Padma::Padma_consnt_GHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_NGA]   = Padma::Padma_consnt_NGA;

$SuriTln_toPadma[SuriTln::SuriTln_consnt_CA]  = Padma::Padma_consnt_CA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_CHA] = Padma::Padma_consnt_CHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_JA]  = Padma::Padma_consnt_JA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_JHA_1] = Padma::Padma_consnt_JHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_JHA_2] = Padma::Padma_consnt_JHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_NYA] = Padma::Padma_consnt_NYA;

$SuriTln_toPadma[SuriTln::SuriTln_consnt_TTA_1]  = Padma::Padma_consnt_TTA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_TTA_2]  = Padma::Padma_consnt_TTA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_DDA]  = Padma::Padma_consnt_DDA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_NNA]  = Padma::Padma_consnt_NNA;

$SuriTln_toPadma[SuriTln::SuriTln_consnt_TA]  = Padma::Padma_consnt_TA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_THA] = Padma::Padma_consnt_THA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_DA]  = Padma::Padma_consnt_DA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_DHA] = Padma::Padma_consnt_DHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_NA]  = Padma::Padma_consnt_NA;

$SuriTln_toPadma[SuriTln::SuriTln_consnt_PA_1]  = Padma::Padma_consnt_PA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_PA_2]  = Padma::Padma_consnt_PA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_PHA_1] = Padma::Padma_consnt_PHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_PHA_2] = Padma::Padma_consnt_PHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_BA_1]  = Padma::Padma_consnt_BA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_BA_2]  = Padma::Padma_consnt_BA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_BHA] = Padma::Padma_consnt_BHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_MA_1]  = Padma::Padma_consnt_MA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_MA_2]  = Padma::Padma_consnt_MA;

$SuriTln_toPadma[SuriTln::SuriTln_consnt_YA_1]  = Padma::Padma_consnt_YA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_YA_2]  = Padma::Padma_consnt_YA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_RA]  = Padma::Padma_consnt_RA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_LA_1]  = Padma::Padma_consnt_LA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_LA_2]  = Padma::Padma_consnt_LA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_VA]  = Padma::Padma_consnt_VA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_SHA]  = Padma::Padma_consnt_SHA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_SA_1] = Padma::Padma_consnt_SA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_SA_2] = Padma::Padma_consnt_SA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_HA]  = Padma::Padma_consnt_HA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_LLA] = Padma::Padma_consnt_LLA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_RRA] = Padma::Padma_consnt_RRA;

$SuriTln_toPadma[SuriTln::SuriTln_consnt_TSA] = Padma::Padma_consnt_TSA;
$SuriTln_toPadma[SuriTln::SuriTln_consnt_DJA]  = Padma::Padma_consnt_DJA;

//Gunintamulu
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AA_1]  = Padma::Padma_vowelsn_AA;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AA_2]  = Padma::Padma_vowelsn_AA;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AA_3]  = Padma::Padma_vowelsn_AA;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_I_3]   = Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_I_4]   = Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_II_1]  = Padma::Padma_vowelsn_II;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_II_2]  = Padma::Padma_vowelsn_II;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_II_3]  = Padma::Padma_vowelsn_II;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_II_4]  = Padma::Padma_vowelsn_II;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_U_4]   = Padma::Padma_vowelsn_U;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_U_5]   = Padma::Padma_vowelsn_U;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_U_6]   = Padma::Padma_vowelsn_U;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_U_7]   = Padma::Padma_vowelsn_U;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_UU_4]  = Padma::Padma_vowelsn_UU;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_UU_5]  = Padma::Padma_vowelsn_UU;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_R]     = Padma::Padma_vowelsn_R;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_L]     = Padma::Padma_vowelsn_L;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_E_1]   = Padma::Padma_vowelsn_E;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_E_2]   = Padma::Padma_vowelsn_E;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_E_3]   = Padma::Padma_vowelsn_E;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_EE_1]  = Padma::Padma_vowelsn_EE;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_EE_2]  = Padma::Padma_vowelsn_EE;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_EE_3]  = Padma::Padma_vowelsn_EE;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_OO_1]  = Padma::Padma_vowelsn_OO;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_OO_2]  = Padma::Padma_vowelsn_OO;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_OO_3]  = Padma::Padma_vowelsn_OO;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AU_3]  = Padma::Padma_vowelsn_AU;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_IILEN] = Padma::Padma_vowelsn_IILEN;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AILEN_3] = Padma::Padma_vowelsn_AILEN;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AILEN_4] = Padma::Padma_vowelsn_AILEN;
$SuriTln_toPadma[SuriTln::SuriTln_vowelsn_AILEN_5] = Padma::Padma_vowelsn_AILEN;

//$Special Combinations
$SuriTln_toPadma[SuriTln::SuriTln_combo_KSHA]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$SuriTln_toPadma[SuriTln::SuriTln_combo_KHI]     = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;

$SuriTln_toPadma[SuriTln::SuriTln_combo_CI]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_CHI]     = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_JI]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_JII]     = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_II;

$SuriTln_toPadma[SuriTln::SuriTln_combo_TI]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_NI]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;

$SuriTln_toPadma[SuriTln::SuriTln_combo_BI]      = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_BHI]     = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_MAA]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$SuriTln_toPadma[SuriTln::SuriTln_combo_MI]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_MII]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_II;
$SuriTln_toPadma[SuriTln::SuriTln_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$SuriTln_toPadma[SuriTln::SuriTln_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$SuriTln_toPadma[SuriTln::SuriTln_combo_MAILEN_1] = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AILEN;
$SuriTln_toPadma[SuriTln::SuriTln_combo_MAILEN_2] = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AILEN;
$SuriTln_toPadma[SuriTln::SuriTln_combo_MPOLLU]  = Padma::Padma_consnt_MA . Padma::Padma_syllbreak;

$SuriTln_toPadma[SuriTln::SuriTln_combo_YAA]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YI]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YII]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_II;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YUU]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YE]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YEE]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YAI]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AI;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YO]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_O;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YOO]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_OO;
$SuriTln_toPadma[SuriTln::SuriTln_combo_YPOLLU]  = Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$SuriTln_toPadma[SuriTln::SuriTln_combo_LI]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_VI]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_SHI]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_LLI]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;
$SuriTln_toPadma[SuriTln::SuriTln_combo_HAA]     = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AA;

//Vattulu
$SuriTln_toPadma[SuriTln::SuriTln_vattu_KA]      = Padma::Padma_vattu_KA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_KSHA]    = Padma::Padma_vattu_KA . Padma::Padma_vattu_SSA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_KHA]     = Padma::Padma_vattu_KHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_GA_1]    = Padma::Padma_vattu_GA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_GA_2]    = Padma::Padma_vattu_GA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_GHA]     = Padma::Padma_vattu_GHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_NGA]     = Padma::Padma_vattu_NGA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_CA]      = Padma::Padma_vattu_CA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_CHA]     = Padma::Padma_vattu_CHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_JA_1]    = Padma::Padma_vattu_JA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_JA_2]    = Padma::Padma_vattu_JA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_JHA]     = Padma::Padma_vattu_JHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_NYA]     = Padma::Padma_vattu_NYA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_TTA_1]   = Padma::Padma_vattu_TTA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_TTA_2]   = Padma::Padma_vattu_TTA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_DDA]     = Padma::Padma_vattu_DDA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_DDHA]    = Padma::Padma_vattu_DDHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_NNA_1]   = Padma::Padma_vattu_NNA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_NNA_2]   = Padma::Padma_vattu_NNA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_TA_1]    = Padma::Padma_vattu_TA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_TA_2]    = Padma::Padma_vattu_TA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_THA_1]   = Padma::Padma_vattu_THA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_THA_2]   = Padma::Padma_vattu_THA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_DA]      = Padma::Padma_vattu_DA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_DHA]     = Padma::Padma_vattu_DHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_NA]      = Padma::Padma_vattu_NA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_PA]      = Padma::Padma_vattu_PA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_PHA]     = Padma::Padma_vattu_PHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_BA]      = Padma::Padma_vattu_BA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_BHA]     = Padma::Padma_vattu_BHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_MA]      = Padma::Padma_vattu_MA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_YA]      = Padma::Padma_vattu_YA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_RA_1]    = Padma::Padma_vattu_RA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_RA_2]    = Padma::Padma_vattu_RA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_RA_3]    = Padma::Padma_vattu_RA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_RA_4]    = Padma::Padma_vattu_RA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_RA_5]    = Padma::Padma_vattu_RA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_LA_1]    = Padma::Padma_vattu_LA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_LA_2]    = Padma::Padma_vattu_LA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_VA]      = Padma::Padma_vattu_VA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_SHA]     = Padma::Padma_vattu_SHA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_SSA]     = Padma::Padma_vattu_SSA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_SA]      = Padma::Padma_vattu_SA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_HA]      = Padma::Padma_vattu_HA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_LLA]     = Padma::Padma_vattu_LLA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_RRA]     = Padma::Padma_vattu_RRA;
$SuriTln_toPadma[SuriTln::SuriTln_vattu_TSA]     = Padma::Padma_vattu_TSA;

$SuriTln_toPadma[SuriTln::SuriTln_LQTSINGLE]   = "\xE2\x80\x98";
$SuriTln_toPadma[SuriTln::SuriTln_RQTSINGLE]   = "\xE2\x80\x99";
$SuriTln_toPadma[SuriTln::SuriTln_LQTDOUBLE]   = "\xE2\x80\x9C";
$SuriTln_toPadma[SuriTln::SuriTln_RQTDOUBLE]   = "\xE2\x80\x9D";
$SuriTln_toPadma[SuriTln::SuriTln_misc_DANDA]  = Padma::Padma_danda;
$SuriTln_toPadma[SuriTln::SuriTln_misc_DDANDA] = Padma::Padma_ddanda;
$SuriTln_toPadma[SuriTln::SuriTln_ASTERISK]    = "\xE2\x9C\xB1";

//Telugu Digits
$SuriTln_toPadma[SuriTln::SuriTln_digit_ZERO]    = Padma::Padma_digit_ZERO;
$SuriTln_toPadma[SuriTln::SuriTln_digit_ONE]     = Padma::Padma_digit_ONE;
$SuriTln_toPadma[SuriTln::SuriTln_digit_TWO]     = Padma::Padma_digit_TWO;
$SuriTln_toPadma[SuriTln::SuriTln_digit_THREE]   = Padma::Padma_digit_THREE;
$SuriTln_toPadma[SuriTln::SuriTln_digit_FOUR]    = Padma::Padma_digit_FOUR;
$SuriTln_toPadma[SuriTln::SuriTln_digit_FIVE]    = Padma::Padma_digit_FIVE;
$SuriTln_toPadma[SuriTln::SuriTln_digit_SIX]     = Padma::Padma_digit_SIX;
$SuriTln_toPadma[SuriTln::SuriTln_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$SuriTln_toPadma[SuriTln::SuriTln_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$SuriTln_toPadma[SuriTln::SuriTln_digit_NINE]    = Padma::Padma_digit_NINE;

$SuriTln_redundantList = array();
$SuriTln_redundantList[SuriTln::SuriTln_misc_TICK_1]    = true;
$SuriTln_redundantList[SuriTln::SuriTln_misc_TICK_2]    = true;
$SuriTln_redundantList[SuriTln::SuriTln_misc_UNKNOWN_1] = true;

$SuriTln_prefixList = array();
$SuriTln_prefixList[SuriTln::SuriTln_virama_2]        = true;
$SuriTln_prefixList[SuriTln::SuriTln_vowelsn_I_2]     = true;
$SuriTln_prefixList[SuriTln::SuriTln_vowelsn_I_3]     = true;
$SuriTln_prefixList[SuriTln::SuriTln_vowelsn_II_2]    = true;
$SuriTln_prefixList[SuriTln::SuriTln_vowelsn_II_3]    = true;
$SuriTln_prefixList[SuriTln::SuriTln_vowelsn_L]       = true;
$SuriTln_prefixList[SuriTln::SuriTln_vowelsn_E_1]     = true;
$SuriTln_prefixList[SuriTln::SuriTln_vowelsn_E_3]     = true;
$SuriTln_prefixList[SuriTln::SuriTln_vowelsn_EE_1]    = true;
$SuriTln_prefixList[SuriTln::SuriTln_vowelsn_EE_3]    = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_KSHA]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_KHA]       = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_GA_1]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_GA_2]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_GHA]       = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_NGA]       = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_JA_1]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_JHA]       = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_NYA]       = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_TTA_1]     = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_TTHA]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_DDA]       = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_DDHA]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_NNA_1]     = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_TA_1]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_THA_1]     = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_DA]        = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_DHA]       = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_RA_1]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_RA_3]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_RA_5]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_LA_1]      = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_SSA]       = true;
$SuriTln_prefixList[SuriTln::SuriTln_vattu_RRA]       = true;

$SuriTln_overloadList = array();
$SuriTln_overloadList[SuriTln::SuriTln_vowel_I]       = true;
$SuriTln_overloadList[SuriTln::SuriTln_vowel_L]       = true;
$SuriTln_overloadList[SuriTln::SuriTln_vowel_O]       = true;
$SuriTln_overloadList[SuriTln::SuriTln_consnt_PHA_1]  = true;
$SuriTln_overloadList[SuriTln::SuriTln_consnt_BA_1]   = true;
$SuriTln_overloadList[SuriTln::SuriTln_consnt_RA]     = true;
$SuriTln_overloadList[SuriTln::SuriTln_consnt_VA]     = true;
$SuriTln_overloadList[SuriTln::SuriTln_vattu_CA]      = true;
$SuriTln_overloadList[SuriTln::SuriTln_vattu_PA]      = true;
$SuriTln_overloadList[SuriTln::SuriTln_vattu_BA]      = true;
$SuriTln_overloadList[SuriTln::SuriTln_combo_VI]      = true;
$SuriTln_overloadList["\x56"]              = true;
$SuriTln_overloadList["\x56\xC3\x8D"]        = true;
$SuriTln_overloadList["\x65\xC3\x9D"]        = true;
$SuriTln_overloadList["\x68\x58"]        = true;
$SuriTln_overloadList["\x68\x7A"]        = true;
$SuriTln_overloadList["\x68\x7A\xC3\x9D"]  = true;
$SuriTln_overloadList["\x68\x7A\xC3\xB2"]  = true;
$SuriTln_overloadList["\x68\xC5\xB8"]        = true;
$SuriTln_overloadList["\x68\xC5\xB8\xC3\x9D"]  = true;
$SuriTln_overloadList["\x68\xC3\x9D"]        = true;
$SuriTln_overloadList["\x68\xC3\xA1"]        = true;
$SuriTln_overloadList["\x68\xC3\xA1\xC3\xBE"]  = true;
$SuriTln_overloadList["\x68\xC3\xAF"]        = true;
$SuriTln_overloadList["\x68\xC3\xAF\xC3\xA1"]  = true;
$SuriTln_overloadList["\x6F\xC3\x9D"]        = true;
$SuriTln_overloadList["\x6F\xC3\xB0"]        = true;
$SuriTln_overloadList["\x6F\xC3\xB3"]        = true;
$SuriTln_overloadList["\x6F\xC3\xBE"]        = true;
$SuriTln_overloadList["\x70\xC3\x9B"]        = true;
$SuriTln_overloadList["\xC3\x8B"]              = true;


function SuriTln_initialize()
{
    global $fontinfo;
    
    $fontinfo["suritlr"]["language"] = "Telugu";
    $fontinfo["suritlr"]["class"] = "SuriTln";
}
?>
