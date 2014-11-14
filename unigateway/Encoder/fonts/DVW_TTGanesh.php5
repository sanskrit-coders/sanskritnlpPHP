<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  Copyright 2008 Harshita Vani <harshita@atc.tcs.com> 
 *
 *  This program is free software; you can redi$stribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.

 *  This program is di$stributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * ***** END LICENSE BLOCK ***** */

//DVW-TT fonts Devanagari

//DVW-TTGanesh 
class DVW_TTGanesh
{
function DVW_TTGanesh()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "DVW-TTGanesh";
var $displayName  = "DVW_TTGanesh";
var $script       = Padma::Padma_script_DEVANAGARI;
var $hasSuffixes  = true;

function lookup ($str)
{
    global $DVW_TTGanesh_toPadma;
    return $DVW_TTGanesh_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $DVW_TTGanesh_prefixList;
    return array_key_exists($str, $DVW_TTGanesh_prefixList);
}

function isSuffixSymbol ($str)
{
    global $DVW_TTGanesh_suffixList;
    return array_key_exists($str, $DVW_TTGanesh_suffixList);
}

function isOverloaded ($str)
{
    global $DVW_TTGanesh_overloadList;
    return array_key_exists($str, $DVW_TTGanesh_overloadList);
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
    global $DVW_TTGanesh_redundantList;
    return array_key_exists($str, $DVW_TTGanesh_redundantList);
}


//Implementation details start here

//Specials
const DVW_TTGanesh_anusvara        = "\xC3\x86";
const DVW_TTGanesh_candrabindu     = "\xC3\x84"; 

//Vowels
const DVW_TTGanesh_vowel_SHT_A     = "\x2B\xC3\xA0";
const DVW_TTGanesh_vowel_A         = "\x2B";
const DVW_TTGanesh_vowel_AA        = "\x2B\xC3\x89";
const DVW_TTGanesh_vowel_I         = "\x3C";
const DVW_TTGanesh_vowel_II        = "\x3C\xC3\x87";
const DVW_TTGanesh_vowel_U         = "\x3D";
const DVW_TTGanesh_vowel_UU        = "\x3E";
const DVW_TTGanesh_vowel_R         = "\x40";
const DVW_TTGanesh_vowel_RR        = "\x41";
const DVW_TTGanesh_vowel_EE        = "\x42";
const DVW_TTGanesh_vowel_AI        = "\x42\xC3\xA4";
const DVW_TTGanesh_vowel_OO        = "\x2B\xC3\x89\xC3\xA4";
const DVW_TTGanesh_vowel_AU        = "\x2B\xC3\x89\xC3\xA8";
const DVW_TTGanesh_vowel_CDR_E     = "\x42\xC3\xAC";
const DVW_TTGanesh_vowel_CDR_O     = "\x2B\xC3\x89\xC3\xAC";
const DVW_TTGanesh_vowel_E	   = "\x42\xC3\xA0";
const DVW_TTGanesh_vowel_O	   = "\x2B\xC3\x89\xC3\xA0";

//Consonants
const DVW_TTGanesh_consnt_KA       = "\x45";
const DVW_TTGanesh_consnt_KHA      = "\x4A\xC3\x89";
const DVW_TTGanesh_consnt_KHA_2    = "\x4A\x2A";
const DVW_TTGanesh_consnt_GA       = "\x4D\xC3\x89";
const DVW_TTGanesh_consnt_GHA      = "\x50\xC3\x89";
const DVW_TTGanesh_consnt_GHA_2    = "\x50\x2A";
const DVW_TTGanesh_consnt_NGA      = "\x52";

const DVW_TTGanesh_consnt_CA       = "\x53\xC3\x89";
const DVW_TTGanesh_consnt_CHA      = "\x55";
const DVW_TTGanesh_consnt_JA       = "\x56\xC3\x89";
const DVW_TTGanesh_consnt_JHA      = "\x5A\xC3\x89";
const DVW_TTGanesh_consnt_NYA      = "\x5C\xC3\xA6";

const DVW_TTGanesh_consnt_TTA      = "\x5D";
const DVW_TTGanesh_halffm_TTA      = "\x5D\xC3\x82";
const DVW_TTGanesh_consnt_TTHA     = "\x60";
const DVW_TTGanesh_consnt_DDA      = "\x62";
const DVW_TTGanesh_halffm_DDA      = "\x62\xC3\x82";
const DVW_TTGanesh_consnt_DDHA     = "\x66";
const DVW_TTGanesh_consnt_NNA      = "\x68\xC3\x89";
const DVW_TTGanesh_consnt_NNA_2    = "\x68\x2A";

const DVW_TTGanesh_consnt_TA       = "\x69\xC3\x89";
const DVW_TTGanesh_consnt_TA_2     = "\x69\x2A";
const DVW_TTGanesh_consnt_THA      = "\x6C\xC3\x89";
const DVW_TTGanesh_consnt_THA_2    = "\x6C\x2A";
const DVW_TTGanesh_consnt_DA       = "\x6E";
const DVW_TTGanesh_halffm_DA       = "\x6E\xC3\x82";
const DVW_TTGanesh_consnt_DHA      = "\x76\xC3\x89";
const DVW_TTGanesh_consnt_DHA_2    = "\x76\x2A";
const DVW_TTGanesh_consnt_NA       = "\x78\xC3\x89";

const DVW_TTGanesh_consnt_PA       = "\x7B\xC3\x89";
const DVW_TTGanesh_consnt_PHA      = "\xC2\xA1";
const DVW_TTGanesh_consnt_BA       = "\xC2\xA4\xC3\x89";
const DVW_TTGanesh_consnt_BHA      = "\xC2\xA6\xC3\x89";
const DVW_TTGanesh_consnt_BHA_2    = "\xC2\xA6\x2A";
const DVW_TTGanesh_consnt_MA       = "\xC2\xA8\xC3\x89";

const DVW_TTGanesh_consnt_YA       = "\xC2\xAA\xC3\x89";
const DVW_TTGanesh_consnt_RA       = "\xC2\xAE";
const DVW_TTGanesh_consnt_LA_1     = "\xC2\xB1\xC3\x89";
const DVW_TTGanesh_consnt_LA_2     = "\xE2\x80\xBA";
const DVW_TTGanesh_consnt_VA       = "\xC2\xB4\xC3\x89";
const DVW_TTGanesh_consnt_SHA_1    = "\xE2\x80\x9E\xC3\x89";
const DVW_TTGanesh_consnt_SHA_2    = "\xE2\x80\x9A\xC3\x89";
const DVW_TTGanesh_consnt_SHA_3    = "\xE2\x80\x9E\x2A";
const DVW_TTGanesh_consnt_SSA      = "\xC2\xB9\xC3\x89";
const DVW_TTGanesh_consnt_SSA_2    = "\xC2\xB9\x2A";
const DVW_TTGanesh_consnt_SA       = "\xC2\xBA\xC3\x89";
const DVW_TTGanesh_consnt_HA       = "\xC2\xBD";
const DVW_TTGanesh_consnt_LLA      = "\xC2\xB3";
const DVW_TTGanesh_consnt_KSHA     = "\x49\xC3\x89";
const DVW_TTGanesh_consnt_KSHA_2   = "\x49\x2A";
const DVW_TTGanesh_consnt_THRA     = "\x6A\xC3\x89";
const DVW_TTGanesh_consnt_JHNA     = "\x59\xC3\x89";

//Gunintamulu
const DVW_TTGanesh_vowelsn_AA      = "\xC3\x89";
const DVW_TTGanesh_vowelsn_I_1     = "\xC3\x8E";
const DVW_TTGanesh_vowelsn_I_2     = "\xE2\x80\xA1";
const DVW_TTGanesh_vowelsn_II      = "\xC3\x92";
const DVW_TTGanesh_vowelsn_U_1     = "\xC3\x96";
const DVW_TTGanesh_vowelsn_U_2     = "\xC3\x99";
const DVW_TTGanesh_vowelsn_UU_1    = "\xC3\x9A";
const DVW_TTGanesh_vowelsn_UU_2    = "\xC3\x9D";
const DVW_TTGanesh_vowelsn_R       = "\xC3\x9E";
const DVW_TTGanesh_vowelsn_RR      = "\xC3\x9F";
const DVW_TTGanesh_vowelsn_E       = "\xC3\xA0";
const DVW_TTGanesh_vowelsn_EE      = "\xC3\xA4";
const DVW_TTGanesh_vowelsn_AI      = "\xC3\xA8";
const DVW_TTGanesh_vowelsn_CDR_E   = "\xC3\xAC";
const DVW_TTGanesh_vowelsn_CDR_O   = "\xC3\x89\xC3\xAC";
const DVW_TTGanesh_vowelsn_O       = "\xC3\x89\xC3\xA0";
const DVW_TTGanesh_vowelsn_OO      = "\xC3\x89\xC3\xA4";
const DVW_TTGanesh_vowelsn_AU      = "\xC3\x89\xC3\xA8";

//Matra . anusvara
const DVW_TTGanesh_vowelsn_IM_1    = "\xC3\x8B";
const DVW_TTGanesh_vowelsn_IM_2    = "\xC3\x8F";
const DVW_TTGanesh_vowelsn_IIM     = "\xC3\x93";
const DVW_TTGanesh_vowelsn_UM      = "\xC3\x97";
const DVW_TTGanesh_vowelsn_UUM     = "\xC3\x9B";
const DVW_TTGanesh_vowelsn_EM      = "\xC3\xA1";
const DVW_TTGanesh_vowelsn_EEM     = "\xC3\xA5";
const DVW_TTGanesh_vowelsn_AIM     = "\xC3\xA9";
const DVW_TTGanesh_vowelsn_CDR_EM  = "\xC3\xAD";

//Additional consonants
const DVW_TTGanesh_consnt_QA       = "\x46";
const DVW_TTGanesh_consnt_KHHA     = "\x4B\xC3\x89";
const DVW_TTGanesh_consnt_GHHA     = "\x4E\xC3\x89";
const DVW_TTGanesh_consnt_ZA       = "\x57\xC3\x89";
const DVW_TTGanesh_consnt_DDDHA    = "\x63";
const DVW_TTGanesh_consnt_RHA      = "\x67";
const DVW_TTGanesh_consnt_FA       = "\xC2\xA2";

//Half Forms
const DVW_TTGanesh_halffm_KA       = "\x43";
const DVW_TTGanesh_halffm_QA       = "\x44";
const DVW_TTGanesh_halffm_KHA      = "\x4A";
const DVW_TTGanesh_halffm_KHHA     = "\x4B";
const DVW_TTGanesh_halffm_GA       = "\x4D";
const DVW_TTGanesh_halffm_GHHA     = "\x4E";
const DVW_TTGanesh_halffm_GHA      = "\x50";
const DVW_TTGanesh_halffm_CA       = "\x53";
const DVW_TTGanesh_halffm_JA       = "\x56";
const DVW_TTGanesh_halffm_ZA       = "\x57";
const DVW_TTGanesh_halffm_JHA      = "\x5A";
const DVW_TTGanesh_halffm_NYA      = "\x5C";
const DVW_TTGanesh_halffm_NNA      = "\x68";
const DVW_TTGanesh_halffm_TA       = "\x69";
const DVW_TTGanesh_halffm_THA      = "\x6C";
const DVW_TTGanesh_halffm_DHA      = "\x76";
const DVW_TTGanesh_halffm_NA       = "\x78";
const DVW_TTGanesh_halffm_PA       = "\x7B";
const DVW_TTGanesh_halffm_PHA      = "\x7D";
const DVW_TTGanesh_halffm_FA       = "\x7E";
const DVW_TTGanesh_halffm_BA       = "\xC2\xA4";
const DVW_TTGanesh_halffm_BHA      = "\xC2\xA6";
const DVW_TTGanesh_halffm_MA       = "\xC2\xA8";
const DVW_TTGanesh_halffm_YA       = "\xC2\xAA";
const DVW_TTGanesh_halffm_RA       = "\xC3\x87";
const DVW_TTGanesh_halffm_LA       = "\xC2\xB1";
const DVW_TTGanesh_halffm_VA       = "\xC2\xB4";
const DVW_TTGanesh_halffm_SHA_1    = "\xE2\x80\x9E";
const DVW_TTGanesh_halffm_SHA_2    = "\xE2\x80\x9A";
const DVW_TTGanesh_halffm_SSA      = "\xC2\xB9";
const DVW_TTGanesh_halffm_SA       = "\xC2\xBA";
const DVW_TTGanesh_halffm_HA       = "\xC2\xBC";
const DVW_TTGanesh_halffm_LLA      = "\xC2\xB2";
const DVW_TTGanesh_halffm_KSHA     = "\x49";
const DVW_TTGanesh_halffm_THRA     = "\x6A";
const DVW_TTGanesh_halffm_JHNA     = "\x59";

//Conjuncts
const DVW_TTGanesh_conjct_IIM      = "\x3C\xC3\x88";
const DVW_TTGanesh_conjct_KRA      = "\x47";
const DVW_TTGanesh_conjct_KTA      = "\x48";
const DVW_TTGanesh_conjct_KHRA     = "\x4C";
const DVW_TTGanesh_halffm_GRA      = "\x4F";
const DVW_TTGanesh_conjct_GRA      = "\x4F\xC3\x89";
const DVW_TTGanesh_conjct_GHRA     = "\x51";
const DVW_TTGanesh_conjct_CRA      = "\x54";
const DVW_TTGanesh_halffm_JRA      = "\x58";
const DVW_TTGanesh_conjct_JRA      = "\x58\xC3\x89";
const DVW_TTGanesh_conjct_JHRA     = "\x5B";
const DVW_TTGanesh_conjct_TTATTA   = "\x5E";
const DVW_TTGanesh_conjct_TTATTHA  = "\x5F";
const DVW_TTGanesh_conjct_TTHATTHA = "\x61";
const DVW_TTGanesh_conjct_DDADDA   = "\x64";
const DVW_TTGanesh_conjct_DDADDHA  = "\x65";
const DVW_TTGanesh_conjct_TATA     = "\x6B\xC3\x89";
const DVW_TTGanesh_halffm_TATA     = "\x6B";
const DVW_TTGanesh_conjct_THAR     = "\x6D";
const DVW_TTGanesh_conjct_DRU      = "\x6F";
const DVW_TTGanesh_conjct_DRA      = "\x70";
const DVW_TTGanesh_conjct_DADA     = "\x71";
const DVW_TTGanesh_conjct_DADHA    = "\x72";
const DVW_TTGanesh_conjct_DHMA     = "\x73";
const DVW_TTGanesh_conjct_DHYA     = "\x74";
const DVW_TTGanesh_conjct_DVA      = "\x75";
const DVW_TTGanesh_conjct_DHRA     = "\x77";
const DVW_TTGanesh_halffm_NRA      = "\x79";
const DVW_TTGanesh_conjct_NRA      = "\x79\xC3\x89";
const DVW_TTGanesh_halffm_NN       = "\x7A";
const DVW_TTGanesh_conjct_NN       = "\x7A\xC3\x89";
const DVW_TTGanesh_halffm_PR       = "\x7C";
const DVW_TTGanesh_conjct_PRA      = "\x7C\xC3\x89";
const DVW_TTGanesh_conjct_PHRA     = "\xC2\xA3";
const DVW_TTGanesh_halffm_BRA      = "\xC2\xA5";
const DVW_TTGanesh_conjct_BRA      = "\xC2\xA5\xC3\x89";
const DVW_TTGanesh_halffm_BHRA     = "\xC2\xA7";
const DVW_TTGanesh_conjct_BHRA     = "\xC2\xA7\xC3\x89";
const DVW_TTGanesh_conjct_MRA      = "\xC6\x92\xC3\x89";
const DVW_TTGanesh_halffm_MRA      = "\xC6\x92";
const DVW_TTGanesh_conjct_YRA      = "\xC2\xAB";
const DVW_TTGanesh_conjct_RU       = "\xC2\xAF";
const DVW_TTGanesh_conjct_RUU      = "\xC2\xB0";
const DVW_TTGanesh_conjct_LLA      = "\xC5\x93";
const DVW_TTGanesh_conjct_VRA      = "\xC2\xB5";
const DVW_TTGanesh_halffm_SHVA     = "\xE2\x80\xA6";
const DVW_TTGanesh_conjct_SHVA     = "\xE2\x80\xA6\xC3\x89";
const DVW_TTGanesh_halffm_SHRA     = "\xC2\xB8";
const DVW_TTGanesh_conjct_SHRA     = "\xC2\xB8\xC3\x89";
const DVW_TTGanesh_halffm_SRA      = "\xC2\xBB";
const DVW_TTGanesh_conjct_SRA      = "\xC2\xBB\xC3\x89";
const DVW_TTGanesh_conjct_HRU      = "\xC2\xBE";
const DVW_TTGanesh_conjct_HRA      = "\xC2\xBF";
const DVW_TTGanesh_conjct_HMA      = "\xC3\x80";
const DVW_TTGanesh_conjct_HYA      = "\xC3\x81";
const DVW_TTGanesh_conjct_UR       = "\xC3\x98";
const DVW_TTGanesh_conjct_UUR      = "\xC3\x9C";

//rakar
const DVW_TTGanesh_vattu_RA        = "\xC3\x85";
const DVW_TTGanesh_vattu_YA        = "\xC2\xAC";

//Half RA's
const DVW_TTGanesh_halffm_RI_1     = "\xC3\x8C";
const DVW_TTGanesh_halffm_RI_2     = "\xC3\x90";
const DVW_TTGanesh_halffm_RIM_1    = "\xC3\x8D";
const DVW_TTGanesh_halffm_RIM_2    = "\xC3\x91";
const DVW_TTGanesh_halffm_RII      = "\xC3\x94";
const DVW_TTGanesh_halffm_RIIM     = "\xC3\x95";
const DVW_TTGanesh_halffm_REE      = "\xC3\xA6";
const DVW_TTGanesh_halffm_RA_ANU   = "\xC3\x88";
const DVW_TTGanesh_halffm_REEM     = "\xC3\xA7";
const DVW_TTGanesh_halffm_RAI      = "\xC3\xAA";
const DVW_TTGanesh_halffm_RAIM     = "\xC3\xAB";
const DVW_TTGanesh_halffm_RE       = "\xC3\xA2";
const DVW_TTGanesh_halffm_REM      = "\xC3\xA3";
const DVW_TTGanesh_halffm_CDR_RE   = "\xC3\xAE";
const DVW_TTGanesh_halffm_CDR_REM  = "\xC3\xAF";


const DVW_TTGanesh_om              = "\x24";
const DVW_TTGanesh_avagraha        = "\x25";
const DVW_TTGanesh_halffm_RRA      = "\xE2\x80\xA0";
const DVW_TTGanesh_virama          = "\xC3\x82";
const DVW_TTGanesh_nukta           = "\xC3\x83";
const DVW_TTGanesh_danda           = "\x2A";

//Devanagari Digits
const DVW_TTGanesh_digit_ZERO      = "\x30";
const DVW_TTGanesh_digit_ONE       = "\x31";
const DVW_TTGanesh_digit_TWO       = "\x32";
const DVW_TTGanesh_digit_THREE     = "\x33";
const DVW_TTGanesh_digit_FOUR      = "\x34";
const DVW_TTGanesh_digit_FIVE      = "\x35";
const DVW_TTGanesh_digit_SIX       = "\x36";
const DVW_TTGanesh_digit_SEVEN     = "\x37";
const DVW_TTGanesh_digit_EIGHT     = "\x38";
const DVW_TTGanesh_digit_NINE      = "\x39";

//Matches ASCII
const DVW_TTGanesh_EXCLAM          = "\x21";
const DVW_TTGanesh_QUOTE           = "\x22";
const DVW_TTGanesh_APOSTROPHE      = "\x27";
const DVW_TTGanesh_PARENLEFT       = "\x28";
const DVW_TTGanesh_PARENRIGHT      = "\x29";
const DVW_TTGanesh_COMMA	   = "\x2C";
const DVW_TTGanesh_HYPHEN          = "\x2D";
const DVW_TTGanesh_PERIOD          = "\x2E";
const DVW_TTGanesh_SLASH           = "\x2F";
const DVW_TTGanesh_COLON           = "\x3A";
const DVW_TTGanesh_SEMICOLON       = "\x3B";
const DVW_TTGanesh_QUESTION        = "\x3F";


const DVW_TTGanesh_misc_UNKNOWN_1  = "\x23";
const DVW_TTGanesh_misc_UNKNOWN_2  = "\x26";
const DVW_TTGanesh_misc_UNKNOWN_3  = "\xC2\xA0";
const DVW_TTGanesh_space_1	   = "\xC3\xB0";
const DVW_TTGanesh_space_2	   = "\xC3\xB1";
const DVW_TTGanesh_space_3	   = "\xC3\xB2";
const DVW_TTGanesh_space_4	   = "\xC3\xB3";
const DVW_TTGanesh_space_5	   = "\xC3\xB4";
const DVW_TTGanesh_space_6	   = "\xC3\xB5";
const DVW_TTGanesh_space_7	   = "\xC3\xB6";
const DVW_TTGanesh_space_8	   = "\xC3\xB7";
const DVW_TTGanesh_space_9	   = "\xC3\xB8";
const DVW_TTGanesh_space_10	   = "\xC3\xB9";
const DVW_TTGanesh_space_11	   = "\xC3\xBA";
const DVW_TTGanesh_space_12	   = "\xC3\xBB";
const DVW_TTGanesh_space_13	   = "\xC3\xBC";
const DVW_TTGanesh_space_14	   = "\xC3\xBD";
const DVW_TTGanesh_space_15	   = "\xC3\xBE";
}


$DVW_TTGanesh_toPadma = Array();

$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_anusvara]      = Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_candrabindu]   = Padma::Padma_candrabindu;

$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_SHT_A]   = Padma::Padma_vowel_SHT_A;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_A]       = Padma::Padma_vowel_A;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_AA]      = Padma::Padma_vowel_AA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_I]       = Padma::Padma_vowel_I;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_II]      = Padma::Padma_vowel_II;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_U]       = Padma::Padma_vowel_U;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_UU]      = Padma::Padma_vowel_UU;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_R]       = Padma::Padma_vowel_R;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_RR]      = Padma::Padma_vowel_RR;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_EE]      = Padma::Padma_vowel_EE;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_AI]      = Padma::Padma_vowel_AI;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_OO]      = Padma::Padma_vowel_OO;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_AU]      = Padma::Padma_vowel_AU;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_CDR_E]   = Padma::Padma_vowel_CDR_E;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_CDR_O]   = Padma::Padma_vowel_CDR_O;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_E]       = Padma::Padma_vowel_E;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowel_O]       = Padma::Padma_vowel_O;

//consonants
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_KA]     = Padma::Padma_consnt_KA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_KHA]    = Padma::Padma_consnt_KHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_KHA_2]  = Padma::Padma_consnt_KHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_GA]     = Padma::Padma_consnt_GA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_GHA]    = Padma::Padma_consnt_GHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_GHA_2]  = Padma::Padma_consnt_GHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_NGA]    = Padma::Padma_consnt_NGA;

$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_CA]     = Padma::Padma_consnt_CA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_CHA]    = Padma::Padma_consnt_CHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_JA]     = Padma::Padma_consnt_JA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_JHA]    = Padma::Padma_consnt_JHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_NYA]    = Padma::Padma_consnt_NYA;

$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_TTA]    = Padma::Padma_consnt_TTA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_TTA]    = Padma::Padma_halffm_TTA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_TTHA]   = Padma::Padma_consnt_TTHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_DDA]    = Padma::Padma_consnt_DDA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_DDA]    = Padma::Padma_halffm_DDA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_DDHA]   = Padma::Padma_consnt_DDHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_NNA]    = Padma::Padma_consnt_NNA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_NNA_2]  = Padma::Padma_consnt_NNA;

$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_TA]     = Padma::Padma_consnt_TA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_TA_2]   = Padma::Padma_consnt_TA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_THA]    = Padma::Padma_consnt_THA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_THA_2]  = Padma::Padma_consnt_THA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_DA]     = Padma::Padma_consnt_DA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_DA]     = Padma::Padma_halffm_DA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_DHA]    = Padma::Padma_consnt_DHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_DHA_2]  = Padma::Padma_consnt_DHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_NA]     = Padma::Padma_consnt_NA;

$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_PA]     = Padma::Padma_consnt_PA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_PHA]    = Padma::Padma_consnt_PHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_BA]     = Padma::Padma_consnt_BA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_BHA]    = Padma::Padma_consnt_BHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_BHA_2]  = Padma::Padma_consnt_BHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_MA]     = Padma::Padma_consnt_MA;

$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_YA]     = Padma::Padma_consnt_YA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_RA]     = Padma::Padma_consnt_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_LA_1]   = Padma::Padma_consnt_LA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_LA_2]   = Padma::Padma_consnt_LA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_VA]     = Padma::Padma_consnt_VA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_SHA_1]  = Padma::Padma_consnt_SHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_SHA_2]  = Padma::Padma_consnt_SHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_SHA_3]  = Padma::Padma_consnt_SHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_SSA]    = Padma::Padma_consnt_SSA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_SSA_2]  = Padma::Padma_consnt_SSA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_SA]     = Padma::Padma_consnt_SA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_HA]     = Padma::Padma_consnt_HA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_LLA]    = Padma::Padma_consnt_LLA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_KSHA]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_KSHA_2] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_THRA]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_JHNA]   = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;

//Gunintamulu
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_AA]    = Padma::Padma_vowelsn_AA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_I_1]   = Padma::Padma_vowelsn_I;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_I_2]   = Padma::Padma_vowelsn_I;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_II]    = Padma::Padma_vowelsn_II;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_U_1]   = Padma::Padma_vowelsn_U;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_U_2]   = Padma::Padma_vowelsn_U;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_UU_1]  = Padma::Padma_vowelsn_UU;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_UU_2]  = Padma::Padma_vowelsn_UU;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_R]     = Padma::Padma_vowelsn_R;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_RR]    = Padma::Padma_vowelsn_RR;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_E]     = Padma::Padma_vowelsn_E;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_EE]    = Padma::Padma_vowelsn_EE;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_AI]    = Padma::Padma_vowelsn_AI;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_CDR_E] = Padma::Padma_vowelsn_CDR_E;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_CDR_O] = Padma::Padma_vowelsn_CDR_O;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_O]     = Padma::Padma_vowelsn_O;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_OO]    = Padma::Padma_vowelsn_OO;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_AU]    = Padma::Padma_vowelsn_AU;

//Additional consonants
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_QA]     = Padma::Padma_consnt_QA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_KHHA]   = Padma::Padma_consnt_KHHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_GHHA]   = Padma::Padma_consnt_GHHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_ZA]     = Padma::Padma_consnt_ZA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_DDDHA]  = Padma::Padma_consnt_DDDHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_RHA]    = Padma::Padma_consnt_RHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_consnt_FA]     = Padma::Padma_consnt_FA;

//Matra . anusvara
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_IM_1]  = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_IM_2]  = Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_IIM]   = Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_UM]    = Padma::Padma_vowelsn_U . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_UUM]   = Padma::Padma_vowelsn_UU . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_EM]    = Padma::Padma_vowelsn_E . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_EEM]   = Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_AIM]   = Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vowelsn_CDR_EM]= Padma::Padma_vowelsn_CDR_E . Padma::Padma_anusvara;

//Halffm
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_KA]     = Padma::Padma_halffm_KA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_QA]     = Padma::Padma_halffm_QA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_KHA]    = Padma::Padma_halffm_KHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_KHHA]   = Padma::Padma_halffm_KHHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_GA]     = Padma::Padma_halffm_GA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_GHHA]   = Padma::Padma_halffm_GHHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_GHA]    = Padma::Padma_halffm_GHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_CA]     = Padma::Padma_halffm_CA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_JA]     = Padma::Padma_halffm_JA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_ZA]     = Padma::Padma_halffm_ZA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_JHA]    = Padma::Padma_halffm_JHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_NYA]    = Padma::Padma_halffm_NYA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_NNA]    = Padma::Padma_halffm_NNA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_TA]     = Padma::Padma_halffm_TA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_THA]    = Padma::Padma_halffm_THA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_DHA]    = Padma::Padma_halffm_DHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_NA]     = Padma::Padma_halffm_NA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_PA]     = Padma::Padma_halffm_PA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_PHA]    = Padma::Padma_halffm_PHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_FA]     = Padma::Padma_halffm_FA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_BA]     = Padma::Padma_halffm_BA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_BHA]    = Padma::Padma_halffm_BHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_MA]     = Padma::Padma_halffm_MA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_YA]     = Padma::Padma_halffm_YA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RA]     = Padma::Padma_halffm_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_LA]     = Padma::Padma_halffm_LA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_VA]     = Padma::Padma_halffm_VA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_SHA_1]  = Padma::Padma_halffm_SHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_SHA_2]  = Padma::Padma_halffm_SHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_SSA]    = Padma::Padma_halffm_SSA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_SA]     = Padma::Padma_halffm_SA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_HA]     = Padma::Padma_halffm_HA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_LLA]    = Padma::Padma_halffm_LLA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_KSHA]   = Padma::Padma_halffm_KA  . Padma::Padma_halffm_SSA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_THRA]   = Padma::Padma_halffm_TA  . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_JHNA]   = Padma::Padma_halffm_JA  . Padma::Padma_vattu_NYA;

//Conjuncts
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_IIM]    = Padma::Padma_vowel_II  . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_KRA]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_KTA]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_KHRA]   = Padma::Padma_vattu_KHA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_GRA]    = Padma::Padma_halffm_GA . Padma::Padma_halffm_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_GRA]    = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_GHRA]   = Padma::Padma_vattu_GHA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_CRA]    = Padma::Padma_vattu_CA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_JRA]    = Padma::Padma_halffm_JA . Padma::Padma_halffm_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_JRA]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_JHRA]   = Padma::Padma_vattu_JHA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_TTATTA] = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_TTATTHA]= Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DDADDA] = Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DDADDHA]= Padma::Padma_consnt_DDA . Padma::Padma_vattu_DDHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_TATA]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_TATA]   = Padma::Padma_halffm_TA . Padma::Padma_halffm_TA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_THAR]   = Padma::Padma_vattu_THA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DRU]    = Padma::Padma_consnt_DA . Padma::Padma_vowelsn_R;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DRA]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DADA]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DADHA]  = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DHMA]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_MA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DHYA]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_YA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DVA]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_VA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_DHRA]   = Padma::Padma_vattu_DHA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_NRA]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_NRA]    = Padma::Padma_halffm_NA . Padma::Padma_halffm_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_NN]     = Padma::Padma_halffm_NA . Padma::Padma_halffm_NA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_PR]     = Padma::Padma_halffm_PA . Padma::Padma_halffm_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_PRA]    = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_PHRA]   = Padma::Padma_vattu_PHA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_BRA]    = Padma::Padma_vattu_BA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_BRA]    = Padma::Padma_consnt_BA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_BHRA]   = Padma::Padma_consnt_BHA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_BHRA]   = Padma::Padma_halffm_BHA . Padma::Padma_halffm_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_MRA]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_MRA]    = Padma::Padma_halffm_MA . Padma::Padma_halffm_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_YRA]    = Padma::Padma_vattu_YA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_RU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_RUU]    = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_LLA]    = Padma::Padma_vattu_LA . Padma::Padma_vattu_LA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_VRA]    = Padma::Padma_vattu_VA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_SHVA]   = Padma::Padma_halffm_SHA . Padma::Padma_halffm_VA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_SHVA]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_VA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_SHRA]   = Padma::Padma_halffm_SHA . Padma::Padma_halffm_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_SHRA]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_SRA]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_SRA]    = Padma::Padma_halffm_SA . Padma::Padma_halffm_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_HRU]    = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_HRA]    = Padma::Padma_vattu_HA . Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_HMA]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_HYA]    = Padma::Padma_consnt_HA . Padma::Padma_vattu_YA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_UR]     = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_conjct_UUR]    = Padma::Padma_vattu_RA . Padma::Padma_vowelsn_UU;


$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vattu_RA]      = Padma::Padma_vattu_RA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_vattu_YA]      = Padma::Padma_vattu_YA;

//half form of RA
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RI_1]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RI_2]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RIM_1]  = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RIM_2]  = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_I . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RII]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RIIM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_II . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_REE]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE; 
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RA_ANU] = Padma::Padma_halffm_RA . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_REEM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_EE . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RAI]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RAIM]   = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_AI . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RE]     = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_E;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_REM]    = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_E . Padma::Padma_anusvara;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_CDR_RE] = Padma::Padma_halffm_RA . Padma::Padma_vowelsn_CDR_E;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_CDR_REM]= Padma::Padma_halffm_RA . Padma::Padma_vowelsn_CDR_E . Padma::Padma_anusvara;


$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_om]        = Padma::Padma_om;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_avagraha]  = Padma::Padma_avagraha;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_halffm_RRA]= Padma::Padma_halffm_RRA;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_virama]    = Padma::Padma_syllbreak;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_nukta]     = Padma::Padma_nukta;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_danda]     = Padma::Padma_danda;

//Digits
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_ZERO]    = Padma::Padma_digit_ZERO;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_ONE]     = Padma::Padma_digit_ONE;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_TWO]     = Padma::Padma_digit_TWO;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_THREE]   = Padma::Padma_digit_THREE;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_FOUR]    = Padma::Padma_digit_FOUR;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_FIVE]    = Padma::Padma_digit_FIVE;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_SIX]     = Padma::Padma_digit_SIX;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$DVW_TTGanesh_toPadma[DVW_TTGanesh::DVW_TTGanesh_digit_NINE]    = Padma::Padma_digit_NINE;

$DVW_TTGanesh_prefixList = Array();
$DVW_TTGanesh_prefixList[DVW_TTGanesh::DVW_TTGanesh_vowelsn_I_1]     = true;
$DVW_TTGanesh_prefixList[DVW_TTGanesh::DVW_TTGanesh_vowelsn_I_2]     = true;
$DVW_TTGanesh_prefixList[DVW_TTGanesh::DVW_TTGanesh_vowelsn_IM_1]    = true;
$DVW_TTGanesh_prefixList[DVW_TTGanesh::DVW_TTGanesh_vowelsn_IM_2]    = true;

$DVW_TTGanesh_suffixList = Array();
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_RA]      = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_vowelsn_AA]     = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_vowelsn_II]     = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_vowelsn_IIM]    = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_RII]     = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_RIIM]    = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_REE]     = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_REEM]    = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_RAI]     = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_RAIM]    = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_RA_ANU]  = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_RE]      = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_REM]     = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_CDR_RE]  = true;
$DVW_TTGanesh_suffixList[DVW_TTGanesh::DVW_TTGanesh_halffm_CDR_REM] = true;


$DVW_TTGanesh_redundantList = Array();
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_misc_UNKNOWN_1]  = true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_misc_UNKNOWN_2]  = true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_misc_UNKNOWN_3]  = true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_1] 	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_2] 	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_3] 	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_4] 	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_5] 	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_6] 	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_7] 	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_8] 	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_9] 	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_10]	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_11]	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_12]	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_13]	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_14]	= true;
$DVW_TTGanesh_redundantList[DVW_TTGanesh::DVW_TTGanesh_space_15]	= true;

$DVW_TTGanesh_overloadList = Array();
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_vowel_A]      = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_vowel_AA]     = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_vowel_EE]     = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_vowel_I]      = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_vowelsn_AA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_KA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_QA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_KHA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_KHHA]  = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_GA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_GHA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_CA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_JA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_ZA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_JHA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_NYA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_NNA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_TA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_THA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_DHA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_NA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_PA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_PHA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_FA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_BA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_BHA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_MA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_YA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_LA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_VA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_SHA_1] = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_SHA_2] = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_SSA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_SA]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_LLA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_KSHA]  = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_THRA]  = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_JHNA]  = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_NN]    = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_THRA]  = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_JHNA]  = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_KHRA]  = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_GRA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_GHRA]  = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_CRA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_JRA]   = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_JHRA]  = true;
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_TATA]  = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_THAR]  = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_DHRA]  = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_NRA]   = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_PR]    = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_PHRA]  = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_BRA]   = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_BRA]   = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_BHRA]  = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_MRA]   = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_YRA]   = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_conjct_VRA]   = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_SHVA]  = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_SRA]   = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_halffm_SHRA]  = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_consnt_TTA]   = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_consnt_DDA]   = true; 
$DVW_TTGanesh_overloadList[DVW_TTGanesh::DVW_TTGanesh_consnt_DA]    = true; 

function DVW_TTGanesh_initialize()
{
    global $fontinfo;

    $fontinfo["dvw-ttganesh"]["language"] = "Devanagari";
    $fontinfo["dvw-ttganesh"]["class"] = "DVW_TTGanesh";
    $fontinfo["dvw-ttsurekh"]["language"] = "Devanagari";
    $fontinfo["dvw-ttsurekh"]["class"] = "DVW_TTGanesh";
    $fontinfo["dvw-ttyogesh"]["language"] = "Devanagari";
    $fontinfo["dvw-ttyogesh"]["class"] = "DVW_TTGanesh";
    $fontinfo["dvw-ttganeshen"]["language"] = "Devanagari";
    $fontinfo["dvw-ttganeshen"]["class"] = "DVW_TTGanesh";
    $fontinfo["dvw-ttsurekhen"]["language"] = "Devanagari";
    $fontinfo["dvw-ttsurekhen"]["class"] = "DVW_TTGanesh";
    $fontinfo["dvw-ttyogeshen"]["language"] = "Devanagari";
    $fontinfo["dvw-ttyogeshen"]["class"] = "DVW_TTGanesh";
}
?>
