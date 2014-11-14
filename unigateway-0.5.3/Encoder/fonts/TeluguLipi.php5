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

class TeluguLipi
{
function TeluguLipi()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 2;
var $fontFace     = "Telugu Lipi";
var $displayName  = "Telugu Lipi";
var $script       = Padma::Padma_script_TELUGU;

function lookup($str) 
{
    global $TeluguLipi_toPadma;
    return $TeluguLipi_toPadma[$str];
}

function isPrefixSymbol($str)
{
    return false;
}

function isOverloaded($str)
{
    global $TeluguLipi_overloadList;
    return $TeluguLipi_overloadList[$str] != null;
}

function handleTwoPartVowelSigns($sign1, $sign2)
{
    if ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_U)
        return Padma::Padma_vowelsn_O;
    if ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_OO;
    if ($sign1 == Padma::Padma_vowelsn_I && $sign2 == Padma::Padma_vowelsn_AA)
        return Padma::Padma_vowelsn_II;
    return $sign1 . $sign2;    
}

//Don't remove kommu if it is used with ya
function preprocessMessage($input)
{
    $output = ""; $last = null;
     $input_len=utf8_strlen($input);
    for($i = 0; $i < $input_len; ++$i) {
        $cur = utf8_substr($input,$i,1);
	if (!TeluguLipi::isRedundant($cur, $last))
            $output .= $last = $cur;
    }
    return $output;
}


function isRedundant($str, $prev)
{
    global $TeluguLipi_redundantList;
    if ($str == TeluguLipi::TeluguLipi_misc_TICK && $prev == TeluguLipi::TeluguLipi_combo_YI)
        return false;
      return $TeluguLipi_redundantList[$str] != null;
}
		

//Implementation details start here

//Specials
const TeluguLipi_candrabindu    = "\xC2\xBF";
const TeluguLipi_visarga        = "\xC3\x90";
const TeluguLipi_virama         = "\xC3\xB7";
const TeluguLipi_anusvara       = "\xC3\x8F";

//Vowels
const TeluguLipi_vowel_A        = "\xE2\x82\xAC";
const TeluguLipi_vowel_AA       = "\xC2\x81";
const TeluguLipi_vowel_I        = "\xE2\x80\x9A";
const TeluguLipi_vowel_II       = "\xC6\x92";
const TeluguLipi_vowel_U        = "\xE2\x80\x9E";
const TeluguLipi_vowel_UU       = "\xE2\x80\xA6";
const TeluguLipi_vowel_R        = "\xE2\x80\xA0";
const TeluguLipi_vowel_RR       = "\xC3\xB8";
const TeluguLipi_vowel_E        = "\xE2\x80\xA1";
const TeluguLipi_vowel_EE       = "\xCB\x86";
const TeluguLipi_vowel_AI       = "\xE2\x80\xB0";
const TeluguLipi_vowel_O        = "\xC5\xA0";
const TeluguLipi_vowel_OO       = "\xE2\x80\xB9";
const TeluguLipi_vowel_AU       = "\xC5\x92";

//Consonants
const TeluguLipi_consnt_KA      = "\xC2\x8D";
const TeluguLipi_consnt_KHA     = "\xC5\xBD";
const TeluguLipi_consnt_GA      = "\xC2\x8F";
const TeluguLipi_consnt_GHA     = "\xC2\x90";
const TeluguLipi_consnt_NGA     = "\xC3\xB9";

const TeluguLipi_consnt_CA      = "\xC3\xBA";
const TeluguLipi_consnt_CHA     = "\xC3\xBB";
const TeluguLipi_consnt_JA      = "\xC3\xBC";
const TeluguLipi_consnt_JHA     = "\xE2\x80\xA2";
const TeluguLipi_consnt_NYA     = "\xE2\x80\x93";

const TeluguLipi_consnt_TTA     = "\xC3\xBD";
const TeluguLipi_consnt_TTHA    = "\xCB\x9C";
const TeluguLipi_consnt_DDA     = "\xE2\x84\xA2";
const TeluguLipi_consnt_DDHA    = "\xC5\xA1";
const TeluguLipi_consnt_NNA     = "\xE2\x80\xBA";

const TeluguLipi_consnt_TA      = "\xC5\x93";
const TeluguLipi_consnt_THA     = "\xC2\x9D";
const TeluguLipi_consnt_DA      = "\xC5\xBE";
const TeluguLipi_consnt_DHA     = "\xC5\xB8";
const TeluguLipi_consnt_NA      = "\xC3\xBE";

const TeluguLipi_consnt_PA_1    = "\xC2\xA1";
const TeluguLipi_consnt_PA_2    = "\xC2\xB1";
const TeluguLipi_consnt_PHA_1   = "\xC2\xA2";
const TeluguLipi_consnt_PHA_2   = "\xC2\xB2";
const TeluguLipi_consnt_BA      = "\xC2\xA3";
const TeluguLipi_consnt_BHA     = "\xC2\xA4";
const TeluguLipi_consnt_MA      = "\xC2\xA5";

const TeluguLipi_consnt_YA      = "\xC2\xA6\xC3\x81";
const TeluguLipi_consnt_RA      = "\xC2\xA7";
const TeluguLipi_consnt_LA      = "\xC2\xA8";
const TeluguLipi_consnt_VA      = "\xC2\xA9";
const TeluguLipi_consnt_SHA     = "\xC2\xAA";
const TeluguLipi_consnt_SSA_1   = "\xC2\xAB";
const TeluguLipi_consnt_SSA_2   = "\xC2\xB4";
const TeluguLipi_consnt_SA_1    = "\xC2\xAC";
const TeluguLipi_consnt_SA_2    = "\xC2\xB3";
const TeluguLipi_consnt_HA      = "\xC3\xBF";
const TeluguLipi_consnt_LLA     = "\xC2\xAE";
const TeluguLipi_consnt_RRA     = "\xC2\xB0";
const TeluguLipi_conjct_KSHA    = "\xC2\xAF";

//Gunintamulu
const TeluguLipi_vowelsn_AA     = "\xC3\x82";
const TeluguLipi_vowelsn_I      = "\xC3\x83";
const TeluguLipi_vowelsn_II     = "\xC3\x84";
const TeluguLipi_vowelsn_U_1    = "\xC3\x85";
const TeluguLipi_vowelsn_U_2    = "\xC3\xB4";
const TeluguLipi_vowelsn_UU_1   = "\xC3\x86";
const TeluguLipi_vowelsn_UU_2   = "\xC3\xB5";
const TeluguLipi_vowelsn_R      = "\xC3\x87";
const TeluguLipi_vowelsn_RR     = "\xC3\x88";
const TeluguLipi_vowelsn_E      = "\xC3\x89";
const TeluguLipi_vowelsn_EE     = "\xC3\x8A";
const TeluguLipi_vowelsn_AI     = "\xC3\x8B";
const TeluguLipi_vowelsn_O      = "\xC3\x8C";
const TeluguLipi_vowelsn_OO     = "\xC3\x8D";
const TeluguLipi_vowelsn_AU     = "\xC3\x8E";

//Special Combinations
const TeluguLipi_combo_YI       = "\xC2\xA6";
const TeluguLipi_combo_YE       = "\xC2\xA6\xC3\x89";
const TeluguLipi_combo_YEE      = "\xC2\xA6\xC3\x8A";
const TeluguLipi_combo_YAI      = "\xC2\xA6\xC3\x8B";
const TeluguLipi_combo_YAU      = "\xC2\xA6\xC3\x8E";
const TeluguLipi_combo_YPOLLU   = "\xC2\xA6\xC3\xB7";
const TeluguLipi_combo_HAA      = "\xC3\xB6";

//Vattulu
const TeluguLipi_vattu_KA       = "\xC3\x91";
const TeluguLipi_vattu_KHA      = "\xC3\x92";
const TeluguLipi_vattu_GA       = "\xC3\x93";
const TeluguLipi_vattu_GHA      = "\xC3\x94";
const TeluguLipi_vattu_NGA      = "\xC3\x95";

const TeluguLipi_vattu_CA       = "\xC3\x96";
const TeluguLipi_vattu_CHA      = "\xC3\x97";
const TeluguLipi_vattu_JA       = "\xC3\x98";
const TeluguLipi_vattu_JHA      = "\xC3\x99";
const TeluguLipi_vattu_NYA      = "\xC3\x9A";

const TeluguLipi_vattu_TTA      = "\xC3\x9B";
const TeluguLipi_vattu_TTHA     = "\xC3\x9C";
const TeluguLipi_vattu_DDA      = "\xC3\x9D";
const TeluguLipi_vattu_DDHA     = "\xC3\x9E";
const TeluguLipi_vattu_NNA      = "\xC3\x9F";

const TeluguLipi_vattu_TA       = "\xC3\xA0";
const TeluguLipi_vattu_THA      = "\xC3\xA1";
const TeluguLipi_vattu_DA       = "\xC3\xA2";
const TeluguLipi_vattu_DHA      = "\xC3\xA3";
const TeluguLipi_vattu_NA       = "\xC3\xA4";

const TeluguLipi_vattu_PA       = "\xC3\xA5";
const TeluguLipi_vattu_PHA      = "\xC3\xA6";
const TeluguLipi_vattu_BA       = "\xC3\xA7";
const TeluguLipi_vattu_BHA      = "\xC3\xA8";
const TeluguLipi_vattu_MA       = "\xC3\xA9";

const TeluguLipi_vattu_YA       = "\xC3\xAA";
const TeluguLipi_vattu_RA       = "\xC3\xAB";
const TeluguLipi_vattu_LA       = "\xC3\xAC";
const TeluguLipi_vattu_VA       = "\xC3\xAD";
const TeluguLipi_vattu_SHA      = "\xC3\xAE";
const TeluguLipi_vattu_SSA      = "\xC3\xAF";
const TeluguLipi_vattu_SA       = "\xC3\xB0";
const TeluguLipi_vattu_HA       = "\xC3\xB1";
const TeluguLipi_vattu_LLA      = "\xC3\xB2";
const TeluguLipi_vattu_RRA      = "\xC3\xB3";

//Matches ASCII from 0x20-0x7F
//Does not match ASCII
const TeluguLipi_extra_QTSINGLE_1 = "\xE2\x80\x98";
const TeluguLipi_extra_QTSINGLE_2 = "\xE2\x80\x99";
const TeluguLipi_extra_QTDOUBLE_1 = "\xE2\x80\x9C";
const TeluguLipi_extra_QTDOUBLE_2 = "\xE2\x80\x9D";

//const Telugu Digits
const TeluguLipi_digit_ZERO     = "\xC2\xBE";
const TeluguLipi_digit_ONE      = "\xC2\xB5";
const TeluguLipi_digit_TWO      = "\xC2\xB6";
const TeluguLipi_digit_THREE    = "\xC2\xB7";
const TeluguLipi_digit_FOUR     = "\xC2\xB8";
const TeluguLipi_digit_FIVE     = "\xC2\xB9";
const TeluguLipi_digit_SIX      = "\xC2\xBA";
const TeluguLipi_digit_SEVEN    = "\xC2\xBB";
const TeluguLipi_digit_EIGHT    = "\xC2\xBC";
const TeluguLipi_digit_NINE     = "\xC2\xBD";

//Kommu
const TeluguLipi_misc_TICK      = "\xC3\x81";
}

$TeluguLipi_toPadma = array();

$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_candrabindu] = Padma::Padma_candrabindu;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_visarga]  = Padma::Padma_visarga;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_virama]   = Padma::Padma_syllbreak;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_anusvara] = Padma::Padma_anusvara;

$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_A]  = Padma::Padma_vowel_A;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_AA] = Padma::Padma_vowel_AA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_I]  = Padma::Padma_vowel_I;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_II] = Padma::Padma_vowel_II;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_U]  = Padma::Padma_vowel_U;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_UU] = Padma::Padma_vowel_UU;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_R]  = Padma::Padma_vowel_R;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_RR] = Padma::Padma_vowel_RR;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_E]  = Padma::Padma_vowel_E;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_EE] = Padma::Padma_vowel_EE;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_AI] = Padma::Padma_vowel_AI;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_O]  = Padma::Padma_vowel_O;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_OO] = Padma::Padma_vowel_OO;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowel_AU] = Padma::Padma_vowel_AU;

$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_KA]  = Padma::Padma_consnt_KA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_KHA] = Padma::Padma_consnt_KHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_GA]  = Padma::Padma_consnt_GA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_GHA] = Padma::Padma_consnt_GHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_NGA] = Padma::Padma_consnt_NGA;

$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_CA]  = Padma::Padma_consnt_CA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_CHA] = Padma::Padma_consnt_CHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_JA]  = Padma::Padma_consnt_JA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_JHA] = Padma::Padma_consnt_JHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_NYA] = Padma::Padma_consnt_NYA;

$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_TTA] = Padma::Padma_consnt_TTA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_TTHA] = Padma::Padma_consnt_TTHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_DDA] = Padma::Padma_consnt_DDA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_DDHA] = Padma::Padma_consnt_DDHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_NNA] = Padma::Padma_consnt_NNA;

$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_TA]  = Padma::Padma_consnt_TA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_THA] = Padma::Padma_consnt_THA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_DA]  = Padma::Padma_consnt_DA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_DHA] = Padma::Padma_consnt_DHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_NA]  = Padma::Padma_consnt_NA;

$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_PA_1]  = Padma::Padma_consnt_PA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_PA_2]  = Padma::Padma_consnt_PA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_PHA_1] = Padma::Padma_consnt_PHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_PHA_2] = Padma::Padma_consnt_PHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_BA]    = Padma::Padma_consnt_BA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_BHA]   = Padma::Padma_consnt_BHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_MA]    = Padma::Padma_consnt_MA;

$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_YA]  = Padma::Padma_consnt_YA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_RA]  = Padma::Padma_consnt_RA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_LA]  = Padma::Padma_consnt_LA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_VA]  = Padma::Padma_consnt_VA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_SHA] = Padma::Padma_consnt_SHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_SSA_1] = Padma::Padma_consnt_SSA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_SSA_2] = Padma::Padma_consnt_SSA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_SA_1] = Padma::Padma_consnt_SA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_SA_2] = Padma::Padma_consnt_SA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_HA] = Padma::Padma_consnt_HA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_LLA] = Padma::Padma_consnt_LLA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_consnt_RRA] = Padma::Padma_consnt_RRA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_conjct_KSHA] = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA;

//Gunintamulu
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_AA]  = Padma::Padma_vowelsn_AA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_I]   = Padma::Padma_vowelsn_I;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_II]  = Padma::Padma_vowelsn_II;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_U_1] = Padma::Padma_vowelsn_U;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_U_2] = Padma::Padma_vowelsn_U;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_R]   = Padma::Padma_vowelsn_R;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_RR]  = Padma::Padma_vowelsn_RR;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_E]   = Padma::Padma_vowelsn_E;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_EE]  = Padma::Padma_vowelsn_EE;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_AI]  = Padma::Padma_vowelsn_AI;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_O]   = Padma::Padma_vowelsn_O;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_OO]  = Padma::Padma_vowelsn_OO;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vowelsn_AU]  = Padma::Padma_vowelsn_AU;

//Specials
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_combo_YI]  = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_I;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_combo_YE]  = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_E;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_combo_YEE] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_EE;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_combo_YAI] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AI;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_combo_YAU] = Padma::Padma_consnt_YA . Padma::Padma_vowelsn_AU;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_combo_YPOLLU] = Padma::Padma_consnt_YA . Padma::Padma_syllbreak;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_combo_HAA] = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_AA;

//Vattulu
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_KA]      = Padma::Padma_vattu_KA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_KHA]     = Padma::Padma_vattu_KHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_GA]      = Padma::Padma_vattu_GA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_GHA]     = Padma::Padma_vattu_GHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_NGA]     = Padma::Padma_vattu_NGA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_CA]      = Padma::Padma_vattu_CA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_CHA]     = Padma::Padma_vattu_CHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_JA]      = Padma::Padma_vattu_JA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_JHA]     = Padma::Padma_vattu_JHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_NYA]     = Padma::Padma_vattu_NYA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_TTA]     = Padma::Padma_vattu_TTA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_TTHA]    = Padma::Padma_vattu_TTHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_DDA]     = Padma::Padma_vattu_DDA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_DDHA]    = Padma::Padma_vattu_DDHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_NNA]     = Padma::Padma_vattu_NNA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_TA]      = Padma::Padma_vattu_TA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_THA]     = Padma::Padma_vattu_THA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_DA]      = Padma::Padma_vattu_DA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_DHA]     = Padma::Padma_vattu_DHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_NA]      = Padma::Padma_vattu_NA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_PA]      = Padma::Padma_vattu_PA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_PHA]     = Padma::Padma_vattu_PHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_BA]      = Padma::Padma_vattu_BA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_BHA]     = Padma::Padma_vattu_BHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_MA]      = Padma::Padma_vattu_MA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_YA]      = Padma::Padma_vattu_YA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_RA]      = Padma::Padma_vattu_RA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_LA]      = Padma::Padma_vattu_LA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_VA]      = Padma::Padma_vattu_VA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_SHA]     = Padma::Padma_vattu_SHA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_SSA]     = Padma::Padma_vattu_SSA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_SA]      = Padma::Padma_vattu_SA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_HA]      = Padma::Padma_vattu_HA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_LLA]     = Padma::Padma_vattu_LLA;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_vattu_RRA]     = Padma::Padma_vattu_RRA;

//Digits
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_ZERO]    = Padma::Padma_digit_ZERO;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_ONE]     = Padma::Padma_digit_ONE;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_TWO]     = Padma::Padma_digit_TWO;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_THREE]   = Padma::Padma_digit_THREE;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_FOUR]    = Padma::Padma_digit_FOUR;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_FIVE]    = Padma::Padma_digit_FIVE;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_SIX]     = Padma::Padma_digit_SIX;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_SEVEN]   = Padma::Padma_digit_SEVEN;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_EIGHT]   = Padma::Padma_digit_EIGHT;
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_digit_NINE]    = Padma::Padma_digit_NINE;

//Miscellaneous(where it doesn't match ASCII representation)
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_extra_QTSINGLE_1] = "'";
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_extra_QTSINGLE_2] = "'";
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_extra_QTDOUBLE_1] = '"';
$TeluguLipi_toPadma[TeluguLipi::TeluguLipi_extra_QTDOUBLE_2] = '"';

$TeluguLipi_redundantList = array();
$TeluguLipi_redundantList[TeluguLipi::TeluguLipi_misc_TICK] = true;

$TeluguLipi_overloadList = array();
$TeluguLipi_overloadList[TeluguLipi::TeluguLipi_combo_YI]   = true;

function TeluguLipi_initialize()
{
    global $fontinfo;

    $fontinfo["telugu lipi"]["language"] = "Telugu";
    $fontinfo["telugu lipi"]["class"] = "TeluguLipi";
}
?>
