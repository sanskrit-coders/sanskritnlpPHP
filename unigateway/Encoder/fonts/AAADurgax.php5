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

//AAADurgax
class AAADurgax {
function AAADurgax()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 3;
var $fontFace     = "AAADurgax";
var $displayName  = "AAADurgax";
var $script       = Padma::Padma_script_BENGALI;
var $hasSuffixes  = true;

function lookup ($str)
{
    global $AAADurgax_toPadma;
    return $AAADurgax_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $AAADurgax_prefixList;
    return array_key_exists($str, $AAADurgax_prefixList);
}

function isSuffixSymbol ($str)
{
    global $AAADurgax_suffixList;
    return array_key_exists($str, $AAADurgax_suffixList);
}

function isOverloaded ($str)
{
    global $AAADurgax_overloadList;
    return array_key_exists($str, $AAADurgax_overloadList);
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
    global $AAADurgax_redundantList;
    return array_key_exists($str, $AAADurgax_redundantList);
}



/* All map from AAADurgax */
/* AAADurgax: start here */
const AAADurgax_halffm_RA      = "\x27";
const AAADurgax_vowelsn_U_1    = "\xC2\xAB";
const AAADurgax_vowelsn_U_2    = "\xC3\x80";
const AAADurgax_vowelsn_U_3    = "\xC3\x81";
const AAADurgax_vowelsn_U_4    = "\xC3\x82";
const AAADurgax_vowelsn_UU_1   = "\xC3\x83";
const AAADurgax_visarga	 = "\xC3\x86";
const AAADurgax_vowelsn_R_1    = "\xC3\x88";
const AAADurgax_vowelsn_UU_2   = "\xC3\x8A";
const AAADurgax_vowelsn_UU_3   = "\xC3\x8B";
const AAADurgax_vowelsn_U_5    = "\xC3\x8C";
const AAADurgax_vowelsn_U_6    = "\xC3\x8D";
const AAADurgax_vowelsn_UU_4   = "\xC3\x8E";
const AAADurgax_vowelsn_R_2    = "\xC3\x8F";
const AAADurgax_vowelsn_UU_5   = "\xC3\x91";
const AAADurgax_vowelsn_R_3    = "\xC3\x92";
const AAADurgax_vowelsn_UU_6   = "\xC3\x93";
const AAADurgax_vowelsn_R_4    = "\xC3\x94";
const AAADurgax_vowelsn_UU_7   = "\xC3\x95";
const AAADurgax_anusvara       = "\xC3\x98";
const AAADurgax_vowelsn_R_5    = "\xC3\x99";
const AAADurgax_vowelsn_U_7    = "\xC3\x9A";
const AAADurgax_vowelsn_UU_8   = "\xC3\x9B";

// Conjuncts

const AAADurgax_conjct_BDH_1   = "\x30";
const AAADurgax_conjct_BL      = "\x31";
const AAADurgax_conjct_BHR     = "\x32";
const AAADurgax_conjct_MP      = "\x33";
const AAADurgax_conjct_MPR_1   = "\x34";
const AAADurgax_conjct_MB      = "\x36";
const AAADurgax_conjct_MM      = "\x38";
const AAADurgax_conjct_MR      = "\x39";
const AAADurgax_conjct_ML      = "\x3A";
const AAADurgax_conjct_KHR     = "\x3B";
const AAADurgax_conjct_LK      = "\x3C";
const AAADurgax_conjct_LL      = "\x3D";
const AAADurgax_conjct_LP      = "\x3E";
const AAADurgax_conjct_MN      = "\x3F";
const AAADurgax_conjct_GHN     = "\x40";
const AAADurgax_conjct_SR      = "\x41";
const AAADurgax_conjct_SB      = "\x42";
const AAADurgax_conjct_SM      = "\x43";
const AAADurgax_conjct_ST      = "\x44";
const AAADurgax_conjct_STR     = "\x45";
const AAADurgax_conjct_SSTTR   = "\x46";
const AAADurgax_conjct_SSNN    = "\x47";
const AAADurgax_conjct_SSM     = "\x48";
const AAADurgax_conjct_SHC     = "\x49";
const AAADurgax_conjct_C_NYA   = "\x4A";
const AAADurgax_conjct_HM      = "\x4B";
const AAADurgax_conjct_HN      = "\x4C";
const AAADurgax_conjct_SN      = "\x4D";
const AAADurgax_combo_HR       = "\x4E"; //combo
const AAADurgax_combo_GU       = "\x4F"; //combo
const AAADurgax_conjct_LB      = "\x50";
const AAADurgax_conjct_STU     = "\x51";
const AAADurgax_combo_SHU      = "\x52"; //combo
const AAADurgax_combo_HU       = "\x53"; //combo
const AAADurgax_conjct_SHRU    = "\x54";
const AAADurgax_conjct_KTT     = "\x55";
const AAADurgax_conjct_KM      = "\x56";
const AAADurgax_conjct_KN      = "\x57";
const AAADurgax_conjct_KS      = "\x58";
const AAADurgax_conjct_KSSNN   = "\x59";
const AAADurgax_conjct_GG      = "\x5A";
const AAADurgax_conjct_SHRUU   = "\x5B";
const AAADurgax_conjct_GB      = "\x5C";
const AAADurgax_conjct_PRU     = "\x5D";
const AAADurgax_conjct_GHR     = "\x5E";
const AAADurgax_conjct_NGA_KH  = "\x5F";
const AAADurgax_conjct_NGA_GH  = "\x60";
const AAADurgax_conjct_C_CHB   = "\x61";
const AAADurgax_conjct_CHR     = "\x62";
const AAADurgax_conjct_JR      = "\x63";
const AAADurgax_conjct_JB      = "\x64";
const AAADurgax_conjct_NYA_CH  = "\x65";
const AAADurgax_conjct_NNDDR   = "\x66";
const AAADurgax_conjct_NNB     = "\x67";
const AAADurgax_conjct_NNM     = "\x68";
const AAADurgax_conjct_T_TB    = "\x69";
const AAADurgax_conjct_DBH     = "\x6A";
const AAADurgax_conjct_DHN     = "\x6B";
const AAADurgax_conjct_DHR     = "\x6C";
const AAADurgax_conjct_NYA_C   = "\x6D";

const AAADurgax_conjct_NB      = "\x6F";
const AAADurgax_conjct_DDR     = "\x70";
const AAADurgax_conjct_PT_1    = "\x71";
const AAADurgax_conjct_TB_1    = "\x72";
const AAADurgax_conjct_D_D     = "\x73";
const AAADurgax_conjct_SKL     = "\x74";
const AAADurgax_conjct_D_DHB   = "\x75";

const AAADurgax_conjct_DBHR    = "\x77";
const AAADurgax_conjct_SHM     = "\x78";
const AAADurgax_conjct_SHL     = "\x7B";
const AAADurgax_conjct_SSPH    = "\x7C";
const AAADurgax_conjct_SSP     = "\x7D";
const AAADurgax_conjct_GN      = "\x7E";

const AAADurgax_conjct_THB     = "\xC2\xA1";
const AAADurgax_conjct_BDH_2   = "\xC2\xA2";


const AAADurgax_conjct_NS      = "\xC2\xA5";
const AAADurgax_conjct_MPR_2   = "\xC2\xA6";

const AAADurgax_conjct_MBH     = "\xC2\xA8";
const AAADurgax_conjct_BBH     = "\xC2\xA9";
const AAADurgax_conjct_SHN     = "\xC2\xAA";

const AAADurgax_conjct_HL      = "\xC2\xAE";
const AAADurgax_conjct_HR      = "\xC2\xAF";
const AAADurgax_conjct_KSSM    = "\xC2\xB0"; 
const AAADurgax_conjct_NGA_KSS = "\xC2\xB1"; 
const AAADurgax_conjct_CCHR    = "\xC2\xB2";
const AAADurgax_conjct_JJH     = "\xC2\xB3";
const AAADurgax_conjct_NYA_JH  = "\xC2\xB4";

const AAADurgax_conjct_NN_DDH  = "\xC2\xB6";

const AAADurgax_conjct_DGH     = "\xC2\xBA";
const AAADurgax_conjct_BJ      = "\xC2\xBB";
const AAADurgax_conjct_BB      = "\xC2\xBC";
const AAADurgax_conjct_BR      = "\xC2\xBD";
const AAADurgax_conjct_LTT     = "\xC2\xBE";
const AAADurgax_conjct_LG      = "\xC2\xBF";

const AAADurgax_conjct_SK      = "\xC3\x84";
const AAADurgax_conjct_SKR     = "\xC3\x85";
const AAADurgax_conjct_SL      = "\xC3\x87";
const AAADurgax_conjct_NTB     = "\xC3\x89";
const AAADurgax_conjct_NDD     = "\xC3\x90";
const AAADurgax_conjct_NTTH    = "\xC3\x96";
const AAADurgax_conjct_NT      = "\xC3\x97";
const AAADurgax_conjct_SSB     = "\xC3\x9C";
const AAADurgax_conjct_STB     = "\xC3\x9D";
const AAADurgax_conjct_SP      = "\xC3\x9E";
const AAADurgax_conjct_SPH     = "\xC3\x9F";
const AAADurgax_conjct_STTR    = "\xC3\xA0";
const AAADurgax_conjct_SSK     = "\xC3\xA1";
const AAADurgax_conjct_SSKR    = "\xC3\xA2";
const AAADurgax_conjct_SSTT    = "\xC3\xA3";
const AAADurgax_conjct_SSTTH   = "\xC3\xA4";
const AAADurgax_conjct_SSPR    = "\xC3\xA5";
const AAADurgax_conjct_NGA_M   = "\xC3\xA6";
const AAADurgax_conjct_STT     = "\xC3\xA7";
const AAADurgax_conjct_STH     = "\xC3\xA8";
const AAADurgax_conjct_THR     = "\xC3\xA9";
const AAADurgax_conjct_KB      = "\xC3\xAA";
const AAADurgax_conjct_JJB     = "\xC3\xAB";
const AAADurgax_conjct_TTTT    = "\xC3\xAC";
const AAADurgax_conjct_NNTTH   = "\xC3\xAD";
const AAADurgax_conjct_T_TH    = "\xC3\xAE";
const AAADurgax_conjct_TTR     = "\xC3\xAF";
const AAADurgax_conjct_PT_2    = "\xC3\xB0";
const AAADurgax_conjct_TB_2    = "\xC3\xB1";
const AAADurgax_conjct_LPH     = "\xC3\xB2";
const AAADurgax_conjct_SHB     = "\xC3\xB3";
const AAADurgax_conjct_NTU     = "\xC3\xB4";

const AAADurgax_conjct_LM      = "\xC3\xB7";

const AAADurgax_conjct_PHR     = "\xC3\xBB";
const AAADurgax_conjct_PHL     = "\xC3\xBC";
const AAADurgax_conjct_BD      = "\xC3\xBD";
const AAADurgax_conjct_NNTTR   = "\xC3\xBE";

//AAADurgax.misc_UNKNOWN_1     = "\xC3\x9E";
//AAADurgax.misc_UNKNOWN_2     = "\xC3\xBE";

}

/* AAADurgax: end here */


$AAADurgax_toPadma = array();

$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_U_1] = Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_U_2] = Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_U_3] = Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_U_4] = Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_U_5] = Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_U_6] = Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_U_7] = Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_UU_4] = Padma::Padma_vowelsn_UU;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_UU_5] = Padma::Padma_vowelsn_UU;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_UU_6] = Padma::Padma_vowelsn_UU;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_UU_7] = Padma::Padma_vowelsn_UU;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_UU_8] = Padma::Padma_vowelsn_UU;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_R_1]  = Padma::Padma_vowelsn_R;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_R_2]  = Padma::Padma_vowelsn_R;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_R_3]  = Padma::Padma_vowelsn_R;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_R_4]  = Padma::Padma_vowelsn_R;
$AAADurgax_toPadma[AAADurgax::AAADurgax_vowelsn_R_5]  = Padma::Padma_vowelsn_R;
$AAADurgax_toPadma[AAADurgax::AAADurgax_anusvara]     = Padma::Padma_anusvara;
$AAADurgax_toPadma[AAADurgax::AAADurgax_visarga]      = Padma::Padma_visarga;

/* ABP: Conjunct definition starts here */

//These have been defined multiple times
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NTTH]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_TTHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NNTTH]    = Padma::Padma_consnt_NNA . Padma::Padma_vattu_TTHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NNTTR]    = Padma::Padma_consnt_NNA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSTTR]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_STTR]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;

//General

$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_BB]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_BD]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_DA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_BDH_1]  = Padma::Padma_consnt_BA . Padma::Padma_vattu_DHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_BDH_2]  = Padma::Padma_consnt_BA . Padma::Padma_vattu_DHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_BHR]    = Padma::Padma_consnt_BHA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_BJ]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_JA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_BL]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_LA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_BR]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_C_CHB]  = Padma::Padma_consnt_CA . Padma::Padma_vattu_CHA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_C_NYA]  = Padma::Padma_consnt_CA . Padma::Padma_vattu_NYA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_DBH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_DGH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_GHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_DBHR]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_DDR]    = Padma::Padma_consnt_DDA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_DHN]    = Padma::Padma_consnt_DHA . Padma::Padma_vattu_NA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_DHR]    = Padma::Padma_consnt_DHA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_D_D]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SKL]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_KA . Padma::Padma_vattu_LA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_D_DHB]  = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA . Padma::Padma_vattu_BA;

$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_THB]    = Padma::Padma_consnt_THA . Padma::Padma_vattu_BA;

$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_GB]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_GG]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_GA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_GN]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_NA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_GHN]    = Padma::Padma_consnt_GHA . Padma::Padma_vattu_NA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_GHR]    = Padma::Padma_consnt_GHA . Padma::Padma_vattu_RA;

$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_HN]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_JB]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_JJB]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_JR]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_KB]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_KHR]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_KM]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_MA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_KN]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_NA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_KS]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_SA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_KSSNN]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vattu_NA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_KTT]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_TTA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_LB]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_LG]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_GA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_LK]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_KA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_LL]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_LA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_LM]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_MA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_LP]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_PA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_LPH]    = Padma::Padma_consnt_LA . Padma::Padma_vattu_PHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_LTT]    = Padma::Padma_consnt_LA . Padma::Padma_vattu_TTA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_MB]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_MBH]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_BHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_BBH]    = Padma::Padma_consnt_BA . Padma::Padma_vattu_BHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_ML]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_LA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_MM]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_MA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_MN]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_NA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_MP]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_PA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_MPR_1]  = Padma::Padma_consnt_MA . Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_MPR_2]  = Padma::Padma_consnt_MA . Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_MR]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NB]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NGA_GH] = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NGA_KH] = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SHM]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_MA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SHN]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_NA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SHL]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_LA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_HL]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_LA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NNB]    = Padma::Padma_consnt_NNA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NDD]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_DDA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NNDDR]  = Padma::Padma_consnt_NNA . Padma::Padma_vattu_DDA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NNM]    = Padma::Padma_consnt_NNA . Padma::Padma_vattu_MA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NTB]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NTU]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NS]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_SA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NT]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NYA_C]  = Padma::Padma_consnt_NYA . Padma::Padma_vattu_CA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NYA_CH] = Padma::Padma_consnt_NYA . Padma::Padma_vattu_CHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_PHL]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_LA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_PHR]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_LL]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_LA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_PT_1]   = Padma::Padma_consnt_PA . Padma::Padma_vattu_TA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_PT_2]   = Padma::Padma_consnt_PA . Padma::Padma_vattu_TA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SB]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SHB]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SHC]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SK]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_KA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SKR]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_KA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SL]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_LA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SM]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_MA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SN]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_NA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SP]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_PA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSPH]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSP]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SPH]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_PHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SR]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SHRU]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SHRUU]  = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_UU;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_PRU]    = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSB]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSK]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_KA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSKR]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_KA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSM]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_MA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSNN]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_NNA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSP]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSTTH]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSPR]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSTT]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_SSTTH]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_STH]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_THA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_STR]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_ST]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_STT]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TTA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_STU]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_STB]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_STH]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_THA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_TB_1]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_TB_2]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_THR]    = Padma::Padma_consnt_THA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_TTR]    = Padma::Padma_consnt_TTA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_T_TB]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA . Padma::Padma_vattu_BA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_T_TH]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_THA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;


/* ABP: Conjunct definition ends here */


$AAADurgax_toPadma[AAADurgax::AAADurgax_combo_GU]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_combo_SHU]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_combo_HU]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_U;
$AAADurgax_toPadma[AAADurgax::AAADurgax_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_KSSM]   = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vattu_MA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NGA_KSS]= Padma::Padma_consnt_NGA . Padma::Padma_vattu_KA . Padma::Padma_vattu_SSA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_CCHR]   = Padma::Padma_consnt_CA . Padma::Padma_vattu_CHA . Padma::Padma_vattu_RA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_JJH]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_JHA;
$AAADurgax_toPadma[AAADurgax::AAADurgax_conjct_NYA_JH] = Padma::Padma_consnt_NYA . Padma::Padma_vattu_JHA;


$AAADurgax_prefixList = array();

$AAADurgax_suffixList = array();
$AAADurgax_suffixList[AAADurgax::AAADurgax_halffm_RA]  = true;

$AAADurgax_redundantList = array();
//AAADurgax.redundantList[AAADurgax.misc_UNKNOWN_1] = true;
//AAADurgax.redundantList[AAADurgax.misc_UNKNOWN_2] = true;

$AAADurgax_overloadList = array();

function AAADurgax_initialize()
{
    global $fontinfo;

    $fontinfo["aaadurgax"]["language"] = "Bengali";
    $fontinfo["aaadurgax"]["class"] = "AAADurgax";
}

?>
