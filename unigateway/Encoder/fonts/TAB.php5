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

//TAB
class TAB
{
function TAB() 
{
}

//There is no font with the name 'TAB', but the scheme is just that - an encoding
var $maxLookupLen = 3;
var $fontFace     = "TAB";
var $displayName  = "TAB";
var $script       = Padma::Padma_script_TAMIL;

function lookup($str) 
{
    return $TAB_toPadma[$str];
}

function isPrefixSymbol($str)
{
    return $TAB_prefixList[$str] != null;
}

function isOverloaded($str)
{
    return $TAB_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if ($sign2 == Padma::Padma_vowelsn_E && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_O;
    if ($sign2 == Padma::Padma_vowelsn_EE && $sign1 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    return $sign1 . $sign2;    
}

function preprocessMessage($input)
{
    return $input;
}

//Vowel modifiers
const TAB_visarga        = "\xC3\xA7";  //aytham
const TAB_virama         = "\xC2\xA2";

//Vowels
const TAB_vowel_A        = "\xC3\x9C";
const TAB_vowel_AA       = "\xC3\x9D";
const TAB_vowel_I        = "\xC3\x9E";
const TAB_vowel_II       = "\xC3\x9F";
const TAB_vowel_U        = "\xC3\xA0";
const TAB_vowel_UU       = "\xC3\xA1";
const TAB_vowel_E        = "\xC3\xA2";
const TAB_vowel_EE       = "\xC3\xA3";
const TAB_vowel_AI       = "\xC3\xA4";
const TAB_vowel_O        = "\xC3\xA5";
const TAB_vowel_OO       = "\xC3\xA6";
const TAB_vowel_AU       = "\xC3\xA5\xC3\xB7";

//Consonants
const TAB_consnt_KA      = "\xC3\xA8";
const TAB_consnt_NGA     = "\xC3\xA9";

const TAB_consnt_CA      = "\xC3\xAA";
const TAB_consnt_JA      = "\xC3\xBC";
const TAB_consnt_NYA     = "\xC3\xAB";

const TAB_consnt_TTA     = "\xC3\xAC";
const TAB_consnt_NNA     = "\xC3\xAD";

const TAB_consnt_TA      = "\xC3\xAE";
const TAB_consnt_NA      = "\xC3\xAF";
const TAB_consnt_NNNA    = "\xC3\xB9";

const TAB_consnt_PA      = "\xC3\xB0";
const TAB_consnt_MA      = "\xC3\xB1";

const TAB_consnt_YA      = "\xC3\xB2";
const TAB_consnt_RA      = "\xC3\xB3";
const TAB_consnt_LA      = "\xC3\xB4";
const TAB_consnt_VA      = "\xC3\xB5";
const TAB_consnt_ZHA     = "\xC3\xB6";
const TAB_consnt_LLA     = "\xC3\xB7";
const TAB_consnt_RRA     = "\xC3\xB8";

const TAB_consnt_SSA     = "\xC3\xBB";
const TAB_consnt_SA      = "\xC3\xBA";
const TAB_consnt_HA      = "\xC3\xBD";

const TAB_conjct_KSH     = "\xC3\xBE";
const TAB_conjct_SRII    = "\xC3\xBF";

//Gunintamulu
const TAB_vowelsn_AA     = "\xC2\xA3";
const TAB_vowelsn_I      = "\xC2\xA4";
const TAB_vowelsn_II     = "\xC2\xA6";
const TAB_vowelsn_U      = "\xC2\xA7";
const TAB_vowelsn_UU     = "\xC2\xA8";
const TAB_vowelsn_E      = "\xC2\xAA";
const TAB_vowelsn_EE     = "\xC2\xAB";
const TAB_vowelsn_AI     = "\xC2\xAC";

const TAB_combo_TTI     = "\xC2\xAE";
const TAB_combo_TTII    = "\xC2\xAF";

const TAB_combo_KU      = "\xC2\xB0";
const TAB_combo_KUU     = "\xC3\x83";
const TAB_combo_NGU     = "\xC2\xB1";
const TAB_combo_NGUU    = "\xC3\x84";
const TAB_combo_CU      = "\xC2\xB2";
const TAB_combo_CUU     = "\xC3\x85";
const TAB_combo_NYU     = "\xC2\xB3";
const TAB_combo_NYUU    = "\xC3\x86";
const TAB_combo_TTU     = "\xC2\xB4";
const TAB_combo_TTUU    = "\xC3\x87";
const TAB_combo_NNU     = "\xC2\xB5";
const TAB_combo_NNUU    = "\xC3\x88";
const TAB_combo_TU      = "\xC2\xB6";
const TAB_combo_TUU     = "\xC3\x89";
const TAB_combo_NU      = "\xC2\xB8";
const TAB_combo_NUU     = "\xC3\x8B";
const TAB_combo_NNNU    = "\xC3\x82";
const TAB_combo_NNNUU   = "\xC3\x9B";
const TAB_combo_PU      = "\xC2\xB9";
const TAB_combo_PUU     = "\xC3\x8C";
const TAB_combo_MU      = "\xC2\xBA";
const TAB_combo_MUU     = "\xC3\x8D";
const TAB_combo_YU      = "\xC2\xBB";
const TAB_combo_YUU     = "\xC3\x8E";
const TAB_combo_RU      = "\xC2\xBC";
const TAB_combo_RUU     = "\xC3\x8F";
const TAB_combo_LU      = "\xC2\xBD";
const TAB_combo_LUU     = "\xC3\x96";
const TAB_combo_VU      = "\xC2\xBE";
const TAB_combo_VUU     = "\xC3\x97";
const TAB_combo_ZHU     = "\xC2\xBF";
const TAB_combo_ZHUU    = "\xC3\x98";
const TAB_combo_LLU     = "\xC3\x80";
const TAB_combo_LLUU    = "\xC3\x99";
const TAB_combo_RRU     = "\xC3\x81";
const TAB_combo_RRUU    = "\xC3\x9A";

const TAB_LQTSINGLE      = "\xE2\x80\x98";
const TAB_RQTSINGLE      = "\xE2\x80\x99";
const TAB_LQTDOUBLE      = "\xE2\x80\x9C";
const TAB_RQTDOUBLE      = "\xE2\x80\x9D";

//const TAB uses the same symbol for generating vowelsn_AU and consnt_LLA_ This is a work around
const TAB_combo_KAU      = "\xC2\xAA\xC3\xA8\xC3\xB7";
const TAB_combo_NGAU     = "\xC2\xAA\xC3\xA9\xC3\xB7";
const TAB_combo_CAU      = "\xC2\xAA\xC3\xAA\xC3\xB7";
const TAB_combo_JAU      = "\xC2\xAA\xC3\xBC\xC3\xB7";
const TAB_combo_NYAU     = "\xC2\xAA\xC3\xAB\xC3\xB7";
const TAB_combo_TTAU     = "\xC2\xAA\xC3\xAC\xC3\xB7";
const TAB_combo_NNAU     = "\xC2\xAA\xC3\xAD\xC3\xB7";
const TAB_combo_TAU      = "\xC2\xAA\xC3\xAE\xC3\xB7";
const TAB_combo_NAU      = "\xC2\xAA\xC3\xAF\xC3\xB7";
const TAB_combo_NNNAU    = "\xC2\xAA\xC3\xB9\xC3\xB7";
const TAB_combo_PAU      = "\xC2\xAA\xC3\xB0\xC3\xB7";
const TAB_combo_MAU      = "\xC2\xAA\xC3\xB1\xC3\xB7";
const TAB_combo_YAU      = "\xC2\xAA\xC3\xB2\xC3\xB7";
const TAB_combo_RAU      = "\xC2\xAA\xC3\xB3\xC3\xB7";
const TAB_combo_LAU      = "\xC2\xAA\xC3\xB4\xC3\xB7";
const TAB_combo_VAU      = "\xC2\xAA\xC3\xB5\xC3\xB7";
const TAB_combo_SSAU     = "\xC2\xAA\xC3\xBB\xC3\xB7";
const TAB_combo_SAU      = "\xC2\xAA\xC3\xBA\xC3\xB7";
const TAB_combo_HAU      = "\xC2\xAA\xC3\xBD\xC3\xB7";
const TAB_combo_LLAU     = "\xC2\xAA\xC3\xB7\xC3\xB7";
const TAB_combo_ZHAU     = "\xC2\xAA\xC3\xB6\xC3\xB7";
const TAB_combo_RRAU     = "\xC2\xAA\xC3\xB8\xC3\xB7";
const TAB_combo_KSHAU    = "\xC2\xAA\xC3\xBE\xC3\xB7";

}//end of class

$TAB_toPadma = array();

$TAB_toPadma[TAB::TAB_visarga]  = Padma::Padma_visarga;
$TAB_toPadma[TAB::TAB_virama]   = Padma::Padma_virama;

$TAB_toPadma[TAB::TAB_vowel_A]  = Padma::Padma_vowel_A;
$TAB_toPadma[TAB::TAB_vowel_AA] = Padma::Padma_vowel_AA;
$TAB_toPadma[TAB::TAB_vowel_I]  = Padma::Padma_vowel_I;
$TAB_toPadma[TAB::TAB_vowel_II] = Padma::Padma_vowel_II;
$TAB_toPadma[TAB::TAB_vowel_U]  = Padma::Padma_vowel_U;
$TAB_toPadma[TAB::TAB_vowel_UU] = Padma::Padma_vowel_UU;
$TAB_toPadma[TAB::TAB_vowel_E]  = Padma::Padma_vowel_E;
$TAB_toPadma[TAB::TAB_vowel_EE] = Padma::Padma_vowel_EE;
$TAB_toPadma[TAB::TAB_vowel_AI] = Padma::Padma_vowel_AI;
$TAB_toPadma[TAB::TAB_vowel_O]  = Padma::Padma_vowel_O;
$TAB_toPadma[TAB::TAB_vowel_OO] = Padma::Padma_vowel_OO;
$TAB_toPadma[TAB::TAB_vowel_AU] = Padma::Padma_vowel_AU;

$TAB_toPadma[TAB::TAB_consnt_KA]  = Padma::Padma_consnt_KA;
$TAB_toPadma[TAB::TAB_consnt_NGA] = Padma::Padma_consnt_NGA;
$TAB_toPadma[TAB::TAB_consnt_CA]  = Padma::Padma_consnt_CA;
$TAB_toPadma[TAB::TAB_consnt_JA]  = Padma::Padma_consnt_JA;
$TAB_toPadma[TAB::TAB_consnt_NYA] = Padma::Padma_consnt_NYA;
$TAB_toPadma[TAB::TAB_consnt_TTA] = Padma::Padma_consnt_TTA;
$TAB_toPadma[TAB::TAB_consnt_NNA] = Padma::Padma_consnt_NNA;
$TAB_toPadma[TAB::TAB_consnt_TA]  = Padma::Padma_consnt_TA;
$TAB_toPadma[TAB::TAB_consnt_NA]  = Padma::Padma_consnt_NA;
$TAB_toPadma[TAB::TAB_consnt_NNNA] = Padma::Padma_consnt_NNNA;
$TAB_toPadma[TAB::TAB_consnt_PA]  = Padma::Padma_consnt_PA;
$TAB_toPadma[TAB::TAB_consnt_MA]  = Padma::Padma_consnt_MA;
$TAB_toPadma[TAB::TAB_consnt_YA]  = Padma::Padma_consnt_YA;
$TAB_toPadma[TAB::TAB_consnt_RA]  = Padma::Padma_consnt_RA;
$TAB_toPadma[TAB::TAB_consnt_LA]  = Padma::Padma_consnt_LA;
$TAB_toPadma[TAB::TAB_consnt_VA]  = Padma::Padma_consnt_VA;
$TAB_toPadma[TAB::TAB_consnt_SSA] = Padma::Padma_consnt_SSA;
$TAB_toPadma[TAB::TAB_consnt_SA]  = Padma::Padma_consnt_SA;
$TAB_toPadma[TAB::TAB_consnt_HA]  = Padma::Padma_consnt_HA;
$TAB_toPadma[TAB::TAB_consnt_LLA] = Padma::Padma_consnt_LLA;
$TAB_toPadma[TAB::TAB_consnt_ZHA] = Padma::Padma_consnt_ZHA;
$TAB_toPadma[TAB::TAB_consnt_RRA] = Padma::Padma_consnt_RRA;
$TAB_toPadma[TAB::TAB_conjct_KSH] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;
$TAB_toPadma[TAB::TAB_conjct_SRII]= Padma::Padma_consnt_SA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_II;

//Gunintamulu
$TAB_toPadma[TAB::TAB_vowelsn_AA]  = Padma::Padma_vowelsn_AA;
$TAB_toPadma[TAB::TAB_vowelsn_I]   = Padma::Padma_vowelsn_I;
$TAB_toPadma[TAB::TAB_vowelsn_II]  = Padma::Padma_vowelsn_II;
$TAB_toPadma[TAB::TAB_vowelsn_U]   = Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_vowelsn_UU]  = Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_vowelsn_E]   = Padma::Padma_vowelsn_E;
$TAB_toPadma[TAB::TAB_vowelsn_EE]  = Padma::Padma_vowelsn_EE;
$TAB_toPadma[TAB::TAB_vowelsn_AI]  = Padma::Padma_vowelsn_AI;

$TAB_toPadma[TAB::TAB_combo_KAU]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_NGAU]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_CAU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_JAU]      = Padma::Padma_consnt_JA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_NYAU]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_TTAU]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_NNAU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_TAU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_NAU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_NNNAU]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_PAU]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_MAU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_YAU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_RAU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_LAU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_VAU]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_SSAU]     = Padma::Padma_consnt_SSA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_SAU]      = Padma::Padma_consnt_SA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_HAU]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_LLAU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_ZHAU]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_RRAU]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_AU;
$TAB_toPadma[TAB::TAB_combo_KSHAU]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vowelsn_AU;

$TAB_toPadma[TAB::TAB_combo_TTI]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_I;
$TAB_toPadma[TAB::TAB_combo_TTII]    = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_II;

$TAB_toPadma[TAB::TAB_combo_KU]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_NGU]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_CU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_NYU]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_TTU]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_NNU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_TU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_NU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_NNNU]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_PU]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_MU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_YU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_RU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_LU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_VU]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_LLU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_ZHU]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_RRU]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_U;
$TAB_toPadma[TAB::TAB_combo_KUU]      = Padma::Padma_consnt_KA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_NGUU]     = Padma::Padma_consnt_NGA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_CUU]      = Padma::Padma_consnt_CA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_NYUU]     = Padma::Padma_consnt_NYA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_TTUU]     = Padma::Padma_consnt_TTA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_NNUU]     = Padma::Padma_consnt_NNA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_TUU]      = Padma::Padma_consnt_TA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_NUU]      = Padma::Padma_consnt_NA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_NNNUU]    = Padma::Padma_consnt_NNNA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_PUU]      = Padma::Padma_consnt_PA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_MUU]      = Padma::Padma_consnt_MA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_YUU]      = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_RUU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_LUU]      = Padma::Padma_consnt_LA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_VUU]      = Padma::Padma_consnt_VA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_LLUU]     = Padma::Padma_consnt_LLA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_ZHUU]     = Padma::Padma_consnt_ZHA . Padma::Padma_vowelsn_UU;
$TAB_toPadma[TAB::TAB_combo_RRUU]     = Padma::Padma_consnt_RRA . Padma::Padma_vowelsn_UU;

$TAB_prefixList = array();
$TAB_prefixList[TAB::TAB_vowelsn_E]   = true;
$TAB_prefixList[TAB::TAB_vowelsn_EE]  = true;
$TAB_prefixList[TAB::TAB_vowelsn_AI]  = true;

$TAB_overloadList = array();
$TAB_overloadList[TAB::TAB_vowel_O]   = true;
$TAB_overloadList[TAB::TAB_vowelsn_E] = true;
$TAB_overloadList["\xC2\xAA\xC3\xA8"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xA9"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xAA"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xBC"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xAB"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xAC"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xAD"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xAE"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xAF"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB9"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB0"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB1"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB2"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB3"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB4"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB5"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xBB"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xBA"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xBD"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB7"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB6"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xB8"]    = true;
$TAB_overloadList["\xC2\xAA\xC3\xBE"]    = true;

function TAB_initialize()
{
    global $fontinfo;

    $fontinfo["tab"]["language"] = "Tamil";
    $fontinfo["tab"]["class"] = "TAB";
}
?>
