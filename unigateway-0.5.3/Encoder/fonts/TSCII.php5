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

//TSCII
class TSCII
{
function TSCII() 
{
}

//There is no font with the name 'TSCI', but the scheme is just that - an encoding
var $maxLookupLen = 1;
var $fontFace     = "TSCII";
var $displayName  = "TSCII";
var $script       = Padma::Padma_script_TAMIL;

function lookup($str) 
{
    global $TSCII_toPadma;
    return $TSCII_toPadma[$str];
}

function isPrefixSymbol($str)
{
    global $TSCII_prefixList;
    return $TSCII_prefixList[$str] != null;
}

function isOverloaded($str)
{
    return false;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 ==  Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_O;
    if ($sign2 == Padma::Padma_vowelsn_EE && $sign1 ==  Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 ==  Padma::Padma_vowelsn_AULEN)
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;    
}

function preprocessMessage($input)
{
    return $input;
}

//Vowel modifiers
const TSCII_visarga        = "\xC2\xB7";  //aytham

//Vowels
const TSCII_vowel_A        = "\xC2\xAB";
const TSCII_vowel_AA       = "\xC2\xAC";
const TSCII_vowel_I_1      = "\xC2\xAD";
const TSCII_vowel_I_2      = "\xC3\xBE";
const TSCII_vowel_II       = "\xC2\xAE";
const TSCII_vowel_U        = "\xC2\xAF";
const TSCII_vowel_UU       = "\xC2\xB0";
const TSCII_vowel_E        = "\xC2\xB1";
const TSCII_vowel_EE       = "\xC2\xB2";
const TSCII_vowel_AI       = "\xC2\xB3";
const TSCII_vowel_O        = "\xC2\xB4";
const TSCII_vowel_OO       = "\xC2\xB5";
const TSCII_vowel_AU       = "\xC2\xB6";

//Consonants
const TSCII_consnt_KA      = "\xC2\xB8";
const TSCII_consnt_NGA     = "\xC2\xB9";

const TSCII_consnt_CA      = "\xC2\xBA";
const TSCII_consnt_JA      = "\xC6\x92";
const TSCII_consnt_NYA     = "\xC2\xBB";

const TSCII_consnt_TTA     = "\xC2\xBC";
const TSCII_consnt_NNA     = "\xC2\xBD";

const TSCII_consnt_TA      = "\xC2\xBE";
const TSCII_consnt_NA      = "\xC2\xBF";
const TSCII_consnt_NNNA    = "\xC3\x89";

const TSCII_consnt_PA      = "\xC3\x80";
const TSCII_consnt_MA      = "\xC3\x81";

const TSCII_consnt_YA      = "\xC3\x82";
const TSCII_consnt_RA      = "\xC3\x83";
const TSCII_consnt_LA      = "\xC3\x84";
const TSCII_consnt_VA      = "\xC3\x85";
const TSCII_consnt_ZHA     = "\xC3\x86";
const TSCII_consnt_LLA     = "\xC3\x87";
const TSCII_consnt_RRA     = "\xC3\x88";

const TSCII_consnt_SSA     = "\xE2\x80\x9E";
const TSCII_consnt_SA      = "\xE2\x80\xA6";
const TSCII_consnt_HA      = "\xE2\x80\xA0";

const TSCII_conjct_KSH     = "\xE2\x80\xA1";
const TSCII_conjct_SRII    = "\xE2\x80\x9A";

//Gunintamulu
const TSCII_vowelsn_AA     = "\xC2\xA1";
const TSCII_vowelsn_I      = "\xC2\xA2";
const TSCII_vowelsn_II     = "\xC2\xA3";
const TSCII_vowelsn_U      = "\xC2\xA4";
const TSCII_vowelsn_UU     = "\xC2\xA5";
const TSCII_vowelsn_E      = "\xC2\xA6";
const TSCII_vowelsn_EE     = "\xC2\xA7";
const TSCII_vowelsn_AI     = "\xC2\xA8";
const TSCII_vowelsn_AULEN  = "\xC2\xAA";

//Special Combinations
const TSCII_combo_KPULLI   = "\xC3\xAC";
const TSCII_combo_NGPULLI  = "\xC3\xAD";
const TSCII_combo_CPULLI   = "\xC3\xAE";
const TSCII_combo_JPULLI   = "\xCB\x86";
const TSCII_combo_NYPULLI  = "\xC3\xAF";
const TSCII_combo_TTPULLI  = "\xC3\xB0";
const TSCII_combo_NNPULLI  = "\xC3\xB1";
const TSCII_combo_TPULLI   = "\xC3\xB2";
const TSCII_combo_NPULLI   = "\xC3\xB3";
const TSCII_combo_NNNPULLI = "\xC3\xBD";
const TSCII_combo_PPULLI   = "\xC3\xB4";
const TSCII_combo_MPULLI   = "\xC3\xB5";
const TSCII_combo_YPULLI   = "\xC3\xB6";
const TSCII_combo_RPULLI   = "\xC3\xB7";
const TSCII_combo_LPULLI   = "\xC3\xB8";
const TSCII_combo_VPULLI   = "\xC3\xB9";
const TSCII_combo_ZHPULLI  = "\xC3\xBA";
const TSCII_combo_LLPULLI  = "\xC3\xBB";
const TSCII_combo_SSPULLI  = "\xE2\x80\xB0";
const TSCII_combo_SPULLI   = "\xC5\xA0";
const TSCII_combo_HPULLI   = "\xE2\x80\xB9";
const TSCII_combo_RRPULLI  = "\xC3\xBC";
const TSCII_combo_KSHPULLI = "\xC5\x92";

const TSCII_combo_TTI     = "\xC3\x8A";
const TSCII_combo_TTII    = "\xC3\x8B";

const TSCII_combo_KU      = "\xC3\x8C";
const TSCII_combo_KUU     = "\xC3\x9C";
const TSCII_combo_NGU     = "\xE2\x84\xA2";
const TSCII_combo_NGUU    = "\xE2\x80\xBA";
const TSCII_combo_CU      = "\xC3\x8D";
const TSCII_combo_CUU     = "\xC3\x9D";
const TSCII_combo_NYU     = "\xC5\xA1";
const TSCII_combo_NYUU    = "\xC5\x93";
const TSCII_combo_TTU     = "\xC3\x8E";
const TSCII_combo_TTUU    = "\xC3\x9E";
const TSCII_combo_NNU     = "\xC3\x8F";
const TSCII_combo_NNUU    = "\xC3\x9F";
const TSCII_combo_TU      = "\xC3\x90";
const TSCII_combo_TUU     = "\xC3\xA0";
const TSCII_combo_NU      = "\xC3\x91";
const TSCII_combo_NUU     = "\xC3\xA1";
const TSCII_combo_NNNU    = "\xC3\x9B";
const TSCII_combo_NNNUU   = "\xC3\xAB";
const TSCII_combo_PU      = "\xC3\x92";
const TSCII_combo_PUU     = "\xC3\xA2";
const TSCII_combo_MU      = "\xC3\x93";
const TSCII_combo_MUU     = "\xC3\xA3";
const TSCII_combo_YU      = "\xC3\x94";
const TSCII_combo_YUU     = "\xC3\xA4";
const TSCII_combo_RU      = "\xC3\x95";
const TSCII_combo_RUU     = "\xC3\xA5";
const TSCII_combo_LU      = "\xC3\x96";
const TSCII_combo_LUU     = "\xC3\xA6";
const TSCII_combo_VU      = "\xC3\x97";
const TSCII_combo_VUU     = "\xC3\xA7";
const TSCII_combo_ZHU     = "\xC3\x98";
const TSCII_combo_ZHUU    = "\xC3\xA8";
const TSCII_combo_LLU     = "\xC3\x99";
const TSCII_combo_LLUU    = "\xC3\xA9";
const TSCII_combo_RRU     = "\xC3\x9A";
const TSCII_combo_RRUU    = "\xC3\xAA";

//Digits
const TSCII_digit_ZERO     = "\xE2\x82\xAC";
const TSCII_digit_ONE      = "\xC2\x81";
const TSCII_digit_TWO      = "\xC2\x8D";
const TSCII_digit_THREE    = "\xC5\xBD";
const TSCII_digit_FOUR     = "\xC2\x8F";
const TSCII_digit_FIVE     = "\xC2\x90";
const TSCII_digit_SIX      = "\xE2\x80\xA2";
const TSCII_digit_SEVEN    = "\xE2\x80\x93";
const TSCII_digit_EIGHT    = "\xE2\x80\x94";
const TSCII_digit_NINE     = "\xCB\x9C";
const TSCII_digit_TEN      = "\xC2\x9D";
const TSCII_digit_HUNDRED  = "\xC5\xBE";
const TSCII_digit_THOUSAND = "\xC5\xB8";

const TSCII_LQTSINGLE      = "\xE2\x80\x98";
const TSCII_RQTSINGLE      = "\xE2\x80\x99";
const TSCII_LQTDOUBLE      = "\xE2\x80\x9C";
const TSCII_RQTDOUBLE      = "\xE2\x80\x9D";
const TSCII_COPYRIGGHT     = "\xC2\xA9";

}//end of class

$TSCII_toPadma = array();

$TSCII_toPadma[TSCII::TSCII_visarga]   = Padma::Padma_visarga;
$TSCII_toPadma[TSCII::TSCII_vowel_A]   = Padma::Padma_vowel_A;
$TSCII_toPadma[TSCII::TSCII_vowel_AA]  = Padma::Padma_vowel_AA;
$TSCII_toPadma[TSCII::TSCII_vowel_I_1] = Padma::Padma_vowel_I;
$TSCII_toPadma[TSCII::TSCII_vowel_I_2] = Padma::Padma_vowel_I;
$TSCII_toPadma[TSCII::TSCII_vowel_II]  = Padma::Padma_vowel_II;
$TSCII_toPadma[TSCII::TSCII_vowel_U]   = Padma::Padma_vowel_U;
$TSCII_toPadma[TSCII::TSCII_vowel_UU]  = Padma::Padma_vowel_UU;
$TSCII_toPadma[TSCII::TSCII_vowel_E]   = Padma::Padma_vowel_E;
$TSCII_toPadma[TSCII::TSCII_vowel_EE]  = Padma::Padma_vowel_EE;
$TSCII_toPadma[TSCII::TSCII_vowel_AI]  = Padma::Padma_vowel_AI;
$TSCII_toPadma[TSCII::TSCII_vowel_O]   = Padma::Padma_vowel_O;
$TSCII_toPadma[TSCII::TSCII_vowel_OO]  = Padma::Padma_vowel_OO;
$TSCII_toPadma[TSCII::TSCII_vowel_AU]  = Padma::Padma_vowel_AU;

$TSCII_toPadma[TSCII::TSCII_consnt_KA]  = Padma::Padma_consnt_KA;
$TSCII_toPadma[TSCII::TSCII_consnt_NGA] = Padma::Padma_consnt_NGA;
$TSCII_toPadma[TSCII::TSCII_consnt_CA]  = Padma::Padma_consnt_CA;
$TSCII_toPadma[TSCII::TSCII_consnt_JA]  = Padma::Padma_consnt_JA;
$TSCII_toPadma[TSCII::TSCII_consnt_NYA] = Padma::Padma_consnt_NYA;
$TSCII_toPadma[TSCII::TSCII_consnt_TTA] = Padma::Padma_consnt_TTA;
$TSCII_toPadma[TSCII::TSCII_consnt_NNA] = Padma::Padma_consnt_NNA;
$TSCII_toPadma[TSCII::TSCII_consnt_TA]  = Padma::Padma_consnt_TA;
$TSCII_toPadma[TSCII::TSCII_consnt_NA]  = Padma::Padma_consnt_NA;
$TSCII_toPadma[TSCII::TSCII_consnt_NNNA] = Padma::Padma_consnt_NNNA;
$TSCII_toPadma[TSCII::TSCII_consnt_PA]  = Padma::Padma_consnt_PA;
$TSCII_toPadma[TSCII::TSCII_consnt_MA]  = Padma::Padma_consnt_MA;
$TSCII_toPadma[TSCII::TSCII_consnt_YA]  = Padma::Padma_consnt_YA;
$TSCII_toPadma[TSCII::TSCII_consnt_RA]  = Padma::Padma_consnt_RA;
$TSCII_toPadma[TSCII::TSCII_consnt_LA]  = Padma::Padma_consnt_LA;
$TSCII_toPadma[TSCII::TSCII_consnt_VA]  = Padma::Padma_consnt_VA;
$TSCII_toPadma[TSCII::TSCII_consnt_SSA] = Padma::Padma_consnt_SSA;
$TSCII_toPadma[TSCII::TSCII_consnt_SA]  = Padma::Padma_consnt_SA;
$TSCII_toPadma[TSCII::TSCII_consnt_HA]  = Padma::Padma_consnt_HA;
$TSCII_toPadma[TSCII::TSCII_consnt_LLA] = Padma::Padma_consnt_LLA;
$TSCII_toPadma[TSCII::TSCII_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$TSCII_toPadma[TSCII::TSCII_consnt_RRA] = Padma::Padma_consnt_RRA;
$TSCII_toPadma[TSCII::TSCII_conjct_KSH] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$TSCII_toPadma[TSCII::TSCII_conjct_SRII]= Padma::Padma_consnt_SA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;

//Gunintamulu
$TSCII_toPadma[TSCII::TSCII_vowelsn_AA]  = Padma::Padma_vowelsn_AA;
$TSCII_toPadma[TSCII::TSCII_vowelsn_I]   = Padma::Padma_vowelsn_I;
$TSCII_toPadma[TSCII::TSCII_vowelsn_II]  = Padma::Padma_vowelsn_II;
$TSCII_toPadma[TSCII::TSCII_vowelsn_U]   = Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_vowelsn_UU]  = Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_vowelsn_E]   = Padma::Padma_vowelsn_E;
$TSCII_toPadma[TSCII::TSCII_vowelsn_EE]  = Padma::Padma_vowelsn_EE;
$TSCII_toPadma[TSCII::TSCII_vowelsn_AI]  = Padma::Padma_vowelsn_AI;
$TSCII_toPadma[TSCII::TSCII_vowelsn_AULEN] = Padma::Padma_vowelsn_AULEN;

//Special Combinations
$TSCII_toPadma[TSCII::TSCII_combo_KU]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_KUU]     = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_KPULLI]  = Padma::Padma_consnt_KA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_NGU]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_NGUU]    = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_NGPULLI] = Padma::Padma_consnt_NGA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_CU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_CUU]     = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_CPULLI]  = Padma::Padma_consnt_CA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_JPULLI]  = Padma::Padma_consnt_JA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_NYU]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_NYUU]    = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_NYPULLI] = Padma::Padma_consnt_NYA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_TTI]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_I;
$TSCII_toPadma[TSCII::TSCII_combo_TTII]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_II;
$TSCII_toPadma[TSCII::TSCII_combo_TTU]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_TTUU]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_TTPULLI] = Padma::Padma_consnt_TTA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_NNU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_NNUU]    = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_NNPULLI] = Padma::Padma_consnt_NNA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_TU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_TUU]     = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_TPULLI]  = Padma::Padma_consnt_TA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_NU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_NUU]     = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_NPULLI]  = Padma::Padma_consnt_NA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_NNNU]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_NNNUU]   = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_NNNPULLI] = Padma::Padma_consnt_NNNA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_PU]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_PUU]     = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_PPULLI]  = Padma::Padma_consnt_PA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_MUU]     = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_MPULLI]  = Padma::Padma_consnt_MA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_YU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_YUU]     = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_YPULLI]  = Padma::Padma_consnt_YA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_RUU]     = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_RPULLI]  = Padma::Padma_consnt_RA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_LU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_LUU]     = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_LPULLI]  = Padma::Padma_consnt_LA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_VU]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_VUU]     = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_VPULLI]  = Padma::Padma_consnt_VA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_SSPULLI] = Padma::Padma_consnt_SSA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_SPULLI]  = Padma::Padma_consnt_SA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_HPULLI]  = Padma::Padma_consnt_HA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_LLU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_LLUU]    = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_LLPULLI] = Padma::Padma_consnt_LLA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_ZHU]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_ZHUU]    = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_ZHPULLI] = Padma::Padma_consnt_ZHA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_RRU]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_U;
$TSCII_toPadma[TSCII::TSCII_combo_RRUU]    = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_UU;
$TSCII_toPadma[TSCII::TSCII_combo_RRPULLI] = Padma::Padma_consnt_RRA . Padma::Padma_pulli;
$TSCII_toPadma[TSCII::TSCII_combo_KSHPULLI]= Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_pulli;

$TSCII_toPadma[TSCII::TSCII_LQTSINGLE]   = "\xE2\x80\x98";
$TSCII_toPadma[TSCII::TSCII_RQTSINGLE]   = "\xE2\x80\x99";
$TSCII_toPadma[TSCII::TSCII_LQTDOUBLE]   = "\xE2\x80\x9C";
$TSCII_toPadma[TSCII::TSCII_RQTDOUBLE]   = "\xE2\x80\x9D";

$TSCII_toPadma[TSCII::TSCII_digit_ZERO]    = Padma::Padma_digit_ZERO;
$TSCII_toPadma[TSCII::TSCII_digit_ONE]     = Padma::Padma_digit_ONE;
$TSCII_toPadma[TSCII::TSCII_digit_TWO]     = Padma::Padma_digit_TWO;
$TSCII_toPadma[TSCII::TSCII_digit_THREE]   = Padma::Padma_digit_THREE;
$TSCII_toPadma[TSCII::TSCII_digit_FOUR]    = Padma::Padma_digit_FOUR;
$TSCII_toPadma[TSCII::TSCII_digit_FIVE]    = Padma::Padma_digit_FIVE;
$TSCII_toPadma[TSCII::TSCII_digit_SIX]     = Padma::Padma_digit_SIX;
$TSCII_toPadma[TSCII::TSCII_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$TSCII_toPadma[TSCII::TSCII_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$TSCII_toPadma[TSCII::TSCII_digit_NINE]    = Padma::Padma_digit_NINE;
$TSCII_toPadma[TSCII::TSCII_digit_TEN]     = Padma::Padma_digit_TEN;
$TSCII_toPadma[TSCII::TSCII_digit_HUNDRED] = Padma::Padma_digit_HUNDRED;
$TSCII_toPadma[TSCII::TSCII_digit_THOUSAND] = Padma::Padma_digit_THOUSAND;

$TSCII_prefixList = array();
$TSCII_prefixList[TSCII::TSCII_vowelsn_E]   = true;
$TSCII_prefixList[TSCII::TSCII_vowelsn_EE]  = true;
$TSCII_prefixList[TSCII::TSCII_vowelsn_AI]  = true;

function TSCII_initialize()
{
    global $fontinfo;

   //$fontinfo["tscii"]["language"] = "Tamil";
   //$fontinfo["tscii"]["class"] = "TSCII";
}


?>
