<?php
/* ***** BEGIN LICENSE BLOCK *****
 *
 *  This file is originally part of Padma.
 *
 *  Copyright (C) 2006 Nagarjuna Venna <vnagarjuna@yahoo.com>
 *  Copyright (C) 2006 Golam Mortuza Hossain <gmhossain@gmail.com> 
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

//Aabpbengalix Bengali
class AabpBengalix
{
function Aabpbengalix()
{
}

//The interface every dynamic font encoding should implement
var $maxLookupLen = 1;
var $fontFace     = "Aabpbengalix";
var $displayName  = "Aabpbengalix";
var $script       = Padma::Padma_script_BENGALI;
var $hasSuffixes  = true;

function lookup ($str) 
{
    global $Aabpbengalix_toPadma;
    return $Aabpbengalix_toPadma[$str];
}

function isPrefixSymbol ($str)
{
    global $Aabpbengalix_prefixList;
    return array_key_exists($str, $Aabpbengalix_prefixList);
}

function isSuffixSymbol ($str)
{
    global $Aabpbengalix_suffixList;
    return array_key_exists($str, $Aabpbengalix_suffixList);
}

function isOverloaded ($str)
{
    global $Aabpbengalix_overloadList;
    return array_key_exists($str, $Aabpbengalix_overloadList);
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
    global $Aabpbengalix_redundantList;
    return array_key_exists($str, $Aabpbengalix_redundantList);
}

/* All map from Aabpbengalix */
/* ABP: start here */

const Aabpbengalix_vowelsn_U_1    = "\xC3\x80";
const Aabpbengalix_vowelsn_U_2    = "\xC3\x81";
const Aabpbengalix_vowelsn_U_3    = "\xC3\x82";
const Aabpbengalix_vowelsn_UU_1   = "\xC3\x83";
const Aabpbengalix_visarga	  = "\xC3\x86";
const Aabpbengalix_vowelsn_R_1    = "\xC3\x88";
const Aabpbengalix_vowelsn_UU_2   = "\xC3\x8A";
const Aabpbengalix_vowelsn_UU_3   = "\xC3\x8B";
const Aabpbengalix_vowelsn_U_4    = "\xC3\x8C";
const Aabpbengalix_vowelsn_U_5    = "\xC3\x8D";
const Aabpbengalix_vowelsn_UU_4   = "\xC3\x8E";
const Aabpbengalix_vowelsn_R_2    = "\xC3\x8F";
const Aabpbengalix_vowelsn_R_3    = "\xC3\x92";
const Aabpbengalix_vowelsn_UU_5   = "\xC3\x93";
const Aabpbengalix_vowelsn_R_4    = "\xC3\x94";
const Aabpbengalix_vowelsn_UU_6   = "\xC3\x95";
const Aabpbengalix_anusvara       = "\xC3\x98";
const Aabpbengalix_vowelsn_R_5    = "\xC3\x99";
const Aabpbengalix_vowelsn_U_6    = "\xC3\x9A";
const Aabpbengalix_vowelsn_UU_7   = "\xC3\x9B";

const Aabpbengalix_conjct_DDR     = "\x21";
const Aabpbengalix_conjct_D_DB    = "\x23";
const Aabpbengalix_conjct_D_DH    = "\x24";
const Aabpbengalix_conjct_D_DHB   = "\x25";
const Aabpbengalix_conjct_DB      = "\x26";
const Aabpbengalix_halffm_RA      = "\x27";
const Aabpbengalix_conjct_DR      = "\x28";
const Aabpbengalix_conjct_DHB     = "\x29";
const Aabpbengalix_conjct_NTT     = "\x2A";
const Aabpbengalix_conjct_NTTR    = "\x2B";

const Aabpbengalix_conjct_NTB     = "\x2F";
const Aabpbengalix_conjct_NTR_1   = "\x30";
const Aabpbengalix_conjct_NTH_1   = "\x31";
const Aabpbengalix_conjct_ND      = "\x32";
const Aabpbengalix_conjct_NDH_1   = "\x33";
const Aabpbengalix_conjct_NDR     = "\x34";
const Aabpbengalix_conjct_NDB     = "\x35";
const Aabpbengalix_conjct_NDHR_1  = "\x36";
const Aabpbengalix_conjct_NN      = "\x37";
const Aabpbengalix_conjct_NM      = "\x38";
const Aabpbengalix_conjct_PTT     = "\x39";
const Aabpbengalix_conjct_PS      = "\x3A";
const Aabpbengalix_conjct_PP      = "\x3B";
const Aabpbengalix_conjct_PR      = "\x3C";
const Aabpbengalix_conjct_PL      = "\x3D";
const Aabpbengalix_conjct_PHR     = "\x3E";
const Aabpbengalix_conjct_PHL     = "\x3F";
const Aabpbengalix_conjct_BD      = "\x40";
const Aabpbengalix_conjct_BDH     = "\x41";
const Aabpbengalix_conjct_BL      = "\x42";
const Aabpbengalix_conjct_BHR     = "\x43";
const Aabpbengalix_conjct_MP      = "\x44";
const Aabpbengalix_conjct_MPR     = "\x45";
const Aabpbengalix_conjct_MPH     = "\x46";
const Aabpbengalix_conjct_MB      = "\x47";
const Aabpbengalix_conjct_MBH     = "\x48";
const Aabpbengalix_conjct_MM      = "\x49";
const Aabpbengalix_conjct_MR      = "\x4A";
const Aabpbengalix_conjct_ML      = "\x4B";

const Aabpbengalix_conjct_KHR     = "\x4C";

const Aabpbengalix_conjct_LK      = "\x4D";
const Aabpbengalix_conjct_LL      = "\x4E";
const Aabpbengalix_conjct_LP      = "\x4F";
const Aabpbengalix_conjct_MN      = "\x50";

const Aabpbengalix_conjct_GHN     = "\x51";

const Aabpbengalix_conjct_SR      = "\x52";
const Aabpbengalix_conjct_SB      = "\x53";
const Aabpbengalix_conjct_SM      = "\x54";
const Aabpbengalix_conjct_ST      = "\x55";
const Aabpbengalix_conjct_STR     = "\x56";
const Aabpbengalix_conjct_SSTTR_1 = "\x57";
const Aabpbengalix_conjct_SSNN    = "\x58";
const Aabpbengalix_conjct_SSM     = "\x59";
const Aabpbengalix_conjct_SHC     = "\x5A";
const Aabpbengalix_conjct_C_NYA   = "\x5B";
const Aabpbengalix_conjct_HN      = "\x5C";
const Aabpbengalix_conjct_HM      = "\x5D";

const Aabpbengalix_conjct_SN      = "\x5E";

const Aabpbengalix_combo_HR       = "\x5F"; //combo
const Aabpbengalix_combo_GU       = "\x60"; //combo

const Aabpbengalix_conjct_LB      = "\x61";
const Aabpbengalix_conjct_STU     = "\x62";

const Aabpbengalix_combo_SHU      = "\x63"; //combo
const Aabpbengalix_combo_HU       = "\x64"; //combo

const Aabpbengalix_conjct_SHRU    = "\x65";

const Aabpbengalix_conjct_KTT     = "\x66";
const Aabpbengalix_conjct_KM      = "\x67";
const Aabpbengalix_conjct_KN      = "\x68";
const Aabpbengalix_conjct_KS      = "\x69";
const Aabpbengalix_conjct_KSSNN   = "\x6A";
const Aabpbengalix_conjct_GG      = "\x6B";
const Aabpbengalix_conjct_GB      = "\x6C";
const Aabpbengalix_conjct_GHR     = "\x6D";
const Aabpbengalix_conjct_NGA_KH  = "\x6E";
const Aabpbengalix_conjct_NGA_GH  = "\x6F";
const Aabpbengalix_conjct_C_CHB   = "\x70";
const Aabpbengalix_conjct_CHR     = "\x71";

const Aabpbengalix_conjct_JR      = "\x72";
const Aabpbengalix_conjct_JB      = "\x73";

const Aabpbengalix_conjct_NYA_CH  = "\x74";

const Aabpbengalix_conjct_NNDDR   = "\x75";
const Aabpbengalix_conjct_NNB     = "\x76";
const Aabpbengalix_conjct_NNM     = "\x77";

const Aabpbengalix_conjct_T_TB     = "\x78";
const Aabpbengalix_conjct_DBH     = "\x79";
const Aabpbengalix_conjct_DHN     = "\x7A";
const Aabpbengalix_conjct_DHR     = "\x7B";

const Aabpbengalix_conjct_NYA_C   = "\x7C";

const Aabpbengalix_conjct_SSP     = "\x7D";
const Aabpbengalix_conjct_NB      = "\x7E";

const Aabpbengalix_conjct_NDH_2   = "\xC2\xA1";
const Aabpbengalix_conjct_TTR     = "\xC2\xA2";
const Aabpbengalix_conjct_PT      = "\xC2\xA3";

const Aabpbengalix_conjct_NDHR_2  = "\xC2\xA5";

const Aabpbengalix_conjct_TB      = "\xC2\xA7";

const Aabpbengalix_conjct_NTU     = "\xC2\xA9";

const Aabpbengalix_consnt_KHANDA_TA = "\xC2\xAB";

const Aabpbengalix_conjct_SHB     = "\xC2\xAE";

const Aabpbengalix_conjct_D_D     = "\xC2\xB1";

const Aabpbengalix_conjct_LM      = "\xC2\xB5";

const Aabpbengalix_conjct_NTH_2   = "\xC2\xBF";

const Aabpbengalix_conjct_NS      = "\xC3\x84";
const Aabpbengalix_conjct_BJ      = "\xC3\x85";

const Aabpbengalix_conjct_BB      = "\xC3\x87";

const Aabpbengalix_conjct_BR      = "\xC3\x89";

const Aabpbengalix_conjct_LTT     = "\xC3\x91";

const Aabpbengalix_conjct_LG      = "\xC3\x96";

const Aabpbengalix_conjct_SK      = "\xC3\x9C";

const Aabpbengalix_conjct_LPH     = "\xC3\x9F";
const Aabpbengalix_conjct_SL      = "\xC3\xA0";
const Aabpbengalix_conjct_SKR     = "\xC3\xA1";

const Aabpbengalix_conjct_DBHR    = "\xC3\xA2";

const Aabpbengalix_conjct_NNTTH_1 = "\xC3\xA3";
const Aabpbengalix_conjct_NNDD    = "\xC3\xA4";
const Aabpbengalix_conjct_NT      = "\xC3\xA5";
const Aabpbengalix_conjct_NTR_2   = "\xC3\xA6";

const Aabpbengalix_conjct_SSB     = "\xC3\xA7";
const Aabpbengalix_conjct_SP      = "\xC3\xA8";
const Aabpbengalix_conjct_STB     = "\xC3\xA9";
const Aabpbengalix_conjct_SPH     = "\xC3\xAA";
const Aabpbengalix_conjct_SSTTR_2 = "\xC3\xAB";
const Aabpbengalix_conjct_SSKR    = "\xC3\xAC";
const Aabpbengalix_conjct_SSK     = "\xC3\xAD";
const Aabpbengalix_conjct_SSTT    = "\xC3\xAE";
const Aabpbengalix_conjct_SSTTH   = "\xC3\xAF";

const Aabpbengalix_conjct_SSPR    = "\xC3\xB1";

const Aabpbengalix_conjct_STT     = "\xC3\xB2";

const Aabpbengalix_conjct_NGA_M   = "\xC3\xB3";

const Aabpbengalix_conjct_STH     = "\xC3\xB4";

const Aabpbengalix_conjct_KB      = "\xC3\xB5";

const Aabpbengalix_conjct_THR     = "\xC3\xB6";

const Aabpbengalix_conjct_TTTT    = "\xC3\xB9";

const Aabpbengalix_conjct_JJB     = "\xC3\xBA";

const Aabpbengalix_conjct_NNTTH_2 = "\xC3\xBB";

const Aabpbengalix_conjct_T_TH     = "\xC3\xBC";

const Aabpbengalix_misc_UNKNOWN_1     = "\xC3\x9E";
const Aabpbengalix_misc_UNKNOWN_2     = "\xC3\xBE";
/* ABP: end here */
}

$Aabpbengalix_toPadma = array();

$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_U_1] = Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_U_2] = Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_U_3] = Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_U_4] = Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_U_5] = Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_U_6] = Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_UU_1] = Padma::Padma_vowelsn_UU;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_UU_2] = Padma::Padma_vowelsn_UU;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_UU_3] = Padma::Padma_vowelsn_UU;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_UU_4] = Padma::Padma_vowelsn_UU;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_UU_5] = Padma::Padma_vowelsn_UU;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_UU_6] = Padma::Padma_vowelsn_UU;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_UU_7] = Padma::Padma_vowelsn_UU;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_R_1]  = Padma::Padma_vowelsn_R;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_R_2]  = Padma::Padma_vowelsn_R;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_R_3]  = Padma::Padma_vowelsn_R;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_R_4]  = Padma::Padma_vowelsn_R;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_vowelsn_R_5]  = Padma::Padma_vowelsn_R;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_anusvara]     = Padma::Padma_anusvara;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_visarga]      = Padma::Padma_visarga;

/* ABP: Conjunct definition starts here */

//These have been defined multiple times
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NDHR_1]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_DHA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NDHR_2]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_DHA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NDH_1]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_DHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NDH_2]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_DHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NNTTH_1]  = Padma::Padma_consnt_NNA . Padma::Padma_vattu_TTHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NNTTH_2]  = Padma::Padma_consnt_NNA . Padma::Padma_vattu_TTHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NTH_1]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_THA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NTH_2]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_THA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NTR_1]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NTR_2]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSTTR_1]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSTTR_2]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;

//General

$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_BB]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_BD]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_DA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_BDH]    = Padma::Padma_consnt_BA . Padma::Padma_vattu_DHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_BHR]    = Padma::Padma_consnt_BHA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_BJ]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_JA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_BL]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_LA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_BR]     = Padma::Padma_consnt_BA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_C_CHB]  = Padma::Padma_consnt_CA . Padma::Padma_vattu_CHA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_C_NYA]  = Padma::Padma_consnt_CA . Padma::Padma_vattu_NYA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DB]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DBH]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DBHR]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_BHA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DDR]    = Padma::Padma_consnt_DDA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DHB]    = Padma::Padma_consnt_DHA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DHN]    = Padma::Padma_consnt_DHA . Padma::Padma_vattu_NA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DHR]    = Padma::Padma_consnt_DHA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DR]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_D_D]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_D_DB]    = Padma::Padma_consnt_DA . Padma::Padma_vattu_DA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_D_DH]   = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_D_DHB]  = Padma::Padma_consnt_DA . Padma::Padma_vattu_DHA . Padma::Padma_vattu_BA;

$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DHB]    = Padma::Padma_consnt_DHA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_DR]     = Padma::Padma_consnt_DA . Padma::Padma_vattu_RA;

$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_GB]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_GG]     = Padma::Padma_consnt_GA . Padma::Padma_vattu_GA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_GHN]    = Padma::Padma_consnt_GHA . Padma::Padma_vattu_NA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_GHR]    = Padma::Padma_consnt_GHA . Padma::Padma_vattu_RA;

$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_HM]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_MA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_HN]     = Padma::Padma_consnt_HA . Padma::Padma_vattu_NA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_JB]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_JJB]    = Padma::Padma_consnt_JA . Padma::Padma_vattu_JA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_JR]     = Padma::Padma_consnt_JA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_KB]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_KHR]    = Padma::Padma_consnt_KHA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_KM]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_MA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_KN]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_NA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_KS]     = Padma::Padma_consnt_KA . Padma::Padma_vattu_SA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_KSSNN]  = Padma::Padma_consnt_KA . Padma::Padma_vattu_SSA . Padma::Padma_vattu_NA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_KTT]    = Padma::Padma_consnt_KA . Padma::Padma_vattu_TTA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_LB]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_LG]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_GA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_LK]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_KA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_LL]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_LA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_LM]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_MA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_LP]     = Padma::Padma_consnt_LA . Padma::Padma_vattu_PA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_LPH]    = Padma::Padma_consnt_LA . Padma::Padma_vattu_PHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_LTT]    = Padma::Padma_consnt_LA . Padma::Padma_vattu_TTA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_MB]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_MBH]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_BHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_ML]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_LA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_MM]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_MA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_MN]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_NA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_MP]     = Padma::Padma_consnt_MA . Padma::Padma_vattu_PA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_MPH]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_PHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_MPR]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_MR]    = Padma::Padma_consnt_MA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NB]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_ND]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_DA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NDB]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_DA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NDR]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_DA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_ND]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_DA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NGA_GH] = Padma::Padma_consnt_NGA . Padma::Padma_vattu_GHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NGA_KH] = Padma::Padma_consnt_NGA . Padma::Padma_vattu_KHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NM]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_MA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NN]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_NA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NNB]    = Padma::Padma_consnt_NNA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NNDD]   = Padma::Padma_consnt_NNA . Padma::Padma_vattu_DDA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NNDDR]  = Padma::Padma_consnt_NNA . Padma::Padma_vattu_DDA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NNM]    = Padma::Padma_consnt_NNA . Padma::Padma_vattu_MA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NTB]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NTTR]   = Padma::Padma_consnt_NA . Padma::Padma_vattu_TTA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NTT]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_TTA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NTU]    = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA . Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NS]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_SA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NT]     = Padma::Padma_consnt_NA . Padma::Padma_vattu_TA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NYA_C]  = Padma::Padma_consnt_NYA . Padma::Padma_vattu_CA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_NYA_CH] = Padma::Padma_consnt_NYA . Padma::Padma_vattu_CHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_PHL]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_LA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_PHR]    = Padma::Padma_consnt_PHA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_PL]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_LA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_PP]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_PA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_PR]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_PS]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_SA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_PTT]    = Padma::Padma_consnt_PA . Padma::Padma_vattu_TTA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_PT]     = Padma::Padma_consnt_PA . Padma::Padma_vattu_TA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SB]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SHB]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SHC]    = Padma::Padma_consnt_SHA . Padma::Padma_vattu_CA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SK]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_KA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SKR]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_KA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SL]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_LA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SM]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_MA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SN]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_NA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SP]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_PA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SPH]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_PHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SR]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SHRU]   = Padma::Padma_consnt_SHA . Padma::Padma_vattu_RA . Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSB]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSK]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_KA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSKR]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_KA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSM]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_MA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSNN]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_NNA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSP]    = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSTTH]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSPR]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_PA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSTT]   = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_SSTTH]  = Padma::Padma_consnt_SSA . Padma::Padma_vattu_TTHA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_STH]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_THA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_STR]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_ST]     = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_STT]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TTA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_STU]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_STB]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_TA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_STH]    = Padma::Padma_consnt_SA . Padma::Padma_vattu_THA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_TB]     = Padma::Padma_consnt_TA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_THR]    = Padma::Padma_consnt_THA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_TTR]    = Padma::Padma_consnt_TTA . Padma::Padma_vattu_RA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_T_TB]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_TA . Padma::Padma_vattu_BA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_T_TH]   = Padma::Padma_consnt_TA . Padma::Padma_vattu_THA;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_conjct_TTTT]   = Padma::Padma_consnt_TTA . Padma::Padma_vattu_TTA;


/* ABP: Conjunct definition ends here */


$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_combo_GU]      = Padma::Padma_consnt_GA . Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_combo_SHU]     = Padma::Padma_consnt_SHA . Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_combo_HU]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_U;
$Aabpbengalix_toPadma[Aabpbengalix::Aabpbengalix_combo_HR]      = Padma::Padma_consnt_HA . Padma::Padma_vowelsn_R;


$Aabpbengalix_prefixList = array();

$Aabpbengalix_suffixList = array();
$Aabpbengalix_suffixList[Aabpbengalix::Aabpbengalix_halffm_RA]  = true;

$Aabpbengalix_redundantList = array();
$Aabpbengalix_redundantList[Aabpbengalix::Aabpbengalix_misc_UNKNOWN_1] = true;
$Aabpbengalix_redundantList[Aabpbengalix::Aabpbengalix_misc_UNKNOWN_2] = true;

$Aabpbengalix_overloadList = array();


function Aabpbengalix_initialize()
{
    global $fontinfo;

    $fontinfo["aabpbengalix"]["language"] = "Bengali";
    $fontinfo["aabpbengalix"]["class"] = "Aabpbengalix";
}
?>
