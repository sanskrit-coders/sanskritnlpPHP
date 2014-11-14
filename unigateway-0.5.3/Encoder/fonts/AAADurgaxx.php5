<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2008 Golam Mortuza Hossain <gmhossain@gmail.com> 
 *  Copyright (C) 2008 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2009 Harshita Vani   <harshita@atc.tcs.com>
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


//AAADurgaxx
class AAADurgaxx {
function AAADurgaxx()
{
}

var $maxLookupLen = 3;
var $fontFace     = "AAADurgaxx";
var $displayName  = "AAADurgaxx";
var $script       =  Padma::Padma_script_BENGALI;
var $hasSuffixes  = true;

function lookup ($str)
{
    global $AAADurgaxx_toPadma;
    return $AAADurgaxx_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $AAADurgaxx_prefixList;
    return array_key_exists($str, $AAADurgaxx_prefixList);
}

function isSuffixSymbol ($str)
{
    global $AAADurgaxx_suffixList;
    return array_key_exists($str, $AAADurgaxx_suffixList);
}

function isOverloaded ($str)
{
    global $AAADurgaxx_overloadList;
    return array_key_exists($str, $AAADurgaxx_overloadList);
}


function handleTwoPartVowelSigns ($sign1, $sign2)
{
    if (($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AA) ||
        ($sign1 == Padma::Padma_vowelsn_AA && $sign2 == Padma::Padma_vowelsn_E))
        return Padma::Padma_vowelsn_OO;
    if (($sign1 == Padma::Padma_vowelsn_AULEN && $sign2 == Padma::Padma_vowelsn_E) ||
        ($sign1 == Padma::Padma_vowelsn_E && $sign2 == Padma::Padma_vowelsn_AULEN))
        return Padma::Padma_vowelsn_AU;
    return $sign1 . $sign2;
}

function isRedundant ($str)
{
    global $AAADurgaxx_redundantList;
    return array_key_exists($str, $AAADurgaxx_redundantList);
}

// AAADurgaxx map starts here 
const AAADurgaxx_halffm_RA_1    = "\x27";

const AAADurgaxx_conjct_SKH_1   = "\x30"; 
const AAADurgaxx_conjct_KTR     = "\x31"; 
const AAADurgaxx_conjct_KSSB    = "\x32"; 
const AAADurgaxx_conjct_GHB     = "\x33"; 
const AAADurgaxx_conjct_NGA_GHR = "\x34"; 
const AAADurgaxx_conjct_TTM     = "\x35"; 
const AAADurgaxx_conjct_DDM     = "\x36"; 
const AAADurgaxx_conjct_BHL     = "\x37"; 
const AAADurgaxx_combo_RUU      = "\x38"; //combo
const AAADurgaxx_conjct_BHB     = "\x39"; 
const AAADurgaxx_conjct_DDHR    = "\x3A"; 
const AAADurgaxx_conjct_NGA_KR  = "\x3B"; 
const AAADurgaxx_conjct_DG      = "\x3C"; 
const AAADurgaxx_conjct_LDD     = "\x3D"; 
const AAADurgaxx_conjct_MBHR    = "\x3E"; 
const AAADurgaxx_conjct_SPR     = "\x3F"; 
const AAADurgaxx_combo_RU       = "\x40"; //combo
const AAADurgaxx_conjct_DHRUU   = "\x41"; 
const AAADurgaxx_consnt_JA      = "\x42";
const AAADurgaxx_consnt_RRA     = "\x43";
const AAADurgaxx_consnt_YYA     = "\x44";
const AAADurgaxx_conjct_RRG     = "\x45";
const AAADurgaxx_consnt_RHA     = "\x46";
const AAADurgaxx_conjct_TRUU    = "\x47"; 
const AAADurgaxx_conjct_JNYA    = "\x48"; 
const AAADurgaxx_conjct_NYA_J   = "\x49"; 
const AAADurgaxx_conjct_TRU     = "\x4A"; 
const AAADurgaxx_conjct_NNDDR   = "\x4B"; 
const AAADurgaxx_conjct_DRU     = "\x4C"; 
const AAADurgaxx_conjct_HB      = "\x4D"; 

const AAADurgaxx_avagraha       = "\x51"; 
const AAADurgaxx_conjct_DHRU    = "\x52"; 
const AAADurgaxx_conjct_SSTTB   = "\x53"; 
const AAADurgaxx_conjct_PN      = "\x54"; 
const AAADurgaxx_conjct_SSPH    = "\x55"; 
const AAADurgaxx_conjct_SHCH    = "\x56"; 
const AAADurgaxx_vowelsn_II_1   = "\x57";
const AAADurgaxx_vowelsn_II_2   = "\x58";

const AAADurgaxx_conjct_SKH_2   = "\x59"; 

const AAADurgaxx_conjct_TN      = "\x60"; 
const AAADurgaxx_conjct_KTB     = "\x61"; 

const AAADurgaxx_conjct_HNN     = "\x63"; 

const AAADurgaxx_conjct_LTTR    = "\x65"; 
const AAADurgaxx_conjct_GRU     = "\x66"; 
const AAADurgaxx_conjct_SPL     = "\x67"; 
const AAADurgaxx_conjct_KTTR    = "\x68"; 
const AAADurgaxx_conjct_DRUU    = "\x69"; 
const AAADurgaxx_conjct_LTH     = "\x6A"; 

const AAADurgaxx_vowelsn_UU_1   = "\x6D";
const AAADurgaxx_vowelsn_U_1    = "\x6E";
const AAADurgaxx_vowelsn_R_1    = "\x6F";
const AAADurgaxx_vowelsn_U_2    = "\x70";
const AAADurgaxx_vowelsn_UU_2   = "\x71";
const AAADurgaxx_vowelsn_R_2    = "\x72";

const AAADurgaxx_vowelsn_UU_3   = "\x7B";
const AAADurgaxx_vowelsn_U_3    = "\x7C";
const AAADurgaxx_vowelsn_R_3    = "\x7D";

const AAADurgaxx_vowelsn_U_4    = "\xC2\xAB";

const AAADurgaxx_misc_2_by_3    = "\xC2\xBB"; 
const AAADurgaxx_misc_1_by_4    = "\xC2\xBC"; 
const AAADurgaxx_misc_1_by_2    = "\xC2\xBD"; 
const AAADurgaxx_misc_3_by_4    = "\xC2\xBE"; 
const AAADurgaxx_misc_1_by_3    = "\xC2\xBF"; 

const AAADurgaxx_vowelsn_U_5    = "\xC3\x80";
const AAADurgaxx_vowelsn_U_6    = "\xC3\x81";
const AAADurgaxx_vowelsn_U_7    = "\xC3\x82";
const AAADurgaxx_vowelsn_UU_4   = "\xC3\x83";

const AAADurgaxx_vowelsn_R_5    = "\xC3\x88";

const AAADurgaxx_vowelsn_UU_5   = "\xC3\x8A";
const AAADurgaxx_vowelsn_UU_6   = "\xC3\x8B";
const AAADurgaxx_vowelsn_U_8    = "\xC3\x8C";
const AAADurgaxx_vowelsn_U_9    = "\xC3\x8D";
const AAADurgaxx_vowelsn_UU_7   = "\xC3\x8E";
const AAADurgaxx_vowelsn_R_6    = "\xC3\x8F";

const AAADurgaxx_vowelsn_R_7    = "\xC3\x92";
const AAADurgaxx_vowelsn_UU_8   = "\xC3\x93";
const AAADurgaxx_vowelsn_R_8    = "\xC3\x94";
const AAADurgaxx_vowelsn_UU_9   = "\xC3\x95";

const AAADurgaxx_vowelsn_R_9    = "\xC3\x99";
const AAADurgaxx_vowelsn_U_10   = "\xC3\x9A";
const AAADurgaxx_vowelsn_UU_10  = "\xC3\x9B";

const AAADurgaxx_nukta_1        = "\xC3\x9D"; 
const AAADurgaxx_nukta_2        = "\xC3\x9E"; 
const AAADurgaxx_vattu_BA_1     = "\xC3\x9F";
const AAADurgaxx_vattu_RA_1     = "\xC3\xA0";
const AAADurgaxx_vattu_BA_2     = "\xC3\xA1";
const AAADurgaxx_vowelsn_R_10   = "\xC3\xA2";
const AAADurgaxx_vattu_TR       = "\xC3\xA3";
const AAADurgaxx_vattu_RA_2     = "\xC3\xA4";
const AAADurgaxx_vattu_THA      = "\xC3\xA5";
const AAADurgaxx_vattu_PA       = "\xC3\xA6";
const AAADurgaxx_vattu_LA_1     = "\xC3\xA7";
const AAADurgaxx_vattu_BHR      = "\xC3\xA8";
const AAADurgaxx_vattu_RA_3     = "\xC3\xA9";
const AAADurgaxx_vattu_GA       = "\xC3\xAA";
const AAADurgaxx_vattu_BHA      = "\xC3\xAB";
const AAADurgaxx_vattu_LA_2     = "\xC3\xAC";
const AAADurgaxx_vattu_NA       = "\xC3\xAD";
const AAADurgaxx_vattu_RA_4     = "\xC3\xAE";
const AAADurgaxx_vattu_MA       = "\xC3\xAF";

const AAADurgaxx_vattu_RA_5     = "\xC3\xB1";
const AAADurgaxx_candrabindu    = "\xC3\xB2";
const AAADurgaxx_vowelsn_AULEN_1= "\xC3\xB3";
const AAADurgaxx_consnt_KA      = "\xC3\xB4";
const AAADurgaxx_vowelsn_U_11   = "\xC3\xB5";
const AAADurgaxx_vowelsn_UU_11  = "\xC3\xB6";
const AAADurgaxx_vowelsn_R_12   = "\xC3\xB7";
const AAADurgaxx_vowelsn_AULEN_2= "\xC3\xB8";
const AAADurgaxx_virama         = "\xC3\xB9";
const AAADurgaxx_vowelsn_U_12   = "\xC3\xBA";
const AAADurgaxx_vowelsn_UU_12  = "\xC3\xBB";
const AAADurgaxx_vowelsn_R_11   = "\xC3\xBC";
const AAADurgaxx_vattu_RA_6     = "\xC3\xBD";
const AAADurgaxx_halffm_RA_2    = "\xC3\xBE";

}

$AAADurgaxx_toPadma = array();

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_consnt_KA]      = Padma::Padma_consnt_KA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_avagraha]       = Padma::Padma_avagraha;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_virama]         = Padma::Padma_virama;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_nukta_1]        = Padma::Padma_nukta;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_nukta_2]        = Padma::Padma_nukta;

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_misc_2_by_3]    = Padma::Padma_digit_TWO . "/" . Padma::Padma_digit_THREE; 
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_misc_1_by_4]    = Padma::Padma_digit_ONE . "/" . Padma::Padma_digit_FOUR; 
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_misc_1_by_2]    = Padma::Padma_digit_ONE . "/" . Padma::Padma_digit_TWO; 
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_misc_3_by_4]    = Padma::Padma_digit_THREE . "/" . Padma::Padma_digit_FOUR; 
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_misc_1_by_3]    = Padma::Padma_digit_ONE . "/" . Padma::Padma_digit_THREE; 

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_consnt_RRA]     = Padma::Padma_consnt_RRA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_consnt_YYA]     = Padma::Padma_consnt_YYA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_consnt_RHA]     = Padma::Padma_consnt_RHA;

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_halffm_RA_1]      = Padma::Padma_halffm_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_halffm_RA_2]      = Padma::Padma_halffm_RA;

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_II_1]   = Padma::Padma_vowelsn_II;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_II_2]   = Padma::Padma_vowelsn_II;
//
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_1]    = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_2]    = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_3]    = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_4]    = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_5]    = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_6]    = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_7]    = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_8]    = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_9]    = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_10]   = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_11]   = Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_U_12]   = Padma::Padma_vowelsn_U;
//
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_1]   = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_2]   = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_3]   = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_4]   = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_5]   = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_6]   = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_7]   = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_8]   = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_9]   = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_10]  = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_11]  = Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_UU_12]  = Padma::Padma_vowelsn_UU;
//
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_1]    = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_2]    = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_3]    = Padma::Padma_vowelsn_R;
//AAADurgaxx.toPadma[AAADurgaxx.vowelsn_R_4]    = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_5]    = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_6]    = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_7]    = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_8]    = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_9]    = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_10]   = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_11]   = Padma::Padma_vowelsn_R;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vowelsn_R_12]   = Padma::Padma_vowelsn_R;

//AAADurgaxx.toPadma[AAADurgaxx.conjct_SSPH_1]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PHA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_SSPH_2]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PHA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_NTU]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vowelsn_U;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_SHM]     = Padma::Padma_consnt_SHA . Padma::Padma_vattu_MA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_SHCH]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CHA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_SHN]     = Padma::Padma_consnt_SHA . Padma::Padma_vattu_NA;
////AAADurgaxx.toPadma[AAADurgaxx.conjct_SHL]     = Padma::Padma_consnt_SHA . Padma::Padma_vattu_LA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_HNN_1]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_HNN_2]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NNA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_HL]      = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vattu_RA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_KSSM]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vattu_MA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_NGA_KSS] = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA . Padma::Padma_vattu_SSA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_CCHR]    = Padma::Padma_consnt_CA . Padma::Padma_vattu_CHA . Padma::Padma_vattu_RA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_JJH]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_JHA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_NYA_JH]  = Padma::Padma_consnt_NYA . Padma::Padma_vattu_JHA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_TTB]     = Padma::Padma_consnt_TTA . Padma::Padma_vattu_BA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_SSTTB]   = Padma::Padma_consnt_SSA .Padma::Padma_consnt_TTA . Padma::Padma_vattu_BA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_NNDDH]   = Padma::Padma_consnt_NNA . Padma::Padma_vattu_DDHA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_SPL]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_PA . Padma::Padma_vattu_LA;
//AAADurgaxx.toPadma[AAADurgaxx.conjct_THB]     = Padma::Padma_consnt_THA . Padma::Padma_vattu_BA;
//
//AAADurgaxx.toPadma[AAADurgaxx.conjct_DGH]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_GHA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_SKH_1]   = Padma::Padma_consnt_SA . Padma::Padma_vattu_KHA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_SKH_2]   = Padma::Padma_consnt_SA . Padma::Padma_vattu_KHA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_LTH]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_THA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_LTTR]    = Padma::Padma_consnt_LA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_KTR]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_KTTR]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_KSSB]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vattu_BA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_GHB]     = Padma::Padma_consnt_GHA . Padma::Padma_vattu_BA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_NGA_GHR] = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GHA . Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_TTM]     = Padma::Padma_consnt_TTA . Padma::Padma_vattu_MA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_DDM]     = Padma::Padma_consnt_DDA . Padma::Padma_vattu_MA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_BHL]     = Padma::Padma_consnt_BHA . Padma::Padma_vattu_LA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_combo_RUU]      = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_BHB]     = Padma::Padma_consnt_BHA . Padma::Padma_vattu_BA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_DDHR]    = Padma::Padma_consnt_DDHA . Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_NGA_KR]  = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA . Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_DG]      = Padma::Padma_consnt_DA . Padma::Padma_vattu_GA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_LDD]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_DDA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_MBHR]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_BHA . Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_SPR]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_combo_RU]       = Padma::Padma_consnt_RA . Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_DHRU]    = Padma::Padma_consnt_DHA .  Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_DHRUU]   = Padma::Padma_consnt_DHA .  Padma::Padma_vattu_RA . Padma::Padma_vowelsn_UU;
// H

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_RRG]    = Padma::Padma_consnt_RRA . Padma::Padma_vattu_GA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_JNYA]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_NYA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_NYA_J]   = Padma::Padma_consnt_NYA . Padma::Padma_vattu_JA;

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_GRU]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_TRU]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_TRUU]    = Padma::Padma_consnt_TA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_UU;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_DRU]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_DRUU]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_HB]      = Padma::Padma_consnt_HA . Padma::Padma_vattu_BA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_PN]      = Padma::Padma_consnt_PA . Padma::Padma_vattu_NA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_TN]      = Padma::Padma_consnt_TA . Padma::Padma_vattu_NA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_KTB]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_TA . Padma::Padma_vattu_BA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_conjct_SHCH]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CHA;

//
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_BA_1]     = Padma::Padma_vattu_BA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_BA_2]     = Padma::Padma_vattu_BA;

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_RA_1]     = Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_RA_2]     = Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_RA_3]     = Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_RA_4]     = Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_RA_5]     = Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_RA_6]     = Padma::Padma_vattu_RA;
//
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_TR]   = Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_BHR]  = Padma::Padma_vattu_BHA . Padma::Padma_vattu_RA;

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_THA]     = Padma::Padma_vattu_THA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_PA]      = Padma::Padma_vattu_PA;

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_LA_1]      = Padma::Padma_vattu_LA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_LA_2]      = Padma::Padma_vattu_LA;

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_GA]      = Padma::Padma_vattu_GA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_BHA]     = Padma::Padma_vattu_BHA;

$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_NA]      = Padma::Padma_vattu_NA;
$AAADurgaxx_toPadma[AAADurgaxx::AAADurgaxx_vattu_MA]      = Padma::Padma_vattu_MA;


$AAADurgaxx_prefixList = array();

//AAADurga.prefixList[AAADurga.vowelsn_I_1]  = true;
//AAADurga.prefixList[AAADurga.vowelsn_I_2]  = true;
//AAADurga.prefixList[AAADurga.vowelsn_I_3]  = true;
//AAADurga.prefixList[AAADurga.vowelsn_I_4]  = true;
//AAADurga.prefixList[AAADurga.vowelsn_R_II_1] = true;
//AAADurga.prefixList[AAADurga.vowelsn_R_II_2] = true;


$AAADurgaxx_suffixList = array();
//need to check these two w.r.t padma's
$AAADurgaxx_prefixList[AAADurgaxx::AAADurgaxx_halffm_RA_1]  = true;
$AAADurgaxx_prefixList[AAADurgaxx::AAADurgaxx_halffm_RA_2]  = true;

$AAADurgaxx_redundantList = array();

function AAADurgaxx_initialize()
{
    global $fontinfo;

    $fontinfo["aaadurgaxx"]["language"] = "Bengali";
    $fontinfo["aaadurgaxx"]["class"] = "AAADurgax";
}

?>
