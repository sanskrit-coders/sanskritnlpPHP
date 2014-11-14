<?php
/* ***** BEGIN LICENSE BLOCK *****
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

//Shree-Kan-0850 Kannada
class Shree_Kan_0850
{

function Shree_Kan_0850()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 4;
var $fontFace     = "Shree-Kan-0850";
var $displayName  = "Shree-Kan-0850";
var $script       = Padma::Padma_script_KANNADA;
var $hasSuffixes  = true;

function lookup ($str) 
{
    global $Shree_Kan_0850_toPadma;
    return $Shree_Kan_0850_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    return false; //Shree_Kan_0850_prefixList[$str] != null;
}

function isOverloaded ($str)
{
    global $Shree_Kan_0850_overloadList;
    return $Shree_Kan_0850_overloadList[$str] != null;
}
function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if (($sign2 == Padma::Padma_vowelsn_I && $sign1 == Padma::Padma_vowelsn_IILEN) ||
        ($sign1 == Padma::Padma_vowelsn_I && $sign2 == Padma::Padma_vowelsn_IILEN))
      return Padma::Padma_vowelsn_II;
    if (($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_IILEN) ||
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_IILEN))
        return Padma::Padma_vowelsn_EE;
    if (($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AILEN) ||
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AILEN))
        return Padma::Padma_vowelsn_AI;
    if (($sign2 == Padma::Padma_vowelsn_O && $sign1 == Padma::Padma_vowelsn_IILEN) ||
        ($sign1 == Padma::Padma_vowelsn_O && $sign2 == Padma::Padma_vowelsn_IILEN))
        return Padma::Padma_vowelsn_OO;
     return $sign1 . $sign2;
}
function isRedundant ($str)
{
    global  $Shree_Kan_0850_redundantList;
    return $Shree_Kan_0850_redundantList[$str] != null;
}

function isSuffixSymbol ($str)
{
    global $Shree_Kan_0850_suffixList;
    return $Shree_Kan_0850_suffixList[$str] != null;
}

//Implementation details start here

//const Specials
const Shree_Kan_0850_visarga        = "\x40";
const Shree_Kan_0850_anusvara       = "\xC3\xAD";
const Shree_Kan_0850_virama         = "\xE2\x80\xA6";

//Vowels
const Shree_Kan_0850_vowel_A        = "\x41";
const Shree_Kan_0850_vowel_AA       = "\x42";
const Shree_Kan_0850_vowel_I        = "\x43";
const Shree_Kan_0850_vowel_II       = "\x44";
const Shree_Kan_0850_vowel_U        = "\x45";
const Shree_Kan_0850_vowel_UU       = "\x46";
const Shree_Kan_0850_vowel_R_1      = "\x4D\xC3\xA1";
const Shree_Kan_0850_vowel_R_2      = "\x4D\xC3\xA2";
const Shree_Kan_0850_vowel_R_3      = "\x4D\xC3\xA5";
const Shree_Kan_0850_vowel_RR_1     = "\x4D\xC3\xA3";
const Shree_Kan_0850_vowel_RR_2     = "\x4D\xC3\xA4";
const Shree_Kan_0850_vowel_E        = "\x47";
const Shree_Kan_0850_vowel_EE       = "\x48";
const Shree_Kan_0850_vowel_AI       = "\x49";
const Shree_Kan_0850_vowel_O        = "\x4A";
const Shree_Kan_0850_vowel_OO       = "\x4B";
const Shree_Kan_0850_vowel_AU       = "\x4C";


//Consonants
const Shree_Kan_0850_consnt_KA      = "\x50";
const Shree_Kan_0850_consnt_KHA_1   = "\x53";
const Shree_Kan_0850_consnt_KHA_2   = "\x54";
const Shree_Kan_0850_consnt_GA      = "\x57";
const Shree_Kan_0850_consnt_GHA_1   = "\x5A";
const Shree_Kan_0850_consnt_GHA_2   = "\x5B";
const Shree_Kan_0850_consnt_NGA     = "\x5F";

const Shree_Kan_0850_consnt_CA      = "\x61";
const Shree_Kan_0850_consnt_CHA     = "\x64";
const Shree_Kan_0850_consnt_JA_1    = "\x67";
const Shree_Kan_0850_consnt_JA_2    = "\x68";
const Shree_Kan_0850_consnt_JHA_1   = "\xC3\x83\x6B\xC3\xA1";
const Shree_Kan_0850_consnt_JHA_2   = "\xC3\x83\x6B\xC3\xA2";
const Shree_Kan_0850_consnt_JHA_3   = "\xC3\x83\x6B\xC3\xA5";
const Shree_Kan_0850_consnt_NYA     = "\x6D";

const Shree_Kan_0850_consnt_TTA_1   = "\x6F";
const Shree_Kan_0850_consnt_TTA_2   = "\x70";
const Shree_Kan_0850_consnt_TTHA    = "\x73";
const Shree_Kan_0850_consnt_DDA     = "\x76";
const Shree_Kan_0850_consnt_DDHA    = "\x79";
const Shree_Kan_0850_consnt_NNA_1   = "\x7C";
const Shree_Kan_0850_consnt_NNA_2   = "\x4F";

const Shree_Kan_0850_consnt_TA      = "\xC3\xB1";
const Shree_Kan_0850_consnt_THA     = "\xC2\xA5";
const Shree_Kan_0850_consnt_DA      = "\xC2\xA8";
const Shree_Kan_0850_consnt_DHA     = "\xC2\xAB";
const Shree_Kan_0850_consnt_NA      = "\xC2\xAE";

const Shree_Kan_0850_consnt_PA      = "\xC2\xB1";
const Shree_Kan_0850_consnt_PHA     = "\xC2\xB4";
const Shree_Kan_0850_consnt_BA_1    = "\xC2\xB8";
const Shree_Kan_0850_consnt_BA_2    = "\xC5\xB8";
const Shree_Kan_0850_consnt_BHA     = "\xC2\xBB";
const Shree_Kan_0850_consnt_MA_1    = "\xC3\x8A\xC3\xA1"; 
const Shree_Kan_0850_consnt_MA_2    = "\xC3\x8A\xC3\xA5"; 

const Shree_Kan_0850_consnt_YA_1    = "\xC2\xBF\xC3\xA1";
//const Shree_Kan_0850_consnt_YA_2    = "\xC2\xBF\xC3\xA2";
const Shree_Kan_0850_consnt_YA_3    = "\xC2\xBF\xC3\xA5";
const Shree_Kan_0850_consnt_YA_4    = "\x30\xC3\xA5\xC3\xA1"; 
const Shree_Kan_0850_consnt_RA      = "\xC3\x83";
const Shree_Kan_0850_consnt_LA_1    = "\xC3\x86";
const Shree_Kan_0850_consnt_LA_2    = "\xC3\x87";    
const Shree_Kan_0850_consnt_VA      = "\xC3\x8A";
const Shree_Kan_0850_consnt_SHA     = "\xC3\x8D";
const Shree_Kan_0850_consnt_SSA     = "\xC3\x90";
const Shree_Kan_0850_consnt_SA      = "\xC3\x93";
const Shree_Kan_0850_consnt_HA      = "\xC3\x96";
const Shree_Kan_0850_consnt_LLA     = "\xC3\x99";

const Shree_Kan_0850_consnt_RRA_1   = "\xE2\x80\x9C";
const Shree_Kan_0850_consnt_RRA_2   = "\xE2\x80\x9D";
const Shree_Kan_0850_consnt_FA_1    = "\xE2\x80\x98";//needs chking
const Shree_Kan_0850_consnt_FA_2    = "\xE2\x80\x99";//needs chking
const Shree_Kan_0850_conjct_KSHA    = "\xC3\xBB";
const Shree_Kan_0850_conjct_JNYA_1  = "\xC3\xBD";
const Shree_Kan_0850_conjct_JNYA_2  = "\xC3\xBE";

//Gunintamulu
const Shree_Kan_0850_vowelsn_AA     = "\xC3\x9D";
const Shree_Kan_0850_vowelsn_I      = "\xC3\x9F";
const Shree_Kan_0850_vowelsn_U_1    = "\xC3\xA1";
const Shree_Kan_0850_vowelsn_U_2    = "\xC3\xA2";
const Shree_Kan_0850_vowelsn_U_3    = "\xC3\xA5";
const Shree_Kan_0850_vowelsn_UU_1   = "\xC3\xA3";
const Shree_Kan_0850_vowelsn_UU_2   = "\xC3\xA4";
const Shree_Kan_0850_vowelsn_UU_3   = "\xC3\x9E";
const Shree_Kan_0850_vowelsn_R_1    = "\xC3\xAA";
const Shree_Kan_0850_vowelsn_R_2    = "\xC6\x92";
const Shree_Kan_0850_vowelsn_AU_2   = "\xC3\xAE";
const Shree_Kan_0850_vowelsn_RR     = "\xC3\xAB";
const Shree_Kan_0850_vowelsn_E      = "\xC3\xA6";
const Shree_Kan_0850_vowelsn_O_1    = "\xC3\xA6\xC3\xA3";
const Shree_Kan_0850_vowelsn_O_2    = "\xC3\xA6\xC3\xA4";
const Shree_Kan_0850_vowelsn_O_3    = "\xC3\xA6\xC3\x9E";
const Shree_Kan_0850_vowelsn_AU_1   = "\xC3\xA8";

const Shree_Kan_0850_vowelsn_IILEN      = "\xC3\xA0";
const Shree_Kan_0850_vowelsn_AILEN_1  = "\xC3\xA7";
const Shree_Kan_0850_vowelsn_AILEN_2  = "\xE2\x80\x9E";

//Special Combinations
const Shree_Kan_0850_combo_KI       = "\x51";
const Shree_Kan_0850_combo_KHI      = "\x55";
const Shree_Kan_0850_combo_GI       = "\x58";
const Shree_Kan_0850_combo_GHI      = "\x5C";
const Shree_Kan_0850_combo_GHE      = "\x4E";

const Shree_Kan_0850_combo_CI       = "\x62";
const Shree_Kan_0850_combo_CHI      = "\x65";
const Shree_Kan_0850_combo_JI       = "\x69";

const Shree_Kan_0850_combo_TTI      = "\x71";
const Shree_Kan_0850_combo_TTHI     = "\x74";
const Shree_Kan_0850_combo_DDI      = "\x77";
const Shree_Kan_0850_combo_DDHI     = "\x7B";
const Shree_Kan_0850_combo_NNI      = "\x7E";

const Shree_Kan_0850_combo_TI       = "\xC2\xA3";
const Shree_Kan_0850_combo_THI      = "\xC2\xA6";
const Shree_Kan_0850_combo_DI       = "\xC2\xA9";
const Shree_Kan_0850_combo_DHI      = "\xE2\x80\x94";
const Shree_Kan_0850_combo_NI       = "\xC2\xAF";

const Shree_Kan_0850_combo_PI       = "\xC2\xB2";
const Shree_Kan_0850_combo_PHI      = "\xC2\xB5";
const Shree_Kan_0850_combo_BI       = "\xC2\xB9";
const Shree_Kan_0850_combo_BHI      = "\xC2\xBC";
const Shree_Kan_0850_combo_MAA      = "\xC3\x8A\xC3\x9E";
const Shree_Kan_0850_combo_MI_1     = "\xC3\x8B\xC3\xA1";
const Shree_Kan_0850_combo_MI_2     = "\xC3\x8B\xC3\xA2";
const Shree_Kan_0850_combo_MI_3     = "\xC3\x8B\xC3\xA5";
const Shree_Kan_0850_combo_ME       = "\xC3\x8A\xC3\xA6\xC3\xA1";
const Shree_Kan_0850_combo_MO       = "\xC3\x8A\xC3\xA6\xC3\xA3";

const Shree_Kan_0850_combo_YAA_1    = "\xC2\xBF\xC3\x9E";
const Shree_Kan_0850_combo_YAA_2    = "\x30\xC3\xA5\xC3\x9E";
const Shree_Kan_0850_combo_YI       = "\xC3\x80\xC3\xA1";
const Shree_Kan_0850_combo_YE_1     = "\xC2\xBF\xC3\xA6\xC3\xA1";
const Shree_Kan_0850_combo_YE_2     = "\xC3\x81\xC3\xA1"; 
const Shree_Kan_0850_combo_YE_3     = "\x30\xC3\xA5\xC3\xA6\xC3\xA1"; 
const Shree_Kan_0850_combo_YO_1     = "\xC2\xBF\xC3\xA6\xC3\xA3";
const Shree_Kan_0850_combo_YO_2     = "\x30\xC3\xA5\xC3\xA6\xC3\xA3"; 
const Shree_Kan_0850_combo_YO_3     = "\xC3\x81\xC3\xA3"; 
const Shree_Kan_0850_combo_RI       = "\xC3\x84";
const Shree_Kan_0850_combo_LI       = "\xC3\x88";
const Shree_Kan_0850_combo_VI       = "\xC3\x8B";
const Shree_Kan_0850_combo_SHI      = "\xC3\x8E";
const Shree_Kan_0850_combo_SSI      = "\xC3\x91";
const Shree_Kan_0850_combo_SI       = "\xC3\x94";
const Shree_Kan_0850_combo_HI       = "\xC3\x97";
const Shree_Kan_0850_combo_LLI      = "\xC3\x9A";

const Shree_Kan_0850_combo_SHRI     = "\x5D";
const Shree_Kan_0850_combo_KSHI     = "\xC3\xBC";
const Shree_Kan_0850_combo_JNYI     = "\xC3\xBF";
const Shree_Kan_0850_combo_JHI      = "\xC3\x84\x6B\xC3\xA1";
const Shree_Kan_0850_combo_JHE      = "\xC3\x83\xC3\xA6\x6B\xC3\xA1";
const Shree_Kan_0850_combo_JHAA     = "\xC3\x83\x6B\xC3\x9E";

//Vattulu
const Shree_Kan_0850_vattu_KA       = "\x52";
const Shree_Kan_0850_vattu_KRA      = "\xC3\xB0";
const Shree_Kan_0850_vattu_KRU      = "\xC2\xA2";
const Shree_Kan_0850_vattu_KHA      = "\x56";
const Shree_Kan_0850_vattu_GA       = "\x59";
const Shree_Kan_0850_vattu_GHA      = "\x5E";
const Shree_Kan_0850_vattu_NGA      = "\x60";

const Shree_Kan_0850_vattu_CA       = "\x63";
const Shree_Kan_0850_vattu_CHA      = "\x66";
const Shree_Kan_0850_vattu_JA       = "\x6A";
const Shree_Kan_0850_vattu_JHA      = "\x6C";
const Shree_Kan_0850_vattu_NYA      = "\x6E";

const Shree_Kan_0850_vattu_TTA      = "\x72";
const Shree_Kan_0850_vattu_TTHA     = "\x75";
const Shree_Kan_0850_vattu_DDA      = "\x78";
const Shree_Kan_0850_vattu_DDHA     = "\x7A";
const Shree_Kan_0850_vattu_NNA      = "\xC2\xA1";

const Shree_Kan_0850_vattu_TA       = "\xC2\xA4";
const Shree_Kan_0850_vattu_TU       = "\xC3\xB5";
const Shree_Kan_0850_vattu_TAI      = "\xC3\xB4";
const Shree_Kan_0850_vattu_THA      = "\xC2\xA7";
const Shree_Kan_0850_vattu_DA       = "\xC2\xAA";
const Shree_Kan_0850_vattu_DHA      = "\xC5\x93";
const Shree_Kan_0850_vattu_NA       = "\xC2\xB0";

const Shree_Kan_0850_vattu_PA       = "\xC2\xB3";
const Shree_Kan_0850_vattu_PHA      = "\xE2\x80\x93";
const Shree_Kan_0850_vattu_BA       = "\xC2\xBA";
const Shree_Kan_0850_vattu_BHA      = "\xC2\xBD";
const Shree_Kan_0850_vattu_MA       = "\xC2\xBE";

const Shree_Kan_0850_vattu_YA_1     = "\xC3\x82";
const Shree_Kan_0850_vattu_YA_2     = "\xC3\xA9";
const Shree_Kan_0850_vattu_RA_1     = "\xC3\x85";
const Shree_Kan_0850_vattu_RA_2     = "\xE2\x80\xA0";
const Shree_Kan_0850_vattu_RA_3     = "\xE2\x80\xB9";
const Shree_Kan_0850_vattu_RA_4     = "\xE2\x80\xBA";
const Shree_Kan_0850_vattu_RA_R     = "\xC3\xB9";
const Shree_Kan_0850_vattu_RAA      = "\xE2\x80\xA2";
const Shree_Kan_0850_vattu_LA       = "\xC3\x89";
const Shree_Kan_0850_vattu_VA       = "\xC3\x8C";
const Shree_Kan_0850_vattu_SHA      = "\xC3\x8F";
const Shree_Kan_0850_vattu_SSA      = "\xC3\x92";
const Shree_Kan_0850_vattu_SA       = "\xC3\x95";
const Shree_Kan_0850_vattu_HA       = "\xC3\x98";
const Shree_Kan_0850_vattu_LLA      = "\xC3\x9B";
const Shree_Kan_0850_vattu_JAI      = "\xC3\xB2";
const Shree_Kan_0850_vattu_TTRA     = "\xC3\xB3";
const Shree_Kan_0850_vattu_TYA      = "\xC3\xB6";
const Shree_Kan_0850_vattu_TRA      = "\xC3\xB7";
const Shree_Kan_0850_vattu_PRA      = "\xC3\xB8";
const Shree_Kan_0850_vattu_SRA      = "\xC3\xBA";

//half forms of RA
const Shree_Kan_0850_halffm_RA      = "\xC3\xAC";

//Digits
const Shree_Kan_0850_digit_ZERO     = "\x30";
const Shree_Kan_0850_digit_ONE      = "\x31";
const Shree_Kan_0850_digit_TWO      = "\x32";
const Shree_Kan_0850_digit_THREE    = "\x33";
const Shree_Kan_0850_digit_FOUR     = "\x34";
const Shree_Kan_0850_digit_FIVE     = "\x35";
const Shree_Kan_0850_digit_SIX      = "\x36";
const Shree_Kan_0850_digit_SEVEN    = "\x37";
const Shree_Kan_0850_digit_EIGHT    = "\x38";
const Shree_Kan_0850_digit_NINE     = "\x39";

//Matches ASCII
const Shree_Kan_0850_EXCLAM         = "\x21";
const Shree_Kan_0850_PERCENT        = "\x25";
const Shree_Kan_0850_PARENLEFT      = "\x28";
const Shree_Kan_0850_PARENRIGT      = "\x29";
const Shree_Kan_0850_ASTERISK       = "\x2A";
const Shree_Kan_0850_PLUS           = "\x2B";
const Shree_Kan_0850_COMMA          = "\x2C";
const Shree_Kan_0850_PERIOD         = "\x2E";
const Shree_Kan_0850_SLASH          = "\x2F";
const Shree_Kan_0850_COLON          = "\x3A";
const Shree_Kan_0850_SEMICOLON      = "\x3B";
const Shree_Kan_0850_EQUALS         = "\x3D";
const Shree_Kan_0850_QUESTION       = "\x3F";

//Does not Match ASCII
const Shree_Kan_0850_LQTSINGLE      = "\x22";
const Shree_Kan_0850_RQTSINGLE      = "\x27";
const Shree_Kan_0850_misc_DANDA     = "\x3E";

const Shree_Kan_0850_HYPHEN         = "\x26";
const Shree_Kan_0850_extra_HYPHEN   = "\xC2\xAD";
const Shree_Kan_0850_MULTIPLY       = "\xC2\x8D";
const Shree_Kan_0850_DIVIDE         = "\xC5\xA0";
const Shree_Kan_0850_OM             = "\x23";

//Kommu
const Shree_Kan_0850_misc_TICK_1    = "\xC3\x9C";

const Shree_Kan_0850_misc_UNKNOWN_1 = "\xC5\x92";
const Shree_Kan_0850_misc_UNKNOWN_2 = "\xC5\xA1";
const Shree_Kan_0850_misc_UNKNOWN_3 = "\xC2\xB7";
const Shree_Kan_0850_misc_UNKNOWN_4 = "\x24";

}

$Shree_Kan_0850_toPadma = array ();

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_visarga]  = Padma::Padma_visarga;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_anusvara] = Padma::Padma_anusvara;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_virama]   = Padma::Padma_syllbreak;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_A]    = Padma::Padma_vowel_A;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_AA]   = Padma::Padma_vowel_AA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_I]    = Padma::Padma_vowel_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_II]   = Padma::Padma_vowel_II;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_U]    = Padma::Padma_vowel_U;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_UU]   = Padma::Padma_vowel_UU;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_R_1]  = Padma::Padma_vowel_R;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_R_2]  = Padma::Padma_vowel_R;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_R_3]  = Padma::Padma_vowel_R;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_RR_1] = Padma::Padma_vowel_RR;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_RR_2] = Padma::Padma_vowel_RR;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_E]    = Padma::Padma_vowel_E;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_EE]   = Padma::Padma_vowel_EE;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_AI]   = Padma::Padma_vowel_AI;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_O]    = Padma::Padma_vowel_O;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_OO]   = Padma::Padma_vowel_OO;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowel_AU]   = Padma::Padma_vowel_AU;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_KA]    = Padma::Padma_consnt_KA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_KHA_1] = Padma::Padma_consnt_KHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_KHA_2] = Padma::Padma_consnt_KHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_GA]    = Padma::Padma_consnt_GA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_GHA_1] = Padma::Padma_consnt_GHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_GHA_2] = Padma::Padma_consnt_GHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_NGA]   = Padma::Padma_consnt_NGA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_CA]    = Padma::Padma_consnt_CA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_CHA]   = Padma::Padma_consnt_CHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_JA_1]  = Padma::Padma_consnt_JA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_JA_2]  = Padma::Padma_consnt_JA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_JHA_1] = Padma::Padma_consnt_JHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_JHA_2] = Padma::Padma_consnt_JHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_JHA_3] = Padma::Padma_consnt_JHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_NYA]   = Padma::Padma_consnt_NYA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_TTA_1] = Padma::Padma_consnt_TTA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_TTA_2] = Padma::Padma_consnt_TTA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_TTHA]  = Padma::Padma_consnt_TTHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_DDA]   = Padma::Padma_consnt_DDA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_DDHA]  = Padma::Padma_consnt_DDHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_NNA_1] = Padma::Padma_consnt_NNA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_NNA_2] = Padma::Padma_consnt_NNA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_TA]  = Padma::Padma_consnt_TA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_THA] = Padma::Padma_consnt_THA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_DA]  = Padma::Padma_consnt_DA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_DHA] = Padma::Padma_consnt_DHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_NA]  = Padma::Padma_consnt_NA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_PA]   = Padma::Padma_consnt_PA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_PHA]  = Padma::Padma_consnt_PHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_BA_1] = Padma::Padma_consnt_BA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_BA_2] = Padma::Padma_consnt_BA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_BHA]  = Padma::Padma_consnt_BHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_MA_1] = Padma::Padma_consnt_MA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_MA_2] = Padma::Padma_consnt_MA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_YA_1] = Padma::Padma_consnt_YA;
//$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_YA_2] = Padma::Padma_consnt_YA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_YA_3] = Padma::Padma_consnt_YA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_YA_4] = Padma::Padma_consnt_YA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_RA]   = Padma::Padma_consnt_RA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_LA_1] = Padma::Padma_consnt_LA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_LA_2] = Padma::Padma_consnt_LA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_VA]   = Padma::Padma_consnt_VA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_SHA]  = Padma::Padma_consnt_SHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_SSA]  = Padma::Padma_consnt_SSA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_SA]   = Padma::Padma_consnt_SA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_HA]   = Padma::Padma_consnt_HA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_LLA]  = Padma::Padma_consnt_LLA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_RRA_1]  = Padma::Padma_consnt_RRA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_RRA_2]  = Padma::Padma_consnt_RRA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_FA_1]   = Padma::Padma_consnt_FA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_consnt_FA_2]   = Padma::Padma_consnt_FA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_conjct_KSHA]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_conjct_JNYA_1] = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_conjct_JNYA_2] = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;

//Gunintamulu
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_AA]    = Padma::Padma_vowelsn_AA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_I]     = Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_U_3]   = Padma::Padma_vowelsn_U;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_UU_3]  = Padma::Padma_vowelsn_UU;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_R_1]   = Padma::Padma_vowelsn_R;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_R_2]   = Padma::Padma_vowelsn_R;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_AU_2]  = Padma::Padma_vowelsn_AU;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_E]     = Padma::Padma_vowelsn_E;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_O_1]   = Padma::Padma_vowelsn_O;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_O_2]   = Padma::Padma_vowelsn_O;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_O_3]   = Padma::Padma_vowelsn_O;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_AU_1]  = Padma::Padma_vowelsn_AU;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_IILEN]     = Padma::Padma_vowelsn_IILEN;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_AILEN_1] = Padma::Padma_vowelsn_AILEN;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vowelsn_AILEN_2] = Padma::Padma_vowelsn_AILEN;

//Special Combinations
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_KI]   = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_KHI]  = Padma::Padma_consnt_KHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_GI]   = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_GHI]  = Padma::Padma_consnt_GHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_GHE]  = Padma::Padma_consnt_GHA  . Padma::Padma_vowelsn_E;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_CI]   = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_CHI]  = Padma::Padma_consnt_CHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_JI]   = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_I;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_TTI]  = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_TTHI] = Padma::Padma_consnt_TTHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_DDI]  = Padma::Padma_consnt_DDA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_DDHI] = Padma::Padma_consnt_DDHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_NNI]  = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_I;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_TI]   = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_THI]  = Padma::Padma_consnt_THA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_DI]   = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_DHI]  = Padma::Padma_consnt_DHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_NI]   = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_I;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_PI]   = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_PHI]  = Padma::Padma_consnt_PHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_BI]   = Padma::Padma_consnt_BA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_BHI]  = Padma::Padma_consnt_BHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_MAA]  = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_MI_1] = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_MI_2] = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_MI_3] = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_ME]   = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_E;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_MO]   = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_O;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_YAA_1]= Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_YAA_2]= Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_YI]   = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_YE_1] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_YE_2] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_YE_3] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_YO_1] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_O;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_YO_2] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_O;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_YO_3] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_O;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_RI]   = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_LI]   = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_VI]   = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_SHI]  = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_SSI]  = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_SI]   = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_HI]   = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_LLI]  = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_I;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_SHRI] = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_KSHI] = Padma::Padma_consnt_KA  . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_JNYI] = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_JHI]  = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_I;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_JHE]  = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_E;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_combo_JHAA] = Padma::Padma_consnt_JHA . Padma::Padma_vowelsn_AA;
//Vattulu
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_KA]   = Padma::Padma_vattu_KA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_KRA]  = Padma::Padma_vattu_KA . Padma::Padma_vowelsn_R;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_KRU]  = Padma::Padma_vattu_KA . Padma::Padma_vowelsn_R;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_KHA]  = Padma::Padma_vattu_KHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_GA]   = Padma::Padma_vattu_GA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_GHA]  = Padma::Padma_vattu_GHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_NGA]  = Padma::Padma_vattu_NGA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_CA]   = Padma::Padma_vattu_CA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_CHA]  = Padma::Padma_vattu_CHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_JA]   = Padma::Padma_vattu_JA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_JHA]  = Padma::Padma_vattu_JHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_NYA]  = Padma::Padma_vattu_NYA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_TTA]  = Padma::Padma_vattu_TTA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_TTHA] = Padma::Padma_vattu_TTHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_DDA]  = Padma::Padma_vattu_DDA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_DDHA] = Padma::Padma_vattu_DDHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_NNA]  = Padma::Padma_vattu_NNA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_TA]   = Padma::Padma_vattu_TA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_TU]   = Padma::Padma_vattu_TA . Padma::Padma_vowelsn_U;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_TAI]  = Padma::Padma_vattu_TA . Padma::Padma_vowelsn_AI;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_THA]  = Padma::Padma_vattu_THA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_DA]   = Padma::Padma_vattu_DA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_DHA]  = Padma::Padma_vattu_DHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_NA]   = Padma::Padma_vattu_NA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_PA]   = Padma::Padma_vattu_PA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_PHA]  = Padma::Padma_vattu_PHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_BA]   = Padma::Padma_vattu_BA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_BHA]  = Padma::Padma_vattu_BHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_MA]   = Padma::Padma_vattu_MA;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_YA_1] = Padma::Padma_vattu_YA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_YA_2] = Padma::Padma_vattu_YA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_RA_1] = Padma::Padma_vattu_RA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_RA_2] = Padma::Padma_vattu_RA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_RA_3] = Padma::Padma_vattu_RA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_RA_4] = Padma::Padma_vattu_RA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_RA_R] = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_R;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_LA]   = Padma::Padma_vattu_LA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_VA]   = Padma::Padma_vattu_VA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_SHA]  = Padma::Padma_vattu_SHA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_SSA]  = Padma::Padma_vattu_SSA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_SA]   = Padma::Padma_vattu_SA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_HA]   = Padma::Padma_vattu_HA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_LLA]  = Padma::Padma_vattu_LLA;

//conjucts
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_JAI]  = Padma::Padma_vattu_JA . Padma::Padma_vowelsn_AI;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_TTRA] = Padma::Padma_vattu_TTA. Padma::Padma_vattu_RA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_TYA]  = Padma::Padma_vattu_TA . Padma::Padma_vattu_YA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_TRA]  = Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_PRA]  = Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_vattu_SRA]  = Padma::Padma_vattu_SA . Padma::Padma_vattu_RA;

//Half forms
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_halffm_RA]  = Padma::Padma_halffm_RA;

//Digits
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_ZERO] = Padma::Padma_digit_ZERO;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_ONE]  = Padma::Padma_digit_ONE;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_TWO]  = Padma::Padma_digit_TWO;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_THREE]= Padma::Padma_digit_THREE;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_FOUR] = Padma::Padma_digit_FOUR;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_FIVE] = Padma::Padma_digit_FIVE;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_SIX]  = Padma::Padma_digit_SIX;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_SEVEN]= Padma::Padma_digit_SEVEN;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_EIGHT]= Padma::Padma_digit_EIGHT;
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_digit_NINE] = Padma::Padma_digit_NINE;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_LQTSINGLE]  = "\xE2\x80\x98";
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_RQTSINGLE]  = "\xE2\x80\x99";
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_misc_DANDA] = Padma::Padma_danda;

$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_HYPHEN]        = "\x2D";
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_extra_HYPHEN]  = "\x2D";
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_MULTIPLY]      = "X";
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_DIVIDE]        = "/";
$Shree_Kan_0850_toPadma[Shree_Kan_0850::Shree_Kan_0850_OM]            = "\xE0\xA5\x90";

$Shree_Kan_0850_redundantList = array();
$Shree_Kan_0850_redundantList[Shree_Kan_0850::Shree_Kan_0850_misc_TICK_1]    = true;
$Shree_Kan_0850_redundantList[Shree_Kan_0850::Shree_Kan_0850_misc_UNKNOWN_1] = true;
$Shree_Kan_0850_redundantList[Shree_Kan_0850::Shree_Kan_0850_misc_UNKNOWN_2] = true;
$Shree_Kan_0850_redundantList[Shree_Kan_0850::Shree_Kan_0850_misc_UNKNOWN_3] = true;
$Shree_Kan_0850_redundantList[Shree_Kan_0850::Shree_Kan_0850_misc_UNKNOWN_4] = true;

$Shree_Kan_0850_overloadList =array ();
$Shree_Kan_0850_overloadList[Shree_Kan_0850::Shree_Kan_0850_consnt_RA] = true;
$Shree_Kan_0850_overloadList[Shree_Kan_0850::Shree_Kan_0850_consnt_VA] = true;
$Shree_Kan_0850_overloadList[Shree_Kan_0850::Shree_Kan_0850_vowelsn_E] = true;
$Shree_Kan_0850_overloadList[Shree_Kan_0850::Shree_Kan_0850_combo_RI]  = true;
$Shree_Kan_0850_overloadList[Shree_Kan_0850::Shree_Kan_0850_combo_VI]  = true;
$Shree_Kan_0850_overloadList[Shree_Kan_0850::Shree_Kan_0850_digit_ZERO]= true;

$Shree_Kan_0850_overloadList["\x4D"]                  = true;
$Shree_Kan_0850_overloadList["\xC2\xBF"]              = true;
$Shree_Kan_0850_overloadList["\xC2\xBF\xC3\xA6"]      = true;
$Shree_Kan_0850_overloadList["\xC3\x80"]              = true;
$Shree_Kan_0850_overloadList["\xC3\x81"]              = true;
$Shree_Kan_0850_overloadList["\xC3\x83\x6B"]          = true;
$Shree_Kan_0850_overloadList["\xC3\x84\x6B"]          = true;
$Shree_Kan_0850_overloadList["\xC3\x8A\xC3\xA6"]      = true;
$Shree_Kan_0850_overloadList["\xC3\x83\xC3\xA6"]      = true;
$Shree_Kan_0850_overloadList["\xC3\x83\xC3\xA6\x6B"]  = true;
$Shree_Kan_0850_overloadList["\x30\xC3\xA5"]          = true;
$Shree_Kan_0850_overloadList["\x30\xC3\xA5\xC3\xA6"]  = true;

$Shree_Kan_0850_suffixList = array ();
$Shree_Kan_0850_suffixList[Shree_Kan_0850::Shree_Kan_0850_halffm_RA]  = true;

function Shree_Kan_0850_initialize()
{
    global $fontinfo;

    $fontinfo["shree-kan-0850"]["language"] = "Kannada";
    $fontinfo["shree-kan-0850"]["class"] = "Shree_Kan_0850";
    $fontinfo["shree-kan-0850w"]["language"] = "Kannada";
    $fontinfo["shree-kan-0850w"]["class"] = "Shree_Kan_0850";
}
?>
